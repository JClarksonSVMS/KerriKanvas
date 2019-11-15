<?php

session_start();
 ob_start();

$error_message = array();
$presets = $_POST;
$sentiment = 'good';

if ($_SESSION['admin_logged_in'] === true) {

//    if (isset($_FILES['photo'])) {
        $error_message = array();
        $file_name = $_FILES['fileLoad']['name'];
        $file_size = $_FILES['fileLoad']['size'];
        $file_tmp = $_FILES['fileLoad']['tmp_name'];
        $file_type = $_FILES['fileLoad']['type'];

        $file_ext = strtolower(end(explode('.', $_FILES['fileLoad']['name'])));

        $extensions = array("jpeg", "jpg", "png");

        $path = "images/" . $file_name;
//        if (file_exists($path)) {
//            $error_message[] = 'Photo file already exists on the file server.';
//        }
//        if ($size < 2097152) {
//            $error_message[] = 'Photo file size must be no more than 2 MB';
//        }
//        if (in_array($file_ext, $extensions) == false) {
//            $error_message[] = "Please choose a JPEG, or PNG photo file (*.jpeg, *.jpg, or *.png file types).";
//        }
//    } else {
//        $error_message[] = 'Photo file was not loaded.';
//    }

//    if (empty($error_message) == true) {
        move_uploaded_file($file_tmp, $path);

        $img_alt = $presets[alternate];
        $imgText = $presets[description];

        require_once('Dao.php');
        $dao = new Dao();
        $dao->saveImageBlog($path, $img_alt, $imgText);

        $_SESSION['error_messages'] = array("Your message has been posted");
        $_SESSION['sentiment'] = 'good';
    header("Location: artLogEntry.php");
    exit;
} else {
    header("Location: artLog.php");
    exit;
}