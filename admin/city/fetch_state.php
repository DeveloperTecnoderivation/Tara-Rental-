<?php

include("../conn-web/cw.php");


$user_id = $_SESSION['web_userid'];
$getdata="select * from tbl_users where id=$user_id";  
$gdata=mysqli_query($connect,$getdata);
$rown_user=mysqli_fetch_array($gdata);

$country_id = $_POST['country_id'];


$get_product="select * from states where country_id=$country_id";  
$results_state=mysqli_query($connect,$get_product);


$output = '<div class="single-form"><label for="title">State<span class="star_req">*</span></label><select name="billing_state" id="billing_state" onchange="selectBillingState(event.target.value)"><option value="">--Select State--</option>';

foreach ($results_state as $state){

	if($state['id'] ==$rown_user['billing_state']){
		 $output .= '<option value="'.$state['id'].'" selected>'.$state['name'].'</option>';
	}else{
		 $output .= '<option value="'.$state['id'].'" >'.$state['name'].'</option>';
	}

}
$output .= '</select><div id="error_billing_state" class="error_msg"></div>  </div>';

echo $output;


?>


</script>