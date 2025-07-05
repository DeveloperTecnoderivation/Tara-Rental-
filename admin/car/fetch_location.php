<?php

include("../conn-web/cw.php");


$car_id = $_POST['car_id'];

$getdata="select * from tbl_car where id=$car_id";  
$gdata=mysqli_query($connect,$getdata);
$rown=mysqli_fetch_array($gdata);

 // echo json_encode($rown); 
if($rown){
  echo json_encode($rown); 
}else{
 echo json_encode($rown); 
}




// $output = '<label class="control-label" for="focusedInput">City <span class="mandatory">*</span></label>
//                     <div class="controls">
//                         <select  name="city_id" class="form-control" id="city_id" required="required" onchange="fetchAddress(event.target.value)">
//                           <option value="">--Select City--</option>';

// foreach ($results_state as $state){

// 	$output .= '<option value="'.$state['id'].'" >'.$state['name'].'</option>';

// }
// $output .= '</select></div>';

// echo $output;


?>