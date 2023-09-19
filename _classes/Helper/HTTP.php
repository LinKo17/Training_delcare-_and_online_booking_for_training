<?php
namespace Helper;

class HTTP{
    static $base = "http://localhost/MyPraticeProject/facebook";

    static function redirect($path,$q=""){
        $url = static::$base . $path;

        if($q) $url .= "?$q";

        header("location: $url");
        exit();
    }


}