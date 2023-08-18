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

    public function getRideBookByRiderId($riderId)
    {
        $sql = "SELECT urb.id AS rideBookID, urb.riderID, urb.pickUpId, urb.dropId,
        p.name AS pickUpLocation, d.name AS dropLocation,
        dr.name AS driverName, r.status AS rideStatus,
        r.Fare AS rideFare, r.StartJourneyTime
        FROM userRideBook urb
        JOIN SubLocation p ON urb.pickUpId = p.id
        JOIN SubLocation d ON urb.dropId = d.id
        JOIN route r ON urb.rideBookID = r.id
        JOIN driver dr ON r.driverID = dr.id
        WHERE urb.riderID = :riderID ORDER BY r.StartJourneyTime DESC;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":riderID", $riderId);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount();//PDO::FETCH_OBJ
    }


    public function getRideBookByRiderIdAndDate($riderId,$date)
    {
        $sql = "SELECT urb.id AS rideBookID, urb.riderID, urb.pickUpId, urb.dropId,
        p.name AS pickUpLocation, d.name AS dropLocation,
        dr.name AS driverName, r.status AS rideStatus,
        r.Fare AS rideFare, r.StartJourneyTime
        FROM userRideBook urb
        JOIN SubLocation p ON urb.pickUpId = p.id
        JOIN SubLocation d ON urb.dropId = d.id
        JOIN route r ON urb.rideBookID = r.id
        JOIN driver dr ON r.driverID = dr.id
        WHERE urb.riderID = :riderID and DATE(r.StartJourneyTime) = :dates ORDER BY r.StartJourneyTime DESC;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":riderID", $riderId);
        $stmt->bindParam(":dates", $date);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount();//PDO::FETCH_OBJ
    }

    public function getRiderBookByRiderIdAndStatus($riderId,$status){
        $sql = "SELECT urb.id AS rideBookID, urb.riderID, urb.pickUpId, urb.dropId,
        p.name AS pickUpLocation, d.name AS dropLocation,
        dr.name AS driverName, r.status AS rideStatus,
        r.Fare AS rideFare, r.StartJourneyTime
        FROM userRideBook urb
        JOIN SubLocation p ON urb.pickUpId = p.id
        JOIN SubLocation d ON urb.dropId = d.id
        JOIN route r ON urb.rideBookID = r.id
        JOIN driver dr ON r.driverID = dr.id
        WHERE urb.riderID = :riderID AND r.status= :status1  ORDER BY r.StartJourneyTime DESC;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":riderID", $riderId);
        $stmt->bindParam(":status1", $status);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getStatus($status)
    {
        switch ($status) {
            case 0:
                return "Active";
                break;
            case 1:
                return "Processing";
                break;
            case 2:
                return "Completed";
                break;
            case 3:
                return "Canceled";
                break;
        }
    }
    public function countRideBooking($route){
        $sql = "SELECT COUNT(*) AS total FROM userRideBook WHERE rideBookID = :route";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":route", $route);
        $stmt->execute();
        return $stmt->fetch();
    }
}
