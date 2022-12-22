<?php
require_once 'animal.php';

class Predator extends Animal
{
    function __construct(string $animal, string $walk, string $placeOfResidence)
    {
        $this->animal = $animal;
        $this->placeOfResidence = $placeOfResidence;
        $this->walk = $walk;
    }

    function meal(int $weight): string
    {
        return $this->animal . ' needs ' . ($weight / 4) . ' kg of meat' . "\n";
    }
}