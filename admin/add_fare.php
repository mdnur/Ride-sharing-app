<?php include_once "inc/header.php"; ?>
<?php

use lib\Helper;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $fare = new FareTable();
    $data['created_at'] = date('Y-m-d H:i:s');
    if ($fare->insert($data)) {
        Helper::header('show_fare.php');
    } else {
        echo "Something went wrong";
    }
}

$location = new LocationTable();
$results = $location->readAll();
?>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Fare</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Fare</h6>
    </div>
    <div class="card-body">
        <form id="login" method="post" action="">
            <div class="form-group">
                <label for="locationID">From</label>
                <select name="locationId_From" class="form-control" id="locationFrom">
                    <?php foreach ($results as $row) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <div class="form-group">
                <label for="locationID">To</label>
                <select name="locationId_To" class="form-control" id="locationTo"></select>
            </div>
            <div class="form-group">
                <label for="name">Fare</label>
                <input type="number" min="100" class="form-control" name="Price" id="name" aria-describedby="nameHelp" placeholder="100">
                <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>


            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Create Fare </button>

        </form>
    </div>
</div>
<script>
    // Get references to the two dropdowns
    const locationFromDropdown = document.getElementById('locationFrom');
    const locationToDropdown = document.getElementById('locationTo');

    // Event listener for the "From" dropdown
    locationFromDropdown.addEventListener('change', updateToDropdown);

    // Function to update the "To" dropdown options
    function updateToDropdown() {
        const selectedFromId = locationFromDropdown.value;

        // Clear existing options in the "To" dropdown
        locationToDropdown.innerHTML = '';

        // Re-populate the "To" dropdown options based on the selected "From" value
        <?php foreach ($results as $row) { ?>
            // Skip the option with the same ID as the selected "From" value
            if (<?php echo $row['id']; ?> !== parseInt(selectedFromId)) {
                const option = document.createElement('option');
                option.value = <?php echo $row['id']; ?>;
                option.textContent = '<?php echo $row['name']; ?>';
                locationToDropdown.appendChild(option);
            }
        <?php } ?>
    }

    // Call the updateToDropdown function initially to set the initial options
    updateToDropdown();
</script>

<?php include_once "inc/footer.php"; ?>