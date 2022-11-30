<?php
$pid=$_POST['pid'];
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from events where eventid='$pid'"); 
$pd="";
if(($row=$result->fetch()))
{
   $pd=$row['eventdescription']; 
}
$pdo=null;
echo "<p>$pd</p>";
?>
