<?php
// create_product.php <name>
require_once "properties.php";
use Htlw3r\DoctrineDbal\Bullet;

$newBulletName = $argv[1];

$bullet = new Product();
$bullet->setName($newBulletName);

$entityManager->persist($bullet);
$entityManager->flush();