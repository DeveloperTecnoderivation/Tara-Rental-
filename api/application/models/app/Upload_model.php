<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload_model extends CI_Model 
{
	

	

    public function checkToken($token)
	{
		
		$this->db->where('token', $token);
		$query = $this->db->get('admin_users');

		if($query->num_rows() == 1) {
			return true;
		}
		return false;
	} 

	public function getidbyToken($token)
	{
		$this->db->select('admin_users.id');
		$this->db->where('token', $token);
		$query = $this->db->get('admin_users');

		if($query->num_rows() == 1) {
			return $query->row();
		}
	} 

	public function getTotalIcon($table_name)
	{
		$this->db->select('*');
		$query = $this->db->get($table_name);
		return $query->num_rows(); 
	}

	public function check_record_by_name($collectionName)
	{
		
		$this->db->select('*');
		$this->db->where('designer_name', $collectionName);
		$query = $this->db->get('users');
		
		if($query->num_rows() == 1) {
			return true;
		} else
		{ 
			return false;
		}
		
	}

	public function insertRecord($Data)
	{
		$this->db->insert('icon', $Data);
		$result =  $this->db->insert_id();
		if($result){ return true; } else { return false; }
	}

	public function get_allRecord($start,$limit,$keyword)
	{
		$this->db->select('*');
		$this->db->from('icon');
		
		if($keyword){
			 $this->db->like('name', $keyword);
			 // $this->db->or_like('email', $keyword);
        	// $start=0;
        	// $limit = 100000;
		}

		// $this->db->order_by($shortKey, $shortType);
		$query = $this->db->get();

			// $str = $this->db->last_query();
  //  		 //  echo "<pre>";
 	// 	  print_r($str);
	
		return $query->result();
	}

	public function getTotalRecord($table_name,$keyword)
	{
		$this->db->select('*');
		if($keyword){
			 $this->db->like('name', $keyword);
			 // $this->db->or_like('email', $keyword);
        	// $start=0;
        	// $limit = 100000;
		}
		
		$query = $this->db->get($table_name);
		

		return $query->num_rows(); 
	}


	public function getTotalActivity($id)
	{
		$this->db->select('*');
		$this->db->from('user_activities');
		$this->db->where('user_id', $id);
		//$this->db->count_all_results();
		$query = $this->db->get();

		// $str = $this->db->last_query();
   		 //   //echo "<pre>";
 		 //   print_r($str);

		return $query->num_rows(); 
	}


public function getLastActivity($id)
	{
		$this->db->select('*');
		$this->db->from('user_activities');
		$this->db->where('user_id', $id);
		$this->db->order_by('user_activities.updated_at', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();

		//$str = $this->db->last_query();
   		   //echo "<pre>";
 		  // print_r($str);
		return $query->result();
	
	}

public function getMonthlyActiveUsers($fromdate,$lastdate)
	{
		$this->db->select('*');
		$this->db->from('user_activities');
		// $this->db->where('user_id', $id);
		$this->db->where('updated_at >=', $fromdate);
		$this->db->where('updated_at <=', $lastdate);

		
		$query = $this->db->get();
		return $query->num_rows(); 
		
	
	}

public function getTotalActivityCount()
	{
		$this->db->select('*');
		$this->db->from('user_activities');
		// $this->db->where('user_id', $id);
		
		$query = $this->db->get();

		return $query->num_rows(); 
		// $str = $this->db->last_query();
  //  		 //  echo "<pre>";
 	// 	  print_r($str);
	
	}






	

	public function check_Update_Category($catName,$id)
	{
		
		$this->db->select('users.id');
		$this->db->where('cat_name', $catName);
		$query = $this->db->get('users');
		return $query->row();
	
		
	}

	

	public function updateStatus($id,$updateData,$tablename)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update($tablename, $updateData);
		// $str = $this->db->last_query();
  //  		   echo "<pre>";
 	// 	  print_r($str);
	    if($result){ return true; } else { return false; }

	}
	public function updatename($id,$fullname)
	{
		
		$this->db->where('id', $id);
		$result =  $this->db->update('users', $fullname);
	    if($result){ return true; } else { return false; }

	}


	

	public function deleteRecord($id,$tablename)
	{
		$this->db->where('id', $id);
		$result = $this->db->delete($tablename);
		//print_r($this->db->last_query());

		if($result){ return true; } else { return false; }
	}
	

	public function check_email($id,$email)
	{
		$this->db->select('*');
		$this->db->from('users');
		
		$this->db->where('users.email', $email );
		$this ->db-> where('users.id !=', $id);
		$result = $this->db->get();
//print_r($this->db->last_query());

		if($result){ return '1'; } else { return '2'; }
	}

	public function get_single_record($id)
	{
		$this->db->select('*');
		$this->db->from('icon');
		
		$this->db->where('icon.id', $id);
		$query = $this->db->get();
		return $query->result();
	}

	public function updaterecord($id, $shopData)
	{

		$this->db->where('id', $id);
		$result = $this->db->update('icon', $shopData);
		 if($result){ return true; } else { return false; }
	}

	// public function updateStatus($id,$updateData,$tablename)
	// {
		
	// 	$this->db->where('id', $id);
	// 	$result =  $this->db->update($tablename, $updateData);
	//     if($result){ return true; } else { return false; }

	// }


}
