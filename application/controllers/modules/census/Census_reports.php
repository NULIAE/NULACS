<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/excel/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class Census_reports extends MY_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CensusAffiliate_model');
		$this->load->model('CensusReport_model');
	}
	
	/**
	 * Cumulative people history
	 *
	 */
	public function cumulative_people_history()
	{
		$report = $this->CensusReport_model->cumulative_people_history();
		$data['content'] = [
			'report' => $report,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_cumulative_people_history.php';
		$this->load->view('census_template', $data);
	}	


	/**
	 * Cumulative people history
	 *
	 */
	public function cumulative_people_history_export()
	{
		$report = $this->CensusReport_model->cumulative_people_history();
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Total Indirect Contacts');
		$sheet->setCellValue('C1', 'Total Public Contacts');
		$sheet->setCellValue('D1', 'Total Direct Contacts');
		$sheet->setCellValue('E1', 'Total Contacts');

		$i = 2;
  
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['indirect']);
			$sheet->setCellValue('C'.$i , $row['public']);
			$sheet->setCellValue('D'.$i , $row['direct']);
			$sheet->setCellValue('E'.$i , $row['net']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="cummulative-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	/**
	 * Affiliate people history
	 *
	 */
	public function affiliate_people_history()
	{
		$report = $this->CensusReport_model->affiliate_people_history();
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_people_history.js',
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_affiliate_people_history.php';
		$this->load->view('census_template', $data);
	}	

	/**
	 * Affiliate people history
	 *
	 */
	public function affiliate_people_history_filter()
	{
		//XSS Filter all the input post fields
		$params = $this->input->get();
		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		$report = $this->CensusReport_model->affiliate_people_history($filters);
		$data['report'] = $report;

		$result=$this->load->view('modules/census/reports/ppl_affiliate_people_history_filter.php',$data, TRUE);
		echo json_encode($result);

	}	

		

	/**
	 * Cumulative civic engagement
	 *
	 */
	public function cumulative_civic_engagement()
	{
		$report = $this->CensusReport_model->cumulative_civic_engagement();
		$data['content'] = [
			'report' => $report,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_cumulative_civic_engagement.php';
		$this->load->view('census_template', $data);
	}	

	/**
	 * Affiliate civic engagement query
	 *
	 */
	public function affiliate_civic_engagement_query()
	{
		$params = $this->input->get();
		if(!empty($params['year']))
		$year_selected = $filters['year'] = $params['year'];
		else	
		$year_selected = $filters['year'] = 2018;
		$report = $this->CensusReport_model->affiliate_civic_engagement($filters);
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected' => $year_selected,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_civic_engagement.js',
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_affiliate_civic_engagement.php';
		$this->load->view('census_template', $data);
	}
 
	/**
	 * Affiliate civic engagement query Filter
	 *
	 */
	public function affiliate_civic_engagement_query_filter()
	{
		
		$params = $this->input->get();		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];

		$report = $this->CensusReport_model->affiliate_civic_engagement($filters);
		$data['report'] = $report; 	

		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_civic_engagement.js',
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);
	
		$result=$this->load->view('modules/census/reports/ppl_affiliate_civic_engagement_filter.php',$data, TRUE);
		echo json_encode($result);
	}

	/**
	 * Affiliate voter registration
	 *
	 */
	public function voter_registration()
	{
		$year_selected = $filters['year'] = 2018;
		$report = $this->CensusReport_model->affiliate_civic_engagement($filters);
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'states' => $this->CensusAffiliate_model->get_all_states(),
			'year_selected' => $year_selected,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_voter_registration.js',
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_voter_registration.php';
		$this->load->view('census_template', $data);	
	}	

	/**
	 * Affiliate voter registration
	 *
	 */
	public function voter_registration_filter()
	{
		$params = $this->input->get();		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['state']) && ($params['state'] != '') && ($params['state'] != '0') )
			$filters['state'] =  $params['state'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];

		$report = $this->CensusReport_model->affiliate_civic_engagement($filters);
		$data['report'] = $report;		
	
		$result=$this->load->view('modules/census/reports/ppl_voter_registration_filter.php',$data, TRUE);
		echo json_encode($result);	
	}	

	
	/**
	 * Cumulative employee report
	 *
	 */
	public function cumulative_employee_report()
	{
		$report = $this->CensusReport_model->cumulative_employee_report();
		$data['content'] = [
			'report' => $report,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/emp_cumulative_employee_report.php';
		$this->load->view('census_template', $data);
	}

	/**
	 * Affiliate employee report
	 *
	 */
	public function affiliate_employee_report()
	{
		$params = $this->input->get();
		if(!empty($params['year']))
		$year_selected = $filters['year'] = $params['year'];
		else
		$year_selected = $filters['year'] = 2018;
		$report = $this->CensusReport_model->affiliate_employee_report($filters);
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected' => $year_selected
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_employee_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/emp_affiliate_employee_report.php';
		$this->load->view('census_template', $data);
	}	

	/**
	 * Affiliate employee report filter
	 *
	 */
	public function affiliate_employee_report_filter()
	{
		//XSS Filter all the input post fields
		$params = $this->input->get();
		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];			

		$report = $this->CensusReport_model->affiliate_employee_report($filters);
		$data['report'] = $report;
		$data['year'] = $params['year'];
		$data['affiliate'] = $params['affiliate'];

		$result=$this->load->view('modules/census/reports/emp_affiliate_employee_report_filter.php',$data, TRUE);
		echo json_encode($result);

	}	
	
	/**
	 * Affiliate employee report Export
	 *
	 */
	public function affiliate_employee_report_export()
	{
		$params = $this->input->get();

		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];	
    
		$report = $this->CensusReport_model->affiliate_employee_report($filters);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', 'Full Time Employee');
		$sheet->setCellValue('D1', 'Part Time Employee');
		$sheet->setCellValue('E1', 'Average Salary');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['organization']);
			$sheet->setCellValue('C'.$i , $row['full_time']);
			$sheet->setCellValue('D'.$i , $row['part_time']);
			$sheet->setCellValue('E'.$i , $row['average']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="emp-xls.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}	

	/**
	 * Cumulative member volunteers
	 *
	 */
	public function cumulative_mem_vol()
	{
		$report = $this->CensusReport_model->cumulative_mem_vol();
		$data['content'] = [
			'report' => $report,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/emp_cumulative_mem_vol.php';
		$this->load->view('census_template', $data);
	}

		
	/**
	 * Affiliate member volunteer report
	 *
	 */
	public function affiliate_mem_vol()
	{
		$params = $this->input->get();
		if(!empty($params['year']))
		$year_selected = $filters['year'] = $params['year'];
		else
		$year_selected = $filters['year'] = 2018;
		$report = $this->CensusReport_model->affiliate_mem_vol($filters);
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected' => $year_selected
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_mem_vol.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/emp_affiliate_mem_vol.php';
		$this->load->view('census_template', $data);
	}	

	/**
	 * Affiliate member volunteer report filter
	 *
	 */
	public function affiliate_mem_vol_filter()
	{
		//XSS Filter all the input post fields
		$params = $this->input->get();
		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];			

		$report = $this->CensusReport_model->affiliate_mem_vol($filters);
		$data['report'] = $report;
		$data['year'] = $params['year'];
		$data['affiliate'] = $params['affiliate'];

		$data['footer']['js'] = array(
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$result=$this->load->view('modules/census/reports/emp_affiliate_mem_vol_filter.php',$data, TRUE);
		echo json_encode($result);

	}		

	/**
	 * Affiliate member volunteer report Export
	 *
	 */
	public function affiliate_mem_vol_export()
	{
		$params = $this->input->get();

		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];	
    
		$report = $this->CensusReport_model->affiliate_mem_vol($filters);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', 'Guild');
		$sheet->setCellValue('D1', 'Young Professionals');
		$sheet->setCellValue('E1', 'Other Members');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['organization']);
			$sheet->setCellValue('C'.$i , $row['guild']);
			$sheet->setCellValue('D'.$i , $row['young']);
			$sheet->setCellValue('E'.$i , $row['other']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="m-v-xls.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	/**
	 * Cumulative program report
	 *
	 */
	public function cumulative_program_report()
	{
		//$report = $this->CensusReport_model->cumulative_mem_vol();
		$total = [];
		for($year=2021;$year>=2011;$year--){
		$arr['year'] = $year; 
		$arr['program_edu'] = $this->CensusReport_model->programs_by_year($year,$this->CensusReport_model->get_program_area_id('Education and Youth Development'));
		$arr['program_entrepren'] = $this->CensusReport_model->programs_by_year($year,$this->CensusReport_model->get_program_area_id('Entrepreneurship and Business Development'));
		$arr['program_health'] = $this->CensusReport_model->programs_by_year($year,$this->CensusReport_model->get_program_area_id('Health and Quality of Life'));
		$arr['program_housing'] = $this->CensusReport_model->programs_by_year($year,$this->CensusReport_model->get_program_area_id('Housing and Community Development'));
		$arr['program_oth'] = $this->CensusReport_model->programs_by_year($year,$this->CensusReport_model->get_program_area_id('Other Program'));
		$arr['program_workforce'] = $this->CensusReport_model->programs_by_year($year,$this->CensusReport_model->get_program_area_id('Workforce Development'));
		$arr['total'] = $arr['program_edu'] + $arr['program_entrepren'] + $arr['program_health'] + $arr['program_housing'] + $arr['program_oth'] + $arr['program_workforce'];
		array_push($total,$arr);
	  }

		$budget = [];
		for($year=2021;$year>=2011;$year--){
		$arr['year'] = $year; 
		$arr['program_edu'] = $this->CensusReport_model->programs_budget_by_year($year,$this->CensusReport_model->get_program_area_id('Education and Youth Development'));
		$arr['program_entrepren'] = $this->CensusReport_model->programs_budget_by_year($year,$this->CensusReport_model->get_program_area_id('Entrepreneurship and Business Development'));
		$arr['program_health'] = $this->CensusReport_model->programs_budget_by_year($year,$this->CensusReport_model->get_program_area_id('Health and Quality of Life'));
		$arr['program_housing'] = $this->CensusReport_model->programs_budget_by_year($year,$this->CensusReport_model->get_program_area_id('Housing and Community Development'));
		$arr['program_oth'] = $this->CensusReport_model->programs_budget_by_year($year,$this->CensusReport_model->get_program_area_id('Other Program'));
		$arr['program_workforce'] = $this->CensusReport_model->programs_budget_by_year($year,$this->CensusReport_model->get_program_area_id('Workforce Development'));
		$arr['total'] = $arr['program_edu'] + $arr['program_entrepren'] + $arr['program_health'] + $arr['program_housing'] + $arr['program_oth'] + $arr['program_workforce'];
		array_push($budget,$arr);
	  }		

		$served = [];
		for($year=2021;$year>=2011;$year--){
		$arr['year'] = $year; 
		$arr['program_edu'] = $this->CensusReport_model->programs_served_by_year($year,$this->CensusReport_model->get_program_area_id('Education and Youth Development'));
		$arr['program_entrepren'] = $this->CensusReport_model->programs_served_by_year($year,$this->CensusReport_model->get_program_area_id('Entrepreneurship and Business Development'));
		$arr['program_health'] = $this->CensusReport_model->programs_served_by_year($year,$this->CensusReport_model->get_program_area_id('Health and Quality of Life'));
		$arr['program_housing'] = $this->CensusReport_model->programs_served_by_year($year,$this->CensusReport_model->get_program_area_id('Housing and Community Development'));
		$arr['program_oth'] = $this->CensusReport_model->programs_served_by_year($year,$this->CensusReport_model->get_program_area_id('Other Program'));
		$arr['program_workforce'] = $this->CensusReport_model->programs_served_by_year($year,$this->CensusReport_model->get_program_area_id('Workforce Development'));
		$arr['total'] = $arr['program_edu'] + $arr['program_entrepren'] + $arr['program_health'] + $arr['program_housing'] + $arr['program_oth'] + $arr['program_workforce'];
		array_push($served,$arr);
	  }

		
		
		$data['content'] = [
			'total' => $total,
			'budget' => $budget,
			'served' => $served
		];
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_cumulative_program_report.php';
		$this->load->view('census_template', $data);
	}	

	
	/**
	 * Program area summary report
	 *
	 */
	public function program_area_summary()
	{
		$data['content'] = [
		];
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_program_area_summary.php';
		$this->load->view('census_template', $data);
	}

	/**
	 * Program area summary filter
	 *
	 */
	public function program_area_summary_filter()
	{

		//XSS Filter all the input post fields
		$params = $this->input->get();
		
		
		$year = "";
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];	

    $areas = ['Education and Youth Development','Entrepreneurship and Business Development','Health and Quality of Life',
	            'Housing and Community Development','Workforce Development','Other Program'];
		$report = [];
    foreach($areas as $area){
      $arr['area'] = $area;
	        $arr['program_id'] = $this->CensusReport_model->get_program_area_id($area);;
			$arr['programs'] = $this->CensusReport_model->programs_by_year($year,$this->CensusReport_model->get_program_area_id($area));;
			$arr['served'] = $this->CensusReport_model->programs_served_by_year($year,$this->CensusReport_model->get_program_area_id($area));
			$arr['budget'] = $this->CensusReport_model->programs_budget_by_year($year,$this->CensusReport_model->get_program_area_id($area));
			$arr['year'] = $params['year'];
			array_push($report,$arr);
		}
		$data['report'] = $report;

		$data['footer']['js'] = array(
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);
		$result=$this->load->view('modules/census/reports/prg_program_area_summary_filter.php',$data, TRUE);
		echo json_encode($result);

	}	

	

	/**
	 * Affiliate member volunteer report
	 *
	 */
	public function affiliate_program_area_query()
	{
		$year_selected = 2018;
		$program_area = [];
		$program_area_id = '';
		$params = $this->input->get();

		if(!empty($params['year']))
			$year_selected = $filters['year'] = $params['year'];
		if(!empty($params['program_area']))
			$program_area_id = $params['program_area'];

		$areas = ['Education and Youth Development','Entrepreneurship and Business Development','Health and Quality of Life',
		'Housing and Community Development','Workforce Development','Other Program'];

		if($program_area_id == '') {		
			foreach($areas as $area){		
				$id = $this->CensusReport_model->get_program_area_id($area);
				$program_area[$id] = $area; 
			}
		} else {
			foreach($areas as $area){		
				$id = $this->CensusReport_model->get_program_area_id($area);
				if($id == $program_area_id)
				$program_area[$id] = $area; 
			}
		}
		$data['content'] = [
			'year_selected' => $year_selected,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'program_area' => $program_area 
		];

		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_program_area_query.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_affiliate_program_area_query.php';
		$this->load->view('census_template', $data);
	}	

	/**
	 * Affiliate member volunteer report filter
	 *
	 */
	public function affiliate_program_area_query_filter()
	{
		//XSS Filter all the input post fields
		$params = $this->input->get();
		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];
			
		if( isset($params['nul']) && ($params['nul'] != ''))
			$filters['nul'] =  $params['nul'];			

		if( isset($params['prg_name']) && ($params['prg_name'] != '') )
			$filters['prg_name'] =  $params['prg_name'];

		if( isset($params['program_area']) && ($params['program_area'] != '') )
			$filters['program_area'] =  $params['program_area'];			


		$report = $this->CensusReport_model->affiliate_program_area_query($filters);		
		$data['report'] = $report;
		$data['org_id'] = isset($filters['affiliate']) ? $filters['affiliate'] : '';
		$data['nul_val'] = isset($filters['nul']) ? $filters['nul'] : '';
		$data['program_name'] = isset($filters['prg_name']) ? $filters['prg_name'] : '';
		$data['area_id'] = isset($filters['program_area']) ? $filters['program_area'] : '';

		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_program_area_query.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$result=$this->load->view('modules/census/reports/prg_affiliate_program_area_query_filter.php',$data, TRUE);
		echo json_encode($result);

	}

	/**
	 * Affiliate member volunteer report export
	 *
	 */
	public function affiliate_program_area_query_export()
	{
		$params = $this->input->get();

		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];
			
		if( isset($params['nul']) && ($params['nul'] != ''))
			$filters['nul'] =  $params['nul'];			

		if( isset($params['prg_name']) && ($params['prg_name'] != '') )
			$filters['prg_name'] =  $params['prg_name'];

		if( isset($params['program_area']) && ($params['program_area'] != '') )
			$filters['program_area'] =  $params['program_area'];	

		$report = $this->CensusReport_model->affiliate_program_area_query($filters);
		$funding_vehicles = $this->CensusAffiliate_model->funding_vehicles();

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Program Area');
		$sheet->setCellValue('C1', 'Affiliate');
		$sheet->setCellValue('D1', 'Name of Program');
		$sheet->setCellValue('E1', 'Number of People Served Annually');
		$sheet->setCellValue('F1', 'Total Program Budget Funded');
		$sheet->setCellValue('G1', 'NUL Funded');
		$sheet->setCellValue('H1', 'Funding Vehicle');

		$i = 2;
		
		foreach($report as $row)
		{
			$funding_sources = $this->CensusAffiliate_model->get_funding_sources_by_program_id($row['pk_id']);
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['program_area']);
			$sheet->setCellValue('C'.$i , $row['organization']);
			$sheet->setCellValue('D'.$i , $row['program_name']);
			$sheet->setCellValue('E'.$i , $row['served']);
			$sheet->setCellValue('F'.$i , $row['budget']);
			$sheet->setCellValue('G'.$i , $row['nul']);
			foreach($funding_sources as $fs) {
				foreach($funding_vehicles as $fveh) {
					if ( $fveh['id'] == $fs['field_funding_vehicle_tid'])
					$vehicle = $fveh['name'];
					$sheet->setCellValue('H'.$i , $fveh['name']);
				}
			}
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="programs.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	/**
	 * Program are people served
	 *
	 */
	public function program_area_people_served()
	{
		$year_selected = $filters['year'] = 2018;
		$program_area = [];
		$areas = ['Education and Youth Development','Entrepreneurship and Business Development','Health and Quality of Life',
		'Housing and Community Development','Workforce Development','Other Program'];
    
		foreach($areas as $area){		
		       $id = $this->CensusReport_model->get_program_area_id($area);
					 $program_area[$id] = $area; 
		}

		
		$result = $this->CensusReport_model->program_area_people_served_query($filters,$export=NULL);
    $report = $this->people_served_report($result);

		$data['content'] = [
			'report' => $report,
			'year_selected' => $year_selected,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'program_area' => $program_area 
		];

		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_people_served.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_people_served_query.php';
		$this->load->view('census_template', $data);
	}	

	/**
	 *program area people served filter
	 *
	 */
	public function program_area_people_served_filter()
	{
		//XSS Filter all the input post fields
		$params = $this->input->get();
		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];
			
		if( isset($params['program_area']) && ($params['program_area'] != '') )
			$filters['program_area'] =  $params['program_area'];			

		$result = $this->CensusReport_model->program_area_people_served_query($filters,$export=NULL);
		$data['report'] = $this->people_served_report($result);
		$data['org_id'] = isset($filters['affiliate']) ? $filters['affiliate'] : '';
		$data['year'] = isset($filters['year']) ? $filters['year'] : '';
		$data['area_id'] = isset($filters['program_area']) ? $filters['program_area'] : '';

		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_people_served.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);


		$result=$this->load->view('modules/census/reports/prg_people_served_query_filter.php',$data, TRUE);
		echo json_encode($result);

	}
	
	/**
	 * program area people served report export
	 *
	 */
	public function program_area_people_served_export()
	{
		$params = $this->input->get();

		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];

		if( isset($params['program_area']) && ($params['program_area'] != '') )
			$filters['program_area'] =  $params['program_area'];	
    
		$report = $this->CensusReport_model->program_area_people_served_query($filters,$export=1);
		
		header("Content-Type: application/csv");
		header("Content-Disposition: attachment;filename=\"programsReport".".csv\"");
		header("Pragma: no-cache");
		header("Expires: 0");

		$file = fopen('php://output', 'w');
		$header = array("Year","Affiliate","Program Title","Program Area","Number of People Served Annually by this program","Total Number of People Served Annually for all Programs for this Affiliate"); 
		fputcsv($file, $header);
		foreach ($report as $data_array) {

			$column['1'] = $data_array['field_year'];
			$column['2'] = $data_array['organization'];
			$column['3'] = $data_array['program_name']; 
			$column['4'] = $data_array['program_area']; 
			$column['5'] = $data_array['served']; 
			$column['6'] = $data_array['served']; 
			fputcsv($file, array_values($column));
	
		}	
		fclose($file);
		exit;
	}

	private function people_served_report($result)
	{
		$id = $title = $area = $served = $report = [];
		foreach($result as $res){
			$key = $res['field_year']."_".$res['organization'];
			if(!array_key_exists($key,$report)){
			$report[$key]['organization'] = $res['organization'];
			$report[$key]['field_year'] = $res['field_year'];
			$report[$key]['report_id'] = $res['report_id'];
			// $report[$key]['pk_id'] = $res['pk_id'];
		  }
			
			if(!array_key_exists($key,$title))
				$title[$key] = [];
			array_push($title[$key],$res['program_name']);

			if(!array_key_exists($key,$id))
				$id[$key] = [];
			array_push($id[$key],$res['pk_id']);

			if(!array_key_exists($key,$area))
				$area[$key] = [];
      array_push($area[$key],$res['program_area']);

			if(!array_key_exists($key,$served))
				$served[$key] = [];
      array_push($served[$key],$res['served']);

		}

		foreach($report as $key => $rep){
			$report[$key]['program_area'] = [];
			$report[$key]['program_name'] = [];
			$report[$key]['pk_id'] = [];
			$report[$key]['served'] = [];
			array_push($report[$key]['program_area'],$area[$key]);
			array_push($report[$key]['program_name'],$title[$key]);
			array_push($report[$key]['pk_id'],$id[$key]);
			array_push($report[$key]['served'],$served[$key]);
			$report[$key]['total'] = array_sum($served[$key]);
		}
    return $report; 
	}

	
	/**
	 * Cumulative education report
	 *
	 */
	public function cumulative_education_report()
	{
		$report = $this->CensusReport_model->cumulative_education_report();
		$data['content'] = [
			'report' => $report,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_program_area_summary.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_cumulative_education.php';
		$this->load->view('census_template', $data);		
	}

	/**
	 * Affiliate education query report
	 *
	 */
	public function affiliate_education_query_report()
	{
		$params = $this->input->get();

		$affiliate = ''; 
		$year = 2018;
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		$affiliate =  $params['affiliate'];

		$report = $this->CensusReport_model->affiliate_education_query_report($year,$affiliate);
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_education_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_affiliate_education_query_report.php';
		$this->load->view('census_template', $data);		
	}	

	public function affiliate_education_query_report_filter()
	{

		//XSS Filter all the input post fields
		$params = $this->input->get();

		$affiliate = ''; 
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = [];
		$report = $this->CensusReport_model->affiliate_education_query_report($year,$affiliate);
		$data['report'] = $report;

		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_education_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$result=$this->load->view('modules/census/reports/prg_affiliate_education_query_report_filter.php',$data, TRUE);
		echo json_encode($result);

	}
	
	/**
	 * Cumulative entrepreneurship report
	 *
	 */
	public function cumulative_entrepreneurship_report()
	{
		$report_all = $this->CensusReport_model->cumulative_entrepreneurship_report_all();
		$report_aff = $this->CensusReport_model->cumulative_entrepreneurship_report_aff();
		$report_aff_wo = $this->CensusReport_model->cumulative_entrepreneurship_report_aff_wo();
		
		$data['content'] = [
			'report_all' => $report_all,
			'report_aff' => $report_aff,
			'report_aff_wo' => $report_aff_wo
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_education_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_cumulative_entrepreneurship_report.php';
		$this->load->view('census_template', $data);		
	}

	/**
	 * Census Affiliate Entrepreneurship Query Report
	 *
	 */
	public function affiliate_entrepreneurship_query_report()
	{

		$params = $this->input->get();

		$affiliate = ''; 
		$year = 2018;
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];

		$report = $this->CensusReport_model->affiliate_entrepreneurship_query_report($year,$affiliate);
		// $report = 'Test Data';
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_entrepreneurship_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_affiliate_entrepreneurship_query_report.php';
		$this->load->view('census_template', $data);		
	}	

	/**
	 * Census Affiliate Entrepreneurship Query Report Filter
	 *
	 */

	public function affiliate_entrepreneurship_query_report_filter()
	{

		//XSS Filter all the input post fields
		$params = $this->input->get();

		$affiliate = ''; 
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = [];
		$report = $this->CensusReport_model->affiliate_entrepreneurship_query_report($year,$affiliate);
		$data['report'] = $report;

		$result=$this->load->view('modules/census/reports/prg_affiliate_entrepreneurship_query_report_filter.php',$data, TRUE);
		echo json_encode($result);

	}

	/**
	 * Census Affiliate Entrepreneurship Query Report Export
	 *
	 */
	public function affiliate_entrepreneurship_query_report_export()
	{
		$data = $this->input->get(NULL, TRUE);

		$affiliate = ''; 
		$year = 2018;
		
		if( isset($data['year']) && ($data['year'] != '') && ($data['year'] != '0') )
		  $year =  $data['year'];
		if( isset($data['org']) && ($data['org'] != ''))
		  $affiliate =  $data['org'];
    
		$report = $this->CensusReport_model->affiliate_entrepreneurship_query_report($year,$affiliate);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', 'Total Participants in Entrepreneurship Programs');
		$sheet->setCellValue('D1', 'Number of new businesses created');
		$sheet->setCellValue('E1', 'Total sales of businesses started by participants in entrepreneurship programs (i.e. Small Business Matters)');
		$sheet->setCellValue('F1', 'Value of sales for all businesses');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['year']);
			$sheet->setCellValue('B'.$i , $row['org']);
			$sheet->setCellValue('C'.$i , $row['tot']);
			$sheet->setCellValue('D'.$i , $row['new']);
			$sheet->setCellValue('E'.$i , $row['totsale']);
			$sheet->setCellValue('F'.$i , $row['valofsale']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="entrepreneurship-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}
	/**
	 * Cumulative Health Report
	 *
	 */
	public function cumulative_health_report()
	{
		$report = $this->CensusReport_model->cumulative_health_report();
		// $report = 'Test Data';
		$data['content'] = [
			'report' => $report
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_entrepreneurship_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_cumulative_health_report.php';
		$this->load->view('census_template', $data);		
	}	

	/**
	 * Census Affiliate Health Query Report
	 *
	 */
	public function affiliate_health_query_report()
	{
		$params = $this->input->get();

		$affiliate = ''; 
		$year = 2018;
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
		
		$report = $this->CensusReport_model->affiliate_health_query_report($year,$affiliate);
		// $report = 'Test Data';
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_health_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_affiliate_health_query_report.php';
		$this->load->view('census_template', $data);		
	}	
	
	/**
	 * Census Affiliate Health Query Report Filter
	 *
	 */

	public function affiliate_health_query_report_filter()
	{

		//XSS Filter all the input post fields
		$params = $this->input->get();

		$affiliate = ''; 
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = [];
		$report = $this->CensusReport_model->affiliate_health_query_report($year,$affiliate);
		$data['report'] = $report;

		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_health_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$result=$this->load->view('modules/census/reports/prg_affiliate_health_query_report_filter.php',$data, TRUE);
		echo json_encode($result);

	}

	/**
	 * Cumulative Housing Report
	 *
	 */
	public function cumulative_housing_report()
	{
		$report = $this->CensusReport_model->cumulative_housing_report();
		// $report = 'Test Data';
		$data['content'] = [
			'report' => $report
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_health_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_cumulative_housing_report.php';
		$this->load->view('census_template', $data);		
	}	

	/**
	 * Census Affiliate Housing Query Report
	 *
	 */
	public function affiliate_housing_query_report()
	{
		$params = $this->input->get();

		$affiliate = ''; 
		$year = 2018;

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];

		$report = $this->CensusReport_model->affiliate_housing_query_report($year,$affiliate);
		// $report = 'Test Data';
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_housing_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_affiliate_housing_query_report.php';
		$this->load->view('census_template', $data);		
	}	

	/**
	 * Census Affiliate Housing Query Report Filter
	 *
	 */

	public function affiliate_housing_query_report_filter()
	{

		//XSS Filter all the input post fields
		$params = $this->input->get();

		$affiliate = ''; 
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = [];
		$report = $this->CensusReport_model->affiliate_housing_query_report($year,$affiliate);
		$data['report'] = $report;

		$result=$this->load->view('modules/census/reports/prg_affiliate_housing_query_report_filter.php',$data, TRUE);
		echo json_encode($result);

	}

	/**
	 * Census Affiliate Housing Query Report Export
	 *
	 */
	public function affiliate_housing_query_report_export()
	{
		$data = $this->input->get(NULL, TRUE);

		$affiliate = ''; 
		$year = 2018;
		
		if( isset($data['year']) && ($data['year'] != '') && ($data['year'] != '0') )
		  $year =  $data['year'];
		if( isset($data['org']) && ($data['org'] != ''))
		  $affiliate =  $data['org'];
    
		$report = $this->CensusReport_model->affiliate_housing_query_report($year,$affiliate);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', 'Total Participants in Housing Programs');
		$sheet->setCellValue('D1', 'attended or inquired about home ownership');
		$sheet->setCellValue('E1', 'purchased a home');
		$sheet->setCellValue('F1', 'Average price of homes purchased');
		$sheet->setCellValue('G1', 'Number of foreclosures prevented');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['year']);
			$sheet->setCellValue('B'.$i , $row['org']);
			$sheet->setCellValue('C'.$i , $row['tot']);
			$sheet->setCellValue('D'.$i , $row['att']);
			$sheet->setCellValue('E'.$i , $row['purchase']);
			$sheet->setCellValue('F'.$i , $row['avgprice']);
			$sheet->setCellValue('G'.$i , $row['closed']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="housing-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	/**
	 * Cumulative Workforce Development Report
	 *
	 */
	public function cumulative_workforce_development_report()
	{
		$report = $this->CensusReport_model->cumulative_workforce_development_report();
		// $report = 'Test Data';
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates()
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_cumulative_workforce_development_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_cumulative_workforce_development_report.php';
		$this->load->view('census_template', $data);		
	}	

	/**
	 * Cumulative Workforce Development Report Filter
	 *
	 */
	public function cumulative_workforce_development_report_filter()
	{
		$params = $this->input->get();

		$affiliate = '';

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = [];
		$report = $this->CensusReport_model->cumulative_workforce_development_report_filter($affiliate);
		$data['report'] = $report;

		$data['footer']['js'] = array(
			'pages/modules/reports/filter_cumulative_workforce_development_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$result=$this->load->view('modules/census/reports/prg_cumulative_workforce_development_report_filter.php',$data, TRUE);
		echo json_encode($result);		
	}	

	/**
	 * Census Affiliate Workforce Query Report
	 *
	 */
	public function affiliate_workforce_query_report()
	{
		$params = $this->input->get();

		$affiliate = ''; 
		$year = 2018;

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = $this->CensusReport_model->affiliate_workforce_query_report($year,$affiliate);
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_workforce_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/prg_affiliate_workforce_query_report.php';
		$this->load->view('census_template', $data);		
	}

	/**
	 * Cumulative Workforce Development Report Filter
	 *
	 */
	public function affiliate_workforce_query_report_filter()
	{
		$params = $this->input->get();

		$affiliate = '';

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = [];
		$report = $this->CensusReport_model->affiliate_workforce_query_report($year,$affiliate);
		$data['report'] = $report;

		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_workforce_query_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$result=$this->load->view('modules/census/reports/prg_affiliate_workforce_query_report_filter.php',$data, TRUE);
		echo json_encode($result);		
	}	

	/**
	 * Cumulative Workforce Development Report Export
	 *
	 */
	public function affiliate_workforce_query_report_export()
	{
		$data = $this->input->get(NULL, TRUE);

		$affiliate = ''; 
		$year = 2018;
		
		if( isset($data['year']) && ($data['year'] != '') && ($data['year'] != '0') )
		  $year =  $data['year'];
		if( isset($data['org']) && ($data['org'] != ''))
		  $affiliate =  $data['org'];
    
		$report = $this->CensusReport_model->affiliate_workforce_query_report($year,$affiliate);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', '# clients who received counseling');
		$sheet->setCellValue('D1', 'Number of participants in employment/workforce development programs (exclude welfare recipients)?');
		$sheet->setCellValue('E1', 'Number of participants placed in jobs');
		$sheet->setCellValue('F1', 'Annual salary (if applicable)');
		$sheet->setCellValue('G1', 'or Hourly wage rate');
		$sheet->setCellValue('H1', 'Number of welfare participants in federal/state funded programs');
		$sheet->setCellValue('I1', 'Number of welfare program participants placed in jobs');
		$sheet->setCellValue('J1', 'Annual welfare salary (if applicable)');
		$sheet->setCellValue('K1', 'or Hourly wage rate (welfare)');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['year']);
			$sheet->setCellValue('B'.$i , $row['org']);
			$sheet->setCellValue('C'.$i , $row['coun']);
			$sheet->setCellValue('D'.$i , $row['empl_wrk']);
			$sheet->setCellValue('E'.$i , $row['placed']);
			$sheet->setCellValue('F'.$i , $row['annsal']);
			$sheet->setCellValue('G'.$i , $row['hour_rate']);
			$sheet->setCellValue('H'.$i , $row['wel_prt']);
			$sheet->setCellValue('I'.$i , $row['wel_placed']);
			$sheet->setCellValue('J'.$i , $row['wel_sal']);
			$sheet->setCellValue('K'.$i , $row['wel_hour']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="employability-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}
	
	/**
	 * COVID Related Questions - Aggregates
	 *
	 */
	public function census_covid_questions_aggregate()
	{
		$report = $this->CensusReport_model->census_covid_questions_aggregate();
		$data['content'] = [
			'report' => $report
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
		);

		$data['view_name'] = 'modules/census/reports/ppl_census_covid_questions_aggregate.php';
		$this->load->view('census_template', $data);		
	}	

	/**
	 * COVID Related Questions
	 *
	 */
	public function census_covid_questions()
	{
		$report = $this->CensusReport_model->census_covid_questions();
		$data['content'] = [
			'report' => $report,
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
		);

		$data['view_name'] = 'modules/census/reports/ppl_census_covid_questions.php';
		$this->load->view('census_template', $data);		
	}	

	/**
	 * List of Affiliates and CEO's
	 *
	 */
	public function affiliates_and_ceo_s()
	{
		$report = $this->CensusReport_model->affiliates_and_ceo_s();
		$data['content'] = [
			'report' => $report
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
		);

		$data['view_name'] = 'modules/census/reports/emp_affiliates_and_ceo_s.php';
		$this->load->view('census_template', $data);		
	}
	
	/**
	 * NUL Census Total Contacts Breakdown
	 *
	 */
	public function nul_census_total_contacts_breakdown()
	{
		$params = $this->input->get();
		if(!empty($params['year']))
		$year_selected = $filters['year'] = $params['year'];
		else
		$year_selected = 2018;

		$report = $this->CensusReport_model->nul_census_total_contacts_breakdown($filters);
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year_selected
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_nul_census_total_contacts_breakdown.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_nul_census_total_contacts_breakdown.php';
		$this->load->view('census_template', $data);		
	}

	/**
	 * NUL Census Total Contacts Breakdown Filter
	 *
	 */
	public function nul_census_total_contacts_breakdown_filter()
	{
		$params = $this->input->get();
		
		$affiliate = '';

		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
		  $affiliate =  $params['affiliate'];
    
		$report = [];
		$report = $this->CensusReport_model->nul_census_total_contacts_breakdown_filter($year,$affiliate);
		$data['report'] = $report;

        $data['footer']['js'] = array(
			'pages/modules/reports/filter_nul_census_total_contacts_breakdown.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$result=$this->load->view('modules/census/reports/ppl_nul_census_total_contacts_breakdown_filter.php',$data, TRUE);
		echo json_encode($result);		
	}
	
	public function affiliate_people_history_export()
	{

		$params = $this->input->get();
		//print_r($params);		
		$filters = array();

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];
		else
			$filters = ' ';
		//print_r($filters);
		$report = $this->CensusReport_model->affiliate_people_history_exports($filters);

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Name');
		$sheet->setCellValue('C1', 'Total Indirect Contacts');
		$sheet->setCellValue('D1', 'Total Public Contacts');
		$sheet->setCellValue('E1', 'Total Direct Contacts');
		$sheet->setCellValue('F1', 'Total Contacts');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['organization']);
			$sheet->setCellValue('C'.$i , $row['indirect']);
			$sheet->setCellValue('D'.$i , $row['public']);
			$sheet->setCellValue('E'.$i , $row['direct']);
			$sheet->setCellValue('F'.$i , $row['net']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="contact-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	public function affiliate_civic_engagement_export()
	{
		
		$params = $this->input->get();
		//print_r($params);		
		$filters = array();

		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate'] =  $params['affiliate'];
			//print_r($filters);


		$report = $this->CensusReport_model->affiliate_civic_export($filters);//print_r($report);die();
		//print_r($report);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'Year');
		$sheet->setCellValue('B1', 'Affiliate');
		$sheet->setCellValue('C1', 'Voter registration');
		$sheet->setCellValue('D1', 'Community forums');
		$sheet->setCellValue('E1', 'Racial justice');
		$sheet->setCellValue('F1', 'Police brutality');
		$sheet->setCellValue('G1', 'Advocacy');

		$i = 2;
		
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['field_year']);
			$sheet->setCellValue('B'.$i , $row['organization']);
			$sheet->setCellValue('C'.$i , $row['voter']);
			$sheet->setCellValue('D'.$i , $row['community']);
			$sheet->setCellValue('E'.$i , $row['racial']);
			$sheet->setCellValue('F'.$i , $row['police']);
			$sheet->setCellValue('G'.$i , $row['adv']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="nul-census-civic-engagements-agg-export.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	public function entrepreneurship_centers_report()
	{	
		
		$params = $this->input->get();
		//print_r($params);
		$year = 2018;
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];

		$report = $this->CensusReport_model->entrepreneurship_center_report_nul($year);
			
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_entrepreneurship_center_report.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_nul_entrepreneurship_centers_report.php';
		$this->load->view('census_template', $data);	
	}

	public function entrepreneurship_centers_report_filter()
	{

		//XSS Filter all the input post fields
		$params = $this->input->get();

		$year = 2018;
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
    
		$report = $this->CensusReport_model->entrepreneurship_center_report_nul($year);
		$data['report'] = $report;

		$result=$this->load->view('modules/census/reports/prg_affiliate_entrepreneurship_centers_report_filter.php',$data, TRUE);
		echo json_encode($result);

	}

	public function entrepreneurship_centers_report_w_nul()
	{	
		
		$params = $this->input->get();
		//print_r($params);
		$year = 2018;
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];

		$report = $this->CensusReport_model->entrepreneurship_center_report_no_nul($year);
			
		$data['content'] = [
			'report' => $report,
			'affiliate' => $this->CensusAffiliate_model->get_all_affiliates(),
			'year_selected'=> $year
		];		
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/reports/filter_affiliate_entrepreneurship_center_report_w_nul.js',
			'https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js'
		);

		$data['view_name'] = 'modules/census/reports/ppl_nul_entrepreneurship_centers_report_w_nul.php';
		$this->load->view('census_template', $data);	
	}

	public function entrepreneurship_centers_report_w_nul_filter()
	{

		//XSS Filter all the input post fields
		$params = $this->input->get();

		$year = 2018;
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
		  $year =  $params['year'];
    
		$report = $this->CensusReport_model->entrepreneurship_center_report_no_nul($year);
		$data['report'] = $report;

		$result=$this->load->view('modules/census/reports/prg_affiliate_entrepreneurship_centers_report_filter.php',$data, TRUE);
		echo json_encode($result);

	}

	public function nul_census_total_contacts_breakdown_export()
	{
		
		$params = $this->input->get();
		$filters = array();
		
		if( isset($params['year']) && ($params['year'] != '') && ($params['year'] != '0') )
			$filters['year'] =  $params['year'];

		if( isset($params['affiliate']) && ($params['affiliate'] != '') && ($params['affiliate'] != '0') )
			$filters['affiliate']  =  $params['affiliate'];

		$report = $this->CensusReport_model->nul_census_total_contacts_breakdown_export($filters);
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'YEAR');
		$sheet->setCellValue('B1', 'AFFILIATE');
		$sheet->setCellValue('C1', 'TOTAL INDIRECT CONTACTS');
		$sheet->setCellValue('D1', 'TOTAL PUBLIC CONTACTS');
		$sheet->setCellValue('E1', 'TOTAL DIRECT CONTACTS');
		$sheet->setCellValue('F1', 'CONTACTS');

		$i = 2;
  
		foreach($report as $row)
		{
			$sheet->setCellValue('A'.$i , $row['year']);
			$sheet->setCellValue('B'.$i , $row['org']);
			$sheet->setCellValue('C'.$i , $row['indirect']);
			$sheet->setCellValue('D'.$i , $row['public']);
			$sheet->setCellValue('E'.$i , $row['direct']);
			$sheet->setCellValue('F'.$i , $row['net']);
			$i++;
		}

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="total-contacts-breakdown.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);

	}		
	
}