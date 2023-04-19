<?php

require_once "../vendor/autoload.php";

use Doctrine\DBAL\DriverManager;

//..
$connectionParams = [
    'dbname' => 'rps',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);

$player = $conn->createQueryBuilder();
$player
    ->select('name', 'symbolPlayed')
    ->from('player');

$game = $conn->createQueryBuilder();
$game
    ->select('date', 'fk_player1', 'fk_player2')
    ->from('game');
$game->fetchAllAssociative($player);

