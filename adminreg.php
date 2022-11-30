<?php
$email=$_POST['email'];
$psw=$_POST['psw'];
$name=$_POST['name'];
$pno=$_POST['pno'];
$yuy=$pno;

$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from admins where email='$email'"); 
if(($row=$result->fetch()))
{
  echo "Specified email already existss";
  $pdo=null;
  exit;
}
if($email=='' || $psw=='' || $name==''|| $pno='')
{
  $pdo=null;
  echo("Fields  empty");
}
else
{
  
$sql="INSERT into admins values('$email','$psw','$name','$yuy')";

$result=$pdo->exec($sql);
echo "Registered successfully";
$pdo=null;
}
?>