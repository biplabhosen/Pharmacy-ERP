<?php
class CategoryController{

    function __construct()
    {
        
    }

    function index(){
        $data=Category::getAll();
        view("Inventory",$data);
    }


    function add(){
        view("Inventory");
    }

    function save($data){
        if (isset($_POST['create'])) {
            $name=$_POST['name'];

            $category=new Category(null,$name);
            $category->save();
            redirect();
        }
    }

    static function delete($id){
        Category::delete($id);
        redirect();

    }
    
    static function edit($id){
        $category=Category::find($id);
        view("Inventory",$category);

    }

    function update($data){
        print_r($data);
        if (isset($_POST['update'])) {
            $id=$_POST['id'];
            $name=$_POST['name'];

            $category=new Category($id,$name);
            $category->update();
            redirect();
        }
    }


}
?>