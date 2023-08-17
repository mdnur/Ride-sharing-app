<?php
// Path: locationApi.php

require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $location = new LocationTable();
    $location = $location->getAllLocationExcept($from);
    $data = $location;
    echo json_encode($data);
}
