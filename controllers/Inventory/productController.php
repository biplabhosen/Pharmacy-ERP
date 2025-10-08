<?php
class ProductController{
    function __construct()
    {
        
    }

    function index () {
        $data=Product::getAll();
        view("inventory",$data);
    }
    function add () {
        view("inventory");
    }
    function edite () {
        view("inventory");
    }
    function delete () {
        view("inventory");
    }

    function addCatagories() {
        view("inventory");
    }

}

?>