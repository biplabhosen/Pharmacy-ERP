<?php
echo Page::title(["title"=>"Show Medicine"]);
echo Page::body_open();
echo Html::link(["class"=>"btn btn-success", "route"=>"medicine", "text"=>"Manage Medicine"]);
echo Page::context_open();
echo Medicine::html_row_details($id);
echo Page::context_close();
echo Page::body_close();
