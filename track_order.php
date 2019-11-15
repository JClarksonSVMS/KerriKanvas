<?php
session_start();
require_once('Dao.php');
$dao = new Dao();
?>

<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body class="order">
        <div class="bodyContainer">
            <div class="innerbody">
                <?php
                if ($login_error_message != "") {
                    echo '<div class="alert alert-danger"><strong>Error: </strong> ' . $login_error_message . '</div>';
                }
                ?>
                <div id="track_login" >
                <form action="track_handler.php" method="post">
                    <label id="ufname" for="frstname">Your First Name</label>
                    <input type="text" name="frstname" id="frstname" value="<?php echo $_SESSION['form_data']['frstname']; ?>">
                    <label id="ulname" for="lstname">Your Last Name</label>
                    <input type="text" name="lstname" id="lstname" value="<?php echo $_SESSION['form_data']['lstname']; ?>">
                    <label id="eaddress" for="track_email">Your Email Address</label>
                    <input value="<?php echo $_SESSION['form_data']['track_email']; ?>" type="track_email" id="email" name="track_email" id="track_email" placeholder="Your Email Address">
                    <label id="pword" for="password">Password</label>
                    <input type="password" name="password" id="password">
                    <input type="submit" name="login" value="Login">
                </form>
                <form action="logout.php" method="post"><input type="submit"  name="logOut" id="logOut" value="Log Out"></form>
                </div>

                <?php
                if ($_SESSION['user_logged_in']) {
                    $user_id = $_SESSION['user_id'];
                    $orders = $dao->getOrders($user_id);
                    foreach ($orders as $order) {
                        $message_id = $order["message_id"];
                        $message = $dao->getUserMessages($message_id);
                        echo "<div class='orders'>\n<p class='orderinfo'>Date and time: " . $order['datetime'] . ", Media: " . $order['media'] . ", Size:" . $order['size'] . ", Characters: " . $order['figure'] . ", Photo Submitted: " . $order['userphoto'] . ", Billing Method: " . $order['billing'] . ", Message Sent: " . $message['message'] . "</p>\n</div>\n";
                    }
                }
                ?>

            </div>  
            <?php include 'header.php'; ?>
            <?php include 'footer.php'; ?>
        </div>
    </body>
</html>