<?php include_once "inc/header.php"; ?>
<?php
use lib\Helper;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $vehicle = new VehicleTable();

    if ($vehicle->update($data,$_GET['id'])) {
        // header("Location: show_vehicle.php");
        Helper::header('show_vehicle.php');

    } else {
        echo "Something went wrong";
    }
}


$vehicleTable = new VehicleTable();
$row = $vehicleTable->readByid($_GET['id']);
?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Vehicle</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Vehicle</h6>
    </div>
    <div class="card-body">
        <form id="login" method="post" action="">
            <div class="form-group">
                <label for="make">Vehicle Make</label>
                <input type="name" class="form-control" name="make" id="make" aria-describedby="makeHelp" value="<?php echo $row['make']; ?>">
                <!-- <small id="makeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="model">Vehicle model</label>
                <input type="name" class="form-control" name="model" id="model" aria-describedby="modelHelp" value="<?php echo $row['model']; ?>">
                <!-- <small id="makeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="year">Vehicle year</label>
                <input type="name" class="form-control" name="year" id="year" aria-describedby="yearHelp" value="<?php echo $row['year']; ?>">
                <!-- <small id="makeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>

            <div class="form-group">
                <label for="capacity">Vehicle capacity</label>
                <input type="name" min="1" class="form-control" name="capacity" id="capacity" aria-describedby="capacityHelp" value="<?php echo $row['capacity']; ?>">
                <!-- <small id="makeHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>


            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Update Vehicle </button>

        </form>
    </div>
</div>
<?php include_once "inc/footer.php"; ?>