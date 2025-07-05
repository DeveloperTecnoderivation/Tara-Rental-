<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];

$port=mysqli_real_escape_string($connect,$_REQUEST['port']); 
$lat=mysqli_real_escape_string($connect,$_REQUEST['lat']); 
$lng=mysqli_real_escape_string($connect,$_REQUEST['lng']); 
$code=mysqli_real_escape_string($connect,$_REQUEST['code']); 



echo $updt="update tbl_pick_up_port set port='$port',lat='$lat',lng='$lng',code='$code' where id = $pid "; 
mysqli_query($connect,$updt);
 

header('Location:view.php?add=2'); 
Exit();	


	
?>