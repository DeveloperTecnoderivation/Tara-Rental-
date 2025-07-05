<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Driver_model extends CI_Model 
{
	
	public function checkToken($token)
	{
		$this->db->where('token', $token);
		$this->db->where('role', 'driver');
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

	public function getidbyToken($token)
	{
		$this->db->select('tbl_users.id');
		$this->db->where('token', $token);
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


	public function check_truck_already_book_or_not($truck_id) 
	{
		$this->db->where('id', $truck_id);
		$this->db->where('driver_id !=', '0');
		$query = $this->db->get('tbl_truck');

		if($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function check_truck_available($truck_id,$user_id) 
	{
		$this->db->where('truck_id', $truck_id);
		$this->db->where('id !=', $user_id);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function check_chassis_available($chassis_id,$user_id) 
	{
		$this->db->where('chassis_id', $chassis_id);
		$this->db->where('id !=', $user_id);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function check_driver_already_selected($driver_id) 
	{
		$this->db->where('driver_id', $driver_id);
		$query = $this->db->get('tbl_truck');

		if($query->num_rows() > 0) {
			return $query->row();
		}
	}

	public function check_chassis_already_book_or_not($chassis_id) 
	{
		$this->db->where('id', $chassis_id);
		$this->db->where('driver_id !=', '0');
		$query = $this->db->get('tbl_truck');

		if($query->num_rows() > 0) {
			return $query->row();
		}
	}


	public function check_driver_truck_and_chessis($driver_id) 
	{
		$this->db->where('id', $driver_id);
		$this->db->where('truck_id !=','0');
		$this->db->where('chassis_id !=','0');
		$query = $this->db->get('tbl_users');

		if($query->num_rows() > 0) {
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

	public function updateTruckDriver($truck_id, $profileData)
	{
		
		$this->db->where('id', $truck_id);
		$result =  $this->db->update('tbl_truck', $profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function get_chessis_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function driver_selected_truct_and_chassis($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_new_job_order($driver_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_find_driver');
		$this->db->where('driver_id', $driver_id);
		$this->db->where('status', '0');
		$this->db->where('is_confirm', '0');
		// $this->db->where('is_deleted', '0');
		$query = $this->db->get();
		return $query->result();
	}


	public function updateTruckAndChassis($driver_id, $profileData)
	{
		
		$this->db->where('id', $driver_id);
		$result =  $this->db->update('tbl_users', $profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function updateJobOrderId($driver_id, $profileData)
	{
		
		$this->db->where('id', $driver_id);
		$result =  $this->db->update('tbl_find_driver', $profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}
	public function updateJobOrderOrderid($order_id, $profileData)
	{
		
		$this->db->where('order_id', $order_id);
		$result =  $this->db->update('tbl_find_driver', $profileData);
		if($result){
           return true;
       }else{
           return false;
       }

	}

	public function updateChassisDriver($chassis_id, $profileData)
	{
		
		$this->db->where('id', $chassis_id);
		$result =  $this->db->update('tbl_truck', $profileData);
		if($result){
           return true;
       }else{
           return false;
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

	public function get_truck_partner_details($table_name,$refrence_number)
	{
		$this->db->select('*');
		$this->db->where('refrence_number', $refrence_number);
		$this->db->from($table_name);
		$query = $this->db->get();
		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;

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

	public function insertRecord($categoryData,$table_name)
	{
		$this->db->insert($table_name, $categoryData);
		$result =  $this->db->insert_id();
		if($result){ return true; } else { return false; }
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

	public function check_truck_refrence_number($truck_refrence_number,$table_name)
	{
		
		$this->db->select('*');
		$this->db->where('refrence_number', $truck_refrence_number);
		$query = $this->db->get($table_name);

		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;
		
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

		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;

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



	public function get_hosting_details()
	{
		$this->db->select('tbl_admin.*');
		$this->db->from('tbl_admin');
		$query = $this->db->get();
		return $query->result();
	}

	public function updateProfile($id, $profileData)
	{
		// print_r($profileData);
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_users', $profileData);
		// $str = $this->db->last_query();
  //  		   echo "<pre>";
 	// 	  print_r($str);
 	// 	  die;
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

	public function check_new_job_order($job_order_id,$order_id) 
	{
		$this->db->where('id', $job_order_id);
		$this->db->where('order_id', $order_id);
		$query = $this->db->get('tbl_find_driver');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function get_car_type($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_vehicle_types');
		$this->db->where('id', $id);
		$query = $this->db->get();
		return $query->result();
	}


	public function checkUpdateCarVIN($vin,$car_id) 
	{
		$this->db->where('vin', $vin);
		$this->db->where('id!=', $car_id);
		$query = $this->db->get('tbl_car');
		return $query->num_rows();
		
	}

	public function checkCarVIN($vin) 
	{
		$this->db->where('vin', $vin);
		$query = $this->db->get('tbl_car');
		return $query->num_rows();
		
	}

	public function get_all_car_by_owner($car_owner_id,$table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('car_owner_id', $car_owner_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_availability_car_by_owner($car_owner_id,$table_name)
	{
		
	    $current_date = date('Y-m-d');
		$query = "select *
	    from tbl_car 
	    where id NOT IN (select car_id from tbl_car_order_booking where car_owner_id = '$car_owner_id' and pickup_date >= '$current_date') AND car_owner_id ='$car_owner_id'";

  		$query = $this->db->query($query);
		return $query->result();
	
	}

	public function get_all_booking_car_by_owner($car_owner_id,$table_name)
	{
		
	    $current_date = date('Y-m-d');
		$query = "select *
	    from tbl_car 
	    where id IN (select car_id from tbl_car_order_booking where car_owner_id = '$car_owner_id' and pickup_date >= '$current_date') AND car_owner_id ='$car_owner_id'";

  		$query = $this->db->query($query);
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
		$query = $this->db->get();
		return $query->result();
	}

	public function get_min_max_price($car_id)
	{
		
		$this->db->select('*');
		$this->db->from('tbl_car');
		$this->db->where('id', $car_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function check_car_price($car_id,$start)
	{
		
		$this->db->select('*');
		$this->db->where('car_id', $car_id);
		// $this->db->where('price', $price);
		$this->db->where('start', $start);
		$query = $this->db->get('tbl_car_price_calender');

		if($query->num_rows() >= 1) {
			return true;
		} else
		{ 
			return false;
		}
		
	}


	public function check_calender_price($car_id,$date)
	{
		
		$this->db->select('*');
		$this->db->where('car_id', $car_id);
		// $this->db->where('price', $price);
		$this->db->where('start', $date);
		$query = $this->db->get('tbl_car_price_calender');

		if($query->num_rows() >= 1) {
			return true;
		} else
		{ 
			return false;
		}
		
	}

	public function check_car($car_id)
	{
		
		$this->db->select('*');
		$this->db->where('id', $car_id);
		$query = $this->db->get('tbl_car');

		if($query->num_rows() >= 1) {
			return true;
		} else
		{ 
			return false;
		}
		
	}

	public function updateRecord($id,$tokenData,$table_name)
	{
		$this->db->where('id', $id);
		$result = $this->db->update($table_name, $tokenData);
		
		 if($result){ 
	 	return true;
	 	 } else { return false; }
	}

	public function updateCalenderPrice($car_id,$date,$tokenData,$table_name)
	{
		$this->db->where('car_id', $car_id);
		$this->db->where('start', $date);
		$result = $this->db->update($table_name, $tokenData);
		
		 if($result){ 
	 	return true;
	 	 } else { return false; }
	}

	public function get_all_car_calendar_pricing($car_id,$startDate,$endDate,$table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('car_id', $car_id);

		$this->db->group_start();
		$this->db->where('start >= ', $startDate);
		$this->db->where('start <=', $endDate);
		$this->db->group_end();

		$query = $this->db->get();

		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;

		return $query->result();
	}

	public function get_car_min_max_pricing($car_id,$table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('id', $car_id);

		// $this->db->group_start();
		// $this->db->where('start <= ', $startDate);
		// $this->db->where('start >=', $endDate);
		// $this->db->group_end();

		$query = $this->db->get();

			// $str = $this->db->last_query();
	  //  		   echo "<pre>";
	 	// 	  print_r($str);
	 	// 	  die;

		return $query->result();
	}

	public function get_car_location($id,$table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('id', $id);
		$query = $this->db->get();

		return $query->result();
	}

	public function userdelete($id,$table_name){
		$this->db->where('id', $id);
		$result = $this->db->delete($table_name);
		if($result){ return true; } else { return false; }
	}

	public function get_single_car_details($car_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_car');
		$this->db->where('id', $car_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_booking($loginUserId,$car_id,$booking_status,$from_date,$to_date)
	{
		
	    $current_date = date('Y-m-d');

	    if(!empty($car_id)){ 
	    	$this->db->where('car_id', $car_id);
	    } 

	    if(!empty($booking_status)){ 
	       $this->db->where('booking_status', $booking_status);
	    } 

	    if(!empty($from_date)){ 
	       $this->db->where('pickup_date >=', $from_date);
	    } 
	    if(!empty($to_date)){ 
	       $this->db->where('pickup_date <=', $to_date);
	    } 

	    $this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('car_owner_id', $loginUserId);
		// $this->db->where('pickup_date >=', $current_date);
		$this->db->order_by('pickup_date','asc');
       	$query = $this->db->get();

       	
		return $query->result();
	
	
	}

	public function get_all_trucks($truck_partner_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck');
		$this->db->where('truck_partner_id', $truck_partner_id);
		$this->db->where('types', 'truck');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_all_chassis($truck_partner_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck');
		$this->db->where('truck_partner_id', $truck_partner_id);
		$this->db->where('types', 'chassis');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_trailer_type_name($trailer_type)
	{
		$this->db->select('*');
		$this->db->where('id', $trailer_type);
		$this->db->from('tbl_chassis_trailer_type');
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


	public function get_booking_details_by_order_id($order_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get();
		return $query->result();
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

	public function get_all_truck_transaction_history($driver_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('select_driver_id', $driver_id);
		$this->db->where('status !=', '2');
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

	public function get_single_user_details($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $user_id);
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


	

}
