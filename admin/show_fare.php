<?php include_once "inc/header.php"; ?>
<?php

use lib\Helper;

$fareTable = new FareTable();
$results = $fareTable->readAll();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $fareTable->delete($id);
    Helper::header("show_fare.php");
}

$locationTable = new LocationTable();

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $fareTable->delete($id);
    Helper::header("show_fare.php");
}

?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fare</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary"> Fare</h6>
        <a href="add_fare.php" class="btn btn-primary">Add New</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <td>Price</td>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Location From</th>
                        <th>Location To</th>
                        <td>Price</td>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($results as $row) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo ($locationTable->readByid($row['locationId_From']))['name'] ?></td>
                            <td><?php echo ($locationTable->readByid($row['locationId_To']))['name'] ?></td>
                            <td><?php echo $row['Price']; ?></td>
                            <td><a href="update_fare.php?id=<?php echo $row['id']; ?>"class="btn btn-primary"  >Edit</a> | <a class="btn btn-danger" href="?delete=<?php echo $row['id']; ?>">Delete</a></td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>
</div>



<?php include_once "inc/footer.php"; ?>