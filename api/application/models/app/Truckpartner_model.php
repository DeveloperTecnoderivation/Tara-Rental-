<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Truckpartner_model extends CI_Model 
{
	
	public function checkToken($token)
	{
		$this->db->where('token', $token);
		$this->db->where('role', 'truck_partner');
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


	

	public function get_single_record($table_name,$id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from($table_name);
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

	

	public function checkTruckPlatNumber($plate_no) 
	{
		$this->db->where('plate_no', $plate_no);
		$this->db->where('types', 'truck');
		$query = $this->db->get('tbl_truck');
		return $query->num_rows();
		
	}

	public function checkChassisPlatNumber($plate_no) 
	{
		$this->db->where('plate_no', $plate_no);
		$this->db->where('types', 'chassis');
		$query = $this->db->get('tbl_truck');
		return $query->num_rows();
		
	}

	public function get_all_driver_by_truck_partner($refrence_number)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('truck_refrence_number', $refrence_number);
		$this->db->where('role', 'driver');
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

	public function update($id, $profileData,$table_name)
	{
		$this->db->where('id', $id);
		$result =  $this->db->update($table_name, $profileData);
		
		if($result){
           return true;
       }else{
           return false;
       }

	} 

	public function get_all_truck_transaction_history($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('truck_partner_id', $user_id);
		$this->db->where('status !=', '2');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_all_truck_transaction_history_by_driver($select_driver_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('select_driver_id', $select_driver_id);
		$this->db->where('status !=', '2');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_all_truck_transaction_history_by_truck($truck_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('truck_id', $truck_id);
		$this->db->where('status !=', '2');
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_all_truck_transaction_history_by_chassis($chassis_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_truck_order_booking');
		$this->db->where('chassis_id', $chassis_id);
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




	
	
	

}
