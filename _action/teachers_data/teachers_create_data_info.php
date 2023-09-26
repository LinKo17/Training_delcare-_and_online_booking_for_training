<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Helper\Auth;

$db = new UsersTable(new MySQL);
$data = $db->showTeacherInfo();

session_start();
$random =  Auth::randomNumber();