<?php

class Product {
    private $name;
    private $price;
    private $quantity = 1;

    public function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }
}

class ProductList {

    public $products;

    public function __construct($array = []) {
        $this->products = $array;
    }


}

class Basket extends ProductList {

    public function addProduct($product) {
        array_push($this->products, $product);
    }

    public function deleteProduct($product) {
        array_splice($this->products, array_search($product, $this->products), 1);
    }
}

$apple = new Product('apple', 5);
$orange = new Product('orange', 10);
$cucumber = new Product('cucumber', 2);



$basket = new Basket();

$basket->addProduct($apple);
var_dump($basket);
$basket->addProduct($orange);
var_dump($basket);
$basket->addProduct($cucumber);
var_dump($basket);
$basket->deleteProduct($cucumber);
var_dump($basket);