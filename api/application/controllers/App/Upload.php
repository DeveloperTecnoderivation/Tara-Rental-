<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/upload_model');
		$this->load->helper('url');
		$this->load->helper('text');
	}
    
  	public function image_upload()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 
		$output = array();


		  // $config['upload_path'] = FCPATH . 'assets/images/';
	   //    $config['allowed_types'] = 'gif|jpg|png';
	   //    // $config['max_size']      = 100000;
	   //    //$config['encrypt_name']  = TRUE;
	   //    $this->load->library('upload', $config);
	   //    if (!$this->upload->do_upload('image'))
	   //    {
	   //       echo "<pre>";
	   //       print_r($this->upload->display_errors());
	   //       exit();
	   //    }
	   //    else
	   //    {
	      		
	   //          $image_data =   $this->upload->data();
	   //          // print_r($image_data);
	   //          $configer =  array(
		  //           'image_library' => 'gd2',
		  //           'source_image'  =>  FCPATH . 'assets/images/'. $image_data['file_name'],
		  //           'maintain_ratio'=>  TRUE,
		  //           'create_thumb'=>  TRUE,
		  //           'width'         =>  400,
		  //           'height'        =>  500,
		  //           'master_dim'    => 'width',
		  //           'quality'       =>  "20%",
		  //           'new_image'     =>  FCPATH . 'assets/thumbs/' . 'thumb-' . $image_data['file_name'],
		  //         );

	   //          print_r($configer);
	   //          $this->load->library('image_lib');
	            
	   //          $this->image_lib->initialize($configer);
	   //          $this->image_lib->clear();
	   //          if($this->image_lib->resize()){
	            	
			 //            $data['Message'] = "Testing COmpress Image";

				// 		echo "<pre>";
				// 		print_r($data);
				// 		exit();
				// 	}else{
				// 		$data =  $this->image_lib->display_errors();
				// 		print_r($data);
				// 		exit();
				// 	}

	            
	           
	   //    }

	        
		
		
		$allowedExts = array("pdf", "doc", "docx","png","jpg","jpeg","gif","avi");
	 	$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);


	 	if ((($_FILES["image"]["type"] == "application/pdf")
		|| ($_FILES["image"]["type"] == "application/doc")
		|| ($_FILES["image"]["type"] == "application/docx")
		|| ($_FILES["image"]["type"] == "image/png")
		|| ($_FILES["image"]["type"] == "image/jpg")
		|| ($_FILES["image"]["type"] == "image/jpeg")
		|| ($_FILES["image"]["type"] == "image/gif")
		|| ($_FILES["image"]["type"] == "image/avi"))
		&& ($_FILES["image"]["size"] < 15728640)
		&& in_array($extension, $allowedExts))
		{
			
			if ($_FILES["image"]["error"] > 0)
			{

			  $image_name = ''; 
			}
			else
			{

				$name = $_FILES['image']['name'];
				$size = $_FILES['image']['size'];
				$type = $_FILES['image']['type'];
				$randomNumber = rand(15,35);
				$rn = $randomNumber.'-';		
				$ext = strtolower(substr($name, strpos($name, '.') +1));
				$name = $rn.str_replace(' ','-',trim($name));
				$image_name = $name;

				 move_uploaded_file($_FILES["image"]["tmp_name"],
			  	"../documents/" .$image_name);

			}
		}else{
			// echo "dgsgsg";
			$image_name = ''; 
		}

		if($image_name) {
			$posts1 = array(
			    'message' => 'Image upload successfully',
				'image' => $image_name,
				'image_url' => base_url_image(),
			);

					
			$response = array(
				'status' => '200',
				'data' => $posts1

				
			);		
			
		}else {
				$response = array(
				'status' => '404',
				'message' => 'Please upload maximum 15 mb image.',
				);
		}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
	}

	// public function image_upload()
	// {
		
	// 	header("Access-Control-Allow-Origin: *");
	// 	header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
	// 	header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 
	// 	 $output = array();
	// 	 // print_r(count($_FILES));
		 
	// 	if(isset($_FILES) && is_array($_FILES) && count($_FILES)) 
	// 	{
	// 		// echo "vgsag";
	// 	     $output['FILES'] = $_FILES;
	// 		 $output['uploaded'] = file_get_contents($_FILES['image']['tmp_name']);
	// 	}

	// 	$data = $output['uploaded'];
	// 	$path="documents/";
	// 	$image_name = 'documents/' . time() . '.png';

	// 	file_put_contents($image_name, $data);

	// 	if($image_name) {
					
	// 		$response = array(
	// 			'status' => '200',
	// 			'data' => $image_name,
	// 		);
	// 			}else {
	// 			$response = array(
	// 			'status' => '404',
	// 			'data' => '',
	// 			);
	// 		}

	// 		$this->output
	// 			->set_status_header(200)
	// 			->set_content_type('application/json')
	// 			->set_output(json_encode($response)); 
	// }

	public function video_upload()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 
		 $output = array();
		 // echo $_FILES["video"]["type"];
		 // die;
		$allowedExts = array("mov", "mp4", "3gp", "ogg");
	 	$extension = pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION);
	 	if ((($_FILES["video"]["type"] == "video/mov")
		|| ($_FILES["video"]["type"] == "video/mp4")
		|| ($_FILES["video"]["type"] == "video/3gp")
		|| ($_FILES["video"]["type"] == "video/ogg"))
		&& ($_FILES["video"]["size"] < 999999999)
		&& in_array($extension, $allowedExts))
		{

			if ($_FILES["video"]["error"] > 0)
			{
			  $video_name = ''; 
			}
			else
			{

				$name = $_FILES['video']['name'];
				$size = $_FILES['video']['size'];
				$type = $_FILES['video']['type'];
				$randomNumber = rand(15,35);
				$rn = $randomNumber.'-';		
				$ext = strtolower(substr($name, strpos($name, '.') +1));
				$name = $rn.str_replace(' ','-',trim($name));
				$video_name = $name;

				 move_uploaded_file($_FILES["video"]["tmp_name"],
			  	"../documents/" .$video_name);

			}
		}else{
			// echo "dgsgsg";
			$video_name = ''; 
		}

		if($video_name) {

			$posts1 = array(
			    'message' => 'Video upload successfully',
				'video' => $video_name,
				'video_url' => base_url_image(),
			);

					
			$response = array(
				'status' => '200',
				'data' => $posts1

				
			);	
	
		}else {
				$response = array(
					'status' => '404',
					'message' => 'Something error',
				);
		}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
	}

	public function image_upload_precription()
	{
		
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 
		 $output = array();
		if(isset($_FILES) && is_array($_FILES) && count($_FILES)) {
		    $output['FILES'] = $_FILES;
			$output['uploaded'] = file_get_contents($_FILES['image']['tmp_name']);
		}

		$data = $output['uploaded'];
		$path="assets/precription/";
		$image_name = 'assets/precription/' . time() . '.png';

		file_put_contents($image_name, $data);

		if($image_name) {
					
			$response = array(
				'status' => '200',
				'data' => $image_name,
			);
				}else {
				$response = array(
				'status' => '404',
				'message' => '',
				);
			}

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
	}


}
