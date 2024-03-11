<?php
/**
 * Census Forms Update model
 */
class CensusForms_model extends CI_Model
{	
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('CensusReport_model');
	}
	/**
	 * Update census report basic data
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function census_report_data_update($report_id,$report_data)
	{
		$data = array(
			'field_census_status' => $report_data['edit-field-census-status'],
			'field_date_established'   => $report_data['edit-field-date-established'],
			'field_president_ceo_first_name'   => $report_data['edit-field-president-ceo-first-name'],
			'field_president_ceo_middle_name'   => $report_data['edit-field-president-ceo-middle-name'],
			'field_president_ceo_last_name'   => $report_data['edit-field-president-ceo-last-name'],
			'field_number_of_years_as_ceo'   => $report_data['edit-field-number-of-years-as-ceo'],
			'field_number_of_years_of_service'   => $report_data['edit-field-number-of-years-of-service'],
			'field_address_line_1'   => $report_data['edit-field-address-line-1'],
			'field_address_line_2'   => $report_data['edit-field-address-line-2'],
			'field_city'   => $report_data['edit-field-city'],
			'field_state_province' => $report_data['edit-field-state-province'],
			'field_zip_code'   => $report_data['edit-field-zip-code'],
			'field_telephone'   => $report_data['edit-field-telephone'],
			'field_fax'   => $report_data['edit-field-fax'],
			'field_cellular_number'   => $report_data['edit-field-cellular-number'],
			'field_email_address'   => $report_data['edit-field-email-address'],
			//'field_survey_name_of_certifier'   => $report_data['edit-field-survey-name-of-certifier'],
			'field_affiliate_select'   => $report_data['edit-field-affiliate-select'],
			'field_year'   => $report_data['edit-field-year'],
			'field_legacy_census_id' => ($this->session->role_id ==1 )?$report_data['edit-field-legacy-census-id'] : null,
			'field_legacy_comments_contact' => ($this->session->role_id ==1 )?$report_data['edit-field-legacy-comments-contact'] : null
		);

		if(isset($report_data['field_photo_title'])) {
			$data['field_photo_title'] = $report_data['field_photo_title'];
		}
		// To show Enter name of certifier only if status is submitted and in reviewd complete 
		if(isset($report_data['edit-field-survey-name-of-certifier'])){
			$data['field_survey_name_of_certifier'] = $report_data['edit-field-survey-name-of-certifier'];
			//if all tab status is completed the update all tab status to submitted. 
			$tab_status =  $this->CensusReport_model->select_tab_statuses($report_id);
            foreach ($tab_status as $status) {
                $array_status[] = $status;
            }
            if (array_unique($array_status) === array('119')) { 
                //echo "All vaues are 119";
				$data['field_census_status'] = 128;
                $this->CensusForms_model->change_tab_status_to_submitted($report_id);
            }
		}
		$this->db->where('report_id', $report_id);
		$status = $this->db->update('census_report', $data);
    	return $status;
	}

	/** 
	 * Check service area already exists
	 */
  public function check_service_area_exists($parent_census){

		$sql = "SELECT count(*) AS total FROM service_areas
	          WHERE field_parent_census = ".$parent_census;
		$query = $this->db->query($sql);
    $result =  $query->row();
		return $result->total;		
    
	}

	/**
	 * Update service area
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function service_area_update($report_id,$report_data)
	{
		$data = array(
			'field_service_area_city_county' => $report_data['field_service_area_city_county'],
			'field_service_area_population'   => str_replace(',','',$report_data['field_service_area_population']),
			'field_service_area_white'   => str_replace(',','',$report_data['field_service_area_white']),
			'field_service_area_hispanic'   => str_replace(',','',$report_data['field_service_area_hispanic']),
			'field_service_area_asian_am'   => str_replace(',','',$report_data['field_service_area_asian_am']),
			'field_service_area_native_am'   => str_replace(',','',$report_data['field_service_area_native_am']),
			'field_service_area_african_am'   => str_replace(',','',$report_data['field_service_area_african_am']),
			'field_service_area_other'   => str_replace(',','',$report_data['field_service_area_other']),
			'last_modified_by' => $this->session->user_id,
			'last_modified_at' => date("Y-m-d H:i:s") );
	
	//$this->db->where('field_service_areas_value', $report_id);
	$this->db->where('pk_id', $report_id);
	$status = $this->db->update('service_areas', $data);
	return $status;

	}	

	public function service_area_main_update($pk_id,$tab_status,$parent_census){
		$data = array(
			'field_tab_status' => $tab_status,
			'field_parent_census'   => $parent_census,
			'last_modified_by' => $this->session->user_id,
			'last_modified_at' => date("Y-m-d H:i:s") );

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('service_areas_main', $data);
	return $status;
	}

	/**
	 * Insert to service area
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function service_area_insert($report_data,$service_area_id)
	{
	
		$data = array(
			'field_service_area_city_county' => $report_data['field_service_area_city_county'],
			'fk_service_area_id' => $service_area_id,
			'field_service_area_population'   => str_replace(',','',$report_data['field_service_area_population']),
			'field_service_area_white'   => str_replace(',','',$report_data['field_service_area_white']),
			'field_service_area_hispanic'   => str_replace(',','',$report_data['field_service_area_hispanic']),
			'field_service_area_asian_am'   => str_replace(',','',$report_data['field_service_area_asian_am']),
			'field_service_area_native_am'   => str_replace(',','',$report_data['field_service_area_native_am']),
			'field_service_area_african_am'   => str_replace(',','',$report_data['field_service_area_african_am']),
			'field_service_area_other'   => str_replace(',','',$report_data['field_service_area_other']),
		  'created_by' => $this->session->user_id,
			'last_modified_by' => $this->session->user_id,
			'created_at' => date("Y-m-d H:i:s"),
			'last_modified_at' => date("Y-m-d H:i:s"),
		);
		return $this->db->insert('service_areas', $data);	

	}

	/**
	 * Delete service areas
	 * 
	 * 
	 * @param  int $area_id
	 * 
	 */
	public function service_area_delete($area_id)
	{
		
		$data = array(
			'is_deleted' => 1,
		);

		$this->db->where('pk_id', $area_id);
		$status = $this->db->update('service_areas', $data);
    return $status;

	}	

	/**
	 * Update community data
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function community_data_update($report_id,$report_data)
	{
		unset($report_data['pk_id']);
		$this->db->where('pk_id', $report_id);
		$status = $this->db->update('community_relations', $report_data);
    	return $status;
	}

	/**
	 * Select community data if already exists
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function community_data_select($report_id)
	{

		$sql = "SELECT pk_id FROM community_relations
	          WHERE field_parent_census = ".$report_id;
		$query = $this->db->query($sql);
    	$result =  $query->row();
		return $result->pk_id;

	}	
	
	/**
	 * Update community ad marketting section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */
	public function community_ad_marketting_update($community_id,$ad_marketting)
	{
		
		$this->db->where('community_relation_id', $community_id);
		$del = $this->db->delete('community_relation_method_ad_market');

		$result = 1;
		foreach($ad_marketting as $ad_type){
			$data = array(
				'community_relation_id' => $community_id,
				'field_method_of_ad_marketing' => $ad_type
			);
			$result = $this->db->insert('community_relation_method_ad_market', $data);
		}
		return $result;
	
	}	

	/**
	 * Create new census report
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function census_report_add($report_data)
	{
	
		$data = array(
			'field_date_established'   => $report_data['edit-organization-established'],
			'field_president_ceo_first_name'   => $report_data['edit-ceo-first-name'],
			'field_president_ceo_middle_name'   => $report_data['edit-ceo-middle-name'],
			'field_president_ceo_last_name'   => $report_data['edit-ceo-last-name'],
			'field_number_of_years_as_ceo'   => $report_data['edit-years-as-ceo'],
			'field_number_of_years_of_service'   => $report_data['edit-service-in-movement'],
			'field_address_line_1'   => $report_data['edit-address-line-1'],
			'field_address_line_2'   => $report_data['edit-address-line-2'],
			'field_city'   => $report_data['edit-city'],
			'field_state_province' => $report_data['edit-state-province'],
			'field_zip_code'   => $report_data['edit-zip-code'],
			'field_telephone'   => $report_data['edit-telephone'],
			'field_fax'   => $report_data['edit-fax'],
			'field_cellular_number'   => $report_data['edit-cellular-number'],
			'field_email_address'   => $report_data['edit-email-address'],
			'field_survey_name_of_certifier'   => $report_data['edit-field-certifier'],
			'field_affiliate_select'   => $report_data['affiliate'],
			'field_year'   => date("Y"),
			'field_census_status'   => 126,
			'field_photo_title' => $report_data['field_photo_title'],
		);
		$this->db->insert('census_report', $data);
		return $this->db->insert_id(); 	
	}


	/**
	 * Employee data update
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function employee_data_update($report_id,$report_data)
	{

	$this->db->where('field_parent_census', $report_id);
	$status = $this->db->update('employees_board_members', $report_data);
	return $status;

	}

	/**
	 * Revenue data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function revenue_data_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('revenue', $report_data);
	return $status;

	}

	/**
	 * Expenditures data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function expenditure_data_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('expenditures', $report_data);
	return $status;

	}	

	/**
	 * Update expenditure own rent values
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $own_rent
	 * 
	 */
	public function expenditure_ownrent_update($expenditure_id,$own_rent)
	{
		
		$this->db->where('fk_expenditure_id', $expenditure_id);
		$del = $this->db->delete('expenditure_own_rent');

		$result = 1;
		foreach($own_rent as $type){
			$data = array(
				'fk_expenditure_id' => $expenditure_id,
				'field_own_or_rent' => $type
			);
			$result = $this->db->insert('expenditure_own_rent', $data);
		}
		return $result;
	
	}
	
	/**
	 * Emergency data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function emergency_data_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('emergency_relief', $report_data);
	return $status;

	}

	/**
	 * Civic data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function civic_data_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('civic_engagement', $report_data);
	return $status;

	}

	/**
	 * Contact data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function contact_data_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('contact_data', $report_data);
	return $status;

	}	


	/**
	 * Empowerment data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function empowerment_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('empowerment', $report_data);
	return $status;

	}	

	/**
	 * Volunteer data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function volunteer_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('volunteers_members', $report_data);
	return $status;

	}	
	
	/**
	 * Education program update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function education_prg_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('education_program', $report_data);
	return $status;

	}		

	/**
	 * Entrepreneurship program update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function entrepreneurship_prg_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('entrepreneurship_program', $report_data);
	return $status;

	}			

	/**
	 * Health and Quality of Life program update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function health_quality_prg_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('health_quality_program', $report_data);
	return $status;

	}		
	
	/**
	 * Housing and Community Development
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function housing_prg_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('housing_community_development', $report_data);
	return $status;

	}

	/**
	 * Workforce Development Program
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function workforce_prg_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('workforce_develop_program', $report_data);
	return $status;

	}	

	/**
	 * Other Programs
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function other_prg_update($pk_id,$report_data)
	{

	$this->db->where('pk_id', $pk_id);
	$status = $this->db->update('other_programs', $report_data);
	return $status;

	}	


	/**
	 * Programs Insert
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function programs_insert($programs)
	{ 
	 $this->db->insert('programs', $programs);
	 return $this->db->insert_id(); 	
	}		

	

	/**
	 * Update program services data
	 * 
	 * 
	 * @param  int $program id
	 * @param  array $program_services
	 * 
	 */
	public function program_prg_services_update($program_id,$prg_ser)
	{
		
		$this->db->where('program_id', $program_id);
		$del = $this->db->delete('program_services');

		$result = 1;
		foreach($prg_ser as $ser){
			$data = array(
				'program_id' => $program_id,
				'field_program_service_provided_tid' => $ser['field_program_service_provided_tid'],
				'field_program_service_served_value' => str_replace(',','',$ser['field_program_service_served_value']),
				'field_program_service_hours_value' => str_replace(',','',$ser['field_program_service_hours_value']),
				'field_program_service_dollars_value' => str_replace(',','',$ser['field_program_service_dollars_value'])
			);
			$result = $this->db->insert('program_services', $data);
		}
		return $result;
	}	

	/**
	 * Delete venture type
	 * 
	 * 
	 * @param  int $venture_id
	 * 
	 */
	public function venture_type_delete($venture_id)
	{
		$this->db->where('venture_id', $venture_id);
		$result = $this->db->delete('revenue_ventures');
    	return $result;

	}
	/** 
	 * Check revenue already exists
	 */
	public function check_revenue_exists($parent_census){

		$sql = "SELECT count(*) AS total FROM revenue
	          WHERE field_parent_census = ".$parent_census;
		$query = $this->db->query($sql);
    $result =  $query->row();
		return $result->total;		
    
	}

	/**
	 * Update revenue venture type 
	 * 
	 * 
	 * @param  int $venture_id
	 * @return array
	 */
	public function revenue_venture_update($venture_id,$report_data)
	{
		$this->db->where('id', $report_data['field_budget_venture_type']);
		$this->db->from('venture_type');
		$rows = $this->db->count_all_results();
		
		if($rows === 0){
			$this->db->insert('venture_type', array('name' => $report_data['field_budget_venture_type']));
			$report_data['field_budget_venture_type'] = $this->db->insert_id();
		}

		$data = array(
			'field_budget_venture_type' => $report_data['field_budget_venture_type'],
			'field_budget_venture_earned'   => $report_data['field_budget_venture_earned'],
			'field_budget_venture_budgeted'   => $report_data['field_budget_venture_budgeted'],
			'last_modified_by' => $this->session->user_id,
			'last_modified_at' => date("Y-m-d H:i:s") );

		$this->db->where('venture_id', $venture_id);
		$status = $this->db->update('revenue_ventures', $data);
		return $status;

	}	
	
	/**
	 * Insert to revenue venture 
	 * 
	 * 
	 * @param  int $venture_id
	 * @return array
	 */	
	public function revenue_venture_insert($report_data,$pk_id)
	{
		$this->db->where('id', $report_data['field_venture_type']);
		$this->db->from('venture_type');
		$rows = $this->db->count_all_results();
		
		if($rows === 0){
			$this->db->insert('venture_type', array('name' => $report_data['field_venture_type']));
			$report_data['field_venture_type'] = $this->db->insert_id();
		}
	
		$data = array(
			'revenue_id' => $pk_id,
			'created_by' => $this->session->user_id,
			'last_modified_by' => $this->session->user_id,
			'created_at' => date("Y-m-d H:i:s"),
			'last_modified_at' => date("Y-m-d H:i:s"),
			'field_revenue_ventures_value'   => '',
			'field_budget_venture_type'   => $report_data['field_venture_type'],
			'field_budget_venture_earned'   => $report_data['field_amount_earned'],
			'field_budget_venture_budgeted'   => $report_data['field_amount_budgeted'],
		);
		return $this->db->insert('revenue_ventures', $data);	

	}

	/**
	 * Create dummy entry in revenue table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_revenue($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('revenue', $data);	
	}

	/**
	 * Create dummy entry in expenditures table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_expenditure($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('expenditures', $data);	
	}

	/**
	 * Create dummy entry in education_program table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_education_prg($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('education_program', $data);	
	}

	/**
	 * Create dummy entry in entrepreneurship_prg table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_entrepreneurship_prg($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('entrepreneurship_program', $data);	
	}

	/**
	 * Create dummy entry in health_prg table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_health_prg($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('health_quality_program', $data);	
	}

	/**
	 * Create dummy entry in housing_prg table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_housing_prg($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('housing_community_development', $data);	
	}

	/**
	 * Create dummy entry in workforce_prg table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_workforce_prg($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('workforce_develop_program', $data);	
	}

	/**
	 * Create dummy entry in other_prg table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_other_prg($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('other_programs', $data);	
	}

	/**
	 * Create dummy entry in civic table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_civic($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('civic_engagement', $data);	
	}

	/**
	 * Create dummy entry in emergency_relief table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_emergency_relief($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('emergency_relief', $data);	
	}

	/**
	 * Create dummy entry in contact_data table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_contact_data($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('contact_data', $data);	
	}

	/**
	 * Create dummy entry in empowerment table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_empowerment($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('empowerment', $data);	
	}

	/**
	 * Create dummy entry in volunteers_members table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_volunteer($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('volunteers_members', $data);	
	}

	/**
	 * Create dummy entry in mental_health table
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_mental_health($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('mental_health', $data);	
	}

	/**
	 * Create dummy entry in servcie areas
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_servicearea($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('service_areas_main', $data);	
	}
	
	/**
	 * Create dummy entry in community relations
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_community($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('community_relations', $data);	
	}	

	/**
	 * Create dummy entry in employees and board members
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */	
	public function add_dummy_data_employees($report_id)
	{
	
		$data = array(
			'field_tab_status' => 0,
			'field_parent_census' => $report_id
		);
		$this->db->insert('employees_board_members', $data);	
	}	

	/**
	 * Update programs funding source data
	 * 
	 * 
	 * @param  int $program id
	 * @param  array $funding_source
	 * 
	 */
	public function program_funding_source_update($program_id,$funding_source)
	{
		
		$this->db->where('program_id', $program_id);
		$del = $this->db->delete('funding_source');

		$result = 1;
		foreach($funding_source as $source){
			if($source['field_funding_organization_tid'] != "") {
				$this->db->where('id', $source['field_funding_organization_tid']);
				$this->db->from('funding_organizations');
				$rows = $this->db->count_all_results();
				
				if($rows === 0) {
					$this->db->select_max('id');
					$query = $this->db->get('funding_organizations');
					$max = $query->result_array();
					$id = $max[0]['id'] + 1;
					$new_item = array(
						'id' => $id, 
						'name' => $source['field_funding_organization_tid']
					);
					$this->db->insert('funding_organizations', $new_item);
					
					$source['field_funding_organization_tid'] = $id;
				}

				$data = array(
					'program_id' => $program_id,
					'field_funding_sector_tid' => $source['field_funding_sector_tid'],
					'field_funding_organization_tid' => $source['field_funding_organization_tid'],
					'field_funding_vehicle_tid' => $source['field_funding_vehicle_tid'],
					'field_funding_amount_value' => str_replace(',','',$source['field_funding_amount_value'])	
				);
				$result = $this->db->insert('funding_source', $data);
			}
		}
		return $result;
	
	}
	
	/**
	 * Target Served Insert
	 * 
	 * 
	 * @param  int $program_id
	 * @param array $target_served
	 */	
	public function target_served_insert($program_id, $target_served)
	{
		$data = array();
		foreach ( $target_served as $ts ){
			$data = array(
				'programs_id' => (int)$program_id,
				'target_group_id' => $ts
			);
			$this->db->insert('programs_target_groups_served', $data);
		}
		
	}

	public function update_program_by_id($form_data)
	{
		$this->db->where('programs_id', $form_data['pk_id']);
		$result = $this->db->delete('programs_target_groups_served');

		if ( !empty($form_data['field_program_target_group']) )
		$this->target_served_insert ( $form_data['pk_id'], $form_data['field_program_target_group']);
		
		$programs = [];
        $skip_insert = ['field_program_target_group','field_program_area'];

        foreach ($form_data as $key => $value) {
                if(!in_array($key,$skip_insert)){
                if (substr($key, 0, 3) === "new") {
                    $split = explode('-', $key);
                    $fun_source[$split[1]][$split[2]] = $value;
                }else{                    
                      $programs[$key] = $value;
                     }
              }    
        }
		
		$this->db->where('pk_id', $programs['pk_id']);
		$status = $this->db->update('programs', $programs);
		return $status;	
	}

	/**
	 * Delete record
	 * 
	 * 
	 * @return array
	 */		
	public function delete_censusreport($report_id, $db=[])
	{
		for($i=0;$i<(count($db));$i++){
			if($db[$i] === 'census_report'){
				$sql = "DELETE FROM $db[$i] WHERE report_id = $report_id";
			}
			else if($db[$i] === 'service_areas'){
				$query = "SELECT pk_id  FROM service_areas_main WHERE field_parent_census = $report_id";
				$result = $this->db->query($query);
				$data =  $result->row();
				$sql = "DELETE FROM $db[$i] WHERE pk_id =$data->pk_id";
			}else{
				$sql = "DELETE FROM $db[$i] WHERE field_parent_census = $report_id";
			}
			// echo "<pre>".$sql."</pre>";
			$query = $this->db->query($sql);
		}
		// return false;
		//$result =  $query->row();
		return $query;		
	}


	/**
	 * Update all tab status to submitted 
	 * 
	 * 
	 * @return array
	 */		
	public function change_tab_status_to_submitted($report_id)
	{
		$query = "UPDATE census_report t1 
					JOIN service_areas_main t2 ON (t1.report_id = t2.field_parent_census) 
					JOIN community_relations  t3 ON (t1.report_id = t3.field_parent_census) 
					JOIN employees_board_members  t4 ON (t1.report_id = t4.field_parent_census) 
					JOIN revenue  t5 ON (t1.report_id = t5.field_parent_census) 
					JOIN expenditures  t6 ON (t1.report_id = t6.field_parent_census) 
					JOIN education_program  t7 ON (t1.report_id = t7.field_parent_census)
					JOIN entrepreneurship_program  t8 ON (t1.report_id = t8.field_parent_census)
					JOIN health_quality_program  t9 ON (t1.report_id = t9.field_parent_census)
					JOIN housing_community_development  t10 ON (t1.report_id = t10.field_parent_census)
					JOIN workforce_develop_program  t11 ON (t1.report_id = t11.field_parent_census)
					JOIN other_programs  t12 ON (t1.report_id = t12.field_parent_census)
					JOIN civic_engagement  t13 ON (t1.report_id = t13.field_parent_census)
					JOIN emergency_relief  t14 ON (t1.report_id = t14.field_parent_census)
					JOIN contact_data  t15 ON (t1.report_id = t15.field_parent_census)
					JOIN empowerment  t16 ON (t1.report_id = t16.field_parent_census)
					JOIN volunteers_members  t17 ON (t1.report_id = t17.field_parent_census)
					JOIN covid_impact  t18 ON (t1.report_id = t18.pk_id)
					JOIN mental_health  t19 ON (t1.report_id = t19.pk_id)
					SET  
						t2.field_tab_status = 124,
						t3.field_tab_status = 124,
						t4.field_tab_status = 124,
						t5.field_tab_status = 124,
						t6.field_tab_status = 124,
						t7.field_tab_status = 124,
						t8.field_tab_status = 124,
						t9.field_tab_status = 124,
						t10.field_tab_status = 124,
						t11.field_tab_status = 124,
						t12.field_tab_status = 124,
						t13.field_tab_status = 124,
						t14.field_tab_status = 124,
						t15.field_tab_status = 124,
						t16.field_tab_status = 124,
						t17.field_tab_status = 124,
						t18.field_tab_status = 124,
						t19.field_tab_status = 124,
						t1.field_census_status = 128
					WHERE t1.report_id = $report_id ";
		$this->db->query($query);
		//echo $this->db->last_query();
		//die();

				
	}

	/**
	 * Update all tab status to reviewed complete 
	 * 
	 * 
	 * @return array
	 */		
	public function change_tab_status_to_reviewed_complete($report_id)
	{
		$query = "UPDATE census_report t1 
					JOIN service_areas_main t2 ON (t1.report_id = t2.field_parent_census) 
					JOIN community_relations  t3 ON (t1.report_id = t3.field_parent_census) 
					JOIN employees_board_members  t4 ON (t1.report_id = t4.field_parent_census) 
					JOIN revenue  t5 ON (t1.report_id = t5.field_parent_census) 
					JOIN expenditures  t6 ON (t1.report_id = t6.field_parent_census) 
					JOIN education_program  t7 ON (t1.report_id = t7.field_parent_census)
					JOIN entrepreneurship_program  t8 ON (t1.report_id = t8.field_parent_census)
					JOIN health_quality_program  t9 ON (t1.report_id = t9.field_parent_census)
					JOIN housing_community_development  t10 ON (t1.report_id = t10.field_parent_census)
					JOIN workforce_develop_program  t11 ON (t1.report_id = t11.field_parent_census)
					JOIN other_programs  t12 ON (t1.report_id = t12.field_parent_census)
					JOIN civic_engagement  t13 ON (t1.report_id = t13.field_parent_census)
					JOIN emergency_relief  t14 ON (t1.report_id = t14.field_parent_census)
					JOIN contact_data  t15 ON (t1.report_id = t15.field_parent_census)
					JOIN empowerment  t16 ON (t1.report_id = t16.field_parent_census)
					JOIN volunteers_members  t17 ON (t1.report_id = t17.field_parent_census)
					JOIN covid_impact  t18 ON (t1.report_id = t18.pk_id)
					SET  
						t2.field_tab_status = 122,
						t3.field_tab_status = 122,
						t4.field_tab_status = 122,
						t5.field_tab_status = 122,
						t6.field_tab_status = 122,
						t7.field_tab_status = 122,
						t8.field_tab_status = 122,
						t9.field_tab_status = 122,
						t10.field_tab_status = 122,
						t11.field_tab_status = 122,
						t12.field_tab_status = 122,
						t13.field_tab_status = 122,
						t14.field_tab_status = 122,
						t15.field_tab_status = 122,
						t16.field_tab_status = 122,
						t17.field_tab_status = 122,
						t18.field_tab_status = 122,
						t1.field_census_status = 127
					WHERE t1.report_id = $report_id ";
		$this->db->query($query);
		//echo $this->db->last_query();
		//die();

				
	}		
	
	/**
	 * Update covid services section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */
	
	public function covid_services_update($pk_id,$ad_marketting)
	{
		
		$this->db->where('covid_impact_id', $pk_id);
		$del = $this->db->delete('covid_impact_services');

		$result = 1;
		foreach($ad_marketting as $ad_type){
			$data = array(
				'covid_impact_id' => $pk_id,
				'field_what_kinds_of_supports' => $ad_type
			);
			$result = $this->db->insert('covid_impact_services', $data);
		}
		return $result;
	
	}	
	
	/**
	 * Update covid disruption section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */

	public function covid_disruptions_update($pk_id,$covid_disruptions)
	{
		//print_r($covid_support);die;
		$this->db->where('covid_impact_id', $pk_id);
		$del = $this->db->delete('covid_impact_disruptions');

		$result = 1;
		foreach($covid_disruptions as $c_s){
			$data = array(
				'covid_impact_id' => $pk_id,
				'field_were_there_any_disruptions' => $c_s
			);
			$result = $this->db->insert('covid_impact_disruptions', $data);
		}
		
		return $result;
	
	}	
	
	/**
	 * Update covid health program section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */
	
	public function covid_health_pgm_update($pk_id,$covid_health_program)
	{
		//print_r($covid_health_program);die;
		$this->db->where('covid_impact_id', $pk_id);
		$del = $this->db->delete('covid_impact_health_pgm');

		$result = 1;
		foreach($covid_health_program as $c_h_s){
			$data = array(
				'covid_impact_id' => $pk_id,
				'field_what_health_programs' => $c_h_s
			);
			$result = $this->db->insert('covid_impact_health_pgm', $data);
		}
		
		return $result;
	
	}	
	
	/**
	 * Update covid participants section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */

	public function covid_participants($pk_id,$covid_participants)
	{
		//print_r($covid_participants);die;
		$this->db->where('covid_impact_id', $pk_id);
		$del = $this->db->delete('covid_impact_participants');

		$result = 1;
		foreach($covid_participants as $c_p){
			$data = array(
				'covid_impact_id' => $pk_id,
				'engage_participants' => $c_p
			);
			$result = $this->db->insert('covid_impact_participants', $data);
		}
		
		return $result;
	
	}	
	
	/**
	 * Update covid services requested section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */

	public function covid_serv_requested($pk_id,$covid_serv_requested)
	{
		//print_r($covid_participants);die;
		$this->db->where('covid_impact_id', $pk_id);
		$del = $this->db->delete('covid_impact_services_requested');

		$result = 1;
		foreach($covid_serv_requested as $c_s_r){
			$data = array(
				'covid_impact_id' => $pk_id,
				'services_requested' => $c_s_r
			);
			$result = $this->db->insert('covid_impact_services_requested', $data);
		}
		
		return $result;
	
	}	
	
	/**
	 * Update covid services provided section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */

	public function covid_serv_provided($pk_id,$covid_serv_provided)
	{
		//print_r($covid_participants);die;
		$this->db->where('covid_impact_id', $pk_id);
		$del = $this->db->delete('covid_impact_services_provided');

		$result = 1;
		foreach($covid_serv_provided as $c_s_p){
			$data = array(
				'covid_impact_id' => $pk_id,
				'services_provided' => $c_s_p
			);
			$result = $this->db->insert('covid_impact_services_provided', $data);
		}
		
		return $result;
	
	}
	
	/**
	 * covid data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */

	public function covid_data_update($pk_id,$data)
	{
		$this->db->where('field_parent_census', $pk_id);
		$del = $this->db->delete('covid_impact');

		$this->db->where('field_parent_census', $pk_id);
			$status = $this->db->insert('covid_impact', $data);
			return $status;
		//}
	}

	/**
	 * mental health data update
	 * 
	 * 
	 * @param  int $pk_id
	 * @return array
	 */

	 public function mental_health_data_update($pk_id,$data)
	 {
		 $this->db->where('field_parent_census', $pk_id);
		 $del = $this->db->delete('mental_health');
 
		 $this->db->where('field_parent_census', $pk_id);
			 $status = $this->db->insert('mental_health', $data);
			 return $status;
		 //}
	 }
	
	/**
	 * Update Workforce Financial Incentive
	 * 
	 * 
	 * @param  int $pk_id
	 * @param  array $ad_marketting
	 * 
	 */
	public function financial_incnt_update($pk_id,$financial_incentives)
	{

		$this->db->where('pk_id', $pk_id);
		$del = $this->db->delete('workforce_develop_incentives');

		$result = 1;
		foreach($financial_incentives as $ad_type){
			$data = array(
				'pk_id' => $pk_id,
				'field_financial_incentives' => $ad_type
			);
			$result = $this->db->insert('workforce_develop_incentives', $data);
		}
		return $result;
	
	}	
	
	/**
	 * Update workforce participant
	 * 
	 * 
	 * @param  int $pk_id
	 * @param  array $ad_marketting
	 * 
	 */
	public function participant_place_update($pk_id,$field_participants_place)
	{

		$this->db->where('pk_id', $pk_id);
		$del = $this->db->delete('workforce_develop_participants');

		$result = 1;
		foreach($field_participants_place as $ad_type){
			$data = array(
				'pk_id' => $pk_id,
				'field_participants_place' => $ad_type
			);
			$result = $this->db->insert('workforce_develop_participants', $data);
		}
		return $result;
	
	}
	
	/**
	 * Update workforce Industry
	 * 
	 * 
	 * @param  int $pk_id
	 * @param  array $ad_marketting
	 * 
	 */
	public function industry_work_update($pk_id,$field_industries_work)
	{

		$this->db->where('pk_id', $pk_id);
		$del = $this->db->delete('workforce_develop_industries');

		$result = 1;
		foreach($field_industries_work as $ad_type){
			$data = array(
				'pk_id' => $pk_id,
				'field_industries_work' => $ad_type
			);
			$result = $this->db->insert('workforce_develop_industries', $data);
		}
		return $result;
	
	}

	/**
	 * Update health program offered section
	 * 
	 * 
	 * @param  int $report_id
	 * @param  array $ad_marketting
	 * 
	 */
	public function health_pgm_update($pk_id,$health_programs)
	{

		$this->db->where('pk_id', $pk_id);
		$del = $this->db->delete('health_quality_pgm_offered');

		$result = 1;
		foreach($health_programs as $ad_type){
			$data = array(
				'pk_id' => $pk_id,
				'field_health_programs' => $ad_type
			);
			$result = $this->db->insert('health_quality_pgm_offered', $data);
		}
		return $result;
	
	}

	
	/**
	 * Insert to entrepreneurship buisiness 
	 * 
	 * 
	 * @param  int $venture_id
	 * @return array
	 */	
	public function entrepreneurship_buisiness_insert($report_data,$pk_id)
	{
		$this->db->where('entrepreneurship_id', $pk_id);
		$del = $this->db->delete('entrepreneurship_program_business');
		
		foreach ($report_data as $row){
			$data = array(
				'entrepreneurship_id' => $pk_id,
				'field_business_type_tid'   => $row['service_buisiness'],
				'field_business_sales_value'   => str_replace(',','',$row['service_sales']),
				'field_business_served_value'   => str_replace(',','',$row['service_served']),
			);
			$result = $this->db->insert('entrepreneurship_program_business', $data);	
		}
		return $result;
	}

	/**
	 * Delete venture type
	 * 
	 * 
	 * @param  int $venture_id
	 * 
	 */
	public function buisiness_type_delete($buisiness_id)
	{
		$this->db->where('id', $buisiness_id);
		$result = $this->db->delete('entrepreneurship_program_business');
    	return $result;

	}

	public function delete_censusreport_tab($report_id, $table_name, $pk_id){
		if($table_name == "programs"){
			$sql = "DELETE FROM $table_name WHERE 'pk_id'=$pk_id";
		}else{
			$sql = "DELETE FROM $table_name WHERE field_parent_census = $report_id";
		}
		
		if($table_name == "community_relations"){
			$this->db->where('community_relation_id', $report_id);
			$del = $this->db->delete('community_relation_method_ad_market');
		}elseif($table_name == "revenue"){
			$this->db->where('revenue_id', $pk_id);
			$result = $this->db->delete('revenue_ventures');
		}elseif($table_name == "expenditures"){
			$this->db->where('fk_expenditure_id');
			$result = $this->db->delete('expenditure_own_rent');
		}elseif($table_name == "education_program"){
			$this->db->where('field_parent_census', $report_id)->where('field_program_area_tid', 494);
			$result = $this->db->delete('programs');
		}elseif($table_name == "entrepreneurship_program"){
			$this->db->where('field_parent_census', $report_id)->where('field_program_area_tid', 495);
			$result = $this->db->delete('programs');
		}elseif($table_name == "health_quality_program"){
			$this->db->where('field_parent_census', $report_id)->where('field_program_area_tid', 496);
			$result = $this->db->delete('programs');
		}elseif($table_name == "housing_community_development"){
			$this->db->where('field_parent_census', $report_id)->where('field_program_area_tid', 497);
			$result = $this->db->delete('programs');
		}elseif($table_name == "workforce_develop_program"){
			$this->db->where('field_parent_census', $report_id)->where('field_program_area_tid', 499);
			$result = $this->db->delete('programs');
		}elseif($table_name == "other_programs"){
			$this->db->where('field_parent_census', $report_id)->where('field_program_area_tid', 498);
			$result = $this->db->delete('programs');
		}elseif($table_name == "covid_impact"){			
			$this->db->where('covid_impact_id', $pk_id);
			$this->db->delete('covid_impact_services');
			$this->db->where('covid_impact_id', $pk_id);
			$this->db->delete('covid_impact_disruptions');
			$this->db->where('covid_impact_id', $pk_id);
			$this->db->delete('covid_impact_health_pgm');
			$this->db->where('covid_impact_id', $pk_id);
			$this->db->delete('covid_impact_health_pgm');
			$this->db->where('covid_impact_id', $pk_id);
			$this->db->delete('covid_impact_services_requested');
			$this->db->where('covid_impact_id', $pk_id);
			$this->db->delete('covid_impact_services_provided');
			$this->db->where('covid_impact_id', $pk_id);
			$this->db->delete('covid_impact_participants');
		}
		elseif($table_name == "programs"){
			$this->db->where('pk_id', $pk_id) ;
			$this->db->delete('programs');
	
		}
		$query = $this->db->query($sql);
		return $query;
	}

	/**
	 * census report basic data 
	 * 
	 * @param  int $report_id
	 * 
	 */
	public function report_details($report_id)
	{

		$sql  = " SELECT cr.* FROM census_report cr ";
		$sql .= " WHERE cr.report_id = ? ";
		$query = $this->db->query($sql,[$report_id]);
		$result =  $query->row();
		return $result;

	}


}
