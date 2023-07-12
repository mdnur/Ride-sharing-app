<?php
require_once "lib/Database.php";
use lib\Database;

class RiderTable{
    private $table = "rider";


    public function getRiderByEmailAndPassword($email,$password){
        $sql = "SELECT * FROM ".$this->table." WHERE email = :email AND password = :password";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        return $stmt->fetch();//PDO::FETCH_OBJ
    }
}