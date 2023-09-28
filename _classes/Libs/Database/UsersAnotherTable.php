<?php
namespace Libs\Database;

class UsersAnotherTable{
    private $db;

    public function __construct(MySQL $mysql){
         $this->db = $mysql->connect();
    }
    
    public function insertCourse($course,$fee){
        $database = $this->db;
        $query = $database->prepare("INSERT INTO courses (course,fee,created_at) VALUES (:course, :fee, NOW())");
        $result =$query->execute([
            "course" => $course,
            "fee" => $fee,
        ]);
        return $result;
        
    }

    public $helo = "testing";

    public function takeCourse(){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM courses");
        $query->execute();
        return $query->fetchAll();
    }

    public function takeSingleCourse($id){
        $database = $this->db;
        $query = $database->prepare("SELECT * FROM courses WHERE id=:id");
        $query->execute([
            "id" => $id,
        ]);
        return $query->fetch();
    }

    public function updateCourse($id,$course,$fee){
        $database = $this->db;
        $query = $database->prepare("UPDATE courses SET course=:course,fee=:fee,updated_at=Now() WHERE id=:id");
        return $query->execute([
            "id" => $id,
            "course" =>$course,
            "fee"=>$fee
        ]);
    }

    public function hidecourse($id,$hide){
        $database = $this->db;
        $query = $database->prepare("UPDATE courses SET hide=:hide,updated_at=Now() WHERE id=:id");
        $result = $query->execute([
            "id"=> $id,
            "hide" => $hide,
        ]);

        return $result;
    }

    // join teachers table and course table
    public function joinTeachersAndCourses($id){
        $database = $this->db;
        $query = $database->prepare("SELECT teachers.*,courses.course AS c_course,courses.fee As c_fee FROM teachers LEFT JOIN courses ON teachers.category_id = courses.id WHERE teachers.id =:id");
        $query->execute([
            "id" => $id
        ]);
        return $query->fetchAll();
    }

    public function joinTeachersAndCoursesAll(){
        $database = $this->db;
        $query = $database->query("SELECT teachers.*,courses.course AS c_course,courses.fee As c_fee FROM teachers LEFT JOIN courses ON teachers.category_id = courses.id");
        return $query->fetchAll();
    }

    // join class_posts and courses table
    public function joinClassPostsAndCourses($id){
        $database = $this->db;
        $query = $database->prepare("SELECT class_posts.*,courses.course AS c_course,courses.fee As c_fee FROM class_posts LEFT JOIN courses ON class_posts.category_id = courses.id WHERE class_posts.id =:id");
        $query->execute([
            "id" => $id
        ]);
        return $query->fetchAll();
    }

    public function joinClassPostsAndCoursesAll(){
        $database = $this->db;
        $query = $database->query("SELECT class_posts.*,courses.course AS c_course,courses.fee As c_fee FROM class_posts LEFT JOIN courses ON class_posts.category_id = courses.id ORDER BY class_posts.id DESC");
        return $query->fetchAll();
    }

    public function joinClassPostsAndCoursesLimit(){
        $database = $this->db;
        $query = $database->query("SELECT class_posts.*,courses.course AS c_course,courses.fee As c_fee FROM class_posts LEFT JOIN courses ON class_posts.category_id = courses.id ORDER BY class_posts.id DESC LIMIT 3");
        return $query->fetchAll();
    }

}