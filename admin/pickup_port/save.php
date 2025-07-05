<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$status=1;
$created = date('Y-m-d');
$created_by = '1';


$port=mysqli_real_escape_string($connect,$_REQUEST['port']); 
$lat=mysqli_real_escape_string($connect,$_REQUEST['lat']); 
$lng=mysqli_real_escape_string($connect,$_REQUEST['lng']); 
$code=mysqli_real_escape_string($connect,$_REQUEST['code']); 

echo $sql="insert into tbl_pick_up_port(port,code,lng,lat,status,created)values('$port','$code','$lng','$lat','$status','$created')"; 

$qrs=mysqli_query($connect,$sql);
header('Location:view.php?add=1'); 
Exit();	


?>