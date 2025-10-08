<?php
	echo Menu::item([
		"name"=>"Ordersdetail",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"ordersdetail/create","text"=>"Create Ordersdetail","icon"=>"far fa-circle nav-icon"],
			["route"=>"ordersdetail","text"=>"Manage Ordersdetail","icon"=>"far fa-circle nav-icon"],
		]
	]);
