<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];
        
$modified = date('Y-m-d');

$name=mysqli_real_escape_string($connect,$_REQUEST['name']); 
$hexcode=mysqli_real_escape_string($connect,$_REQUEST['hexcode']); 


$updt="update tbl_color set name='$name',hexcode='$hexcode',modified='$modified' where id = $pid "; 
mysqli_query($connect,$updt);

header('Location:view.php?add=2'); 
Exit();
	
?>