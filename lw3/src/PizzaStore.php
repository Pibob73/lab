<?php

namespace pepe\lw3;
require_once "Pizza.php";

abstract class PizzaStore
{
    abstract protected function createPizza($type);

    public function orderPizza($type)
    {
        $pizza = $this->createPizza($type);
        echo $pizza->prepare();
        echo $pizza->cut();
    }
}