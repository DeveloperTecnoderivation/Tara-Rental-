<?php

include("../conn-web/cw.php");


$state_id = $_POST['state_id'];


$get_product="select * from tbl_city where state_id=$state_id";  
$results_state=mysqli_query($connect,$get_product);


$output = '<label class="control-label" for="focusedInput">City <span class="mandatory">*</span></label>
                    <div class="controls">
                        <select  name="city_id" class="form-control" id="city_id" required="required" onchange="fetchAddress(event.target.value)">
                          <option value="">--Select City--</option>';

foreach ($results_state as $state){

	$output .= '<option value="'.$state['id'].'" >'.$state['name'].'</option>';

}
$output .= '</select></div>';

echo $output;


?>