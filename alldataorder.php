<?php

$pdo=new PDO("mysql:host=localhost;dbname=test","root","");
$result=$pdo->query("select * from orders");
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
<td><button class="editbtn">edit</button></td>
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