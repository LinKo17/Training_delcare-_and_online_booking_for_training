<?php
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;

$database = new UsersTable(new MySQL);
$data = [
    "id" => 8,
    "teacher_img"=> "1695451795wolf4.jpg",
    "category_id"=> 1,
    "description" => "Helo one"
];
$database->hideTeacher(10,1);
