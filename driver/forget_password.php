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
    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];

        // print_r($email);

        unset($_POST['remember']);

        $login = new DriverLogin();
        $login->setEmail($email);
        if ($login->forgetPassword()) {
            $token = bin2hex(random_bytes(2));
            $decimalToken = hexdec($token);

            if ($login->sendmail($email, $decimalToken)) {
                if (session_status() === PHP_SESSION_NONE) {
                    Session::init();
                }
                Session::set("flash_message", "Email sent successfully");
                header("Location: reset_password.php?email=$email");
            } else {
                if (session_status() === PHP_SESSION_NONE) {
                    Session::init();
                }
                Session::set("flash_message", "Email not sent");
            }
        }
    }


    ?>



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
                            <form method="post" action="">
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                    <div class="col-md-6">
                                        <input type="email" name="email" id="email" placeholder="john@example.com" value="<?php echo $_COOKIE['emailD'] ?? ($_POST['email'] ?? '') ?>" class="form-control" autofocus>

                                    </div>
                                </div>



                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                      Reset Password!
                                    </button>

                                </div>
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