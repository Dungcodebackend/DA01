<?php
session_start();
ob_start();
require_once "./view/hearderContent.php";
if(isset($_GET['act']) && $_GET['act']){
     $act = $_GET['act'];
     switch ($act){
         case 'delete':{

             break;
         }
         case 'update':{

             break;
         }
         default :{
             header("location: ./error/404.php");
             break;
         }
     }
}else {
    require_once "./view/dsstudent.php";
}
require_once "./view/footerContent.php";