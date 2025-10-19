<?php
class PurchaseApi{
	public function __construct(){
	}
	function index(){
		echo json_encode(["purchases"=>Purchase::all()]);
	}
	function pagination($data){
		$page=$data["page"];
		$perpage=$data["perpage"];
		echo json_encode(["purchases"=>Purchase::pagination($page,$perpage),"total_records"=>Purchase::count()]);
	}
	function find($data){
		echo json_encode(["purchase"=>Purchase::find($data["id"])]);
	}
	function delete($data){
		Purchase::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data,$file=[]){
		global $now;
		$purchase=new Purchase();
		$purchase->purchase_date=$now;
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->total_amount=$data["total_amount"];
		$purchase->created_at=$now;
		$purchase->updated_at=$now;

		$purchase->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data,$file=[]){
		$purchase=new Purchase();
		$purchase->id=$data["id"];
		$purchase->purchase_date=$data["purchase_date"];
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->created_at=$data["created_at"];
		$purchase->updated_at=$data["updated_at"];

		$purchase->update();
		echo json_encode(["success" => "yes"]);
	}
	function savePurchase($data){
		global $now;
		$data=$data['data'];
		$purchase=new Purchase();
		$purchase->purchase_date=$now;
		$purchase->supplier_id=$data["supplier_id"];
		$purchase->total_amount=$data["total_amount"];
		$purchase->created_at=$now;
		$purchase->updated_at=$now;

		$purchase_id=$purchase->save();

		$medicines=$data['medicines'];
		foreach ($medicines as $data) {
			$purchasedetail=new PurchaseDetail();
		$purchasedetail->purchase_id=$purchase_id;
		$purchasedetail->medicine_id=$data["id"];
		$purchasedetail->quantity=$data["qty"];
		$purchasedetail->unit_price = $data["unit_price"];
		$purchasedetail->subtotal = $data["unit_price"]*$data["qty"];
		$purchasedetail->expiry_date=date("Y-m-d", strtotime('+3 years'));
		$purchasedetail->batch_number="batch_number";
		$purchasedetail->created_at=$now;
		$purchasedetail->updated_at=$now;

		$purchasedetail->save();
		$stock=new Stock();
		$stock->medicines_id=$data["id"];
		$stock->qty=$data["qty"];
		$stock->transection_type_id=2;
		$stock->werehouse_id=2;
		$stock->created_at=$now;
		$stock->updated_at=$now;

		$stock->save();
		}



		echo json_encode(["success" => "success"]);
	}
}
?>
