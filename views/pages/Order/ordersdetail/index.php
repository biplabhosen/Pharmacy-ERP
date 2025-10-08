<?php
echo Page::title(["title"=>"Manage OrdersDetail"]);
echo Page::body_open();
echo Page::context_open();
$page = isset($_GET["page"]) ?$_GET["page"]:1;
echo OrdersDetail::html_table($page,10);
echo Page::context_close();
echo Page::body_close();
