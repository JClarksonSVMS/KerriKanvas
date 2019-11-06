<?php

session_start();
ob_start();

$error_message = array();
$presets = $_POST;
$sentiment = 'good';

if (isset($presets['eid'])) {

    $email_to = "jerry@kerrikanvas.com";
    $email_subject = "Client Message from Kerri's Kanvas.";

    $first_name = $presets['fname']; // required
    $last_name = $presets['lname']; // required
    $email_from = $presets['eid']; // required
    $media = $presets['media']; // required
    $osize = $presets['osize']; // required
    $figures = $presets['figures']; // required
    $password = null;
    if (isset($presets['psswrd'])) {
        $password = $presets['psswrd'];
    }
    $address = $presets['address']; // required
    $telephone = $presets['telephone']; // required
    $billing = $presets['billing']; // required
    $photo = $presets['photo']; // required
    $message = $presets['comment'];

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $first_name)) {
        $error_message[] = 'Please start with your first name.<br />';
        unset($presets['fname']);
    }

    if (!preg_match($string_exp, $last_name)) {
        $error_message[] = 'Your last name is important.<br />';
        unset($presets['lname']);
    }

    if (!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {
        $error_message[] = 'Please check that you entered an email address correctly.<br />';
        unset($presets['eid']);
    }

    if (strlen($message) < 2) {
        $error_message[] = 'Kerri has interest in the message that you would like to send.<br />';
        unset($presets['comment']);
    }

    if (count($error_message) >= 1) {
        $_SESSION['error_messages'] = $error_message;
        $_SESSION['form_data'] = $presets;
        $_SESSION['sentiment'] = 'bad';
        header("Location: contact.php");
        exit;
    }
    unset($_SESSION['error_messages']);
    unset($_SESSION['form_data']);

    $email_message = "Form details below.\n\n";

    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "First Name: " . clean_string($first_name) . "\n";
    $email_message .= "Last Name: " . clean_string($last_name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    //$email_message .= "Telephone: ".clean_string($telephone)."\n";
    $email_message .= "Messages: " . clean_string($message) . "\n";

// create email headers
    $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    console . log("you aren't getting dao");
    require_once('Dao.php');
    console . log("1");
    $dao = new Dao();
    console . log("2");
    $dao->saveMessage($first_name, $last_name, $message, $email_from, $password);
    console . log("3");
    $_SESSION['error_messages'] = array("Your message has been posted");
    console . log("4");
    $_SESSION['sentiment'] = 'good';
    console . log("5");
    header("Location: contact.php");
    console . log("6");
    exit;
//Check user name
//Check user password
//Register user w/w/o password
}