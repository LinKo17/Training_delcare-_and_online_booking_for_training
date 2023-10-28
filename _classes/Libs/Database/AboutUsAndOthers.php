<?php
namespace Libs\Database;

class AboutUsAndOthers{
    private $db;

    public function __construct(MySQL $mysql){
         $this->db = $mysql->connect();
    }
    
    public $test = "helo";
    public function takeAboutUsData(){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM about_us");
        $query->execute();
        return $query->fetch();
    }

    public function editAboutUsData($id,$data){
        $database = $this->db;
        $query = $database->prepare("UPDATE about_us SET about_us=:about_us,updated_at=Now() WHERE id=:id");
        return $query->execute([
            "id"=> $id,
            "about_us" =>$data
        ]);
    }

}
