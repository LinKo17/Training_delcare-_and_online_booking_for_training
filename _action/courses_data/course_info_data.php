<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;

$database = new UsersAnotherTable(new MySQL);
$result = $database->takeCourse();
