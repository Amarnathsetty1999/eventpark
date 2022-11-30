<?php

$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from category"); 
$cat="";
while(($row=$result->fetch()))
{
   $cname=$row['catname'];
   $cat.=$cname."#";
  
}
// Electronics#Utility#
$pdo=null;
echo $cat;
?>

