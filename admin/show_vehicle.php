<?php include_once "inc/header.php"; ?>
<?php


$vehicleTable = new VehicleTable();
$results = $vehicleTable->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $vehicleTable->delete($id);
    header("Location: show_vehicle.php");
}
?>
<center>
    <h2>Show Vehicle</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Make</th>
            <th>Model</th>
            <th>Year</th>
            <th>Capacity</th>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['make']; ?></td>
            <td><?php echo $row['model']; ?></td>
            <td><?php echo $row['year']; ?></td>
            <td><?php echo $row['capacity']; ?></td>
            <td><a href="update_vehicle.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>