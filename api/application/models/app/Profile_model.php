<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_model extends CI_Model 
{
	
	public function checkToken($token)
	{
		$this->db->where('token', $token);
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

	public function account_delete($id, $profileData)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('tbl_users', $profileData);
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



	public function get_current_booking($loginUserId)
	{
		
	    $current_date = date('Y-m-d');

	    $this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('user_id', $loginUserId);
		$this->db->where('pickup_date >=', $current_date);
		$this->db->order_by('pickup_date','asc');
        $this->db->limit(1);  

		$query = $this->db->get();
		return $query->result();
	
	
	}


	public function get_car_booking_details($car_owner_id){
		// $this->db->select('*');
		// $this->db->from('tbl_car_order_booking');
		// $this->db->where('car_owner_id', $car_owner_id);
		// $query = $this->db->get();
		// return $query->result();

		$this->db->select_sum('total_fair');
		$this->db->where('car_owner_id', $car_owner_id); // example condition
		$query = $this->db->get('tbl_car_order_booking');
		$result = $query->row();
		return $result->total_fair;
	}

	public function get_truck_partner_booking_details($truck_partner_id){
		$this->db->select_sum('total_amount');
		$this->db->where('truck_partner_id', $truck_partner_id); // example condition
		$query = $this->db->get('tbl_truck_order_booking');
		$result = $query->row();
		return $result->total_amount;
	}

	public function get_truck_driver_booking_details($select_driver_id){
		
		$this->db->select_sum('total_amount');
		$this->db->where('select_driver_id', $select_driver_id); // example condition
		$query = $this->db->get('tbl_truck_order_booking');
		$result = $query->row();
		return $result->total_amount;
	}


	public function get_booking_by_id($loginUserId)
	{
		
	    $current_date = date('Y-m-d');

	    $this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('order_id', $loginUserId);
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
	    	$this->db->group_start();
	    	for($i = 0; $i < count($booking_status); $i++){
				   $this->db->or_where('booking_status', $booking_status[$i]); 
			}
			$this->db->group_end();
	   } 

	    if(!empty($from_date)){ 
	       $this->db->where('pickup_date >=', $from_date);
	    } 
	    if(!empty($to_date)){ 
	       $this->db->where('pickup_date <=', $to_date);
	    } 

	    $this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('user_id', $loginUserId);
		// $this->db->where('booking_status','Cancelled');
		$this->db->order_by('pickup_date','asc');
       	$query = $this->db->get();

      //  	$str = $this->db->last_query();
	   		//    echo "<pre>";
	 		  // print_r($str);
	 		  // die;


       	
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

	public function updateBookingImage($booking_id,$updateProfileData)
	{
		$this->db->where('order_id', $booking_id);
		$result = $this->db->update('tbl_car_order_booking', $updateProfileData);
		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;
		
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

	public function get_all_car_calendar_pricing($car_id,$startDate,$table_name)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where('car_id', $car_id);

		// $this->db->group_start();
		$this->db->where('start', $startDate);
		// $this->db->where('start <=', $endDate);
		// $this->db->group_end();

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
		$query = $this->db->get();
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


	public function get_car_owner_details($car_owner_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $car_owner_id);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_user_record($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('tbl_users');
		$query = $this->db->get();
		return $query->result();
	}

	public function check_book_car($car_id,$startDate)
	{
		$this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('booking_status !=','Cancelled');
		$this->db->where('pickup_date <= ', $startDate);
		$this->db->where('return_date >=', $startDate);
		$this->db->where('car_id', $car_id);
		$query = $this->db->get();

		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;


		return $query->result();
	}


	public function get_single_record_by_id($user_id)
	{
		
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $user_id);
		$query = $this->db->get();
		return $query->result();
	} 
	
	

}
