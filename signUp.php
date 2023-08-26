<?php

include_once "lib/Session.php";

use lib\Session;

Session::checkLogin();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
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
    <?php
    include_once 'classes/Login.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = new Login();
        $login->setEmail($email);
        $login->setPassword($password);

        if ($rider = $login->signUp($_POST)) {
            Session::init();
            Session::set("rider", $rider);
            Session::set("login", true);
            header("Location: home.php");
        }
    }


    ?>
    <!-- <center>
        <h2>Registration Page</h2><br>
        <div class="login">
            <form id="login" method="post" action="signUp.php">
                <label for="name"><b>Name
                    </b>
                </label>
                <input type="text" name="name" id="name" placeholder="Name">
                <br><br>
                <label for="username"><b>Username
                    </b>
                </label>
                <input type="text" name="username" id="username" placeholder="Username">
                <br><br>
                <label for="email"><b>Email
                    </b>
                </label>
                <input type="email" name="email" id="email" placeholder="email">
                <br><br>
                <label for="phone"><b>phone
                    </b>
                </label>
                <input type="text" id="phone" name="phone" pattern="^01[3456789]\d{8}$" placeholder="01XXXXXXXXX" title="Bangladesh phone number: 01XXXXXXXXX">
                <br><br>

                <label for="password"><b>password
                    </b>
                </label>
                <input type="password" name="password" id="password" placeholder="password">
                <br><br>

                <label for="confirm_password"><b>Confirm Password
                    </b>
                </label>
                <input type="Password" name="confirm_password" id="confirm_password" placeholder="Confirm password">
                <br><br>
                <input type="submit" name="log" id="log" value="Sign UP">
                <br><br>

                <p>Have a account?</p> <a href="login.php">Login here</a>
                <br><br>
            </form>
        </div>
    </center> -->



    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <a href="index.php"><img src="images/logo.jpg" alt="bootstrap 4 login page"></a>
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h4 class="card-title">Register</h4>
                            <form method="POST" class="" novalidate="" action="">

                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input id="name" type="text" class="form-control <?php echo isset($_SESSION['flash_message']['name']) ? 'is-invalid' : ''; ?>" name="name" required autofocus>
                                    <?php if (isset($_SESSION['flash_message']['name'])) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $_SESSION['flash_message']['name']; ?>
                                        </div>
                                    <?php } ?>

                                </div>

                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input id="username" type="text" class="form-control <?php echo isset($_SESSION['flash_message']['username']) ? 'is-invalid' : ''; ?>" name="username" required autofocus>
                                    <?php if (isset($_SESSION['flash_message']['username'])) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $_SESSION['flash_message']['username']; ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control <?php echo isset($_SESSION['flash_message']['email']) ? 'is-invalid' : ''; ?>" name="email" required>
                                    <?php if (isset($_SESSION['flash_message']['email'])) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $_SESSION['flash_message']['email']; ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="phone">Phone Number</label>
                                    <!-- <input id="phone" type="tel" class="form-control" name="phone" pattern="^01[3456789]\d{8}$" required>  -->
                                    <input id="phone" type="tel" class="form-control <?php echo isset($_SESSION['flash_message']['phone']) ? 'is-invalid' : ''; ?>" name="phone" pattern="^01[3456789]\d{8}$" required>
                                    <?php if (isset($_SESSION['flash_message']['phone'])) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $_SESSION['flash_message']['phone']; ?>
                                        </div>
                                    <?php } ?>
                                </div>




                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control <?php echo isset($_SESSION['flash_message']['password']) ? 'is-invalid' : ''; ?>" name="password" required data-eye>
                                    <?php if (isset($_SESSION['flash_message']['username'])) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $_SESSION['flash_message']['password']; ?>
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input id="confirm_password" type="password" class="form-control <?php echo isset($_SESSION['flash_message']['confirm_password']) ? 'is-invalid' : ''; ?>" name="confirm_password" required data-eye>
                                    <?php if (isset($_SESSION['flash_message']['confirm_password'])) { ?>
                                        <div class="invalid-feedback">
                                            <?php echo $_SESSION['flash_message']['confirm_password']; ?>
                                        </div>
                                    <?php } ?>
                                </div>



                                <div class="form-group m-0">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Register
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    Already have an account? <a href="login.php">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>

                    <?php unset($_SESSION['flash_message']); ?>
                    <div class="footer">
                        Copyright &copy; 2017 &mdash; Your Company
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>

</body>

</html>