<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Assessment extends MY_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affiliate_model');
		$this->load->model('Document_model');

		$this->load->model('Assessment_model');
		//$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Show the home page
	 *
	 * @return view 'assessment listing'
	 */
	public function index()
	{

		$data['content'] = array(
			'affiliates' => $this->Affiliate_model->home_affiliate_filter(10, 0, NULL, NULL)
		);
		
		
	
		$data['notifications'] = $this->Document_model->get_notifications();
		$data['criteria_one_standard_one'] = $this->Assessment_model->criteria_question(1,1);
		$data['criteria_one_standard_two'] = $this->Assessment_model->criteria_question(1,2);
		$data['criteria_one_standard_three'] = $this->Assessment_model->criteria_question(1,3);
		$data['criteria_one_standard_four'] = $this->Assessment_model->criteria_question(1,4);
		$data['criteria_one_standard_five'] = $this->Assessment_model->criteria_question(1,5);
		$data['criteria_one_standard_six'] = $this->Assessment_model->criteria_question(1,6);

		$data['criteria_two_standard_one'] = $this->Assessment_model->criteria_question(2,1);
		$data['criteria_two_standard_two'] = $this->Assessment_model->criteria_question(2,2);
		$data['criteria_two_standard_three'] = $this->Assessment_model->criteria_question(2,3);
		$data['criteria_two_standard_four'] = $this->Assessment_model->criteria_question(2,4);
		$data['criteria_two_standard_five'] = $this->Assessment_model->criteria_question(2,5);
		$data['criteria_two_standard_six'] = $this->Assessment_model->criteria_question(2,6);
		$data['criteria_two_standard_seven'] = $this->Assessment_model->criteria_question(2,7);
		$data['criteria_two_standard_eight'] = $this->Assessment_model->criteria_question(2,8);

		$data['criteria_three_standard_one'] = $this->Assessment_model->criteria_question(3,1);
		$data['criteria_three_standard_two'] = $this->Assessment_model->criteria_question(3,2);
		$data['criteria_three_standard_three'] = $this->Assessment_model->criteria_question(3,3);
		$data['criteria_three_standard_four'] = $this->Assessment_model->criteria_question(3,4);
		$data['criteria_three_standard_five'] = $this->Assessment_model->criteria_question(3,5);
		$data['criteria_three_standard_six'] = $this->Assessment_model->criteria_question(3,6);
		$data['criteria_three_standard_seven'] = $this->Assessment_model->criteria_question(3,7);
		$data['criteria_three_standard_eight'] = $this->Assessment_model->criteria_question(3,8);


			//Name of the view file
			$data['view_name'] = 'modules/performance_assessment/assessment';
			//Page specific javascript files
			$data['footer']['js'] = array(
				'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
				'https://unpkg.com/mustache@latest',
				'vendor/moment.js',
				'vendor/dropzone.js',
				'vendor/bootstrap-datetimepicker.js',
				'pages/modules/assessment.js',
			);

		$this->load->view('template', $data);
	
	}
	/**
	 * Show the assessment listing
	 *
	 * @return view 'assessment-listing.php'
	 */
	public function assessment_listing()
	{
		$data['content'] = array(
			'affiliates' => $this->Affiliate_model->home_affiliate_filter(10, 0, NULL, NULL)
		);
		$data['assessment_listing'] = $this->Assessment_model->assessment_listing($_POST);
		$data['affiliate_details'] = $this->Assessment_model->affiliate_details();
		$data['get_assessement_answers_details'] = $this->Assessment_model->get_assessement_answers_details();

		$data['assessment_listing_date'] = $_POST;
		//Name of the view file
		$data['view_name'] = 'modules/performance_assessment/assessment_listing';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
			'https://unpkg.com/mustache@latest',
			'vendor/moment.js',
			'vendor/dropzone.js',
			'pages/modules/assessment.js',
			'vendor/bootstrap-datetimepicker.js',
		);

	$this->load->view('template', $data);
	
	}

	/**
	 * Show the data in assessment page
	 *
	 * @return view 'assessment.php'
	 */
	public function criteria_answers()
	{

		$data['criteria_one_save'] = $this->Assessment_model->criteria_answers($_POST);
		echo true;

	
	}


	/**
	 * Show the data in assessment page
	 *
	 * @return view 'assessment.php'
	 */
	public function criteria_answers_view()
	{

		$criteria_answers_view = $this->Assessment_model->criteria_answers_view($_POST);
		echo json_encode($criteria_answers_view);
	
	}

	/**
	 * Show the data in assessment page
	 *
	 * @return view 'assessment.php'
	 */
	public function rating()
	{
		$criteria_answers_view = $this->Assessment_model->rating($_POST);
		$criteriaOne = $this->ratingC1($criteria_answers_view);
		$criteriaTwo = $this->ratingC2($criteria_answers_view);
		$criteriaThree = $this->ratingC3($criteria_answers_view);
				

	$response = array(
		'criteriaOne' => $criteriaOne,
		'criteriaTwo' => $criteriaTwo,
		'criteriaThree' => $criteriaThree,
	);

	echo json_encode($response);
	
	}

	

	public function ratingC1($criteria_answers_view)
	{
		$criteriaOneData = array();
		$s1=1;
		foreach($criteria_answers_view as $data){
			
			$val = json_decode($data['answers']);
			foreach($val as $key=>$rating){
				if (strpos($key, 'rating') !== false && strpos($key, 'c1') !== false) {
						array_push($criteriaOneData, ["c1_s".$s1 => $rating]);
				}	
				
			}
			$s1++;
		}

		$sumC1S1 = $sumC1S2 = $sumC1S3= $sumC1S4= $sumC1S5= $sumC1S6 =0;

		foreach($criteriaOneData as $e){
			if(isset($e['c1_s1']) && !empty($e['c1_s1'])){ $sumC1S1 += $e['c1_s1'];}
			if(isset($e['c1_s2']) && !empty($e['c1_s2'])){ $sumC1S2 += $e['c1_s2'];}
			if(isset($e['c1_s3']) && !empty($e['c1_s3'])){ $sumC1S3 += $e['c1_s3'];}
			if(isset($e['c1_s4']) && !empty($e['c1_s4'])){ $sumC1S4 += $e['c1_s4'];}
			if(isset($e['c1_s5']) && !empty($e['c1_s5'])){ $sumC1S5 += $e['c1_s5'];}
			if(isset($e['c1_s6']) && !empty($e['c1_s6'])){ $sumC1S6 += $e['c1_s6'];}
		}

		$criteriaOne = array("c1_s1"=> array("val"=>$sumC1S1,"count"=>7),
								"c1_s2"=> 	array("val"=>$sumC1S2,"count"=>1),
								"c1_s3"=> 	array("val"=>$sumC1S3,"count"=>16),
								"c1_s4"=> 	array("val"=>$sumC1S4,"count"=>6),
								"c1_s5"=> 	array("val"=>$sumC1S5,"count"=>11),
								"c1_s6"=> 	array("val"=>$sumC1S6,"count"=>1));

		return $criteriaOne;
	}


	public function ratingC2($criteria_answers_view)
	{

		$criteriaTwoData = array();
		$s2=1;
		$flag=1;
		foreach($criteria_answers_view as $data){
			
			$val = json_decode($data['answers']);
			
			foreach($val as $key=>$rating){
				if (strpos($key, 'rating') !== false && strpos($key, 'c2') !== false) {
				
					if($s2 == 7 &&  $flag==1){ $s2=1; }

						array_push($criteriaTwoData, ["c2_s".$s2 => $rating]);
						$flag++;
							
				}	
				
			}
			$s2++;
			
   }
  
	$sumC2S1 = $sumC2S2 = $sumC2S3= $sumC2S4= $sumC2S5= $sumC2S6 =$sumC2S7 =$sumC2S8 = 0;

	foreach($criteriaTwoData as $c2){
	

		if(isset($c2['c2_s1']) && !empty($c2['c2_s1'])){
			 $sumC2S1 += $c2['c2_s1'];
			 }
		if(isset($c2['c2_s2']) && !empty($c2['c2_s2'])){ $sumC2S2 += $c2['c2_s2']; }
		if(isset($c2['c2_s3']) && !empty($c2['c2_s3'])){ $sumC2S3 += $c2['c2_s3']; }
		if(isset($c2['c2_s4']) && !empty($c2['c2_s4'])){ $sumC2S4 += $c2['c2_s4']; }
		if(isset($c2['c2_s5']) && !empty($c2['c2_s5'])){ $sumC2S5 += $c2['c2_s5']; }
		if(isset($c2['c2_s6']) && !empty($c2['c2_s6'])){ $sumC2S6 += $c2['c2_s6']; }
		if(isset($c2['c2_s7']) && !empty($c2['c2_s7'])){ $sumC2S7 += $c2['c2_s7']; }
		if(isset($c2['c2_s8']) && !empty($c2['c2_s8'])){ $sumC2S8 += $c2['c2_s8']; }
	}

	$criteriaTwo =array("c2_s1"=>   array("val"=>$sumC2S1,"count"=>7),
						"c2_s2"=> 	array("val"=>$sumC2S2,"count"=>6),
						"c2_s3"=> 	array("val"=>$sumC2S3,"count"=>18),
						"c2_s4"=> 	array("val"=>$sumC2S4,"count"=>20),
						"c2_s5"=> 	array("val"=>$sumC2S5,"count"=>8),
						"c2_s6"=> 	array("val"=>$sumC2S6,"count"=>2),
						"c2_s7"=> 	array("val"=>$sumC2S7,"count"=>4),
						"c2_s8"=> 	array("val"=>$sumC2S8,"count"=>3));
	 return $criteriaTwo;

	}

	public function ratingC3($criteria_answers_view)
	{
		$criteriaThreeData = array();
		$flag =1;
		$s3=1;
		foreach($criteria_answers_view as $data){
			
			$val = json_decode($data['answers']);
			foreach($val as $key=>$rating){
			
				if (strpos($key, 'rating') !== false && strpos($key, 'c3') !== false) {
					if($s3 == 15 &&  $flag==1){ $s3=1; }
						array_push($criteriaThreeData, ["c3_s".$s3 => $rating]);
						$flag++;
				}	
			}
			$s3++;
	}
	
	
	$sumC3S1 = $sumC3S2 = $sumC3S3= $sumC3S4= $sumC3S5= $sumC3S6 =$sumC3S7 =$sumC3S8 = 0;
	foreach($criteriaThreeData as $c3){
		if(isset($c3['c3_s1']) && !empty($c3['c3_s1'])){ $sumC3S1 += $c3['c3_s1']; }
		if(isset($c3['c3_s2']) && !empty($c3['c3_s2'])){ $sumC3S2 += $c3['c3_s2']; }
		if(isset($c3['c3_s3']) && !empty($c3['c3_s3'])){ $sumC3S3 += $c3['c3_s3']; }
		if(isset($c3['c3_s4']) && !empty($c3['c3_s4'])){ $sumC3S4 += $c3['c3_s4']; }
		if(isset($c3['c3_s5']) && !empty($c3['c3_s5'])){ $sumC3S5 += $c3['c3_s5']; }
		if(isset($c3['c3_s6']) && !empty($c3['c3_s6'])){ $sumC3S6 += $c3['c3_s6']; }
		if(isset($c3['c3_s7']) && !empty($c3['c3_s7'])){ $sumC3S7 += $c3['c3_s7']; }
		if(isset($c3['c3_s8']) && !empty($c3['c3_s8'])){ $sumC3S8 += $c3['c3_s8']; }
	}
	
	$criteriaThree =  array("c3_s1"=>   array("val"=>$sumC3S1,"count"=>7),
							"c3_s2"=> 	array("val"=>$sumC3S2,"count"=>3),
							"c3_s3"=> 	array("val"=>$sumC3S3,"count"=>3),
							"c3_s4"=> 	array("val"=>$sumC3S4,"count"=>7),
							"c3_s5"=> 	array("val"=>$sumC3S5,"count"=>6),
							"c3_s6"=> 	array("val"=>$sumC3S6,"count"=>4),
							"c3_s7"=> 	array("val"=>$sumC3S7,"count"=>2),
							"c3_s8"=> 	array("val"=>$sumC3S8,"count"=>3));
	return $criteriaThree;

 }


}
