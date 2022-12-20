<?php
require_once '../vendor/autoload.php';

use \pepe\lw3\Pizza;

class PapaPepperoni extends Pizza
{
    public string $name = 'Papa pepperoni';
    public string $sauce = 'philadelphia';
    public array $toppings = ['pepperoni', 'goat cheese'];

}