<?php

$pid=$_POST['pid'];

session_start();
if(isset($_SESSION["p$pid"]))
{
	if($_SESSION["p$pid"]>0)
	{
		$_SESSION["p$pid"]-=1;
		if($_SESSION["p$pid"]==0)
		{
			unset($_SESSION["p$pid"]);
		}
		echo "Removed from cart";
	}
	else
	{
		echo "Add to Cart before removing";
	}
}
else
{
echo "Add to Cart before removing";
}

?>