<?php include_once "inc/header.php"; ?>
<?php

use lib\Session;
use lib\Helper;

$route = new RouteTable();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = (Session::get('admin')['id']);
    $data = $_POST;
    $data['createdbyID'] = $userID;
    $data['created_at'] = date("Y-m-d H:i:s", time());

    if ($route->update($data, $_GET['id'])) {
        // header("Location: show_route.php");
        Helper::header('show_route.php');
    } else {
        echo "Something went wrong";
    }
}

$drivers = new DriverTable();
$drivers = $drivers->readAll();


$vehicles = new VehicleTable();
$vehicles = $vehicles->readAll();


$locations = new LocationTable();
$locations = $locations->readAll();

$result = $route->readByid($_GET['id']);

?>



<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Route</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Route</h6>
    </div>
    <div class="card-body">
        <form id="login" method="post" action="">
            <div class="form-group">
                <label for="driverID">Driver Name</label>
                <select name="driverID" class="form-control" id="driverID">
                    <?php foreach ($drivers as $row) { ?>
                        <option <?php if ($row['id'] == $result['driverID']) {
                                    echo 'selected';
                                } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="vehicleID">Vehicle Name</label>
                <select name="vehicleID" class="form-control" id="vehicleID">
                    <?php foreach ($vehicles as $row) { ?>
                        <option <?php if ($row['id'] == $result['vehicleID']) {
                                    echo 'selected';
                                } ?> value="<?php echo $row['id']; ?>"><?php echo $row['make']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="locationID">From</label>
                <select name="locationId_From" class="form-control" id="locationFrom" readonly>
                    <?php foreach ($locations as $row) { ?>
                        <option <?php if ($row['id'] == $result['locationId_From']) {
                                    echo 'selected';
                                } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>



            <div class="form-group">
                <label for="locationID">To</label>
                <select name="locationId_To" class="form-control" id="locationTo" readonly>
                    <?php foreach ($locations as $row) { ?>
                        <option <?php if ($row['id'] == $result['locationId_To']) {
                                    echo 'selected';
                                } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>


            <div class="form-group">
                <label for="fare">Fare</label>
                <input type="number" min="0" value="<?php echo $result['Fare']; ?>" class="form-control" id="fare" name="fare" aria-describedby="usernameHelp">

            </div>

            <div class="form-group">
                <label for="driverPayment">Driver Payment</label>
                <input type="number" min="0" value="<?php echo $result['driverPayment']; ?>" class="form-control" id="driverPayment" name="driverPayment" aria-describedby="driverPaymentHelp">

            </div>

            <div class="form-group">
                <label for="StartJourneyTime">Start Journey Date & Time</label>
                <input type="datetime-local" class="form-control" value="<?php echo $result['StartJourneyTime']; ?>" id="StartJourneyTime" name="StartJourneyTime" aria-describedby="StartJourneyTimeHelp" placeholder="john_deo">
                <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="DepartureTime">Departure Date & Time</label>
                <input type="datetime-local" class="form-control" value="<?php echo $result['DepartureTime']; ?>" id="DepartureTime" name="DepartureTime" aria-describedby="DepartureTimeHelp" placeholder="john_deo">
                <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="status">Status </label>
                <select name="status" class="form-control" id="status">

                    <option value="0" <?php if ($result['status'] == 0) {echo 'selected';} ?>>Active</option>
                    <option value="1" <?php if ($result['status'] == 1) {echo 'selected';} ?>>Processing</option>
                    <option value="2" <?php if ($result['status'] == 2) {echo 'selected';} ?>>Completed</option>
                    <option value="3" <?php if ($result['status'] == 3) {echo 'selected';} ?>>Canceled</option>
                </select>
            </div>

            <div class="form-group">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
            <button type="submit" class="btn btn-primary">Update Route </button>

        </form>
    </div>
</div>
<?php include_once "inc/footer.php"; ?>