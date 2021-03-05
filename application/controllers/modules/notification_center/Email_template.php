<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_template extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Email_model');
		$this->load->model('Document_model');
		$this->load->model('Settings_model');
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
	 * Show the Email template add page
	 *
	 * @return view 'modules/notification_center/add.php'
	 */
	public function add_form()
	{
		$data['notifications'] = $this->Document_model->get_notifications();
		
		$data['content'] = array();
		
		//Name of the view file
		$data['view_name'] = 'modules/notification_center/add';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js',
			'pages/modules/add_email_template.js'
		);

		$this->load->view('template', $data);
	}
	
	/**
	 * Save a new email template
	 *
	 * @return bool
	 */
	public function save()
	{
		$data = $this->input->post();

		$insert_data = array(
			'name' => $data['name'],
			'html_code' => $data['content'],
			'subject' => $data['subject'],
			'type' => $data['type']
		);

		//Update email template
		$status = $this->Email_model->add($insert_data);

		if ( $status === TRUE)
		{
			$message = "Email template saved successfully";
		}
		else
		{
			$message = "Something went wrong. Please try again.";
		}

		echo json_encode(array('success' => true, 'message' => $message));
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
			'html_code' => $data['content'],
			'subject' => $data['subject'],
			'type' => $data['type']
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

	public function preview($template_id)
	{
		$data = $this->input->get();

		$data['notifications'] = $this->Document_model->get_notifications();

		$template = $this->Email_model->get_template($template_id);

		if(!isset($data['user']) || $data['user'] == "")
		{
			$data['user'] = NULL;
		}

		if(isset($data['month']) && $data['month'] != "")
			$month = $data['month'];
		else
			$month = date("m", strtotime("-1 month", time()));

		if(isset($data['quarter']) && $data['quarter'] != "")
			$quarter = $data['quarter'];
		else
			$quarter =  ceil($month/3);
		
		if(isset($data['year']) && $data['year'] != "")
			$year = $data['year'];
		else
			$year = date("Y", strtotime("-1 month", time()));

		$target_date = mktime(0, 0, 0, $month, 1, $year);

		$quarterArray = array(
			'1' => 'January - March',
			'2' => 'April - June',
			'3' => 'July - September',
			'4' => 'October - December',
		);

		$data['month'] = date("F", $target_date);
		$data['quarter'] = $quarterArray[$quarter];
		$data['year'] = $year;

		$users = $this->Email_model->get_target_users($template["type"], $month, $quarter, $year, $data["user"]);

		$data['last_date'] = date("l, F t, Y", strtotime("+1 month", $target_date));

		$this->load->library('parser');

		$preview_data = array(
			"message" => $this->parser->parse_string($template['html_code'], $data, TRUE),
			"preview" => TRUE
		);
		
		$preview = $this->load->view('layout/mail_template', $preview_data, TRUE);
		
		$data['content'] = array(
			'template' => $template,
			'preview' => $preview,
			'month' => $month,
			'quarter' => $quarter,
			'year' => $year,
			'users' => $users,
			'roles' => $this->User_model->get_user_roles()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/notification_center/preview';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'pages/modules/email_preview.js'
		);

		$this->load->view('template', $data);
	}

	public function send_remainders()
	{
		$data = $this->input->post();

		$template = $this->Email_model->get_template($data["template"]);

		$user_mails = $this->Email_model->get_user_emails($data["users"]);

		$target_mails = "";

		foreach($user_mails as $key => $row)
		{
			$target_mails .= ($key == 0) ? "" : ",";
			$target_mails .= $row["name"];
		}

		$quarter = ceil($data["month"]/3);

		$target_date = mktime(0, 0, 0, $data["month"], 1, $data["year"]);

		$quarterArray = array(
			'1' => 'January - March',
			'2' => 'April - June',
			'3' => 'July - September',
			'4' => 'October - December',
		);

		$data['month'] = date("F", $target_date);
		$data['quarter'] = $quarterArray[$quarter];

		$data['last_date'] = date("l, F t, Y", strtotime("+1 month", $target_date));

		$this->load->library('parser');

		$preview_data = array(
			"message" => $this->parser->parse_string($template['html_code'], $data, TRUE)
		);
		
		$message = $this->load->view('layout/mail_template', $preview_data, TRUE);

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
        
		$this->email->to($target_mails);
        //$this->email->to("nulapplication@gmail.com");
    
        $this->email->subject($template['subject']);

        $this->email->message($message);
    
        /* if($this->email->send())
		{
			$response = array(
				"success" => TRUE,
				"message" => "Reminder emails has been sent."
			);
		}
		else
		{
			$response = array(
				"success" => FALSE,
				"message" => "Failed to send the emails. Please try again later."
			);
		} */

		$response = array(
			"success" => FALSE,
			"message" => "Please enable the mail function"
		);

		echo json_encode($response);
	}
}
