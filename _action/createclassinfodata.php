<?php
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Libs\Database\UsersAnotherTable;
use Helper\HTTP;
use Helper\Auth;

$db = new UsersAnotherTable(new MySQL);
$data = $db->joinClassPostsAndCoursesAll();

session_start();
$random =  Auth::randomNumber();