<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "ryzykfizyk";

    function connectDB() {
        $conn = new mysqli($host, $user, $pass, $db);
        if($conn->connect_error) {
            die("Error " . $conn->connect_error);
        }
        return $conn;
    }
    function addUsers($userCount) {
        $_SESSION['userCount'] = $userCount;
        $_SESSION['usersMoney'] = array();
        for($i; $i<$userCount; $i++) {
            $_SESION['usersMoney'][$i] = 200;
        }
    }
    function fetchQuestion($questionId) {
        $conn = connectDB();
        $query = "SELECT Tresc FROM pytania WHERE IdPytania = $questionId";
        $response = $conn->query($query);

        if($response->num_rows > 0) {
            $row = $response->fetch_assoc();
            return $row['Tresc'];
        } else {
            return "No Question";
        }
    }
    function enterAnswear($answear, $user) {
        if(!isset($_POST['answears'])) {
            $_POST['answears'] = array();
        }
        else {
            $_POST['answears'][$user] = $answear;
        }
    }
    function confirmAnswear($confirmendAnswear, $user, $money) {
        if(!isset($_POST['confirmedAnswears'])) {
            $_POST['confirmedAnswears'] = array();
        }
        else {
            if(isset($_POST['answears'][])) {
                foreach ($_POST['answears'] as $userOfAnswear=>$answear) {
                    if($_POST['answears'][$userOfAnswear] == $confirmendAnswear) {
                        if($money > $_SESSION['usersMoney'][$user]) {
                            //throw
                        } 
                        else if($money < 0) {
                            //throw
                        }
                        $_POST['confirmedAnswears'][] = array('answear' => $confirmendAnswear, 'user' => $user, 'money' => $money, 'userOfAnswear' => $userOfAnswear);
                        $_SESSION['usersMoney'][$user] -= $money;
                    }
                }
            }
        }
    }
    function fetchCorrectAnswear($questionId) {
        $conn = connectDB();
        $query = "SELECT PrawidlowaOdp FROM pytania WHERE IdPytania = $questionId";
        $response = $conn->query();

        if($response->num_rows > 0) {
            $row = $response->fetch_assoc();
            return $row['PrawidlowaOdp'];
        } else {
            return "No Correct Answear";
        }
    }
    function closestAnswear($confirmedAnswears, $correctAnswear) {
        sort($confirmedAnswears);
        for($i=0;$i<sizeof($confirmedAnswears);$i++) {
            if($confirmedAnswears[$i]['answear'] <= $correctAnswear) {
                return $confirmedAnswears[$i];
            }
        }
        return array();
    }
    function rewardUser($correctAnswear) {
        $reward = $correctAnswear['money'];
        if($correctAnswear['userOfAnswear'] == $correctAnswear['user']) {
            $reward += $correctAnswear['money'];
        }
        $_SESSION['usersMoney'][$correctAnswear['user']] += $reward;
    }
?>