<?php
namespace Libs\Database;
use PDO;
use PDOException;

class MySQL{
    private $db = null;

    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    public function __construct(
        $dbHost = "localhost",
        $dbName = "pratice_school_management_system",
        $dbUser = "root",
        $dbPassword = "",
    ){
        $this->dbHost = $dbHost;
        $this->dbName = $dbName;
        $this->dbUser = $dbUser;
        $this->dbPassword = $dbPassword;
    }

    public function connect(){
        try{
            $this->db = new PDO("mysql:dbhost=$this->dbHost;dbname=$this->dbName;",$this->dbUser,$this->dbPassword,
            [
                PDO::ATTR_ERRMODE => PDO:: ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            ]);
            return $this->db;
        }catch(PDOException $e){
            return $e->getMessage();
            exit();
        }
    }
}