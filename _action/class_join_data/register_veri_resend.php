<?php
include("../../vendor/autoload.php");
use Helper\HTTP;
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;
use Helper\Auth;

$rd_id = strlen(strval($_GET["id"]));

if ($rd_id == 5) {
    $str_id = substr($_GET["id"], 0, 1);
} elseif ($rd_id == 6) {
    $str_id = substr($_GET["id"], 0, 2);
} else {
    // HTTP::redirect("/index.php");
    echo "404";
}

$id = $str_id;

$database = new StuRegisterForm(new MySQL());
$database->changeShow($id,2);

session_start();
$rd = Auth::randomNumber();
HTTP::redirect("/class_join/confirm_code.php","rd=$rd&&stu=$id");






