<?php
header("Content-type: text/css; charset: UTF-8");
?>

html, body {
height:100vh;
width: 100vw;
overflow: hidden; 
background-image: linear-gradient(to bottom right, rgb(235, 255, 255) 75%, rgb(34, 34, 200));
color:rgb(0, 0, 175);
}

.bodyContainer{
position: absolute;
top: 0;
height:100vh;
width: 100vw;
}

.innerbody{
position: relative;
top:20vh;
width: 90%;
height: 75%;
bottom: 60vh;
overflow-y: auto;
left: 5%;
}

.center{
text-align: center;
}

.slidea {
position: absolute; 
top: 10%; 
left: 20%; 
width:70%;
z-index: 5000;
}

.slideb, .slidec {
clear:both;
position: absolute; 
left: -5%;
top:105%; 
width:70%;
opacity:0.5;
z-index: 4000;
}

img{
border-radius: 5%; 
box-shadow: 10px 10px 5px rgb(0, 0, 75);
}

.slide{
clear:both;
width:100%;
}

.slide img {
max-width:25%; 
float:left; 
margin-right:4%;
margin-bottom:4%; 
}

.slidetext{
width: 71%;
float:left;
}

.logEntry{
clear:both;
width: 100%;
}

.logEntry img{
max-width:25%; 
float:left; 
margin-right:4%;
margin-bottom:4%; 
overflow-y: auto;
}

.innerbody > img{
width: 45%;
float: left;
overflow-y: auto;
}

.contactInput{
width:31%;
float:left;
margin: 0 1%;
background-color: rgb(0, 0, 175);
color: white;
border: none;
border-radius: 4px;
}

.orderpart{
width:31%;
float:left;
margin: 1% 1%;
}

#contactform, #pricing, #ordering{
display:none;
}

#calcbutton{
width:100%;
}

.orderpart img{
width: 100%;
}

input, select, textarea, #price {
display: block;
width: 100%;
padding: 12px;
border: 1px solid #ccc;
border-radius: 4px;
box-sizing: border-box;
margin-top: 6px;
margin-bottom: 16px;
resize: vertical
}

input[type=submit] {
background-color: rgb(0, 0, 175);
color: white;
padding: 12px 20px;
border: none;
border-radius: 4px;
cursor: pointer;
}

input[type=submit]:hover {
background-color: rgb(0, 0, 175);
}

.bad{
border: 1px solid red;
border-radius: 4px;
}

#frstname{
padding-right: 15%;
}

.container {
border-radius: 5px;
background-color: #f2f2f2;
padding: 20px;
}

.faqlist, .faqlist ul{
list-style-type: none;
margin-left: -5%;
}

.summary{
padding-bottom: 6px;
font-weight: bold;
}

.summary:before{
content:"\21DF";
}

.summary > ul{
display:none;
padding-left: 2px;
font-weight: normal;
}

.nosize{
display: block;
}

.oilsize, .watersize{
display: none;
}

.summary:hover ul{
display: block;
}

footer{
position: absolute;
bottom: 0%;
/* height: 5%; */
width:100vw;
color: rgb(235, 255, 255);
background-color: rgb(34, 34, 200);
text-align: center;
z-index: 7000;
}

footer a{
color: rgb(235, 255, 255);
}

.copyright{
display: inline;
}

footer ul{
display:inline;
}

@media screen and (max-width:1024px) {
body {
overflow-x: scroll;
}

.innerbody{
position: absolute;
top:25vh;
width: 90%;
height: 70%;
bottom: 60vh;
left: 5%;
overflow-y: auto;
}

.slide img {
max-width:100%; 
}

#contactForm, #pricing, .orderForms, #ordering{
width:100%;
}

.orderpart{
width: 100%
}

.orderpart img, .orderpart p{
display:none;
}

.innerbody > img{
display: none;
}

footer ul{
display:block;
}

footer{
font-size: 2vw;
}