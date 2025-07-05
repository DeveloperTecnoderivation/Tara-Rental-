<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];
        
$modified = date('Y-m-d');

$name=mysqli_real_escape_string($connect,$_REQUEST['name']); 
$seating_capacity=mysqli_real_escape_string($connect,$_REQUEST['seating_capacity']); 


$updt="update tbl_vehicle_types set name='$name',seating_capacity='$seating_capacity',modified='$modified' where id = $pid "; 
mysqli_query($connect,$updt);

header('Location:view.php?add=2'); 
Exit();
	
?>