<?php
include("../../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;
use Libs\Database\UsersAnotherTable;
use Libs\Database\UsersContentTable;

session_start();
if($_GET["rd"] != $_SESSION["checkRandomNumber"]){
    HTTP::redirect("/admin/contact/users_msg.php");
}

$database = new UsersContentTable(new MySQL());
$result = $database->deleteMsg($_GET["id"]);

if($result){
    HTTP::redirect("/admin/contact/users_msg.php");
}else{
    HTTP::redirect("/admin/contact/users_msg.php");
}
