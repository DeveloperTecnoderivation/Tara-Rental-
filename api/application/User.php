<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('app/user_model');
		$this->load->helper('url');
		$this->load->helper('text');
	}
 
	public function profile()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) {
				$all_records = $this->user_model->loginDataByToken($token);
				
				// workout activity Weekly
				$monday = strtotime("last monday");
				$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
				$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
				$this_week_sd = date("Y-m-d",$monday);
				$this_week_ed = date("Y-m-d",$sunday);
				$workout_activity_weekly = $this->user_model->workout_activity_weekly($all_records->id,'1',$this_week_sd,$this_week_ed);

				$calories_weekly_data = $this->user_model->calories_count($all_records->id,$this_week_sd,$this_week_ed);
				if(!empty($calories_weekly_data[0]->calorie)){
				 	$calories_weekly = $calories_weekly_data[0]->calorie;
				}else{
					$calories_weekly = 0;
				}

				$step_weekly_data = $this->user_model->step_count($all_records->id,$this_week_sd,$this_week_ed);
				if(!empty($step_weekly_data[0]->step)){
				 	$step_weekly = $step_weekly_data[0]->step;
				}else{
					$step_weekly = 0;
				}


				// workout activity Monthly
				$fDate = date("Y-m-d",strtotime("first day of this month"));
				$lDate = date("Y-m-d",strtotime("last day of this month"));
				$workout_activity_monthly = $this->user_model->workout_activity_monthly($all_records->id,'1',$fDate,$lDate);

				$calories_monthly_data = $this->user_model->calories_count($all_records->id,$fDate,$lDate);
				if(!empty($calories_monthly_data[0]->calorie)){
				 	$calories_monthly = $calories_monthly_data[0]->calorie;
				}else{
					$calories_monthly = 0;
				}

				$step_monthly_data = $this->user_model->step_count($all_records->id,$fDate,$lDate);
				if(!empty($step_monthly_data[0]->step)){
				 	$step_monthly = $step_monthly_data[0]->step;
				}else{
					$step_monthly = 0;
				}

				// workout activity Year
				$fyearDate = date("Y-m-d",strtotime("first day of january this year"));
				$lyearDate =  date("Y-m-d",strtotime("last day of december this year"));
				$workout_activity_yearly = $this->user_model->workout_activity_yearly($all_records->id,'1',$fyearDate,$lyearDate);

				$calories_yearly_data = $this->user_model->calories_count($all_records->id,$fyearDate,$lyearDate);
				if(!empty($calories_yearly_data[0]->calorie)){
				 	$calories_yearly = $calories_yearly_data[0]->calorie;
				}else{
					$calories_yearly = 0;
				}

				$step_yearly_data = $this->user_model->step_count($all_records->id,$fyearDate,$lyearDate);
				if(!empty($step_yearly_data[0]->step)){
				 	$step_yearly = $step_yearly_data[0]->step;
				}else{
					$step_yearly = 0;
				}








				// echo $last_day_this_month = new DateTime('last day of this month');
				$total_day_this_month = date("t");
				$diff = date_diff(date_create($fyearDate),date_create($lyearDate));
				$total_day_this_year = $diff->format("%a");

				// Total Activity
				$total_activity = $this->user_model->total_activity($all_records->id);
				$total_combile_activity = $this->user_model->total_combine_activity($all_records->id,'1','2');
				// $total_sports_activity = $this->user_model->total_workout_activity($all_records->id,'2');
				


				$total_min_and_body_activity = $this->user_model->total_workout_activity($all_records->id,'3');
				$total_other_activity = $this->user_model->total_workout_activity($all_records->id,'4');
				$total_health_activity = $this->user_model->total_workout_activity($all_records->id,'6');
				$total_experiences_activity = $this->user_model->total_workout_activity($all_records->id,'12');
				
				// monthly Total Actitvity
				 $current_year = $year = date("Y");
				 $january_first_date = date('Y-m-d',strtotime('first day of january'.$current_year));
				 $january_last_date = date('Y-m-d',strtotime('last day of january'.$current_year));
				 $january_month_activity = $this->user_model->monthly_total_activity($all_records->id,$january_first_date,$january_last_date);

				 $february_first_date = date('Y-m-d',strtotime('first day of february'.$current_year));
				 $february_last_date = date('Y-m-d',strtotime('last day of february'.$current_year));
				 $february_month_activity = $this->user_model->monthly_total_activity($all_records->id,$february_first_date,$february_last_date);

				 $march_first_date = date('Y-m-d',strtotime('first day of march'.$current_year));
				 $march_last_date = date('Y-m-d',strtotime('last day of march'.$current_year));
				 $march_month_activity = $this->user_model->monthly_total_activity($all_records->id,$march_first_date,$march_last_date);


				 $april_first_date = date('Y-m-d',strtotime('first day of april'.$current_year));
				 $april_last_date = date('Y-m-d',strtotime('last day of april'.$current_year));
				 $april_month_activity = $this->user_model->monthly_total_activity($all_records->id,$april_first_date,$april_last_date);

				 $may_first_date = date('Y-m-d',strtotime('first day of may'.$current_year));
				 $may_last_date = date('Y-m-d',strtotime('last day of may'.$current_year));
				 $may_month_activity = $this->user_model->monthly_total_activity($all_records->id,$may_first_date,$may_last_date);

				 $june_first_date = date('Y-m-d',strtotime('first day of june'.$current_year));
				 $june_last_date = date('Y-m-d',strtotime('last day of june'.$current_year));
				 $june_month_activity = $this->user_model->monthly_total_activity($all_records->id,$june_first_date,$june_last_date);

				 $july_first_date = date('Y-m-d',strtotime('first day of july'.$current_year));
				 $july_last_date = date('Y-m-d',strtotime('last day of july'.$current_year));
				 $july_month_activity = $this->user_model->monthly_total_activity($all_records->id,$july_first_date,$july_last_date);

				 $august_first_date = date('Y-m-d',strtotime('first day of august'.$current_year));
				 $august_last_date = date('Y-m-d',strtotime('last day of august'.$current_year));
				 $august_month_activity = $this->user_model->monthly_total_activity($all_records->id,$august_first_date,$august_last_date);

				 $september_first_date = date('Y-m-d',strtotime('first day of september'.$current_year));
				 $september_last_date = date('Y-m-d',strtotime('last day of september'.$current_year));
				 $september_month_activity = $this->user_model->monthly_total_activity($all_records->id,$september_first_date,$september_last_date);

				 $october_first_date = date('Y-m-d',strtotime('first day of october'.$current_year));
				 $october_last_date = date('Y-m-d',strtotime('last day of october'.$current_year));
				 $october_month_activity = $this->user_model->monthly_total_activity($all_records->id,$october_first_date,$october_last_date);

				 $november_first_date = date('Y-m-d',strtotime('first day of november'.$current_year));
				 $november_last_date = date('Y-m-d',strtotime('last day of november'.$current_year));
				 $november_month_activity = $this->user_model->monthly_total_activity($all_records->id,$november_first_date,$november_last_date);

				 $december_first_date = date('Y-m-d',strtotime('first day of december'.$current_year));
				 $december_last_date = date('Y-m-d',strtotime('last day of december'.$current_year));
				 $december_month_activity = $this->user_model->monthly_total_activity($all_records->id,$december_first_date,$december_last_date);

				 $posts2 = array(
							'january_month_activity' => $january_month_activity,
							'february_month_activity' => $february_month_activity,
							'march_month_activity' => $march_month_activity,
							'april_month_activity' => $april_month_activity,
							'may_month_activity' => $may_month_activity,
							'june_month_activity' => $june_month_activity,
							'july_month_activity' => $july_month_activity,
							'august_month_activity' => $august_month_activity,
							'september_month_activity' => $september_month_activity,
							'october_month_activity' => $october_month_activity,
							'november_month_activity' => $november_month_activity,
							'december_month_activity' => $december_month_activity,
					);
			    
			    // All activity count

				$admin_all_activities = $this->user_model->admin_all_activity();
				// print_r($admin_all_activities);
				// die;
				$posts3=[];
				foreach($admin_all_activities as $admin_all_activity)
				 {
					if($admin_all_activity->new_activity_icon){
						$activity_icon = base_url('media/icon/'.$admin_all_activity->new_activity_icon);
					}else{
						$activity_icon = base_url('media/no-image.png');
					}

					
					$total_count_activity = $this->user_model->total_count_activity($all_records->id,$admin_all_activity->id);
					
					if(!empty($total_count_activity)){
						$posts3[] = array(
						'id' => $admin_all_activity->id,
						'category_id'=> $admin_all_activity->category_id,
						'category_name'=> $admin_all_activity->category_name,
						'name' => $admin_all_activity->name,
						'activity_icon' => $activity_icon,
						'total_count_activity'=>$total_count_activity
						
						);	
					}

					// 	$posts3[] = array(
					// 	'id' => $admin_all_activity->id,
					// 	'category_id'=> $admin_all_activity->category_id,
					// 	'category_name'=> $admin_all_activity->category_name,
					// 	'name' => $admin_all_activity->name,
					// 	'activity_icon' => $activity_icon,
					// 	'total_count_activity'=>$total_count_activity
						
					// 	);	
						
					
					

				}


				// workout and sport Activity Monthly count
				$january_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$january_first_date,$january_last_date);
				$february_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$february_first_date,$february_last_date);
				$march_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$march_first_date,$march_last_date);
				$april_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$april_first_date,$april_last_date);
				$may_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$may_first_date,$may_last_date);
				$june_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$june_first_date,$june_last_date);
				$july_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$july_first_date,$july_last_date);
				$august_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$august_first_date,$august_last_date);
				$september_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$september_first_date,$september_last_date);
				$october_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$october_first_date,$october_last_date);
				$november_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$november_first_date,$november_last_date);
				$december_month_workout_activity = $this->user_model->monthly_category_wise_combine_total_activity($all_records->id,'1','2',$december_first_date,$december_last_date);

				 $posts4 = array(
							'january_month_activity' => $january_month_workout_activity,
							'february_month_activity' => $february_month_workout_activity,
							'march_month_activity' => $march_month_workout_activity,
							'april_month_activity' => $april_month_workout_activity,
							'may_month_activity' => $may_month_workout_activity,
							'june_month_activity' => $june_month_workout_activity,
							'july_month_activity' => $july_month_workout_activity,
							'august_month_activity' => $august_month_workout_activity,
							'september_month_activity' => $september_month_workout_activity,
							'october_month_activity' => $october_month_workout_activity,
							'november_month_activity' => $november_month_workout_activity,
							'december_month_activity' => $december_month_workout_activity,
					);
				
				// // sport Activity Monthly count
				// $january_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$january_first_date,$january_last_date);
				// $february_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$february_first_date,$february_last_date);
				// $march_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$march_first_date,$march_last_date);
				// $april_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$april_first_date,$april_last_date);
				// $may_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$may_first_date,$may_last_date);
				// $june_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$june_first_date,$june_last_date);
				// $july_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$july_first_date,$july_last_date);
				// $august_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$august_first_date,$august_last_date);
				// $september_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$september_first_date,$september_last_date);
				// $october_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$october_first_date,$october_last_date);
				// $november_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$november_first_date,$november_last_date);
				// $december_month_sport_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'2',$december_first_date,$december_last_date);

				//  $posts5 = array(
				// 			'january_month_activity' => $january_month_sport_activity,
				// 			'february_month_activity' => $february_month_sport_activity,
				// 			'march_month_activity' => $march_month_sport_activity,
				// 			'april_month_activity' => $april_month_sport_activity,
				// 			'may_month_activity' => $may_month_sport_activity,
				// 			'june_month_activity' => $june_month_sport_activity,
				// 			'july_month_activity' => $july_month_sport_activity,
				// 			'august_month_activity' => $august_month_sport_activity,
				// 			'september_month_activity' => $september_month_sport_activity,
				// 			'october_month_activity' => $october_month_sport_activity,
				// 			'november_month_activity' => $november_month_sport_activity,
				// 			'december_month_activity' => $december_month_sport_activity,
				// 	);

				 // mind_and_body Activity Monthly count
				$january_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$january_first_date,$january_last_date);
				$february_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$february_first_date,$february_last_date);
				$march_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$march_first_date,$march_last_date);
				$april_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$april_first_date,$april_last_date);
				$may_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$may_first_date,$may_last_date);
				$june_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$june_first_date,$june_last_date);
				$july_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$july_first_date,$july_last_date);
				$august_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$august_first_date,$august_last_date);
				$september_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$september_first_date,$september_last_date);
				$october_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$october_first_date,$october_last_date);
				$november_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$november_first_date,$november_last_date);
				$december_month_mind_and_body_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'3',$december_first_date,$december_last_date);

				 $posts6 = array(
							'january_month_activity' => $january_month_mind_and_body_activity,
							'february_month_activity' => $february_month_mind_and_body_activity,
							'march_month_activity' => $march_month_mind_and_body_activity,
							'april_month_activity' => $april_month_mind_and_body_activity,
							'may_month_activity' => $may_month_mind_and_body_activity,
							'june_month_activity' => $june_month_mind_and_body_activity,
							'july_month_activity' => $july_month_mind_and_body_activity,
							'august_month_activity' => $august_month_mind_and_body_activity,
							'september_month_activity' => $september_month_mind_and_body_activity,
							'october_month_activity' => $october_month_mind_and_body_activity,
							'november_month_activity' => $november_month_mind_and_body_activity,
							'december_month_activity' => $december_month_mind_and_body_activity,
					);

				 // others Activity Monthly count
				$january_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$january_first_date,$january_last_date);
				$february_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$february_first_date,$february_last_date);
				$march_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$march_first_date,$march_last_date);
				$april_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$april_first_date,$april_last_date);
				$may_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$may_first_date,$may_last_date);
				$june_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$june_first_date,$june_last_date);
				$july_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$july_first_date,$july_last_date);
				$august_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$august_first_date,$august_last_date);
				$september_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$september_first_date,$september_last_date);
				$october_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$october_first_date,$october_last_date);
				$november_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$november_first_date,$november_last_date);
				$december_month_others_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'4',$december_first_date,$december_last_date);

				 $posts7 = array(
							'january_month_activity' => $january_month_others_activity,
							'february_month_activity' => $february_month_others_activity,
							'march_month_activity' => $march_month_others_activity,
							'april_month_activity' => $april_month_others_activity,
							'may_month_activity' => $may_month_others_activity,
							'june_month_activity' => $june_month_others_activity,
							'july_month_activity' => $july_month_others_activity,
							'august_month_activity' => $august_month_others_activity,
							'september_month_activity' => $september_month_others_activity,
							'october_month_activity' => $october_month_others_activity,
							'november_month_activity' => $november_month_others_activity,
							'december_month_activity' => $december_month_others_activity,
					);

				  // Health Activity Monthly count
				$january_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$january_first_date,$january_last_date);
				$february_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$february_first_date,$february_last_date);
				$march_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$march_first_date,$march_last_date);
				$april_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$april_first_date,$april_last_date);
				$may_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$may_first_date,$may_last_date);
				$june_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$june_first_date,$june_last_date);
				$july_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$july_first_date,$july_last_date);
				$august_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$august_first_date,$august_last_date);
				$september_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$september_first_date,$september_last_date);
				$october_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$october_first_date,$october_last_date);
				$november_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$november_first_date,$november_last_date);
				$december_month_health_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'6',$december_first_date,$december_last_date);

				 $posts8 = array(
							'january_month_activity' => $january_month_health_activity,
							'february_month_activity' => $february_month_health_activity,
							'march_month_activity' => $march_month_health_activity,
							'april_month_activity' => $april_month_health_activity,
							'may_month_activity' => $may_month_health_activity,
							'june_month_activity' => $june_month_health_activity,
							'july_month_activity' => $july_month_health_activity,
							'august_month_activity' => $august_month_health_activity,
							'september_month_activity' => $september_month_health_activity,
							'october_month_activity' => $october_month_health_activity,
							'november_month_activity' => $november_month_health_activity,
							'december_month_activity' => $december_month_health_activity,
					);

				 // Experiences Activity Monthly count
				$january_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$january_first_date,$january_last_date);
				$february_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$february_first_date,$february_last_date);
				$march_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$march_first_date,$march_last_date);
				$april_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$april_first_date,$april_last_date);
				$may_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$may_first_date,$may_last_date);
				$june_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$june_first_date,$june_last_date);
				$july_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$july_first_date,$july_last_date);
				$august_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$august_first_date,$august_last_date);
				$september_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$september_first_date,$september_last_date);
				$october_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$october_first_date,$october_last_date);
				$november_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$november_first_date,$november_last_date);
				$december_month_experiences_activity = $this->user_model->monthly_category_wise_total_activity($all_records->id,'12',$december_first_date,$december_last_date);

				 $posts9 = array(
							'january_month_activity' => $january_month_experiences_activity,
							'february_month_activity' => $february_month_experiences_activity,
							'march_month_activity' => $march_month_experiences_activity,
							'april_month_activity' => $april_month_experiences_activity,
							'may_month_activity' => $may_month_experiences_activity,
							'june_month_activity' => $june_month_experiences_activity,
							'july_month_activity' => $july_month_experiences_activity,
							'august_month_activity' => $august_month_experiences_activity,
							'september_month_activity' => $september_month_experiences_activity,
							'october_month_activity' => $october_month_experiences_activity,
							'november_month_activity' => $november_month_experiences_activity,
							'december_month_activity' => $december_month_experiences_activity,
					);
				
				if(!empty($all_records))
				{
					
						
					if($all_records->avatar){
						$avatar = base_url('media/'.$all_records->avatar);
					}else{
						$avatar = base_url('media/upload-image.jpeg');
					}

						$posts1 = array(
								'id' => $all_records->id,
								'first_name' => $all_records->first_name,
								'last_name' => $all_records->last_name,
								'full_name' => $all_records->full_name,
								'avatar' => $avatar,
								'email' => $all_records->email,
								'created_at' => $all_records->created_at,
								'updated_at' => $all_records->updated_at,
								'phone_number' => $all_records->phone_number,
								'is_notified' => $all_records->is_notified,
								'status' => $all_records->status,
								
								// 'workout_days_this_week'=>$workout_activity_weekly.'/'.'7',
								// 'workout_days_this_month'=>$workout_activity_monthly.'/'.$total_day_this_month,
								// 'workout_days_this_year'=>$workout_activity_yearly.'/'.$total_day_this_year,

								'activity_streak'=>$all_records->current_streak.'/'.$all_records->highest_streak,

								'workout_days_this_week'=>$workout_activity_weekly,
								'workout_days_this_month'=>$workout_activity_monthly,
								'workout_days_this_year'=>$workout_activity_yearly,


								'calories_this_week'=>$calories_weekly,
								'calories_this_month'=>$calories_monthly,
								'calories_this_year'=>$calories_yearly,

								'steps_this_week'=>$step_weekly,
								'steps_this_month'=>$step_monthly,
								'steps_this_year'=>$step_yearly,

								'total_activity'=>$total_activity,
								'total_activity_monthly_graph_data'=>$posts2,
								
								'total_workout_and_sport_activity'=>$total_combile_activity,
								'total_workout_and_sport_activity_monthly_graph_data'=>$posts4,
								

								// 'total_sports_activity'=>$total_sports_activity,
								// 'total_sports_activity_monthly_graph_data'=>$posts5,

								'total_min_and_body_activity'=>$total_min_and_body_activity,
								'total_mind_and_body_activity_monthly_graph_data'=>$posts6,

								'total_other_activity'=>$total_other_activity,
								'total_other_activity_monthly_graph_data'=>$posts7,

								// 'total_health_activity'=>$total_health_activity,
								// 'total_health_activity_monthly_graph_data'=>$posts8,

								'total_experiences_activity'=>$total_experiences_activity,
								'total_experiences_activity_monthly_graph_data'=>$posts9,

								// 'total_health_activity'=>$total_health_activity,

								// 'total_experiences_activity'=>$total_experiences_activity,
								
								'total_activity_list_data'=>$posts3,

							);
						$posts = array(
							'status' => 'success',
							'data' => $posts1
						);
					}

					

				
				
				 else{
					$posts = array(
							'status' => 'fail',
							'data' => 'No record found.'
					);
				}	
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function profilesingleactivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) {
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				$activity_id = $formdata['activity_id'];

				$all_records = $this->user_model->useractivitybyactivityid($login_user_data->id,$activity_id);
				
				if(!empty($all_records))
				{
					
					foreach($all_records as $all_record) {

						$get_activity_by_dates = $this->user_model->get_single_activity_by_date($all_record->start_date,$login_user_data->id,$activity_id);
						
						foreach($get_activity_by_dates as $get_activity_by_date) {


							$get_activity_by_activityid = $this->user_model->get_activity_by_activityid($get_activity_by_date->activity_id);
							
							$get_activity_icon_by_activity_icon = $this->user_model->geticonname($get_activity_by_activityid[0]->activity_icon);
							$get_category_color = $this->user_model->get_category_color($get_activity_by_activityid[0]->category_id);
							

							 

							if(!empty($get_activity_icon_by_activity_icon)){
								$activity_icon = base_url('media/icon/'.$get_activity_icon_by_activity_icon[0]->icon);
							}else{
								$activity_icon = base_url('media/no-image.png');
							}


							$posts2[] = array(
								'id'=>$get_activity_by_activityid[0]->id,
								'activity_unique_id'=>$get_activity_by_date->id,
								'name'=>$get_activity_by_activityid[0]->name,
								'icon'=>$activity_icon,
								'category_color'=>$get_category_color[0]->color,
								'distance'=>$get_activity_by_date->distance,
								'measurement_id'=>$get_activity_by_date->measurement_id,
								'duration'=>$get_activity_by_date->duration,
								'comment'=>$get_activity_by_date->comment,
								'pace'=>$get_activity_by_date->pace,
								'classification_id'=>$get_activity_by_date->classification_id,
								'sub_activity'=>$get_activity_by_date->sub_activity,
								'start_date'=>$get_activity_by_date->start_date,
								'end_date'=>$get_activity_by_date->end_date,

								
							);
						}

							$posts1[] = array(
								'date'=>$all_record->start_date,
								'activity' => $posts2,
								);
							$posts2 =[];

					}

					// week data
					$monday = strtotime("last monday");
					$monday = date('w', $monday)==date('w') ? $monday+7*86400 : $monday;
					$sunday = strtotime(date("Y-m-d",$monday)." +6 days");
					$this_week_sd = date("Y-m-d",$monday);
					$this_week_ed = date("Y-m-d",$sunday);
					$total_week_distance_single_activity = $this->user_model->total_week_distance_single_activity($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed);
					$total_week_duration_single_activity = $this->user_model->total_week_duration_single_activity($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed);

					




					$monday_day = date('Y-m-d', strtotime('monday this week'));
					$tuesday_day = date('Y-m-d', strtotime('tuesday this week'));
					$wednesday_day = date('Y-m-d', strtotime('wednesday this week'));
					$thursday_day = date('Y-m-d', strtotime('thursday this week'));
					$friday_day = date('Y-m-d', strtotime('friday this week'));
					$saturday_day = date('Y-m-d', strtotime('saturday this week'));
					$sunday_day = date('Y-m-d', strtotime('sunday this week'));

					$monday_graph_mi = $this->user_model->week_graph_mi($login_user_data->id,$activity_id,$monday_day);
					$tuesday_graph_mi = $this->user_model->week_graph_mi($login_user_data->id,$activity_id,$tuesday_day);
					$wednesday_graph_mi = $this->user_model->week_graph_mi($login_user_data->id,$activity_id,$wednesday_day);
					$thursday_graph_mi = $this->user_model->week_graph_mi($login_user_data->id,$activity_id,$thursday_day);
					$friday_graph_mi = $this->user_model->week_graph_mi($login_user_data->id,$activity_id,$friday_day);
					$saturday_graph_mi = $this->user_model->week_graph_mi($login_user_data->id,$activity_id,$saturday_day);
					$sunday_graph_mi = $this->user_model->week_graph_mi($login_user_data->id,$activity_id,$sunday_day);

					//Total week subactivity

					$all_activity_subactivities = $this->user_model->all_activity_subactivity($activity_id);

					$posts11=[];

					foreach($all_activity_subactivities as $all_activity_subactivity)
					 {
						
						if($all_activity_subactivity->sub_activity_icon){
							$subactivity_icon = base_url('media/icon/'.$all_activity_subactivity->sub_activity_icon);
						}else{
							$subactivity_icon = base_url('media/no-image.png');
						}

						
					$total_count_subactivity_weekly = $this->user_model->total_count_subactivity_weekly($login_user_data->id,$all_activity_subactivity->id,$this_week_sd,$this_week_ed);


						
						if(!empty($total_count_subactivity_weekly)){
							$posts11[] = array(
							'id' => $all_activity_subactivity->id,
							'name' => $all_activity_subactivity->name,
							'subactivity_icon' => $subactivity_icon,
							'total_count_subactivity'=>$total_count_subactivity_weekly
							
							);	
						}

					}

					
					
					$posts4 = array(
								'monday_graph_mi'=>$monday_graph_mi[0]->distance,
								'tuesday_graph_mi'=>$tuesday_graph_mi[0]->distance,
								'wednesday_graph_mi'=>$wednesday_graph_mi[0]->distance,
								'thursday_graph_mi'=>$thursday_graph_mi[0]->distance,
								'friday_graph_mi'=>$friday_graph_mi[0]->distance,
								'saturday_graph_mi'=>$saturday_graph_mi[0]->distance,
								'sunday_graph_mi'=>$sunday_graph_mi[0]->distance,
								
								);

					// Weekly Avg Pace
					$avg_pace_single_activity_weekly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'pace');
					$count_pace_single_activity_weekly = $this->user_model->activity_count($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'pace');
					if(!empty($avg_pace_single_activity_weekly[0]->pace)){
						$ave_pace_weekly =  $avg_pace_single_activity_weekly[0]->pace / $count_pace_single_activity_weekly;
					}else{
						$ave_pace_weekly = 0;
					}

					// Weekly Avg distance
					$avg_distance_single_activity_weekly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'distance');
					$count_distance_single_activity_weekly = $this->user_model->activity_count($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'distance');
					if(!empty($avg_distance_single_activity_weekly[0]->distance)){
						$ave_distance_weekly =  $avg_distance_single_activity_weekly[0]->distance / $count_distance_single_activity_weekly;
					}else{
						$ave_distance_weekly = 0;
					}

					// Weekly Avg duration
					$avg_duration_single_activity_weekly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'duration');
					$count_duration_single_activity_weekly = $this->user_model->activity_count($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'duration');
					if(!empty($avg_duration_single_activity_weekly[0]->duration)){
						$ave_duration_weekly =  $avg_duration_single_activity_weekly[0]->duration / $count_duration_single_activity_weekly;
					}else{
						$ave_duration_weekly = 0;
					}

					// Weekly Avg calories
					$avg_calories_single_activity_weekly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'calories');
					$count_calories_single_activity_weekly = $this->user_model->activity_count($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'calories');
					if(!empty($avg_calories_single_activity_weekly[0]->calories)){
						$ave_calories_weekly =  $avg_calories_single_activity_weekly[0]->calories / $count_calories_single_activity_weekly;
						$total_kcal_weekly = $avg_calories_single_activity_weekly[0]->calories;
					}else{
						$ave_calories_weekly = 0;
						$total_kcal_weekly = 0;
					}

					// Weekly Avg step_count
					$avg_step_count_single_activity_weekly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'step_count');
					$count_step_count_single_activity_weekly = $this->user_model->activity_count($login_user_data->id,$activity_id,$this_week_sd,$this_week_ed,'step_count');
					if(!empty($avg_step_count_single_activity_weekly[0]->step_count)){
						$ave_step_count_weekly =  $avg_step_count_single_activity_weekly[0]->step_count / $count_step_count_single_activity_weekly;
					}else{
						$ave_step_count_weekly = 0;
					}




					$posts3 = array(
							'total_distance'=>round($total_week_distance_single_activity[0]->distance,2),
							'total_duration'=>round($total_week_duration_single_activity[0]->duration,2),
							'total_kelories'=>round($total_kcal_weekly,2),
							'graph_data'=>$posts4,
							'subactivity_data'=>$posts11,
							'ave_pace'=>round($ave_pace_weekly,2),
							'ave_distance'=>round($ave_distance_weekly,2),
							'ave_duration'=>round($ave_duration_weekly,2),
							'ave_calories'=>round($ave_calories_weekly,2),
							'ave_count'=>round($ave_step_count_weekly,2),
							'tbd_metric'=>"0",
							);
				



					// workout activity Monthly

					$fDate = date("Y-m-d",strtotime("first day of this month"));
					$lDate = date("Y-m-d",strtotime("last day of this month"));
					$total_monthly_distance_single_activity = $this->user_model->total_monthly_distance_single_activity($login_user_data->id,$activity_id,$fDate,$lDate);
					$total_monthly_duration_single_activity = $this->user_model->total_monthly_duration_single_activity($login_user_data->id,$activity_id,$fDate,$lDate);


					// monthly Total Actitvity
				 $current_year = $year = date("Y");
				 $january_first_date = date('Y-m-d',strtotime('first day of january'.$current_year));
				 $january_last_date = date('Y-m-d',strtotime('last day of january'.$current_year));
				 $january_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$january_first_date,$january_last_date);

				 $february_first_date = date('Y-m-d',strtotime('first day of february'.$current_year));
				 $february_last_date = date('Y-m-d',strtotime('last day of february'.$current_year));
				 $february_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$february_first_date,$february_last_date);

				 $march_first_date = date('Y-m-d',strtotime('first day of march'.$current_year));
				 $march_last_date = date('Y-m-d',strtotime('last day of march'.$current_year));
				 $march_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$march_first_date,$march_last_date);


				 $april_first_date = date('Y-m-d',strtotime('first day of april'.$current_year));
				 $april_last_date = date('Y-m-d',strtotime('last day of april'.$current_year));
				 $april_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$april_first_date,$april_last_date);

				 $may_first_date = date('Y-m-d',strtotime('first day of may'.$current_year));
				 $may_last_date = date('Y-m-d',strtotime('last day of may'.$current_year));
				 $may_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$may_first_date,$may_last_date);

				 $june_first_date = date('Y-m-d',strtotime('first day of june'.$current_year));
				 $june_last_date = date('Y-m-d',strtotime('last day of june'.$current_year));
				 $june_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$june_first_date,$june_last_date);

				 $july_first_date = date('Y-m-d',strtotime('first day of july'.$current_year));
				 $july_last_date = date('Y-m-d',strtotime('last day of july'.$current_year));
				 $july_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$july_first_date,$july_last_date);

				 $august_first_date = date('Y-m-d',strtotime('first day of august'.$current_year));
				 $august_last_date = date('Y-m-d',strtotime('last day of august'.$current_year));
				 $august_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$august_first_date,$august_last_date);

				 $september_first_date = date('Y-m-d',strtotime('first day of september'.$current_year));
				 $september_last_date = date('Y-m-d',strtotime('last day of september'.$current_year));
				 $september_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$september_first_date,$september_last_date);

				 $october_first_date = date('Y-m-d',strtotime('first day of october'.$current_year));
				 $october_last_date = date('Y-m-d',strtotime('last day of october'.$current_year));
				 $october_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$october_first_date,$october_last_date);

				 $november_first_date = date('Y-m-d',strtotime('first day of november'.$current_year));
				 $november_last_date = date('Y-m-d',strtotime('last day of november'.$current_year));
				 $november_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$november_first_date,$november_last_date);

				 $december_first_date = date('Y-m-d',strtotime('first day of december'.$current_year));
				 $december_last_date = date('Y-m-d',strtotime('last day of december'.$current_year));
				 $december_month_activity = $this->user_model->monthly_total_single_activity($login_user_data->id,$activity_id,$december_first_date,$december_last_date);

				 $posts6 = array(
							'january_month_activity' => $january_month_activity,
							'february_month_activity' => $february_month_activity,
							'march_month_activity' => $march_month_activity,
							'april_month_activity' => $april_month_activity,
							'may_month_activity' => $may_month_activity,
							'june_month_activity' => $june_month_activity,
							'july_month_activity' => $july_month_activity,
							'august_month_activity' => $august_month_activity,
							'september_month_activity' => $september_month_activity,
							'october_month_activity' => $october_month_activity,
							'november_month_activity' => $november_month_activity,
							'december_month_activity' => $december_month_activity,
					);

				 //Total Month subactivity

					$all_activity_subactivities = $this->user_model->all_activity_subactivity($activity_id);
					$posts22=[];
					foreach($all_activity_subactivities as $all_activity_subactivity)
					 {
						
						if($all_activity_subactivity->sub_activity_icon){
							$subactivity_icon = base_url('media/icon/'.$all_activity_subactivity->sub_activity_icon);
						}else{
							$subactivity_icon = base_url('media/no-image.png');
						}

						$total_count_subactivity_monthly = $this->user_model->total_count_subactivity_monthly($login_user_data->id,$all_activity_subactivity->id,$fDate,$lDate);

						if(!empty($total_count_subactivity_monthly)){
							$posts22[] = array(
							'id' => $all_activity_subactivity->id,
							'name' => $all_activity_subactivity->name,
							'subactivity_icon' => $subactivity_icon,
							'total_count_subactivity'=>$total_count_subactivity_monthly
							
							);	
						}

					}

					// Weekly Avg Pace
					$avg_pace_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'pace');
					$count_pace_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'pace');
					if(!empty($avg_pace_single_activity_monthly[0]->pace)){
						$ave_pace_monthly =  $avg_pace_single_activity_monthly[0]->pace / $count_pace_single_activity_monthly;
					}else{
						$ave_pace_monthly = 0;
					}

					// monthly Avg distance
					$avg_distance_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'distance');
					$count_distance_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'distance');
					if(!empty($avg_distance_single_activity_monthly[0]->distance)){
						$ave_distance_monthly =  $avg_distance_single_activity_monthly[0]->distance / $count_distance_single_activity_monthly;
					}else{
						$ave_distance_monthly = 0;
					}

					// monthly Avg duration
					$avg_duration_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'duration');
					$count_duration_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'duration');
					if(!empty($avg_duration_single_activity_monthly[0]->duration)){
						$ave_duration_monthly =  $avg_duration_single_activity_monthly[0]->duration / $count_duration_single_activity_monthly;
					}else{
						$ave_duration_monthly = 0;
					}

					// monthly Avg calories
					$avg_calories_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'calories');
					$count_calories_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'calories');
					if(!empty($avg_calories_single_activity_monthly[0]->calories)){
						$ave_calories_monthly =  $avg_calories_single_activity_monthly[0]->calories / $count_calories_single_activity_monthly;
						$total_kcal_monthly = $avg_calories_single_activity_monthly[0]->calories;
					}else{
						$ave_calories_monthly = 0;
						$total_kcal_monthly = 0;
					}

					// monthly Avg step_count
					$avg_step_count_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'step_count');
					$count_step_count_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'step_count');
					if(!empty($avg_step_count_single_activity_monthly[0]->step_count)){
						$ave_step_count_monthly =  $avg_step_count_single_activity_monthly[0]->step_count / $count_step_count_single_activity_monthly;
					}else{
						$ave_step_count_monthly = 0;
					}


						
					$posts5 = array(
							'total_distance'=>round($total_monthly_distance_single_activity[0]->distance,2),
							'total_duration'=>round($total_monthly_duration_single_activity[0]->duration,2),
							'total_kelories'=>round($total_kcal_monthly,2),
							'graph_data'=>$posts6,
							'subactivity_data'=>$posts22,
							'ave_pace'=>round($ave_pace_monthly,2),
							'ave_distance'=>round($ave_distance_monthly,2),
							'ave_duration'=>round($ave_duration_monthly,2),
							'ave_calories'=>round($ave_calories_monthly,2),
							'ave_count'=>round($ave_step_count_monthly,2),
							'tbd_metric'=>"0",
							);
					
					// Year activity

					$fyearDate = date("Y-m-d",strtotime("first day of january this year"));
					$lyearDate =  date("Y-m-d",strtotime("last day of december this year"));

					$total_year_distance_single_activity = $this->user_model->total_monthly_distance_single_activity($login_user_data->id,$activity_id,$fyearDate,$lyearDate);
					$total_year_duration_single_activity = $this->user_model->total_monthly_duration_single_activity($login_user_data->id,$activity_id,$fyearDate,$lyearDate);

					 //Total Month subactivity

					$all_activity_subactivities = $this->user_model->all_activity_subactivity($activity_id);
					$posts33=[];
					foreach($all_activity_subactivities as $all_activity_subactivity)
					 {
						
						if($all_activity_subactivity->sub_activity_icon){
							$subactivity_icon = base_url('media/icon/'.$all_activity_subactivity->sub_activity_icon);
						}else{
							$subactivity_icon = base_url('media/no-image.png');
						}

						 $total_count_subactivity_yearly = $this->user_model->total_count_subactivity_yearly($login_user_data->id,$all_activity_subactivity->id,$fyearDate,$lyearDate);

						if(!empty($total_count_subactivity_yearly)){
							$posts33[] = array(
							'id' => $all_activity_subactivity->id,
							'name' => $all_activity_subactivity->name,
							'subactivity_icon' => $subactivity_icon,
							'total_count_subactivity'=>$total_count_subactivity_yearly
							
							);	
						}

					}

					// Weekly Avg Pace
					$avg_pace_single_activity_yearly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'pace');
					$count_pace_single_activity_yearly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'pace');
					if(!empty($avg_pace_single_activity_yearly[0]->pace)){
						$ave_pace_yearly =  $avg_pace_single_activity_yearly[0]->pace / $count_pace_single_activity_yearly;
					}else{
						$ave_pace_yearly = 0;
					}

					// yearly Avg distance
					$avg_distance_single_activity_yearly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'distance');
					$count_distance_single_activity_yearly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'distance');
					if(!empty($avg_distance_single_activity_yearly[0]->distance)){
						$ave_distance_yearly =  $avg_distance_single_activity_yearly[0]->distance / $count_distance_single_activity_yearly;
					}else{
						$ave_distance_yearly = 0;
					}

					// yearly Avg duration
					$avg_duration_single_activity_yearly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'duration');
					$count_duration_single_activity_yearly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'duration');
					if(!empty($avg_duration_single_activity_yearly[0]->duration)){
						$ave_duration_yearly =  $avg_duration_single_activity_yearly[0]->duration / $count_duration_single_activity_yearly;
					}else{
						$ave_duration_yearly = 0;
					}

					// yearly Avg calories
					$avg_calories_single_activity_yearly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'calories');
					$count_calories_single_activity_yearly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'calories');
					if(!empty($avg_calories_single_activity_yearly[0]->calories)){
						$ave_calories_yearly =  $avg_calories_single_activity_yearly[0]->calories / $count_calories_single_activity_yearly;
						$total_kcal_yearly=$avg_calories_single_activity_yearly[0]->calories;
					}else{
						$ave_calories_yearly = 0;
						$total_kcal_yearly=0;
					}

					// yearly Avg step_count
					$avg_step_count_single_activity_yearly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'step_count');
					$count_step_count_single_activity_yearly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fyearDate,$lyearDate,'step_count');
					if(!empty($avg_step_count_single_activity_yearly[0]->step_count)){
						$ave_step_count_yearly =  $avg_step_count_single_activity_yearly[0]->step_count / $count_step_count_single_activity_yearly;
					}else{
						$ave_step_count_yearly = 0;
					}

				
						
					$posts7 = array(
							'total_distance'=>round($total_year_distance_single_activity[0]->distance,2),
							'total_duration'=>round($total_year_duration_single_activity[0]->duration,2),
							'total_kelories'=>round($total_kcal_yearly,2),
							'graph_data'=>$posts6,
							'subactivity_data'=>$posts33,
							'ave_pace'=>round($ave_pace_monthly,2),
							'ave_distance'=>round($ave_distance_yearly,2),
							'ave_duration'=>round($ave_duration_yearly,2),
							'ave_calories'=>round($ave_calories_yearly,2),
							'ave_count'=>round($ave_step_count_yearly,2),
							'tbd_metric'=>"0",
							);
					
					

					$posts = array(
							'status' => 'success',
							'calender_data' => $posts1,
							'weekly_data'=>$posts3,
							'month_data'=>$posts5,
							'year_data'=>$posts7
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'No activity found.'
					);
				}	
				
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function profileSingleActivityMonthData()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) {
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				
				$activity_id = $formdata['activity_id'];
				$month_start_date = $formdata['month_start_date'];
				$month_end_date = $formdata['month_end_date'];

				$all_records = $this->user_model->useractivitybyactivityid($login_user_data->id,$activity_id);
				
				if(!empty($all_records))
				{
					
					

					
					// workout activity Monthly

					$fDate = $month_start_date;
					$lDate = $month_end_date;
					

				 //Total Month subactivity

					$all_activity_subactivities = $this->user_model->all_activity_subactivity($activity_id);
					$posts22=[];
					foreach($all_activity_subactivities as $all_activity_subactivity)
					 {
						
						if($all_activity_subactivity->sub_activity_icon){
							$subactivity_icon = base_url('media/icon/'.$all_activity_subactivity->sub_activity_icon);
						}else{
							$subactivity_icon = base_url('media/no-image.png');
						}

						$total_count_subactivity_monthly = $this->user_model->total_count_subactivity_monthly($login_user_data->id,$all_activity_subactivity->id,$fDate,$lDate);

						if(!empty($total_count_subactivity_monthly)){
							$posts22[] = array(
							'id' => $all_activity_subactivity->id,
							'name' => $all_activity_subactivity->name,
							'subactivity_icon' => $subactivity_icon,
							'total_count_subactivity'=>$total_count_subactivity_monthly
							
							);	
						}

					}

					// Weekly Avg Pace
					$avg_pace_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'pace');
					$count_pace_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'pace');
					if(!empty($avg_pace_single_activity_monthly[0]->pace)){
						$ave_pace_monthly =  $avg_pace_single_activity_monthly[0]->pace / $count_pace_single_activity_monthly;
					}else{
						$ave_pace_monthly = 0;
					}

					// monthly Avg distance
					$avg_distance_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'distance');
					$count_distance_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'distance');
					if(!empty($avg_distance_single_activity_monthly[0]->distance)){
						$ave_distance_monthly =  $avg_distance_single_activity_monthly[0]->distance / $count_distance_single_activity_monthly;
					}else{
						$ave_distance_monthly = 0;
					}

					// monthly Avg duration
					$avg_duration_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'duration');
					$count_duration_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'duration');
					if(!empty($avg_duration_single_activity_monthly[0]->duration)){
						$ave_duration_monthly =  $avg_duration_single_activity_monthly[0]->duration / $count_duration_single_activity_monthly;
					}else{
						$ave_duration_monthly = 0;
					}

					// monthly Avg calories
					$avg_calories_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'calories');
					$count_calories_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'calories');
					if(!empty($avg_calories_single_activity_monthly[0]->calories)){
						$ave_calories_monthly =  $avg_calories_single_activity_monthly[0]->calories / $count_calories_single_activity_monthly;
						$total_kcal_monthly = $avg_calories_single_activity_monthly[0]->calories;
					}else{
						$ave_calories_monthly = 0;
						$total_kcal_monthly = 0;
					}

					// monthly Avg step_count
					$avg_step_count_single_activity_monthly = $this->user_model->activity_avg($login_user_data->id,$activity_id,$fDate,$lDate,'step_count');
					$count_step_count_single_activity_monthly = $this->user_model->activity_count($login_user_data->id,$activity_id,$fDate,$lDate,'step_count');
					if(!empty($avg_step_count_single_activity_monthly[0]->step_count)){
						$ave_step_count_monthly =  $avg_step_count_single_activity_monthly[0]->step_count / $count_step_count_single_activity_monthly;
					}else{
						$ave_step_count_monthly = 0;
					}


						
					$posts5 = array(
							
							'subactivity_data'=>$posts22,
							'ave_pace'=>round($ave_pace_monthly,2),
							'ave_distance'=>round($ave_distance_monthly,2),
							'ave_duration'=>round($ave_duration_monthly,2),
							'ave_calories'=>round($ave_calories_monthly,2),
							'ave_count'=>round($ave_step_count_monthly,2),
							'tbd_metric'=>"0",
							);
					
					
					$posts = array(
							'status' => 'success',
							'data'=>$posts5,
							
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'No activity found.'
					);
				}	
				
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function allcategory()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$login_user_data = $this->user_model->loginDataByToken($token);
				$all_records = $this->user_model->allcategory();
				$all_records_total = $this->user_model->getTotalRecord('categories');

				if(!empty($all_records)){
					foreach($all_records as $all_record)
					 {

						$activity_datas = $this->user_model->all_activity($all_record->id);
							foreach($activity_datas as $activity_data)
							 {
								if($activity_data->new_activity_icon){
									$activity_icon = base_url('media/icon/'.$activity_data->new_activity_icon);
								}else{
									$activity_icon = base_url('media/no-image.png');
								}

								$check_favorite = $this->user_model->check_favorite($login_user_data->id,$activity_data->id);

								$check_hidden = $this->user_model->check_hidden($login_user_data->id,$activity_data->id);
								

								// 0 
								// die;
								if(!empty($check_favorite)){
									$favorite_status=$check_favorite[0]->status;
								}else{
									$favorite_status=0;
								}

								if(!empty($check_hidden)){
									$hidden_status=$check_hidden[0]->is_hidden;
								}else{
									$hidden_status='False';
								}


								$posts3[] = array(
									'id' => $activity_data->id,
									'name' => $activity_data->name,
									'activity_icon' => $activity_icon,
									'created_at'=>$activity_data->created_at,
									'updated_at' => $activity_data->updated_at,
									'category_id' => $activity_data->category_id,
									'favorite_activity'=>$favorite_status,
									'most_popular'=>$activity_data->most_popular,
									'activity_is_hidden'=>$hidden_status,
									
								);

							}

						
							if($all_record->icon){
								$icon = base_url('media/icon/'.$all_record->icon);
							}else{
								$icon = base_url('media/no-image.png');
							}
							
							$posts1[] = array(
									'id' => $all_record->id,
									'name' => $all_record->name,
									'color' => $all_record->color,
									'created_at'=>$all_record->created_at,
									'updated_at' => $all_record->updated_at,
									'cat_key' => $all_record->cat_key,
									'image' => $all_record->image,
									'order_by' => $all_record->order_by,
									'icon'=>$icon,
									'activity'=>$posts3,

									
								);
							
							$posts3 =[];
						}
					$posts = array(
						'status' => 'success',
						'recordsTotal' => $all_records_total,
						'data' => $posts1
					);
					// die;
				}

				
				
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function allfavoriteactivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$login_user_data = $this->user_model->loginDataByToken($token);

				

				$all_records = $this->user_model->allfavoriteactivity($login_user_data->id);

			
				if(!empty($all_records))
				{
					
					foreach($all_records as $all_record) {

						$activity_icon = $this->user_model->geticonname($all_record->activity_icon);
						
						if($activity_icon){
								$activity_icon = base_url('media/icon/'.$activity_icon[0]->icon);
							}else{
								$activity_icon = base_url('media/no-image.png');
							}

							$posts1[] = array(
								'id' => $all_record->id,
								'name' => $all_record->activity_name,
								'activity_icon' => $activity_icon,
								'created_at'=>$all_record->created_at,
								'user_id' => $all_record->user_id,
								'activity_id' => $all_record->activity_id,
								'status' => $all_record->status,
								
							);

						
					}
					$posts = array(
							'status' => 'success',
							'data' => $posts1
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'Favorite activity not found.'
					);
				}	
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function addfavoriteactivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			 $isValidToken = $this->user_model->checkToken($token);
			
			
			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				$activity_id = $formdata['activity_id'];
				
				$check_favorite_activity = $this->user_model->check_favorite($login_user_data->id,$formdata['activity_id']);
				
				if(!empty($check_favorite_activity)){
					$shopData = array(
					'status' => $formdata['status'],
					
					);
					$id = $this->user_model->updatefavoriteactivity($check_favorite_activity[0]->id, $shopData);
					
					if($formdata['status'] == 1){
						$posts = array(
						'status' => 'success',
						'data' => 'Add favorite..',
						);
					}else{
						$posts = array(
						'status' => 'success',
						'data' => 'Remove favorite..',
						);
					}

					
					
				}else{
					$shopData = array(
					'user_id' =>$login_user_data->id,
					'activity_id' => $formdata['activity_id'],
					'status' => $formdata['status'],
					'created_at' =>  date('Y-m-d') .' '. date("h:i:s"),
					
					);
					$id  = $this->user_model->addfavoriteactivity($shopData);
					$posts = array(
						'status' => 'success',
						'data' => 'Add favorite..',
					);
				
				}
				

				// if(!empty($id)) {
					
				// 	$posts = array(
				// 		'status' => 'success',
				// 		'data' => 'Favorite activity successfully added...',
				// 	);
				// }else {
				// 	$posts = array(
				// 	'status' => 'fail',
				// 	'data' => 'Favorite not added...',
				// 	);
				// }
				
			
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);	
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function dashboarduseractivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$login_user_data = $this->user_model->loginDataByToken($token);
				$all_records = $this->user_model->useractivity($login_user_data->id);

				date_default_timezone_set('UTC');
				$streak_created = date("Y-m-d");
				$datetime = new DateTime('-1 days');
				$tomorrow = $datetime->format('Y-m-d');


				$get_user_streak_created = $this->user_model->get_user_streak_created($login_user_data->id);
				$dt = new DateTime($get_user_streak_created[0]->streak_created);
				$new_date = $dt->format('Y-m-d');

			

				if(!empty($get_user_streak_created[0]->streak_created)){

					if(($streak_created == $new_date) || ($new_date == $tomorrow)){
						
					}else{
						$shopData = array(
						'current_streak' => 0,
						);
						$update_streak = $this->user_model->update_streak($login_user_data->id,$shopData);
					}
				}
				
				if(!empty($all_records))
				{
					
					foreach($all_records as $all_record) {

						$get_activity_by_dates = $this->user_model->get_activity_by_date($all_record->start_date,$login_user_data->id);

						foreach($get_activity_by_dates as $get_activity_by_date) {


							$get_activity_by_activityid = $this->user_model->get_activity_by_activityid($get_activity_by_date->activity_id);
							$get_activity_icon_by_activity_icon = $this->user_model->geticonname($get_activity_by_activityid[0]->activity_icon);
							$get_category_color = $this->user_model->get_category_color($get_activity_by_activityid[0]->category_id);
							if(!empty($get_activity_icon_by_activity_icon)){
								$activity_icon = base_url('media/icon/'.$get_activity_icon_by_activity_icon[0]->icon);
							}else{
								$activity_icon = base_url('media/no-image.png');
							}



							$devide_sub_activity = explode(",",$get_activity_by_date->sub_activity);
							$posts3 = [];
							$cart = array();
							foreach($devide_sub_activity as $value)
							{
								
								 // echo "id->",$value.',';
								$getSubactivities = $this->user_model->getSubactivityById($value);
								if(!empty($getSubactivities[0]->subactivity_icon)){
										if(!empty($getSubactivities[0]->subactivity_icon)){
											$sub_activity_icon = base_url('media/icon/'.$getSubactivities[0]->subactivity_icon);
										}else{
											$sub_activity_icon = base_url('media/no-image.png');
										}
										$posts3[] = array(
											'id'=>$getSubactivities[0]->id,
											'name'=>$getSubactivities[0]->name,
											'icon'=>$sub_activity_icon,
										);
										$cart[] = $getSubactivities[0]->name;
										$sub_activity_name = implode(' & ',$cart);
								}


							}
							// echo "count".count($posts3);
							
							if(count($posts3) == 0){
								if(!empty($get_activity_by_date->name_override)){
									$name = $get_activity_by_date->name_override;
									$icon= $activity_icon;	
								}else{
									$name = $get_activity_by_activityid[0]->name;
									$icon= $activity_icon;	
								}
								
							}else if(count($posts3) == 1){
								if(!empty($get_activity_by_date->name_override)){
									$name = $get_activity_by_date->name_override.' - '.$sub_activity_name;
									$icon= $activity_icon;	
								}else{
									$name = $get_activity_by_activityid[0]->name.' - '.$sub_activity_name;
									$icon = $sub_activity_icon;	
								}
								
							}else if(count($posts3) > 1){
							
								$name = $sub_activity_name;
								$icon = $activity_icon;
							}

							$posts2[] = array(
								'activity_unique_id'=>$get_activity_by_date->id,
								'activity_id'=>$get_activity_by_activityid[0]->id,
								'name'=>$name,
								'icon'=>$icon,
								'category_color'=>$get_category_color[0]->color,
								'sub_activity'=>$posts3
								
							);
						}

							$posts1[] = array(
								'date'=>$all_record->start_date,
								'activity' => $posts2,
								);
							$posts2 =[];
							$posts3 = [];

						
					}
					

					$posts = array(
							'status' => 'success',
							'data' => $posts1
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'No activity found.'
					);
				}	
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function userdelete()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$login_user_data = $this->user_model->loginDataByToken($token);

				

				$userdelete = $this->user_model->userdelete($login_user_data->id);



				if($userdelete)
				{
				
					$posts = array(
							'status' => 'success',
							'data' => 'User deleted successfully'
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'User not deleted.'
					);
				}	
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function addactivitysubmissions()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);

				 $login_user_data = $this->user_model->loginDataByToken($token);
				 $formdata['activity_name'];
				
				$activity_name = $formdata['activity_name'];
				$category_id = $formdata['category_id'];
				

				$shopData = array(
					'user_id' =>$login_user_data->id,
					'name' => $formdata['activity_name'],
					'category_id' => $formdata['category_id'],
					'created_at' =>  date('Y-m-d') .' '. date("h:i:s"),
					'updated_at' =>  date('Y-m-d') .' '. date("h:i:s"),
					
				);
				$id  = $this->user_model->addactivitysubmissions($shopData);
				
				

				if(!empty($id)) {
					
					$response = array(
						'status' => 'success',
						'data' => 'Activity submission successfully added...',
					);
				}else {
					$response = array(
					'status' => 'fail',
					'data' => 'Activity submission not added...',
					);
				}
				
				$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	
	}

	public function getacvitivitydetials($id)
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$login_user_data = $this->user_model->loginDataByToken($token);
				$all_record = $this->user_model->allactivitybyid($id);
				
				
				if(!empty($all_record))
				{
					
						$indoor_new = '';
						$outdoor_new = '';

					if($all_record[0]->new_activity_icon){
							$activity_icon = base_url('media/icon/'.$all_record[0]->new_activity_icon);
						}else{
							$activity_icon = base_url('media/no-image.png');
						}

						if($all_record[0]->measurement_id){
							 $measurement_id = explode(",",$all_record[0]->measurement_id);

							 foreach($measurement_id as $measurement_value){
								  $getmeasurementbyid = $this->user_model->getmeasurementbyid($measurement_value);
								 
								  $posts5[] = array(
									'id' => $getmeasurementbyid[0]->id,
									'name' => $getmeasurementbyid[0]->name,
									
									);
								}
								// $posts5=[];
						}else{
							$measurement_id = '';
							$posts5=[];
						}
						if($all_record[0]->indoor_outdoor){
							$indoor_outdoor = explode(",",$all_record[0]->indoor_outdoor);
							foreach($indoor_outdoor as $value){
								  if($value == 1){
								  	 $indoor_new = $value;
								  }
								   if($value == 2){
								  	 $outdoor_new = $value;
								  }
								}
						}else{
							$indoor_new = '';
							$outdoor_new = '';
						}

					$getSubactivities = $this->user_model->getSubactivity($all_record[0]->id);


					if(!empty($getSubactivities)){
						foreach($getSubactivities as $getSubactivity)
						 {

						 	if($getSubactivity->subactivity_icon){
									$subactivity_icon = base_url('media/icon/'.$getSubactivity->subactivity_icon);
								}else{
									$subactivity_icon = base_url('media/no-image.png');
								}

								$posts2[] = array(
									'id' => $getSubactivity->id,
									'name' => $getSubactivity->name,
									'subactivity_icon' => $subactivity_icon,
								);
						 }	
						}else{
							$posts2 = [];
						}
					
					$checkactivityfavorite = $this->user_model->checkactivityfavorite($login_user_data->id,$id);
					
					if(!empty($checkactivityfavorite)){
						$favorite = $checkactivityfavorite[0]->status;
					}else{
						$favorite = 0;
					}
					
						$posts1[] = array(
							'id' 								=> $all_record[0]->id,
							'name' 								=> $all_record[0]->name,
							'category_id' 						=> $all_record[0]->category_id,
							'measurement_id' 					=> $measurement_id,
							'measurement_name'					=>$posts5,
							'sub_activity' 						=> $posts2,
							// 'environment_id' 					=> $all_record[0]->environment_id,
							'created_at' 						=> $all_record[0]->created_at,
							'updated_at' 						=> $all_record[0]->updated_at,
							// 'total_duration_slider' 			=> $all_record[0]->total_duration_slider,
							'comments' 							=> $all_record[0]->comments,
							'sub_type' 							=> $all_record[0]->sub_type,
							'Indoor' 							=> $indoor_new,
							'Outdoor' 							=> $outdoor_new,
							'distance_unit_of_measure_picker' 	=> $all_record[0]->distance_unit_of_measure_picker,
							// 'total_distance_slider'				=> $all_record[0]->total_distance_slider,
							'pace' 								=> $all_record[0]->pace,
							'manual_name_override_text_box'		=> $all_record[0]->manual_name_override_text_box,
							'min_distance' 						=> $all_record[0]->min_distance,
							'max_distance' 						=> $all_record[0]->max_distance,
							'min_duration' 						=> $all_record[0]->min_duration,
							'max_duration' 						=> $all_record[0]->max_duration,
							'min_count' 						=> $all_record[0]->min_count,
							'max_count' 						=> $all_record[0]->max_count,
							// 'total_count_slider' 				=> $all_record[0]->total_count_slider,
							// 'manual_count_input' 				=> $all_record[0]->manual_count_input,
							'location_input' 					=> $all_record[0]->location_input,
							'select_date' 						=> $all_record[0]->select_date,
							'most_popular' 						=> $all_record[0]->most_popular,
							'calories' 						=> $all_record[0]->calories,
							
							'activity_icon' 					=> $activity_icon,
							'favorite'           				=>$favorite
							
							
							
						);

					$posts2 =[];
					
					$posts = array(
							'status' => 'success',
							'data' => $posts1
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'Favorite activity not found.'
					);
				}	
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}


	public function updatestytemid()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			 $isValidToken = $this->user_model->checkToken($token);
			
			
			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				$system_id = $formdata['system_id'];

				$shopData = array(
					'measurement_system_id' => $system_id,
				);
				
				$id = $this->user_model->update_system($login_user_data->id, $shopData);

				if(!empty($id)){

					$userData = $this->user_model->getUserData($login_user_data->id);

						$posts = array(
						'status' => 'success',
						'data' => 'System id updated.....',
						'syestem_id'=>$userData->measurement_system_id

						);
					}else{
						$posts = array(
						'status' => 'success',
						'data' => 'Not update system id',
						);
					}
			}else{
			$posts = array(
						'status' => 'fail',
						'data' => 'Invalid token'
				);	
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function deleteuseractivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				$activity_unique_id = $formdata['activity_unique_id'];	
				

				$checkactivity = $this->user_model->checkactivity($login_user_data->id,$activity_unique_id);
				
				
				if($checkactivity)
				{
					$deleteuseractivity = $this->user_model->deleteuseractivity($login_user_data->id,$activity_unique_id);
					$posts = array(
							'status' => 'success',
							'data' => 'Activity deleted successfully'
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'Activity not found...'
					);
				}	
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function getsingleuseractivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				$activity_unique_id = $formdata['activity_unique_id'];
				$getsingleuseractivity = $this->user_model->getsingleuseractivity($activity_unique_id,$login_user_data->id);
				if(!empty($getsingleuseractivity))
				{
						// Get Activity name
						$get_activity_name = $this->user_model->allactivitybyid($getsingleuseractivity[0]->activity_id);
						if(!empty($get_activity_name[0]->new_activity_icon)){
							$activity_icon = base_url('media/icon/'.$get_activity_name[0]->new_activity_icon);
						}else{
							$activity_icon = base_url('media/no-image.png');
						}



						$getpaceunit = $this->user_model->getpaceunit($getsingleuseractivity[0]->activity_id);
						
						if(!empty($getpaceunit[0]->pace)){
							if($getpaceunit[0]->pace == 1){
								$pace_unit1 = 'Dist/Min';
							}
							if($getpaceunit[0]->pace == 2){
								$pace_unit1 = 'Dist/hr';
							}
							if($getpaceunit[0]->pace == 3){
								$pace_unit1 = 'Min/Dist';
							}
						}else{
							$pace_unit1 = '';
						}

						if(!empty($getsingleuseractivity[0]->pace)){
							$pace_unit = $pace_unit1;
						}else{
							$pace_unit = '';
						}

						if(!empty($getsingleuseractivity[0]->name_override)){
							$activity_name = $getsingleuseractivity[0]->name_override;
						}else{
							$activity_name = $get_activity_name[0]->name;
							
						}

						//  subactivity data
						if(!empty($getsingleuseractivity[0]->sub_activity)){
								$devide_sub_activity = explode(",",$getsingleuseractivity[0]->sub_activity);
								$posts3 = [];
								foreach($devide_sub_activity as $value)
								{
									$getSubactivities = $this->user_model->getSubactivityById($value);
									if(!empty($getSubactivities[0]->subactivity_icon)){
										if(!empty($getSubactivities[0]->subactivity_icon)){
											$sub_activity_icon = base_url('media/icon/'.$getSubactivities[0]->subactivity_icon);
										}else{
											$sub_activity_icon = base_url('media/no-image.png');
										}
										$posts3[] = array(
											'id'=>$getSubactivities[0]->id,
											'name'=>$getSubactivities[0]->name,
											'icon'=>$sub_activity_icon,
										);
											
									}
								}

						}else{
								$posts3=[];
						}

						//  get measurement unit

						if(!empty($getsingleuseractivity[0]->measurement_id)){
							$getMeasurementUnit = $this->user_model->getmeasurementbyid($getsingleuseractivity[0]->measurement_id);
							$distance_unit = $getMeasurementUnit[0]->abbreviation; 
						}else{
							$distance_unit = ''; 
						}

						// Duration calculation
						// echo $getsingleuseractivity[0]->duration;
						// die;
						if(!empty($getsingleuseractivity[0]->duration)){
							$hours = floor($getsingleuseractivity[0]->duration / 3600);
							$minutes = floor(($getsingleuseractivity[0]->duration / 60) % 60);
							$seconds = $getsingleuseractivity[0]->duration % 60;
							$duration = $hours." hr"." : ".$minutes ." min"." : ". $seconds ." sec";

						}else{
							$duration = ''; 
						}

				
				
						$posts1 = array(
						'activity_unique_id' => $getsingleuseractivity[0]->id,
						'user_id' 			=> $getsingleuseractivity[0]->user_id,
						'activity_id' 		=> $getsingleuseractivity[0]->activity_id,
						'activity_name' 	=> $activity_name,
						'activity_icon' 	=> $activity_icon,
						'category_id' 		=> $getsingleuseractivity[0]->category_id,
						'created_at' 		=> $getsingleuseractivity[0]->created_at,
						'updated_at' 		=> $getsingleuseractivity[0]->updated_at,
						'distance' 			=> $getsingleuseractivity[0]->distance,
						'distance_unit'     => $distance_unit,
						'measurement_id' 	=> $getsingleuseractivity[0]->measurement_id,
						'duration' 			=> $duration,
						'comment' 			=> $getsingleuseractivity[0]->comment,
						'pace'				=> $getsingleuseractivity[0]->pace,
						'pace_unit'			=>$pace_unit,
						'classification_id' => $getsingleuseractivity[0]->classification_id,
						'calories' 			=> $getsingleuseractivity[0]->calories,
						'step_count' 		=> $getsingleuseractivity[0]->step_count,
						'location'			=> $getsingleuseractivity[0]->location,
						'latitude' 			=> $getsingleuseractivity[0]->latitude,
						'longitude' 		=> $getsingleuseractivity[0]->longitude,
						'sub_activity'		=> $posts3,
						'start_date' 		=> $getsingleuseractivity[0]->start_date,
						'end_date' 			=> $getsingleuseractivity[0]->end_date,
						);

						$response = array(
							'status' => 'success',
							'data' => $posts1,
						);
					}else{
						$response = array(
							'status' => 'fail',
							'data' => 'Activity not found.'
						);
					}

			
				$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($response)); 
			}else{
				$posts = array(
						'status' => 'fail',
							'data' => 'Invalid token'
					);	
				}


   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	
	}

	public function updateuseractivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			 $isValidToken = $this->user_model->checkToken($token);
			
			
			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				
				$activity_unique_id = $formdata['activity_unique_id'];
				$distance = $formdata['distance'];
				$measurement_id = $formdata['measurement_id'];
				$duration = $formdata['duration'];
				$comment = $formdata['comment'];
				$pace = $formdata['pace'];
				$classification_id = $formdata['classification_id'];
				$sub_activity = $formdata['sub_activity'];
				$calories = $formdata['calories'];
				$step_count = $formdata['step_count'];
				$location = $formdata['location'];
				$name_override = $formdata['name_override'];
				$latitude = $formdata['latitude'];
				$longitude = $formdata['longitude'];
				$start_date = $formdata['start_date'];
				$end_date = $formdata['start_date'];
			

			
				$shopData = array(
					'distance' => $distance,
					'measurement_id' => $measurement_id,
					'duration' => $duration,
					'comment' => $comment,
					'pace' => $pace,
					'classification_id' => $classification_id,
					'sub_activity' => $sub_activity,

					'calories' => $calories,
					'step_count' => $step_count,
					'location' => $location,
					'name_override' => $name_override,
					'latitude' => $latitude,
					'longitude' => $longitude,
					'start_date' => $start_date,
					'end_date' => $end_date,
					'updated_at' =>  date('Y-m-d') .' '. date("h:i:s"),

				);
				
				$id = $this->user_model->update_user_activity($activity_unique_id, $shopData);

				if(!empty($id)){

					// $userData = $this->user_model->getUserData($login_user_data->id);

						$posts = array(
						'status' => 'success',
						'data' => 'Activity updated successfully.....',
						// 'syestem_id'=>$userData->measurement_system_id

						);
					}else{
						$posts = array(
						'status' => 'success',
						'data' => 'Not updated activity',
						);
					}
			}else{
			$posts = array(
						'status' => 'fail',
						'data' => 'Invalid token'
				);	
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}


	public function gettotalcategoryandactivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$login_user_data = $this->user_model->loginDataByToken($token);
				$total_category = $this->user_model->getTotalRecord('categories');
				$total_activity = $this->user_model->getTotalRecord('activities');

				$posts = array(
						'status' => 'success',
						'total_category' => $total_category,
						'total_activity' => $total_activity
					);
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function addhealthmetrics()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);

				$login_user_data = $this->user_model->loginDataByToken($token);
				
				if($formdata['goal']){
					$goal = $formdata['goal'];
				}else{
					$goal = '';
				}

				if($formdata['weight']){
					$weight = $formdata['weight'];
				}else{
					$weight = '';
				}

				if($formdata['height']){
					$height = $formdata['height'];
				}else{
					$height = '';
				}
				if($formdata['date_time']){
					$date_time = $formdata['date_time'];
				}else{
					$date_time = date('Y-m-d') .' '. date("h:i:s");
				}
				if($formdata['step']){
					$step = $formdata['step'];
				}else{
					$step = '';
				}

				if($formdata['calorie']){
					$calorie = $formdata['calorie'];
				}else{
					$calorie = '';
				}

				if($formdata['apple_health']){
					$apple_health = $formdata['apple_health'];
				}else{
					$apple_health = '';
				}

				if($formdata['google_fit']){
					$google_fit = $formdata['google_fit'];
				}else{
					$google_fit = '';
				}

				$shopData1 = array(
						'apple_health' => $apple_health,
						'google_fit' => $google_fit,
						);
				$update_streak = $this->user_model->update_streak($login_user_data->id,$shopData1);
				

				$shopData = array(
						'user_id' =>$login_user_data->id,
						'goal' => $goal,
						'weight'=>$weight,
						'height' => $height,
						'date_time' => $date_time,
						'step' => $step,
						'calorie' => $calorie,
					);
				$id  = $this->user_model->add_new_health_metrics($shopData);
				
				$posts = array(
						'status' => 'success',
						'data' => 'Health Metrics successfully added...',
					);
				
				// $this->output
				// ->set_status_header(200)
				// ->set_content_type('application/json')
				// ->set_output(json_encode($response)); 
			
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}
		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 	
	}

	public function adduseractivitynew()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);


				if(!empty($formdata['activity_id'])){
					$activity_id = $formdata['activity_id'];
				}else{
					$activity_id = '';
				}

				if(!empty($formdata['distance'])){
					$distance = $formdata['distance'];
				}else{
					$distance = '';
				}

				if(!empty($formdata['measurement_id'])){
					$measurement_id = $formdata['measurement_id'];
				}else{
					$measurement_id = '';
				}
				if(!empty($formdata['duration'])){
					$duration = $formdata['duration'];
				}else{
					$duration = '';
				}
				if(!empty($formdata['comment'])){
					$comment = $formdata['comment'];
				}else{
					$comment = '';
				}

				if(!empty($formdata['pace'])){
					$pace = $formdata['pace'];
				}else{
					$pace = '';
				}
				if(!empty($formdata['classification_id'])){
					$classification_id = $formdata['classification_id'];
				}else{
					$classification_id = '';
				}
				
				if(!empty($formdata['sub_activity'])){
					$sub_activity = $formdata['sub_activity'];
				}else{
					$sub_activity = '';
				}

				if(!empty($formdata['step_count'])){
					$step_count = $formdata['step_count'];
				}else{
					$step_count = '';
				}

				if(!empty($formdata['location'])){
					$location = $formdata['location'];
				}else{
					$location = '';
				}

				if(!empty($formdata['name_override'])){
					$name_override = $formdata['name_override'];
				}else{
					$name_override = '';
				}

				if(!empty($formdata['latitude'])){
					$latitude = $formdata['latitude'];
				}else{
					$latitude = '';
				}

				if(!empty($formdata['longitude'])){
					$longitude = $formdata['longitude'];
				}else{
					$longitude = '';
				}
				
				
				$start_date = $formdata['start_date'];
				$end_date = $formdata['end_date'];

				$get_category_id = $this->user_model->get_category_id($activity_id);
				if(!empty($get_category_id)){
					$category_id = $get_category_id[0]->category_id;
				}else{
					$category_id = '';
				}

				// save streak data


				date_default_timezone_set('UTC');
				$current_streak = 1;
				$highest_streak = 1;
				$streak_created = date("Y-m-d H:i:s");

				// $streak_created = '2021-07-31 13:34:45';

				$get_user_streak_created = $this->user_model->get_user_streak_created($login_user_data->id);

				
				if(!empty($get_user_streak_created[0]->streak_created)){
					
						$streak_break = 0;
						$endofdaytodat2 = (new DateTime($get_user_streak_created[0]->streak_created))->setTime(23, 59, 59);
						$endofdaytodat2->modify('0 day');
						$endofdaytodat = $endofdaytodat2->format("Y-m-d H:i:s");


						$endofdayyesterday2 = (new DateTime($get_user_streak_created[0]->streak_created))->setTime(23, 59, 59);
						$endofdayyesterday2->modify('+1 day');
						$endofdayyesterday = $endofdayyesterday2->format("Y-m-d H:i:s");

						if(strtotime($streak_created) <= strtotime($endofdaytodat)){
							
							$shopData = array(
							'current_streak' => $get_user_streak_created[0]->current_streak,
							'highest_streak' => $get_user_streak_created[0]->highest_streak,
							'streak_created' => $get_user_streak_created[0]->streak_created,
							
							);
						}else{

							
							if(strtotime($streak_created) >= strtotime($endofdayyesterday)){


								$shopData = array(
									'current_streak' => 1,
									'highest_streak' => $get_user_streak_created[0]->highest_streak,
									'streak_created' => $streak_created,
									
									);
								
								
							}else{
								

								if($get_user_streak_created[0]->highest_streak == $get_user_streak_created[0]->current_streak)
								{
									$new_hightest_streak = $get_user_streak_created[0]->highest_streak+1;
								}else{
									$new_hightest_streak = $get_user_streak_created[0]->highest_streak;
								}

								$shopData = array(
									'current_streak' => $get_user_streak_created[0]->current_streak + 1,
									'highest_streak' => $new_hightest_streak,
									'streak_created' => $streak_created,
									
									);

							}
							
							

						}
				}else{
					$shopData = array(
						'current_streak' => 1,
						'highest_streak' => 1,
						'streak_created' => $streak_created,
						
						);
				}

			
				$update_streak = $this->user_model->update_streak($login_user_data->id,$shopData);
				
				$begin = new DateTime($start_date);
				$end   = new DateTime($end_date);

				for($i = $begin; $i <= $end; $i->modify('+1 day'))
				{
					 $shopData = array(
						'user_id' =>$login_user_data->id,
						'activity_id' => $activity_id,
						'category_id'=>$category_id,
						'distance' => $distance,
						'measurement_id' => $measurement_id,
						'duration' => $duration,
						'comment' => $comment,
						'pace' => $pace,
						'step_count' => $step_count,
						'location' => $location,
						'name_override' => $name_override,
						'latitude' => $latitude,
						'longitude' => $longitude,
						'classification_id' => $classification_id,
						'sub_activity' => $sub_activity,
						'start_date' => $i->format("Y-m-d"),
						'end_date' => $i->format("Y-m-d"),
						

						'created_at' =>  date('Y-m-d'),
						'updated_at' =>  date('Y-m-d') .' '. date("h:i:s"),
						
					);
					$id  = $this->user_model->addnewactivity($shopData);
					
				}
				
				$posts = array(
						'status' => 'success',
						'data' => 'Activity successfully added...',
					);
				
				// $this->output
				// ->set_status_header(200)
				// ->set_content_type('application/json')
				// ->set_output(json_encode($response)); 
			
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}
		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 	
	}

	public function adduseractivity()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);

				$measurement_id = $formdata['measurement_id'];
				$classification_id = $formdata['classification_id'];
				$activity_id = $formdata['activity_id'];
				$calories = $formdata['calories'];	
				$end_date = $formdata['end_date'];
				$sub_activity = $formdata['sub_activity'];
				$pace = $formdata['pace'];
				$distance = $formdata['distance'];
				$duration = $formdata['duration'];
				$step_count = $formdata['step_count'];
				$location = $formdata['location'];
				$start_date = $formdata['start_date'];
				$comment = $formdata['comment'];
				$name_override = $formdata['name_override'];
				$latitude = $formdata['latitude'];
				$longitude = $formdata['longitude'];
				
				

				$get_category_id = $this->user_model->get_category_id($activity_id);
				if(!empty($get_category_id)){
					$category_id = $get_category_id[0]->category_id;
				}else{
					$category_id = '';
				}

				// save streak data


				date_default_timezone_set('UTC');
				$current_streak = 1;
				$highest_streak = 1;
				$streak_created = date("Y-m-d H:i:s");

				// $streak_created = '2021-07-31 13:34:45';

				$get_user_streak_created = $this->user_model->get_user_streak_created($login_user_data->id);

				
				if(!empty($get_user_streak_created[0]->streak_created)){
					
						$streak_break = 0;
						$endofdaytodat2 = (new DateTime($get_user_streak_created[0]->streak_created))->setTime(23, 59, 59);
						$endofdaytodat2->modify('0 day');
						$endofdaytodat = $endofdaytodat2->format("Y-m-d H:i:s");


						$endofdayyesterday2 = (new DateTime($get_user_streak_created[0]->streak_created))->setTime(23, 59, 59);
						$endofdayyesterday2->modify('+1 day');
						$endofdayyesterday = $endofdayyesterday2->format("Y-m-d H:i:s");

						if(strtotime($streak_created) <= strtotime($endofdaytodat)){
							
							$shopData = array(
							'current_streak' => $get_user_streak_created[0]->current_streak,
							'highest_streak' => $get_user_streak_created[0]->highest_streak,
							'streak_created' => $get_user_streak_created[0]->streak_created,
							
							);
						}else{

							
							if(strtotime($streak_created) >= strtotime($endofdayyesterday)){


								$shopData = array(
									'current_streak' => 1,
									'highest_streak' => $get_user_streak_created[0]->highest_streak,
									'streak_created' => $streak_created,
									
									);
								
								
							}else{
								

								if($get_user_streak_created[0]->highest_streak == $get_user_streak_created[0]->current_streak)
								{
									$new_hightest_streak = $get_user_streak_created[0]->highest_streak+1;
								}else{
									$new_hightest_streak = $get_user_streak_created[0]->highest_streak;
								}

								$shopData = array(
									'current_streak' => $get_user_streak_created[0]->current_streak + 1,
									'highest_streak' => $new_hightest_streak,
									'streak_created' => $streak_created,
									
									);

							}
							
							

						}
				}else{
					$shopData = array(
						'current_streak' => 1,
						'highest_streak' => 1,
						'streak_created' => $streak_created,
						
						);
				}

			
				$update_streak = $this->user_model->update_streak($login_user_data->id,$shopData);
				
				$begin = new DateTime($start_date);
				$end   = new DateTime($end_date);

				for($i = $begin; $i <= $end; $i->modify('+1 day'))
				{
					 $shopData = array(
						'user_id' =>$login_user_data->id,
						'activity_id' => $activity_id,
						'category_id'=>$category_id,
						'distance' => $distance,
						'measurement_id' => $measurement_id,
						'duration' => $duration,
						'comment' => $comment,
						'pace' => $pace,
						'step_count' => $step_count,
						'location' => $location,
						'name_override' => $name_override,
						'latitude' => $latitude,
						'longitude' => $longitude,
						'classification_id' => $classification_id,
						'sub_activity' => $sub_activity,
						'start_date' => $i->format("Y-m-d"),
						'end_date' => $i->format("Y-m-d"),
						

						'created_at' =>  date('Y-m-d'),
						'updated_at' =>  date('Y-m-d') .' '. date("h:i:s"),
						
					);
					$id  = $this->user_model->addnewactivity($shopData);
					
				}
				
				$posts = array(
						'status' => 'success',
						'data' => 'Activity successfully added...',
					);
				
				// $this->output
				// ->set_status_header(200)
				// ->set_content_type('application/json')
				// ->set_output(json_encode($response)); 
			
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}
		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 	
	}

	public function activityhideshow()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		 $token = $this->input->get_request_header('Access-Token');
		
		if($token)
		{
			 $isValidToken = $this->user_model->checkToken($token);
			
			
			$posts = array();
			if($isValidToken) 
			{
				
				$formdata = json_decode(file_get_contents('php://input'), true);
				$login_user_data = $this->user_model->loginDataByToken($token);
				$activity_id = $formdata['activity_id'];
				$is_hidden = $formdata['is_hidden'];

				$check_hidden_activity = $this->user_model->check_activity_hidden($login_user_data->id,$activity_id); 
				if(!empty($check_hidden_activity))
				   {
						$shopData = array(
						'is_hidden' => $formdata['is_hidden'],
						
						);
						$id = $this->user_model->updatehiddenactivity($check_hidden_activity[0]->id, $shopData);
						
						if(($formdata['is_hidden'] == 'True') || ($formdata['is_hidden'] == 'true')){
							
							$posts = array(
							'status' => 'success',
							'data' => 'Activity hidden successfully',
							);
						}else{
							
							$posts = array(
							'status' => 'success',
							'data' => 'Activity show successfully',
							);
						}

						
						
					}else{
						
						$shopData = array(
						'user_id' =>$login_user_data->id,
						'activity_id' => $activity_id,
						'is_hidden' => $formdata['is_hidden'],
						'created_at' =>  date('Y-m-d') .' '. date("h:i:s"),
						'updated_at' =>  date('Y-m-d') .' '. date("h:i:s"),
						
						);
						$id  = $this->user_model->addhiddenactivity($shopData);
						

						if(($formdata['is_hidden'] == 'True') || ($formdata['is_hidden'] == 'true')){
							
							$posts = array(
							'status' => 'success',
							'data' => 'Activity hidden successfully',
							);
						}else{
							
							$posts = array(
							'status' => 'success',
							'data' => 'Activity show successfully',
							);
						}
					
					}

				
				
			
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);	
			}

   		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

			$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	public function allmeasurements()
	{
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Request-Headers: GET,POST,OPTIONS,DELETE,PUT");
		header('Access-Control-Allow-Headers: Accept,Accept-Language,Content-Language,Content-Type,Authorization,Access-Sign,Access-Token,Referer');
		$token = $this->input->get_request_header('Access-Token');
		if($token)
		{
			$isValidToken = $this->user_model->checkToken($token);

			$posts = array();
			if($isValidToken) 
			{
				
				$login_user_data = $this->user_model->loginDataByToken($token);
				$all_records = $this->user_model->allmeasurements();
				
				if(!empty($all_records))
				{
					
					foreach($all_records as $all_record) {

						
							$posts1[] = array(
								'id' => $all_record->id,
								'name' => $all_record->name,
								'abbreviation' => $all_record->abbreviation,
								'measurement_system_id' => $all_record->measurement_system_id,
							);

						
					}
					$posts = array(
							'status' => 'success',
							'data' => $posts1
						);
				}else{
					$posts = array(
							'status' => 'fail',
							'data' => 'Measurment list not found.'
					);
				}	
				
			}else{
				$posts = array(
							'status' => 'fail',
							'data' => 'Invalid token'
					);
			}
		}else{
			$posts = array(
							'status' => 'fail',
							'data' => 'Please provide token'
					);	
		}	

		$this->output
				->set_status_header(200)
				->set_content_type('application/json')
				->set_output(json_encode($posts)); 
	}

	
}



