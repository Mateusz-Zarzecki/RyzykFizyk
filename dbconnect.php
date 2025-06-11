<?php
session_start();

$host = "localhost";
$user = "root";
$pass = "";
$db = "ryzykfizyk";

function initData() {
    $_SESSION['userCount'] = 0;
    $_SESSION['usersMoney'] = array();
    $_SESSION['remainingQuestions'] = array();
    $_SESSION['answers'] = array();
    $_SESSION['confirmedAnswears'] = array();
}

function connectDB() {
    global $host, $user, $pass, $db;
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Error: " . $conn->connect_error);
    }
    return $conn;
}

function addUsers($userCount) {
    $_SESSION['userCount'] = $userCount;
    $_SESSION['usersMoney'] = array();
    for ($i = 0; $i < $userCount; $i++) {
        $_SESSION['usersMoney'][$i] = 200;
    }
}

function setQuestions() {
    $conn = connectDB();
    $query = "SELECT IdPytania FROM pytania";
    $result = $conn->query($query);
    $_SESSION['remainingQuestions'] = array();

    while ($row = $result->fetch_assoc()) {
        $_SESSION['remainingQuestions'][$row['IdPytania']] = true;
    }
    $conn->close();
}

function randomQuestionId() {
    $keys = array_keys($_SESSION['remainingQuestions']);
    if (count($keys) === 0) return null;
    return $keys[array_rand($keys)];
}

function fetchQuestion($questionId) {
    $conn = connectDB();
    $query = "SELECT Tresc FROM pytania WHERE IdPytania = $questionId";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $conn->close();
        return $row['Tresc'];
    } else {
        $conn->close();
        return "Brak pytania";
    }
}

function fetchCorrectAnswear($questionId) {
    $conn = connectDB();
    $query = "SELECT PrawidlowaOdp FROM pytania WHERE IdPytania = $questionId";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $conn->close();
        return intval($row['PrawidlowaOdp']);
    } else {
        $conn->close();
        return null;
    }
}

function enterAnswear($answear, $user) {
    if (!isset($_SESSION['answers'])) {
        $_SESSION['answers'] = array();
    }
    $_SESSION['answers'][$user] = $answear;
}

function confirmAnswear($confirmendAnswear, $user, $money) {
    if (!isset($_SESSION['confirmedAnswears'])) {
        $_SESSION['confirmedAnswears'] = array();
    }

    if (!isset($_SESSION['answers'])) return;

    foreach ($_SESSION['answers'] as $userOfAnswear => $answear) {
        if ($answear == $confirmendAnswear) {
            if ($money > $_SESSION['usersMoney'][$user]) {
                return "Masz za mało pieniędzy!";
            }
            if ($money <= 0) {
                return "Nieprawidłowa kwota!";
            }

            $_SESSION['confirmedAnswears'][] = array(
                'answear' => $confirmendAnswear,
                'user' => $user,
                'money' => $money,
                'userOfAnswear' => $userOfAnswear
            );
            $_SESSION['usersMoney'][$user] -= $money;
            return "OK";
        }
    }
}


function closestAnswear($confirmedAnswears, $correctAnswear) {
    $closest = null;
    $minDiff = PHP_INT_MAX;

    foreach ($confirmedAnswears as $entry) {
        $diff = abs($entry['answear'] - $correctAnswear);
        if ($entry['answear'] <= $correctAnswear && $diff < $minDiff) {
            $minDiff = $diff;
            $closest = $entry;
        }
    }
    return $closest;
}

function rewardUser($correctAnswear) {
    if (!$correctAnswear) return;

    $reward = $correctAnswear['money'];
    if ($correctAnswear['userOfAnswear'] == $correctAnswear['user']) {
        $reward += $correctAnswear['money'];
    }
    $_SESSION['usersMoney'][$correctAnswear['user']] += $reward;
}
?>
