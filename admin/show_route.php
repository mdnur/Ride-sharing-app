<?php include_once "inc/header.php"; ?>
<?php


$route = new RouteTable();
$results = $route->readAll();



$drivers = new DriverTable();

$vehicles = new VehicleTable();

$locations = new LocationTable();

$admin = new AdminTable();


?>



<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Route</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"> Route</h6>
        <a href="add_route.php" class="btn btn-primary">Add New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>driverID</th>
                        <th>vehicleID</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Fare</th>
                        <th>First Time</th>
                        <th>Last Time</th>
                        <th>Driver Payment</th>
                        <th>Status</th>
                        <th>Created by</th>
                        <th>created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>driverID</th>
                        <th>vehicleID</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Fare</th>
                        <th>First Time</th>
                        <th>Last Time</th>
                        <th>Driver Payment</th>
                        <th>Status</th>
                        <th>Created by</th>
                        <th>created At</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo ($drivers->readByid($row['driverID']))['name'] ?></td>
                            <td><?php echo ($vehicles->readByid($row['vehicleID']))['make'] ?></td>
                            <td><?php echo ($locations->readByid($row['locationId_From']))['name'] ?></td>
                            <td><?php echo ($locations->readByid($row['locationId_To']))['name'] ?></td>
                            <td><?php echo $row['Fare']; ?></td>
                            <td><?php echo $row['StartJourneyTime']; ?></td>
                            <td><?php echo $row['DepartureTime']; ?></td>
                            <td><?php echo $row['driverPayment']; ?></td>
                            <td><?php echo $route->getStatus($row['status']); ?></td>
                            <td><?php echo ($admin->readByid($row['createdbyID']))['name'] ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><a href="update_route.php?id=<?php echo $row['id']; ?>"  class="btn btn-primary">Edit</a>  <a class="btn btn-danger" href="">Delete</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>


<?php include_once "inc/footer.php"; ?>