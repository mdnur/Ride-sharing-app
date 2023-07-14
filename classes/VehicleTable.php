<?php

require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";
use lib\MainTable;

class VehicleTable extends MainTable
{
    protected $table = "vehicle";
}