<?php
require_once 'herbivore.php';
require_once 'omnivore.php';
require_once 'predator.php';
$cow = new herbivore('cow','running','meadow');
$badger = new omnivore('badger', 'running', 'hill');
$wolf = new predator('wolf','running', 'forest');
echo $cow->meal(720);
echo $badger->meal(24);
echo $wolf->meal(80);