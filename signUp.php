<?php

include_once "lib/Session.php";

use lib\Session;

Session::checkLogin();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Login Form</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php


    include_once 'classes/Login.php';

    if (isset($_POST['log'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = new Login();
        $login->setEmail($email);
        $login->setPassword($password);

        if ($rider = $login->signUp($_POST)) {
            Session::init();
            Session::set("rider", $rider);
            Session::set("login", true);
            header("Location: index.php");
        } else {
            if (Session::get("flash_message")) {
                // Display flash message
                print_r( $_SESSION['flash_message']);

                // Clear flash message
                unset($_SESSION['flash_message']);
            }
            // echo "Username or Password is incorrect";
        }
    }


    ?>
    <center>
        <h2>Login Page</h2><br>
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
                <input type="checkbox" id="check">
                <span>Remember me</span>
                <br><br>

                <p>Have a account?</p> <a href="login.php">Login here</a>
                <br><br>
                <a href="#">Forgot Password</a>
            </form>
        </div>
    </center>
</body>

</html>