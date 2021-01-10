<?php
/**
 * User_model
 * */
class User_model extends CI_Model 
{
	/**
	 * Check whether user with the given `email` exists or not. 
	 *
	 * @param  mixed $email
	 * @return array User record if exists; Otherwise return NULL
	 */
	public function check_user($email)
	{
		$this->db->select('user_id, affiliate_id, role_id, name, user_status, user_password');
		$this->db->where('user_email_address_1', $email);
		$this->db->or_where('user_email_address_2', $email);
		$this->db->or_where('user_email_address_3', $email);

		$query = $this->db->get('users');

		return $query->row_array();
	}
	
	/**
	 * Check whether user with the email id and affiliate location exists on `users` table
	 *
	 * @param  mixed $email
	 * @param  mixed $location
	 * @return array
	 */
	public function check_affiliate_user($email, $location)
	{
		$this->db->select('users.user_id, users.affiliate_id');
		$this->db->from('users');
		$this->db->join('affiliate', 'affiliate.affiliate_id = users.affiliate_id');
		$this->db->where('users.user_status', '1');
		$this->db->where('affiliate.organization', $location);
		$this->db->where('users.user_email_address_1', $email);
		$this->db->or_where('users.user_email_address_2', $email);
		$this->db->or_where('users.user_email_address_3', $email);

		$query = $this->db->get();

		return $query->row_array();
	}
	
	/**
	 * Save reset password token in `users` table for the user with given `user_id`
	 *
	 * @param  mixed $user_id
	 * @param  mixed $token
	 * @return bool
	 */
	public function save_password_token($user_id, $token)
	{
		$this->db->where('user_id', $user_id);
		$this->db->set('reset_password_token', $token);

		return $this->db->update('users');
	}
	
	/**
	 * Check whether the token exists or not
	 *
	 * @param  mixed $token
	 * @return number Return the number of records for the '$token'
	 */
	public function check_token($token)
	{
		$this->db->where('reset_password_token', $token);

		return $this->db->count_all_results('users');
	}
	
	/**
	 * Reset password using the `token`
	 *
	 * @param  String $token
	 * @param  String $hashed_password
	 * @return boolean Update status
	 */
	public function change_password($token, $hashed_password)
	{
		$this->db->select('user_id, affiliate_id');
		$this->db->where('reset_password_token', $token);

		$query = $this->db->get('users');

		$user = $query->row_array();

		if ( ! empty($user) )
		{
			$this->db->set('user_password', $hashed_password);
			$this->db->set('reset_password_token', '');
			$this->db->where('user_id', $user['user_id']);

			if ( $this->db->update('users') )
			{
				$log_data = array(
					'user_id' => $user['user_id'],
					'affiliate_id' => $user['affiliate_id'],
					'note' => 'User reset the password'
				);
				//Log user activities
				$this->db->insert('activity_log', $log_data);

				return TRUE;
			}
		}
		
		//Invalid reset password token or password updation failed
		return FALSE;

	}
	
	/**
	 * Get all the affiliate locations
	 *
	 * @return array
	 */
	public function get_affiliate_locations()
	{
		$this->db->select('organization');
		$this->db->from('affiliate');
		
		$query = $this->db->get();

		return $query->row_array();
	}
	
	/**
	 * Update the last login time in `users` table
	 *
	 * @param  int $user_id
	 * @return void
	 */
	public function update_last_login($user_id)
	{
		$this->db->set('last_login', date('Y-m-d H:i:s', now()));
		$this->db->where('user_id', $user_id);

		$this->db->update('users');
	}
	
	/**
	 * Log user activities
	 *
	 * @param  array $data
	 * @return void
	 */
	public function user_log($data)
	{
		$this->db->insert('activity_log', $data);
	}
	
	/**
	 * Create new user and return user_id
	 *
	 * @param  array $data
	 * @return `user_id` if added; otherwise return FALSE
	 */
	public function new_user($data)
	{
		if( $this->db->insert('users', $data) )
		{
			return $this->db->insert_id();
		}

		return FALSE;
	}
	
	/**
	 * Update existing user
	 *
	 * @param  int $user_id
	 * @param  array $data
	 * @return boolean
	 */
	public function update($user_id, $data)
	{
		$this->db->where('user_id', $user_id);

		return $this->db->update('users', $data);
	}
	
	/**
	 * Get user details by `user_id`
	 *
	 * @param  int $user_id
	 * @return array
	 */
	public function get_user_by_id($user_id)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('affiliate', 'affiliate.affiliate_id = users.affiliate_id');
		$this->db->join('roles', 'roles.role_id = users.role_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->where('users.user_id', $user_id);

		$query = $this->db->get();

		return $query->row_array();
	}
	
	/**
	 * Get all the user roles
	 *
	 * @return array
	 */
	public function get_user_roles()
	{
		$query = $this->db->get('roles');

		return $query->result_array();
	}
	
	/**
	 * Get the count of all users using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function get_users_count($where = NULL) 
	{
		if( $where !== NULL)
		{
			$this->db->where($where);
		}

        return $this->db->count_all_results('users');
    }
	
	/**
	 * Get all user and sort them using conditions
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $where
	 * @return void
	 */
	public function get_all_users($limit = NULL, $start = NULL, $where = NULL)
	{
		$this->db->select('*');
		$this->db->from('users');
		$this->db->join('affiliate', 'affiliate.affiliate_id = users.affiliate_id');
		$this->db->join('roles', 'roles.role_id = users.role_id');
		$this->db->join('state', 'stateid = affiliate.state');

		if( $where !== NULL)
		{
			$this->db->where($where);
		}

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Get all the regions
	 *
	 * @return array
	 */
	public function get_all_regions()
	{
		$query = $this->db->get('region');

		return $query->result_array();
	}
}
