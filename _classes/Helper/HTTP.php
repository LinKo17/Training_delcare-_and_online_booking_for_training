<?php
namespace Helper;

class HTTP{
    static $base = "http://localhost/MyPraticeProject/Training_delcare _and_online_booking_for_training/";

    static function redirect($path,$q=""){
        $url = static::$base . $path;

        if($q) $url .= "?$q";

        header("location: $url");
        exit();
    }


}