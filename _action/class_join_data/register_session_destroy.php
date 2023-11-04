<?php
include("../../vendor/autoload.php");

use Helper\HTTP;
use Helper\Auth;

$id = $_GET["id"];
session_start();
$random = Auth::randomNumber();

unset($_SESSION["register_member_data"]);
HTTP::redirect("/class_join/register_form.php","id=$id&&rd=$random");
