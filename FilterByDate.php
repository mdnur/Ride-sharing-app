<?php

require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();
// Get the selected value from the form

$selectedValue = $_GET['date']; // Change to appropriate method based on your form submission

// Get the current date
$currentDate = date('Y-m-d');

// Convert the current date to a timestamp
$currentTimestamp = strtotime($currentDate);


$route = new UserRideBookTable();

if ($selectedValue === "Today") {
    $selectedTimestamp = $currentTimestamp;
} elseif ($selectedValue === "Tomorrow") {
    $selectedTimestamp = strtotime('+1 day', $currentTimestamp);
} else {
    $data = $route->getRideBookByRiderId(Session::get('rider')['id']);
    echo json_encode($data);
    exit();
}

// Convert the selected timestamp back to a formatted date
$selectedDate = date('Y-m-d', $selectedTimestamp);


$data = $route->getRideBookByRiderIdAndDate(Session::get('rider')['id'],$selectedDate);
echo json_encode($data);

