<?php

include_once "lib/Session.php";

// require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
use lib\Session;

Session::checkLogin();
?>

<?php
include_once 'classes/Login.php';

$email = $_GET['email'] ?? '';
if(empty($email)){
    header("Location: forget_password.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $code = $_POST['code'];


    unset($_POST['remember']);

    $login = new Login();
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
<html>

<head>
    <title>TransitWise Login </title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <style>
        html,
        body {
            height: 100%;
        }

        body.my-login-page {
            background-color: #f7f9fb;
            font-size: 14px;
        }

        .my-login-page .brand {
            width: 90px;
            height: 90px;
            overflow: hidden;
            border-radius: 50%;
            margin: 40px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
            position: relative;
            z-index: 1;
        }

        .my-login-page .brand img {
            width: 100%;
        }

        .my-login-page .card-wrapper {
            width: 400px;
        }

        .my-login-page .card {
            border-color: transparent;
            box-shadow: 0 4px 8px rgba(0, 0, 0, .05);
        }

        .my-login-page .card.fat {
            padding: 10px;
        }

        .my-login-page .card .card-title {
            margin-bottom: 30px;
        }

        .my-login-page .form-control {
            border-width: 2.3px;
        }

        .my-login-page .form-group label {
            width: 100%;
        }

        .my-login-page .btn.btn-block {
            padding: 12px 10px;
        }

        .my-login-page .footer {
            margin: 40px 0;
            color: #888;
            text-align: center;
        }

        @media screen and (max-width: 425px) {
            .my-login-page .card-wrapper {
                width: 90%;
                margin: 0 auto;
            }
        }

        @media screen and (max-width: 320px) {
            .my-login-page .card.fat {
                padding: 0;
            }

            .my-login-page .card.fat .card-body {
                padding: 15px;
            }
        }
    </style>
</head>

<body class="my-login-page">

    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <a href="index.php"><img src="images/logo.jpg" alt="bootstrap 4 login page"></a>
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Rest Code</h4>
                            <?php if (Session::get('flash_message')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo Session::get('flash_message'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($_SESSION['flash_message']);
                            } ?>
                            <form method="POST" class="my-login-validation" novalidate="">
                                <div class="form-group">
                                    <label for="code">Code</label>
                                    <input id="code" type="text" class="form-control" name="code"  required autofocus>
                                </div>

                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Reset Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="footer">
                        Copyright &copy; <?php echo date('Y'); ?> &mdash; TransitWise
                    </div>
                </div>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script> -->
    <script type="text/javascript" src='js/main.js'></script>
</body>

</html>