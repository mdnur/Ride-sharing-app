<?php

require_once 'driver/inc/spl_autoload.php';

require_once(realpath(dirname(__FILE__) . '/lib/Session.php'));

use lib\Session;

Session::CheckSession();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = Session::get('rider')['id'];
    if (isset($_POST['expense_amount'])) {

        $_POST['user_id'] = $user_id;
        $_POST['created_at'] = date('Y-m-d H:i:s');
        $data = [
            'user_id' => $user_id,
            'expense_amount' => $_POST['expense_amount'],
            'created_at' => date('Y-m-d H:i:s'),
        ];
        $expense = new ExpenseTable();
        // $bool = $expense->insert($data);
        $bool =true;
        
        if ($bool) {
            unset($_POST['expense_amount']);
            $userRideBook = new UserRideBookTable();
            // $bool1 = $userRideBook->insert($_POST);
            $bool1 = true;
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
