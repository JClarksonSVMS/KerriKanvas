<?php

session_start();
ob_start();

$error_message = array();
$presets = $_POST;
$sentiment = 'good';

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
$password = null;
if (isset($presets['password'])) {
    $password = password_hash($presets['password'], PASSWORD_DEFAULT);
}

if (!preg_match($string_exp, $first_name)) {
    $error_message[] = 'Please start with your first name.<br />';
    unset($presets['first_name']);
}

if (!preg_match($string_exp, $last_name)) {
    $error_message[] = 'Your last name is important.<br />';
    unset($presets['last_name']);
}

if (!filter_var($email_from, FILTER_VALIDATE_EMAIL)) {
    $error_message[] = 'Please check that you correctly entered an email address.<br />';
    unset($presets['email']);
}

if (isset($_POST['msg_send'])) {

    if (strlen($message) < 2) {
        $error_message[] = 'Kerri has interest in the message that you would like to send.<br />';
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

    require_once('Dao.php');
    echo "connection ";
    $dao = new Dao();
    echo "new Dao ";
    $dao->saveMessage($first_name, $last_name, $message, $email_from, $password);
    echo "query ";
    $_SESSION['error_messages'] = array("Your message has been posted");
    $_SESSION['sentiment'] = 'good';
    echo "session messages ";
        header("Location: contact.php");
//    header("Location: http://cs516-401project.kerrikanvas.com/contact.php");
    echo "header ";
    //exit;
    
    
} elseif ($_POST['order']) {

    if (empty($media)) {
        $error_message[] = 'What type of art media would you like for this work?<br />';
        unset($presets['mediatype']);
    }

    if (empty($osize)) {
        $error_message[] = 'How large would you like your artwork?<br />';
        unset($presets['size']);
    }

    if (empty($figures)) {
        $error_message[] = 'How many people or animals should appear in your piece?<br />';
        unset($presets['people']);
    }

    if (empty($address)) {
        $error_message[] = 'Please include your mailing address.<br />';
        unset($presets['address']);
    }

    if (empty($telephone)) {
        $error_message[] = 'We would like to contact you by telephone.<br />';
        unset($presets['telephone']);
    }

    if (!preg_match($string_exp, $billing)) {
        $error_message[] = 'How would you like to be billed?<br />';
        unset($presets['billing']);
    }

//    if (isset($_FILES['photo'])) {
        $errors = array();
        $file_name = $_FILES['photo']['name'];
        $file_size = $_FILES['photo']['size'];
        $file_tmp = $_FILES['photo']['tmp_name'];
        $file_type = $_FILES['photo']['type'];
        $file_ext = strtolower(end(explode('.', $_FILES['photo']['name'])));

        $extensions = array("jpeg", "jpg", "png");
        $path = "clientPhotos/" . $file_name;

//        if (in_array($file_ext, $extensions) === false) {
//            $error_message[] = "Please choose a JPEG, or PNG photo file (*.jpeg, *.jpg, or *.png file types).";
//        }
//
//        if ($file_size > 2097152) {
//            $error_message[] = 'Photo file size must be no more than 2 MB';
//        }
//    } else {
//        $error_message[] = 'Photo file was not loaded.';
//    }

//    if (strlen($comment) < 2) {
//        $error_message[] = 'Kerri has interest in the message that you would like to send.<br />';
//        unset($presets['comment']);
//    }

    if (count($error_message) >= 1) {
        $_SESSION['error_messages'] = $error_message;
        $_SESSION['form_data'] = $presets;
        $_SESSION['sentiment'] = 'bad';
        header("Location: contact.php");
        exit;
    }

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

    $message = $comment;
    require_once('Dao.php');
    $dao = new Dao();
    $dao->saveOrder($first_name, $last_name, $email_from, $password, $media, $osize, $figures, $path, $billing, $message);

    if (empty($error_message) == true) {
        move_uploaded_file($file_tmp, $path);
        $_SESSION['error_messages'] = array("Your message has been posted");
        $_SESSION['sentiment'] = 'good';
        header("Location: contact.php");
        exit;
    }
    exit;
}