
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active"> Car</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left"> Car Management </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/car/add.php"><button class="btn btn-success">Add New <i class="fa fa-plus icon-white"></i></button></a>
                  </div>
                </div>
                <br>
                <!-- <form action="" method="get" class="form-horizontal" accept-charset="utf-8">
                  <div class="row-fluid">
                    <div class="span4">
                      <input type="text" name="name" class="input-xlarge focused" placeholder="Name" id="name" value="<?php echo $_GET['name'] ?>">
                    </div>
                    <div class="span4">
                      <select name="status">
                        <option value="" <?php if($_GET['status'] == ''){ echo "selected"; }?>>Please Select</option>
                        <option value="1" <?php if($_GET['status'] == '1'){ echo "selected"; }?>>Active</option>
                        <option value="0" <?php if($_GET['status'] == '0'){ echo "selected"; }?>>Deactive</option>
                      </select>
                    </div>
                    <div class="span4">
                      <input type="submit" name="search" value="Search" class="btn btn-primary">
                      <a class="btn" href="<?php echo $base_url ?>/users/view.php">Reset</a>
                    </div>
                  </div>
                  
                 
                </form> -->

                <?php 

                // echo $_GET['name'];

                    if(!empty($_GET['name'])){
                        $search_name = $_GET['name']; 
                        $whereSQL1 = "AND name LIKE '%" . $search_name . "%'"; 
                    } 

                    if(!empty($_GET['status'])){
                        $search_status = $_GET['status']; 
                        $whereSQL2 = "AND status = $search_status"; 
                    } 

                    $sql = "select * from  tbl_car  WHERE 1 = 1 {$whereSQL1} {$whereSQL2} order by id asc";
                    $result = mysqli_query($connect,$sql);
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
                      <th>Image</th>
                      <th>Brand</th>
                      <th>Model</th>    
                      <th>Year</th>
                      <th>Car Owner Name</th>    
                      <th>Car Type</th>
                      <th>Seating Capacity</th> 
                      <th width="150px">Calendar Pricing </th>                      
                      <th>Status</th>
                      <th>Created</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(!empty($arr_users)) 
                    { ?>
                      <?php 
                      $count = 0;
                      foreach($arr_users as $user) 
                      { 
                          
                          $brand = $user['brand'];
                          $model = $user['model'];
                          $car_owner_id = $user['car_owner_id'];
                          $car_type = $user['car_type'];

                         
                          $getdata_car_owner="select * from tbl_users where id=$car_owner_id";  
                          $gdata_car_owner=mysqli_query($connect,$getdata_car_owner);
                          $rown_car_owner=mysqli_fetch_array($gdata_car_owner);
                          $car_owner_fname = $rown_car_owner['f_name']; 
                          $car_owner_lname = $rown_car_owner['l_name']; 

                         

                        ?>
                      <tr>
                          <td><?php print  $count+1; ?></td>
                          <td>
                            <?php if($user['rear_view_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $user['rear_view_image']?>"> 
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>
                          </td>
                          <td><?php echo $user['brand']; ?> </td>
                          <td><?php echo $user['model'] ?> </td>
                          <td><?php echo $user['year']; ?> </td>
                          <td><?php echo $car_owner_fname; ?> <?php echo $car_owner_lname; ?> </td>
                          <td><?php echo $user['year']; ?> </td>
                          <td><?php echo $user['seating_capacity']; ?> </td>
                          <td>
                            
                            <a onclick="updatePriceRange('<?php echo $user['id'] ?>')" style="cursor: pointer;color:#006064">Update Price Range</a>
                            <br>


                            <a onclick="viewCalendor('<?php echo $user['id'] ?>','<?php echo $make_name; ?>','<?php echo $model_name; ?>')" style="cursor: pointer;color:red">View Calender</a>
                            <br>
                            
                            <a onclick="setLocation('<?php echo $user['id'] ?>')" style="cursor: pointer;color:green">Set Location</a>

                            <br>
                            
                            <a onclick="setDistanceSetting('<?php echo $user['id'] ?>')" style="cursor: pointer;color:blue">Set Distance Setting</a><br>

                          </td>

                          <td>
                          <?php if($user['status'] == '1'){ ?>

                            <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=0" id="" onclick="return confirm('Are you sure change status?')"><img src="<?php echo $base_url ?>/assets/img/tick.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>

                            <?php } else { ?> 
                            <a href="change_status.php?pid=<?php echo $user['id']; ?>&status=1" class="inactive_status" onclick="return confirm('Are you sure change status?')" id=""><img src="<?php echo $base_url ?>/assets/img/erase.png" width="16" height="16" alt="Click to unblock" title="Click to unblock"></a>
                            <?php } ?>                                         
                          </td>
                          <td><?php echo date("d M Y", strtotime($user['created'])); ?></td>
                          <td>

                            <a href="view_record.php?pid=<?php print $user['id']?>"><i class="fa fa-eye"></i></a>&nbsp;
<!-- 
                            <a href="edit.php?pid=<?php print $user['id']?>"><i class="fa fa-pencil"></i></a>&nbsp; -->
                            
                            <a href="delete.php?pid=<?php echo $user['id']; ?>" class="delete_status" onclick="return confirm('Are you sure delete product?')" ><i class="fa fa-trash"></i></a>&nbsp;
                            
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


<div class="modal fade" id="viewCalander"  role="dialog" data-backdrop="static" data-keyboard="false" style="display: none">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <span id="car_make"></span>  <span id="car_model"></span> Calender Price</h5>
        <button type="button" class="close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="calendar"></div>
        <input type="hidden" id="select_car_id">

      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="viewLocationModel"  role="dialog" data-backdrop="static" data-keyboard="false" style="display: none">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> <span id="car_make"></span>  <span id="car_model"></span>Pickup Location</h5>
        <button type="button" class="close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <input type="text" name="car_location_new"  class="input-xxlarge focused" placeholder="Type Location" id="car_location_new" >
                                
          <input type="hidden" class="input-xlarge focused" name="lat"  id="lat" >
          <input type="hidden" class="input-xlarge focused" name="lng" id="lng" >
          <input type="hidden" class="input-xlarge focused" name="formatted_address" id="formatted_address" >
          <input type="hidden" class="input-xlarge focused" name="place_id" id="place_id" >
          <input type="hidden" class="input-xlarge focused" name="map_url" id="map_url" >
          <input type="hidden" class="input-xlarge focused" name="location_car_id" id="location_car_id" >
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" onclick="onSubmitLocation()">Set Locaion</button>
      </div>
     </div>
  </div>
</div>

<div class="modal fade" id="viewDistanceModel"  role="dialog" data-backdrop="static" data-keyboard="false" style="display: none">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></span>Distance Setting</h5>
        <button type="button" class="close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: left;">

        <label class="control-label" for="focusedInput">Select Unlimited Distance <span class="mandatory">*</span></label>
        <select class="form-control" id="unlimited_distance" onchange="selectDistande(this.value)">
           <option value="" selected="selected">--Select Unlimited Distance---</option>
           <option value="1">On</option>
           <option value="0">OFF</option>
        </select>


        <div id="unlimited_distance_show_hide">
          
          <label class="control-label" for="focusedInput">Maximum Kilometer</label>
          <input type="text" placeholder="Maximum Kilometer" class="input-xlarge focused" name="maximum_kilometer"  id="maximum_kilometer" >
           
          <label class="control-label" for="focusedInput">Excess Fee Per Kilometer</label>
          <input type="text" placeholder="Excess Fee Per Kilometer" class="input-xlarge focused" name="excess_fee_per_kilometer"  id="excess_fee_per_kilometer" >
          
          <label class="control-label" for="focusedInput">Time Penalty Per Hour</label>
          <input type="text" placeholder="Time Penalty Per Hour" class="input-xlarge focused" name="time_penalty_per_hour"  id="time_penalty_per_hour" >

            <input type="hidden" placeholder="Time Penalty Per Hour" class="input-xlarge focused" name="distance_car_id"  id="distance_car_id" >
        </div>
                                
         
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" onclick="onSubmitDistance()">Update</button>
      </div>
     </div>
  </div>
</div>

<div class="modal fade" id="updatePriceRange"  role="dialog" data-backdrop="static" data-keyboard="false" style="display: none">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></span>Set Price Range</h5>
        <button type="button" class="close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" style="text-align: left;">

        <div>
          
          <label class="control-label" for="focusedInput">Min Price</label>
          <input type="text" placeholder="Min Price" class="input-xlarge focused" name="price_range_min_price"  id="price_range_min_price" >
           
          <label class="control-label" for="focusedInput">Max Price</label>
          <input type="text" placeholder="Max Price" class="input-xlarge focused" name="price_range_max_price"  id="price_range_max_price" >
          
          <input type="hidden" placeholder="Time Penalty Per Hour" class="input-xlarge focused" name="update_price_range_car_id"  id="update_price_range_car_id" >
        </div>
                                
         
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
        <button type="button" class="btn btn-primary" onclick="onSubmitPriceRange()">Update</button>
      </div>
     </div>
  </div>
</div>

 
<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>

function viewCalendor(id,carmake,carmodel){

  $('#viewCalander').css('display','block');
  $('#viewCalander').modal('show');
  $('#select_car_id').val(id);
  $('#car_make').html(carmake);
  $('#car_model').html(carmodel);
  getCalenderData(id);
}

function updatePriceRange(car_id){

 

   $.ajax({
    url:"<?php echo $base_url ?>/car/fetch_price_range.php",
    method:"POST",
    data:{car_id:car_id},
            
     success:function(data)
     {

        var new_data = JSON.parse(data);
        
        $('#updatePriceRange').css('display','block');
        $('#updatePriceRange').modal('show');
        $('#update_price_range_car_id').val(car_id);

        $('#price_range_min_price').val(new_data.min_price);
        $('#price_range_max_price').val(new_data.max_price);
    
     }
    });
  
}



function closeModal(){
  $('#viewCalander').css('display','none');
  $('#viewLocationModel').css('display','none');
  $('#viewDistanceModel').css('display','none');
  $('#viewCalander').modal('hide');
  location.reload();
}

function setLocation(car_id){

  $.ajax({
    url:"<?php echo $base_url ?>/car/fetch_location.php",
    method:"POST",
    data:{car_id:car_id},
            
     success:function(data)
     {

        var new_data = JSON.parse(data);

        console.log(new_data);

        $('#viewLocationModel').css('display','block');
        $('#viewLocationModel').modal('show');
        $('#location_car_id').val(car_id);

        $('#car_location_new').val(new_data.car_location);
        $('#lat').val(new_data.lat);
        $('#lng').val(new_data.lng);
        $('#place_id').val(new_data.place_id);
        $('#map_url').val(new_data.map_url);
        $('#formatted_address').val(new_data.car_location);

        initMap();
     }
    });

}

function setDistanceSetting(car_id){

  $.ajax({
    url:"<?php echo $base_url ?>/car/fetch_location.php",
    method:"POST",
    data:{car_id:car_id},
            
     success:function(data)
     {

        var new_data = JSON.parse(data);

        console.log(new_data);

        $('#viewDistanceModel').css('display','block');
        $('#viewDistanceModel').modal('show');
        $('#distance_car_id').val(car_id);

        if(new_data.unlimited_distance == '1'){
          $('#unlimited_distance_show_hide').css('display','none');
        }

        $('#unlimited_distance').val(new_data.unlimited_distance);
        $('#maximum_kilometer').val(new_data.maximum_kilometer);
        $('#excess_fee_per_kilometer').val(new_data.excess_fee_per_kilometer);
        $('#time_penalty_per_hour').val(new_data.time_penalty_per_hour);
       
     }
    });

}

function selectDistande(value){
  // alert(value);
  if(value == 0){
    $('#unlimited_distance_show_hide').css('display','block');
  }else{
    $('#maximum_kilometer').val('');
    $('#excess_fee_per_kilometer').val('');
    $('#time_penalty_per_hour').val('');
     $('#unlimited_distance_show_hide').css('display','none');
  }
}

function onSubmitLocation(){
  var lat = $('#lat').val();
  var lng = $('#lng').val();
  var formatted_address = $('#formatted_address').val();
  var place_id = $('#place_id').val();
  var map_url = $('#map_url').val();
  var car_id = $('#location_car_id').val();
  $.ajax({
    url:"<?php echo $base_url ?>/car/update_location.php",
    method:"POST",
    data:{lat:lat,lng:lng,formatted_address:formatted_address,place_id:place_id,map_url:map_url,car_id:car_id},
            
     success:function(data)
     {
      $('#viewLocationModel').css('dispaly','none');
      $('#viewLocationModel').modal('hide');
       Swal.fire('Location updated successfully!', '', 'success');
     }
    });
}


function onSubmitPriceRange(){
  var price_range_min_price = $('#price_range_min_price').val();
  var price_range_max_price = $('#price_range_max_price').val();
  var car_id = $('#update_price_range_car_id').val();
  
  $.ajax({
    url:"<?php echo $base_url ?>/car/update_price_range.php",
    method:"POST",
    data:{price_range_min_price:price_range_min_price,price_range_max_price:price_range_max_price,car_id:car_id},
            
     success:function(data)
     {
      $('#updatePriceRange').css('dispaly','none');
      $('#updatePriceRange').modal('hide');
       Swal.fire('Price range updated successfully!', '', 'success');
     }
    });
}




function onSubmitDistance(){
  var unlimited_distance = $('#unlimited_distance').val();
  var maximum_kilometer = $('#maximum_kilometer').val();
  var excess_fee_per_kilometer = $('#excess_fee_per_kilometer').val();
  var time_penalty_per_hour = $('#time_penalty_per_hour').val();
  var car_id = $('#distance_car_id').val();
  $.ajax({
    url:"<?php echo $base_url ?>/car/update_distance.php",
    method:"POST",
    data:{unlimited_distance:unlimited_distance,maximum_kilometer:maximum_kilometer,excess_fee_per_kilometer:excess_fee_per_kilometer,time_penalty_per_hour:time_penalty_per_hour,car_id:car_id},
            
     success:function(data)
     {
      $('#viewDistanceModel').css('display','none');
      $('#viewDistanceModel').modal('hide');
       Swal.fire('Distance updated successfully!', '', 'success');
     }
    });
}


jQuery(document).ready(function($) {
    $('#tblUser').DataTable({
      "pageLength": 25
  });
});
</script>

<script>

function getCalenderData(car_id){

 

  var calendarEl = document.getElementById('calendar');
// alert(calendarEl);
  var calendar = new FullCalendar.Calendar(calendarEl, {
    initialView: 'dayGridMonth',
    height: 650,
    events: '<?php echo $base_url?>/ajax/fetch_calender_price.php?car_id='+car_id,
    
    selectable: true,
    selectHelper: true,
    select: async function (start, end, allDay) {
      const { value: formValues } = await Swal.fire({
        title: 'Add Price',
        confirmButtonText: 'Submit',
        showCloseButton: true,
        showCancelButton: true,
        html:
          '<input id="swalEvtTitle" class="swal2-input form-control" placeholder="Enter Price">',
        focusConfirm: false,
        preConfirm: () => {
          return [
            document.getElementById('swalEvtTitle').value
            
          ]
        }
      });

      if (formValues) {
        // Add event
        var car_id = $('#select_car_id').val();
        fetch("<?php echo $base_url?>/ajax/save_calender_price.php", {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ request_type:'addEvent', start:start.startStr, end:start.endStr, event_data: formValues,car_id:car_id}),
        })
        .then(response => response.json())
        .then(data => {
          if (data.status == 1) {
            Swal.fire('Price added successfully!', '', 'success');
          } else {
            Swal.fire(data.error, '', 'error');
          }

          // Refetch events from all sources and rerender
          calendar.refetchEvents();
        })
        .catch(console.error);
      }
    },

    eventClick: function(info) {
      info.jsEvent.preventDefault();
      
      // change the border color
      info.el.style.borderColor = 'red';
      
      Swal.fire({
        title: info.event.title,
        icon: 'info',
        // html:'<p>'+info.event.extendedProps.description+'</p><a href="'+info.event.url+'">Visit event page</a>',
        showCloseButton: true,
        showCancelButton: true,
        showDenyButton: true,
        cancelButtonText: 'Close',
        confirmButtonText: 'Delete',
        denyButtonText: 'Edit',
      }).then((result) => {
        if (result.isConfirmed) {
          // Delete event
          fetch("<?php echo $base_url?>/ajax/save_calender_price.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ request_type:'deleteEvent', event_id: info.event.id}),
          })
          .then(response => response.json())
          .then(data => {
            if (data.status == 1) {
              Swal.fire('Price deleted successfully!', '', 'success');
            } else {
              Swal.fire(data.error, '', 'error');
            }

            // Refetch events from all sources and rerender
            calendar.refetchEvents();
          })
          .catch(console.error);
        } else if (result.isDenied) {
          // Edit and update event
          Swal.fire({
            title: 'Edit Event',
            html:
              '<input id="swalEvtTitle_edit" class="swal2-input" placeholder="Enter title" value="'+info.event.title+'">',
            focusConfirm: false,
            confirmButtonText: 'Submit',
            preConfirm: () => {
            return [
              document.getElementById('swalEvtTitle_edit').value,
              
            ]
            }
          }).then((result) => {
            if (result.value) {
              // Edit event
              fetch("<?php echo $base_url?>/ajax/save_calender_price.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ request_type:'editEvent', start:info.event.startStr, end:info.event.endStr, event_id: info.event.id, event_data: result.value})
              })
              .then(response => response.json())
              .then(data => {
                if (data.status == 1) {
                  Swal.fire('Price updated successfully!', '', 'success');
                } else {
                  Swal.fire(data.error, '', 'error');
                }

                // Refetch events from all sources and rerender
                calendar.refetchEvents();
              })
              .catch(console.error);
            }
          });
        } else {
          Swal.close();
        }
      });
    }
  });

  calendar.render();

 }



 
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