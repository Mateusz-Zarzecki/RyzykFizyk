<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryzyk Fizyk</title>
</head>
<body>
    <h1>Gra Ryzyk Fizyk</h1>
    <h2>Podaj ilość graczy</h2>
    <form action="gra.php" method="POST">
        <select name="playercount">
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
        </select>
        <button type="submit">Graj</button>
    </form>

</body>
</html>