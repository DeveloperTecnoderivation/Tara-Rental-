
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


 
    <div class="span9" id="content">
        <div class="row-fluid">
          <div class="navbar">
            <div class="navbar-inner">
              <ul class="breadcrumb">
                <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active"> Table Booking Car History</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left"> All Cars History </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <!-- <div class="btn-group">
                    <a href="<?php echo $base_url ?>/car_owner/view.php"><button class="btn btn-danger"><i class="fa fa-arrow-left icon-white"></i>  Back</button></a>
                  </div> -->
                </div>
                <br>
                <form method="get" class="form-horizontal">
  <div class="row-fluid">
    <div class="span3">
      <input type="text" name="user_name" placeholder="User Name" value="<?php echo $_GET['user_name'] ?? ''; ?>" class="input-xlarge focused">
    </div>

    <div class="span3">
      <input type="text" name="owner_name" placeholder="Car Owner Name" value="<?php echo $_GET['owner_name'] ?? ''; ?>" class="input-xlarge focused">
    </div>

    <div class="span3">
      <input type="text" name="order_id" placeholder="Booking ID" value="<?php echo $_GET['order_id'] ?? ''; ?>" class="input-xlarge focused">
    </div>

    <div class="span3">
      <select name="booking_status" class="input-xlarge focused">
        <option value="">Booking Status</option>
        <option value="Pending" <?php if(@$_GET['booking_status'] == 'Pending') echo "selected"; ?>>Pending</option>
        <option value="done" <?php if(@$_GET['booking_status'] == 'done') echo "selected"; ?>>Done</option>
        <option value="Cancelled" <?php if(@$_GET['booking_status'] == 'Cancelled') echo "selected"; ?>>Cancelled</option>
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
                $where = "WHERE 1 = 1";

                if (!empty($_GET['user_name'])) {
                    $name = mysqli_real_escape_string($connect, $_GET['user_name']);
                    $where .= " AND user_id IN (SELECT id FROM tbl_users WHERE CONCAT(f_name, ' ', l_name) LIKE '%$name%')";
                }
                
                if (!empty($_GET['owner_name'])) {
                    $owner = mysqli_real_escape_string($connect, $_GET['owner_name']);
                    $where .= " AND car_owner_id IN (SELECT id FROM tbl_users WHERE CONCAT(f_name, ' ', l_name) LIKE '%$owner%')";
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
                    $where .= " AND pickup_date BETWEEN '$from' AND '$to'";
                } elseif (!empty($_GET['pickup_from'])) {
                    $from = $_GET['pickup_from'];
                    $where .= " AND pickup_date >= '$from'";
                } elseif (!empty($_GET['pickup_to'])) {
                    $to = $_GET['pickup_to'];
                    $where .= " AND pickup_date <= '$to'";
                }
                    $sql = "SELECT * FROM tbl_car_order_booking $where ORDER BY pickup_date ASC";

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
                          <th>User Name</th>
                          <th>Car Owner Name</th>
                          <th>Car Image</th>
                          <th>Brand</th>
                          <th>Model</th>    
                          <th>Year</th>
                          <th>Pickup Date</th>    
                          <th>Return Date</th>
                          <th>Total Fair </th>                      
                          <th>Payment Mode</th>
                          <th>Qr Image</th>
                          <th>Booking Date</th>
                          <th>Booking Status</th>
                          <th>Font View Image</th>
                          <th>Left Side Image</th>
                          <th>Right Side Image</th>
                          <th>Interior Image</th>
                          <th>Back Side Image</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($arr_users)) 
                        { ?>
                          <?php 
                          $count = 0;
                          foreach($arr_users as $user) 
                          { 
                              
                              // // $brand = $user['brand'];
                              $car_id = $user['car_id'];
                              $car_owner_id = $user['car_owner_id'];
                              $user_name = $user['user_id'];

                             
                              $getdata_car_owner="select * from tbl_users where id=$car_owner_id";  
                              $gdata_car_owner=mysqli_query($connect,$getdata_car_owner);
                              $rown_car_owner=mysqli_fetch_array($gdata_car_owner);
                              $owner_name = $rown_car_owner['f_name'] . ' ' . $rown_car_owner['l_name'];

                              $getdata_car_owner1="select * from tbl_users where id=$user_name";  
                              $gdata_car_owner1=mysqli_query($connect,$getdata_car_owner1);
                              $rown_car_owner1=mysqli_fetch_array($gdata_car_owner1);
                              $user_name1 = $rown_car_owner1['f_name'] . ' ' . $rown_car_owner1['l_name'];

                              $getdata_car="select * from tbl_car where id= $car_id";  
                              $gdata_car=mysqli_query($connect,$getdata_car);
                              $rown_car=mysqli_fetch_array($gdata_car);
                              $brand = $rown_car['brand'];
                              $model = $rown_car['model'];

                            ?>
                          <tr>
                              <td><?php print  $count+1; ?></td>
                              <td><?php echo $user['order_id']; ?> </td>
                              <td><?php echo  $user_name1; ?> </td>
                              <td><?php echo  $owner_name; ?> </td>
                              <td>
                                <?php if($rown_car['rear_view_image']){ ?>
                                  <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $rown_car['rear_view_image']?>"> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                                <?php } ?>
                              </td>
                              <td><?php echo $rown_car['brand']; ?> </td>
                              <td><?php echo $rown_car['model'] ?> </td>
                              <td><?php echo $rown_car['year']; ?> </td>
                              <td><?php echo $user['pickup_date']; ?> </td>
                              <td><?php echo $user['return_date']; ?> </td>
                              <td><?php echo $user['total_fair']; ?> </td>
                              <td><?php echo $user['payment_mode']; ?> </td>
                            <!-- <td><?php echo $user['total_fair']; ?> </td> -->
                              <td> 
                                <?php if($user['qr_image']){ ?>
                                  <img class="doc_img" src ="<?php echo $qr_image_url ?>/<?php echo $user['qr_image']?>"> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                                <?php } ?> 
                              </td>
                              <td>
                                <?php echo $user['created']; ?> 
                              </td>

                              <td><?php echo $user['booking_status']; ?> </td>

                               <td>
                                <?php if($user['font_view_image']){ ?>
                                  <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $user['font_view_image']?>"> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                                <?php } ?>
                              </td>

                               <td>
                                <?php if($user['left_side_image']){ ?>
                                  <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $user['left_side_image']?>"> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                                <?php } ?>
                              </td>

                               <td>
                                <?php if($user['right_side_image']){ ?>
                                  <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $user['right_side_image']?>"> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                                <?php } ?>
                              </td>

                               <td>
                                <?php if($user['interior_image']){ ?>
                                  <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $user['interior_image']?>"> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                                <?php } ?>
                              </td>

                               <td>
                                <?php if($user['back_side_image']){ ?>
                                  <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $user['back_side_image']?>"> 
                                <?php } else{ ?>
                                  <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                                <?php } ?>
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


 
</script>
<style type="text/css">
  .pac-container{
      z-index: 99999!important;
  }
</style>
<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo $GOOGLE_MAP_RIDER_KEY; ?>&libraries=places&callback=initMap" async defer></script>
<script type="text/javascript">


function initMap()
{
 
  var input = document.getElementById("car_location_new");
  
  // var options = { componentRestrictions: { country: countrycode } };
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocompleteListener = google.maps.event.addListener(autocomplete, 'place_changed', function() {
  var place = autocomplete.getPlace();
  console.log(place);
   var lat = place.geometry.location.lat();
   var lng = place.geometry.location.lng();

   // var city_name = place.name;
   var place_id = place.place_id;
   var map_url = place.url;
   var formatted_address = place.formatted_address;
    
    $('#lat').val(lat);
    $('#lng').val(lng);
    $('#formatted_address').val(formatted_address);
    $('#place_id').val(place_id);
    $('#map_url').val(map_url);
    // $('#submit_button').prop('disabled', false);

    
    
  });
}

</script> 