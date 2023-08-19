<?php
require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['phone'])) {
        Session::set('flash_message', 'Any field can not be empty');
        header("Location: edit_profile.php");
    }
    if ($_POST['email'] != Session::get('rider')['email']) {
        $rider = new RiderTable();
        $rider = $rider->getRiderByFieldName('email', $_POST['email']);
        if ($rider) {
            Session::set('flash_message', 'Email already exists ,enter another email');
            header("Location: edit_profile.php");
            // exit();
        }
    }

    if ($_POST['phone'] != Session::get('rider')['phone']) {
        $rider = new RiderTable();
        $rider = $rider->getRiderByFieldName('phone', $_POST['phone']);
        if ($rider) {
            Session::set('flash_message', 'phone already exists ,enter another phone');
            header("Location: edit_profile.php");
            // exit();
        }
    }

    if ($_POST['username'] != Session::get('rider')['username']) {
        $rider = new RiderTable();
        $rider = $rider->getRiderByFieldName('username', $_POST['username']);
        if ($rider) {
            Session::set('flash_message', 'username already exists ,enter another username');
            header("Location: edit_profile.php");
            // exit();
        }
    }
    if ($_POST['username'] == Session::get('rider')['username']) {
        unset($_POST['username']);
    }

    if ($_POST['email'] == Session::get('rider')['email']) {
        unset($_POST['email']);
    }

    if ($_POST['phone'] == Session::get('rider')['phone']) {
        unset($_POST['phone']);
    }
    if ($_POST['name'] == Session::get('rider')['name']) {
        unset($_POST['name']);
    }

    if (isset($_POST['name']) || isset($_POST['username']) || isset($_POST['email']) || isset($_POST['phone'])) {
        $rider = new RiderTable();
        $rider->update($_POST, Session::get('rider')['id']);
        Session::set('flash_message_success', 'updated successfully');
        header("Location: edit_profile.php");
    }else{
        Session::set('flash_message', 'You did not updated anything');
        header("Location: edit_profile.php");
    }
    // print_r($_POST);

}
