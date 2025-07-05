<?php
include("../conn-web/cw.php");
if (!$_SESSION["tata_login_username"]) {
    header('Location:index.php');
}
include "../header.php";
?>


<!-- Latest compiled and minified CSS -->
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->


<!-- jQuery library -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script> -->

<!-- Latest compiled JavaScript -->
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->


<?php
$get_owner = "select * from tbl_users";
$results_owner = mysqli_query($connect, $get_owner);
$rown_owner = mysqli_fetch_array($results_owner);

$f_name = $rown_owner['f_name'];
$l_name = $rown_owner['l_name'];

?>
<div class="span9" id="content">
    <div class="row-fluid">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="breadcrumb">
                    <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
                    <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
                    <li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li>
                    <li class="active">Truck Booking History</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <!-- block -->
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left"> All Booking History </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="<?php echo $base_url ?>/truck/view.php"><button class="btn btn-warning"><i class="fa fa-arrow-left icon-white"></i> Back</button></a>
                        </div>
                    </div>
                    <br>

                    <form method="get" class="form-horizontal">
                        <div class="row-fluid">
                            <div class="span3">
                                <input type="text" name="partner_name" placeholder="Truck Partner Name" value="<?php echo $_GET['partner_name'] ?? ''; ?>" class="input-xlarge focused">
                            </div>

                            <div class="span3">
                                <input type="text" name="driver_name" placeholder="Driver Name" value="<?php echo $_GET['driver_name'] ?? ''; ?>" class="input-xlarge focused">
                            </div>

                            <div class="span3">
                                <input type="text" name="order_id" placeholder="Booking ID" value="<?php echo $_GET['order_id'] ?? ''; ?>" class="input-xlarge focused">
                            </div>

                            <div class="span3">
                                <select name="booking_status" class="input-xlarge focused">
                                    <option value="">Booking Status</option>
                                    <option value="Pending" <?php if (@$_GET['booking_status'] == 'Pending') echo "selected"; ?>>Pending</option>
                                    <option value="Ongoing" <?php if (@$_GET['booking_status'] == 'Ongoing') echo "selected"; ?>>Ongoing</option>
                                    <option value="DriverConfirmed" <?php if (@$_GET['booking_status'] == 'DriverConfirmed') echo "selected"; ?>>DriverConfirmed</option>
                                    <option value="Cancelled" <?php if (@$_GET['booking_status'] == 'Cancelled') echo "selected"; ?>>Cancelled</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row-fluid">
                            <div class="span3">
                                <input type="date" name="pickup_from" value="<?php echo $_GET['pickup_from'] ?? ''; ?>" class="input-xlarge focused">
                            </div>

                            <div class="span3">
                                <input type="date" name="pickup_to" value="<?php echo $_GET['pickup_to'] ?? ''; ?>" class="input-xlarge focused">
                            </div>

                            <div class="span3">
                                <input type="submit" name="search" value="Search" class="btn btn-primary">
                                <a href="view.php" class="btn">Reset</a>
                            </div>
                        </div>
                    </form>

                    <?php
                    $where = "WHERE 1=1";

                    if (!empty($_GET['partner_name'])) {
                        $name = mysqli_real_escape_string($connect, $_GET['partner_name']);
                        $where .= " AND truck_partner_id IN (SELECT id FROM tbl_users WHERE company_name LIKE '%$name%')";
                    }

                    if (!empty($_GET['driver_name'])) {
                        $name = mysqli_real_escape_string($connect, $_GET['driver_name']);
                        $where .= " AND select_driver_id IN (SELECT id FROM tbl_users WHERE f_name LIKE '%$name%')";
                    }

                    if (!empty($_GET['order_id'])) {
                        $order_id = mysqli_real_escape_string($connect, $_GET['order_id']);
                        $where .= " AND order_id LIKE '%$order_id%'";
                    }

                    if (!empty($_GET['booking_status'])) {
                        $status = mysqli_real_escape_string($connect, $_GET['booking_status']);
                        $where .= " AND booking_status = '$status'";
                    }

                    if (!empty($_GET['pickup_from']) && !empty($_GET['pickup_to'])) {
                        $from = $_GET['pickup_from'];
                        $to = $_GET['pickup_to'];
                        $where .= " AND pick_up_date_time BETWEEN '$from' AND '$to'";
                    } elseif (!empty($_GET['pickup_from'])) {
                        $from = $_GET['pickup_from'];
                        $where .= " AND pick_up_date_time >= '$from'";
                    } elseif (!empty($_GET['pickup_to'])) {
                        $to = $_GET['pickup_to'];
                        $where .= " AND pick_up_date_time <= '$to'";
                    }
                    if (!empty($_GET['truck_id']) && is_numeric($_GET['truck_id'])) {
                        $truck_id = intval($_GET['truck_id']);
                        $where .= " AND truck_id = $truck_id";
                    } else {
                        die("Invalid or missing truck_id in URL.");
                    }
                    $sql = "SELECT * FROM tbl_truck_order_booking $where ORDER BY pick_up_date_time ASC";
                    $result = mysqli_query($connect, $sql);
                    $arr_users = [];
                    if ($result->num_rows > 0) {
                        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                    }
                    ?>
                    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
                    <div class="table-responsive">
                        <table id="tblUser" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Booking Id</th>
                                    <th>User Name</th>
                                    <th>Truck Partner Name</th>
                                    <th>Driver Name</th>

                                    <th>Qr Image</th>
                                    <th>Pick up Port</th>
                                    <th>Truck Number </th>
                                    <th>Chassis Number</th>
                                    <th>Chassis Type</th>

                                    <th>Consignee Name</th>
                                    <th>Delivery Address</th>
                                    <th>Return Address</th>

                                    <th>Pickup Date Time</th>
                                    <th>Total Amount</th>

                                    <th>Booking Status</th>
                                    <th>Created</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($arr_users)) { ?>
                                    <?php
                                    $count = 0;
                                    foreach ($arr_users as $user) {

                                        // $brand = $user['brand'];
                                        // $model = $user['model'];
                                        // $user_id = $user['user_id'];
                                        // $brand = $user['brand'];
                                        $user_id = $user['user_id'];
                                        $truck_drive = $user['select_driver_id'];
                                        $truck_partner = $user['truck_partner_id'];
                                        $truck_no = $user['truck_id'];
                                        $chassis_no = $user['chassis_id'];
                                        $chassis_type = $user['trailer_chassis_type_id'];

                                        $username = "select * from tbl_users where id=$user_id";
                                        $username1 = mysqli_query($connect, $username);
                                        $username2 = mysqli_fetch_array($username1);
                                        $username3 = $username2['f_name'];
                                        $username3 = $username2['l_name'];

                                        $getdata_car = "select * from tbl_users where id= $truck_drive";
                                        $gdata_car = mysqli_query($connect, $getdata_car);
                                        $drive = mysqli_fetch_array($gdata_car);
                                        $brand = $drive['f_name'];

                                        $getdata_car1 = "select * from tbl_users where id= $truck_partner";
                                        $partner1 = mysqli_query($connect, $getdata_car1);
                                        $rown_car1 = mysqli_fetch_array($partner1);
                                        $brand1 = $rown_car1['company_name'];

                                        $getdata_car2 = "select * from tbl_truck where id = $truck_no";
                                        $partner2 = mysqli_query($connect, $getdata_car2);
                                        $rown_car2 = mysqli_fetch_array($partner2);
                                        $brand2 = $rown_car2['plate_no'];

                                        $getdata_car3 = "select * from tbl_truck where id = $chassis_no";
                                        $partner3 = mysqli_query($connect, $getdata_car3);
                                        $rown_car3 = mysqli_fetch_array($partner3);
                                        $brand3 = $rown_car3['plate_no'];

                                        $getdata_car4 = "select * from tbl_chassis_trailer_type where id = $chassis_type";
                                        $partner4 = mysqli_query($connect, $getdata_car4);
                                        $rown_car4 = mysqli_fetch_array($partner4);
                                        $brand4 = $rown_car4['trailer_type'];

                                    ?>
                                        <tr>
                                            <td><?php print  $count + 1; ?></td>
                                            <td><?php echo $user['order_id']; ?> </td>
                                            <td><?php echo $username2['f_name'] . ' ' . $username2['l_name']; ?></td>

                                            <td><?php echo $rown_car1['company_name']; ?></td>
                                            <td><?php echo $drive['f_name']; ?> </td>
                                            <td>
                                                <?php if ($user['qr_image']) { ?>
                                                    <a onclick="viewImage('<?php echo $qr_image_url ?>/<?php echo $user['qr_image'] ?>')"><img class="doc_img" src="<?php echo $qr_image_url ?>/<?php echo $user['qr_image'] ?>"></a>
                                                <?php } else { ?>
                                                    <img class="doc_img" src="<?php echo $base_url ?>/assets/img/noimage.jpg">
                                                <?php } ?>
                                            </td>


                                            <td><?php echo $user['pickup_port']; ?> </td>

                                            <td><?php echo $rown_car2['plate_no']; ?> </td>

                                            <td><?php echo $rown_car3['plate_no']; ?> </td>

                                            <td>
                                                <?php echo $rown_car4['trailer_type']; ?>
                                            </td>
                                            <td>
                                                <?php echo $user['consignee_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $user['delivery_address']; ?>
                                            </td>
                                            <td>
                                                <?php echo $user['container_return_address']; ?>
                                            </td>
                                            <td>
                                                <?php echo $user['pick_up_date_time']; ?>
                                            </td>
                                            <td>
                                                <?php echo $user['total_amount']; ?>
                                            </td>


                                            <td>
                                                <!-- <?php if ($user['booking_status'] == 'Pending') { ?>
                                <a style="color:#ff7800;font-weight: bold"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?>
                                <?php if ($user['booking_status'] == 'Done') { ?>
                                <a style="color:green;font-weight: bold"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?>
                                <?php if ($user['booking_status'] == 'Ongoing') { ?>
                                <a style="color:#3c00ff;font-weight: bold"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?>
                                <?php if ($user['booking_status'] == 'Cancelled') { ?>
                                <a style="color:yellow;font-weight: red"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?> -->
                                                <?php echo $user['booking_status']; ?>


                                            </td>
                                            <td>
                                                <?php echo $user['created']; ?>
                                            </td>
                                            <td>
                                                <a href="truck_view_record.php?pid=<?php print $user['id'] ?>" onclick="viewRecord('<?php print $user['id'] ?>')"><i class="fa fa-eye"></i></a>


                                            </td>
                                        </tr>
                                    <?php $count++;
                                    } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- /block -->
    </div>
</div>
</div>
</div>


<?php include "../footer.php";  ?>




<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    jQuery(document).ready(function($) {
        $('#tblUser').DataTable({
            "pageLength": 25
        });
    });
</script>


<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" id="viewImage" class="view_image">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
        </div>
    </div>
</div>