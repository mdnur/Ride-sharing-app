<?php include_once('inc/header.php'); ?>


<?php

$results = new UserRideBookTable();
$results = $results->getRiders($_GET['id']);

?>

<div class="card-header">All the Rider Information for <b>Route Id: <?php echo $_GET['id']; ?></b></div>

<div class="card-body">


    <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Rider Name</th>
                    <th>Rider Phone</th>
                    <th>Pickup location</th>
                    <th>Drop location </th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                <?php $count = 1; ?>
                <?php foreach ($results as $row) { ?>
                    <tr>
                        <td><?php echo $count++ ?></td>
                        <td><?php echo $row['name']; ?></td>

                        <td><?php echo $row['phone']; ?></td>
                        <td><?php echo $row['pickup_location']; ?></td>

                        <td><?php echo $row['drop_location']; ?></td>
                        <td>
                            <a href="tel:<?php echo $row['phone']; ?>" class="btn btn-primary">Call</a>
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<?php include_once('inc/footer.php'); ?>