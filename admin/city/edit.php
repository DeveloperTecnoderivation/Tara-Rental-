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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">City</a> <span class="divider">/</span></li><li class="active">Edit City</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Edit City</div>
      </div>
      <div class="block-content collapse in">
    <div class="span12">

      <?php
          $pid=$_REQUEST['pid'];
          $getdata="select * from tbl_city where id=$pid";  
          $gdata=mysqli_query($connect,$getdata);
          $rowcount=mysqli_num_rows($gdata);
          if($rowcount==1) 
          {
           $rown=mysqli_fetch_array($gdata);
           // print_r($rown);
           $pid = $rown['id'];

           $country_id = $rown['country_id'];
           $state_id = $rown['state_id'];
             
      ?>    
        <form action="update.php" method="post" id="add_city_form" name="add_city_form" class="form-horizontal" accept-charset="utf-8">
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
                          <option value="<?php echo $country_list["id"];?>" <?php if($rown['country_id'] == $country_list["id"]){ echo "selected"; }?>><?php echo $country_list["country_name"];?></option> 
                          <?php } ?>
                        </select>
                    </div>
                </div>

               <div class="control-group" id="state_details">
                </div>


                <div class="control-group" id="city_details" >
                  <label class="control-label" for="focusedInput">City Name</label>
                  <div class="controls">
                      <input type="text" name="location"  class="input-xlarge focused" placeholder="City Name" id="location"  value="<?php echo $rown['name'];?>">
                      
                      <input type="hidden" class="input-xlarge focused" name="lat"  id="lat" value="<?php echo $rown['lat'];?>">
                      <input type="hidden" class="input-xlarge focused" name="lng" id="lng" value="<?php echo $rown['lng'];?>">
                      <input type="hidden" class="input-xlarge focused" name="name" id="city_name" value="<?php echo $rown['name'];?>">
                      <input type="hidden" class="input-xlarge focused" name="place_id" id="place_id" value="<?php echo $rown['place_id'];?>">
                      <input type="hidden" class="input-xlarge focused" name="map_url" id="map_url" value="<?php echo $rown['map_url'];?>">
                     

                  </div>
              </div>
                
                <div class="form-actions">
                  <input type="hidden" id="pid" name="pid" value='<?php echo $pid; ?>' >
                    <input type="submit" name="add_country" value="Update City" class="btn btn-primary" id="submit_button">
                    <!-- <a class="btn" href="">Cancel</a> -->
                </div>
            </fieldset>
        </form>
      <?php } ?>
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
$(document).ready(function(){
  var cid = '<?php echo $country_id;  ?>';
  var sid = '<?php echo $state_id;  ?>';
  fetchStatesEdit(cid,sid);
});

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

  
  });
}




function fetchStates(cid){
  alert(cid);
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


function fetchStatesEdit(cid,sid){
  if(cid>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/ajax/fetch_state_edit.php",
        method:"POST",
        data:{country_id:cid,state_id:sid},
                
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

        