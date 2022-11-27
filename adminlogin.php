<?php
session_start();
$_SESSION['status']="Active";
$email=$_POST['email'];
$psw=$_POST['psw'];




if(($email=="admin@ugw" && $psw=="12345678"))
{
  echo "Success";
}

else
{
  echo "Failure";
}
$pdo=null;
?>