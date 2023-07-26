<?php include_once "inc/header.php"; ?>
<?php

$fare = new FareTable();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    if ($fare->update($data, $_GET['id'])) {
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
    <h2>Update Fare</h2><br>
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
            <label for="fare"><b>Fare
                </b>
                
            </label>
            <input type="number" name="Price" id="fare" value="<?php echo $result['Price']; ?>">
            <br><br>
            <input type="submit" name="log" id="log" value="Update Fare ">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>