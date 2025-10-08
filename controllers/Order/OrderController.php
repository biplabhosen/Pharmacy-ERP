<?php
class OrderController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Order");
	}
	public function create(){
		view("Order");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["net_amount"])){
		$errors["net_amount"]="Invalid net_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["delivery_date"])){
		$errors["delivery_date"]="Invalid delivery_date";
	}

*/
		if(count($errors)==0){
			$order=new Order();
		$order->sale_date=date("Y-m-d",strtotime($data["sale_date"]));
		$order->customer_id=$data["customer_id"];
		$order->user_id=$data["user_id"];
		$order->total_amount=$data["total_amount"];
		$order->discount=$data["discount"];
		$order->net_amount=$data["net_amount"];
		$order->status_id=$data["status_id"];
		$order->created_at=$now;
		$order->updated_at=$now;
		$order->delivery_date=$data["delivery_date"];

			$order->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Order",Order::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["customer_id"])){
		$errors["customer_id"]="Invalid customer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["user_id"])){
		$errors["user_id"]="Invalid user_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["net_amount"])){
		$errors["net_amount"]="Invalid net_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["status_id"])){
		$errors["status_id"]="Invalid status_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["delivery_date"])){
		$errors["delivery_date"]="Invalid delivery_date";
	}

*/
		if(count($errors)==0){
			$order=new Order();
			$order->id=$data["id"];
		$order->sale_date=date("Y-m-d",strtotime($data["sale_date"]));
		$order->customer_id=$data["customer_id"];
		$order->user_id=$data["user_id"];
		$order->total_amount=$data["total_amount"];
		$order->discount=$data["discount"];
		$order->net_amount=$data["net_amount"];
		$order->status_id=$data["status_id"];
		$order->created_at=$now;
		$order->updated_at=$now;
		$order->delivery_date=$data["delivery_date"];

		$order->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Order");
	}
	public function delete($id){
		Order::delete($id);
		redirect();
	}
	public function show($id){
		view("Order",Order::find($id));
	}
}
?>
