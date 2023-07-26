<?php include_once "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    unset($_POST['log']);
    $data = $_POST;
    $SubLocationTable = new SubLocationTable();

    if ($SubLocationTable->insert($data)) {
        header("Location: show_sub_location.php");
    } else {
        echo "Something went wrong";
    }
}

$location = new LocationTable();
$results = $location->readAll();
?>
<center>
    <h2>Add Sub Location</h2><br>
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




            <input type="submit" name="log" id="log" value="Create Sub Location">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>