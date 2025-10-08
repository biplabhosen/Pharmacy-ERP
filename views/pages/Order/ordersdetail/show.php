<?php
echo Page::title(["title"=>"Show OrdersDetail"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"ordersdetail", "text"=>"Manage OrdersDetail"]);
echo Page::context_open();
echo OrdersDetail::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
