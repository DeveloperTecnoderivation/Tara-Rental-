<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$pid =$_REQUEST['pid'];
$modified = date('Y-m-d');

$getdata="select * from tbl_car where id=$pid";  
$gdata=mysqli_query($connect,$getdata);
$single_data=mysqli_fetch_array($gdata);


$car_owner_id=mysqli_real_escape_string($connect,$_REQUEST['car_owner_id']); 
// $country_id=mysqli_real_escape_string($connect,$_REQUEST['country_id']); 
// $state_id=mysqli_real_escape_string($connect,$_REQUEST['state_id']); 
// $city_id=mysqli_real_escape_string($connect,$_REQUEST['city_id']); 
// $car_location=mysqli_real_escape_string($connect,$_REQUEST['car_location']); 
// $lat=mysqli_real_escape_string($connect,$_REQUEST['lat']); 
// $lng=mysqli_real_escape_string($connect,$_REQUEST['lng']); 
// $place_id=mysqli_real_escape_string($connect,$_REQUEST['place_id']); 
// $map_url=mysqli_real_escape_string($connect,$_REQUEST['map_url']); 
$car_address=''; 
$vehicle_type=mysqli_real_escape_string($connect,$_REQUEST['vehicle_type']); 
$fuel_type=mysqli_real_escape_string($connect,$_REQUEST['fuel_type']); 
$make=mysqli_real_escape_string($connect,$_REQUEST['make']); 
$model=mysqli_real_escape_string($connect,$_REQUEST['model']); 
$year=mysqli_real_escape_string($connect,$_REQUEST['year']); 
$color=mysqli_real_escape_string($connect,$_REQUEST['color']); 
$name=mysqli_real_escape_string($connect,$_REQUEST['name']); 
$transmission=mysqli_real_escape_string($connect,$_REQUEST['transmission']); 
$vin=mysqli_real_escape_string($connect,$_REQUEST['vin']); 
$mileage=mysqli_real_escape_string($connect,$_REQUEST['mileage']); 


$seating_capacity=mysqli_real_escape_string($connect,$_REQUEST['seating_capacity']); 
$description=mysqli_real_escape_string($connect,$_REQUEST['description']); 
$power_staring=mysqli_real_escape_string($connect,$_REQUEST['power_staring']); 
$music_system=mysqli_real_escape_string($connect,$_REQUEST['music_system']); 
$air_condition=mysqli_real_escape_string($connect,$_REQUEST['air_condition']); 
$air_freshner=mysqli_real_escape_string($connect,$_REQUEST['air_freshner']); 
$airbags=mysqli_real_escape_string($connect,$_REQUEST['airbags']); 
$power_window=mysqli_real_escape_string($connect,$_REQUEST['power_window']); 



$allowedExts = array("pdf", "doc", "docx","png","jpg","jpeg","gif");

