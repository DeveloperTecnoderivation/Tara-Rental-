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
          <li class="active">Truck Partner List</li>
        </ul>
      </div>
    </div>
  </div>

  <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Truck Partner Management </div>
      </div>
      <div class="block-content collapse in">
        <div class="span12">
          <div class="table-toolbar">
            <div class="btn-group">
              <a href="<?php echo $base_url ?>/truck_partner/add.php"><button class="btn btn-success">Add New <i class="fa fa-plus icon-white"></i></button></a>
            </div>
          </div>
          <br>
          <form action="" method="get" class="form-horizontal" accept-charset="utf-8">
            <div class="row-fluid">

              <div class="span4">
                <input type="text" name="company_name" class="input-xlarge focused" placeholder="Company Name" id="company_name" value="<?php echo $_GET['company_name'] ?>">
              </div>

              <div class="span4">
                <input type="text" name="email" class="input-xlarge focused" placeholder="Email" id="email" value="<?php echo $_GET['email'] ?>">
              </div>

              <div class="span4">
                <input type="text" name="contact_person_phone" class="input-xlarge focused" placeholder="Phone Number" id="contact_person_phone" value="<?php echo $_GET['contact_person_phone'] ?>">
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

          </form>

          <?php

          // echo $_GET['name'];

          if (!empty($_GET['company_name'])) {
            $search_name = $_GET['company_name'];
            $whereSQL1 = "AND company_name LIKE '%" . $search_name . "%'";
          }

          if (!empty($_GET['email'])) {
            $email = $_GET['email'];
            $whereSQL3 = "AND email = $email ";
          }

          if (!empty($_GET['contact_person_phone'])) {
            $contact_person_phone = $_GET['contact_person_phone'];
            $whereSQL4 = "AND contact_person_phone = $contact_person_phone ";
          }



          if ($_GET['status'] == '0') {
            $search_status = $_GET['status'];
            $whereSQL2 = "AND status = $search_status";
          }
          if ($_GET['status'] == '1') {
            $search_status = $_GET['status'];
            $whereSQL2 = "AND status = $search_status";
          }

          $sql = "select * from  tbl_users  WHERE 1 = 1 {$whereSQL1} {$whereSQL2} {$whereSQL3} {$whereSQL4} and role='truck_partner' order by id asc";
          $result = mysqli_query($connect, $sql);
          $arr_users = [];
          if ($result->num_rows > 0) {
            $arr_users = $result->fetch_all(MYSQLI_ASSOC);
          }


          ?>
          <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />

          <table id="tblUser" class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>S.No.</th>
                <th>Refrence Number</th>
                <th>Company Name</th>
                <th>Total Truck</th>
                <th>Total Chassis</th>
                <th>Email</th>
                <th>Contact Person</th>
                <th>Contact Person Phone Number</th>
                <th>Company Type</th>
                <th>Status</th>
                <th>Created</th>
                <th>&nbsp;</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($arr_users)) { ?>
                <?php

                $count = 0;
                foreach ($arr_users as $user) {
                  // print_r($user);
                ?>
                  <?php
                  $truck_counts = [];
                  $query = "SELECT truck_partner_id, 
                                   SUM(CASE WHEN types = 'truck' THEN 1 ELSE 0 END) AS total_truck,
                                   SUM(CASE WHEN types = 'chassis' THEN 1 ELSE 0 END) AS total_chassis
                            FROM tbl_truck
                            GROUP BY truck_partner_id";

                  $result1 = mysqli_query($connect, $query);
                  while ($row2 = mysqli_fetch_assoc($result1)) {
                    $truck_counts[$row2['truck_partner_id']] = [
                      'truck' => $row2['total_truck'],
                      'chassis' => $row2['total_chassis']
                    ];
                  }
                  ?>

                  <tr>
                    <td><?php print  $count + 1; ?></td>
                    <td><?php echo $user['refrence_number']; ?></td>
                    <td><?php echo $user['company_name']; ?></td>
                    <td>
                      <a style="color:red; font-weight:bold;" href="truck_view_details.php?user_id=<?php echo $user['id']; ?>">
                        <?php echo $truck_counts[$user['id']]['truck'] ?? 0; ?>
                      </a>
                    </td>
                    <td> <a style="color:blue; font-weight:bold;" href="chassis_view_details.php?user_id=<?php echo $user['id']; ?>">
                        <?php echo $truck_counts[$user['id']]['chassis'] ?? 0; ?>
                      </a>
                    </td>
                    <td><?php echo $user['email']; ?></td>
                    <td><?php echo $user['contact_person']; ?></td>
                    <td><?php echo $user['phone']; ?></td>
                    <td>
                      <?php if ($user['company_type'] == '1') { ?>
                        <span>Partner</span>
                      <?php } else { ?>
                        <span>Corporation</span>
                      <?php } ?>
                    </td>
                    <td align="center" id="make_status_row_2">
                      <?php if ($user['status'] == '1') { ?>

                        <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=0" id="" onclick="return confirm('Are you sure change status?')"><img src="<?php echo $base_url ?>/assets/img/tick.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>

                      <?php } else { ?>
                        <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=1" class="inactive_status" onclick="return confirm('Are you sure change status?')" id=""><img src="<?php echo $base_url ?>/assets/img/erase.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>
                      <?php } ?>
                    </td>
                    <td><?php echo date("d M Y", strtotime($user['created'])); ?></td>
                    <td>
                      <a href="view_all_record.php?pid=<?php print $user['id'] ?>" onclick="viewRecord('<?php print $user['id'] ?>')"><i class="fa fa-eye"></i></a>&nbsp;

                      <!--<a href="edit.php?pid=<?php print $user['id'] ?>"><i class="fa fa-pencil"></i></a>&nbsp;-->

                      <a href="delete.php?pid=<?php echo $user['id']; ?>" class="delete_status" onclick="return confirm('Are you sure delete record?')"><i class="fa fa-trash"></i></a>&nbsp;

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
      "pageLength": 25
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