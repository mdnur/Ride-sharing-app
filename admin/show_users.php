<?php include_once "inc/header.php"; ?>
<?php


$rider = new RiderTable();
$results = $rider->readAll();

?>
<center>
    <h2>Show Rider</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>phone</th>
            <!-- <th>Action</th> -->
        </tr>
        <?php foreach ($results as $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <!-- <td><a href="view_admin.php?id=<?php echo $row['id']; ?>">View</a> | <a href="?delete=<?php echo $row['id']; ?>">Delete</a></td> -->
            </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>