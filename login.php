<?php

include_once "lib/Session.php";

// require_once(realpath(dirname(__FILE__) . '/../lib/MainTable.php'));
use lib\Session;

Session::checkLogin();
?>
<!DOCTYPE html>
<html>

<head>
    <title>TransitWise Login </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php


    include_once 'classes/Login.php';
    if (isset($_POST['log'])) {
        // Function to generate a unique token
        $remember = $_POST['remember'] ?? null;

        unset($_POST['remember']);


        $email = $_POST['email'];
        $password = $_POST['password'];
        $login = new Login();
        $login->setEmail($email);
        $login->setPassword($password);
        if ($rider = $login->login()) {
            if ($remember != null) {
                $expirationTime = time() + 60 * 60;
                setcookie('email', $_POST['email'], $expirationTime); //1 hour
                setcookie('password', $_POST['password'], $expirationTime); //1 hour
            }


            Session::init();
            Session::set("rider", $rider);
            Session::set("login", true);
            header("Location: index.php");
        } else {
            if (Session::get("flash_message")) {
                // Display flash message
                echo $_SESSION['flash_message'];
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
            <form id="login" method="post" action="login.php">
                <label for="email"><b>Email
                    </b>
                </label>
                <input type="email" name="email" id="email" placeholder="Username" value="<?php echo $_COOKIE['email'] ?? '' ?>">
                <br><br>

                <label for="password"><b>Password
                    </b>
                </label>
                <input type="Password" name="password" id="password" placeholder="Password" value="<?php echo $_COOKIE['password'] ?? '' ?>">
                <br><br>
                <input type="submit" name="log" id="log" value="Log In Here">
                <br><br>
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
                <br><br>

                <p>Don't Have a account?</p> <a href="SignUp.php">Sign Up</a>
                <br><br>
                <!-- <a href="#">Forgot Password</a> -->
            </form>
        </div>
    </center>
</body>

</html>