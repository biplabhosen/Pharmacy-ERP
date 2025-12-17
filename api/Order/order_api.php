<?php
class OrderApi
{
	public function __construct() {}
	function index()
	{
		echo json_encode(["orders" => Order::all()]);
	}
	function pagination($data)
	{
		$page = $data["page"];
		$perpage = $data["perpage"];
		echo json_encode(["orders" => Order::pagination($page, $perpage), "total_records" => Order::count()]);
	}
	function find($data)
	{
		echo json_encode(["order" => Order::find($data["id"])]);
	}
	function delete($data)
	{
		Order::delete($data["id"]);
		echo json_encode(["success" => "yes"]);
	}
	function save($data, $file = [])
	{
		$order = new Order();
		$order->sale_date = $data["sale_date"];
		$order->customer_id = $data["customer_id"];
		$order->user_id = $data["user_id"];
		$order->status_id = $data["status_id"];
		$order->delivery_date = $data["delivery_date"];
		$order->created_at = $data["created_at"];
		$order->updated_at = $data["updated_at"];

		$order->save();
		echo json_encode(["success" => "yes"]);
	}
	function update($data, $file = [])
	{
		$order = new Order();
		$order->id = $data["id"];
		$order->sale_date = $data["sale_date"];
		$order->customer_id = $data["customer_id"];
		$order->user_id = $data["user_id"];
		$order->status_id = $data["status_id"];
		$order->delivery_date = $data["delivery_date"];
		$order->created_at = $data["created_at"];
		$order->updated_at = $data["updated_at"];

		$order->update();
		echo json_encode(["success" => "yes"]);
	}

	function save_order($data)
	{
		global $now;
		// $data = $data['data'];   	for ajax
		$order = new Order();
		$order->sale_date = $now;
		$order->customer_id = $data["customer_id"];
		$order->user_id = 1;
		$order->status_id = 1;
		$order->total_amount = $data["total_amount"];
		$order->discount = $data["discount"];
		$order->net_amount = $data["net_amount"];
		$order->delivery_date = date("Y-m-d", strtotime('+3 days'));
		$order->created_at=$now;
		$order->updated_at=$now;
	

		$last_id = $order->save();

		$products = $data['products'];
		// medicine_id for axios
		// selling_price for axios
		// unit_price for ajax
		foreach ($products as $data) {
			$ordersdetail = new OrdersDetail();
			$ordersdetail->order_id = $last_id;
			$ordersdetail->medicine_id = $data["medicine_id"];
			$ordersdetail->qty = $data["qty"];
			$ordersdetail->unit_price = $data["selling_price"];
			$ordersdetail->created_at = $now;
			$ordersdetail->updated_at = $now;
			$ordersdetail->save();

			$stock = new Stock();
		// medicine_id
			$stock->medicines_id = $data["medicine_id"];
			$stock->qty = $data["qty"];
			$stock->transection_type_id = 2;
			$stock->reference_id=$last_id;
			$stock->werehouse_id = 2;
			$stock->created_at=$now;
			$stock->updated_at=$now;
			// $stock->save();
			$res=$stock->sell();
			
		}



		echo json_encode(["success"=> 1,"sell_id"=>$last_id]);
	}


	function save_orderFront($data)
	{
		global $now;
		$customerdata=$data["customer"];
		$customer=new Customer();
		$customer->name=$customerdata["name"];
		$customer->phone=$customerdata["phone"];
		$customer->email=$customerdata["email"];
		$customer->address=$customerdata["address"];
		$customer->created_at= $now;
		$customer_id = $customer->save();

		// $data = $data['data'];   	for ajax
		$order = new Order();
		$order->sale_date = $now;
		$order->customer_id = $customer_id;
		$order->user_id = 1;
		$order->status_id = 1;
		$order->total_amount = $data["total"];
		// $order->discount = $data["discount"];
		// $order->net_amount = $data["net_amount"];
		$order->delivery_date = date("Y-m-d", strtotime('+3 days'));
		$order->created_at=$now;
		$order->updated_at=$now;
	

		$last_id = $order->save();

		$products = $data['items'];
		// medicine_id for axios
		// selling_price for axios
		// unit_price for ajax
		foreach ($products as $data) {
			$ordersdetail = new OrdersDetail();
			$ordersdetail->order_id = $last_id;
			$ordersdetail->medicine_id = $data["product_id"];
			$ordersdetail->qty = $data["quantity"];
			$ordersdetail->unit_price = $data["price"];
			$ordersdetail->created_at = $now;
			$ordersdetail->updated_at = $now;
			$ordersdetail->save();

			$stock = new Stock();
		// medicine_id
			$stock->medicines_id = $data["product_id"];
			$stock->qty = $data["quantity"];
			$stock->transection_type_id = 2;
			$stock->reference_id=$last_id;
			$stock->werehouse_id = 2;
			$stock->created_at=$now;
			$stock->updated_at=$now;
			// $stock->save();
			$res=$stock->sell();
			
		}



		echo json_encode(["success"=> 1,"order_id"=>$last_id]);
	}
}
