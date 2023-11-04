<?php
include("../../vendor/autoload.php");

use Helper\Auth;
use Helper\HTTP;
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/request_register/studentLimit.php");
}

 $stu_id = $_GET["cl_id"];

$database = new StuRegisterForm(new MySQL());
$database->updateOpenClose($stu_id,"open");

HTTP::redirect("/admin/request_register/confirmStudents.php");