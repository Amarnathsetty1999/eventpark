<?php

$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from booking");
$n=0;




while(($row=$result->fetch()))
{
    if(($n==0))
    {
        $n=1;
        echo <<<END
        <div class="info"><b> Booking History</b></div><br>
<table border class="center orders"><tr class="tr">
<th> Product  </th><th style='width:100px'> Email </th><th> Quantity  </th><th> Total Amount  </th><th style='width:200px'> Date  </th><th style='width:550px'> Description  </th></tr>
END;

    }
    $email=$row['email'];
    $date=$row['date'];
    $pid=$row['eventid']; 
    $qt=$row['count_of_individual'];
    $amt=$row['totalamount'];
    $res=$pdo->query("select * from events where eventid='$pid'");
    if(($r=$res->fetch()))
    {
        $pname=$r['eventname'];
        $desc=$r['eventdescription'];
        $price=$r['eventprice'];
       

  
echo <<<END

<tr>
<td >$pname</td>
<td >$email</td>
<td>$qt</td>

<td>$amt</td>
<td>$date</td>
<td>$desc</td>
<td><a href="delete1.php?pi=$pid&pp=$date" class="btn btn-danger btn-sm">Delete</a> </td>
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