<?php include_once "inc/header.php"; ?>
<?php

use lib\Session;

$route = new RouteTable();

if (isset($_POST['log'])) {
    unset($_POST['log']);
    $userID = (Session::get('admin')['id']);
    print_r($userID);
    $data = $_POST;
    $data['createdbyID'] = $userID;
    $data['created_at'] = date("Y-m-d H:i:s", time());
    print_r($data);

    if ($route->update($data,$_GET['id'])) {
        header("Location: show_route.php");
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
<center>
    <h2>Update Route</h2><br>
    <div class="login">
        <form id="login" method="post" action="">

            <label for="driver"><b>Driver
                </b>
            </label>
            <select name="driverID" id="driver">
                <?php foreach ($drivers as $row) { ?>
                    <option <?php if ($row['id'] == $result['driverID']) {
                                echo 'selected';
                            } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <br><br>
            <label for="vehicle"><b>Vehicle
                </b>
            </label>
            <select name="vehicleID" id="vehicle">
                <?php foreach ($locations as $row) { ?>
                    <option <?php if ($row['id'] == $result['vehicleID']) {
                                echo 'selected';
                            } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>


            <br><br>
            <label for="location_from"><b>Location From
                </b>
            </label>
            <select name="LocationId_From" id="location_from">
            <?php foreach ($locations as $row) { ?>
                    <option <?php if ($row['id'] == $result['LocationId_From']) {
                                echo 'selected';
                            } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
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
            <input type="number" name="fare" id="fare" value="<?php echo $result['fare']; ?>">


            <br><br>
            <label for="driverPayment"><b>Driver Payment
                </b>
            </label>
            <input type="number" name="driverPayment" id="driverPayment" value="<?php echo $result['driverPayment']; ?>">
            <br><br>

            <label for="firstTime"><b>First Time: </b></label>
            <input type="datetime-local" id="firstTime" name="firstTime" value="<?php echo $result['firstTime']; ?>">

            <br><br>
            <label for="LastTime"><b>Last Time: </b></label>
            <input type="datetime-local" id="LastTime" name="LastTime" value="<?php echo $result['lastTime']; ?>">

            <br><br>

            <label for="status"><b>status
                </b>
            </label>
            <select name="status" id="status">
                <option value="1" <?php if($result['status'] == 1) {echo 'selected';}?>>Active</option>
                <option value="2" <?php if($result['status'] == 2) {echo 'selected';}?>>Done</option>
            </select>

            <br><br>
            <input type="submit" name="log" id="log" value="Update Route">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>