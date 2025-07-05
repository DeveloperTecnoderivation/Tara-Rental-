<?php
include("../conn-web/cw.php");


if(isset($_REQUEST['table_name']))

{

  	$email = $_REQUEST['email'];
  	$phone_number = $_REQUEST['phone_number'];
  	$table_name = $_REQUEST['table_name'];
  	$refrence_number = $_REQUEST['refrence_number'];
	
	$getdata="select * from  $table_name where (email='$email' or phone_number='$phone_number')"; 
    $gdata=mysqli_query($connect,$getdata);
    $rowcount=mysqli_num_rows($gdata);


	if($rowcount>0)
	{
		$row=mysqli_fetch_array($gdata);
		if($email==$row['email'])
        {
           echo "email_error";
        }else if($phone_number==$row['phone_number'])
		{
		   echo "phone_error";
		}
			
	}else{

		// echo "select * from  tbl_truck_partner where refrence_number='$refrence_number'";
		$qr=mysqli_query($connect,"select * from  tbl_truck_partner where refrence_number='$refrence_number'");
		$row=mysqli_num_rows($qr);
		if($row>0)
		{

			echo "success";

	  }else{
	  		
	  		echo "refrence_error";
	  }

		

	}	


}

?>