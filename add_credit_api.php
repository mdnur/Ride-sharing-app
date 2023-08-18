<?php
// Path: locationApi.php

require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST['user_id'] = Session::get('rider')['id'];
    $_POST['created_at'] = date('Y-m-d H:i:s');
    $_POST['payment_type_id'] = 1;
    $credit = new CreditTable();
    $credit = $credit->insert($_POST);
    $data = $credit;
    echo json_encode($data);
}
