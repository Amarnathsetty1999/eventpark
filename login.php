<?php
session_start();
$_SESSION['status']="Active";
$email=$_POST['email'];
$psw=$_POST['psw'];

$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");
$result=$pdo->query("select * from users where email='$email' and psw='$psw'");

if(($row=$result->fetch()))
{
  echo "Success";
}

else
{
  echo "Failure";
}
$pdo=null;
?>