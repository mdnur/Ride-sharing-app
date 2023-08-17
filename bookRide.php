<?php

include_once "inc/header.php";

use lib\Session;

$route = new RouteTable();
$results = $route->getRouteByFieldNameAndDateAndFromToday('status', "0",date('Y-m-d'));

$locations = new LocationTable();

?>
<main class="py-4 ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header justify-content-between d-flex">
                        <div class="">
                            <h5 class="mt-10">My Route Booking</h5>
                        </div>
                        <div>
                            <form>
                                <div class="form-row align-items-center">
                                    <div class="col-auto ">
                                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                                        <input type="text" class="form-control " id="inlineFormInputName2" placeholder="search ...">

                                    </div>
                                    <div class="col-auto ">
                                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                                        <select class="form-control " id="inlineFormInputName2" placeholder="search ...">
                                            <option value="Today">Today</option>
                                            <option value="Tomorrow">Tomorrow</option>
                                        </select>
                                    </div>
                                    <div class="col-auto ">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
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
                                <?php $count = 1; ?>
                                <tbody>
                                    <?php foreach ($results as $row) { ?>
                                        <tr>
                                            <td><?php echo $count++; ?></td>
                                            <td><?php echo ($locations->readByid($row['locationId_From']))['name'] ?></td>
                                            <td><?php echo ($locations->readByid($row['locationId_To']))['name'] ?></td>
                                            <td><?php echo $row['Fare']; ?>TK</td>
                                            <td><?php echo TimeHelper::getFormattedTime($row['StartJourneyTime']); ?></td>
                                            <td><?php echo TimeHelper::getFormattedTime($row['DepartureTime']); ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-info" href="booking_confirm.php?id=<?php echo $row['id']; ?>">Book</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
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