<?php
session_start();
//echo print_r($_SESSION, 1);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Kerri's Kanvas</title>
        <meta name="author" content="Jerry Clarkson" />
        <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet"> 
        <link href="style.css" rel="stylesheet">
        <link href="header.css" rel="stylesheet">
        <link rel="icon" href="images/KKIcon16.png" type="image/png" sizes="32x32"> 
    </head>
    <body class="artLog">
        <div class="bodyContainer">
            <div class="innerbody">
            <?php
            if ($login_error_message != "") {
                echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
            }
            ?>
                <form id="login" action="login_handler.php" method="post">
                    <label id="uname" for="username">User Name:</label>
                    <input type="text" name="username">
                    <label id="pword" for="password">Password</label>
                    <input type="password" name="password">
                    <input type="submit" name="submitUser" value="Submit">
                </form>
                <form id="logEntry" name="logEntry"  action="artLogEntry_handler.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileLoad">
                    <input type="text" name ="alternate">
                    <textarea name="description" placeholder="Describe the new artwork. Paragraphs may be used. This form will be hidden and password protected by the username / password form on this page. Only one form will appear on this page at any one time."></textarea>
                    <input type="submit" name="submitBlog" value="Submit">
                </form>
            </div>  
            <?php include 'header.php'; ?>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>