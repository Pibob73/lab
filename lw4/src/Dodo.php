<?php
require_once 'PapaPepperoni.php';
require_once 'BigBoss.php';
require_once 'CheeseKing.php';
require_once '../vendor/autoload.php';

use \pepe\lw3\PizzaStore;

class Dodo extends PizzaStore
{
    public function createPizza($type)
    {
        return new $type();
    }
}