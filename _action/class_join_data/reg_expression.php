<?php
function checkUser($userCheck){
    if(strlen($userCheck) >=1 && strlen($userCheck) <=25){
        //a-z,A-Z,0-9,space
        $result = preg_match("/^[a-zA-Z\s]+$/",$userCheck);       

        if($result){
            return true;
        }else{
            return false;
        }

    }else{
        return false;
    }
}

function phone($phone){
    if(preg_match('/^[\d|\s|\+|-]+$/',$phone)){
        return true;
    }else{
        return false;
    }
}

function checkEmail($emailCheck){
    $result = preg_match("/^([\w]+\@[a-z]+\.[a-z]+)$/",$emailCheck);
    if($result){
        return true;
    }else{
        return false;
    }
}