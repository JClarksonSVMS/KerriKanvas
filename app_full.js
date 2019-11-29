$(document).ready(function () {
    $(".index").ready(function () {
        var countb = 0;
        var increment = 0.15;
        var yvalb = (100 - countb);
        var sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
        var counta = 100;
        var yvala = (100 - counta);
        var sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
        $('#slidea').css({top: (yvala + '%'), left: (sinematha + '%')});
        $('#slidea').css('opacity', counta / 100);

        var imgSlidea = $('#imagesa');
        var imagesSlidea = imgSlidea.find(".img-slidea");
        imagesSlidea.hide().first().show().addClass("active");

        var imgSlideb = $('#imagesb');
        var imagesSlideb = imgSlideb.find(".img-slideb");
        imagesSlideb.hide().first().show().addClass("active");

        var txtSlidea = $('#texta');
        var textSlidea = txtSlidea.find(".txt-slidea");
        textSlidea.hide().first().show().addClass("active");

        var txtSlideb = $('#textb');
        var textSlideb = txtSlideb.find(".txt-slideb");
        textSlideb.hide().first().show().addClass("active");

        setInterval(function () {
            countb = (countb) + increment;
            counta = (counta) + increment;
            if (countb > 300) {
                countb = 0;
                $('#slidea').css('opacity', 1);
                var next = $(".img-slideb.active").next();
                $(".img-slideb.active").hide();
                $(".img-slideb.active").removeClass("active");
                if (next.length == 0)
                    next = $(".img-slideb").first();
                next.addClass("active");
                    $(".slideb").css('z-index', 1000);
                    $(".slidea").css('z-index', 1);
                next.show();

                var next = $(".txt-slideb.active").next();
                $(".txt-slideb.active").hide();
                $(".txt-slideb.active").removeClass("active");
                if (next.length == 0)
                    next = $(".txt-slideb").first();
                next.addClass("active");
                next.show();

            } else if (countb < 50) {
                yvalb = (100 - countb); // b move up from bottom
                sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
                $('#slideb').css({top: (yvalb + '%'), left: (sinemathb + '%')});
                $('#slideb').css('opacity', countb / 100);
            } else if (countb < 100) {
                yvalb = (100 - countb); // b move up from bottom second position
                sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
                $('#slideb').css({top: (yvalb + '%'), left: (sinemathb + '%')});
                $('#slideb').css('opacity', (countb / 100));
                yvala = (150 - counta); //a moves up, starts out of way
                sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
                $('#slidea').css({top: (yvala + '%'), left: (sinematha + '%')});
                $('#slidea').css('opacity', (250 - counta) / 100);
            } else if (countb < 150) { // b does not move at top 0
                $('#slideb').css('opacity', 1);
                yvala = (100 - counta); // a continues to move up out of view
                sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
                $('#slidea').css({top: (yvala + '%'), left: (sinematha + '%')});
                $('#slidea').css('opacity', (250 - counta) / 100);

                if (countb >= 149.8) {
                    var next = $(".img-slidea.active").next();
                    $(".img-slidea.active").hide();
                    $(".img-slidea.active").removeClass("active");
                    if (next.length == 0)
                        next = $(".img-slidea").first();
                    next.addClass("active");
                    $(".slidea").css('z-index', 1000);
                    $(".slideb").css('z-index', 1);
                    next.show();

                    var next = $(".txt-slidea.active").next();
                    $(".txt-slidea.active").hide();
                    $(".txt-slidea.active").removeClass("active");
                    if (next.length == 0)
                        next = $(".txt-slidea").first();
                    next.addClass("active");
                    next.show();
                }

            } else if (countb < 200) { // b stays at top 0
                $('#slideb').css('opacity', 1);
                if (countb >= 199) {
                    counta = 0;
                }
                yvala = (350 - counta); // a should move from bottom
                sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
                $('#slidea').css({top: (yvala + '%'), left: (sinematha + '%')});
                $('#slidea').css('opacity', (counta - 250) / 100);
            } else if (countb < 250) { // b mpves up out of way of a
                yvalb = (200 - countb);
                sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
                $('#slideb').css({top: (yvalb + '%'), left: (sinemathb + '%')});
                $('#slideb').css('opacity', (300 - countb) / 100);
                yvala = (50 - counta); //a moves to top 0
                sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
                $('#slidea').css({top: (yvala + '%'), left: (sinematha + '%')});
                $('#slidea').css('opacity', (counta + 50) / 100);
            } else { //a does not move
                yvalb = (200 - countb);
                sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
                $('#slideb').css({top: (yvalb + '%'), left: (sinemathb + '%')});
                $('#slideb').css('opacity', (300 - countb) / 100);
            }
        }, 10);
    });
});

