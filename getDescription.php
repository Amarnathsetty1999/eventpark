<?php
$pid=$_POST['pid'];
$pdo=new PDO("mysql:host=localhost;dbname=wta","root","");
$result=$pdo->query("select * from product where pid='$pid'"); 
$pd="";
if(($row=$result->fetch()))
{
   $pd=$row['pdesc']; 
}
$pdo=null;
echo "<p>$pd</p>";
?>
