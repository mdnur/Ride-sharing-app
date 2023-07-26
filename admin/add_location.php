<?php include_once "inc/header.php"; ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $locationData = $_POST;

    $location = new LocationTable();

    if ($location->insert($locationData)) {
        header("Location: index.php");
    } else {
        echo "Something went wrong";
    }
}


?>
<center>
    <h2>Add Location</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="name"><b>Name
                </b>
            </label>
            <input type="text" name="name" id="name" placeholder="Name">
            <br><br>
          
            <input type="submit" name="log" id="log" value="Create Location">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>