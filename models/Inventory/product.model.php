<?php
class Product {

public $id;
public $name;
public $price;
public $offer_price;

public function __construct($id,$name,$price,$offer_price) {
    $this->id = $id;
    $this->name = $name;
    $this->price = $price;
    $this->offer_price = $offer_price;
}


static function getAll () {
global $db, $tx;

$datashow= $db->query("select * from {$tx}products");

return $datashow->fetch_all(MYSQLI_ASSOC);



}




}





?>