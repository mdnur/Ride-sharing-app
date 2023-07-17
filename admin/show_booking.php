<?php include_once "inc/header.php"; ?>
<?php






$rider = new RiderTable();

$location = new LocationTable();

$driver = new DriverTable();

$route = new RouteTable();

$booking = new UserRideBookTable();
$results = $booking->readAll();


?>

<center>
    <h2>Show booking</h2><br>
    <table>
        <tr>
            <th>ID</th>
            <th>Name </th>
            <th>Phone</th>
            <th>From</th>
            <th>To</th>
            <th>Date and Time</th>
            <th>Vehicle ID</th>
            <th>Driver Name</th>
            <th>Status</th>
        </tr>
        <?php foreach ($results as $row) { ?>
            <tr>

                <td><?php echo $row['id']; ?></td>
                <td><?php echo (($rider->readByid($row['riderID']))['name']); ?> </td>
                <td><?php echo (($rider->readByid($row['riderID']))['phone']); ?></td>
                <td><?php echo ($location->readByid((($route->readByid($row['rideBookID']))['LocationId_From'])))['name']; ?></td>
                <td><?php echo ($location->readByid((($route->readByid($row['rideBookID']))['LocationId_To'])))['name']; ?></td>
                <td><?php echo (($route->readByid($row['rideBookID']))['firstTime']); ?></td>
                <td><?php echo (($route->readByid($row['rideBookID']))['vehicleID']); ?></td>
                <td><?php echo ($driver->readByid((($route->readByid($row['rideBookID']))['driverID'])))['name'];
                    ?></td>
                <td>active</td>

            </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>