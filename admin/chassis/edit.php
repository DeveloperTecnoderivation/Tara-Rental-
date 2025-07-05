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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $image_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Chassis</a> <span class="divider">/</span></li><li class="active">Edit Chassis</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Edit Chassis</div>
      </div>

       <?php
          $pid=$_REQUEST['pid'];
          $getdata="select * from tbl_truck where id=$pid";  
          $gdata=mysqli_query($connect,$getdata);
          $rown=mysqli_fetch_array($gdata);
          $pid = $rown['id'];

          
      ?>    

        <div class="block-content collapse in">
            <div class="span12">
                <form action="update.php" method="post" id="edit_form" name="edit_form" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="firstname">Model <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="model" class="input-large" placeholder="Model" id="model" required="required"  value="<?php echo $rown['model']?>">
                                    <div id="model_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="firstname">Plate No <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="plate_no" class="input-large" placeholder="Plate No." id="plate_no" required="required"  value="<?php echo $rown['plate_no']?>">
                                    <div id="plate_no_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row-fluid">

                         <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">Trailer Type</label>
                                <div class="controls">
                                    <select  name="trailer_type" class="form-control" id="trailer_type"  style="width: 85%">
                                        <option value="+65">--Select Trailer Type--</option> 
                                        <?php 
                                        $query="SELECT * FROM tbl_chassis_trailer_type WHERE status='1'";
                                        $results = mysqli_query($connect, $query);
                                        foreach ($results as $country_list){

                                          // print_r($country_list);
                                        ?>
                                        <option value="<?php echo $country_list["id"];?>" <?php if($rown['trailer_type'] == $country_list["id"]){ echo "selected"; }?>><?php echo $country_list["trailer_type"];?></option> 
                                        <?php } ?>
                                    </select>
                                    <div id="trailer_type_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="password">Truck Partner <span class="mandatory">*</span></label>
                                <div class="controls">
                                   <select  name="truck_partner_id" class="form-control" id="truck_partner_id"  style="width: 85%">
                                        <option value="+65">--Select Truck Partner--</option> 
                                        <?php 
                                        $query="SELECT * FROM tbl_users WHERE role='truck_partner' and status='1'";
                                        $results = mysqli_query($connect, $query);
                                        foreach ($results as $country_list){

                                          // print_r($country_list);
                                        ?>
                                        <option value="<?php echo $country_list["id"];?>" <?php if($rown['truck_partner_id'] == $country_list["id"]){ echo "selected"; }?>><?php echo $country_list["company_name"];?></option> 
                                        <?php } ?>
                                      </select>

                                    
                                    <div id="truck_partner_id_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                   
                   
                    <hr>

                    <h3>Documents:(Upload only (image,Pdf,Docx) Max. 5 MB size)</h3>
                    
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Image</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    <div class="controls1">
                                      <?php if($rown['image']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['image']);
                                          $path_extension = $path_info['extension'];

                                         
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['image']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/assets/img/docx.png">
                                            
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['image']?>">
                                            
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/assets/img/pdf.png">
                                            
                                          </a> 
                                        <?php } ?>
                                        
                                        
                                        
                                      <?php } else { ?> 
                                       <div class="no_document" style="color: red"> No Decuments....</div>
                                      <?php } ?> 
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">OR/CR</label>
                                <div class="controls">
                                   <input type="file" name="or_cr" id="or_cr" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                   <div class="controls1">
                                    <?php if($rown['or_cr']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['or_cr']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['or_cr']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/assets/img/docx.png">
                                          
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['or_cr']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['or_cr']?>">
                                          
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['or_cr']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/assets/img/pdf.png">
                                          
                                        </a> 
                                      <?php } ?>
                                      
                                      
                                      
                                    <?php } else { ?> 
                                     <div class="no_document" style="color: red"> No Decuments....</div>
                                    <?php } ?> 
                                  </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="span12">
                        <div class="form-actions submit-form-left-pad">
                          <input type="hidden" id="pid" name="pid" value='<?php echo $pid; ?>' >
                      
                            <input type="button" name="add_driver" id="add_driver" value="Update Truck Driver" class="btn btn-primary" id="submit_button" onclick="submitDetailsForm()">
                            <a class="btn" id="cancel_button" href="https://app.23ride.com/admin/drivers/index">Cancel</a>
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

        error = 1;

       var model = $("#model").val();
      var plate_no = $("#plate_no").val();
      var trailer_type = $("#trailer_type").val();
      var truck_partner_id = $("#truck_partner_id").val();
     
      if((model == '') || (model == undefined)){
        $("#model_error").text("This field are required");
        error = 0;
      }else{
        $("#model_error").text("");
      }

      if((plate_no == '') || (plate_no == undefined)){
        $("#plate_no_error").text("This field are required");
        error = 0;
      }else{
        $("#plate_no_error").text("");
      }

      if((trailer_type == '') || (trailer_type == undefined)){
        $("#trailer_type_error").text("This field are required");
        error = 0;
      }else{
        $("#trailer_type_error").text("");
      }

      if((truck_partner_id == '') || (truck_partner_id == undefined)){
        $("#truck_partner_id_error").text("This field are required");
        error = 0;
      }else{
        $("#truck_partner_id_error").text("");
      }

        if(error == 1){

            $.ajax({
                url: '<?php echo $base_url ?>/truck/check_edit_exist.php',
                type: 'post',
                data: {
                  plate_no: plate_no,
                  table_name: 'tbl_truck',
                  pid: '<?php echo $pid; ?>',
                  
                },


                success: function(response) {

                if (response == 'success') {
                     $("#edit_form").submit();
                 }else{
                    toastr.optionsOverride = 'positionclass = "toast-bottom-left"';
                    toastr.options.positionClass = 'toast-bottom-left';
                    toastr.error('Palte Number Already Added');
                 }
                  
                 
                }
            });
        }
       
    }
</script>