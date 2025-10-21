<?php
echo Page::title(["title"=>"Edit Stock"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stock", "text"=>"Manage Stock"]);
echo Page::context_open();
echo Form::open(["route"=>"stock/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$stock->id"]);
	echo Form::input(["label"=>"Medicines","name"=>"medicines_id","table"=>"mediciness","value"=>"$stock->medicines_id"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty","value"=>"$stock->qty"]);
	echo Form::input(["label"=>"Transection Type","name"=>"transection_type_id","table"=>"transection_types","value"=>"$stock->transection_type_id"]);
	echo Form::input(["label"=>"Werehouse","name"=>"werehouse_id","table"=>"werehouses","value"=>"$stock->werehouse_id"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
