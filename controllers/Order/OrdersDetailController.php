<?php
class OrdersDetailController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["medicine_id"])){
		$errors["medicine_id"]="Invalid medicine_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}

*/
		if(count($errors)==0){
			$ordersdetail=new OrdersDetail();
		$ordersdetail->order_id=$data["order_id"];
		$ordersdetail->medicine_id=$data["medicine_id"];
		$ordersdetail->qty=$data["qty"];
		$ordersdetail->unit_price=$data["unit_price"];
		$ordersdetail->discount=$data["discount"];
		$ordersdetail->created_at=$now;
		$ordersdetail->updated_at=$now;

			$ordersdetail->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Order",OrdersDetail::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["order_id"])){
		$errors["order_id"]="Invalid order_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["medicine_id"])){
		$errors["medicine_id"]="Invalid medicine_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["unit_price"])){
		$errors["unit_price"]="Invalid unit_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["discount"])){
		$errors["discount"]="Invalid discount";
	}

*/
		if(count($errors)==0){
			$ordersdetail=new OrdersDetail();
			$ordersdetail->id=$data["id"];
		$ordersdetail->order_id=$data["order_id"];
		$ordersdetail->medicine_id=$data["medicine_id"];
		$ordersdetail->qty=$data["qty"];
		$ordersdetail->unit_price=$data["unit_price"];
		$ordersdetail->discount=$data["discount"];
		$ordersdetail->created_at=$now;
		$ordersdetail->updated_at=$now;

		$ordersdetail->update();
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
		OrdersDetail::delete($id);
		redirect();
	}
	public function show($id){
		view("Order",OrdersDetail::find($id));
	}
}
?>
