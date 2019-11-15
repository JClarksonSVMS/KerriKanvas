<?php

session_start();
ob_start();

$error_message = array();
$presets = $_POST;
$sentiment = 'good';

$username = $presets[username];
$password = $presets[password];


$valid = false;
if ($username == "kerri.clarkson@gmail.com" && $password == "1357Snowy") {
    $valid = true;
}
$_SESSION = array();
if ($valid) {
    $_SESSION['admin_logged_in'] = true;
    header("Location: artLogEntry.php");
    exit;
} else {
    $_SESSION['message'] = "Invalid username or password";
    header("Location: artLog.php");
    exit;
}