<?php
// require_once $_SERVER['DOCUMENT_ROOT'] . '//Session.php';
require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));
require_once(realpath(dirname(__FILE__) . '/../lib/Helper.php'));


spl_autoload_register(function ($class) {
    include(realpath(dirname(__FILE__) . "/../classes/" . $class . ".php"));

    // include $_SERVER['DOCUMENT_ROOT'] . "/Classes/" . $class . ".php";
});



use lib\Session;
use lib\Helper;


Session::CheckAdminSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_POST['riderPhone'];
    $riderID = new RiderTable();
    $riderID = ($riderID->getRiderByFieldNames('phone', $_POST['riderPhone']))['id'];
    // print_r($riderID);
    $_POST['created_at'] = date('Y-m-d H:i:s');
    unset($_POST['riderPhone']);
    $_POST['riderID'] = $riderID;

    // print_r($_POST);
    $credit = new CreditTable(); $credit =$credit->getRemainingCredit($riderID);

    if($credit['remaining_credit'] < $_POST['expense_amount']){
        Session::set("flash_message", "Insufficient Credit");
        header("Location: booking_confirm.php?id=".$_POST['rideBookID']);
    }
    if($_POST['dropId'] == '' || $_POST['pickUpId'] == ''){
        Session::set("flash_message", "Drop Location or Pick up Location not selected");
        header("Location: booking_confirm.php?id=".$_POST['rideBookID']);
        
    }
    $user_id = $riderID;
    if (isset($_POST['expense_amount'])) {
        $_POST['created_at'] = date('Y-m-d H:i:s');
        $data = [
            'user_id' => $user_id,
            'expense_amount' => $_POST['expense_amount'],
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $expense = new ExpenseTable();
        $bool = $expense->insert($data);
        // $bool =true;
        
        if ($bool) {
            unset($_POST['expense_amount']);
            $userRideBook = new UserRideBookTable();
            $bool1 = $userRideBook->insert($_POST);
            if ($bool1) {
                header("Location: bookingList.php");
            } else {
                echo "Something went wrong";
            }
        }
    }
    // print_r($_POST);
    // echo json_encode($data);
}
