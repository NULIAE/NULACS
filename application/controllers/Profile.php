<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Affiliate_model');
		$this->load->model('Document_model');
		//$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Show the profile page
	 *
	 * @return view 'profile/index.php'
	 */
	public function index($user_id)
	{
		$user = $this->User_model->get_user_by_id($user_id);

		if ( empty($user) )
			redirect('/');

		if( ($this->session->user_id != $user_id) && ($this->session->role_id == 2) )
			redirect('/');

		$data['content'] = array(
			'user' => $user,
			'role_id' => $this->session->role_id 	//Logged in user role for edit
		);
		
		//Name of the view file
		$data['view_name'] = 'profile/index';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/profile.js');
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}

	/**
	 * Show the profile edit page
	 *
	 * @return view 'profile/edit.php'
	 */
	public function edit($user_id)
	{
		$user = $this->User_model->get_user_by_id($user_id);

		if ( empty($user) )
			redirect('/');

		if( ($this->session->user_id != $user_id) && ($this->session->role_id == 2) )
			redirect('/');

		$data['content'] = array(
			'user' => $user,
			'roles' => $this->User_model->get_user_roles(),
			'role_id' => $this->session->role_id 	//Logged in user role for edit
		);
		
		//Name of the view file
		$data['view_name'] = 'profile/edit';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/profile.js');
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}
	
	/**
	 * Update the user profile details
	 *
	 * @return void
	 */
	public function update()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);

		$status = $message = NULL;

		$user = $this->User_model->get_user_by_id($data['user_id']);

		if(!empty($user))
		{
			if( $this->session->role_id == 1 )
			{
				$data['is_adm_uploader'] = isset($data['is_adm_uploader']) ? 1 : 0;
				$data['isuser_super_administrator'] = isset($data['isuser_super_administrator']) ? 1 : 0;
				$data['user_status'] = isset($data['user_status']) ? 1 : 0;
			}

			if ( $this->User_model->update($data['user_id'], $data) )
			{
				$log_data = array(
					'user_id' => $this->session->user_id,
					'affiliate_id' => $this->session->affiliate_id,
					'record_id'	=> $data['user_id'],
					'note' => 'User profile updated'
				);
		
				//Log user activities
				$this->User_model->user_log($log_data);
				
				//User profile updated
				$status = TRUE;
				$message = 'User profile updated successfully.';
			}
			else
			{
				//Failed to save the user details.
				$status = FALSE;
				$message = 'Something went wrong. Try again later.';
			}
		}
		else
		{
			//Failed to save the user details.
			$status = FALSE;
			$message = 'User not found.';
		}
		
		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}
	
	/**
	 * Show change password form
	 *
	 * @return view 'profile/change_password.php'
	 */
	public function change_password()
	{
		$data['content'] = array(
			'user' => $this->User_model->get_user_by_id($this->session->user_id)
		);
		
		//Name of the view file
		$data['view_name'] = 'profile/change_password';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/change_password.js');
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}
	
	/**
	 * Update the password
	 *
	 * @return json $response
	 */
	public function update_password()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);

		$user = $this->User_model->get_user_by_id($this->session->user_id);

		$status = $message = NULL;

		if ( $data['password'] == $user['user_password'] )
		{
			$update_data = array(
				'user_password' => $data['new_password']
			);

			if ( $this->User_model->update($this->session->user_id, $update_data) )
			{
				$log_data = array(
					'user_id' => $this->session->user_id,
					'affiliate_id' => $this->session->affiliate_id,
					'note' => 'Password changed'
				);
		
				//Log user activities
				$this->User_model->user_log($log_data);

				//New password saved successfully
				$status = TRUE;
				$message = 'Password changed successfully.';
			}
			else
			{
				//Failed to save the new password.
				$status = FALSE;
				$message = 'Something went wrong. Try again later.';
			}
		}
		else
		{
			//Invalid current password.
			$status = FALSE;
			$message = 'Invalid password. Please try  again.';
		}

		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}

	public function modules()
	{
		$data['content'] = array();
		
		//Name of the view file
		$data['view_name'] = 'profile/list_modules';
		//Page specific javascript files
		$data['footer']['js'] = array();
		$data['notifications'] = $this->Document_model->get_notifications();
		$this->load->view('template', $data);
	}
}
