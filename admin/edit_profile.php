<?php

include_once "inc/header.php";

use lib\Session;

?>
<?php


if (isset($_POST['log'])) {
}
$userID = (Session::get('admin')['id']);


$rider = new AdminTable();
$rider = $rider->readByid($userID);


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
                        <?php if (Session::get('flash_message')) { ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo Session::get('flash_message'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['flash_message']);
                        } ?>
                        <?php if (Session::get('flash_message_success')) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo Session::get('flash_message_success'); ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php unset($_SESSION['flash_message_success']);
                        } ?>
                        <form action="update_profile.php" method="POST">
                            <div class="form-group row">
                                <label for="staticName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticName" name="name" value="<?php echo $rider['name'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticUsername" name="username" value="<?php echo $rider['username'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="staticEmail" name="email" value="<?php echo $rider['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticPhone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="phone" class="form-control" id="staticPhone" name="phone" value="<?php echo $rider['phone'] ?>">
                                </div>
                            </div>
                            <a role="button" href="profile.php" class="btn btn-primary">Back </a>
                            <button role="button"  class="btn btn-info">Update </button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include_once "inc/footer.php"; ?>