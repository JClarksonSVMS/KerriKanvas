<?php

session_start();
ob_start();

$error_message = array();
$error_code = array();
$presets = array();
$presets = $_POST;
$sentiment = 'good';
unset($_SESSION['msg_send_up']);
unset($_SESSION['order_up']);
unset($_SESSION['error_messages']);
unset($_SESSION['form_data']);

$email_to = "jerry@kerrikanvas.com";
$string_exp = "/^[A-Za-z .'-]+$/";

$first_name = $presets['first_name']; // required
$last_name = $presets['last_name']; // required
$email_from = $presets['email']; // required
$media = $presets['mediatype']; // required
$osize = $presets['size']; // required
$figures = $presets['people']; // required
$address = $presets['address']; // required
$telephone = $presets['telephone']; // required
$billing = $presets['billing']; // required
$photo = $presets['photo']; // required
$message = $presets['message'];
$comment = $presets['comment'];
$password = $presets['password'];
$msg_send = $presets['msg_send'];
$order = $presets['order'];

if (!preg_match($string_exp, $first_name)) {
    $error_code[] = '1';
    $error_message[] = 'Please start with your first name.<br />';
    unset($presets['first_name']);
}

if (!preg_match($string_exp, $last_name)) {
    $error_code[] = '2';
    $error_message[] = 'Your last name is important.<br />';
    unset($presets['last_name']);
}

if (!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {
    $error_code[] = '3';
    $error_message[] = 'Please check that you correctly entered an email address.<br />';
    unset($presets['email']);
}

if (isset($_POST['msg_send'])) {

    $_SESSION['msg_send_up'] = true;

    if (strlen($message) < 2 && preg_match($string_exp, $message)) {
        $error_code[] = '4';
        $error_message[] = 'Kerri has interest in the message that you would like to send.  Your message may have been missing or contained symbol characters that are not allowed.<br />';
        unset($presets['message']);
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

    $email_subject = "Client Message from Kerri's Kanvas.";
    $email_message = "Form details below.\n\n";

    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "First Name: " . clean_string($first_name) . "\n";
    $email_message .= "Last Name: " . clean_string($last_name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "Messages: " . clean_string($message) . "\n";

// create email headers
    $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    $clean_message = strip_tags($message);
    $message = htmlentities($clean_message, ENT_QUOTES, 'UTF-8');

    require_once('Dao.php');
    $dao = new Dao();
    $dao->saveMessage($first_name, $last_name, $message, $email_from, $password);
    header("Location: contact.php");
    exit;
} elseif ($_POST['order']) {

    $_SESSION['order_up'] = true;

    if (empty($media)) {
        $error_code[] = '5';
        $error_message[] = 'What type of art media would you like for this work?<br />';
        unset($presets['mediatype']);
    }

    if (empty($osize)) {
        $error_code[] = '6';
        $error_message[] = 'How large would you like your artwork?<br />';
        unset($presets['size']);
    }

    if (empty($figures)) {
        $error_code[] = '7';
        $error_message[] = 'How many people or animals should appear in your piece?<br />';
        unset($presets['people']);
    }

    if (empty($address)) {
        $error_code[] = '8';
        $error_message[] = 'Please include your mailing address.<br />';
        unset($presets['address']);
    }

    $filter_phone = filter_var($telephone, FILTER_SANITIZE_NUMBER_INT);
    $phone_stripd = str_replace("-", "", $filter_phone);
    if (strlen($phone_stripd) < 10 || strlen($phone_stripd) > 14) {
        $error_code[] = '9';
        $error_message[] = 'Please add a telephone number in the format 555-555-5555.  International phone number are also allowed.<br />';
        unset($presets['telephone']);
    }

    if (!preg_match($string_exp, $billing)) {
        $error_code[] = '10';
        $error_message[] = 'How would you like to pay for your order?<br />';
        unset($presets['billing']);
    }

    if (isset($_FILES['photo'])) {
        $errors = array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['photo']['name'])));

        $extensions = array("jpeg", "jpg", "png");
        $path = "clientPhotos/" . $file_name;

        if (in_array($file_ext, $extensions) === false) {
            $error_code[] = '11';
            $error_message[] = $_FILES['photo']['name'] . "Please choose a JPEG, or PNG photo file (*.jpeg, *.jpg, or *.png file types).";
        }

        if ($file_size > 2097152) {
            $error_code[] = '11';
            $error_message[] = 'Photo file size must be no more than 2 MB';
        }
    } else {
        $error_code[] = '11';
        $error_message[] = 'Photo file was not loaded.';
    }

    if (strlen($comment) < 2 && preg_match($string_exp, $comment)) {
        $error_code[] = '12';
        $error_message[] = 'Kerri would like to know if you have any special instructions or a comment.  Your message may have been missing or contained symbol characters that are not allowed.<br />';
        unset($presets['comment']);
    }

    if (count($error_message) >= 1) {
        $error_code[] = '11';
        $error_code[] = '6';
        $error_message[] = 'Please re-enter the photo file for painting. You will also need to reset the size for the painting.';
        $_SESSION['error_messages'] = $error_message;
        $_SESSION['form_data'] = $presets;
        $_SESSION['sentiment'] = 'bad';
        header("Location: contact.php");
        exit;
    }

    unset($_SESSION['error_messages']);
    unset($_SESSION['form_data']);

    $email_subject = "Order from Kerri's Kanvas.";

    function clean_string($string) {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "First Name: " . clean_string($first_name) . "\n";
    $email_message .= "Last Name: " . clean_string($last_name) . "\n";
    $email_message .= "Email: " . clean_string($email_from) . "\n";
    $email_message .= "Address: " . clean_string($address) . "\n";
    $email_message .= "Telephone: " . clean_string($telephone) . "\n";
    $email_message .= "Messages: " . clean_string($comment) . "\n";

// create email headers
    $headers = 'From: ' . $email_from . "\r\n" .
            'Reply-To: ' . $email_from . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);

    if (empty($error_message) == true) {
        move_uploaded_file($file_tmp, $path);
    }

    $message = $comment;
    $clean_message = strip_tags($message);
    $message = htmlentities($clean_message, ENT_QUOTES, 'UTF-8');
    require_once('Dao.php');
    $dao = new Dao();
    $dao->saveOrder($first_name, $last_name, $email_from, $password, $media, $osize, $figures, $path, $billing, $message);
    header("Location: contact.php");
    exit;
}
