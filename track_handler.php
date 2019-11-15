<?php

session_start();
ob_start();

require_once('Dao.php');
$dao = new Dao();

$error_message = array();
$presets = $_POST;
$sentiment = 'good';

$frstname = $presets[frstname];
$lstname = $presets[lstname];
$track_email = $presets[track_email];
$password = null;
if (isset($presets['password'])) {
    $password = hash('sha256', $presets['password']);
}

$_SESSION = array();
$_SESSION['form_data'] = $presets;
$valid = false;
$user_id = $dao->getUserID($frstname, $lstname);
$hash_pswrd = $dao->getPassword($user_id);
$reg_email = $dao->getEmail($user_id);
if ($track_email == $reg_email && $password == $hash_pswrd) {
$valid = true;
}
if ($valid) {
    $_SESSION['user_logged_in'] = true;
    $_SESSION['user_id'] = $user_id;
} else {
    $_SESSION['message'] = "Invalid username, email, or password";
    unset($_SESSION['user_id']);
}
header("Location: track_order.php");
exit;
