<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<!-- For IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- For Resposive Device -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tara-taxi-admin</title>
		<script src="<?php echo $base_url ?>/assets/js/jQuery-2.1.4.min.js"></script>
        <link rel="icon" href="<?php echo $base_url ?>/assets/img/logo2.png" type="image/png" sizes="16x16">
        <!-- Bootstrap -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="<?php echo $base_url ?>/assets/css/bootstrap.min.css" rel="stylesheet"  media="all">
        <link href="<?php echo $base_url ?>/assets/css/bootstrap-responsive.min.css" rel="stylesheet"  media="all">
        <link href="<?php echo $base_url ?>/assets/css/styles.css" rel="stylesheet"  media="all">
        <link href="<?php echo $base_url ?>/assets/css/custom.css" rel="stylesheet"  media="all">
        <script src="<?php echo $base_url ?>/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		<script src="<?php echo $base_url ?>/assets/js/jquery-ui.min.js"></script>
		<link href="<?php echo $base_url ?>/assets/css/jquery-ui.min.css" rel="stylesheet"  media="all">
		<link rel="stylesheet" href="<?php echo $base_url ?>/assets/css/font-awesome.min.css">


		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>




		<!-- <script src="assets/js/plugins/jquery-3.5.1.min.js"></script> -->
	    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
	    <link href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css" rel="stylesheet">


	    <link rel="stylesheet" href="https://demos.codexworld.com/3rd-party/fullcalendar-5.11.0/lib/main.css" />
		<script src="https://demos.codexworld.com/php-event-calendar-using-fullcalendar-javascript-library/js/sweetalert2.all.min.js"></script>
		<script src="https://demos.codexworld.com/3rd-party/fullcalendar-5.11.0/lib/main.js"></script>


		<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->

<!-- jQuery library -->
<!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script> -->

