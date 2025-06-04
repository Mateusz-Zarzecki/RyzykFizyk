<?php
    require_once "dbconnect.php";
    initData();
    addUsers($_POST['playerCount']);
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryzyk Fizyk</title>
</head>
<body>
    <?php
        fetchQuestion()
    ?>
</body>
</html>