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
		$data = $data['data'];
		$order = new Order();
		$order->sale_date = $now;
		$order->customer_id = $data["customer_id"];
		$order->user_id = 1;
		$order->status_id = 1;
		$order->total_amount = $data["total_amount"];
		$order->discount = $data["discount"];
		$order->net_amount = $data["net_amount"];
		$order->delivery_date = date("Y-m-d", strtotime('+3 days'));
	

		$last_id = $order->save();

		$products = $data['products'];

		foreach ($products as $data) {
			$ordersdetail = new OrdersDetail();
			$ordersdetail->order_id = $last_id;
			$ordersdetail->medicine_id = $data["id"];
			$ordersdetail->qty = $data["qty"];
			$ordersdetail->unit_price = $data["unit_price"];
			$ordersdetail->save();

			$stock = new Stock();
			$stock->medicines_id = $data["id"];
			$stock->qty = $data["qty"]*-1;
			$stock->transection_type_id = 1;
			$stock->werehouse_id = 2;
			$stock->save();
		}



		echo json_encode(["success" => "success"]);
	}
}
