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
	<title>Purchase</title>

	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/purstyle.css">
  <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>

<style>
* {
    padding-right:0px!important;
}

.navbar a{
padding: 10px!important;
}

</style>

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


$email=getCookie('email');

$.post( "getName.php", { email:$email }).done(function( data ) 
{ 
  
  $("#nm").html(data);
  
});

$.post( "show.php", {cat:"Children"  }).done(function( data ) 
{ 
      $("#imp").html(data);
     
});


$.post( "getCategory.php", {  }).done(function( data ) 
{ 
  arr=data.split("#");
  for(i=0;i<arr.length-1;i++)
  {
      $("#sel1").append(new Option(arr[i],arr[i]));
  }
});

$("#sel1").click(function()
{
  cat=$(this).val(); 
  $.post( "show.php", {cat:cat  }).done(function( data ) 
  { 
      $("#imp").html(data);
     
  });

});

$("#title").click(function()
{
   location.replace('index.php');
});

$("#pur").click(function()
{
  location.replace('pur.php');
});

$("#about").click(function()
{
  email=getCookie('email');
  
  $.post( "aboutMe.php", {email:email  }).done(function( data ) 
    { 
       $("#rec").html(data);
    });

});

$("#lo").click(function()
{
  email=getCookie('email');

  $.post( "logout.php", {email:email  }).done(function( data ) 
    { 
      // alert(data);
       location.replace('login.html');
    });
});

$("#cart").click(function()
{
  email=getCookie('email');
  
  $.post( "getCartD.php", {email:email  }).done(function( data ) 
    { 
       $("#rec").html(data);
    });

  $.post( "getCountCart.php", {email:email  }).done(function( data ) 
    { 
       $("#s").html(data);
    });

});

$("#ck").click(function()
{
  email=getCookie('email');
  
  $.post( "getCart.php", {email:email  }).done(function( data ) 
    { 
       $("#rec").html(data);
    });

});

});


</script>

<body>
  
  <div class="navbar navbg" id="nav">
 
    <a class="navbar-brand bgs" href="#" id="title">Mellodian Community Park </a>
  
    <a href="#" id="pur">Purchase</a>
  
    <a href="index.php#abt">About us</a>
  
    <a href="#" id="cart">Bookings (<span id="s"></span>)</a>

    
  
    <a href="#" id="lo">Logout</a>
  
     <a href="#" id="about">My Account</a>
  
  </div>
  
<div id="rec" class="carousel">
<div class="form-group" style=width:50%>
  <!-- <div class="col-lg-2"> -->
  <label for="sel1"> <h2> Select Product Category: </h2> </label>
  <select class="form-control" id="sel1">
    
  </select>
<!-- </div> -->
</div>
<div id="imp"></div>
</div>
</body>
</html>


