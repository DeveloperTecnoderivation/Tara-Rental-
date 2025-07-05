<?php

include("../conn-web/cw.php");


$car_id = $_POST['car_id'];

$getdata="select * from tbl_car where id=$car_id";  
$gdata=mysqli_query($connect,$getdata);
$rown=mysqli_fetch_array($gdata);

 // echo json_encode($rown); 
if($rown){
  echo json_encode($rown); 
}else{
 echo json_encode($rown); 
}

?>