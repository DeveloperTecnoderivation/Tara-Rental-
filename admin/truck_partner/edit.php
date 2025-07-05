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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Truck Partner</a> <span class="divider">/</span></li><li class="active">Edit Truck Partner</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">Edit Truck Partner</div>
      </div>

       <?php
          $pid=$_REQUEST['pid'];
          $getdata="select * from tbl_truck_partner where id=$pid";  
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
                                <label class="control-label" for="firstname">Company Name <span class="mandatory">*</span> </label>
                                <div class="controls">
                                    <input type="text" name="company_name" class="input-large" placeholder="Company Name" id="company_name" value="<?php echo $rown['company_name']?>">
                                    <div id="company_name_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="lastname">Email</label>
                                <div class="controls">
                                    <input type="text" name="email" class="input-large" placeholder="Email" id="email" value="<?php echo $rown['email']?>">
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
                                    <input type="text" name="contact_person" class="input-large" placeholder="Contact Person" id="contact_person" value="<?php echo $rown['contact_person']?>" >
                                    <div id="contact_person_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="email">Contact Person Phone Number</label>
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
                                    <input type="text" name="contact_person_phone" class="input-large" placeholder="Contact Person Phone Number" id="contact_person_phone" value="<?php echo $rown['contact_person_phone']?>">
                                    <div id="contact_person_phone_error" class="error_msg"></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                       
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="confirm_password">Company Type <span class="mandatory">*</span></label>
                                <div class="controls">
                                    <select name="company_type" id="company_type" class="input-large" value="">
                                        <option value="" selected="selected">Select Company Type</option>
                                        <option value="1" <?php if($rown['company_type'] == 1){ echo "selected"; } ?>>Partner</option>
                                        <option value="2" <?php if($rown['company_type'] == 2){ echo "selected"; } ?>>Corporation</option>
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

                                    <div class="controls1">
                                      <?php if($rown['business_permit_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['business_permit_doc']);
                                          $path_extension = $path_info['extension'];

                                          
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['business_permit_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['business_permit_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['business_permit_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['business_permit_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">BIR</label>
                                <div class="controls">
                                   <input type="file" name="bir_doc" id="bir_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                   
                                   <div class="controls1">
                                    <?php if($rown['bir_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['bir_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bir_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bir_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['bir_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bir_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">COR</label>
                                <div class="controls">
                                    <input type="file" name="cor_doc" id="cor_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                    <div class="controls1">
                                      <?php if($rown['cor_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['cor_doc']);
                                          $path_extension = $path_info['extension'];

                                         
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['cor_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['cor_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['cor_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['cor_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">LTFRB Franchise Certificate</label>
                                <div class="controls">
                                   <input type="file" name="ltfrb_doc" id="ltfrb_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                   <div class="controls1">
                                    <?php if($rown['ltfrb_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['ltfrb_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ltfrb_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ltfrb_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['ltfrb_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ltfrb_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">PPA</label>
                                <div class="controls">
                                    <input type="file" name="ppa_doc" id="ppa_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                    
                                    <div class="controls1">
                                      <?php if($rown['ppa_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['ppa_doc']);
                                          $path_extension = $path_info['extension'];

                                         
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ppa_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ppa_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['ppa_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ppa_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Memebership from CTAP</label>
                                <div class="controls">
                                   <input type="file" name="ctap_doc" id="ctap_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                   <div class="controls1">
                                    <?php if($rown['ctap_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['ctap_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ctap_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ctap_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['ctap_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['ctap_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">ACTO</label>
                                <div class="controls">
                                    <input type="file" name="acto_doc" id="acto_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                      <?php if($rown['acto_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['acto_doc']);
                                          $path_extension = $path_info['extension'];

                                          
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['acto_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['acto_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['acto_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['acto_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Mayors Permit</label>
                                <div class="controls">
                                   <input type="file" name="mayors_permit_doc" id="mayors_permit_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                   <div class="controls1">
                                    <?php if($rown['mayors_permit_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['mayors_permit_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['mayors_permit_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['mayors_permit_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['mayors_permit_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['mayors_permit_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">SEC Certificate</label>
                                <div class="controls">
                                    <input type="file" name="sec_certificate_doc" id="sec_certificate_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                    <?php if($rown['sec_certificate_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['sec_certificate_doc']);
                                        $path_extension = $path_info['extension'];

                                       
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['sec_certificate_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['sec_certificate_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['sec_certificate_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['sec_certificate_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Articles of Incorporation</label>
                                <div class="controls">
                                   <input type="file" name="articles_of_incorporation_doc" id="articles_of_incorporation_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">
                                  
                                  <div class="controls1">
                                    <?php if($rown['articles_of_incorporation_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['articles_of_incorporation_doc']);
                                        $path_extension = $path_info['extension'];

                                       
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['articles_of_incorporation_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['articles_of_incorporation_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['articles_of_incorporation_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['articles_of_incorporation_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Inland Marine Insurance</label>
                                <div class="controls">
                                    <input type="file" name="inland_marine_insurance_doc" id="inland_marine_insurance_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                      <?php if($rown['inland_marine_insurance_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['inland_marine_insurance_doc']);
                                          $path_extension = $path_info['extension'];

                                          
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['inland_marine_insurance_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['inland_marine_insurance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['inland_marine_insurance_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['inland_marine_insurance_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">OC/CR</label>
                                <div class="controls">
                                   <input type="file" name="oc_cr_doc" id="oc_cr_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                   <div class="controls1">
                                      <?php if($rown['oc_cr_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['oc_cr_doc']);
                                          $path_extension = $path_info['extension'];

                                         
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['oc_cr_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['oc_cr_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['oc_cr_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['oc_cr_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">PA/CPC</label>
                                <div class="controls">
                                    <input type="file" name="pa_cpc_doc" id="pa_cpc_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                    <?php if($rown['pa_cpc_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['pa_cpc_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['pa_cpc_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['pa_cpc_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['pa_cpc_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['pa_cpc_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Deed of Sale</label>
                                <div class="controls">
                                   <input type="file" name="deed_of_sale_doc" id="deed_of_sale_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                   <div class="controls1">
                                    <?php if($rown['deed_of_sale_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['deed_of_sale_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['deed_of_sale_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['deed_of_sale_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['deed_of_sale_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['deed_of_sale_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Bank Certificate 1</label>
                                <div class="controls">
                                    <input type="file" name="bank_certificate1_doc" id="bank_certificate1_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                     <div class="controls1">
                                      <?php if($rown['bank_certificate1_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['bank_certificate1_doc']);
                                          $path_extension = $path_info['extension'];

                                          if($rown['bank_certificate1_doc_status'] == '0'){
                                            $color_status = 'red_border';
                                            $icon_status_chk = 'fa fa-times red_icon';
                                          }else{
                                            $color_status = 'green_border';
                                            $icon_status_chk = 'fa fa-check green_icon';
                                          }
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate1_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate1_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate1_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate1_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Bank Certificate 2</label>
                                <div class="controls">
                                    <input type="file" name="bank_certificate2_doc" id="bank_certificate2_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                      <?php if($rown['bank_certificate2_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['bank_certificate2_doc']);
                                          $path_extension = $path_info['extension'];

                                          
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate2_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate2_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate2_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['bank_certificate2_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">FS Past 2Yrs</label>
                                <div class="controls">
                                    <input type="file" name="fs_past_2yrs_doc" id="fs_past_2yrs_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                     <div class="controls1">
                                      <?php if($rown['fs_past_2yrs_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['fs_past_2yrs_doc']);
                                          $path_extension = $path_info['extension'];

                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['fs_past_2yrs_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['fs_past_2yrs_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['fs_past_2yrs_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['fs_past_2yrs_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">GPS Device</label>
                                <div class="controls">
                                    <input type="file" name="gps_device_doc" id="gps_device_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                      <?php if($rown['gps_device_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['gps_device_doc']);
                                          $path_extension = $path_info['extension'];

                                         
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['gps_device_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['gps_device_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['gps_device_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['gps_device_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Organizational Chart</label>
                                <div class="controls">
                                    <input type="file" name="organizational_chart_doc" id="organizational_chart_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data">

                                    <div class="controls1">
                                      <?php if($rown['organizational_chart_doc']){ ?>
                                        <?php 

                                          $path_info = pathinfo($rown['organizational_chart_doc']);
                                          $path_extension = $path_info['extension'];

                                        
                                        ?>
                                        <?php if($path_extension == 'docx'){ ?>
                                          
                                          <a class ="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['organizational_chart_doc']?>" target="_blank">
                                            <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 

                                        <?php } ?>

                                        <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['organizational_chart_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/documents/<?php echo $rown['organizational_chart_doc']?>">
                                            <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                          </a> 
                                        <?php } ?>

                                        <?php if(($path_extension == 'pdf')){ ?>
                                          <a class="img_hyper" href="<?php echo $base_url ?>/documents/<?php echo $rown['organizational_chart_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                      
                           <input type="button" name="add_makes" value="Update" class="btn btn-primary" onclick="submitDetailsForm()">
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
      var company_name = $("#company_name").val();
      var email = $("#email").val();
      var contact_person = $("#contact_person").val();
      
      var contact_person_phone = $("#contact_person_phone").val();
      
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
     
      
        if(error == 1){

            $.ajax({
                url: '<?php echo $base_url ?>/truck_partner/check_edit_exist.php',
                type: 'post',
                data: {
                  email: email,
                  contact_person_phone: contact_person_phone,
                  table_name: 'tbl_truck_partner',
                  pid: '<?php echo $pid; ?>',
                  
                },
                success: function(response) {
                  // alert(response);
                  
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