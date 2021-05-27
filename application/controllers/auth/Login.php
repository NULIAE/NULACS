<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Login Controller
 */
class Login extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		//$this->output->enable_profiler(TRUE);
	}
	
	/**
	 * Show login form
	 *
	 * @return view 'auth/login.php'
	 */
	public function index()
	{
		//Checking whether userdata logged_in not set; if true redirecting to home screen
		if ( $this->session->has_userdata('logged_in') && $this->session->logged_in )
		{
			redirect(base_url('/'));
		}

		$return_url = $this->input->get('return_url');
		if(isset($return_url) &&  $return_url != "")
			$return_url = "?return_url=".$return_url;
		
		$data['content'] = array(
			'csrf_name' => $this->security->get_csrf_token_name(),
			'csrf_hash' => $this->security->get_csrf_hash(),
			'return_url' => $return_url
		);

		//Name of the view file
		$data['view_name'] = 'auth/login';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/login.js');

		$this->load->view('template', $data);
	}
	
	/**
	 * Function authenticate user
	 * 
	 * @param POST `email`
	 * @param POST `password`
	 *
	 * @return redirect to Home
	 */
	public function authenticate()
	{
		$return = $this->input->get('return_url');
		if(isset($return) &&  $return != "")
			$return_url = "?return_url=".$return;
		else
			$return_url = "";
		
		if(isset($_POST))
		{
			//XSS Filter all the input post fields
			$data = $this->input->post(NULL, TRUE);

			if(isset($data['email']) && isset($data['password']))
			{
				//Check whether user with the email id exists on `users` table
				$user_data = $this->User_model->check_user($data['email']);

				print_r($user_data);die();
				
				if ( isset($user_data) && $user_data['user_status'] === 1 )
				{
					//User exists. Check for the valid password
					if ($data['password'] == $user_data['user_password']) 
					{
						//Update the last login time in `users` table
						$this->User_model->update_last_login($user_data['user_id']);

						$log_data = array(
							'user_id' => $user_data['user_id'],
							'affiliate_id' => $user_data['affiliate_id'],
							'note' => 'Logged in'
						);

						//Log user activities
						$this->User_model->user_log($log_data);

						unset($user_data['user_password']);
						
						$user_data['email'] = $data['email'];
						$user_data['logged_in'] = TRUE;
						
						$this->session->set_userdata($user_data);

						if(isset($return) &&  $return != "")
							redirect(base_url($return));
						else
							redirect(base_url('/'));
						exit;
					}
					else
					{
						//Invalid password. Back to login
						$this->session->set_flashdata('error', 'Invalid username or password. Password not matched - '.$user_data['user_password']);
				
						redirect(base_url('/login').$return_url);
						exit;							
					}
				}
				else
				{
					//User with email id doesn't exists or invalid password. Back to login
					$this->session->set_flashdata('error', 'Invalid username or password. User not exists or Status is 0');
			
					redirect(base_url('/login').$return_url);
					exit;
				}
			}
			else
			{
				//User with email and password required. Back to login
				$this->session->set_flashdata('error', 'Username and Password are required.');
		
				redirect(base_url('/login').$return_url);
				exit;
			}
		}

		$this->session->set_flashdata('error', 'Invalid username or password. Not POST');
	
		redirect(base_url('/login').$return_url);
		exit;
	}
	
	/**
	 * Funtion logging out current user
	 *
	 * @return redirect to Home
	 */
	public function logout()
	{
		if(isset($this->session->user_id) && isset($this->session->affiliate_id))
		{
			$log_data = array(
				'user_id' => $this->session->user_id,
				'affiliate_id' => $this->session->affiliate_id,
				'note' => 'Logged out'
			);
	
			//Log user activities
			$this->User_model->user_log($log_data);
		}
		
		$this->session->sess_destroy();

		redirect('/');
	}
}
