<?php
require_once 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $player = $_SESSION['currentPlayer'];
    $chosen = intval($_POST['chosen_answer']);
    $money = intval($_POST['money']);

    if (!isset($_SESSION['confirmedAnswears'])) {
        $_SESSION['confirmedAnswears'] = array();
    }

    $_SESSION['confirmedAnswears'][] = array(
        'user' => $player,
        'answear' => $chosen,
        'userOfAnswear' => array_search($chosen, $_SESSION['answers']),
        'money' => $money
    );

    $_SESSION['usersMoney'][$player] -= $money;

    $player++;
    if ($player >= $_SESSION['userCount']) {
        $_SESSION['currentPlayer'] = 0;
        header("Location: results.php");
    } else {
        $_SESSION['currentPlayer'] = $player;
        header("Location: betting.php");
    }
    exit;
}
