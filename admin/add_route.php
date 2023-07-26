<?php include_once "inc/header.php"; ?>
<?php

use lib\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = (Session::get('admin')['id']);
    $data = $_POST;
    $data['createdbyID'] = $userID;
    $data['created_at'] = date("Y-m-d H:i:s", time());


    $route = new RouteTable();

    if ($route->insert($data)) {
        header("Location: index.php");
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
?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Route</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Route</h6>
    </div>
    <div class="card-body">
        <form id="login" method="post" action="">
            <div class="form-group">
                <label for="driverID">Driver Name</label>
                <select name="driverID" class="form-control" id="driverID">
                    <?php foreach ($drivers as $row) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="vehicleID">Vehicle Name</label>
                <select name="vehicleID" class="form-control" id="vehicleID">
                    <?php foreach ($vehicles as $row) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['make']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="locationID">From</label>
                <select name="locationId_From" class="form-control" id="locationFrom">
                    <?php foreach ($locations as $row) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="locationID">To</label>
                <select name="locationId_To" class="form-control" id="locationTo"></select>
            </div>


            <div class="form-group">
                <label for="fare">Fare</label>
                <input type="number" min="0" class="form-control" id="fare" name="fare" aria-describedby="usernameHelp">

            </div>

            <div class="form-group">
                <label for="driverPayment">Driver Payment</label>
                <input type="number" min="0" class="form-control" id="driverPayment" name="driverPayment" aria-describedby="driverPaymentHelp">

            </div>

            <div class="form-group">
                <label for="StartJourneyTime">Start Journey Date & Time</label>
                <input type="datetime-local" class="form-control" id="StartJourneyTime" name="StartJourneyTime" aria-describedby="StartJourneyTimeHelp" placeholder="john_deo">
                <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="DepartureTime">Departure Date & Time</label>
                <input type="datetime-local" class="form-control" id="DepartureTime" name="DepartureTime" aria-describedby="DepartureTimeHelp" placeholder="john_deo">
                <!-- <small id="usernameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="status">Status </label>
                <select name="status" class="form-control" id="status">
                    <option value="0">Active</option>
                </select>
            </div>

            <div class="form-group">
                <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
            </div>
            <button type="submit" class="btn btn-primary">Create Route </button>

        </form>
    </div>
</div>

<script>
    // Get references to the two dropdowns
    const locationFromDropdown = document.getElementById('locationFrom');
    const locationToDropdown = document.getElementById('locationTo');

    // Event listener for the "From" dropdown
    locationFromDropdown.addEventListener('change', updateToDropdown);

    // Function to update the "To" dropdown options
    function updateToDropdown() {
        const selectedFromId = locationFromDropdown.value;

        // Clear existing options in the "To" dropdown
        locationToDropdown.innerHTML = '';

        // Re-populate the "To" dropdown options based on the selected "From" value
        <?php foreach ($locations as $row) { ?>
            // Skip the option with the same ID as the selected "From" value
            if (<?php echo $row['id']; ?> !== parseInt(selectedFromId)) {
                const option = document.createElement('option');
                option.value = <?php echo $row['id']; ?>;
                option.textContent = '<?php echo $row['name']; ?>';
                locationToDropdown.appendChild(option);
            }
        <?php } ?>
    }

    // Call the updateToDropdown function initially to set the initial options
    updateToDropdown();
</script>
<?php include_once "inc/footer.php"; ?>