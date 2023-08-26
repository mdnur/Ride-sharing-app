<?php
// require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";

require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/Database.php'));

use lib\Database;
use lib\MainTable;

class SubLocationTable extends MainTable{
    protected $table = "SubLocation";




    public function getSubLocationByFieldName($fieldName,$value){
        $sql = "SELECT * FROM ".$this->table." WHERE  ".$fieldName."= :" .$fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":".$fieldName."",$value);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount();//PDO::FETCH_OBJ
    }
}