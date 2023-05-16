<?php


use Doctrine\DBAL\DriverManager;

require_once 'vendor/autoload.php';

//..
$connectionParams = [
    'dbname' => 'rps',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
];
$conn = DriverManager::getConnection($connectionParams);
$queryBuilderGame = $conn->createQueryBuilder();
$queryBuilderPlayer = $conn->createQueryBuilder();

$queryBuilderGame
    ->select('datum', 'fk_player1', 'fk_player2')
    ->from('game');

$queryBuilderPlayer
    ->select('name', 'symbolPlayed')
    ->from('player');

$player = $queryBuilderPlayer->fetchAllAssociative();
$game = $queryBuilderGame->fetchAllAssociative();

foreach ($player as $playerTable) {
    foreach($game as $gameTable){
        echo '<table>';
        echo '<tr>';
        echo $gameTable['fk_player1'];
        echo '</tr>';
        echo '<tr>';
        echo $playerTable['name'];
        echo '</tr>';
        echo '</table>';
    }
}