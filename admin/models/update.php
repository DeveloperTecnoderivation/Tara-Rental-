<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];
        
$modified = date('Y-m-d');
$name=mysqli_real_escape_string($connect,$_REQUEST['name']); 
$make_id=mysqli_real_escape_string($connect,$_REQUEST['make_id']); 


echo $updt="update tbl_vehicle_models set name='$name',make_id='$make_id',modified='$modified' where id = $pid "; 
mysqli_query($connect,$updt);

header('Location:view.php?add=2'); 
Exit();
	
?>