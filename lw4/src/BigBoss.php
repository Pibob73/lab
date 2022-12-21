<?php
require_once '../vendor/autoload.php';

use \pepe\lw3\Pizza;

class BigBoss extends Pizza
{
    public string $name = 'Big boss';
    public string $sauce = 'cheese';
    public array $toppings = ['Ham', 'Egg boiled', 'soft cheese'];

}