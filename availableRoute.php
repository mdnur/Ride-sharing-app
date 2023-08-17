<?php

include_once "inc/header.php";

use lib\Session;



?>

<?php

$location = new LocationTable();
$locations = $location->readAll();


$route = new RouteTable();
$results = $route->getRouteByFieldNameAndDateAndFromToday('status', "0",date('Y-m-d'));



?>

<main class="py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">Find Route</h5>
                        </div>

                    </div>

                    <div class="card-body">
                        <form id="CheckAvailable">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">From</label>
                                <select class="form-control" id="fromSelect" name="fromSelect">
                                    <option value="">Select a location</option>
                                    <?php foreach ($locations as $row) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="FromPoint">Point From </label>
                                <select class="form-control" id="FromPoint">
                                    <option value="">Select</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="to">To </label>
                                <select class="form-control" id="toSelect">
                                    <option value="">Select a location</option>
                                    <?php foreach ($locations as $row) { ?>
                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="toPoint">Point to </label>
                                <select class="form-control" id="toPoint">
                                    <option>Select</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                    </div>
                </div>


                <div class="card " id="tableC">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">Show Route</h5>
                        </div>

                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>From </th>
                                        <th>To</th>
                                        <th>Fare</th>
                                        <th>Start at</th>
                                        <th>Ends at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="routeTableBody">
                                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include_once "inc/footer.php"; ?>