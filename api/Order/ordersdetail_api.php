<?php
class OrdersDetailApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["orders_details"=>OrdersDetail::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["orders_details"=>OrdersDetail::pagination($page,$perpage),"total_records"=>OrdersDetail::count()]);
	}
	function find($data){
		echo json_encode(["ordersdetail"=>OrdersDetail::find($data["id"])]);
	}
	function delete($data){
		OrdersDetail::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$ordersdetail=new OrdersDetail();
		$ordersdetail->order_id=$data["order_id"];
		$ordersdetail->medicine_id=$data["medicine_id"];
		$ordersdetail->qty=$data["qty"];
		$ordersdetail->unit_price=$data["unit_price"];
		$ordersdetail->created_at=$data["created_at"];
		$ordersdetail->updated_at=$data["updated_at"];

		$ordersdetail->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$ordersdetail=new OrdersDetail();
		$ordersdetail->id=$data["id"];
		$ordersdetail->order_id=$data["order_id"];
		$ordersdetail->medicine_id=$data["medicine_id"];
		$ordersdetail->qty=$data["qty"];
		$ordersdetail->unit_price=$data["unit_price"];
		$ordersdetail->created_at=$data["created_at"];
		$ordersdetail->updated_at=$data["updated_at"];

		$ordersdetail->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
