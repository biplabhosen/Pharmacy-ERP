<?php
echo Page::title(["title"=>"Create Medicine"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"medicine", "text"=>"Manage Medicine"]);
echo Page::context_open();
echo Form::open(["route"=>"medicine/save"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name"]);
	echo Form::input(["label"=>"Generic Name","type"=>"text","name"=>"generic_name"]);
	echo Form::input(["label"=>"Img","type"=>"text","name"=>"img"]);
	echo Form::input(["label"=>"Category","name"=>"category_id","table"=>"categories"]);
	echo Form::input(["label"=>"Manufacturer","name"=>"manufacturer_id","table"=>"manufacturers"]);
	echo Form::input(["label"=>"Strength","type"=>"text","name"=>"strength"]);
	echo Form::input(["label"=>"Unit","type"=>"text","name"=>"unit"]);
	echo Form::input(["label"=>"Batch Number","type"=>"text","name"=>"batch_number"]);
	echo Form::input(["label"=>"Expiry Date","type"=>"text","name"=>"expiry_date"]);
	echo Form::input(["label"=>"Purchase Price","type"=>"text","name"=>"purchase_price"]);
	echo Form::input(["label"=>"Selling Price","type"=>"text","name"=>"selling_price"]);

echo Form::input(["name"=>"create","class"=>"btn btn-primary offset-2", "value"=>"Save", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
