<?php
include("../conn-web/cw.php");
//include("function.php");
if(!$_SESSION["tata_login_username"]){
	header('location: index.php?mlogin=0'); 
}




$status=1;
$created = date('Y-m-d');
$created_by = '1';

$refrence_number='TARA'.date('ymdhi').mt_rand(1000,9999);



$company_name=mysqli_real_escape_string($connect,$_REQUEST['company_name']); 
$email=mysqli_real_escape_string($connect,$_REQUEST['email']); 
$contact_person=mysqli_real_escape_string($connect,$_REQUEST['contact_person']); 
$contact_person_phone_mobile_code=mysqli_real_escape_string($connect,$_REQUEST['contact_person_phone_mobile_code']); 
$contact_person_phone=mysqli_real_escape_string($connect,$_REQUEST['contact_person_phone']); 
$company_type=mysqli_real_escape_string($connect,$_REQUEST['company_type']); 
$password=md5($_REQUEST['password']); 


$allowedExts = array("pdf", "doc", "docx","png","jpg","jpeg","gif");


$business_permit_doc_extension = end(explode(".", $_FILES["business_permit_doc"]["name"]));
if (($_FILES["business_permit_doc"]["type"] == "application/pdf") || ($_FILES["business_permit_doc"]["type"] == "application/msword") ||($_FILES["business_permit_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["business_permit_doc"]["type"] == "image/png") || ($_FILES["business_permit_doc"]["type"]=="image/jpeg") || ($_FILES["business_permit_doc"]["type"] == "image/jpg") && ($_FILES["business_permit_doc"] ["size"] < 7340032) && in_array($business_permit_doc_extension,  $allowedExts))
{
	  if ($_FILES["business_permit_doc"]["error"] > 0)
	  {
		$business_permit_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['business_permit_doc']['tmp_name'];
		   $name=$_FILES ['business_permit_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $business_permit_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$business_permit_doc);
		  	$business_permit_doc = $business_permit_doc;
		}
} else{
 $business_permit_doc = '';
}


$bir_doc_extension = end(explode(".", $_FILES["bir_doc"]["name"]));
if (($_FILES["bir_doc"]["type"] == "application/pdf") || ($_FILES["bir_doc"]["type"] == "application/msword") ||($_FILES["bir_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["bir_doc"]["type"] == "image/png") || ($_FILES["bir_doc"]["type"]=="image/jpeg") || ($_FILES["bir_doc"]["type"] == "image/jpg") && ($_FILES["bir_doc"] ["size"] < 7340032) && in_array($bir_doc_extension,  $allowedExts))
{
	  if ($_FILES["bir_doc"]["error"] > 0)
	  {
		$bir_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['bir_doc']['tmp_name'];
		   $name=$_FILES ['bir_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $bir_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$bir_doc);
		  	$bir_doc = $bir_doc;
		}
} else{
 $bir_doc = '';
}


$cor_doc_extension = end(explode(".", $_FILES["cor_doc"]["name"]));
if (($_FILES["cor_doc"]["type"] == "application/pdf") || ($_FILES["cor_doc"]["type"] == "application/msword") ||($_FILES["cor_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["cor_doc"]["type"] == "image/png") || ($_FILES["cor_doc"]["type"]=="image/jpeg") || ($_FILES["cor_doc"]["type"] == "image/jpg") && ($_FILES["cor_doc"] ["size"] < 7340032) && in_array($cor_doc_extension,  $allowedExts))
{
	  if ($_FILES["cor_doc"]["error"] > 0)
	  {
		$cor_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['cor_doc']['tmp_name'];
		   $name=$_FILES ['cor_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $cor_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$cor_doc);
		  	$cor_doc = $cor_doc;
		}
} else{
 $cor_doc = '';
}


$ltfrb_doc_extension = end(explode(".", $_FILES["ltfrb_doc"]["name"]));
if (($_FILES["ltfrb_doc"]["type"] == "application/pdf") || ($_FILES["ltfrb_doc"]["type"] == "application/msword") ||($_FILES["ltfrb_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["ltfrb_doc"]["type"] == "image/png") || ($_FILES["ltfrb_doc"]["type"]=="image/jpeg") || ($_FILES["ltfrb_doc"]["type"] == "image/jpg") && ($_FILES["ltfrb_doc"] ["size"] < 7340032) && in_array($ltfrb_doc_extension,  $allowedExts))
{
	  if ($_FILES["ltfrb_doc"]["error"] > 0)
	  {
		$ltfrb_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['ltfrb_doc']['tmp_name'];
		   $name=$_FILES ['ltfrb_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $ltfrb_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$ltfrb_doc);
		  	$ltfrb_doc = $ltfrb_doc;
		}
} else{
 $ltfrb_doc = '';
}


$ppa_doc_extension = end(explode(".", $_FILES["ppa_doc"]["name"]));
if (($_FILES["ppa_doc"]["type"] == "application/pdf") || ($_FILES["ppa_doc"]["type"] == "application/msword") ||($_FILES["ppa_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["ppa_doc"]["type"] == "image/png") || ($_FILES["ppa_doc"]["type"]=="image/jpeg") || ($_FILES["ppa_doc"]["type"] == "image/jpg") && ($_FILES["ppa_doc"] ["size"] < 7340032) && in_array($ppa_doc_extension,  $allowedExts))
{
	  if ($_FILES["ppa_doc"]["error"] > 0)
	  {
		$ppa_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['ppa_doc']['tmp_name'];
		   $name=$_FILES ['ppa_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $ppa_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$ppa_doc);
		  	$ppa_doc = $ppa_doc;
		}
} else{
 $ppa_doc = '';
}
	

$ctap_doc_extension = end(explode(".", $_FILES["ctap_doc"]["name"]));
if (($_FILES["ctap_doc"]["type"] == "application/pdf") || ($_FILES["ctap_doc"]["type"] == "application/msword") ||($_FILES["ctap_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["ctap_doc"]["type"] == "image/png") || ($_FILES["ctap_doc"]["type"]=="image/jpeg") || ($_FILES["ctap_doc"]["type"] == "image/jpg") && ($_FILES["ctap_doc"] ["size"] < 7340032) && in_array($ctap_doc_extension,  $allowedExts))
{
	  if ($_FILES["ctap_doc"]["error"] > 0)
	  {
		$ctap_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['ctap_doc']['tmp_name'];
		   $name=$_FILES ['ctap_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $ctap_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$ctap_doc);
		  	$ctap_doc = $ctap_doc;
		}
} else{
 $ctap_doc = '';
}


$acto_doc_extension = end(explode(".", $_FILES["acto_doc"]["name"]));
if (($_FILES["acto_doc"]["type"] == "application/pdf") || ($_FILES["acto_doc"]["type"] == "application/msword") ||($_FILES["acto_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["acto_doc"]["type"] == "image/png") || ($_FILES["acto_doc"]["type"]=="image/jpeg") || ($_FILES["acto_doc"]["type"] == "image/jpg") && ($_FILES["acto_doc"] ["size"] < 7340032) && in_array($acto_doc_extension,  $allowedExts))
{
	  if ($_FILES["acto_doc"]["error"] > 0)
	  {
		$acto_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['acto_doc']['tmp_name'];
		   $name=$_FILES ['acto_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $acto_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$acto_doc);
		  	$acto_doc = $acto_doc;
		}
} else{
 $acto_doc = '';
}


$mayors_permit_doc_extension = end(explode(".", $_FILES["mayors_permit_doc"]["name"]));
if (($_FILES["mayors_permit_doc"]["type"] == "application/pdf") || ($_FILES["mayors_permit_doc"]["type"] == "application/msword") ||($_FILES["mayors_permit_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["mayors_permit_doc"]["type"] == "image/png") || ($_FILES["mayors_permit_doc"]["type"]=="image/jpeg") || ($_FILES["mayors_permit_doc"]["type"] == "image/jpg") && ($_FILES["mayors_permit_doc"] ["size"] < 7340032) && in_array($mayors_permit_doc_extension,  $allowedExts))
{
	  if ($_FILES["mayors_permit_doc"]["error"] > 0)
	  {
		$mayors_permit_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['mayors_permit_doc']['tmp_name'];
		   $name=$_FILES ['mayors_permit_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $mayors_permit_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$mayors_permit_doc);
		  	$mayors_permit_doc = $mayors_permit_doc;
		}
} else{
 $mayors_permit_doc = '';
}

$sec_certificate_doc_extension = end(explode(".", $_FILES["sec_certificate_doc"]["name"]));
if (($_FILES["sec_certificate_doc"]["type"] == "application/pdf") || ($_FILES["sec_certificate_doc"]["type"] == "application/msword") ||($_FILES["sec_certificate_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["sec_certificate_doc"]["type"] == "image/png") || ($_FILES["sec_certificate_doc"]["type"]=="image/jpeg") || ($_FILES["sec_certificate_doc"]["type"] == "image/jpg") && ($_FILES["sec_certificate_doc"] ["size"] < 7340032) && in_array($sec_certificate_doc_extension,  $allowedExts))
{
	  if ($_FILES["sec_certificate_doc"]["error"] > 0)
	  {
		$sec_certificate_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['sec_certificate_doc']['tmp_name'];
		   $name=$_FILES ['sec_certificate_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $sec_certificate_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$sec_certificate_doc);
		  	$sec_certificate_doc = $sec_certificate_doc;
		}
} else{
 $sec_certificate_doc = '';
}


$articles_of_incorporation_doc_extension = end(explode(".", $_FILES["articles_of_incorporation_doc"]["name"]));
if (($_FILES["articles_of_incorporation_doc"]["type"] == "application/pdf") || ($_FILES["articles_of_incorporation_doc"]["type"] == "application/msword") ||($_FILES["articles_of_incorporation_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["articles_of_incorporation_doc"]["type"] == "image/png") || ($_FILES["articles_of_incorporation_doc"]["type"]=="image/jpeg") || ($_FILES["articles_of_incorporation_doc"]["type"] == "image/jpg") && ($_FILES["articles_of_incorporation_doc"] ["size"] < 7340032) && in_array($articles_of_incorporation_doc_extension,  $allowedExts))
{
	  if ($_FILES["articles_of_incorporation_doc"]["error"] > 0)
	  {
		$articles_of_incorporation_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['articles_of_incorporation_doc']['tmp_name'];
		   $name=$_FILES ['articles_of_incorporation_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $articles_of_incorporation_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$articles_of_incorporation_doc);
		  	$articles_of_incorporation_doc = $articles_of_incorporation_doc;
		}
} else{
 $articles_of_incorporation_doc = '';
}


$inland_marine_insurance_doc_extension = end(explode(".", $_FILES["inland_marine_insurance_doc"]["name"]));
if (($_FILES["inland_marine_insurance_doc"]["type"] == "application/pdf") || ($_FILES["inland_marine_insurance_doc"]["type"] == "application/msword") ||($_FILES["inland_marine_insurance_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["inland_marine_insurance_doc"]["type"] == "image/png") || ($_FILES["inland_marine_insurance_doc"]["type"]=="image/jpeg") || ($_FILES["inland_marine_insurance_doc"]["type"] == "image/jpg") && ($_FILES["inland_marine_insurance_doc"] ["size"] < 7340032) && in_array($inland_marine_insurance_doc_extension,  $allowedExts))
{
	  if ($_FILES["inland_marine_insurance_doc"]["error"] > 0)
	  {
		$inland_marine_insurance_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['inland_marine_insurance_doc']['tmp_name'];
		   $name=$_FILES ['inland_marine_insurance_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $inland_marine_insurance_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$inland_marine_insurance_doc);
		  	$inland_marine_insurance_doc = $inland_marine_insurance_doc;
		}
} else{
 $inland_marine_insurance_doc = '';
}



$oc_cr_doc_extension = end(explode(".", $_FILES["oc_cr_doc"]["name"]));
if (($_FILES["oc_cr_doc"]["type"] == "application/pdf") || ($_FILES["oc_cr_doc"]["type"] == "application/msword") ||($_FILES["oc_cr_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["oc_cr_doc"]["type"] == "image/png") || ($_FILES["oc_cr_doc"]["type"]=="image/jpeg") || ($_FILES["oc_cr_doc"]["type"] == "image/jpg") && ($_FILES["oc_cr_doc"] ["size"] < 7340032) && in_array($oc_cr_doc_extension,  $allowedExts))
{
	  if ($_FILES["oc_cr_doc"]["error"] > 0)
	  {
		$oc_cr_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['oc_cr_doc']['tmp_name'];
		   $name=$_FILES ['oc_cr_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $oc_cr_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$oc_cr_doc);
		  	$oc_cr_doc = $oc_cr_doc;
		}
} else{
 $oc_cr_doc = '';
}



$pa_cpc_doc_extension = end(explode(".", $_FILES["pa_cpc_doc"]["name"]));
if (($_FILES["pa_cpc_doc"]["type"] == "application/pdf") || ($_FILES["pa_cpc_doc"]["type"] == "application/msword") ||($_FILES["pa_cpc_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["pa_cpc_doc"]["type"] == "image/png") || ($_FILES["pa_cpc_doc"]["type"]=="image/jpeg") || ($_FILES["pa_cpc_doc"]["type"] == "image/jpg") && ($_FILES["pa_cpc_doc"] ["size"] < 7340032) && in_array($pa_cpc_doc_extension,  $allowedExts))
{
	  if ($_FILES["pa_cpc_doc"]["error"] > 0)
	  {
		$pa_cpc_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['pa_cpc_doc']['tmp_name'];
		   $name=$_FILES ['pa_cpc_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $pa_cpc_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$pa_cpc_doc);
		  	$pa_cpc_doc = $pa_cpc_doc;
		}
} else{
 $pa_cpc_doc = '';
}


$deed_of_sale_doc_extension = end(explode(".", $_FILES["deed_of_sale_doc"]["name"]));
if (($_FILES["deed_of_sale_doc"]["type"] == "application/pdf") || ($_FILES["deed_of_sale_doc"]["type"] == "application/msword") ||($_FILES["deed_of_sale_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["deed_of_sale_doc"]["type"] == "image/png") || ($_FILES["deed_of_sale_doc"]["type"]=="image/jpeg") || ($_FILES["deed_of_sale_doc"]["type"] == "image/jpg") && ($_FILES["deed_of_sale_doc"] ["size"] < 7340032) && in_array($deed_of_sale_doc_extension,  $allowedExts))
{
	  if ($_FILES["deed_of_sale_doc"]["error"] > 0)
	  {
		$deed_of_sale_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['deed_of_sale_doc']['tmp_name'];
		   $name=$_FILES ['deed_of_sale_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $deed_of_sale_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$deed_of_sale_doc);
		  	$deed_of_sale_doc = $deed_of_sale_doc;
		}
} else{
 $deed_of_sale_doc = '';
}


$bank_certificate1_doc_extension = end(explode(".", $_FILES["bank_certificate1_doc"]["name"]));
if (($_FILES["bank_certificate1_doc"]["type"] == "application/pdf") || ($_FILES["bank_certificate1_doc"]["type"] == "application/msword") ||($_FILES["bank_certificate1_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["bank_certificate1_doc"]["type"] == "image/png") || ($_FILES["bank_certificate1_doc"]["type"]=="image/jpeg") || ($_FILES["bank_certificate1_doc"]["type"] == "image/jpg") && ($_FILES["bank_certificate1_doc"] ["size"] < 7340032) && in_array($bank_certificate1_doc_extension,  $allowedExts))
{
	  if ($_FILES["bank_certificate1_doc"]["error"] > 0)
	  {
		$bank_certificate1_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['bank_certificate1_doc']['tmp_name'];
		   $name=$_FILES ['bank_certificate1_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $bank_certificate1_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$bank_certificate1_doc);
		  	$bank_certificate1_doc = $bank_certificate1_doc;
		}
} else{
 $bank_certificate1_doc = '';
}


// $bank_certificate2_doc_extension = end(explode(".", $_FILES["bank_certificate2_doc"]["name"]));
// if (($_FILES["bank_certificate2_doc"]["type"] == "application/pdf") || ($_FILES["bank_certificate2_doc"]["type"] == "application/msword") ||($_FILES["bank_certificate2_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["bank_certificate2_doc"]["type"] == "image/png") || ($_FILES["bank_certificate2_doc"]["type"]=="image/jpeg") || ($_FILES["bank_certificate2_doc"]["type"] == "image/jpg") && ($_FILES["bank_certificate2_doc"] ["size"] < 7340032) && in_array($bank_certificate2_doc_extension,  $allowedExts))
// {
// 	  if ($_FILES["bank_certificate2_doc"]["error"] > 0)
// 	  {
// 		$bank_certificate2_doc = '';
// 	  }
// 	  else
// 	  {
// 		   $filetmp_name=$_FILES ['bank_certificate2_doc']['tmp_name'];
// 		   $name=$_FILES ['bank_certificate2_doc']['name'];
// 		   $randomNumber = rand(15,35);
// 		   $rn = $randomNumber.'-';		
// 		   $ext = strtolower(substr($name, strpos($name, '.') +1));
// 		   $name = $rn.str_replace(' ','-',trim($name));
// 		   $bank_certificate2_doc = $name;
		   
// 		   $path = "../documents/";
// 		   copy($filetmp_name,$path.$bank_certificate2_doc);
// 		  	$bank_certificate2_doc = $bank_certificate2_doc;
// 		}
// } else{
//  $bank_certificate2_doc = '';
// }



$fs_past_2yrs_doc_extension = end(explode(".", $_FILES["fs_past_2yrs_doc"]["name"]));
if (($_FILES["fs_past_2yrs_doc"]["type"] == "application/pdf") || ($_FILES["fs_past_2yrs_doc"]["type"] == "application/msword") ||($_FILES["fs_past_2yrs_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["fs_past_2yrs_doc"]["type"] == "image/png") || ($_FILES["fs_past_2yrs_doc"]["type"]=="image/jpeg") || ($_FILES["fs_past_2yrs_doc"]["type"] == "image/jpg") && ($_FILES["fs_past_2yrs_doc"] ["size"] < 7340032) && in_array($fs_past_2yrs_doc_extension,  $allowedExts))
{
	  if ($_FILES["fs_past_2yrs_doc"]["error"] > 0)
	  {
		$fs_past_2yrs_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['fs_past_2yrs_doc']['tmp_name'];
		   $name=$_FILES ['fs_past_2yrs_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $fs_past_2yrs_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$fs_past_2yrs_doc);
		  	$fs_past_2yrs_doc = $fs_past_2yrs_doc;
		}
} else{
 $fs_past_2yrs_doc = '';
}


$gps_device_doc_extension = end(explode(".", $_FILES["gps_device_doc"]["name"]));
if (($_FILES["gps_device_doc"]["type"] == "application/pdf") || ($_FILES["gps_device_doc"]["type"] == "application/msword") ||($_FILES["gps_device_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["gps_device_doc"]["type"] == "image/png") || ($_FILES["gps_device_doc"]["type"]=="image/jpeg") || ($_FILES["gps_device_doc"]["type"] == "image/jpg") && ($_FILES["gps_device_doc"] ["size"] < 7340032) && in_array($gps_device_doc_extension,  $allowedExts))
{
	  if ($_FILES["gps_device_doc"]["error"] > 0)
	  {
		$gps_device_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['gps_device_doc']['tmp_name'];
		   $name=$_FILES ['gps_device_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $gps_device_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$gps_device_doc);
		  	$gps_device_doc = $gps_device_doc;
		}
} else{
 $gps_device_doc = '';
}


$organizational_chart_doc_extension = end(explode(".", $_FILES["organizational_chart_doc"]["name"]));
if (($_FILES["organizational_chart_doc"]["type"] == "application/pdf") || ($_FILES["organizational_chart_doc"]["type"] == "application/msword") ||($_FILES["organizational_chart_doc"]["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") ||  ($_FILES["organizational_chart_doc"]["type"] == "image/png") || ($_FILES["organizational_chart_doc"]["type"]=="image/jpeg") || ($_FILES["organizational_chart_doc"]["type"] == "image/jpg") && ($_FILES["organizational_chart_doc"] ["size"] < 7340032) && in_array($organizational_chart_doc_extension,  $allowedExts))
{
	  if ($_FILES["organizational_chart_doc"]["error"] > 0)
	  {
		$organizational_chart_doc = '';
	  }
	  else
	  {
		   $filetmp_name=$_FILES ['organizational_chart_doc']['tmp_name'];
		   $name=$_FILES ['organizational_chart_doc']['name'];
		   $randomNumber = rand(15,35);
		   $rn = $randomNumber.'-';		
		   $ext = strtolower(substr($name, strpos($name, '.') +1));
		   $name = $rn.str_replace(' ','-',trim($name));
		   $organizational_chart_doc = $name;
		   
		   $path = "../documents/";
		   copy($filetmp_name,$path.$organizational_chart_doc);
		  	$organizational_chart_doc = $organizational_chart_doc;
		}
} else{
 $organizational_chart_doc = '';
}


echo $sql="insert into tbl_users(company_name,email,contact_person,role,phone,password,company_type,business_permit,bir,cor,ltfrb_franchise_certificate,ppa,membership_from_ctap,acto,mayors_permit,sec_certificate,articles_of_incorporation,inland_marine_insurance,oc_cr,pa_cpc,deed_of_sale,bank_certificate,fs_past_2year,gps_device,organizational_char,status,created,refrence_number)values('$company_name','$email','$contact_person','truck_partner','$contact_person_phone','$password','$company_type','$business_permit_doc','$bir_doc','$cor_doc','$ltfrb_doc','$ppa_doc','$ctap_doc','$acto_doc','$mayors_permit_doc','$sec_certificate_doc','$articles_of_incorporation_doc','$inland_marine_insurance_doc','$oc_cr_doc','$pa_cpc_doc','$deed_of_sale_doc','$bank_certificate1_doc','$fs_past_2yrs_doc','$gps_device_doc','$organizational_chart_doc','$status','$created','$refrence_number')"; 

$qrs=mysqli_query($connect,$sql);
 header('Location:view.php?add=1'); 
Exit();	


?>