<?php include_once "inc/header.php"; ?>
<?php


// include_once 'classes/Login.php';
$id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $driverData = $_POST;

    $driver = new DriverTable();

    if ($driver->update($driverData, $id)) {
        // header("Location:show_driver.php");
        echo "<script>window.location.href='show_driver.php';</script>";
    } else {
        echo "Something went wrong";
    }
}

$DriverTable = new DriverTable();
$row = $DriverTable->readByid($id);

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Driver</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Driver</h6>
    </div>
    <div class="card-body">
        <form id="login" method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="<?php echo $row['name']; ?>">
                <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="name" class="form-control" name="username" id="username" aria-describedby="usernameHelp" value="<?php echo $row['username']; ?>">
                <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $row['email']; ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>


            <div class="form-group">
                <label for="phone"> Phone</label>
                <input type="phone" class="form-control" name="phone" id="phone" aria-describedby="emailHelp" name="phone" pattern="^01[3456789]\d{8}$" value="<?php echo $row['phone']; ?>" title="Bangladesh phone number: 01XXXXXXXXX">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>



            <div class="form-group">
                <label for="salary"> Salary</label>
                <input type="number" min="0" class="form-control" name="salary" id="salary" value="<?php echo $row['salary']; ?>" required>
            </div>


            <div class="form-group">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
            <button type="submit" class="btn btn-primary">Update Driver Account</button>
            <a href="show_driver.php" class="btn btn-secondary">Back</a>

        </form>
    </div>
</div>


<?php include_once "inc/footer.php"; ?>