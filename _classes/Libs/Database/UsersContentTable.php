<?php
namespace Libs\Database;

class UsersContentTable{
    private $db;

    public function __construct(MySQL $mysql){
         $this->db = $mysql->connect();
    }
    
    public function insertUsersContent($content,$email){
        $database = $this->db;
        $query = $database->prepare("INSERT INTO  user_contents (email,content,created_at, 	updated_at) VALUES (:email,:content,Now(),Now())");
        return $query->execute([
            "content" => $content,
            "email" => $email
        ]);
    }

    public function takeData(){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM user_contents ORDER BY id Desc");
        $query->execute();
        return $query->fetchAll();
    }

    public function singleTakeData($id){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM user_contents WHERE id=:id");
        $query->execute([
                "id"=>$id
            ]);
        return $query->fetch();            
    }

    public function afterCheckMsg($id,$done){
        $database = $this->db;
        $query= $database->prepare("UPDATE user_contents SET done=:done WHERE id=:id");
        return $query->execute([
            "id"=>$id,
            "done"=>$done
        ]);
    }

    public function deleteMsg($id){
        $database = $this->db;
        $query = $database->prepare("DELETE FROM user_contents WHERE id=:id");
        return $query->execute([
            "id" => $id,
        ]);
    }

    // media section + another edit media 7 object
    public function mediaData(){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM social_media");
        $query->execute();
        return $query->fetch();
    }

    public function facebookEdit($id,$facebook){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET facebook=:facebook,updated_at=Now() WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "facebook" => $facebook,
        ]);
    }
    public function viberEdit($id,$viber){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET viber=:viber,updated_at=Now()  WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "viber" => $viber,
        ]);
    }
    public function telegramEdit($id,$telegram){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET telegram=:telegram,updated_at=Now()  WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "telegram" => $telegram,
        ]);
    }

    public function phone_1($id,$phone_1){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET phone_1=:phone_1,updated_at=Now()  WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "phone_1" => $phone_1,
        ]);
    }
    public function phone_2($id,$phone_2){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET phone_2=:phone_2,updated_at=Now()  WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "phone_2" => $phone_2,
        ]);
    }
    public function phone_3($id,$phone_3){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET phone_3=:phone_3,updated_at=Now() WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "phone_3" => $phone_3,
        ]);
    }
    
    public function mailEdit($id,$mail){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET mail=:mail,updated_at=Now() WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "mail" => $mail,
        ]);
    }

    public function mailEdit_2($id,$mail_2){
        $database = $this->db;
        $query = $database->prepare("UPDATE social_media  SET mail_2=:mail_2,updated_at=Now() WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "mail_2" => $mail_2,
        ]);
    }

    public function indexFromEdit($id,$open_section_open_time_close_time,$open_section_open_date,$close_section_close_date,$quote_section,$burmese_address,$eng_address){
        $statement = $this->db->prepare("UPDATE social_media SET open_time =:open_time,open_date=:open_date,close_date=:close_date,quote =:quote,my_address=:my_address,eng_address=:eng_address,updated_At=Now() WHERE id=:id");
        return $statement->execute([
            "id" => $id,
            "open_time" => $open_section_open_time_close_time,
            "open_date" => $open_section_open_date,
            "close_date"=> $close_section_close_date,
            "quote" => $quote_section,
            "my_address"=>$burmese_address,
            "eng_address"=>$eng_address
        ]);
    }
}