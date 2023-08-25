<?php

// require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/Session.php';
require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/Helper.php'));


spl_autoload_register(function ($class) {
    include(realpath(dirname(__FILE__) . "/../Classes/" . $class . ".php"));

    // include $_SERVER['DOCUMENT_ROOT'] . "/Classes/" . $class . ".php";
});



use lib\Session;
use lib\Helper;


Session::CheckAdminSession();


if(isset($_GET['query'])){
    $query = $_GET['query'];
    $rider = new RiderTable();
    $rider = $rider->searchByFieldName('phone', $query);
    echo json_encode($rider);
}
