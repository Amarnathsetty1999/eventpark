<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
$email=$_POST['email'];
$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");

$tot=0;

foreach($_SESSION as $key=>$value)
{
	if($key=="status")
	{
		continue;
	}
	
	$str = ltrim($key, 'p');
	if($value==0)
	{
		continue;
	} 

	$result=$pdo->query("select * from product where pid=$str"); 
	if($row=$result->fetch())
	{
		$tot=1;
		$price=$row['price'];
	
	$ltot=$price*$value;
	$dt=date('Y-m-d H:i:s');
	$pdo->query("insert into orders values('$str','$email','$dt','$value','$ltot')");
	}
}
$pdo=null;
if($tot==1)
{
	echo "<div style='font-size:36px;margin:40px'>Order placed for all the items in cart</div>";
}
else{
	echo "<div style='font-size:36px;margin:40px'>No items in cart to place order</div>";
}

session_unset();
session_destroy();
session_start();
$_SESSION['status']="Active";
?>