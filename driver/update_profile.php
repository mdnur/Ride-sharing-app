<?php
require_once 'inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

use lib\Session;

Session::CheckDriverSession();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['phone'])) {
        Session::set('flash_message', 'Any field can not be empty');
        header("Location: edit_profile.php");
    }
    if ($_POST['email'] != Session::get('driver')['email']) {
        $driver = new DriverTable();
        $driver = $driver->getdriverByFieldName('email', $_POST['email']);
        if ($driver) {
            Session::set('flash_message', 'Email already exists ,enter another email');
            header("Location: edit_profile.php");
            // exit();
        }
    }

    if ($_POST['phone'] != Session::get('driver')['phone']) {
        $driver = new DriverTable();
        $driver = $driver->getdriverByFieldName('phone', $_POST['phone']);
        if ($driver) {
            Session::set('flash_message', 'phone already exists ,enter another phone');
            header("Location: edit_profile.php");
            // exit();
        }
    }

    if ($_POST['username'] != Session::get('driver')['username']) {
        $driver = new DriverTable();
        $driver = $driver->getdriverByFieldName('username', $_POST['username']);
        if ($driver) {
            Session::set('flash_message', 'username already exists ,enter another username');
            header("Location: edit_profile.php");
            // exit();
        }
    }
    if ($_POST['username'] == Session::get('driver')['username']) {
        unset($_POST['username']);
    }

    if ($_POST['email'] == Session::get('driver')['email']) {
        unset($_POST['email']);
    }

    if ($_POST['phone'] == Session::get('driver')['phone']) {
        unset($_POST['phone']);
    }
    if ($_POST['name'] == Session::get('driver')['name']) {
        unset($_POST['name']);
    }

    if (isset($_POST['name']) || isset($_POST['username']) || isset($_POST['email']) || isset($_POST['phone'])) {
        $driver = new DriverTable();
        $driver->update($_POST, Session::get('driver')['id']);
        Session::set('flash_message_success', 'updated successfully');
        header("Location: edit_profile.php");
    } else {
        Session::set('flash_message', 'You did not updated anything');
        header("Location: edit_profile.php");
    }
    // print_r($_POST);

}
