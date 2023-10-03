<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;


use Libs\Database\UsersContentTable;
$database = new UsersContentTable(new MySQL());
$data = $database->takeData();