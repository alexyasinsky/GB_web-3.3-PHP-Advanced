<?php

echo '<h1>task 3</h1>';

class A {

    public function foo() {
        static $x = 0;
        echo ++$x;
        echo '<br>';
    }
}
$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();

echo "Статическое свойство Х принадлежит методу класса объекта, а методы создаются один раз, при инициализации класса. Каждый экземпляр объекта обращается к одному и тому же методу. <br>";

echo '<h1>task 4</h1>';

class B extends A {
}

$a3 = new A();
$b1 = new B();
$a3->foo();
$b1->foo();
$a3->foo();
$b1->foo();

echo "При инициализации класса В был создан новый метод foo, несмотря на наследование. Поэтому, при вызовах методов из разных классов происходят обращения к разным статическим свойствам Х. <br>";

echo '<h1>task 5</h1>';

$a4 = new A;
$b2 = new B;
$a4->foo();
$b2->foo();
$a4->foo();
$b2->foo();

echo "Не вижу отличий от задания 4, разве что скобочки в команде инициализации экземпляров класса А и В. Но они нужны при использовании функции-конструктора, а у нас её нет <br>";

echo '<h1>task 2</h1>';

class Db
{
    protected $tableName;
    protected $where = [];
    protected $andWheres = [];

    public function table($tableName) {
        $this->tableName = $tableName;
        return $this;
    }

    public function getOne($id) {
        return "SELECT * FROM {$this->tableName} WHERE id = {$id} <br>";
    }

    public function where($field, $value) {
        $this-> where = [
            $field => $value
        ];
        return $this;
    }

    public function andWhere($field, $value) {
        $this->andWheres[] = [
            'field' => $field,
            'value' => $value
        ];
        return $this;
    }

    public function getAll() {
        $sql = "SELECT * FROM {$this->tableName}";

        if (!empty($this->where)) {
            $sql .= " WHERE " . key($this->where) . ' = ' . current($this->where);
        }

        if (!empty($this->andWheres)) {
            foreach ($this->andWheres as $value) {
                $sql .= " AND " . $value['field'] . " = " . $value['value'];
            }
        }

        return $sql . "<br>";
    }

}

$db = new Db();


echo $db->table('goods')->getAll();
echo $db->table('users')->getAll();
echo $db->table('goods')->getOne(1);
echo $db->table('user')->getOne(2);
echo $db->table('user')->where('name', 'admin')->where('session', 123)->getAll();
echo $db->table('product')->where('name', 'Alex')->andWhere('session', 123)->andWhere('id', 5)->getAll();


echo '<h1>task 1</h1>';

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

