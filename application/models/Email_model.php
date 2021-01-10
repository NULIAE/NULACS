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
}
