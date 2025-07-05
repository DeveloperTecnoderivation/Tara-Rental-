<?php
include("../conn-web/cw.php");


if(isset($_REQUEST['table_name']))

{

  	$email = $_REQUEST['email'];
  	$phone_number = $_REQUEST['phone_number'];
  	$table_name = $_REQUEST['table_name'];
  	$pid = $_REQUEST['pid'];
	
	$getdata="select * from  $table_name where id != $pid AND (email='$email' or phone_number='$phone_number')"; 
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

		echo "success";

	}


}

?>