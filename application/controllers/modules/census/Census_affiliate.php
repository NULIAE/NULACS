<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/excel/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class Census_affiliate extends MY_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CensusAffiliate_model');
		$this->load->model('CensusReport_model');
		$this->load->model('Document_model');
		$this->load->model('CensusForms_model');
	}
	
	/**
	 * display the page for census affiliate  and Filter list
	 *
	 * @return view 'censusaffiliate.php'
	 */

	public function index()
	{

		$get = $this->input->get();
		$affiliate_id = $this->session->affiliate_id;
		$report_details = $this->CensusAffiliate_model->get_affiliate_id($get['affiliate']);
		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/filter_censusaffiliate.js'
		);

		//$data['notifications'] = $this->Document_model->get_notifications();
		
		$data['content'] = array(
			//'report_data' => $this->CensusReport_model->employees_board(290),
		);

		// $data['user_notifications'] = $this->Document_model->user_notifications();
		if($get)
		  $data['affiliate'] = $this->CensusAffiliate_model->get_all_affiliates($get['affiliate']);
		else
		$data['affiliate'] = $this->CensusAffiliate_model->get_all_affiliates();

		//Name of the view file
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/censusaffiliate.php';
		}elseif($affiliate_id == $report_details[0]['affiliate_id']){
			$data['view_name'] = 'modules/census/censusaffiliate.php';
		}elseif($get['affiliate'] == ''){
			$data['view_name'] = 'modules/census/censusaffiliate.php';
		}else{ redirect("/");}
		
		$this->load->view('census_template', $data);
		
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
		$config['base_url'] = isset($base_url) ? $base_url : base_url('module/census_affiliate/filter');
		$config['total_rows'] = $this->CensusAffiliate_model->get_report_count($filters);
		$config['per_page'] = ($page_items !== NULL) ? $page_items : $config['per_page'];

		$this->pagination->initialize($config);

		$page_number = ($page_number !== NULL) ? $page_number : 0;

		$report_list = $this->CensusAffiliate_model->affiliate_report_filter($config['per_page'], $page_number, $filters);
		return array('report_list'=> $report_list, 'pagination' => $this->pagination->create_links());
	}

	/**
	 * View page census report
	 */
	public function censusreport()
	{
		$data['content'] = array(
			'titles' => $this->CensusAffiliate_model->get_titles()
		);
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/filter_censusreport.js',
		);
		
		//$data['notifications'] = $this->Document_model->get_notifications();
		$data['view_name'] = 'modules/census/censusreport.php';
		$this->load->view('census_template', $data);

	}

	/**
	 * Show census report add form	 */
	public function censusreportadd()
	{

		//XSS Filter all the input post fields
		$get = $this->input->get();
		$affiliate=$get['affiliate'];
		$data['content'] = array(
			'state' => $this->CensusAffiliate_model->get_all_states(),
			'affiliate' => $get,
			'prefill_data' =>$this->CensusAffiliate_model->get_previous_report_data($affiliate,date("Y"))
		);
		$cur_year = date("Y");
		$census_report = $this->CensusReport_model->annual_census_pub_census_data($cur_year,$affiliate);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/census_new.js',
		);
		
		//$data['notifications'] = $this->Document_model->get_notifications();
		if($census_report){
			redirect('module/censuses-for-my-affiliate');
		}else{
		$data['view_name'] = 'modules/census/censusreportadd.php';
		$this->load->view('census_template', $data);	}	
	
	}	

	/**
	 * View page census report view form
	 */
	public function contactinfo()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$tab_status =  $this->CensusReport_model->select_tab_statuses($report_id);
		$affiliate_id = $this->session->affiliate_id;

		foreach ($tab_status as $status) {
			$array_status[] = $status;
		}
		if (array_unique($array_status) === array('123')) { 
			$data['reviewed_status'] = 1;
		} else {
			$data['reviewed_status'] = 0;
		}

		$data['content'] = array(
			'report_data' => $this->CensusReport_model->census_report_data($report_id),
			'report_statuses' => $this->CensusReport_model->census_report_statuses(),
			'all_tab_status' => $array_status
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/contact_info.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['affiliate'] = $this->CensusAffiliate_model->get_all_affiliates();
		//$data['notifications'] = $this->Document_model->get_notifications();
		$data['state'] = $this->CensusAffiliate_model->get_all_states();
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		if($this->session->role_id == 1) {
			if($this->session->role_id == 2){$data['view_name'] = 'modules/census/contactinfo.php';}
			elseif($this->session->role_id == 1){$data['view_name'] = 'modules/census/contactinfo.php';}
			else{$data['view_name'] = 'modules/census/contactinfo.php';/*'modules/census/staff/contactinfo.php';*/}
			$this->load->view('census_template', $data);
		}elseif($affiliate_id == $report_details->affiliate_id){
			if($this->session->role_id == 2){$data['view_name'] = 'modules/census/contactinfo.php';}
			elseif($this->session->role_id == 1){$data['view_name'] = 'modules/census/contactinfo.php';}
			else{$data['view_name'] = 'modules/census/contactinfo.php';/*'modules/census/staff/contactinfo.php';*/}
			$this->load->view('census_template', $data);
		}else{
			redirect("/");
		}

	}

	/**
	 * Print census form
	 */
	public function printcensusform()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);

		if(empty($this->CensusReport_model->service_areas($report_id))) $this->CensusForms_model->add_dummy_data_servicearea($report_id);
    	$service_area_main = $this->CensusReport_model->service_areas($report_id);

		$data['content'] = array(
			'report_data' => $this->CensusReport_model->census_report_data($report_id),
			'service_data' => $this->CensusReport_model->service_areas_details($service_area_main[0]['pk_id']),
			'community_data' => $this->CensusReport_model->community_relations($report_id),
			'employee_data' => $this->CensusReport_model->employees_board($report_id),
			'revenue_data' => $this->CensusReport_model->revenue($report_id),
			'expenditure_data' => $this->CensusReport_model->expenditure($report_id),
			'education_prg_data' => $this->CensusReport_model->education_prg($report_id),
			'entrepreneurship_data' => $this->CensusReport_model->entrepreneurship_prg($report_id),
			'health_prg_data' => $this->CensusReport_model->health_prg($report_id),
			'housing_prg_data' => $this->CensusReport_model->housing_prg($report_id),
			'workforce_data' => $this->CensusReport_model->workforce_prg($report_id),
			'other_prg_data' => $this->CensusReport_model->other_prg($report_id),
			'civic_data' => $this->CensusReport_model->civic_data($report_id),
			'emergency_data' => $this->CensusReport_model->emergency_relief($report_id),
			'contact_data' => $this->CensusReport_model->contact_data($report_id),
			'empowerment_data' => $this->CensusReport_model->empowerment_data($report_id),
			'volunteer_data' => $this->CensusReport_model->volunteer_data($report_id)
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
		);
		$organization = isset($report_details->organization) ? $report_details->organization : '';
		$report_year = isset($report_details->field_year) ? $report_details->field_year : '';
		$education_prg_data = isset($data['content']['education_prg_data'][0]) ? $data['content']['education_prg_data'][0]['field_parent_census'] : '';
		$entrepreneurship_data = isset($data['content']['entrepreneurship_data'][0]) ? $data['content']['entrepreneurship_data'][0]['field_parent_census'] : '';
		$workforce_data = isset($data['content']['workforce_data'][0]) ? $data['content']['workforce_data'][0]['field_parent_census'] : '';

		$data['tab_title'] = $organization." ".$report_year." Census";
		$data['community_relation_method_ad_market'] = $this->CensusAffiliate_model->get_community_relation_method_ad_market($report_id);
		$data['own_rent'] = $this->CensusReport_model->expenditure_own_rent($service_area_main[0]['pk_id']);
		$data['programs'] = $this->CensusAffiliate_model->get_programs($education_prg_data,EDUCATION_PROGRAM_ID);
		$data['entreprenuer_programs'] = $this->CensusAffiliate_model->get_programs($entrepreneurship_data,ENTREPRENEURSHIP_PROGRAM_ID);
		$data['workforce_programs'] = $this->CensusAffiliate_model->get_programs($workforce_data,WORKFORCE_PROGRAM_ID);
		$data['view_prg_data'] = $this->CensusAffiliate_model->get_programs_details($report_id,$service_area_main[0]['pk_id']);
		$data['tgs'] = $this->CensusAffiliate_model->get_target_groups_served_by_program($service_area_main[0]['pk_id']);
		if($this->session->role_id == 2){$data['view_name'] = 'modules/census/printcensusform.php';}
		elseif($this->session->role_id == 1){$data['view_name'] = 'modules/census/printcensusform.php';}
	  else{$data['view_name'] = 'modules/census/printcensusform.php';}
		$this->load->view('census_template', $data);

	}

	/**
	 * View page service areas
	 */
	public function serviceareas()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;

		if(empty($this->CensusReport_model->service_areas($report_id))) $this->CensusForms_model->add_dummy_data_servicearea($report_id);
    $service_area_main = $this->CensusReport_model->service_areas($report_id);

		$data['content'] = array(
			'service_areas_main' => $service_area_main,
			'report_data' => $this->CensusReport_model->service_areas_details($service_area_main[0]['pk_id']),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'affiliate_data' => $this->CensusReport_model->census_report_data($report_id),
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/service_area.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['affiliate'] = $this->CensusAffiliate_model->get_all_affiliates();
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		//$data['notifications'] = $this->Document_model->get_notifications();
		if($this->session->role_id == 1){$data['view_name'] = 'modules/census/serviceareas.php';}
		elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/serviceareas.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}
	
	/**
	 * View page community relations
	 */
	public function community()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/community.js',
		);	
		if(is_null($report_details)){
			//echo "NO data Found";
			$data['content'] = array();
			$data['view_name'] = 'modules/census/nodata.php';
			$this->load->view('census_template', $data);
		}
		else{
			if(empty($this->CensusReport_model->community_relations($report_id))) $this->CensusForms_model->add_dummy_data_community($report_id);

			$data['content'] = array(
				'report_data' => $this->CensusReport_model->community_relations($report_id),
				'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
				'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
				'community_relation_method_ad_market' => $this->CensusAffiliate_model->get_community_relation_method_ad_market($report_id)
			);
			$statuses = $this->left_tab_statuses_list($report_id);
		
			$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
			$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
			//$data['notifications'] = $this->Document_model->get_notifications();
			if($this->session->role_id == 1){$data['view_name'] = 'modules/census/community.php';}
			elseif($affiliate_id == $report_details->affiliate_id){$data['view_name'] = 'modules/census/community.php';}
			else{ redirect("/");}
			$this->load->view('census_template', $data);
		}

	}




	/**
	 * View page employees board members
	 */
	public function employees()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;

		if(empty($this->CensusReport_model->employees_board($report_id))) $this->CensusForms_model->add_dummy_data_employees($report_id);

		$data['content'] = array(
			'report_data' => $this->CensusReport_model->employees_board($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/employee.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
    	if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/employee.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/employee.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}

	/**
	 * View page Revenue
	 */
	public function revenue()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		
		if(empty($this->CensusReport_model->revenue($report_id))) $this->CensusForms_model->add_dummy_data_revenue($report_id);
		$report_data =  $this->CensusReport_model->revenue($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $report_data,
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'venture' => $this->CensusReport_model->venture($report_data[0]['pk_id']),
			'venture_type' => $this->CensusAffiliate_model->get_all_venture_type(),


		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/revenue.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/revenue.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/revenue.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}	

	/**
	 * View page employees board members
	 */
	public function expenditure()
	{
		$report_id = $this->uri->segment('3');
		$report_data = $this->CensusReport_model->expenditure($report_id);
		$affiliate_id = $this->session->affiliate_id;

		if(empty($report_data)) $this->CensusForms_model->add_dummy_data_expenditure($report_id);
		$report_data = $this->CensusReport_model->expenditure($report_id);

		
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$data['content'] = array(
			'report_data' => $report_data,
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'own_rent' => $this->CensusReport_model->expenditure_own_rent($report_data[0]['pk_id']),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/expenditure.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/expenditure.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/expenditure.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}

	/**
	 * View page education program	 
	 * */
	public function education_prg()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		
		if(empty($this->CensusReport_model->education_prg($report_id))) $this->CensusForms_model->add_dummy_data_education_prg($report_id);
		
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->education_prg($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/education_prg.js'
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['programs'] = $this->CensusAffiliate_model->get_programs($data['content']['report_data'][0]['field_parent_census'],EDUCATION_PROGRAM_ID);
		$data['cont'] = count($data['programs']);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/education_prg.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/education_prg.php';
		}else{ redirect("/");}
		$data['cont'] = count($data['programs']);
		
		$this->load->view('census_template', $data);

	}

	/**
	 * View page entrepreneurship program	 
	 * */
	public function entrepreneurship_prg()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		$report_data =  $this->CensusReport_model->entrepreneurship_prg($report_id);
		if(empty($this->CensusReport_model->entrepreneurship_prg($report_id))) $this->CensusForms_model->add_dummy_data_entrepreneurship_prg($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->entrepreneurship_prg($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'buisiness' => $this->CensusReport_model->buisiness($report_data[0]['pk_id']),
			'type_of_business' => $this->CensusAffiliate_model->get_all_business_type()
		);
		

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/entrepreneurship_prg.js'
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['programs'] = $this->CensusAffiliate_model->get_programs($data['content']['report_data'][0]['field_parent_census'],ENTREPRENEURSHIP_PROGRAM_ID);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/entrepreneurship_prg.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/entrepreneurship_prg.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}

	/**
	 * View page health and quality of life program	 
	 * */
	public function health_prg()
	{
		
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
        $report_data = $this->CensusReport_model->health_prg($report_id);
		$affiliate_id = $this->session->affiliate_id;
		$pk_id = $report_data[0]['pk_id'];		
        if(empty($this->CensusReport_model->health_prg($report_id))) $this->CensusForms_model->add_dummy_data_health_prg($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->health_prg($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'all_health_pgm' => $this->CensusAffiliate_model->get_all_health_prg($pk_id)
		);

		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/health_prg.js'
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['programs'] = $this->CensusAffiliate_model->get_programs($data['content']['report_data'][0]['field_parent_census'],HEALTH_PROGRAM_ID);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/health_prg.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/health_prg.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}	

	/**
	 * View page housing and community development program	 
	 * */
	public function housing_prg()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		if(empty($this->CensusReport_model->housing_prg($report_id))) $this->CensusForms_model->add_dummy_data_housing_prg($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->housing_prg($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/housing_prg.js'
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['programs'] = $this->CensusAffiliate_model->get_programs($data['content']['report_data'][0]['field_parent_census'],HOUSING_PROGRAM_ID);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/housing_prg.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/housing_prg.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}	

	/**
	 * View page workforce development program details 
	 * */
	public function workforce_prg()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		$report_datas = $this->CensusReport_model->workforce_prg($report_id);
		$pk_id = $report_datas[0]['pk_id'];
		if(empty($this->CensusReport_model->workforce_prg($report_id))) $this->CensusForms_model->add_dummy_data_workforce_prg($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->workforce_prg($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'all_participants' => $this->CensusAffiliate_model->get_all_participants($pk_id),
			'all_industries' => $this->CensusAffiliate_model->get_all_industries($pk_id),
			'all_incentives' => $this->CensusAffiliate_model->get_all_incentives($pk_id)
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/workforce_prg.js'
		);
		$statuses = $this->left_tab_statuses_list($report_id);
		
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['programs'] = $this->CensusAffiliate_model->get_programs($data['content']['report_data'][0]['field_parent_census'],WORKFORCE_PROGRAM_ID);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/workforce_prg.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/workforce_prg.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}		

	/**
	 * View page other programs 
	 * */
	public function other_prg()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		if(empty($this->CensusReport_model->other_prg($report_id))) $this->CensusForms_model->add_dummy_data_other_prg($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->other_prg($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);
		//Page specific javascript files
		$data['footer']['js'] = array(			
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/other_prg.js'
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		//$data['notifications'] = $this->Document_model->get_notifications();
		$data['programs'] = $this->CensusAffiliate_model->get_programs($data['content']['report_data'][0]['field_parent_census'],OTHER_PROGRAM_ID);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/other_prg.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/other_prg.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}
	
	/**
	 * View page emergency relief
	 * */
	public function emergency_relief()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		if(empty($this->CensusReport_model->emergency_relief($report_id))) $this->CensusForms_model->add_dummy_data_emergency_relief($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->emergency_relief($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/emergency.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/emergency_relief.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/emergency_relief.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);
	}	

	/**
	 * View page contact data
	 * */
	public function contact_data()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		if(empty($this->CensusReport_model->contact_data($report_id))) $this->CensusForms_model->add_dummy_data_contact_data($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->contact_data($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);
		$data['footer']['js'] = array(		
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/contact_data.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/contact_data.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/contact_data.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}
	
	
	/**
	 * View page contact data
	 * */
	public function civic()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		if(empty($this->CensusReport_model->civic_data($report_id))) $this->CensusForms_model->add_dummy_data_civic($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->civic_data($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/civic.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/civic.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/civic.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);
	}

	/**
	 * View page empowerment data
	 * */
	public function empowerment()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		if(empty($this->CensusReport_model->empowerment_data($report_id))) $this->CensusForms_model->add_dummy_data_empowerment($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->empowerment_data($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/empowerment.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/empowerment.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/empowerment.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}

	/**
	 * View page volunteer data
	 * */
	public function volunteer()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		if(empty($this->CensusReport_model->volunteer_data($report_id))) $this->CensusForms_model->add_dummy_data_volunteer($report_id);
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->volunteer_data($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/volunteers.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/volunteer.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/volunteer.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}

	/**
	 * View page covid data
	 * */
	public function covid()
	{
		$report_id = $this->uri->segment('3');
		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$report_data = $this->CensusReport_model->covid_data_fetch($report_id);
		$affiliate_id = $this->session->affiliate_id;
		$pk_id = $report_data[0]['pk_id'];
		$data['content'] = array(
			'report_id' => $report_id,
			'report_data' => $this->CensusReport_model->covid_data_fetch($report_id),
			'covid_impact_service_req' => $this->CensusAffiliate_model->get_covid_impact_services_req($report_id),
			'covid_impact_service_prov' => $this->CensusAffiliate_model->get_covid_impact_services_prov($report_id),
			'covid_impact_participants' => $this->CensusAffiliate_model->get_covid_impact_participants($report_id),
			'covid_impact_health_pgm' => $this->CensusAffiliate_model->get_covid_impact_health_programs($report_id),
			'covid_impact_disruptions' => $this->CensusAffiliate_model->get_covid_impact_disruptions($report_id),
			'covid_impact_services' => $this->CensusAffiliate_model->get_covid_impact_services($report_id),
			'census_tab_statuses' => $this->CensusReport_model->census_tab_statuses(),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census()
		);
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/covid.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);

		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/covid.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/covid.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}

	
	
	/**
	 * display the page for affiliate-index  and Filter list
	 *
	 * @return view 'affiliate-index.php'
	 */

	public function affiliateindex()
	{
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/filter_affiliateindex.js'
		);

		//$data['notifications'] = $this->Document_model->get_notifications();
		
		$data['content'] = array(
		);

		// $data['user_notifications'] = $this->Document_model->user_notifications();
		$data['state'] = $this->CensusAffiliate_model->get_all_states();

		//Name of the view file
		$data['view_name'] = 'modules/census/affiliate-index.php';
		
		$this->load->view('census_template', $data);
		
	}



	/**
	 * Filter Affiliate list by year affiliate and status
	 *
	 * @return view 'censusaffiliate.php'
	 */

	public function filter_affiliate_index()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get();
		
		$filters = array();

		if( isset($data['state']) && ($data['state'] !== '') )
			$filters['state'] =  $data['state'];

		if( isset($data['year']) && ($data['year'] !== '') )
			$filters['year'] =  $data['year'];			

		// if( isset($data['status']) && ($data['status'] !== '') )
		// 	$filters['field_census_status'] =  $data['status'];

		// if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		// $filters['field_affiliate_select'] =  $data['affiliate'];
		
		
		if(!isset($data['per_page']))
			$data['per_page'] = 0;
		
		if(!isset($data['page_items']))
			$data['page_items'] = NULL;
		
		$result = $this->_get_paginated_affiliates_index($data['per_page'], $filters, $data['page_items']);
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
	private function _get_paginated_affiliates_index($page_number = NULL, $filters = NULL, $page_items = NULL)
	{
		$this->load->library('pagination');

		//Load default pagination configurations
		$this->config->load('pagination');
		$config = $this->config->item('pagination'); 
		
		//Override necessary configurations for pagination
		$config['base_url'] = isset($base_url) ? $base_url : base_url('module/affiliateindex/filter');
		$config['total_rows'] = $this->CensusAffiliate_model->get_affiliateindex_count($filters);
		$config['per_page'] = ($page_items !== NULL) ? $page_items : $config['per_page'];

		$this->pagination->initialize($config);

		$page_number = ($page_number !== NULL) ? $page_number : 0;

		$report_list = $this->CensusAffiliate_model->affiliateindex_report_filter($config['per_page'], $page_number, $filters);
		return array('report_list'=> $report_list, 'pagination' => $this->pagination->create_links());
	}

	/**
	 * Census affiliate report organization page
	 *
	 * 
	 * @param  int $affiliate_id
	 * @return array
	 */
	public function organization_page($affiliate_id,$year)
	{

		
		$edu_id = $this->get_program_area_id('Education and Youth Development');
		$entrepren_id = $this->get_program_area_id('Entrepreneurship and Business Development');
		$health_id = $this->get_program_area_id('Health and Quality of Life');
		$housing_id = $this->get_program_area_id('Housing and Community Development');
		$oth_id = $this->get_program_area_id('Other Program');
		$workforce_id = $this->get_program_area_id('Workforce Development');
		$census_report = $this->CensusReport_model->annual_census_pub_census_data($year,$affiliate_id);
		$service_area_main = $this->CensusReport_model->service_areas($census_report->report_id);

		$data['content'] = array(
			'census_report' => $this->CensusReport_model->annual_census_pub_census_data($year,$affiliate_id),
			'service_data' => $this->CensusReport_model->service_areas_details($service_area_main[0]['pk_id']),
			'civic_data' => $this->CensusReport_model->annual_census_pub_civic_data($year,$affiliate_id),
			'empowerment_data' => $this->CensusReport_model->annual_census_pub_empowerment_data($year,$affiliate_id),
			'revenue_data' => $this->CensusReport_model->annual_census_pub_revenue_data($year,$affiliate_id),
			'expenditure_data' => $this->CensusReport_model->annual_census_pub_expenditure_data($year,$affiliate_id),
			'community_data' => $this->CensusReport_model->annual_census_pub_community_data($year,$affiliate_id),
			'employees_board_data' => $this->CensusReport_model->annual_census_pub_employees_board_data($year,$affiliate_id),
			'volunteers_data' => $this->CensusReport_model->annual_census_pub_volunteers_members_data($year,$affiliate_id),
			'contact_data' => $this->CensusReport_model->annual_census_pub_contact_data($year,$affiliate_id),
			'program_edu' => $this->CensusReport_model->annual_census_pub_program_data($year,$affiliate_id,$edu_id),
			'program_entrepren' => $this->CensusReport_model->annual_census_pub_program_data($year,$affiliate_id,$entrepren_id),
			'program_health' => $this->CensusReport_model->annual_census_pub_program_data($year,$affiliate_id,$health_id),
			'program_housing' => $this->CensusReport_model->annual_census_pub_program_data($year,$affiliate_id,$housing_id),
			'program_oth' => $this->CensusReport_model->annual_census_pub_program_data($year,$affiliate_id,$oth_id),
			'program_workforce' => $this->CensusReport_model->annual_census_pub_program_data($year,$affiliate_id,$workforce_id),						
		);
		$data['tab_title'] = "NATIONAL URBAN LEAGUE ".$year." CENSUS";
		//Page specific javascript files
		$data['footer']['js'] = array(
		);
		$data['view_name'] = 'modules/census/reports/annual_census_affiliate_card.php';
		$this->load->view('census_template', $data);

	}

  
	/**
	 * View page censussummary
	 */
	public function censussummary()
	{
		$data['content'] = array(
		);
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/filter_censussummary.js'			
		);
		//$data['notifications'] = $this->Document_model->get_notifications();
		$data['affiliate'] = $this->CensusAffiliate_model->get_all_affiliates();
		$data['view_name'] = 'modules/census/censussummary.php';
		$this->load->view('census_template', $data);

	}

	/** 
	 * Filter census summary report data based on year and affiliate 
	 * 
	*/
	public function	censussummary_filter()
  {
	
		//XSS Filter all the input post fields
		$data = $this->input->get();
		
		$filters = array();

		if( isset($data['year']) && ($data['year'] !== '') )
			$filters['field_year'] =  $data['year']; 


		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		$filters['field_affiliate_select'] =  $data['affiliate'];
		
		$result['filters'] = $filters; 
		$result['affiliate'] = $this->CensusReport_model->get_affiliate($filters['field_affiliate_select']);
		$result['revenue'] = $this->CensusReport_model->censussummary_revenue($filters);
		$result['expenditures'] = $this->CensusReport_model->censussummary_expenditures($filters);
		$result['education'] = $this->CensusReport_model->censussummary_education($filters);
		$result['entrepreneurship'] = $this->CensusReport_model->censussummary_entrepreneurship($filters);
		$result['health'] = $this->CensusReport_model->censussummary_health($filters);
		$result['housing'] = $this->CensusReport_model->censussummary_housing($filters);
		$result['workforce'] = $this->CensusReport_model->censussummary_workforce($filters);
		$result['civic'] = $this->CensusReport_model->censussummary_civic($filters);
		$result['emergency'] = $this->CensusReport_model->censussummary_emergency($filters);


		$data=$this->load->view('modules/census/censussummary_report_page',$result, TRUE);

		echo json_encode($data);
	}

	/**
	 * census summary report export
	 *
	 */
	public function censussummary_export()
	{
		$data = $this->input->get();
		// print_r($data); die();
		$filters = array();

		if( isset($data['year']) && ($data['year'] !== '') )
			$filters['field_year'] =  $data['year']; 


		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		$filters['field_affiliate_select'] =  $data['affiliate'];
    
		$revenue = $this->CensusReport_model->censussummary_revenue($filters);
		$expenditures = $this->CensusReport_model->censussummary_expenditures($filters);
		$education = $this->CensusReport_model->censussummary_education($filters);
		$entrepreneurship = $this->CensusReport_model->censussummary_entrepreneurship($filters);
		$health = $this->CensusReport_model->censussummary_health($filters);
		$housing = $this->CensusReport_model->censussummary_housing($filters);
		$workforce = $this->CensusReport_model->censussummary_workforce($filters);
		// print_r($expenditures); die();
		header("Content-Type: application/csv");
		header("Content-Disposition: attachment;filename=\"census_summary_report_date".".csv\"");
		header("Pragma: no-cache");
		header("Expires: 0");

		$file = fopen('php://output', 'w');
		$header = array($filters['field_year']." All"); 
		fputcsv($file, $header);
		//Expenditures
		fputcsv($file, array("Expenditures"));
		foreach ($expenditures as $expenditures_data) {
			$column['0'] = ""; 
			$column['1'] = "What was the total expenditure by your affiliate for expenses (include salaries, rent/mortgage, equipment, etc.)?"; 
			$column['2'] = "$".$expenditures_data['field_total_expenditures']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "A. Salaries/Wages"; 
			$column['2'] = "$".$expenditures_data['field_a_salaries_wages']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "B. Fringe Benefits"; 
			$column['2'] = "$".$expenditures_data['field_b_fringe_benefits']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "C. Professional/Contract/Consulting Fees"; 
			$column['2'] = "$".$expenditures_data['field_c_professional_fees']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "D. Travel"; 
			$column['2'] = "$".$expenditures_data['field_d_travel']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "E. Postage/Freight"; 
			$column['2'] = "$".$expenditures_data['field_e_postage_freight']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "F. Insurance"; 
			$column['2'] = "$".$expenditures_data['field_f_insurance']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "G. Interest Payments"; 
			$column['2'] = "$".$expenditures_data['field_g_interest_payments']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "H. Dues/Subscription/Registration"; 
			$column['2'] = "$".$expenditures_data['field_h_dues_subscription_regist']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "I. Depreciation"; 
			$column['2'] = "$".$expenditures_data['field_i_depreciation']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "J. Taxes (including property taxes)"; 
			$column['2'] = "$".$expenditures_data['field_j_taxes_including_property']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "K. Utilities (telephone gas electric)"; 
			$column['2'] = "$".$expenditures_data['field_k_utilities']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "L. Equipment/space rental"; 
			$column['2'] = "$".$expenditures_data['field_l_equipment_space_rental']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "M. Goods and Services"; 
			$column['2'] = "$".$expenditures_data['field_m_goods_and_services']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "N. Rent/mortgage payments"; 
			$column['2'] = "$".$expenditures_data['field_n_rent_mortgage_payments']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "O. Other"; 
			$column['2'] = "$".$expenditures_data['field_o_other']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "How many properties does the affiliate own?"; 
			$column['2'] = "$".$expenditures_data['field_number_properties_owned']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "How many properties does the affiliate rent?"; 
			$column['2'] = "$".$expenditures_data['field_number_properties_rented']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "If the affiliate owns its facilities what is the current market value of the property?"; 
			$column['2'] = "$".$expenditures_data['field_market_value_of_property']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "If so how much?"; 
			$column['2'] = "$".$expenditures_data['field_capital_budget_amount']; 
			fputcsv($file, array_values($column));
		}	
		//Revenue
		fputcsv($file, array("Revenue"));
		foreach ($revenue as $revenue_data) {
			$column['0'] = ""; 
			$column['1'] = "What is the total budget of your affiliate?"; 
			$column['2'] = "$".$revenue_data['field_revenue_total_budget']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "NUL"; 
			$column['2'] = "$".$revenue_data['field_revenue_nul']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Corporations"; 
			$column['2'] = "$".$revenue_data['field_revenue_corporations']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Foundations"; 
			$column['2'] = "$".$revenue_data['field_revenue_foundations']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Individual Memberships"; 
			$column['2'] = "$".$revenue_data['field_revenue_individual_members']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Special Events"; 
			$column['2'] = "$".$revenue_data['field_revenue_special_events']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "United Way"; 
			$column['2'] = "$".$revenue_data['field_revenue_united_way']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Federal"; 
			$column['2'] = "$".$revenue_data['field_revenue_federal']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "State/Local"; 
			$column['2'] = "$".$revenue_data['field_revenue_state_local']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Other"; 
			$column['2'] = "$".$revenue_data['field_revenue_other']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "How much investment earnings (money market account, endowment)?"; 
			$column['2'] = "$".$revenue_data['field_revenue_investment']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Does the affiliate have an endowment?"; 
			$column['2'] = "$".$revenue_data['field_revenue_has_endowment']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "If so, what is the present amount?"; 
			$column['2'] = "$".$revenue_data['field_revenue_endowment_amount']; 
			fputcsv($file, array_values($column));
		}	
		//Education Programs
		fputcsv($file, array("Education Programs"));
		foreach ($education as $education_data) {
			$column['0'] = ""; 
			$column['1'] = "Total Participants in Education Programs"; 
			$column['2'] = "$".$education_data['field_program_ed_total_participa']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Total Foster Care placements/recommendations for services"; 
			$column['2'] = "$".$education_data['field_program_ed_foster_total']; 
			fputcsv($file, array_values($column));
		}	
		//Entrepreneurship and Business Development Programs
		fputcsv($file, array("Entrepreneurship and Business Development Programs"));
		foreach ($entrepreneurship as $entrepreneurship_data) {
			$column['0'] = ""; 
			$column['1'] = "Total Participants in Entrepreneurship Programs"; 
			$column['2'] = "$".$entrepreneurship_data['field_program_entpr_total_partic']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of new businesses created"; 
			$column['2'] = "$".$entrepreneurship_data['field_program_entpr_new']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Total sales of businesses started by participants in entrepreneurship programs (i.e. Small Business Matters)"; 
			$column['2'] = "$".$entrepreneurship_data['field_program_entpr_sales']; 
			fputcsv($file, array_values($column));
		}	
		//Health and Quality of Life Programs
		fputcsv($file, array("Health and Quality of Life Programs"));
		foreach ($health as $health_data) {
			$column['0'] = ""; 
			$column['1'] = "Total Participants in Health Programs"; 
			$column['2'] = "$".$health_data['field_program_health_total_parti']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of individuals assisted with using their health insurance by Community Health Worker or Navigator"; 
			$column['2'] = "$".$health_data['field_program_health_assisted']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of individuals enrolled in health insurance by Community Health Worker or Navigator"; 
			$column['2'] = "$".$health_data['field_program_health_enrolled']; 
			fputcsv($file, array_values($column));
		}
		//Housing and Community Development Programs
		fputcsv($file, array("Housing and Community Development Programs"));
		foreach ($housing as $housing_data) {
			$column['0'] = ""; 
			$column['1'] = "Total Participants in Housing Programs"; 
			$column['2'] = "$".$housing_data['field_program_housing_total_part']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "How many participants attended or inquired about home ownership programs?"; 
			$column['2'] = "$".$housing_data['field_program_housing_attended']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of program participants who purchased a home"; 
			$column['2'] = "$".$housing_data['field_program_housing_purchased']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Average price of homes purchased"; 
			$column['2'] = "$".$housing_data['field_program_housing_avg_price']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of foreclosures prevented"; 
			$column['2'] = "$".$housing_data['field_program_housing_not4closed']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "How many people were turned to alternative housing after losing their house?"; 
			$column['2'] = "$".$housing_data['field_program_housing_alternate']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "How many people needing assistance have children under the age of 18 years of age?"; 
			$column['2'] = "$".$housing_data['field_program_housing_have_kids']; 
			fputcsv($file, array_values($column));
		}
		//Workforce Development Programs
		fputcsv($file, array("Workforce Development Programs"));
		foreach ($workforce as $workforce_data) {
			$column['0'] = ""; 
			$column['1'] = "Total Participants in Workforce Programs"; 
			$column['2'] = "$".$workforce_data['field_program_work_participants']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of participants placed in jobs"; 
			$column['2'] = "$".$workforce_data['field_program_work_placed']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of placed participants who retained jobs for 90 days"; 
			$column['2'] = "$".$workforce_data['field_program_work_retained']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Annual salary (if applicable)"; 
			$column['2'] = "$".number_format((float)$workforce_data['field_program_work_salary'], 2, '.', ''); 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Hourly wage rate"; 
			$column['2'] = "$".number_format((float)$workforce_data['field_program_work_hourly'], 2, '.', ''); 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of welfare participants in federal/state funded programs"; 
			$column['2'] = "$".$workforce_data['field_program_work_welfare']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Number of welfare program participants placed in jobs"; 
			$column['2'] = "$".$workforce_data['field_program_work_welfare_place']; 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Annual welfare salary (if applicable)"; 
			$column['2'] = "$".number_format((float)$workforce_data['field_program_work_welfare_salar'], 2, '.', ''); 
			fputcsv($file, array_values($column));
			$column['0'] = ""; 
			$column['1'] = "Hourly wage rate (welfare)"; 
			$column['2'] = "$".number_format((float)$workforce_data['field_program_work_welfare_hour'], 2, '.', ''); 
			fputcsv($file, array_values($column));
		}
		fclose($file);
		exit;
	}

	/**
	 * Filter Affiliate list by year affiliate and status
	 *
	 * @return view 'censusaffiliate.php'
	 */

	public function filter()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get();
		
		$filters = array();

		if( isset($data['year']) && ($data['year'] !== '') )
			$filters['field_year'] =  $data['year']; 

		if( isset($data['status']) && ($data['status'] !== '') )
			$filters['field_census_status'] =  $data['status'];

		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		$filters['field_affiliate_select'] =  $data['affiliate'];
		

		if(!isset($data['per_page']))
			$data['per_page'] = 0;
		
		if(!isset($data['page_items']))
			$data['page_items'] = NULL;
		
		$result = $this->_get_paginated_affiliates_front($data['per_page'], $filters, $data['page_items']);
		echo json_encode($result);
	}

	/**
	 * Report - cumulative_census_revenue 
	 * */
	public function cumulative_census_revenue()
	{

		$report = $this->CensusReport_model->cumulative_census_revenue();
    $total_count = count($report);
		$data['content'] = [
			'report' => $report,
			'year_from' => $report[0]['year'],
			'year_to' => $report[--$total_count]['year']
		];		

		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);
		$data['view_name'] = 'modules/census/reports/fin_cumulative_census_revenue.php';
		$this->load->view('census_template', $data);

	}	

	/**
	 * Report - affiliate_census_revenue 
	 * */
	public function affiliate_census_revenue()
	{

		//XSS Filter all the input post fields
		$data = $this->input->get();
		if($data['def_year'] == 1){
			$year_selected = $data['year'];
		}
		else{
			if(!empty($data['year']))
			$year_selected = $data['year'];
			else	
			$year_selected = 2021;
		}

		if(!empty($data['affiliate']))
			$affilate_selected = $data['affiliate'];
		else
			$affilate_selected = '';

		$filters = array();
    
		//default year
		if($data['def_year'] == ''){
			$filters['year'] = 2021;
		}

		if($data['def_year'] == 1){
			
		}
		else{
			if( isset($data['year']) && ($data['year'] !== '') ){
				$filters['year'] =  $data['year'];
			}
			else{
				$data['year']= 2021;
			}	
		}		


		if( isset($data['affiliate']) && ($data['affiliate'] !== '') ){
      $affiliate_name =  $this->CensusReport_model->get_affiliate($data['affiliate']);
		  $filters['affiliate'] = $affiliate_name->organization;
		}
		
		$report_data = $this->CensusReport_model->revenue_expenditure_yearly_affiliate($filters);  
		$data['content'] = [
			'report_data' => $report_data,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected' => $year_selected,
			'affiliate_selected' => $affilate_selected,
		];
		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
			//'census/main.js',
		);
		$data['view_name'] = 'modules/census/reports/fin_affiliate_census_revenue.php';
		$this->load->view('census_template', $data);

	}

	 
	/**
	 * Report - affiliate_census_revenue 
	 * */
	public function cumulative_keyfund_revenue()
	{

		$data['content'] = [
			'report_data' => $this->CensusReport_model->cumulative_keyfund_revenue()
		];
		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);
		
		$data['view_name'] = 'modules/census/reports/fin_cumulative_keyfund_revenue.php';
		$this->load->view('census_template', $data);
	}   

	

	/**
	 * Report - affiliate key fund query report 
	 * */
	public function affiliate_keyfund_query()
	{

		//XSS Filter all the input post fields
		$data = $this->input->get();

		$filters = array();
		if($data['def_year'] == 1){
			$year_selected = $data['year'];
		}
		else{
			if(!empty($data['year']))
			$year_selected = $data['year'];
			else	
			$year_selected = 2018;
		}

		if(!empty($data['affiliate']))
		$affilate_selected = $data['affiliate'];
		else
		$affilate_selected = '';

		if($data['def_year'] == 1){

		}
		else{
			if( isset($data['year']) && ($data['year'] !== '') )
				$filters['year'] =  $data['year']; 
			else
			$filters['year'] = 2018;
		}

		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
		$filters['affiliate'] =  $data['affiliate'];
		$report_data = $this->CensusReport_model->affiliate_keyfund_query($filters);
		$report_data = $this->CensusReport_model->affiliate_keyfund_query($filters);
		$data['content'] = [
			'report_data' => $report_data,
			'organization' => isset($filters['affiliate']) ? $filters['affiliate'] : '',
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected' => $year_selected,
			'affiliate_selected' => $affilate_selected,
		];
		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/filter_affiliate_keyfund_query.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);
		
		$data['view_name'] = 'modules/census/reports/fin_affiliate_keyfund_query.php';
		$this->load->view('census_template', $data);

	}	


	/**
	 * View page program_education
	 */
	/*
	public function program_education()
	{
		$data['content'] = array(
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
			'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
			'services_provided' => $this->CensusAffiliate_model->services_provided(),
			'program_type' => $this->CensusAffiliate_model->program_type()
		);
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			//'census/main.js',
		);
		$data['tab_title'] = "NATIONAL URBAN LEAGUE 2022 CENSUS";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', NULL, TRUE);
		//$data['notifications'] = $this->Document_model->get_notifications();
		if($this->session->role_id == 1){$data['view_name'] = 'modules/census/program_education.php';}
		else{$data['view_name'] = 'modules/census/ceo/program_education.php';}
		$this->load->view('census_template', $data);

	} */

	/**
	 * View page add program
	 */
	public function add_program($report_id,$prg_type)
	{

    $program_area_ids =[
			'education_program' => EDUCATION_PROGRAM_ID,
			'entrepreneurship_program' => ENTREPRENEURSHIP_PROGRAM_ID,
			'health_quality' => HEALTH_PROGRAM_ID,
			'housing' => HOUSING_PROGRAM_ID,
			'workforce' => WORKFORCE_PROGRAM_ID,
			'other_programs' => OTHER_PROGRAM_ID
		];

		$report_details = $this->CensusAffiliate_model->report_details($report_id);
		$affiliate_id = $this->session->affiliate_id;
		$target_groups = 
		$data['content'] = array(
			'program_area_id' => $program_area_ids[$prg_type],
      		'program_area' => $prg_type,
			'report_id' => $report_id,
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
			'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
			'funding_organizations' => $this->CensusAffiliate_model->funding_organizations(),
			'services_provided' => $this->CensusAffiliate_model->services_provided(),
			'program_type' => $this->CensusAffiliate_model->program_type(),
			'target_groups_served' => $this->CensusAffiliate_model->get_target_groups_served($prg_type)
		);
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/program_add.js',
		);
		$statuses = $this->left_tab_statuses_list($report_id);
		$data['tab_title'] = $report_details->organization." ".$report_details->field_year." Census";
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		if($this->session->role_id == 1){
			$data['view_name'] = 'modules/census/program_add.php';
		}elseif($affiliate_id == $report_details->affiliate_id){
			$data['view_name'] = 'modules/census/program_add.php';
		}else{ redirect("/");}
		$this->load->view('census_template', $data);

	}


	/**
	 * View page program_entrepreneurship
	 */
	// public function program_entrepreneurship()
	// {
	// 	$data['content'] = array(
	// 		'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
	// 		'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
	// 		'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
	// 		'services_provided' => $this->CensusAffiliate_model->services_provided(),
	// 		'program_type' => $this->CensusAffiliate_model->program_type()
	// 	);
	// 	//Page specific javascript files
	// 	$data['footer']['js'] = array(
	// 		'https://unpkg.com/mustache@latest',
	// 		//'census/main.js',
	// 	);
		
	// 	$data['tab_title'] = "NATIONAL URBAN LEAGUE 2022 CENSUS";
	// 	$data['left_tabs'] = $this->load->view('modules/census/left_tabs', NULL, TRUE);
	// 	//$data['notifications'] = $this->Document_model->get_notifications();
	// 	if($this->session->role_id == 1){$data['view_name'] = 'modules/census/program_entrepreneurship.php';}
	// 	else{$data['view_name'] = 'modules/census/ceo/program_entrepreneurship.php';}
	// 	$this->load->view('census_template', $data);

	// }
	/**
	 * View page program_health
	 */
	// public function program_health()
	// {
	// 	$data['content'] = array(
	// 		'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
	// 		'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
	// 		'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
	// 		'services_provided' => $this->CensusAffiliate_model->services_provided(),
	// 		'program_type' => $this->CensusAffiliate_model->program_type()
	// 	);
	// 	//Page specific javascript files
	// 	$data['footer']['js'] = array(
	// 		'https://unpkg.com/mustache@latest',
	// 		//'census/main.js',
	// 	);
	// 	$data['tab_title'] = "NATIONAL URBAN LEAGUE 2022 CENSUS";
	// 	$data['left_tabs'] = $this->load->view('modules/census/left_tabs', NULL, TRUE);
	// 	//$data['notifications'] = $this->Document_model->get_notifications();
	// 	if($this->session->role_id == 1){$data['view_name'] = 'modules/census/program_health.php';}
	// 	else{$data['view_name'] = 'modules/census/ceo/program_health.php';}
	// 	$this->load->view('census_template', $data);

	// }
	/**
	 * View page program_housing
	 */
	// public function program_housing()
	// {
	// 	$data['content'] = array(
	// 		'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
	// 		'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
	// 		'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
	// 		'services_provided' => $this->CensusAffiliate_model->services_provided(),
	// 		'program_type' => $this->CensusAffiliate_model->program_type()
	// 	);
	// 	//Page specific javascript files
	// 	$data['footer']['js'] = array(
	// 		'https://unpkg.com/mustache@latest',
	// 		//'census/main.js',
	// 	);
	// 	$data['tab_title'] = "NATIONAL URBAN LEAGUE 2022 CENSUS";
	// 	$data['left_tabs'] = $this->load->view('modules/census/left_tabs', NULL, TRUE);
	// 	//$data['notifications'] = $this->Document_model->get_notifications();
	// 	if($this->session->role_id == 1){$data['view_name'] = 'modules/census/program_housing.php';}
	// 	else{$data['view_name'] = 'modules/census/ceo/program_housing.php';}
	// 	$this->load->view('census_template', $data);

	// }
	/**
	 * View page program_workforce
	 */
	// public function program_workforce()
	// {
	// 	$data['content'] = array(
	// 		'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
	// 		'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
	// 		'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
	// 		'services_provided' => $this->CensusAffiliate_model->services_provided(),
	// 		'program_type' => $this->CensusAffiliate_model->program_type()
	// 	);
	// 	//Page specific javascript files
	// 	$data['footer']['js'] = array(
	// 		'https://unpkg.com/mustache@latest',
	// 		//'census/main.js',
	// 	);
	// 	$data['tab_title'] = "NATIONAL URBAN LEAGUE 2022 CENSUS";
	// 	$data['left_tabs'] = $this->load->view('modules/census/left_tabs', NULL, TRUE);
	// 	//$data['notifications'] = $this->Document_model->get_notifications();
	// 	if($this->session->role_id == 1){$data['view_name'] = 'modules/census/program_workforce.php';}
	// 	else{$data['view_name'] = 'modules/census/ceo/program_workforce.php';}
	// 	$this->load->view('census_template', $data);

	// }
	/**
	 * View page program_other
	 */
	// public function program_other()
	// {
	// 	$report_id = $this->uri->segment('3');
	// 	$data['content'] = array(
	// 		'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
	// 		'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
	// 		'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
	// 		'services_provided' => $this->CensusAffiliate_model->services_provided(),
	// 		'program_type' => $this->CensusAffiliate_model->program_type()
	// 	);
	// 	//Page specific javascript files
	// 	$data['footer']['js'] = array(
	// 		'https://unpkg.com/mustache@latest',
	// 		//'census/main.js',
	// 	);
	// 	$statuses = $this->left_tab_statuses_list($report_id);
	// 	$data['tab_title'] = "NATIONAL URBAN LEAGUE 2022 CENSUS";
	// 	$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
	// 	//$data['notifications'] = $this->Document_model->get_notifications();
	// 	if($this->session->role_id == 1){$data['view_name'] = 'modules/census/program_other.php';}
	// 	else{$data['view_name'] = 'modules/census/ceo/program_other.php';}
	// 	$this->load->view('census_template', $data);

	// }

	/**
	 * display the page for censuses-for-my-affiliate
	 *
	 * @return view 'censuses-for-my-affiliate.php'
	 */

	public function censuses_for_my_affiliate()
	{
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
		);

		$affiliate =  $this->CensusReport_model->get_drupal_affiliate_id($this->session->affiliate_id);
		$cur_year = date("Y");

		$data['content'] = array(
			'data' => $affiliate,
			'census_report' => $this->CensusReport_model->annual_census_pub_census_data($cur_year,$affiliate->field_affiliate_select_value),
		);
		$data['view_name'] = 'modules/census/censuses-for-my-affiliate.php';
		$this->load->view('census_template', $data);

	}

	/**
	 * Get program area id from area name
	 */
	private function get_program_area_id($area)
	{
		return $this->CensusReport_model->get_program_area_id($area);
	}

	private function left_tab_statuses_list($report_id){

		$tab_statuses =  $this->CensusReport_model->select_tab_statuses($report_id);
		$stat_temp_arr = (array) $tab_statuses;
    	$stat_text = [
			STATUS_COMPLETE => 'Completed',
			STATUS_INCOMPLETE => 'Incomplete',
			STATUS_RESUBMIT => 'Resubmit',
			STATUS_REVIEWED_COMPLETE => 'Reviewed Complete',
			STATUS_REVIEWED => 'Reviewed',
			STATUS_SUBMITTED => 'Submitted',
			0 => 'Not Started',
			null => 'Not Started'
		];
		
		foreach($stat_temp_arr as $key => $val){
			$tab_stat_arr[$key] = $stat_text[$val];
		}

    $icons = [
			'Not Started' => 'i i-not_started_icon',
			'Incomplete' => 'i i-incomplete_icon',
			'Resubmit' => 'i i-resubmit',
			'Completed' => 'i i-completed',
			'Reviewed' => 'i i-reviewed',
			'Reviewed Complete' => 'i i-reviewed-complete',
			'Submitted' => 'i i-submitted'
		];

		$classes = [
			'Not Started' => 'text-danger',
			'Incomplete' => 'text-warning',
			'Resubmit' => 'text-infoL',
			'Completed' => 'text-primary',
			'Reviewed' => 'text-review',
			'Reviewed Complete' => 'text-reviewC',
			'Submitted' => 'text-validate'
		];

    $statuses['statuses'] = [
          'serviceareas' => ['status'=>$tab_stat_arr['serviceareas'], 'icon'=>$icons[$tab_stat_arr['serviceareas']],'class'=>$classes[$tab_stat_arr['serviceareas']]],
					'community' => ['status'=>$tab_stat_arr['community'], 'icon'=>$icons[$tab_stat_arr['community']],'class'=>$classes[$tab_stat_arr['community']]],
					'employees' => ['status'=>$tab_stat_arr['employees'], 'icon'=>$icons[$tab_stat_arr['employees']],'class'=>$classes[$tab_stat_arr['employees']]],
					'revenue' => ['status'=>$tab_stat_arr['revenue'], 'icon'=>$icons[$tab_stat_arr['revenue']],'class'=>$classes[$tab_stat_arr['revenue']]],
					'expenditure' => ['status'=>$tab_stat_arr['expenditure'], 'icon'=>$icons[$tab_stat_arr['expenditure']],'class'=>$classes[$tab_stat_arr['expenditure']]],
					'education_program' => ['status'=>$tab_stat_arr['education_program'], 'icon'=>$icons[$tab_stat_arr['education_program']],'class'=>$classes[$tab_stat_arr['education_program']]],
					'entrepreneurship_program' => ['status'=>$tab_stat_arr['entrepreneurship_program'], 'icon'=>$icons[$tab_stat_arr['entrepreneurship_program']],'class'=>$classes[$tab_stat_arr['entrepreneurship_program']]],
					'health_quality' => ['status'=>$tab_stat_arr['health_quality'], 'icon'=>$icons[$tab_stat_arr['health_quality']],'class'=>$classes[$tab_stat_arr['health_quality']]],
					'housing' => ['status'=>$tab_stat_arr['housing'], 'icon'=>$icons[$tab_stat_arr['housing']],'class'=>$classes[$tab_stat_arr['housing']]],
					'workforce' => ['status'=>$tab_stat_arr['workforce'], 'icon'=>$icons[$tab_stat_arr['workforce']],'class'=>$classes[$tab_stat_arr['workforce']]],
					'other_programs' => ['status'=>$tab_stat_arr['other_programs'], 'icon'=>$icons[$tab_stat_arr['other_programs']],'class'=>$classes[$tab_stat_arr['other_programs']]],
					'covid' => ['status'=>$tab_stat_arr['covid'], 'icon'=>$icons[$tab_stat_arr['covid']],'class'=>$classes[$tab_stat_arr['covid']]],
					'civic' => ['status'=>$tab_stat_arr['civic'], 'icon'=>$icons[$tab_stat_arr['civic']],'class'=>$classes[$tab_stat_arr['civic']]],
					'emergency_relief' => ['status'=>$tab_stat_arr['emergency_relief'], 'icon'=>$icons[$tab_stat_arr['emergency_relief']],'class'=>$classes[$tab_stat_arr['emergency_relief']]],
					'contact_data' => ['status'=>$tab_stat_arr['contact_data'], 'icon'=>$icons[$tab_stat_arr['contact_data']],'class'=>$classes[$tab_stat_arr['contact_data']]],
					'empowerment' => ['status'=>$tab_stat_arr['empowerment'], 'icon'=>$icons[$tab_stat_arr['empowerment']],'class'=>$classes[$tab_stat_arr['empowerment']]],
					'volunteer' => ['status'=>$tab_stat_arr['volunteer'], 'icon'=>$icons[$tab_stat_arr['volunteer']],'class'=>$classes[$tab_stat_arr['volunteer']]],
					//'covid' => ['status'=>$tab_stat_arr['covid'], 'icon'=>$icons[$tab_stat_arr['covid']],'class'=>$classes[$tab_stat_arr['covid']]],
		];
		return $statuses;
	}

	/**
	 * View page add program
	 */
	public function viewprogram()
	{
		$report_id = $this->uri->segment('3');
		$pk_id = $this->uri->segment('4');
		$report_details = $this->CensusAffiliate_model->get_programs_details($report_id,$pk_id);
		$target_groups_served = $this->CensusAffiliate_model->get_target_groups_served_by_program($pk_id);
		$target_groups_served_ids = array();
		$services_provided_list = array();
		foreach($target_groups_served as $r) $target_groups_served_ids[]= $r['tid'];
		
		if ( $report_details[0]['field_program_area_tid'] == '494' ) $prg_area = 'education_program';
		elseif ( $report_details[0]['field_program_area_tid'] == '495' ) $prg_area = 'entrepreneurship_program';
		elseif ( $report_details[0]['field_program_area_tid'] == '496' ) $prg_area = 'health_quality';
		elseif ( $report_details[0]['field_program_area_tid'] == '497' ) $prg_area = 'housing';
		elseif ( $report_details[0]['field_program_area_tid'] == '498' ) $prg_area = 'other';
		elseif ( $report_details[0]['field_program_area_tid'] == '499' ) $prg_area = 'workforce';
		
		$list_ids = $this->CensusAffiliate_model->get_program_services_by_program_id($pk_id);

		foreach($list_ids as $list) $services_provided_list []= $list['field_program_service_provided_tid'];
		
		$data['content'] = array(
			'report_data' => $report_details,
			'target_groups_served_all' => $this->CensusAffiliate_model->get_target_groups_served($prg_area),
			'parent_census' => $this->CensusAffiliate_model->get_all_parent_census(),
			'program_type' => $this->CensusAffiliate_model->program_type(),
			'funding_sources' => $this->CensusAffiliate_model->get_funding_sources_by_program_id($pk_id),
			'program_services' => $list_ids,
			'services_provided_all' => $this->CensusAffiliate_model->services_provided(),
			'list_ids'=> $services_provided_list,
			'funding_sectors' => $this->CensusAffiliate_model->funding_sectors(),
			'funding_vehicles' => $this->CensusAffiliate_model->funding_vehicles(),
			'funding_organizations' => $this->CensusAffiliate_model->funding_organizations(),
			//'report_statuses' => $this->CensusReport_model->census_report_statuses()
		);

		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/forms/update_prg.js',
		);
		$statuses = $this->left_tab_statuses_list($report_details[0]['field_parent_census']);
		$data['report_id']=$report_id;
		$data['tidlist'] = $target_groups_served_ids;
		$data['tgs'] = $target_groups_served;
		$data['left_tabs'] = $this->load->view('modules/census/left_tabs', $statuses, TRUE);
		$data['tab_title'] = $report_details[0]['organization']." ".$report_details[0]['field_year']." Census";
		$data['view_name'] = 'modules/census/viewprogram.php';
		$this->load->view('census_template', $data);

	}
 
	public function cumulative_census_revenue_export()
	{

		$report = $this->CensusReport_model->cumulative_census_revenue();
    	$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'YEAR');
		$sheet->setCellValue('B1', 'TOTAL REVENUE');
		$sheet->setCellValue('C1', 'TOTAL EXPENDITURES');
		$sheet->setCellValue('D1', 'NET');

		$i = 2;
		//print_r($report);
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['year']);
			$sheet->setCellValue('B'.$i , $row['revenue']);
			$sheet->setCellValue('C'.$i , $row['expenditures']);
			$sheet->setCellValue('D'.$i , $row['net']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="NUL_Census_Financials_Aggregate-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	public function affiliate_census_revenue_export()
	{
		
		$params = $this->input->get();
		//print_r($params);		
		$filters = array();

		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];
		//print_r($filters);
		$report = $this->CensusReport_model->revenue_expenditure_yearly_affiliate_export($filters);//print_r($report);die();
		//print_r($report);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', 'Total Revenue');
		$sheet->setCellValue('D1', 'Total Expenditures');
		$sheet->setCellValue('E1', 'Net');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['year']);
			$sheet->setCellValue('B'.$i , $row['affiliate']);
			$sheet->setCellValue('C'.$i , $row['revenue']);
			$sheet->setCellValue('D'.$i , $row['expenditures']);
			$sheet->setCellValue('E'.$i , $row['net']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="nul-census-affiliate-financials-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	public function affiliate_keyfund_query_export()
	{
		
		$params = $this->input->get();
		//print_r($params);	die();	
		$filters = array();

		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];
		//print_r($filters);
		$report = $this->CensusReport_model->affiliate_keyfund_query($filters);//print_r($report);die();
		//print_r($report);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', 'Federal');
		$sheet->setCellValue('D1', 'State/Local');
		$sheet->setCellValue('E1', 'Nul');
		$sheet->setCellValue('F1', 'United Way');
		$sheet->setCellValue('G1', 'Total Revenue');
		$sheet->setCellValue('H1', '% Nul Funded');

		$i = 2;
		
		foreach($report as $row)
		{
			if($row['field_revenue_nul'] !=0)
			{
				$per = sprintf('%0.2f',($row['field_revenue_nul']*100)/$row['field_revenue_total_budget']);				
			}else
			{
				$per = 0.00;
			}
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['organization']);
			$sheet->setCellValue('C'.$i , $row['field_revenue_federal']);
			$sheet->setCellValue('D'.$i , $row['field_revenue_state_local']);
			$sheet->setCellValue('E'.$i , $row['field_revenue_nul']);
			$sheet->setCellValue('F'.$i , $row['field_revenue_united_way']);
			$sheet->setCellValue('G'.$i , $row['field_revenue_total_budget']);
			$sheet->setCellValue('H'.$i , $per."%");
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="revenue-review-data-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);

	}		
	
	public function cumulative_keyfund_revenue_export()
	{

		$report = $this->CensusReport_model->cumulative_keyfund_revenue();
    	
		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'YEAR');
		$sheet->setCellValue('B1', 'FEDERAL');
		$sheet->setCellValue('C1', 'STATE/LOCAL');
		$sheet->setCellValue('D1', 'NUL');
		$sheet->setCellValue('E1', 'UNITED WAY');
		$sheet->setCellValue('F1', 'TOTAL REVENUE');

		$i = 2;
		//print_r($report);
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['field_revenue_federal']);
			$sheet->setCellValue('C'.$i , $row['field_revenue_state_local']);
			$sheet->setCellValue('D'.$i , $row['field_revenue_nul']);
			$sheet->setCellValue('E'.$i , $row['field_revenue_united_way']);
			$sheet->setCellValue('F'.$i , $row['field_revenue_total_budget']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="key-funders-data-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

    private function _get_paginated_affiliates_front($page_number = NULL, $filters = NULL, $page_items = NULL)
	{
		$this->load->library('pagination');

		//Load default pagination configurations
		$this->config->load('pagination');
		$config = $this->config->item('pagination'); 
		
		//Override necessary configurations for pagination
		$config['base_url'] = isset($base_url) ? $base_url : base_url('module/census_affiliate/filter');
		$config['total_rows'] = $this->CensusAffiliate_model->get_report_count($filters);
		$config['per_page'] = 100;

		$this->pagination->initialize($config);

		$page_number = ($page_number !== NULL) ? $page_number : 0;

		$report_list = $this->CensusAffiliate_model->affiliate_report_filter($config['per_page'], $page_number, $filters);
		return array('report_list'=> $report_list, 'pagination' => $this->pagination->create_links());
	}
	
}

	

	



