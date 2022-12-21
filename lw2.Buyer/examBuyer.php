<?php
require_once 'Buyer.php';
$user1 = new Buyer();
$user2 = new Buyer();
$user3 = new Buyer();
$list[] = $user1;
$list[] = $user2;
$list[] = $user3;
$user1->setSurname('Berezov');
$user1->setName('Daniil');
$user1->setCreditCardNumber('22212343');
$user2->setSurname('Forest');
$user2->setName('Blake');
$user2->setCreditCardNumber('22234434');
$user3->setSurname('Alexandrova');
$user3->setName('Kristina');
$user3->setCreditCardNumber('22213453443');
echo $user1->getAlphabetSort($list)."\n";
echo $user1->getNumberCard($list, '43')."\n";