<?php
// Path: FilterByStatus.php

require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $status = $_GET['status'];

    $route = new UserRideBookTable();

    if($status == 4){
        $data =$route->getRideBookByRiderId(Session::get('rider')['id']);
        echo json_encode($data);
        exit();
    }

    $data =$route->getRiderBookByRiderIdAndStatus(Session::get('rider')['id'], $status);
    echo json_encode($data);
}
