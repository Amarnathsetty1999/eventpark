<?php
$email=$_POST['email'];
$psw=$_POST['psw'];
$name=$_POST['name'];
$pno=$_POST['pno'];

$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");
$result=$pdo->query("select * from users where email='$email'"); 
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
$sql="INSERT into users values('$email','$psw','$name','$pno')";
$result=$pdo->exec($sql);
echo "Registered successfully";
$pdo=null;
}
?>