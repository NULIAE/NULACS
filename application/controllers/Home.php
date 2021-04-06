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
			'pages/dashboard.js'
		);
		$data['notifications'] = $this->Document_model->get_notifications();
		if($this->session->role_id == 2 || $this->session->role_id == 3){
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
			$data['affiliate']['board_member'] = $this->User_model->get_board_member($this->session->affiliate_id);
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
			$base = strtotime($filterWYear.'-'.$filterWMonth.'-01 00:00:01');
		}else{
			$base = strtotime(date('Y-m',time()) . '-01 00:00:01');
		}
		$oneMB = explode("-", date("n-Y",strtotime("-1 Months", $base)));  //oneMb means One month before
		$twoMB = explode("-", date("n-Y",strtotime("-2 Months", $base))); 
		$threeMB = explode("-", date("n-Y",strtotime("-3 Months", $base))); 
		$fourMB = explode("-", date("n-Y",strtotime("-4 Months", $base)));
		
		$get_monthly_compliance['status'][$oneMB[0]] = $this->Document_model->monthly_compliance_status($oneMB[0],$oneMB[1]);
		$get_monthly_compliance['status'][$twoMB[0]] = $this->Document_model->monthly_compliance_status($twoMB[0],$twoMB[1]);
		$get_monthly_compliance['status'][$threeMB[0]] = $this->Document_model->monthly_compliance_status($threeMB[0],$threeMB[1]);
		$get_monthly_compliance['status'][$fourMB[0]] = $this->Document_model->monthly_compliance_status($fourMB[0],$fourMB[1]);

		return $get_monthly_compliance;
	}

	/**
	 * showing quarterly compliance status on Dashboard
	 *
	 * @return void
	 */
	public function get_quarterly_compliance_status($filterWYear){
		
		if(!isset($filterWYear)){
			$filterWYear = date("Y",strtotime("-4 Months"));
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
			$base = strtotime($filterWYear.'-'.$filterWMonth.'-01 00:00:01');
		}else{
			$base = strtotime(date('Y-m',time()) . '-01 00:00:01');
		}
		$oneMB = explode("-", date("n-Y",strtotime("-1 Months", $base)));  //oneMb means One month before
		$twoMB = explode("-", date("n-Y",strtotime("-2 Months", $base))); 
		$threeMB = explode("-", date("n-Y",strtotime("-3 Months", $base))); 
		$fourMB = explode("-", date("n-Y",strtotime("-4 Months", $base)));

		$document_listing = $this->Document_model->get_documents(1, array(6));

		foreach( $document_listing as $key=>$listing){
			
			$document_listing[$key]['status'][$oneMB[0]] = $this->Document_model->monthly_status($oneMB[0],$oneMB[1],$listing['document_id']);
			$document_listing[$key]['status'][$twoMB[0]] = $this->Document_model->monthly_status($twoMB[0],$twoMB[1],$listing['document_id']);
			$document_listing[$key]['status'][$threeMB[0]] = $this->Document_model->monthly_status($threeMB[0],$threeMB[1],$listing['document_id']);
			$document_listing[$key]['status'][$fourMB[0]] = $this->Document_model->monthly_status($fourMB[0],$fourMB[1],$listing['document_id']);

		}
		return $document_listing;

	}

	/**
	 * showing quarterly document listing on Dashboard 
	 *
	 * @return void
	 */
	public function quarterly_document_listing($filterWYear){

		if(!isset($filterWYear)){
			$filterWYear = date("Y",strtotime("-4 Months"));
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
