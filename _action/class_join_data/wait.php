<?php
include("../../vendor/autoload.php");

use Helper\HTTP;
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;

$id = $_GET["id"];
$direction = $_GET["d"];

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/index.php");
}

$database = new StuRegisterForm(new MySQL());
$result = $database->waitAndNotWait($_GET["id"],"wait");

if($result){
    if($direction == "cs"){
        HTTP::redirect("/admin/request_register/confirmStudents.php");
    }elseif($direction == "sl"){
        HTTP::redirect("/admin/request_register/studentLimit.php");
    }else{
        HTTP::redirect("/index.php");
    }
}