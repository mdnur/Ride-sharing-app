<?php include_once "inc/header.php"; ?>
<?php

$userRideBook = new UserRideBookTable();
$results = $userRideBook->showAllBooking();

// print_r($userRideBook);
$location = new LocationTable();


?>



<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Booking History</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"> ALl History Booking List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>UserName</th>
                        <th>Driver Name</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Fare</th>
                        <th>Start Journey</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>NO</th>
                        <th>UserName</th>
                        <th>Driver Name</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <th>Fare</th>
                        <th>Start Journey</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <?php $count = 1; ?>
                <?php foreach ($results as $row) { ?>

                    <tbody>
                        <th><?php echo $count; ?></th>
                        <th><?php echo $row['userName'] ?></th>
                        <th><?php echo $row['driverName'] ?></th>
                        <th><?php echo ($location->readByid($row['locationId_From']))['name']; ?></th>
                        <th><?php echo ($location->readByid($row['locationId_To']))['name']; ?></th>
                        <th><?php echo $row['rideFare'] ?></th>
                        <th><?php echo $row['StartJourneyTime'] ?></th>
                        <td><span class="badge badge-pill 
                            <?php if ($row['rideStatus'] == 2) {
                                echo "badge-success";
                            } else if ($row['rideStatus'] == 1) {
                                echo "badge-info";
                            } else if ($row['rideStatus'] == 3) {
                                echo "badge-danger";
                            } else if ($row['rideStatus'] == 0) {
                                echo "badge-primary";
                            } ?>
                        ">
                                <?php echo $userRideBook->getStatus($row['rideStatus']); ?></span></td>

                        <th>Action</th>
                    </tbody>
                <?php } ?>

            </table>
        </div>

    </div>
</div>


<?php include_once "inc/footer.php"; ?>