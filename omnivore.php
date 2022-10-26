<?php
require_once 'animal.php';
class omnivore extends animal{
function __construct(string $animal, string $walk, string $placeOfResidence){
$this->animal = $animal;
$this->placeOfResidence = $placeOfResidence;
$this->Walk = $walk;
}
function meal(int $weight): string{
return $this->animal.' needs '.($weight / 8).' kg of meat and '.($weight / 6).' kg of fruit'."\n";
}
}