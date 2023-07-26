<?php include_once "inc/header.php"; ?>
<?php
use lib\Session;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userID = (Session::get('admin')['id']);
    $data = $_POST;
    $data['createdbyID'] = $userID;
    $data['created_at'] = date("Y-m-d H:i:s", time());


    $route = new RouteTable();

    if ($route->insert( $data)) {
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
<center>
    <h2>Add Route</h2><br>
    <div class="login">
        <form id="login" method="post" action="">

            <label for="driver"><b>Driver
                </b>
            </label>
            <select name="driverID" id="driver">
                <?php foreach ($drivers as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <br><br>
            <label for="vehicle"><b>Vehicle
                </b>
            </label>
            <select name="vehicleID" id="vehicle">
                <?php foreach ($vehicles as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['make']; ?></option>
                <?php } ?>
            </select>


            <br><br>
            <label for="location_from"><b>Location From
                </b>
            </label>
            <select name="LocationId_From" id="location_from">
                <?php foreach ($locations as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>

                    <br><br>
            <label for="location_to"><b>Location To
                </b>
            </label>
            <select name="LocationId_To" id="location_to">
                <?php foreach ($locations as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>


            <br><br>
            <label for="fare"><b>Fare
                </b>
            </label>
            <input type="number" name="fare" id="fare" placeholder="fare">


            <br><br>
            <label for="driverPayment"><b>Driver Payment
                </b>
            </label>
            <input type="number" name="driverPayment" id="driverPayment" placeholder="Driver Payment">
            <br><br>

            <label for="firstTime"><b>First Time: </b></label>
            <input type="datetime-local" id="firstTime" name="firstTime">

            <br><br>
            <label for="LastTime"><b>Last Time: </b></label>
            <input type="datetime-local" id="LastTime" name="LastTime">

            <br><br>

            <label for="status"><b>status
                </b>
            </label>
            <select name="status" id="status">
                <option value="1">Active</option>
                <option value="2">Draft</option>
            </select>

            <br><br>
            <input type="submit" name="log" id="log" value="Create Route">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>
