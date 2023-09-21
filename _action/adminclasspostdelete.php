<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helper\HTTP;

if($_GET["rd"] === $_SESSION["checkRandomNumber"]){
    $database = new UsersTable(new MySQL);
    $database->deleteClassPost($_GET["id"]);
    session_start();
    $_SESSION["insert_post"] = "A post is successfully delete";
    HTTP::redirect("/admin/createclassinfo.php");
}else{
    session_start();
    $_SESSION["insert_post_fail"] = "Fail in delete";
    HTTP::redirect("/admin/createclassinfo.php");
}
