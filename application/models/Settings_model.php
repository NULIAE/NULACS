<?php
/**
 * Settings model for managing App Settings
 */
class Settings_model extends CI_Model 
{	
	/**
	 * Get all the settings
	 *
	 * @return array
	 */
	public function get_all_settings()
	{
		$query = $this->db->get('settings');

		return $query->result_array();
	}
	
	/**
	 * Update settings data
	 *
	 * @param  array $data
	 * @return mixed
	 */
	public function update($data)
	{	
		return $this->db->update_batch('settings', $data, 'label');
	}
	
	/**
	 * Get settings by `type`
	 *
	 * @param  string $type
	 * @return array
	 */
	public function get_settings($type)
	{
		$this->db->where('type', $type);
		
		$query = $this->db->get('settings');

		return $query->result_array();
	}
}
