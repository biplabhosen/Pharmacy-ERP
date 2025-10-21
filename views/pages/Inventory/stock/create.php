<?php
echo Page::title(["title"=>"Create Stock"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"stock", "text"=>"Manage Stock"]);
echo Page::context_open();
echo Form::open(["route"=>"stock/save"]);
	echo Form::input(["label"=>"Medicines","name"=>"medicines_id","table"=>"mediciness"]);
	echo Form::input(["label"=>"Qty","type"=>"text","name"=>"qty"]);
	echo Form::input(["label"=>"Transection Type","name"=>"transection_type_id","table"=>"transection_types"]);
	echo Form::input(["label"=>"Werehouse","name"=>"werehouse_id","table"=>"werehouses"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
