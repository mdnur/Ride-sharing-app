<?php include_once "inc/header.php"; ?>
<?php

use lib\Session;


$route = new RouteTable();

$userID = (Session::get('driver')['id']);

// $results = $route->getRouteByFieldName('driverID', $userID);
$results = $route->getRouteByFieldName('driverID', $userID);



$drivers = new DriverTable();

$vehicles = new VehicleTable();

$locations = new LocationTable();

$admin = new AdminTable();


?>

<div class="card-header">My Task All</div>

<div class="card-body">


    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <!-- <th>driver Name</th> -->
                    <!-- <th>vehicleID</th> -->
                    <th>From</th>
                    <th>To</th>
                    <!-- <th>Fare</th> -->
                    <th>Start At </th>
                    <th>End At</th>
                    <!-- <th>Driver Payment</th> -->
                    <th>Status</th>
                    <th>Created by</th>
                    <!-- <th>created At</th> -->
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($results as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <!-- <td><?php //echo ($drivers->readByid($row['driverID']))['name'] 
                                    ?></td> -->
                        <!-- <td><?php //echo ($vehicles->readByid($row['vehicleID']))['make']
                                    ?></td> -->
                        <td><?php echo ($locations->readByid($row['locationId_From']))['name'] ?></td>
                        <td><?php echo ($locations->readByid($row['locationId_To']))['name'] ?></td>
                        <!-- <td><?php //echo $row['Fare'];
                                    ?></td> -->
                        <td><?php echo TimeHelper::getFormattedTime1($row['StartJourneyTime']); ?></td>
                        <td><?php echo TimeHelper::getFormattedTime1($row['DepartureTime']); ?></td>
                        <!-- <td><?php //echo $row['driverPayment'];
                                    ?></td> -->
                        <td><span class="badge badge-pill 
                            <?php if ($row['status'] == 2) {
                                echo "badge-success";
                            } else if ($row['status'] == 1) {
                                echo "badge-info";
                            } else if ($row['status'] == 3) {
                                echo "badge-danger";
                            } else if ($row['status'] == 0) {
                                echo "badge-primary";
                            } ?>
                        ">
                                <?php echo $route->getStatus($row['status']); ?></span></td>
                        <td><?php echo ($admin->readByid($row['createdbyID']))['name'] ?></td>
                        <!-- <td><?php //echo $row['created_at'];
                                    ?></td> -->
                        <td>
                            <a class="btn btn-primary" href="ViewRiderOfRoute.php?id=<?php echo $row['id']; ?>">View All Rider</a>
                            <?php if (TimeHelper::checkTimeDiff($row['DepartureTime'])) { ?>
                                <?php if ($row['status'] == 0) { ?>
                                    <a class="btn btn-danger" href="taskStatusUpdate.php?id=<?php echo $row['id']; ?>&status=1">Processing</a>
                                <?php } else if ($row['status'] == 1) { ?>
                                    <a class="btn btn-danger" href="taskStatusUpdate.php?id=<?php echo $row['id']; ?>&status=2">Complete</a>
                                <?php } ?>
                            <?php } ?>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once "inc/footer.php"; ?>