
<?php
session_start();
//$ste=$_GET['pi'];
//$pno=$_POST['pno'];
$pdo=new PDO("mysql:host=localhost;dbname=test","root","");
//echo $pno;
if (isset($_GET['pi'])){
    $recordId = $_GET['pi'];
    echo $recordId;
    //$pdo->query("delete from orders where pid=$recordId");
   
}
if (isset($_GET['pp'])){
    $recordId = $_GET['pp'];
    echo $recordId;
    //$pdo->query("delete from orders where pid=$recordId");
   
}

//echo $pno;






$_SESSION['status']="Active";
//header("location:adminindex.php")
?>