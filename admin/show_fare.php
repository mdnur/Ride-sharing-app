<?php include_once "inc/header.php"; ?>
<?php


$fareTable = new FareTable();
$results = $fareTable->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $fareTable->delete($id);
    header("Location: show_fare.php");
}

$locationTable = new LocationTable();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $fareTable->delete($id);
    header("Location: show_fare.php");
}

?>
<center>
    <h2>Show Fare</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Location From</th>
            <th>Location To</th>
            <td>Price</td>
            <th>Action</th>
        </tr>
        <?php foreach ($results as $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo ($locationTable->readByid($row['LocationId_From']))['name'] ?></td>
                <td><?php echo ($locationTable->readByid($row['LocationId_To']))['name'] ?></td>
                <td><?php echo $row['Price']; ?></td>
                <td><a href="update_fare.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
            </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>