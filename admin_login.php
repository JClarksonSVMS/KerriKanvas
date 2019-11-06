<?php

session_start();
ob_start();
echo print_r($_SESSION, 1);
require_once 'KLogger.php';
$logger = new KLogger("log.txt", KLogger::WARN);
echo print_r($_SESSION, 1);

$error_message = array();
$presets = $_POST;
$sentiment = 'good';

if (isset($presets['username'])) {
    $username = $presets['username'];
    $password = $presets['password'];

    $valid = false;
    if ($username == "kerri@kerrikanvas.com" && $password == "1357Snowy") {
        $valid = true;
    }
    $_SESSION = array();
    if ($valid) {
        $_SESSION['logged_in'] = true;
        header("Location: artLogEntry.php");
        exit;
    } else {
        $_SESSION['message'] = "Invalid username or password";
        header("Location: artLogEntry.php");
        exit;
    }
}


