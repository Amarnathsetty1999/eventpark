<?php
$email=$_COOKIE['email'];
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from customers where email='$email'"); 

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
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from booking where email='$email'");
$n=0;
while(($row=$result->fetch()))
{
    if(($n==0))
    {
        $n=1;
        echo <<<END
        <div class="info"><b> Orders History</b></div><br>
<table border class="center orders"><tr class="tr">
<th> Event  </th><th style='width:100px'>No of Individual </th><th> Type of Individual </th><th> Unit Price  </th><th> Total Amount  </th><th> Date  </th><th style='width:200px'> Photoid  </th></tr>
END;

    }
    $date=$row['date'];
    $pid=$row['eventid'];
    $qt=$row['count_of_individual'];
    $amt=$row['totalamount'];
    $imageURL='idupload/'.$row['photoid'];
    $toi=$row['type_of_individual'];
    $res=$pdo->query("select * from events where eventid='$pid'");
    if(($r=$res->fetch()))
    {
        $pname=$r['eventname'];
        $desc=$r['eventdescription']; 
        $price=$r['eventprice'];
       
  
echo <<<END

<tr>

<td>$pname</td>
<td>$qt</td>
<td>$toi</td>
<td>$price</td>
<td>$amt</td>
<td>$date</td>
<td><img src="$imageURL" alt="" style="width:100%"/></td>
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