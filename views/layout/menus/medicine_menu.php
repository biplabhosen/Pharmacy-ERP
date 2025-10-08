<?php
	echo Menu::item([
		"name"=>"Medicine",
		"icon"=>"nav-icon fa fa-wrench",
		"route"=>"#",
		"links"=>[
			["route"=>"medicine/create","text"=>"Create Medicine","icon"=>"far fa-circle nav-icon"],
			["route"=>"medicine","text"=>"Manage Medicine","icon"=>"far fa-circle nav-icon"],
		]
	]);
