<?php
spl_autoload_register(function ($class) {
    include(realpath(dirname(__FILE__) . "/../classes/" . $class . ".php"));
});
require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

use lib\Session;

Session::CheckAdminSession();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['phone'])) {
        Session::set('flash_message', 'Any field can not be empty');
        header("Location: edit_profile.php");
    }
    $admin = new AdminTable();

    if ($_POST['email'] != Session::get('admin')['email']) {
        $admin = $admin->getAdminByFieldName('email', $_POST['email']);
        if ($admin) {
            Session::set('flash_message', 'Email already exists ,enter another email');
            header("Location: edit_profile.php");
            // exit();
        }
    }

    if ($_POST['phone'] != Session::get('admin')['phone']) {
        $admin = $admin->getAdminByFieldName('phone', $_POST['phone']);
        if ($admin) {
            Session::set('flash_message', 'phone already exists ,enter another phone');
            header("Location: edit_profile.php");
            // exit();
        }
    }

    if ($_POST['username'] != Session::get('admin')['username']) {
        $admin = $admin->getAdminByFieldName('username', $_POST['username']);
        if ($admin) {
            Session::set('flash_message', 'username already exists ,enter another username');
            header("Location: edit_profile.php");
            // exit();
        }
    }
    if ($_POST['username'] == Session::get('admin')['username']) {
        unset($_POST['username']);
    }

    if ($_POST['email'] == Session::get('admin')['email']) {
        unset($_POST['email']);
    }

    if ($_POST['phone'] == Session::get('admin')['phone']) {
        unset($_POST['phone']);
    }
    if ($_POST['name'] == Session::get('admin')['name']) {
        unset($_POST['name']);
    }

    if (isset($_POST['name']) || isset($_POST['username']) || isset($_POST['email']) || isset($_POST['phone'])) {
        print_r($_POST);
        $admin1 = new AdminTable();
        $admin1->update($_POST, Session::get('admin')['id']);
        Session::set('flash_message_success', 'updated successfully');
        header("Location: edit_profile.php");
    }else{
        Session::set('flash_message', 'You did not updated anything');
        header("Location: edit_profile.php");
    }
    // print_r($_POST);

}
