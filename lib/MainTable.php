<?php

namespace lib;

abstract class MainTable
{
    protected  $table;

    abstract public function Insert();

    abstract public function update($id);


    public function delete($id) {
        $sql ="DELETE FROM ".$this->table." WHERE id=:id";
        $stmt =Database::prepare($sql);
        $stmt->bindParam(":id",$id );
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