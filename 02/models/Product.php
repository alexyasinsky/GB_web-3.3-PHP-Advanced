<?php
namespace app\models;

use app\engine\Db;

class Product extends Model
{
    public $id;
    public $name;
    public $description;
    public $price;

    public function __construct(Db $db, $id = null, $name = '', $description = '', $price = null)
    {
        parent::__construct($db);
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    protected function getTableName(): string
    {
        return 'products';
    }
}