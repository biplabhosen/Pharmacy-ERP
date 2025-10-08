<?php
echo Page::title(["title"=>"Edit Order"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"order", "text"=>"Manage Order"]);
echo Page::context_open();
echo Form::open(["route"=>"order/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$order->id"]);
	echo Form::input(["label"=>"Sale Date","type"=>"date","name"=>"sale_date","value"=>"$order->sale_date"]);
	echo Form::input(["label"=>"Customer","name"=>"customer_id","table"=>"customers","value"=>"$order->customer_id"]);
	echo Form::input(["label"=>"User","name"=>"user_id","table"=>"users","value"=>"$order->user_id"]);
	echo Form::input(["label"=>"Total Amount","type"=>"text","name"=>"total_amount","value"=>"$order->total_amount"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$order->discount"]);
	echo Form::input(["label"=>"Net Amount","type"=>"text","name"=>"net_amount","value"=>"$order->net_amount"]);
	echo Form::input(["label"=>"Status","name"=>"status_id","table"=>"status","value"=>"$order->status_id"]);
	echo Form::input(["label"=>"Delivery Date","type"=>"text","name"=>"delivery_date","value"=>"$order->delivery_date"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
