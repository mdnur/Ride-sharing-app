<?php include_once "inc/header.php"; ?>
<?php



$admin = new AdminTable();
$admin = $admin->readByid($_GET['id'])



?>



<center>
    <h2>View Admin</h2><br>
    <div class="login">
        <label for="name"><b>Name
            </b>
        </label>
        <input type="text" name="name" id="name" readonly value="<?php echo $admin['name'] ?>">
        <br><br>
        <label for="username"><b>Username
            </b>
        </label>
        <input type="text" name="username" id="username" readonly value="<?php echo $admin['username'] ?>">
        <br><br>
        <label for="email"><b>Email
            </b>
        </label>
        <input type="email" name="email" id="email" readonly value="<?php echo $admin['email'] ?>">
        <br><br>
        <label for="phone"><b>phone
            </b>
        </label>
        <input type="text" id="phone" name="phone" pattern="^01[3456789]\d{8}$" readonly value="<?php echo $admin['phone'] ?>" title="Bangladesh phone number: 01XXXXXXXXX">
        <br><br>


        <br><br>
        <a href="show_admin.php"> back</a>



    </div>
</center>
</body>

</html>