<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];

$getdata="select * from tbl_truck where id=$pid";  
$gdata=mysqli_query($connect,$getdata);
$single_data=mysqli_fetch_array($gdata);
           


$truck_partner_id=mysqli_real_escape_string($connect,$_REQUEST['truck_partner_id']); 
$model=mysqli_real_escape_string($connect,$_REQUEST['model']); 
$plate_no=mysqli_real_escape_string($connect,$_REQUEST['plate_no']); 
$truck_type=mysqli_real_escape_string($connect,$_REQUEST['truck_type']); 



$allowedExts = array("pdf", "doc", "docx","png","jpg","jpeg","gif");

$image_extension = end(explode(".", $_FILES["image"]["name"]));
if (($_FILES["image"]["type"] == "application/pdf") || ($_FILES["image"]["type"] == "application/msword") ||($_FILES["image"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["image"]["type"] == "image/png") || ($_FILES["image"]["type"]=="image/jpeg") || ($_FILES["image"]["type"] == "image/jpg") && ($_FILES["image"] ["size"] < 7340032) && in_array($image_extension,  $allowedExts))
{
  if ($_FILES["image"]["error"] > 0)
  {
	$image = '';
  }
  else
  {
	   $filetmp_name=$_FILES ['image']['tmp_name'];
	   $name=$_FILES ['image']['name'];
	   $randomNumber = rand(15,35);
	   $rn = $randomNumber.'-';		
	   $ext = strtolower(substr($name, strpos($name, '.') +1));
	   $name = $rn.str_replace(' ','-',trim($name));
	   $image = $name;
	   
	   $path = "../../documents/";
	   copy($filetmp_name,$path.$image);
	  	$image = $image;
  }
} else{
 $image = $single_data['image'];
}


$or_cr_extension = end(explode(".", $_FILES["or_cr"]["name"]));
if (($_FILES["or_cr"]["type"] == "application/pdf") || ($_FILES["or_cr"]["type"] == "application/msword") ||($_FILES["or_cr"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["or_cr"]["type"] == "image/png") || ($_FILES["or_cr"]["type"]=="image/jpeg") || ($_FILES["or_cr"]["type"] == "image/jpg") && ($_FILES["or_cr"] ["size"] < 7340032) && in_array($or_cr_extension,  $allowedExts))
{
	  if ($_FILES["or_cr"]["error"] > 0)
	  {
		$or_cr = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['or_cr']['tmp_name'];
		   $name=$_FILES ['or_cr']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $or_cr = $name;
		   
		   $path = "../../documents/";
		   copy($filetmp_name,$path.$or_cr);
		  	$or_cr = $or_cr;
		}
} else{
 $or_cr = $single_data['or_cr'];
}




echo $updt="update tbl_truck set truck_partner_id='$truck_partner_id',model='$model',plate_no='$plate_no',truck_type='$truck_type',image='$image',or_cr='$or_cr' where id = $pid "; 
mysqli_query($connect,$updt);
 

header('Location:view.php?add=2'); 
Exit();	


	
?>