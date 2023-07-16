<?php include_once "inc/header.php"; ?>
<?php


$subLocationTable = new SubLocationTable();
$results = $subLocationTable->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $subLocationTable->delete($id);
    header("Location: show_vehicle.php");
}

$locationTable = new LocationTable();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $subLocationTable->delete($id);
    header("Location: show_sub_location.php");
}

?>
<center>
    <h2>Show Sub Location</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Sub Location</th>
            <th>Location</th>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo ($locationTable->readByid($row['locationID']))['name'] ?></td>
            <td><a href="update_sub_location.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>