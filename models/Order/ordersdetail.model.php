<?php
class OrdersDetail extends Model implements JsonSerializable{
	public $id;
	public $order_id;
	public $medicine_id;
	public $qty;
	public $unit_price;
	public $discount;
	public $created_at;
	public $updated_at;

	public function __construct(){
	}
	public function set($id,$order_id,$medicine_id,$qty,$unit_price,$discount,$created_at,$updated_at){
		$this->id=$id;
		$this->order_id=$order_id;
		$this->medicine_id=$medicine_id;
		$this->qty=$qty;
		$this->unit_price=$unit_price;
		$this->discount=$discount;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}orders_details(order_id,medicine_id,qty,unit_price,discount,created_at,updated_at)values('$this->order_id','$this->medicine_id','$this->qty','$this->unit_price','$this->discount','$this->created_at','$this->updated_at')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}orders_details set order_id='$this->order_id',medicine_id='$this->medicine_id',qty='$this->qty',unit_price='$this->unit_price',discount='$this->discount',created_at='$this->created_at',updated_at='$this->updated_at' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}orders_details where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,order_id,medicine_id,qty,unit_price,discount,created_at,updated_at from {$tx}orders_details");
		$data=[];
		while($ordersdetail=$result->fetch_object()){
			$data[]=$ordersdetail;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,order_id,medicine_id,qty,unit_price,discount,created_at,updated_at from {$tx}orders_details $criteria limit $top,$perpage");
		$data=[];
		while($ordersdetail=$result->fetch_object()){
			$data[]=$ordersdetail;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}orders_details $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,order_id,medicine_id,qty,unit_price,discount,created_at,updated_at from {$tx}orders_details where id='$id'");
		$ordersdetail=$result->fetch_object();
			return $ordersdetail;
	}
	public static function findAllByOrder_id($id){
		global $db,$tx;
		$result =$db->query("select id,order_id,medicine_id,qty,unit_price,discount,created_at,updated_at from {$tx}orders_details where order_id='$id'");
		$ordersdetail=$result->fetch_all(MYSQLI_ASSOC);
			return $ordersdetail;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}orders_details");
		$ordersdetail =$result->fetch_object();
		return $ordersdetail->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Order Id:$this->order_id<br> 
		Product Id:$this->medicine_id<br> 
		Qty:$this->qty<br> 
		Unit Price:$this->unit_price<br> 
		Discount:$this->discount<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrdersDetail"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}orders_details");
		while($ordersdetail=$result->fetch_object()){
			$html.="<option value ='$ordersdetail->id'>$ordersdetail->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}orders_details $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,order_id,medicine_id,qty,unit_price,discount,created_at,updated_at from {$tx}orders_details $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"ordersdetail/create","text"=>"New OrdersDetail"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Order Id</th><th>Product Id</th><th>Qty</th><th>Unit Price</th><th>Discount</th><th>Created At</th><th>Updated At</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Order Id</th><th>Product Id</th><th>Qty</th><th>Unit Price</th><th>Discount</th><th>Created At</th><th>Updated At</th></tr>";
		}
		while($ordersdetail=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"ordersdetail/show/$ordersdetail->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"ordersdetail/edit/$ordersdetail->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"ordersdetail/confirm/$ordersdetail->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$ordersdetail->id</td><td>$ordersdetail->order_id</td><td>$ordersdetail->medicine_id</td><td>$ordersdetail->qty</td><td>$ordersdetail->unit_price</td><td>$ordersdetail->discount</td><td>$ordersdetail->created_at</td><td>$ordersdetail->updated_at</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,order_id,medicine_id,qty,unit_price,discount,created_at,updated_at from {$tx}orders_details where id={$id}");
		$ordersdetail=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">OrdersDetail Show</th></tr>";
		$html.="<tr><th>Id</th><td>$ordersdetail->id</td></tr>";
		$html.="<tr><th>Order Id</th><td>$ordersdetail->order_id</td></tr>";
		$html.="<tr><th>Product Id</th><td>$ordersdetail->medicine_id</td></tr>";
		$html.="<tr><th>Qty</th><td>$ordersdetail->qty</td></tr>";
		$html.="<tr><th>Unit Price</th><td>$ordersdetail->unit_price</td></tr>";
		$html.="<tr><th>Discount</th><td>$ordersdetail->discount</td></tr>";
		$html.="<tr><th>Created At</th><td>$ordersdetail->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$ordersdetail->updated_at</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
