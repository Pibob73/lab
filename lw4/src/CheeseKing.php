<?php
require_once '../vendor/autoload.php';

use \pepe\lw3\Pizza;

class CheeseKing extends Pizza
{
    public string $name = 'Cheese King';
    public string $sauce = 'Teriyaki';
    public array $toppings = ['double roquefort', 'Egg boiled'];
}