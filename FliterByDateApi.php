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

// Check if the selected value corresponds to "Today"
if ($selectedValue === "Today") {
    $selectedTimestamp = $currentTimestamp;
} elseif ($selectedValue === "Tomorrow") {
    // Get the timestamp for tomorrow
    $selectedTimestamp = strtotime('+1 day', $currentTimestamp);
}

// Convert the selected timestamp back to a formatted date
$selectedDate = date('Y-m-d', $selectedTimestamp);
$route = new RouteTable();
$data = $route->readAllByDate($selectedDate);
echo json_encode($data);
