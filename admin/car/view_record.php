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
            <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li><a href="#">Car</a> <span class="divider">/</span></li><li class="active">View Car</li>
          </ul>
        </div>
      </div>
    </div>
  
    <div class="row-fluid">
    <!-- block -->
    <div class="block">
      <div class="navbar navbar-inner block-header">
        <div class="muted pull-left">View Car</div>

        <?php
          $pid=$_REQUEST['pid'];
          $getdata="select * from tbl_car where id=$pid";  
          $gdata=mysqli_query($connect,$getdata);
          $rown=mysqli_fetch_array($gdata);
          $pid = $rown['id'];

          // $country_id = $rown['country_id'];
          // $state_id = $rown['state_id'];
          // $city_id = $rown['city_id'];

          $make_id = $rown['make'];
          $model_id = $rown['model'];

          // $getdata_cty="select * from tbl_countries where id=$country_id";  
          // $gdata_cty=mysqli_query($connect,$getdata_cty);
          // $rown_cty=mysqli_fetch_array($gdata_cty);
          // // $pid = $rown['id'];

          // $countrycode = $rown_cty['country_code'];
        ?>    


      </div>
        <div class="block-content collapse in">
            <div class="span12">
                <form action="update.php" method="post" id="update_form" name="update_form" class="form-horizontal" enctype="multipart/form-data" accept-charset="utf-8">
                    
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Car Owner </label>
                                <div class="controls">
                                    <select  name="car_owner_id" class="form-control" id="car_owner_id" required="required">
                                      <option value="">--Select Car Owner--</option> 
                                      <?php 
                                       $query="SELECT * FROM tbl_users WHERE status='1' and role='car_owner' ";
                                      $results = mysqli_query($connect, $query);
                                      foreach ($results as $car_owner_list){
                                      ?>
                                      <option value="<?php echo $car_owner_list["id"];?>" <?php if($car_owner_list["id"] == $rown['car_owner_id']){ echo "selected"; } ?>><?php echo $car_owner_list["f_name"];?> <?php echo $car_owner_list["l_name"];?></option> 
                                      <?php } ?>
                                    </select>
                                     <div id="car_owner_id_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>

                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Brand </label>
                              <div class="controls">
                                  <input type="text" class="input-large" value="<?php echo $rown['brand'] ?>">
                                  
                              </div>
                          </div>
                        </div>
                    </div>
                   
                    <div class="row-fluid">
                       <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Model </label>
                              <div class="controls">
                                  <input type="text" class="input-large"   value="<?php echo $rown['model'] ?>">
                                   
                              </div>
                          </div>
                        </div>

                        <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">Car Type </label>
                                <div class="controls">
                                    <input type="text" class="input-large" name="brand" id="brand" placeholder="Enter Brand name" value="<?php echo $rown['car_type'] ?>">
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>

                   

                    <div class="row-fluid">
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">Fuel Type </label>
                                <div class="controls">
                                    <select  name="fuel_type" class="form-control" id="fuel_type" required="required">
                                      <option value="">--Select Fuel Type--</option> 
                                      <option value="Petrol" <?php if($rown['fuel_type'] == 'Petrol'){ echo "selected"; } ?>>Petrol</option>
                                      <option value="Diesel" <?php if($rown['fuel_type'] == 'Diesel'){ echo "selected"; } ?>>Diesel</option>
                                      <option value="Hybrid" <?php if($rown['fuel_type'] == 'Hybrid'){ echo "selected"; } ?>>Hybrid</option>
                                    </select>
                                    <div id="fuel_type_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>
                         <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="password">Year </label>
                                <div class="controls">
                                    <input type="text" name="year" value="<?php echo $rown['year'] ?>" class="input-large" placeholder="year" id="Year" >
                                    <!-- <div id="year_error" class="error_msg"></div> -->
                                    <!-- <div class="error" id="password_error"></div> -->
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>

                    <div class="row-fluid">
                       
                         <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Interior Color</label>
                              <div class="controls">
                                <input type="text" name="interior_color" value="<?php echo $rown['interior_color'] ?>" class="input-large" placeholder="Interior Color" id="interior_color" >
 
                              </div>
                          </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                              <label class="control-label" for="focusedInput">Exterior Color</label>
                              <div class="controls">
                                <input type="text" name="exterior_color" value="<?php echo $rown['exterior_color'] ?>" class="input-large" placeholder="Exterior Color" id="exterior_color" >

                                  
                              </div>
                          </div>
                        </div>
                        
                    </div>

                    <div class="row-fluid">
                       <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="focusedInput">Transmission </label>
                                <div class="controls">
                                    <select  name="transmission" class="form-control" id="transmission" required="required">
                                      <option value="">--Select Transmission Type--</option> 
                                      <option value="Manual" <?php if($rown['transmission'] == 'Manual'){ echo "selected"; } ?>>Manual</option>
                                      <option value="Auto" <?php if($rown['transmission'] == 'Auto'){ echo "selected"; } ?>>Auto</option>
                                    </select>
                                    <div id="transmission_error" class="error_msg"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">VIN </label>
                                <div class="controls">
                                    <input type="text" name="vin" value="<?php echo $rown['vin'] ?>" class="input-large" placeholder="vin" id="vin" >
                                    <!-- <div id="vin_error" class="error_msg"></div> -->
                                    <!-- <div id="vehicle_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row-fluid">
                      
                        <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">Mileage </label>
                                <div class="controls">
                                    <input type="text" name="mileage" value="<?php echo $rown['mileage'] ?>" class="input-large" placeholder="Mileage" id="mileage" >
                                    <div id="mileage_error" class="error_msg"></div>
                                    <!-- <div id="vehicle_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">No Of Seats </label>
                                <div class="controls">
                                    <input type="number" name="seating_capacity" value="<?php echo $rown['seating_capacity'] ?>" class="input-large" placeholder="No Of Seats" id="seating_capacity"  >
                                    <div id="mileage_error" class="error_msg"></div>
                                    <!-- <div id="vehicle_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row-fluid">
                      
                        <div class="span12">
                             <div class="control-group">
                                <label class="control-label" for="focusedInput">About Car</label>
                                <div class="controls">
                                  <textarea name="description" value="" class="input-large" placeholder="description" id="description" style="width: 98%" rows="5" ><?php echo $rown['description'] ?></textarea>
                                  
                                    <!-- <div id="mileage_error" class="error_msg"></div> -->
                                    <!-- <div id="vehicle_type_error" class="error_msg"></div> -->
                                </div>
                            </div>
                        </div>
                        
                    </div>


                    <hr>

                    



                    <hr>

                    <h5>Upload Vechile Photo:(Upload only png,jpg,jpeg formate) Max. 5 MB size)</h5>
                    
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">Rear View</label>
                                <div class="controls">
                                    <!-- <input type="file" name="rear_view_image" id="rear_view_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data"> -->

                                    <div class="controls1">
                                    <?php if($rown['rear_view_image']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['rear_view_image']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['rear_view_image']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['rear_view_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['rear_view_image']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['rear_view_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Front View</label>
                                <div class="controls">
                                   <!-- <input type="file" name="front_view_image" id="front_view_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data"> -->
                                   <div class="controls1">
                                    <?php if($rown['front_view_image']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['front_view_image']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['front_view_image']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['front_view_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['front_view_image']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['front_view_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Right Side</label>
                                <div class="controls">
                                   <!--  <input type="file" name="right_side_image" id="right_side_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data"> -->
                                    <div class="controls1">
                                    <?php if($rown['right_side_image']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['right_side_image']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['right_side_image']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['right_side_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['right_side_image']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['right_side_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">left Side</label>
                                <div class="controls">
                                   <!-- <input type="file" name="left_side_image" id="left_side_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data"> -->
                                   <div class="controls1">
                                    <?php if($rown['left_side_image']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['left_side_image']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['left_side_image']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['left_side_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['left_side_image']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['left_side_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Interior</label>
                                <div class="controls">
                                    <!-- <input type="file" name="interior_image" id="interior_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data"> -->

                                    <div class="controls1">
                                    <?php if($rown['interior_image']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['interior_image']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['interior_image']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['interior_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['interior_image']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['interior_image']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Insurence</label>
                                <div class="controls">
                                    <!-- <input type="file" name="interior_image" id="interior_image" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data"> -->

                                    <div class="controls1">
                                    <?php if($rown['insurence']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['insurence']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['insurence']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['insurence']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['insurence']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['insurence']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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

                    <hr>

                    <h5>Upload Vechile Documents:(Upload only (image,Pdf,Docx) Max. 5 MB size)</h5>
                    
                    <div class="row-fluid">
                        <!-- <h4>Business Permit:</h4> -->
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="photo">OR/CR</label>
                                <div class="controls">
<!--                                     <input type="file" name="or_cr_doc" id="or_cr_doc" class="input-large" accept="image/jpeg,image/jpg,image/png,application/pdf,.docx" enctype="multipart/form-data"> -->
                                    <div class="controls1">
                                    <?php if($rown['or_cr_doc']){ ?>
                                      <?php 

                                        $path_info = pathinfo($rown['or_cr_doc']);
                                        $path_extension = $path_info['extension'];

                                        
                                      ?>
                                      <?php if($path_extension == 'docx'){ ?>
                                        
                                        <a class ="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['or_cr_doc']?>" target="_blank">
                                          <img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/docx.png">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 

                                      <?php } ?>

                                      <?php if(($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['or_cr_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $image_url ?>/<?php echo $rown['or_cr_doc']?>">
                                          <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                                        </a> 
                                      <?php } ?>

                                      <?php if(($path_extension == 'pdf')){ ?>
                                        <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['or_cr_doc']?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src ="<?php echo $base_url ?>/assets/img/pdf.png">
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
                                <label class="control-label" for="photo">Car Video 
                                  <!-- <span style="color: red;font-size: 12px;margin-left: 10px;">(Upload Video only mp4,mov,3gp,ogg -  Max 5 MB Uploaded)</span> -->
                                </label>
                                <div class="controls">
<!--                                    <input type="file" name="car_video" id="car_video" class="input-large" accept=".ogg, .mp4, .mov,.3gp" > -->

                                   <?php if($rown['car_video']) { ?>
                                      <div class="preview_img_dv_banner" >
                                        <video src="../documents/<?php echo $rown['car_video']; ?>" autoplay="false" muted width="50px" height="50px"></video>
                                        <!-- <img class="preview_img" src="../../../banner_image/<?=$rown['image']?>"> -->
                                      </div>
                                  <?php } ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    

                    <!-- <div class="span12">
                        <div class="form-actions submit-form-left-pad">
                          <input type="hidden" id="pid" name="pid" value='<?php echo $pid; ?>' >
                            <input type="button" name="add_driver" id="add_driver" value="Update Car" class="btn btn-primary" id="submit_button" onclick="submitDetailsForm()">
                           
                        </div>
                    </div> -->

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


  $(document).ready(function(){
    var country_id = '<?php echo $country_id;  ?>';
    var state_id = '<?php echo $state_id;  ?>';
    var city_id = '<?php echo $city_id;  ?>';
    var countrycode = '<?php echo $countrycode;  ?>';

    var make_id = '<?php echo $make_id;  ?>';
    var model_id = '<?php echo $model_id;  ?>';

    fetchStatesEdit(country_id,state_id);
    fetchCityEdit(state_id,city_id);
    fetchmodelEdit(make_id,model_id);
    initMap(countrycode);
});


function fetchmodelEdit(make_id,model_id){

  if(make_id>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_model_edit.php",
        method:"POST",
        data:{make_id:make_id,model_id:model_id},
                
         success:function(data)
         {
          // console.log(data);
          $('#car_model').html('');
          $('#car_model').html(data);
          
         }
        });
    }

}


function fetchStatesEdit(country_id,state_id){
 
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_state_edit.php",
        method:"POST",
        data:{country_id:country_id,state_id:state_id},
                
         success:function(data)
         {
          // console.log(data);
          $('#state_details').html('');
          $('#state_details').html(data);
          
         }
    });
}

function fetchCityEdit(state_id,city_id){
 
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_city_edit.php",
        method:"POST",
        data:{city_id:city_id,state_id:state_id},
                
         success:function(data)
         {
          // console.log(data);
          $('#city_details').html('');
          $('#city_details').html(data);
          fetchAddress();
          
         }
    });
}





  function submitDetailsForm() {

       // $("#update_form").submit();

      var error = 1;
      var car_owner_id = $("#car_owner_id").val();
      var country_id = $("#country_id").val();
      var car_location_new = $("#car_location_new").val();
      // var car_address = $("#car_address").val();
      var vehicle_type = $("#vehicle_type").val();
      var fuel_type = $("#fuel_type").val();
      var make = $("#make").val();
      var model = $("#model").val();
      var year = $("#year").val();
      var transmission = $("#transmission").val();
      var vin = $("#vin").val();
      var mileage = $("#mileage").val();
      var seating_capacity = $("#seating_capacity").val();
     
      
      if((car_owner_id == '') || (car_owner_id == undefined)){
        $("#car_owner_id_error").text("This field are required");
        error = 0;
      }else{
        $("#car_owner_id_error").text("");
      }

      if((country_id == '') || (country_id == undefined)){
        $("#country_id_error").text("This field are required");
        error = 0;
      }else{
        $("#country_id_error").text("");
      }

      if((car_location_new == '') || (car_location_new == undefined)){
        $("#car_location_new_error").text("This field are required");
        error = 0;
      }else{
        $("#car_location_new_error").text("");
      }

      // if((car_address == '') || (car_address == undefined)){
      //   $("#car_address_error").text("This field are required");
      //   error = 0;
      // }else{
      //   $("#car_address_error").text("");
      // }

      if((vehicle_type == '') || (vehicle_type == undefined)){
        $("#vehicle_type_error").text("This field are required");
        error = 0;
      }else{
        $("#vehicle_type_error").text("");
      }

      if((fuel_type == '') || (fuel_type == undefined)){
        $("#fuel_type_error").text("This field are required");
        error = 0;
      }else{
        $("#fuel_type_error").text("");
      }

      if((make == '') || (make == undefined)){
        $("#make_error").text("This field are required");
        error = 0;
      }else{
        $("#make_error").text("");
      }

     

      if((transmission == '') || (transmission == undefined)){
        $("#transmission_error").text("This field are required");
        error = 0;
      }else{
        $("#transmission_error").text("");
      }

      

      if((mileage == '') || (mileage == undefined)){
        $("#mileage_error").text("This field are required");
        error = 0;
      }else{
        $("#mileage_error").text("");
      }

      if((seating_capacity == '') || (seating_capacity == undefined)){
        $("#seating_capacity_error").text("This field are required");
        error = 0;
      }else{
        $("#seating_capacity_error").text("");
      }

      if(error == 1){

          $("#update_form").submit();
        }else{
          window.scrollTo(500, 0);
         
      }
  }



function fetchStates(cid){

  var country_name = $("#country_id").val();
  var country_id =  country_name.slice(0, country_name.indexOf(','));

  if(country_name!=""){
    var countrycode = country_name.split(',').pop();
   
    if(countrycode!=""){
      countrycode = countrycode.toLowerCase().trim();
      initMap(countrycode);
      
    }
  }

  
  if(country_id>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_state.php",
        method:"POST",
        data:{country_id:country_id},
                
         success:function(data)
         {
          // console.log(data);
          $('#state_details').html('');
          $('#state_details').html(data);
          
         }
        });
    }
}

function fetchCity(sid){
  if(sid>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_city.php",
        method:"POST",
        data:{state_id:sid},
                
         success:function(data)
         {
          // console.log(data);
          $('#city_details').html('');
          $('#city_details').html(data);

          
         }
        });
    }
}


function fetchmodel(make_id){

  if(make_id>0)
    {
     $.ajax({
         url:"<?php echo $base_url ?>/car/fetch_model.php",
        method:"POST",
        data:{make_id:make_id},
                
         success:function(data)
         {
          // console.log(data);
          $('#car_model').html('');
          $('#car_model').html(data);
          
         }
        });
    }

}

function fetchAddress(){
  $('#car_location_dv').css('display','block');
}
</script>

<script type="text/javascript" src="https://maps.google.com/maps/api/js?key=<?php echo $GOOGLE_MAP_RIDER_KEY; ?>&libraries=places"></script>
<script type="text/javascript">


function initMap(countrycode)
{
 
  var input = document.getElementById("car_location_new");
  
  var options = { componentRestrictions: { country: countrycode } };
  var autocomplete = new google.maps.places.Autocomplete(input, options);
  autocompleteListener = google.maps.event.addListener(autocomplete, 'place_changed', function() {
  var place = autocomplete.getPlace();
  console.log(place);
   var lat = place.geometry.location.lat();
   var lng = place.geometry.location.lng();

   // var city_name = place.name;
   var place_id = place.place_id;
   var map_url = place.url;
   var formatted_address = place.formatted_address;
    
    $('#lat').val(lat);
    $('#lng').val(lng);
    $('#formatted_address').val(formatted_address);
    $('#place_id').val(place_id);
    $('#map_url').val(map_url);
    // $('#submit_button').prop('disabled', false);

    
    
  });
}

</script>         
