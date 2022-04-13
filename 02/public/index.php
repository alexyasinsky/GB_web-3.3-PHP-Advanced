<?php

use app\models\{Product, User, BasketItem, Order};
use app\engine\Db;

include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$db = new Db();

$product = new Product($db);


echo $product->getOne(4);
echo $product->getAll();

$user = new User($db);

echo $user->getOne(1);
echo $user->getAll();

$apple = new BasketItem($db, 1, 'apple', '', 5);
var_dump($apple);
echo $apple->getAll();

$order1 = new Order($db, 56, 142);
echo $order1->getOne($order1->id);
