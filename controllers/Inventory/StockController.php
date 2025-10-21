<?php
class StockController extends Controller{
	public function __construct(){
	}
	public function index(){
		
		$str=$_POST['from']?? "";
		$end=$_POST['to']?? "";
		if ($str!="" && $end!="") {
			$stock_report=Stock::stock_report_date($str,$end);
		} else {
			$stock_report=Stock::stock_report();
		}
		$stock_report= ["stock_report"=>$stock_report, "str"=>$str,"end"=>$end ];
		view("Inventory",$stock_report);
		
	}
	public function create(){
		view("Inventory");
	}
public function save($data,$file){
	if(isset($data["create"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["medicines_id"])){
		$errors["medicines_id"]="Invalid medicines_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["transection_type_id"])){
		$errors["transection_type_id"]="Invalid transection_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["werehouse_id"])){
		$errors["werehouse_id"]="Invalid werehouse_id";
	}

*/
		if(count($errors)==0){
			global $now;
			$stock=new Stock();
		$stock->medicines_id=$data["medicines_id"];
		$stock->qty=$data["qty"];
		$stock->transection_type_id=$data["transection_type_id"];
		$stock->werehouse_id=$data["werehouse_id"];
		$stock->created_at=$now;
		$stock->updated_at=$now;

			$stock->save();
		redirect();
		}else{
			 print_r($errors);
		}
	}
}
public function edit($id){
		view("Inventory",Stock::find($id));
}
public function update($data,$file){
	if(isset($data["update"])){
	$errors=[];
/*
	if(!preg_match("/^[\s\S]+$/",$data["medicines_id"])){
		$errors["medicines_id"]="Invalid medicines_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["qty"])){
		$errors["qty"]="Invalid qty";
	}
	if(!preg_match("/^[\s\S]+$/",$data["transection_type_id"])){
		$errors["transection_type_id"]="Invalid transection_type_id";
	}
	if(!preg_match("/^[\s\S]+$/",$data["werehouse_id"])){
		$errors["werehouse_id"]="Invalid werehouse_id";
	}

*/
		if(count($errors)==0){
			global $now;
			$stock=new Stock();
			$stock->id=$data["id"];
		$stock->medicines_id=$data["medicines_id"];
		$stock->qty=$data["qty"];
		$stock->transection_type_id=$data["transection_type_id"];
		$stock->werehouse_id=$data["werehouse_id"];
		$stock->created_at=$now;
		$stock->updated_at=$now;

		$stock->update();
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
		Stock::delete($id);
		redirect();
	}
	public function show($id){
		view("Inventory",Stock::find($id));
	}
}
?>
