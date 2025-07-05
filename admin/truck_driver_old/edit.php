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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Truck Driver</a> <span class="divider">/</span></li><li class="active">Edit Truck Driver</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Edit Truck Driver</div>
      </div>

       <?php
          $pid=$_REQUEST['pid'];
          $getdata="select * from tbl_truck_driver where id=$pid";  
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
                                <label class="control-label" for="firstname">First Name <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="f_name" class="input-large" placeholder="First Name" id="f_name"  value="<?php echo $rown['f_name']?>">
                                    <div id="f_name_error" class="error_msg"></div>
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="firstname">Last Name <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="l_name" class="input-large" placeholder="Last Name" id="l_name"  value="<?php echo $rown['l_name']?>">
                                     <div id="l_name_error" class="error_msg"></div>
                                    <!-- <div id="l_name_error" class="error_msg"></div> -->
                                    
                                </div>
                            </div>
                        </div>
                       
                    </div>

                    <div class="row-fluid">

                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" class="input-large" placeholder="Email" id="email" required="required" value="<?php echo $rown['email']?>">
                                     <div id="email_error" class="error_msg"></div>
                                    <!-- <div id="email_error" class="error_msg"></div> -->
                                   
                                </div>
                            </div>
                        </div>
                        
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="email">Phone Number</label>
                                <div class="controls">
                                    <select  name="contact_person_phone_mobile_code" class="form-control" id="contact_person_phone_mobile_code"  style="width: 65px">
                                        <option value="+65">+65</option> 
                                        <?php 
                                        $query="SELECT * FROM tbl_countries WHERE status=1";
                                        $results = mysqli_query($connect, $query);
                                        foreach ($results as $country_list){
                                        ?>
                                        <option value="<?php echo $country_list["country_mobile_code"];?>" <?php if($country_list["country_mobile_code"] == $rown['country_mobile_code']){ echo "selected"; } ?>><?php echo $country_list["country_mobile_code"];?></option> 
                                        <?php } ?>
                                      </select>
                                    <input type="text" name="phone_number" class="input-large" placeholder="Contact Person Phone Number" id="phone_number" required="required" value="<?php echo $rown['phone_number']?>">
                                    <div id="phone_number_error" class="error_msg"></div>
                                    <!-- <div id="phone_number_error" class="error_msg"></div> -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                        
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="password">Truck Partner Refrence Number <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <input type="text"  class="input-large" value="<?php echo $rown['refrence_number']?>" readonly="readonly">
                                    <!-- <div id="refrence_number_error" class="error_msg"></div> -->
                                    <!-- <div class="error" id="password_error"></div> -->
                                </div>
                            </div>
                        </div>
                        <
                    </div>


                    <hr>

                    <h3>Documents:(Upload only (image,Pdf,Docx) Max. 5 MB size)</h3>
                    
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Driver license</label>
                                <div class="controls">
                                    <input type="file" name="driver_license_doc" id="driver_license_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    <div class="controls1">
                                      <?php if($rown['driver_license_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['driver_license_doc']);
                                          $path_extension = $path_info['extension'];

                                         
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['driver_license_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['driver_license_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['driver_license_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['driver_license_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                                <label class="control-label" for="photo">Valid Goverment Id</label>
                                <div class="controls">
                                   <input type="file" name="valid_goverment_id_doc" id="valid_goverment_id_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                   <div class="controls1">
                                    <?php if($rown['valid_goverment_id_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['valid_goverment_id_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['valid_goverment_id_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['valid_goverment_id_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['valid_goverment_id_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['valid_goverment_id_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Company Id</label>
                                <div class="controls">
                                    <input type="file" name="company_id_doc" id="company_id_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                      <?php if($rown['company_id_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['company_id_doc']);
                                          $path_extension = $path_info['extension'];

                                          
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['company_id_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['company_id_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['company_id_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['company_id_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                                <label class="control-label" for="photo">Bio Data</label>
                                <div class="controls">
                                   <input type="file" name="bio_data_doc" id="bio_data_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                      <?php if($rown['bio_data_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['bio_data_doc']);
                                          $path_extension = $path_info['extension'];

                                          
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bio_data_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bio_data_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['bio_data_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bio_data_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Drug Test Result</label>
                                <div class="controls">
                                    <input type="file" name="drug_test_result_doc" id="drug_test_result_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                     <div class="controls1">
                                      <?php if($rown['drug_test_result_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['drug_test_result_doc']);
                                          $path_extension = $path_info['extension'];

                                         
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['drug_test_result_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['drug_test_result_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['drug_test_result_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['drug_test_result_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                                <label class="control-label" for="photo">NBI Clearance</label>
                                <div class="controls">
                                   <input type="file" name="nbi_clearance_doc" id="nbi_clearance_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                   <div class="controls1">
                                    <?php if($rown['nbi_clearance_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['nbi_clearance_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['nbi_clearance_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['nbi_clearance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['nbi_clearance_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['nbi_clearance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                    <div class="row-fluid">  
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Police Clearance</label>
                                <div class="controls">
                                   <input type="file" name="police_clearance_doc" id="police_clearance_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                   <div class="controls1">
                                    <?php if($rown['police_clearance_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['police_clearance_doc']);
                                        $path_extension = $path_info['extension'];

                                      
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['police_clearance_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['police_clearance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['police_clearance_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['police_clearance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                                <label class="control-label" for="photo">Personal Accident Insurance</label>
                                <div class="controls">
                                   <input type="file" name="personal_accident_insurance_doc" id="personal_accident_insurance_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                    <div class="controls1">
                                      <?php if($rown['personal_accident_insurance_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['personal_accident_insurance_doc']);
                                          $path_extension = $path_info['extension'];

                                          
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['personal_accident_insurance_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['personal_accident_insurance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['personal_accident_insurance_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['personal_accident_insurance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                    <div class="row-fluid">    
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Vacination Card</label>
                                <div class="controls">
                                   <input type="file" name="vacination_card_doc" id="vacination_card_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                   <div class="controls1">
                                    <?php if($rown['vacination_card_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['vacination_card_doc']);
                                        $path_extension = $path_info['extension'];


                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['vacination_card_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['vacination_card_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['vacination_card_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['vacination_card_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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


      var error = 1;
      var f_name = $("#f_name").val();
      var l_name = $("#l_name").val();
      var email = $("#email").val();
      var phone_number = $("#phone_number").val();
      
      var emailPattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;

      if((f_name == '') || (f_name == undefined)){
        $("#f_name_error").text("This field are required");
        error = 0;
      }else{
        $("#f_name_error").text("");
      }

      if((l_name == '') || (l_name == undefined)){
        $("#l_name_error").text("This field are required");
        error = 0;
      }else{
        $("#l_name_error").text("");
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

      if((phone_number == '') || (phone_number == undefined)){
        $("#phone_number_error").text("This field are required");
        error = 0;
      }else{
        $("#phone_number_error").text("");
      }
      

        if(error == 1){

            $.ajax({
                url: '<?php echo $base_url ?>/truck_driver/check_edit_exist.php',
                type: 'post',
                data: {
                  email: email,
                  phone_number: phone_number,
                  table_name: 'tbl_truck_driver',
                  pid: '<?php echo $pid; ?>',
                  
                },


                success: function(response) {

                if (response == 'success') {
                     $("#edit_form").submit();
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