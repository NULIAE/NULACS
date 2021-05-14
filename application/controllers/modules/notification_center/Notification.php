<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Notification Controller
 */
class Notification extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Email_model');
		$this->load->model('Document_model');
		//$this->output->enable_profiler(TRUE);
	}

	/**
	 * Show the notification page
	 *
	 * @return view 'modules/notification_center/notifications.php'
	 */
	public function index()
	{
		$data['content'] = array();
		
		//Name of the view file
		$data['view_name'] = 'modules/notification_center/notifications';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/modules/notifications.js');
		$data['notifications'] = $this->Document_model->get_notifications();

		$keyword = ($this->input->get('search') != NULL) ? $this->input->get('search') : NULL;
		$data['user_notifications'] = $this->Document_model->user_notifications($keyword);

		$this->load->view('template', $data);
	}
}
