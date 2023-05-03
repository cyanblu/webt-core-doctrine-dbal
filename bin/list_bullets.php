<?php
// list_products.php
require_once "bootstrap.php";
use Htlw3r\DoctrineDbal\Bullet;

$bulletRepository = $entityManager->getRepository('bullet');
$bullets = $bulletRepository->findAll();

foreach ($bullets as $bullet) {
    echo sprintf("-%s\n", $bullet->getName());
}