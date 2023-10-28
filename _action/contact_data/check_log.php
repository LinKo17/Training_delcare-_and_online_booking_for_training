<?php 
include("../../vendor/autoload.php");

use Helper\HTTP;
session_start();

$_SESSION["notice"] = "--  First Sign In of Register! --";

HTTP::redirect("/others/contact_us.php");
