<?php
include("../conn-web/cw.php");


if(isset($_REQUEST['table_name']))

{

  	$email = $_REQUEST['email'];
  	$contact_person_phone = $_REQUEST['contact_person_phone'];
  	$table_name = $_REQUEST['table_name'];
	
	$getdata="select * from  $table_name where (email='$email' or contact_person_phone='$contact_person_phone')"; 
    $gdata=mysqli_query($connect,$getdata);
    $rowcount=mysqli_num_rows($gdata);


	if($rowcount>0)
	{
		$row=mysqli_fetch_array($gdata);
		if($email==$row['email'])
        {
           echo "email_error";
        }else if($contact_person_phone==$row['contact_person_phone'])
		{
		   echo "phone_error";
		}
			
	}else{

		echo "success";

	}	


}

?>