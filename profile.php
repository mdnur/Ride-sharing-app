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
<center>
    <h2>Profile Page</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="name"><b>Name
                </b>
            </label>
            <input type="text" name="name" id="name" value="<?php echo $rider['name']?>">
            <br><br>
            <label for="username"><b>Username
                </b>
            </label>
            <input type="text" name="username" id="username" value="<?php echo $rider['username']?>">
            <br><br>
            <label for="email"><b>Email
                </b>
            </label>
            <input type="email" name="email" id="email" value="<?php echo $rider['email']?>">
            <br><br>
            <label for="phone"><b>phone
                </b>
            </label>
            <input type="text" id="phone" name="phone" pattern="^01[3456789]\d{8}$" value="<?php echo $rider['phone']?>" title="Bangladesh phone number: 01XXXXXXXXX">
            <br><br>

        <a href="index.php">Home </a>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>