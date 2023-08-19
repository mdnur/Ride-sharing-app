<?php

use lib\Helper;
use lib\Session;
require_once('inc/header.php');
if (isset(($_GET['action']))) {
    if ($_GET['action'] == 'logout') {
        Session::destory();
        Helper::header("login.php");
    }
}
?>