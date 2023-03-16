<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once FCPATH.'application/third_party/word/autoload.php';
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Settings;
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
		if($this->session->has_userdata('previous_url'))
			$previous_url = $this->session->userdata('previous_url');
		else
			$previous_url = base_url('module/assessment/assessment-listing');
		
		$data['content'] = array(
			'previous_url' => $previous_url,
			'affiliates' => $this->Affiliate_model->home_affiliate_filter(10, 0, NULL, NULL)
		);
		
		
	
		$data['notifications'] = $this->Document_model->get_notifications();
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
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
				'vendor/dropzone.js',
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
		$this->session->set_userdata('previous_url', current_url());

		$data['notifications'] = $this->Document_model->get_notifications();
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
		$data['content'] = array(
			'affiliates' => $this->Affiliate_model->home_affiliate_filter(10, 0, NULL, NULL)
		);
		$data['assessment_listing'] = $this->Assessment_model->assessment_listing($_POST);
		$data['affiliate_details'] = $this->Assessment_model->affiliate_details(NULL);
		$data['get_assessement_answers_details'] = $this->Assessment_model->get_assessement_answers_details();

		$data['assessment_listing_date'] = $_POST;
		//Name of the view file
		$data['view_name'] = 'modules/performance_assessment/assessment_listing';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
			'https://unpkg.com/mustache@latest',
			'vendor/dropzone.js',
			'pages/modules/assessment.js'
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
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
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
			'vendor/dropzone.js',
			'pages/modules/assessment.js'
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
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
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

		$affiliate_details = $this->Assessment_model->affiliate_details($_GET);
		$data['affiliate_details'] = $affiliate_details;

		if(isset($_GET['uid'])){
			$user_id = $_GET['uid'];
			$data['title'] = 'Affiliate Self-Assessment ';
		}else{
			$user_id = NULL;
			$data['title'] = 'Affiliate Performance Assessment ';
		}
		
		$data['title'] .= '('. $affiliate_details[0]['assessment_start_year'].' - '. $affiliate_details[0]['assessment_end_year'].') - ';
        $data['title'] .= $affiliate_details[0]['city'].', '.$affiliate_details[0]['stateabbreviation'];

		$ids = array("selfAssessmentId"=> $_GET['sid'], "affiliateId"=> $_GET['aid'],"userId"=>$user_id);
		$data['criteria_answers_view'] = $this->Assessment_model->criteria_answers_view($ids);
		$data['form_data'] = $this->FormData($_GET);
		

		$data['totalrating'] = $this->rating($_GET['sid'],$_GET['aid'],$user_id);

			//Name of the view file
			$data['view_name'] = 'modules/performance_assessment/assessment_pdf';
			//Page specific javascript files
			$data['footer']['js'] = array(
				'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
				'https://unpkg.com/mustache@latest',
				'vendor/bootstrap-datetimepicker.js',
				'pages/modules/assessment_pdf.js',
			);

		////Docx code begins
		$items=array();
		$templateProcessor = new TemplateProcessor('resources/template/2019 ULHC Performance Assessment.docx');
		$array_count=count($data['criteria_answers_view']);

			for($j=0;$j<$array_count;$j++){

			//echo $j;echo "<br>";
			$section_1= $data['criteria_answers_view'][$j]['answers'];
			$jsonObj = json_decode($section_1);
			//print_r($jsonObj);echo "<br><br>";
				$i=1;
				foreach($jsonObj as $key=>$value){

					if (strpos($key, 'check') !== false)
					{
						$items[]=$key;
						${'option_' . $i} = $jsonObj->$key;
						if($value=='yes'){${$key.'_yes'}='X';${$key.'_no'}='';}else{${$key.'_yes'}='';${$key.'_no'}='X';}
							$templateProcessor->setValue($key.'_yes', ${$key.'_yes'});
							$templateProcessor->setValue($key.'_no', ${$key.'_no'});
					}

					if (strpos($key, 'val') !== false)
					{
						$items[]=$key;
						$templateProcessor->setValue($key, $value);
					}
					if (strpos($key, 'date') !== false)
					{
						$items[]=$key;
						$templateProcessor->setValue($key, $value);
					}
					if (strpos($key, 'comment') !== false)
					{
						$items[]=$key;
						$templateProcessor->setValue($key, htmlspecialchars($value));
					}
					if (strpos($key, 'rating') !== false)
					{
						$items[]=$key;
						if($value==''){$value=0;}
						$templateProcessor->setValue($key, htmlspecialchars($value));
					}

						$i++;
				}


		}

		//To set null values if not filled
		$sections=array('criteria_one_standard_one','criteria_one_standard_two','criteria_one_standard_three','criteria_one_standard_four','criteria_one_standard_five','criteria_one_standard_six',
                     'criteria_two_standard_one','criteria_two_standard_two',"criteria_two_standard_three","criteria_two_standard_four","criteria_two_standard_five","criteria_two_standard_six","criteria_two_standard_seven","criteria_two_standard_eight",
					 "criteria_three_standard_one","criteria_three_standard_two","criteria_three_standard_three","criteria_three_standard_four","criteria_three_standard_five","criteria_three_standard_six","criteria_three_standard_seven","criteria_three_standard_eight",
					
					);
		foreach($sections as $values){

		  $dom = new DOMDocument();
		  // set error level
		 $internalErrors = libxml_use_internal_errors(true);

		  $dom->loadHTML($data[$values]->question);
		  
			// Empty array to hold all links to return
			$inputs = array();

			//Loop through each <input> tag in the dom and add it to the inputs array
			foreach($dom->getElementsByTagName('input') as $item) {

				if (strpos($item->getAttribute('id'), 'check') !== false)
				{

				if( !in_array( $item->getAttribute('id') ,$items ) )
					{
					$templateProcessor->setValue($item->getAttribute('id').'_yes', '');
					$templateProcessor->setValue($item->getAttribute('id').'_no', '');
					}	

				}

				if (strpos($item->getAttribute('id'), 'val') !== false)
				{
					if( !in_array( $item->getAttribute('id') ,$items ) )
						{
						$templateProcessor->setValue($item->getAttribute('id'), '');
						}
					
				}
				if (strpos($item->getAttribute('id'), 'date') !== false)
				{
					if( !in_array( $item->getAttribute('id') ,$items ) )
						{
						$templateProcessor->setValue($item->getAttribute('id'), '');
						}
					
				}

				if (strpos($item->getAttribute('id'), 'comment') !== false)
				{
					if( !in_array( $item->getAttribute('id') ,$items ) )
						{
						$templateProcessor->setValue($item->getAttribute('id'), '');
						}
					
				}
				if (strpos($item->getAttribute('id'), 'rating') !== false)
				{
					if( !in_array( $item->getAttribute('id') ,$items ) )
						{
						//echo $item->getAttribute('id');echo "<br>";
						$templateProcessor->setValue($item->getAttribute('id'), 0);
						$templateProcessor->setValue('c2_s8_8_3_rating_1', 0);
						}
				}

			
			}

        }

		$criteria=array_keys($data['totalrating']);
		//print_r($criteria);echo "<br><br>";
		$overallrating=$overallc2rating=$overallc3rating=0;
		$totalrating=$totalC2Rating=$totalC3Rating=0;
		
		 foreach($criteria as $value){
			$arrayb=$data['totalrating'][$value];
			//print_r($arrayb);echo "<br><br>";
			
			foreach($arrayb as $key=>$total_ratings_field){
				//echo "<br><br>";print_r ($total_ratings_field);echo "<br><br>";
				if($total_ratings_field['count']==0){
					$totalrating=0;
					$templateProcessor->setValue($key, $totalrating);
					//echo $key."-->".$totalrating;echo "<br><br>";
				}
				else{
					$totalrating =  (round((($total_ratings_field['val']) / $total_ratings_field['count']), 1, PHP_ROUND_HALF_ODD));
					$templateProcessor->setValue($key, $totalrating);
					//echo $key."-->".$totalrating;echo "<br><br>";
				}
				//echo $key."-->".$totalrating;echo "<br><br>";echo $value."<br>";
				if($value=='criteriaOne'){
					$overallrating+=$totalrating;
					$totalC1Rating =  (round((($overallrating) / 6), 1, PHP_ROUND_HALF_ODD));
				}
				elseif($value=='criteriaTwo'){
					$overallc2rating+=$totalrating;
					$totalC2Rating =  (round((($overallc2rating) / 8), 1, PHP_ROUND_HALF_ODD));
				}
				else{
					$overallc3rating+=$totalrating;
					$totalC3Rating =  (round((($overallc3rating) / 8), 1, PHP_ROUND_HALF_ODD));
				}
			}
			$totalrating=0;
		 }

		//  echo "totalC1Rating".$totalC1Rating."<br>";
		//  echo "totalC2Rating".$totalC2Rating."<br>";
		//  echo "totalC3Rating".$totalC3Rating."<br>";

		 $overalltotal =  (round((($totalC1Rating + $totalC2Rating + $totalC3Rating) / 3),1,PHP_ROUND_HALF_ODD));            
		 
		 $templateProcessor->setValue('C1', $totalC1Rating);
		 $templateProcessor->setValue('C2', $totalC2Rating);
		 $templateProcessor->setValue('C3', $totalC3Rating);
		 $templateProcessor->setValue('t', $overalltotal);

		$templateProcessor->setValue('year', $affiliate_details[0]['assessment_start_year']);
		
		// require_once APPPATH.'third_party/vendor/autoload.php';
		// $mpdf = new \Mpdf\Mpdf();
		// $html = $this->load->view('modules/performance_assessment/assessment_pdf',$data,true);
		// $mpdf->WriteHTML($html);
		// $mpdf->Output('assessment.pdf','D'); 

		$aff_name=$affiliate_details[0]['city'].', '.$affiliate_details[0]['stateabbreviation'];
		$templateProcessor->setValue('affname', $aff_name);
		$org_name=$affiliate_details[0]['organization'];
		$templateProcessor->setValue('orgname', $org_name);
		$fileName = $affiliate_details[0]['assessment_start_year']." ". $aff_name. " Performance Assessment";
		Settings::setZipClass(Settings::PCLZIP);
        $templateProcessor->saveAs($fileName . '.docx');

		
		$file = '/tmp/'.$fileName.'.docx';

		if (file_exists($file)) {
			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename="'.basename($fileName.'.docx').'"');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			header('Content-Length: ' . filesize($file));
			readfile($file);
			unlink($file);
			exit;
		}



	}

	/**
	 * Show the data in assessment page
	 *
	 * @return view 'assessment.php'
	 */
	public function criteria_answers()
	{

		$data = $this->Assessment_model->criteria_answers($_POST);


		$dSelfAssessmentId= $_POST['selfAssessmentId'];
		$dAffiliateId= $_POST['affiliateId'];
		if(isset($_POST['userId'])){
			$userId = $_POST['userId'];
		}else{
			$userId = NULL;
		}

		$data['totalrating'] = $this->ratingToStore($dSelfAssessmentId,$dAffiliateId,$userId);

		$data['standard_rating_c1_s1'] = $this->standard_rating($dSelfAssessmentId,$dAffiliateId,$userId,'c1_s1',1);
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


		$overallrating =  (round((($data['criteriaRatingOne'] + $data['criteriaRatingTwo'] +$data['criteriaRatingThree']) / 3),1,PHP_ROUND_HALF_ODD));  
		// print_r($overallrating);exit;

	    $this->Assessment_model->performance_score($overallrating,$dSelfAssessmentId);

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
	public function ratingToStore($dSelfAssessmentId=NULL,$dAffiliateId=NULL,$userId=NULL)
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

			return $response;
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
			if(isset($_POST['userId'])){
				$userId = $_POST['userId'];
			}
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
		$countC1S1 = $countC1S2 = $countC1S3= $countC1S4= $countC1S5= $countC1S6 =0;
 
		foreach($criteriaOneData as $e){

			if(isset($e['c1_s1']) && !empty($e['c1_s1'])){ 
				$sumC1S1 += $e['c1_s1'];
				$countC1S1++;
			}

			if(isset($e['c1_s2']) && !empty($e['c1_s2'])){ 
				$sumC1S2 += $e['c1_s2'];
				$countC1S2++;
			}
			if(isset($e['c1_s3']) && !empty($e['c1_s3'])){ 
				$sumC1S3 += $e['c1_s3'];
				$countC1S3++;
			}
			if(isset($e['c1_s4']) && !empty($e['c1_s4'])){ 
				$sumC1S4 += $e['c1_s4'];
				$countC1S4++;
			}
			if(isset($e['c1_s5']) && !empty($e['c1_s5'])){ 
				$sumC1S5 += $e['c1_s5'];
				$countC1S5++;
			}
			if(isset($e['c1_s6']) && !empty($e['c1_s6'])){ 
				$sumC1S6 += $e['c1_s6'];
				$countC1S6++;
			}
		}

		$criteriaOne = array(
			"c1_s1"=> array("val"=>$sumC1S1,"count"=>$countC1S1),
			"c1_s2"=> 	array("val"=>$sumC1S2,"count"=>$countC1S2),
			"c1_s3"=> 	array("val"=>$sumC1S3,"count"=>$countC1S3),
			"c1_s4"=> 	array("val"=>$sumC1S4,"count"=>$countC1S4),
			"c1_s5"=> 	array("val"=>$sumC1S5,"count"=>$countC1S5),
			"c1_s6"=> 	array("val"=>$sumC1S6,"count"=>$countC1S6)
		);

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
		$countC2S1 = $countC2S2 = $countC2S3= $countC2S4= $countC2S5= $countC2S6 =$countC2S7 =$countC2S8 = 0;

		foreach($criteriaTwoData as $c2){
			if(isset($c2['c2_s1']) && !empty($c2['c2_s1'])){
				$sumC2S1 += $c2['c2_s1'];
				$countC2S1++;
			}
			if(isset($c2['c2_s2']) && !empty($c2['c2_s2'])){ 
				$sumC2S2 += $c2['c2_s2'];
				$countC2S2++; 
			}
			if(isset($c2['c2_s3']) && !empty($c2['c2_s3'])){ 
				$sumC2S3 += $c2['c2_s3']; 
				$countC2S3++;
			}
			if(isset($c2['c2_s4']) && !empty($c2['c2_s4'])){ 
				$sumC2S4 += $c2['c2_s4'];
				$countC2S4++;
			}
			if(isset($c2['c2_s5']) && !empty($c2['c2_s5'])){ 
				$sumC2S5 += $c2['c2_s5'];
				$countC2S5++; 
			}
			if(isset($c2['c2_s6']) && !empty($c2['c2_s6'])){ 
				$sumC2S6 += $c2['c2_s6'];
				$countC2S6++;
			}
			if(isset($c2['c2_s7']) && !empty($c2['c2_s7'])){ 
				$sumC2S7 += $c2['c2_s7'];
				$countC2S7++;
			}
			if(isset($c2['c2_s8']) && !empty($c2['c2_s8'])){ 
				$sumC2S8 += $c2['c2_s8'];
				$countC2S8++;
			}
		}

		$criteriaTwo = array(
			"c2_s1"=>   array("val"=>$sumC2S1,"count"=>$countC2S1),
			"c2_s2"=> 	array("val"=>$sumC2S2,"count"=>$countC2S2),
			"c2_s3"=> 	array("val"=>$sumC2S3,"count"=>$countC2S3),
			"c2_s4"=> 	array("val"=>$sumC2S4,"count"=>$countC2S4),
			"c2_s5"=> 	array("val"=>$sumC2S5,"count"=>$countC2S5),
			"c2_s6"=> 	array("val"=>$sumC2S6,"count"=>$countC2S6),
			"c2_s7"=> 	array("val"=>$sumC2S7,"count"=>$countC2S7),
			"c2_s8"=> 	array("val"=>$sumC2S8,"count"=>$countC2S8)
		);
					
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
	$countC3S1 = $countC3S2 = $countC3S3= $countC3S4= $countC3S5= $countC3S6 =$countC3S7 =$countC3S8 = 0;
	foreach($criteriaThreeData as $c3){
		if(isset($c3['c3_s1']) && !empty($c3['c3_s1'])){ 
			$sumC3S1 += $c3['c3_s1'];
			$countC3S1++;
		}
		if(isset($c3['c3_s2']) && !empty($c3['c3_s2'])){ 
			$sumC3S2 += $c3['c3_s2'];
			$countC3S2++; 
		}
		if(isset($c3['c3_s3']) && !empty($c3['c3_s3'])){ 
			$sumC3S3 += $c3['c3_s3'];
			$countC3S3++;
		 }
		if(isset($c3['c3_s4']) && !empty($c3['c3_s4'])){ 
			$sumC3S4 += $c3['c3_s4'];
			$countC3S4++;
		}
		if(isset($c3['c3_s5']) && !empty($c3['c3_s5'])){ 
			$sumC3S5 += $c3['c3_s5'];
			$countC3S5++;
		}
		if(isset($c3['c3_s6']) && !empty($c3['c3_s6'])){ 
			$sumC3S6 += $c3['c3_s6'];
			$countC3S6++; 
		}
		if(isset($c3['c3_s7']) && !empty($c3['c3_s7'])){ 
			$sumC3S7 += $c3['c3_s7'];
			$countC3S7++;
		}
		if(isset($c3['c3_s8']) && !empty($c3['c3_s8'])){ 
			$sumC3S8 += $c3['c3_s8'];
			$countC3S8++;
		}
	}
	
	$criteriaThree =  array(
		"c3_s1"=>   array("val"=>$sumC3S1,"count"=>$countC3S1),
		"c3_s2"=> 	array("val"=>$sumC3S2,"count"=>$countC3S2),
		"c3_s3"=> 	array("val"=>$sumC3S3,"count"=>$countC3S3),
		"c3_s4"=> 	array("val"=>$sumC3S4,"count"=>$countC3S4),
		"c3_s5"=> 	array("val"=>$sumC3S5,"count"=>$countC3S5),
		"c3_s6"=> 	array("val"=>$sumC3S6,"count"=>$countC3S6),
		"c3_s7"=> 	array("val"=>$sumC3S7,"count"=>$countC3S7),
		"c3_s8"=> 	array("val"=>$sumC3S8,"count"=>$countC3S8)
	);
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
	 * delete Performance Assessment
	 *
	 * @return view 'assessment-listing.php'
	 */
	public function delete()
	{
		$input = $this->input->get();
		$del = $this->Assessment_model->delete($input);
		// $del = true;
		if($del){
			$this->session->set_flashdata('success', 'Delete successfully');
			redirect('module/assessment/assessment-listing');
		}else{
			$this->session->set_flashdata('error', 'Operation failed');
			redirect('module/assessment/assessment-listing');
		}
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
			$criteriaRating+= ($rating['count'] > 0) ? ($rating['val'] /  $rating['count']) : 0;
		}
		
		return (round((round($criteriaRating, 1)/$number),1,PHP_ROUND_HALF_ODD));
	}

  public function add_self_assessment_data()
	{
		$self_assessment_id = $this->Assessment_model->add_self_assessment_data($_POST);

		redirect('module/assessment/assessment?sid='.$self_assessment_id.'&aid='.$_POST['affiliate_id'].'&uid='.$this->session->user_id);
  }

  public function censusexport(){

	$data = $this->input->get();
	
	$report_year_data  = $data['year'];
	if($report_year_data){
		$report_year = $report_year_data;
	}else{
		$report_year = "2023";
	}
	$status       = $data['status'];
	$affiliate_id = $data['affiliate'];

	$report_details = $this->Affiliate_model->report_details($report_id);
	$service_area_main = $this->Affiliate_model->service_areas($report_id);

	$report_data = $this->Affiliate_model->census_report($report_year, $affiliate_id, $status);
	$service_data = $this->Affiliate_model->service_areas_details($service_area_main[0]['pk_id']);

	  $affiliate_details = $this->Assessment_model->affiliate_details($_GET);
	  $data['affiliate_details'] = $affiliate_details;	  

	  $ids = array("selfAssessmentId"=> $_GET['sid'], "affiliateId"=> $_GET['aid'],"userId"=>$user_id);
	  $data['criteria_answers_view'] = $this->Assessment_model->criteria_answers_view($ids);	  

	  $data['totalrating'] = $this->rating($_GET['sid'],$_GET['aid'],$user_id);

		  $data['footer']['js'] = array(
			  'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
			  'https://unpkg.com/mustache@latest',
			  'vendor/bootstrap-datetimepicker.js',
			  'pages/modules/assessment_pdf.js',
		  );

	  $items=array();
	  $templateProcessor = new TemplateProcessor('resources/template/CensusReport.docx');	

	  $templateProcessor->cloneBlock('array', count($report_data));

	  foreach($report_data as $key => $value){
		
		$templateProcessor->setValue('affnames',  strtoupper(str_replace("&","and",$report_data[$key]['organization'])),1);		
		$templateProcessor->setValue('ceo', $report_data[$key]['field_number_of_years_as_ceo'],1);
		$templateProcessor->setValue('name', ($report_data[$key]['field_president_ceo_first_name']." ".$report_data[$key]['field_president_ceo_middle_name']." ".$report_data[$key]['field_president_ceo_last_name']),1);
		$templateProcessor->setValue('d_e', $report_data[$key]['field_date_established'],1);	
		$templateProcessor->setValue('cell_add', $report_data[$key]['field_email_address'],1);		
		$templateProcessor->setValue('year_service', $report_data[$key]['field_number_of_years_of_service'],1);		
		$templateProcessor->setValue('field_telephone', $report_data[$key]['field_telephone'],1);
		$templateProcessor->setValue('field_fax', $report_data[$key]['field_fax'],1);		
		$templateProcessor->setValue('address_line', $report_data[$key]['field_address_line_1'],1);
		$templateProcessor->setValue('population', $service_data[$key]['field_service_area_population'],1);  
		$templateProcessor->setValue('white', $service_data[$key]['field_service_area_white'],1);		
		$templateProcessor->setValue('hispanic', $service_data[$key]['field_service_area_hispanic'],1);  
		$templateProcessor->setValue('african', $service_data[$key]['field_service_area_african_am'],1);  
		$templateProcessor->setValue('asian', $service_data[$key]['field_service_area_asian_am'],1);		
		$templateProcessor->setValue('native', $service_data[$key]['field_service_area_native_am'],1);
		$templateProcessor->setValue('total_exp', number_format($report_data[$key]['field_total_expenditures'],2),1);  
		$templateProcessor->setValue('salary_wages', number_format($report_data[$key]['field_a_salaries_wages'],2),1);  
		$templateProcessor->setValue('fringe_benefits', number_format($report_data[$key]['field_b_fringe_benefits'],2),1);  
		$templateProcessor->setValue('professional_fees', number_format($report_data[$key]['field_c_professional_fees'],2),1);  
		$templateProcessor->setValue('travel', number_format($report_data[$key]['field_d_travel'],2),1);  
		$templateProcessor->setValue('postage', number_format($report_data[$key]['field_e_postage_freight'],2),1);  
		$templateProcessor->setValue('insurance', number_format($report_data[$key]['field_f_insurance'],2),1);  
		$templateProcessor->setValue('interest_payments', number_format($report_data[$key]['field_g_interest_payments'],2),1);  
		$templateProcessor->setValue('subscription', number_format($report_data[$key]['field_h_dues_subscription_regist'],2),1);
		$templateProcessor->setValue('depreciation', number_format($report_data[$key]['field_i_depreciation'],2),1);  
		$templateProcessor->setValue('taxes', number_format($report_data[$key]['field_j_taxes_including_property'],2),1);  
		$templateProcessor->setValue('utilities', number_format($report_data[$key]['field_k_utilities'],2),1);  
		$templateProcessor->setValue('equipment', number_format($report_data[$key]['field_l_equipment_space_rental'],2),1);  
		$templateProcessor->setValue('goods', number_format($report_data[$key]['field_m_goods_and_services'],2),1);	    
		$templateProcessor->setValue('mortgage', number_format($report_data[$key]['field_n_rent_mortgage_payments'],2),1);
		$templateProcessor->setValue('other_exp', number_format($report_data[$key]['field_o_other'],2),1);	    
		$templateProcessor->setValue('rent_exp', number_format($report_data[$key]['field_number_properties_rented'],2),1);  
		$templateProcessor->setValue('corporations', number_format($report_data[$key]['field_revenue_corporations'],2),1);
		$templateProcessor->setValue('foundations', number_format($report_data[$key]['field_revenue_foundations'],2),1);  
		$templateProcessor->setValue('ind_mem', number_format($report_data[$key]['field_revenue_individual_members'],2),1);  
		$templateProcessor->setValue('spcl_events', number_format($report_data[$key]['field_revenue_special_events'],2),1);  
		$templateProcessor->setValue('united_way', number_format($report_data[$key]['field_revenue_united_way'],2),1);  
		$templateProcessor->setValue('federal', number_format($report_data[$key]['field_revenue_federal'],2),1);  
		$templateProcessor->setValue('local_revenue', number_format($report_data[$key]['field_revenue_state_local'],2),1);  
		$templateProcessor->setValue('other_revenue', number_format($report_data[$key]['field_revenue_other'],2),1);  
		$templateProcessor->setValue('nul_revenue', number_format($report_data[$key]['field_revenue_nul'],2),1);  
		$templateProcessor->setValue('inv_earnings', number_format($report_data[$key]['field_revenue_investment'],2),1);
		$templateProcessor->setValue('website', $report_data[$key]['field_affiliate_website_address'],1);
		$templateProcessor->setValue('capital_budget', number_format($report_data[$key]['field_capital_budget_amount'],2),1);	
		$templateProcessor->setValue('ft_emp', $report_data[$key]['field_full_time_employees'],1);	  
		$templateProcessor->setValue('pt_emp', $report_data[$key]['field_part_time_employees'],1);	
		
		if($report_data[$key]['field_photo_title'] == ""){
	 		$templateProcessor->setValue('IMAGE', "");
	 	  }else{
		$templateProcessor->setImageValue('IMAGE', array('path' => $report_data[$key]['field_photo_title']));
		  }

		$vol_emp_data = $report_data[$key]['field_board_member_grand_total'];
	  	if($vol_emp_data != ""){
			$templateProcessor->setValue('vol_emp_data', $vol_emp_data,1);	
	  	}else{ $templateProcessor->setValue('vol_emp_data', "N/A",1); }

		$civic_edu_data = $report_data[$key]['field_voter_registration'];
		if($civic_edu_data == "1"){
			$templateProcessor->setValue('civic_edu_pgm', "voter_registration : Yes",1);	
		}else{ $templateProcessor->setValue('civic_edu_pgm', "voter_registration : N/A",1); }
		  
		$civic_com_data = $report_data[$key]['field_community_forums'];
		if($civic_com_data == "1"){
			$templateProcessor->setValue('civic_com_pgm', "Community Programs : Yes",1);	
		}else{ $templateProcessor->setValue('civic_com_pgm', "Community Programs : N/A",1); }

		$civic_crja_data = $report_data[$key]['field_crja'];
	  	if($civic_crja_data == "1"){
			$templateProcessor->setValue('civic_crja_pgm', "Civil Rights And Racial Justice Activities : Yes",1);	
	  	}else{ $templateProcessor->setValue('civic_crja_pgm', "Civil Rights And Racial Justice Activities : N/A",1); }
	  
		$civic_pb_data = $report_data[$key]['field_police_brutality'];
		if($civic_pb_data == "1"){
			$templateProcessor->setValue('civic_pb_pgm', "Police Brutality : Yes");	
		}else{ $templateProcessor->setValue('civic_pb_pgm', "Police Brutality : N/A"); }

		$civic_adv_data = $report_data[$key]['field_advocacy_efforts'];
	  	if($civic_adv_data == "1"){
			$templateProcessor->setValue('civic_adv_pgm', "Advocacy : Yes",1);	
	  	}else{ $templateProcessor->setValue('civic_adv_pgm', "Advocacy : N/A",1); }
	  
	  	$vol_young_data = $report_data[$key]['field_ypc_members'];
	  	if($vol_young_data != ""){
			$templateProcessor->setValue('vol_young_data', $vol_young_data,1);	
	  	}else{ $templateProcessor->setValue('vol_young_data', "N/A",1); }
	  
	  	$vol_oth_data = $report_data[$key]['field_aux_members'];
	  	if($vol_oth_data != ""){
			$templateProcessor->setValue('vol_oth_data', $vol_oth_data,1);	
	  	}else{ $templateProcessor->setValue('vol_oth_data', "N/A",1); } 
	  
	  	$vol_guild_data = $report_data[$key]['field_guild_members'];
	  	if($vol_guild_data != ""){
			$templateProcessor->setValue('vol_guild_data', $vol_guild_data,1);	
	  	}else{ $templateProcessor->setValue('vol_guild_data', "N/A",1); }

		$pgm_title = explode(',',$report_data[$key]['program_titles']);
		$pgm_area_id = explode(',',$report_data[$key]['program_areas']);
		$edu_count = array_count_values($pgm_area_id)[494];
		$ent_count = array_count_values($pgm_area_id)[495];
		$hel_count = array_count_values($pgm_area_id)[496];
		$oth_count = array_count_values($pgm_area_id)[498];
		$wor_count = array_count_values($pgm_area_id)[499];
		$hou_count = array_count_values($pgm_area_id)[497];
		$templateProcessor->cloneBlock('CLONEME', $edu_count);
		$templateProcessor->cloneBlock('ENTRE', $ent_count);
		$templateProcessor->cloneBlock('HEALTH', $hel_count);
		$templateProcessor->cloneBlock('OTHER', $oth_count);
		$templateProcessor->cloneBlock('WORK', $wor_count);
		$templateProcessor->cloneBlock('HOUSE', $hou_count);
		
		$newArray = array();
		for ($i = 0; $i < count($pgm_title); $i++) {
			$newArray[] = $pgm_title[$i] . ' = ' . $pgm_area_id[$i];
		}

		foreach($newArray as $key => $value){
			str_replace("&","and",$newArray[$key]);
			if(str_contains($newArray[$key], '494')) { 
			  	$templateProcessor->setValue('education_prg', str_replace("= 494"," ", str_replace("&", "AND", $newArray[$key])), 1);
			}elseif(str_contains($newArray[$key], '496')) { 
				$templateProcessor->setValue('health_prg_data', str_replace("= 496"," ", str_replace("&", "AND", $newArray[$key])), 1);
			}elseif(str_contains($newArray[$key], '495')) { 
				$templateProcessor->setValue('entre_pgm', str_replace("= 495"," ", str_replace("&", "AND", $newArray[$key])), 1);
			}elseif(str_contains($newArray[$key], '498')) { 
				$templateProcessor->setValue('other_pgm', str_replace("= 498"," ", str_replace("&", "AND", $newArray[$key])), 1);
			}elseif(str_contains($newArray[$key], '499')) { 
				$templateProcessor->setValue('work_pgm', str_replace("= 499"," ", str_replace("&", "AND", $newArray[$key])), 1);
			}elseif(str_contains($newArray[$key], '497')) { 
				$templateProcessor->setValue('house_pgm', str_replace("= 497"," ", str_replace("&", "AND", $newArray[$key])), 1);
			}			
		}

		$templateProcessor->setValue('pageBreak', '</w:t></w:r>'.'<w:r><w:br w:type="page"/></w:r>' . '<w:r><w:t>');
		
	  } 	
	  
	  $fileName = "Census Reports";
	  $templateProcessor->saveAs($fileName . '.docx');

	  
	  $file = '/tmp/'.$fileName.'.docx';

	  if (file_exists($file)) {
		  header('Content-Disposition: attachment; filename="'.basename($fileName.'.docx').'"');
		  header('Expires: 0');
		  header('Cache-Control: must-revalidate');
		  header('Pragma: public');
		  header('Content-Length: ' . filesize($file));
		  readfile($file);
		  unlink($file);
		  exit;
	  }  
  }

  public function contactinfoexports()
  {
  
	$report_id = $this->uri->segment('4');
	$report_details = $this->Affiliate_model->report_details($report_id);
	$service_area_main = $this->Affiliate_model->service_areas($report_id);

	$report_data = $this->Affiliate_model->census_report_data($report_id);
	$service_data = $this->Affiliate_model->service_areas_details($service_area_main[0]['pk_id']);
	$report_statuses = $this->Affiliate_model->census_report_statuses();
	$education_data = $this->Affiliate_model->education_prg($report_id);
	$expenditure_data = $this->Affiliate_model->expenditure($report_id);
	$revenue_data = $this->Affiliate_model->revenue($report_id);
	$employee_data = $this->Affiliate_model->employees_board($report_id);
	$community_data = $this->Affiliate_model->community_relations($report_id);
	$other_prg_data = $this->Affiliate_model->other_prg($report_id);
	$education_pgm_data = $this->Affiliate_model->get_programs($education_data[0]['field_parent_census'],EDUCATION_PROGRAM_ID);
	$other_pgm_data = $this->Affiliate_model->get_programs($education_data[0]['field_parent_census'],OTHER_PROGRAM_ID);
	$health_pgm_data = $this->Affiliate_model->get_programs($education_data[0]['field_parent_census'],HEALTH_PROGRAM_ID);
	$housing_pgm_data = $this->Affiliate_model->get_programs($education_data[0]['field_parent_census'],HOUSING_PROGRAM_ID);
	$workforce_pgm_data = $this->Affiliate_model->get_programs($education_data[0]['field_parent_census'],WORKFORCE_PROGRAM_ID);
	$entrepreneurship_pgm_data = $this->Affiliate_model->get_programs($education_data[0]['field_parent_census'],ENTREPRENEURSHIP_PROGRAM_ID);
	$civic_pgm_data = $this->Affiliate_model->civic_data($report_id);
	$volunteer_data = $this->Affiliate_model->volunteer_data($report_id);
	$community_relation_method_ad_market = $this->Affiliate_model->get_community_relation_method_ad_market($report_id);	  

	  $affiliate_details = $this->Assessment_model->affiliate_details($_GET);
	  $data['affiliate_details'] = $affiliate_details;	  

	  $ids = array("selfAssessmentId"=> $_GET['sid'], "affiliateId"=> $_GET['aid'],"userId"=>$user_id);
	  $data['criteria_answers_view'] = $this->Assessment_model->criteria_answers_view($ids);	  

	  $data['totalrating'] = $this->rating($_GET['sid'],$_GET['aid'],$user_id);

		  $data['footer']['js'] = array(
			  'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
			  'https://unpkg.com/mustache@latest',
			  'vendor/bootstrap-datetimepicker.js',
			  'pages/modules/assessment_pdf.js',
		  );

	  $items=array();
	  $templateProcessor = new TemplateProcessor('resources/template/Affiliate Detail.docx');	
	  
	  $templateProcessor->cloneBlock('CLONEME', count($education_pgm_data));
	  $templateProcessor->cloneBlock('HEALTH', count($health_pgm_data));
	  $templateProcessor->cloneBlock('OTHER', count($other_pgm_data));
	  $templateProcessor->cloneBlock('ENTRE', count($entrepreneurship_pgm_data));
	  $templateProcessor->cloneBlock('WORK', count($workforce_pgm_data));
	  $templateProcessor->cloneBlock('HOUSE', count($housing_pgm_data));
	  $templateProcessor->cloneBlock('PRG_SER', count($education_pgm_data));

	$field_program_served_totals = array_map(function($item) {
		return $item['field_program_served_total'];
	}, $education_pgm_data);
	
	$edu_prg_ser = implode(',', $field_program_served_totals);
	
	$field_program_served_totals_oth = array_map(function($item) {
		return $item['field_program_served_total'];
	}, $other_pgm_data);

	$other_prg_ser = implode(',', $field_program_served_totals_oth);
	
	$field_method_of_ad_marketing_comm = array_map(function($item) {
		return $item['field_method_of_ad_marketing'];
	}, $community_relation_method_ad_market);

	$comm_method = implode(',', $field_method_of_ad_marketing_comm);

	$field_program_served_totals_entre = array_map(function($item) {
		return $item['field_program_served_total'];
	}, $entrepreneurship_pgm_data);

	$field_program_served_totals_work = array_map(function($item) {
		return $item['field_program_served_total'];
	}, $workforce_pgm_data);

	$field_program_served_totals_house = array_map(function($item) {
		return $item['field_program_served_total'];
	}, $housing_pgm_data);

	$combinedArray = array_merge($field_program_served_totals_entre, $field_program_served_totals_work, $field_program_served_totals_house);

	$economic_prg_ser = implode(' ,  ', $combinedArray);


	$templateProcessor->setValue('edu_prg_ser', $edu_prg_ser);
	$templateProcessor->setValue('other_prg_ser', $other_prg_ser);
	$templateProcessor->setValue('comm_method', $comm_method);
	$templateProcessor->setValue('economic_prg_ser', $economic_prg_ser);

	  foreach($education_pgm_data as $edu){
		$templateProcessor->setValue('test0', str_replace("&","and",$edu["title"]), 1);
	   }

	  foreach($health_pgm_data as $health_prg_data){
		$templateProcessor->setValue('health_prg_data', str_replace("&","and",$health_prg_data["title"]), 1);
	  }

	  foreach($other_pgm_data as $other_prg_datas){
		$templateProcessor->setValue('other_pgm', str_replace("&","and",$other_prg_datas["title"]), 1);
	  }

	  foreach($entrepreneurship_pgm_data as $entre_prg_datas){
		$templateProcessor->setValue('entre_pgm', str_replace("&","and",$entre_prg_datas["title"]), 1);

	  }

	  foreach($workforce_pgm_data as $work_prg_datas){
		$templateProcessor->setValue('work_pgm', str_replace("&","and",$work_prg_datas["title"]), 1);
	  }

	  foreach($housing_pgm_data as $house_prg_datas){
		$templateProcessor->setValue('house_pgm', str_replace("&","and",$house_prg_datas["title"]), 1);
	  }
	  
	   
	  $aff_name= $report_data[0]['organization'];
	  $templateProcessor->setValue('affnames',  strtoupper(str_replace("&","and",$aff_name)));		  
	  
	  $ceo= $report_data[0]['field_number_of_years_as_ceo'];
	  $templateProcessor->setValue('ceo', $ceo);
	  
	  $ceo= $report_data[0]['field_number_of_years_as_ceo'];
	  $templateProcessor->setValue('ceo', $ceo);

	  $name= $report_data[0]['field_president_ceo_first_name']." ".$report_data[0]['field_president_ceo_middle_name']." ".$report_data[0]['field_president_ceo_last_name'];
	  $templateProcessor->setValue('name', $name);		  

	  $date_established= $report_data[0]['field_date_established'];
	  $templateProcessor->setValue('d_e', $date_established);	

	  $field_email_address= $report_data[0]['field_email_address'];
	  $templateProcessor->setValue('cell_add', $field_email_address);
	  
	  $year_service= $report_data[0]['field_number_of_years_of_service'];
	  $templateProcessor->setValue('year_service', $year_service);
	  
	  $field_telephone= $report_data[0]['field_telephone'];
	  $templateProcessor->setValue('field_telephone', $field_telephone);

	  $field_fax= $report_data[0]['field_fax'];
	  $templateProcessor->setValue('field_fax', $field_fax);
	  
	  $field_address_line_1= $report_data[0]['field_address_line_1'];
	  $templateProcessor->setValue('address_line', $field_address_line_1);

	  foreach ($service_data as $key => $data) {

	  $field_service_area_city_county= $data['field_service_area_city_county'];
	  $templateProcessor->setValue('country', $field_service_area_city_county);
	  //print_r($field_service_area_city_county);
	  }

	  //die;

	  $field_service_area_population= $service_data[0]['field_service_area_population'];
	  $templateProcessor->setValue('population', $field_service_area_population);

	  $field_service_area_white= $service_data[0]['field_service_area_white'];
	  $templateProcessor->setValue('white', $field_service_area_white);
	  
	  $field_service_area_hispanic= $service_data[0]['field_service_area_hispanic'];
	  $templateProcessor->setValue('hispanic', $field_service_area_hispanic);

	  $field_service_area_african_am= $service_data[0]['field_service_area_african_am'];
	  $templateProcessor->setValue('african', $field_service_area_african_am);

	  $field_service_area_asian_am= $service_data[0]['field_service_area_asian_am'];
	  $templateProcessor->setValue('asian', $field_service_area_asian_am);
	  
	  $field_service_area_native_am= $service_data[0]['field_service_area_native_am'];
	  $templateProcessor->setValue('native', $field_service_area_native_am);
	  
	  $field_total_expenditures= $expenditure_data[0]['field_total_expenditures'];
	  $templateProcessor->setValue('total_exp', "$".number_format($field_total_expenditures,2));

	  $field_a_salaries_wages= $expenditure_data[0]['field_a_salaries_wages'];
	  $templateProcessor->setValue('salary_wages', "$".number_format($field_a_salaries_wages,2));

	  $field_b_fringe_benefits= $expenditure_data[0]['field_b_fringe_benefits'];
	  $templateProcessor->setValue('fringe_benefits', "$".number_format($field_b_fringe_benefits,2));

	  $field_c_professional_fees= $expenditure_data[0]['field_c_professional_fees'];
	  $templateProcessor->setValue('professional_fees', "$".number_format($field_c_professional_fees,2));

	  $field_d_travel= $expenditure_data[0]['field_d_travel'];
	  $templateProcessor->setValue('travel', "$".number_format($field_d_travel,2));

	  $field_e_postage_freight= $expenditure_data[0]['field_e_postage_freight'];
	  $templateProcessor->setValue('postage', "$".number_format($field_e_postage_freight,2));

	  $field_f_insurance= $expenditure_data[0]['field_f_insurance'];
	  $templateProcessor->setValue('insurance', "$".number_format($field_f_insurance,2));

	  $field_g_interest_payments= $expenditure_data[0]['field_g_interest_payments'];
	  $templateProcessor->setValue('interest_payments', "$".number_format($field_g_interest_payments,2));

	  $subscription= $expenditure_data[0]['field_h_dues_subscription_regist'];
	  $templateProcessor->setValue('subscription', "$".number_format($subscription,2));

	  $depreciation= $expenditure_data[0]['field_i_depreciation'];
	  $templateProcessor->setValue('depreciation', "$".number_format($depreciation,2));

	  $taxes= $expenditure_data[0]['field_j_taxes_including_property'];
	  $templateProcessor->setValue('taxes', "$".number_format($taxes,2));

	  $utilities= $expenditure_data[0]['field_k_utilities'];
	  $templateProcessor->setValue('utilities', "$".number_format($utilities,2));

	  $equipment= $expenditure_data[0]['field_l_equipment_space_rental'];
	  $templateProcessor->setValue('equipment', "$".number_format($equipment,2));

	  $goods= $expenditure_data[0]['field_m_goods_and_services'];
	  $templateProcessor->setValue('goods', "$".number_format($goods,2));	  

	  $mortgage= $expenditure_data[0]['field_n_rent_mortgage_payments'];
	  $templateProcessor->setValue('mortgage', "$".number_format($mortgage,2));	  

	  $field_o_other= $expenditure_data[0]['field_o_other'];
	  $templateProcessor->setValue('other_exp', "$".number_format($field_o_other,2));	  

	  $rent_exp= $expenditure_data[0]['field_number_properties_rented'];
	  $templateProcessor->setValue('rent_exp', "$".number_format($rent_exp,2));

	  $corporations= $revenue_data[0]['field_revenue_corporations'];
	  $templateProcessor->setValue('corporations', "$".number_format($corporations,2));

	  $foundations= $revenue_data[0]['field_revenue_foundations'];
	  $templateProcessor->setValue('foundations', "$".number_format($foundations,2));

	  $ind_mem= $revenue_data[0]['field_revenue_individual_members'];
	  $templateProcessor->setValue('ind_mem', "$".number_format($ind_mem,2));

	  $spcl_events= $revenue_data[0]['field_revenue_special_events'];
	  $templateProcessor->setValue('spcl_events', "$".number_format($spcl_events,2));

	  $united_way= $revenue_data[0]['field_revenue_united_way'];
	  $templateProcessor->setValue('united_way', "$".number_format($united_way,2));

	  $federal= $revenue_data[0]['field_revenue_federal'];
	  $templateProcessor->setValue('federal', "$".number_format($federal,2));

	  $local_revenue= $revenue_data[0]['field_revenue_state_local'];
	  $templateProcessor->setValue('local_revenue', "$".number_format($local_revenue,2));

	  $other_revenue= $revenue_data[0]['field_revenue_other'];
	  $templateProcessor->setValue('other_revenue', "$".number_format($other_revenue,2));

	  $nul_revenue= $revenue_data[0]['field_revenue_nul'];
	  $templateProcessor->setValue('nul_revenue', "$".number_format($nul_revenue,2));

	  $inv_earnings= $revenue_data[0]['field_revenue_investment'];
	  $templateProcessor->setValue('inv_earnings', "$".number_format($inv_earnings,2));		  
	  
	  $website= $community_data[0]['field_affiliate_website_address'];
	  $templateProcessor->setValue('website', $website);		  
	  
	  $education_pgm_data = $education_pgm_data[0]['title'];
	  $templateProcessor->setValue('education_pgm', $education_pgm_data);	
	  
	  $other_pgm_data = $other_pgm_data[0]['title'];
	  if($other_pgm_data != ""){
		$templateProcessor->setValue('civic_pgm', $other_pgm_data);	
	  }else{
		$templateProcessor->setValue('civic_pgm', "N/A");	
	  }
	  
	  $civic_edu_data = $civic_pgm_data[0]['field_voter_registration'];
	  if($civic_edu_data == "1"){
		$templateProcessor->setValue('civic_edu_pgm', "voter_registration : Yes");	
	  }	else{ $templateProcessor->setValue('civic_edu_pgm', "voter_registration : N/A"); }
	  
	  $civic_com_data = $civic_pgm_data[0]['field_community_forums'];
	  if($civic_com_data == "1"){
		$templateProcessor->setValue('civic_com_pgm', "Community Programs : Yes");	
	  }else{ $templateProcessor->setValue('civic_com_pgm', "Community Programs : N/A"); }
	  
	  $civic_crja_data = $civic_pgm_data[0]['field_crja'];
	  if($civic_crja_data == "1"){
		$templateProcessor->setValue('civic_crja_pgm', "Civil Rights And Racial Justice Activities : Yes");	
	  }else{ $templateProcessor->setValue('civic_crja_pgm', "Civil Rights And Racial Justice Activities : N/A"); }
	  
	  $civic_pb_data = $civic_pgm_data[0]['field_police_brutality'];
	  if($civic_pb_data == "1"){
		$templateProcessor->setValue('civic_pb_pgm', "Police Brutality : Yes");	
	  }else{ $templateProcessor->setValue('civic_pb_pgm', "Police Brutality : N/A"); }
	  
	  $civic_adv_data = $civic_pgm_data[0]['field_advocacy_efforts'];
	  if($civic_adv_data == "1"){
		$templateProcessor->setValue('civic_adv_pgm', "Advocacy : Yes");	
	  }else{ $templateProcessor->setValue('civic_adv_pgm', "Advocacy : N/A"); }
	  
	  $vol_young_data = $volunteer_data[0]['field_ypc_members'];
	  if($vol_young_data != ""){
		$templateProcessor->setValue('vol_young_data', $vol_young_data);	
	  }else{ $templateProcessor->setValue('vol_young_data', "N/A"); }
	  
	  $vol_oth_data = $volunteer_data[0]['field_aux_members'];
	  if($vol_oth_data != ""){
		$templateProcessor->setValue('vol_oth_data', $vol_oth_data);	
	  }else{ $templateProcessor->setValue('vol_oth_data', "N/A"); } 
	  
	  $vol_guild_data = $volunteer_data[0]['field_guild_members'];
	  if($vol_guild_data != ""){
		$templateProcessor->setValue('vol_guild_data', $vol_guild_data);	
	  }else{ $templateProcessor->setValue('vol_guild_data', "N/A"); }
	  
	  $vol_emp_data = $employee_data[0]['field_board_member_grand_total'];
	  if($vol_emp_data != ""){
		$templateProcessor->setValue('vol_emp_data', $vol_emp_data);	
	  }else{ $templateProcessor->setValue('vol_emp_data', "N/A"); }

	  $capital_amount = $expenditure_data[0]['field_capital_budget_amount'];
	  $templateProcessor->setValue('capital_budget', "$".number_format($capital_amount,2));	

	  $ft_emp = $employee_data[0]['field_full_time_employees'];
	  $templateProcessor->setValue('ft_emp', $ft_emp);	

	  $pt_emp = $employee_data[0]['field_part_time_employees'];
	  $templateProcessor->setValue('pt_emp', $pt_emp);	

	  //$templateProcessor->setValue('image', '<img src="opt/lampp/htdocs/nul_adms1/resources/images/demo.jpg">');
	  //$templateProcessor->setImageValue('IMAGE', array('path' => 'http://localhost/nul_adms1/resources/images/demo.jpg', 'media-type' => 'image/jpg'));

     $image_path = str_replace('./uploads/Documents/','',$report_data[0]['field_photo_title']);
	  $field_photo_title = $report_data[0]['field_photo_title'];
      //print_r($field_photo_title);die;
//      if($report_data[0]['field_photo_title']){
//	  	$templateProcessor->setImageValue('IMAGE', array('path' => $field_photo_title, 'media-type' => 'image/jpg'));
//	  }else{
//		$templateProcessor->setValue('IMAGE', "");	
//	  }
      if($report_data[0]['field_photo_title'] == ""){
        $templateProcessor->setValue('IMAGE', "");
	  	//$templateProcessor->setImageValue('IMAGE', array('path' => $field_photo_title, 'media-type' => 'image/jpg'));
	  }else{
        $templateProcessor->setImageValue('IMAGE', array('path' => $field_photo_title, 'media-type' => 'image/jpg'));
	  }

	  
	  
	  $fileName = $report_data[0]['field_year']." ". $aff_name;
	  $templateProcessor->saveAs($fileName . '.docx');

	  
	  $file = '/tmp/'.$fileName.'.docx';

	  if (file_exists($file)) {
		  header('Content-Disposition: attachment; filename="'.basename($fileName.'.docx').'"');
		  header('Expires: 0');
		  header('Cache-Control: must-revalidate');
		  header('Pragma: public');
		  header('Content-Length: ' . filesize($file));
		  readfile($file);
		  unlink($file);
		  exit;
	  }  
  }
  
}
