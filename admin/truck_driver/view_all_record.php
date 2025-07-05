<?php
include("../conn-web/cw.php");
if (!$_SESSION["tata_login_username"]) {
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
          <i class="fa fa-angle-right show-sidebar" style="display:none;"><a href="#" title="Show Sidebar" rel="tooltip">&nbsp;</a></i>
          <li><a href="<?php echo $base_url ?>/dashboard.php">Dashboard</a> <span class="divider">/</span></li>
          <li class="active">View Truck Driver Details</li>
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
          $pid = $_REQUEST['pid'];
          $getdata = "select * from tbl_users where id=$pid";
          $gdata = mysqli_query($connect, $getdata);
          $rown = mysqli_fetch_array($gdata);
          ?>
          <h3>Truck Driver Details</h3>
          <div class="span6">
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="focusedInput">First Name</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['f_name'] ?>" class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Last Name</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['l_name'] ?>" class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Email</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['email'] ?>" class="input-xlarge focused">
                </div>
              </div>

            </fieldset>
          </div>
          <div class="span5">
            <fieldset>

              <div class="control-group">
                <label class="control-label" for="focusedInput"> Phone Number</label>
                <div class="controls">
                  <input type="text"
                    value="<?php
                            if ($rown['role'] == 'driver') {
                              echo $rown['phone'];
                            } elseif ($rown['role'] == 'truck_partner') {
                              echo $rown['phone'];
                            }
                            ?>"
                    class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Refrence Number</label>
                <div class="controls">
                  <input type="text"
                    value="<?php
                            if ($rown['role'] == 'driver') {
                              echo $rown['truck_refrence_number'];
                            } elseif ($rown['role'] == 'truck_partner') {
                              echo $rown['refrence_number'];
                            }
                            ?>"
                    class="input-xlarge focused">
                </div>
              </div>
            </fieldset>
          </div>

          <?php
          $user_id = $_REQUEST['pid'];

          $sql = "
         SELECT 
    u.*, 
    t.model AS truck_model,
    t.plate_no AS truck_plate_no,
    t.truck_type AS truck_truck_type,
    t.types AS truck_types,
    t.image AS truck_image,

    c.model AS chassis_model,
    c.plate_no AS chassis_plate_no,
    c.types AS chassis_types,
    c.image AS chassis_image,
   CASE 
        WHEN c.trailer_type = 1 THEN '20 Footer'
        WHEN c.trailer_type = 2 THEN '40 Footer'
        ELSE 'Unknown'
    END AS chassis_trailer_type

     FROM tbl_users u
     LEFT JOIN tbl_truck t ON u.truck_id = t.id
     LEFT JOIN tbl_truck c ON u.chassis_id = c.id  -- Assuming chassis is also stored in tbl_truck
     WHERE u.id = $user_id
     ";

          $result = mysqli_query($connect, $sql);
          $rown = mysqli_fetch_assoc($result);
          ?>
          <div class="span6">
            <h3>Truck Details</h3>
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Model</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['truck_model'] ?>" class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Plate_no </label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['truck_plate_no'] ?>" class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Types</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['truck_types'] ?>" class="input-xlarge focused">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="focusedInput">Truck type</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['truck_truck_type'] ?>" class="input-xlarge focused">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="focusedInput">Image</label>
                <div class="controls">
                  <?php
                  $img_path = $image_url . '/' . $rown['truck_image'];
                  $img_exists = !empty($rown['truck_image']);
                  ?>

                  <a class="img_hyper" href="<?php echo $img_exists ? $img_path : '#'; ?>" target="_blank">
                    <img class="doc_img <?php echo $color_status; ?>" src="<?php echo $img_exists ? $img_path : $image_url . '/assets/img/default.png'; ?>" alt="Truck Image">
                    <i class="icon_status <?php echo $icon_status_chk; ?>"></i>
                  </a>
                </div>
              </div>
            </fieldset>
          </div>

          <div class="span5">
            <h3>Chassis Details</h3>
            <fieldset>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Model</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['chassis_model'] ?>" class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Plate_no </label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['chassis_plate_no'] ?>" class="input-xlarge focused">
                </div>
              </div>

              <div class="control-group">
                <label class="control-label" for="focusedInput">Types</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['chassis_types'] ?>" class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Trailer type</label>
                <div class="controls">
                  <input type="text" value="<?php echo $rown['chassis_trailer_type'] ?>" class="input-xlarge focused">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Image</label>
                <div class="controls">
                  <?php
                  $img_path = $image_url . '/' . $rown['chassis_image'];
                  $img_exists = !empty($rown['chassis_image']);
                  ?>

                  <a class="img_hyper" href="<?php echo $img_exists ? $img_path : '#'; ?>" target="_blank">
                    <img class="doc_img <?php echo $color_status; ?>" src="<?php echo $img_exists ? $img_path : $image_url . '/assets/img/default.png'; ?>" alt="Chassis Image">
                    <i class="icon_status <?php echo $icon_status_chk; ?>"></i>
                  </a>
                </div>
              </div>
            </fieldset>
          </div>


          <div class="span12">
            <h3>Documents</h3>
          </div>
          <!-- <h3>Documents</h3> -->

          <div class="span6">

            <fieldset>
              <div class="control-group">
                <label class="control-label" for="focusedInput">Driver license </label>
                <div class="controls">
                  <?php if ($rown['driver_licence']) { ?>
                    <?php

                    $path_info = pathinfo($rown['driver_licence']);
                    $path_extension = $path_info['extension'];


                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['driver_licence'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['driver_licence'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['driver_licence'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['driver_licence'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['valid_govt_id']) { ?>
                    <?php

                    $path_info = pathinfo($rown['valid_govt_id']);
                    $path_extension = $path_info['extension'];

                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['valid_govt_id'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['company_id']) { ?>
                    <?php

                    $path_info = pathinfo($rown['company_id']);
                    $path_extension = $path_info['extension'];


                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['company_id'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['company_id'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['company_id'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['company_id'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['bio_data']) { ?>
                    <?php

                    $path_info = pathinfo($rown['bio_data']);
                    $path_extension = $path_info['extension'];


                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bio_data'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bio_data'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['bio_data'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['bio_data'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['drug_text_result']) { ?>
                    <?php

                    $path_info = pathinfo($rown['drug_text_result']);
                    $path_extension = $path_info['extension'];


                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['drug_text_result'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['drug_text_result'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['drug_text_result'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['drug_text_result'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $base_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['nbi_clearance']) { ?>
                    <?php

                    $path_info = pathinfo($rown['nbi_clearance']);
                    $path_extension = $path_info['extension'];


                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['nbi_clearance'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['police_clearance']) { ?>
                    <?php

                    $path_info = pathinfo($rown['police_clearance']);
                    $path_extension = $path_info['extension'];

                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['police_clearance'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['police_clearance'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['police_clearance'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['police_clearance'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['personal_accident_insurance']) { ?>
                    <?php

                    $path_info = pathinfo($rown['personal_accident_insurance']);
                    $path_extension = $path_info['extension'];


                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['personal_accident_insurance'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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
                  <?php if ($rown['vacination_card']) { ?>
                    <?php

                    $path_info = pathinfo($rown['vacination_card']);
                    $path_extension = $path_info['extension'];


                    ?>
                    <?php if ($path_extension == 'docx') { ?>

                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['vacination_card'] ?>" target="_blank">
                        <img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/docx.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>

                    <?php } ?>

                    <?php if (($path_extension == 'png') || ($path_extension == 'jpg') || ($path_extension == 'jpeg') || ($path_extension == 'svg') || ($path_extension == 'PNG') || ($path_extension == 'JPG') || ($path_extension == 'JPEG') || ($path_extension == 'SVG')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['vacination_card'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/<?php echo $rown['vacination_card'] ?>">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
                      </a>
                    <?php } ?>

                    <?php if (($path_extension == 'pdf')) { ?>
                      <a class="img_hyper" href="<?php echo $image_url ?>/<?php echo $rown['vacination_card'] ?>" target="_blank"><img class="doc_img <?php echo $color_status ?>" src="<?php echo $image_url ?>/assets/img/pdf.png">
                        <i class="icon_status <?php echo $icon_status_chk ?>"></i>
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