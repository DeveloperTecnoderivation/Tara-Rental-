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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Car</a> <span class="divider">/</span></li><li class="active">Add Car</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Add New Car</div>
      </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form action="save.php" method="post" id="add_form" name="add_form" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Car Owner <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <select  name="car_owner_id" class="form-control" id="car_owner_id" required="required">
                                      <option value="">--Select Car Owner--</option> 
                                      <?php 
                                      $query="SELECT * FROM tbl_users WHERE status='1' and role='car_owner' ";
                                      $results = mysqli_query($connect, $query);
                                      foreach ($results as $car_owner_list){
                                      ?>
                                      <option value="<?php echo $car_owner_list["id"];?>"><?php echo $car_owner_list["f_name"];?> <?php echo $car_owner_list["l_name"];?></option> 
                                      <?php } ?>
                                    </select>
                                     <div id="car_owner_id_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Brand <span class="mandatory">*</span></label>
                              <div class="controls">
                                  <input type="text" class="input-large" name="brand" id="brand" placeholder="Enter Brand name">
                                   <div id="brand_error" class="error_msg"></div>
                              </div>
                          </div>
                        </div>

                        
                    </div>
                   
                    
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Model <span class="mandatory">*</span></label>
                              <div class="controls">
                                  <input type="text" class="input-large" name="model" id="model" placeholder="Enter Model name">
                                   <div id="model_error" class="error_msg"></div>
                              </div>
                          </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="password">Year </label>
                                <div class="controls">
                                    <input type="text" name="year" value="" class="input-large" placeholder="year" id="Year" >
                                    <!-- <div id="year_error" class="error_msg"></div> -->
                                    <!-- <div class="error" id="password_error"></div> -->
                                </div>
                            </div>
                        </div>
                       
                        

                        
                       
                    </div>


                    <div class="row-fluid">
                       <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">Car Type <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <input type="text" name="car_type" value="" class="input-large" placeholder="Car Type" id="car_type" >
                                    <div id="car_type_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">Fuel Type </label>
                                <div class="controls">
                                    <select  name="fuel_type" class="form-control" id="fuel_type" required="required">
                                      <option value="">--Select Fuel Type--</option> 
                                      <option value="Petrol">Petrol</option>
                                      <option value="Diesel">Diesel</option>
                                      <option value="Electric">Electric</option>
                                      <option value="Hybrid">Hybrid</option>
                                    </select>
                                    <!-- <div id="fuel_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="row-fluid">
                        
                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Interior Color</label>
                              <div class="controls">
                                <input type="text" name="interior_color" value="" class="input-large" placeholder="Interior Color" id="interior_color" >
 
                              </div>
                          </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Exterior Color</label>
                              <div class="controls">
                                <input type="text" name="exterior_color" value="" class="input-large" placeholder="Exterior Color" id="exterior_color" >

                                  
                              </div>
                          </div>
                        </div>

                        
                    </div>

                    <div class="row-fluid">
                       <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">Transmission <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <select  name="transmission" class="form-control" id="transmission" required="required">
                                      <option value="">--Select Transmission Type--</option> 
                                      <option value="Manual">Manual</option>
                                      <option value="Auto">Auto</option>
                                    </select>
                                    <div id="transmission_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">VIN <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <input type="text" name="vin" value="" class="input-large" placeholder="vin" id="vin" >
                                    <div id="vin_error" class="error_msg"></div>
                                    <!-- <div id="vehicle_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                      
                        <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">Mileage <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <input type="text" name="mileage" value="" class="input-large" placeholder="mileage" id="mileage" >
                                    <div id="mileage_error" class="error_msg"></div>
                                    <!-- <div id="vehicle_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">No Of Seats </label>
                                <div class="controls">
                                    <input type="number" name="seating_capacity" value="" class="input-large" placeholder="No Of Seats" id="seating_capacity" >
                                    <!-- <div id="mileage_error" class="error_msg"></div> -->
                                    <!-- <div id="vehicle_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                      
                        <div class="span12">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">Description</label>
                                <div class="controls">
                                  <textarea name="description" value="" class="input-large" placeholder="description" id="description" style="width: 98%" rows="5" ></textarea>
                                  
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>


                    <hr>


                    <h5>Upload Vechile Photo:(Upload only png,jpg,jpeg formate) Max. 5 MB size)</h5>
                    
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Rear View</label>
                                <div class="controls">
                                    <input type="file" name="rear_view_image" id="rear_view_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Front View</label>
                                <div class="controls">
                                   <input type="file" name="front_view_image" id="front_view_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Right Side</label>
                                <div class="controls">
                                    <input type="file" name="right_side_image" id="right_side_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">left Side</label>
                                <div class="controls">
                                   <input type="file" name="left_side_image" id="left_side_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Interior</label>
                                <div class="controls">
                                    <input type="file" name="interior_image" id="interior_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Insurence</label>
                                <div class="controls">
                                    <input type="file" name="insurence" id="insurence" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>  

                    <hr>

                    <h5>Upload Vechile Documents:(Upload only (image,Pdf,Docx) Max. 5 MB size)</h5>
                    
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">OR/CR</label>
                                <div class="controls">
                                    <input type="file" name="or_cr_doc" id="or_cr_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Car Video <span style="color: red;font-size: 12px;margin-left: 10px;">(Upload Video only mp4,mov,3gp,ogg -  Max 5 MB Uploaded)</span></label>
                                <div class="controls">
                                   <input type="file" name="car_video" id="car_video" class="input-large" accept=".ogg, .mp4, .mov,.3gp" >
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="span12">
                        <div class="form-actions submit-form-left-pad">
                            <input type="button" name="add_driver" id="add_driver" value="Add Car" class="btn btn-primary" id="submit_button" onclick="submitDetailsForm()">
                            <!-- <a class="btn" id="cancel_button" href="https://app.23ride.com/admin/drivers/index">Cancel</a> -->
                        </div>
                    </div>

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

