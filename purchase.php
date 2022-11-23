<?php

session_start();

if($_SESSION['status']!="Active")
{
    header("location:login.php");
}

date_default_timezone_set("Asia/Calcutta");
$pid=$_POST['pid'];
$email=$_POST['email'];
$qt=1;
$dt=date('Y-m-d H:i:s');
$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");
$res=$pdo->query("select * from product where pid='$pid'");
if(($r=$res->fetch()))
{
    $price=$r['price'];
}
$pdo->query("insert into orders values('$pid','$email','$dt','$qt','$price')");
$pdo=null;
echo "Order placed successfully";
?>