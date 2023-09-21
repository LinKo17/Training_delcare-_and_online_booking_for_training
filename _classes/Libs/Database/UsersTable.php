<?php
namespace Libs\Database;

class UsersTable{
    private $db;
    public function __construct(MySQL $mysql){
         $this->db = $mysql->connect();
    }
    public $test = "helo";

    public function insertClassPost($data){
        $database = $this->db;
        $query = $database->prepare("INSERT INTO  class_posts (image,description,category_id,teacher_id,class_date,class_time,created_at) VALUES (:image,:description,:category_id,:teacher_id,:class_date,:class_time,Now())");

        $result = $query->execute($data);
        return $result;
    }

    public function showClassPost(){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM class_posts ORDER BY id DESC");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }  

    public function showSingleData($id){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM class_posts WHERE (id=:id)");
        $query->execute([
            "id"=>$id,
        ]);
        $result = $query->fetch();

        return $result;
    }

    public function updateClassPostData($data){
        $database = $this->db;
        $query = $database->prepare("UPDATE   class_posts SET  image=:image,description=:description,category_id=:category_id,teacher_id=:teacher_id,class_date=:class_date,class_time=:class_time,update_at=Now() WHERE id=:id");

        $result = $query->execute($data);
        return $result;
    }

    public function deleteClassPost($id){
        $database = $this->db;
        $query = $database->prepare("DELETE FROM class_posts WHERE id=:id");
        $result = $query->execute([
            "id" => $id,
        ]);
        return $result;
    }
    
    public function indexPostDataShow(){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM class_posts ORDER BY id DESC LIMIT 3");
        $query->execute();
        $data = $query->fetchAll();
        return $data;
    }

}