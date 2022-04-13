<?php

namespace app\models;

use app\engine\Db;

class BasketItem extends Product
{
    private $count;
    private $userId;
    private $orderId;

    public function __construct(Db $db, $id, $name, $description, $price, $count = 1, $userId = null, $orderId = null)
    {
        parent::__construct($db, $id, $name, $description, $price);
        $this->count = $count;
        $this->userId = $userId;
        $this->orderId = $orderId;
    }

    protected function getTableName(): string
    {
        return 'basket';
    }

    public function increaseCount(): int
    {
        return $this->count += 1;
    }

    public function decreaseCount(): int
    {
        return $this->count -= 1;
    }

}