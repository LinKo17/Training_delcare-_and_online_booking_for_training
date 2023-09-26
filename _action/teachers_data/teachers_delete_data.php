<?php
session_start();
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;

if($_GET["rd"] === $_SESSION["checkRandomNumber"]){
    $database = new UsersTable(new MySQL);
    $database->deleteTeacher($_GET["id"]);
    session_start();
    $_SESSION["teacher_update"] = "Teacher is successfully delete";
    HTTP::redirect("/admin/teachers/teachers_info.php");
}else{
    session_start();
    $_SESSION["teacher_update_fail"] = "Fail in delete";
    HTTP::redirect("/admin/teachers/teachers_info.php");
}