<?php
session_start();
require_once('Dao.php');
$dao = new Dao();
$images = $dao->getImages();
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
    <body class="artLog">
        <div class="bodyContainer">
            <div class="innerbody">
                <?php
                foreach ($images as $image) {
                    if ($image["image_id"] % 2 != 0) {
                        echo "<div class='slide'>\n<img src='" . $image["image"] . "'  alt='" . $image["alternate"] . "' />\n<p class='slidetext'>" . $image["entry"] . "</p>\n</div>\n";
                    } else {
                        echo "<div class='slide'>\n<p class='slidetext'>" . $image["entry"] . "</p>\n<img src='" . $image["image"] . "' alt='" . $image["alternate"] . "' />\n</div>\n";
                    }
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