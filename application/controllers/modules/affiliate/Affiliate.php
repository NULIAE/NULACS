<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Affiliate extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affiliate_model');
		$this->load->model('Document_model');
		//$this->output->enable_profiler(TRUE);
	}

	/**
	 * Show the Affiliate list page
	 *
	 * @return view 'modules/affiliate/list_affiliates.php'
	 */
	public function index()
	{
		$data['content'] = array(
			'regions'	 => $this->User_model->get_all_regions(),
			'states' 	 => $this->Affiliate_model->get_all_states()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/affiliate/list_affiliates';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/filter_affiliates.js'
		);
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}

	
	/**
	 * Filter affiliate list
	 *
	 * @return json List of Affiliates
	 */
	public function filter()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$filters = array();

		if( isset($data['region']) && ($data['region'] !== '') )
			$filters['affiliate.region_id'] =  $data['region'];
		
		if( isset($data['aname']) && ($data['aname'] !== '') )
			$filters['affiliate.organization'] =  $data['aname'];

		if( empty($filters) )
			$filters = NULL;

		if(!isset($data['per_page']))
			$data['per_page'] = 0;
		
		if(!isset($data['page_items']))
			$data['page_items'] = NULL;

		$result = $this->_get_paginated_affiliates($data['per_page'], $filters, $data['page_items']);

		echo json_encode($result);
		
	}
	
	/**
	 * Filter affiliates using conditions and display via pages
	 *
	 * @param  int $page_number
	 * @param  array $filters
	 * @param  int $page_items
	 * @return array
	 */
	private function _get_paginated_affiliates($page_number = NULL, $filters = NULL, $page_items = NULL)
	{
		$this->load->library('pagination');

		//Load default pagination configurations
		$this->config->load('pagination');
		$config = $this->config->item('pagination'); 
		
		//Override necessary configurations for pagination
		$config['base_url'] = isset($base_url) ? $base_url : base_url('module/affiliate/filter');
		$config['total_rows'] = $this->Affiliate_model->get_affiliate_count($filters);
		$config['per_page'] = ($page_items !== NULL) ? $page_items : $config['per_page'];

		$this->pagination->initialize($config);
		
		$page_number = ($page_number !== NULL) ? $page_number : 0;

		$affiliates = $this->Affiliate_model->get_all_affiliates($config['per_page'], $page_number, $filters, TRUE);

		return array('affiliates' => $affiliates, 'pagination' => $this->pagination->create_links());
	}

	
	/**
	 * Show affiliate add form page
	 *
	 * @return view 'modules/affiliate/add_affiliate.php'
	 */
	public function add_form()
	{
		$data['content'] = array(
			'regions' => $this->User_model->get_all_regions(),
			'states' => $this->Affiliate_model->get_all_states()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/affiliate/add_affiliate';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/modules/add_affiliate.js');
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}

	/**
	 * Create new affiliate
	 *
	 * @return json
	 */
	public function insert()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);

		//Financial year ending date
		$year_end = $data['year_end'];

		unset($data['year_end']);

		//Add new affiliate
		$affiliate_id = $this->Affiliate_model->insert($data);

		$status = $message = NULL;

		if ( $affiliate_id !== FALSE )
		{
			$this->Affiliate_model->add_financial_year($affiliate_id, $year_end);

			$log_data = array(
				'user_id' => $this->session->user_id,
				'affiliate_id' => $this->session->affiliate_id,
				'record_id'	=> $affiliate_id,
				'note' => 'New affiliate added'
			);
	
			//Log user activities
			$this->User_model->user_log($log_data);
			
			//New affiliate added
			$status = TRUE;
			$message = 'Affiliate has been saved successfully.';

			$this->session->set_flashdata('message', $message);
		}
		else
		{
			//Failed to add new user.
			$status = FALSE;
			$message = 'Something went wrong. Try again later.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}

	/**
	 * Show affiliate edit form page
	 *
	 * @return view 'modules/affiliate/edit_affiliate.php'
	 */
	public function edit_form($affiliate_id)
	{
		$data['content'] = array(
			'affiliate' => $this->Affiliate_model->get_affiliate_by_id($affiliate_id),
			'users' => $this->Affiliate_model->get_affiliate_users($affiliate_id),
			'regions' => $this->User_model->get_all_regions(),
			'states' => $this->Affiliate_model->get_all_states()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/affiliate/edit_affiliate';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/modules/edit_affiliate.js');
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}

	/**
	 * Update the details of an Affiliate
	 *
	 * @return json
	 */
	public function update()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		$status = $message = NULL;

		if ( $this->Affiliate_model->update($data) )
		{
			
			$log_data = array(
				'user_id' => $this->session->user_id,
				'affiliate_id' => $this->session->affiliate_id,
				'record_id'	=> $data['affiliate_id'],
				'note' => 'Affiliate details updated'
			);
	
			//Log user activities
			$this->User_model->user_log($log_data);
			
			//New affiliate added
			$status = TRUE;
			$message = 'Affiliate details updated successfully.';

			$this->session->set_flashdata("message", $message);
		}
		else
		{
			//Failed to add new user.
			$status = FALSE;
			$message = 'Something went wrong. Try again later.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}

	public function status()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$where = (isset($data["region_id"]) && ($data["region_id"] !="")) ? array("affiliate.region_id" => $data["region_id"]) : NULL;

		$data['content'] = array(
			'monthly_status' => $this->get_monthly_status(TRUE),
			'quarterly_status' => $this->get_quarterly_status(TRUE),
			'yearly_status' => $this->get_yearly_status(TRUE),
			'monthly_documents' => $this->Document_model->get_documents(1, array(6)),
			'quarterly_documents' => $this->Document_model->get_documents(2, array(8)),
			'yearly_documents' => $this->Document_model->get_documents(3, array(14)),
			'regions' => $this->User_model->get_all_regions(),
			'compliance_status' => $this->Affiliate_model->get_compliance_status_flags(),
			'affiliate_details' => $this->Affiliate_model->get_all_affiliates_list(null,null,$where),
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/affiliate/affiliate_status';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/affiliate_status.js'
		);
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}

	public function get_monthly_status($init = NULL)
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$compliance_filter = $document_filter = $count_filter = array();

		//Compliance Filter
		if( isset($data['region_id']) && ($data['region_id'] !== '') )
		{
			$compliance_filter['affiliate.region_id'] =  $data['region_id'];
			$count_filter['affiliate.region_id'] =  $data['region_id'];
		}

		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		{
			$compliance_filter['affiliate'] =  $data['affiliate'];
			$count_filter['affiliate_id'] =  $data['affiliate'];
		}

		if( isset($data['month']) && ($data['month'] !== '') )
			$compliance_filter['month'] =  $data['month'];
		else
			$compliance_filter['month'] =  date("m", strtotime("-1 month", time()));
		
		if( isset($data['year']) && ($data['year'] !== '') )
			$compliance_filter['year'] =  $data['year'];
		else
			$compliance_filter['year'] =  date("Y", strtotime("-1 month", time()));

		if( isset($data['compliance_status']) && ($data['compliance_status'] !== '') )
			$compliance_filter['compliance_status'] =  $data['compliance_status'];

		//Document Filter
		if( isset($data['month']) && ($data['month'] !== '') )
			$document_filter['document_month'] =  $data['month'];
		else
			$document_filter['document_month'] = $data['month'] = date("m", strtotime("-1 month", time()));

		if( isset($data['year']) && ($data['year'] !== '') )
			$document_filter['document_year'] =  $data['year'];
		else
			$document_filter['document_year'] = $data['year'] = date("Y", strtotime("-1 month", time()));

		//Pagination settings
		$this->load->library('pagination');
		
		//Load default pagination configurations
		$this->config->load('pagination');
		$config = $this->config->item('pagination'); 

		//Override necessary configurations for pagination
		$config['base_url'] = base_url('module/affiliate/status/monthly/get');

		if( isset($compliance_filter['compliance_status'])){
			$config['total_rows'] = $this->Affiliate_model->monthly_compliance_status_count($compliance_filter);
		}else{
			$config['total_rows'] = $this->Affiliate_model->get_affiliate_count($count_filter);
		}
		$this->pagination->initialize($config);

		$page_number = isset($data['per_page']) ? $data['per_page'] : 0;

		if( isset($compliance_filter['compliance_status']) ){
			$affiliates = $this->Affiliate_model->monthly_compliance_status($config['per_page'], $page_number, $compliance_filter);

		}else{ 
			$affiliates = $this->Affiliate_model->get_all_affiliates_list($config['per_page'], $page_number, $compliance_filter);
		}

		foreach ( $affiliates as $key => $affiliate )
		{
			$affiliates[$key]['monthly_compliance_status'] = $this->Affiliate_model->monthly_compliance_status_listing($config['per_page'], $page_number, $compliance_filter,$affiliate['affiliate_id']);
			$affiliates[$key]['document_status'] = $this->Affiliate_model->monthly_document_status($affiliate['affiliate_id'], $document_filter, TRUE);		
		}

		$result = array(
			'affiliates' => $affiliates,
			'documents' => $this->Document_model->get_documents(1, array(6)),
			'pagination' => $this->pagination->create_links(), 
			'month' => $data['month'], 
			'year' => $data['year'],
			'status' => 'monthly'
		);
		
		if($init === TRUE)
			return $result;
		else
			echo json_encode($result);
	}

	public function get_quarterly_status($init = NULL)
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$compliance_filter = $document_filter = $count_filter = array();

		//Compliance Filter
		if( isset($data['region_id']) && ($data['region_id'] !== '') )
		{
			$compliance_filter['affiliate.region_id'] =  $data['region_id'];
			$count_filter['affiliate.region_id'] =  $data['region_id'];
		}

		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		{
			$compliance_filter['affiliate'] =  $data['affiliate'];
			$count_filter['affiliate_id'] =  $data['affiliate'];
		}

		if( !isset($data['month']) || ($data['month'] == '') )
			$data['month'] =  date("m", strtotime("-1 month", time()));
		
		if( isset($data['quarter']) && ($data['quarter'] !== '') )
			$compliance_filter['quarter'] =  $data['quarter'];
		else
			$compliance_filter['quarter'] = $data['quarter'] = ceil($data['month']/3);
		
		if( isset($data['year']) && ($data['year'] !== '') )
			$compliance_filter['year'] =  $data['year'];
		else
			$compliance_filter['year'] =  date("Y", strtotime("-1 month", time()));

		if( isset($data['compliance_status']) && ($data['compliance_status'] !== '') )
			$compliance_filter['compliance_status'] =  $data['compliance_status'];

		//Document Filter
		$document_filter['document_month'] =  $data['quarter'];

		if( isset($data['year']) && ($data['year'] !== '') )
			$document_filter['document_year'] =  $data['year'];
		else
			$document_filter['document_year'] = $data['year'] = date("Y", strtotime("-1 month", time()));

		//Pagination settings
		$this->load->library('pagination');
		
		//Load default pagination configurations
		$this->config->load('pagination');
		$config = $this->config->item('pagination'); 

		//Override necessary configurations for pagination
		$config['base_url'] = base_url('module/affiliate/status/quarterly/get');
	
		if( isset($compliance_filter['compliance_status'])){
			$config['total_rows'] = $this->Affiliate_model->quarterly_compliance_status_count($compliance_filter);
		}else{ 
			$config['total_rows'] = $this->Affiliate_model->get_affiliate_count($count_filter);
		}

		$this->pagination->initialize($config);

		$page_number = isset($data['per_page']) ? $data['per_page'] : 0;

		if( isset($compliance_filter['compliance_status']) ){
			$affiliates = $this->Affiliate_model->quarterly_compliance_status($config['per_page'], $page_number, $compliance_filter);

		}else{			
			$affiliates = $this->Affiliate_model->get_all_affiliates_list($config['per_page'], $page_number, $compliance_filter);
		}

		foreach ( $affiliates as $key => $affiliate )
		{
		    $affiliates[$key]['quarterly_compliance_status'] = $this->Affiliate_model->quarterly_compliance_status_listing($config['per_page'], $page_number, $compliance_filter,$affiliate['affiliate_id']);
			$affiliates[$key]['document_status'] = $this->Affiliate_model->quarterly_document_status($affiliate['affiliate_id'], $document_filter, TRUE);
			$affiliates[$key]['key_indicator'] = $this->Affiliate_model->key_indicator($affiliate['affiliate_id'], $document_filter);
		}

		$result = array(
			'affiliates' => $affiliates, 
			'documents' => $this->Document_model->get_documents(2, array(8)),
			'pagination' => $this->pagination->create_links(), 
			'month' => $data['month'], 
			'quarter' => $data['quarter'], 
			'year' => $data['year'],
			'status' => 'quarterly'
		);
		
		if($init === TRUE)
			return $result;
		else
			echo json_encode($result);
	}

	public function get_yearly_status($init = NULL)
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$compliance_filter = $document_filter = $count_filter = array();

		//Compliance Filter
		if( isset($data['region_id']) && ($data['region_id'] !== '') )
		{
			$compliance_filter['affiliate.region_id'] =  $data['region_id'];
			$count_filter['affiliate.region_id'] =  $data['region_id'];
		}

		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		{
			$compliance_filter['affiliate'] =  $data['affiliate'];
			$count_filter['affiliate_id'] =  $data['affiliate'];
		}

		if( !isset($data['month']) || ($data['month'] == '') )
			$data['month'] =  date("m", strtotime("-1 month", time()));
		
		if( isset($data['year']) && ($data['year'] !== '') )
			$compliance_filter['year'] =  $data['year'];
		else
			$compliance_filter['year'] = date("Y", strtotime("-1 month", time()));

		if( isset($data['compliance_status']) && ($data['compliance_status'] !== '') )
			$compliance_filter['compliance_status'] =  $data['compliance_status'];

		if( isset($data['year']) && ($data['year'] !== '') )
			$document_filter['document_year'] =  $data['year'];
		else
			$document_filter['document_year'] = $data['year'] =  date("Y", strtotime("-1 month", time()));

		//Pagination settings
		$this->load->library('pagination');
		
		//Load default pagination configurations
		$this->config->load('pagination');
		$config = $this->config->item('pagination'); 

		//Override necessary configurations for pagination
		$config['base_url'] = base_url('module/affiliate/status/yearly/get');
		if( isset($compliance_filter['compliance_status']) || isset($compliance_filter['affiliate'])){
			$config['total_rows'] = $this->Affiliate_model->yearly_compliance_status_count($compliance_filter);
		}else{
			$config['total_rows'] = $this->Affiliate_model->get_affiliate_count($count_filter);
		}

		$this->pagination->initialize($config);

		$page_number = isset($data['per_page']) ? $data['per_page'] : 0;

		if( isset($compliance_filter['compliance_status']) ){
			$affiliates = $this->Affiliate_model->yearly_compliance_status($config['per_page'], $page_number, $compliance_filter);

		}else{			
			$affiliates = $this->Affiliate_model->get_all_affiliates_list($config['per_page'], $page_number, $compliance_filter);
		}

		foreach ( $affiliates as $key => $affiliate )
		{
			$affiliates[$key]['yearly_compliance_status'] =  $this->Affiliate_model->yearly_compliance_status_listing($config['per_page'], $page_number, $compliance_filter,$affiliate['affiliate_id']);
			$affiliates[$key]['document_status'] = $this->Affiliate_model->yearly_document_status($affiliate['affiliate_id'], $document_filter, TRUE);
		}

		$result = array(
			'affiliates' => $affiliates, 
			'documents' => $this->Document_model->get_documents(3, array(14)),
			'pagination' => $this->pagination->create_links(), 
			'month' => $data['month'], 
			'year' => $data['year'],
			'status' => 'yearly'
		);
		
		if($init === TRUE)
			return $result;
		else
			echo json_encode($result);
	}

	/**
	 * Show the Compliance Page of an Affiliate
	 *
	 * @param  int $affiliate_id
	 * @return void
	 */
	public function affiliate_status_details($affiliate_id)
	{
		if(isset($_REQUEST['id'])){
			$monthly_document_status = $this->Document_model->change_flag($_REQUEST['id']);
		}
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$recent_data = $this->Affiliate_model->recent_affiliate_data($affiliate_id);

		if(!isset($recent_data['key_indicator']['quarter']))
			$recent_data['key_indicator']['quarter'] = ceil(date("m", strtotime("-1 month", time()))/3);

		if(!isset($recent_data['key_indicator']['year']))
			$recent_data['key_indicator']['year'] = date("Y", strtotime("-1 month", time()));

		//Monthly Document Filter
		$monthly_filter = array();
		
		if( isset($data['month']) && ($data['month'] !== '') )
			$monthly_filter['document_month'] =  $recent_data['monthly']['month'] = $data['month'];
		else if(isset($recent_data['monthly']['month']))
			$monthly_filter['document_month'] =  $recent_data['monthly']['month'];
		else
			$monthly_filter['document_month'] = $recent_data['monthly']['month'] = date("m", strtotime("-1 month", time()));

		if( isset($data['monthly_year']) && ($data['monthly_year'] !== '') )
			$monthly_filter['document_year'] = $recent_data['monthly']['year'] = $data['monthly_year'];
		else if(isset($recent_data['monthly']['year']))
			$monthly_filter['document_year'] =  $recent_data['monthly']['year'];
		else
			$monthly_filter['document_year'] = $recent_data['monthly']['year'] = date("Y", strtotime("-1 month", time()));

		//Monthly document status
		$monthly_document_status = $this->Affiliate_model->monthly_document_status($affiliate_id, $monthly_filter);
		
		$monthly_filter['mds.document_id'] = 6;
		$monthly_document_other = $this->Affiliate_model->monthly_document_status($affiliate_id, $monthly_filter);

		$monthly_documents = array();
		foreach( $monthly_document_status as $row )
		{
			$monthly_documents[$row['document_id']] = $row;
			$monthly_documents[$row['document_id']]['comments'] = $this->Document_model->get_document_comments($row['monthly_document_id'], $row['document_type_id']);
		}

		//Quarterly Document Filter
		$quarterly_filter = array();

		if( isset($data['quarter']) && ($data['quarter'] !== '') )
			$quarterly_filter['document_month'] = $recent_data['quarterly']['quarter'] = $data['quarter'];
		else if(isset($recent_data['quarterly']['quarter']))
			$quarterly_filter['document_month'] =  $recent_data['quarterly']['quarter'];
		else
			$quarterly_filter['document_month'] = $recent_data['quarterly']['quarter'] = ceil(date("m", strtotime("-1 month", time()))/3);

		if( isset($data['quarterly_year']) && ($data['quarterly_year'] !== '') )
			$quarterly_filter['document_year'] = $recent_data['quarterly']['year'] = $data['quarterly_year'];
		else if(isset($recent_data['quarterly']['year']))
			$quarterly_filter['document_year'] = $recent_data['quarterly']['year'];
		else
			$quarterly_filter['document_year'] = $recent_data['quarterly']['year'] = date("Y", strtotime("-1 month", time()));

		//Quarterly document status
		$quarterly_document_status = $this->Affiliate_model->quarterly_document_status($affiliate_id, $quarterly_filter);
		
		$quarterly_filter['qds.document_id'] = 8;
		$quarterly_document_other = $this->Affiliate_model->quarterly_document_status($affiliate_id, $quarterly_filter);

		$quarterly_documents = array();
		foreach( $quarterly_document_status as $row )
		{
			$quarterly_documents[$row['document_id']] = $row;
			$quarterly_documents[$row['document_id']]['comments'] = $this->Document_model->get_document_comments($row['quarterly_id'], $row['document_type_id']);
		}
		
		//Yearly Document Filter
		$yearly_filter = array();

		if( isset($data['yearly_year']) && ($data['yearly_year'] !== '') )
			$yearly_filter['document_year'] = $recent_data['yearly']['year'] = $data['yearly_year'];
		else if(isset($recent_data['yearly']['year']))
			$yearly_filter['document_year'] = $recent_data['yearly']['year'];
		else
			$yearly_filter['document_year'] = $recent_data['yearly']['year'] = date("Y", strtotime("-1 month", time()));

		
		//Yearly document status
		$yearly_document_status = $this->Affiliate_model->yearly_document_status($affiliate_id, $yearly_filter);
		
		$yearly_filter['yds.document_id'] = 14;
		$yearly_document_other = $this->Affiliate_model->yearly_document_status($affiliate_id, $yearly_filter);
		
		$yearly_documents = array();
		foreach( $yearly_document_status as $row )
		{
			$yearly_documents[$row['document_id']] = $row;
			$yearly_documents[$row['document_id']]['comments'] = $this->Document_model->get_document_comments($row['yearly_d_id'], $row['document_type_id']);
		}

		$data['year'] = date("Y", strtotime("-1 month", time()));

		$document_filter = array('document_year' => $data['year']);

		//Performance Organizational Soundness documents status
		$soundness_documents = $this->Document_model->get_documents(6);
		
		$soundness_document_status = array();
		foreach( $soundness_documents as $row )
		{
			$soundness_status = $this->Affiliate_model->soundness_document_status($affiliate_id, $row['document_id'], $document_filter);
			if(empty($soundness_status) && ($row['ref_document'] !== NULL))
			{
				$filter = array(
					'doc.document_id' => $row['ref_document'],
					'document_year'	=> $data['year']
				);

				if($row['document_name'] == "Board Roster")
				{
					$soundness_document_status[$row['document_id']]['ref_documents'] = $this->Affiliate_model->yearly_document_status($affiliate_id, $filter);
				}
				else
				{
					$soundness_document_status[$row['document_id']]['ref_documents'] = $this->Affiliate_model->monthly_document_status($affiliate_id, $filter);
				}
			}
			else
			{
				$soundness_document_status[$row['document_id']]['document'] = $soundness_status;
			}
		}

		//Performance Organizational Vitality documents status
		$vitality_documents = $this->Document_model->get_documents(7);
		
		$vitality_document_status = array();
		foreach( $vitality_documents as $row )
		{
			$vitality_status = $this->Affiliate_model->vitality_document_status($affiliate_id, $row['document_id'], $document_filter);
			if(empty($vitality_status) && ($row['ref_document'] !== NULL))
			{
				$filter = array(
					'doc.document_id' => $row['ref_document'],
					'document_year'	=> $data['year']
				);

				if($row['document_name'] == "Form 990" || $row['document_name'] == "Current Operating Budget")
				{
					$vitality_document_status[$row['document_id']]['ref_documents'] = $this->Affiliate_model->yearly_document_status($affiliate_id, $filter);
				}
				else if($row['document_name'] == "Form 941" || $row['document_name'] == "Audited Financial Statements")
				{
					$vitality_document_status[$row['document_id']]['ref_documents'] = $this->Affiliate_model->quarterly_document_status($affiliate_id, $filter);
				}
				else if($row['document_name'] == "Monthly Financial Statements")
				{
					$vitality_document_status[$row['document_id']]['ref_documents'] = array();
					
					$ref_doc_ids = explode(',', $row['ref_document']);
					
					foreach($ref_doc_ids as $ref_id)
					{
						$filter['doc.document_id'] = $ref_id;
						
						$monthly_finacial_docs = $this->Affiliate_model->monthly_document_status($affiliate_id, $filter);
						
						array_merge($vitality_document_status[$row['document_id']]['ref_documents'], $monthly_finacial_docs);
					}
				}
			}
			else
			{
				$vitality_document_status[$row['document_id']]['document'] = $vitality_status;
			}
		}

		//Performance Implementation of Mission documents status
		$mission_documents = $this->Document_model->get_documents(8);
		
		$mission_document_status = array();
		foreach( $mission_documents as $row )
		{
			$mission_document_status[$row['document_id']]['document'] = $this->Affiliate_model->mission_document_status($affiliate_id, $row['document_id'], $document_filter);
		}

		//Get monthly compliance status
		$compliance_filter = array(
			'month' => $recent_data['monthly']['month'],
			'year'	=> $recent_data['monthly']['year'],
			'affiliate.affiliate_id' => $affiliate_id
		);
		$monthly_compliance_status = $this->Affiliate_model->monthly_compliance_status(NULL, NULL, $compliance_filter);
		
		//Get quarterly compliance status
		$compliance_filter = array(
			'quarter' => $recent_data['quarterly']['quarter'],
			'year'	=> $recent_data['quarterly']['year'],
			'affiliate.affiliate_id' => $affiliate_id
		);
		$quarterly_compliance_status = $this->Affiliate_model->quarterly_compliance_status(NULL, NULL, $compliance_filter);
		
		//Get yearly compliance status
		$compliance_filter = array(
			'year'	=> $recent_data['yearly']['year'],
			'affiliate.affiliate_id' => $affiliate_id
		);
		$yearly_compliance_status = $this->Affiliate_model->yearly_compliance_status(NULL, NULL, $compliance_filter);

		$data['content'] = array(
			'affiliate' => $this->Affiliate_model->get_affiliate_by_id($affiliate_id),
			'monthly_status' => $monthly_documents,
			'monthly_other' => $monthly_document_other,
			'quarterly_status' => $quarterly_documents,
			'quarterly_other' => $quarterly_document_other,
			'yearly_status' => $yearly_documents,
			'yearly_other' => $yearly_document_other,
			'monthly_compliance' => empty($monthly_compliance_status) ? 11 : $monthly_compliance_status[0]['compliance_status'],
			'quarterly_compliance' => empty($quarterly_compliance_status) ? 11 : $quarterly_compliance_status[0]['compliance_status'],
			'yearly_compliance' => empty($yearly_compliance_status) ? 11 : $yearly_compliance_status[0]['compliance_status'],
			'self_assessment_documents' => $this->Affiliate_model->get_self_assessment_documents($affiliate_id),
			'soundness_document_status' => $soundness_document_status,
			'vitality_document_status' => $vitality_document_status,
			'mission_document_status' => $mission_document_status,
			'monthly_documents' => $this->Document_model->get_documents(1, array(6)),
			'quarterly_documents' => $this->Document_model->get_documents(2, array(8)),
			'yearly_documents' => $this->Document_model->get_documents(3, array(14)),
			'soundness_documents' => $soundness_documents,
			'vitality_documents' => $vitality_documents,
			'mission_documents' => $mission_documents,
			'document_status' => $this->Document_model->get_document_status_flags(),
			'compliance_status' => $this->Affiliate_model->get_compliance_status_flags(),
			'key_indicators_details' => $this->Affiliate_model->get_key_indicators($affiliate_id, $recent_data['key_indicator']['quarter'], $recent_data['key_indicator']['year']),
			'month' => $recent_data['monthly']['month'],
			'monthly_year' => $recent_data['monthly']['year'],
			'quarter' => $recent_data['quarterly']['quarter'],
			'quarterly_year' => $recent_data['quarterly']['year'],
			'yearly_year' => $recent_data['yearly']['year'],
			'key_quarter' => $recent_data['key_indicator']['quarter'],
			'key_year' => $recent_data['key_indicator']['year'],
			'year' => $data['year'],
			'legal_document' => $this->Affiliate_model->get_legal_document($affiliate_id),
			'compliance_other' => $this->Affiliate_model->get_other_document($affiliate_id, 11),
			'performance_other' => $this->Affiliate_model->get_other_performance_documents($affiliate_id, 9),
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/affiliate/affiliate_status_details';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'vendor/moment.js',
			'vendor/dropzone.js',
			'vendor/bootstrap-datetimepicker.js',
			'pages/modules/affiliate_status_details.js'
		);
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}

	/**
	 * Update the compliance status of an Affiliate 
	 *
	 * @return JSON array
	 */
	public function update_compliance_status()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		$status = $message = NULL;

		if($data["interval"] == "month")
		{
			$status = $this->Affiliate_model->update_monthly_compliance($data);
		}
		else if($data["interval"] == "quarter")
		{
			$status = $this->Affiliate_model->update_quarterly_compliance($data);
		}
		else if($data["interval"] == "year")
		{
			$status = $this->Affiliate_model->update_yearly_compliance($data);
		}

		if ( $status === TRUE )
		{
			$log_data = array(
				'user_id' => $this->session->user_id,
				'affiliate_id' => $this->session->affiliate_id,
				'record_id'	=> $data['affiliate_id'],
				'note' => 'Compliance status updated'
			);
	
			//Log user activities
			$this->User_model->user_log($log_data);
			
			$message = ucfirst($data["interval"]).'ly compliance status updated.';
		}
		else
		{
			$status = FALSE;
			$message = 'Something went wrong. Try again later.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}
	
	/**
	 * Update the compliance status of a Document 
	 *
	 * @return JSON array
	 */
	public function update_affiliate_document_status()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		$status = $message = NULL;

		if($data["interval"] == "month")
		{
			$status = $this->Document_model->update_monthly_document($data);
		}
		else if($data["interval"] == "quarter")
		{
			$status = $this->Document_model->update_quarterly_document($data);
		}
		else if($data["interval"] == "year")
		{
			$status = $this->Document_model->update_yearly_document($data);
		}

		if ( $status === TRUE )
		{
			$doc_status = array(
				'4' => 'Submission Pending',
				'5' => 'Review Pending',
				'6' => 'Waiting',
				'7' => 'Approved'
			);
			//Add comment
			$comment_data = array(
				'document_id' => $data['document_id'],
				'document_type_id' => $data['document_type_id'],
				'affiliate_id'	=> $data['affiliate_id'],
				'notification'	=> 'Compliance status '.$data['interval'].'ly document is '.$doc_status[$data['status']],
				'created_by'	=> $this->session->affiliate_id
			);

			$this->Document_model->add_comment($comment_data);

			//Log user activities
			$log_data = array(
				'user_id' => $this->session->user_id,
				'affiliate_id' => $this->session->affiliate_id,
				'record_id'	=> $data['document_id'],
				'note' => 'Document status updated'
			);
	
			$this->User_model->user_log($log_data);
			
			$message = 'Document status updated successfully.';
		}
		else
		{
			$status = FALSE;
			$message = 'Something went wrong. Try again later.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}

	public function add_document_comment()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		$data['created_by'] = $this->session->affiliate_id;
		
		$status = $message = NULL;

		$inserted_comment = $this->Document_model->add_comment($data);

		if ( $inserted_comment !== FALSE )
		{
			$log_data = array(
				'user_id' => $this->session->user_id,
				'affiliate_id' => $this->session->affiliate_id,
				'record_id'	=> $data['document_id'],
				'note' => 'Document comment added'
			);
	
			//Log user activities
			$this->User_model->user_log($log_data);
			
			$status = TRUE;
			$message = 'Document comment added successfully.';
		}
		else
		{
			$status = FALSE;
			$message = 'Something went wrong. Try again later.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message,
			'comment' => $inserted_comment
		);

		echo json_encode($response);
	}

	public function filter_performance_documents_by_year()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);

		$document_filter = array("document_year" => $data["year"]);

		$document_list = array();
		
		$document = $this->Document_model->get_document($data['document_id']);
		
		$filter = array(
			'doc.document_id' => $document['ref_document'],
			'document_year'	=> $document_filter['document_year']
		);

		if($data["interval"] == "soundness")
		{
			//Performance Organizational Soundness documents status
			$soundness_docs = $this->Affiliate_model->soundness_document_status($data['affiliate_id'], $data['document_id'], $document_filter);
			
			if(empty($soundness_docs) && ($document['ref_document'] !== NULL))
			{
				if($document['document_name'] == "Board Roster")
				{
					$doc_list = $this->Affiliate_model->yearly_document_status($data['affiliate_id'], $filter);
					foreach($doc_list as $row)
					{
						$document_list[] = array(
							'filename' => $row['yearly_upload_file_name'],
							'filepath' => $row['yearly_upload_file'],
							'submitted' => $row['yearly_submitted_date']
						);
					}
				}
				else
				{
					$doc_list = $this->Affiliate_model->monthly_document_status($data['affiliate_id'], $filter);
					foreach($doc_list as $row)
					{
						$document_list[] = array(
							'filename' => $row['monthly_upload_file_name'],
							'filepath' => $row['monthly_upload_file'],
							'submitted' => $row['monthly_submitted_date']
						);
					}
				}
			}
			else
			{
				foreach($soundness_docs as $row)
				{
					$document_list[] = array(
						'filename' => $row['performance_org_doc_upload_file_name'],
						'filepath' => $row['performance_org_doc_upload_file'],
						'submitted' => $row['performance_org_doc_submitted_date']
					);
				}
			}
		}
		else if($data["interval"] == "vitality")
		{
			//Performance Organizational Vitality documents status
			$vitality_docs = $this->Affiliate_model->vitality_document_status($data['affiliate_id'], $data['document_id'], $document_filter);
			
			if(empty($vitality_docs) && ($document['ref_document'] !== NULL))
			{
				if($document['document_name'] == "Form 990" || $document['document_name'] == "Current Operating Budget")
				{
					$doc_list = $this->Affiliate_model->yearly_document_status($data['affiliate_id'], $filter);
					foreach($doc_list as $row)
					{
						$document_list[] = array(
							'filename' => $row['yearly_upload_file_name'],
							'filepath' => $row['yearly_upload_file'],
							'submitted' => $row['yearly_submitted_date']
						);
					}
				}
				else if($document['document_name'] == "Form 941" || $document['document_name'] == "Audited Financial Statements")
				{
					$doc_list = $this->Affiliate_model->quarterly_document_status($data['affiliate_id'], $filter);
					foreach($doc_list as $row)
					{
						$document_list[] = array(
							'filename' => $row['quarterly_upload_file_name'],
							'filepath' => $row['quarterly_upload_file'],
							'submitted' => $row['quarterly_submitted_date']
						);
					}
				}
				else
				{
					$doc_list = $this->Affiliate_model->monthly_document_status($data['affiliate_id'], $filter);
					foreach($doc_list as $row)
					{
						$document_list[] = array(
							'filename' => $row['monthly_upload_file_name'],
							'filepath' => $row['monthly_upload_file'],
							'submitted' => $row['monthly_submitted_date']
						);
					}
				}
			}
			else
			{
				foreach($vitality_docs as $row)
				{
					$document_list[] = array(
						'filename' => $row['performance_vitality_upload_file_name'],
						'filepath' => $row['performance_vitality_upload_file'],
						'submitted' => $row['performance_vitality_submitted_date']
					);
				}
			}
		}
		else if($data["interval"] == "mission")
		{
			//Performance Implementation of Mission documents status
			$mission_docs = $this->Affiliate_model->mission_document_status($data['affiliate_id'], $data['document_id'], $document_filter);
			
			foreach($mission_docs as $row)
			{
				$document_list[] = array(
					'filename' => $row['performance_im_mi_upload_file_name'],
					'filepath' => $row['performance_im_mi_upload_file'],
					'submitted' => $row['performance_im_mi_submitted_date']
				);
			}
			
		}

		echo json_encode($document_list);
	}

	public function search_key_indicators()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		$status = $message = NULL;

		$response = $this->Affiliate_model->get_key_indicators($data['affiliate_id'], $data['quarter'], $data['year']);

		echo json_encode($response);
	}

	public function save_key_indicators()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		$status = $message = NULL;

		$status = $this->Affiliate_model->save_key_indicators($data);

		if ($status)
		{	
			$message = 'Key Indicators saved successfully.';
		}
		else
		{
			$message = 'Something went wrong. Try again later.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}

	public function approve_key_indicators()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		$status = $message = NULL;

		$status = $this->Affiliate_model->approve_key_indicators($data);

		if ($status)
		{	
			if($data['status']=='1' ){
				$message = 'Key Indicators approve successfully.';
			}else{
				$message = 'Key Indicators unapproved successfully.';

			}
		}
		else
		{
			$message = 'Something went wrong. Try again later.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}

	public function upload_document()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		
		//User ID who uploaded the document
		$data["submitted_by"] = $this->session->user_id;

		$status = $message = NULL;

		if($data["interval"] == "month")
		{
			/* Path format 
			* (/uploads/Documents/MonthlyDocument/affiliate_id/year/month)
			* Sample => "/uploads/Documents/MonthlyDocument/75/2020/DEC" 
			* */
			$month = strtoupper(date('M', mktime(0, 0, 0, $data['month'], 10)));
			$path = implode("/", array($data['affiliate_id'],$data['year'],$month)). "/";

		}
		else if($data["interval"] == "quarter")
		{
			/* Path format 
			* (/uploads/Documents/MonthlyDocument/affiliate_id/year/quarter)
			* Sample => "/uploads/Documents/MonthlyDocument/75/2020/Q1/" 
			* */
			$quarter =  "Q" . $data['quarter'];
			$path = implode("/", array($data['affiliate_id'],$data['year'],$quarter)). "/";

		}
		else if($data["interval"] == "year")
		{
			/* Path format 
			* (/uploads/Documents/MonthlyDocument/affiliate_id/year/)
			* Sample => "/uploads/Documents/MonthlyDocument/75/2020/" 
			* */
			$path = implode("/", array($data['affiliate_id'],$data['year'])). "/";

		}
		else if($data["interval"] == "soundness" || $data["interval"] == "vitality" || $data["interval"] == "mission")
		{
			/* Path format 
			* (/uploads/Documents/MonthlyDocument/Performance/affiliate_id/)
			* Sample => "/uploads/Documents/MonthlyDocument/Performance/75/"
			* */
			$path = implode("/", array("Performance", $data['affiliate_id'])). "/";

		}
		else if($data["interval"] == "self-assessment")
		{
			/* Path format 
			* (/uploads/Documents/MonthlyDocument/SelfAssessment/affiliate_id/)
			* Sample => "/uploads/Documents/MonthlyDocument/SelfAssessment/75/"
			* */
			$path = implode("/", array("SelfAssessment", $data['affiliate_id'])). "/";
		}

		//Upload file and save details in the table
		$uploadResponse = $this->do_upload($path, $data);

		if ( $uploadResponse["success"] === TRUE )
		{
			$log_data = array(
				'user_id' => $this->session->user_id,
				'affiliate_id' => $this->session->affiliate_id,
				'record_id'	=> $uploadResponse['upload_data']['added_document_id'],
				'note' => $data['interval'].' Document has been uploaded'
			);
	
			//Log user activities
			$this->User_model->user_log($log_data);
			
			$message = $data['interval'].' Document has been uploaded.';
		}

		echo json_encode($uploadResponse);
	}
	
	/**
	 * Upload the file and save to table
	 *
	 * @param  string $upload_path
	 * @return array
	 */
	public function do_upload($upload_path, $data)
	{
		$config['upload_path'] = './uploads/Documents/MonthlyDocument/' . $upload_path;
		$config['allowed_types'] = '*';

		$this->load->library('upload', $config);

		$uploadStatus = FALSE;
		
		if (!is_dir($config['upload_path'])) {
            mkdir($config['upload_path'], 0777, true);
        }


		if ( ! $this->upload->do_upload('document'))
		{
			return array("success" => $uploadStatus, "message" => $this->upload->display_errors());
		}
		else
		{
			$data["full_path"] = str_replace(FCPATH, '', $this->upload->data('full_path'));
			$data["file_name"] = $this->upload->data('file_name');
			$data["file_ext"]  = substr($this->upload->data('file_ext'), 1);
			$data["metadata"]  = isset($data["metadata"]) ? json_encode($data["metadata"]) : NULL;
			$data["status"]	= 11;

			if($data["interval"] == "month")
			{
				$added_document_id = $this->Document_model->add_monthly_document($data);
				
				$this->Affiliate_model->update_monthly_compliance($data);
			}
			else if($data["interval"] == "quarter")
			{
				$added_document_id = $this->Document_model->add_quarterly_document($data);

				$this->Affiliate_model->update_quarterly_compliance($data);
			}
			else if($data["interval"] == "year")
			{
				$added_document_id = $this->Document_model->add_yearly_document($data);

				$this->Affiliate_model->update_yearly_compliance($data);
			}
			else if($data["interval"] == "soundness")
			{
				$added_document_id = $this->Document_model->add_performance_soundness_document($data);
			}
			else if($data["interval"] == "vitality")
			{
				$added_document_id = $this->Document_model->add_performance_vitality_document($data);
			}
			else if($data["interval"] == "mission")
			{
				$added_document_id = $this->Document_model->add_performance_mission_document($data);
			}
			else if($data["interval"] == "self-assessment")
			{
				$added_document_id = $this->Document_model->add_self_assessment_document($data);

				$data['self_assessment_documents'] = $this->Affiliate_model->get_self_assessment_documents($data['affiliate_id']);
			}

			$inserted_comment = null;

			if($added_document_id !== FALSE)
			{
				$uploadStatus = TRUE;
				$data["added_document_id"] = $added_document_id;
				
				if($data["interval"] == "month" || $data["interval"] == "quarter" || $data["interval"] == "year"){
					$comment_data = array(
						'document_id' => $added_document_id,
						'document_type_id' => $data['document_type_id'],
						'affiliate_id'	=> $data['affiliate_id'],
						'notification'	=> 'Compliance status '.$data['interval'].'ly document is uploaded',
						'created_by'	=> $this->session->affiliate_id
					);

					$inserted_comment = $this->Document_model->add_comment($comment_data);
				}
			}

			return array(
				"success" => $uploadStatus, 
				"message" => ucfirst($data['interval']).' Document has been uploaded.', 
				'upload_data' => $data,
				'comment' => $inserted_comment
			);
		}
	}
	/**
	 * Upload the file legal and other and save to table
	 *
	 * @param  string $upload_path
	 * @return array
	 */
	public function doupload()
     {
		if($_POST['document_type'] == 'legal_compliance_document')
		{
			$filePath = './uploads/Documents/legal/'.date('Y').'/'.date('m').'/';
		}
		else if($_POST['document_type'] == 'other_compliance_document')
		{
			$filePath = './uploads/Documents/compliance_other/'.date('Y').'/'.date('m').'/';
		}
		else
		{
			$filePath = './uploads/Documents/performance_other/'.date('Y').'/'.date('m').'/';
		}

		$config['upload_path'] = $filePath;
		$config['allowed_types'] = '*';
	
        if(!file_exists($filePath)) 
        {
            mkdir($filePath, 0777, true);
        }
       
        $this->load->library('upload', $config);
		
		if(!$this->upload->do_upload('file'))
        { 
            echo json_encode( $this->upload->display_errors());
		} 
		else
		{
			$fileName =$this->upload->data('file_name');
			$fileExtension = substr($this->upload->data('file_ext'), 1);
			
			$val = array(
				'document_type_id'=>$_POST['document_type_id'],
				'affiliate_id'=>$_POST['affiliate_id'],
				'file_path'=>$filePath,
				'upload_file_name'=>$fileName,
				'upload_file_extension'=>$fileExtension
			);

			$comment_data = array(
				'document_type_id' =>$_POST['document_type_id'],
				'affiliate_id'	=> $_POST['affiliate_id'],
				'notification'	=> $_POST['notification'],
				'created_by'	=> $this->session->affiliate_id
			);
			
			if($_POST['document_type'] == 'legal_compliance_document')
			{
				if(isset($_POST['legal_id']))
				{
					$val['legal_d_id'] = $_POST['legal_id'];
				}
				
				$uploadDocId = $this->Affiliate_model->legal_compliance_document($val);

				$comment_data['document_id'] = $uploadDocId;
				$this->Document_model->add_comment($comment_data);
				
				$uploadResponse = $this->Affiliate_model->get_legal_document($_POST['affiliate_id']);
			}
			else if($_POST['document_type'] == 'other_compliance_document')
			{
				if(isset($_POST['other_id']))
				{
					$val['id'] = $_POST['other_id'];
				}

				$uploadDocId = $this->Affiliate_model->other_document($val);

				$comment_data['document_id'] = $uploadDocId;
				$this->Document_model->add_comment($comment_data);
				
				$uploadResponse = $this->Affiliate_model->get_other_document($_POST['affiliate_id'], $_POST['document_type_id']);
		
			}else if($_POST['document_type'] == 'other_performance_assessment_documents')
			{
				if(isset($_POST['other_id']))
				{
					$val['id'] = $_POST['other_id'];
				}

				$uploadDocId = $this->Affiliate_model->performance_other_document($val);

				$comment_data['document_id'] = $uploadDocId;
				$this->Document_model->add_comment($comment_data);
				
				$uploadResponse = $this->Affiliate_model->get_other_performance_documents($_POST['affiliate_id'], $_POST['document_type_id']);
			}

            echo json_encode($uploadResponse);
        }

	 }

	 	/**
	 * Upload the file legal and other and save to table
	 *
	 * @param  string $upload_path
	 * @return array
	 */
	public function delete_upload()
	{
		$data = $this->input->post(NULL, TRUE);
		if($data['doc_type']=='legal_compliance_document'){
			
				$docData = $this->Affiliate_model->get_legal_document_id($data['del_document_id']);
				$filePath= $docData['quarterly_upload_file'].$docData['quarterly_upload_file_name'];
				

				if(file_exists($filePath)){
					unlink($filePath);
			    }
					 $this->Affiliate_model->delete_legal_document($data['del_document_id']);
				     $this->Affiliate_model->delete_notification_summary($data['del_document_id']);
					 $uploadResponse = $this->Affiliate_model->get_legal_document($data['affiliate_id']);
			

		}else if($data['doc_type']=='other_compliance_document'){

				$docData = $this->Affiliate_model->get_other_compliance_document_id($data['del_document_id']);
				$filePath= $docData['other_upload_file'].$docData['other_upload_file_name'];
				
				if(file_exists($filePath)){
					unlink($filePath);
			    }
					$this->Affiliate_model->delete_other_compliance_document($data['del_document_id']);
					$this->Affiliate_model->delete_notification_summary($data['del_document_id']);
					$uploadResponse = $this->Affiliate_model->get_other_document($data['affiliate_id'], $data['doc_type_id']);
				

		}else if($data['doc_type']=='other_performance_assessment_documents'){

				$docData = $this->Affiliate_model->get_performance_other_document_id($data['del_document_id']);
					$filePath= $docData['performance_other_upload_file'].$docData['performance_other_upload_file_name'];
					if(file_exists($filePath)){
						unlink($filePath);
					}
						$this->Affiliate_model->delete_performance_other_document($data['del_document_id']);
						$this->Affiliate_model->delete_notification_summary($data['del_document_id']);
						$uploadResponse = $this->Affiliate_model->get_other_performance_documents($data['affiliate_id'],$data['doc_type_id']);
					
		}
	

		echo json_encode($uploadResponse);

	}
	 
}
