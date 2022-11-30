<link rel="stylesheet" type="text/css" href="css/style.css">
<?php
$cat=$_POST['cat'];
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from category,events where events.catid=category.catid and catname='$cat'"); 
echo <<<END
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/purstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
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

function  f(pid)
{
  $.post( "getDescription.php", {pid:pid  }).done(function( data ) 
    { 
        $("#m1").html(data);
    });
}

$(document).ready(function(){

$(".bb").click(function()
{
  email=getCookie('email');
   pid=this.id;
  $.post( "getCart.php", {pid:pid,email:email }).done(function( data ) 
    { 
       alert(data);
    });

});

$("#ct").click(function()
{
  email=getCookie('email');
  
  $.post( "getCartD.php", {email:email  }).done(function( data ) 
    { 
      alert(data);
    });

  $.post( "getCountCart.php", {email:email  }).done(function( data ) 
    { 
       $("#s").html(data);
    });

});

$(".ss").click(function(event)
{
  // alert(event.target.id);
  email=getCookie('email');
   bid=this.id;
  $.post( "addtocart.php", {pid:bid, email:email}).done(function( data ) 
    { 
       alert(data);
    });
   event.preventDefault();
});

$(".rm").click(function()
{
  // alert(event.target.id);
  email=getCookie('email');
   bid=this.id;
  $.post( "removeCart.php", {pid:bid,email:email}).done(function( data ) 
    { 
       alert(data);
    });

});



});
</script>
<h1 style="text-align:center;font-variant: small-caps;">$cat event</h1>
<hr>
<div class="container"> 
        <div class="row">
END;
while(($row=$result->fetch()))
{
  $pid=$row['eventid'];
  $pname=$row['eventname'];
  $pdesc=$row['eventdescription'];
  $cost=$row['eventprice'];
  $path="images/rr$pid.jpeg";

  echo <<<END

<!-- Portfolio Gallery Grid -->

   <div class="col-md-4">
    <div class="thumbnail">
      <img src="$path" alt="Mountains" style="width:100%">
      <p><strong>Name: </strong> $pname </p>
      <a class="ad" data-toggle="modal" data-target="#myModal" onclick="f($pid)"><strong>Description</strong></a>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      <h4 class="modal-title">Event Description</h4>        
      </div>
      <div class="modal-body" id="m1">
        
      </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style='margin-right:20px;padding:5px'>Close</button>
      </div> 
    </div>

  </div>
</div>
      <p><strong> Cost: </strong>&#163; $cost </p>
      <div><button class=bb type=button id=$pid> Buy </button>
      <form>
      NO OF CHILDRENS::
      <button class=ss type=button id="c$pid"> + </button>
      <button class=rm type=button id="c$pid"> - </button></div>
    
      </form>

      <form>
      NO OF ADULTS::
      <button class=ss type=button id="a$pid"> + </button>
      <button class=rm type=button id="a$pid"> - </button></div>
      </form>

      
   

   <form action="idupload.php?oo=" method="post" enctype="multipart/form-data">
      Upload your id
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload ID" name="submit">
      </form>
   
  
      

 
    </div>
  </div>
  

<!-- END MAIN -->



END;
}
// echo "</div></div>";

$pdo=null;

?>