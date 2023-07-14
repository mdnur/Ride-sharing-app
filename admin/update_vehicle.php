<?php include_once "inc/header.php"; ?>
<?php
if (isset($_POST['log'])) {
    unset($_POST['log']);
    $data = $_POST;
    print_r($data);
    $vehicle = new VehicleTable();

    if ($vehicle->update($data,$_GET['id'])) {
        header("Location: show_vehicle.php");
    } else {
        echo "Something went wrong";
    }
}

if (isset($_POST['back'])) {
    header("Location: show_location.php");
}


$vehicleTable = new VehicleTable();
$row = $vehicleTable->readByid($_GET['id']);
?>
<center>
    <h2>Add Vehicle</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="make"><b>Make
                </b>
            </label>
            <input type="text" name="make" id="make" placeholder="Make" value="<?php echo $row['make']; ?>">
            <br><br>
            <label for="model"><b>Model
                </b>
            </label>
            <input type="text" name="Model" id="model" placeholder="Model" value="<?php echo $row['model']; ?>">
            <br><br>


            <label for="year"><b>Year
                </b>
            </label>
            <input type="text" name="year" id="year" placeholder="year" value="<?php echo $row['year']; ?>">
            <br><br>


            <label for="capacity"><b>Capacity
                </b>
            </label>
            <input type="number" name="capacity" id="capacity" placeholder="capacity" value="<?php echo $row['capacity']; ?>">
            <br><br>

            <input type="submit" name="log" id="log" value="Update Vehicle">
            <input type="submit" name="back" value="Back">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>