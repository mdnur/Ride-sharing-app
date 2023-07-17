<?php include_once "inc/header.php"; ?>
<?php


$DriverTable = new DriverTable();
$results = $DriverTable->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $DriverTable->delete($id);
    header("Location: show_driver.php");
}

?>
<center>
    <h2>Show Driver</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>username</th>
            <th>Phone</th>
            <th>Salary</th>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['salary']; ?></td>
            <td><a href="update_driver.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>