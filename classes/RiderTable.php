<?php
// require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
// require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/MainTable.php";

require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/Database.php'));

use lib\Database;
use lib\MainTable;

class RiderTable extends MainTable
{
    protected $table = "rider";


    public function getRiderByEmailAndPassword($email, $password)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE email = :email AND password = :password";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        return $stmt->fetch(); //PDO::FETCH_OBJ
    }

    public function getRiderByFieldName($fieldName, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->execute();
        return $stmt->rowCount(); //PDO::FETCH_OBJ
    }

    public function getRiderByFieldNameS($fieldName, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->execute();
        return $stmt->fetch(); //PDO::FETCH_OBJ
    }

    public function searchByFieldName($fieldName, $value)
    {
        // $sql = "SELECT name FROM ".$this->table." WHERE ".$fieldName." LIKE '%':".$fieldName."'%' LIMIT 10";
        $sql = "SELECT phone FROM rider WHERE phone LIKE :" . $fieldName . " LIMIT 10";
        $stmt = Database::prepare($sql);
        $searchValue = '%' . $value . '%';
        $stmt->bindParam(':' . $fieldName, $searchValue, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getRiderDataByFieldName($fieldName, $value)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE  " . $fieldName . "= :" . $fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":" . $fieldName . "", $value);
        $stmt->execute();
        return $stmt->fetch(); //PDO::FETCH_OBJ
    }
}
