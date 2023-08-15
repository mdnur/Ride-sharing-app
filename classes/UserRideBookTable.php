<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/MainTable.php";

use lib\Database;
use lib\MainTable;

class UserRideBookTable extends MainTable
{
    protected $table = "userRideBook";




    public function getSubLocationByFieldName($fieldName, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount();//PDO::FETCH_OBJ
    }

    public function getRiders($routeId)
    {
        $sql = "SELECT r.name,r.phone, 
        pickupLocation.name AS pickup_location,
        dropLocation.name AS drop_location
        FROM userRideBook ur
        JOIN rider r ON ur.riderID = r.id
        JOIN SubLocation pickupLocation ON ur.pickUpId = pickupLocation.id
        JOIN SubLocation dropLocation ON ur.dropId = dropLocation.id
        WHERE ur.rideBookID =  :routeId;";

        $stmt = Database::prepare($sql);
        $stmt->bindParam(":routeId", $routeId);
        $stmt->execute();
        return $stmt->fetchAll(); //PDO::FETCH_OBJ
    }
}
