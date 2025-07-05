<?php 
include("../conn-web/cw.php");
if(!$_SESSION["tata_login_username"]){
    header('Location:index.php'); 
}
include "../header.php";
?>
<div class="span10" id="content">
    <div class="row-fluid">
        <div class="navbar">
            <div class="navbar-inner">
                <ul class="breadcrumb">
                    <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar"
                            rel="tooltip">&nbsp;</a></i>
                    <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar"
                            rel="tooltip">&nbsp;</a></i>
                    <li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span>
                    </li>
                    <li class="active">User List</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row-fluid">
        <div class="block">
            <div class="navbar navbar-inner block-header">
                <div class="muted pull-left">User Management </div>
            </div>
            <div class="block-content collapse in">
                <div class="span12">
                    <div class="table-toolbar">
                        <div class="btn-group">
                            <a href="<?php echo $base_url ?>/users/add.php">
                                <button class="btn btn-success" style="margin-right: 10px;">Add New <i
                                        class="fa fa-plus icon-white"></i></button>
                            </a>
                        </div>
                    </div>
                    <br>
                    <form action="" method="get" class="form-horizontal" accept-charset="utf-8">
                        <div class="row-fluid">
                            <div class="span3">
                                <input type="text" name="name" class="input-xlarge focused" placeholder="Name" id="name"
                                    value="<?php echo isset($_GET['name']) ? $_GET['name'] : ''; ?>">
                            </div>
                            <div class="span3">
                                <input type="text" name="phone" class="input-xlarge focused" placeholder="Phone Number"
                                    id="phone" value="<?php echo isset($_GET['phone']) ? $_GET['phone'] : ''; ?>">
                            </div>
                            <div class="span3">
                                <input type="email" name="email" class="input-xlarge focused" placeholder="Email"
                                    id="email" value="<?php echo isset($_GET['email']) ? $_GET['email'] : ''; ?>">
                            </div>
                            <div class="span3">
                                <select name="status">
                                    <option value="" <?php echo ($_GET['status'] == '') ? "selected" : ''; ?>>Please
                                        Select</option>
                                    <option value="1" <?php echo ($_GET['status'] == '1') ? "selected" : ''; ?>>Active
                                    </option>
                                    <option value="0" <?php echo ($_GET['status'] == '0') ? "selected" : ''; ?>>Deactive
                                    </option>
                                </select>
                            </div>
                            <div class="span3 resp">
                                <input type="submit" name="search" value="Search" class="btn btn-primary ">
                                <a class="btn" href="<?php echo $base_url ?>/users/view.php">Reset</a>
                            </div>
                        </div>
                    </form>

                    <?php 
                    $whereSQL1 = '';
                    $whereSQL2 = '';
                    $whereSQL3 = '';
                    $whereSQL4 = '';

                    if(isset($_GET['name']) && $_GET['name']){
                        $search_name = $_GET['name']; 
                        $whereSQL1 = "AND f_name LIKE '%" . $search_name . "%'"; 
                    } 
                    if(isset($_GET['phone']) && $_GET['phone']){
                        $search_phone = $_GET['phone']; 
                        $whereSQL2 = "AND phone LIKE '%" . $search_phone . "%'"; 
                    }
                    if(isset($_GET['email']) && $_GET['email']){
                        $search_email = $_GET['email']; 
                        $whereSQL3 = "AND email LIKE '%" . $search_email . "%'"; 
                    }
                    if(isset($_GET['status']) && $_GET['status'] !== ''){
                        $search_status = $_GET['status']; 
                        $whereSQL4 = "AND status = $search_status"; 
                    }
                    $sql = "SELECT * FROM tbl_users WHERE 1 = 1 {$whereSQL1} {$whereSQL2} {$whereSQL3} {$whereSQL4} AND role='user' ORDER BY id DESC";
                    $result = mysqli_query($connect, $sql);
                    $arr_users = [];
                    if ($result && $result->num_rows > 0) {
                        $arr_users = $result->fetch_all(MYSQLI_ASSOC);
                    }
                    ?>
                    <link rel="stylesheet" type="text/css"
                        href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
                    <div class="table-responsive">
                        <table id="tblUser" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Profile Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Total Earning</th>
                                    <th>Total Car Booking</th>
                                    <th>Total Truck Booking</th>
                                    <th>License</th>
                                    <th>Supporting Id</th>
                                    <th>DOB</th>
                                    <th>Gender</th>
                                    <th>Street</th>
                                    <th>Village</th>
                                    <th>City</th>
                                    <th>Province</th>
                                    <th>Zipcode</th>
                                    <th>Joining</th>
                                    <th>Status</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($arr_users)) { ?>
                                <?php $count = 1; ?>
                                <?php foreach($arr_users as $user) { 
                                        $user_id = $user['id'];

                                        // Fetch total car bookings
                                        $getdata_car_booking = "SELECT * FROM tbl_car_order_booking WHERE user_id=$user_id";  
                                        $gdata_car_booking = mysqli_query($connect, $getdata_car_booking);
                                        $rown_car_booking = mysqli_num_rows($gdata_car_booking);

                                        // Fetch total truck bookings
                                        $getdata_truck_booking = "SELECT * FROM tbl_truck_order_booking WHERE user_id=$user_id";  
                                        $gdata_truck_booking = mysqli_query($connect, $getdata_truck_booking);
                                        $rown_truck_booking = mysqli_num_rows($gdata_truck_booking);
                                    ?>
                                <tr>
                                    <td><?php echo $count++; ?></td>
                                    <td>
                                        <?php if($user['profile_image']){ ?>
                                        <a
                                            onclick="viewImage('<?php echo $image_url ?>/<?php echo $user['profile_image']?>')"><img
                                                class="doc_img"
                                                src="<?php echo $image_url ?>/<?php echo $user['profile_image']?>"></a>
                                        <?php } else{ ?>
                                        <img class="doc_img" src="<?php echo $base_url ?>/assets/img/noimage.jpg">
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $user['f_name']; ?> <?php echo $user['l_name']; ?></td>
                                    <td><?php echo $user['email']; ?></td>
                                    <td><?php echo $user['phone']; ?></td>
                                    <td><?php echo $user['total_earning']; ?></td>
                                    <td><a style="color:red;font-weight:bold;"
                                            href="view_booking_cars.php?user_id=<?php echo $user['id']?>"><?php echo $rown_car_booking; ?></a>
                                    </td>
                                    <td><a style="color:blue;font-weight:bold;"
                                            href="view_booking_trucks.php?user_id=<?php echo $user['id']?>"><?php echo $rown_truck_booking; ?></a>
                                    </td>
                                    <td>
                                        
                                        <?php if($user['license']){ ?>
                                        <a onclick="viewImage('<?php echo $image_url ?>/<?php echo $user['license']?>')">
                                            <img class="doc_img"
                                                src="<?php echo $image_url ?>/<?php echo $user['license']?>"></a>
                                        <?php } else{ ?>
                                        <img class="doc_img" src="<?php echo $base_url ?>/assets/img/noimage.jpg">
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <?php if($user['supporting_id']){ ?>
                                        <a
                                            onclick="viewImage('<?php echo $image_url ?>/<?php echo $user['supporting_id']?>')">
                                            <img class="doc_img"
                                                src="<?php echo $image_url ?>/<?php echo $user['supporting_id']?>"></a>
                                        <?php } else{ ?>
                                        <img class="doc_img" src="<?php echo $base_url ?>/assets/img/noimage.jpg">
                                        <?php } ?>
                                    </td>
                                    <td><?php echo $user['dob']; ?></td>
                                    <td><?php echo $user['gender']; ?></td>
                                    <td><?php echo $user['street']; ?></td>
                                    <td><?php echo $user['village']; ?></td>
                                    <td><?php echo $user['city']; ?></td>
                                    <td><?php echo $user['province']; ?></td>
                                    <td><?php echo $user['zipcode']; ?></td>
                                    <td><?php echo date("d M Y", strtotime($user['created'])); ?></td>
                                    <td align="center">
                                        <?php if($user['status'] == '1'){ ?>
                                        <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=0"
                                            onclick="return confirm('Are you sure change status?')"><img
                                                src="<?php echo $base_url ?>/assets/img/tick.png" width="16" height="16"
                                                alt="Click to unblock" title="Click to unblock"></a>
                                        <?php } else { ?>
                                        <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=1"
                                            onclick="return confirm('Are you sure change status?')"><img
                                                src="<?php echo $base_url ?>/assets/img/erase.png" width="16"
                                                height="16" alt="Click to block" title="Click to block"></a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a href="edit.php?pid=<?php echo $user['id']?>"><i
                                                class="fa fa-pencil"></i></a>&nbsp;
                                        <a href="delete.php?pid=<?php echo $user['id']; ?>"
                                            onclick="return confirm('Are you sure delete product?')"><i
                                                class="fa fa-trash"></i></a>&nbsp;
                                    </td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                        <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js">
                        </script>
                       <script>
                   jQuery(document).ready(function($) {
                      $('#tblUser').DataTable({
                  "pageLength": 25
                       });
                       });
                     </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('../footer.php'); ?>
