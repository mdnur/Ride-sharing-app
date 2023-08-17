<?php

use lib\Session;

?>

<?php

require_once(realpath(dirname(__FILE__) . '/../../lib/Session.php'));
require_once(realpath(dirname(__FILE__) . '/../../lib/Helper.php'));


// spl_autoload_register(function ($class) {
//     include(realpath(dirname(__FILE__) . "/../../Classes/" . $class . ".php"));

//     // include $_SERVER['DOCUMENT_ROOT'] . "/Classes/" . $class . ".php";
// });

require_once('spl_autoload.php');


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

    <title>TransitWise- Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="/../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="/../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>


</head>

<body>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="index.php">TransitWise</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">My Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_task.php">My Task</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="my_profile.php">My Profile</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="my_income.php">My Income</a>
                        </li>


                    </ul>
                    <div class="form-inline my-2 my-lg-0">
                        <ul class="navbar-nav mr-auto my-2 my-lg-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?= Session::get('driver')['name']; ?>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="index.php?action=logout">logout</a>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                           
                   