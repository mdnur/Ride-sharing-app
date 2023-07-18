<?php include_once "inc/header.php"; ?>
<?php
if (isset($_POST['log'])) {
    unset($_POST['log']);
    print_r($_POST);
    $locationData = $_POST;
    print_r($locationData);
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