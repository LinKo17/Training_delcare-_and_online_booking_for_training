<?php 
include("vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\UserLoginSystem;

$database = new UserLoginSystem(new MySQL());
print_r($database-> userRoleIdAndRolesId());



