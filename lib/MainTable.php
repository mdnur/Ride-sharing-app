<?php

namespace lib;

abstract class MainTable
{
    protected  $table;
    protected $data;

    // abstract public function Insert();

    // abstract public function update($id);

    public function delete($id) {
        $sql ="DELETE FROM ".$this->table." WHERE id=:id";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":id",$id );
        return $stmt->execute();
    }
    public function insert($table, $data) {
        $columns = implode(", ", array_keys($data));
        $placeholders = ":" . implode(", :", array_keys($data));
        $sql = "INSERT INTO " . $table . " (" . $columns . ") VALUES (" . $placeholders . ")";
        $stmt = Database::prepare($sql);

        foreach ($data as $column => $value) {
            $stmt->bindParam(":" . $column, $data[$column]);
        }

        return $stmt->execute();
    }



    public function readByid($id) {
        $sql ="SELECT * FROM ".$this->table." WHERE id =:id";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function readAll() {
        $sql ="SELECT * FROM ".$this->table." ORDER BY id DESC ";
        $stmt =Database::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}