<?php
include("../../vendor/autoload.php");
use Helper\HTTP;
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;

$id = $_GET["id"];
$direction = $_GET["d"];

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    if(trim($direction) == "cs"){
        HTTP::redirect("/admin/request_register/confirmStudents.php");
    }elseif(trim($direction) =="sl"){
        HTTP::redirect("/admin/request_register/studentLimit.php");

    }
}

$database = new StuRegisterForm(new MySQL());
$result = $database->deleteRegister($id);


if(trim($direction) == "cs"){
    HTTP::redirect("/admin/request_register/confirmStudents.php");
}elseif(trim($direction) =="sl"){
    HTTP::redirect("/admin/request_register/studentLimit.php");

}