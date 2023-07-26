<?php include_once "inc/header.php"; ?>
<?php
use lib\Helper;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $locationData = $_POST;
    $location = new LocationTable();

    if ($location->update($locationData,$_GET['id'])) {
        Helper::header('show_location.php');
    } else {
        echo "Something went wrong";
    }
}
if (isset($_POST['back'])) {
    header("Location: show_location.php");
}

$locationTable = new LocationTable();
$row = $locationTable->readByid($_GET['id']);
?>


 <!-- Page Heading -->
 <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Location</h1>

    </div>

    <!-- Content Row -->

    <!-- Content Row -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Location</h6>
        </div>
        <div class="card-body">
            <form id="login" method="post" action="">
                <div class="form-group">
                    <label for="name">Location Name</label>
                    <input type="name" class="form-control" name="name" id="name" aria-describedby="nameHelp" value="<?php echo $row['name']; ?>">
                    <!-- <small id="nameHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
                </div>


                <div class="form-group">
                    <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                </div>
                <button type="submit" class="btn btn-primary">Update Location </button>

            </form>
        </div>
    </div>
<?php include_once "inc/footer.php"; ?>