<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'third_party/excel/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends MY_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affiliate_model');
		$this->load->model('Document_model');
		$this->load->model('Settings_model');
		//$this->output->enable_profiler(TRUE);
	}	
	/**
	 * Show the Users list page
	 *
	 * @return view 'modules/user_management/list_users.php'
	 */
	public function index()
	{

		$data['content'] = array(
			'roles' => $this->User_model->get_user_roles(),
			'affiliates' => $this->Affiliate_model->get_all_affiliates(),
			'regions' => $this->User_model->get_all_regions()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/user_management/list_users';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/filter_users.js'
		);
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
		$data['notifications'] = $this->Document_model->get_limited_notification();
		$data['notification_count'] = $this->Document_model->get_notification_count();
		$this->load->view('template', $data);
	}

	
	/**
	 * Filter user list
	 *
	 * @return json List of users
	 */
	public function filter()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$filters = array();

		if( isset($data['region']) && ($data['region'] !== '') )
			$filters['users.region_id'] =  $data['region'];

		if( isset($data['role']) && ($data['role'] !== '') )
			$filters['users.role_id'] =  $data['role'];

		if( isset($data['status']) && ($data['status'] !== '') )
			$filters['users.user_status'] =  $data['status'];
			
		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
			$filters['users.affiliate_id'] =  $data['affiliate'];

		if( isset($data['access']) && ($data['access'] !== '') )
				$filters['users.is_census'] =  $data['access'];

		if( isset($data['useremail']) && ($data['useremail'] !== '') ){
			$filters['users.name']= $data['useremail']   ;
		}

		if( empty($filters) )
			$filters = NULL;

		if(!isset($data['per_page']))
			$data['per_page'] = 0;
		
		if(!isset($data['page_items']))
			$data['page_items'] = NULL;

		$result = $this->_get_paginated_users($data['per_page'], $filters, $data['page_items']);

		echo json_encode($result);
		
	}
	
	/**
	 * Filter users using conditions and display via pages
	 *
	 * @param  int $page_number
	 * @param  array $filters
	 * @param  int $page_items
	 * @return array
	 */
	private function _get_paginated_users($page_number = NULL, $filters = NULL, $page_items = NULL)
	{
		$this->load->library('pagination');

		//Load default pagination configurations
		$this->config->load('pagination');
		$config = $this->config->item('pagination'); 
		
		//Override necessary configurations for pagination
		$config['base_url'] = base_url('module/user/filter');
		$config['total_rows'] = $this->User_model->get_users_count($filters);
		$config['per_page'] = ($page_items !== NULL) ? $page_items : $config['per_page'];

		$this->pagination->initialize($config);
		
		$page_number = ($page_number !== NULL) ? $page_number : 0;

		$users = $this->User_model->get_all_users($config['per_page'], $page_number, $filters);

		return array('users' => $users, 'pagination' => $this->pagination->create_links());
	}

	
	/**
	 * Show user add form page
	 *
	 * @return view 'modules/user_management/add_user.php'
	 */
	public function add_form()
	{
		$data['content'] = array(
			'affiliates' => $this->Affiliate_model->get_all_affiliates(),
			'roles' => $this->User_model->get_user_roles()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/user_management/add_user';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/modules/add_user.js');
		$data['notifications'] = $this->Document_model->get_limited_notification();
		$data['notification_count'] = $this->Document_model->get_notification_count();
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
		$this->load->view('template', $data);
	}

	/**
	 * Create new user
	 *
	 * @return json
	 */
	public function insert()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);
		if($data['role_id'] == 3){
			$data['is_census'] = 1;
			$data['is_acs'] = 1;

		}else{
			$data['is_census'] = isset($data['is_census']) ? 1 : 0;
			$data['is_acs'] = isset($data['is_acs']) ? 1 : 0;
		}

		//Check whether user with the email id exists on `users` table
		$user_data = $this->User_model->check_user($data['name'], TRUE);

		$status = $message = NULL;

		if ( ! empty($user_data) )
		{
			//User already exists
			$status = FALSE;
			$message = 'User with the given User ID already exists';
		}
		else
		{
			$affiliate = $this->User_model->get_region_from_affiliate($data['affiliate_id']);

			$data['region_id'] = $affiliate['region_id'];
			$token = $data['reset_password_token'] = bin2hex(random_bytes(32));
			
			//Add new user
			$user_id = $this->User_model->new_user($data);

			if ( $user_id !== FALSE )
			{
				$content = '<p><strong>Dear '.$data["first_name"].' '.$data["last_name"].'</strong></p>';
				$content .= '<p>Your account has been created on National Urban League website.</p>';
				$content .= '<p>To access your account, you need to change the password first by clicking the link below.</p>';
				$content .= '<p><a href="'.base_url("/reset-password/$token").'">Reset Password</a></p>';
				$content .= '<p>Thanks</p>';
				
				$mail_content = $this->load->view('layout/mail_template', array("message" => $content), TRUE);

				$subject = "Welcome ".$data["first_name"]." ".$data["last_name"].", You are a NUL Member!";

				//Get SMTP settings
				$settings = array();
				$result = $this->Settings_model->get_all_settings();
				foreach ( $result as $row)
				{
					$settings[$row['label']] = $row['value'];
				}
		
				$config['smtp_host'] = $settings['smtp_host'];
				$config['smtp_user'] = $settings['smtp_user'];
				$config['smtp_pass'] = $settings['smtp_pass'];
				$config['smtp_port'] = $settings['smtp_port'];

				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->from("noreply@nul.org", "National Urban League");
				$this->email->to($data["name"]);
				$this->email->subject($subject);
				$this->email->message($mail_content);
				$this->email->send();
		
				//Log user activities
				$log_data = array(
					'user_id' => $this->session->user_id,
					'affiliate_id' => $this->session->affiliate_id,
					'record_id'	=> $user_id,
					'note' => 'New user added'
				);
				$this->User_model->user_log($log_data);
				
				//New user added
				$status = TRUE;
				$message = 'User created successfully.';

				$this->session->set_flashdata('message', $message);
			}
			else
			{
				//Failed to add new user.
				$status = FALSE;
				$message = 'Something went wrong. Try again later.';
			}
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}

	/**
	 * Export all/filtered users list
	 *
	 * @return excel file
	 */
	public function export_user_list()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);

		$filters = array();

		if( isset($data['region']) && ($data['region'] !== '') )
			$filters['users.region_id'] =  $data['region'];

		if( isset($data['affiliate']) && ($data['affiliate'] !== '') )
			$filters['users.affiliate_id'] =  $data['affiliate'];

		if( isset($data['role']) && ($data['role'] !== '') )
			$filters['users.role_id'] =  $data['role'];

		if( isset($data['status']) && ($data['status'] !== '') )
			$filters['users.user_status'] =  $data['status'];

		if( empty($filters) )
			$filters = NULL;

		$result = $this->_get_paginated_users(0, $filters, 1000);
		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'User ID');
		$sheet->setCellValue('B1', 'Name');
		$sheet->setCellValue('C1', 'Organization');
		$sheet->setCellValue('D1', 'City');
		$sheet->setCellValue('E1', 'State');
		$sheet->setCellValue('F1', 'Title');
		$sheet->setCellValue('G1', 'Role');

		$i = 2;
		
		foreach($result["users"] as $row)
		{
			$sheet->setCellValue('A'.$i , $row['name']);
			$sheet->setCellValue('B'.$i , $row['first_name']." ".$row['last_name']);
			$sheet->setCellValue('C'.$i , $row['organization']);
			$sheet->setCellValue('D'.$i , $row['city']);
			$sheet->setCellValue('E'.$i , $row['state']);
			$sheet->setCellValue('F'.$i , $row['user_title']);
			$sheet->setCellValue('G'.$i , $row['role_description']);
			$i++;
		}
		
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="UsersList.xlsx"');
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');

		$spreadsheet->disconnectWorksheets();
		unset($spreadsheet);
	}

	public function import_user_list()
	{
		$count = 0;
		$csv = './CEO_list_import.csv';
		$handle = fopen($csv,"r");
		while (($row = fgetcsv($handle, 1000, ",")) != FALSE) //get row vales
		{
			$count++;
			if($count == 1)
			{
				$index = $row;
				continue;
			}

			$insert_data = array(
				$index[0] => $row[0],
				$index[1] => $row[1],
				$index[2] => $row[2],
				$index[3] => $row[3],
				$index[4] => $row[4],
				$index[5] => $row[5],
				$index[6] => $row[6],
				$index[7] => $row[7],
				$index[8] => $row[8],
				$index[9] => $row[9]
			);

			$user_id = $this->User_model->new_user($insert_data);
			
			if ( $user_id !== FALSE )
			{
				echo '<p style="margin:0;padding:3px;color:green;">Success : Row'.$count.' => '.$insert_data['name'].' inserted with user_id = '.$user_id.'</p>';
			}
			else
			{
				echo '<p style="margin:0;padding:3px;color:red;">Failed:Row'.$count.' => '.$insert_data['name'].' not inserted</p>';
			}
		}
	}

	public function send_welcome_mail()
	{
		//Get SMTP settings
		$settings = array();
		$result = $this->Settings_model->get_all_settings();
		foreach ( $result as $row)
		{
			$settings[$row['label']] = $row['value'];
		}

		$config['smtp_host'] = $settings['smtp_host'];
		$config['smtp_user'] = $settings['smtp_user'];
		$config['smtp_pass'] = $settings['smtp_pass'];
		$config['smtp_port'] = $settings['smtp_port'];

		$where = array(
			'users.role_id' => 3,
			'users.user_status' => 0
		);

		$users = $this->User_model->get_all_users(NULL, NULL, $where);

		foreach($users as $data)
		{
			$token = bin2hex(random_bytes(32));

			$update_data = array(
				'user_status' => 1,
				'reset_password_token' => $token
			);

			if($this->User_model->update($data["user_id"], $update_data))
			{
				$content = '<p><strong>Dear '.$data["first_name"].' '.$data["last_name"].'</strong></p>';
				$content .= '<p>Your account has been created on National Urban League website.</p>';
				$content .= '<p>To access your account, you need to change the password first by clicking the link below.</p>';
				$content .= '<p><a href="'.base_url("/reset-password/$token").'">Reset Password</a></p>';
				$content .= '<p>Thanks</p>';
				
				$mail_content = $this->load->view('layout/mail_template', array("message" => $content), TRUE);

				$subject = "Welcome ".$data["first_name"]." ".$data["last_name"].", You are a NUL Member!";

				$this->load->library('email');
				$this->email->initialize($config);
				$this->email->from("noreply@nul.org", "National Urban League");
				$this->email->to($data["name"]);
				$this->email->subject($subject);
				$this->email->message($mail_content);

				if($this->email->send())
				{
					echo '<p style="margin:0;padding:3px;color:green;">Success : User('.$data["user_id"].' => '.$data["name"].'); Welcome mail sent successfully.</p>';
				}
				else
				{
					echo '<p style="margin:0;padding:3px;color:red;">Failed : User('.$data["user_id"].' => '.$data["name"].'); Failed to send the email.</p>';
				}
			}
			else
			{
				echo '<p style="margin:0;padding:3px;color:red;">Failed : User('.$data["user_id"].' => '.$data["name"].'); Reset Token not updated.</p>';
			}

		}
	}
}