$rear_image_extension = end(explode(".", $_FILES["rear_image"]["name"]));
if (($_FILES["rear_image"]["type"] == "application/pdf") || ($_FILES["rear_image"]["type"] == "application/msword") ||($_FILES["rear_image"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["rear_image"]["type"] == "image/png") || ($_FILES["rear_image"]["type"]=="image/jpeg") || ($_FILES["rear_image"]["type"] == "image/jpg") && ($_FILES["rear_image"] ["size"] < 7340032) && in_array($rear_image_extension,  $allowedExts))
{
  if ($_FILES["rear_image"]["error"] > 0)
  {
	$rear_image = '';
  }
  else
  {
	   $filetmp_name=$_FILES ['rear_image']['tmp_name'];
	   $name=$_FILES ['rear_image']['name'];
	   $randomNumber = rand(15,35);
	   $rn = $randomNumber.'-';		
	   $ext = strtolower(substr($name, strpos($name, '.') +1));
	   $name = $rn.str_replace(' ','-',trim($name));
	   $rear_image = $name;
	   
	   $path = "../../documents/";
	   copy($filetmp_name,$path.$rear_image);
	  	$rear_image = $rear_image;
  }
} else{
 $rear_image = $single_data['rear_image'];
}


$front_image_extension = end(explode(".", $_FILES["front_image"]["name"]));
if (($_FILES["front_image"]["type"] == "application/pdf") || ($_FILES["front_image"]["type"] == "application/msword") ||($_FILES["front_image"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["front_image"]["type"] == "image/png") || ($_FILES["front_image"]["type"]=="image/jpeg") || ($_FILES["front_image"]["type"] == "image/jpg") && ($_FILES["front_image"] ["size"] < 7340032) && in_array($front_image_extension,  $allowedExts))
{
	  if ($_FILES["front_image"]["error"] > 0)
	  {
		$front_image = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['front_image']['tmp_name'];
		   $name=$_FILES ['front_image']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $front_image = $name;
		   
		   $path = "../../documents/";
		   copy($filetmp_name,$path.$front_image);
		  	$front_image = $front_image;
		}
} else{
 $front_image = $single_data['front_image'];
}


$right_side_image_extension = end(explode(".", $_FILES["right_side_image"]["name"]));
if (($_FILES["right_side_image"]["type"] == "application/pdf") || ($_FILES["right_side_image"]["type"] == "application/msword") ||($_FILES["right_side_image"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["right_side_image"]["type"] == "image/png") || ($_FILES["right_side_image"]["type"]=="image/jpeg") || ($_FILES["right_side_image"]["type"] == "image/jpg") && ($_FILES["right_side_image"] ["size"] < 7340032) && in_array($right_side_image_extension,  $allowedExts))
{
	  if ($_FILES["right_side_image"]["error"] > 0)
	  {
		$right_side_image = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['right_side_image']['tmp_name'];
		   $name=$_FILES ['right_side_image']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $right_side_image = $name;
		   
		   $path = "../../documents/";
		   copy($filetmp_name,$path.$right_side_image);
		  	$right_side_image = $right_side_image;
		}
} else{
 $right_side_image = $single_data['right_side_image'];
}


$left_side_image_extension = end(explode(".", $_FILES["left_side_image"]["name"]));
if (($_FILES["left_side_image"]["type"] == "application/pdf") || ($_FILES["left_side_image"]["type"] == "application/msword") ||($_FILES["left_side_image"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["left_side_image"]["type"] == "image/png") || ($_FILES["left_side_image"]["type"]=="image/jpeg") || ($_FILES["left_side_image"]["type"] == "image/jpg") && ($_FILES["left_side_image"] ["size"] < 7340032) && in_array($left_side_image_extension,  $allowedExts))
{
	  if ($_FILES["left_side_image"]["error"] > 0)
	  {
		$left_side_image = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['left_side_image']['tmp_name'];
		   $name=$_FILES ['left_side_image']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $left_side_image = $name;
		   
		   $path = "../../documents/";
		   copy($filetmp_name,$path.$left_side_image);
		  	$left_side_image = $left_side_image;
		}
} else{
 $left_side_image = $single_data['left_side_image'];
}


$interior_image_extension = end(explode(".", $_FILES["interior_image"]["name"]));
if (($_FILES["interior_image"]["type"] == "application/pdf") || ($_FILES["interior_image"]["type"] == "application/msword") ||($_FILES["interior_image"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["interior_image"]["type"] == "image/png") || ($_FILES["interior_image"]["type"]=="image/jpeg") || ($_FILES["interior_image"]["type"] == "image/jpg") && ($_FILES["interior_image"] ["size"] < 7340032) && in_array($interior_image_extension,  $allowedExts))
{
	  if ($_FILES["interior_image"]["error"] > 0)
	  {
		$interior_image = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['interior_image']['tmp_name'];
		   $name=$_FILES ['interior_image']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $interior_image = $name;
		   
		   $path = "../../documents/";
		   copy($filetmp_name,$path.$interior_image);
		  	$interior_image = $interior_image;
		}
} else{
 $interior_image = $single_data['interior_image'];
}
	

$or_cr_doc_extension = end(explode(".", $_FILES["or_cr_doc"]["name"]));
if (($_FILES["or_cr_doc"]["type"] == "application/pdf") || ($_FILES["or_cr_doc"]["type"] == "application/msword") ||($_FILES["or_cr_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["or_cr_doc"]["type"] == "image/png") || ($_FILES["or_cr_doc"]["type"]=="image/jpeg") || ($_FILES["or_cr_doc"]["type"] == "image/jpg") && ($_FILES["or_cr_doc"] ["size"] < 7340032) && in_array($or_cr_doc_extension,  $allowedExts))
{
	  if ($_FILES["or_cr_doc"]["error"] > 0)
	  {
		$or_cr_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['or_cr_doc']['tmp_name'];
		   $name=$_FILES ['or_cr_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $or_cr_doc = $name;
		   
		   $path = "../../documents/";
		   copy($filetmp_name,$path.$or_cr_doc);
		  	$or_cr_doc = $or_cr_doc;
		}
} else{
 $or_cr_doc = $single_data['or_cr_doc'];
}

$imgpath1=$_FILES['car_video']['name'];

if($imgpath1!="")
{
	$allowedExts = array("mov", "mp4", "3gp", "ogg");
	 $extension = pathinfo($_FILES['car_video']['name'], PATHINFO_EXTENSION);

	if ((($_FILES["car_video"]["type"] == "video/mov")
	|| ($_FILES["car_video"]["type"] == "video/mp4")
	|| ($_FILES["car_video"]["type"] == "video/3gp")
	|| ($_FILES["car_video"]["type"] == "video/ogg"))
	&& ($_FILES["car_video"]["size"] < 999999999)
	&& in_array($extension, $allowedExts))

	{
		if ($_FILES["car_video"]["error"] > 0)
		{
		  $video_name = $single_data['car_video'];
		}
		else
		{

			$name = $_FILES['car_video']['name'];
			$size = $_FILES['car_video']['size'];
			$type = $_FILES['car_video']['type'];
			$randomNumber = rand(15,35);
			$rn = $randomNumber.'-';		
			$ext = strtolower(substr($name, strpos($name, '.') +1));
			$name = $rn.str_replace(' ','-',trim($name));
			$video_name = $name;

			 move_uploaded_file($_FILES["car_video"]["tmp_name"],
		  	"../documents/" .$video_name);

		}
	}else{
		$video_name = $single_data['car_video'];
	}

}else{
	$video_name = $single_data['car_video'];
}



echo $updt="update tbl_car set car_owner_id='$car_owner_id',car_address='$car_address',vehicle_type='$vehicle_type',fuel_type='$fuel_type',make='$make',model='$model',year='$year',color='$color',transmission='$transmission',vin='$vin',mileage='$mileage',seating_capacity='$seating_capacity',description='$description',power_staring='$power_staring',music_system='$music_system',air_condition='$air_condition',air_freshner='$air_freshner',airbags='$airbags',power_window='$power_window',rear_image='$rear_image',front_image='$front_image',right_side_image='$right_side_image',left_side_image='$left_side_image',interior_image='$interior_image',or_cr_doc='$or_cr_doc',car_video='$video_name' where id = $pid "; 
mysqli_query($connect,$updt);
 

header('Location:view.php?add=2'); 
Exit();	
	
?>