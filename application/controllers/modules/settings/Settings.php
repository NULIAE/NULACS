<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Settings Controller for managing App Settings
 */
class Settings extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Settings_model');
		$this->load->model('Document_model');
		//$this->output->enable_profiler(TRUE);
	}

	/**
	 * Show the Settings page
	 *
	 * @return view 'modules/settings/settings.php'
	 */
	public function index()
	{
		$result = $this->Settings_model->get_all_settings();

		$settings = array();
		
		foreach ( $result as $row)
		{
			$settings[$row['label']] = $row['value'];
		}

		$data['content'] = array(
			'settings'	=> $settings
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/settings/settings';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/modules/settings.js');
		$data['notifications'] = $this->Document_model->get_notifications();
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
		$this->load->view('template', $data);
	}

	/**
	 * Update settings
	 *
	 * @return json
	 */
	public function update()
	{
		$data = $this->input->post();

		$update_data = array();

		foreach ( $data as $key => $value)
		{
			array_push($update_data, array('label' => $key, 'value' => $value));
		}

		//Update settings details
		$status = $this->Settings_model->update($update_data);

		if ( $status !== FALSE)
		{
			$status = TRUE;
			$message = "Settings has been updated";
		}
		else
		{
			$message = "Something went wrong. Please try again.";
		}

		echo json_encode(array('success' => $status, 'message' => $message));
	}
}
