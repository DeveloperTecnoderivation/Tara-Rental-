
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
      $car_owner_id = $_GET['car_owner_id'];
      $get_owner="select * from tbl_users where id ='".$car_owner_id."'";  
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active"> Booking Car</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left"> <?php echo $f_name ?> <?php echo $l_name ?> All Booking Cars </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/car_owner/view.php"><button class="btn btn-danger"><i class="fa fa-arrow-left icon-white"></i>  Back</button></a>
                  </div>
                </div>
                <br>
                

                <?php 

                    $sql = "select * from  tbl_car_order_booking  WHERE car_owner_id = '$car_owner_id'";
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
                              
                              // $brand = $user['brand'];
                              // $model = $user['model'];
                              $car_owner_id = $user['car_owner_id'];
                              $car_id = $user['car_id'];

                             
                              $getdata_car_owner="select * from tbl_users where id=$car_owner_id";  
                              $gdata_car_owner=mysqli_query($connect,$getdata_car_owner);
                              $rown_car_owner=mysqli_fetch_array($gdata_car_owner);
                              $car_owner_fname = $rown_car_owner['f_name']; 
                              $car_owner_lname = $rown_car_owner['l_name']; 

                              $getdata_car="select * from tbl_car where id=$car_id";  
                              $gdata_car=mysqli_query($connect,$getdata_car);
                              $rown_car=mysqli_fetch_array($gdata_car);
                              $brand = $rown_car['brand'];
                              $model = $rown_car['model'];

                             

                            ?>
                          <tr>
                              <td><?php print  $count+1; ?></td>
                              <td><?php echo $user['order_id']; ?> </td>
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
                              <td>P3,<?php echo $user['total_fair']; ?> </td>
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