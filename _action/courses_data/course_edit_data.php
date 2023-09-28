<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;

$id = htmlspecialchars($_POST["id"]);
$course = htmlspecialchars($_POST["course"]);
$fee =htmlspecialchars($_POST["fee"] );


$database = new UsersAnotherTable(new MySQL);
$result = $database->updateCourse($id,$course,$fee);

if($result){
    session_start();
    $_SESSION["course_edit"] = "A course is sccessfully edit";
    HTTP::redirect("/admin/courses/course_info.php");
}else{
    session_start();
    $_SESSION["course_edit_fail"] = "Course edition is fail";
    HTTP::redirect("/admin/courses/course_info.php");    
}
