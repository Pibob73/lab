<?php
require_once 'herbivore.php';
require_once 'omnivore.php';
require_once 'predator.php';
$cow = new Herbivore('cow', 'running', 'meadow');
$badger = new Omnivore('badger', 'running', 'hill');
$wolf = new Predator('wolf', 'running', 'forest');
echo $cow->meal(720);
echo $badger->meal(24);
echo $wolf->meal(80);