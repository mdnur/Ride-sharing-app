<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">TransitWise Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>



    <!-- Divider -->
    <hr class="sidebar-divider">



    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDriver" aria-expanded="true" aria-controls="collapseDriver">
            <i class="fas fa-fw fa-folder"></i>
            <span>Driver</span>
        </a>
        <div id="collapseDriver" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_driver.php">Add Driver</a>
                <a class="collapse-item" href="show_driver.php">Show Driver</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLocation" aria-expanded="true" aria-controls="collapseLocation">
            <i class="fas fa-fw fa-folder"></i>
            <span>Location</span>
        </a>
        <div id="collapseLocation" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_location.php">Add Location</a>
                <a class="collapse-item" href="show_location.php">Show Location</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSubLocation" aria-expanded="true" aria-controls="collapseSubLocation">
            <i class="fas fa-fw fa-folder"></i>
            <span>Point</span>
        </a>
        <div id="collapseSubLocation" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_sub_location.php">Add Point</a>
                <a class="collapse-item" href="show_sub_location.php">Show all Points</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFare" aria-expanded="true" aria-controls="collapseFare">
            <i class="fas fa-fw fa-folder"></i>
            <span>Fare</span>
        </a>
        <div id="collapseFare" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_fare.php">Add fare</a>
                <a class="collapse-item" href="show_fare.php">Show Fare</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseVehicle" aria-expanded="true" aria-controls="collapseVehicle">
            <i class="fas fa-fw fa-folder"></i>
            <span>Vehicle</span>
        </a>
        <div id="collapseVehicle" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_vehicle.php">Add Vehicle</a>
                <a class="collapse-item" href="show_vehicle.php">Show Vehicle</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoute" aria-expanded="true" aria-controls="collapseRoute">
            <i class="fas fa-fw fa-folder"></i>
            <span>Route</span>
        </a>
        <div id="collapseRoute" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_route.php">Add Route</a>
                <a class="collapse-item" href="show_route.php">Show Route</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdmin" aria-expanded="true" aria-controls="collapseAdmin">
            <i class="fas fa-fw fa-folder"></i>
            <span>Admin</span>
        </a>
        <div id="collapseAdmin" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="add_admin.php">Add Admin</a>
                <a class="collapse-item" href="show_admin.php">Show Admin</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRider" aria-expanded="true" aria-controls="collapseRider">
            <i class="fas fa-fw fa-folder"></i>
            <span>Rider</span>
        </a>
        <div id="collapseRider" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <a class="collapse-item" href="add_admin.php">Add Admin</a> -->
                <a class="collapse-item" href="show_riders.php">Show Riders</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUserRidingBooking" aria-expanded="true" aria-controls="collapseUserRidingBooking">
            <i class="fas fa-fw fa-folder"></i>
            <span>User Ride Book</span>
        </a>
        <div id="collapseUserRidingBooking" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!-- <a class="collapse-item" href="add_admin.php">Add Admin</a> -->
                <a class="collapse-item" href="showAllActiveRoute.php">All Active Route</a>
                <a class="collapse-item" href="bookingList.php">Show Booking</a>
                <a class="collapse-item" href="allBookingList.php">Show all Booking</a>
            </div>
        </div>
       
        
    </li>




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>