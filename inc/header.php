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
    <title>Document</title>
</head>

<body>