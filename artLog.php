<?php
session_start();
require_once('Dao.php');
$dao = new Dao();
$images = $dao->getImages();
?>

<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
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