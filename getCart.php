<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
$email=$_POST['email'];
$pdo=new PDO("mysql:host=localhost;dbname=test","root","");

$tot=0;

$flag=0;
foreach($_SESSION as $key=>$value)
{
	if($key=="status")
	{
		continue;
	}
    if($value==0)
	{
		continue;
	} 

	if($key[0]=='a')
	{
       $flag=1;
	}
	


}

if($flag==1)
{

	foreach($_SESSION as $key=>$value)
{
	if($key=="status")
	{
		continue;
	}
    
	

    if($key[0]=='c')
	{
		$str = ltrim($key, 'c');
	}
	else
	{
		$str = ltrim($key, 'a');
	}
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
	echo "Order placed for all the items in cart";
}
else{
	echo "No items in cart to place order";
}

}
else
{
	echo "At least one adult is mandatory";
}




session_unset();
session_destroy();
session_start();
$_SESSION['status']="Active";
?>