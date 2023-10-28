<?php
session_start();
function username($username){
    if(strlen($username) >= 6 && strlen($username) <= 15){
        if(preg_match('/^\w{6,15}$/',$username)){
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function email($email){
    if(preg_match("/^.{1,}@.{1,}\.[a-z|A-Z]{1,}$/",$email)){
        return true;
    }else{
        return false;
    }
}

function password($password){
    if(strlen($password) >= 6 && strlen($password) <= 15){
        if(preg_match('/^.{6,15}$/',$password)){
            if(preg_match('/.{1,}/',$password)){
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }else{
        return false;
    }
}