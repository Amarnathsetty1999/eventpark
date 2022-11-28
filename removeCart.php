<?php

$pid=$_POST['pid'];
session_start();
if($pid[0]=='c')
{
	if(isset($_SESSION["c$pid"]))
{
	if($_SESSION["c$pid"]>0)
	{
		$_SESSION["c$pid"]-=1;
		if($_SESSION["c$pid"]==0)
		{
			unset($_SESSION["c$pid"]);
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

}

else
{

	if(isset($_SESSION["a$pid"]))
{
	if($_SESSION["a$pid"]>0)
	{
		$_SESSION["a$pid"]-=1;
		if($_SESSION["a$pid"]==0)
		{
			unset($_SESSION["a$pid"]);
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


}


?>