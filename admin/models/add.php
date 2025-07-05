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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Model</a> <span class="divider">/</span></li><li class="active">Add Model</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Add New Model</div>
      </div>
      <div class="block-content collapse in">
        <div class="span12">
           <?php
                if(isset($_SESSION['success'])){
                    echo('<p style="color:green">'.$_SESSION['success']."</p>");
                    unset($_SESSION['success']);
                }
                if(isset($_SESSION['error'])){
                    echo('<p style="color:red">'.$_SESSION['error']."</p>");
                    unset($_SESSION['error']);
                }
            ?>
                    
            <form  id="add_form" name="add_form" class="form-horizontal" method="post" action="save.php" enctype="multipart/form-data">
            <fieldset>  

              <div class="control-group">
                <label class="control-label" for="focusedInput">Make</label>
                <div class="controls">
                    <select  name="make_id" class="form-control" id="make_id" required="required" >
                      <option value="">--Select Make--</option> 
                      <?php 
                      $query="SELECT * FROM tbl_vehicle_makes WHERE status=1 ORDER BY name asc ";
                      $results = mysqli_query($connect, $query);
                      foreach ($results as $make_list){
                      ?>
                      <option value="<?php echo $make_list["id"];?>"><?php echo $make_list["name"];?></option> 
                      <?php } ?>
                    </select>
                    <div id="make_id_error" class="error_msg"></div>

                </div>
              </div>

            
              <div class="control-group">
                <label class="control-label" for="focusedInput">Model Name</label>
                <div class="controls">
                  <input type="text" name="name" class="input-xlarge focused" placeholder="Name" id="name" required="required">
                  <div id="name_error" class="error_msg"></div>
                </div>
              </div>
             
              <div class="form-actions">
                 <input type="button" name="add_makes" value="Add" class="btn btn-primary" onclick="submitDetailsForm()">
                <a class="btn" href="#">Cancel</a>
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

<script language="javascript" type="text/javascript">
    function submitDetailsForm() {

      var error = 1;
      var name = $("#name").val();
      var make_id = $("#make_id").val();
      
      if((name == '') || (name == undefined)){
        $("#name_error").text("This field are required");
        error = 0;
      }else{
        $("#name_error").text("");
      }
       if((make_id == '') || (make_id == undefined)){
        $("#make_id_error").text("This field are required");
        error = 0;
      }else{
        $("#make_id_error").text("");
      }

      if(error == 1){

            $.ajax({
                url: '<?php echo $base_url ?>/models/check_exist.php',
                type: 'post',
                data: {
                  name: name,
                  make_id: make_id,
                  table_name: 'tbl_vehicle_models',
                  
                },
                success: function(response) {
                  
                if (response == 'success') {
                     $("#add_form").submit();
                 }else if (response == 'name_error') {
                    toastr.optionsOverride = 'positionclass = "toast-bottom-left"';
                    toastr.options.positionClass = 'toast-bottom-left';
                    toastr.error('Model Name Already Exist!');
                 }else{
                    toastr.optionsOverride = 'positionclass = "toast-bottom-left"';
                    toastr.options.positionClass = 'toast-bottom-left';
                    toastr.error('Some thing error. Please try again!');
                 }
                }
            });
        }
       
    }
</script>