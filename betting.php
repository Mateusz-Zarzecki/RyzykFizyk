<?php
require_once 'dbconnect.php';

$currentPlayer = $_SESSION['currentPlayer'];
$answers = $_SESSION['answers'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ryzyk Fizyk - Obstawianie</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container fade-container">
        <h1>Etap obstawiania</h1>
        <div class="form-box">
            <h2>Gracz <?= $currentPlayer + 1 ?></h2>
            <p>Wybierz odpowiedź jednego z graczy i postaw pieniądze.</p>

            <form method="POST" action="conf_betting.php">
                <fieldset>
                    <legend>Odpowiedzi graczy:</legend>
                    <?php foreach ($answers as $index => $ans): ?>
                        <div class="radio-option">
                            <label>
                                <input type="radio" name="chosen_answer" value="<?= $ans ?>" required>
                                <?= $ans ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </fieldset>

                <div class="money-input">
                    <p>Masz: <strong><?= $_SESSION['usersMoney'][$currentPlayer] ?> zł</strong></p>
                    <label for="money">Postaw:</label>
                    <input type="number" name="money" min="1" max="<?= $_SESSION['usersMoney'][$currentPlayer] ?>" required>
                </div>

                <button type="submit">Zatwierdź obstawienie</button>
            </form>
        </div>
    </div>
</body>
</html>
