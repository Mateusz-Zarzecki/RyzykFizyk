<?php
    require_once "dbconnect.php";

    if(!isset($_POST['submit'])) {
        initData();
        addUsers($_POST['playerCount']);
        $usersLeft = $_SESSION['userCount'];
        $answears = array();
    }
    else if($_POST['usersLeft'] == 0) {
        header("Location: confirmAnswears.php");
        die();
    }
    else {
        $usersLeft = $_POST['usersLeft'];
        $answears = $_POST['answears'];
        $answears = enterAnswear($answears, $_POST['answear'], $_SESSION['userCount'] - $_POST['usersLeft']);
    }
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
    <?php
        if($usersLeft-- > 0) {
            echo "Gracz " . $_SESSION['userCount'] - $usersLeft . "<br>" .
                "<input type=number id=answear name=answear>" . 
                "<input type=hidden id=usersLeft name=usersLeft value=$usersLeft>" .
                "<input type=hidden id=answears name=answears value=$answears>" .  
                "<input type=submit id=submit name=submit>";
        }
    ?>
</body>
</html>