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