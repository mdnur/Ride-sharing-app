<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/Session.php';

use lib\Session;

Session::checkAdminLogin();
?>
<!DOCTYPE html>
<html>

<head>
    <title>TransitWise Admin </title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php


    include_once $_SERVER['DOCUMENT_ROOT'] . '/classes/AdminLogin.php';

    if (isset($_POST['log'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $remember = $_POST['remember'] ?? null;

        unset($_POST['remember']);

        $login = new AdminLogin();
        $login->setEmail($email);
        $login->setPassword($password);
        if ($rider = $login->login()) {
            if ($remember != null) {
                $expirationTime = time() + 60 * 60;
                setcookie('emailA', $_POST['email'], $expirationTime); //1 hour
                setcookie('passwordA', $_POST['password'], $expirationTime); //1 hour
            }
            Session::init();
            Session::set("admin", $rider);
            Session::set("adminLogin", true);
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
        <h2>Admin Login Page</h2><br>
        <div class="login">
            <form id="login" method="post" action="login.php">
                <label for="email"><b>Email
                    </b>
                </label>
                <input type="email" name="email" id="email" placeholder="Username" value="<?php echo $_COOKIE['emailA'] ?? '' ?>">
                <br><br>

                <label for="password"><b>Password
                    </b>
                </label>
                <input type="Password" name="password" id="password" placeholder="Password" value="<?php echo $_COOKIE['passwordA'] ?? '' ?>">
                <br><br>

                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember me</label>
                <br><br>

                <input type="submit" name="log" id="log" value="Log In Here">
                <br><br>
            </form>
        </div>
    </center>
</body>

</html>