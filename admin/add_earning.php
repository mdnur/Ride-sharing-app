<?php include_once "inc/header.php"; ?>
<?php
if (isset($_POST['log'])) {
    unset($_POST['log']);
    print_r($_POST);
    $data = $_POST;
    print_r($data);
    $location = new EarningTable();

    if ($location->insert('earning', $data)) {
        header("Location: show_earning.php");
    } else {
        echo "Something went wrong";
    }
}


?>
<center>
    <h2>Add Driver</h2><br>
    <div class="login">
        <form id="login" method="post" action="">
            <label for="amount"><b>Amount
                </b>
            </label>
            <input type="text" name="amount" id="amount" placeholder="amount">
            <br><br>

            <label for="date"><b>date
                </b>
            </label>
            <input type="date" name="date" id="date" placeholder="date">
            <br><br>
          
            <input type="submit" name="log" id="log" value="Add earning">
            <br><br>
        </form>
    </div>
</center>
<?php include_once "inc/footer.php"; ?>