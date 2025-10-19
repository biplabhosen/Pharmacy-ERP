<?php
class PurchaseDetail extends Model implements JsonSerializable{
	public $id;
	public $purchase_id;
	public $medicine_id;
	public $quantity;
	public $unit_price;
	public $subtotal;
	public $expiry_date;
	public $batch_number;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$purchase_id,$medicine_id,$quantity,$unit_price,$subtotal,$expiry_date,$batch_number,$created_at,$updated_at){
		$this->id=$id;
		$this->purchase_id=$purchase_id;
		$this->medicine_id=$medicine_id;
		$this->quantity=$quantity;
		$this->unit_price=$unit_price;
		$this->subtotal=$subtotal;
		$this->expiry_date=$expiry_date;
		$this->batch_number=$batch_number;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}purchase_details(purchase_id,medicine_id,quantity,unit_price,subtotal,expiry_date,batch_number,created_at,updated_at)values('$this->purchase_id','$this->medicine_id','$this->quantity','$this->unit_price','$this->subtotal','$this->expiry_date','$this->batch_number','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}purchase_details set purchase_id='$this->purchase_id',medicine_id='$this->medicine_id',quantity='$this->quantity',unit_price='$this->unit_price',subtotal='$this->subtotal',expiry_date='$this->expiry_date',batch_number='$this->batch_number',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}purchase_details where id={$id}");
	}
	public function jsonSerialize(){
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,purchase_id,medicine_id,quantity,unit_price,subtotal,expiry_date,batch_number,created_at,updated_at from {$tx}purchase_details");
		$data=[];
		while($purchasedetail=$result->fetch_object()){
			$data[]=$purchasedetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,purchase_id,medicine_id,quantity,unit_price,subtotal,expiry_date,batch_number,created_at,updated_at from {$tx}purchase_details $criteria limit $top,$perpage");
		$data=[];
		while($purchasedetail=$result->fetch_object()){
			$data[]=$purchasedetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}purchase_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,purchase_id,medicine_id,quantity,unit_price,subtotal,expiry_date,batch_number,created_at,updated_at from {$tx}purchase_details where id='$id'");
		$purchasedetail=$result->fetch_object();
			return $purchasedetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}purchase_details");
		$purchasedetail =$result->fetch_object();
		return $purchasedetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Purchase Id:$this->purchase_id<br> 
		Medicine Id:$this->medicine_id<br> 
		Quantity:$this->quantity<br> 
		Unit Price:$this->unit_price<br> 
		Subtotal:$this->subtotal<br> 
		Expiry Date:$this->expiry_date<br> 
		Batch Number:$this->batch_number<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbPurchaseDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}purchase_details");
		while($purchasedetail=$result->fetch_object()){
			$html.="<option value ='$purchasedetail->id'>$purchasedetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}purchase_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,purchase_id,medicine_id,quantity,unit_price,subtotal,expiry_date,batch_number,created_at,updated_at from {$tx}purchase_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"purchasedetail/create","text"=>"New PurchaseDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Purchase Id</th><th>Medicine Id</th><th>Quantity</th><th>Unit Price</th><th>Subtotal</th><th>Expiry Date</th><th>Batch Number</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Purchase Id</th><th>Medicine Id</th><th>Quantity</th><th>Unit Price</th><th>Subtotal</th><th>Expiry Date</th><th>Batch Number</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($purchasedetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"purchasedetail/show/$purchasedetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"purchasedetail/edit/$purchasedetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"purchasedetail/confirm/$purchasedetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$purchasedetail->id</td><td>$purchasedetail->purchase_id</td><td>$purchasedetail->medicine_id</td><td>$purchasedetail->quantity</td><td>$purchasedetail->unit_price</td><td>$purchasedetail->subtotal</td><td>$purchasedetail->expiry_date</td><td>$purchasedetail->batch_number</td><td>$purchasedetail->created_at</td><td>$purchasedetail->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,purchase_id,medicine_id,quantity,unit_price,subtotal,expiry_date,batch_number,created_at,updated_at from {$tx}purchase_details where id={$id}");
		$purchasedetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">PurchaseDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$purchasedetail->id</td></tr>";
		$html.="<tr><th>Purchase Id</th><td>$purchasedetail->purchase_id</td></tr>";
		$html.="<tr><th>Medicine Id</th><td>$purchasedetail->medicine_id</td></tr>";
		$html.="<tr><th>Quantity</th><td>$purchasedetail->quantity</td></tr>";
		$html.="<tr><th>Unit Price</th><td>$purchasedetail->unit_price</td></tr>";
		$html.="<tr><th>Subtotal</th><td>$purchasedetail->subtotal</td></tr>";
		$html.="<tr><th>Expiry Date</th><td>$purchasedetail->expiry_date</td></tr>";
		$html.="<tr><th>Batch Number</th><td>$purchasedetail->batch_number</td></tr>";
		$html.="<tr><th>Created At</th><td>$purchasedetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$purchasedetail->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
