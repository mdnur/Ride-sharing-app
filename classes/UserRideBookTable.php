<?php
// require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/MainTable.php";

require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/Database.php'));


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


    public function getRideBookByRiderIdAndDate($riderId, $date)
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

    public function getRiderBookByRiderIdAndStatus($riderId, $status)
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
    public function countRideBooking($route)
    {
        $sql = "SELECT COUNT(*) AS total FROM userRideBook WHERE rideBookID = :route";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":route", $route);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function userRideBookWithRoute($userRideID)
    {
        $sql = "SELECT urb.id AS ride_book_id,
                r.id AS route_id,
                r.driverID,
                d.name AS driver_name,
                d.phone AS driver_phone,
                r.vehicleID,
                r.locationId_From,
                lf.name AS from_location_name,
                r.locationId_To,
                lt.name AS to_location_name,
                r.Fare,
                r.StartJourneyTime,
                r.DepartureTime,
                r.driverPayment,
                r.createdbyID,
                r.created_at AS route_created_at,
                r.status AS route_status,
                s_pick.name AS pick_up_location_name,
                s_drop.name AS drop_location_name,
                rb.riderID AS rider_id,
                rb.pickUpId AS pick_up_id,
                rb.dropId AS drop_id,
                rb.created_at AS ride_book_created_at
                FROM userRideBook rb
                JOIN route r ON rb.rideBookID = r.id
                JOIN subLocation s_pick ON rb.pickUpId = s_pick.id
                JOIN subLocation s_drop ON rb.dropId = s_drop.id
                JOIN location lf ON r.locationId_From = lf.id
                JOIN location lt ON r.locationId_To = lt.id
                JOIN userRideBook urb ON rb.id = urb.id
                JOIN driver d ON r.driverID = d.id WHERE rb.id = :userRideID";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":userRideID", $userRideID);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function getStatusByName($id)
    {
        if ($id == 2) {
            echo "Complete";
        } else if ($id == 1) {
            echo "Processing";
        } else if ($id == 3) {
            echo "Cancel";
        } else if ($id == 0) {
            echo "Active";
        }
    }

    public function getRideBookByDateAndAll( $date)
    {
        $sql = "SELECT urb.id AS rideBookID,rider.username AS userName, urb.riderID, urb.pickUpId, urb.dropId,
        p.name AS pickUpLocation, d.name AS dropLocation,r.locationId_From,r.locationId_To,
        dr.name AS driverName, r.status AS rideStatus,
        r.Fare AS rideFare, r.StartJourneyTime 
        FROM userRideBook urb
        JOIN SubLocation p ON urb.pickUpId = p.id
        JOIN SubLocation d ON urb.dropId = d.id
        JOIN rider ON urb.riderID = rider.id
        JOIN route r ON urb.rideBookID = r.id
        JOIN driver dr ON r.driverID = dr.id
        WHERE  DATE(r.StartJourneyTime) >= :dates ORDER BY r.StartJourneyTime DESC";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":dates", $date);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount();//PDO::FETCH_OBJ
    }

    public function showAllBooking()
    {
        $sql = "SELECT urb.id AS rideBookID,rider.username AS userName, urb.riderID, urb.pickUpId, urb.dropId,
        p.name AS pickUpLocation, d.name AS dropLocation,r.locationId_From,r.locationId_To,
        dr.name AS driverName, r.status AS rideStatus,
        r.Fare AS rideFare, r.StartJourneyTime 
        FROM userRideBook urb
        JOIN SubLocation p ON urb.pickUpId = p.id
        JOIN SubLocation d ON urb.dropId = d.id
        JOIN rider ON urb.riderID = rider.id
        JOIN route r ON urb.rideBookID = r.id
        JOIN driver dr ON r.driverID = dr.id  ORDER BY r.StartJourneyTime DESC";
        $stmt = Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount();//PDO::FETCH_OBJ
    }
    public function countStatusByActive()
    {
        $sql = "SELECT COUNT(*) AS totalBook
                FROM ".$this->table;
        $stmt = Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }
}
