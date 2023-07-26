<?php

use lib\Helper;

 include_once "inc/header.php"; ?>
<?php


// include_once 'classes/Login.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] != $_POST['confirm_password']) {
        echo "Password and Confirm Password does not match";
        exit();
    }
    // print_r($_POST);
    unset($_POST['confirm_password']);
    print_r($_POST);

    // print_r($_POST);
    $_POST['created_at'] = date("Y-m-d H:i:s", time());
    $_POST['role'] = 'driver';
    $driverData = $_POST;
    $driver = new DriverTable();

    if ($driver->insert($driverData)) {
        // header("Location: show_driver.php");
        // echo "<script>window.location.href='show_driver.php';</script>";
        Helper::header('show_driver.php');
    

    } else {
        echo "Something went wrong";
    }
}


?>

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Driver</h1>

    </div>

    <!-- Content Row -->

    <!-- Content Row -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Add Driver</h6>
        </div>
        <div class="card-body">
            <form id="login" method="post" action="">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="John Deo">
                    <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="name" class="form-control" id="username" name="username" aria-describedby="usernameHelp" placeholder="john_deo">
                    <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>


                <div class="form-group">
                    <label for="phone"> Phone</label>
                    <input type="phone" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" name="phone" pattern="^01[3456789]\d{8}$" placeholder="01XXXXXXXXX" title="Bangladesh phone number: 01XXXXXXXXX">
                    <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>



                <div class="form-group">
                    <label for="InputPassword">Password</label>
                    <input type="password" class="form-control" id="InputPassword" placeholder="Password" name="password">
                </div>

                <div class="form-group">
                    <label for="InputConfirmPassword1">Confirm Password</label>
                    <input type="password" class="form-control" id="InputConfirmPassword1" name="confirm_password" placeholder="Password">
                </div>

                <div class="form-group">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
                <button type="submit" class="btn btn-primary">Create Driver Account</button>

            </form>
        </div>
    </div>


<?php include_once "inc/footer.php"; ?>