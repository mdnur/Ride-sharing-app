<?php include_once "inc/header.php"; ?>
<?php
$admin = new RiderTable();
$admin = $admin->readByid($_GET['id'])

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Admin</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">View Admin</h6>
    </div>
    <div class="card-body">
        <form id="login" method="post" action="">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" readonly value="<?php echo $admin['name'] ?>">
                <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="name" class="form-control" id="username" name="username" aria-describedby="usernameHelp" readonly value="<?php echo $admin['username'] ?>">
                <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" readonly value="<?php echo $admin['email'] ?>">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>


            <div class="form-group">
                <label for="phone"> Phone</label>
                <input type="phone" class="form-control" id="phone" name="phone" aria-describedby="emailHelp" name="phone" readonly value="<?php echo $admin['phone'] ?>" title="Bangladesh phone number: 01XXXXXXXXX">
                <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>



        

            <div class="form-group">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
            <a href="index.php" class="btn btn-primary">Back</a>

        </form>
    </div>
</div>



<?php include_once "inc/footer.php"; ?>