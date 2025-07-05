<?php

include("../conn-web/cw.php");


$city_id = $_POST['city_id'];
$state_id = $_POST['state_id'];


$get_product="select * from tbl_city where state_id=$state_id";  
$results_city=mysqli_query($connect,$get_product);


$output = '<label class="control-label" for="focusedInput">City</label>
                    <div class="controls">
                        <select  name="city_id" class="form-control" id="city_id" required="required" onchange="fetchCity(event.target.value)" >
                          <option value="">--Select City--</option>';

foreach ($results_city as $city){

	if($city['id'] ==$city_id){
		 $output .= '<option value="'.$city['id'].'" selected>'.$city['name'].'</option>';
	}else{
		$output .= '<option value="'.$city['id'].'" >'.$city['name'].'</option>';
	}


	

}
$output .= '</select></div>';

echo $output;


?>