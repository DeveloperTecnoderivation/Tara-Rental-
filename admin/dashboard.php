<?php 
include("conn-web/cw.php");
if(!$_SESSION["tata_login_username"]){
  header('Location:index.php'); 
}
?>
<?php include "header.php";  ?>

<!DOCTYPE html>
<html lang="en">
<head>
<style>
        .dashboard-container {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            padding: 20px;
            font-family: Arial, sans-serif;
            justify-content: flex-start;
        }

        .dashboard-box {
            width: 210px;
            height: 110px;
            padding: 15px;
            border-radius: 8px;
            color: white;
            position: relative;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-decoration: none;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .dashboard-box {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
                      }

    .dashboard-box:hover {
    text-decoration: none; /* Ensure no underline on hover */
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    cursor: pointer;
}
  .dashboard-box a {
    text-decoration: none;
    color: inherit;
}

        .bg-red {
    background: linear-gradient(to bottom, #e74c3c, #c0392b);
    color: white;
}
.bg-orange {
    background: linear-gradient(to bottom, #f39c12, #e67e22);
    color: white;
}
.bg-blue {
    background: linear-gradient(to bottom, #3498db, #2980b9);
    color: white;
}
.bg-green {
    background: linear-gradient(to bottom, #2ecc71, #27ae60);
    color: white;
}
.bg-purple {
    background: linear-gradient(to bottom, #9b59b6, #8e44ad);
    color: white;
}
.bg-darkgray {
    background: linear-gradient(to bottom, #34495e, #2c3e50);
    color: white;
}
.bg-lightgray {
    background: linear-gradient(to bottom, #ecf0f1, #bdc3c7);
    color: #333;
}


        .dashboard-box strong {
            font-size: 26px;
        }

        .more-info {
            font-size: 14px;
            align-self: flex-end;
            color: inherit;
        }

        .title {
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="span10" id="content">
    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">Dashboard</div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <?php 
                    // Get data for Total Users, Total Car Owners, Total Truck Partners, Total Drivers
                    $getdata_user = "SELECT COUNT(*) AS total_users FROM tbl_users WHERE role='user'";  
                    $gdata_user = mysqli_query($connect, $getdata_user);
                    $row_user = mysqli_fetch_assoc($gdata_user);
                    $total_users = $row_user['total_users'];

                    $getdata_car_owner = "SELECT COUNT(*) AS total_car_owner FROM tbl_users WHERE role='car_owner'";  
                    $gdata_car_owner = mysqli_query($connect, $getdata_car_owner);
                    $row_car_owner = mysqli_fetch_assoc($gdata_car_owner);
                    $total_car_owner = $row_car_owner['total_car_owner'];

                    $getdata_truck_partner = "SELECT COUNT(*) AS total_truck_partner FROM tbl_users WHERE role='truck_partner'";  
                    $gdata_truck_partner = mysqli_query($connect, $getdata_truck_partner);
                    $row_truck_partner = mysqli_fetch_assoc($gdata_truck_partner);
                    $total_truck_partner = $row_truck_partner['total_truck_partner'];

                    $getdata_driver = "SELECT COUNT(*) AS total_driver FROM tbl_users WHERE role='driver'";  
                    $gdata_driver = mysqli_query($connect, $getdata_driver);
                    $row_driver = mysqli_fetch_assoc($gdata_driver);
                    $total_driver = $row_driver['total_driver'];

                    // Get data for Total Cars, Total Car Bookings, Total Truck Bookings
                    $getdata_car = "SELECT COUNT(*) AS total_cars FROM tbl_car";  
                    $gdata_car = mysqli_query($connect, $getdata_car);
                    $row_car = mysqli_fetch_assoc($gdata_car);
                    $total_cars = $row_car['total_cars'];

                    $getdata_car_booking = "SELECT COUNT(*) AS total_car_booking FROM tbl_car_order_booking";  
                    $gdata_car_booking = mysqli_query($connect, $getdata_car_booking);
                    $row_car_booking = mysqli_fetch_assoc($gdata_car_booking);
                    $total_car_booking = $row_car_booking['total_car_booking'];

                    $getdata_truck_booking = "SELECT COUNT(*) AS total_truck_booking FROM tbl_truck_order_booking";  
                    $gdata_truck_booking = mysqli_query($connect, $getdata_truck_booking);
                    $row_truck_booking = mysqli_fetch_assoc($gdata_truck_booking);
                    $total_truck_booking = $row_truck_booking['total_truck_booking'];
                    ?>
          <div class="dashboard-container">
    <a href="users/view.php" class="dashboard-box bg-red">
        <div class="title">Total Users</div>
        <strong><?php echo $total_users; ?></strong>
        <div class="more-info">More Info</div>
    </a>

    <a href="car_owner/view.php" class="dashboard-box bg-orange">
        <div class="title">Total Car Owners</div>
        <strong><?php echo $total_car_owner; ?></strong>
        <div class="more-info">More Info</div>
    </a>

    <a href="car/view.php" class="dashboard-box bg-blue">
        <div class="title">Total Cars</div>
        <strong><?php echo $total_cars; ?></strong>
        <div class="more-info">More Info</div>
    </a>

    <a href="car_booking_history/view.php" class="dashboard-box bg-green">
        <div class="title">Total Car Bookings</div>
        <strong><?php echo $total_car_booking; ?></strong>
        <div class="more-info">More Info</div>
    </a>

    <a href="truck_partner/view.php" class="dashboard-box bg-purple">
        <div class="title">Total Truck Partners</div>
        <strong><?php echo $total_truck_partner; ?></strong>
        <div class="more-info">More Info</div>
    </a>

    <a href="truck_driver/view.php" class="dashboard-box bg-darkgray">
        <div class="title">Total Drivers</div>
        <strong><?php echo $total_driver; ?></strong>
        <div class="more-info">More Info</div>
    </a>

    <a href="truck_booking_history/view.php" class="dashboard-box bg-lightgray">
        <div class="title">Total Truck Bookings</div>
        <strong><?php echo $total_truck_booking; ?></strong>
        <div class="more-info">More Info</div>
    </a>
</div>

                            <!-- <div class="span3">
                                <a href="#" class="btn btn-light btn-lg" role="button">
                                    <span class="glyphicon glyphicon-signal"></span> <br />Total Truck Partners
                                    <p><?php echo $total_truck_partner; ?></p>
                                    <p style="float:right;font-size:15px;">More Info</p>
                                </a>
                            </div>
                            <div class="span3">
                                <a href="#" class="btn btn-info btn-lg" role="button">
                                    <span class="glyphicon glyphicon-signal"></span> <br />Total Drivers
                                    <p><?php echo $total_driver; ?></p>
                                    <p style="float:right;font-size:15px;">More Info</p>
                                </a>
                            </div>
                            <div class="span3">
                                <a href="#" class="btn btn-danger btn-lg" role="button">
                                    <span class="glyphicon glyphicon-signal"></span> <br />Total Truck Bookings
                                    <p><?php echo $total_truck_booking; ?></p>
                                    <p style="float:right;font-size:15px;">More Info</p>
                                </a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>
</div>
</div>
</div>
</body>
</html>
<?php include "footer.php";  ?>