<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}




$status=1;
$current_date = date('Y-m-d');

$f_name=mysqli_real_escape_string($connect,$_REQUEST['f_name']); 
$l_name=mysqli_real_escape_string($connect,$_REQUEST['l_name']); 
$email=mysqli_real_escape_string($connect,$_REQUEST['email']); 
$phone=mysqli_real_escape_string($connect,$_REQUEST['phone']); 
// $country_mobile_code = mysqli_real_escape_string($connect,$_REQUEST['country_mobile_code']);
$password=md5($_REQUEST['password']); 
$role='car_owner';


echo $sql="insert into tbl_users(f_name,l_name,email,role,phone,password,status,created)values('$f_name','$l_name','$email','$role','$phone','$password','1','$current_date')"; 

	 $qrs=mysqli_query($connect,$sql);
	 header('Location:view.php?add=1'); 
	Exit();

	
?>