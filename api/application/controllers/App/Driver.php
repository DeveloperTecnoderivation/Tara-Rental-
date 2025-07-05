<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Driver extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/driver_model');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $image_url = 'https://tarataxi.technoderivation.com/uploads';
	}


	public function check_truck_refrence_number() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
 		$posts = array();
 		$_POST = json_decode(file_get_contents('php://input'), true);
 		
 		$truck_refrence_number = $_POST['truck_refrence_number'];

		
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('truck_refrence_number', 'Truck Refrence Number', 'required');
		

		if ($this->form_validation->run() === FALSE)
		{
			$response = array(
		        'status' => '404',
		        'message' => 'Please Enter Truck Refrence Number',                
		   );

		} else 
		{

		 	$check_refrence_number = $this->driver_model->check_truck_refrence_number($truck_refrence_number,'tbl_users');
		 	

			if($check_refrence_number)
			{
				$response = array(
					'status' => '200',
					'message' => 'valid Refrence Number',
					);
			}else{

				$response = array(
					'status' => '404',
					'message' => 'Invalid Refrence Number',
				);	

		    }
					
		}

			
	
		
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function registration() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
 		$posts = array();
 		$_POST = json_decode(file_get_contents('php://input'), true);
 		
 		$f_name = $_POST['f_name'];
 		$l_name = $_POST['l_name'];
 		$email = $_POST['email'];
 		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$truck_refrence_number = $_POST['truck_refrence_number'];

		$driver_licence = $_POST['driver_licence'];
		$valid_govt_id = $_POST['valid_govt_id'];
		$company_id = $_POST['company_id'];
		$bio_data = $_POST['bio_data'];
		$drug_text_result = $_POST['drug_text_result'];
		$nbi_clearance = $_POST['nbi_clearance'];
		$police_clearance = $_POST['police_clearance'];
		$personal_accident_insurance = $_POST['personal_accident_insurance'];
		$vacination_card = $_POST['vacination_card'];


 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('f_name', 'first  Name', 'required');
		$this->form_validation->set_rules('l_name', 'Last  Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|callback_valid_phone_number');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('truck_refrence_number', 'Truck Refrence Number', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => validation_errors(),                
		   );

		} else 
		{

		 	$check_refrence_number = $this->driver_model->check_truck_refrence_number($truck_refrence_number,'tbl_users');

		 	$check_email = $this->driver_model->check_email($email,'tbl_users');
		 	$check_phone = $this->driver_model->check_phone($phone,'tbl_users');



		 	if($check_email)
			{
				$response = array(
					'status' => '404',
					'message' => 'Email already exist',
					);
			}else{

					if($check_phone)
					{
						$response = array(
							'status' => '404',
							'message' => 'Phone number already exist',
							);
					}else{

						if($check_refrence_number)
							{
								$otp = rand (100000,999999);
								$shopData = array(
									'f_name' =>$f_name,
									'l_name' =>$l_name,
									'email' =>$email,
									'role'=>'driver',
									'phone' => $phone,
									'password' => md5($password),
									'status' => '0',
									'otp'=> $otp,
									
									'truck_refrence_number' =>$truck_refrence_number,
									'driver_licence' =>$driver_licence,
									'valid_govt_id' =>$valid_govt_id,
									'company_id' =>$company_id,
									'bio_data' =>$bio_data,
									'drug_text_result' =>$drug_text_result,
									'nbi_clearance' =>$nbi_clearance,
									'police_clearance' =>$police_clearance,
									'personal_accident_insurance' =>$personal_accident_insurance,
									'vacination_card' =>$vacination_card,
									'created' =>  date('Y-m-d'),
									
								);

								

								$user  = $this->driver_model->insertRecord($shopData,'tbl_users');
								$posts = array(
									'otp' => $otp,
									'email' => $email,
									'phone' => $phone,
									
								);
								if($user) {
									// $this->sendemailregister($email,$password,$fname,$lname,$mobile);
									$response = array(
										'status' => '200',
										'message' => 'OTP send register mobile number '.$phone,
										'data' => $posts
									);
								}
								else {
									$response = array(
										'status' => '404',
										'message' => 'Driver Not Register'
									);
								}
							}else{

								$response = array(
									'status' => '404',
									'message' => 'Invalid Truck Refrence Number',
									);

							}

					}
		 	}
			

			$this->output
						->set_content_type('application/json')
						->set_output(json_encode($response));
 			
	
		}
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function registration_with_otp() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
 		$posts = array();
 		$_POST = json_decode(file_get_contents('php://input'), true);
 		// print_r($_POST);
 		$email = $_POST['email'];
 		$phone = $_POST['phone'];
 		$otp =   $_POST['otp'];

 		//validation rules
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|callback_valid_phone_number');
		$this->form_validation->set_rules('otp', 'OTP', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => validation_errors(),                
		   );

		} else 
		{

			 	$check_email_phone_otp = $this->driver_model->check_email_phone_otp($email,$phone,$otp,'tbl_users');
			 	
				if($check_email_phone_otp)
				{	
					$tokenData = array(
						'status' =>'0',
					);

					$insertoken = $this->driver_model->updateOTP($email,$phone,$tokenData);
					$response = array(
						'status' => '200',
						'message' => 'Driver registration successfullly',
					);

				}else{
					$response = array(
						'status' => '404',
						'message' => 'Invalid OTP',
						);
				}
						
		}

				
		
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function check_driver_select_truct_and_chassis() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;

			$posts = array(); 
			if($isValidToken) 
			{
			 		$posts = array();
			 		$_POST = json_decode(file_get_contents('php://input'), true);
			 		$driver_id = $loginUserId;
			 		$check_truck = $this->driver_model->check_driver_truck_and_chessis($driver_id);
						 	
					if(!empty($check_truck))
					{	
						
						$response = array(
								'status' => '200',
								'message' => 'Truck and chassis already selected',
						);

					}else{
						$response = array(
							'status' => '404',
							'message' => 'Truck and chassis not selected',
							);
					}
									
					
			}else{
			  $response = array(
						'status' => '404',
						'message' => 'Invalid Token'
				);
			}
		}else{
			$response = array(
						'status' => '404',
						'message' => 'Please Provide Token'
				);
			}	
				
		
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function driver_selected_truct_and_chassis() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;

			$posts = array(); 
			if($isValidToken) 
			{
			 		$posts = array();
			 		$_POST = json_decode(file_get_contents('php://input'), true);
			 		$driver_id = $loginUserId;
			 		$check_truck = $this->driver_model->driver_selected_truct_and_chassis($driver_id);
						 	
					if(!empty($check_truck))
					{	

						$posts1[] = array(
								'truck_id' => $check_truck[0]->truck_id,
							    'chassis_id' => $check_truck[0]->chassis_id,
								
						);
						
						$response = array(
								'status' => '200',
								'data'=>$posts1
								
						);

					}else{
						$posts1[] = array(
								'truck_id' => $check_truck[0]->truck_id,
							    'chassis_id' => $check_truck[0]->chassis_id,
								
						);
						
						$response = array(
							'status' => '404',
							'data'=>$posts1
							);
					}
									
					
			}else{
			  $response = array(
						'status' => '404',
						'message' => 'Invalid Token'
				);
			}
		}else{
			$response = array(
						'status' => '404',
						'message' => 'Please Provide Token'
				);
			}	
				
		
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function get_driver_all_trucks()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);

				$get_driver_details = $this->driver_model->get_record('tbl_users',$token);
				$refrence_number = $get_driver_details[0]->truck_refrence_number; 
				
				$get_truck_prtner_details = $this->driver_model->get_truck_partner_details('tbl_users',$refrence_number);

				// print_r($get_truck_prtner_details);

				 $truck_partner_id = $get_truck_prtner_details[0]->id; 
				
				$all_records = $this->driver_model->get_all_trucks($truck_partner_id);
				// print_r($all_records);
				
				if(!empty($all_records))
				{
					foreach($all_records as $all_record) {
						
						if($all_record->image){
							$image = base_url_image().$all_record->image; 
						}else{
							$image =  base_url().'assets/img/no-image.jpg';
						}

						
						$posts1[] = array(
								'id' => $all_record->id,
								'model' => $all_record->model,
								'plate_no' => $all_record->plate_no,
								'truck_type' => $all_record->truck_type,
								'trips' => '0',
								'or_cr' => $all_record->or_cr,
								'status' => $all_record->status,
								'image' => $image,
								'created' => $all_record->created,
								
						);

					}
					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			 	}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Truck Available!..'
						);
			 	}	
		 		
				
			}else{
				$posts = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$posts = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}

	public function get_driver_all_chassis()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);

				$get_driver_details = $this->driver_model->get_record('tbl_users',$token);
				$refrence_number = $get_driver_details[0]->truck_refrence_number; 
				
				$get_truck_prtner_details = $this->driver_model->get_truck_partner_details('tbl_users',$refrence_number);

				// print_r($get_truck_prtner_details);

				 $truck_partner_id = $get_truck_prtner_details[0]->id; 
				
				$all_records = $this->driver_model->get_all_chassis($truck_partner_id);
				// print_r($all_records);
				
				if(!empty($all_records))
				{
					foreach($all_records as $all_record) {
						
						if($all_record->image){
							$image = base_url_image().$all_record->image; 
						}else{
							$image =  base_url().'assets/img/no-image.jpg';
						}

						
						$get_tralier_type_name = $this->driver_model->get_trailer_type_name($all_record->trailer_type);

						
						$posts1[] = array(
								'id' => $all_record->id,
								'model' => $all_record->model,
								'plate_no' => $all_record->plate_no,
								'trailer_type' => $get_tralier_type_name[0]->trailer_type,
								'trips' => '0',
								'or_cr' => $all_record->or_cr,
								'status' => $all_record->status,
								'image' => $image,
								'created' => $all_record->created,
								
						);

					}
					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			 	}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Truck Available!..'
						);
			 	}	
		 		
				
			}else{
				$posts = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$posts = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}

	public function select_truct_and_trailer_chassis() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;

			$posts = array();
			if($isValidToken) 
			{
			 		$posts = array();
			 		$_POST = json_decode(file_get_contents('php://input'), true);
			 		// print_r($_POST);
			 		$truck_id = $_POST['truck_id'];
			 		$trailer_chassis_id = $_POST['trailer_chassis_id'];
			 		$driver_id = $loginUserId;
			 		

			 		//validation rules
					
					$this->form_validation->set_rules('truck_id', 'Truck', 'required');
					$this->form_validation->set_rules('trailer_chassis_id', 'Chassis', 'required');


					if ($this->form_validation->run() === FALSE) {
						$response = array(
					        'status' => '404',
					        'message' => validation_errors(),                
					   );

					} else 
					{

						$check_truck_available = $this->driver_model->check_truck_available($truck_id,$driver_id);

						if(empty($check_truck_available)){

							$check_chassis_available = $this->driver_model->check_chassis_available($trailer_chassis_id,$driver_id);

							if(empty($check_chassis_available)){

								$get_chessis_details = $this->driver_model->get_chessis_details($trailer_chassis_id);
								// print_r($get_chessis_details);

								$tokenData1 = array(
								    'truck_id' =>$truck_id,
								    'chassis_id' =>$trailer_chassis_id,
								    'trailer_type' =>$get_chessis_details[0]->trailer_type,
								);

								$update_truck = $this->driver_model->updateTruckAndChassis($driver_id,$tokenData1);
								
								$posts = array(
									'status' => '200',
									'message' => 'Driver Truck And Chassis Update Successfully',
								);
							}else{
								$posts = array(
									'status' => '404',
									'message' => 'Chassis already selected other drive'
								);
							}

						}else{
							$posts = array(
								'status' => '404',
								'message' => 'Truck already selected other drive'
							);
						}

									
					}
			}else{
			  $posts = array(
						'status' => '404',
						'message' => 'Invalid Token'
				);
			}
		}else{
			$posts = array(
						'status' => '404',
						'message' => 'Please Provide Token'
				);
			}	
				
		
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($posts));
	}


	public function update_driver_location()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$driver_id = $loginUserId;
		 		
		 		$lat = $_POST['lat'];
		 		$lng = $_POST['lng'];
		 		

		 		
		 		$this->form_validation->set_rules('lat', 'Latitude', 'required');
			    $this->form_validation->set_rules('lng', 'Longitude', 'required');


					if ($this->form_validation->run() === FALSE) {
						$response = array(
					        'status' => '404',
					        'message' => validation_errors(),                
					   );

					} else 
				{
					$shopData = array(
							'lat' => $lat,
							'lng' => $lng,
							
						);

					$r = $this->driver_model->updateRecord($driver_id,$shopData,'tbl_users');
			
			
					$response = array(
						'status' => '200',
						'message' => 'Location Update successfully',
					);
					

				}

				
			}else{
				$response = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$response = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 

	}

 
	public function driver_new_job_order()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
		 		
				$_POST = json_decode(file_get_contents('php://input'), true);

				$get_new_job_order = $this->driver_model->get_new_job_order($loginUserId);

				
				
				if(!empty($get_new_job_order))
				{
					foreach($get_new_job_order as $all_record) {
						
						$posts1[] = array(
								'job_order_id' => $all_record->id,
								'order_id' => $all_record->order_id,
								'pickup_port' => $all_record->pickup_port,
								'delivery_address' => $all_record->delivery_address,
								'total_amount' => $all_record->total_amount,
								'pick_up_date_time' => $all_record->pick_up_date_time,
						);

					}
					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			 	}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No new job order found!..'
						);
			 	}	
		 		
				
			}else{
				$posts = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$posts = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}

	public function acceptance_new_job_order()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$driver_id = $loginUserId;
		 		
		 		$job_order_id = $_POST['job_order_id'];
		 		$order_id = $_POST['order_id'];



		 		$this->form_validation->set_rules('job_order_id', 'Job Order Id', 'required');
			    
					if ($this->form_validation->run() === FALSE) {
						$response = array(
					        'status' => '404',
					        'message' => validation_errors(),                
					   );

			    } else {

			    	$get_booking_details_by_order_id = $this->driver_model->get_booking_details_by_order_id($order_id);

			    	$check_new_job_order = $this->driver_model->check_new_job_order($job_order_id,$order_id);

			    	if(!empty($check_new_job_order)){
			    		$shopData = array(
							'status' => '1',
							);
			    		
							$r = $this->driver_model->updateJobOrderId($job_order_id,$shopData);

							$shopData1 = array(
									'is_confirm' => '1',
							);	

							
							$r1 = $this->driver_model->updateJobOrderOrderid($order_id,$shopData1);
						
							$posts2[] = array(
								'booking_order_id' => $get_booking_details_by_order_id[0]->id,
							);
					
							$response = array(
								'status' => '200',
								'data'=>$posts2,
								'message' => 'Job order confirm successfully',
							);
			    	}else{
			    		$response = array(
							'status' => '404',
							'message' => 'Invalid order id or job order id..'
						);	
			    	}
					
					
					

				}

				
			}else{
				$response = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$response = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 

	}


	public function get_booking_job_order_current_status()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;

 				$booking_order_id = $_POST['booking_order_id'];

		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('booking_order_id', 'Booking Id', 'required');
		 		
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{
					
					$check_truck_booking = $this->driver_model->check_truck_booking($booking_order_id);
					if(!empty($check_truck_booking))
					{
					  	

						if($check_truck_booking[0]->container_loaded_status_image){
							$container_loaded_status_image = base_url_image().$check_truck_booking[0]->container_loaded_status_image; 
						}else{
							$container_loaded_status_image =  '';
						}

						if($check_truck_booking[0]->delivered_status_image){
							$delivered_status_image = base_url_image().$check_truck_booking[0]->delivered_status_image; 
						}else{
							$delivered_status_image =  '';
						}

						if($check_truck_booking[0]->container_delivered_status_image){
							$container_delivered_status_image = base_url_image().$check_truck_booking[0]->container_delivered_status_image; 
						}else{
							$container_delivered_status_image =  '';
						}

						$booking_status_id = $check_truck_booking[0]->status;


						$posts1[] = array(
								'booking_order_id' => $check_truck_booking[0]->id,
								'booking_status_id' => $check_truck_booking[0]->status,
								'booking_status' => $check_truck_booking[0]->booking_status,
								'container_loaded_status_image' => $container_loaded_status_image,
								'delivered_status_image' => $delivered_status_image,
								'container_delivered_status_image' => $container_delivered_status_image,
								'update_status_date' => $check_truck_booking[0]->update_status_date,
										
									
							);

						
							$response = array(
									'status' => '200',
									'data' => $posts1,
									
							);


						 
					}else{
					  	
						$response = array(
							'status' => '404',
							'message' => 'Invalid booking order id'
							);	
					}
					

					
				}

				
			}else{
				$response = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$response = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 

	}

	public function update_booking_job_order_status()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;

 				$booking_order_id = $_POST['booking_order_id'];
 				$booking_status_id = $_POST['booking_status_id'];
 				$booking_status = $_POST['booking_status'];

 				$container_loaded_status_image = $_POST['container_loaded_status_image'];
 				$delivered_status_image = $_POST['delivered_status_image'];
 				$container_delivered_status_image = $_POST['container_delivered_status_image'];

		 		$this->form_validation->set_error_delimiters('', '');
		 		if(($booking_status_id == '3') || ($booking_status_id == '4') || ($booking_status_id == '5') || ($booking_status_id == '7') || ($booking_status_id == '8') || ($booking_status_id == '9') || ($booking_status_id == '11') || ($booking_status_id == '12')){
		 			$this->form_validation->set_rules('booking_order_id', 'Booking Id', 'required');
		 			$this->form_validation->set_rules('booking_status_id', 'Booking Status', 'required');
		 		}

		 		

		 		if(($booking_status_id == '6')){
		 			$this->form_validation->set_rules('booking_order_id', 'Booking Id', 'required');
		 			$this->form_validation->set_rules('booking_status_id', 'Booking Status Id', 'required');
		 			$this->form_validation->set_rules('booking_status', 'Booking Status', 'required');
		 			$this->form_validation->set_rules('container_loaded_status_image', 'Container Loaded Image', 'required');
		 		}

		 		if(($booking_status_id == '10')){
		 			$this->form_validation->set_rules('booking_order_id', 'Booking Id', 'required');
		 			$this->form_validation->set_rules('booking_status_id', 'Booking Status', 'required');
		 			$this->form_validation->set_rules('booking_status', 'Booking Status', 'required');
		 			$this->form_validation->set_rules('delivered_status_image', 'Delivered Image', 'required');
		 		}

		 		if(($booking_status_id == '13')){
		 			$this->form_validation->set_rules('booking_order_id', 'Booking Id', 'required');
		 			$this->form_validation->set_rules('booking_status_id', 'Booking Status', 'required');
		 			$this->form_validation->set_rules('booking_status', 'Booking Status', 'required');
		 			$this->form_validation->set_rules('container_delivered_status_image', 'Container Delivered Image', 'required');
		 		}

		 		

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{
					
					$check_truck_booking = $this->driver_model->check_truck_booking($booking_order_id);

					if(!empty($check_truck_booking))
					{
					  	$shopData = array(
							'status' => $booking_status_id,
							'booking_status' => $booking_status,
							'container_loaded_status_image' => $container_loaded_status_image,
							'delivered_status_image' => $delivered_status_image,
							'container_delivered_status_image' => $container_delivered_status_image,
							'update_status_date' => date('Y-m-d'),
						);

						$user  = $this->driver_model->update_booking_status($booking_order_id,$shopData);
	 
						if($user)
						{
						  	$response = array(
									'status' => '200',
									'message' => 'Status Updated Sucsssfully..'
								);
							 
						}else{
						  	
							$response = array(
								'status' => '404',
								'message' => 'Invalid Details'
								);	
						}
						 
					}else{
					  	
						$response = array(
							'status' => '404',
							'message' => 'Invalid booking order id'
							);	
					}
				}

				
			}else{
				$response = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$response = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 

	}


	public function book_all_truck_transaction_history()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->driver_model->checkToken($token);
			$getidbyToken = $this->driver_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				
				$all_records = $this->driver_model->get_all_truck_transaction_history($loginUserId);

					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {

							// Delivery Dtails

							$trailer_chassis_type_details = $this->driver_model->get_trailer_chassis_type($all_record->trailer_chassis_type_id);

							$posts11 = array(
								'pickup_port' => $all_record->pickup_port,
								'trailer_chassis_type' => $trailer_chassis_type_details[0]->trailer_type,
								'consignee_name' => $all_record->consignee_name,
								'delivery_address' => $all_record->delivery_address,
								'container_return_address' => $all_record->container_return_address,
								'porters' => '2',
								'date_time_of_delivery' => $all_record->pick_up_date_time,
							);


							// Driver Dtails

							$get_driver_details = $this->driver_model->get_single_user_details($all_record->select_driver_id);

							$select_truck_id = $get_driver_details[0]->truck_id;
							$select_chassis_id = $get_driver_details[0]->chassis_id;

							$get_truck_details = $this->driver_model->get_truck_details($select_truck_id);
							$get_chessis_details = $this->driver_model->get_chessis_details($select_chassis_id);

							$posts12 = array(
								'driver_name' => $get_driver_details[0]->f_name.' '.$get_driver_details[0]->l_name,
								'truck_palte_no' => $get_truck_details[0]->plate_no,
								'trailer_chassis_plate_no' => $get_chessis_details[0]->plate_no,
								
							);


							// Payment Summary

							
							$posts13 = array(
								'made_of_mayment' => $all_record->payment_type,
								'distance_fee' => $all_record->distance_fee,
								'service_charge' => $all_record->service_charge,
								'total_amount' => $all_record->total_amount,
								
							);


							// Status Dtails

							
							$posts14 = array(
								'booking_status_id' => $all_record->status,
								'booking_status' => $all_record->booking_status,
							);


							

							if($all_record->bill_of_loading){
								$bill_of_loading = base_url_image().$all_record->bill_of_loading; 
							}else{
								$bill_of_loading =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->packing_list){
								$packing_list = base_url_image().$all_record->packing_list; 
							}else{
								$packing_list =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->certificate_of_payment){
								$certificate_of_payment = base_url_image().$all_record->certificate_of_payment; 
							}else{
								$certificate_of_payment =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->gate_pass){
								$gate_pass = base_url_image().$all_record->gate_pass; 
							}else{
								$gate_pass =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->tabs){
								$tabs = base_url_image().$all_record->tabs; 
							}else{
								$tabs =  base_url().'assets/img/no-image.jpg';
							}

							$posts2[] = array(
								'delivery_details' => $posts11,
								'driver_details' => $posts12,
								'payment_summary' => $posts13,
								'job_booking_status' => $posts14,
								'bill_of_loading' => $bill_of_loading,
								'packing_list' => $packing_list,
								'certificate_of_payment' => $certificate_of_payment,
								'gate_pass' => $gate_pass,
								'tabs' => $tabs,
								'booking_id' => $all_record->id,
								'booking_order_id' => $all_record->order_id,
								'booking_date' => $all_record->created,
								'pick_up_date_time' => $all_record->pick_up_date_time,
								
							);


							$posts = array(
								'status' => '200',
								'data' => $posts2
							);
						   
					    }
							
				 	}else{

				 		$posts = array(
								'status' => '404',
								'message' => 'No transaction history!..'
							);
				 	}

				
				
			}else{
				$posts = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$posts = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}


	

	public function getToken($length)
	{

	    $token = "";
	    $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	    $codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
	    $codeAlphabet.= rand(10,10000);
	    $codeAlphabet.= "0127924587413698552";
	    $codeAlphabet.= "@#$%&*";
	   
	    $max = strlen($codeAlphabet); // edited

	    for ($i=0; $i < $length; $i++) {
	        $token .= $codeAlphabet;

	    }
	    
	    return $token;
	}	


	public function valid_phone_number($phone) {
        // Check if phone number contains only digits
        if (ctype_digit($phone)) {
            return true;
        } else {
            $this->form_validation->set_message('valid_phone_number', 'The {field} field must contain only numbers.');
            return false;
        }
    }

	
}
