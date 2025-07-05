<?php
include("../conn-web/cw.php");
$jsonStr = file_get_contents('php://input'); 
$jsonObj = json_decode($jsonStr); 


 
if($jsonObj->request_type == 'addEvent'){ 
    $start = $jsonObj->start; 
    $end = $jsonObj->end; 
    $car_id = $jsonObj->car_id; 
 
    $event_data = $jsonObj->event_data; 
    $eventPrice = !empty($event_data[0])?$event_data[0]:''; 
    // $eventDesc = !empty($event_data[1])?$event_data[1]:''; 
    // $eventURL = !empty($event_data[2])?$event_data[2]:''; 
     
    if(!empty($eventPrice)){ 
        // Insert event data into the database 
        $created = date('Y-m-d');

        echo $sql="insert into tbl_car_price_calender(car_id,price,start,end,created,status)values('$car_id','$eventPrice','$start','$end','$created','1')"; 

		$qrs=mysqli_query($connect,$sql);

 
        if($qrs){ 
            $output = [ 
                'status' => 1 
            ]; 
            echo json_encode($output); 
        }else{ 
            echo json_encode(['error' => 'Price Add request failed!']); 
        } 
    } 
}elseif($jsonObj->request_type == 'editEvent'){ 
    $start = $jsonObj->start; 
    $end = $jsonObj->end; 
    $event_id = $jsonObj->event_id; 
 
    $event_data = $jsonObj->event_data; 
    $eventTitle = !empty($event_data[0])?$event_data[0]:''; 

    $prefix = 'P3,';
	$str = $eventTitle;
	$eventTitle = preg_replace('/^' . preg_quote($prefix, '/') . '/', '', $eventTitle);

    // echo substr($eventTitle, 0, 3);

    // $eventDesc = !empty($event_data[1])?$event_data[1]:''; 
    // $eventURL = !empty($event_data[2])?$event_data[2]:''; 
     
    if(!empty($eventTitle)){ 
        // Update event data into the database 

    	echo	$updt="update tbl_car_price_calender set price='$eventTitle' where id = $event_id "; 
			$update= mysqli_query($connect,$updt);


        // $sqlQ = "UPDATE events SET title=?,description=?,url=?,start=?,end=? WHERE id=?"; 
        // $stmt = $db->prepare($sqlQ); 
        // $stmt->bind_param("sssssi", $eventTitle, $eventDesc, $eventURL, $start, $end, $event_id); 
        // $update = $stmt->execute(); 
 
        if($update){ 
            $output = [ 
                'status' => 1 
            ]; 
            echo json_encode($output); 
        }else{ 
            echo json_encode(['error' => 'Price Update request failed!']); 
        } 
    } 
}elseif($jsonObj->request_type == 'deleteEvent'){ 
    $id = $jsonObj->event_id; 
 	
 	$delete =  mysqli_query($connect,"DELETE FROM tbl_car_price_calender WHERE id='$id'");
    // $sql = "DELETE FROM events WHERE id=$id"; 
    // $delete = $db->query($sql); 
    if($delete){ 
        $output = [ 
            'status' => 1 
        ]; 
        echo json_encode($output); 
    }else{ 
        echo json_encode(['error' => 'Price Delete request failed!']); 
    } 
} 
?>