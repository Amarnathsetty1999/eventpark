
<?php
session_start();
date_default_timezone_set("Asia/Calcutta");
$email=$_POST['email'];
$pdo=new PDO("mysql:host=localhost;dbname=test","root","");


$pdo->query("delete from orders where pid='$ste");







$_SESSION['status']="Active";
?>