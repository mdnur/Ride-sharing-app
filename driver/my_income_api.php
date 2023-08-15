<?php
require_once('inc/spl_autoload.php');
require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

use lib\Session;

Session::CheckDriverSession();

$selectedMonth = $_POST['month']; // This might need further validation

list($year, $month) = explode('-', $selectedMonth);

$result = new RouteTable();
$results = $result->getDriverIncomeByMonth(Session::get('driver')['id'],$month, $year);
// $results = $result->getDriverIncomeByMonth(Session::get('driver')['id'],8, 2023);

header('Content-Type: application/json');
echo json_encode($results);
?>
