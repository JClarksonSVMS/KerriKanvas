<?php
session_start();
require_once('Dao.php');
$dao = new Dao();
$images = $dao->getImages();
$imagesb = $dao->getImages();
?>

<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body class="index">
        <div class="bodyContainer">
            <div class="innerbody innerindex">
                <div class="indx_slide slidea" id="slidea">
                    <div id="imagesa">
                        <?php
                        foreach ($images as $image) {
                            if ($image["image_id"] % 2 != 0) {
                                echo "<img class='img-slidea' src='" . $image["image"] . "'  alt='" . $image["alternate"] . "' />";
                            }
                        }
                        ?>
                    </div>
                    <div id="texta">
                        <p class='txt-slidea'>Kerri Calder Clarkson has been drawing and painting ever since her second grade teacher in Winnemucca, NV realized that Kerri loved drawing more than reading and writing. Eventually her reading and writing skills caught up with her passion for art. Kerri went on to major in Art Education at Northwest Nazarene College in Nampa, Idaho.</p>
                        <p class='txt-slidea'>Life for Kerri has been an adventure. With her husband Jerry, Kerri has lived in Idaho, Oregon, Costa Rica, Bolivia, Kansas and Texas. While enjoying the richness of each of these places Kerri has tried to capture their beauty. While living in La Paz, Bolivia, South America Kerri started doing portrait paintings for family and friends. Although Kerri can draw and paint just about any subject in any art style (skills picked up from teaching art students for many years) she best enjoys painting interesting people.</p>	
                        <p class='txt-slidea'>Besides making art Kerri also bakes the best chocolate chip cookies, breads and pies whenever the weather is cool. She spends some time each day outside enjoying the beauty of God's creation. She also keeps in touch with her college bound daughters on Facebook and spends time each day with her devoted husband , Jerry and their scruffy dog, Ivan.</p>  	
                        <p class='txt-slidea'>Kerri Clarkson's Portraits grace homes with elegance in a special way that says “Here is someone we love or here is someplace we love.</p>
                        <p class='txt-slidea'>Kerri Clarkson's Portraits help you keep alive the loving memories of someone, some pet or someplace.</p> 
                    </div>
                </div>
                <div class="indx_slide slideb" id="slideb">
                    <div id="imagesb">
                        <?php
                        foreach ($imagesb as $image) {
                            if ($image["image_id"] % 2 == 0) {
                                echo "<img class='img-slideb' src='" . $image["image"] . "'  alt='" . $image["alternate"] . "' />";
                            }
                        }
                        ?>
                    </div>
                    <div id="textb"> 	
                        <p class='txt-slideb'>Kerri enjoys sharing her love for art. She has taught art in preschools, middle schools, and high schools as well as teaching private lessons for young aspiring artist. Kerri's most enjoyable teaching assignment was in Spearville, Kansas were she taught art and yearbook for five years.</p>  	
                        <p class='txt-slideb'>Many of Kerri's personal paintings are memory paintings that capture a special place or events. Some pieces are meditation pieces that show some aspect of her Christian faith. She has done several commissions for others that include: portraits of children, portraits of beloved pets, illustrations for children's education books, business brochures, catalogs, mural projects, and school projects that are too many to name.</p> 	
                        <p class='txt-slideb'>Kerri Clarkson's Portraits are for anyone who wants to capture the special people, pets and places in their life with a unique work of art that lovingly captures their cherished images.</p>
                        <p class='txt-slideb'>Kerri Clarkson's Portraits make a wonderful gift for a special occasions such as weddings, anniversaries or birthdays. They can also be given as a special gift for holidays such as Mothers day, Father's day, or Christmas.</p>	
                        <p class='txt-slideb'>Kerri Clarkson's Portraits are done to your specifications for your special needs. Prices are designed to fit any budget. The steps to ordering a custom painting or drawing are simple to follow.</p>
                    </div>
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