<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Truckpartner extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/truckpartner_model');
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
 		
 		$company_name = $_POST['company_name'];
 		$email = $_POST['email'];
 		$contact_person = $_POST['contact_person'];
 		$phone = $_POST['phone'];
		$password = $_POST['password'];
		$company_type = $_POST['company_type'];

		$business_permit = $_POST['business_permit'];
		$bir = $_POST['bir'];
		$cor = $_POST['cor'];
		$ltfrb_franchise_certificate = $_POST['ltfrb_franchise_certificate'];
		$ppa = $_POST['ppa'];
		$membership_from_ctap = $_POST['membership_from_ctap'];
		$acto = $_POST['acto'];
		$mayors_permit = $_POST['mayors_permit'];
		$sec_certificate = $_POST['sec_certificate'];
		$articles_of_incorporation = $_POST['articles_of_incorporation'];
		$inland_marine_insurance = $_POST['inland_marine_insurance'];
		$oc_cr = $_POST['oc_cr'];
		$pa_cpc = $_POST['pa_cpc'];
		$deed_of_sale = $_POST['deed_of_sale'];
		$bank_certificate = $_POST['bank_certificate'];
		$fs_past_2year = $_POST['fs_past_2year'];
		$gps_device = $_POST['gps_device'];
		$organizational_chart = $_POST['organizational_chart'];

		$organizational_chart = $_POST['organizational_chart'];


 		//validation rules
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('company_name', 'Company Name', 'required');
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

		 	$check_email = $this->truckpartner_model->check_email($email,'tbl_users');
		 	$check_phone = $this->truckpartner_model->check_phone($phone,'tbl_users');

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
							'company_name' =>$company_name,
							'email' =>$email,
							'contact_person' => $contact_person,
							'role'=>'truck_partner',
							'phone' => $phone,
							'password' => md5($password),
							'status' => '0',
							'otp'=> $otp,
							'company_name' =>$company_name,
							'company_type' =>$company_type,
							'business_permit' =>$business_permit,
							'bir' =>$bir,
							'cor' =>$cor,
							'ltfrb_franchise_certificate' =>$ltfrb_franchise_certificate,
							'ppa' =>$ppa,
							'membership_from_ctap' =>$membership_from_ctap,
							'acto' =>$acto,
							'mayors_permit' =>$mayors_permit,
							'sec_certificate' =>$sec_certificate,
							'articles_of_incorporation' =>$articles_of_incorporation,
							'inland_marine_insurance' =>$inland_marine_insurance,
							'oc_cr' =>$oc_cr,
							'pa_cpc' =>$pa_cpc,
							'deed_of_sale' =>$deed_of_sale,
							'bank_certificate' =>$bank_certificate,
							'fs_past_2year' =>$fs_past_2year,
							'gps_device' =>$gps_device,
							'organizational_chart' =>$organizational_chart,
							'created' =>  date('Y-m-d'),
							'refrence_number'=>$this->generateRefrenceNumber(),
							
						);

						

						$user  = $this->truckpartner_model->insertRecord($shopData,'tbl_users');
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
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('otp', 'OTP', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => 'All field required!',                
		   );

		} else 
		{

			 	$check_email_phone_otp = $this->truckpartner_model->check_email_phone_otp($email,$phone,$otp,'tbl_users');
			 	
				if($check_email_phone_otp)
				{	
					$tokenData = array(
						'status' =>'1',
					);

					$insertoken = $this->truckpartner_model->updateOTP($email,$phone,$tokenData);
					$response = array(
						'status' => '200',
						'message' => 'Truck Partner registration successfullly',
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


	public function get_profile()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			
			$posts = array();
			if($isValidToken) 
			{
				
				$get_records = $this->truckpartner_model->get_record('tbl_users',$token);
				
				if(!empty($get_records))
				{
					if($get_records[0]->profile_image){
						$profile_image = base_url_image().$get_records[0]->profile_image;
					}else{
						$profile_image =  base_url().'assets/img/no-profile-image.jpg';
					}

					if($get_records[0]->business_permit){
						$business_permit = base_url_image().$get_records[0]->business_permit;
					}else{
						$business_permit =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->bir){
						$bir = base_url_image().$get_records[0]->bir;
					}else{
						$bir =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->cor){
						$cor = base_url_image().$get_records[0]->cor;
					}else{
						$cor =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->ltfrb_franchise_certificate){
						$ltfrb_franchise_certificate = base_url_image().$get_records[0]->ltfrb_franchise_certificate;
					}else{
						$ltfrb_franchise_certificate =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->ppa){
						$ppa = base_url_image().$get_records[0]->ppa;
					}else{
						$ppa =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->membership_from_ctap){
						$membership_from_ctap = base_url_image().$get_records[0]->membership_from_ctap;
					}else{
						$membership_from_ctap =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->acto){
						$acto = base_url_image().$get_records[0]->acto;
					}else{
						$acto =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->mayors_permit){
						$mayors_permit = base_url_image().$get_records[0]->mayors_permit;
					}else{
						$mayors_permit =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->sec_certificate){
						$sec_certificate = base_url_image().$get_records[0]->sec_certificate;
					}else{
						$sec_certificate =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->articles_of_incorporation){
						$articles_of_incorporation = base_url_image().$get_records[0]->articles_of_incorporation;
					}else{
						$articles_of_incorporation =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->inland_marine_insurance){
						$inland_marine_insurance = base_url_image().$get_records[0]->inland_marine_insurance;
					}else{
						$inland_marine_insurance =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->oc_cr){
						$oc_cr = base_url_image().$get_records[0]->oc_cr;
					}else{
						$oc_cr =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->pa_cpc){
						$pa_cpc = base_url_image().$get_records[0]->pa_cpc;
					}else{
						$pa_cpc =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->deed_of_sale){
						$deed_of_sale = base_url_image().$get_records[0]->deed_of_sale;
					}else{
						$deed_of_sale =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->bank_certificate){
						$bank_certificate = base_url_image().$get_records[0]->bank_certificate;
					}else{
						$bank_certificate =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->fs_past_2year){
						$fs_past_2year = base_url_image().$get_records[0]->fs_past_2year;
					}else{
						$fs_past_2year =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->gps_device){
						$gps_device = base_url_image().$get_records[0]->gps_device;
					}else{
						$gps_device =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->organizational_chart){
						$organizational_chart = base_url_image().$get_records[0]->organizational_chart;
					}else{
						$organizational_chart =  base_url().'assets/img/no-image.jpg';
					}


						$posts = array(
							'status' => '200',
							'data' => array(
								'id' => $get_records[0]->id,
								'company_name' => $get_records[0]->company_name,
								'email' => $get_records[0]->email,
								'total_earning' => '0',
								'role' => $get_records[0]->role,
								'contact_person' => $get_records[0]->contact_person,
								'phone' => $get_records[0]->phone,
								'profile_image' => $profile_image,
								
								'company_type' => $get_records[0]->company_type,
								'refrence_number' => $get_records[0]->refrence_number,
								
							    'business_permit' => $business_permit,
								'bir' => $bir,
								'cor' => $cor,
								'ltfrb_franchise_certificate' => $ltfrb_franchise_certificate,
								'ppa' => $ppa,
								'membership_from_ctap' => $membership_from_ctap,
								'acto' => $acto,
								'mayors_permit' => $mayors_permit,
								'sec_certificate' => $sec_certificate,
								'articles_of_incorporation' => $articles_of_incorporation,
								'inland_marine_insurance' => $inland_marine_insurance,
								'oc_cr' => $oc_cr,
								'pa_cpc' => $pa_cpc,
								'deed_of_sale' => $deed_of_sale,
								'bank_certificate' => $bank_certificate,
								'fs_past_2year' => $fs_past_2year,
								'gps_device' => $gps_device,
								'organizational_chart' => $organizational_chart,
								
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



	public function update_profile()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$formdata = json_decode(file_get_contents('php://input'), true);

				$check_profile_email = $this->truckpartner_model->check_profile_email($loginUserId,$formdata['email']);


				if($check_profile_email){
					$response = array(
						'status' => '404',
						'message' => 'Email Already exist! Please update another email',
						);
				}else{
					$updateProfileData = array(
						'company_name' => $formdata['company_name'],
						'contact_person' => $formdata['contact_person'],
						'phone' => $formdata['phone'],
						'company_type' => $formdata['company_type'],
						'business_permit' => $formdata['business_permit'],
						'bir' => $formdata['bir'],
						'cor' =>$formdata['cor'],
						'ltfrb_franchise_certificate' => $formdata['ltfrb_franchise_certificate'],
						'ppa' => $formdata['ppa'],
						'membership_from_ctap' => $formdata['membership_from_ctap'],
						'acto' =>$formdata['acto'],
						'mayors_permit' =>$formdata['mayors_permit'],
						'sec_certificate' =>$formdata['sec_certificate'],
						'articles_of_incorporation' =>$formdata['articles_of_incorporation'],
						'inland_marine_insurance' =>$formdata['inland_marine_insurance'],
						'oc_cr' =>$formdata['oc_cr'],
						'pa_cpc' =>$formdata['pa_cpc'],
						'deed_of_sale' =>$formdata['deed_of_sale'],
						'bank_certificate' =>$formdata['bank_certificate'],
						'fs_past_2year' =>$formdata['fs_past_2year'],
						'gps_device' =>$formdata['gps_device'],
						'organizational_chart' =>$formdata['organizational_chart'],

					);	
					// echo $loginUserId;
					// print_r($updateProfileData);
					$r = $this->truckpartner_model->updateProfile($loginUserId,$updateProfileData);
					
					if($r){
						$response = array(
							'status' => '200',
							'message' => 'Profile update successfully',
						);
					}else{
						$response = array(
							'status' => '404',
							'message' => 'Profile Not Update',
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

	public function add_truck()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$truck_partner_id = $loginUserId;
		 		$model = $_POST['model'];
		 		$plate_no = $_POST['plate_no'];
		 		$truck_type = $_POST['truck_type'];
		 		$types = 'truck';
		 		$image = $_POST['image'];
		 		$or_cr = $_POST['or_cr'];
		 		
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('model', 'model', 'required');
				$this->form_validation->set_rules('plate_no', 'plate_no', 'required');
				$this->form_validation->set_rules('truck_type', 'truck_type', 'required');
				$this->form_validation->set_rules('image', 'image', 'required');
				$this->form_validation->set_rules('or_cr', 'or_cr', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please fill all the mandatory fields',                
				   );

				} else 
				{

					$checkPlatNumber = $this->truckpartner_model->checkTruckPlatNumber($plate_no);

					if($checkPlatNumber > 0){
						$response = array(
							'status' => '404',
							'message' => 'Truck Already Added!',
						);
					}else{
						$shopData = array(
							'truck_partner_id' => $truck_partner_id,
							'model' => $model,
							'plate_no' => $plate_no,
							'truck_type' => $truck_type,
							'types' => $types,
							'image' => $image,
							'or_cr' => $or_cr,
							'created' => date('Y-m-d'),
							'status'=>'1'

						);

						$user  = $this->truckpartner_model->insertRecord($shopData,'tbl_truck');
						
						if($user){
							$response = array(
							'status' => '200',
							'message' => 'Truck Added Successfully',
							);
						}else{
							$response = array(
							'status' => '404',
							'message' => 'Truck Not Added',
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

	
	public function add_chassis()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$truck_partner_id = $loginUserId;
		 		$model = $_POST['model'];
		 		$plate_no = $_POST['plate_no'];
		 		$trailer_type = $_POST['trailer_type'];
		 		$types = 'chassis';
		 		$image = $_POST['image'];
		 		$or_cr = $_POST['or_cr'];
		 		
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('model', 'model', 'required');
				$this->form_validation->set_rules('plate_no', 'plate_no', 'required');
				$this->form_validation->set_rules('trailer_type', 'trailer_type', 'required');
				$this->form_validation->set_rules('image', 'image', 'required');
				$this->form_validation->set_rules('or_cr', 'or_cr', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please fill all the mandatory fields',                
				   );

				} else 
				{

					$checkPlatNumber = $this->truckpartner_model->checkChassisPlatNumber($plate_no);

					if($checkPlatNumber > 0){
						$response = array(
							'status' => '404',
							'message' => 'Chassis Already Added!',
						);
					}else{
						$shopData = array(
							'truck_partner_id' => $truck_partner_id,
							'model' => $model,
							'plate_no' => $plate_no,
							'trailer_type' => $trailer_type,
							'types' => $types,
							'image' => $image,
							'or_cr' => $or_cr,
							'created' => date('Y-m-d'),
							'status'=>'1'

						);

						$user  = $this->truckpartner_model->insertRecord($shopData,'tbl_truck');
						
						if($user){
							$response = array(
							'status' => '200',
							'message' => 'Chassis Added Successfully',
							);
						}else{
							$response = array(
							'status' => '404',
							'message' => 'Chassis Not Added',
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

	public function add_truck_driver() 
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
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('truck_refrence_number', 'truck_refrence_number', 'required');


		if ($this->form_validation->run() === FALSE) {
			$response = array(
		        'status' => '404',
		        'message' => 'Please fill all the mandatory fields 111',                
		   );

		} else 
		{

		 	$check_refrence_number = $this->driver_model->check_truck_refrence_number($truck_refrence_number,'tbl_users');
		 	
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

			$this->output
						->set_content_type('application/json')
						->set_output(json_encode($response));
 			
	
		}
		 $this->output
				->set_content_type('application/json')
				->set_output(json_encode($response));
	}


	public function get_all_drivers()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);

				$get_truck_prtner_details = $this->truckpartner_model->get_record('tbl_users',$token);
				$truck_partner_refrence_number = $get_truck_prtner_details[0]->refrence_number; 
				
 				
				
				$all_records = $this->truckpartner_model->get_all_driver_by_truck_partner($truck_partner_refrence_number);
			
				
				if(!empty($all_records))
				{
					foreach($all_records as $all_record) {
						
						

						if($all_record->profile_image){
							$profile_image = base_url_image().$all_record->profile_image; 
						}else{
							$profile_image =  base_url().'assets/img/no-image.jpg';
						}

						
						$posts1[] = array(
								'id' => $all_record->id,
								'f_name' => $all_record->f_name,
								'l_name' => $all_record->l_name,
								'email' => $all_record->email,
								'phone' => $all_record->phone,
								'truck_refrence_number' => $all_record->truck_refrence_number,
								'profile_image' => $profile_image,
								'trip'=>0,
								'status' => $all_record->status,
								
						);

					}
					$posts = array(
							'status' => '200',
							'refrence_number'=>$truck_partner_refrence_number,
							'data' => $posts1
					);
			 	}else{

			 		$posts = array(
							'status' => '404',
							'message' => 'No Driver Available!..'
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


	public function update_driver_status() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
		 		$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);

		 		// print_r($_POST);
		 		
		 		$driver_id = $_POST['driver_id'];
		 		$status = $_POST['status'];
               
		 		//validation rules
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('driver_id', 'driver_id', 'required');
				$this->form_validation->set_rules('status', 'status', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please provide id and status!',                
				   );

				} else 
				{
					$updateProfileData = array(
						'status' => $status,
						
					);

					// print_r($loginUserId);

					$r = $this->truckpartner_model->update($driver_id,$updateProfileData,'tbl_users');
					
					$response = array(
						'status' => '200',
						'message' => 'Status updated successfuly!'
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


	public function get_single_driver_details()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			
			$posts = array();
			if($isValidToken) 
			{
				
				$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);
				$id = $_POST['driver_id'];

				$get_records = $this->truckpartner_model->get_single_record('tbl_users',$id);
				
				if(!empty($get_records))
				{
					
					if($get_records[0]->profile_image){
						$profile_image = base_url_image().$get_records[0]->profile_image;
					}else{
						$profile_image =  base_url().'assets/img/no-profile-image.jpg';
					}

					if($get_records[0]->driver_licence){
						$driver_licence = base_url_image().$get_records[0]->driver_licence;
					}else{
						$driver_licence =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->valid_govt_id){
						$valid_govt_id = base_url_image().$get_records[0]->valid_govt_id;
					}else{
						$valid_govt_id =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->company_id){
						$company_id = base_url_image().$get_records[0]->company_id;
					}else{
						$company_id =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->bio_data){
						$bio_data = base_url_image().$get_records[0]->bio_data;
					}else{
						$bio_data =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->drug_text_result){
						$drug_text_result = base_url_image().$get_records[0]->drug_text_result;
					}else{
						$drug_text_result =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->nbi_clearance){
						$nbi_clearance = base_url_image().$get_records[0]->nbi_clearance;
					}else{
						$nbi_clearance =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->police_clearance){
						$police_clearance = base_url_image().$get_records[0]->police_clearance;
					}else{
						$police_clearance =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->personal_accident_insurance){
						$personal_accident_insurance = base_url_image().$get_records[0]->personal_accident_insurance;
					}else{
						$personal_accident_insurance =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->vacination_card){
						$vacination_card = base_url_image().$get_records[0]->vacination_card;
					}else{
						$vacination_card =  base_url().'assets/img/no-image.jpg';
					}

					

					$posts = array(
							'status' => '200',
							'data' => array(
								'id' => $get_records[0]->id,
								'f_name' => $get_records[0]->f_name,
								'l_name' => $get_records[0]->l_name,
								'email' => $get_records[0]->email,
								'phone' => $get_records[0]->phone,
								'profile_image' => $profile_image,
								'truck_refrence_number' => $get_records[0]->truck_refrence_number,
								'plate_no' => '',
								'truck_type' => '',
								'trailer_type' => '',
								'truck_image' => '',
								

							    'driver_licence' => $driver_licence,
								'valid_govt_id' => $valid_govt_id,
								'company_id' => $company_id,
								'bio_data' => $bio_data,
								'drug_text_result' => $drug_text_result,
								'nbi_clearance' => $nbi_clearance,
								'police_clearance' => $police_clearance,
								'personal_accident_insurance' => $personal_accident_insurance,
								'vacination_card' => $vacination_card,
								
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

	public function get_all_trucks()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);

				$get_truck_prtner_details = $this->truckpartner_model->get_record('tbl_users',$token);
				$truck_partner_refrence_number = $get_truck_prtner_details[0]->refrence_number; 
				$truck_partner_id = $get_truck_prtner_details[0]->id; 
				
				$all_records = $this->truckpartner_model->get_all_trucks($truck_partner_id);
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

	public function update_truck_status() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
		 		$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);

		 		// print_r($_POST);
		 		
		 		$truck_id = $_POST['truck_id'];
		 		$status = $_POST['status'];
               
		 		//validation rules
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('truck_id', 'truck_id', 'required');
				$this->form_validation->set_rules('status', 'status', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please provide id and status!',                
				   );

				} else 
				{
					$updateProfileData = array(
						'status' => $status,
					);

					// print_r($loginUserId);

					$r = $this->truckpartner_model->update($truck_id,$updateProfileData,'tbl_truck');
					
					$response = array(
						'status' => '200',
						'message' => 'Status updated successfuly!'
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

	public function get_single_truck_details()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			
			$posts = array();
			if($isValidToken) 
			{
				
				$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);
				$id = $_POST['truck_id'];

				$get_records = $this->truckpartner_model->get_single_record('tbl_truck',$id);
				// print_r($get_records);
				if(!empty($get_records))
				{
					
					if($get_records[0]->image){
						$image = base_url_image().$get_records[0]->image;
					}else{
						$image =  base_url().'assets/img/no-profile-image.jpg';
					}

					if($get_records[0]->or_cr){
						$or_cr = base_url_image().$get_records[0]->or_cr;
					}else{
						$or_cr =  base_url().'assets/img/no-profile-image.jpg';
					}

					

					$posts = array(
							'status' => '200',
							'data' => array(
								'id' => $get_records[0]->id,
								'model' => $get_records[0]->model,
								'plate_no' => $get_records[0]->plate_no,
								'truck_type' => $get_records[0]->truck_type,
								'image' => $image,
								'or_cr' => $or_cr,
								'status' => $get_records[0]->status,
								'created' => $get_records[0]->created,
								
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



	public function get_all_chassis()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);

				$get_truck_prtner_details = $this->truckpartner_model->get_record('tbl_users',$token);
				$truck_partner_refrence_number = $get_truck_prtner_details[0]->refrence_number; 
				$truck_partner_id = $get_truck_prtner_details[0]->id; 
				
				$all_records = $this->truckpartner_model->get_all_chassis($truck_partner_id);
				// print_r($all_records);
				
				if(!empty($all_records))
				{
					foreach($all_records as $all_record) {
						
						if($all_record->image){
							$image = base_url_image().$all_record->image; 
						}else{
							$image =  base_url().'assets/img/no-image.jpg';
						}

						$get_tralier_type_name = $this->truckpartner_model->get_trailer_type_name($all_record->trailer_type);

						
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
							'message' => 'No Chassis Available!..'
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

	public function update_chassis_status() 
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
		 		$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);

		 		// print_r($_POST);
		 		
		 		$chassis_id = $_POST['chassis_id'];
		 		$status = $_POST['status'];
               
		 		//validation rules
				$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('chassis_id', 'chassis_id', 'required');
				$this->form_validation->set_rules('status', 'status', 'required');
				
				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'Please provide id and status!',                
				   );

				} else 
				{
					$updateProfileData = array(
						'status' => $status,
					);

					// print_r($loginUserId);

					$r = $this->truckpartner_model->update($chassis_id,$updateProfileData,'tbl_truck');
					
					$response = array(
						'status' => '200',
						'message' => 'Status updated successfuly!'
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

	public function get_single_chassis_details()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			
			$posts = array();
			if($isValidToken) 
			{
				
				$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);
				$id = $_POST['chassis_id'];

				$get_records = $this->truckpartner_model->get_single_record('tbl_truck',$id);
				// print_r($get_records);
				if(!empty($get_records))
				{
					
					if($get_records[0]->image){
						$image = base_url_image().$get_records[0]->image;
					}else{
						$image =  base_url().'assets/img/no-profile-image.jpg';
					}

					if($get_records[0]->or_cr){
						$or_cr = base_url_image().$get_records[0]->or_cr;
					}else{
						$or_cr =  base_url().'assets/img/no-profile-image.jpg';
					}

					$get_tralier_type_name = $this->truckpartner_model->get_trailer_type_name($get_records[0]->trailer_type);


					$posts = array(
							'status' => '200',
							'data' => array(
								'id' => $get_records[0]->id,
								'model' => $get_records[0]->model,
								'plate_no' => $get_records[0]->plate_no,
								'trailer_type' => $get_tralier_type_name[0]->trailer_type,
								'image' => $image,
								'or_cr' => $or_cr,
								'status' => $get_records[0]->status,
								'created' => $get_records[0]->created,
								
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


	public function book_all_truck_transaction_history()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				
				$all_records = $this->truckpartner_model->get_all_truck_transaction_history($loginUserId);

					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {

							// Delivery Dtails

							$trailer_chassis_type_details = $this->truckpartner_model->get_trailer_chassis_type($all_record->trailer_chassis_type_id);

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

							$get_driver_details = $this->truckpartner_model->get_single_user_details($all_record->select_driver_id);

							$select_truck_id = $get_driver_details[0]->truck_id;
							$select_chassis_id = $get_driver_details[0]->chassis_id;

							$get_truck_details = $this->truckpartner_model->get_truck_details($select_truck_id);
							$get_chessis_details = $this->truckpartner_model->get_chessis_details($select_chassis_id);

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

	public function all_transaction_history_by_driver_id()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				$driver_id = $_POST['driver_id'];

		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('driver_id', 'Driver Id', 'required');
		 		
				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{

					$all_records = $this->truckpartner_model->get_all_truck_transaction_history_by_driver($driver_id);

					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {

							// Delivery Dtails

							$trailer_chassis_type_details = $this->truckpartner_model->get_trailer_chassis_type($all_record->trailer_chassis_type_id);

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

							$get_driver_details = $this->truckpartner_model->get_single_user_details($all_record->select_driver_id);

							$select_truck_id = $get_driver_details[0]->truck_id;
							$select_chassis_id = $get_driver_details[0]->chassis_id;

							$get_truck_details = $this->truckpartner_model->get_truck_details($select_truck_id);
							$get_chessis_details = $this->truckpartner_model->get_chessis_details($select_chassis_id);

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

	public function all_transaction_history_by_truck_id()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				$truck_id = $_POST['truck_id'];
				// echo "fhfh";

		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('truck_id', 'Truck Id', 'required');

		 		// echo $this->form_validation->run();
		 		
				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{

					$all_records = $this->truckpartner_model->get_all_truck_transaction_history_by_truck($truck_id);

					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {

							// Delivery Dtails

							$trailer_chassis_type_details = $this->truckpartner_model->get_trailer_chassis_type($all_record->trailer_chassis_type_id);

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

							$get_driver_details = $this->truckpartner_model->get_single_user_details($all_record->select_driver_id);

							$select_truck_id = $get_driver_details[0]->truck_id;
							$select_chassis_id = $get_driver_details[0]->chassis_id;

							$get_truck_details = $this->truckpartner_model->get_truck_details($select_truck_id);
							$get_chessis_details = $this->truckpartner_model->get_chessis_details($select_chassis_id);

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

	public function all_transaction_history_by_chassis_id()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->truckpartner_model->checkToken($token);
			$getidbyToken = $this->truckpartner_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				$chassis_id = $_POST['chassis_id'];
				// echo "fhfh";

		 		$this->form_validation->set_error_delimiters('', '');
		 		$this->form_validation->set_rules('chassis_id', 'Truck Id', 'required');

		 		// echo $this->form_validation->run();
		 		
				if ($this->form_validation->run() === FALSE) {
					$posts = array(
				        'status' => '404',
				        'message' => validation_errors(),                  
				   );

				} else 
				{

					$all_records = $this->truckpartner_model->get_all_truck_transaction_history_by_chassis($chassis_id);

					if(!empty($all_records))
					{
						
						foreach($all_records as $all_record) {

							// Delivery Dtails

							$trailer_chassis_type_details = $this->truckpartner_model->get_trailer_chassis_type($all_record->trailer_chassis_type_id);

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

							$get_driver_details = $this->truckpartner_model->get_single_user_details($all_record->select_driver_id);

							$select_truck_id = $get_driver_details[0]->truck_id;
							$select_chassis_id = $get_driver_details[0]->chassis_id;

							$get_truck_details = $this->truckpartner_model->get_truck_details($select_truck_id);
							$get_chessis_details = $this->truckpartner_model->get_chessis_details($select_chassis_id);

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



	



	private function generateRefrenceNumber($length = 6)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = 'TARA';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
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
