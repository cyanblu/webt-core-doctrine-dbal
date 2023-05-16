<html>
<head>
    <title>USARPS Championship</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
<h1>USARPS Championship</h1>
<h2>Tournament Name: Sample Tournament</h2>
<h2>Date: May 16, 2023</h2>

<table>
    <tr>
        <th>Player</th>
        <th>Symbol</th>
        <th>Date and Time</th>
    </tr>
    <?php
    // Database connection
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "your_database";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve game rounds from the database
    $sql = "SELECT player, symbol, date_time FROM game_rounds";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["player"] . "</td><td>" . $row["symbol"] . "</td><td>" . $row["date_time"] . "</td></tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No game rounds found</td></tr>";
    }

    $conn->close();
    ?>
</table>
</body>
</html>
