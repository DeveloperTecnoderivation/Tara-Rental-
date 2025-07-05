
<?php 
include("../conn-web/cw.php");
  if(!$_SESSION["tata_login_username"]){
  header('Location:index.php'); 
}
include "../header.php";
?>

    <div class="span9" id="content">
        <div class="row-fluid">
          <div class="navbar">
            <div class="navbar-inner">
              <ul class="breadcrumb">
                <i class="fa fa-angle-left hide-sidebar"><a href="#" title="Hide Sidebar" rel="tooltip">&nbsp;</a></i>
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active">View Truck Partner Details</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Truck Partner Details </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/truck_partner/view.php"><button class="btn btn-warning"><i class="fa fa-arrow-left icon-white"></i> Back</button></a>
                  </div>
                </div>
                <br>

                <?php
                  $pid=$_REQUEST['pid'];
                  $getdata="select * from tbl_users where id=$pid";  
                  $gdata=mysqli_query($connect,$getdata);
                  $rown=mysqli_fetch_array($gdata);
                  

                     
              ?>    
              <h3>Truck Partner Details</h3>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Company Name</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['company_name']?>" class="input-xlarge focused" >
                        </div>
                      </div>
                        
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Email</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['email']?>" class="input-xlarge focused" >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Contact Person</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['contact_person']?>" class="input-xlarge focused" >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Contact Person Phone</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['contact_person_phone_mobile_code']?><?php echo $rown['contact_person_phone']?>" class="input-xlarge focused" >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Refrence Number</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['refrence_number']?>" class="input-xlarge focused" >
                        </div>
                      </div>
                    </fieldset>
                </div>
              <h3>Documents</h3>
               
              <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Business Permit Doc </label>
                        <div class="controls">
                          <?php if($rown['business_permit']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['business_permit']);
                              $path_extension = $path_info['extension'];

                            
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['business_permit']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['business_permit']?>" target="_blank"><img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $rown['business_permit']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['business_permit']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">COR Doc </label>
                        <div class="controls">
                          <?php if($rown['cor']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['cor']);
                              $path_extension = $path_info['extension'];

                             
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['cor']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['cor']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['cor']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['cor']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['cor_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=cor_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=cor_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">PPA Doc </label>
                        <div class="controls">
                          <?php if($rown['ppa']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['ppa']);
                              $path_extension = $path_info['extension'];

                             
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['ppa']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['ppa']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['ppa']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['ppa']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['ppa_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ppa_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ppa_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Memebership from CTAP </label>
                        <div class="controls">
                          <?php if($rown['membership_from_ctap']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['membership_from_ctap']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['membership_from_ctap']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['membership_from_ctap']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['membership_from_ctap']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['membership_from_ctap']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['membership_from_ctap_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=membership_from_ctap_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=membership_from_ctap_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">ACTO Doc </label>
                        <div class="controls">
                          <?php if($rown['acto']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['acto']);
                              $path_extension = $path_info['extension'];

                             
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['acto']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['acto']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['acto']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['acto']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['acto_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=acto_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=acto_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Mayors Permit Doc </label>
                        <div class="controls">
                          <?php if($rown['mayors_permit']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['mayors_permit']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['mayors_permit']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['mayors_permit']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['mayors_permit']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['mayors_permit']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['mayors_permit_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=mayors_permit_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=mayors_permit_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">SEC Certificate Doc </label>
                        <div class="controls">
                          <?php if($rown['sec_certificate']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['sec_certificate']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['sec_certificate']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['sec_certificate']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['sec_certificate']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['sec_certificate']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['sec_certificate_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=sec_certificate_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=sec_certificate_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                             -->
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Bank Certificate 1 Doc </label>
                        <div class="controls">
                          <?php if($rown['bank_certificate']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['bank_certificate']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bank_certificate']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bank_certificate']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['bank_certificate']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bank_certificate']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['bank_certificate_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bank_certificate_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bank_certificate_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                     

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">FS Past 2Yrs Doc </label>
                        <div class="controls">
                          <?php if($rown['fs_past_2year']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['fs_past_2year']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['fs_past_2year']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['fs_past_2year']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['fs_past_2year']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['fs_past_2year']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['fs_past_2year_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=fs_past_2year_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=fs_past_2year_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>
                      
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">BIR Doc </label>
                        <div class="controls">
                          <?php if($rown['bir']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['bir']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bir']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bir']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['bir']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bir']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                              
                            </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['bir_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bir_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bir_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">LTFRB Franchise Certificate </label>
                        <div class="controls">
                          <?php if($rown['ltfrb_franchise_certificate']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['ltfrb_franchise_certificate']);
                              $path_extension = $path_info['extension'];

                             
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['ltfrb_franchise_certificate']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['ltfrb_franchise_certificate']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['ltfrb_franchise_certificate']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['ltfrb_franchise_certificate']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['ltfrb_franchise_certificate_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ltfrb_franchise_certificate_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ltfrb_franchise_certificate_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Articles of Incorporation </label>
                        <div class="controls">
                          <?php if($rown['articles_of_incorporation']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['articles_of_incorporation']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['articles_of_incorporation']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['articles_of_incorporation']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['articles_of_incorporation']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['articles_of_incorporation']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['articles_of_incorporation_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=articles_of_incorporation_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=articles_of_incorporation_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Inland Marine Insurance </label>
                        <div class="controls">
                          <?php if($rown['inland_marine_insurance']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['inland_marine_insurance']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['inland_marine_insurance']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['inland_marine_insurance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['inland_marine_insurance']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['inland_marine_insurance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['inland_marine_insurance_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=inland_marine_insurance_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=inland_marine_insurance_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">OC/CR Doc </label>
                        <div class="controls">
                          <?php if($rown['oc_cr']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['oc_cr']);
                              $path_extension = $path_info['extension'];

                             
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['oc_cr']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['oc_cr']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['oc_cr']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['oc_cr']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">PA/CPC </label>
                        <div class="controls">
                          <?php if($rown['pa_cpc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['pa_cpc']);
                              $path_extension = $path_info['extension'];

                             
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['pa_cpc']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['pa_cpc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['pa_cpc']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['pa_cpc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['pa_cpc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=pa_cpc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=pa_cpc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Deed of Sale</label>
                        <div class="controls">
                          <?php if($rown['deed_of_sale']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['deed_of_sale']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['deed_of_sale']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['deed_of_sale']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['deed_of_sale']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['deed_of_sale']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                           <!--  <?php if($rown['deed_of_sale_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=deed_of_sale_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=deed_of_sale_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>



                      <div class="control-group">
                        <label class="control-label" for="focusedInput">GPS Device</label>
                        <div class="controls">
                          <?php if($rown['gps_device']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['gps_device']);
                              $path_extension = $path_info['extension'];

                             
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['gps_device']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['gps_device']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['gps_device']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['gps_device']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['gps_device_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=gps_device_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=gps_device_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Organizational Chart</label>
                        <div class="controls">
                          <?php if($rown['organizational_chart']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['organizational_chart']);
                              $path_extension = $path_info['extension'];

                              
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['organizational_chart']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['organizational_chart']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['organizational_chart']?>">
                                
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['organizational_chart']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                                
                              </a> 
                            <?php } ?>
                            
                            <!-- <?php if($rown['organizational_chart_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=organizational_chart_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=organizational_chart_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?> -->
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>
                      

                    </fieldset>
                </div>
               
                
                  
              </div>
              
          </div>
          </div>
          <!-- /block -->
        </div>
    </div>
  </div>
</div>
<?php include "../footer.php";  ?>

<!-- <div id="viewRecordModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title">View Record</h4>
      </div>
      <div class="modal-body" id="partner_full_details">
        
      </div>
    
    </div>

  </div>
</div> -->



<script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
jQuery(document).ready(function($) {
    $('#tblUser').DataTable({
      "pageLength": 25
      });
});

// function viewRecord(id){
//   // alert(id);
//   $('#viewRecordModal').modal('show');
//   // $.ajax({
//   //       url:"ajax/view_order_details.php",
//   //       method:"POST",
//   //       data:{order_id:order_id},
//   //       success:function(data)
//   //       {
          
//   //         $('#viewOrderModal').modal('show');
//   //         $('#order_full_details').html('');
//   //         $('#order_full_details').html(data);
       
//   //       }
//   //    });

// }
</script>
