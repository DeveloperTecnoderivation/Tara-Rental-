<?php
include("../conn-web/cw.php");
if (!$_SESSION["tata_login_username"]) {
  header('Location:index.php');
}
include "../header.php";
?>

<div class="span9" id="content">
  <div class="row-fluid">
    <div class="navbar">
      <div class="navbar-inner">
        <ul class="breadcrumb">
          <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
          <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
          <li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li>
          <li class="active">Truck List</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Truck Management </div>
      </div>
      <div class="block-content collapse in">
        <div class="span12">
          <div class="table-toolbar">
            <div class="btn-group">
              <a href="<?php echo $base_url ?>/truck/add.php"><button class="btn btn-success">Add New <i class="fa fa-plus icon-white"></i></button></a>
            </div>
          </div>
          <br>
          <!--  <form action="" method="get" class="form-horizontal" accept-charset="utf-8">
                  <div class="row-fluid">

                    <div class="span4">
                      <input type="text" name="f_name" class="input-xlarge focused" placeholder="Name" id="f_name" value="<?php echo $_GET['f_name'] ?>">
                    </div>

                    <div class="span4">
                      <input type="text" name="email" class="input-xlarge focused" placeholder="Email" id="email" value="<?php echo $_GET['email'] ?>">
                    </div>

                    <div class="span4">
                      <input type="text" name="phone" class="input-xlarge focused" placeholder="Phone Number" id="phone" value="<?php echo $_GET['phone'] ?>">
                    </div>
                  </div>
                  <div class="row-fluid">&nbsp;</div>
                  <div class="row-fluid">  
                    
                    <div class="span4">
                      <select name="status">  
                        <option value="" <?php if ($_GET['status'] == '') {
                                            echo "selected";
                                          } ?>>Please Select</option>
                        <option value="1" <?php if ($_GET['status'] == '1') {
                                            echo "selected";
                                          } ?>>Active</option>
                        <option value="0" <?php if ($_GET['status'] == '0') {
                                            echo "selected";
                                          } ?>>Deactive</option>
                      </select>
                    </div>
                    <div class="span4">
                      <input type="submit" name="search" value="Search" class="btn btn-primary">
                      <a class="btn" href="<?php echo $base_url ?>/truck_partner/view.php">Reset</a>
                    </div>

                  </div>
                 
                </form> -->

          <?php

          // echo $_GET['name'];

          // if(!empty($_GET['company_name'])){
          //     $search_name = $_GET['company_name']; 
          //     $whereSQL1 = "AND company_name LIKE '%" . $search_name . "%'"; 
          // } 

          // if(!empty($_GET['email'])){
          //     $email = $_GET['email']; 
          //     $whereSQL3 = "AND email = $email "; 
          // } 

          // if(!empty($_GET['phone'])){
          //     $phone = $_GET['phone']; 
          //     $whereSQL4 = "AND phone = $phone "; 
          // } 



          // if($_GET['status'] == '0'){
          //     $search_status = $_GET['status']; 
          //      $whereSQL2 = "AND status = $search_status"; 
          // } 
          // if($_GET['status'] == '1'){
          //     $search_status = $_GET['status']; 
          //      $whereSQL2 = "AND status = $search_status"; 
          // } 

          $sql = "
    SELECT 
        t.*, 
        u.f_name, 
        u.l_name,
        p.company_name
    FROM 
        tbl_truck t
    LEFT JOIN 
        tbl_users u ON u.truck_id = t.id
    LEFT JOIN 
        tbl_users p ON p.id = t.truck_partner_id
    WHERE 
        t.types = 'truck'
    ORDER BY 
        t.id ASC
";

          $result = mysqli_query($connect, $sql);
          $arr_users = [];

          if ($result && $result->num_rows > 0) {
            $arr_users = $result->fetch_all(MYSQLI_ASSOC);
          }
          ?>

          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

          <table id="tblUser" class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Truck Image</th>
                <th>Model</th>
                <th>Plate No.</th>
                <th>Truck Type</th>
                <th>Truck Driver Name</th>
                <th>Truck Partner</th>
                <th>OR/CR</th>
                <th>VIew Booking History</th>
                <th>Status</th>
                <th>Created</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $count = 1;
              foreach ($arr_users as $user) { ?>
                <tr>
                  <td><?php echo $count++; ?></td>
                  <td>
                    <?php if (!empty($user['image'])) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $user['image'] ?>" target="_blank">
                        <img class="doc_img" src="<?php echo $image_url ?>/<?php echo $user['image'] ?>">
                      </a>
                    <?php } else { ?>
                      <img class="doc_img" src="<?php echo $base_url ?>/assets/img/noimage.jpg">
                    <?php } ?>
                  </td>
                  <td><?php echo $user['model']; ?></td>
                  <td><?php echo $user['plate_no']; ?></td>
                  <td><?php echo $user['truck_type']; ?></td>
                  <td><?php echo $user['f_name'] . ' ' . $user['l_name']; ?></td>
                  <td><?php echo $user['company_name']; ?></td>
                  <td>
                    <?php if (!empty($user['or_cr'])) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $user['or_cr'] ?>" target="_blank">
                        <img class="doc_img" src="<?php echo $image_url ?>/<?php echo $user['or_cr'] ?>">
                      </a>
                    <?php } else { ?>
                      <img class="doc_img" src="<?php echo $base_url ?>/assets/img/noimage.jpg">
                    <?php } ?>
                  </td>
                  <td><a href="view_booking_history.php?truck_id=<?php print $user['id'] ?>"><i class="fa fa-eye"></i></a></td>

                  <td align="center">
                    <?php if ($user['status'] == '1') { ?>
                      <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=0" onclick="return confirm('Are you sure change status?')">
                        <img src="<?php echo $base_url ?>/assets/img/tick.png" width="16" height="16" title="Click to deactivate">
                      </a>
                    <?php } else { ?>
                      <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=1" onclick="return confirm('Are you sure change status?')">
                        <img src="<?php echo $base_url ?>/assets/img/erase.png" width="16" height="16" title="Click to activate">
                      </a>
                    <?php } ?>
                  </td>
                  <td><?php echo date("d M Y", strtotime($user['created'])); ?></td>
                  <td>
                    <a href="edit.php?pid=<?php echo $user['id']; ?>"><i class="fa fa-pencil"></i></a>&nbsp;
                    <a href="delete.php?pid=<?php echo $user['id']; ?>" class="delete_status" onclick="return confirm('Are you sure delete record?')">
                      <i class="fa fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
    <!-- /block -->
  </div>
</div>
</div>
</div>
<?php include "../footer.php";  ?>

<!-- <div id="viewRecordModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">View Record</h4>
      </div>
      <div class="modal-body" id="partner_full_details">
        
      </div>
    
    </div>

  </div>
</div> -->



<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
  jQuery(document).ready(function($) {
    $('#tblUser').DataTable({
      "pageLength": 10
    });
  });

  // function viewRecord(id){
  //   // alert(id);
  //   $('#viewRecordModal').modal('show');
  //   // $.ajax({
  //   //       url:"ajax/view_order_details.php",
  //   //       method:"POST",
  //   //       data:{order_id:order_id},
  //   //       success:function(data)
  //   //       {

  //   //         $('#viewOrderModal').modal('show');
  //   //         $('#order_full_details').html('');
  //   //         $('#order_full_details').html(data);

  //   //       }
  //   //    });

  // }
</script>