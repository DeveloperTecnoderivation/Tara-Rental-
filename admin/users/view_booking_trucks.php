
<?php 
include("../conn-web/cw.php");
  if(!$_SESSION["tata_login_username"]){
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
      $user_id = $_GET['user_id'];
      $get_owner="select * from tbl_users where id ='".$user_id."'";  
      $results_owner=mysqli_query($connect,$get_owner);
      $rown_owner=mysqli_fetch_array($results_owner);

      $f_name = $rown_owner['f_name'];
      $l_name = $rown_owner['l_name'];
      
  ?>
    <div class="span9" id="content">
        <div class="row-fluid">
          <div class="navbar">
            <div class="navbar-inner">
              <ul class="breadcrumb">
                <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active"> Booking Truck</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left"> <?php echo $f_name ?> <?php echo $l_name ?> All Booking Truck </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/users/view.php"><button class="btn btn-danger"><i class="fa fa-arrow-left icon-white"></i>  Back</button></a>
                  </div>
                </div>
                <br>
                

                <?php 

                    $sql = "select * from tbl_truck_order_booking WHERE user_id = '$user_id'";
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
                          <th>Booking Id</th>
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
                        <?php if(!empty($arr_users)) 
                        { ?>
                          <?php 
                          $count = 0;
                          foreach($arr_users as $user) 
                          { 
                              
                              // $brand = $user['brand'];
                              // $model = $user['model'];
                              // $user_id = $user['user_id'];
                                   $truck_drive = $user['select_driver_id']; 
                                   $truck_partner = $user['truck_partner_id']; 
                                   $truck_no = $user['truck_id']; 
                                   $chassis_no = $user['chassis_id']; 
                                   $chassis_type = $user['trailer_chassis_type_id']; 

                              // $getdata_car_owner="select * from tbl_users where id=$user_id";  
                              // $gdata_car_owner=mysqli_query($connect,$getdata_car_owner);
                              // $rown_car_owner=mysqli_fetch_array($gdata_car_owner);
                              // $car_owner_fname = $rown_car_owner['f_name']; 
                              // $car_owner_lname = $rown_car_owner['l_name']; 

                             $getdata_car="select * from tbl_users where id= $truck_drive";  
                              $gdata_car=mysqli_query($connect,$getdata_car);
                              $drive=mysqli_fetch_array($gdata_car);
                              $brand = $drive['f_name'];

                             $getdata_car1="select * from tbl_users where id= $truck_partner";  
                              $partner1=mysqli_query($connect,$getdata_car1);
                              $rown_car1=mysqli_fetch_array($partner1);
                              $brand1 = $rown_car1['company_name'];

                              $getdata_car2="select * from tbl_truck where id = $truck_no";  
                              $partner2=mysqli_query($connect,$getdata_car2);
                              $rown_car2=mysqli_fetch_array($partner2);
                              $brand2 = $rown_car2['plate_no'];

                              $getdata_car3="select * from tbl_truck where id = $chassis_no";  
                              $partner3=mysqli_query($connect,$getdata_car3);
                              $rown_car3=mysqli_fetch_array($partner3);
                              $brand3 = $rown_car3['plate_no'];

                              $getdata_car4="select * from tbl_chassis_trailer_type where id = $chassis_type";  
                              $partner4=mysqli_query($connect,$getdata_car4);
                              $rown_car4=mysqli_fetch_array($partner4);
                              $brand4 = $rown_car4['trailer_type'];

                            ?>
                          <tr>
                              <td><?php print  $count+1; ?></td>
                              <td><?php echo $user['order_id']; ?> </td>
                          
                              <td><?php echo $rown_car1['company_name']; ?></td>
                              <td><?php echo $drive['f_name']; ?> </td>
                              <td> 
                                <?php if($user['qr_image']){ ?>
                                  <a onclick="viewImage('<?php echo $qr_image_url ?>/<?php echo $user['qr_image']?>')"><img class="doc_img" src ="<?php echo $qr_image_url ?>/<?php echo $user['qr_image']?>"></a> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
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
                                <!-- <?php if($user['booking_status'] == 'Pending'){ ?>
                                <a style="color:#ff7800;font-weight: bold"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?>
                                <?php if($user['booking_status'] == 'Done'){ ?>
                                <a style="color:green;font-weight: bold"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?>
                                <?php if($user['booking_status'] == 'Ongoing'){ ?>
                                <a style="color:#3c00ff;font-weight: bold"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?>
                                <?php if($user['booking_status'] == 'Cancelled'){ ?>
                                <a style="color:yellow;font-weight: red"><?php echo $user['booking_status']; ?></a> 
                                <?php } ?> -->
                                <?php echo $user['booking_status']; ?> 


                              </td>
                              <td>
                                <?php echo $user['created']; ?> 
                              </td> 
                              <td>
                            <a href="view_all_record.php?pid=<?php print $user['id']?>" onclick="viewRecord('<?php print $user['id']?>')"><i class="fa fa-eye"></i></a>
                            
                            
                          </td>
                          </tr>
                          <?php $count++; } ?>
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