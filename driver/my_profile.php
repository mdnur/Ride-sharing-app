<?php

include_once "inc/header.php";

use lib\Session;

?>
<?php


if (isset($_POST['log'])) {
}
$userID = (Session::get('driver')['id']);


$driver = new DriverTable();
$driver = $driver->readByid($userID);


?>
<center>
    <h2>Profile Page</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="name"><b>Name
                </b>
            </label>
            <input type="text" name="name" id="name" value="<?php echo $driver['name']?>">
            <br><br>
            <label for="username"><b>Username
                </b>
            </label>
            <input type="text" name="username" id="username" value="<?php echo $driver['username']?>">
            <br><br>
            <label for="email"><b>Email
                </b>
            </label>
            <input type="email" name="email" id="email" value="<?php echo $driver['email']?>">
            <br><br>
            <label for="phone"><b>phone
                </b>
            </label>
            <input type="text" id="phone" name="phone" pattern="^01[3456789]\d{8}$" value="<?php echo $driver['phone']?>" title="Bangladesh phone number: 01XXXXXXXXX">
            <br><br>

        <a href="index.php">Home </a>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>