function slideup() {
    var myVar = setInterval(slideupb, 10);
    var slidea = document.getElementById("slidea");
    var slideb = document.getElementById("slideb");
    var slidec = document.getElementById("slidec");
    var demo = document.getElementById("demo");
    var countb = 0;
    var increment = 0.15;
    var yvalb = (105 - countb);
    var sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
    var counta = 95;
    var yvala = (105 - counta);
    var sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
    slidea.style.top = yvala + '%';
    slidea.style.left = sinematha + '%';
    slidea.style.opacity = counta / 100;
    function slideupb() {
        if (countb > 295) {
            countb = 0;
            slidea.style.opacity = 1;
        } else if (countb < 45) {
            countb = (countb) + increment;
            counta = (counta) + increment;
            yvalb = (105 - countb);
            sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
            slideb.style.top = yvalb + '%';
            slideb.style.left = sinemathb + '%';
            slideb.style.opacity = countb / 100;
            demo.innerHTML = counta + "\n" + yvala + "\n" + countb + "\n" + yvalb;
        } else if (countb < 95) {
            countb = (countb) + increment;
            counta = (counta) + increment;
            yvalb = (105 - countb);
            sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
            slideb.style.top = yvalb + '%';
            slideb.style.left = sinemathb + '%';
            slideb.style.opacity = countb / 100;
            yvala = (150 - counta);
            sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
            slidea.style.top = yvala + '%';
            slidea.style.left = sinematha + '%';
            slidea.style.opacity = (250 - counta) / 100;
            demo.innerHTML = counta + "\n" + yvala + "\n" + countb + "\n" + yvalb;
        } else if (countb < 145) {
            slideb.style.opacity = 1;
            countb = (countb) + increment;
            counta = (counta) + increment;
            yvala = (60 - counta);
            sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
            slidea.style.top = yvala + '%';
            slidea.style.left = sinematha + '%';
            slidea.style.opacity = (250 - counta) / 100;
            demo.innerHTML = counta + "\n" + yvala + "\n" + countb + "\n" + yvalb;
        } else if (countb < 195) {
            slideb.style.opacity = 1;
            countb = (countb) + increment;
            counta = (counta) + increment;
            if (countb >= 194) {
                counta = 0;
            }
            yvala = (105 - counta);
            sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
            slidea.style.top = yvala + '%';
            slidea.style.left = sinematha + '%';
            slidea.style.opacity = (counta + 45) / 100;
            demo.innerHTML = counta + "\n" + yvala + "\n" + countb + "\n" + yvalb;
        } else if (countb < 245) {
            countb = (countb) + increment;
            counta = (counta) + increment;
            yvalb = (205 - countb);
            slideb.style.top = yvalb + '%';
            sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
            slideb.style.left = sinemathb + '%';
            slideb.style.opacity = (295 - countb) / 100;
            yvala = (60 - counta);
            sinematha = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvala - 10) * (yvala - 10)) + 0.01) / 5.65);
            slidea.style.top = yvala + '%';
            slidea.style.left = sinematha + '%';
            slidea.style.opacity = (counta + 45) / 100;
            demo.innerHTML = counta + "\n" + yvala + "\n" + countb + "\n" + yvalb;
        } else {
            countb = (countb) + increment;
            counta = (counta) + increment;
            yvalb = (205 - countb);
            slideb.style.top = yvalb + '%';
            sinemathb = Math.sqrt(((47.5 * 47.5) - (0.25 * (yvalb - 10) * (yvalb - 10)) + 0.01) / 5.65);
            slideb.style.left = sinemathb + '%';
            slideb.style.opacity = (295 - countb) / 100;
            demo.innerHTML = counta + "\n" + yvala + "\n" + countb + "\n" + yvalb;
        }
    }
}

function showsizes(optVal) {
    var nosize = document.getElementById("nosizediv");
    var oilsize = document.getElementById("oilsize");
    var watersize = document.getElementById("watersize");
    if (optVal === "oil" || optVal === "acrylic") {
        nosize.style.display = 'none';
        oilsize.style.display = 'block';
        watersize.style.display = 'none';
    } else if (optVal === "water" || optVal === "pencil") {
        nosize.style.display = 'none';
        oilsize.style.display = 'none';
        watersize.style.display = 'block';
    } else {
        nosize.style.display = 'block';
        oilsize.style.display = 'none';
        watersize.style.display = 'none';
    }
}

//function formreset() {
//    document.getElementById('contactform').reset();
//    document.getElementById('pricing').reset();
//    document.getElementById('ordering').reset();
//}

function showform(formtype) {
    var contactform = document.getElementById("contactform");
    var pricing = document.getElementById("pricing");
    var ordering = document.getElementById("ordering");
    var messagelabel = document.getElementById("messagelabel");
    var message = document.getElementById("message");
    var msg_send = document.getElementById("msg_send");
    var dateline = document.getElementById("today");
    if (formtype === 1) {
        if (contactform.style.display !== 'block' || ordering.style.display === 'block') {
            contactform.style.display = 'block';
            messagelabel.style.display = 'block';
            message.style.display = 'block';
            msg_send.style.display = 'block';
            pricing.style.display = 'none';
            ordering.style.display = 'none';
        } else {
            contactform.style.display = 'none';
            pricing.style.display = 'none';
            ordering.style.display = 'none';
        }
    } else if (formtype === 2) {
        if (pricing.style.display !== 'block' || ordering.style.display === 'block') {
            contactform.style.display = 'none';
            pricing.style.display = 'block';
            ordering.style.display = 'none';
        } else {
            contactform.style.display = 'none';
            pricing.style.display = 'none';
            ordering.style.display = 'none';
        }
    } else if (formtype === 3) {
        if (ordering.style.display !== 'block') {
            contactform.style.display = 'block';
            messagelabel.style.display = 'none';
            message.style.display = 'none';
            msg_send.style.display = 'none';
            pricing.style.display = 'block';
            ordering.style.display = 'block';
        } else {
            contactform.style.display = 'none';
            pricing.style.display = 'none';
            ordering.style.display = 'none';
        }
    } else {
        contactform.style.display = 'none';
        pricing.style.display = 'none';
        ordering.style.display = 'none';
    }
}

const calcbutton = document.getElementById("calcbutton");
calcbutton.addEventListener('click', calcprice);
function calcprice() {
    var media = document.getElementById("mediatype").value;
    var oil = document.getElementById("size").value;
    var water = document.getElementById("wsize").value;
    var figures = document.getElementById("people").value;
    var price = document.getElementById("price");
    var baseprice;
    var sizeadd;
    var shipadd;
    var figuremultiple = 50;
    var finalprice;

    switch (media) {
        case 'oil':
            baseprice = 180;
            switch (oil) {
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
            switch (oil) {
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
            switch (water) {
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
            switch (water) {
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
    finalprice = baseprice + sizeadd + ((figures - 1) * figuremultiple);
    price.innerHTML = "Artwork price: $" + finalprice + " +      \n Packaging and Shipping: $" + shipadd;
}
