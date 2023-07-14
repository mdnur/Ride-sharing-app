<?php include_once "inc/header.php"; ?>
<?php


$locationTable = new LocationTable();
$results = $locationTable->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $locationTable->delete($id);
    header("Location: show_location.php");
}
?>
<center>
    <h2>Show Location</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><a href="update_location.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>