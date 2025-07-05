<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/profile_model');
		$this->load->helper('url');
		$this->load->helper('text');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
		// $image_url = 'https://tarataxi.technoderivation.com/uploads';
	}


	public function get_profile()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			
			$posts = array();
			if($isValidToken) {
				
				$get_records = $this->profile_model->get_record('tbl_users',$token);
				
				if(!empty($get_records))
				{
					if($get_records[0]->profile_image){
						$profile_image = base_url_image().$get_records[0]->profile_image;
					}else{
						$profile_image =  base_url().'assets/img/no-profile-image.jpg';
					}

					if($get_records[0]->license){
						$license = base_url_image().$get_records[0]->license;
					}else{
						$license =  base_url().'assets/img/no-image.jpg';
					}

					if($get_records[0]->supporting_id){
						$supporting_id = base_url_image().$get_records[0]->supporting_id;
					}else{
						$supporting_id =  base_url().'assets/img/no-image.jpg';
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

					if($get_records[0]->role == 'car_owner'){
						$total_earning = $this->profile_model->get_car_booking_details($get_records[0]->id);
					}
					if($get_records[0]->role == 'driver'){
						$total_earning = $this->profile_model->get_truck_driver_booking_details($get_records[0]->id);
					}
					// echo $get_records[0]->role;
					// die;
					if($get_records[0]->role == 'truck_partner'){
						$total_earning = $this->profile_model->get_truck_partner_booking_details($get_records[0]->id);
					}
					if($get_records[0]->role == 'user'){
						$total_earning = '0';
					}

					

					$posts = array(
							'status' => '200',
							'data' => array(
								'id' => $get_records[0]->id,
								'f_name' => $get_records[0]->f_name,
								'l_name' => $get_records[0]->l_name,
								'tara_wallet' => $get_records[0]->tara_wallet,
								'total_earning' => $total_earning,
								'role' => $get_records[0]->role,
								'username' => $get_records[0]->username,
								'email' => $get_records[0]->email,
								'phone' => $get_records[0]->phone,
								// 'total_earning' => '0',
								'total_booking' => '0',
								
								'dob' => $get_records[0]->dob,
								'gender' => $get_records[0]->gender,
								'street' => $get_records[0]->street,
								'village' => $get_records[0]->village,
								'city' => $get_records[0]->city,
								'province' => $get_records[0]->province,
								'zipcode' => $get_records[0]->zipcode,
								'status' => $get_records[0]->status,
								'joining_date' => $get_records[0]->created,


								'company_name' => $get_records[0]->company_name,
								'contact_person' => $get_records[0]->contact_person,
								'company_type' => $get_records[0]->company_type,
								
								'refrence_number' => $get_records[0]->refrence_number,
								'truck_refrence_number' => $get_records[0]->truck_refrence_number,
								

								'license' => $license,
								'supporting_id' => $supporting_id,
								'profile_image' => $profile_image,

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


	public function update_profile()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$formdata = json_decode(file_get_contents('php://input'), true);

				$check_profile_email = $this->profile_model->check_profile_email($loginUserId,$formdata['email']);



				if($check_profile_email){
					$response = array(
						'status' => '404',
						'message' => 'Email Already exist! Please update another email',
						);
				}else{
					$updateProfileData = array(
						'f_name' => $formdata['f_name'],
						'l_name' => $formdata['l_name'],
						'username' => $formdata['username'],
						'email' => $formdata['email'],
						'phone' => $formdata['phone'],
						'dob' => $formdata['dob'],
						'gender' =>$formdata['gender'],
						'street' => $formdata['street'],
						'village' => $formdata['village'],
						'city' => $formdata['city'],
						'province' =>$formdata['province'],
						'zipcode' =>$formdata['zipcode']
					);	
					// echo $loginUserId;
					// print_r($updateProfileData);
					$r = $this->profile_model->updateProfile($loginUserId,$updateProfileData);
					
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

	public function update_profile_image()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$formdata = json_decode(file_get_contents('php://input'), true);

				// echo $loginUserId;
				
					$updateProfileData = array(
						'profile_image' => $formdata['profile_image'],
					);

					$r = $this->profile_model->updateProfile($loginUserId,$updateProfileData);
					
					if($r){
						$response = array(
						'status' => '200',
						'message' => 'Profile image update Successfully',
						);
					}else{
						$response = array(
						'status' => '404',
						'message' => 'Profile image not updated',
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

	public function update_verification()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
		 		
		 		$license = $_POST['license'];
		 		$supporting_id = $_POST['supporting_id'];
		 		
		 		$this->form_validation->set_error_delimiters('', '');
				$this->form_validation->set_rules('license', 'License', 'required');
				

				if ($this->form_validation->run() === FALSE) {
					$response = array(
				        'status' => '404',
				        'message' => 'License required!',                
				   );

				} else 
				{

					$shopData = array(
						'supporting_id' => $supporting_id,
						 'license' => $license,
					);

					$user  = $this->profile_model->updateProfile($car_owner_id,$shopData);
					
					if($user){
						$response = array(
						'status' => '200',
						'message' => 'Car Owner Verified Successfully',
						);
					}else{
						$response = array(
						'status' => '404',
						'message' => 'Car Owner Not Verified',
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


	public function get_single_car_details()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$car_owner_id = $loginUserId;
 				$car_id = $_POST['car_id'];
				
				if($car_id){

					$all_records = $this->profile_model->get_single_car_details($car_id);


					if(!empty($all_records))
					{
						
							$current_date = date('Y-m-d');
							// echo $all_records[0]->car_owner_id;
							$car_owner_details = $this->profile_model->get_car_owner_details($all_records[0]->car_owner_id);

							

							
							$car_price = $this->profile_model->get_price($all_records[0]->id,$current_date);
							if($car_price){
								$car_price = $car_price[0]->price;
							}else{

								$currentDay  = date('l');
								$car_price_new = $this->profile_model->get_min_max_price($all_records[0]->id);
								
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


							if($all_records[0]->rear_view_image){
								$rear_view_image = base_url_image().$all_records[0]->rear_view_image; 
							}else{
								$rear_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->front_view_image){
								$front_view_image = base_url_image().$all_records[0]->front_view_image; 
							}else{
								$front_view_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->right_side_image){
								$right_side_image = base_url_image().$all_records[0]->right_side_image; 
							}else{
								$right_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->left_side_image){
								$left_side_image = base_url_image().$all_records[0]->left_side_image; 
							}else{
								$left_side_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->interior_image){
								$interior_image = base_url_image().$all_records[0]->interior_image; 
							}else{
								$interior_image =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->or_cr_doc){
								$or_cr_doc = base_url_image().$all_records[0]->or_cr_doc; 
							}else{
								$or_cr_doc =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->insurence){
								$insurence = base_url_image().$all_records[0]->insurence; 
							}else{
								$insurence =  base_url().'assets/img/no-image.jpg';
							}

							if($all_records[0]->car_video){
								$car_video = base_url_image().$all_records[0]->car_video; 
							}else{
								$car_video =  base_url().'assets/img/no-image.jpg';
							}


							if($car_owner_details[0]->profile_image){
								$profile_image = base_url_image().$car_owner_details[0]->profile_image; 
							}else{
								$profile_image =  base_url().'assets/img/no-image.jpg';
							}

							
							$posts1 = array(
									'id' => $all_records[0]->id,
									'car_id' => $all_records[0]->id,
									'fuel_type' => $all_records[0]->fuel_type,
									'brand' => $all_records[0]->brand,
									'model' => $all_records[0]->model,
									'year' => $all_records[0]->year,
									'car_type' => $all_records[0]->car_type,
									'transmission' => $all_records[0]->transmission,
									'vin' => $all_records[0]->vin,
									'location'=>$all_record[0]->car_location,
									'car_lat' => $all_records[0]->lat,
									'car_lng' => $all_records[0]->lng,
									'mileage' => $all_records[0]->mileage,
									'seating_capacity' => $all_records[0]->seating_capacity,
									'interior_color' => $all_records[0]->interior_color,
									'exterior_color' => $all_records[0]->exterior_color,
									'description' => $all_records[0]->description,
									'insurence' => $insurence,
									'rear_view_image' => $rear_view_image,
								    'front_view_image' => $front_view_image,
									'right_side_image' => $right_side_image,
									'left_side_image' => $left_side_image,
									'interior_image' => $interior_image,
									'or_cr_doc' => $or_cr_doc,
									'car_video' => $car_video,

									// 'car_availability' => $all_records[0]->car_availability,
									'unlimited_distance' => $all_records[0]->unlimited_distance,
									'maximum_kilometer' => $all_records[0]->maximum_kilometer,
									'excess_fee_per_kilometer' => $all_records[0]->excess_fee_per_kilometer,
									'time_penalty_per_hour' => $all_records[0]->time_penalty_per_hour,
									'price'=>$car_price,
									'status' => $all_records[0]->status,

									'car_owner_name'=>$car_owner_details[0]->f_name.' '.$car_owner_details[0]->l_name,
									'car_owner_picture'=>$profile_image,
									'car_owner_joining_date'=>$car_owner_details[0]->created,
									'car_owner_lat'=>$car_owner_details[0]->lat,
									'car_owner_lng'=>$car_owner_details[0]->lng,

									
							);

						
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
							'message' => 'Please Select Car'
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

	public function all_car_calendar_pricing()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
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

					
					$car_detials = $this->profile_model->get_car_min_max_pricing($car_id,'tbl_car');
					$posts1 =[];

					if(!empty($car_detials))
					{
						


						$min_price = $car_detials[0]->min_price; 
						$max_price = $car_detials[0]->max_price; 
						$start_date = $startDate;
						$end_date = $endDate;
						$car_id = $car_id;

						$start = new DateTime($start_date);
						$end = new DateTime($end_date);

						// Add one day to include the end date in the loop
						$end->modify('+1 day');

						$interval = new DateInterval('P1D'); // 1 Day interval
						$daterange = new DatePeriod($start, $interval, $end);

						foreach ($daterange as $date) {
						    // echo $date->format("Y-m-d") . ' - ' . $date->format("l") . "<br>";
							$day = $date->format("l");
							$thisdate = $date->format("Y-m-d");

						    if(($day=='Saturday') || ($day=='Sunday')){
						      $car_price  = $max_price;
						    }else{
						      $car_price  = $min_price;
						    }

						
						$all_records = $this->profile_model->get_all_car_calendar_pricing($car_id,$thisdate,'tbl_car_price_calender');

						if(!empty($all_records)){
							$new_car_price = $all_records[0]->price;
						}else{
							$new_car_price = $car_price;
						}

						$check_book_car = $this->profile_model->check_book_car($car_id,$thisdate);
						if(!empty($check_book_car))
						{
							$new_car_price_check = '0';
						}else{
							$new_car_price_check = $new_car_price;
						}

						$posts1[] = array(
								
							'date' => $thisdate,
							'price' => $new_car_price,
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

	public function current_booking()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);

				$current_booking = $this->profile_model->get_current_booking($loginUserId);

				if(!empty($current_booking)){

					$car_id = $current_booking[0]->car_id;

					$car_records = $this->profile_model->get_single_car_details($car_id);

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

					if($current_booking[0]->qr_image){
						$qr_image = base_url_qr_image().$current_booking[0]->qr_image; 
					}else{
						$qr_image =  base_url().'assets/img/no-image.jpg';
					}

					$posts1 = array(
						'booking_id' => $current_booking[0]->order_id,
						'pickup_date' => $current_booking[0]->pickup_date,
						'return_date' => $current_booking[0]->return_date,
						'total_fair' => $current_booking[0]->total_fair,
						'booking_status' => $current_booking[0]->booking_status,

						
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

	public function all_booking()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$posts = array();
		 		$_POST = json_decode(file_get_contents('php://input'), true);
		 		
		 		$car_id = $_POST['car_id'];
		 		$booking_status = $_POST['booking_status'];
		 		$from_date = $_POST['from_date'];
		 		$to_date = $_POST['to_date'];


				$current_booking = $this->profile_model->get_all_booking($loginUserId,$car_id,$booking_status,$from_date,$to_date);

				

				if(!empty($current_booking)){

					foreach($current_booking as $booking_list) {

							$car_id = $booking_list->car_id;
							$car_records = $this->profile_model->get_single_car_details($car_id);

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
								'car_id'=>$car_id,
								
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


	public function booking_detials_by_booking_id()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				$booking_id = $_POST['booking_id'];

				if($booking_id){
					
					 $current_booking = $this->profile_model->get_booking_by_id($booking_id);

					if(!empty($current_booking)){

						$car_id = $current_booking[0]->car_id;

						$car_records = $this->profile_model->get_single_car_details($car_id);
						$user_records = $this->profile_model->get_user_record($current_booking[0]->user_id);


						$current_date = date('Y-m-d');

						$car_owner_details = $this->profile_model->get_car_owner_details($current_booking[0]->car_owner_id);
						
						$car_price = $this->profile_model->get_price($car_id,$current_date);

						if($car_price){
							$car_price = $car_price[0]->price;
						}else{

							$currentDay  = date('l');
							$car_price_new = $this->profile_model->get_min_max_price($car_id);
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

						// echo $car_price;
						// die;


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

						if($current_booking[0]->qr_image){
							$qr_image = base_url_qr_image().$current_booking[0]->qr_image; 
						}else{
							$qr_image =  base_url().'assets/img/no-image.jpg';
						}


						if($car_owner_details[0]->profile_image){
							$profile_image = base_url_image().$car_owner_details[0]->profile_image; 
						}else{
							$profile_image =  base_url().'assets/img/no-image.jpg';
						}

						if($user_records[0]->profile_image){
							$customer_picture = base_url_image().$user_records[0]->profile_image; 
						}else{
							$customer_picture =  base_url().'assets/img/no-image.jpg';
						}


						$posts1 = array(
							'customer_id'=>$current_booking[0]->user_id,
							'car_owner_joined_date'=>$car_owner_details[0]->created,
							'customer_picture'=>$customer_picture,
							'customer_name'=>$user_records[0]->f_name.' '.$user_records[0]->l_name,
							'customer_joined_date'=>$user_records[0]->created,
							

							'booking_id' => $current_booking[0]->order_id,
							'pickup_date' => $current_booking[0]->pickup_date,
							'return_date' => $current_booking[0]->return_date,
							'total_fair' => $current_booking[0]->total_fair,
							'booking_status' => $current_booking[0]->booking_status,
							'owner_name' => $user_records[0]->f_name.' '.$user_records[0]->l_name,

							'car_id' => $current_booking[0]->car_id,
							'car_owner_id' => $current_booking[0]->car_owner_id,

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

							'transmission' => $car_records[0]->transmission,
							'vin' => $car_records[0]->vin,
							'location'=>$car_records[0]->car_location,
							'car_lng'=>$car_records[0]->lng,
							'car_lat'=>$car_records[0]->lat,
							'car_type' => $car_records[0]->car_type,
							'mileage' => $car_records[0]->mileage,
							'seating_capacity' => $car_records[0]->seating_capacity,

							'interior_color' => $car_records[0]->interior_color,
							'exterior_color' => $car_records[0]->exterior_color,

							'fuel_type' => $car_records[0]->fuel_type,
							'description' => $car_records[0]->description,
							
							'unlimited_distance' => $car_records[0]->unlimited_distance,
							'maximum_kilometer' => $car_records[0]->maximum_kilometer,
							'excess_fee_per_kilometer' => $car_records[0]->excess_fee_per_kilometer,
							'time_penalty_per_hour' => $car_records[0]->time_penalty_per_hour,
							'price'=>$car_price,
							'car_owner_name'=>$car_owner_details[0]->f_name.' '.$car_owner_details[0]->l_name,
							'car_owner_picture'=>$profile_image,
							'car_owner_joining_date'=>$car_owner_details[0]->created,
							'car_owner_lat'=>$car_owner_details[0]->lat,
							'car_owner_lng'=>$car_owner_details[0]->lng,
								
						);

							
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
							'message' => 'Please provide booking id'
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


	public function start_rent_success()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				$booking_id = $_POST['booking_id'];
				$front_view_image = $_POST['front_view_image'];
				$left_side_image = $_POST['left_side_image'];
				$back_side_image = $_POST['back_side_image'];
				$right_side_image = $_POST['right_side_image'];
				$interior_image = $_POST['interior_image'];
				
				if($booking_id)
				{
					
					$check_booking = $this->profile_model->get_booking_by_id($booking_id);
					if($check_booking)
					{

					 	$updateProfileData = array(
							'front_view_image' => $front_view_image,
							'left_side_image' => $left_side_image,
							'back_side_image' => $back_side_image,
							'right_side_image' => $right_side_image,
							'interior_image' => $interior_image,
							'booking_status' => 'Ongoing',
						);

						$r = $this->profile_model->updateBookingImage($booking_id,$updateProfileData);
					
						if($r){
							$posts = array(
								'status' => '200',
								'message' => 'Start rent successfully',
							);
						}else{
							$posts = array(
								'status' => '404',
								'message' => 'Rent not start',
							);
						}


					}else{
					 	$posts = array(
							'status' => '404',
							'message' => 'Invalid booking id'
					    );
					}


					
				}else{
					$posts = array(
							'status' => '404',
							'message' => 'Please provide booking id'
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
	

	public function end_rent()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				$booking_id = $_POST['booking_id'];
				
				if($booking_id)
				{
					
					$check_booking = $this->profile_model->get_booking_by_id($booking_id);
					if($check_booking)
					{

					 	$updateProfileData = array(
							'booking_status' => 'Done',
						);

						$r = $this->profile_model->updateBookingImage($booking_id,$updateProfileData);
					
						if($r){
							$posts = array(
								'status' => '200',
								'message' => 'End rent successfully',
							);
						}else{
							$posts = array(
								'status' => '404',
								'message' => 'Rent not start',
							);
						}


					}else{
					 	$posts = array(
							'status' => '404',
							'message' => 'Invalid booking id'
					    );
					}


					
				}else{
					$posts = array(
							'status' => '404',
							'message' => 'Please provide booking id'
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

	public function cancle_booking()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
				$booking_id = $_POST['booking_id'];
				
				if($booking_id)
				{
					
					$check_booking = $this->profile_model->get_booking_by_id($booking_id);
					if($check_booking)
					{

					 	$updateProfileData = array(
							'booking_status' => 'Cancelled',
						);

						$r = $this->profile_model->updateBookingImage($booking_id,$updateProfileData);
					
						if($r){
							$posts = array(
								'status' => '200',
								'message' => 'Booking Cancelled Successfully',
							);
						}else{
							$posts = array(
								'status' => '404',
								'message' => 'Booking Not Cancelled',
							);
						}


					}else{
					 	$posts = array(
							'status' => '404',
							'message' => 'Invalid booking id'
					    );
					}


					
				}else{
					$posts = array(
							'status' => '404',
							'message' => 'Please provide booking id'
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

	public function delete_account()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			if($isValidToken) {
				
				$_POST = json_decode(file_get_contents('php://input'), true);
 				$user_id = $loginUserId;

 				$tokenData = array(
						'status' =>'0',
			    );
				
				$userdelete = $this->profile_model->account_delete($user_id,$tokenData);

				if($userdelete)
				{
				
					$posts = array(
							'status' => '200',
							'message' => 'Account delete successfully'
						);
				}else{
					$posts = array(
							'status' => '404',
							'message' => 'Account not deleted.'
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

	public function get_all_short_notification()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token){
			$isValidToken = $this->profile_model->checkToken($token);
			$getidbyToken = $this->profile_model->getidbyToken($token);
			$loginUserId = $getidbyToken->id;
			
			$posts = array(); 
			if($isValidToken) {

				$formdata = json_decode(file_get_contents('php://input'), true);
				$notification_type = $formdata['notification_type'];
				

				$current_date = date('Y-m-d');

				$get_user_records = $this->profile_model->get_single_record_by_id($loginUserId);
				 
				$get_records = $this->profile_model->get_all_notification($loginUserId,$notification_type,$get_user_records[0]->show_notification_like,$get_user_records[0]->show_notification_validation,$get_user_records[0]->show_notification_friend_request,$get_user_records[0]->show_notification_new_message);
				$notification_count = $this->profile_model->get_notification_count($loginUserId);
				$all_notification_count = $this->profile_model->get_all_notification_count($loginUserId);
				// print_r($get_records);
				if(!empty($get_records))
				{
					
					$posts22 = [];
					$posts33=[];
						// echo "gdg";
					foreach($get_records as $get_event) {

						 

						if($get_event->image){
						    $image = base_url().'assets/images/'.$get_event->image;	
						}else{
							$image =  base_url().'assets/images/b-logo.png';
						}

						
						if($get_event->video){
						    $video = base_url().'assets/images/'.$get_event->video;	
						}else{
							$video =  '';
						}

						$current_date_time = date('Y-m-d h:i:s');
						$notification_date_time = $get_event->date_time;
 
						$start_datetime = new DateTime($current_date_time); 
						$diff = $start_datetime->diff(new DateTime($notification_date_time)); 
						 
						

						$send_msg_time = $diff->d.' Days '.$diff->h.' Hours '.$diff->i.' Minutes';

						
						$posts2[] = array(
									'id'=>$get_event->id,
									'sendor_id'=>$get_event->sendor_id,
									'chocolate_factory_id'=>$get_event->chocolate_factory_id,
									'chocolate_factory_paid_image_id'=>$get_event->chocolate_factory_paid_image_id,
									'chocolate_factory_paid_video_id'=>$get_event->chocolate_factory_paid_video_id,
									'user_id'=>$get_event->user_id,
									'title'=>$get_event->title,
									'description'=>$get_event->description,
									'type'=>$get_event->type,
									'image'=>$image,
									'video'=>$video,
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
	
}
