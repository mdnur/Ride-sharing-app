<?php

use lib\Session;

?>

<?php

// require_once $_SERVER['DOCUMENT_ROOT'] . '/lib/Session.php';
require_once(realpath(dirname(__FILE__) . '/../lib/Session.php'));


spl_autoload_register(function ($class) {
    // include $_SERVER['DOCUMENT_ROOT'] . "/Classes/" . $class . ".php";
    require_once(realpath(dirname(__FILE__) . '/../Classes/' . $class . '.php'));
});



// require_once "lib/Session.php";

Session::checkDriverLogin();
?>


<?php


$email = $_GET['email'] ?? '';
$token = $_GET['token'] ?? '';

if (empty($email) || empty($token)) {
    header("Location: forget_password.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $obj = new DriverLogin();
    $bool = $obj->changePasswordNew($_POST['password'], $_POST['confirm_password'], $token, $email);
    if ($bool) {
        Session::set('flash_message_success', 'Password Changed Successfully login with new password');
        header("Location: login.php");
    }
}


?>

<!DOCTYPE html>
<html>

<head>
    <title>Driver Login</title>

    <!-- Custom fonts for this template-->
    <link href="/../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center align-items-center min-vh-100">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Driver Forget Password</h4>
                        </div>
                        <div class="card-body">
                            <?php if (Session::get('flash_message')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo Session::get('flash_message'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($_SESSION['flash_message']);
                            } ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input id="password" type="password" class="form-control <?php echo isset($_SESSION['flash_message']['password']) ? 'is-invalid' : ''; ?>" name="password" required data-eye>
                                    <?php if (isset($_SESSION['flash_message']['password'])) { ?>
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
                                    <?php }
                                    unset($_SESSION['flash_message']); ?>
                                </div>
                                <button role="button" class="btn btn-info">Confirm New Password </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        setTimeout(function() {
            $(".alert").alert('close');
        }, 5000);
    </script>


</body>

</html>