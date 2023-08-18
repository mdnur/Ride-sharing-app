<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/MainTable.php";

use lib\Database;
use lib\MainTable;

class RouteTable extends MainTable
{
    protected $table = "route";


    public function getRouteByFieldNameByToday($fieldName, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName . " AND DATE(StartJourneyTime) = CURDATE()";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount(); //PDO::FETCH_OBJ
    }

    public function getRouteByFieldNameAndDate($fieldName, $value, $date)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName . " AND DATE(StartJourneyTime) = :date";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount(); //PDO::FETCH_OBJ
    }

    public function getRouteByFieldNameAndDateAndFromToday($fieldName, $value, $date)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName . " AND DATE(StartJourneyTime) >= :date ORDER BY StartJourneyTime DESC";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount(); //PDO::FETCH_OBJ
    }


    public function getRouteByFieldName($fieldName, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->execute();
        return $stmt->fetchAll();
        // return $stmt->rowCount(); //PDO::FETCH_OBJ
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

    public function readAllStatus($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE status =:status  ORDER BY id DESC ";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":status", $id);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function readAllByFromAndTo($from, $to)
    {
        $sql = "SELECT r.id,r.fare,
            r.StartJourneyTime,
            r.DepartureTime,
            lf.name AS fromLocationName,
            lt.name AS toLocationName,
            (v.capacity - IFNULL(ur.total_bookings, 0)) AS available_seats
            FROM route r
            JOIN location lf ON r.locationId_From = lf.id
            JOIN location lt ON r.locationId_To = lt.id
            JOIN vehicle v ON r.vehicleID = v.id
            LEFT JOIN (
            SELECT rideBookID, COUNT(*) AS total_bookings
            FROM userRideBook
            GROUP BY rideBookID
            ) ur ON r.id = ur.rideBookID
            WHERE r.locationId_From = :from   AND r.locationId_To = :to And DATE(r.StartJourneyTime) >= CURDATE() 
            AND r.status = 0
            ORDER BY r.id DESC;";

        $stmt = Database::prepare($sql);
        $stmt->bindParam(":from", $from);
        $stmt->bindParam(":to", $to);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    public function readAllByDate($date)
    {
        $sql = "SELECT r.fare,
                    r.StartJourneyTime,
                    r.DepartureTime,
                    lf.name AS fromLocationName,
                    lt.name AS toLocationName,
                    (v.capacity - IFNULL(ur.total_bookings, 0)) AS available_seats
                FROM route r
                JOIN location lf ON r.locationId_From = lf.id
                JOIN location lt ON r.locationId_To = lt.id
                JOIN vehicle v ON r.vehicleID = v.id
                LEFT JOIN (
                    SELECT rideBookID, COUNT(*) AS total_bookings
                    FROM userRideBook
                    GROUP BY rideBookID
                ) ur ON r.id = ur.rideBookID
                WHERE DATE(r.StartJourneyTime) >= :date
                AND r.status = 0
            ORDER BY r.id DESC;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":date", $date);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getDriverIncomeByMonth($driverID, $month, $year)
    {
        $sql = "SELECT SUM(driverPayment) AS totalPayment
            FROM route
            WHERE driverID = :driverID
            AND MONTH(StartJourneyTime) = :month
            AND YEAR(StartJourneyTime) = :year
            AND status = 2";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":driverID", $driverID);
        $stmt->bindParam(":month", $month);
        $stmt->bindParam(":year", $year);
        $stmt->execute();
        return $stmt->fetch();
    }
}
