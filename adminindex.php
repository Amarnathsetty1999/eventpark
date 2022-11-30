<?php

session_start();

if($_SESSION['status']!="Active")
{
    header("location:adminlogin.html");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Mellodian Park</title>

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





$("#order").click(function()
{
 
  $.post( "alldataorder.php").done(function( data ) 
    { 
       $("#me").html(data);
    });
});

$("#user").click(function()
{
  
  
  $.post( "alldatauser.php").done(function( data ) 
    { 
       $("#me").html(data);
    });
});

$("#adduser").click(function()
{
  
  
  $.post( "register.php").done(function( data ) 
    { 
       $("#me").html(data);
    });
});

$("#lo").click(function()
{
  email=getCookie('email');

  $.post( "logout.php", {email:email }).done(function( data ) 
    { 
       location.replace('admimlogin.html');
    });
});



});
</script>

<body>

<div class="navbar navbg" id="nav">
 
  <a class="navbar-brand bgs" href="#" id="title">Mellodian Community Park </a>

  <a href="#" id="order">ALL ORDERS</a>
  <a href="#" id="user">ALL USER</a>
  <a href="#" id="lo">Logout</a>
  
</div>

<div id="me">
  </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>