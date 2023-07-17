
<?php 
use lib\Session;

?>

<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/Session.php';

spl_autoload_register(function ($class) {
    include $_SERVER['DOCUMENT_ROOT'] . "/Classes/" . $class . ".php";
});



// require_once "lib/Session.php";

Session::checkDriverLogin();
?>
<!DOCTYPE html>
<html>

<head>
    <title>TransitWise Driver</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <?php

    if (isset($_POST['log'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        unset($_POST['log']);




        $login = new DriverLogin();
        $login->setEmail($email);
        $login->setPassword($password);
        // print_r($_POST);
        if ($driver = $login->login()) {
            Session::init();
            Session::set("driver", $driver);
            Session::set("driverLogin", true);
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
            <form id="login" method="post" action="">
                <label for="email"><b>Email
                    </b>
                </label>
                <input type="email" name="email" id="email" placeholder="Username">
                <br><br>

                <label for="password"><b>Password
                    </b>
                </label>
                <input type="Password" name="password" id="password" placeholder="Password">
                <br><br>
                <input type="submit" name="log" id="log" value="Log In Here">
                <br><br>
            </form>
        </div>
    </center>
</body>

</html>