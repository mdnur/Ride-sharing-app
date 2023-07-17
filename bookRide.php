<?php

include_once "inc/header.php";

use lib\Session;



?>
<center>
    <h2>Book Ride</h2><br>
    <div class="login">
        <?php


        $route = new RouteTable();
        $results = $route->readAllStatus(1);

        $locations = new LocationTable();


        ?>


        <center>
            <h2>Show Route</h2><br>

            <table>
                <tr>
                    <th>ID</th>
                    <th>Location From</th>
                    <th>Location To</th>
                    <th>Fare</th>
                    <th>First Time</th>
                    <th>Last Time</th>
                    <th>Action</th>
                </tr>
                <?php foreach ($results as $row) { ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo ($locations->readByid($row['LocationId_From']))['name'] ?></td>
                        <td><?php echo ($locations->readByid($row['LocationId_To']))['name'] ?></td>
                        <td><?php echo $row['fare']; ?></td>
                        <td><?php echo $row['firstTime']; ?></td>
                        <td><?php echo $row['lastTime']; ?></td>
                        <td><a href="booking_confirm.php?id=<?php echo $row['id']; ?>">Book</a> </td>
                    </tr>
                <?php } ?>
            </table>
        </center>
        <?php include_once "inc/footer.php"; ?>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>