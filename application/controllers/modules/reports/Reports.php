<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/excel/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\Exception;

class Reports extends MY_Controller 
{
	public function __construct()
	{
        parent::__construct();
        $this->load->model('Reports_model');
		$this->load->model('Affiliate_model');
		$this->load->model('Document_model');
		//$this->output->enable_profiler(TRUE);
	}

	/**
	 * Show KPI Reports page
	 *
	 * @return view 'modules/reports/reports.php'
	 */
	public function index()
	{
        //XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

        if(isset($data['quarter']) && ($data['quarter'] != "")){
            $quarter = $data['quarter'];
        } else {
			$quarter = date("n", strtotime("-1 month", time()));
		}
        
		if(isset($data['choose_yr']) && ($data['choose_yr'] != "")){
            $year = $data['choose_yr'];
		} else {
			$year = date("Y", strtotime("-1 month", time()));
			$data['choose_yr'] = NULL;
		}
		
		if(isset($data['affiliate'])){
			$ind_affiliate = $data['affiliate'];
		}else{
			$ind_affiliate = '';
		}

		$data['content'] = array(
            'affiliates'	 	=> $this->Reports_model->get_all_affiliates(),
			'key_indicators' 	=> $this->Reports_model->get_key_indicators($quarter, $year),
			'kpi_report'     	=> $this->Reports_model->get_kpi_report($quarter, $year),
			'ind_affiliate'  	=> $this->Reports_model->get_ind_affiliate_report($ind_affiliate, $data['choose_yr']),
			'ind_affiliate_yr'  => $this->Reports_model->get_ind_affiliate_yr_report($ind_affiliate, $data['choose_yr']),
			'affiliate' => $ind_affiliate,
			'quarter' => $quarter,
			'year' => $year
        );
		//print_r($data);
		//Name of the view file
		$data['view_name'] = 'modules/reports/reports';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://canvasjs.com/assets/script/canvasjs.min.js',
            'https://www.gstatic.com/charts/loader.js',
            '/vendor/moment.js',
            '/vendor/bootstrap-datetimepicker.js'
		);
		$this->load->view('template', $data);
	}

	public function export_kpi_reports()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$OutputFilename = "KPIReport";

		if(isset($data['quarter']) && ($data['quarter'] != ""))
			$OutputFilename .= "_Q" . $data['quarter'];
		else
			$data['quarter'] = '';
		
		if(isset($data['year']) && ($data['year'] != ""))
			$OutputFilename .= "_" . $data['year'];
		else
			$data['year'] = '';

		$OutputFilename .= ".xlsx";

		try 
		{
			$inputFileName = './resources/template/KPIReport.xlsx';
			$spreadsheet = IOFactory::load($inputFileName);
			$sheet = $spreadsheet->getActiveSheet();

			$sheetData = $sheet->toArray();

			echo "<pre>";
			print_r($sheetData);
			
			/* $result = $this->Reports_model->get_key_indicators($data['quarter'], $data['year']);
			
			$i = 4;
			foreach($result as $record)
			{
				$row = json_decode($record["indicators"], TRUE);
				$is_net_assets_positive = isset($row["is_net_assets_positive"]) ? $row["is_net_assets_positive"] : "N";

				$sheet->setCellValue('A'.$i , $record["name"]);
				$sheet->setCellValue('B'.$i , $row["liquidity"]);
				$sheet->setCellValue('C'.$i , $row["current_ratio"]);
				$sheet->setCellValue('D'.$i , $row["current_debt_ratio"]);
				$sheet->setCellValue('E'.$i , $row["from_operations"]);
				$sheet->setCellValue('F'.$i , $row["from_financing"]);
				$sheet->setCellValue('G'.$i , $row["from_investing"]);
				$sheet->setCellValue('H'.$i , $row["operating_efficiency_program_value"]);
				$sheet->setCellValue('I'.$i , $row["operating_efficiency_admin_value"]);
				$sheet->setCellValue('J'.$i , $row["operating_efficiency_fundraising_value"]);
				$sheet->setCellValue('K'.$i , $row["change_in_net_assets_in_quarter"]);
				$sheet->setCellValue('L'.$i , $row["days_in_cash"]);
				$sheet->setCellValue('M'.$i , $row["change_in_grant_ty_ytd"].":".$row["change_in_grant_ty_ytd_value"]);
				$sheet->setCellValue('N'.$i , $row["change_in_grant_ly_ytd"].":".$row["change_in_grant_ly_ytd_value"]);
				$sheet->setCellValue('O'.$i , $is_net_assets_positive);
				$sheet->setCellValue('P'.$i , $row["borad_giving"]);
				$sheet->setCellValue('Q'.$i , $row["operating_reserves_percentage"]);
				$i++;
			}

			header('Content-Type: application/vnd.ms-excel');
			header('Content-Disposition: attachment;filename="'.$OutputFilename.'"');
			header('Cache-Control: max-age=0');

			$writer = new Xlsx($spreadsheet);
			$writer->save('php://output'); */

			$spreadsheet->disconnectWorksheets();
			unset($spreadsheet);
		}
		catch(Exception $e) {
			die('Error loading file: '.$e->getMessage());
		}
	}
}
