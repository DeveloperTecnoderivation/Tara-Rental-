<?php
include("../conn-web/cw.php");


if(isset($_REQUEST['table_name']))

{

  	$name = $_REQUEST['name'];
  	$make_id = $_REQUEST['make_id'];
  	$table_name = $_REQUEST['table_name'];
	
	 $getdata="select * from  $table_name where (name='$name' AND make_id='$make_id')"; 
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