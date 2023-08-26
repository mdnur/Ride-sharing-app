<?php

include_once "inc/header.php";

use lib\Session;

?>
<?php


if (isset($_POST['log'])) {
}
$userID = (Session::get('admin')['id']);


$admin = new AdminTable();
$admin = $admin->readByid($userID);


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
                        <form>
                            <div class="form-group row">
                                <label for="staticName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticName" name="name" value="<?php echo $admin['name'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername" name="username" value="<?php echo $admin['username'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="email" value="<?php echo $admin['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticPhone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="phone" readonly class="form-control-plaintext" id="staticPhone" name="phone" value="<?php echo $admin['phone'] ?>">
                                </div>
                            </div>
                            <a role="button"  href="index.php" class="btn btn-primary">Back </a>
                            <a role="button"  href="edit_profile.php" class="btn btn-primary">Edit </a>

                        </form>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include_once "inc/footer.php"; ?>