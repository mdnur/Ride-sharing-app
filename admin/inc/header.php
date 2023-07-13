<?php

require_once $_SERVER['DOCUMENT_ROOT']. '/lib/Session.php';

spl_autoload_register(function ($class) {
    include $_SERVER['DOCUMENT_ROOT']."/Classes/" . $class . ".php";
});



// require_once "lib/Session.php";
use lib\Session;
Session::CheckAdminSession();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>