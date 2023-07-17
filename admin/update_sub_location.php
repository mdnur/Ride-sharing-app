<?php include_once "inc/header.php"; ?>
<?php

$SubLocation = new SubLocationTable();

if (isset($_POST['log'])) {
    unset($_POST['log']);
    $data = $_POST;
    print_r($data);

    if ($SubLocation->update($data, $_GET['id'])) {
        header("Location: show_sub_location.php");
    } else {
        echo "Something went wrong";
    }
}

$LocationTable = new LocationTable();
$results = $LocationTable->readAll();
$SubLocation = new SubLocationTable();
$result = $SubLocation->readByid($_GET['id']);

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
                    <option <?php if ($row['id'] == $result['locationID']) {
                                echo 'selected';
                            } ?> value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <br><br>
            <label for="name"><b>Sub Location
                </b>
            </label>
            <input type="text" name="name" id="name" placeholder="name" value="<?php echo $result['name']; ?>">
            <br><br>




            <input type="submit" name="log" id="log" value="Update Sub Location">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>