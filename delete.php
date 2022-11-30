
<?php
session_start();
//$ste=$_GET['pi'];
// $pno=$_POST['pp'];
$pdo=new PDO("mysql:host=localhost;dbname=park_tickets","root","");

if (isset($_GET['pi'])){
    $recordId = $_GET['pi'];
    
    $pdo->exec("delete from customers where email='$recordId'");
    echo "Deleted Successfully";
   
}
// if (isset($_GET['pp'])){
//     $recordId = $_GET['pp'];
//     //echo $recordId;
//     //$pdo->query("delete from orders where pid=$recordId");
   
// }








$_SESSION['status']="Active";
header("location:adminindex.php")
?>