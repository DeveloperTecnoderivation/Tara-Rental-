
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active">View Truck Driver Details</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Truck Driver Details </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/truck_driver/view.php"><button class="btn btn-warning"><i class="fa fa-arrow-left icon-white"></i> Back</button></a>
                  </div>
                </div>
                <br>

                <?php
                  $pid=$_REQUEST['pid'];
                  $getdata="select * from tbl_users where id=$pid";  
                  $gdata=mysqli_query($connect,$getdata);
                  $rown=mysqli_fetch_array($gdata);
                ?>    
              <h3>Truck Driver Details</h3>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">First Name</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['f_name']?>" class="input-xlarge focused" >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Last Name</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['l_name']?>" class="input-xlarge focused" >
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
                        <label class="control-label" for="focusedInput"> Phone Number</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['phone']?>" class="input-xlarge focused" >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Refrence Number</label>
                        <div class="controls">
                          <select  name="truck_refrence_number" class="form-control" id="truck_refrence_number"  style="width: 85%">
                            <option value="+65">--Select Truck Refrence Number--</option> 
                            <?php 
                            $query="SELECT * FROM tbl_users WHERE role='truck_partner' ";
                            $results = mysqli_query($connect, $query);
                            foreach ($results as $country_list){

                              // print_r($country_list);
                            ?>
                            <option value="<?php echo $country_list["refrence_number"];?>" <?php if($rown['truck_refrence_number'] == $country_list["refrence_number"]){ echo "selected"; }?>><?php echo $country_list["refrence_number"];?></option> 
                            <?php } ?>
                          </select>

                          <!-- <input type="text"  value="<?php echo $rown['truck_refrence_number']?>" class="input-xlarge focused" > -->
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span12"><h3>Documents</h3></div>
              <!-- <h3>Documents</h3> -->
               
              <div class="span6">
                
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Driver license </label>
                        <div class="controls">
                          <?php if($rown['driver_licence']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['driver_licence']);
                              $path_extension = $path_info['extension'];

                              if($rown['driver_licence_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['driver_licence']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['driver_licence']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['driver_licence']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['driver_licence']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>
                            
                            
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Valid Goverment Id </label>
                        <div class="controls">
                          <?php if($rown['valid_govt_id']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['valid_govt_id']);
                              $path_extension = $path_info['extension'];

                              if($rown['valid_govt_id_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>
                            
                            
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Company Id </label>
                        <div class="controls">
                          <?php if($rown['company_id']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['company_id']);
                              $path_extension = $path_info['extension'];

                              if($rown['company_id_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['company_id']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['company_id']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['company_id']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['company_id']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>
                            
                            
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Bio Data </label>
                        <div class="controls">
                          <?php if($rown['bio_data']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['bio_data']);
                              $path_extension = $path_info['extension'];

                              if($rown['bio_data_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bio_data']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bio_data']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['bio_data']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bio_data']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>
                            
                            
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Drug Test Result </label>
                        <div class="controls">
                          <?php if($rown['drug_text_result']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['drug_text_result']);
                              $path_extension = $path_info['extension'];

                              if($rown['drug_text_result_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['drug_text_result']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['drug_text_result']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['drug_text_result']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['drug_text_result']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
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
                        <label class="control-label" for="focusedInput">NBI Clearance </label>
                        <div class="controls">
                          <?php if($rown['nbi_clearance']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['nbi_clearance']);
                              $path_extension = $path_info['extension'];

                              if($rown['nbi_clearance_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                             <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                            </a> 
                            <?php } ?>
                            
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Police Clearance </label>
                        <div class="controls">
                          <?php if($rown['police_clearance']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['police_clearance']);
                              $path_extension = $path_info['extension'];

                              if($rown['police_clearance_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['police_clearance']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['police_clearance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['police_clearance']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['police_clearance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>
                            
                            
                            
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Personal Accident Insurance </label>
                        <div class="controls">
                          <?php if($rown['personal_accident_insurance']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['personal_accident_insurance']);
                              $path_extension = $path_info['extension'];

                              if($rown['personal_accident_insurance_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>
                            
                           
                          <?php } else { ?> 
                           <div class="no_document" style="color: red"> No Decuments....</div>
                          <?php } ?> 
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Vacination Card </label>
                        <div class="controls">
                          <?php if($rown['vacination_card']){ ?>
                            <?php 

                              $path_info = pathinfo($rown['vacination_card']);
                              $path_extension = $path_info['extension'];

                              if($rown['vacination_card_status'] == '0'){
                                $color_status = 'red_border';
                                $icon_status_chk = 'fa fa-times red_icon';
                              }else{
                                $color_status = 'green_border';
                                $icon_status_chk = 'fa fa-check green_icon';
                              }
                            ?>
                            <?php if($path_extension == 'docx'){ ?>
                              
                              <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['vacination_card']?>" target="_blank">
                                <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 

                            <?php } ?>

                            <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['vacination_card']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['vacination_card']?>">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
                            <?php } ?>

                            <?php if(($path_extension == 'pdf')){ ?>
                              <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['vacination_card']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
                               <!--  <i class="icon_status <?php echo $icon_status_chk ?>"></i> -->
                              </a> 
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
