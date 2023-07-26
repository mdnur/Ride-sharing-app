<?php include_once "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;

    $vehicle = new VehicleTable();

    if ($vehicle->insert($data)) {
        header("Location: show_vehicle.php");
    } else {
        echo "Something went wrong";
    }
}


?>
<center>
    <h2>Add Vehicle</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="make"><b>Make
                </b>
            </label>
            <input type="text" name="make" id="make" placeholder="Make">
            <br><br>
            <label for="model"><b>Model
                </b>
            </label>
            <input type="text" name="Model" id="model" placeholder="Model">
            <br><br>


            <label for="year"><b>Year
                </b>
            </label>
            <input type="text" name="year" id="year" placeholder="year">
            <br><br>


            <label for="capacity"><b>Capacity
                </b>
            </label>
            <input type="number" name="capacity" id="capacity" placeholder="capacity">
            <br><br>
          
            <input type="submit" name="log" id="log" value="Create Vehicle">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>