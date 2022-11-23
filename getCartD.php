<?php
session_start();
$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");

$tot=0;
$cnt=0;
foreach($_SESSION as $key=>$value)
{
    if($key=="status")
	{
		continue;
	}
	$str = ltrim($key, 'p');
	if($value==0)
	{
		//unset($_SESSION["$key"]);
		continue;
	} 
	
	$result=$pdo->query("select * from product where pid=$str"); 
	if($row=$result->fetch())
	{
		if($cnt==0)
		{
			echo "<table border class='abc'><tr><th style='width:550px'> Product Name </th><th style='width:120px'> Quantity </th><th style='width:200px'> Unit Price </th><th style='width:100px'>Total</tr>";
		}
		$cnt=1;
		$name=$row['pname'];
		$price=$row['price'];
	}
	
	$ltot=$price*$value;
	$tot+=$ltot;
	echo "<tr><td> $name </td><td> $value </td><td> $price </td><td> $ltot </td></tr>";
}
if($cnt==0)
{
		echo "<p id='nocart'>No items in cart</p>";
		$pdo=null;
		exit;
}
$pdo=null;
echo "<br/><tr><th colspan=3> Total Cost </th><th> $tot </th></tr></table><br>";

echo "<div><a href='clearCart.php' id='clearcart'> Clear cart </a></div>";

?>