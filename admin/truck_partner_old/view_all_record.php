
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
                          <input type="text"  value="<?php echo $rown['phone']?>" class="input-xlarge focused" >
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

                              if($rown['business_permit_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['business_permit_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=business_permit_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=business_permit_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">COR Doc </label>
                        <div class="controls">
                          <?php if($rown['cor_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['cor_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['cor_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['cor_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=cor_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=cor_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">PPA Doc </label>
                        <div class="controls">
                          <?php if($rown['ppa_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['ppa_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['ppa_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['ppa_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ppa_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ppa_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Memebership from CTAP </label>
                        <div class="controls">
                          <?php if($rown['ctap_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['ctap_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['ctap_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['ctap_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ctap_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ctap_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">ACTO Doc </label>
                        <div class="controls">
                          <?php if($rown['acto_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['acto_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['acto_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['acto_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=acto_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=acto_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Mayors Permit Doc </label>
                        <div class="controls">
                          <?php if($rown['mayors_permit_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['mayors_permit_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['mayors_permit_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['mayors_permit_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=mayors_permit_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=mayors_permit_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">SEC Certificate Doc </label>
                        <div class="controls">
                          <?php if($rown['sec_certificate_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['sec_certificate_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['sec_certificate_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['sec_certificate_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=sec_certificate_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=sec_certificate_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Bank Certificate 1 Doc </label>
                        <div class="controls">
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
                            
                            <?php if($rown['bank_certificate1_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bank_certificate1_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bank_certificate1_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Bank Certificate 2 Doc </label>
                        <div class="controls">
                          <?php if($rown['bank_certificate2_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['bank_certificate2_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['bank_certificate2_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['bank_certificate2_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bank_certificate2_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bank_certificate2_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">FS Past 2Yrs Doc </label>
                        <div class="controls">
                          <?php if($rown['fs_past_2yrs_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['fs_past_2yrs_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['fs_past_2yrs_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['fs_past_2yrs_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=fs_past_2yrs_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=fs_past_2yrs_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
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
                          <?php if($rown['bir_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['bir_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['bir_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['bir_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bir_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=bir_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">LTFRB Franchise Certificate </label>
                        <div class="controls">
                          <?php if($rown['ltfrb_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['ltfrb_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['ltfrb_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['ltfrb_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ltfrb_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=ltfrb_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Articles of Incorporation </label>
                        <div class="controls">
                          <?php if($rown['articles_of_incorporation_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['articles_of_incorporation_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['articles_of_incorporation_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['articles_of_incorporation_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=articles_of_incorporation_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=articles_of_incorporation_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Inland Marine Insurance </label>
                        <div class="controls">
                          <?php if($rown['inland_marine_insurance_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['inland_marine_insurance_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['inland_marine_insurance_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['inland_marine_insurance_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=inland_marine_insurance_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=inland_marine_insurance_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">OC/CR Doc </label>
                        <div class="controls">
                          <?php if($rown['oc_cr_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['oc_cr_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['oc_cr_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['oc_cr_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=oc_cr_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=oc_cr_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">PA/CPC </label>
                        <div class="controls">
                          <?php if($rown['pa_cpc_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['pa_cpc_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['pa_cpc_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['pa_cpc_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=pa_cpc_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=pa_cpc_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Deed of Sale</label>
                        <div class="controls">
                          <?php if($rown['deed_of_sale_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['deed_of_sale_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['deed_of_sale_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['deed_of_sale_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=deed_of_sale_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=deed_of_sale_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>



                      <div class="control-group">
                        <label class="control-label" for="focusedInput">GPS Device</label>
                        <div class="controls">
                          <?php if($rown['gps_device_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['gps_device_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['gps_device_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['gps_device_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=gps_device_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=gps_device_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Organizational Chart</label>
                        <div class="controls">
                          <?php if($rown['organizational_chart_doc']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['organizational_chart_doc']);
                              $path_extension = $path_info['extension'];

                              if($rown['organizational_chart_doc_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
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
                            
                            <?php if($rown['organizational_chart_doc_status'] == '1'){ ?>
                            <a class="btn btn-success" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=organizational_chart_doc_status&status=0" onclick="return confirm('Are you sure Not Approve Document?')">Approved</a>
                            <?php }else{ ?>
                              <a class="btn btn-warning" href="<?php echo $base_url ?>/truck_partner/change_doc_status.php?id=<?php echo $rown['id'] ?>&key_name=organizational_chart_doc_status&status=1" onclick="return confirm('Are you sure Approve Document?')">Not Approved</a>
                            <?php } ?>
                            
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
