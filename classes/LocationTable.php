<?php

require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";
use lib\Database;
use lib\MainTable;

class LocationTable extends MainTable
{
    protected $table = "location";

    public function getAllLocationExcept($id){
        $sql ="SELECT * FROM ".$this->table." WHERE id =:id";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetchALL();
    }
}