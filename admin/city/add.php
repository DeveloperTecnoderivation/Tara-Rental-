<?php 
include("../conn-web/cw.php");
  if(!$_SESSION["tata_login_username"]){
  header('Location:index.php'); 
}
?>
<?php include "../header.php";  ?>
  <div class="span9" id="content">
    <div class="row-fluid">
      <div class="navbar">
        <div class="navbar-inner">
          <ul class="breadcrumb">
            <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">City</a> <span class="divider">/</span></li><li class="active">Add City</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Add New City</div>
      </div>

      


      <div class="block-content collapse in">
            <div class="span12">
                <form action="save.php" method="post" id="add_state_form" name="add_state_form" class="form-horizontal" accept-charset="utf-8">
                    <fieldset>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Country</label>
                        <div class="controls">
                                <select  name="country_id" class="form-control" id="country_id" required="required" onchange="fetchStates(event.target.value)">
                                  <option value="">--Select Country--</option> 
                                  <?php 
                                  $query="SELECT * FROM tbl_countries WHERE status=1";
                                  $results = mysqli_query($connect, $query);
                                  foreach ($results as $country_list){
                                  ?>
                                  <option value="<?php echo $country_list["id"];?>"><?php echo $country_list["country_name"];?></option> 
                                  <?php } ?>
                                </select>
                        </div>
                      </div>

                        <div class="control-group" id="state_details">
                            
                        </div>

                        <div class="control-group" id="city_details" style="display: none">
                            <label class="control-label" for="focusedInput">City Name</label>
                            <div class="controls">
                                <input type="text" name="location" value="" class="input-xlarge focused" placeholder="City Name" id="location" >
                                
                                <input type="hidden" class="input-xlarge focused" name="lat"  id="lat" >
                                <input type="hidden" class="input-xlarge focused" name="lng" id="lng" >
                                <input type="hidden" class="input-xlarge focused" name="name" id="city_name" >
                                <input type="hidden" class="input-xlarge focused" name="place_id" id="place_id" >
                                <input type="hidden" class="input-xlarge focused" name="map_url" id="map_url" >
                               

                            </div>
                        </div>
                        
                        
                        <div class="form-actions">

                          <input type="submit" name="add_country" value="Add City" class="btn btn-primary" id="submit_button" disabled="true">
                            <!-- <a class="btn" href="">Cancel</a> -->
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
    <!-- /block -->
    </div>
  
</div>

</div>
</div>
<?php include "../footer.php";  ?>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo $GOOGLE_MAP_RIDER_KEY; ?>&libraries=drawing,places,geometry&callback=initMap" async defer></script>



<!-- <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $GOOGLE_MAP_RIDER_KEY; ?>&libraries=drawing,places,geometry&callback=initMap" async defer></script>
 -->
<script type="text/javascript">

  function initMap(country_code)
{
   var id='location';
  var autocomplete = new google.maps.places.Autocomplete((document.getElementById(id)),{
        types:['geocode'],
    })

    autocompleteListener = google.maps.event.addListener(autocomplete, 'place_changed', function() {

    var place = autocomplete.getPlace();
    console.log(place);
   var lat = place.geometry.location.lat();
   var lng = place.geometry.location.lng();

   var city_name = place.name;
   var place_id = place.place_id;
   var map_url = place.url;
    
    $('#lat').val(lat);
    $('#lng').val(lng);
    $('#city_name').val(city_name);
    $('#place_id').val(place_id);
    $('#map_url').val(map_url);
    $('#submit_button').prop('disabled', false);

    // for(i = 0; i < place.address_components.length; i++) {
    //   if(place.address_components[i]['types'] == 'administrative_area_level_1,political'){
    //     statename = place.address_components[i]['long_name'];
    //     state_code = place.address_components[i]['short_name'];
    //   }
    // }
    // if(statename=="" || state_code=="")
    // {
    //   $("#submit_button").attr("disabled", "disabled");
    // }
    // $("#state_name").val(statename);
    // $("#state_code").val(state_code);
  });
}




function fetchStates(cid){
  if(cid>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/ajax/fetch_state.php",
        method:"POST",
        data:{country_id:cid},
                
         success:function(data)
         {
          // console.log(data);
          $('#state_details').html('');
          $('#state_details').html(data);
          
         }
        });
    }
}

function fetchCity(){
  // alert();
  $('#city_details').css('display','block')
}
</script>

