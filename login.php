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
        $login->login();
        if ($login->login()) {
            echo "Login Successful";
        }else{
            echo "Username or Password is incorrect";
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
                <input type="email" name="email" id="email" placeholder="Username">
                <br><br>

                <label for="password"><b>Password
                    </b>
                </label>
                <input type="Password" name="password" id="password" placeholder="Password">
                <br><br>
                <input type="submit" name="log" id="log" value="Log In Here">
                <br><br>
                <input type="checkbox" id="check">
                <span>Remember me</span>
                <br><br>
                Forgot <a href="#">Password</a>
            </form>
        </div>
    </center>
</body>

</html>