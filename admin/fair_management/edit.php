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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $image_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Truck Fair</a> <span class="divider">/</span></li><li class="active">Edit Truck Fair</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Edit Truck Fair</div>
      </div>

       <?php
          $pid=$_REQUEST['pid'];
          $getdata="select * from tbl_fair_management where id=$pid";  
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
                                <label class="control-label" for="firstname"> DIESEL PHP/LITER <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="diesel_price" class="input-large" placeholder=" DIESEL PHP/LITER " id="diesel_price" required="required"  value="<?php echo $rown['diesel_price']?>">
                                    <div id="diesel_price_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="firstname">LABOR COST<span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="labor_cost_charge" class="input-large" placeholder="Plate No." id="labor_cost_charge" required="required"  value="<?php echo $rown['labor_cost_charge']?>">
                                    <div id="labor_cost_charge_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">BATTERIES</label>
                                <div class="controls">
                                    <input type="text" name="batteries_charge" class="input-large" placeholder="Truck Type" id="batteries_charge" required="required" value="<?php echo $rown['batteries_charge']?>">
                                    <div id="batteries_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">DEPRECIATION</label>
                                <div class="controls">
                                    <input type="text" name="depreciation_charge" class="input-large" placeholder="Truck Type" id="depreciation_charge" required="required" value="<?php echo $rown['depreciation_charge']?>">
                                    <div id="depreciation_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">INTEREST EXPENSE</label>
                                <div class="controls">
                                    <input type="text" name="interest_expense_charge" class="input-large" placeholder="Truck Type" id="interest_expense_charge" required="required" value="<?php echo $rown['interest_expense_charge']?>">
                                    <div id="interest_expense_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">REPAIRS AND MAINTENANCE</label>
                                <div class="controls">
                                    <input type="text" name="repairs_and_maintenance_charge" class="input-large" placeholder="Truck Type" id="repairs_and_maintenance_charge" required="required" value="<?php echo $rown['repairs_and_maintenance_charge']?>">
                                    <div id="repairs_and_maintenance_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">REGISTRATION AND INSURANCE</label>
                                <div class="controls">
                                    <input type="text" name="registration_and_insurance_charge" class="input-large" placeholder="Truck Type" id="registration_and_insurance_charge" required="required" value="<?php echo $rown['registration_and_insurance_charge']?>">
                                    <div id="registration_and_insurance_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">COMMUNICATION EQUIPMENTS</label>
                                <div class="controls">
                                    <input type="text" name="comminication_equipments_charge" class="input-large" placeholder="Truck Type" id="comminication_equipments_charge" required="required" value="<?php echo $rown['comminication_equipments_charge']?>">
                                    <div id="comminication_equipments_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">OTHER INVESTMENTS</label>
                                <div class="controls">
                                    <input type="text" name="other_investments_charge" class="input-large" placeholder="Truck Type" id="other_investments_charge" required="required" value="<?php echo $rown['other_investments_charge']?>">
                                    <div id="other_investments_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">MARK UP CHARGE (%)</label>
                                <div class="controls">
                                    <input type="text" name="markup_charge" class="input-large" placeholder="Truck Type" id="markup_charge" required="required" value="<?php echo $rown['markup_charge']?>">
                                    <div id="markup_charge_error" class="error_msg"></div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">VALUE ADDED TAX (%)</label>
                                <div class="controls">
                                    <input type="text" name="vat" class="input-large" placeholder="Truck Type" id="vat" required="required" value="<?php echo $rown['vat']?>">
                                    <div id="vat_error" class="error_msg"></div>
                                   
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

       $("#edit_form").submit();
       
    }
</script>