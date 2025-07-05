<?php

include("../conn-web/cw.php");


$make_id = $_POST['make_id'];


$get_product="select * from tbl_vehicle_models where make_id=$make_id";  
$results_model=mysqli_query($connect,$get_product);


$output = '<label class="control-label" for="focusedInput">Model <span class="mandatory">*</span></label>
                    <div class="controls">
                        <select  name="model" class="form-control" id="model" required="required" >
                          <option value="">--Select Model--</option>';

foreach ($results_model as $model){

	$output .= '<option value="'.$model['id'].'" >'.$model['name'].'</option>';

}
$output .= '</select></div>';

echo $output;


?>