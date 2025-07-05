<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}




$status=1;
$created_by=1;
$created = date('Y-m-d');
$modified_by=1;
$modified = date('Y-m-d');

$country_id	=mysqli_real_escape_string($connect,$_REQUEST['country_id']); 
$state_id	=mysqli_real_escape_string($connect,$_REQUEST['state_id']); 
$name=mysqli_real_escape_string($connect,$_REQUEST['name']); 

$lat=mysqli_real_escape_string($connect,$_REQUEST['lat']); 
$lng=mysqli_real_escape_string($connect,$_REQUEST['lng']); 
$place_id=mysqli_real_escape_string($connect,$_REQUEST['place_id']); 
$map_url=mysqli_real_escape_string($connect,$_REQUEST['map_url']); 

echo $sql="insert into tbl_city(country_id,state_id,name,lat,lng,place_id,map_url,status,created,created_by,modified,modified_by)values('$country_id','$state_id','$name','$lat','$lng','$place_id','$map_url','$status','$created','$created_by','$modified','$modified_by')"; 

$qrs=mysqli_query($connect,$sql);
 header('Location:view.php?add=1'); 
Exit();	



	
?>