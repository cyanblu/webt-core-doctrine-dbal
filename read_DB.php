<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
    }
</style>
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
$queryBuilderSymbol = $conn->createQueryBuilder();

$queryBuilderGame
    ->select('pk_gameID', 'date', 'player1', 'player2', 'fk_symbol1', 'fk_symbol2')
    ->from('game');

$queryBuilderSymbol
    ->select('symbolPlayed')
    ->from('symbol');

$symbols = $queryBuilderSymbol->fetchAllAssociative();
$game = $queryBuilderGame->fetchAllAssociative();


echo '<h2>RPS Game Tournament on 3rd of Mai, 2023</h2>';
echo '<table>';
echo '<tr>
    <th>Delete Entry</th>
    <th>Player 1</th>
    <th>Symbol 1</th>
    <th>Player 2</th>
    <th>Symbol 2</th>
    <th>Date and Time</th>
    <th>Winner</th>
  </tr>';
foreach ($game as $gameTable) {
    echo '<tr>';
    echo '<td><form method="post" action="' . $_SERVER['PHP_SELF'] . '">
    <input type="hidden" name="gameId" value="' . $gameTable['pk_gameID'] . '">
    <input type="submit" name="button1" value="Delete">
</form></td>';
    echo '<td>' . $gameTable['player1'] . '</td>';
    echo '<td>' . $symbols[$gameTable['fk_symbol1'] - 1]['symbolPlayed'] . '</td>';
    echo '<td>' . $gameTable['player2'] . '</td>';
    echo '<td>' . $symbols[$gameTable['fk_symbol2'] - 1]['symbolPlayed'] . '</td>';
    echo '<td>' . $gameTable['date'] . '</td>';
    echo '<td>' . gameResult($symbols[$gameTable['fk_symbol1'] - 1]['symbolPlayed'], $symbols[$gameTable['fk_symbol2'] - 1]['symbolPlayed'],
            $gameTable['player1'], $gameTable['player2']) . '</td>';
    echo '</tr>';
}
echo '</table>';
echo '<br><br>
<h1>Insert new records in Database</h1>
    <h4>You only need to write the first 2 letters of the symbols</h4>
    <form method="post" action="' . $_SERVER['PHP_SELF'] . '">
        <label for="date">Date:</label>
        <input type="datetime-local" id="date" name="date"><br><br>

        <label for="player1">Name Player 1:</label>
        <input type="text" id="player1" name="player1"><br><br>

        <label for="symbol1">Symbol played by Player 1:</label>
        <input type="text" id="symbol1" name="symbol1"><br><br>

        <label for="player2">Name Player 2:</label>
        <input type="text" id="player2" name="player2"><br><br>

        <label for="symbol2">Symbol played by Player 2:</label>
        <input type="text" id="symbol2" name="symbol2"><br><br>

        <input type="submit" name="buttonAdd" value="Add">
    </form>';
function gameResult($symbol1, $symbol2, $name1, $name2)
{
    if ($symbol1 == $symbol2) {
        return 'Draw';
    } elseif (($symbol1 == "Schere" && $symbol2 == "Papier") || ($symbol1 == "Stein" && $symbol2 == "Schere") || ($symbol1 == "Papier" && $symbol2 == "Stein")) {
        return $name2;
    } else {
        return $name1;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['button1'])) {
        $gameId = $_POST['gameId'];
        deleteGame($queryBuilderGame, $gameId);
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    } else if (isset($_POST['buttonAdd']) && ($_POST['date'] != null && $_POST['player1'] != null && $_POST['player2'] != null
            && $_POST['symbol1'] != null && $_POST['symbol2'] != null)) {
        $game = array();
        $game[] = explode("T", $_POST['date'])[0] . ' ' . explode("T", $_POST['date'])[1] . ':00';
        $game[] = $_POST['player1'];
        $game[] = $_POST['player2'];
        $game[] = $_POST['symbol1'];
        $game[] = $_POST['symbol2'];
        addGame($queryBuilderGame, $game);
        $game = array();
        unset($_POST);
        $_POST = array();
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit();
    }
}
function deleteGame($queryBuilder, $gameId)
{
    $queryBuilder
        ->delete('game')
        ->where('pk_gameID = :gameId')
        ->setParameter('gameId', $gameId)
        ->execute();
}

function addGame($queryBuilder, $game){
    if($game[3] == 'ro') {
        $game[3] = '1';
    } else if($game[3] == 'pa') {
        $game[3] = '2';
    } else if($game[3] == 'sc') {
        $game[3] = '3';
    }
    if($game[4] == 'ro') {
        $game[4] = '1';
    } else if($game[4] == 'pa') {
        $game[4] = '2';
    } else if($game[4] == 'sc') {
        $game[4] = '3';
    }
    $queryBuilder
        ->insert('game')
        ->values([
            'date' => $queryBuilder->expr()->literal($game[0]), // Wrap the value in expr()->literal() to format it correctly
            'player1' => $queryBuilder->expr()->literal($game[1]), // Wrap the value in expr()->literal() to format it correctly
            'player2' => $queryBuilder->expr()->literal($game[2]), // Wrap the value in expr()->literal() to format it correctly
            'fk_symbol1' => $game[3],
            'fk_symbol2' => $game[4],
        ])
        ->execute();


}