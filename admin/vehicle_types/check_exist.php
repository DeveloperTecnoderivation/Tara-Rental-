<?php
include("../conn-web/cw.php");


if(isset($_REQUEST['table_name']))

{

  	$name = $_REQUEST['name'];
  	$table_name = $_REQUEST['table_name'];
	
	 $getdata="select * from  $table_name where name='$name'"; 
    $gdata=mysqli_query($connect,$getdata);
    $rowcount=mysqli_num_rows($gdata);


	if($rowcount>0)
	{
		$row=mysqli_fetch_array($gdata);
		if($name==$row['name'])
        {
           echo "name_error";
        }
			
	}else{

		echo "success";

	}	


}

?>