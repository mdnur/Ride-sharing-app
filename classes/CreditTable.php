<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/lib/MainTable.php";

use lib\Database;
use lib\MainTable;

class CreditTable extends MainTable
{
    protected $table = "user_credit";
    protected $table2 = "expense_credit";

    public function getRemainingCredit($id)
    {
        $sql = "SELECT
        (SELECT SUM(credit_amount) FROM user_credit WHERE user_id = :user_id) -
        (SELECT SUM(expense_amount) FROM expense_credit WHERE user_id = :user_id) AS remaining_credit;";
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":user_id", $id);
        $stmt->execute();
        return $stmt->fetch();
    }


    public function getRiderByFieldName($fieldName,$value){
        $sql = "SELECT * FROM ".$this->table." WHERE  ".$fieldName."= :" .$fieldName;
        $stmt = Database::prepare($sql);
        $stmt->bindParam(":".$fieldName."",$value);
        $stmt->execute();
        return $stmt->fetchAll();//PDO::FETCH_OBJ
    }
}
