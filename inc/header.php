<?php
require_once "lib/Session.php";

use lib\Session;


Session::checkSession();

spl_autoload_register(function ($class) {
    include "Classes/" . $class . ".php";
});




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TransitWise</title>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>
    <h1><a href="#">TransitWise</a></h1>
    <a href="index.php?action=logout">LOGOUT</a>


    <ul>
        <li><a href="index.php">My Home</a></li>
        <li><a href="current_booking.php">My Current Booking</a></li>
        <li><a href="profile.php">My Profile</a></li>
        <li><a href="bookRide.php">Book Ride</a></li>
        <li><a href="availableRoute.php">Available Routes</a></li>
        <!-- <li><a href="my_history.php">My History</a></li> -->
        <!-- <li><a href="my_credit.php">My Credits</a></li> -->
    </ul>