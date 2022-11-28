
<?php
session_start();
//$ste=$_GET['pi'];
// $pno=$_POST['pp'];
$pdo=new PDO("mysql:host=localhost;dbname=test","root","");

$pn = $_GET['pi'];
$dat= $_GET['pp'];



if (isset($_GET['pi'])){
   
    
    $pdo->exec("delete from orders where pid=$pn and dt='$dat'");
echo "Deleted Successfully";
    
   
}
// if (isset($_GET['pp'])){
//     $recordId = $_GET['pp'];
//     //echo $recordId;
//     //$pdo->query("delete from orders where pid=$recordId");
   
// }








$_SESSION['status']="Active";
//header("location:adminindex.php")
?>