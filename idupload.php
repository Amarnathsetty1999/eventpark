<?php
$target_dir = "idupload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
echo $_FILES["fileToUpload"]["name"];
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
  
  
  echo"File Uploaded";


  
 // echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";

}


?>