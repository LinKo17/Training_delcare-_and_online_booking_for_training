<?php
include("../../vendor/autoload.php");

use Helper\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UsersTable;

$id = $_GET["id"];
$direction = $_GET["d"];
session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/index.php");
}

$database = new UsersTable(new MySQL());
$result = $database->deleteClassPost($id);

if($result){
    if($direction == "cs"){
        HTTP::redirect("/admin/request_register/confirmStudents.php");
    }elseif($direction == "sl"){
        HTTP::redirect("/admin/request_register/studentLimit.php");
    }else{
        HTTP::redirect("/index.php");
    }
}