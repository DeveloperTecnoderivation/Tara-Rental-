<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$car_id =$_REQUEST['car_id'];

$lat=mysqli_real_escape_string($connect,$_REQUEST['lat']); 
$lng=mysqli_real_escape_string($connect,$_REQUEST['lng']); 
$place_id=mysqli_real_escape_string($connect,$_REQUEST['place_id']); 
$map_url=mysqli_real_escape_string($connect,$_REQUEST['map_url']); 
$car_location=mysqli_real_escape_string($connect,$_REQUEST['formatted_address']); 
$car_address=mysqli_real_escape_string($connect,$_REQUEST['formatted_address']); 


 $updt="update tbl_car set lat='$lat',lng='$lng',place_id='$place_id',map_url='$map_url',car_location='$car_location',car_address='$car_address' where id = $car_id "; 
$update_loc = mysqli_query($connect,$updt);

if($update_loc){
	echo '1';
}else{
	echo '0';
}

?>