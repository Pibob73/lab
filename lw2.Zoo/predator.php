<?php
require_once 'animal.php';

class predator extends animal
{
    function __construct(string $animal, string $walk, string $placeOfResidence)
    {
        $this->animal = $animal;
        $this->placeOfResidence = $placeOfResidence;
        $this->Walk = $walk;
    }

    function meal(int $weight): string
    {
        return $this->animal . ' needs ' . ($weight / 4) . ' kg of meat' . "\n";
    }
}