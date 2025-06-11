<?php
session_start();
session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryzyk Fizyk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Gra Ryzyk Fizyk</h1>
        <h2>Podaj ilość graczy</h2>

        <form action="game.php" method="POST">
            <label for="playercount">Wybierz liczbę graczy:</label>
            <select name="playercount" id="playercount" required>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
            </select>

            <button type="submit">Graj</button>
        </form>
    </div>
</body>
</html>
