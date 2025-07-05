<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Chat extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/chat_model');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $image_url = 'https://tarataxi.technoderivation.com/uploads';
	}


	public function user_send_msg_single_car()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->chat_model->checkToken($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$sendor_id = $loginUserId;
		 		$car_id = $_POST['car_id'];
		 		$message = $_POST['message'];
		 		
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('message', 'message', 'required');
				$this->form_validation->set_rules('car_id', 'car_id', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please fill all the mandatory fields',                
				   );

				} else 
				{

					$get_car_details = $this->chat_model->get_car_details_by_car_id($car_id);
					$car_owner_id = $get_car_details[0]->car_owner_id;
					$receiver_id = $car_owner_id;

					$shopData = array(
							'sendor_id' => $sendor_id,
							'car_id' => $car_id,
							'message' => $message,
							'receiver_id' => $receiver_id,
							'created' => date('Y-m-d H:i:s'),
							'dated' => date('Y-m-d'),
							'times' => date('H:i:s'),
							'status'=>'1'

						);

					

					$user  = $this->chat_model->insertRecord($shopData,'tbl_chat');
						
					if($user){
						$response = array(
						'status' => '200',
						'message' => 'Message send successfully',
						);
					}else{
						$response = array(
						'status' => '404',
						'message' => 'Message not send',
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


	public function car_owner_chat_user_listing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->chat_model->checkTokenCarOwner($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken)
			{
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$all_records = $this->chat_model->get_all_chat_car_owner($loginUserId);
 				// print_r($all_records);
		
				if(!empty($all_records))
				{
					


					foreach($all_records as $all_record)
					{
						


						$get_car_details = $this->chat_model->get_car_details($all_record->car_id);

						if($all_record->sendor_id == $loginUserId){
							$get_user_details = $this->chat_model->get_user_details($all_record->receiver_id);
						}

						if($all_record->receiver_id == $loginUserId){
							$get_user_details = $this->chat_model->get_user_details($all_record->sendor_id);
						}

						// print_r($get_user_details);

						if($get_user_details[0]->profile_image){
							$profile_image = base_url_image().$get_user_details[0]->profile_image; 
						}else{
							$profile_image =  base_url().'assets/img/no-image.jpg';
						}


					    $posts1[] = array(
								'sendor_id' => $all_record->sendor_id,
								'receiver_id' => $all_record->receiver_id,
								'car_id' => $all_record->car_id,
								'car_name' => $get_car_details[0]->brand.' '.$get_car_details[0]->model.' '.$get_car_details[0]->year,
								'user_full_name' => $get_user_details[0]->f_name.' '.$get_user_details[0]->l_name,
								'profile_image'=>$profile_image,
								// 'date' => $all_record->created,
						);

					}


					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			
				}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Message!..'
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


	public function car_owner_chat_single_user()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->chat_model->checkTokenCarOwner($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken)
			{
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 		        $sendor_id = $_POST['sendor_id'];
 		        $receiver_id = $loginUserId;
 		        $car_id = $_POST['car_id'];

 		        $this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('sendor_id', 'First Name', 'required');
				$this->form_validation->set_rules('car_id', 'Email', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please send sendor_id and car_id',                
				   );

				}else 
				{

					$all_records = $this->chat_model->car_owner_full_chat($sendor_id,$receiver_id,$car_id);

					if(!empty($all_records))
					{
						$get_car_details = $this->chat_model->get_car_details($all_records[0]->car_id);

						if($all_records[0]->sendor_id == $loginUserId){
							$get_user_details = $this->chat_model->get_user_details($all_records[0]->receiver_id);
						}

						if($all_records[0]->receiver_id == $loginUserId){
							$get_user_details = $this->chat_model->get_user_details($all_records[0]->sendor_id);
						}

						// print_r($get_user_details);

						if($get_user_details[0]->profile_image){
							$profile_image = base_url_image().$get_user_details[0]->profile_image; 
						}else{
							$profile_image =  base_url().'assets/img/no-image.jpg';
						}


						if($get_car_details[0]->rear_view_image){
						   $rear_view_image = base_url_image().$get_car_details[0]->rear_view_image; 
						}else{
							$rear_view_image =  base_url().'assets/img/no-image.jpg';
						}

						foreach($all_records as $all_record)
						{
						

							if($all_record->sendor_id == $loginUserId){
								$sendor_name = 'car_owner';
							}
							if($all_record->receiver_id == $loginUserId){
								$sendor_name = 'user';
							}

							$posts1[] = array(
									'sendor_id' => $all_record->sendor_id,
									'receiver_id' => $all_record->receiver_id,
									'sendor_name' => $sendor_name,
									'message' => $all_record->message,
									'date' => $all_record->created,
									'car_id' => $all_record->car_id,
									
							);  

						}

						 $posts2 = array(
									'car_image' => $rear_view_image,
									'car_id' => $all_record->car_id,
									'car_name' => $get_car_details[0]->brand.' '.$get_car_details[0]->model.' '.$get_car_details[0]->year,
									'user_full_name' => $get_user_details[0]->f_name.' '.$get_user_details[0]->l_name,
									'profile_image'=>$profile_image,
									

							);


						$posts = array(
								'status' => '200',
								'user_info'=>$posts2,
								'data' => $posts1
						);
				
					}else{

				 		$posts = array(
								'status' => '404',
								'message' => 'No Message!..'
							);
				 	}	


				}


 				// print_r($all_records);
		
				

				
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



	public function user_chat_car_owner_listing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->chat_model->checkTokenUser($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			 $loginUserId = $getidbyToken->id;
			
			if($isValidToken)
			{
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$all_records = $this->chat_model->get_all_chat_user($loginUserId);
 			    // print_r($all_records);
		
				if(!empty($all_records))
				{

					foreach($all_records as $all_record)
					{

						$get_car_details = $this->chat_model->get_car_details($all_record->car_id);

						if($all_record->sendor_id == $loginUserId){
							$get_user_details = $this->chat_model->get_user_details($all_record->receiver_id);
						}

						if($all_record->receiver_id == $loginUserId){
							$get_user_details = $this->chat_model->get_user_details($all_record->sendor_id);
						}

						// print_r($get_user_details);

						if($get_user_details[0]->profile_image){
							$profile_image = base_url_image().$get_user_details[0]->profile_image; 
						}else{
							$profile_image =  base_url().'assets/img/no-image.jpg';
						}


					    $posts1[] = array(
								'sendor_id' => $all_record->sendor_id,
								'receiver_id' => $all_record->receiver_id,
								'car_id' => $all_record->car_id,
								'car_name' => $get_car_details[0]->brand.' '.$get_car_details[0]->model.' '.$get_car_details[0]->year,
								'user_full_name' => $get_user_details[0]->f_name.' '.$get_user_details[0]->l_name,
								'profile_image'=>$profile_image,
								// 'date' => $all_record->created,
						);

					}


					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			
				}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Message!..'
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


	public function user_chat_with_single_car_owner()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{


		    $isValidToken = $this->chat_model->checkToken($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			
			if($isValidToken)
			{
				// echo $token;
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 		        $receiver_id = $_POST['receiver_id'];
 		        $sendor_id = $loginUserId;
 		        $car_id = $_POST['car_id'];

 		        $this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('receiver_id', 'First Name', 'required');
				$this->form_validation->set_rules('car_id', 'Email', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => 'Please send receiver_id and car_id',                
				   );

				}else 
				{

					$all_records = $this->chat_model->car_owner_full_chat($sendor_id,$receiver_id,$car_id);

					
						
					$get_user_details = $this->chat_model->get_user_details($receiver_id);
						

					// print_r($get_user_details);

					if($get_user_details[0]->profile_image){
						$profile_image = base_url_image().$get_user_details[0]->profile_image; 
					}else{
						$profile_image =  base_url().'assets/img/no-image.jpg';
					}

					$get_car_details = $this->chat_model->get_car_details($all_records[0]->car_id);

					if($get_car_details[0]->rear_view_image){
					   $rear_view_image = base_url_image().$get_car_details[0]->rear_view_image; 
					}else{
						$rear_view_image =  base_url().'assets/img/no-image.jpg';
					}

					 $posts2 = array(
							'car_image' => $rear_view_image,
							'car_id' => $car_id,
							'car_name' => $get_car_details[0]->brand.' '.$get_car_details[0]->model.' '.$get_car_details[0]->year,
							'user_full_name' => $get_user_details[0]->f_name.' '.$get_user_details[0]->l_name,
							'profile_image'=>$profile_image,
							

					);

					

					if(!empty($all_records))
					{
						

						foreach($all_records as $all_record)
						{
						

							if($all_record->sendor_id == $loginUserId){
								$sendor_name = 'car_owner';
							}
							if($all_record->receiver_id == $loginUserId){
								$sendor_name = 'user';
							}

							$posts1[] = array(
									'sendor_id' => $all_record->sendor_id,
									'receiver_id' => $all_record->receiver_id,
									'sendor_name' => $sendor_name,
									'message' => $all_record->message,
									'date' => $all_record->created,
									'car_id' => $car_id,
									
							);  

						}

						


						$posts = array(
								'status' => '200',
								'user_info'=>$posts2,
								'data' => $posts1
						);
				
					}else{

				 		$posts = array(
								'status' => '404',
								'message' => 'No Message!..'
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
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}


	public function send_message()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{


		    $isValidToken = $this->chat_model->checkToken($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			
			if($isValidToken)
			{
				// echo $token;
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 		        $receiver_id = $_POST['receiver_id'];
 		        $sendor_id = $_POST['sendor_id'];
 		        $car_id = $_POST['car_id'];
 		        $message = $_POST['message'];

 		        $this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('receiver_id', 'Sendor Id', 'required');
				$this->form_validation->set_rules('sendor_id', 'Receiver Id', 'required');
				$this->form_validation->set_rules('car_id', 'Email', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => 'Please send receiver_id and car_id',                
				   );

				}else 
				{

					

					$shopData = array(
							'sendor_id' => $sendor_id,
							'car_id' => $car_id,
							'message' => $message,
							'receiver_id' => $receiver_id,
							'created' => date('Y-m-d H:i:s'),
							'dated' => date('Y-m-d'),
							'times' => date('H:i:s'),
							'status'=>'1'

						);

					$user  = $this->chat_model->insertRecord($shopData,'tbl_chat');
						
					if($user){
						$posts = array(
						'status' => '200',
						'message' => 'Message send successfully',
						);
					}else{
						$posts = array(
						'status' => '404',
						'message' => 'Message not send',
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
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}


	// User-Driver Chat

	public function user_driver_send_message()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{


		    $isValidToken = $this->chat_model->checkToken($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			
			if($isValidToken)
			{
				// echo $token;
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 		        $receiver_id = $_POST['receiver_id'];
 		        $sendor_id = $_POST['sendor_id'];
 		        $message = $_POST['message'];

 		        $this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('receiver_id', 'Sendor Id', 'required');
				$this->form_validation->set_rules('sendor_id', 'Receiver Id', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => 'Please send receiver_id and car_id',                
				   );

				}else 
				{

					$shopData = array(
							'sendor_id' => $sendor_id,
							'message' => $message,
							'receiver_id' => $receiver_id,
							'created' => date('Y-m-d H:i:s'),
							'dated' => date('Y-m-d'),
							'times' => date('H:i:s'),
							'status'=>'1'
						);

					$user  = $this->chat_model->insertRecord($shopData,'tbl_user_driver_chat');
						
					if($user){
						$posts = array(
						'status' => '200',
						'message' => 'Message send successfully',
						);
					}else{
						$posts = array(
						'status' => '404',
						'message' => 'Message not send',
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
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}


	public function user_chat_driver_list()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->chat_model->checkTokenUser($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken)
			{
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$all_records = $this->chat_model->get_all_chat_user_driver($loginUserId);
 			    
		
				if(!empty($all_records))
				{

					foreach($all_records as $all_record)
					{

						

						$get_user_details = $this->chat_model->get_user_details($all_record->receiver_id);

						// ssssssprint_r($get_user_details);
 
						if($get_user_details[0]->profile_image){
							$profile_image = base_url_image().$get_user_details[0]->profile_image; 
						}else{
							$profile_image =  base_url().'assets/img/no-image.jpg';
						}


						$get_truck_details = $this->chat_model->get_trck_details($get_user_details[0]->truck_id);


					    $posts1[] = array(
								'id' => $get_user_details[0]->id,
								'dated' => $all_record->dated,
								'times' => $all_record->times,
								'truck_plate_no'=>$get_truck_details[0]->plate_no,
								'user_full_name' => $get_user_details[0]->f_name.' '.$get_user_details[0]->l_name,
								'profile_image'=>$profile_image,
								// 'date' => $all_record->created,
						);

					}


					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			
				}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Message!..'
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

	public function driver_chat_user_list()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->chat_model->checkTokenUser($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken)
			{
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$all_records = $this->chat_model->get_all_chat_user_driver($loginUserId);
 			    
		
				if(!empty($all_records))
				{

					foreach($all_records as $all_record)
					{

						$get_user_details = $this->chat_model->get_user_details($all_record->receiver_id);

						// ssssssprint_r($get_user_details);
 
						if($get_user_details[0]->profile_image){
							$profile_image = base_url_image().$get_user_details[0]->profile_image; 
						}else{
							$profile_image =  base_url().'assets/img/no-image.jpg';
						}


						$get_truck_details = $this->chat_model->get_trck_details($get_user_details[0]->truck_id);


					    $posts1[] = array(
								'id' => $get_user_details[0]->id,
								'dated' => $all_record->dated,
								'times' => $all_record->times,
								'user_full_name' => $get_user_details[0]->f_name.' '.$get_user_details[0]->l_name,
								'profile_image'=>$profile_image,
								// 'date' => $all_record->created,
						);

					}


					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			
				}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Message!..'
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

	public function user_driver_chat_message()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{


		    $isValidToken = $this->chat_model->checkToken($token);
			$getidbyToken = $this->chat_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			
			if($isValidToken)
			{
				// echo $token;
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 		        $receiver_id = $_POST['driver_id'];
 		        $sendor_id = $loginUserId;
 		       

 		        $this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('receiver_id', 'receiver_id', 'required');
				$this->form_validation->set_rules('sendor_id', 'sendor_id', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => 'Please send receiver_id and sendor_id',                
				   );

				}else 
				{

					$all_records = $this->chat_model->car_owner_full_chat($sendor_id,$receiver_id);

					if(!empty($all_records))
					{
						

						foreach($all_records as $all_record)
						{
						

							if($all_record->sendor_id == $loginUserId){
								$sendor_name = 'Driver';
							}
							if($all_record->receiver_id == $loginUserId){
								$sendor_name = 'User';
							}

							$posts1[] = array(
									'sendor_id' => $all_record->sendor_id,
									'receiver_id' => $all_record->receiver_id,
									'sendor_name' => $sendor_name,
									'message' => $all_record->message,
									'date' => $all_record->created,
									'car_id' => $car_id,
									
							);  

						}

						


						$posts = array(
								'status' => '200',
								'user_info'=>$posts2,
								'data' => $posts1
						);
				
					}else{

				 		$posts = array(
								'status' => '404',
								'message' => 'No Message!..'
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

	
}
