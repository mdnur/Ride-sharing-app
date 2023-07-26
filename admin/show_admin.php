<?php include_once "inc/header.php"; ?>
<?php

use lib\Helper;

$admins = new AdminTable();
$results = $admins->readAll();



if (isset($_GET['delete'])) {
    if ($_GET['delete'] == 1) {
        echo "You cannot delete Main Admin";
    } else {
        $id = $_GET['delete'];
        $admins->delete($id);
        header("Location: show_admin.php");
        Helper::header('show_admin.php');
    }
}
?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Vehicle</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Show Vehicle</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>phone</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['username']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><a href="view_admin.php?id=<?php echo $row['id']; ?>"class="btn btn-primary" >View</a> <a class="btn btn-danger" href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>  
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include_once "inc/footer.php"; ?>