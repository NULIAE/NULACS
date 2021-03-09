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
			$quarter = ceil(date("m", strtotime("-1 month", time()))/3);
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
		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$sheet->setCellValue('B2', 'Liquidity');
		$sheet->setCellValue('C2', 'Curren Ratio (S/B Greater than 1)');
		$sheet->setCellValue('D2', 'Current Debt Ratio (Lower is better)');
		$sheet->setCellValue('E2', 'Change in Cash - Operations');
		$sheet->setCellValue('F2', 'Change in Cash - Financing');
		$sheet->setCellValue('G2', 'Change in Cash - Investing');
		$sheet->setCellValue('H2', 'Program Efficiency - Program Expense');
		$sheet->setCellValue('I2', 'Program Efficiency - Mgmt/General Expense');
		$sheet->setCellValue('J2', 'Program Efficiency - Fundraising Expense');
		$sheet->setCellValue('K2', 'Change in Net Assets w/o donor restrictions');
		$sheet->setCellValue('L2', 'Days in cash');
		$sheet->setCellValue('M2', 'Number of Grants This Year/Last Year');
		$sheet->setCellValue('N2', '$ Volume of Grants  This Year/Last Year');
		$sheet->setCellValue('O2', 'Positive Net Assets  w/o donor restrictions Y/N?');
		$sheet->setCellValue('P2', '% YTD Board Giving  toAnnual Commitment');
		$sheet->setCellValue('Q2', '% Operating Reserves to 3 months admin expenses');

		$sheet->getStyle('B2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('C2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('D2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('E2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('F2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('G2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('H2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('I2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('J2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('K2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('L2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('M2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('N2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('O2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('P2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('Q2')->getAlignment()->setTextRotation(90)->setWrapText(true)->setHorizontal('center')->setVertical('center');
		
		$result = $this->Reports_model->get_key_indicators($data['quarter'], $data['year']);


		$number_format = '0.00';
		$usd_format = '$#,##0_-';
		$percent_format = "0\\%";
		
		$negative_number_format = '(0.00)';
		$negative_usd_format = '($#,##0_-)';
		$negative_percent_format = "(0\\%)";

		$color_red = PhpOffice\PhpSpreadsheet\Style\Color::COLOR_RED;

		$i = 4;
		foreach($result as $record)
		{
			$row = json_decode($record["indicators"], TRUE);

			$sheet->setCellValue('A'.$i , $record["name"]);
			
			$row["liquidity"] = ($row["liquidity"] != "") ? $row["liquidity"] : 0;
			$sheet->setCellValue('B'.$i , abs($row["liquidity"]));
			if(($row["liquidity"] < 0)){
				$sheet->getStyle('B'.$i)->getNumberFormat()->setFormatCode($negative_usd_format);
				$sheet->getStyle('B'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('B'.$i)->getNumberFormat()->setFormatCode($usd_format);
			}

			$row["current_ratio"] = ($row["current_ratio"] != "") ? $row["current_ratio"] : 0;
			if(($row["current_ratio"] < 0)){
				$sheet->setCellValue('C'.$i , "(".number_format(abs($row["current_ratio"]), 2).")");
				$sheet->getStyle('C'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->setCellValue('C'.$i , number_format($row["current_ratio"], 2));
			}

			$row["current_debt_ratio"] = ($row["current_debt_ratio"] != "") ? $row["current_debt_ratio"] : 0;
			if(($row["current_debt_ratio"] < 0)){
				$sheet->setCellValue('D'.$i , "(".number_format(abs($row["current_debt_ratio"]), 2).")");
				$sheet->getStyle('D'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->setCellValue('D'.$i , number_format($row["current_debt_ratio"], 2));
			}

			$row["from_operations"] = ($row["from_operations"] != "") ? $row["from_operations"] : 0;
			$sheet->setCellValue('E'.$i , abs($row["from_operations"]));
			if(($row["from_operations"] < 0)){
				$sheet->getStyle('E'.$i)->getNumberFormat()->setFormatCode($negative_usd_format);
				$sheet->getStyle('E'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('E'.$i)->getNumberFormat()->setFormatCode($usd_format);
			}
			
			$row["from_financing"] = ($row["from_financing"] != "") ? $row["from_financing"] : 0;
			$sheet->setCellValue('F'.$i , abs($row["from_financing"]));
			if(($row["from_financing"] < 0)){
				$sheet->getStyle('F'.$i)->getNumberFormat()->setFormatCode($negative_usd_format);
				$sheet->getStyle('F'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('F'.$i)->getNumberFormat()->setFormatCode($usd_format);
			}
			
			$row["from_investing"] = ($row["from_investing"] != "") ? $row["from_investing"] : 0;
			$sheet->setCellValue('G'.$i , abs($row["from_investing"]));
			if(($row["from_investing"] < 0)){
				$sheet->getStyle('G'.$i)->getNumberFormat()->setFormatCode($negative_usd_format);
				$sheet->getStyle('G'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('G'.$i)->getNumberFormat()->setFormatCode($usd_format);
			}
			
			$row["operating_efficiency_program_value"] = ($row["operating_efficiency_program_value"] != "") ? $row["operating_efficiency_program_value"] : 0;
			$sheet->setCellValue('H'.$i , abs($row["operating_efficiency_program_value"]));
			if(($row["operating_efficiency_program_value"] < 0)){
				$sheet->getStyle('H'.$i)->getNumberFormat()->setFormatCode($negative_percent_format);
				$sheet->getStyle('H'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('H'.$i)->getNumberFormat()->setFormatCode($percent_format);
			}
			
			$row["operating_efficiency_admin_value"] = ($row["operating_efficiency_admin_value"] != "") ? $row["operating_efficiency_admin_value"] : 0;
			$sheet->setCellValue('I'.$i , abs($row["operating_efficiency_admin_value"]));
			if(($row["operating_efficiency_admin_value"] < 0)){
				$sheet->getStyle('I'.$i)->getNumberFormat()->setFormatCode($negative_percent_format);
				$sheet->getStyle('I'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('I'.$i)->getNumberFormat()->setFormatCode($percent_format);
			}
			
			$row["operating_efficiency_fundraising_value"] = ($row["operating_efficiency_fundraising_value"] != "") ? $row["operating_efficiency_fundraising_value"] : 0;
			$sheet->setCellValue('J'.$i , abs($row["operating_efficiency_fundraising_value"]));
			if(($row["operating_efficiency_fundraising_value"] < 0)){
				$sheet->getStyle('J'.$i)->getNumberFormat()->setFormatCode($negative_percent_format);
				$sheet->getStyle('J'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('J'.$i)->getNumberFormat()->setFormatCode($percent_format);
			}
			
			$row["change_in_net_assets_in_quarter"] = ($row["change_in_net_assets_in_quarter"] != "") ? $row["change_in_net_assets_in_quarter"] : 0;
			$sheet->setCellValue('K'.$i , abs($row["change_in_net_assets_in_quarter"]));
			if(($row["change_in_net_assets_in_quarter"] < 0)){
				$sheet->getStyle('K'.$i)->getNumberFormat()->setFormatCode($negative_usd_format);
				$sheet->getStyle('K'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('K'.$i)->getNumberFormat()->setFormatCode($usd_format);
			}
			
			$row["days_in_cash"] = ($row["days_in_cash"] != "") ? $row["days_in_cash"] : 0;
			$sheet->setCellValue('L'.$i , abs($row["days_in_cash"]));
			if(($row["days_in_cash"] < 0)){
				$sheet->getStyle('L'.$i)->getNumberFormat()->setFormatCode($negative_number_format);
				$sheet->getStyle('L'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('L'.$i)->getNumberFormat()->setFormatCode($number_format);
			}

			$sheet->setCellValue('M'.$i , "TY".(isset($row["change_in_grant_ty_ytd"]) ? $row["change_in_grant_ty_ytd"] : 0).":LY".(isset($row["change_in_grant_ly_ytd"]) ? $row["change_in_grant_ly_ytd"] : 0));
			$sheet->setCellValue('N'.$i , (isset($row["change_in_grant_ty_ytd_value"]) ? $row["change_in_grant_ty_ytd_value"] : 0).":".(isset($row["change_in_grant_ly_ytd_value"]) ? $row["change_in_grant_ly_ytd_value"] : 0));
			$sheet->setCellValue('O'.$i , isset($row["is_net_assets_positive"]) ? $row["is_net_assets_positive"] : "N");

			$row["borad_giving"] = ($row["borad_giving"] != "") ? $row["borad_giving"] : 0;
			$sheet->setCellValue('P'.$i , abs($row["borad_giving"]));
			if(($row["borad_giving"] < 0)){
				$sheet->getStyle('P'.$i)->getNumberFormat()->setFormatCode($negative_percent_format);
				$sheet->getStyle('P'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('P'.$i)->getNumberFormat()->setFormatCode($percent_format);
			}
			
			$row["operating_reserves_percentage"] = ($row["operating_reserves_percentage"] != "") ? $row["operating_reserves_percentage"] : 0;
			$sheet->setCellValue('Q'.$i , abs($row["operating_reserves_percentage"]));
			if(($row["operating_reserves_percentage"] < 0)){
				$sheet->getStyle('Q'.$i)->getNumberFormat()->setFormatCode("(0.00\\%)");
				$sheet->getStyle('Q'.$i)->getFont()->getColor()->setARGB($color_red);
			}else{
				$sheet->getStyle('Q'.$i)->getNumberFormat()->setFormatCode("0.00\\%");
			}
			
			$i++;
		}

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$OutputFilename.'"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);

	}
}
