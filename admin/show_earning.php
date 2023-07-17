<?php include_once "inc/header.php"; ?>
<?php


$earning = new EarningTable();
$results = $earning->readAll();


?>
<center>
    <h2>Show Earning</h2><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Amount</th>
        </tr>
        <?php foreach ($results as $row) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['amount']; ?></td>
            </tr>
        <?php } ?>
    </table>
</center>
<?php include_once "inc/footer.php"; ?>