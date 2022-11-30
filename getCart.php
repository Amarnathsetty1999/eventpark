<?php
session_start();
date_default_timezone_set("Europe/London");
$email=$_POST['email'];
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");

$tot=0;
$sum=0;
$flag=0;
$toi="";
$idflag=0;
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
	$chi="Children";
      $toi.=$chi;
	}
     
     $sum=$sum+$value;
	if($key[0]=='a')
	{
		$chi=" Adult";
      $toi.=$chi;
       $flag=1;
	}
	


}



if(($flag==1) && ($sum<=8))
{
	

	foreach($_SESSION as $key=>$value)
{
	
	
	
	$dt=date('Y-m-d H:i:s');
	
	if($key=="status")
	{
		continue;
	}
    
	

    if($key[0]=='c')
	{
		
		
		$str = ltrim($key, 'c');
	}
	else if($key[0]=='a')
	{
		
		$str = ltrim($key, 'a');
	}



	if($value==0)
	{
		continue;
	} 

	
     
	 $result1=$pdo->query("select * from photoid where email='$email'");
	
    $image="";
    if($row1=$result1->fetch())
	{
      $image=$row1['image_name'];
	  $result=$pdo->query("select * from events where eventid=$str"); 
	if($row=$result->fetch())
	{
		$tot=1;
		$price=$row['eventprice'];
		
	$ltot=$price*$sum;
	
	$sql="insert into orders values('$str','$email','$dt','$value','$ltot','$image')";
	
	$pdo->query("insert into booking values('$str','$email','$dt','$toi','$sum','$ltot','$image')");
	break;
	//$pdo->query("delete from photoid where email='$email'");
	}
	}
	else{
		$idflag=1;
	}
	
	
}
$pdo->exec("delete from photoid where email='$email'");



$pdo=null;
if($tot==1)
{
	
	echo "Order placed for all the items in cart";
}
else{
	if($idflag==1)
	{
		echo " Id not Uploaded so No order placed";
	}
	else
	{
		echo "No items in cart to place order";
	}
	
}

}
else
{
	if($flag==0)
	{
		echo "At least one adult is mandatory";
	}
	else
	{
		echo "Ticket count is more than 8";
		
	}
	
	
}





session_unset();
session_destroy();
session_start();
$_SESSION['status']="Active";
?>