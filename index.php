<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gra ryzyk-fizyk</title>
</head>
<body>
    <?php
        require_once "dbconnect.php";
        $conn = mysqli_connect($host, $user, $pass, $db) or die("Błąd połączenia!");
    ?>
<h1>Gra Ryzyk Fizyk</h1>
<select name="iloscgraczy" id="iloscgraczy">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    <option>5</option>
    <option>6</option>
    <option>7</option>
    <option>8</option>
</select>
<div>

</div>

</body>
</html>