<?php

require_once "vendor/autoload.php";


use Doctrine\DBAL\DriverManager;

//..
$connectionParams = [
    'dbname' => 'mysql',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);

$sql = "SELECT * FROM articles";
$stmt = $conn->query($sql); // Simple, but has several drawbacks


while (($row = $stmt->fetchAssociative()) !== false) {
    echo $row['plugin'];
}