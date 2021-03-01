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
}
