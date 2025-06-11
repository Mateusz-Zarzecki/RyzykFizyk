<?php
require_once 'dbconnect.php';

$questionId = $_SESSION['currentQuestionId'];
$correct = fetchCorrectAnswear($questionId);
$confirmed = $_SESSION['confirmedAnswears'];

$closest = closestAnswear($confirmed, $correct);

if ($closest) {
    rewardUser($closest);
}

// Po zakończeniu rundy można wyczyścić dane
unset($_SESSION['confirmedAnswears']);
unset($_SESSION['answers']);
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ryzyk Fizyk - Wyniki</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container fade-container">
        <h1>Wyniki rundy</h1>

        <div class="result-box">
            <h2>Prawidłowa odpowiedź: <span class="highlight"><?= $correct ?></span></h2>
            <?php if ($closest): ?>
                <h3>Najbliżej: Gracz <?= $closest['userOfAnswear'] + 1 ?></h3>
                <p>Gracz <?= $closest['user'] + 1 ?> otrzymuje <strong><?= $closest['money'] * 2 ?> zł</strong>!</p>
            <?php else: ?>
                <p>Brak poprawnych obstawień.</p>
            <?php endif; ?>
        </div>

        <div class="money-list">
            <h3>Stan kont graczy:</h3>
            <ul>
                <?php foreach ($_SESSION['usersMoney'] as $index => $money): ?>
                    <li>Gracz <?= $index + 1 ?>: <?= $money ?> zł</li>
                <?php endforeach; ?>
            </ul>
        </div>

        <form method="POST" action="game.php" class="next-form">
            <input type="hidden" name="next_question" value="1">
            <button type="submit">Kolejne pytanie</button>
        </form>
    </div>
</body>
</html>
