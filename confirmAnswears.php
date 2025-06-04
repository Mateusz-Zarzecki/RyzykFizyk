<?php
    require_once "dbconnect.php";

    if(!isset($_POST['submit'])) {
        initData();
        addUsers($_POST['playerCount']);
        $usersLeft = $_SESSION['userCount'];
        $answears = array();
    }
    else if(isset($_POST['submit']) && $_POST['usersLeft'] == 0) {
        header("Location: confirmAnswears.php");
        die();
    }
    else {
        $usersLeft = $_POST['usersLeft'];
        $confirmedAnswears = $_POST['confirmedAnswears'];
        $confirmedAnswears = confirmAnswear($confirmedAnswears, $answears, $_POST['confirmedAnswear'], $_SESSION['userCount'] - $_POST['usersLeft']);
    }
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
    <?php
        if($usersLeft-- > 0) {
            echo "Gracz " . $_SESSION['userCount'] - $usersLeft . "<br>" .
                "Odpowiedzi do wybodu: <br>"; 
            foreach($answears as $key=>$value) {
               echo $value . "<br>"; 
            }
            echo "<input type=number id=confirmedAnswear name=confirmedAnswear>" . 
                "<input type=number id=money name=money>" . 
                "<input type=hidden id=usersLeft name=usersLeft value=$usersLeft>" .
                "<input type=hidden id=answears name=answears value=$answears>" .
                "<input type=hidden id=confirmedAnswears name=confirmedAnswears value=$confirmedAnswears>" .  
                "<input type=submit id=submit name=submit>";
        }
    ?>
</body>
</html>