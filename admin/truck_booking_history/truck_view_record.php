
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
                <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i><li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li><li class="active">View Truck Booking Details</li>
              </ul>
            </div>
          </div>
        </div>
      
        <div class="row-fluid">
          <!-- block -->
          <div class="block">
            <div class="navbar navbar-inner block-header">
              <div class="muted pull-left">Truck Booking Details </div>
            </div>
            <div class="block-content collapse in">
              <div class="span12">
                <div class="table-toolbar">
                  <div class="btn-group">
                    <a href="<?php echo $base_url ?>/truck_booking_history/view.php"><button class="btn btn-warning"><i class="fa fa-arrow-left icon-white"></i> Back</button></a>
                  </div>
                </div>
                <br>

                <?php
                  $pid=$_REQUEST['pid'];
                  $getdata="select * from tbl_truck_order_booking where id=$pid";  
                  $gdata=mysqli_query($connect,$getdata);
                  $rown=mysqli_fetch_array($gdata);
                  

                  $truck_no = $rown['truck_id']; 
                  $chassis_no = $rown['chassis_id']; 
                  $user_name = $rown['user_id']; 
                  $driver_name = $rown['select_driver_id']; 
                  $truck_partner_name = $rown['truck_partner_id']; 
                  $chassis_type = $rown['trailer_chassis_type_id'];


                  $data6="select * from tbl_chassis_trailer_type where id = $chassis_type";  
                  $row6=mysqli_query($connect,$data6);
                  $value6=mysqli_fetch_array($row6);
                  $show6 = $value6['trailer_type'];

                  $data3="select * from tbl_users where id= $user_name";  
                  $row3=mysqli_query($connect,$data3);
                  $value3=mysqli_fetch_array($row3);
                  $show3 = $value3['f_name'];

                  $data4="select * from tbl_users where id= $driver_name";  
                  $row4=mysqli_query($connect,$data4);
                  $value4=mysqli_fetch_array($row4);
                  $show4 = $value4['f_name'];

                  $data5="select * from tbl_users where id= $truck_partner_name";  
                  $row5=mysqli_query($connect,$data5);
                  $value5=mysqli_fetch_array($row5);
                  $show5 = $value5['company_name'];

                  $data1="select * from tbl_truck where id= $truck_no";  
                  $row1=mysqli_query($connect,$data1);
                  $value1=mysqli_fetch_array($row1);
                  $show1 = $value1['model'];
                  $show1 = $value1['plate_no'];
                  $show1 = $value1['truck_type'];
                  $show1 = $value1['trailer_type'];
                  $show1 = $value1['types'];
                  $show1 = $value1['image'];
                  $show1 = $value1['or_cr'];
                  $show1 = $value1['status'];
                  $show1 = $value1['created'];
                  
                  $data2="select * from tbl_truck where id= $chassis_no";  
                  $row2=mysqli_query($connect,$data2);
                  $value2=mysqli_fetch_array($row2);
                  $show2 = $value2['plate_no'];
                  $show2 = $value2['model'];
                  $show2 = $value2['truck_type'];
                  $show2 = $value2['trailer_type'];
                  $show2 = $value2['types'];
                  $show2 = $value2['image'];
                  $show2 = $value2['or_cr'];
                  $show2 = $value2['status'];
                  $show2 = $value2['created'];
                  
                    ?>   
             
              <h3>Truck Booking Details</h3>
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
                          <input type="text"  value="<?php echo $value3['f_name']?>" class="input-xlarge focused"readonly>
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Truck Driver</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value4['f_name']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Truck Partner</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value5['company_name']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">QR image</label>
                        <div class="controls">
                        <?php if($rown['qr_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $rown['qr_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                                            
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Pickup Port</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['pickup_port']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Trailer Chassis</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value6['trailer_type'] ?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Consignee Name</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['consignee_name']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span12"><h3>Truck</h3></div>

                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Model</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['model']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Plate No</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['plate_no']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Truck Type</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value1['truck_type'] ?> " class="input-xlarge focused"readonly >
                        </div>
                      </div>
            
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                     
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Image</label>
                        <div class="controls">
                        <?php if($value1['image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['image']?>">
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
                        <label class="control-label" for="focusedInput">OR CR</label>
                        <div class="controls">
                        <?php if($value1['or_cr']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value1['or_cr']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                      
                            </div>
                      </div>
                    
                
                    </fieldset>
                </div>
                <div class="span12"><h3>Chassis</h3></div>

                <div class="span6">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Model</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value2['model']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    
                      
                    </fieldset>
                </div>
             
                <div class="span6">
                     <fieldset>
                  
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Image</label>
                        <div class="controls">
                        <?php if($value2['image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value2['image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                         
                             </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Plate No</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $value2['plate_no']?>" class="input-xlarge focused"readonly>
                        </div>
                      </div>
                     
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">OR CR</label>
                        <div class="controls">
                        <?php if($value2['or_cr']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $value2['or_cr']?>">
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
                        <label class="control-label" for="focusedInput">Delivery Address</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['delivery_address']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Return Address</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['container_return_address']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Pickup Date Time</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['pick_up_date_time']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">declared Value</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['declared_value']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Weight</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['weight']?> " class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Bill Of Loading</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['bill_of_loading']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Packing List</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['packing_list']?> " class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Certificate Of Payment</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['certificate_of_payment']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Gate Pass</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['gate_pass']?> " class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Tabs</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['tabs']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                     <div class="control-group">
                        <label class="control-label" for="focusedInput">Service Charge</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['service_charge']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Distance Fee</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['distance_fee']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      
                     <div class="control-group">
                        <label class="control-label" for="focusedInput">Note to Driver</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['note_to_driver']?>" class="input-xlarge focused" readonly>
                        </div>
                        </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Type Payment</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['payment_type']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Total Amount</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['total_amount']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Created</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['created']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Modified</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['modified']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                     
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Booking Status</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['booking_status']?>" class="input-xlarge focused"readonly>
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Cancel Reason</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['cancel_reasion']?>" class="input-xlarge focused" readonly>
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span6">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Cancel Other Comment</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['cancel_other_comment']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Cancel Date</label>
                        <div class="controls">
                          <input type="text"  value="<?php echo $rown['cancel_date']?>" class="input-xlarge focused"readonly >
                        </div>
                      </div>
                    </fieldset>
                </div>
                <div class="span5">
                     <fieldset>
                      
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Container Loading Status Image</label>
                        <div class="controls">
                        <?php if($rown['container_loaded_status_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $rown['container_loaded_status_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
                            <?php } ?>                         
                             </div>
                      </div>
                      <div class="control-group">
                        <label class="control-label" for="focusedInput">Delivery Status Image</label>
                        <div class="controls">
                        <?php if($rown['delivered_status_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $rown['delivered_status_image']?>">
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
                        <label class="control-label" for="focusedInput">Container Delivery Status Image</label>
                        <div class="controls">
                        <?php if($rown['container_delivered_status_image']){ ?>
                              <img class="doc_img" src ="<?php echo $image_url ?>/<?php echo $rown['container_delivered_status_image']?>">
                            <?php } else{ ?>
                              <img class="doc_img" src ="<?php echo $base_url ?>/assets/img/noimage.jpg"> 
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
