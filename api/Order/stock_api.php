<?php
class StockApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["stocks"=>Stock::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["stocks"=>Stock::pagination($page,$perpage),"total_records"=>Stock::count()]);
	}
	function find($data){
		echo json_encode(["stock"=>Stock::find($data["id"])]);
	}
	function delete($data){
		Stock::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		$stock=new Stock();
		$stock->medicines_id=$data["medicines_id"];
		$stock->qty=$data["qty"];
		$stock->transection_type_id=$data["transection_type_id"];
		$stock->werehouse_id=$data["werehouse_id"];
		$stock->created_at=$data["created_at"];
		$stock->updated_at=$data["updated_at"];

		$stock->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$stock=new Stock();
		$stock->id=$data["id"];
		$stock->medicines_id=$data["medicines_id"];
		$stock->qty=$data["qty"];
		$stock->transection_type_id=$data["transection_type_id"];
		$stock->werehouse_id=$data["werehouse_id"];
		$stock->created_at=$data["created_at"];
		$stock->updated_at=$data["updated_at"];

		$stock->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
