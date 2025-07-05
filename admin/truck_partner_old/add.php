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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Truck Partner</a> <span class="divider">/</span></li><li class="active">Add Truck Partner</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Add New Truck Partner</div>
      </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form action="save.php" method="post" id="add_form" name="add_form" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="firstname">Company Name <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="company_name" class="input-large" placeholder="Company Name" id="company_name" >
                                    <div id="company_name_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" class="input-large" placeholder="Email" id="email" >
                                    <div id="email_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="email">Contact Person</label>
                                <div class="controls">
                                    <input type="text" name="contact_person" class="input-large" placeholder="Contact Person" id="contact_person" >
                                    <div id="contact_person_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="email">Contact Person Phone Number</label>
                                <div class="controls">
                                    <!-- <select  name="contact_person_phone_mobile_code" class="form-control" id="contact_person_phone_mobile_code"  style="width: 65px">
                                        <option value="+65">+65</option> 
                                        <?php 
                                        $query="SELECT * FROM tbl_countries WHERE status=1";
                                        $results = mysqli_query($connect, $query);
                                        foreach ($results as $country_list){
                                        ?>
                                        <option value="<?php echo $country_list["country_mobile_code"];?>"><?php echo $country_list["country_mobile_code"];?></option> 
                                        <?php } ?>
                                      </select> -->
                                    <input type="text" name="contact_person_phone" class="input-large" placeholder="Contact Person Phone Number" id="contact_person_phone" >
                                    <div id="contact_person_phone_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="password">Password <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <input type="password" name="password" value="" class="input-large" placeholder="Password" id="password" maxlength="20">
                                    <div id="password_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="confirm_password">Company Type <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <select name="company_type" id="company_type" class="input-large" value="">
                                        <option value="" selected="selected">Select Company Type</option>
                                        <option value="1">Partner</option>
                                        <option value="2">Corporation</option>
                                    </select>
                                    
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
                                <label class="control-label" for="photo">Business Permit</label>
                                <div class="controls">
                                    <input type="file" name="business_permit_doc" id="business_permit_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">BIR</label>
                                <div class="controls">
                                   <input type="file" name="bir_doc" id="bir_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">COR</label>
                                <div class="controls">
                                    <input type="file" name="cor_doc" id="cor_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">LTFRB Franchise Certificate</label>
                                <div class="controls">
                                   <input type="file" name="ltfrb_doc" id="ltfrb_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">PPA</label>
                                <div class="controls">
                                    <input type="file" name="ppa_doc" id="ppa_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Memebership from CTAP</label>
                                <div class="controls">
                                   <input type="file" name="ctap_doc" id="ctap_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">ACTO</label>
                                <div class="controls">
                                    <input type="file" name="acto_doc" id="acto_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Mayors Permit</label>
                                <div class="controls">
                                   <input type="file" name="mayors_permit_doc" id="mayors_permit_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">SEC Certificate</label>
                                <div class="controls">
                                    <input type="file" name="sec_certificate_doc" id="sec_certificate_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Articles of Incorporation</label>
                                <div class="controls">
                                   <input type="file" name="articles_of_incorporation_doc" id="articles_of_incorporation_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Inland Marine Insurance</label>
                                <div class="controls">
                                    <input type="file" name="inland_marine_insurance_doc" id="inland_marine_insurance_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">OC/CR</label>
                                <div class="controls">
                                   <input type="file" name="oc_cr_doc" id="oc_cr_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">PA/CPC</label>
                                <div class="controls">
                                    <input type="file" name="pa_cpc_doc" id="pa_cpc_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Deed of Sale</label>
                                <div class="controls">
                                   <input type="file" name="deed_of_sale_doc" id="deed_of_sale_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Bank Certificate</label>
                                <div class="controls">
                                    <input type="file" name="bank_certificate1_doc" id="bank_certificate1_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <!-- <div class="span6">
                           <div class="control-group">
                                <label class="control-label" for="photo">Bank Certificate 2</label>
                                <div class="controls">
                                    <input type="file" name="bank_certificate2_doc" id="bank_certificate2_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">FS Past 2Yrs</label>
                                <div class="controls">
                                    <input type="file" name="fs_past_2yrs_doc" id="fs_past_2yrs_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                           <div class="control-group">
                                <label class="control-label" for="photo">GPS Device</label>
                                <div class="controls">
                                    <input type="file" name="gps_device_doc" id="gps_device_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Organizational Chart</label>
                                <div class="controls">
                                    <input type="file" name="organizational_chart_doc" id="organizational_chart_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>


                    <div class="span12">
                        <div class="form-actions submit-form-left-pad">
                           <input type="button" name="add_makes" value="Add" class="btn btn-primary" onclick="submitDetailsForm()">
                            <a class="btn" id="cancel_button" href="#">Cancel</a>
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

      var error = 1;
      var company_name = $("#company_name").val();
      var email = $("#email").val();
      var contact_person = $("#contact_person").val();
      
      var contact_person_phone = $("#contact_person_phone").val();
      var password = $("#password").val();
     
      var emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

      if((company_name == '') || (company_name == undefined)){
        $("#company_name_error").text("This field are required");
        error = 0;
      }else{
        $("#company_name_error").text("");
      }

      if((contact_person == '') || (contact_person == undefined)){
        $("#contact_person_error").text("This field are required");
        error = 0;
      }else{
        $("#contact_person_error").text("");
      }

      if((email == '') || (email == undefined)){
          $("#email_error").text("This field are required");
          error = 0;
        }else if(!emailPattern.test(email)){
          $("#email_error").text("Enter vaild email id");
          error = 0;
        }else{
          $("#email_error").text("");
        }

      if((contact_person_phone == '') || (contact_person_phone == undefined)){
        $("#contact_person_phone_error").text("This field are required");
        error = 0;
      }else{
        $("#contact_person_phone_error").text("");
      }
      if((password == '') || (password == undefined)){
        $("#password_error").text("This field are required");
        error = 0;
      }else{
        $("#password_error").text("");
      }
      

        if(error == 1){

            $.ajax({
                url: '<?php echo $base_url ?>/truck_partner/check_exist.php',
                type: 'post',
                data: {
                  email: email,
                  contact_person_phone: contact_person_phone,
                  table_name: 'tbl_truck_partner',
                  
                },
                success: function(response) {
                  
                if (response == 'success') {
                     $("#add_form").submit();
                 }else if (response == 'email_error') {
                    toastr.optionsOverride = 'positionclass = "toast-bottom-left"';
                    toastr.options.positionClass = 'toast-bottom-left';
                    toastr.error('Email Already Exist!');
                 }else if (response == 'phone_error') {
                   
                    toastr.optionsOverride = 'positionclass = "toast-bottom-left"';
                    toastr.options.positionClass = 'toast-bottom-left';
                    toastr.error('Phone Number Already Exist!');
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