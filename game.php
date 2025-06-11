<?php
require_once("dbconnect.php");

// Obsługa przycisku "kolejne pytanie"
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['next_question'])) {
    $_SESSION['stage'] = 'answer';
    $_SESSION['currentPlayer'] = 0;
    $_SESSION['currentQuestionId'] = randomQuestionId();

    unset($_SESSION['answers']);
    unset($_SESSION['bets']);

    header("Location: game.php");
    exit();
}

// Pierwsze uruchomienie z index.php - przekazanie ilości graczy
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['playercount'])) {
    initData();
    $count = intval($_POST['playercount']);
    addUsers($count);
    setQuestions();
    $_SESSION['currentPlayer'] = 0;
    $_SESSION['stage'] = 'answer';
    $_SESSION['currentQuestionId'] = randomQuestionId();
    header("Location: game.php");
    exit();
}

// Sprawdzenie, czy gra została poprawnie uruchomiona
if (!isset($_SESSION['userCount']) || !isset($_SESSION['stage'])) {
    header("Location: index.php");
    exit();
}

$currentStage = $_SESSION['stage'];
$currentPlayer = $_SESSION['currentPlayer'];
$userCount = $_SESSION['userCount'];
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Ryzyk Fizyk - Odpowiedzi</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container fade-container">
        <h1>Gra Ryzyk Fizyk</h1>

        <?php
        // Etap wpisywania odpowiedzi
        if ($currentStage === 'answer') {
            // Odbiór odpowiedzi gracza
            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answear'])) {
                enterAnswear(intval($_POST['answear']), $currentPlayer);

                $currentPlayer++;
                if ($currentPlayer >= $userCount) {
                    $_SESSION['stage'] = 'bet';
                    $_SESSION['currentPlayer'] = 0;
                    header("Location: betting.php");
                    exit();
                } else {
                    $_SESSION['currentPlayer'] = $currentPlayer;
                    header("Location: game.php");
                    exit();
                }
            }

            // Wyświetlanie pytania
            $questionId = $_SESSION['currentQuestionId'];
            $questionText = fetchQuestion($questionId);
            echo "<div class='question-box'>";
            echo "<h2>Pytanie: $questionText</h2>";
            echo "</div>";

            echo "<div class='form-box'>";
            echo "<h3>Gracz " . ($currentPlayer + 1) . " / " . $userCount . " - Podaj odpowiedź liczbową:</h3>";
            echo "<form method='POST'>";
            echo "<input type='number' name='answear' required min='0' />";
            echo "<button type='submit'>Dalej</button>";
            echo "</form>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
