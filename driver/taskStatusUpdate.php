<?php

use lib\Helper;

include 'inc/header.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $id =$_GET['id'];
    unset($_GET['id']);
    $route = new RouteTable();
    $route->update($_GET, $id );
    Helper::header('my_task.php');
}
