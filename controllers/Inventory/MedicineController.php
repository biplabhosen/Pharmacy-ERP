<?php
class MedicineController extends Controller{
	public function __construct(){
	}
	public function index(){
		view("Inventory");
	}
	public function create(){
		view("Inventory");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtGenericName"])){
		$errors["generic_name"]="Invalid generic_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtImg"])){
		$errors["img"]="Invalid img";
	}
	if(!preg_match("/^[\s\S]+$/",$data["category_id"])){
		$errors["category_id"]="Invalid category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["manufacturer_id"])){
		$errors["manufacturer_id"]="Invalid manufacturer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtStrength"])){
		$errors["strength"]="Invalid strength";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtUnit"])){
		$errors["unit"]="Invalid unit";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBatchNumber"])){
		$errors["batch_number"]="Invalid batch_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["expiry_date"])){
		$errors["expiry_date"]="Invalid expiry_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_price"])){
		$errors["purchase_price"]="Invalid purchase_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["selling_price"])){
		$errors["selling_price"]="Invalid selling_price";
	}

*/
		if(count($errors)==0){
			$medicine=new Medicine();
		$medicine->name=$data["name"];
		$medicine->generic_name=$data["generic_name"];
		$medicine->img=$data["img"];
		$medicine->category_id=$data["category_id"];
		$medicine->manufacturer_id=$data["manufacturer_id"];
		$medicine->strength=$data["strength"];
		$medicine->unit=$data["unit"];
		$medicine->batch_number=$data["batch_number"];
		$medicine->expiry_date=$data["expiry_date"];
		$medicine->purchase_price=$data["purchase_price"];
		$medicine->selling_price=$data["selling_price"];
		$medicine->created_at=$now;
		$medicine->updated_at=$now;

			$medicine->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Inventory",Medicine::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$_POST["txtName"])){
		$errors["name"]="Invalid name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtGenericName"])){
		$errors["generic_name"]="Invalid generic_name";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtImg"])){
		$errors["img"]="Invalid img";
	}
	if(!preg_match("/^[\s\S]+$/",$data["category_id"])){
		$errors["category_id"]="Invalid category_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["manufacturer_id"])){
		$errors["manufacturer_id"]="Invalid manufacturer_id";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtStrength"])){
		$errors["strength"]="Invalid strength";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtUnit"])){
		$errors["unit"]="Invalid unit";
	}
	if(!preg_match("/^[\s\S]+$/",$_POST["txtBatchNumber"])){
		$errors["batch_number"]="Invalid batch_number";
	}
	if(!preg_match("/^[\s\S]+$/",$data["expiry_date"])){
		$errors["expiry_date"]="Invalid expiry_date";
	}
	if(!preg_match("/^[\s\S]+$/",$data["purchase_price"])){
		$errors["purchase_price"]="Invalid purchase_price";
	}
	if(!preg_match("/^[\s\S]+$/",$data["selling_price"])){
		$errors["selling_price"]="Invalid selling_price";
	}

*/
		if(count($errors)==0){
			$medicine=new Medicine();
			$medicine->id=$data["id"];
		$medicine->name=$data["name"];
		$medicine->generic_name=$data["generic_name"];
		$medicine->img=$data["img"];
		$medicine->category_id=$data["category_id"];
		$medicine->manufacturer_id=$data["manufacturer_id"];
		$medicine->strength=$data["strength"];
		$medicine->unit=$data["unit"];
		$medicine->batch_number=$data["batch_number"];
		$medicine->expiry_date=$data["expiry_date"];
		$medicine->purchase_price=$data["purchase_price"];
		$medicine->selling_price=$data["selling_price"];
		$medicine->created_at=$now;
		$medicine->updated_at=$now;

		$medicine->update();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
	public function confirm($id){
		view("Inventory");
	}
	public function delete($id){
		Medicine::delete($id);
		redirect();
	}
	public function show($id){
		view("Inventory",Medicine::find($id));
	}
}
?>
