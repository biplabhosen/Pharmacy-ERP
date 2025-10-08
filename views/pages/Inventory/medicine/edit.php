<?php
echo Page::title(["title"=>"Edit Medicine"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"medicine", "text"=>"Manage Medicine"]);
echo Page::context_open();
echo Form::open(["route"=>"medicine/update"]);
	echo Form::input(["label"=>"Id","type"=>"hidden","name"=>"id","value"=>"$medicine->id"]);
	echo Form::input(["label"=>"Name","type"=>"text","name"=>"name","value"=>"$medicine->name"]);
	echo Form::input(["label"=>"Generic Name","type"=>"text","name"=>"generic_name","value"=>"$medicine->generic_name"]);
	echo Form::input(["label"=>"Img","type"=>"text","name"=>"img","value"=>"$medicine->img"]);
	echo Form::input(["label"=>"Category","name"=>"category_id","table"=>"categories","value"=>"$medicine->category_id"]);
	echo Form::input(["label"=>"Manufacturer","name"=>"manufacturer_id","table"=>"manufacturers","value"=>"$medicine->manufacturer_id"]);
	echo Form::input(["label"=>"Strength","type"=>"text","name"=>"strength","value"=>"$medicine->strength"]);
	echo Form::input(["label"=>"Unit","type"=>"text","name"=>"unit","value"=>"$medicine->unit"]);
	echo Form::input(["label"=>"Batch Number","type"=>"text","name"=>"batch_number","value"=>"$medicine->batch_number"]);
	echo Form::input(["label"=>"Expiry Date","type"=>"text","name"=>"expiry_date","value"=>"$medicine->expiry_date"]);
	echo Form::input(["label"=>"Purchase Price","type"=>"text","name"=>"purchase_price","value"=>"$medicine->purchase_price"]);
	echo Form::input(["label"=>"Selling Price","type"=>"text","name"=>"selling_price","value"=>"$medicine->selling_price"]);

echo Form::input(["name"=>"update","class"=>"btn btn-success offset-2" , "value"=>"Save Chanage", "type"=>"submit"]);
echo Form::close();
echo Page::context_close();
echo Page::body_close();
