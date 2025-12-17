<?php
class CustomerApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["customers"=>Customer::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["customers"=>Customer::pagination($page,$perpage),"total_records"=>Customer::count()]);
	}
	function find($data){
		echo json_encode(["customer"=>Customer::find($data["id"])]);
	}
	function delete($data){
		Customer::delete($data["id"]);
		echo json_encode(["success" => "deleted"]);
	}
	function save($data,$file=[]){
		global $now;
		// $data=$data["customer"];
		
		$customer=new Customer();
		$customer->name=$data["name"];
		$customer->phone=$data["phone"];
		$customer->email=$data["email"];
		$customer->photo=upload($file["photo"],"../img",$data["name"]);
		$customer->address=$data["addr"];
		$customer->created_at= $now;
		// $customer->updated_at=$data["updated_at"];

		$customer->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		global $now;
		$data=$data["customer"];
		$customer=new Customer();
		$customer->id=$data["id"];
		$customer->name=$data["name"];
		$customer->phone=$data["phone"];
		$customer->email=$data["email"];
		$customer->address=$data["addr"];
		// $customer->created_at=$data["created_at"];
		$customer->updated_at=$now;

		$customer->update();
		echo json_encode(["success" => "yes"]);
	}
}
?>
