<?php
require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";
use lib\Database;
use lib\MainTable;

class SubLocationTable extends MainTable{
    protected $table = "SubLocation";


    public function getSubLocationByEmailAndPassword($email,$password){
        $sql = "SELECT * FROM ".$this->table." WHERE email = :email AND password = :password";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        return $stmt->fetch();//PDO::FETCH_OBJ
    }

    public function getSubLocationByFieldName($fieldName,$value){
        $sql = "SELECT * FROM ".$this->table." WHERE  ".$fieldName."= :" .$fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":".$fieldName."",$value);
        $stmt->execute();
        return $stmt->rowCount();//PDO::FETCH_OBJ
    }
}