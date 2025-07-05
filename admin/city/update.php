<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];

$modified = date('Y-m-d');

$country_id	=mysqli_real_escape_string($connect,$_REQUEST['country_id']); 
$state_id	=mysqli_real_escape_string($connect,$_REQUEST['state_id']); 
$name=mysqli_real_escape_string($connect,$_REQUEST['name']); 

$lat=mysqli_real_escape_string($connect,$_REQUEST['lat']); 
$lng=mysqli_real_escape_string($connect,$_REQUEST['lng']); 
$place_id=mysqli_real_escape_string($connect,$_REQUEST['place_id']); 
$map_url=mysqli_real_escape_string($connect,$_REQUEST['map_url']);  


$updt="update tbl_city set country_id='$country_id',state_id='$state_id',name='$name',lat='$lat',lng='$lng',place_id='$place_id',map_url='$map_url',modified='$modified' where id = $pid "; 
	mysqli_query($connect,$updt);

header('Location:view.php?add=2'); 
Exit();	



	
?>