<script language="javascript" type="text/javascript">
  function submitDetailsForm() {

       // $("#add_form").submit();

      var error = 1;
      var car_owner_id = $("#car_owner_id").val();
      var car_type = $("#car_type").val();
      var brand = $("#brand").val();
      var model = $("#model").val();
      var year = $("#year").val();
      var transmission = $("#transmission").val();
      var vin = $("#vin").val();
      var mileage = $("#mileage").val();
      var seating_capacity = $("#seating_capacity").val();
     
      
      if((car_owner_id == '') || (car_owner_id == undefined)){
        $("#car_owner_id_error").text("This field are required");
        error = 0;
      }else{
        $("#car_owner_id_error").text("");
      }


      if((car_type == '') || (car_type == undefined)){
        $("#car_type_error").text("This field are required");
        error = 0;
      }else{
        $("#car_type_error").text("");
      }

      

      if((brand == '') || (brand == undefined)){
        $("#brand_error").text("This field are required");
        error = 0;
      }else{
        $("#brand_error").text("");
      }

      if((model == '') || (model == undefined)){
        $("#model_error").text("This field are required");
        error = 0;
      }else{
        $("#model_error").text("");
      }

     

      if((transmission == '') || (transmission == undefined)){
        $("#transmission_error").text("This field are required");
        error = 0;
      }else{
        $("#transmission_error").text("");
      }

      if((vin == '') || (vin == undefined)){
        $("#vin_error").text("This field are required");
        error = 0;
      }else{
        $("#vin_error").text("");
      }

      

      if((mileage == '') || (mileage == undefined)){
        $("#mileage_error").text("This field are required");
        error = 0;
      }else{
        $("#mileage_error").text("");
      }

      if((seating_capacity == '') || (seating_capacity == undefined)){
        $("#seating_capacity_error").text("This field are required");
        error = 0;
      }else{
        $("#seating_capacity_error").text("");
      }

      if(error == 1){

          $("#add_form").submit();
        }else{
          window.scrollTo(500, 0);
         
      }
  }



function fetchStates(cid){

  var country_name = $("#country_id").val();
  var country_id =  country_name.slice(0, country_name.indexOf(','));

  if(country_name!=""){
    var countrycode = country_name.split(',').pop();
   
    if(countrycode!=""){
      countrycode = countrycode.toLowerCase().trim();
      initMap(countrycode);
      
    }
  }

  
  if(country_id>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_state.php",
        method:"POST",
        data:{country_id:country_id},
                
         success:function(data)
         {
          // console.log(data);
          $('#state_details').html('');
          $('#state_details').html(data);
          
         }
        });
    }
}

function fetchCity(sid){
  if(sid>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_city.php",
        method:"POST",
        data:{state_id:sid},
                
         success:function(data)
         {
          // console.log(data);
          $('#city_details').html('');
          $('#city_details').html(data);
          
         }
        });
    }
}


function fetchmodel(make_id){

  if(make_id>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_model.php",
        method:"POST",
        data:{make_id:make_id},
                
         success:function(data)
         {
          // console.log(data);
          $('#car_model').html('');
          $('#car_model').html(data);
          
         }
        });
    }

}

function fetchAddress(){
  $('#car_location_dv').css('display','block');
}
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo $GOOGLE_MAP_RIDER_KEY; ?>&libraries=places"></script>
<script type="text/javascript">


function initMap(countrycode)
{
 
  var input = document.getElementById("car_location_new");
  
  var options = { componentRestrictions: { country: countrycode } };
  var autocomplete = new google.maps.places.Autocomplete(input, options);
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
