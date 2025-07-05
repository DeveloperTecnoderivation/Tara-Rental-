<?php

include("../conn-web/cw.php");


$country_id = $_POST['country_id'];


$get_product="select * from tbl_state where country_id=$country_id";  
$results_state=mysqli_query($connect,$get_product);


$output = '
                        <select  name="state_id" class="form-control" id="state_id" required="required" onchange="fetchCity(event.target.value)">
                          <option value="">--Select State--</option>';

foreach ($results_state as $state){

	$output .= '<option value="'.$state['id'].'" >'.$state['name'].'</option>';

}
$output .= '</select>';

echo $output;


?>