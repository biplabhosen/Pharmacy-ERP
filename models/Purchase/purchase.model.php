<?php
class Purchase extends Model implements JsonSerializable{
	public $id;
	public $purchase_date;
	public $supplier_id;
	public $total_amount;
	public $payment_status;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$purchase_date,$supplier_id,$total_amount,$payment_status,$created_at,$updated_at){
		$this->id=$id;
		$this->purchase_date=$purchase_date;
		$this->supplier_id=$supplier_id;
		$this->total_amount=$total_amount;
		$this->payment_status=$payment_status;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}purchases(purchase_date,supplier_id,total_amount,payment_status,created_at,updated_at)values('$this->purchase_date','$this->supplier_id','$this->total_amount','$this->payment_status','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}purchases set purchase_date='$this->purchase_date',supplier_id='$this->supplier_id',total_amount='$this->total_amount',payment_status='$this->payment_status',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}purchases where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,purchase_date,supplier_id,total_amount,payment_status,created_at,updated_at from {$tx}purchases");
		$data=[];
		while($purchase=$result->fetch_object()){
			$data[]=$purchase;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,purchase_date,supplier_id,total_amount,payment_status,created_at,updated_at from {$tx}purchases $criteria limit $top,$perpage");
		$data=[];
		while($purchase=$result->fetch_object()){
			$data[]=$purchase;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}purchases $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,purchase_date,supplier_id,total_amount,payment_status,created_at,updated_at from {$tx}purchases where id='$id'");
		$purchase=$result->fetch_object();
			return $purchase;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}purchases");
		$purchase =$result->fetch_object();
		return $purchase->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Purchase Date:$this->purchase_date<br> 
		Supplier Id:$this->supplier_id<br> 
		Total Amount:$this->total_amount<br> 
		Payment Status:$this->payment_status<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPurchase"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}purchases");
		while($purchase=$result->fetch_object()){
			$html.="<option value ='$purchase->id'>$purchase->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}purchases $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,purchase_date,supplier_id,total_amount,payment_status,created_at,updated_at from {$tx}purchases $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"purchase/create","text"=>"New Purchase"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Purchase Date</th><th>Supplier Id</th><th>Total Amount</th><th>Payment Status</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Purchase Date</th><th>Supplier Id</th><th>Total Amount</th><th>Payment Status</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($purchase=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"purchase/show/$purchase->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"purchase/edit/$purchase->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"purchase/confirm/$purchase->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$purchase->id</td><td>$purchase->purchase_date</td><td>$purchase->supplier_id</td><td>$purchase->total_amount</td><td>$purchase->payment_status</td><td>$purchase->created_at</td><td>$purchase->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,purchase_date,supplier_id,total_amount,payment_status,created_at,updated_at from {$tx}purchases where id={$id}");
		$purchase=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Purchase Show</th></tr>";
		$html.="<tr><th>Id</th><td>$purchase->id</td></tr>";
		$html.="<tr><th>Purchase Date</th><td>$purchase->purchase_date</td></tr>";
		$html.="<tr><th>Supplier Id</th><td>$purchase->supplier_id</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$purchase->total_amount</td></tr>";
		$html.="<tr><th>Payment Status</th><td>$purchase->payment_status</td></tr>";
		$html.="<tr><th>Created At</th><td>$purchase->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$purchase->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
