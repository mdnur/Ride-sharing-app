<?php include_once "inc/header.php"; ?>
<?php


$DriverTable = new DriverTable();
$results = $DriverTable->readAll();

?>
<center>
    <h2>Show Driver</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><a href="update_driver.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="">Delete</a></td>
        </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>