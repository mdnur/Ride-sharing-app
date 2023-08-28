<?php

use lib\Session;

include_once('inc/header.php'); ?>


<?php


$results = new RouteTable();
$results = $results->getDriverIncomeByMonth(Session::get('driver')['id'], Date('m'), Date('Y'));

?>

<div class="card-header">Find Income </div>



<div class="card-body">
    <form id="incomeForm" action="my_income_api.php" method="POST">
        <div class="form-group">
            <label for="month">Select Month and Year:</label>
            <input type="month" class="form-control" id="month" name="month" value="<?php echo Date('Y-m'); ?>">
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
    </form>
    <br>
    <div>Your income of <span id="showMonth"></span> is: <b><span id="incomeAmount"><?php echo $results['totalPayment']; ?></span></b> taka</div>
</div>

<script>
    $("#incomeForm").submit(function(event) {
        event.preventDefault(); // Prevent form submission

        const selectedMonth = $("#month").val(); // Get selected month and year

        const dateString = selectedMonth;
        const date = new Date(dateString);

        const options = {
            year: 'numeric',
            month: 'long'
        };
        const formattedDate = date.toLocaleDateString('en-US', options);

        // Make an AJAX request to fetch the updated income
        $.ajax({
            type: "POST", // Or "GET" depending on your server's API
            url: "my_income_api.php", 
            data: {
                month: selectedMonth
            },
            success: function(response) {
                // Update the income amount on the page
                if (response.totalPayment == null) {
                    $("#incomeAmount").html("<b>0</b>");
                    return;
                }
                $("#incomeAmount").html("<b>" + response.totalPayment + "</b>");
                $("#showMonth").html("<b> "+formattedDate+"</b>");
                console.log(selectedMonth);
                console.log(response);
            },
            error: function() {
                console.log("Error fetching income data.");
            }
        });
    });
</script>

<?php include_once('inc/footer.php'); ?>