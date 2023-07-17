<?php include_once "inc/header.php"; ?>
<?php

$fare = new FareTable();
if (isset($_POST['log'])) {
    unset($_POST['log']);
    print_r($_POST);
    $data = $_POST;
    print_r($data);


    if ($fare->update($data,$_GET['id'])) {
        header("Location: show_fare.php");
    } else {
        echo "Something went wrong";
    }
}

$location = new LocationTable();
$results = $location->readAll();

$result = $fare->readByid($_GET['id']);
?>
<center>
    <h2>Add Vehicle</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="Location_From"><b>Location From
                </b>
            </label>
            <select name="locationId_From" id="location_From">
                <?php foreach ($results as $row) { ?>
                    <option <?php if ($row['id'] == $result['LocationId_From']) {
                                echo 'selected';
                            } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
                            <br><br>
            <label for="Location_To"><b>Location To
                </b>
            </label>
            <select name="locationId_To" id="location_To">
                <?php foreach ($results as $row) { ?>
                    <option <?php if ($row['id'] == $result['LocationId_To']) {
                                echo 'selected';
                            } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <br><br>

            <input type="submit" name="log" id="log" value="Update Sub Location">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>