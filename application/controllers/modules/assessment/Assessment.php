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

		$data['affiliate_details'] = $this->Assessment_model->affiliate_details($_GET);
		if(isset($_GET['uid'])){
			$user_id = $_GET['uid'];
		}else{
			$user_id = '';

		}
		$ids = array("selfAssessmentId"=> $_GET['sid'], "affiliateId"=> $_GET['aid'], "userId"=>$user_id);
		$data['criteria_answers_view'] = $this->Assessment_model->criteria_answers_view($ids);
		$data['form_data'] = $this->FormData($_GET);
		
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
	 * Show the show answers data
	 *
	 * @return view 'assessment.php'
	 */
	public function formData($id=NULL){

		if(isset($_GET['uid'])){
			$user_id = $_GET['uid'];
		}else{
			$user_id = '';

		}
	if($_POST){
		$id = array("selfAssessmentId"=> $_POST['selfAssessmentId'], "affiliateId"=> $_POST['affiliateId']);
	}else{
		$id = array("selfAssessmentId"=> $_GET['sid'], "affiliateId"=> $_GET['aid'], "userId"=> $user_id);
	}
	$criteria_answers_view = $this->Assessment_model->criteria_answers_view($id);
	$response=array();

	foreach ($criteria_answers_view as $data ){
		$answerDecode = json_decode($data['answers']);
		$questionId = $data['question_id'];
		$count=1;
		$totalcount=1;
		foreach($answerDecode as $answer){
			if($answer){
				$count++;
			}
			$totalcount++;
			
		}
	$response[] = array("qId"=>$questionId, "totalcount"=> $totalcount, "count"=> $count);

	}

	if($_POST){
		$saveTotalCount=0;
	foreach($response as $Count){

		$saveTotalCount += $Count['count'];
		
	}
	if($saveTotalCount == 723){
		$this->Assessment_model->saveform($id);
	}
		echo json_encode($response);
	}else{
		return $response;

	}
}

	/**
	 * Show the assessment listing
	 *
	 * @return view 'assessment-listing.php'
	 */
	public function assessment_listing()
	{
		$data['notifications'] = $this->Document_model->get_notifications();
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
	 * Show the assessment listing
	 *
	 * @return view 'assessment-listing.php'
	 */
	public function assessment_summary()
	{
		$dSelfAssessmentId= $_GET['sid'];
		$dAffiliateId= $_GET['aid'];
		if(isset($_GET['uid'])){
			$userId = $_GET['uid'];
		}else{
			$userId = NULL;
		}

		$data['notifications'] = $this->Document_model->get_notifications();
		$data['content'] = array(
			'affiliates' => $this->Affiliate_model->home_affiliate_filter(10, 0, NULL, NULL)
		);
		
		$data['totalrating'] = $this->rating($dSelfAssessmentId,$dAffiliateId,$userId);

		$data['standard_rating_c1_s1'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s1',1);
		// echo"<pre>"; print_r($data['standard_rating_c1_s1']);exit;
		$data['standard_rating_c1_s2'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s2',2);
		$data['standard_rating_c1_s3'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s3',3);
		$data['standard_rating_c1_s4'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s4',4);
		$data['standard_rating_c1_s5'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s5',5);
		$data['standard_rating_c1_s6'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s6',6);
		$data['standard_rating_c1_s7'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s7',7);

		$data['standard_rating_c2_s1'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s1',1);
		$data['standard_rating_c2_s2'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s2',2);
		$data['standard_rating_c2_s3'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s3',3);
		$data['standard_rating_c2_s4'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s4',4);
		$data['standard_rating_c2_s5'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s5',5);
		$data['standard_rating_c2_s6'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s6',6);
		$data['standard_rating_c2_s7'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s7',7);
		$data['standard_rating_c2_s8'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c2_s8',8);

		$data['standard_rating_c3_s1'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s1',1);
		$data['standard_rating_c3_s2'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s2',2);
		$data['standard_rating_c3_s3'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s3',3);
		$data['standard_rating_c3_s4'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s4',4);
		$data['standard_rating_c3_s5'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s5',5);
		$data['standard_rating_c3_s6'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s6',6);
		$data['standard_rating_c3_s7'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s7',7);
		$data['standard_rating_c3_s8'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c3_s8',8);


		$data['criteriaRatingOne'] = $this->criteria_rating($data['totalrating']['criteriaOne'], 6);
		$data['criteriaRatingTwo'] = $this->criteria_rating($data['totalrating']['criteriaTwo'],8);
		$data['criteriaRatingThree'] = $this->criteria_rating($data['totalrating']['criteriaThree'],8);

// 	echo "<pre>"; print_r($data['criteriaRatingTwo']);
// exit;	
	
		//Name of the view file
		$data['view_name'] = 'modules/performance_assessment/assessment_summary';
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
	 * Show the assessment export
	 *
	 * @return view 'assessment_pdf.php'
	 */
	public function assessment_pdf()
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

		$data['affiliate_details'] = $this->Assessment_model->affiliate_details($_GET);

		$ids = array("selfAssessmentId"=> $_GET['sid'], "affiliateId"=> $_GET['aid']);
		$data['criteria_answers_view'] = $this->Assessment_model->criteria_answers_view($ids);
		$data['form_data'] = $this->FormData($_GET);
		if(isset($_GET['uid'])){
			$userId = $_GET['uid'];
		}else{
			$userId = NULL;
		}
		$data['totalrating'] = $this->rating($_GET['sid'],$_GET['aid'],$userId);

			//Name of the view file
			$data['view_name'] = 'modules/performance_assessment/assessment_pdf';
			//Page specific javascript files
			$data['footer']['js'] = array(
				'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
				'https://unpkg.com/mustache@latest',
				'vendor/bootstrap-datetimepicker.js',
				'pages/modules/assessment_pdf.js',
			);

		require_once APPPATH.'third_party/vendor/autoload.php';
		$mpdf = new \Mpdf\Mpdf();
		$html = $this->load->view('modules/performance_assessment/assessment_pdf',$data,true);
		$mpdf->WriteHTML($html);
		$mpdf->Output('assessment.pdf','D'); 
		
	
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
	public function rating($dSelfAssessmentId=NULL,$dAffiliateId=NULL,$userId=NULL)
	{
		if(isset($_POST) && !empty($_POST)){
			$selfAssessmentId = $_POST['selfAssessmentId'];
			$affiliateId = $_POST['affiliateId'];
		}else{
			$selfAssessmentId =$dSelfAssessmentId;
			$affiliateId = $dAffiliateId;
		}
	
		$criteria_answers_view = $this->Assessment_model->rating($selfAssessmentId,$affiliateId,$userId);
		$criteriaOne = $this->ratingC1($criteria_answers_view);
		$criteriaTwo = $this->ratingC2($criteria_answers_view);
		$criteriaThree = $this->ratingC3($criteria_answers_view);
				

	$response = array(
		'criteriaOne' => $criteriaOne,
		'criteriaTwo' => $criteriaTwo,
		'criteriaThree' => $criteriaThree,
	);

		if(isset($_POST) && !empty($_POST)){
			echo json_encode($response);
		}else{
			return $response;

		}
	
	}

	

	public function ratingC1($criteria_answers_view)
	{
		$criteriaOneData = array();

		foreach($criteria_answers_view as $data){
			
			$val = json_decode($data['answers']);
			foreach($val as $key=>$rating){
				if (strpos($key, 'rating') !== false && strpos($key, 'c1') !== false) {
					$c1_c= substr($key, 0, 5);
						array_push($criteriaOneData, [$c1_c => $rating]);
				}	
				
			}
			
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
								"c1_s2"=> 	array("val"=>$sumC1S2,"count"=>2),
								"c1_s3"=> 	array("val"=>$sumC1S3,"count"=>16),
								"c1_s4"=> 	array("val"=>$sumC1S4,"count"=>6),
								"c1_s5"=> 	array("val"=>$sumC1S5,"count"=>11),
								"c1_s6"=> 	array("val"=>$sumC1S6,"count"=>1));

		return $criteriaOne;
	}


	public function ratingC2($criteria_answers_view)
	{

		$criteriaTwoData = array();

		foreach($criteria_answers_view as $data){
			
			$val = json_decode($data['answers']);
			
			foreach($val as $key=>$rating){
				if (strpos($key, 'rating') !== false && strpos($key, 'c2') !== false) {
	
		
						$c2_c= substr($key, 0, 5);

						array_push($criteriaTwoData, [$c2_c => $rating]);
					
							
				}	
				
			}	
   }
  


	$sumC2S1 = $sumC2S2 = $sumC2S3= $sumC2S4= $sumC2S5= $sumC2S6 =$sumC2S7 =$sumC2S8 = 0;

	foreach($criteriaTwoData as $c2){
	
	if(isset($c2['c2_s4'])){

	}
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
	
		foreach($criteria_answers_view as $data){
			
			$val = json_decode($data['answers']);
			foreach($val as $key=>$rating){
			
				if (strpos($key, 'rating') !== false && strpos($key, 'c3') !== false) {
					$c3_c= substr($key, 0, 5);
						array_push($criteriaThreeData, [$c3_c => $rating]);
						
				}	
			}
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

 	/**
	 * Show the data in assessment summary page
	 *
	 * @return view 'assessment-summary.php'
	 */
	public function standard_rating($selfAssessmentId,$affiliateId,$userId,$sName,$index)
	{
	
		$standardRating = $this->Assessment_model->rating($selfAssessmentId,$affiliateId,$userId);
	
			$s=1;
			$c=1;	
		$standardR = array();
		$standardC = array();

		foreach($standardRating as $data){
			
			$val = json_decode($data['answers']);
			
			foreach($val as $key=>$rating){
				if (strpos($key, 'rating') !== false && strpos($key, $sName) !== false) {
						$standardR[$index.'.'.$s]['rating'] = $rating;
						// array_push($standardR, ['1.'.$s => $rating]);



						$s++;
				}	

				if (strpos($key, 'comment') !== false && strpos($key, $sName) !== false) {
					$standardR[$index.'.'.$s]['comment'] = $rating;
					// array_push($standardR, ['1.'.$s => $rating]);



					$c++;
			}	
				
			}

		}

			// return array("standardR"=>$standardR,"standardC"=>$standardC );
			return $standardR;


		}

	/**
	 * Show the rating by criteria wise
	 *
	 * @return view 'assessment-summary.php'
	 */
	public function criteria_rating($totalrating,$number)
	{
		$criteriaRating = 0;
			foreach($totalrating as $key=>$rating){
				$criteriaRating+= ($rating['val'] /  $rating['count']);
		}
		
		return (round(($criteriaRating/$number),1,PHP_ROUND_HALF_ODD));
	
	
  }

  public function add_self_assessment_data()
	{
		$self_assessment_id = $this->Assessment_model->add_self_assessment_data($_POST);

		redirect('module/assessment/assessment?sid='.$self_assessment_id.'&aid='.$_POST['affiliate_id'].'&uid='.$this->session->user_id);
  }
}
