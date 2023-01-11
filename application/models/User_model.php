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
	public function check_user($email, $check_status = FALSE)
	{
		$this->db->select('user_id, affiliate_id, role_id, name, user_status, user_password');
		$this->db->where('name', $email);
		
		if($check_status)
			$this->db->where('user_status', 1);

		$query = $this->db->get('users');

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

		if(!empty($where['users.name'])){
			$this->db->group_start();
			$this->db->like('users.name',$where['users.name']);
			$this->db->or_like('users.first_name',$where['users.name']);
			$this->db->or_like('users.last_name',$where['users.name']);
			$this->db->group_end();
			unset($where['users.name']);
		}
		
		
		if( $where !== NULL)
		{
			$this->db->where($where);
		}
		
		$this->db->where('is_deleted',0);

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
		$this->db->where('is_deleted',0);

		
		if(!empty($where['users.name'])){
			$this->db->group_start();
			$this->db->like('users.name',$where['users.name']);
			$this->db->or_like('users.first_name',$where['users.name']);
			$this->db->or_like('users.last_name',$where['users.name']);
			$this->db->group_end();
			unset($where['users.name']);
		}
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

	public function get_region_from_affiliate($affiliate_id)
	{
		$this->db->select("region_id");
		$this->db->where("affiliate_id", $affiliate_id);
		
		$query = $this->db->get('affiliate');

		return $query->row_array();
	}

	public function delete_user_by_id($id){
		$this->db->where('user_id', $id);
		$this->db->set('user_status', 0);
		$this->db->set('is_deleted', 1);

		return $this->db->update('users');
	}

	public function get_board_member($affiliate_id)
	{
		$this->db->select('prifix, first_name, last_name');
		$this->db->from('users');
		$this->db->where('affiliate_id', $affiliate_id);

		$query = $this->db->get();

		$row = $query->row_array();

		if(isset($row))
			return $row["prifix"].$row["first_name"]." ".$row["last_name"];
		else
			return NULL;
	}

	public function get_board_member_name($affiliate_id)
	{
		$this->db->select('prifix, first_name, last_name');
		$this->db->from('users');
		$this->db->where('affiliate_id', $affiliate_id);
		$this->db->where('is_deleted', 0);
		$this->db->where('user_status', 1);
		$this->db->like('user_title','CEO');
		$query = $this->db->get();

		$row = $query->row_array();

		if(isset($row))
			return $row["prifix"].$row["first_name"]." ".$row["last_name"];
		else
			return NULL;
	}
}
