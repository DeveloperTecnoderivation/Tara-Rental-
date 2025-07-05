<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$status=1;
$created = date('Y-m-d');
$created_by = '1';


$truck_partner_id=mysqli_real_escape_string($connect,$_REQUEST['truck_partner_id']); 
$model=mysqli_real_escape_string($connect,$_REQUEST['model']); 
$plate_no=mysqli_real_escape_string($connect,$_REQUEST['plate_no']); 
$trailer_type=mysqli_real_escape_string($connect,$_REQUEST['trailer_type']); 



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
 $image = '';
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
 $or_cr = '';
}



echo $sql="insert into tbl_truck(truck_partner_id,model,plate_no,trailer_type,types,image,or_cr,status,created)values('$truck_partner_id','$model','$plate_no','$trailer_type','chassis','$image','$or_cr','$status','$created')"; 

$qrs=mysqli_query($connect,$sql);
header('Location:view.php?add=1'); 
Exit();	


?>