<?php

include_once "inc/header.php";

use lib\Session;



?>

<?php

$route = new UserRideBookTable();
// $results = $route->getRideBookByRiderId(Session::get('rider')['id']);
$results = $route->getRideBookByRiderId(1);



?>

<main class="py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">My Booking History</h5>
                        </div>
                        <div>
                            <form>
                                <div class="form-row align-items-center">
                                    <!-- <div class="col-auto ">
                                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                                        <input type="text" class="form-control " id="inlineFormInputName2">
                                    </div> -->
                                    <div class="col-auto ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Date</label>
                                            </div>
                                            <label class="sr-only" for="inlineFormInputName3">Name</label>
                                            <select class="form-control " id="inlineFormInputName3">
                                                <option value="All">All</option>
                                                <option value="Today">Today</option>
                                                <option value="Tomorrow">Tomorrow</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-auto  ">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                            </div>
                                            <label class="sr-only" for="inlineFormInputName4">Status</label>
                                            <select class="form-control " id="inlineFormInputName4">
                                                <option value="4">All</option>
                                                <option value="0">Active</option>
                                                <option value="1">Processing</option>
                                                <option value="2">Completed</option>
                                                <option value="3">Canceled</option>

                                            </select>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Driver </th>
                                        <th>Pick up</th>
                                        <th>Drop</th>
                                        <th>Start at</th>
                                        <th>Fare</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php $count = 1; ?>
                                <tbody id="StatusAndDate">
                                    <?php foreach ($results as $row) { ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo $row['driverName']; ?></td>
                                            <td><?php echo $row['pickUpLocation']; ?></td>
                                            <td><?php echo $row['dropLocation']; ?></td>
                                            <td><?php echo  TimeHelper::getFormattedTime1($row['StartJourneyTime']); ?></td>
                                            <td><?php echo $row['rideFare']; ?></td>
                                            <td><span class="badge badge-pill 
                                        <?php
                                        if ($row['rideStatus'] == 2) {
                                            echo "badge-success";
                                        } else if ($row['rideStatus'] == 1) {
                                            echo "badge-info";
                                        } else if ($row['rideStatus'] == 3) {
                                            echo "badge-danger";
                                        } else if ($row['rideStatus'] == 0) {
                                            echo "badge-primary";
                                        }
                                        ?>
                                    ">
                                                    <?php echo $route->getStatus($row['rideStatus']); ?></span></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="view_booking.php?id=<?php echo $row['rideBookID']; ?>">View</a>
                                                    <?php if (TimeHelper::getTimeDiff($row['StartJourneyTime'])) { ?>
                                                        <a class="btn btn-danger" href="booking_confirm.php?id=<?php echo $row['rideBookID']; ?>">Cancel</a>
                                                    <?php } ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include_once "inc/footer.php"; ?>