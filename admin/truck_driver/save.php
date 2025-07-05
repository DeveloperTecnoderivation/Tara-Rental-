<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}


$status=1;
$created = date('Y-m-d');
$created_by = '1';


$f_name=mysqli_real_escape_string($connect,$_REQUEST['f_name']); 
$l_name=mysqli_real_escape_string($connect,$_REQUEST['l_name']); 
$email=mysqli_real_escape_string($connect,$_REQUEST['email']); 
$contact_person_phone_mobile_code=mysqli_real_escape_string($connect,$_REQUEST['contact_person_phone_mobile_code']);
$phone_number=mysqli_real_escape_string($connect,$_REQUEST['phone_number']); 
$password=md5($_REQUEST['password']); 
$refrence_number=mysqli_real_escape_string($connect,$_REQUEST['refrence_number']); 


$allowedExts = array("pdf", "doc", "docx","png","jpg","jpeg","gif");

$driver_license_doc_extension = end(explode(".", $_FILES["driver_license_doc"]["name"]));
if (($_FILES["driver_license_doc"]["type"] == "application/pdf") || ($_FILES["driver_license_doc"]["type"] == "application/msword") ||($_FILES["driver_license_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["driver_license_doc"]["type"] == "image/png") || ($_FILES["driver_license_doc"]["type"]=="image/jpeg") || ($_FILES["driver_license_doc"]["type"] == "image/jpg") && ($_FILES["driver_license_doc"] ["size"] < 7340032) && in_array($driver_license_doc_extension,  $allowedExts))
{
  if ($_FILES["driver_license_doc"]["error"] > 0)
  {
	$driver_license_doc = '';
  }
  else
  {
	   $filetmp_name=$_FILES ['driver_license_doc']['tmp_name'];
	   $name=$_FILES ['driver_license_doc']['name'];
	   $randomNumber = rand(15,35);
	   $rn = $randomNumber.'-';		
	   $ext = strtolower(substr($name, strpos($name, '.') +1));
	   $name = $rn.str_replace(' ','-',trim($name));
	   $driver_license_doc = $name;
	   
	   $path = "../documents/";
	   copy($filetmp_name,$path.$driver_license_doc);
	  	$driver_license_doc = $driver_license_doc;
  }
} else{
 $driver_license_doc = '';
}


$valid_goverment_id_doc_extension = end(explode(".", $_FILES["valid_goverment_id_doc"]["name"]));
if (($_FILES["valid_goverment_id_doc"]["type"] == "application/pdf") || ($_FILES["valid_goverment_id_doc"]["type"] == "application/msword") ||($_FILES["valid_goverment_id_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["valid_goverment_id_doc"]["type"] == "image/png") || ($_FILES["valid_goverment_id_doc"]["type"]=="image/jpeg") || ($_FILES["valid_goverment_id_doc"]["type"] == "image/jpg") && ($_FILES["valid_goverment_id_doc"] ["size"] < 7340032) && in_array($valid_goverment_id_doc_extension,  $allowedExts))
{
	  if ($_FILES["valid_goverment_id_doc"]["error"] > 0)
	  {
		$valid_goverment_id_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['valid_goverment_id_doc']['tmp_name'];
		   $name=$_FILES ['valid_goverment_id_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $valid_goverment_id_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$valid_goverment_id_doc);
		  	$valid_goverment_id_doc = $valid_goverment_id_doc;
		}
} else{
 $valid_goverment_id_doc = '';
}


$company_id_doc_extension = end(explode(".", $_FILES["company_id_doc"]["name"]));
if (($_FILES["company_id_doc"]["type"] == "application/pdf") || ($_FILES["company_id_doc"]["type"] == "application/msword") ||($_FILES["company_id_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["company_id_doc"]["type"] == "image/png") || ($_FILES["company_id_doc"]["type"]=="image/jpeg") || ($_FILES["company_id_doc"]["type"] == "image/jpg") && ($_FILES["company_id_doc"] ["size"] < 7340032) && in_array($company_id_doc_extension,  $allowedExts))
{
	  if ($_FILES["company_id_doc"]["error"] > 0)
	  {
		$company_id_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['company_id_doc']['tmp_name'];
		   $name=$_FILES ['company_id_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $company_id_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$company_id_doc);
		  	$company_id_doc = $company_id_doc;
		}
} else{
 $company_id_doc = '';
}


$bio_data_doc_extension = end(explode(".", $_FILES["bio_data_doc"]["name"]));
if (($_FILES["bio_data_doc"]["type"] == "application/pdf") || ($_FILES["bio_data_doc"]["type"] == "application/msword") ||($_FILES["bio_data_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["bio_data_doc"]["type"] == "image/png") || ($_FILES["bio_data_doc"]["type"]=="image/jpeg") || ($_FILES["bio_data_doc"]["type"] == "image/jpg") && ($_FILES["bio_data_doc"] ["size"] < 7340032) && in_array($bio_data_doc_extension,  $allowedExts))
{
	  if ($_FILES["bio_data_doc"]["error"] > 0)
	  {
		$bio_data_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['bio_data_doc']['tmp_name'];
		   $name=$_FILES ['bio_data_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $bio_data_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$bio_data_doc);
		  	$bio_data_doc = $bio_data_doc;
		}
} else{
 $bio_data_doc = '';
}


$drug_test_result_doc_extension = end(explode(".", $_FILES["drug_test_result_doc"]["name"]));
if (($_FILES["drug_test_result_doc"]["type"] == "application/pdf") || ($_FILES["drug_test_result_doc"]["type"] == "application/msword") ||($_FILES["drug_test_result_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["drug_test_result_doc"]["type"] == "image/png") || ($_FILES["drug_test_result_doc"]["type"]=="image/jpeg") || ($_FILES["drug_test_result_doc"]["type"] == "image/jpg") && ($_FILES["drug_test_result_doc"] ["size"] < 7340032) && in_array($drug_test_result_doc_extension,  $allowedExts))
{
	  if ($_FILES["drug_test_result_doc"]["error"] > 0)
	  {
		$drug_test_result_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['drug_test_result_doc']['tmp_name'];
		   $name=$_FILES ['drug_test_result_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $drug_test_result_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$drug_test_result_doc);
		  	$drug_test_result_doc = $drug_test_result_doc;
		}
} else{
 $drug_test_result_doc = '';
}
	

$nbi_clearance_doc_extension = end(explode(".", $_FILES["nbi_clearance_doc"]["name"]));
if (($_FILES["nbi_clearance_doc"]["type"] == "application/pdf") || ($_FILES["nbi_clearance_doc"]["type"] == "application/msword") ||($_FILES["nbi_clearance_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["nbi_clearance_doc"]["type"] == "image/png") || ($_FILES["nbi_clearance_doc"]["type"]=="image/jpeg") || ($_FILES["nbi_clearance_doc"]["type"] == "image/jpg") && ($_FILES["nbi_clearance_doc"] ["size"] < 7340032) && in_array($nbi_clearance_doc_extension,  $allowedExts))
{
	  if ($_FILES["nbi_clearance_doc"]["error"] > 0)
	  {
		$nbi_clearance_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['nbi_clearance_doc']['tmp_name'];
		   $name=$_FILES ['nbi_clearance_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $nbi_clearance_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$nbi_clearance_doc);
		  	$nbi_clearance_doc = $nbi_clearance_doc;
		}
} else{
 $nbi_clearance_doc = '';
}


$police_clearance_doc_extension = end(explode(".", $_FILES["police_clearance_doc"]["name"]));
if (($_FILES["police_clearance_doc"]["type"] == "application/pdf") || ($_FILES["police_clearance_doc"]["type"] == "application/msword") ||($_FILES["police_clearance_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["police_clearance_doc"]["type"] == "image/png") || ($_FILES["police_clearance_doc"]["type"]=="image/jpeg") || ($_FILES["police_clearance_doc"]["type"] == "image/jpg") && ($_FILES["police_clearance_doc"] ["size"] < 7340032) && in_array($police_clearance_doc_extension,  $allowedExts))
{
	  if ($_FILES["police_clearance_doc"]["error"] > 0)
	  {
		$police_clearance_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['police_clearance_doc']['tmp_name'];
		   $name=$_FILES ['police_clearance_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $police_clearance_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$police_clearance_doc);
		  	$police_clearance_doc = $police_clearance_doc;
		}
} else{
 $police_clearance_doc = '';
}


$personal_accident_insurance_doc_extension = end(explode(".", $_FILES["personal_accident_insurance_doc"]["name"]));
if (($_FILES["personal_accident_insurance_doc"]["type"] == "application/pdf") || ($_FILES["personal_accident_insurance_doc"]["type"] == "application/msword") ||($_FILES["personal_accident_insurance_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["personal_accident_insurance_doc"]["type"] == "image/png") || ($_FILES["personal_accident_insurance_doc"]["type"]=="image/jpeg") || ($_FILES["personal_accident_insurance_doc"]["type"] == "image/jpg") && ($_FILES["personal_accident_insurance_doc"] ["size"] < 7340032) && in_array($personal_accident_insurance_doc_extension,  $allowedExts))
{
	  if ($_FILES["personal_accident_insurance_doc"]["error"] > 0)
	  {
		$personal_accident_insurance_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['personal_accident_insurance_doc']['tmp_name'];
		   $name=$_FILES ['personal_accident_insurance_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $personal_accident_insurance_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$personal_accident_insurance_doc);
		  	$personal_accident_insurance_doc = $personal_accident_insurance_doc;
		}
} else{
 $personal_accident_insurance_doc = '';
}

$vacination_card_doc_extension = end(explode(".", $_FILES["vacination_card_doc"]["name"]));
if (($_FILES["vacination_card_doc"]["type"] == "application/pdf") || ($_FILES["vacination_card_doc"]["type"] == "application/msword") ||($_FILES["vacination_card_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["vacination_card_doc"]["type"] == "image/png") || ($_FILES["vacination_card_doc"]["type"]=="image/jpeg") || ($_FILES["vacination_card_doc"]["type"] == "image/jpg") && ($_FILES["vacination_card_doc"] ["size"] < 7340032) && in_array($vacination_card_doc_extension,  $allowedExts))
{
	  if ($_FILES["vacination_card_doc"]["error"] > 0)
	  {
		$vacination_card_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['vacination_card_doc']['tmp_name'];
		   $name=$_FILES ['vacination_card_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $vacination_card_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$vacination_card_doc);
		  	$vacination_card_doc = $vacination_card_doc;
		}
} else{
 $vacination_card_doc = '';
}


echo $sql="insert into tbl_truck_driver(f_name,l_name,email,contact_person_phone_mobile_code,phone_number,password,refrence_number,driver_license_doc,driver_license_doc_status,valid_goverment_id_doc,valid_goverment_id_doc_status,company_id_doc,company_id_doc_status,bio_data_doc,bio_data_doc_status,drug_test_result_doc,drug_test_result_doc_status,nbi_clearance_doc,nbi_clearance_doc_status,police_clearance_doc,police_clearance_doc_status,personal_accident_insurance_doc,personal_accident_insurance_doc_status,vacination_card_doc,vacination_card_doc_status,status,created,created_by)values('$f_name','$l_name','$email','$contact_person_phone_mobile_code','$phone_number','$password','$refrence_number','$driver_license_doc','0','$valid_goverment_id_doc','0','$company_id_doc','0','$bio_data_doc','0','$drug_test_result_doc','0','$nbi_clearance_doc','0','$police_clearance_doc','0','$personal_accident_insurance_doc','0','$vacination_card_doc','0','$status','$created','$created_by')"; 

$qrs=mysqli_query($connect,$sql);
header('Location:view.php?add=1'); 
Exit();	


?>