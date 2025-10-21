<?php
class Order extends Model implements JsonSerializable{
	public $id;
	public $sale_date;
	public $customer_id;
	public $user_id;
	public $total_amount;
	public $discount;
	public $net_amount;
	public $status_id;
	public $created_at;
	public $updated_at;
	public $delivery_date;

	public function __construct(){
	}
	public function set($id,$sale_date,$customer_id,$user_id,$total_amount,$discount,$net_amount,$status_id,$created_at,$updated_at,$delivery_date){
		$this->id=$id;
		$this->sale_date=$sale_date;
		$this->customer_id=$customer_id;
		$this->user_id=$user_id;
		$this->total_amount=$total_amount;
		$this->discount=$discount;
		$this->net_amount=$net_amount;
		$this->status_id=$status_id;
		$this->created_at=$created_at;
		$this->updated_at=$updated_at;
		$this->delivery_date=$delivery_date;

	}
	public function save(){
		global $db,$tx;
		$db->query("insert into {$tx}orders(sale_date,customer_id,user_id,total_amount,discount,net_amount,status_id,created_at,updated_at,delivery_date)values('$this->sale_date','$this->customer_id','$this->user_id','$this->total_amount','$this->discount','$this->net_amount','$this->status_id','$this->created_at','$this->updated_at','$this->delivery_date')");
		return $db->insert_id;
	}
	public function update(){
		global $db,$tx;
		$db->query("update {$tx}orders set sale_date='$this->sale_date',customer_id='$this->customer_id',user_id='$this->user_id',total_amount='$this->total_amount',discount='$this->discount',net_amount='$this->net_amount',status_id='$this->status_id',created_at='$this->created_at',updated_at='$this->updated_at',delivery_date='$this->delivery_date' where id='$this->id'");
	}
	public static function delete($id){
		global $db,$tx;
		$db->query("delete from {$tx}orders where id={$id}");
	}
	public function jsonSerialize():mixed{
		return get_object_vars($this);
	}
	public static function all(){
		global $db,$tx;
		$result=$db->query("select id,sale_date,customer_id,user_id,total_amount,discount,net_amount,status_id,created_at,updated_at,delivery_date from {$tx}orders");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function pagination($page=1,$perpage=10,$criteria=""){
		global $db,$tx;
		$top=($page-1)*$perpage;
		$result=$db->query("select id,sale_date,customer_id,user_id,total_amount,discount,net_amount,status_id,created_at,updated_at,delivery_date from {$tx}orders $criteria limit $top,$perpage");
		$data=[];
		while($order=$result->fetch_object()){
			$data[]=$order;
		}
			return $data;
	}
	public static function count($criteria=""){
		global $db,$tx;
		$result =$db->query("select count(*) from {$tx}orders $criteria");
		list($count)=$result->fetch_row();
			return $count;
	}
	public static function find($id){
		global $db,$tx;
		$result =$db->query("select id,sale_date,customer_id,user_id,total_amount,discount,net_amount,status_id,created_at,updated_at,delivery_date from {$tx}orders where id='$id'");
		$order=$result->fetch_object();
			return $order;
	}
	static function get_last_id(){
		global $db,$tx;
		$result =$db->query("select max(id) last_id from {$tx}orders");
		$order =$result->fetch_object();
		return $order->last_id;
	}
	public function json(){
		return json_encode($this);
	}
	public function __toString(){
		return "		Id:$this->id<br> 
		Sale Date:$this->sale_date<br> 
		Customer Id:$this->customer_id<br> 
		User Id:$this->user_id<br> 
		Total Amount:$this->total_amount<br> 
		Discount:$this->discount<br> 
		Net Amount:$this->net_amount<br> 
		Status Id:$this->status_id<br> 
		Created At:$this->created_at<br> 
		Updated At:$this->updated_at<br> 
		Delivery Date:$this->delivery_date<br> 
";
	}

	//-------------HTML----------//

	static function html_select($name="cmbOrder"){
		global $db,$tx;
		$html="<select id='$name' name='$name'> ";
		$result =$db->query("select id,name from {$tx}orders");
		while($order=$result->fetch_object()){
			$html.="<option value ='$order->id'>$order->name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function html_table($page = 1,$perpage = 10,$criteria="",$action=true){
		global $db,$tx,$base_url;
		$count_result =$db->query("select count(*) total from {$tx}orders $criteria ");
		list($total_rows)=$count_result->fetch_row();
		$total_pages = ceil($total_rows /$perpage);
		$top = ($page - 1)*$perpage;
		$result=$db->query("select id,sale_date,customer_id,user_id,total_amount,discount,net_amount,status_id,created_at,updated_at,delivery_date from {$tx}orders $criteria limit $top,$perpage");
		$html="<table class='table'>";
			$html.="<tr><th colspan='3'>".Html::link(["class"=>"btn btn-success","route"=>"order/create","text"=>"New Order"])."</th></tr>";
		if($action){
			$html.="<tr><th>Id</th><th>Sale Date</th><th>Customer Name</th><th>User Id</th><th>Total Amount</th><th>Discount</th><th>Net Amount</th><th>Status Id</th><th>Created At</th><th>Updated At</th><th>Delivery Date</th><th>Action</th></tr>";
		}else{
			$html.="<tr><th>Id</th><th>Sale Date</th><th>Customer Name</th><th>User Id</th><th>Total Amount</th><th>Discount</th><th>Net Amount</th><th>Status Id</th><th>Created At</th><th>Updated At</th><th>Delivery Date</th></tr>";
		}
		while($order=$result->fetch_object()){
			$action_buttons = "";
			if($action){
				$action_buttons = "<td><div class='btn-group' style='display:flex;'>";
				$action_buttons.= Event::button(["name"=>"show", "value"=>"Show", "class"=>"btn btn-info", "route"=>"order/show/$order->id"]);
				$action_buttons.= Event::button(["name"=>"edit", "value"=>"Edit", "class"=>"btn btn-primary", "route"=>"order/edit/$order->id"]);
				$action_buttons.= Event::button(["name"=>"delete", "value"=>"Delete", "class"=>"btn btn-danger", "route"=>"order/confirm/$order->id"]);
				$action_buttons.= "</div></td>";
			}
			$html.="<tr><td>$order->id</td><td>$order->sale_date</td><td> ". Customer::find($order->customer_id)->name ."</td><td>$order->user_id</td><td>$order->total_amount</td><td>$order->discount</td><td>$order->net_amount</td><td>$order->status_id</td><td>$order->created_at</td><td>$order->updated_at</td><td>$order->delivery_date</td> $action_buttons</tr>";
		}
		$html.="</table>";
		$html.= pagination($page,$total_pages);
		return $html;
	}
	static function html_row_details($id){
		global $db,$tx,$base_url;
		$result =$db->query("select id,sale_date,customer_id,user_id,total_amount,discount,net_amount,status_id,created_at,updated_at,delivery_date from {$tx}orders where id={$id}");
		$order=$result->fetch_object();
		$html="<table class='table'>";
		$html.="<tr><th colspan=\"2\">Order Show</th></tr>";
		$html.="<tr><th>Id</th><td>$order->id</td></tr>";
		$html.="<tr><th>Sale Date</th><td>$order->sale_date</td></tr>";
		$html.="<tr><th>Customer Id</th><td> $order->customer_id</td></tr>";
		$html.="<tr><th>User Id</th><td>$order->user_id</td></tr>";
		$html.="<tr><th>Total Amount</th><td>$order->total_amount</td></tr>";
		$html.="<tr><th>Discount</th><td>$order->discount</td></tr>";
		$html.="<tr><th>Net Amount</th><td>$order->net_amount</td></tr>";
		$html.="<tr><th>Status Id</th><td>$order->status_id</td></tr>";
		$html.="<tr><th>Created At</th><td>$order->created_at</td></tr>";
		$html.="<tr><th>Updated At</th><td>$order->updated_at</td></tr>";
		$html.="<tr><th>Delivery Date</th><td>$order->delivery_date</td></tr>";

		$html.="</table>";
		return $html;
	}
}
?>
