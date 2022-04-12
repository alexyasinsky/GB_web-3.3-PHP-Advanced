<?php


class Unit
{
    public $name;
    public $health;

    public function __construct($name = null, $health = null)
    {
        $this->name = $name;
        $this->health = $health;
    }




    public function info()
    {
        echo "Я $this->name , у меня $this->health жизней.<br>";
    }

}

class Warrior extends Unit
{

    public $damage;

    public function __construct($name = null, $health = null, $damage = null)
    {
        parent::__construct($name, $health);
        $this->damage = $damage;
    }

    public function attack(Unit $target)
    {
        $target->health -= $this->damage;
        echo "{$this->name} атаковал {$target->name} и нанес {$this->damage} урона, ";
        $target->info();
        echo "<br>";
    }

    public function info()
    {
        parent::info();
        echo "И я умею атаковать на $this->damage поинтов<br>";
    }
}

$monster = new Unit('Монстр', 50);
$monster->info();




$player = new Warrior('Конан', 100, 20);
$player->info();

$player->attack($monster);

var_dump($monster);
var_dump($player);


