<?php
class Category
{
    public $id;
    public $name;
    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    static function getAll()
    {
        global $db, $tx;

        $allcatagory = $db->query("select * from {$tx}categories");

        return $allcatagory->fetch_all(MYSQLI_ASSOC);
    }

    function save(){
        global $db, $tx;

        $data=$db->query("insert into {$tx}categories(name) values('$this->name')");
        return $data;


    }

    static function delete($id){
        global $db, $tx;

        $delete=$db->query("delete from {$tx}categories where id=$id");
        return $delete;


    }


    public static function find($id){
        global $db, $tx;

        $data=$db->query("select * from {$tx}categories where id=$id");
        return $data->fetch_assoc();


    }

    function update(){
        global $db, $tx;

        $data=$db->query("update {$tx}categories set name='$this->name' where id=$this->id");
        return $data;


    }





}
?>