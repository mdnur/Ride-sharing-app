<?php

// require_once $_SERVER['DOCUMENT_ROOT']."/lib/Database.php";
// require_once $_SERVER['DOCUMENT_ROOT']."/lib/MainTable.php";

require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/Database.php'));
use lib\MainTable;

class EarningTable extends MainTable
{
    protected $table = "earning";
}