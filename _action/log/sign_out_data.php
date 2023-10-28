<?php
include("../../vendor/autoload.php");
use Helper\HTTP;

session_start();
session_destroy();
HTTP::redirect("/index.php");