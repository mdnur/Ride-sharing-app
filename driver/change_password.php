<?php

include_once "inc/header.php";

use lib\Helper;
use lib\Session;

?>
<?php


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $obj = new DriverLogin();
    $bool = $obj->changePassword($_POST['current_password'], $_POST['password'], $_POST['confirm_password']);
    if ($bool) {
        Session::set('flash_message_success', 'Password Changed Successfully');
        // Helper::header('profile.php');
        header("Location: my_profile.php");
    }
}
$userID = (Session::get('driver')['id']);


$driver = new driverTable();
$driver = $driver->readByid($userID);


?>
<main class="py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">My Profile</h5>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="card-body">
                        <?php if (Session::get('flash_message_info')) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo Session::get('flash_message_info'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['flash_message_info']);
                        } ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="password">Current Password</label>
                                <input id="current_password" type="password" class="form-control <?php echo isset($_SESSION['flash_message']['current_password']) ? 'is-invalid' : ''; ?>" name="current_password" required data-eye>
                                <?php if (isset($_SESSION['flash_message']['current_password'])) { ?>
                                    <div class="invalid-feedback">
                                        <?php echo $_SESSION['flash_message']['current_password']; ?>
                                    </div>
                                <?php } ?>
                            </div>

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
                            <a role="button" href="profile.php" class="btn btn-primary">Back </a>
                            <button role="button" class="btn btn-info">Update </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include_once "inc/footer.php"; ?>