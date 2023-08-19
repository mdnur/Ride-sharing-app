<?php include_once "inc/header.php"; ?>
<?php

use lib\Session;

$userRideBook = null;
if (isset($_GET['id'])) {
    $userID = (Session::get('rider')['id']);

    $_GET['riderID'] = $userID;
    $userRideBook1 = new UserRideBookTable();
    $userRideBook = $userRideBook1->userRideBookWithRoute($_GET['id']);
    // print_r($userRideBook);
    // die();
}


$sub_locations = new SubLocationTable();
$pickUps = $sub_locations->getSubLocationByFieldName("locationID", $userRideBook['locationId_From']);
// print_r($pickUps);
$drops = $sub_locations->getSubLocationByFieldName("locationID", $userRideBook['locationId_To']);

?>

<main class="py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">Booking confirming </h5>
                        </div>
                        <div>

                        </div>
                    </div>

                    <div class="card-body">
                        <form id="CreditAmountAddingFrom" method="POST" action="update_ride_booking.php">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" value="<?php echo $userRideBook['driver_name'] ?>" aria-describedby="button-addon2" readonly>
                                <?php if ($userRideBook['route_status'] < 1) { ?>
                                    <div class="input-group-append">
                                        <a href="tel:<?php echo $userRideBook['driver_phone'] ?>" class="btn  btn-primary" type="button" id="button-addon2">Call</a>
                                    </div>
                                <?php } ?>
                            </div>


                            <div class="form-group">
                                <label for="From">From</label>
                                <input type="text" class="form-control" id="From" value="<?php echo $userRideBook['from_location_name'] ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="PickUp">Pick up Point</label>
                                <select class="form-control" id="PickUp" name="pickUpId" <?php if ($userRideBook['route_status'] > 1) { ?> readonly <?php } ?>>
                                    <?php if ($userRideBook['route_status'] <= 1) { ?>
                                        <?php foreach ($pickUps as $row) { ?>
                                            <option <?php if ($row['id'] == $userRideBook['pick_up_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                    <option value=""><?php echo $userRideBook['pick_up_location_name']; ?></option>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="To">To</label>
                                <input type="text" class="form-control" id="To" value="<?php echo $userRideBook['to_location_name'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="drop">Drop Point</label>
                                <select class="form-control" id="drop" name="dropId" <?php if ($userRideBook['route_status'] > 1) { ?> readonly <?php } ?>>
                                    <?php if ($userRideBook['route_status'] <= 1) { ?>
                                        <?php foreach ($drops as $row) { ?>
                                            <option <?php if ($row['id'] == $userRideBook['drop_id']) {
                                                        echo 'selected';
                                                    } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                        <?php } ?>
                                    <?php } ?>
                                    <option value=""><?php echo $userRideBook['drop_location_name']; ?></option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="StartJourneyTime">Start Journey Time</label>
                                <input type="text" class="form-control" id="StartJourneyTime" value="<?php echo $userRideBook['StartJourneyTime'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="DepartureTime">Departure Time</label>
                                <input type="text" class="form-control" id="DepartureTime" value="<?php echo $userRideBook['DepartureTime'] ?>" readonly>
                            </div>


                            <div class="form-group">
                                <label for="fare">Fare</label>
                                <input type="text" class="form-control" id="fare" value="<?php echo $userRideBook['Fare'] ?>" name="expense_amount" readonly>
                            </div>

                            <div class="form-group">
                                <label for="PickUp">Status</label>
                                <select class="form-control" id="PickUp" name="pickUpId" readonly>

                                    <option value=""><?php echo $userRideBook1->getStatusByName($userRideBook['route_status']); ?></option>
                                </select>
                            </div>


                            <a href="current_booking.php" class="btn btn-primary">Back</a>
                            <?php if ($userRideBook['route_status'] <= 1) { ?>
                                <button class="btn btn-info">Update</button>
                            <?php } ?>
                            <?php if (TimeHelper::getTimeDiff($userRideBook['StartJourneyTime'])) { ?>
                                <a class="btn btn-danger" href="booking_confirm.php?id=<?php echo $row['rideBookID']; ?>">Cancel</a>
                            <?php } ?>
                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once "inc/footer.php"; ?>