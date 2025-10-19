<?php
class PurchaseController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Purchase");
	}
	public function create(){
		view("Purchase");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status"])){
		$errors["payment_status"]="Invalid payment_status";
	}

*/
		if(count($errors)==0){
			$purchase=new Purchase();
		$purchase->purchase_date=date("Y-m-d",strtotime($data["purchase_date"]));
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->total_amount=$data["total_amount"];
		$purchase->payment_status=$data["payment_status"];
		$purchase->created_at=$now;
		$purchase->updated_at=$now;

			$purchase->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Purchase",Purchase::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["supplier_id"])){
		$errors["supplier_id"]="Invalid supplier_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["total_amount"])){
		$errors["total_amount"]="Invalid total_amount";
	}
	if(!preg_match("/^[\s\S]+$/",$data["payment_status"])){
		$errors["payment_status"]="Invalid payment_status";
	}

*/
		if(count($errors)==0){
			$purchase=new Purchase();
			$purchase->id=$data["id"];
		$purchase->purchase_date=date("Y-m-d",strtotime($data["purchase_date"]));
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->total_amount=$data["total_amount"];
		$purchase->payment_status=$data["payment_status"];
		$purchase->created_at=$now;
		$purchase->updated_at=$now;

		$purchase->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Purchase");
	}
	public function delete($id){
		Purchase::delete($id);
		redirect();
	}
	public function show($id){
		view("Purchase",Purchase::find($id));
	}
}
?>
