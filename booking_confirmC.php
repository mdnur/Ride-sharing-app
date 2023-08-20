<?php

require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $credit = new CreditTable(); $credit =$credit->getRemainingCredit(Session::get('rider')['id']);

    if($credit['remaining_credit'] < $_POST['expense_amount']){
        Session::set("flash_message", "Insufficient Credit");
        header("Location: booking_confirm.php?id=".$_POST['rideBookID']);
    }
    if($_POST['dropId'] == '' || $_POST['pickUpId'] == ''){
        Session::set("flash_message", "Drop Location or Pick up Location not selected");
        header("Location: booking_confirm.php?id=".$_POST['rideBookID']);
        
    }
    $user_id = Session::get('rider')['id'];
    if (isset($_POST['expense_amount'])) {

        $_POST['riderID'] = $user_id;
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
                header("Location: current_booking.php");
            } else {
                echo "Something went wrong";
            }
        }
    }
    print_r($_POST);
    // echo json_encode($data);
}
