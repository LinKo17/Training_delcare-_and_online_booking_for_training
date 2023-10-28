<?php 
include("../../vendor/autoload.php");
use Helper\HTTP;

session_start();
if($_SESSION["checkRandomNumber"] != $_GET["rd"]){
    HTTP::redirect("/admin/adminpanel.php");
}


use Libs\Database\MySQL;
use Libs\Database\UserLoginSystem;

$database = new UserLoginSystem(new MySQL());
echo $database-> changeRole($_GET["id"],$_GET["role"]);
HTTP::redirect("/admin/adminpanel.php");