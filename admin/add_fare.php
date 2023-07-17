<?php include_once "inc/header.php"; ?>
<?php
if (isset($_POST['log'])) {
    unset($_POST['log']);
    print_r($_POST);
    $data = $_POST;
    print_r($data);
    $fare = new FareTable();

    if ($fare->insert('fare', $data)) {
        header("Location: show_fare.php");
    } else {
        echo "Something went wrong";
    }
}

$location = new LocationTable();
$results = $location->readAll();
?>
<center>
    <h2>Add fare</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="from"><b>From
                </b>
            </label>
            <select name="locationId_From" id="from">
                <?php foreach ($results as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <br><br>

            <label for="to"><b>To
                </b>
            </label>
            <select name="locationId_To" id="to">
                <?php foreach ($results as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>

            <br><br>
            <label for="fare"><b>Fare
                </b>
            </label>
            <input type="number" name="Price" id="fare">
            <br><br>
            <input type="submit" name="log" id="log" value="Create Fare">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>