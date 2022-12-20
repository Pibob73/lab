<?php
require_once 'Dodo.php';
require_once 'GoodPizza.php';

$order = new GoodPizza();
$order->orderPizza('BigBoss');
echo "\n";
$order->orderPizza('PapaPepperoni');
echo "\n";
$order->orderPizza('CheeseKing');
echo "\n";
$order = new Dodo();
$order->orderPizza('BigBoss');
echo "\n";
$order->orderPizza('PapaPepperoni');
echo "\n";
$order->orderPizza('CheeseKing');
echo "\n";