<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affiliate_model');
		$this->load->model('Document_model');
		//$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Show the home page
	 *
	 * @return view 'home.php'
	 */
	public function index()
	{
		$data['content'] = array(
			'affiliates' => $this->Affiliate_model->home_affiliate_filter(10, 0, NULL, NULL)
		);
		
		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js',
			'https://unpkg.com/mustache@latest',
			'vendor/moment.js',
			'vendor/bootstrap-datetimepicker.js',
			'pages/dashboard.js'
		);
		$data['notifications'] = $this->Document_model->get_notifications();
		if($this->session->role_id == 2){
			$filterWYear='';
			$filterWMonth='';
				if(isset($_REQUEST['year'])){
					$filterWYear = $_REQUEST['year'];
				}
				if(isset($_REQUEST['month'])){
					$filterWMonth = $_REQUEST['month'];
				}

			$data['content'] = array(
				'get_monthly_compliance' => $this->get_monthly_compliance($filterWMonth,$filterWYear),
				'get_quarterly_compliance_status' => $this->get_quarterly_compliance_status($filterWYear),
				'get_yearly_compliance_status' => $this->get_yearly_compliance_status($filterWMonth,$filterWYear),
				'document_listing' => $this->document_listing($filterWMonth,$filterWYear),
				'quarterly_document_listing' => $this->quarterly_document_listing($filterWYear),
				'yearly_document_listing' => $this->yearly_document_listing($filterWMonth,$filterWYear),
			);

			$data['user_notifications'] = $this->Document_model->user_notifications();
			$data['user_data'] = $this->Document_model->user_data();
			$data['affiliate'] = $this->Affiliate_model->get_affiliate_by_id($this->session->affiliate_id);
			//Name of the view file
			$data['view_name'] = 'affiliate_home.php';

		}else{
			//Name of the view file
			$data['view_name'] = 'home';
		}

		$this->load->view('template', $data);
	
	}

	/**
	 * showing monthly compliance on Dashboard
	 *
	 * @return void
	 */
	public function get_monthly_compliance($filterWMonth,$filterWYear){

		if($filterWMonth && $filterWYear){
			$oneMB = ltrim(date("m",strtotime("-1 Months")), "0");  //oneMb means One month before
			$twoMB = ltrim(date("m",strtotime("-2 Months")), "0"); 
			$threeMB = ltrim(date("m",strtotime("-3 Months")), "0"); 
			$fourMB = ltrim(date("m",strtotime("-4 Months")), "0");
		}else{
			$oneMB = ltrim(date("m",strtotime("-1 Months")), "0");  //oneMb means One month before
			$twoMB = ltrim(date("m",strtotime("-2 Months")), "0"); 
			$threeMB = ltrim(date("m",strtotime("-3 Months")), "0"); 
			$fourMB = ltrim(date("m",strtotime("-4 Months")), "0");
		}
		
		$get_monthly_compliance['status'][$oneMB] = $this->Document_model->monthly_compliance_status($oneMB,$filterWYear);
		$get_monthly_compliance['status'][$twoMB] = $this->Document_model->monthly_compliance_status($twoMB,$filterWYear);
		$get_monthly_compliance['status'][$threeMB] = $this->Document_model->monthly_compliance_status($threeMB,$filterWYear);
		$get_monthly_compliance['status'][$fourMB] = $this->Document_model->monthly_compliance_status($fourMB,$filterWYear);

		return $get_monthly_compliance;
	}

	/**
	 * showing quarterly compliance status on Dashboard
	 *
	 * @return void
	 */
	public function get_quarterly_compliance_status($filterWYear){
		
		if($filterWYear){
			$filterWYear = $filterWYear;
		}else{
			$filterWYear='';
		}
		$get_quarterly_compliance_status['status'][1] = $this->Document_model->quarterly_compliance_status(1,$filterWYear);
		$get_quarterly_compliance_status['status'][2] = $this->Document_model->quarterly_compliance_status(2,$filterWYear);
		$get_quarterly_compliance_status['status'][3] = $this->Document_model->quarterly_compliance_status(3,$filterWYear);
	    $get_quarterly_compliance_status['status'][4] = $this->Document_model->quarterly_compliance_status(4,$filterWYear);
		return $get_quarterly_compliance_status;

	}

	/**
	 * showing quarterly compliance status on Dashboard
	 *
	 * @return void
	 */
	public function get_yearly_compliance_status($filterWYear){

		if($filterWYear){

			$oneYB = date('Y', strtotime('-1 year', strtotime($filterWYear.'-01-01')));
			$twoYB = date('Y', strtotime('-2 year', strtotime($filterWYear.'-01-01')));
			$threeYB = date('Y', strtotime('-3 year', strtotime($filterWYear.'-01-01')));
			$fourYB = date('Y', strtotime('-4 year', strtotime($filterWYear.'-01-01')));
		}else{
			$oneYB = date("Y",strtotime("-1 years")); //oneYB means One year before
			$twoYB = date("Y",strtotime("-2 years"));
			$threeYB = date("Y",strtotime("-3 years"));
			$fourYB = date("Y",strtotime("-4 years"));
		}
		

		$get_yearly_compliance_status['status'][1] = $this->Document_model->yearly_compliance_status($oneYB);
		$get_yearly_compliance_status['status'][2] = $this->Document_model->yearly_compliance_status($twoYB);
		$get_yearly_compliance_status['status'][3] = $this->Document_model->yearly_compliance_status($threeYB);
		$get_yearly_compliance_status['status'][4] = $this->Document_model->yearly_compliance_status($fourYB);

		return $get_yearly_compliance_status;

	}

	/**
	 * showing monthly document listing on Dashboard
	 *
	 * @return void
	 */
	public function document_listing($filterWMonth,$filterWYear){

		if($filterWMonth && $filterWYear){
			$oneMB = ltrim(date("m",strtotime("-1 Months")), "0");  //oneMb means One month before
			$twoMB = ltrim(date("m",strtotime("-2 Months")), "0"); 
			$threeMB = ltrim(date("m",strtotime("-3 Months")), "0"); 
			$fourMB = ltrim(date("m",strtotime("-4 Months")), "0");
		}else{
			$oneMB = ltrim(date("m",strtotime("-1 Months")), "0");  //oneMb means One month before
			$twoMB = ltrim(date("m",strtotime("-2 Months")), "0"); 
			$threeMB = ltrim(date("m",strtotime("-3 Months")), "0"); 
			$fourMB = ltrim(date("m",strtotime("-4 Months")), "0");
		}

		$oneMB = ltrim(date("m",strtotime("-1 Months")), "0");  //OneMB means one month before
		$twoMB = ltrim(date("m",strtotime("-2 Months")), "0"); 
		$threeMB = ltrim(date("m",strtotime("-3 Months")), "0"); 
		$fourMB = ltrim(date("m",strtotime("-4 Months")), "0");
		$document_listing = $this->Document_model->get_documents(1, array(6));

		foreach( $document_listing as $key=>$listing){
			
			$document_listing[$key]['status'][$oneMB] = $this->Document_model->monthly_status($oneMB,$filterWYear,$listing['document_id']);
			$document_listing[$key]['status'][$twoMB] = $this->Document_model->monthly_status($twoMB,$filterWYear,$listing['document_id']);
			$document_listing[$key]['status'][$threeMB] = $this->Document_model->monthly_status($threeMB,$filterWYear,$listing['document_id']);
			$document_listing[$key]['status'][$fourMB] = $this->Document_model->monthly_status($fourMB,$filterWYear,$listing['document_id']);

		}
		return $document_listing;

	}

	/**
	 * showing quarterly document listing on Dashboard 
	 *
	 * @return void
	 */
	public function quarterly_document_listing($filterWYear){

		if($filterWYear){
			$filterWYear = $filterWYear;
		}else{
			$filterWYear='';
		}
		$quarterly_document_listing = $this->Document_model->get_documents(2, array(8));

		   foreach($quarterly_document_listing as $key=>$listing){
				$quarterly_document_listing[$key]['status'][1] = $this->Document_model->get_quarter_status(1,$filterWYear,$listing['document_id']);
				$quarterly_document_listing[$key]['status'][2] = $this->Document_model->get_quarter_status(2,$filterWYear,$listing['document_id']);
				$quarterly_document_listing[$key]['status'][3] = $this->Document_model->get_quarter_status(3,$filterWYear,$listing['document_id']);
				$quarterly_document_listing[$key]['status'][4] = $this->Document_model->get_quarter_status(4,$filterWYear,$listing['document_id']);
			}
		return $quarterly_document_listing;

	}

	/**
	 * showing yearly document listing on Dashboard 
	 *
	 * @return void
	 */
	public function yearly_document_listing($filterWYear){

		if($filterWYear){

			$oneYB = date('Y', strtotime('-1 year', strtotime($filterWYear.'-01-01')));
			$twoYB = date('Y', strtotime('-2 year', strtotime($filterWYear.'-01-01')));
			$threeYB = date('Y', strtotime('-3 year', strtotime($filterWYear.'-01-01')));
			$fourYB = date('Y', strtotime('-4 year', strtotime($filterWYear.'-01-01')));
		}else{
			$oneYB = date("Y",strtotime("-1 years")); //oneYB means One year before
			$twoYB = date("Y",strtotime("-2 years"));
			$threeYB = date("Y",strtotime("-3 years"));
			$fourYB = date("Y",strtotime("-4 years"));
		}

	$yearly_document_listing = $this->Document_model->get_documents(3, array(14));

			foreach($yearly_document_listing as $key=>$listing){
				$yearly_document_listing[$key]['status'][1] = $this->Document_model->get_yearly_status($oneYB,$listing['document_id']);
				$yearly_document_listing[$key]['status'][2] = $this->Document_model->get_yearly_status($twoYB,$listing['document_id']);
				$yearly_document_listing[$key]['status'][3] = $this->Document_model->get_yearly_status($threeYB,$listing['document_id']);
				$yearly_document_listing[$key]['status'][4] = $this->Document_model->get_yearly_status($fourYB,$listing['document_id']);
			}
	     return $yearly_document_listing;

	}
	
	/**
	 * Showing filtered affiliates on Dashboard
	 *
	 * @return void
	 */
	public function filter_affiliates()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$status = $search = NULL;
		
		if( isset($data['compliance_status']) && ($data['compliance_status'] !== '') )
			$status =  $data['compliance_status'];
		
		if( isset($data['search']) && ($data['search'] !== '') )
			$search =  $data['search'];
		
		$affiliates = $this->Affiliate_model->home_affiliate_filter(10, 0, $status, $search);

		echo json_encode(array('affiliates' => $affiliates));
	}
}
