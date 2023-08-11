<?php
ob_start();
require_once "./view/header.php";
if(isset($_GET['act']) && $_GET['act'] ){
$act = $_GET['act'];
switch ($act) {
    case 'login':
    {
        require_once "./view/login.php";
        break;
    }
    case 'register':
    {
        require_once "./view/register.php";
        break;
    }
    default:{
        header("location: ./error/404.php");
        break;
    }
  }
}
else{
    require_once "./view/home.php";
}

require_once "./view/footer.php";
