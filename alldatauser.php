<?php

$pdo=new PDO("mysql:host=localhost;dbname=test","root","");
$result=$pdo->query("select * from users"); 

$n=0;



while(($row=$result->fetch()))
{
    if(($n==0))
    {
        $n=1;
        echo <<<END
        <div class="info"><b> USERS</b></div><br>
<table border class="center orders"><tr class="tr">
<th> Email  </th><th style='width:100px'> psw </th><th> Name  </th><th> phone</th></tr>
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
<td>$phone</td>
<td><button class="editbtn">Delete</button></td>
</tr>

END;
}
}

?>