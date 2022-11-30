<?php
session_start();
$email=$_COOKIE['email'];

$target_dir = "idupload/";

$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fname= $_FILES["fileToUpload"]["name"];
echo $email;
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  $pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");
  $result=$pdo->query("select * from photoid where email='$email'"); 
  if(($row=$result->fetch()))
  {
    $pdo->exec("update photoid set image_name='$fname' where email='$email'");
    echo "Id updated";
    $pdo=null;
    exit;
  }
  else{
    $pdo->exec("INSERT into photoid values('$fname','$email')");

   echo "Id uploaded";

  }
 


}


?>