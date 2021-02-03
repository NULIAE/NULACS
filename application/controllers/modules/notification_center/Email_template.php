<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_template extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Email_model');
		$this->load->model('Document_model');
		//$this->output->enable_profiler(TRUE);
	}

	/**
	 * Show the Email template edit page
	 *
	 * @return view 'modules/notification_center/edit.php'
	 */
	public function index()
	{
		$data['notifications'] = $this->Document_model->get_notifications();
		
		$data['content'] = array(
			'templates' => $this->Email_model->get_email_templates()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/notification_center/edit';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js',
			'pages/modules/email_templates.js'
		);

		$this->load->view('template', $data);
	}
	
	/**
	 * Update an email template
	 *
	 * @param  int $id
	 * @return bool
	 */
	public function update($id)
	{
		$data = $this->input->post();

		$update_data = array(
			'name' => $data['name'],
			'html_code' => $data['content']
		);

		//Update email template
		$status = $this->Email_model->update($id, $update_data);

		if ( $status === TRUE)
		{
			$message = "Email template updated successfully";
		}
		else
		{
			$message = "Something went wrong. Please try again.";
		}

		echo json_encode(array('success' => true, 'message' => $message));
	}
}
