<?php include_once "inc/header.php"; ?>
<?php
use lib\Session;


$route = new RouteTable();

$userID = (Session::get('driver')['id']);

$results = $route->getRouteByFieldName('driverID',$userID);



$drivers = new DriverTable();

$vehicles = new VehicleTable();

$locations = new LocationTable();

$admin = new AdminTable();


?>
<center>
    <h2>Show Route</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>driverID</th>
            <th>vehicleID</th>
            <th>Location From</th>
            <th>Location To</th>
            <th>Fare</th>
            <th>First Time</th>
            <th>Last Time</th>
            <th>Driver Payment</th>
            <th>Status</th>
            <th>Created by</th>
            <th>created At</th>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo ($drivers->readByid($row['driverID']))['name'] ?></td>
                <td><?php echo ($vehicles->readByid($row['vehicleID']))['make'] ?></td>
                <td><?php echo ($locations->readByid($row['LocationId_From']))['name'] ?></td>
                <td><?php echo ($locations->readByid($row['LocationId_To']))['name'] ?></td>
                <td><?php echo $row['fare']; ?></td>
                <td><?php echo $row['firstTime']; ?></td>
                <td><?php echo $row['lastTime']; ?></td>
                <td><?php echo $row['driverPayment']; ?></td>
                <td><?php echo $route->getStatus($row['status']); ?></td>
                <td><?php echo ($admin->readByid($row['createdbyID']))['name'] ?></td>
                <td><?php echo $row['created_at']; ?></td>    
                <td><a href="update_route.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>
