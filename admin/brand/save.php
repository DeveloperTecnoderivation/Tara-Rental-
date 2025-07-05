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

$name=mysqli_real_escape_string($connect,$_REQUEST['name']); 



echo $sql="insert into tbl_vehicle_brand(name,status,created,created_by,modified,modified_by)values('$name','$status','$created','$created_by','$modified','$modified_by')"; 

	 $qrs=mysqli_query($connect,$sql);
	 header('Location:view.php?add=1'); 
	Exit();

	
?>