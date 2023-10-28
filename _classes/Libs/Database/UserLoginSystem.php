<?php
namespace Libs\Database;

class UserLoginSystem{
    private $db;

    public function __construct(MySQL $mysql){
         $this->db = $mysql->connect();
    }
    
    public $test = "helo";

    // sign up function
    public function insertUserdata($data){
        $database = $this->db;
        $query = $database->prepare("INSERT INTO user_login (username,email,password,created_at) VALUES (:username,:email,:password,Now())");

        $data["password"] = password_hash($data['password'],PASSWORD_DEFAULT);
        return $query->execute($data);
        
    }

        // // -------------------unit insert------
        // $unique = "SELECT * FROM members WHERE email='$email'";
        // $unique_db = mysqli_query($dbConnect,$unique);
        // if(mysqli_num_rows($unique_db) > 0){
        //     echo "already exist" . "<br>";
        // }else{
        //     $insert = "INSERT INTO members(name,email,password,created_at,updated_at) VALUES ('$name','$email','$pass',Now(),Now())";
        //     $insert_db = mysqli_query($dbConnect,$insert);
        //     return $insert_db;
        // }
        // //-------------------unit insert------

    // sign in function
    public function findByEmailAndPassword($email,$password){
        $statement = $this->db->prepare("SELECT * FROM user_login WHERE email=:email");
        $statement->execute(["email"=>$email]);

        $user = $statement->fetch();
        if(password_verify($password,$user->password)){
            return $user;
        }

        return false;

        //new
    }

    public function takeAllUserData(){
        $statement = $this->db->prepare("SELECT * FROM user_login");
        $statement->execute();
        return $statement->fetchAll();
    }

    // user management system method

    public function  userCheck($id,$done){
        $statement = $this->db->prepare("UPDATE user_login SET ban=:done WHERE id=:id");
        $statement->execute([
            "id" => $id,
            "done" => $done
        ]);

    }

    public function deleteUser($id){
        $statement = $this->db->prepare("DELETE FROM user_login WHERE id=:id");
        return $statement->execute([
            "id"=>$id
        ]);
    }

    public function changeRole($id,$role_id){
        $statement = $this->db->prepare("UPDATE user_login SET role_id=:role_id WHERE id=:id");
        $statement->execute([
            "id"=>$id,
            "role_id"=>$role_id
        ]);
    }

    // join user_login->role_id && roles->id in this section

    public function userRoleIdAndRolesId(){
        $statement = $this->db->prepare("SELECT user_login.*,roles.role AS r_role_id FROM user_login LEFT  JOIN roles ON user_login.role_id = roles.id");
        $statement->execute();
        return $statement->fetchAll();
    }

}
