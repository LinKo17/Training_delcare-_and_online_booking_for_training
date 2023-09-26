<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
$database = new UsersTable(new MySQL);
$data = $database->showTeacherInfo();