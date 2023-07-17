<?php

require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";
use lib\MainTable;

class EarningTable extends MainTable
{
    protected $table = "earning";
}