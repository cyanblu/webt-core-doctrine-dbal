<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <h1>Insert new records in Database</h1>
    <h4>You may only need the first 2 letters of players and symbols</h4>
    <form action="create_del_DB.php" method="post">
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

        <input type="submit" value="Add">
    </form>
    <br>
    <br>
    <h1>Delete records in Database</h1>
    <h4>Insert the exact data like it can be found in the Database</h4>
    <form action="create_del_DB.php" method="post">
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

        <input type="submit" value="Delete">
    </form>
</body>