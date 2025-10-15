<?php
class Stock extends Model implements JsonSerializable{
	public $id;
	public $medicines_id;
	public $qty;
	public $transection_type_id;
	public $werehouse_id;
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
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}stocks(medicines_id,qty,transection_type_id,werehouse_id,created_at,updated_at)values('$this->medicines_id','$this->qty','$this->transection_type_id','$this->werehouse_id','$this->created_at','$this->updated_at')");
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
	public function jsonSerialize(){
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
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}stocks");
		$stock =$result->fetch_object();
		return $stock->last_id;
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
		Updated At:$this->updated_at<br> 
";
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
