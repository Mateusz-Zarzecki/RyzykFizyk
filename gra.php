<?php
    if (isset($_POST['playercount'])) {
        $playercount = $_POST["playercount"];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $pytanie = "Ile dni ma rok?"; //PYTANIE POBIERANE Z BAZY DANYCH
        echo "<h1>Pytanie: ".$pytanie."</h1>"
    ?>
    <form action="" method="POST">
    <!--PRZEJŚCIE DO SEKCJI GŁOSOWANIA-->
    <?php
        for($i = 0; $i<$playercount; $i++)
        {
            echo "<input readonly hidden type='number' name='balance".$i."' value='200'><br>";
            echo "<input type='number' name='answear".$i."'><br>";
        }
    ?>
        <button type="submit">Potwierdz</button>
    </form>
</body>
</html>