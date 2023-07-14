
<?php 
include_once "inc/header.php"; 
use lib\Session;

?>
<?php
if (isset(($_GET['action']))) {
    if ($_GET['action'] == 'logout') {
        Session::destory();
    header("Location:login.php");
    }
}
?>

<ul>
    <li>
        Driver
        <ul>
            <li><a href="add_driver.php">Add Driver</a></li>
            <li><a href="show_driver.php">Show Driver</a></li>
        </ul>
    </li>
    <li>
        Location
        <ul>
            <li><a href="">Add Location</a></li>
            <li><a href="">Show Location</a></li>
        </ul>
    </li>
    <li>
        Sub Location
        <ul>
            <li><a href="">Add Sub Location</a></li>
            <li><a href="">Show Sub Location</a></li>
        </ul>
    </li>
    <li>
        Add Fare
        <ul>
            <li><a href="">Add Fare</a></li>
            <li><a href="">Show Fare</a></li>
        </ul>
    </li>
    <li>
        Vehicle
        <ul>
            <li><a href="">Add Vehicle</a></li>
            <li><a href="">Show Vehicle</a></li>
        </ul>
    </li>

    <li>
        Admin
        <ul>
            <li><a href="">Add Admin</a></li>
            <li><a href="">Show Admin</a></li>
        </ul>
    </li>
</ul>
<a href="?action=logout">LOGOUT</a>

<?php include_once "inc/footer.php"; ?>