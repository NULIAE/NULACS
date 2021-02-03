<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affiliate_model');
		$this->load->model('Document_model');
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
			'locations' => $this->Affiliate_model->get_all_affiliates(),
			'regions' => $this->User_model->get_all_regions()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/user_management/list_users';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/filter_users.js'
		);
		$data['notifications'] = $this->Document_model->get_notifications();
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
		$data['notifications'] = $this->Document_model->get_notifications();
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

		//Check whether user with the email id exists on `users` table
		$user_data = $this->User_model->check_user($data['user_email_address_1']);

		$status = $message = NULL;

		if ( ! empty($user_data) && $user_data['user_status'] === "1" )
		{
			//User already exists
			$status = FALSE;
			$message = 'User with the given Email ID already exists';
		}
		else
		{
			$affiliate = $this->Affiliate_model->get_affiliate_by_id($data['affiliate_id']);

			$data['region_id'] = $affiliate['region_id'];
			
			//Add new user
			$user_id = $this->User_model->new_user($data);

			if ( $user_id !== FALSE )
			{
				$log_data = array(
					'user_id' => $this->session->user_id,
					'affiliate_id' => $this->session->affiliate_id,
					'record_id'	=> $user_id,
					'note' => 'New user added'
				);
		
				//Log user activities
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
}
