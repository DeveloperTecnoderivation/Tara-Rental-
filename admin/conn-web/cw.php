<?php
ob_start();
session_start();
error_reporting(1);
// $dbhost ="localhost";
// $dbuser="root";
// $dbpwd="";
// $dbname="tara_taxi";

$dbhost ="localhost";
$dbuser="tarataxi_taxi_ride";
$dbpwd="tara_taxi@12345678";
$dbname="tarataxi_taxi_ride";

$connect=mysqli_connect($dbhost,$dbuser,$dbpwd,$dbname);

$base_url= 'http://localhost/tara_rental/admin';
$image_url= 'http://localhost/tara_rental/documents';
$qr_image_url= 'http://localhost/tara_rental/api/assets/qrcode';

// $base_url= 'https://tarataxi.technoderivation.com/admin';


$GOOGLE_MAP_RIDER_KEY = 'AIzaSyBGVTJ0oA341P5FY4WRXGtihr8B912ROeE';


//mysql_select_db($dbname,$connect);
//$title="Nifno";
/*if(!$connect){
	echo 'not connected';
}else{
	echo 'connected';
}*/


?>