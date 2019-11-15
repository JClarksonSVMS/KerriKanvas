<?php
session_start();
ob_start();

require_once('Dao.php');
$dao = new Dao();
$messages = $dao->getMessages();
?>

<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body class="artLog">
        <div class="bodyContainer">
            <div class="innerbody">
                <?php
                if ($_SESSION['admin_logged_in'] === true) {
                foreach ($messages as $message) {
                    $user_id = $message["user_id"];
                    $user = $dao->UserDetails($user_id);
                echo "<div class='slide'>\n<p class='msgDate'>" . $message["datetime"] . "</p>\n<p class='msgUser'>" . $user["firstname"] . " " . $user["lastname"] . ", " . $user["email"] .  "</p>\n<p class='msg'>" . $message["message"] . "</p>\n</div>\n";
                }
                } else {
                header("Location: artLog.php");
                exit;
                }
                ?>
            </div>
            <?php include 'header.php'; ?>
            <?php include 'footer.php'; ?>
        </div>
    </body>
    <script>
        // Load app.js script after document has rendered.
        var script = document.createElement('script');
        script.src = 'app.js';
        script.type = 'text/javascript';
        document.getElementsByTagName('head')[0].appendChild(script);
    </script>
</html>

