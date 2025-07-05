<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$car_id =$_REQUEST['car_id'];

$unlimited_distance=mysqli_real_escape_string($connect,$_REQUEST['unlimited_distance']); 
$maximum_kilometer=mysqli_real_escape_string($connect,$_REQUEST['maximum_kilometer']); 
$excess_fee_per_kilometer=mysqli_real_escape_string($connect,$_REQUEST['excess_fee_per_kilometer']); 
$time_penalty_per_hour=mysqli_real_escape_string($connect,$_REQUEST['time_penalty_per_hour']); 

if($unlimited_distance == '1'){
	$maximum_kilometer = '';
	$excess_fee_per_kilometer = '';
	$time_penalty_per_hour = '';

}
 $updt="update tbl_car set unlimited_distance='$unlimited_distance',maximum_kilometer='$maximum_kilometer',excess_fee_per_kilometer='$excess_fee_per_kilometer',time_penalty_per_hour='$time_penalty_per_hour' where id = $car_id "; 

$update_dis = mysqli_query($connect,$updt);

if($update_dis){
	echo '1';
}else{
	echo '0';
}

?>