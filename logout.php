<?php
session_start();

unset($_SESSION['form_data']);
unset($_SESSION['user_id']);

header("Location: contact.php");
?>