<!-- Popper JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> -->



    </head>
    <body>
		<div class="navbar header-top">
			<div class="navbar-box">
				<div class="container-fluid">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					 <span class="icon-bar"></span>
					</a>
					<a class="brand" href="<?php echo $base_url ?>/dashboard.php"><img src="<?php echo $base_url ?>/assets/img/logo2.png" alt="Logo" style="height:40px;"></a>
					<div class="nav-collapse collapse">
						<ul class="nav pull-right">
							<li class="dropdown">
						       <a class="log-out-btn" href="<?php echo $base_url ?>/logout.php"><img src="<?php echo $base_url ?>/assets/img/power_symbol.png" alt="Logout"> Logout</a>
							</li>
						</ul>
						<ul class="nav">
							
						</ul>
					</div>
					<!--/.nav-collapse -->
				</div>
			</div>
		</div>
        
		<div class="container-fluid">
            <div class="row-fluid">
				<div class=" nav-side-menu">
					<div id="sidebar"  class="menu-list">
						<ul id="menu-content" class="nav nav-list bs-docs-sidenav nav-collapse">
							<li class="">
								<a href="<?php echo $base_url ?>/dashboard.php">
									<i class="fa fa-dashboard fa-lg"></i> Dashboard
								</a>
							</li>

							<!-- <li data-toggle="collapse" data-target="#master_management" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>Master Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="master_management">
									<li class="">
										<a href="<?php echo $base_url ?>/brand/view.php">
											<i class="fa fa-gift fa-lg"></i> Car Barand
										</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/models/view.php">
											<i class="fa fa-gift fa-lg"></i> Car Models
										</a>
									</li>

									<li class="">
										<a href="<?php echo $base_url ?>/color/view.php">
											<i class="fa fa-gift fa-lg"></i> Car Color
										</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/vehicle_types/view.php">
											<i class="fa fa-gift fa-lg"></i> Car Types
										</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/country/view.php"><i class="fa fa-gift fa-lg"></i> All Country Listing</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/state/view.php"><i class="fa fa-gift fa-lg"></i> All State Listing</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/city/view.php"><i class="fa fa-gift fa-lg"></i> All City Listing</a>
									</li>
								</ul>		
									
							</li> -->
							
							
							

							<li data-toggle="collapse" data-target="#users" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>  User Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="users">
									<li class="">
										<a href="<?php echo $base_url ?>/users/view.php"> All User Listing</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/users/add.php"> Add New User</a>
									</li>
								</ul>
							</li>	
							
							<li data-toggle="collapse" data-target="#truck_partner" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>Truck Partner Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="truck_partner">
									<li class="">
										<a href="<?php echo $base_url ?>/truck_partner/view.php"> All Truck Partner</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/truck_partner/add.php"> Add New Truck Partner</a>
									</li>
								</ul>
							</li>
							<li data-toggle="collapse" data-target="#truck_driver" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>Truck Driver Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="truck_driver">
									<li class="">
										<a href="<?php echo $base_url ?>/truck_driver/view.php"> All Truck Driver</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/truck_driver/add.php"> Add New Truck Driver</a>
									</li>
								</ul>
							</li>

							<li data-toggle="collapse" data-target="#car_owner" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>Car Owner Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="car_owner">
									<li class="">
										<a href="<?php echo $base_url ?>/car_owner/view.php"> All Car Owner</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/car_owner/add.php"> Add New Car Owner</a>
									</li>
								</ul>
							</li>

							<li class="">
								<a href="<?php echo $base_url ?>/car/view.php">
									<i class="fa fa-gift fa-lg"></i> Car Listing Management
								</a>
							</li>

							<li class="">
								<a href="<?php echo $base_url ?>/car_booking_history/view.php">
									<i class="fa fa-gift fa-lg"></i>Car Booking History
								</a>
							</li>
							<li class="">
								<a href="<?php echo $base_url ?>/truck_booking_history/view.php">
									<i class="fa fa-gift fa-lg"></i>Truck Booking History
								</a>
							</li>

							<li data-toggle="collapse" data-target="#truck" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>Truck List Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="truck">
									<li class="">
										<a href="<?php echo $base_url ?>/truck/view.php"> All Trucks</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/truck/add.php"> Add New Truck</a>
									</li>
								</ul>
							</li>

							<li data-toggle="collapse" data-target="#chassis" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>Chassis List Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="chassis">
									<li class="">
										<a href="<?php echo $base_url ?>/chassis/view.php"> All Chassis</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/chassis/add.php"> Add New Chassis</a>
									</li>
								</ul>
							</li>

							<li data-toggle="collapse" data-target="#pickup_port" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>Pick Up Port List <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="pickup_port">
									<li class="">
										<a href="<?php echo $base_url ?>/pickup_port/view.php"> All Pick Up Port</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/pickup_port/add.php"> Add New Pick Up Port</a>
									</li>
								</ul>
							</li>
			

							<li data-toggle="collapse" data-target="#notifications" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>  Notifications Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="notifications">
									<li class="">
										<a href="<?php echo $base_url ?>/notifications/view.php"> All Notifications list</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/notifications/add.php"> Add New Notifications</a>
									</li>
								</ul>
							</li>	

							<li class="">
								<a href="<?php echo $base_url ?>/fair_management/view.php">
									<i class="fa fa-gift fa-lg"></i> Truck Fair Management
								</a>
							</li>
							<!-- <li data-toggle="collapse" data-target="#car" class="collapsed ">
								<a href="javascript:void(0);"><i class="fa fa-gift fa-lg"></i>  Car Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="car">
									<li class="">
										<a href="<?php echo $base_url ?>/car/view.php"> All Car Listing</a>
									</li>
									<li class="">
										<a href="<?php echo $base_url ?>/car/add.php"> Add New Car</a>
									</li>
								</ul>
							</li>
 -->





							<!-- <li data-toggle="collapse" data-target="#makes" class="collapsed ">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Make Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="makes">
									<li class="">
										<a href="makes-management-list.php"> Make Listing</a>
									</li>
									<li class="">
										<a href="makes-management-add.php"> Add New Make</a>
									</li>
								</ul>
							</li>	 -->

							<!-- <li data-toggle="collapse" data-target="#models" class="collapsed ">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Model Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="models">
									<li class="">
										<a href="models-list.php"> Model Listing</a>
									</li>
									<li class="">
										<a href="models-add.php"> Add New Model</a>
									</li>
								</ul>
							</li> -->
								
							<!-- <li data-toggle="collapse" data-target="#countries" class="collapsed ">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Countries Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="countries">
									<li class="">
										<a href="countries-management-list.php"> Country Listing</a>
									</li>
									<li class="">
										<a href="countries-management-add.php"> Add New Country</a>
									</li>
								</ul>
							</li>-->
							
							<!--<li data-toggle="collapse" data-target="#states" class="collapsed ">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  State Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="states">
									<li class="">
										<a href="states-management-list.php"> State Listing</a>
									</li>
									<li class="">
										<a href="states-management-add.php"> Add New State</a>
									</li>
								</ul>
							</li>-->
							
							 <!--<li data-toggle="collapse" data-target="#cityboundaries" class="collapsed ">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  City Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="cityboundaries">
									<li class="">
										<a href="city-boundaries-list.php">City Listing</a>
									</li>
									<li class="">
										<a href="city-boundaries-night-charges.php"> Night Charges</a>
									</li>
									<li class="">
										<a href="city-boundaries-add-night-charge.php"> Add New Night Charge</a>
									</li>
									<li class="">
										<a href="city-boundaries-peak-charges.php"> Peak Charges</a>
									</li>
									<li class="">
										<a href="city-boundaries-add-peak-charge.php"> Add New Peak Charge</a>
									</li>
								</ul>
							</li> 
							
							<li data-toggle="collapse" data-target="#vechicletypes" class="collapsed ">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Vehicle Type Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse " id="vechicletypes">
									<li class="">
										<a href="vehicle-types-list.php"> Vehicle Type Listing</a>
									</li>
									<li class="">
										<a href="vehicle-types-add.php"> Add New Vehicle Type</a>
									</li>
								</ul>
							</li>-->

							<!-- <li data-toggle="collapse" data-target="#fares" class="collapsed">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Fares Management <span class="arrow"></span></a>
								<ul class="sub-menu  collapse" id="fares" style="height: 0px;">
									<li class="">
										<a href="fares-index.php"> Fare Listing</a>
									</li>
									<li class="">
										<a href="fares-add.php"> Add New Fare</a>
									</li>
								</ul>
							</li>
							<li data-toggle="collapse" data-target="#drivers" class="collapsed">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Driver Management <span class="arrow"></span></a>
								<ul class="sub-menu  collapse" id="drivers" style="height: 0px;">
									<li class="">
										<a href="drivers-index.php"> Driver Listing</a>
									</li>
									<li class="">
										<a href="drivers-add.php"> Add New Driver</a>
									</li>
								</ul>
							</li>
							<li data-toggle="collapse" data-target="#rentalpackages" class=" collapsed">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Rental Package Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse" id="rentalpackages" style="height: 0px;">
									<li class="">
										<a href="rental-package-listing.php"> Rental Package Listing</a>
									</li>
									<li class="">
										<a href="rental-package-add.php"> Add New Rental Package</a>
									</li>
								</ul>
							</li> -->
								
							 <!--<li class="">
								<a href="../settings/edit.html"><i class="fa fa-gift fa-lg"></i> Setting Management</a>
							</li>--> 
							<!-- <li data-toggle="collapse" data-target="#bookings" class="collapsed">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Booking Management <span class="arrow"></span></a>
								<ul class="sub-menu  collapse" id="bookings" style="height: 0px;">
									<li class="">
										<a href="bookings-current-bookings.php"> Current Bookings</a>
									</li>
									<li class="">
										<a href="bookings-completed-bookings.php"> Completed Bookings</a>
									</li>
								</ul>
							</li>
							<li data-toggle="collapse" data-target="#promocodes" class="collapsed">
								<a href="#"><i class="fa fa-gift fa-lg"></i>  Promocode Management <span class="arrow"></span></a>
								<ul class="sub-menu collapse" id="promocodes">
									<li class="">
										<a href="promocodes-list.php"> Promocode Listing</a>
									</li>
									<li class="">
										<a href="promocodes-add.php"> Add New Promocode</a>
									</li>
								</ul>
							</li> -->
						</ul>
					</div>
				</div>