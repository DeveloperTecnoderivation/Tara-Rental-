<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	 private $google_api_key = 'AIzaSyA49b990dAI74HLt5PtIyKKz_BNpli-0_Q';


	public function __construct()
	{
		parent::__construct();
		 $this->load->model('app/user_model');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		$this->load->library('Ciqrcode');
		// $this->load->helper('url');
        $this->load->library('curl'); // Using cURL library to make requests
		ini_set('precision', 10);
       ini_set('serialize_precision', 10);

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
 		$password = md5($_POST['password']);
 		
		
 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('f_name', 'First Name', 'required');
		$this->form_validation->set_rules('l_name', 'Last Name', 'required');
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
			
		 	$check_email = $this->user_model->check_email($email,'tbl_users');
		 	$check_phone = $this->user_model->check_phone($phone,'tbl_users');

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
							'role'=>'user',
							'email' => $email,
							'phone' => $phone,
							'password' =>$password,
							'status' => '0',
							'otp'=> $otp,
							'created' =>  date('Y-m-d'),
							
						);

						$user  = $this->user_model->insertRecord($shopData,'tbl_users');

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
								//'message' => 'Successfuly register',
								'data' => $posts
							);
						}
						else {
							$response = array(
								'status' => '404',
								'message' => 'User not register'
							);
						}

					}
					
				}

		}

		// print_r($response);
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

			 	$check_email_phone_otp = $this->user_model->check_email_phone_otp($email,$phone,$otp,'tbl_users');
			 	
				if($check_email_phone_otp)
				{	
					$tokenData = array(
						'status' =>'1',
					);

					$insertoken = $this->user_model->updateOTP($email,$phone,$tokenData);
					$response = array(
						'status' => '200',
						'message' => 'User registration successfullly',
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

	public function forgot_password() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
 		$posts = array();
 		$_POST = json_decode(file_get_contents('php://input'), true);
 		
 		$email = $_POST['email'];
 	
 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email', 'Email', 'required');
		// $this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => 'All field required!',                
		   );

		} else 
		{
			$check_login = $this->user_model->check_email_forgot($email,'tbl_users');
			
			if($check_login) 
			{
				$user_id = $check_login->id;
				$this->send_email_forgot_password($email,$user_id);
				$response = array(
					'status' => '200',
					'message' => 'New Password Send Register Email Id!'
				);
				
			}
			else {
				$response = array(
					'status' => '404',
					'message' => 'Email is not registered!'
				);
		}

		
	
		}
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function update_user_location() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
		 		$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);
		 		
		 		$lat = $_POST['lat'];
		 		$lng = $_POST['lng'];
		 		$address = $_POST['address'];
		 	
		 		//validation rules
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('lat', 'lat', 'required');
				$this->form_validation->set_rules('lng', 'lng', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please provide latitude or lagitude!',                
				   );

				} else 
				{
					$updateProfileData = array(
						'lat' => $lat,
						'lng' =>$lng,
						'address' => $address,
					);

					// print_r($loginUserId);

					$r = $this->user_model->update_location($loginUserId,$updateProfileData);
					
					$response = array(
						'status' => '200',
						'message' => 'Location updated successfuly!'
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

	public function get_user_location()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			
			$posts = array();
			if($isValidToken) {
				$get_records = $this->user_model->get_record('tbl_users',$token);
				// print_r($get_records);

				if(!empty($get_records))
				{
					

						$posts = array(
							'status' => '200',
							'data' => array(
								'id' => $get_records[0]->id,
								'lat' => $get_records[0]->lat,
								'lng' => $get_records[0]->lng,
								'address' => $get_records[0]->address,
							)
						);
					
				
				 }
				 else{
					$posts = array(
							'status' => '404',
							'message' => 'No record found.'
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
	

	public function top_deals_car()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);

				$user_record = $this->user_model->getTokenData($loginUserId);
				if(($user_record->lat) &&($user_record->lng)){
					$all_records = $this->user_model->get_all_car_by_lat_lng($user_record->lat,$user_record->lng,'50'); //80 Km Ditance 
				}else{
                    $all_records = $this->user_model->get_all_car();
				}



				if(!empty($all_records))
				{
					$total_record =0;
					foreach($all_records as $all_record) {
						

						$current_date = date('Y-m-d');
						$car_make = $this->user_model->get_make($all_record->make);
						$car_model = $this->user_model->get_model($all_record->model);
						
						$car_price = $this->user_model->get_price($all_record->id,$current_date);
						// print_r($all_record->id);
						if($car_price){
							$car_price = $car_price[0]->price;
						}else{
							$car_price = '0';
						}



						if($all_record->power_staring == '1'){
							$power_staring = 'Yes';
						}else{
							$power_staring = 'No';
						}

						if($all_record->music_system == '1'){
							$music_system = 'Yes';
						}else{
							$music_system = 'No';
						}

						if($all_record->air_condition == '1'){
							$air_condition = 'Yes';
						}else{
							$air_condition = 'No';
						}

						if($all_record->air_freshner == '1'){
							$air_freshner = 'Yes';
						}else{
							$air_freshner = 'No';
						}

						if($all_record->airbags == '1'){
							$airbags = 'Yes';
						}else{
							$airbags = 'No';
						}
						if($all_record->power_window == '1'){
							$power_window = 'Yes';
						}else{
							$power_window = 'No';
						}

						if($all_record->rear_image){
							$rear_image = base_url_image().$all_record->rear_image; 
						}else{
							$rear_image =  base_url().'assets/img/no-image.jpg';
						}

						if($all_record->front_image){
							$front_image = base_url_image().$all_record->front_image; 
						}else{
							$front_image =  base_url().'assets/img/no-image.jpg';
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

						if($all_record->car_video){
							$car_video = base_url_image().$all_record->car_video; 
						}else{
							$car_video =  base_url().'assets/img/no-image.jpg';
						}

						$average_rating = $this->user_model->get_average_rating($all_record->id);

						if($car_price > 0){
							$total_record++;
								$posts1[] = array(
									'id' => $all_record->id,
									'car_id' => $all_record->car_location,
									'fuel_type' => $all_record->fuel_type,
									'make' => $car_make[0]->name,
									'model' => $car_model[0]->name,
									'year' => $all_record->year,
									'transmission' => $all_record->transmission,
									'vin' => $all_record->vin,
									'average_rating'=>$average_rating,

									'mileage' => $all_record->mileage,
									'seating_capacity' => $all_record->seating_capacity,
									'description' => $all_record->description,
									'power_staring' => $power_staring,
									'music_system' => $music_system,
									'air_condition' => $air_condition,
									'air_freshner' => $air_freshner,
									'airbags' => $airbags,
									'power_window' => $power_window,
									
									'rear_image' => $rear_image,
									'front_image' => $front_image,
									'right_side_image' => $right_side_image,
									'left_side_image' => $left_side_image,
									'interior_image' => $interior_image,
									'or_cr_doc' => $or_cr_doc,
									'car_video' => $car_video,

									'car_availability' => $all_record->car_availability,
									'unlimited_distance' => $all_record->unlimited_distance,
									'maximum_kilometer' => $all_record->maximum_kilometer,
									'excess_fee_per_kilometer' => $all_record->excess_fee_per_kilometer,
									'time_penalty_per_hour' => $all_record->time_penalty_per_hour,
									'price'=>$car_price
									
							);

							}
							$posts = array(
									'status' => '200',
									'data' => $posts1,
									'total_record'=>$total_record
							);
						}
						
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

	public function all_available_cars()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
					
				$lat = $_POST['filter_data']['lat'];
				$lng = $_POST['filter_data']['lng'];
				$price_range = $_POST['filter_data']['price_range'];
				$car_type = $_POST['filter_data']['car_type'];
				$transmission = $_POST['filter_data']['transmission'];
				$car_name = $_POST['filter_data']['search_car'];
				
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('lat', 'lat', 'required');
				$this->form_validation->set_rules('lng', 'lng', 'required');
				

				if ((empty($lat)) && (empty($lng))) {
					$posts = array(
				        'status' => '404',
				        'message' => 'latitude and longitude mandatory fields',                
				   );

				} else 
				{

					$all_records = $this->user_model->get_all_car_by_filter($lat,$lng,'50',$price_range,$car_type,$transmission,$car_name);

					 // print_r($all_records);
					if(!empty($all_records))
					{
						$total_record=0;
						foreach($all_records as $all_record) {


							$current_date = date('Y-m-d');
							

							$check_book_car = $this->user_model->check_book_car($all_record->id,$current_date);

							$average_rating = $this->user_model->get_average_rating($all_record->id);

							

							$car_price  = '0';

							if(!empty($check_book_car))
							{
								$car_price  = '0';
							}else{

								$car_price = $this->user_model->get_price($all_record->id,$current_date);
								if($car_price){
									$car_price = $car_price[0]->price;
								}else{
									$currentDay  = date('l');
									if(($currentDay=='Saturday') || ($currentDay=='Sunday')){
									  $car_price  = $all_record->max_price;
									}else{
								      $car_price  = $all_record->min_price;
									}
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

							// echo $car_price;

							

								
							if($price_range){
								$priceRangeArr = explode(';', $price_range);
								
								// echo $priceRangeArr[0];
								if(($priceRangeArr[0] <= $car_price) && ($priceRangeArr[1] >= $car_price))
								{
									$total_record++;
									$posts1[] = array(
										'id' => $all_record->id,
										'car_id' => $all_record->id,
										'price'=>$car_price,
										'brand' => $all_record->brand,
									    'model' => $all_record->model,
										'year' => $all_record->year,
										'car_name'=>$car_make[0]->name.' '.$car_model[0]->name.' '.$all_record->year,

										'car_rating'=>$average_rating,

										'car_type' => $all_record->car_type,
										'transmission' => $all_record->transmission,
										'vin' => $all_record->vin,
										'mileage' => $all_record->mileage,
										'interior_color' => $all_record->interior_color,
										'exterior_color' => $all_record->exterior_color,
										'fuel_type' => $all_record->fuel_type,
										'description' => $all_record->description,
										'car_location' => $all_record->car_location,
										'seating_capacity' => $all_record->seating_capacity,
										'rear_view_image' => $rear_view_image,
										'front_view_image' => $front_view_image,
										'right_side_image' => $right_side_image,
										'left_side_image' => $left_side_image,
										'interior_image' => $interior_image,
										'or_cr_doc' => $or_cr_doc,
										'car_video' => $car_video,
										'insurence'=>$insurence,
										'unlimited_distance' => $all_record->unlimited_distance,
										'maximum_kilometer' => $all_record->maximum_kilometer,
										'excess_fee_per_kilometer' => $all_record->excess_fee_per_kilometer,
										'time_penalty_per_hour' => $all_record->time_penalty_per_hour,

										// 'car_availability' => $all_record->car_availability,
										'status' => $all_record->status,
									);
									$posts = array(
										'status' => '200',
										'total_record'=>$total_record,
										'data' => $posts1
									);
								}else{
									// echo $car_price;
									$posts = array(
										'status' => '404',
										'message' => 'Car Not Available Your Location!..'
								    );	
								}
							}else{
								$total_record++;
								$posts1[] = array(
									'id' => $all_record->id,
									'car_id' => $all_record->id,
									'price'=>$car_price,
									'brand' => $all_record->brand,
								    'model' => $all_record->model,
									'year' => $all_record->year,
									'car_name'=>$car_make[0]->name.' '.$car_model[0]->name.' '.$all_record->year,

									'car_type' => $all_record->car_type,
									'transmission' => $all_record->transmission,
									'vin' => $all_record->vin,
									'mileage' => $all_record->mileage,
									'interior_color' => $all_record->interior_color,
									'exterior_color' => $all_record->exterior_color,
									'fuel_type' => $all_record->fuel_type,
									'description' => $all_record->description,
									'car_location' => $all_record->car_location,
									'seating_capacity' => $all_record->seating_capacity,
									'rear_view_image' => $rear_view_image,
									'front_view_image' => $front_view_image,
									'right_side_image' => $right_side_image,
									'left_side_image' => $left_side_image,
									'interior_image' => $interior_image,
									'or_cr_doc' => $or_cr_doc,
									'car_video' => $car_video,
									'insurence'=>$insurence,
									'unlimited_distance' => $all_record->unlimited_distance,
									'maximum_kilometer' => $all_record->maximum_kilometer,
									'excess_fee_per_kilometer' => $all_record->excess_fee_per_kilometer,
									'time_penalty_per_hour' => $all_record->time_penalty_per_hour,

									// 'car_availability' => $all_record->car_availability,
									'status' => $all_record->status,
								);

								$posts = array(
									'status' => '200',
									'total_record'=>$total_record,
									'data' => $posts1
								);
							}
			

							// }else{
							// 	$posts = array(
							// 		'status' => '404',
							// 		'message' => 'Car Not Available Your Location!..'
							//     );
							// }
							
					    }
							
				 	}else{

				 		$posts = array(
								'status' => '404',
								'message' => 'Car Not Available Your Location!..'
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


   
	
	public function car_calendar_all_pricing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			 $loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_id = $_POST['car_id'];
 				$startDate = $_POST['startDate'];
 				$endDate = $_POST['endDate'];

 				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('car_id', 'Id', 'required');
				$this->form_validation->set_rules('startDate', 'startDate', 'required');
				$this->form_validation->set_rules('endDate', 'endDate', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => 'Car Id,Start Date And End Date required!',                
				   );

				} else 
				{

					
					$all_records = $this->user_model->get_all_car_calendar_pricing($car_id,$startDate,$endDate,'tbl_car_price_calender');
					
					// print_r($all_records);
					// die;
					$car_detials = $this->user_model->get_car_min_max_pricing($car_id,'tbl_car');

					
				
					$posts1 =[];

					if(!empty($car_detials))
					{
						foreach($all_records as $all_record) {
							
							$posts1[] = array(
									
									'date' => $all_record->start,
									'price' => $all_record->price,
							);

						}

						$posts2 = array(
									
									'car_id' => $car_detials[0]->id,
									'min_price' => $car_detials[0]->min_price,
									'max_price' => $car_detials[0]->max_price,
									'change_price' => $posts1,
							);




						$posts = array(
								'status' => '200',
								'data' => $posts2,

						);
				 	}else{

				 		$posts = array(
								'status' => '404',
								'message' => 'No Record Found!..'
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

	public function book_car_with_cop()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				 $loginUserId = $loginUserId;
 				
		 		$car_id = $_POST['car_id'];
		 		$pickup_date = $_POST['pickup_date'];
		 		$return_date = $_POST['return_date'];
		 		$pick_up_time = $_POST['pick_up_time'];
		 		$total_fair = $_POST['total_fair'];
		 		$payment_mode = $_POST['payment_mode']; //1 //2;
		 		$wallet_amount = $_POST['wallet_amount']; //1 //2;

		 		// $payment_mode = 'CASH_ON_PICKUP';
		 		
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('car_id', 'car_id', 'required');
		 		$this->form_validation->set_rules('pickup_date', 'pickup_date', 'required');
				$this->form_validation->set_rules('pick_up_time', 'pick_up_time', 'required');
				$this->form_validation->set_rules('total_fair', 'total_fair', 'required');
				$this->form_validation->set_rules('payment_mode', 'Payment Mode', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please fill all the mandatory fields',                
				   );

				} else 
				{
					
					

					if( strtotime($pickup_date) <= strtotime($return_date)){
					
						$car_details = $this->user_model->get_car_details($car_id);

						$shopData = array(
								'order_id' => $this->generateOrderId(),
								'user_id' => $loginUserId,
								'car_id' => $car_id,
								'car_owner_id'=>$car_details[0]->car_owner_id,
								'pickup_date' => $pickup_date,
								'return_date' => $return_date,
								'total_fair' => $total_fair,
								'payment_mode' => $payment_mode,
								'qr_image'=>$qr_image,
								'created' => date('Y-m-d'),
								'modified' => date('Y-m-d'),
								'status'=>'1',
								'booking_status'=>'Pending'

							);

						
						$check_car_available = $this->user_model->check_car_available($car_id,$pickup_date);
						// print_r($check_car_available);
						if($check_car_available == '1'){
							$response = array(
								'status' => '404',
								'message' => 'Car Already Booked. Please Book Another Car',
							);
						}else{

							
								$user  = $this->user_model->insertRecord($shopData,'tbl_car_order_booking');
								if($user){

									
									if($payment_mode == '1')
									{
										$new_amount = floatval($wallet_amount)-floatval($total_fair);
						
										$updateProfileData = array(
											'tara_wallet' => $new_amount,
										);

										$r = $this->user_model->updateWallet($loginUserId,$updateProfileData);
									}

									$car_booking_details = $this->user_model->get_booking_details($user);

									$booking_order_id = $car_booking_details[0]->order_id;
									$qr_url = $booking_order_id;
									$booking_id = $user;

									$qr_code_random = 'qr-code-image-';
									$qr_image = $qr_code_random.date('m-d-Y').'.png';
									$params['data'] = $qr_url;
									$params['level'] = 'H';
									$params['size'] = 50;
									$params['savename']= FCPATH."assets/qrcode/".$qr_image;
									$this->ciqrcode->generate($params);

									$updateProfileData = array(
										'qr_image' => $qr_image,
										
									);
									$r = $this->user_model->update_qr($booking_id,$updateProfileData);


									$response = array(
									'status' => '200',
									'message' => 'Car booked successfully',
									);
								}else{
									$response = array(
									'status' => '404',
									'message' => 'Car not booked',
									);
								}
							
							


						}
						
					}else{
                       $response = array(
							'status' => '404',
							'message' => 'Return date should be greather than Pickup date',
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


	public function get_job_order_price()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;
 				
		 		$pickup_port = $_POST['pickup_port'];
		 		$trailer_chassis_type = $_POST['trailer_chassis_type'];
				$delivery_address = $_POST['delivery_address'];
		 		$delivery_address_lat = $_POST['delivery_address_lat'];
		 		$delivery_address_lng = $_POST['delivery_address_lng'];
				
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('pickup_port', 'Pickup Port', 'required');
		 		$this->form_validation->set_rules('trailer_chassis_type', 'Chassis Type', 'required');
				$this->form_validation->set_rules('delivery_address', 'Delivery Address', 'required');
				$this->form_validation->set_rules('delivery_address_lat', 'Delivery Address Latitude', 'required');
				$this->form_validation->set_rules('delivery_address_lng', 'Delivery Address Longitude', 'required');

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{

					  $get_pickup_port_details = $this->user_model->get_pickup_port_details($pickup_port);
					  // print_r($get_pickup_port_details);

					  $pickup_port_lat = $get_pickup_port_details[0]->lat;
					  $pickup_port_lng = $get_pickup_port_details[0]->lng;

					
					  // $total_distance_val = $this->distance_total($delivery_address_lat, $delivery_address_lng, $pickup_port_lat, $delivery_address_lng, 'km');

					  $total_distance_val = $this->calculate_distance($delivery_address_lat, $delivery_address_lng, $pickup_port_lat, $pickup_port_lng, 'km');

					   
					$total_km = round($total_distance_val, 2);

				

					 $get_fair_management = $this->user_model->get_fair_management($trailer_chassis_type);

					 // print_r($get_fair_management[0]);
					 $diesel_price = $get_fair_management[0]->diesel_price;
					 $labor_cost_charge = $get_fair_management[0]->labor_cost_charge;
					 $batteries_charge = $get_fair_management[0]->batteries_charge;
					 $depreciation_charge = $get_fair_management[0]->depreciation_charge;
					 $interest_expense_charge = $get_fair_management[0]->interest_expense_charge;
					 $repairs_and_maintenance_charge = $get_fair_management[0]->repairs_and_maintenance_charge;
					 $registration_and_insurance_charge = $get_fair_management[0]->registration_and_insurance_charge;
					 $comminication_equipments_charge = $get_fair_management[0]->comminication_equipments_charge;
					 $other_investments_charge = $get_fair_management[0]->other_investments_charge;
					 
					 $markup_charge = $get_fair_management[0]->markup_charge;
					 $vat_charge = $get_fair_management[0]->vat;


					$total_daily_charge = round(($labor_cost_charge+$batteries_charge+$depreciation_charge+$interest_expense_charge+$repairs_and_maintenance_charge+$registration_and_insurance_charge+$comminication_equipments_charge+$other_investments_charge),2);

					 if($trailer_chassis_type == '1')
					 {
					 	
					 	$diesel_liter = round((($total_km*2*$diesel_price)/2.25),2);
					 	$tires = round((($total_km*2)*3.52),2);
					 	$oil_and_lubricants = round((($total_km*2)*4.84),2);

					    $total_km_based_charged = $diesel_liter+$tires+$oil_and_lubricants;


					 }else{
					    $diesel_liter = (($total_km*2*$diesel_price)/1.13);
					    $tires = round((($total_km*2)*8.8),2);
					    $oil_and_lubricants = round((($total_km*2)*4.84),2);

					    $total_km_based_charged = $diesel_liter+$tires+$oil_and_lubricants;
					 }

					 // echo $total_km_based_charged;
					$total_cost = $total_km_based_charged+$total_daily_charge;
					$mark_up = round((($total_cost*$markup_charge)/100),2);

					$mark_up_total_cost =$total_cost+$mark_up;
					$vat = round((($mark_up_total_cost*$vat_charge)/100),2);

					$customer_rate = round(($mark_up_total_cost+$vat),2);
					$total_amount = $customer_rate;



					 $distance_fee = $total_km_based_charged;
					 
					 $distance_fee_mark_up = round((($distance_fee*$markup_charge)/100),2);
					 $distance_fee_mark_up_total_cost =$distance_fee+$distance_fee_mark_up;
					 
					 $distance_fee_vat = round((($distance_fee_mark_up_total_cost*$vat_charge)/100),2);
					 $distance_fee_rate = round(($distance_fee_mark_up_total_cost+$distance_fee_vat),2);
					


					 $sercice_charge_fee = $total_daily_charge;
					 
					 $sercice_charge_mark_up = round((($sercice_charge_fee*$markup_charge)/100),2);
					$sercice_charge_mark_up_total_cost =$sercice_charge_fee+$sercice_charge_mark_up;
					
					$sercice_charge_vat = round((($sercice_charge_mark_up_total_cost*$vat_charge)/100),2);
					$sercice_charge_rate = round(($sercice_charge_mark_up_total_cost+$sercice_charge_vat),2);
					
					
					$posts = array(
						// 'distance_fee' => $total_km_based_charged,
						// 'service_charge' => $total_daily_charge,
						// 'total_cost' => $total_cost,
						// 'markup_charge_percentage' => $markup_charge,
						// 'markup_cost' => $mark_up,
						// 'vat_charge_percentage' => $vat_charge,
						// 'vat_cost' => $vat,

						'pickup_port'=>$pickup_port,
						'delivery_address'=>$delivery_address,
						'distance_fee' => $distance_fee_rate,
						'service_charge' => $sercice_charge_rate,
						'total_amount' => $total_amount,
						'total_km'=>$total_km
						
					);

				}

				$posts1 = array(
							'status' => '200',
							'data' => $posts
					);	

				
			}else{
				$posts1 = array(
							'status' => '404',
							'message' => 'Invalid Token'
					);
			}
		}else{
				$posts1 = array(
							'status' => '404',
							'message' => 'Please Provide Token'
					);
			}
		

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts1,JSON_NUMERIC_CHECK)); 

	}

	

	public function book_job_order_find_driver()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;

 				// $select_driver_id = $_POST['select_driver_id'];
		 		$pickup_port = $_POST['pickup_port'];
		 		$trailer_chassis_type_id = $_POST['trailer_chassis_type_id'];
				$consignee_name = $_POST['consignee_name'];
				$delivery_address = $_POST['delivery_address'];
		 		$delivery_address_lat = $_POST['delivery_address_lat'];
		 		$delivery_address_lng = $_POST['delivery_address_lng'];
				$container_return_address = $_POST['container_return_address'];
		 		$container_return_address_lat = $_POST['container_return_address_lat'];
		 		$container_return_address_lng = $_POST['container_return_address_lng'];
				$pick_up_date_time = $_POST['pick_up_date_time'];
		 		$declared_value = $_POST['declared_value'];
		 		$weight = $_POST['weight'];

		 		$bill_of_loading = $_POST['bill_of_loading'];
		 		$packing_list = $_POST['packing_list'];
		 		$certificate_of_payment = $_POST['certificate_of_payment'];
		 		$gate_pass = $_POST['gate_pass'];
		 		$tabs = $_POST['tabs'];
		 		$total_amount = $_POST['total_amount'];
		 		$distance_fee = $_POST['distance_fee'];
		 		$service_charge = $_POST['service_charge'];
		 		$payment_type = $_POST['payment_type'];
		 		$note_to_driver = $_POST['note_to_driver'];
		 		$wallet_amount = $_POST['wallet_amount'];

		 		
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('pickup_port', 'Pickup Port', 'required');
		 		$this->form_validation->set_rules('trailer_chassis_type_id', 'Chassis Type', 'required');
				$this->form_validation->set_rules('delivery_address', 'Delivery Address', 'required');
				$this->form_validation->set_rules('container_return_address', 'Container Return Address', 'required');
				$this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
				$this->form_validation->set_rules('distance_fee', 'Distance Fee', 'required');
				$this->form_validation->set_rules('service_charge', 'Service Charge', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{
					// $chessis_details = $this->user_model->get_chessis_details($trailer_chassis_type_id);
					// print_r($chessis_details);
					// die;
					$order_id = $this->generateOrderId();
					
					$shopData = array(
								
						'order_id' => $order_id,
						'user_id' => $loginUserId,
						'pickup_port' => $pickup_port,
						'trailer_chassis_type_id' => $trailer_chassis_type_id,
						'consignee_name' => $consignee_name,
						'delivery_address' => $delivery_address,
						'delivery_address_lat' => $delivery_address_lat,
						'delivery_address_lng' => $delivery_address_lng,
						'container_return_address' => $container_return_address,
						'container_return_address_lat' => $container_return_address_lat,
						'container_return_address_lng' => $container_return_address_lng,
						'pick_up_date_time' => $pick_up_date_time,
						'declared_value' => $declared_value,
						'weight' => $weight,
						'bill_of_loading' => $bill_of_loading,
						'packing_list'=>$packing_list,
						'certificate_of_payment'=>$certificate_of_payment,
						'gate_pass'=>$gate_pass,
						'tabs'=>$tabs,
						'service_charge'=>$service_charge,
						'distance_fee'=>$distance_fee,
						'total_amount'=>$total_amount,
						'payment_type'=>$payment_type,
						'note_to_driver'=>$note_to_driver,
						'truck_partner_id'=>'',
						'created' => date('Y-m-d'),
						'modified' => date('Y-m-d'),
						'status'=>'2',
						'booking_status'=>'Pending'

					);

					$check_truck_booking_details = $this->user_model->check_truck_booking_details($loginUserId,$pickup_port,$trailer_chassis_type_id,$delivery_address_lat,$delivery_address_lng,$total_amount);

					if(!empty($check_truck_booking_details))
					{
						 $user  = $check_truck_booking_details['0']->id;
						 $order_id = $check_truck_booking_details['0']->order_id;
					}else{


						 $user  = $this->user_model->insertRecord($shopData,'tbl_truck_order_booking');

						 $order_id = $order_id;
					}

					// print_r($user);
		
					$truck_booking_details = $this->user_model->get_truck_booking_details($user);

					$booking_order_id = $truck_booking_details[0]->order_id;
					$qr_url = $booking_order_id;
					$booking_id = $user;

					$qr_code_random = 'qr-code-image-';
					$qr_image = $qr_code_random.date('m-d-Y').'.png';
					$params['data'] = $qr_url;
					$params['level'] = 'H';
					$params['size'] = 50;
					$params['savename']= FCPATH."assets/qrcode/".$qr_image;
					$this->ciqrcode->generate($params);

					$updateProfileData = array(
						'qr_image' => $qr_image,
						
					);
					$r = $this->user_model->update_truck_qr($booking_id,$updateProfileData);

					// Find port driver available or not
					$get_pickup_port_details = $this->user_model->get_pickup_port_details($pickup_port);
					  
					if(!empty($get_pickup_port_details))
					{
					  	$pickup_port_lat = $get_pickup_port_details[0]->lat;
						$pickup_port_lng = $get_pickup_port_details[0]->lng;

						 
						$find_all_drivers = $this->user_model->find_driver_with_pickup_port($pickup_port_lat,$pickup_port_lng,'50',$trailer_chassis_type_id); //80 Km 

						// print_r($find_all_drivers);

						if(!empty($find_all_drivers)){

						  	foreach($find_all_drivers as $find_all_driver) {

						  	 	
						  	 	$shopData1 = array(
								
									'order_id' => $order_id,
									'user_id' => $loginUserId,
									'driver_id'=>$find_all_driver->id,
									'pickup_port' => $pickup_port,
									'delivery_address' => $delivery_address,
									'pick_up_date_time' => $pick_up_date_time,
									'total_amount'=>$total_amount,
									'created' => date('Y-m-d'),
									'status'=>'0',
								);

								$check_find_drivers = $this->user_model->check_find_drivers_order($order_id,$find_all_driver->id); //80 Km 
								if(empty($check_find_drivers)){

									if(empty($check_truck_booking_details))
									{
										$user1  = $this->user_model->insertRecord($shopData1,'tbl_find_driver');
									}

									
								}

							} 

							$timeout = 180;  // Maximum wait time in 5 min
							$interval = 5;  // Check every 5 seconds
							$start_time = time();

							// print_r($order_id);
							    
						    while (time() - $start_time < $timeout) {
						        
						        // echo time();
						        $driver = $this->user_model->check_confirm_find_drivers_order($order_id);

						        
								if ($driver) {
						            // If a driver is found, return success response

						            $find_driver_id = $driver->driver_id;
						            $confirm_driver_details = $this->user_model->get_single_user_details($find_driver_id);

						           
						            if($confirm_driver_details[0]->profile_image){
										$driver_image = base_url_image().$confirm_driver_details[0]->profile_image; 
									}else{
										$driver_image =  base_url().'assets/img/no-image.jpg';
									}

									$driver_total_trip = $this->user_model->driver_total_trip($confirm_driver_details[0]->id);

									$driver_total_ratings = $this->user_model->driver_total_rating($confirm_driver_details[0]->id);

									$rating_count = 0;
									$total_rating = 0;
									foreach($driver_total_ratings as $driver_total_rating) {
										$rating_count += $driver_total_rating->rating;
									}

									if($rating_count > 0){
										$total_rating = $rating_count/5;
									}else{
										$total_rating = 0;
									}


									$chessis_details = $this->user_model->get_chessis_details($confirm_driver_details[0]->truck_id);

									$shopData2 = array(
										'status' => '3',
										'booking_status' => 'DriverConfirmed',
										'select_driver_id' => $confirm_driver_details[0]->id,
										'truck_partner_id' => $chessis_details[0]->truck_partner_id,
										'truck_id' => $confirm_driver_details[0]->truck_id,
										'chassis_id' => $confirm_driver_details[0]->chassis_id,
									);

									$r = $this->user_model->update_driver_id($truck_booking_details[0]->id,$shopData2);

									
							  	 	 $posts1 = array(
							  	 	 	'driver_id' =>$confirm_driver_details[0]->id,
										'driver_full_name' =>$confirm_driver_details[0]->f_name.' '.$confirm_driver_details[0]->l_name,
										'driver_image' =>$driver_image,
										'driver_username' =>$confirm_driver_details[0]->username,
										'driver_email' =>$confirm_driver_details[0]->email,
										'driver_phone' =>$confirm_driver_details[0]->phone,
										'booking_id'=>$truck_booking_details[0]->id,
										'booking_order_id'=>$truck_booking_details[0]->order_id,
										'driver_total_trip'=>$driver_total_trip,
										'driver_total_rating'=>$total_rating
									);


							  	 	if($payment_type == '1')
									{
										$new_amount = floatval($wallet_amount)-floatval($total_amount);
						
										$updateProfileData = array(
											'tara_wallet' => $new_amount,
										);

										$r = $this->user_model->updateWallet($loginUserId,$updateProfileData);
									}

					  	 	  		$response = array(
										'status' => '200',
										'message' => 'Driver found',
						                'driver'  => $posts1  // Send driver details
									);
									$this->output
										->set_status_header(200)
										->set_content_type('application/json')
										->set_output(json_encode($response)); 
						            return;
						        } else {

						             sleep($interval);
						        }
						    }

							// If no driver is found within 30 seconds, return a timeout response
						   
							$rs1 = $this->user_model->delete_truck_booking($order_id);
							$rs2 = $this->user_model->delete_find_driver($order_id);

						    $response = array(
								'status' => '403',
								'message' => 'Drivers not accepted your request. Please try again later.'
							);

							  	
						}else{
						  	$response = array(
								'status' => '402',
								'message' => 'No drivers available in port! Please select other port...'
							);	
						}
						 
					}else{
					  	
						$response = array(
							'status' => '401',
							'message' => 'Invalid Port'
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

	public function cancel_job_order_find_driver()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;
 				
				$check_user_last_order = $this->user_model->check_user_last_order($user_id);

				// print_r($check_user_last_order);
				// die;

				if(!empty($check_user_last_order))
				{
				  	
				  	$rs1 = $this->user_model->delete_truck_booking($check_user_last_order[0]->order_id);
					$rs2 = $this->user_model->delete_find_driver($check_user_last_order[0]->order_id);

 
					if($rs2)
					{
					  	$response = array(
								'status' => '200',
								'message' => 'Job Order Cancelled Sucsssfully..'
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
						'message' => 'Invalid order'
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




	public function cancel_job_order()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;

 				// $select_driver_id = $_POST['select_driver_id'];
		 		$cancel_reasion = $_POST['reasion'];
		 		$cancel_other_comment = $_POST['other_comment'];
				$booking_order_id = $_POST['booking_order_id'];

		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('reasion', 'Reasion', 'required');
		 		$this->form_validation->set_rules('booking_order_id', 'Booking Id', 'required');
		 		
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{
					
					$check_truck_booking = $this->user_model->check_truck_booking($booking_order_id);

					if(!empty($check_truck_booking))
					{
					  	$shopData = array(
							'cancel_reasion' => $cancel_reasion,
							'cancel_other_comment' => $cancel_other_comment,
							'status' => '1',
							'booking_status' => 'Cancelled',
							'cancel_date' => date('Y-m-d'),
						);

						$user  = $this->user_model->update_booking_status($booking_order_id,$shopData);
	 
						if($user)
						{
						  	$response = array(
									'status' => '200',
									'message' => 'Job Order Cancelled Sucsssfully..'
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


	public function customer_rate_feedback_driver()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;
				$rating = $_POST['rating'];
		 		$comments = $_POST['comments'];
				$driver_id = $_POST['driver_id'];
				$order_id = $_POST['order_id'];
				
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('rating', 'Rating', 'required');
		 		$this->form_validation->set_rules('driver_id', 'Driver', 'required');
				$this->form_validation->set_rules('order_id', 'Order Id', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{
					
					$check_driver_rating_details = $this->user_model->check_driver_rating_details($user_id,$driver_id,$order_id);

					// print_r($check_driver_rating_details);

					if(empty($check_driver_rating_details))
					{
						$shopData = array(
								
							'rating' => $rating,
							'user_id' => $loginUserId,
							'rating' => $rating,
							'comments' => $comments,
							'driver_id' => $driver_id,
							'order_id' => $order_id,
							'created' => date('Y-m-d'),
							'status'=>'1',
						);


						$user1  = $this->user_model->insertRecord($shopData,'tbl_truck_driver_rating');
						$response = array(
							'status' => '200',
							'message' => 'Rate and Feedback successfully submitted',
			                
						);
					}else{

						$response = array(
							'status' => '404',
							'message' => 'Rating has already been sent to the user',
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

	public function customer_rate_feedback_car()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				
 				$user_id = $loginUserId;
				// $select_driver_id = $_POST['select_driver_id'];
		 		$rating = $_POST['rating'];
		 		$comments = $_POST['comments'];
				$car_id = $_POST['car_id'];
				$order_id = $_POST['order_id'];
				
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('rating', 'Rating', 'required');
		 		$this->form_validation->set_rules('car_id', 'Car', 'required');
		 		$this->form_validation->set_rules('order_id', 'Order Id', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{
					$check_car_rating_details = $this->user_model->check_car_rating_details($user_id,$car_id,$order_id);

					if(empty($check_car_rating_details))
					{
						$shopData = array(
									
							'rating' => $rating,
							'user_id' => $loginUserId,
							'comments' => $comments,
							'car_id' => $car_id,
							'order_id' => $order_id,
							'created' => date('Y-m-d'),
							'status'=>'1',
						);

						$user1  = $this->user_model->insertRecord($shopData,'tbl_car_rating');
						$response = array(
							'status' => '200',
							'message' => 'Rate and Feedback successfully submitted',
			                
						);
					}else{

						$response = array(
							'status' => '404',
							'message' => 'Rating has already been sent to the user',
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



	public function book_car_transaction_history()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				
				$all_records = $this->user_model->get_all_car_transaction_history($loginUserId);

					 // print_r($all_records);
					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {


						   $single_car_details = $this->user_model->get_single_car_details($all_record->car_id);
							

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


	public function book_truck_transaction_history()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				
				$all_records = $this->user_model->get_all_truck_transaction_history($loginUserId);

					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {

							// Delivery Dtails

							$trailer_chassis_type_details = $this->user_model->get_trailer_chassis_type($all_record->trailer_chassis_type_id);

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

							$get_driver_details = $this->user_model->get_single_user_details($all_record->select_driver_id);

							$select_truck_id = $get_driver_details[0]->truck_id;
							$select_chassis_id = $get_driver_details[0]->chassis_id;

							$get_truck_details = $this->user_model->get_truck_details($select_truck_id);
							$get_chessis_details = $this->user_model->get_chessis_details($select_chassis_id);

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


	public function get_all_notification()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkToken($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			$posts = array(); 
			if($isValidToken) {

				$formdata = json_decode(file_get_contents('php://input'), true);
				$notification_type = $formdata['notification_type'];
				$loginUserId = $getidbyToken->id;

				$current_date = date('Y-m-d');

				$get_user_records = $this->user_model->get_single_record_by_id($loginUserId);
				
				$get_records = $this->user_model->get_all_notification($loginUserId,$notification_type);
				
				$notification_count = $this->user_model->get_notification_count($loginUserId);
				$all_notification_count = $this->user_model->get_all_notification_count($loginUserId);

				if(!empty($get_records))
				{
					
					$posts22 = [];
					$posts33=[];
						// echo "gdg";
					foreach($get_records as $get_event) {

						

						if($get_event->image){
						    $image = base_url_image().$get_event->image;	
						}else{
							$image =  base_url().'assets/images/no-image.jpg';
						}

						
						
						$current_date_time = date('Y-m-d h:i:s');
						$notification_date_time = $get_event->date_time;
 
						$start_datetime = new DateTime($current_date_time); 
						$diff = $start_datetime->diff(new DateTime($notification_date_time)); 
						 
						$send_msg_time = $diff->d.' Days '.$diff->h.' Hours '.$diff->i.' Minutes';

						
						$posts2[] = array(
									'id'=>$get_event->id,
									'user_id'=>$get_event->users_id,
									'title'=>$get_event->title,
									'description'=>$get_event->content,
									'image'=>$image,
									'status'=>$get_event->status,
									'created'=>$get_event->created,
									'notification_time'=>$get_event->time,
									'send_msg_time'=>$send_msg_time,
									'created'=>$get_event->created,
									

								);
							}

							$posts = array(
								'status' => '200',
								'data' => $posts2,
								'notification_count'=>$notification_count,
								'all_notification_count'=>$all_notification_count
								
							); 

				 }
				 else{
					$posts = array(
							'status' => 'fail',
							'message' => 'No record found.'
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


	public function user_deposit_tara_wallet()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkTokenUser($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$loginUserId = $loginUserId;
 				
		 		$amount = $_POST['amount'];
		 		
		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('amount', 'amount', 'required');
		 		
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please enter amount...',                
				   );

				} else 
				{
					
					$get_user_details = $this->user_model->get_single_user_details($loginUserId);
					// print_r($get_user_details);
					 $tara_wallet = $get_user_details[0]->tara_wallet;

					 $new_amount = floatval($tara_wallet)+floatval($amount);
					
					$updateProfileData = array(
						'tara_wallet' => $new_amount,
					);

					$r = $this->user_model->updateWallet($loginUserId,$updateProfileData);
					if($r){
						$response = array(
							'status' => '200',
							'message' => 'Amount deposite successfully...!'
						);
					}else{
						$response = array(
							'status' => '404',
							'message' => 'Amount not deposite...!'
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

	public function get_tara_wallet_amount()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkTokenUser($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$loginUserId = $loginUserId;
 				
 				$get_user_details = $this->user_model->get_single_user_details($loginUserId);
					// print_r($get_user_details);
				 $tara_wallet = $get_user_details[0]->tara_wallet;
				
				$posts1 = array(
					'id' => $get_user_details[0]->id,
					'tara_wallet' => $tara_wallet,
				);

				$response = array(
					'status' => '200',
					'data' => $posts1
				);
				
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

	public function view_car_all_user_rating()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkTokenUser($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$loginUserId = $loginUserId;
 				
		 		$car_id = $_POST['car_id'];
 				
 				$car_all_ratings = $this->user_model->get_car_all_rating($car_id);


 				foreach($car_all_ratings as $car_all_rating) {

 					$user_details = $this->user_model->get_single_user_details($car_all_rating->user_id);
				
					if($user_details[0]->profile_image){
						$profile_image = base_url_image().$user_details[0]->profile_image; 
					}else{
						$profile_image =  base_url().'assets/img/no-image.jpg';
					}

					$posts1[] = array(
						'profile_image' => $profile_image,
						'user_name' => $user_details[0]->f_name,
						'rating'=>$car_all_rating->rating,
						'comments'=>$car_all_rating->comments
					);
 				}

 				

				$response = array(
					'status' => '200',
					'data' => $posts1
				);
				
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

	public function view_driver_all_user_rating()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->user_model->checkTokenUser($token);
			$getidbyToken = $this->user_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$loginUserId = $loginUserId;
 				
		 		$driver_id = $_POST['driver_id'];
 				
 				$driver_all_ratings = $this->user_model->get_driver_all_rating($driver_id);


 				foreach($driver_all_ratings as $driver_all_rating) {

 					$user_details = $this->user_model->get_single_user_details($driver_all_rating->user_id);
				
					if($user_details[0]->profile_image){
						$profile_image = base_url_image().$user_details[0]->profile_image; 
					}else{
						$profile_image =  base_url().'assets/img/no-image.jpg';
					}

					$posts1[] = array(
						'profile_image' => $profile_image,
						'user_name' => $user_details[0]->f_name,
						'rating'=>$driver_all_rating->rating,
						'comments'=>$driver_all_rating->comments
					);
 				}

 				

				$response = array(
					'status' => '200',
					'data' => $posts1
				);
				
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


	public function send_email_forgot_password($email,$user_id)
	{
		
		$this->load->library('email');

		$hosting_details = $this->user_model->get_hosting_details();
		// print_r($hosting_details);
		
		$config['protocol']    =  $hosting_details[0]->protocol;
        $config['smtp_host']    = $hosting_details[0]->smtp_host;
        $config['smtp_port']    = $hosting_details[0]->smtp_port;
        $config['smtp_timeout'] = '7';
        $config['smtp_user']    = $hosting_details[0]->smtp_user;
        $config['smtp_pass']    = $hosting_details[0]->smtp_pass;
        $config['mailuser_type'] 		= 'html';
		$config['charset'] 				= 'utf-8';
		$config['newline'] 				= "\r\n";
		$config['crlf'] 				= "\r\n";
		$config['send_multipart'] 		= FALSE;
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['wordwrap'] = TRUE;

		$this->email->set_mailtype("html");
        $this->email->initialize($config);
		$this->email->from($hosting_details[0]->smtp_user, 'Tara Rental Forgot Password');
        $this->email->to($email); 
		$this->email->subject('Your Registration details');
       
        $data = array(
			'email'=> $email,
			'user_id'=> $user_id,
			'otp'=> '123456',
			
		);

        $message = $this->load->view('emails/forgot_password.php',$data,TRUE);
        $this->email->message($message);
        
       
	}


	private function generateOrderId($length = 3)
    {
        $current_year = date('Y');
        $current_month = date('m');
        $current_day = date('d');

        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = 'Job order '.$current_year.''.$current_month.''.$current_day;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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

    function distance_total($lat1, $lon1, $lat2, $lon2, $unit) {

    	echo $lat1.','.$lon1;
    	echo "<br>";
    	echo $lat2.','.$lon2;
    	echo "<br>";
    	echo $unit;

    	 $theta = $lon1 - $lon2;
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +
                cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);

        // Convert to miles
        $miles = $dist * 60 * 1.1515;

        // Convert to the desired unit
        if ($unit == 'km') {
            return $miles * 1.609344; // Kilometers
        } elseif ($unit == 'mi') {
            return $miles * 0.8684; // Nautical Miles
        } else {
            return $miles; // Miles
        }
	}

	public function calculate_distance($lat1, $lng1, $lat2, $lng2,$unit) {
        // API endpoint for Distance Matrix API
        $url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins={$lat1},{$lng1}&destinations={$lat2},{$lng2}&key={$this->google_api_key}";

        // Set the headers
        $headers = ['Authorization: Bearer YOUR_API_KEY'];

        // Set the request
        $this->curl->set_url($url);
        $this->curl->set_headers($headers);

       

        // Execute the cURL request and get the response
        $response = $this->curl->execute();

        // Handle the response
        if ($response === false) {
            // echo 'cURL Error: ' . $this->curl->error();
            return $distance = 0;
        } else {

        	$data = json_decode($response, true);
        	
        	$distance1 = $data['rows'][0]['elements'][0]['distance']['text'];
        	$result = preg_replace('/\s/', '', $distance1);
        	$distance_new = preg_replace('/[a-zA-Z]/', '', $result);
        	$distance = str_replace(",", "", $distance_new);
        	// print_r($distance);
			return $distance;

			//$distance = $data['rows'][0]['elements'][0]['distance']['text'];
        //     $duration = $data['rows'][0]['elements'][0]['duration']['text'];
        	
		}

       
    }





	
}




