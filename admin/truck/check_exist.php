<?php
include("../conn-web/cw.php");


if(isset($_REQUEST['table_name']))

{

  	$plate_no = $_REQUEST['plate_no'];
  	$table_name = $_REQUEST['table_name'];
  	// $refrence_number = $_REQUEST['refrence_number'];
	
	$getdata="select * from  $table_name where (plate_no='$plate_no')"; 
    $gdata=mysqli_query($connect,$getdata);
    $rowcount=mysqli_num_rows($gdata);


	if($rowcount>0)
	{
		echo "plate_no_error";
	
			
	}else{

		echo "success";

	}	


}

?>