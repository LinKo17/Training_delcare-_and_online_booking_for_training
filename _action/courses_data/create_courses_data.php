<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;


print_r($_POST);

echo $course = htmlspecialchars($_POST["course"]);
echo $fee    = htmlspecialchars($_POST["fee"]);

$database = new UsersAnotherTable(new MySQL);
$data = $database->insertCourse($course,$fee);

if($data){
    session_start();
    $_SESSION["course_success"] = "New Course is created";
    HTTP::redirect("/admin/courses/create_course.php");
}else{
    session_start();
    $_SESSION["course_fail"] = "New Course creation is fail";
    HTTP::redirect("/admin/courses/create_course.php");
}