<?php include_once "inc/header.php"; ?>
<?php
if (isset($_POST['log'])) {
    unset($_POST['log']);
    $data = $_POST;
    $SubLocationTable = new SubLocationTable();
    print_r($data);
    if ($SubLocationTable->insert('SubLocation', $data)) {
        header("Location: show_sub_location.php");
    } else {
        echo "Something went wrong";
    }
}

$location = new LocationTable();
$results = $location->readAll();
?>
<center>
    <h2>Add Vehicle</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="Location"><b>Location
                </b>
            </label>
            <select name="locationID" id="location">
                <?php foreach ($results as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <br><br>
            <label for="name"><b>Sub Location
                </b>
            </label>
            <input type="text" name="name" id="name" placeholder="name">
            <br><br>




            <input type="submit" name="log" id="log" value="Create Vehicle">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>