
<?php
session_start();
//$ste=$_GET['pi'];
//$pno=$_POST['pno'];
$pdo=new PDO("mysql:host=localhost;dbname=test","root","");
//echo $pno;

if (isset($_POST['pno'])){
    $recordId = $_POST['pno'];
    $mail=$_GET['pi'];
   
    $pdo->exec("update users set phone=$recordId where email='$mail'");
   
}
echo "Updated Successfully";

//echo $pno;

$_SESSION['status']="Active";
header("location:adminindex.php")
?>

