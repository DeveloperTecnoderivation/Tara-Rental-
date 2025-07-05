<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/auth_model');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}


	public function getCountry()
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
			$posts = array();
			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records('tbl_countries');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {
					$posts1[] = array(
							'id' => $all_record->id,
							'country_name' => $all_record->country_name,
							'country_code' => $all_record->country_code,
							'status' => $all_record->status
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

	public function get_truck_booking_status()
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
			$posts = array();
			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records('tbl_truck_booking_status');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {
					$posts1[] = array(
							'booking_status_id' => $all_record->id,
							'booking_status' => $all_record->booking_status
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

	public function getState($country_id)
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		

			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records_by_id('tbl_state',$country_id,'country_id');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {

					$posts1[] = array(
							'id' => $all_record->id,
							// 'country_name' => $country_records->country_name,
							'state_name' => $all_record->name,
							'state_code' => $all_record->state_code
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

	public function getCity($state_id)
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		

			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records_by_id('tbl_city',$state_id,'state_id');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {

					// $country_records = $this->auth_model->get_single_record_by_id('tbl_',$all_record->country_id);
					// print_r($country_records);
					$posts1[] = array(
							'id' => $all_record->id,
							// 'country_name' => $country_records->country_name,
							'city_name' => $all_record->name,
							'lat' => $all_record->lat,
							'lng' => $all_record->lng,
							'map_url' => $all_record->map_url,
							'place_id' => $all_record->place_id,
							
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

	public function getVechileType()
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
			$posts = array();
			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records('tbl_vehicle_types');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {
					$posts1[] = array(
							'id' => $all_record->id,
							'name' => $all_record->name,
							'seating_capacity' => $all_record->seating_capacity,
							'status' => $all_record->status
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

	public function getBrand()
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
			$posts = array();
			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records('tbl_vehicle_brand');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {
					$posts1[] = array(
							'id' => $all_record->id,
							'name' => $all_record->name,
							'status' => $all_record->status
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

	public function getModel($make_id)
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		

			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records_by_id('tbl_vehicle_models',$make_id,'make_id');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {

					$posts1[] = array(
							'id' => $all_record->id,
							'name' => $all_record->name,
							'status' => $all_record->status
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

	public function getColor()
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
			$posts = array();
			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records('tbl_color');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {
					$posts1[] = array(
							'id' => $all_record->id,
							'name' => $all_record->name,
							
							
							
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}

    
    public function get_country_mobile_code()
	{
		

		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
			$posts = array();
			$formdata = json_decode(file_get_contents('php://input'), true);
			$all_records = $this->auth_model->get_all_records('tbl_countries');
			
			if(!empty($all_records))
			{
				foreach($all_records as $all_record) {
					$posts1[] = array(
							'id' => $all_record->id,
							'country_name' => $all_record->country_name,
							'country_mobile_code' => $all_record->country_mobile_code,
							'country_code' => $all_record->country_code,
						);
				}
				$posts = array(
						'status' => '200',
						'data' => $posts1
					);
			}
			 else{
				$posts = array(
						'status' => '404',
						'message' => 'No record found.'
				);
			}	
			$this->output
				// ->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
		
	}
	

	public function login() 
	{
		header('Access-Control-Allow-Headers: *');
        header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		
 		$posts = array();
 		$_POST = json_decode(file_get_contents('php://input'), true);
 		
 	    $email = $_POST['email'];
 		$password = $_POST['password'];
 		
 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => 'Please fill all the mandatory fields',                
		   );

		} else 
		{
			$check_login = $this->auth_model->check_login($email, md5($password));

			// print_r($check_login->id);
			// die();
			
			if($check_login) 
			{
				

				$check_login_status = $this->auth_model->check_login_status($email, md5($password));
				if($check_login_status) 
				{
					$token = $this->getToken('5');
					$refreshtoken = $this->getRefreshToken('4');
					$tokenData = array(
					  'token' =>$token,
					  'refresh_token' =>$refreshtoken,
					);

					$insertoken = $this->auth_model->updateToken($check_login->id,$tokenData);
					$userToken = $this->auth_model->getTokenData($check_login->id);
					$response = array(
						'status' => '200',
						'data' => array(
							'token' => $userToken->token,
							'sign'=>$userToken->token,
							'refresh_token'=>$userToken->refresh_token,
							'login_id'=>$userToken->id,
							'role'=>$userToken->role,
							)
					);	
				}else{
					$response = array(
						'status' => '404',
						'message' => 'User Deactive! Please contact Tara Rental Support'
					);
				}

				
			}
			else {
				$response = array(
					'status' => '404',
					'message' => 'Invalid Email or Password!'
				);
		}

		
	
		}
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function refresh_token() 
	{
		header('Access-Control-Allow-Headers: *');
        header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		
 		$posts = array();
 		$_POST = json_decode(file_get_contents('php://input'), true);
 		
 	    $refresh_token = $_POST['refresh_token'];
 		
 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('refresh_token', 'Refresh Token', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => 'Please send refresh token',                
		   );

		} else 
		{
			$userToken = $this->auth_model->getRefreshToken($refresh_token);
			if($userToken) 
			{
				
				$response = array(
						'status' => '200',
						'data' => array(
							'token' => $userToken->token,
							'sign'=>$userToken->token,
						)
					);	

				
			}else {
				$response = array(
					'status' => '404',
					'message' => 'Invalid Refresh Token!'
				);
		}

		
	
		}
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function social_login() 
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
 		$provider = $_POST['provider'];
 		$social_id = $_POST['social_id'];
 		$os = $_POST['os'];
 		$os_version = $_POST['os_version'];
 		$udid = $_POST['udid'];
 		$avatar = $_POST['avatar'];
 		
 		$date = new DateTime();
		$timeZone = $date->getTimezone();
		$gettimezone=$timeZone->getName();

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('f_name', 'First Name', 'required');
		$this->form_validation->set_rules('l_name', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('provider', 'Provider', 'required');
		
		if ($this->form_validation->run() === FALSE) {
			echo "dgg";
			$response = array(
		        'status' => '404',
		        'message' => 'Please fill all the mandatory fields',                
		   );

		} else 
		{
			$cat_records = $this->auth_model->check_email($email,'tbl_users');

			if(!empty($cat_records))
			{
				$userDataNew = $this->carowner_model->getTokenDataEmail($email);
			 	$user_token = $this->getToken('5');
				
				if($formdata['avatar'] == ''){
					$avatar = $userDataNew->avatar;
				}else{
					$avatar = $avatar;
				}
				
				$tokenData = array(
					'token' =>$user_token,
					'social_id' => $social_id,
					'os' => $os,
					'udid' => $udid,
					// 'time_zone' => $gettimezone,
					'provider' => $provider,
					// 'updated_at' =>  date('Y-m-d') .' '. date("h:i:s"),
					// 'avatar'=>$avatar

				);
				
				$insertoken = $this->carowner_model->updateTokenEmail($email,$tokenData);
	
			}else{

				
				// $avatar = $avatar;
				$f_name = $f_name;
				$l_name = $l_name;
				$email = $email;
				$phone = $phone;
				$provider = $provider;
				$social_id = $social_id;
				$user_token = $this->getToken('5');
				 $tokenData = array(
					'user_token' =>$user_token,
				);

				// $avatar = $avatar;
				$os = $os;
				$os_version = $os_version;
				$udid = $udid;
				$time_zone = $gettimezone;
				$created_at =  date('Y-m-d') .' '. date("h:i:s");
				$updated_at =  date('Y-m-d') .' '. date("h:i:s");
				$status =  '1';

				$shopData = array(
					'f_name' =>$f_name,
					'l_name' =>$l_name,
					'email' => $email,
					'phone' => $phone,
					'password' => md5($password),
					'status' => '1',
					'provider' =>$provider,
					'social_id' =>$social_id,
					'token' => $user_token,
					'os' => $os,
					'os_version' =>$os_version,
					'udid' =>$udid,
					// 'avatar' => $avatar,
					'created' =>  date('Y-m-d'),
					
				);
				$user  = $this->carowner_model->insertRecord($shopData,'tbl_users');
				
			}
				
				$userDataNew = $this->carowner_model->getTokenDataEmail($email);
				$response = array(
					'status' => '200',
					'data' => array(
						'token' => $userDataNew->token,
						'sign'=>$userDataNew->token,
						'id'=>$userDataNew->id
						)
				);
			
			
		}

		$this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));	
	}


	public function get_trailer_type()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
		$all_records = $this->auth_model->get_trailer_type();
	
		
		if(!empty($all_records))
		{
			foreach($all_records as $all_record) {
				
				
				$posts1[] = array(
						'id' => $all_record->id,
						'trailer_type' => $all_record->trailer_type,
						'status' => $all_record->status,
				);

			}
			$posts = array(
					'status' => '200',
					'data' => $posts1
			);
	 	}else{

	 		$posts = array(
					'status' => '404',
					'message' => 'No Trailer Type Available!..'
				);
	 	}	
		 		
		
		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}

	public function get_all_pickup_port()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
		$all_records = $this->auth_model->get_pickup_port();
	
		
		if(!empty($all_records))
		{
			foreach($all_records as $all_record) {
				
				
				$posts1[] = array(
						'id' => $all_record->id,
						'port' => $all_record->port,
						'code' => $all_record->code,
						'lat' => $all_record->lat,
						'lng' => $all_record->lng,
						'status' => $all_record->status,
				);

			}
			$posts = array(
					'status' => '200',
					'data' => $posts1
			);
	 	}else{

	 		$posts = array(
					'status' => '404',
					'message' => 'No Trailer Type Available!..'
				);
	 	}	
		 		
		
		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 

	}

	public function forgot_password() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		
 		$posts = array();
 		$_POST = json_decode(file_get_contents('php://input'), true);
 		
 		$email = $_POST['email'];
 		// $username_boat = $_POST['username_boat'];
 	
 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('email', 'Email', 'required');
		// $this->form_validation->set_rules('password', 'Password', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => validation_errors(),                    
		   );

		} else 
		{
			
			$check_login = $this->auth_model->check_email_forgot($email,'tbl_users');

			// print_r($check_login);
			
			if(!empty($check_login)) 
			{
				$email = $check_login[0]->email;
				// $token = $check_login[0]->token;

				
				// $this->load->library('email');

				// $hosting_details = $this->auth_model->get_hosting_details();
				
				
				// $config['protocol']    =  $hosting_details[0]->protocol;
		  //       $config['smtp_host']    = $hosting_details[0]->smtp_host;
		  //       $config['smtp_port']    = $hosting_details[0]->smtp_port;
		  //       $config['smtp_timeout'] = '30';
		  //       $config['smtp_user']    = $hosting_details[0]->smtp_user;
		  //       $config['smtp_pass']    = $hosting_details[0]->smtp_pass;
		  //       $config['mailuser_type'] 		= 'html';
				// $config['charset'] 				= 'utf-8';
				// $config['newline'] 				= "\r\n";
				// $config['crlf'] 				= "\r\n";
				// $config['send_multipart'] 		= FALSE;
				// $config['mailpath'] = '/usr/sbin/sendmail';
				// $config['wordwrap'] = TRUE;
				
				// $this->load->library('email');
    //             $this->email->set_mailtype("html");
    //             $this->email->initialize($config);
				// $this->email->from($hosting_details[0]->smtp_user, 'Blastergate Forgot Password');
		  //       $this->email->to($email); 
				// $this->email->subject('Password Reset Request for Your Blastergate Account');
		       
		  //       $data = array(
				// 	'email'=> $email,
				// 	'username'=> $username,
				// 	'username_boat'=> $username_boat,
				// 	'password'=> '123456',
					
				// );

		  //       $message = $this->load->view('emails/forgot_password.php',$data,TRUE);
		       
		  //      $this->email->message($message);

		  //      if (!$this->email->send()) {
				//     echo $this->email->print_debugger(); // Print error details
				// } else {
				//     $response = array(
				// 		'status' => '200',
				// 		'message' => 'Please check your email '.$email.' click on verification link to reset password'
				// 	);
				// }

				    $response = array(
						'status' => '200',
						'message' => 'Please check your email '.$email.' send your new password'
					);
				
				
			}else {
				$response = array(
					'status' => '404',
					'message' => 'Invalid Email!'
				);
		}

		
	
		}
		 $this->output
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

	public function getRefreshToken($length)
	{

	    $token = "";
	    $codeAlphabet = "UVWXYZABFGHIJCDRST";
	    $codeAlphabet.= "tuvwxyzabcdefopqrs";
	    $codeAlphabet.= rand(10,100);
	    $codeAlphabet.= "01279698552";
	    $codeAlphabet.= "@#$%&*";
	   
	    $max = strlen($codeAlphabet); // edited

	    for ($i=0; $i < $length; $i++) {
	        $token .= $codeAlphabet;

	    }
	    
	    return $token;
	}


	public function sendemailregister($email,$password,$fname,$lname,$mobile)
	{
		
		$this->load->library('email');

		$hosting_details = $this->auth_model->get_hosting_details();
		
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
		$this->email->from($hosting_details[0]->smtp_user, 'Sangeeta bochhra registration');
        $this->email->to($email); 
		$this->email->subject('Your Registration details');
       
        $data = array(
			'email'=> $email,
			'password'=> $password,
			'fname'=> $fname,
			'lname'=> $lname,
			'mobile'=> $mobile,
		);

        $message = $this->load->view('emails/registration_user.php',$data,TRUE);

		$this->email->message($message);
        //$this->email->send();

        if($this->email->send()) 
        {

		    $this->email->clear(TRUE); // Pass TRUE as an argument if you are sending attachments
			$this->email->from($hosting_details[0]->smtp_user, 'Sangeeta bochhra registration');
	        $this->email->to($hosting_details[0]->email); 
			$this->email->subject('New User Registration');
	       $data = array(
				'email'=> $email,
				'password'=> $password,
				'fname'=> $fname,
				'lname'=> $lname,
				'mobile'=> $mobile,
			);

		    $message = $this->load->view('emails/registration_admin.php',$data,TRUE);
			$this->email->message($message);
			$this->email->send();
		   }
	}


	
}
