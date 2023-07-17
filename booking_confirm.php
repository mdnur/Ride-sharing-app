<?php include_once "inc/header.php"; ?>
<?php
use lib\Session;

if (isset($_POST['log'])) {
    $userID = (Session::get('rider')['id']);

    unset($_POST['log']);
    $_POST['riderID'] =$userID;
    $data = $_POST;
    $userRideBook = new UserRideBookTable();

    print_r($data);
    if ($userRideBook->insert('userRideBook', $data)) {
        header("Location: index.php");
    } else {
        echo "Something went wrong";
    }
}
$location = new SubLocationTable();

$results = $location->readAll();

$route = new RouteTable();
$route = $route->readByid($_GET['id']);


$froms = $location->getSubLocationByFieldName('locationID', $route['LocationId_From']);
$tos = $location->getSubLocationByFieldName('locationID', $route['LocationId_To']);

?>
<center>
    <h2>Booking Confirm</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="pickUpId"><b>Pick Up
                </b>
            </label>
            <select name="pickUpId" id="pickUpId">
                <?php foreach ($froms as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>

            <br><br>
            <label for="dropId"><b>Pick Up
                </b>
            </label>
            <select name="dropId" id="dropId">
                <?php foreach ($tos as $row) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                <?php } ?>
            </select>
            <br><br>
            <label for="rideBookID"><b>Ride Booking ID
                </b>
            </label>
            <input type="text" name="rideBookID" id="rideBookID" readonly value="<?php echo $route['id']; ?>">
            <br><br>


            <input type="submit" name="log" id="log" value="Booking confirm">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>
