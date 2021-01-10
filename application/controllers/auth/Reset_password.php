<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * ResetPassword Controller
 */
class Reset_password extends CI_Controller 
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model');
		//$this->output->enable_profiler(TRUE);
	}

	/**
	 * Show reset password form
	 *
	 * @param  String $token
	 * 
	 * @return view 'auth/reset_password.php'
	 */
	public function index($token = NULL)
	{
		if ( $token === NULL)
		{
			//Token not found
			$this->session->set_flashdata('error', 'Invalid reset password token.');

			redirect(base_url('/login'));
		}

		//Force log out user if already logged in.
		$this->session->set_userdata('logged_in', FALSE);

		//Check for the valid token
		if ( $this->User_model->check_token($token) === 0 )
		{
			//Invalid token
			$this->session->set_flashdata('error', 'Invalid reset password token.');

			redirect(base_url('/login'));
		}

		$data['content'] = array(
			'token'	=> $token
		);

		//Name of the view file
		$data['view_name'] = 'auth/reset_password';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/reset_password.js');

		$this->load->view('template', $data);
	}
	
	/**
	 * Send a reset password link to the given Email ID
	 *
	 * @param POST `email`
	 * 
	 * @return json $response
	 */
	public function send_token()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);

		//Check whether user with the email id and affiliate location exists on `users` table
		$user_data = $this->User_model->check_affiliate_user($data['email'], $data['location']);

		$status = $message = NULL;

		if ( ! empty($user_data) )
		{
			//User exists. Generate reset password token.
			$token = bin2hex(random_bytes(32));

			if ( $this->User_model->save_password_token($user_data['user_id'], $token) )
			{
				//Token generated and saved successfully. Send reset link to user's email
				$mail_content = 'Hi<br />';
				$mail_content .= '<p>To change your account password, click the link below.</p>';
				$mail_content .= '<p><a href="'.base_url("/reset-password/$token").'">Reset Password</a></p>';
				$mail_content .= '<p>Thanks</p>';

				//echo $mail_content.'<br />';

				$this->load->library('email');

				$this->email->from('noreply@nul.com', 'NUL');
				$this->email->to($data['email']);

				$this->email->subject('Reset your password');
				$this->email->message($mail_content);

				if ( $this->email->send() )
				{
					$log_data = array(
						'user_id' => $user_data['user_id'],
						'affiliate_id' => $user_data['affiliate_id'],
						'note' => 'Requested for resetting the password'
					);
			
					//Log user activities
					$this->User_model->user_log($log_data);

					//Email sent successfully
					$message = "The reset link is sent to your email id. Please check your inbox.";
					$status = TRUE;
				}
				else
				{
					//Failed to sent email.
					$message = "Something went wrong. Try again later.";
					$status = FALSE;
				}
			}
			else
			{
				//Failed to save the token.
				$message = "Something went wrong. Try again later.";
				$status = FALSE;
			}
		}
		else
		{
			//User with email id doesn't exists
			$status = FALSE;
			$message = 'User with given email id not found.';
		}

		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);

	}
	
	/**
	 * Reset password for user with `reset_password_token`
	 *
	 * @param  POST $password
	 * @param  POST $token
	 * 
	 * @return json $response
	 */
	public function update()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);

		$status = $message = NULL;

		if ( $this->User_model->change_password($data['token'], $data['password']) )
		{
			//New password saved successfully
			$status = TRUE;
			$message = 'Password changed successfully. Please log in using the new password.';
		}
		else
		{
			//Failed to save the new password.
			$status = FALSE;
			$message = 'Something went wrong. Try again later.';
		}

		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);

	}
}
