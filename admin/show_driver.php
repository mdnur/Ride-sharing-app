<?php include_once "inc/header.php"; ?>
<?php


$DriverTable = new DriverTable();
$results = $DriverTable->readAll();

// if (isset($_GET['delete'])) {
//     $id = $_GET['delete'];
//     $DriverTable->delete($id);
//     header("Location: show_driver.php");
// }

?>
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Driver</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Driver</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Salary</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['salary']; ?></td>
                            <td><a class="btn btn-primary" href="update_driver.php?id=<?php echo $row['id']; ?>">Edit</a> <a class="btn btn-danger" href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>




<?php include_once "inc/footer.php"; ?>