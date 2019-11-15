<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
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
                    <input type="submit" name="submitUser" value="Login">
                </form>
                <form id="logEntry" name="logEntry"  action="artLogEntry_handler.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileLoad">
                    <input type="text" name ="alternate" placeholder="Title of the Artwork.">
                    <textarea name="description" placeholder="Describe the new artwork. Paragraphs may be used. This form will be hidden and password protected by the username / password form on this page. Only one form will appear on this page at any one time."></textarea>
                    <input type="submit" name="submitBlog" value="Submit">
                </form>
                <form id="messages" name="messages" action="messages_reader.php" method="post">
                    <input type="submit" name="messageReader" value="Read Messages">
                </form>
            </div>  
            <?php include 'header.php'; ?>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>