<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chat_model extends CI_Model 
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


	public function checkTokenCarOwner($token)
	{
		$this->db->where('token', $token);
		$this->db->where('role', 'car_owner');
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return true;
		}
		return false; 
	} 

	public function checkTokenUser($token)
	{
		$this->db->where('token', $token);
		$this->db->where('role', 'user');
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

		// echo $query = "insert into tbl_chat(sendor_id,car_id,message,receiver_id,created,dated,times,status)values('$sendor_id','$car_id','$message','$receiver_id','$created','$dated','$times','$status')";     
	 //    $query = $this->db->query($query);
	 //    return $query->result();
	}

	public function get_car_details_by_car_id($car_id) 
	{
		$this->db->where('id', $car_id);
		$query = $this->db->get('tbl_car');
		return $query->result();
		
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


	public function get_all_chat_car_owner($car_owner_id)
	{
		

        $query = "select car_id,sendor_id,receiver_id FROM tbl_chat where receiver_id = $car_owner_id GROUP BY car_id,sendor_id";     
	    $query = $this->db->query($query);
	    return $query->result();

		
	}

	public function get_all_chat_user($user_id)
	{
		

        $query = "select car_id,sendor_id,receiver_id FROM tbl_chat where sendor_id = $user_id GROUP BY car_id,sendor_id,receiver_id";     
	    $query = $this->db->query($query);
	    return $query->result();

		
	}


	public function get_all_chat_user_driver($user_id)
	{
		

        $query = "select * FROM tbl_user_driver_chat where sendor_id = $user_id GROUP BY receiver_id";     
	    $query = $this->db->query($query);
	    return $query->result();

		
	}


	public function get_trck_details($truck_id)
	{
		

         $query = "select * FROM tbl_truck where id = $truck_id";     
	    $query = $this->db->query($query);
	    return $query->result();

		
	}


	public function car_owner_full_chat($sendor_id,$receiver_id,$car_id)
	{
		

       $query = "select * FROM tbl_chat where car_id = $car_id and ((receiver_id = $sendor_id ) or (receiver_id = $receiver_id )) And ((sendor_id = $sendor_id ) or (sendor_id = $receiver_id )) ORDER BY id DESC";     
	    $query = $this->db->query($query);
	    return $query->result();

		
	}


	public function user_driver_full_chat($sendor_id,$receiver_id)
	{
		

       $query = "select * FROM tbl_user_driver_chat where ((receiver_id = $sendor_id ) or (receiver_id = $receiver_id )) And ((sendor_id = $sendor_id ) or (sendor_id = $receiver_id )) ORDER BY id DESC";     
	    $query = $this->db->query($query);
	    return $query->result();

		
	}

	public function get_user_details($user_id)
	{
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('id', $user_id);
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


	

	
	

}
