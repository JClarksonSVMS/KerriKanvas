<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body class="index" onload="slideup()">
        <div class="bodyContainer">
            <!--<div id="demo">demo</div>--> 	
            <div class="innerbody">
                <div class="slide slidea" id="slidea">
                    <img src="images/WildCat.png" alt="A Cat In It's Wild" />
                    <p>Kerri Clarkson enjoys painting and drawing with watercolors, acrylics, oils, pencils, and pen &amp; ink. Kerri has taught art in Idaho, Kansas, and Texas and now teaches reading and math intervention in Nampa, Idaho.</p>
                    <p>Kerri painted this work as a study mixing opaque and non-opaque watercolors. Opaque watercolors form the base work while non-opaque watercolors allow the opaque colors to show through an overlaying shadow </p>
                    <p>Pictures and text on this page will rotate in and out after addition of JavaScript.</p>
                </div>
                <div class="slide slideb" id="slideb">
                    <img src="images/PayaCria600w.jpg" alt="Paya Cria" />
                    <p>Kerri Calder Clarkson has been drawing and painting ever since her second grade teacher in Winnemucca, NV realized that Kerri loved drawing more than reading and writing. Eventually her reading and writing skills caught up with her passion for art. Kerri went on to major in Art Education at Northwest Nazarene College in Nampa, Idaho. </p>
                </div>
                <div class="slide slidec" id="slidec">
                    <img src="images/SummersChild.png" alt="Summer's Child" />
                    <p>Kerri Calder Clarkson has been drawing and painting ever since her second grade teacher in Winnemucca, NV realized that Kerri loved drawing more than reading and writing. Eventually her reading and writing skills caught up with her passion for art. Kerri went on to major in Art Education at Northwest Nazarene College in Nampa, Idaho. </p>
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