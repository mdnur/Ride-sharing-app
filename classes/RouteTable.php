<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/MainTable.php";

use lib\Database;
use lib\MainTable;

class RouteTable extends MainTable
{
    protected $table = "route";


    public function getRouteByFieldName($fieldName, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->execute();
        return $stmt->rowCount(); //PDO::FETCH_OBJ
    }

    public function getStatus($status)
    {
        switch ($status) {
            case 1:
                return "Active";
                break;
            case 2:
                return "Done";
                break;
        }
    }
}
