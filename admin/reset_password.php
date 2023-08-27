<?php

// require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/Session.php';
require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));

use lib\Helper;
use lib\Session;

?>

<?php


// include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/AdminLogin.php';
include_once(realpath(dirname(__FILE__) . '/../classes/AdminLogin.php'));

$email = $_GET['email'] ?? '';
if(empty($email)){
    Helper::header("Location: forget_password.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];


    unset($_POST['remember']);

    $login = new AdminLogin();
   if( $login->resetPassword($email,$code)){
    if (session_status() === PHP_SESSION_NONE) {
        Session::init();
    }
    header("Location: new_password.php?token=$code&email=$email");
   }
   else{
    if (session_status() === PHP_SESSION_NONE) {
        Session::init();
    }
    Session::set("flash_message", "code not matched");
   }
   
    
}


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin | Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Reset Code</h1>
                                        <p class="mb-4">We send you a code by email . Just enter the code here!</p>
                                    </div>
                                    <?php if (Session::get('flash_message')) { ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?php echo Session::get('flash_message'); ?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    <?php unset($_SESSION['flash_message']);
                                    } ?>
                                    <form class="user" action="" method="POST">
                                        <div class="form-group">
                                            <input type="text" name="code" class="form-control form-control-user" id="exampleInputCode" aria-describedby="CodeHelp" placeholder="Enter Code">
                                        </div>
                                        <button class="btn btn-primary btn-user btn-block">
                                            Reset Password
                                        </button>
                                    </form>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>