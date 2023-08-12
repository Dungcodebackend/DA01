<?php
session_start();
ob_start();
$check = 1;
if(isset($_GET['id'])&&$_GET['id']=='oke') {
    require_once "../connent/database.php";
    try {
        $dbname = $_SESSION['codeDatabase'];
        $conn = new PDO("mysql:host=localhost;dbname=$dbname", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = new \connent\database();
        $sql->createTableDs($conn);
        $sql->createTableDsCT($conn);
        $check =1;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
if($check==1){
    header("location: ../index.php?act=win ");
}
