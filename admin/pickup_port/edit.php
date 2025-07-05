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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $image_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Pick Up Port </a> <span class="divider">/</span></li><li class="active">Edit Pick Up Port </li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Edit Pick Up Port </div>
      </div>

       <?php
          $pid=$_REQUEST['pid'];
          $getdata="select * from tbl_pick_up_port where id=$pid";  
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
                                <label class="control-label" for="firstname">Pick Up Port <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="port" class="input-large" placeholder="Pick Up Port" id="port" required="required" value="<?php echo $rown['port']?>">
                                    <div id="port_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="firstname">Port Code <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="code" class="input-large" placeholder="Code No." id="code" required="required" value="<?php echo $rown['code']?>">
                                    <div id="code_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="firstname">Latitutde <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="lat" class="input-large" placeholder="Latitutde" id="lat" required="required" value="<?php echo $rown['lat']?>">
                                    <div id="lat_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">Longitude</label>
                                <div class="controls">
                                    <input type="text" name="lng" class="input-large" placeholder="Longitude" id="lng" required="required" value="<?php echo $rown['lng']?>">
                                    <div id="lng_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                     </div>
                    
                    

                    <div class="span12">
                        <div class="form-actions submit-form-left-pad">
                          <input type="hidden" id="pid" name="pid" value='<?php echo $pid; ?>' >
                      
                            <input type="button" name="add_driver" id="add_driver" value="Update" class="btn btn-primary" id="submit_button" onclick="submitDetailsForm()">
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

       var port = $("#port").val();
      var code = $("#code").val();
      var truck_type = $("#truck_type").val();
      var truck_partner_id = $("#truck_partner_id").val();
     
      if((port == '') || (port == undefined)){
        $("#port_error").text("This field are required");
        error = 0;
      }else{
        $("#port_error").text("");
      }

      if((code == '') || (code == undefined)){
        $("#code_error").text("This field are required");
        error = 0;
      }else{
        $("#code_error").text("");
      }

      if((lat == '') || (lat == undefined)){
        $("#lat_error").text("This field are required");
        error = 0;
      }else{
        $("#lat_error").text("");
      }

      if((lng == '') || (lng == undefined)){
        $("#lng_error").text("This field are required");
        error = 0;
      }else{
        $("#lng_error").text("");
      }

        if(error == 1){
             $("#edit_form").submit();
        }
       
    }
</script>