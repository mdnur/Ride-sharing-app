<?php include_once "inc/header.php"; ?>
<?php


// include_once 'classes/Login.php';

if (isset($_POST['log'])) {
    unset($_POST['log']);
    $id = $_POST['id'];
    unset($_POST['id']);
    // print_r($_POST);

    $driverData = $_POST;

    $driver = new DriverTable();

    if ($driver->update($driverData, $id)) {
        header("Location: show_driver.php");
    } else {
        echo "Something went wrong";
    }
}

$DriverTable = new DriverTable();
$row = $DriverTable->readByid($_GET['id']);

?>
<center>
    <h2>Update Driver</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="name"><b>Name
                </b>
            </label>
            <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['name']; ?>">
            <br><br>
            <label for="username"><b>Username
                </b>
            </label>
            <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $row['username']; ?>">
            <br><br>
            <label for="email"><b>Email
                </b>
            </label>
            <input type="email" name="email" id="email" placeholder="email" value="<?php echo $row['email']; ?>">
            <br><br>
            <label for="phone"><b>phone
                </b>
            </label>
            <input type="text" id="phone" name="phone" pattern="^01[3456789]\d{8}$" placeholder="01XXXXXXXXX" value="<?php echo $row['phone']; ?>" title="Bangladesh phone number: 01XXXXXXXXX">
            <br><br>
            <label for="salary"><b>Salary
                </b>
            </label>
            <input type="number" name="salary" id="salary"  value="<?php echo $row['salary']; ?>">
            <br><br>
            <input type="text" hidden value="<?php echo $row['id']; ?>" name="id">
            <input type="submit" name="log" id="log" value="update Driver">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>