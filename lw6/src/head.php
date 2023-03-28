<?php
require_once 'User.php';
require_once 'UserService.php';
function addFormat(string $date): string
{
    $myFormat = DateTime::createFromFormat('Y-m-d', $date);
    return $myFormat->format('Y-m-d');
}
$user1 = new User('Dima', 'qwert', new DateTime(addFormat('2023-28-03')));
$user2 = new User('Andrey', '123', new DateTime(addFormat('2023-28-01')));
$list[] = $user1;
$list[] = $user2;
$service = new UserService();
var_dump($service->sortByName($list, 'up'));
var_dump($service->sortByBirthday($list, 'up'));
