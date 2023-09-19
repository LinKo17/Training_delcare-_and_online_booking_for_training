<?php
namespace Libs\Database;

class UsersTable{
    private $db;
    public function __construct(MySQL $mysql){
         $this->db = $mysql->connect();
    }
    public $test = "helo";

    //user register
    public function userInsert($sureUserName,$sureUserEmail,$surePassword,$sureDateOfBirth,$sureGender){
        $database = $this->db;
        $query= $database->prepare("INSERT INTO users_info (name,email,password,date_of_birth,gender,created_at) VALUES (:sureUserName,:sureUserEmail,:surePassword,:sureDateOfBirth,:sureGender,NOW())");

        $passwordHash = password_hash($surePassword,PASSWORD_DEFAULT); 

        $result = $query->execute([
            "sureUserName" => $sureUserName,
            "sureUserEmail" => $sureUserEmail,
            "surePassword" => $passwordHash,
            "sureDateOfBirth" => $sureDateOfBirth,
            "sureGender" => $sureGender,
        ]);

        return $result;
    }

    //user login check 
    public function checkUserLogin($email,$password){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM users_info WHERE email=:email");
        $query->execute([
            "email"=>$email
        ]);
        $userData = $query->fetch();
        if(password_verify($password,$userData->password)){
            return $userData;
        }else{
            return false;
        }
    }


}