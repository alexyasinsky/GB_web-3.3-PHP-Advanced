<?php
//Active Record

//create
$product = new Product();
$product->name = "Чай";
$product->price = 23;
$product->insert();

//read
$product->getOne(1);
$product->getAll();

//update
$product->price = 26;
$product->update();

//delete

$product->delete();