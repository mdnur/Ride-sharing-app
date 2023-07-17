UserRideBookTable

<?php
require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";
use lib\Database;
use lib\MainTable;

class UserRideBookTable extends MainTable{
    protected $table = "userRideBookTable";




    public function getSubLocationByFieldName($fieldName,$value){
        $sql = "SELECT * FROM ".$this->table." WHERE  ".$fieldName."= :" .$fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":".$fieldName."",$value);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount();//PDO::FETCH_OBJ
    }
}