<?php



$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");

$result=$pdo->query("select * from customers"); 

$n=0;

echo <<<END
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/purstyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

$(document).ready(function(){

    $("#signup").click(function()  //when signup button is clicked
    {
       email=$("#email").val();
       psw=$("#psw").val();
       name=$("#name").val();
       pno=$("#pno").val();
       $.post( "register.php", { email:email,psw:psw,name:name,pno:pno }).done(function( data ) 
      { 
        alert(data);
        if(data=="Registered successfully")
            location.replace("adminindex.php");
    }); 
    
    });


    $("#upe").click(function()  //when signup button is clicked
    {
      
       pno=$("#pno").val();
       $.post( "update.php", { pno:pno }).done(function( data ) 
      { 
        alert(data);
        // if(data=="Updated successfully")
        //     location.replace("adminindex.html");
    }); 
    
    });


});
</script>
<hr>
<div class="container"> 
        <div class="row">
END;



while(($row=$result->fetch()))
{
    if(($n==0))
    {
        $n=1;
        echo <<<END
        <div class="info"><b> USERS</b></div><br>
<table border class="center orders"><tr class="tr">
<th> Email  </th><th style='width:100px'> psw </th><th> Name  </th><th> phone</th></tr>
<tr>

<td> <input class="input100" type="email" id="email" name="email" placeholder="Email"> </td>
<td><input class="input100" type="password" id="psw" name="psw" placeholder="Password"></td>
<td><input class="input100" type="text" id="name" name="pname" placeholder="Name"></td>
<td><input class="input100" type="number" id="pno" name="pno" placeholder="Phone"></td>
<td><button id="signup" class="add">Add</button></td>
</tr>
END;

    }
    $email=$row['email'];
    $psw=$row['psw'];
    $name=$row['name'];
    $phone=$row['phone'];
  
   
    {
      

  
echo <<<END

<tr>

<td>$email</td>
<td>$psw</td>
<td>$name</td>
<td><form action="update.php?pi=$email" method="post">
 <input value=$phone type="number" id="pno" name="pno" placeholder="Phone""><br>
<input type="submit" value="Update">
</form></td>

<td><a href="delete.php?pi=$email" class="btn btn-danger btn-sm">Delete</a> </td>






</tr>

END;
}
}

?>