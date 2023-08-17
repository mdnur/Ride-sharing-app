<?php
// Path: locationApi.php

require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $from = $_GET['from'];
    $to = $_GET['to'];

    $route = new RouteTable();
    $data =$route->readAllByFromAndTo($from, $to);
    echo json_encode($data);
}
