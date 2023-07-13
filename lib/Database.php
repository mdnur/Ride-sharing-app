<?php

namespace lib;
require_once $_SERVER['DOCUMENT_ROOT'].'/config/Config.php';

use PDO;
use PDOException;
use PDOStatement;

class Database {
    private static $pdo;

    public static function Connection(): PDO
    {
        if(!isset(self::$pdo)){
            try {
                self::$pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER,DB_PASS);
            } catch (PDOException $e) {
                echo "Connection fail...".$e->getMessage();
            }
        }
        return self::$pdo;
    }

    public static function prepare($sql): false|PDOStatement
    {
        return self::Connection()->prepare($sql);
    }

}