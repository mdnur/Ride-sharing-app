<?php

include_once "inc/header.php";

//

$route = new RouteTable();
$results = $route->getRouteByFieldNameAndDateAndFromToday('status', "0", date('Y-m-d'));
$locations = new LocationTable();


$userRideBooking = new UserRideBookTable();


$vehicle = new VehicleTable();
// print_r($results);
?>



<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Route List</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All active Route List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>From </th>
                        <th>To</th>
                        <th>Seat</th>
                        <th>Fare</th>
                        <th>Start at</th>
                        <th>Ends at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo ($locations->readByid($row['locationId_From']))['name'] ?></td>
                            <td><?php echo ($locations->readByid($row['locationId_To']))['name'] ?></td>
                            <td><?php echo $vehicle->readByid($row['vehicleID'])['capacity'] - $userRideBooking->countRideBooking($row['id'])['total'] ?></td>
                            <td><?php echo $row['Fare']; ?>TK</td>
                            <td><?php echo TimeHelper::getFormattedTime($row['StartJourneyTime']); ?></td>
                            <td><?php echo TimeHelper::getFormattedTime($row['DepartureTime']); ?></td>
                            <td>
                                <div class="btn-group">
                                    <a class="btn btn-info" href="userRouteBooking.php?id=<?php echo $row['id']; ?>">Make Book</a>
                                </div>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>
<?php include_once "inc/footer.php"; ?>