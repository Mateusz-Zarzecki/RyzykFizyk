<?php
require_once("dbConnect.php");
$connectDB();

if (isset($_POST['saldo'])) {
    $saldo = $_POST['saldo'];
} else {
    $saldo = 1;
}

if (isset($_POST['odpowiedz'])) {
    $odpowiedzi[] = $_POST['odpowiedz'];
}

sort($odpowiedzi);

$conn->close();
?>

<script>
        function zaglosuj (<?php $odp?>) {
            console.log("Funkcja została wywołana");
            let postawione = document.getElementById("saldo").value;

            saldotext = querySelector(#saldotext);
            <?php $saldo?> -= postawione;
            let saldotext;
            saldotext.value = postawione;

            alert("Twój głos został oddany!");
            location.reload();
        }
    </script>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Głosowanie na odpowiedź</title>
</head>
<body>
    <h2>Wybierz odpowiedź, na którą chcesz zagłosować:</h2>
    <?php 
        echo "<h3 id='saldotext'>Twoje saldo:  $saldo </h3>";
        echo "Ile chcesz postawić? <input type='number' max=$saldo name=postawione>";
    ?>

    <ul id="lista">
        <?php foreach ($odpowiedzi as $odp): ?>
            <li>
                <?php echo ($odp); ?>
                <button onclick="zaglosuj(<?php echo ($odp); ?>)">Głosuj</button>
            </li>
        <?php endforeach; ?>

    </ul>


</body>
</html>
