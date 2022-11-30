
<?php
session_start();

$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");


if (isset($_POST['pno'])){
    $recordId = $_POST['pno'];
    $mail=$_GET['pi'];
   
    $pdo->exec("update customers set phone=$recordId where email='$mail'");
   
}
echo "Updated Successfully";



$_SESSION['status']="Active";
header("location:adminindex.php")
?>

