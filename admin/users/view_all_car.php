
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active">View Car Booking Details</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Car Booking Details </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/users/view_booking_cars.php"><button class="btn btn-warning"><i class="fa fa-arrow-left icon-white"></i> Back</button></a>
                  </div>
                </div>
                <br>

                <?php
                  $pid=$_REQUEST['pid'];
                  $getdata="select * from tbl_car_order_booking where id=$pid";  
                  $gdata=mysqli_query($connect,$getdata);
                  $rown=mysqli_fetch_array($gdata);
                  

                  $user_name = $rown['user_id']; 
                  $owner_name = $rown['car_owner_id']; 
                  $car_name = $rown['car_id']; 
                //   $driver_name = $rown['select_driver_id']; 
                //   $truck_partner_name = $rown['truck_partner_id']; 
                //   $chassis_type = $rown['trailer_chassis_type_id'];


                //   $data6="select * from tbl_chassis_trailer_type where id = $chassis_type";  
                //   $row6=mysqli_query($connect,$data6);
                //   $value6=mysqli_fetch_array($row6);
                //   $show6 = $value6['trailer_type'];

                  $data3="select * from tbl_users where id= $user_name";  
                  $row3=mysqli_query($connect,$data3);
                  $value3=mysqli_fetch_array($row3);
                  $show3 = $value3['f_name'];

                  $data4="select * from tbl_users where id= $owner_name";  
                  $row4=mysqli_query($connect,$data4);
                  $value4=mysqli_fetch_array($row4);
                  $show4 = $value4['f_name'];

                //   $data5="select * from tbl_users where id= $truck_partner_name";  
                //   $row5=mysqli_query($connect,$data5);
                //   $value5=mysqli_fetch_array($row5);
                //   $show5 = $value5['company_name'];

                  $data1="select * from tbl_car where id= $car_name";  
                  $row1=mysqli_query($connect,$data1);
                  $value1=mysqli_fetch_array($row1);
                  $show1 = $value1['car_location'];
                  $show1 = $value1['place_id'];
                  $show1 = $value1['map_url'];
                  $show1 = $value1['car_address'];
                  $show1 = $value1['brand'];
                  $show1 = $value1['car_type'];
                  $show1 = $value1['model'];
                  $show1 = $value1['year'];
                  $show1 = $value1['interior_color'];
                  $show1 = $value1['exterior_color'];
                  $show1 = $value1['tranmission'];
                  $show1 = $value1['vin'];
                  $show1 = $value1['mileage'];
                  $show1 = $value1['seating_capacity'];
                  $show1 = $value1['fuel_type'];
                  $show1 = $value1['description'];
                  $show1 = $value1['insurence'];
                  $show1 = $value1['rear_view_image'];
                  $show1 = $value1['front_view_image'];
                  $show1 = $value1['right_side_image'];
                  $show1 = $value1['left_side_image'];
                  $show1 = $value1['interior_image'];
                  $show1 = $value1['or_cr_doc'];
                  $show1 = $value1['car_video'];
                  $show1 = $value1['created'];
                  $show1 = $value1['created_by'];
                  $show1 = $value1['modified'];
                  $show1 = $value1['modified_by'];
                  $show1 = $value1['status'];
                  $show1 = $value1['car_availability'];
                  $show1 = $value1['ullimited_distance'];
                  $show1 = $value1['maximum_kilometer'];
                  $show1 = $value1['excess_fee_per_kilometer'];
                  $show1 = $value1['time_panalty_per_hour'];
                  $show1 = $value1['max_price'];
                  $show1 = $value1['min_price'];

                  
                //   $data2="select * from tbl_truck where id= $chassis_no";  
                //   $row2=mysqli_query($connect,$data2);
                //   $value2=mysqli_fetch_array($row2);
                //   $show2 = $value2['plate_no'];
                //   $show2 = $value2['model'];
                //   $show2 = $value2['truck_type'];
                //   $show2 = $value2['trailer_type'];
                //   $show2 = $value2['types'];
                //   $show2 = $value2['image'];
                //   $show2 = $value2['or_cr'];
                //   $show2 = $value2['status'];
                //   $show2 = $value2['created'];
                  
                    ?>   
             
              <h3>Car Booking Details</h3>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Order id</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['order_id']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">User Name</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value3['f_name']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Car ID</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['car_id']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Car Owner Name</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value4['f_name']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                
                <div class="span6">

                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Car Location</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['car_location']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">place Id</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['place_id']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Map Url</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['map_url']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Car Address</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['car_address']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Brand</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['brand']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Car type</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['car_type']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Model</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['model']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Year</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['year']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">interior color</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['interior_color']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">exterior color</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['exterior_color']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Transmission</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['transmission']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Vin</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['vin']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">MileAge</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['mileage']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Seating Capacity</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['seating_capacity']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Fuel Type</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['fuel_type']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Description</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['description']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Insurence</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['insurence']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Rear view image</label>
                        <div class="controls">
                        <?php if($value1['rear_view_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['rear_view_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>  
                           </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Front view image</label>
                        <div class="controls">
                        <?php if($value1['front_view_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['front_view_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                     
                            </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Right side image</label>
                        <div class="controls">
                        <?php if($value1['right_side_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['right_side_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                    
                          </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Left side image</label>
                        <div class="controls">
                        <?php if($value1['left_side_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['left_side_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                    
                             </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Interior image</label>
                        <div class="controls">
                        <?php if($value1['interior_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['interior_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                          
                             </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Or Cr image</label>
                        <div class="controls">
                        <?php if($value1['or_cr_doc']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['or_cr_doc']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                    
                              </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Car video</label>
                        <div class="controls">
                        <?php if($value1['car_video']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['car_video']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                      
                             </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">created</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['created']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Created by</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['created_by']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Modified</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['modified']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Modified By</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['modified_by']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Status</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['status']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Car availability</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['car_availability']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Ulimited Distance</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['unlimited_distance']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Maximum Kilometer</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['maximum_kilometer']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
              
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Excess fee per kilometer</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['excess_fee_per_kilometer']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Time panalty per hour</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['time_penalty_per_hour']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput"> Min Price</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['min_price']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Max Price </label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['max_price']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">PickUp Date</label>
                        <div class="controls">
                          <input type="text" name="image" value="<?php echo $rown['pickup_date']?> " class="input-xlarge focused" accept="image/jpeg,image/jpg,image/png,application/pdf" enctype="multipart/form-data"readonly>
                          
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Return Date</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['return_date']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Total Fair</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['total_fair'] ?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Payment Mode</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['payment_mode']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>

                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Qr Image</label>
                        <div class="controls">
                        <?php if($value1['qr_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['qr_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                        
                            </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Created</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['created']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Modified</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['modified'] ?> " class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Status</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['status'] ?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Booking Status</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['booking_status'] ?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Front View Image</label>
                        <div class="controls">
                        <?php if($value1['front_view_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['front_view_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Left Side Image</label>
                        <div class="controls">
                        <?php if($value1['left_side_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['left_side_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                      </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Back Side Image</label>
                        <div class="controls">
                        <?php if($value1['back_side_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['back_side_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                          </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Right Side image</label>
                        <div class="controls">
                        <?php if($value1['right_side_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['right_side_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                          </div>
                      </div>
                
                    </fieldset>
                </div>

                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Interior Image</label>
                        <div class="controls">
                        <?php if($value1['interior_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['interior_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                     </div>
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
