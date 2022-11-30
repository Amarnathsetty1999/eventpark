<?php
$pid=$_POST['eventid'];
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from events where eventid='$pid'"); 
$pd="";
if(($row=$result->fetch()))
{
   $pd=$row['pdesc']; 
}
$pdo=null;
echo "<p>$pd</p>";
?>
