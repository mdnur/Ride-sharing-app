<?php

include_once "inc/header.php";

use lib\Session;

?>
<?php


if (isset($_POST['log'])) {
}
$userID = (Session::get('rider')['id']);


$rider = new RiderTable();
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
                        <form>
                            <div class="form-group row">
                                <label for="staticName" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticName" name="name" value="<?php echo $rider['name'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="staticUsername" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticUsername" name="username" value="<?php echo $rider['username'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" id="staticEmail" name="email" value="<?php echo $rider['email'] ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticPhone" class="col-sm-2 col-form-label">Phone</label>
                                <div class="col-sm-10">
                                    <input type="phone" readonly class="form-control-plaintext" id="staticPhone" name="phone" value="<?php echo $rider['phone'] ?>">
                                </div>
                            </div>
                            <a role="button"  href="home.php" class="btn btn-primary">Back </a>
                            <a role="button"  href="home.php" class="btn btn-primary">Edit </a>

                        </form>
                        <center>
                            <div class="login">
                                <form id="login" method="post" action="">
                                    <label for="name"><b>Name
                                        </b>
                                    </label>
                                    <input type="text"  id="name" name="name" value="<?php echo $rider['name'] ?>">
                                    <br><br>
                                    <label for="username"><b>Username
                                        </b>
                                    </label>
                                    <input type="text"  id="username" name="username" value="<?php echo $rider['username'] ?>">
                                    <br><br>
                                    <label for="email"><b>Email
                                        </b>
                                    </label>
                                    <input type="email"  id="email" name="email" value="<?php echo $rider['email'] ?>">
                                    <br><br>
                                    <label for="phone"><b>phone
                                        </b>
                                    </label><!--pattern="^01[3456789]\d{8}$"-->
                                    <input type="text" id="phone" name="phone" value="<?php echo $rider['phone'] ?>"   title="Bangladesh phone number: 01XXXXXXXXX">
                                    <br><br>

                                    <a href="index.php">Home </a>
                                </form>
                            </div>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include_once "inc/footer.php"; ?>