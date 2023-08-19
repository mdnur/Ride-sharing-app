<?php include_once "inc/header.php"; ?>
<?php

use lib\Session;

$location = new SubLocationTable();

$results = $location->readAll();


$sub_location = new LocationTable();
$route = new RouteTable();
$route = $route->readByid($_GET['id']);

$from = $sub_location->readByid($route['locationId_From'])['name'];
$to = $sub_location->readByid($route['locationId_To'])['name'];
$pickUp = $location->getSubLocationByFieldName('locationID', $route['locationId_From']);
$drop = $location->getSubLocationByFieldName('locationID', $route['locationId_To']);

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
                        <form id="CreditAmountAddingFrom" method="POST" action="booking_confirmC.php">
                            <?php if (Session::get('flash_message')) { ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo Session::get('flash_message'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php unset($_SESSION['flash_message']);
                            } ?>
                            <input type="text" value="<?php echo $route['id']; ?>" name="rideBookID" hidden>
                            <div class="form-group">
                                <label for="From">From</label>
                                <input type="text" class="form-control" id="From" value="<?php echo $from ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="PickUp">Pick up Point</label>
                                <select class="form-control" id="PickUp" name="pickUpId">
                                    <?php foreach ($pickUp as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="To">To</label>
                                <input type="text" class="form-control" id="To" value="<?php echo $to ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="drop">Drop Point</label>
                                <select class="form-control" id="drop" name="dropId">
                                    <?php foreach ($drop as $row) { ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="StartJourneyTime">Start Journey Time</label>
                                <input type="text" class="form-control" id="StartJourneyTime" value="<?php echo $route['StartJourneyTime'] ?>" readonly>
                            </div>

                            <div class="form-group">
                                <label for="DepartureTime">Departure Time</label>
                                <input type="text" class="form-control" id="DepartureTime" value="<?php echo $route['DepartureTime'] ?>" readonly>
                            </div>


                            <div class="form-group">
                                <label for="fare">Fare</label>
                                <input type="text" class="form-control" id="fare" value="<?php echo $route['Fare'] ?>" name="expense_amount" readonly>
                            </div>




                            <button id=" bKash_button" class="btn btn-primary">Confirm Booking</button>

                        </form>



                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php include_once "inc/footer.php"; ?>