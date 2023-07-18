<?php

use lib\Session;

?>

<?php

require_once(realpath(dirname(__FILE__) . '/../../lib/Session.php'));


spl_autoload_register(function ($class) {
    include(realpath(dirname(__FILE__) . "/../../Classes/" . $class . ".php"));

    // include $_SERVER['DOCUMENT_ROOT'] . "/Classes/" . $class . ".php";
});



// require_once "lib/Session.php";

Session::CheckDriverSession();
?>


<?php
if (isset(($_GET['action']))) {
    if ($_GET['action'] == 'logout') {
        Session::destory();
        header("Location:login.php");
    }
}
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
    <a href="?action=logout">LOGOUT</a>
    <ul>
        <li><a href="index.php">My Home</a></li>
        <li><a href="my_task.php">My Task </a></li>
        <li><a href="my_profile.php">My Profile</a></li>

        <!-- <li><a href="my_history.php">My History</a></li> -->
        <!-- <li><a href="my_credit.php">My Credits</a></li> -->
    </ul>