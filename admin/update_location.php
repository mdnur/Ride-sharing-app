<?php include_once "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $locationData = $_POST;
    $location = new LocationTable();

    if ($location->update($locationData,$_GET['id'])) {
        header("Location: show_location.php");
    } else {
        echo "Something went wrong";
    }
}
if (isset($_POST['back'])) {
    header("Location: show_location.php");
}

$locationTable = new LocationTable();
$row = $locationTable->readByid($_GET['id']);
?>
<center>
    <h2>Update Location</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="name"><b>Name
                </b>
            </label>
            <input type="text" name="name" id="name" placeholder="Name" value="<?php echo $row['name']; ?>">
            <br><br>
          
            <input type="submit" name="log" id="log" value="Update Location">
            <input type="submit" name="back" value="Back">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>