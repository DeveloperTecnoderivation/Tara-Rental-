<?php
include("../conn-web/cw.php");
$pid=$_REQUEST['pid'];

		
mysqli_query($connect,"DELETE FROM tbl_notifications WHERE id='$pid'");
header('Location:view.php?delete=1'); 
Exit();
?>