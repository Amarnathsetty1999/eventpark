<?php

session_start();

if($_SESSION['status']!="Active")
{
    header("location:login.html");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Retail Store</title>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/homestyle.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">

</head>


<script type="text/javascript">
    function setCookie(key, value, expiry) {
        var expires = new Date();
        expires.setTime(expires.getTime() + (expiry * 24 * 60 * 60 * 1000));
        document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
    }

    function getCookie(key) {
        var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
        return keyValue ? keyValue[2] : null;
    }

    function eraseCookie(key) {
        var keyValue = getCookie(key);
        setCookie(key, keyValue, '-1');
    }

</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

$("#title").click(function()
{
   location.replace('index.php');
});

$("#pur").click(function()
{
  location.replace('pur.php');
});

// $("#abtus").click(function()
// {
//   location.replace('index.php#abt');
// });

$("#about").click(function()
{
  email=getCookie('email');
  
  $.post( "aboutMe.php", {email:email }).done(function( data ) 
    { 
       $("#me").html(data);
    });
});

$("#cart").click(function()
{
  email=getCookie('email');
  
  $.post( "getCartD.php", {email:email }).done(function( data ) 
    { 
       $("#me").html(data);
    });

  $.post( "getCountCart.php", {email:email }).done(function( data ) 
    { 
       $("#s").html(data);
    });

});

$("#ck").click(function()
{
  email=getCookie('email');
  
  $.post( "getCart.php", {email:email  }).done(function( data ) 
    { 
       $("#me").html(data);
    });

});

$("#lo").click(function()
{
  email=getCookie('email');

  $.post( "logout.php", {email:email }).done(function( data ) 
    { 
       location.replace('login.html');
    });
});

});
</script>

<body>

<div class="navbar navbg" id="nav">
 
  <a class="navbar-brand bgs" href="#" id="title">Mellodian Community Park </a>

  <a href="#" id="pur">Tickets</a>

  <a href="#abt" id="abtus">About us</a>

  <a href="#" id="cart">Cart(<span id="s"></span>)<i class="fa fa-shopping-cart"></i></a>

  <a href="#" id="ck">Check out</a>

  <a href="#" id="lo">Logout</a>

  <a href="#" id="about">My Account</a>
  
</div>

<div id="me">
<div id="rec"><?php include('home.html'); ?></div>
<div class="about-section" id="abt">
  <h1 style='overflow:hidden'>About Us</h1>
  <p>Online retail store, is an Indian chain of hypermarkets in India founded 
      by Gowtham and co in the year 2021, with its first branch in shimoga.</p>
  <!-- <p>Resize the browser window to see that this page is responsive by the way.</p> -->
</div>

<h2 style="text-align:center; margin-top:20px;overflow:hidden">Our Team</h2>
<div class="row">
  <div class="column">
    <div class="card">
      <!-- <img src="/w3images/team1.jpg" alt="Jane" style="width:100%"> -->
      
    </div>
  </div>

  <div class="column">
    <div class="card" id="ex">
      <!-- <img src="/w3images/team2.jpg" alt="Mike" style="width:100%"> -->
      <div class="container">
        <h2 style='overflow:hidden'>Amarnath Gopinath</h2>
        <p class="title"> Admin </p>
        <p>1234567890</p>
        <p>ag4008s@gre.ac.uk</p>
        <!-- <p><button class="button">Contact</button></p> -->
      </div>
    </div>
  </div>
  
  <div class="column">
    <div class="card">
      <!-- <img src="/w3images/team3.jpg" alt="John" style="width:100%"> -->
     
    </div>
  </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>