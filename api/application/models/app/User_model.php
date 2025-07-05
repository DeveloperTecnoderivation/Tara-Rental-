<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model 
{
	
	public function checkToken($token)
	{
		$this->db->where('token', $token);
		// $this->db->where('role', 'user');
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_users');
		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die; 

		if($query->num_rows() == 1) {
			return true;
		}
		return false; 
	} 

	public function checkTokenUser($token)
	{
		$this->db->where('token', $token);
		$this->db->where('role', 'user');
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_users');
		if($query->num_rows() == 1) {
			return true;
		}
		return false; 
	} 

	public function getidbyToken($token)
	{
		$this->db->select('tbl_users.id');
		$this->db->where('token', $token);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	} 

	public function get_record($table_name,$token)
	{
		$this->db->select('*');
		$this->db->where('token', $token);
		$this->db->from($table_name);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_records($table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('status', 1);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_all_car_transaction_history($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_trailer_chassis_type($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_chassis_trailer_type');
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->result();
	}


	public function get_all_truck_transaction_history($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('user_id', $user_id);
		$this->db->where('status !=', '2');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	public function insertRecord($categoryData,$table_name)
	{
		$this->db->insert($table_name, $categoryData);
		$result =  $this->db->insert_id();
		if($result){ return $result; } else { return false; }
	}


	public function check_email($email,$table_name)
	{
		
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get($table_name);

		if($query->num_rows() >= 1) {
			return true;
		} else
		{ 
			return false;
		}
		
	}

	public function check_phone($phone,$table_name)
	{
		
		$this->db->select('*');
		$this->db->where('phone', $phone);
		$query = $this->db->get($table_name);

		if($query->num_rows() >= 1) {
			return true;
		} else
		{ 
			return false;
		}
		
	}

	public function check_login($email, $password) 
	{
		
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function check_driver_truck_and_chessis($driver_id,$trailer_chassis_type_id) 
	{
		
		$this->db->where('driver_id', $driver_id);
		$this->db->where('trailer_type', $trailer_chassis_type_id);
		$query = $this->db->get('tbl_truck');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}


	public function check_driver_rating_details($user_id,$driver_id,$order_id) 
	{
		
		$this->db->where('user_id', $user_id);
		$this->db->where('driver_id', $driver_id);
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('tbl_truck_driver_rating');

			// $str = $this->db->last_query();
	  //  		   echo "<pre>";
	 	// 	  print_r($str);
	 	// 	  die;

		if($query->num_rows() > 0) {
			return $query->row();
		}
	}


	public function check_car_rating_details($user_id,$car_id,$order_id) 
	{
		
		$this->db->where('user_id', $user_id);
		$this->db->where('car_id', $car_id);
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('tbl_car_rating');

		if($query->num_rows() > 0) {
			return $query->row();
		}
	}



	public function check_car_available($car_id,$pickup_date) 
	{
		$this->db->group_start();
		$this->db->where('pickup_date <= ', $pickup_date);
		$this->db->where('return_date >=', $pickup_date);
		$this->db->group_end();

		$this->db->where('car_id', $car_id);
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_car_order_booking');

		// $str = $this->db->last_query();
		// echo "<pre>";
		// print_r($str);

		if($query->num_rows() > 0) {
			return 1;
		}else{
 			return 0;
		}
	}


	public function check_email_forgot($email,$table_name)
	{
		
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get($table_name);

		if($query->num_rows() == 1) {
			return $query->row();
		}
		
	}

	public function updateToken($id,$tokenData)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('tbl_users', $tokenData);
		 if($result){ 
	 	return true;
	 	 } else { return false; }
	}

	public function getTokenData($id) 
	{

		$this->db->where('id', $id);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() >= 1) {
			return $query->row();
		}
	}

	public function getTokenDataEmail($email) 
	{

		$this->db->where('email', $email);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() >= 1) {
			return $query->row();
		}
	}
	public function updateTokenEmail($email,$tokenData)
	{
		$this->db->where('email', $email);
		$result = $this->db->update('tbl_users', $tokenData);
		 if($result){ 
	 	return true;
	 	 } else { return false; }
	}

	public function updateWallet($id,$walletData)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('tbl_users', $walletData);
		 if($result){ 
	 	return true;
	 	 } else { return false; }
	}



	public function get_hosting_details()
	{
		$this->db->select('tbl_admin.*');
		$this->db->from('tbl_admin');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_car_details($car_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_car');
		$this->db->where('id', $car_id);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_booking_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_truck_booking_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}


	public function check_user_last_order($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('user_id', $user_id);
		$this->db->order_by('id', 'DESC');
		$this->db->limit(1);

			// $str = $this->db->last_query();
	  //  		   echo "<pre>";
	 	// 	  print_r($str);
	 	// 	  die; 


		$query = $this->db->get();
		return $query->result();
	}

	public function get_chessis_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_truck_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}


	


	public function updateProfile($id, $profileData)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_users', $profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function check_profile_email($userid, $email) 
	{
		$this->db->where('email', $email);
		$this->db->where('id!=', $userid);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function check_email_phone_otp($email,$phone,$otp, $table) 
	{
		$this->db->where('email', $email);
		$this->db->where('phone', $phone);
		$this->db->where('otp', $otp);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function check_find_drivers_order($order_id,$driver_id) 
	{
		$this->db->where('order_id', $order_id);
		$this->db->where('driver_id', $driver_id);
		$query = $this->db->get('tbl_find_driver');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function check_confirm_find_drivers_order($order_id) 
	{
		$this->db->where('order_id', $order_id);
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_find_driver');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}
	
	public function updateOTP($email,$phone, $profileData)
	{
		
		$this->db->where('email', $email);
		$this->db->where('phone', $phone);
		$result =  $this->db->update('tbl_users', $profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function update_location($id,$profileData)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_users',$profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}


	public function update_qr($id,$profileData)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_car_order_booking',$profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function update_truck_qr($id,$profileData)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_truck_order_booking',$profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function update_driver_id($id,$profileData)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_truck_order_booking',$profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function update_find_driver_deleted($order_id,$profileData)
	{
		
		$this->db->where('order_id', $order_id);
		$result =  $this->db->update('tbl_find_driver',$profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function delete_truck_booking($order_id){
		$this->db->where('order_id', $order_id);
		$result = $this->db->delete('tbl_truck_order_booking');
		if($result){ return true; } else { return false; }
	}

	public function delete_find_driver($order_id){
		$this->db->where('order_id', $order_id);
		$result = $this->db->delete('tbl_find_driver');
		if($result){ return true; } else { return false; }
	}

	public function update_booking_status($id,$profileData)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_truck_order_booking',$profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function get_all_car_by_lat_lng($lat,$lng,$dist)
	{
		$query = "select *, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat - lat)*pi()/180/2),2)
          +COS($lat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN((lng-lng)*pi()/180/2),2))) 
          as distance FROM tbl_car WHERE 
          lng between (lng-$dist/cos(radians($lat))*69) 
          and (lng+$dist/cos(radians($lat))*69) 
          and lat between ($lat-($dist/69)) 
          and ($lat+($dist/69)) 
          having distance < $dist and car_availability = '1' and status = '1' ";     
	    $query = $this->db->query($query);
	    return $query->result();
	
	}


	public function find_driver_with_pickup_port($lat,$lng,$dist,$trailer_type)
	{
		 $query = "select *, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat - lat)*pi()/180/2),2)
          +COS($lat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN((lng-lng)*pi()/180/2),2))) 
          as distance FROM tbl_users WHERE 
          lng between (lng-$dist/cos(radians($lat))*69) 
          and (lng+$dist/cos(radians($lat))*69) 
          and lat between ($lat-($dist/69)) 
          and ($lat+($dist/69)) 
          having distance < $dist  and trailer_type = '$trailer_type' and truck_id != '0' and chassis_id != '0' and status = '1' ";     
	    $query = $this->db->query($query);
	    return $query->result();
	
	}

	public function get_all_car_by_filter($lat,$lng,$dist,$price_range,$car_type,$transmission,$car_name)
	{
		
		// if(!empty($price_range)){ 
	 //        $priceRangeArr = explode(';', $price_range); 
	 //        $whereSQL = "AND price.price BETWEEN ".$priceRangeArr[0]." AND ".$priceRangeArr[1].""; 
	 //    } 

	    // if(!empty($brand)){ 
	    //     $whereSQLBrand = "AND car_make LIKE '%$brand'"; 
	    // } 

	    if(!empty($car_type)){ 
	        $whereSQLCarType = "AND car_type LIKE '%$car_type'";
	    } 

	    if(!empty($transmission)){ 
	        $whereSQLTransmission = "AND transmission LIKE '%$transmission'";
	    } 

	    if(!empty($car_name)){ 
	        $whereSQLCarName = "AND ((brand LIKE '%" . $car_name . "%') OR (model LIKE '%" . $car_name . "%'))"; 
	    } 

	    $current_date = date('Y-m-d');

	    $query = "select DISTINCT tbl_car.id, tbl_car.*, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat - lat)*pi()/180/2),2)
          +COS($lat*pi()/180 )*COS(lat*pi()/180)
          *POWER(SIN((lng-lng)*pi()/180/2),2))) 
          as distance FROM tbl_car WHERE 
          lng between (lng-$dist/cos(radians($lat))*69) 
          and (lng+$dist/cos(radians($lat))*69) 
          and lat between ($lat-($dist/69)) 
          and ($lat+($dist/69)) 
          having distance < $dist and status = '1'  {$whereSQLCarType} {$whereSQLTransmission} {$whereSQLCarName}";

          // echo $query = "select DISTINCT car.id, car.*, price.price as car_price, price.start as start_date, 3956 * 2 * ASIN(SQRT( POWER(SIN(($lat - lat)*pi()/180/2),2)
          // +COS($lat*pi()/180 )*COS(lat*pi()/180)
          // *POWER(SIN((lng-lng)*pi()/180/2),2))) 
          // as distance FROM tbl_car car left outer join tbl_car_price_calender price on car.id=price.car_id WHERE 
          // lng between (lng-$dist/cos(radians($lat))*69) 
          // and (lng+$dist/cos(radians($lat))*69) 
          // and lat between ($lat-($dist/69)) 
          // and ($lat+($dist/69)) 
          // having distance < $dist and car.status = '1' and price.start = '$current_date'  {$whereSQL} {$whereSQLCarType} {$whereSQLTransmission} {$whereSQLCarName}";

  
	    $query = $this->db->query($query);
	    return $query->result();
	
	}



	public function get_all_car()
	{
		$this->db->select('*');
		$this->db->from('tbl_car');
		$this->db->where('car_availability', '1');
		
		$query = $this->db->get();

		return $query->result();
	}


	public function check_book_car($car_id,$current_date)
	{
		$this->db->select('*');
		$this->db->from('tbl_car_order_booking');

		$this->db->where('pickup_date <= ', $current_date);
		$this->db->where('return_date >=', $current_date);
		$this->db->where('booking_status !=','Cancelled');

		$this->db->where('car_id', $car_id);
		$query = $this->db->get();

		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;


		return $query->result();
	}

	public function check_truck_booking_details($user_id,$pickup_port,$trailer_chassis_type_id,$delivery_address_lat,$delivery_address_lng,$total_amount)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');

		$this->db->where('user_id', $user_id);
		$this->db->where('pickup_port', $pickup_port);
		$this->db->where('trailer_chassis_type_id', $trailer_chassis_type_id);
		$this->db->where('delivery_address_lat', $delivery_address_lat);
		$this->db->where('delivery_address_lng', $delivery_address_lng);
		$this->db->where('total_amount', $total_amount);
		$this->db->where('status', '2');
		$query = $this->db->get();
		return $query->result();
	}


	public function check_truck_booking($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_make($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_vehicle_brand');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_car_type($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_vehicle_types');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_model($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_vehicle_models');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_price($car_id,$current_date)
	{
		$this->db->select('*');
		$this->db->from('tbl_car_price_calender');
		$this->db->where('car_id', $car_id);
		$this->db->where('start', $current_date);

		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;


		$query = $this->db->get();
		return $query->result();
	}

	public function get_single_car_details($car_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_car');
		$this->db->where('id', $car_id);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_single_user_details($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_pickup_port_details($port)
	{
		$this->db->select('*');
		$this->db->where('port', $port);
		$this->db->from('tbl_pick_up_port');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_car_all_rating($car_id)
	{
		$this->db->select('*');
		$this->db->where('car_id', $car_id);
		$this->db->from('tbl_car_rating');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_driver_all_rating($driver_id)
	{
		$this->db->select('*');
		$this->db->where('driver_id', $driver_id);
		$this->db->from('tbl_truck_driver_rating');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_average_rating($car_id) {
    $this->db->select_avg('rating');
    $this->db->where('car_id', $car_id);
    $query = $this->db->get('tbl_car_rating');
    $result = $query->row();

    return round($result->rating, 1); // e.g., 4.3
}

	public function get_fair_management($types)
	{
		$this->db->select('*');
		$this->db->where('types', $types);
		$this->db->from('tbl_fair_management');
		$query = $this->db->get();
		return $query->result();
	}


	public function driver_total_rating($driver_id)
	{
		$this->db->select('*');
		$this->db->where('driver_id', $driver_id);
		$this->db->from('tbl_truck_driver_rating');
		$query = $this->db->get();
		return $query->result();
	}


	public function driver_total_trip($driver_id) 
	{	
		// echo $userid;
		$this->db->where('select_driver_id', $driver_id);
		$this->db->where('status','13');
		$query = $this->db->get('tbl_truck_order_booking');
		return $query->num_rows();
	}

	public function get_single_record_by_id($user_id)
	{
		
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		return $query->result();
	} 

	public function get_all_notification($user_id,$notification_type)
	{

			// echo $user_id;
		    $current_date = date('Y-m-d');
			$this->db->select('*');
			$this->db->from('tbl_notifications');
			
			$this->db->where("FIND_IN_SET(" . $this->db->escape($user_id) . ", users_id) >", 0);
			$this->db->order_by("id", "desc");

			if($notification_type == 'short'){
				$this->db->limit(5);
			}
			if($notification_type == 'all'){
				$this->db->limit(500000);
			}
			
			$query = $this->db->get();

			
			return $query->result();
		
	}

	public function get_all_notification_count($user_id)
	{
		
		$current_date = date('Y-m-d');
		
		$this->db->select('*');
		$this->db->from('tbl_notifications');
		$this->db->where('status', '1');
		$this->db->where("FIND_IN_SET(" . $this->db->escape($user_id) . ", users_id) >", 0);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		
		return $query->num_rows();
	}

	public function get_notification_count($user_id)
	{
		
		$current_date = date('Y-m-d');
		
		$this->db->select('*');
		$this->db->from('tbl_notifications');
		$this->db->where('status', '1');
		$this->db->where('created', $current_date);
		$this->db->where("FIND_IN_SET(" . $this->db->escape($user_id) . ", users_id) >", 0);
		$this->db->order_by("id", "desc");
		$query = $this->db->get();
		return $query->num_rows();
	}

	
	
}
