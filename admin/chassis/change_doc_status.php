<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}
$pid =$_REQUEST['id'];
$status = $_REQUEST['status'];
$key_name = $_REQUEST['key_name'];


 echo $updt="update tbl_truck set $key_name='$status' where id = $pid "; 
mysqli_query($connect,$updt);


	
header('Location:view.php?add=2'); 
Exit();		
?>