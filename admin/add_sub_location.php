<?php include_once "inc/header.php"; ?>
<?php
use lib\Helper;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = $_POST;
    $SubLocationTable = new SubLocationTable();
    $data['created_at'] = date('Y-m-d H:i:s');
    if ($SubLocationTable->insert($data)) {
        Helper::header('show_sub_location.php');
    } else {
        echo "Something went wrong";
    }
}

$location = new LocationTable();
$results = $location->readAll();
?>


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Point</h1>

</div>

<!-- Content Row -->

<!-- Content Row -->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Add Point</h6>
    </div>
    <div class="card-body">
        <form id="login" method="post" action="">
            <div class="form-group">
                <label for="locationID">Location Name</label>
                <select name="locationID" class="form-control" id="locationID">

                    <?php foreach ($results as $row) { ?>
                        <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="form-group">
                <label for="name">Point Name</label>
                <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" placeholder="Bashundara R/A">
                <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
            </div>


            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-primary">Create Point </button>

        </form>
    </div>
</div>
<?php include_once "inc/footer.php"; ?>