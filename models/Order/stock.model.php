<?php
class Stock extends Model implements JsonSerializable{
	public $id;
	public $medicines_id;
	public $qty;
	public $transection_type_id;
	public $reference_id;
	public $werehouse_id;
	public $expiry_date;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$medicines_id,$qty,$transection_type_id,$werehouse_id,$created_at,$updated_at){
		$this->id=$id;
		$this->medicines_id=$medicines_id;
		$this->qty=$qty;
		$this->transection_type_id=$transection_type_id;
		$this->werehouse_id=$werehouse_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}

    public function sell() {
        global $db,$tx;

        $db->begin_transaction();
		// return print_r($this);

        try {
            // Fetch valid purchase stock (FIFO)
            $sql = "SELECT id, qty, expiry_date 
                    FROM {$tx}stocks
                    WHERE medicines_id = '$this->medicines_id'
                      AND transection_type_id = 1
                      AND qty > 0
                      AND (expiry_date IS NULL OR expiry_date >= CURDATE())
                    ORDER BY expiry_date ASC, created_at ASC";

            $result = $db->query($sql);
            $remaining = $this->qty;

            while ($row = $result->fetch_assoc()) {
                if ($remaining <= 0) break;

                $deduct = min($row['qty'], $remaining);
                $remaining -= $deduct;

                // Decrease from purchase batch
                $update = "UPDATE {$tx}stocks SET qty = qty - $deduct WHERE id = {$row['id']}";
                $db->query($update);

                // Log sale (link to purchase)
                $insert = "INSERT INTO {$tx}stocks 
                            (medicines_id, qty, transection_type_id, reference_id, parent_id, expiry_date)
                           VALUES ('$this->medicines_id', -$deduct, 2, '$this->reference_id', {$row['id']}, '{$row['expiry_date']}')";
                $db->query($insert);
            }

            // Rollback if insufficient stock
            if ($remaining > 0) {
                $db->rollback();
                return ["success" => false, "message" => "Not enough non-expired stock available"];
            }

            $db->commit();
            return ["success" => true, "message" => "Sale processed successfully"];

        } catch (Exception $e) {
            $db->rollback();
            return ["success" => false, "message" => $e->getMessage()];
        }
    }
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stocks(medicines_id,qty,transection_type_id,reference_id,werehouse_id,expiry_date,created_at,updated_at)values('$this->medicines_id','$this->qty','$this->transection_type_id','$this->reference_id','$this->werehouse_id','$this->expiry_date','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}stocks set medicines_id='$this->medicines_id',qty='$this->qty',transection_type_id='$this->transection_type_id',werehouse_id='$this->werehouse_id',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}stocks where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,medicines_id,qty,transection_type_id,werehouse_id,created_at,updated_at from {$tx}stocks");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,medicines_id,qty,transection_type_id,werehouse_id,created_at,updated_at from {$tx}stocks $criteria limit $top,$perpage");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}stocks $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,medicines_id,qty,transection_type_id,werehouse_id,created_at,updated_at from {$tx}stocks where id='$id'");
		$stock=$result->fetch_object();
			return $stock;
	}
	public static function stock(){
		global $db,$tx;
		$result =$db->query("SELECT SUM(qty) qty FROM {$tx}stocks WHERE qty > 0 AND (expiry_date IS NULL OR expiry_date >= CURDATE())");
		$stock=$result->fetch_object();
			return $stock;
	}
	public static function expired_medicine(){
		global $db,$tx;
		$result =$db->query("SELECT SUM(qty) qty FROM {$tx}stocks WHERE expiry_date < CURDATE()");
		$stock=$result->fetch_object();
			return $stock;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stocks");
		$stock =$result->fetch_object();
		return $stock->last_id;
	}
	static function stock_report(){
		global $db,$tx;
		$result =$db->query("SELECT s.id,concat(name, ' ', strength) medicine,s.medicines_id,sum(s.qty) qty FROM {$tx}stocks s, {$tx}medicines m where m.id = s.medicines_id AND (s.expiry_date IS NULL OR s.expiry_date >= CURDATE()) GROUP by medicines_id");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	static function stock_report_date($from,$to){
		global $db,$tx;
		$result =$db->query("SELECT s.id,m.name medicine,s.medicines_id,sum(s.qty) qty FROM {$tx}stocks s, {$tx}medicines m where m.id = s.medicines_id and  date(s.updated_at) BETWEEN '$from' and '$to' GROUP by medicines_id");
		$data=[];
		while($stock=$result->fetch_object()){
			$data[]=$stock;
		}
			return $data;
	}
	public static function low_stock(){
		global $db,$tx;
		$result =$db->query("SELECT COUNT(*) AS low_stock_count
		FROM (
			SELECT medicines_id
			FROM {$tx}stocks
			GROUP BY medicines_id
			HAVING SUM(qty) <= 10
		) AS stock_summary;");
		$stock=$result->fetch_object();
			return $stock;
	}
	public static function stock_out(){
		global $db,$tx;
		$result =$db->query("SELECT COUNT(*) AS stock_out_count
		FROM (
			SELECT medicines_id
			FROM {$tx}stocks
			GROUP BY medicines_id
			HAVING SUM(qty) <= 0
		) AS stock_summary;");
		$stock=$result->fetch_object();
			return $stock;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Medicines Id:$this->medicines_id<br> 
		Qty:$this->qty<br> 
		Transection Type Id:$this->transection_type_id<br> 
		Werehouse Id:$this->werehouse_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> ";
	}

	//-------------HTML----------//

	static function html_select($name="cmbStock"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}stocks");
		while($stock=$result->fetch_object()){
			$html.="<option value ='$stock->id'>$stock->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}stocks $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,medicines_id,qty,transection_type_id,werehouse_id,created_at,updated_at from {$tx}stocks $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"stock/create","text"=>"New Stock"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Medicines Id</th><th>Qty</th><th>Transection Type Id</th><th>Werehouse Id</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Medicines Id</th><th>Qty</th><th>Transection Type Id</th><th>Werehouse Id</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($stock=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"stock/show/$stock->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"stock/edit/$stock->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"stock/confirm/$stock->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$stock->id</td><td>$stock->medicines_id</td><td>$stock->qty</td><td>$stock->transection_type_id</td><td>$stock->werehouse_id</td><td>$stock->created_at</td><td>$stock->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,medicines_id,qty,transection_type_id,werehouse_id,created_at,updated_at from {$tx}stocks where id={$id}");
		$stock=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Stock Show</th></tr>";
		$html.="<tr><th>Id</th><td>$stock->id</td></tr>";
		$html.="<tr><th>Medicines Id</th><td>$stock->medicines_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$stock->qty</td></tr>";
		$html.="<tr><th>Transection Type Id</th><td>$stock->transection_type_id</td></tr>";
		$html.="<tr><th>Werehouse Id</th><td>$stock->werehouse_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$stock->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$stock->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
