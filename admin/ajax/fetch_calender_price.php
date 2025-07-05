<?php
include("../conn-web/cw.php");
// Filter events by calendar date 
$where_sql = ''; 
// if(!empty($_GET['start']) && !empty($_GET['end'])){ 
//     $where_sql .= " WHERE start BETWEEN '".$_GET['start']."' AND '".$_GET['end']."' and car_id= '".$_GET['car_id']."' "; 
// } 

// $where_sql .= " WHERE car_id= '".$_GET['car_id']."' "; 
 
// Fetch events from database 
// $sql = "SELECT * FROM tbl_car_price_calender $where_sql"; 
// $result = $db->query($sql);  
 
// $get_product="select * from tbl_car_price_calender $where_sql ";  
// $results_state=mysqli_query($connect,$get_product);



$get_car="select * from tbl_car where id ='".$_GET['car_id']."'";  
$results_car=mysqli_query($connect,$get_car);
$rown_car=mysqli_fetch_array($results_car);

$min_price = $rown_car['min_price']; 
$max_price = $rown_car['max_price']; 
$start_date = $_GET['start'];
$end_date = $_GET['end'];
$car_id = $_GET['car_id'];

$startTime = strtotime($start_date);
$endTime = strtotime($end_date);

// Loop between timestamps, 24 hours at a time
$eventsArr = array(); 

for ( $i = $startTime; $i <= $endTime; $i = $i + 86400 ) {
    $where_sql = '';
    $thisDate = date( 'Y-m-d', $i);

    $timestamp = strtotime($thisDate);
    $day = date('l', $timestamp);
    
    if(($day=='Saturday') || ($day=='Sunday')){
      $car_price  = $max_price;
    }else{
      $car_price  = $min_price;
    }

    $where_sql .= " WHERE start = '".$thisDate."' and car_id= '".$_GET['car_id']."' "; 

    $get_product="select * from tbl_car_price_calender $where_sql ";  
    $results_state=mysqli_query($connect,$get_product);
    $rowcount=mysqli_num_rows($results_state);


    if($rowcount>0)
    {
        $row=mysqli_fetch_array($results_state);
        $new_car_price = $row['price'];
    }else{
        $new_car_price = $car_price;
    }   
   
    $rowsd = array(
                'title' =>"P3,".$new_car_price,
                // 'id' =>$row['id'],
                'car_id' =>$car_id,
                'start' =>$thisDate,
        );
    // print_r($rowsd);
    array_push($eventsArr, $rowsd); 

  // echo  // 2010-05-01, 2010-05-02, etc
}

echo json_encode($eventsArr);


?>