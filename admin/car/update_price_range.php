<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$car_id =$_REQUEST['car_id'];

$min_price=mysqli_real_escape_string($connect,$_REQUEST['price_range_min_price']); 
$max_price=mysqli_real_escape_string($connect,$_REQUEST['price_range_max_price']); 


 $updt="update tbl_car set min_price='$min_price',max_price='$max_price' where id = $car_id "; 
$update_loc = mysqli_query($connect,$updt);

if($update_loc){
	echo '1';
}else{
	echo '0';
}

?>