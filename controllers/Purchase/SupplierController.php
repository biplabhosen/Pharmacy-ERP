<?php
class SupplierController extends Controller{
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
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}

*/
		if(count($errors)==0){
			global $now;
			$supplier=new Supplier();
		$supplier->name=$data["name"];
		$supplier->phone=$data["phone"];
		$supplier->email=$data["email"];
		$supplier->address=$data["address"];
		$supplier->created_at=$now;
		$supplier->updated_at=$now;

			$supplier->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Purchase",Supplier::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtPhone"])){
		$errors["phone"]="Invalid phone";
	}
	if(!is_valid_email($data["email"])){
		$errors["email"]="Invalid email";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtAddress"])){
		$errors["address"]="Invalid address";
	}

*/
		if(count($errors)==0){
			global $now;
			$supplier=new Supplier();
			$supplier->id=$data["id"];
		$supplier->name=$data["name"];
		$supplier->phone=$data["phone"];
		$supplier->email=$data["email"];
		$supplier->address=$data["address"];
		$supplier->created_at=$now;
		$supplier->updated_at=$now;

		$supplier->update();
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
		Supplier::delete($id);
		redirect();
	}
	public function show($id){
		view("Purchase",Supplier::find($id));
	}
}
?>
