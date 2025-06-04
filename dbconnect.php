<?php
    session_start();
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "ryzykfizyk";

    function setQuestions() {
        $conn = connectDB();
        $query = "SELECT IdPytania, PrawidlowaOdp, Tresc FROM pytania";

        $response = $conn->query($query);
        while($row = $response->fetch_assoc()) {
            $_SESSION['remainingQuestions'][$row['IdPytania']] = array("PrawidlowaOdp" => $row['PrawidlowaOdp'], "Tresc" => $row['Tresc']);   
        }
    }

    function initData() {
        $_SESSION['userCount'] = array();
        $_SESSION['usersMoney'] = array();
        $_SESSION['remainingQuestions'] = array();
        setQuestions();
    }
    function connectDB() {
        global $host, $user, $pass, $db;
        $conn = new mysqli($host, $user, $pass, $db);
        if($conn->connect_error) {
            die("Error " . $conn->connect_error);
        }
        return $conn;
    }
    function addUsers($userCount) {
        $_SESSION['userCount'] = $userCount;
        $_SESSION['usersMoney'] = array();
        for($i=0; $i<$userCount; $i++) {
            $_SESION['usersMoney'][$i] = 200;
        }
    }

    function randomQuestionId() {
        $remainingAmount = sizeof($_SESSION['remainingQuestions']);
        $random = rand(0, $remainingAmount-1);
        foreach($_SESSION['remainingQuestions'] as $key=>$value) {
            if($random-- === 0) {
                return $key;
            } 
        }    
        return -1;    
    }
    function fetchQuestion($questionId) {
        return $_SESSION['remainingQuestions'][$questionId];
    }
    function enterAnswear($answears, $answear, $user) {
        $answears[$user] = $answear;
        return $answears;
    }
    function confirmAnswear($confirmedAnswears, $confirmendAnswear, $user, $money) {
        if(isset($answears)) {
            foreach ($answears as $userOfAnswear=>$answear) {
                if($answears[$userOfAnswear] == $confirmendAnswear) {
                    if($money > $_SESSION['usersMoney'][$user]) {
                        header("Location: ?info='You have no so much money'");
                        die;
                    } 
                    else if($money <= 0) {
                        header("Location: ?info='Money needs to be more than 0'");
                        die;
                    }
                    $confirmedAnswears[] = array('answear' => $confirmendAnswear, 'user' => $user, 'money' => $money, 'userOfAnswear' => $userOfAnswear);
                    $_SESSION['usersMoney'][$user] -= $money;
                }
            }
        } 
        return $confirmedAnswears;
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