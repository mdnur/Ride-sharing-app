<?php

use lib\Session;

include_once "inc/header.php"; ?>
<?php
if (isset(($_GET['action']))) {
	if ($_GET['action'] == 'logout') {
		Session::destory();
		header("Location:login.php");
	}
}


$route = new RouteTable();
$results = $route->getRouteByFieldNameByToday('status', 0);

$locations = new LocationTable();

?>
<!-- header -->
<header class="header ">
	<div class="overlay"></div>
	<div class="container">
		<div class="description ">
			<h1>
				TransitWise
				<br>
				<p>A ride sharing and booking service. We offer convenient, affordable and safe commute.</p>

				<button class="btn btn-outline-secondary btn-lg">Book Ride Now!</button>
			</h1>
		</div>
	</div>

</header>
<!-- about section -->
<div class="about p-10" id="about">
	<div class="container">
		<h1 class="text-center">Nearby Routes Today</h1>
		<div class="row">
			<div class="col-lg-4 col-md-4 col-sm-12">
				<img src="images/background.jpeg" class="img-fluid">
				<span class="text-justify">TransitWise</span>
			</div>
			<div class="col-lg-8 col-md-8 col-sm-12 desc">
				<?php if (sizeof($results) != 0) { ?>
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead>
								<tr>
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
				<?php } else { ?>
					<div class="alert alert-info" role="alert">
						No Nearby Route Available Currently
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>


<?php include_once "inc/footer.php"; ?>