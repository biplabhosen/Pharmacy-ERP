<?php
class MedicineApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["medicines"=>Medicine::all()]);
	}
	function category(){
		echo json_encode(["category"=>Category::getAll()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["medicines"=>Medicine::pagination($page,$perpage),"total_records"=>Medicine::count()]);
	}
	function find($data){
		echo json_encode(["medicine"=>Medicine::find($data["id"])]);
	}
	function delete($data){
		Medicine::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
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
		$medicine->created_at=$data["created_at"];
		$medicine->updated_at=$data["updated_at"];

		$medicine->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
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
		$medicine->created_at=$data["created_at"];
		$medicine->updated_at=$data["updated_at"];

		$medicine->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
