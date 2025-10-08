<?php
echo Page::title(["title"=>"Edit OrdersDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"ordersdetail", "text"=>"Manage OrdersDetail"]);
echo Page::context_open();
echo Form::open(["route"=>"ordersdetail/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$ordersdetail->id"]);
	echo Form::input(["label"=>"Order","name"=>"order_id","table"=>"orders","value"=>"$ordersdetail->order_id"]);
	echo Form::input(["label"=>"Product","name"=>"medicine_id","table"=>"products","value"=>"$ordersdetail->medicine_id"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty","value"=>"$ordersdetail->qty"]);
	echo Form::input(["label"=>"Unit Price","type"=>"text","name"=>"unit_price","value"=>"$ordersdetail->unit_price"]);
	echo Form::input(["label"=>"Discount","type"=>"text","name"=>"discount","value"=>"$ordersdetail->discount"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
