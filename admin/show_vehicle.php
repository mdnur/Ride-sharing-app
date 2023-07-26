<?php include_once "inc/header.php"; ?>
<?php
use lib\Helper;

$vehicleTable = new VehicleTable();
$results = $vehicleTable->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $vehicleTable->delete($id);
    // header("Location: show_vehicle.php");
    Helper::header('show_vehicle.php');
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
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Make</th>
                        <th>Model</th>
                        <th>Year</th>
                        <th>Capacity</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['make']; ?></td>
                            <td><?php echo $row['model']; ?></td>
                            <td><?php echo $row['year']; ?></td>
                            <td><?php echo $row['capacity']; ?></td>
                            <td><a class="btn btn-primary" href="update_vehicle.php?id=<?php echo $row['id']; ?>">Edit</a> <a class="btn btn-danger" href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include_once "inc/footer.php"; ?>