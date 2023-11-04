<?php 
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\StuRegisterForm;

$database = new StuRegisterForm(new MySQL());
print_r($database->takeWaitBtn(1));

