<?php
session_start();
ob_start();
if(isset($_SESSION["nameDatabase"]) && isset($_GET['act']) && $_GET['act'] == 'create' ){
    try {
        $name =  $_SESSION["name"];
        $pass =  $_SESSION["pass"] ;
        $nameclb= $_SESSION["nameDatabase"];
        $dbclb = $_SESSION['codeDatabase'];

        $connAdmin = new PDO("mysql:host=localhost;dbname=sqladmin", "root", "");
        $sqladmin = "INSERT INTO sqladmin.formds (username, password, nameclb,dbclb)
            VALUES ('$name', '$pass', '$nameclb','$dbclb')";
        $connAdmin->exec($sqladmin);
        $dbname = $_SESSION['codeDatabase'];
        $conn = new PDO("mysql:host=localhost",'root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $dbname CHARACTER SET utf8 collate utf8_unicode_ci";
        $conn->exec($sql);
    } catch(PDOException $e) {
        echo $e->getMessage();
    }
    header("location: ../connent/create.php?id=oke");
}