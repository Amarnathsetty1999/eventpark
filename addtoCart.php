<?php
$pid=$_POST['pid'];
session_start();


if($pid[0]=='c')
{
	if(isset($_SESSION["c$pid"]))
	{
		$_SESSION["c$pid"]+=1;
	}
	else
	{
	$_SESSION["c$pid"]=1;
	}
	echo "Added to Cart ";	
}
else
{
	if(isset($_SESSION["a$pid"]))
{
	$_SESSION["a$pid"]+=1;
}
else
{
$_SESSION["a$pid"]=1;
}
echo "Added to Cart";

}


?>
