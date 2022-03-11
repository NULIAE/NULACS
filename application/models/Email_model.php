<?php
/**
 * Email template model
 */
class Email_model extends CI_Model 
{	
	/**
	 * Get all the email templates
	 *
	 * @return array
	 */
	public function get_email_templates()
	{
		$query = $this->db->get('email_template');

		return $query->result_array();
	}

	/**
	 * Get a email templates
	 *
	 * @return array
	 */
	public function get_template($temp_id)
	{
		$this->db->where('temp_id', $temp_id);

		$query = $this->db->get('email_template');

		return $query->row_array();
	}
	
	/**
	 * Insert an email template
	 * 
	 * @param  array $data
	 * @return bool
	 */
	public function add($data)
	{
		return $this->db->insert('email_template', $data);
	}
	
	/**
	 * Update an email template
	 *
	 * @param  int $temp_id
	 * @param  array $data
	 * @return bool
	 */
	public function update($temp_id, $data)
	{
		$this->db->where('temp_id', $temp_id);
		
		return $this->db->update('email_template', $data);
	}

	public function get_target_users($type, $month, $quarter, $year, $role = NULL)
	{
		$exclude = array();

		if($type == "monthly")
		{
			$query = $this->db->query("SELECT DISTINCT(`affiliate_id`) FROM `affiliate_compliance_status_monthly` WHERE `month`='$month' AND `year`='$year' AND `compliance_status`='8'");
			$result = $query->result_array();
		}
		else if($type == "quarterly")
		{
			$query = $this->db->query("SELECT DISTINCT(`affiliate_id`) FROM `affiliate_compliance_status_quarterly` WHERE `quarter`='$quarter' AND `year`='$year' AND `compliance_status`='8'");
			$result = $query->result_array();
		}
		else if($type == "yearly")
		{
			$query = $this->db->query("SELECT DISTINCT(`affiliate_id`) FROM `affiliate_compliance_status_yearly` WHERE `year`='$year' AND `compliance_status`='8'");
			$result = $query->result_array();
		}

		foreach($result as $row)
		{
			$exclude[] = $row["affiliate_id"];
		}

		$this->db->select("user_id, role_id, CONCAT(prifix, first_name, ' ' , last_name) AS fullname, name, user_title, is_adm_uploader");
		$this->db->from("users");
		$this->db->where("user_status", 1);
		
		if(isset($role) && $role != "")
		{
			$this->db->where("role_id", $role);
			
			//if($role == 2)
			//	$this->db->where("is_adm_uploader", 1);
		}
		// else
		// {
		// 	$this->db->where("role_id !=", 1);
		// }

		if(isset($exclude) && !empty($exclude))
		{
			$this->db->where_not_in("affiliate_id", $exclude);
		}
		
		$query = $this->db->get();

		return $query->result_array();

	}

	public function get_user_emails($user_ids)
	{
		$this->db->select("user_email_address_1");
		$this->db->where_in("user_id", $user_ids);

		$query = $this->db->get("users");

		return $query->result_array();
	}

	public function get_admin_emails()
	{
		$this->db->select("user_email_address_1");
		$this->db->where("role_id", 1);
		$this->db->where("user_status", 1);

		$query = $this->db->get("users");

		return $query->result_array();
	}
}
