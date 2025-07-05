<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Carowner extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/carowner_model');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $image_url = 'https://tarataxi.technoderivation.com/uploads';
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

 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('f_name', 'First Name', 'required');
		// $this->form_validation->set_rules('l_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|callback_valid_phone_number');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => validation_errors(),            
		   );

		} else 
		{

		 	$check_email = $this->carowner_model->check_email($email,'tbl_users');
		 	$check_phone = $this->carowner_model->check_phone($phone,'tbl_users');

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

						$otp = rand (100000,999999);

						$shopData = array(
							'f_name' =>$f_name,
							'l_name' =>$l_name,
							'email' => $email,
							'role'=>'car_owner',
							'phone' => $phone,
							'password' => md5($password),
							'status' => '0',
							'otp'=> $otp,
							'created' =>  date('Y-m-d'),
							
						);

						

						$user  = $this->carowner_model->insertRecord($shopData,'tbl_users');
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
								'message' => 'Car Owner Not Register'
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

			 	$check_email_phone_otp = $this->carowner_model->check_email_phone_otp($email,$phone,$otp,'tbl_users');
			 	
				if($check_email_phone_otp)
				{	
					$tokenData = array(
						'status' =>'1',
					);

					$insertoken = $this->carowner_model->updateOTP($email,$phone,$tokenData);
					$response = array(
						'status' => '200',
						'message' => 'Car owner registration successfullly',
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

	

	public function add_car()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		$brand = $_POST['brand'];
		 		$model = $_POST['model'];
		 		$year = $_POST['year'];
		 		$car_type = $_POST['car_type'];
		 		$transmission = $_POST['transmission'];
		 		$vin = $_POST['vin'];
		 		$mileage = $_POST['mileage'];
		 		$interior_color = $_POST['interior_color'];
		 		$exterior_color = $_POST['exterior_color'];
		 		$seating_capacity = $_POST['seating_capacity'];

		 		$fuel_type = $_POST['fuel_type'];
		 		$description = $_POST['description'];
		 		$insurence = $_POST['insurence'];

		 		$rear_view_image = $_POST['rear_view_image'];
		 		$front_view_image = $_POST['front_view_image'];
		 		$right_side_image = $_POST['right_side_image'];
		 		$left_side_image = $_POST['left_side_image'];
		 		$interior_image = $_POST['interior_image'];
		 		$or_cr_doc = $_POST['or_cr_doc'];
		 		$car_video = $_POST['car_video'];
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('brand', 'brand', 'required');
				$this->form_validation->set_rules('model', 'model', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please fill all the mandatory fields',                
				   );

				} else 
				{

					$checkCarVIN = $this->carowner_model->checkCarVIN($vin);

					if($checkCarVIN > 0){
						$response = array(
							'status' => '404',
							'message' => 'Car VIN Number Already Exist!',
						);
					}else{
						$shopData = array(
							'car_owner_id' => $car_owner_id,
							'brand' => $brand,
							'model' => $model,
							'year' => $year,
							'car_type' => $car_type,
							'transmission' => $transmission,
							'vin' => $vin,
							'mileage' => $mileage,
							'interior_color' => $interior_color,
							'exterior_color' => $exterior_color,
							'fuel_type' => $fuel_type,
							'description' => $description,
							'insurence' => $insurence,
							'seating_capacity' => $seating_capacity,
							'rear_view_image' => $rear_view_image,
							'front_view_image' => $front_view_image,
							'right_side_image' => $right_side_image,
							'left_side_image' => $left_side_image,
							'interior_image' => $interior_image,
							'or_cr_doc' => $or_cr_doc,
							'car_video' => $car_video,
							'created' => date('Y-m-d'),
							'created_by' => '0',
							'modified' => date('Y-m-d'),
							'modified_by' => '0',
							'status'=>'1'

						);

						$user  = $this->carowner_model->insertRecord($shopData,'tbl_car');
						
						if($user){
							$response = array(
							'status' => '200',
							'message' => 'Car Added Successfully',
							);
						}else{
							$response = array(
							'status' => '404',
							'message' => 'Car Not Added',
							);
						}
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


	public function update_car()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;

 				$car_id = $_POST['car_id'];
				$brand = $_POST['brand'];
		 		$model = $_POST['model'];
		 		$year = $_POST['year'];
		 		$car_type = $_POST['car_type'];
		 		$transmission = $_POST['transmission'];
		 		$vin = $_POST['vin'];
		 		$mileage = $_POST['mileage'];
		 		$interior_color = $_POST['interior_color'];
		 		$exterior_color = $_POST['exterior_color'];
		 		$seating_capacity = $_POST['seating_capacity'];

		 		$fuel_type = $_POST['fuel_type'];
		 		$description = $_POST['description'];
		 		$insurence = $_POST['insurence'];

		 		$rear_view_image = $_POST['rear_view_image'];
		 		$front_view_image = $_POST['front_view_image'];
		 		$right_side_image = $_POST['right_side_image'];
		 		$left_side_image = $_POST['left_side_image'];
		 		$interior_image = $_POST['interior_image'];
		 		$or_cr_doc = $_POST['or_cr_doc'];
		 		$car_video = $_POST['car_video'];
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('brand', 'brand', 'required');
				$this->form_validation->set_rules('model', 'model', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please fill all the mandatory fields',                
				   );

				} else 
				{

					$checkCarVIN = $this->carowner_model->checkUpdateCarVIN($vin,$car_id);

					if($checkCarVIN > 0){
						$response = array(
							'status' => '404',
							'message' => 'Car VIN Number Already Exist!',
						);
					}else{
						$shopData = array(
							
							'brand' => $brand,
							'model' => $model,
							'year' => $year,
							'car_type' => $car_type,
							'transmission' => $transmission,
							'vin' => $vin,
							'mileage' => $mileage,
							'interior_color' => $interior_color,
							'exterior_color' => $exterior_color,
							'fuel_type' => $fuel_type,
							'description' => $description,
							'insurence' => $insurence,
							'seating_capacity' => $seating_capacity,
							'rear_view_image' => $rear_view_image,
							'front_view_image' => $front_view_image,
							'right_side_image' => $right_side_image,
							'left_side_image' => $left_side_image,
							'interior_image' => $interior_image,
							'or_cr_doc' => $or_cr_doc,
							'car_video' => $car_video,
						
						);

						$user = $this->carowner_model->updateRecord($car_id,$shopData,'tbl_car');

						
						if($user){
							$response = array(
							'status' => '200',
							'message' => 'Car Update Successfully',
							);
						}else{
							$response = array(
							'status' => '404',
							'message' => 'Car Not Update',
							);
						}
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

	public function get_all_car()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			 $loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$type = $_POST['type'];
				$car_owner_id = $loginUserId;
				
				if($type == 'all'){
					$all_records = $this->carowner_model->get_all_car_by_owner($car_owner_id,'tbl_car');
				}
				if($type == 'availability'){

					$all_records = $this->carowner_model->get_all_availability_car_by_owner($car_owner_id,'tbl_car');
					
				}
				if($type == 'booking'){
					 
					$all_records = $this->carowner_model->get_all_booking_car_by_owner($car_owner_id,'tbl_car');
				}

				// $all_records = $this->carowner_model->get_all_car_by_owner($car_owner_id,'tbl_car');
				// print_r($all_records);
				if(!empty($all_records))
				{
					foreach($all_records as $all_record) {
						// print_r($all_record);

						$current_date = date('Y-m-d');
						
						$car_price = $this->carowner_model->get_price($all_record->id,$current_date);
						if($car_price){
							$car_price = $car_price[0]->price;
						}else{

							$currentDay  = date('l');
							$car_price_new = $this->carowner_model->get_min_max_price($all_record->id);
							// print_r($car_price_new);
							if($car_price_new){

								if(($currentDay=='Saturday') || ($currentDay=='Sunday')){
								  $car_price  = $car_price_new[0]->max_price;
								}else{
							      $car_price  = $car_price_new[0]->min_price;
								}

							}else{
								$car_price = '0';
							}

							

							
						}

						if($all_record->rear_view_image){
							$rear_view_image = base_url_image().$all_record->rear_view_image; 
						}else{
							$rear_view_image =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->front_view_image){
							$front_view_image = base_url_image().$all_record->front_view_image; 
						}else{
							$front_view_image =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->right_side_image){
							$right_side_image = base_url_image().$all_record->right_side_image; 
						}else{
							$right_side_image =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->left_side_image){
							$left_side_image = base_url_image().$all_record->left_side_image; 
						}else{
							$left_side_image =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->interior_image){
							$interior_image = base_url_image().$all_record->interior_image; 
						}else{
							$interior_image =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->or_cr_doc){
							$or_cr_doc = base_url_image().$all_record->or_cr_doc; 
						}else{
							$or_cr_doc =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->insurence){
							$insurence = base_url_image().$all_record->insurence; 
						}else{
							$insurence =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->car_video){
							$car_video = base_url_image().$all_record->car_video; 
						}else{
							$car_video =  base_url().'assets/img/no-image.jpg';
						}

						if($type == 'booking'){
							$order_id = $all_record->order_id;
						}

						
						$posts1[] = array(
								'id' => $all_record->id,
								'order_id'=>$order_id,
								'car_id' => $all_record->id,
								'brand' => $all_record->brand,
								'model' => $all_record->model,
								'year' => $all_record->year,
								'transmission' => $all_record->transmission,
								'vin' => $all_record->vin,
								'location'=>$all_record->car_location,
								'car_type' => $all_record->car_type,
								'mileage' => $all_record->mileage,
								'seating_capacity' => $all_record->seating_capacity,

								'interior_color' => $all_record->interior_color,
								'exterior_color' => $all_record->exterior_color,

								'fuel_type' => $all_record->fuel_type,
								'description' => $all_record->description,
								'insurence' => $insurence,
								
								'rear_view_image' => $rear_view_image,
								'front_view_image' => $front_view_image,
								'right_side_image' => $right_side_image,
								'left_side_image' => $left_side_image,
								'interior_image' => $interior_image,
								'or_cr_doc' => $or_cr_doc,
								'car_video' => $car_video,

								// 'car_availability' => $all_record->car_availability,
								'unlimited_distance' => $all_record->unlimited_distance,
								'maximum_kilometer' => $all_record->maximum_kilometer,
								'excess_fee_per_kilometer' => $all_record->excess_fee_per_kilometer,
								'time_penalty_per_hour' => $all_record->time_penalty_per_hour,
								'price'=>$car_price,
								'status'=>$all_record->status
								
						);

					}
					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			 	}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Car Available!..'
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

	public function booking_car_details()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
 				$order_id = $_POST['order_id'];
				
				if($order_id){

					$all_records = $this->carowner_model->get_single_booking_details($order_id);

					if(!empty($all_records))
					{
						
							$current_date = date('Y-m-d');

							$car_details = $this->carowner_model->get_single_car_details($all_records[0]->car_id);

							$user_details = $this->carowner_model->get_single_user_details($all_records[0]->user_id);
							
							
							if($car_details[0]->rear_view_image){
								$rear_view_image = base_url_image().$car_details[0]->rear_view_image; 
							}else{
								$rear_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_details[0]->front_view_image){
								$front_view_image = base_url_image().$car_details[0]->front_view_image; 
							}else{
								$front_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_details[0]->right_side_image){
								$right_side_image = base_url_image().$car_details[0]->right_side_image; 
							}else{
								$right_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_details[0]->left_side_image){
								$left_side_image = base_url_image().$car_details[0]->left_side_image; 
							}else{
								$left_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_details[0]->interior_image){
								$interior_image = base_url_image().$car_details[0]->interior_image; 
							}else{
								$interior_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->qr_image){
								$qr_image = base_url_qr_image().$all_records[0]->qr_image; 
							}else{
								$qr_image =  base_url().'assets/img/no-image.jpg';
							}

							if($user_details[0]->profile_image){
								$profile_image = base_url_image().$user_details[0]->profile_image; 
							}else{
								$profile_image =  base_url().'assets/img/no-image.jpg';
							}

							// print_r($car_details);

							$average_rating = $this->carowner_model->get_average_rating($car_details[0]->id);

							// print_r($average_rating);
							
							$posts1 = array(
									'id' => $all_records[0]->id,
									
									'car_id' => $car_details[0]->id,
									'car_name' => $car_details[0]->brand.' '.$car_details[0]->model.' '.$car_details[0]->year,
									'brand' => $car_details[0]->brand,
									'model' => $car_details[0]->model,
									'year' => $car_details[0]->year,
									'rear_view_image' => $rear_view_image,
								    'front_view_image' => $front_view_image,
									'right_side_image' => $right_side_image,
									'left_side_image' => $left_side_image,
									'interior_image' => $interior_image,
									'qr_image'=>$qr_image,

									'orde_id' => $all_records[0]->order_id,
									'pickup_date' => $all_records[0]->pickup_date,
									'return_date' => $all_records[0]->return_date,
									'total_fair' => $all_records[0]->total_fair,
									'payment_mode' => $all_records[0]->payment_mode,
									'booking_status' => $all_records[0]->booking_status,
									'booking_date' => $all_records[0]->created,
									'user_name' => $user_details[0]->f_name.' '.$user_details[0]->l_name,
									'user_profile_image'=>$profile_image

									
							);

						
						$posts = array(
								'status' => '200',
								'data' => $posts1
						);
				 	}else{

				 		$posts = array(
								'status' => '404',
								'message' => 'No Record Found!..'
							);
				 	}
				}else{
					$posts = array(
							'status' => '404',
							'message' => 'Order id required'
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

	// public function get_single_car_details()
	// {
	// 	header("Access-Control-Allow-Origin: *");
	// 	header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
	// 	header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
	// 	 $token = $this->input->get_request_header('Access-Token');
	// 	if($token){
	// 		$isValidToken = $this->carowner_model->checkToken($token);
	// 		$getidbyToken = $this->carowner_model->getidbyToken($token);
	// 		$loginUserId = $getidbyToken->id;
			
	// 		if($isValidToken) {
				
	// 			$_POST = json_decode(file_get_contents('php://input'), true);
 // 				$car_owner_id = $loginUserId;
 // 				$car_id = $_POST['car_id'];
				
	// 			if($car_id){

	// 				$all_records = $this->carowner_model->get_single_car_details($car_id);

	// 				if(!empty($all_records))
	// 				{
						
	// 						$current_date = date('Y-m-d');
							

	// 						// $car_price = $this->carowner_model->get_price($all_records[0]->id,$current_date);
	// 						// if($car_price){
	// 						// 	$car_price = $car_price[0]->price;
	// 						// }else{
	// 						// 	$car_price = '0';
	// 						// }

	// 						$car_price = $this->carowner_model->get_price($all_records[0]->id,$current_date);
	// 						if($car_price){
	// 							$car_price = $car_price[0]->price;
	// 						}else{

	// 							$currentDay  = date('l');
	// 							$car_price_new = $this->carowner_model->get_min_max_price($all_records[0]->id);
								
	// 							if($car_price_new){

	// 								if(($currentDay=='Saturday') || ($currentDay=='Sunday')){
	// 								  $car_price  = $car_price_new[0]->max_price;
	// 								}else{
	// 							      $car_price  = $car_price_new[0]->min_price;
	// 								}

	// 							}else{
	// 								$car_price = '0';
	// 							}
	// 						}


	// 						if($all_records[0]->rear_view_image){
	// 							$rear_view_image = base_url_image().$all_records[0]->rear_view_image; 
	// 						}else{
	// 							$rear_view_image =  base_url().'assets/img/no-image.jpg';
	// 						}

	// 						if($all_records[0]->front_view_image){
	// 							$front_view_image = base_url_image().$all_records[0]->front_view_image; 
	// 						}else{
	// 							$front_view_image =  base_url().'assets/img/no-image.jpg';
	// 						}

	// 						if($all_records[0]->right_side_image){
	// 							$right_side_image = base_url_image().$all_records[0]->right_side_image; 
	// 						}else{
	// 							$right_side_image =  base_url().'assets/img/no-image.jpg';
	// 						}

	// 						if($all_records[0]->left_side_image){
	// 							$left_side_image = base_url_image().$all_records[0]->left_side_image; 
	// 						}else{
	// 							$left_side_image =  base_url().'assets/img/no-image.jpg';
	// 						}

	// 						if($all_records[0]->interior_image){
	// 							$interior_image = base_url_image().$all_records[0]->interior_image; 
	// 						}else{
	// 							$interior_image =  base_url().'assets/img/no-image.jpg';
	// 						}

	// 						if($all_records[0]->or_cr_doc){
	// 							$or_cr_doc = base_url_image().$all_records[0]->or_cr_doc; 
	// 						}else{
	// 							$or_cr_doc =  base_url().'assets/img/no-image.jpg';
	// 						}

	// 						if($all_records[0]->insurence){
	// 							$insurence = base_url_image().$all_records[0]->insurence; 
	// 						}else{
	// 							$insurence =  base_url().'assets/img/no-image.jpg';
	// 						}

	// 						if($all_records[0]->car_video){
	// 							$car_video = base_url_image().$all_records[0]->car_video; 
	// 						}else{
	// 							$car_video =  base_url().'assets/img/no-image.jpg';
	// 						}

							
	// 						$posts1 = array(
	// 								'id' => $all_records[0]->id,
	// 								'car_id' => $all_records[0]->id,
	// 								'fuel_type' => $all_records[0]->fuel_type,
	// 								'brand' => $all_records[0]->brand,
	// 								'model' => $all_records[0]->model,
	// 								'year' => $all_records[0]->year,
	// 								'car_type' => $all_records[0]->car_type,
	// 								'transmission' => $all_records[0]->transmission,
	// 								'vin' => $all_records[0]->vin,
	// 								'location'=>$all_record[0]->car_location,
	// 								'mileage' => $all_records[0]->mileage,
	// 								'seating_capacity' => $all_records[0]->seating_capacity,
	// 								'interior_color' => $all_records[0]->interior_color,
	// 								'exterior_color' => $all_records[0]->exterior_color,
	// 								'description' => $all_records[0]->description,
	// 								'insurence' => $insurence,
	// 								'rear_view_image' => $rear_view_image,
	// 							    'front_view_image' => $front_view_image,
	// 								'right_side_image' => $right_side_image,
	// 								'left_side_image' => $left_side_image,
	// 								'interior_image' => $interior_image,
	// 								'or_cr_doc' => $or_cr_doc,
	// 								'car_video' => $car_video,

	// 								// 'car_availability' => $all_records[0]->car_availability,
	// 								'unlimited_distance' => $all_records[0]->unlimited_distance,
	// 								'maximum_kilometer' => $all_records[0]->maximum_kilometer,
	// 								'excess_fee_per_kilometer' => $all_records[0]->excess_fee_per_kilometer,
	// 								'time_penalty_per_hour' => $all_records[0]->time_penalty_per_hour,
	// 								'price'=>$car_price,
	// 								'status' => $all_records[0]->status,
									
	// 						);

						
	// 					$posts = array(
	// 							'status' => '200',
	// 							'data' => $posts1
	// 					);
	// 			 	}else{

	// 			 		$posts = array(
	// 							'status' => '404',
	// 							'message' => 'no Record Found!..'
	// 						);
	// 			 	}
	// 			}else{
	// 				$posts = array(
	// 						'status' => '404',
	// 						'message' => 'Please Select Car'
	// 				);
	// 			}
				
	// 		}else{
	// 			$posts = array(
	// 						'status' => '404',
	// 						'message' => 'Invalid Token'
	// 				);
	// 		}
	// 	}else{
	// 			$posts = array(
	// 						'status' => '404',
	// 						'message' => 'Please Provide Token'
	// 				);
	// 		}
		

	// 	$this->output
	// 			->set_status_header(200)
	// 			->set_content_type('application/json')
	// 			->set_output(json_encode($posts)); 

	// }

	public function update_car_availability()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$car_availability = $_POST['car_availability'];
		 		$car_id = $_POST['car_id'];
		 		
		 		
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('car_id', 'Car Id', 'required');
				$this->form_validation->set_rules('car_availability', 'car availability', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Car Id And Car Availability required!',                
				   );

				} else 
				{

					$shopData = array(
						'car_availability' => $car_availability,
						
					);

					$user  = $this->carowner_model->updateRecord($car_id,$shopData,'tbl_car');
					
					if($user){
						$response = array(
						'status' => '200',
						'message' => 'Update Car Availability',
						);
					}else{
						$response = array(
						'status' => '404',
						'message' => 'Availability Not Updated',
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

	public function update_car_status()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$status = $_POST['status'];
		 		$car_id = $_POST['car_id'];
		 		
		 		
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('car_id', 'Car Id', 'required');
				$this->form_validation->set_rules('status', 'car availability', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Car Id And Car Status required!',                
				   );

				} else 
				{

					$shopData = array(
						'status' => $status,
						
					);

					$user  = $this->carowner_model->updateRecord($car_id,$shopData,'tbl_car');
					
					if($user){
						$response = array(
						'status' => '200',
						'message' => 'Update Car Status',
						);
					}else{
						$response = array(
						'status' => '404',
						'message' => 'Status Not Updated',
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

	
	public function add_car_calendar_pricing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$car_id = $_POST['car_id'];
		 		$price = $_POST['price'];
		 		$start = $_POST['start'];
		 		$end = $_POST['end'];
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('car_id', 'Car Id', 'required');
				$this->form_validation->set_rules('price', 'Price', 'required');
				$this->form_validation->set_rules('start', 'Start', 'required');


				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Car Id,Price,Date required!',                
				   );

				} else 
				{

					$check_car_price = $this->carowner_model->check_car($car_id);
					if($check_car_price)
					{
						$check_car_price = $this->carowner_model->check_car_price($car_id,$start);
						if($check_car_price)
						{
							$response = array(
								'status' => '404',
								'message' => 'Price already added select date',
								);
						}else{

							$shopData = array(
							'car_id' => $car_id,
							'price' => $price,
							'start' => $start,
							'end' => $end,
							'created' => date('Y-m-d'),
							'status' => '1',
							);

							$user  = $this->carowner_model->insertRecord($shopData,'tbl_car_price_calender');
							
							
							$response = array(
								'status' => '200',
								'message' => 'Price added successfully',
								);
							
						}

					}else{

						$response = array(
							'status' => '404',
							'message' => 'Car not found',
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

	public function update_car_calendar_pricing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$car_id = $_POST['car_id'];
		 		$price = $_POST['price'];
		 		$startDate = $_POST['startDate'];
		 		$endDate = $_POST['endDate'];
		 		
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('car_id', 'Id', 'required');
				$this->form_validation->set_rules('price', 'Price', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Car Id  and Price required!',                
				   );

				} else 
				{

					$start_date = $startDate;
			        $end_date = $endDate;

			        $current_date = new DateTime($start_date);
			        $end_date = new DateTime($end_date);

			        while ($current_date <= $end_date) {

			            $new_date = $current_date->format('Y-m-d');
			            $current_date->modify('+1 day');

			            // echo $new_date;

			            $check_calender_price = $this->carowner_model->check_calender_price($car_id,$new_date);
					
						if($check_calender_price){
							
							$shopData = array(
								'price' => $price,
							);

							$r = $this->carowner_model->updateCalenderPrice($car_id,$new_date,$shopData,'tbl_car_price_calender');
						}else{

							$shopData = array(
								'car_id' => $car_id,
								'price' => $price,
								'start' => $new_date,
								'created' =>  date('Y-m-d')
							);

							$r = $this->carowner_model->insertRecord($shopData,'tbl_car_price_calender');

						}
			        }

			       
					$response = array(
						'status' => '200',
						'message' => 'Price Update successfully',
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

	// public function all_car_calendar_pricing()
	// {
	// 	header("Access-Control-Allow-Origin: *");
	// 	header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
	// 	header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
	// 	 $token = $this->input->get_request_header('Access-Token');
	// 	if($token){
	// 		$isValidToken = $this->carowner_model->checkToken($token);
	// 		$getidbyToken = $this->carowner_model->getidbyToken($token);
	// 		 $loginUserId = $getidbyToken->id;
			
	// 		if($isValidToken) {
				
	// 			$_POST = json_decode(file_get_contents('php://input'), true);
 // 				$car_id = $_POST['car_id'];
 // 				$startDate = $_POST['startDate'];
 // 				$endDate = $_POST['endDate'];

 // 				$this->form_validation->set_error_delimiters('', '');
	// 			$this->form_validation->set_rules('car_id', 'Id', 'required');
	// 			$this->form_validation->set_rules('startDate', 'startDate', 'required');
	// 			$this->form_validation->set_rules('endDate', 'endDate', 'required');
				

	// 			if ($this->form_validation->run() === FALSE) {
	// 				$posts = array(
	// 			        'status' => '404',
	// 			        'message' => 'Car Id,Start Date And End Date required!',                
	// 			   );

	// 			} else 
	// 			{

					
	// 				$all_records = $this->carowner_model->get_all_car_calendar_pricing($car_id,$startDate,$endDate,'tbl_car_price_calender');
					
	// 				// print_r($all_records);
	// 				// die;
	// 				$car_detials = $this->carowner_model->get_car_min_max_pricing($car_id,'tbl_car');

					
				
	// 				$posts1 =[];

	// 				if(!empty($car_detials))
	// 				{
	// 					foreach($all_records as $all_record) {
							
	// 						$posts1[] = array(
									
	// 								'date' => $all_record->start,
	// 								'price' => $all_record->price,
	// 						);

	// 					}

	// 					$posts2 = array(
									
	// 								'car_id' => $car_detials[0]->id,
	// 								'min_price' => $car_detials[0]->min_price,
	// 								'max_price' => $car_detials[0]->max_price,
	// 								'change_price' => $posts1,
	// 						);




	// 					$posts = array(
	// 							'status' => '200',
	// 							'data' => $posts2,

	// 					);
	// 			 	}else{

	// 			 		$posts = array(
	// 							'status' => '404',
	// 							'message' => 'No Record Found!..'
	// 						);
	// 			 	}

	// 			}
				
				
	// 		}else{
	// 			$posts = array(
	// 						'status' => '404',
	// 						'message' => 'Invalid Token'
	// 				);
	// 		}
	// 	}else{
	// 			$posts = array(
	// 						'status' => '404',
	// 						'message' => 'Please Provide Token'
	// 				);
	// 		}
		

	// 	$this->output
	// 			->set_status_header(200)
	// 			->set_content_type('application/json')
	// 			->set_output(json_encode($posts)); 

	// }


	public function update_min_max_pricing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$car_id = $_POST['car_id'];
		 		$min_price = $_POST['min_price'];
		 		$max_price = $_POST['max_price'];
		 		
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('car_id', 'Id', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Car Id required!',                
				   );

				} else 
				{

					$check_car = $this->carowner_model->check_car($car_id);
					
					if($check_car){
						
						$shopData = array(
							'min_price' => $min_price,
							'max_price' => $max_price,
						);

						$r = $this->carowner_model->updateRecord($car_id,$shopData,'tbl_car');
							
						$response = array(
							'status' => '200',
							'message' => 'Car Minimum And Maximum Price Update Successfully',
						);
					}else{

						$response = array(
							'status' => '404',
							'message' => 'Invalid Car Id',
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

	public function delete_car_calendar_pricing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			 $loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$id = $_POST['id'];
				
				$userdelete = $this->carowner_model->userdelete($id,'tbl_car_price_calender');

				if($userdelete)
				{
				
					$posts = array(
							'status' => '200',
							'message' => 'Price deleted successfully'
						);
				}else{
					$posts = array(
							'status' => '404',
							'message' => 'Price not deleted.'
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

	public function get_car_location()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			 $loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				 $car_id = $_POST['car_id'];
				
				
				$all_records = $this->carowner_model->get_car_location($car_id,'tbl_car');
				// print_r($all_records);

				if(!empty($all_records))
				{
					foreach($all_records as $all_record) {
						// print_r($all_record);

						
						
						$posts1 = array(
								'id' => $all_record->id,
								'car_location' => $all_record->car_location,
								'lat' => $all_record->lat,
								'lng' => $all_record->lng,
								
						);

					}
					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			 	}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'no Record Found!..'
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

	public function update_car_location()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$id = $_POST['car_id'];
		 		$lat = $_POST['lat'];
		 		$lng = $_POST['lng'];
		 		$car_location = $_POST['car_location'];

		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('car_id', 'Id', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Car Id required!',                
				   );

				} else 
				{
					$shopData = array(
							'lat' => $lat,
							'lng' => $lng,
							'car_location' => $car_location,
							'car_address' => $car_location,
						);

					$r = $this->carowner_model->updateRecord($id,$shopData,'tbl_car');
			
			
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


	public function get_unlimited_distance()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			 $loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$id = $_POST['car_id'];
				
				
				$all_records = $this->carowner_model->get_car_location($id,'tbl_car');
			

				if(!empty($all_records))
				{
					foreach($all_records as $all_record) {
						// print_r($all_record);

						
						
						$posts1 = array(
								'id' => $all_record->id,
								'unlimited_distance' => $all_record->unlimited_distance,
								'maximum_kilometer' => $all_record->maximum_kilometer,
								'excess_fee_per_kilometer'=>$all_record->excess_fee_per_kilometer,
								'time_penalty_per_hour' => $all_record->time_penalty_per_hour,
								
						);

					}
					$posts = array(
							'status' => '200',
							'data' => $posts1
					);
			 	}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'no Record Found!..'
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

	public function update_unlimited_distance()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$id = $_POST['car_id'];
		 		$unlimited_distance = $_POST['unlimited_distance'];
		 		$maximum_kilometer = $_POST['maximum_kilometer'];
		 		$excess_fee_per_kilometer = $_POST['excess_fee_per_kilometer'];
		 		$time_penalty_per_hour = $_POST['time_penalty_per_hour'];

		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('car_id', 'Id', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Car Id required!',                
				   );

				} else 
				{
					$shopData = array(
							'unlimited_distance' => $unlimited_distance,
							'maximum_kilometer' => $maximum_kilometer,
							'excess_fee_per_kilometer'=>$excess_fee_per_kilometer,
							'time_penalty_per_hour' => $time_penalty_per_hour,
							
						);

					$r = $this->carowner_model->updateRecord($id,$shopData,'tbl_car');
			
			
					$response = array(
						'status' => '200',
						'message' => 'Distance Update successfully',
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


	public function all_booking()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);
		 		
		 		$car_id = $_POST['car_id'];
		 		$booking_status = $_POST['booking_status'];
		 		$from_date = $_POST['from_date'];
		 		$to_date = $_POST['to_date'];

		 		

				$current_booking = $this->carowner_model->get_all_booking($loginUserId,$car_id,$booking_status,$from_date,$to_date);

				if(!empty($current_booking)){

					foreach($current_booking as $booking_list) {

							$car_id = $booking_list->car_id;
							$car_records = $this->carowner_model->get_single_car_details($car_id);

							if($car_records[0]->rear_view_image){
								$rear_view_image = base_url_image().$car_records[0]->rear_view_image; 
							}else{
								$rear_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_records[0]->front_view_image){
								$front_view_image = base_url_image().$car_records[0]->front_view_image; 
							}else{
								$front_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_records[0]->right_side_image){
								$right_side_image = base_url_image().$car_records[0]->right_side_image; 
							}else{
								$right_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_records[0]->left_side_image){
								$left_side_image = base_url_image().$car_records[0]->left_side_image; 
							}else{
								$left_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($car_records[0]->interior_image){
								$interior_image = base_url_image().$car_records[0]->interior_image; 
							}else{
								$interior_image =  base_url().'assets/img/no-image.jpg';
							}

							if($booking_list->qr_image){
								$qr_image = base_url_qr_image().$booking_list->qr_image; 
							}else{
								$qr_image =  base_url().'assets/img/no-image.jpg';
							}

							$posts1[] = array(
								'booking_id' => $booking_list->order_id,
								'pickup_date' => $booking_list->pickup_date,
								'return_date' => $booking_list->return_date,
								'total_fair' => $booking_list->total_fair,
								'booking_status' => $booking_list->booking_status,

								
								'brand' => $car_records[0]->brand,
								'model' => $car_records[0]->model,
								'year' => $car_records[0]->year,
								'car_name' => $car_records[0]->brand.' '.$car_records[0]->model.' '.$car_records[0]->year,
								'rear_view_image' => $rear_view_image,
							    'front_view_image' => $front_view_image,
								'right_side_image' => $right_side_image,
								'left_side_image' => $left_side_image,
								'interior_image' => $interior_image,
								'qr_image' => $qr_image,
									
								
						);

					}
					$posts = array(
							'status' => '200',
							'data' => $posts1
					);	

				}else{
					$posts = array(
							'status' => '404',
							'message' => 'You have not booked any cars..'
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


	public function book_car_transaction_history()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->carowner_model->checkToken($token);
			$getidbyToken = $this->carowner_model->getidbyToken($token);
			 $loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				// $_POST = json_decode(file_get_contents('php://input'), true);
				
				$all_records = $this->carowner_model->get_all_car_transaction_history($loginUserId);

					 // print_r($all_records);
					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {


						   $single_car_details = $this->carowner_model->get_single_car_details($all_record->car_id);
							

							if($single_car_details[0]->rear_view_image){
								$rear_view_image = base_url_image().$single_car_details[0]->rear_view_image; 
							}else{
								$rear_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($single_car_details[0]->front_view_image){
								$front_view_image = base_url_image().$single_car_details[0]->front_view_image; 
							}else{
								$front_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($single_car_details[0]->right_side_image){
								$right_side_image = base_url_image().$single_car_details[0]->right_side_image; 
							}else{
								$right_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($single_car_details[0]->left_side_image){
								$left_side_image = base_url_image().$single_car_details[0]->left_side_image; 
							}else{
								$left_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($single_car_details[0]->interior_image){
								$interior_image = base_url_image().$single_car_details[0]->interior_image; 
							}else{
								$interior_image =  base_url().'assets/img/no-image.jpg';
							}

							if($single_car_details[0]->or_cr_doc){
								$or_cr_doc = base_url_image().$single_car_details[0]->or_cr_doc; 
							}else{
								$or_cr_doc =  base_url().'assets/img/no-image.jpg';
							}

							if($single_car_details[0]->insurence){
								$insurence = base_url_image().$single_car_details[0]->insurence; 
							}else{
								$insurence =  base_url().'assets/img/no-image.jpg';
							}

							if($single_car_details[0]->car_video){
								$car_video = base_url_image().$single_car_details[0]->car_video; 
							}else{
								$car_video =  base_url().'assets/img/no-image.jpg';
							}

									// echo $car_price;


							$posts1 = array(
								'car_id' => $single_car_details[0]->id,
								'brand' => $single_car_details[0]->brand,
							    'model' => $single_car_details[0]->model,
								'year' => $single_car_details[0]->year,
								'car_name'=>$single_car_details[0]->brand.' '.$single_car_details[0]->model.' '.$single_car_details[0]->year,

								'car_type' => $single_car_details[0]->car_type,
								'transmission' => $single_car_details[0]->transmission,
								'vin' => $single_car_details[0]->vin,
								'mileage' => $single_car_details[0]->mileage,
								'interior_color' => $single_car_details[0]->interior_color,
								'exterior_color' => $single_car_details[0]->exterior_color,
								'fuel_type' => $single_car_details[0]->fuel_type,
								'description' => $single_car_details[0]->description,
								'rear_view_image' => $rear_view_image,
								'front_view_image' => $front_view_image,
								'right_side_image' => $right_side_image,
								'left_side_image' => $left_side_image,
								'interior_image' => $interior_image,
								'or_cr_doc' => $or_cr_doc,
								'car_video' => $car_video,
								
							);

							if($all_record->front_view_image){
								$front_view_image = base_url_image().$all_record->front_view_image; 
							}else{
								$front_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->left_side_image){
								$left_side_image = base_url_image().$all_record->left_side_image; 
							}else{
								$left_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->back_side_image){
								$back_side_image = base_url_image().$all_record->back_side_image; 
							}else{
								$back_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->right_side_image){
								$right_side_image = base_url_image().$all_record->right_side_image; 
							}else{
								$right_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->interior_image){
								$interior_image = base_url_image().$all_record->interior_image; 
							}else{
								$interior_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_record->qr_image){
								$qr_image = base_url_qr_image().$all_record->qr_image; 
							}else{
								$qr_image =  base_url().'assets/img/no-image.jpg';
							}

							$posts2[] = array(
								'booking_id' => $all_record->id,
								'booking_order_id' => $all_record->order_id,
								'pickup_date' => $all_record->pickup_date,
								'return_date' => $all_record->return_date,
								'total_fair' => $all_record->total_fair,
								'payment_mode' => $all_record->payment_mode,
								'booking_date' => $all_record->created,
								'booking_status' => $all_record->booking_status,
								
								'car_details' => $posts1,
								
								
								'front_view_image' => $front_view_image,
								'left_side_image' => $left_side_image,
								'back_side_image' => $back_side_image,
								'right_side_image' => $right_side_image,
								'interior_image' => $interior_image,
								'qr_image'=>$qr_image
								
								
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
