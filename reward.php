<?php
    require_once "dbconnect.php";

    $usersLeft = $_POST['usersLeft'];
    $confirmedAnswears = $_POST['confirmedAnswears'];
    $answears = $_POST['answears'];
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ryzyk Fizyk</title>
</head>
<body>
    <h1>Pytanie: 
        <?php $questionId = randomQuestionId(); 
            $question = fetchQuestion($questionId);
            echo $question['Tresc'];
        ?>
    </h1> 
    <h1>Prawidłowa Odpowiedź: 
        <?php $correctAnswear = 
            $answear = closestAnswear($confirmedAnswears, $answears);
        ?>
    </h1>   
    <?php
    
    ?>
</body>
</html>