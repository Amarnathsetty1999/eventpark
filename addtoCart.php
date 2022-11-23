<?php

$pid=$_POST['pid'];
session_start();
if(isset($_SESSION["p$pid"]))
{
	$_SESSION["p$pid"]+=1;
}
else
{
$_SESSION["p$pid"]=1;
}
echo " Added to cart successfully";
?>
