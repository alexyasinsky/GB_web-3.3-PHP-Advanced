<?php

namespace app\models;

use app\engine\Db;

class Order extends Model
{
    public $id;
    public $customerId;
    public $status;

    public function __construct(Db $db, $id = null, $customerId = null, $status = 'created')
    {
        parent::__construct($db);
        $this->id = $id;
        $this->customerId = $customerId;
        $this->status = $status;

    }

    protected function getTableName(): string
    {
        return 'orders';
    }
}