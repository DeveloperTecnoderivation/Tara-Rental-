<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model 
{
	public function check_login($email, $password) 
	{
		 
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function check_login_status($email, $password) 
	{
		 
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('status', '1');
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function check_email_forgot($email,$table_name)
	{
		
		$this->db->select('*');
		$this->db->where('email', $email);
		$query = $this->db->get($table_name);
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

	public function get_all_records_by_id($table_name,$id,$key)
	{
		$this->db->select('*');
		$this->db->from($table_name);
		$this->db->where($key, $id);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get();

		return $query->result();
	}

	public function get_single_record_by_id($table_name,$id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($table_name);
		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;
		return $query->row();
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

	public function login($email, $password) 
	{
		
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	}

	public function updateToken($id,$tokenData)
	{
		$this->db->where('id', $id);
		$result = $this->db->update('tbl_users', $tokenData);
		// $str = $this->db->last_query();
	 //   		   echo "<pre>";
	 // 		  print_r($str);
	 // 		  die;
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

	public function getRefreshToken($refresh_token) 
	{

		$this->db->where('refresh_token', $refresh_token);
		$query = $this->db->get('tbl_users');

		if($query->num_rows() >= 1) {
			return $query->row();
		}
	}


	public function get_hosting_details()
	{
		$this->db->select('tbl_admin.*');
		$this->db->from('tbl_admin');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_trailer_type()
	{
		$this->db->select('*');
		$this->db->from('tbl_chassis_trailer_type');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_pickup_port()
	{
		$this->db->select('*');
		$this->db->from('tbl_pick_up_port');
		$query = $this->db->get();
		return $query->result();
	}

	

}
