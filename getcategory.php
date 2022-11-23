<?php

$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");
$result=$pdo->query("select * from category"); 
$cat="";
while(($row=$result->fetch()))
{
   $cname=$row['cname'];
   $cat.=$cname."#";
  
}
// Electronics#Utility#
$pdo=null;
echo $cat;
?>

