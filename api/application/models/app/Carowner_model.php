<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carowner_model extends CI_Model 
{
	
	public function checkToken($token)
	{
		$this->db->where('token', $token);
		$this->db->where('role', 'car_owner');
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

	   echo $query = "select tbl_car.*,tbl_car_order_booking.order_id as order_id from tbl_car_order_booking LEFT JOIN tbl_car ON tbl_car.id = tbl_car_order_booking.car_id WHERE tbl_car_order_booking.car_owner_id='$car_owner_id' and pickup_date >= '$current_date'";

		// echo $query = "select *
	 //    from tbl_car 
	 //    where id IN (select car_id from tbl_car_order_booking where car_owner_id = '$car_owner_id' and pickup_date >= '$current_date') AND car_owner_id ='$car_owner_id'";

  		$query = $this->db->query($query);
		return $query->result();
	
	}

	public function get_all_car_transaction_history($car_owner_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('car_owner_id', $car_owner_id);
		$this->db->order_by('id', 'desc');
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

	public function get_single_booking_details($order_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_car_order_booking');
		$this->db->where('order_id', $order_id);
		$query = $this->db->get();
		return $query->result();
	}


	public function get_single_user_details($id)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $id);
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
		$this->db->where('car_owner_id', $loginUserId);
		// $this->db->where('booking_status !=','Cancelled');
		$this->db->order_by('pickup_date','asc');
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

	
	

}
