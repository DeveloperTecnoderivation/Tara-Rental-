
<?php 
include("../conn-web/cw.php");
  if(!$_SESSION["tata_login_username"]){
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active">Truck Fair Management</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Truck Fair Management</div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
              

                <?php 

              

                     $sql = "select * from  tbl_fair_management order by id asc";
                    $result = mysqli_query($connect,$sql);
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
                      <th>TRAILER TYPE</th>
                      <th>DIESEL PHP/LITER</th>
                      <th>TOTAL KM</th>
                      
                      <th>LABOR COST</th>
                      <th>BATTERIES</th>
                      <th>DEPRECIATION</th>
                      <th>INTEREST EXPENSE</th>
                      <th>REPAIRS AND MAINTENANCE</th>
                      <th>REGISTRATION AND INSURANCE</th>
                      <th>COMMUNICATION EQUIPMENTS</th>
                      <th>OTHER INVESTMENTS</th>
                      <th>MARK UP </th>
                      <th>VALUE ADDED TAX</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($arr_users)) 
                    { ?>
                      <?php 
                      $count = 0;
                      foreach($arr_users as $user) { 


                        $trailer_type = $user['types'];
                        $getdata_trailer_type="select * from tbl_chassis_trailer_type where id='$trailer_type'";  
                        $gdata_trailer_type=mysqli_query($connect,$getdata_trailer_type);
                        $rown_trailer_type=mysqli_fetch_assoc($gdata_trailer_type);


                          // print_r($rown_partner_name);
                        ?>
                      <tr>
                          <td><?php print  $count+1; ?></td>
                          <td><?php echo $rown_trailer_type['trailer_type']; ?></td>
                          <td><?php echo $user['diesel_price']; ?></td>
                          <td><?php echo $user['total_km']; ?></td>
                          
                          <td><?php echo $user['labor_cost_charge']; ?></td>
                          <td><?php echo $user['batteries_charge']; ?></td>
                          <td><?php echo $user['depreciation_charge']; ?></td>
                          <td><?php echo $user['interest_expense_charge']; ?></td>
                          <td><?php echo $user['repairs_and_maintenance_charge']; ?></td>
                          <td><?php echo $user['registration_and_insurance_charge']; ?></td>
                          <td><?php echo $user['comminication_equipments_charge']; ?></td>
                          <td><?php echo $user['other_investments_charge']; ?></td>
                          <td><?php echo $user['markup_charge']; ?> %</td>
                          <td><?php echo $user['vat']; ?> %</td>

                          <td>
                            <a href="edit.php?pid=<?php print $user['id']?>"><i class="fa fa-pencil"></i></a>&nbsp;
                          </td>
                      </tr>
                      <?php $count++; } ?>
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
