<?php
include("../conn-web/cw.php");


echo $pid=$_REQUEST['id'];

		
mysqli_query($connect,"DELETE FROM tbl_truck_driver WHERE id='$pid'");
echo "1";
?>