<?php

require_once "vendor/autoload.php";

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

$sql = "SELECT * FROM games";
$sql2 = "SELECT * FROM player";
$stmt = $conn->query($sql);
$stmt2 = $conn->query($sql2);

$stmt->execute();
$stmt2->execute();
$game = $stmt->fetchAll(PDO::FETCH_ASSOC);
$player = $stmt2->fetchAll(PDO::FETCH_ASSOC);

// Display game round data in HTML table
echo '<table>';
echo '<tr><th>Player</th><th>Symbol</th><th>Date and Time</th></tr>';


foreach ($game as $row) {
    foreach ($player as $symbol) {
        echo '<tr>';
        echo '<td>' . $row['fk_player1'] . '</td>';
        echo '<td>' . $row['fk_player2'] . '</td>';
        echo '</tr>';
        echo '<tr>';
        if($row['fk_player1'] == $symbol['name']) {
            echo '<td>' . $symbol['symbolPlayed'] . '</td>';
        }
        if($row['fk_player1'] == $symbol['name']) {
            echo '<td>' . $symbol['symbolPlayed'] . '</td>';
        }
        echo '</tr>';
    }
}

echo '</table>';