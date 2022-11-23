<?php
$email=$_POST['email'];
$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");
$result=$pdo->query("select * from users where email='$email'"); 

if(($row=$result->fetch()))
{
    $name=$row['name'];
    $pno=$row['phone'];
    // $addr=$row['adrs'];
    echo <<<END
   
    <table class="center detail">
    <tr><td><b>Name : </b></td><td> $name</td><br>
    </tr>
    <tr><td>
    <b>Email : </b></td><td> $email</td><br>
    </tr>
    <tr><td>
    <b>Phone :</b></td><td> $pno</td><br>
    </tr>
    </table>
<br><br>
</div> 

END;
}
$pdo=null;
$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");
$result=$pdo->query("select * from orders where email='$email' order by dt desc");
$n=0;
while(($row=$result->fetch()))
{
    if(($n==0))
    {
        $n=1;
        echo <<<END
        <div class="info"><b> Orders History</b></div><br>
<table border class="center orders"><tr class="tr">
<th> Product  </th><th style='width:100px'> Quantity </th><th> Unit price  </th><th> Total Amount  </th><th style='width:200px'> Date  </th><th style='width:550px'> Description  </th></tr>
END;

    }
    $date=$row['dt'];
    $pid=$row['pid'];
    $qt=$row['qty'];
    $amt=$row['amt'];
    $res=$pdo->query("select * from product where pid='$pid'");
    if(($r=$res->fetch()))
    {
        $pname=$r['pname'];
        $desc=$r['pdesc'];
        $price=$r['price'];

  
echo <<<END

<tr>

<td>$pname</td>
<td>$qt</td>
<td>$price</td>
<td>$amt</td>
<td>$date</td>
<td>$desc</td>
</tr>

END;
}
}
$pdo=null;
if(($n==0))
{
echo <<<END


<div class="info"> No orders placed yet</div>

END;

}

?>