$(document).ready(function () {
    $("#mediatype").change(function () {
        if ($('#mediatype').val() === "oil" || $('#mediatype').val() === "acrylic") {
            $('#nosizediv').hide();
            $('#oilsize').show();
            $('#watersize').hide();
        } else if ($('#mediatype').val() === "water" || $('#mediatype').val() === "pencil") {
            $('#nosizediv').hide();
            $('#oilsize').hide();
            $('#watersize').show();
        } else {
            $('#nosizediv').show();
            $('#oilsize').hide();
            $('#watersize').hide();
        }
    });
});

$(document).ready(function () {
    $("#write").click(function () {
        if (!$('#contactform').is(':visible') || $('#ordering').is(':visible')) {
            $('#contactform').show();
            $('#messagelabel').show();
            $('#message').show();
            $('#msg_send').show();
            $('#pricing').hide();
            $('#ordering').hide();
        } else {
            $('#contactform').hide();
            $('#pricing').hide();
            $('#ordering').hide();
        }
    });
});

$(document).ready(function () {
    $("#calculate").click(function () {
        if (!$('#pricing').is(':visible') || $('#ordering').is(':visible')) {
            $('#contactform').hide();
            $('#pricing').show();
            $('#ordering').hide();
        } else {
            $('#contactform').hide();
            $('#pricing').hide();
            $('#ordering').hide();
        }
    });
});

$(document).ready(function () {
    $("#order").click(function () {
        if (!$('#ordering').is(':visible')) {
            $('#contactform').show();
            $('#messagelabel').hide();
            $('#message').hide();
            $('#msg_send').hide();
            $('#pricing').show();
            $('#ordering').show();
        } else {
            $('#contactform').hide();
            $('#pricing').hide();
            $('#ordering').hide();
        }
    });
});


$(document).ready(function () {
    $("#calcbutton").click(function () {
        var baseprice;
        var sizeadd;
        var shipadd;
        var figuremultiple = 50;
        var finalprice;
        switch ($('#mediatype').val()) {
            case 'oil':
                baseprice = 180;
                switch ($('#size').val()) {
                    case 'o12':
                        sizeadd = 0;
                        shipadd = 30;
                        break;
                    case 'o16':
                        sizeadd = 50;
                        shipadd = 40;
                        break;
                    case 'o20':
                        sizeadd = 100;
                        shipadd = 55;
                        break;
                    case 'o24':
                        sizeadd = 150;
                        shipadd = 70;
                        break;
                    case 'o30':
                        sizeadd = 200;
                        shipadd = 85;
                        break;
                    case 'o36':
                        sizeadd = 250;
                        shipadd = 100;
                        break;
                }
                break;
            case 'acrylic':
                baseprice = 150;
                switch ($('#size').val()) {
                    case 'o12':
                        sizeadd = 0;
                        shipadd = 30;
                        break;
                    case 'o16':
                        sizeadd = 40;
                        shipadd = 40;
                        break;
                    case 'o20':
                        sizeadd = 80;
                        shipadd = 55;
                        break;
                    case 'o24':
                        sizeadd = 120;
                        shipadd = 70;
                        break;
                    case 'o30':
                        sizeadd = 160;
                        shipadd = 85;
                        break;
                    case 'o36':
                        sizeadd = 200;
                        shipadd = 100;
                        break;
                }
                break;
            case 'water':
                baseprice = 120;
                switch ($('#wsize').val()) {
                    case 'w9':
                        sizeadd = 0;
                        shipadd = 20;
                        break;
                    case 'w12':
                        sizeadd = 50;
                        shipadd = 30;
                        break;
                    case 'w16':
                        sizeadd = 100;
                        shipadd = 40;
                        break;
                    case 'w18':
                        sizeadd = 150;
                        shipadd = 50;
                        break;
                    case 'w20':
                        sizeadd = 200;
                        shipadd = 60;
                        break;
                }
                break;
            case 'pencil':
                baseprice = 80;
                switch ($('#wsize').val()) {
                    case 'w9':
                        sizeadd = 0;
                        shipadd = 20;
                        break;
                    case 'w12':
                        sizeadd = 20;
                        shipadd = 30;
                        break;
                    case 'w16':
                        sizeadd = 40;
                        shipadd = 40;
                        break;
                    case 'w18':
                        sizeadd = 60;
                        shipadd = 50;
                        break;
                    case 'w20':
                        sizeadd = 100;
                        shipadd = 60;
                        break;
                }
                break;
        }
        finalprice = baseprice + sizeadd + ((($('#people').val()) - 1) * figuremultiple);
        $('#price').html("Artwork price: $" + finalprice + " + \n Packaging and Shipping: $" + shipadd);
    });
});