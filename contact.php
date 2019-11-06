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
        <link href="style.php" rel="stylesheet">
        <link href="header.css" rel="stylesheet">
        <link rel="icon" href="images/KKIcon16.png" type="image/png" sizes="32x32">
    </head>
    <body class="order" onload="formreset()">
        <div class="bodyContainer">
            <div class="innerbody">
                <input type="button" id="write" class="contactInput" value="Write a Message" onclick="showform(1)">
                <!--onclick="showform(1)"-->
                <input type="button" id="calculate" class="contactInput" value="Calculate a Painting Price" onclick="showform(2)">
                <input type="button" id="order" class="contactInput" value="Order a Custom Painting" onclick="showform(3)">
                <div class="orderForms">
                    <form action="message_handler.php" method="post" enctype="multipart/form-data">
                        <div class="orderpart">
                            <div id="contactform">
                                <?php
                                if (isset($_SESSION['error_messages'])) {
                                    foreach ($_SESSION['error_messages'] as $message) {
                                        echo "<div class='message {$_SESSION['sentiment']}'>{$message}</div>";
                                    }
                                }
                                ?>
                                <label id="frstname" for="first_name">Your First Name</label>
                                <input value="<?php echo $_SESSION['form_data']['first_name']; ?>" type="text" id="first_name" name="first_name" placeholder="Your first name..">
                                <label id="lstname" for="last_name">Your Last Name</label>
                                <input value="<?php echo $_SESSION['form_data']['last_name']; ?>" type="text" id="last_name" name="last_name" placeholder="Your last name..">
                                <label id="eaddress" for="email">Your Email Address</label>
                                <input value="<?php echo $_SESSION['form_data']['email']; ?>" type="email" id="email" name="email" placeholder="Your Email Address">
                                <label id="pword" for="password">Password for registering and for ordering.</label>
                                <input type="password" name="password" id="password" placeholder="Your Prefered Password">
                                <label id="messagelabel" for="message">Message</label>
                                <textarea id="message" name="message" placeholder="Please write a message..." style="height:200px"><?php echo $_SESSION['form_data']['message']; ?></textarea>

                                <input type="submit" id="msg_send" name="msg_send" value="Send">
                            </div>
                            <img src="images/FlowerGirl.png" alt="Flower Girl"/>
                        </div>
                        <div class="orderpart">
                            <div id="pricing">
                                <div class="media">
                                    <select name="mediatype" id="mediatype" onchange="showsizes(this.options[this.selectedIndex].value)">
                                        <option>Media Type</option>
                                        <option value="oil">Oil on canvas</option>
                                        <option value="acrylic">Acrylic</option>
                                        <option value="water">Watercolor</option>
                                        <option value="pencil">Pencil</option>
                                    </select>
                                </div>
                                <div class="nosize" id="nosizediv">
                                    <select name="nosize" id="nosize">
                                        <option>Portrait Size</option>
                                        <option>First choose a media type for size options.</option>
                                    </select>
                                </div>
                                <div class="oilsize" id="oilsize">
                                    <select name="size" id="size">
                                        <option>Portrait Size</option>
                                        <option value="o12">12" x 16" - 30 x 40 cm</option>
                                        <option value="o16">16" x 20" - 40 x 50 cm</option>
                                        <option value="o20">20" x 24" - 50 x 60 cm</option>
                                        <option value="o24">24" x 36" - 60 x 90 cm</option>
                                        <option value="o30">30" x 40" - 75 x 100 cm</option>
                                        <option value="o36">36" x 48" - 90 x 120 cm</option>
                                    </select>
                                </div>
                                <div class="watersize" id="watersize">
                                    <select name="size" id="wsize">
                                        <option>Portrait Size</option>
                                        <option value="w9">9" x 12" - 22 x 30 cm </option>
                                        <option value="w12">12" x 16" - 30 x 40 cm</option>
                                        <option value="w16">14" x 20" - 36 x 50 cm</option>
                                        <option value="w18">18" x 24" - 44 x 60 cm</option>
                                        <option value="w20">20" x 28" - 20 x 70 cm</option>
                                    </select>
                                </div>
                                <div class="people">
                                    <select name="people" id="people">
                                        <option>No. of people or animals</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                    </select>
                                </div>
                                <div class="center" id="price">Your Price</div>
                                <input type="button"  class="contactInput" id="calcbutton" value="Calculate">
                            </div>
                            <p>A custom art portrait is a great way to commemorate a family event. Births, birthdays, promotions, graduations, engagements, weddings, anniversaries, retirements and many other celebrations merit a commemorative portrait. These portraits become family heirlooms passed to succeeding generations. Each hand painted portrait is a unique original that increases in family value over time.</p>
                            <p>
                                Portrait pricing is based on the media - oil, acrylic, watercolor, or pencil - the portrait size, and the number of people in the portrait (a more detailed portrait). Use this calculator to estimate the cost of a portrait for your family or friends. Only large oil portraits will accomodate six or seven people.
                            </p>
                        </div>
                        <div class="orderpart">
                            <div id="ordering">
                                <p>Please enter your first and last name, email address, and password, choose a media, size, and number of figures as well as complete the information below to order.</p>
                                <label id="address" for="address">Your Postal Address</label>
                                <input type="text" name="address" id="address" placeholder="Your billing and shipping address..">
                                <label id="phone" for="telephone">Your Telephone Number</label>
                                <input type="tel" name="telephone" id="telephone">
                                <label id="bill" for="billing">Your Billing Method</label>
                                <input type="text" name="billing" id="billing" placeholder="A check, credit card, or direct deposit.">
                                <label id="photo" for="photo">Upload a Photo</label>
                                <input type="hidden" name="MAX_FILE_SIZE" value="2097150s" />
                                <input type="file" name="photo" id="photo">
                                <label id="bill" for="comment">Add any additional message or instructions.</label>
                                <textarea name="comment" id="comment" placeholder="Your message or instructions"></textarea>
                                <input type="submit" name="order" value="Order">
                            </div>
                            <img src="images/SummersChild.png" alt="Summer's Child"/>
                        </div>
                    </form>
                </div>
            </div>
            <?php include 'header.php'; ?>
            <?php include 'footer.php'; ?>
        </div>
    </body>
    <script>
        var script = document.createElement('script');
        script.src = 'app.js';
        script.type = 'text/javascript';
        document.getElementsByTagName('head')[0].appendChild(script);
    </script>
</html>