<?php
$pid=$_POST['pid'];
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
$result=$pdo->query("select * from events where pid='$pid'"); 
$pd="";
if(($row=$result->fetch()))
{
   $pd=$row['pdesc']; 
}
$pdo=null;
echo "<p>$pd</p>";
?>
