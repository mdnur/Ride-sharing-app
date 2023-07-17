<?php
require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";
use lib\Database;
use lib\MainTable;

class FareTable extends MainTable{
    protected $table = "fare";

}