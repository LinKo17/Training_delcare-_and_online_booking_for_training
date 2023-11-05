<?php
include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UserLoginSystem;
use Helper\Auth;

session_start();
$_SESSION["userInfo"];
Auth::checkUserRole();

