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
    function enterAnswer($answear, $user) {
        if(!isset($_SESSION['answears'])) {
            $_SESSION['answears'] = array();
        }
        else {
            $_SESSION['answears'][$answear] = $user;
        }
    }
    function confirmAnswer($answear, $user) {
        if(!isset($_SESSION['confirmedAnswears'])) {
            $_SESION['confirmedAnswears'] = array();
        }
        else {
            if(isset($_SESSION['answears'][$answear])) {
                $_SESSION['confirmedAnswears'][$answer] = ($user => $_SESSION['answears'][$answear]);
            }
        }
    }
?>