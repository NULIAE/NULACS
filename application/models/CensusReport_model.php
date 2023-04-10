<?php
/**
 * CensusReport_model
 */
class CensusReport_model extends CI_Model
{	
	

	/**
	 * Get census report tab details
	 * 
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function census_report_data($report_id)
	{
		$this->db->select('rep.*,af.organization,af.city,af.state,cs.status');
		$this->db->from('census_report rep');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = rep.field_affiliate_select', 'left');
		$this->db->join('census_statuses cs', 'cs.status_id = rep.field_census_status');
		$this->db->where('rep.report_id', $report_id);


		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get census report statuses
	 * @return array
	 */
	public function census_report_statuses()
	{
		$this->db->select('stat.*');
		$this->db->from('census_statuses stat');
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get service areas
	 * @param  int $report_id
	 * @return array
	 */
	public function service_areas($report_id)
	{
		$this->db->select('ser.*');
		$this->db->from('service_areas_main ser');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = ser.field_tab_status');
		$this->db->where('ser.field_parent_census', $report_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}    

	/**
	 * Get service areas
	 * @param  int $report_id
	 * @return array
	 */
	public function service_areas_details($service_area_id)
	{
		$this->db->select('ser.*');
		$this->db->from('service_areas ser');
		$this->db->where('ser.fk_service_area_id', $service_area_id);
		$this->db->where('ser.is_deleted', 0);
		$query = $this->db->get();
		return $query->result_array();
	}  

	/**
	 * Get community relations
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function community_relations($report_id)
	{
		$this->db->select('com.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('community_relations com');
		$this->db->join('census_report cr', 'cr.report_id = com.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = com.field_tab_status');
    	$this->db->where('com.field_parent_census', $report_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get Employees board members data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function employees_board($report_id)
	{
		$this->db->select('emp.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('employees_board_members emp');
		$this->db->join('census_report cr', 'cr.report_id = emp.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = emp.field_tab_status');
    	$this->db->where('emp.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Get revenue data
	 * @param  int $report_id
	 * @return array
	 */
	public function revenue($report_id)
	{
		$this->db->select('rev.*');
		$this->db->from('revenue rev');
    	$this->db->where('rev.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get expenditure data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function expenditure($report_id)
	{
		$this->db->select('exp.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('expenditures exp');
		$this->db->join('census_report cr', 'cr.report_id = exp.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = exp.field_tab_status');
    	$this->db->where('exp.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get expenditure own_rent data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function expenditure_own_rent($expenditure_id)
	{
		$this->db->select('ownrent.field_own_or_rent');
		$this->db->from('expenditure_own_rent ownrent');
    $this->db->where('ownrent.fk_expenditure_id', $expenditure_id);
		$query = $this->db->get();
		return $query->result_array();
	}	

	/**
	 * Get education program data
	 * @param  int $report_id
	 * @return array
	 */
	public function education_prg($report_id)
	{
		$this->db->select('eprg.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('education_program eprg');
		$this->db->join('census_report cr', 'cr.report_id = eprg.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = eprg.field_tab_status');
    	$this->db->where('eprg.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get entrepreneurship program data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function entrepreneurship_prg($report_id)
	{
		$this->db->select('eprg.*');
		$this->db->from('entrepreneurship_program eprg');
    	$this->db->where('eprg.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get health and quality of life program data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function health_prg($report_id)
	{
		$this->db->select('he.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('health_quality_program he');
		$this->db->join('census_report cr', 'cr.report_id = he.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = he.field_tab_status');
    	$this->db->where('he.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Get housing and community development program data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function housing_prg($report_id)
	{
		$this->db->select('hou.*');
		$this->db->from('housing_community_development hou');
    	$this->db->where('hou.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}	

	/**
	 * Get housing and community development program data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function workforce_prg($report_id)
	{
		$this->db->select('wdp.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('workforce_develop_program wdp');
		$this->db->join('census_report cr', 'cr.report_id = wdp.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = wdp.field_tab_status');
    	$this->db->where('wdp.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}	

	/**
	 * Get other programs data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function other_prg($report_id)
	{
		$this->db->select('oth.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('other_programs oth');
		$this->db->join('census_report cr', 'cr.report_id = oth.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = oth.field_tab_status');
    	$this->db->where('oth.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Get emergency relief data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function emergency_relief($report_id)
	{
		$this->db->select('er.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('emergency_relief er');
		$this->db->join('census_report cr', 'cr.report_id = er.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = er.field_tab_status');
    	$this->db->where('er.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}	

	/**
	 * Get contact data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function contact_data($report_id)
	{
		$this->db->select('cd.*,ts.status,');
		$this->db->from('contact_data cd');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = cd.field_tab_status');
    	$this->db->where('cd.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Get civic data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function civic_data($report_id)
	{
		$this->db->select('ce.*');
		$this->db->from('civic_engagement ce');
    	$this->db->where('ce.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get empowerment data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function empowerment_data($report_id)
	{
		$this->db->select('e.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('empowerment e');
		$this->db->join('census_report cr', 'cr.report_id = e.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = e.field_tab_status');
    	$this->db->where('e.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get volunteer data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function volunteer_data($report_id)
	{
		$this->db->select('vm.*');
		$this->db->from('volunteers_members vm');
    	$this->db->where('vm.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get covid data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function covid_data($report_id)
	{
		$this->db->select('c.*');
		$this->db->from('covid_impact c');
    	$this->db->where('c.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	
	/**
	 * Get census report statuses
	 * 
	 * 
	 * @return array
	 */
	public function census_tab_statuses()
	{
		$this->db->select('stat.*');
		$this->db->from('census_tab_statuses stat');
		$this->db->where('status_id !=',0);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get census summary report - revenue section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_revenue($filters)
	{
		
		$sql = "SELECT SUM(rv.field_revenue_total_budget) AS field_revenue_total_budget,
		        SUM(rv.field_revenue_nul) AS field_revenue_nul,
						SUM(rv.field_revenue_corporations) AS field_revenue_corporations,
						SUM(rv.field_revenue_foundations) AS field_revenue_foundations,
						SUM(rv.field_revenue_individual_members) AS field_revenue_individual_members,
						SUM(rv.field_revenue_special_events) AS field_revenue_special_events,
						SUM(rv.field_revenue_united_way) AS field_revenue_united_way,
						SUM(rv.field_revenue_federal) AS field_revenue_federal,
						SUM(rv.field_revenue_state_local) AS field_revenue_state_local,
						SUM(rv.field_revenue_other) AS field_revenue_other,
						SUM(rv.field_revenue_investment) AS field_revenue_investment,
						rv.field_revenue_has_endowment,
						SUM(rv.field_revenue_endowment_amount) AS field_revenue_endowment_amount
	          FROM revenue rv 
	          LEFT JOIN census_report cr ON rv.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year'];	  
		
		if(isset($filters['field_affiliate_select'])){
		$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
	  }
	  $sql .= " GROUP BY cr.field_year "; 

		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}

	/**
	 * Get census summary report - expenditures section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_expenditures($filters)
	{
		
		$sql = "SELECT SUM(exp.field_total_expenditures) AS field_total_expenditures,
		        SUM(exp.field_a_salaries_wages) AS field_a_salaries_wages,
						SUM(exp.field_b_fringe_benefits) AS field_b_fringe_benefits,
						SUM(exp.field_c_professional_fees) AS field_c_professional_fees,
						SUM(exp.field_d_travel) AS field_d_travel,
						SUM(exp.field_e_postage_freight) AS field_e_postage_freight,
						SUM(exp.field_f_insurance) AS field_f_insurance,
						SUM(exp.field_g_interest_payments) AS field_g_interest_payments,
						SUM(exp.field_h_dues_subscription_regist) AS field_h_dues_subscription_regist,
						SUM(exp.field_i_depreciation) AS field_i_depreciation,
						SUM(exp.field_j_taxes_including_property) AS field_j_taxes_including_property,
						SUM(exp.field_k_utilities) AS field_k_utilities,
						SUM(exp.field_l_equipment_space_rental) AS field_l_equipment_space_rental,
						SUM(exp.field_m_goods_and_services) AS field_m_goods_and_services,
						SUM(exp.field_n_rent_mortgage_payments) AS field_n_rent_mortgage_payments,
						SUM(exp.field_o_other) AS field_o_other,
						SUM(exp.field_number_properties_owned) AS field_number_properties_owned,
						SUM(exp.field_number_properties_rented) AS field_number_properties_rented,
						SUM(exp.field_market_value_of_property) AS field_market_value_of_property,
						SUM(exp.field_capital_budget_amount) AS field_capital_budget_amount

	          FROM expenditures exp 
	          LEFT JOIN census_report cr ON exp.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year'];

		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}

	/**
	 * Get census summary report - expenditures section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_education($filters)
	{
		
		$sql = "SELECT SUM(ed.field_program_ed_total_participa) AS field_program_ed_total_participa,
		        SUM(ed.field_program_ed_foster_total) AS field_program_ed_foster_total 

	          FROM education_program ed 
	          LEFT JOIN census_report cr ON ed.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year']; 

		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}

	/**
	 * Get census summary report - entrepreneurship section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_entrepreneurship($filters)
	{
		
		$sql = "SELECT SUM(en.field_program_entpr_total_partic) AS field_program_entpr_total_partic,
		        SUM(en.field_program_entpr_new) AS field_program_entpr_new,
						SUM(en.field_program_entpr_total_sales) AS field_program_entpr_total_sales,
						SUM(en.field_program_entpr_sales) AS field_program_entpr_sales
 

	          FROM entrepreneurship_program en 
	          LEFT JOIN census_report cr ON en.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year']; 
		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}

	/**
	 * Get census summary report - health section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_health($filters)
	{
		
		$sql = "SELECT SUM(hq.field_program_health_total_parti) AS field_program_health_total_parti,
						SUM(hq.field_program_health_assisted) AS field_program_health_assisted,
						SUM(hq.field_program_health_enrolled) AS field_program_health_enrolled,
						SUM(hq.field_program_health_participant) AS field_program_health_participant 

	          FROM health_quality_program hq 
	          LEFT JOIN census_report cr ON hq.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year']; 
		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}
	
	/**
	 * Get census summary report - housing section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_housing($filters)
	{
		
		$sql = "SELECT SUM(hc.field_program_housing_total_part) AS field_program_housing_total_part,
						SUM(hc.field_program_housing_attended) AS field_program_housing_attended,
						SUM(hc.field_program_housing_purchased) AS field_program_housing_purchased,
						AVG(hc.field_program_housing_avg_price) AS field_program_housing_avg_price,
						SUM(hc.field_program_housing_not4closed) AS field_program_housing_not4closed,
						SUM(hc.field_program_housing_alternate) AS field_program_housing_alternate,
						SUM(hc.field_program_housing_have_kids) AS field_program_housing_have_kids 																												

	          FROM housing_community_development hc 
	          LEFT JOIN census_report cr ON hc.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year']; 
		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}
	
	/**
	 * Get census summary report - workforce section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_workforce($filters)
	{
		
		$sql = "SELECT SUM(wf.field_program_work_participants) AS field_program_work_participants,
						SUM(wf.field_program_work_counseling) AS field_program_work_counseling,
						SUM(wf.field_program_work_placed) AS field_program_work_placed,
						SUM(wf.field_program_work_retained) AS field_program_work_retained,
						AVG(wf.field_program_work_salary) AS field_program_work_salary,
						AVG(wf.field_program_work_hourly) AS field_program_work_hourly,
						SUM(wf.field_program_work_welfare) AS field_program_work_welfare,
						SUM(wf.field_program_work_welfare_place) AS field_program_work_welfare_place,
						SUM(wf.field_program_work_total) AS field_program_work_total,
						SUM(wf.field_program_work_counseling) AS field_program_work_counseling,
						AVG(wf.field_program_work_welfare_salar) AS field_program_work_welfare_salar,
						AVG(wf.field_program_work_welfare_hour) AS field_program_work_welfare_hour 


	          FROM workforce_develop_program wf 
	          LEFT JOIN census_report cr ON wf.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year']; 
		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}
	
	/**
	 * Get census summary report - civic section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_civic($filters)
	{
		
		$sql = "SELECT SUM(ce.field_voter_societal_impact) AS field_voter_societal_impact,
						SUM(ce.field_forums_societal_impact) AS field_forums_societal_impact,
						SUM(ce.field_crja_societal_impact) AS field_crja_societal_impact,
						SUM(ce.field_police_societal_impact) AS field_police_societal_impact,
						SUM(ce.field_advocacy_societal_impact) AS field_advocacy_societal_impact


	          FROM civic_engagement ce 
	          LEFT JOIN census_report cr ON ce.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year']; 
		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}
	
	/**
	 * Get census summary report - emergency section
	 * 
	 * 
	 * @return array
	 */	
	public function censussummary_emergency($filters)
	{
		
		$sql = "SELECT SUM(er.field_relief_total_served) AS field_relief_total_served

	          FROM emergency_relief er 
	          LEFT JOIN census_report cr ON er.field_parent_census = cr.report_id
	          WHERE cr.field_year = ". $filters['field_year']; 
		if(isset($filters['field_affiliate_select'])){
			$sql .= " AND  cr.field_affiliate_select = ". $filters['field_affiliate_select'] ;
			}
		$sql .= " GROUP BY cr.field_year ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}

	/**
	 * Get yearly revenue data 
	 * 
	 * 
	 * @return array
	 */	
	public function revenue_expenditure_yearly_affiliate($where = NULL)
	{
		
		$sql = "SELECT af.affiliate_id,nf.censusid,nf.year,nf.affiliate,nf.revenue,nf.expenditures,nf.net,nf.revid,nf.exid,nf.id
						FROM NUL_Census_Financials nf 
	          LEFT JOIN affiliate af ON af.organization = nf.affiliate ";	  


		$flag = 0;
		if(isset($where['year'])){
		$sql .= ($flag == 0) ? "WHERE " : " AND ";
		$sql .= "  year = ". $where['year'] ;
		$flag = 1;
	  }

		if(isset($where['affiliate'])){
		$sql .= ($flag == 0) ? "WHERE " : " AND ";	
		$sql .= "  affiliate = '". $where['affiliate']."'" ;
		$flag = 1;
		}
		$sql .= " ORDER BY year ASC ";

		$query = $this->db->query($sql);
    $result =  $query->result_array();
		return $result;		

	}

	/**
	 * Get affiliate data 
	 * 
	 * 
	 * @return array
	 */		
	public function get_affiliate($affiliate_id)
	{
		$sql = "SELECT * FROM affiliate WHERE field_affiliate_select_value = ? ";
		$query = $this->db->query($sql,[$affiliate_id]);
		$result =  $query->row();
		return $result;		
	}

	
	/**
	 * Get cumulative key fund revenue 
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_keyfund_revenue()
	{
		$sql = "SELECT cr.field_year,SUM(rv.field_revenue_total_budget) AS field_revenue_total_budget,
		        SUM(rv.field_revenue_nul) AS field_revenue_nul,
						SUM(rv.field_revenue_united_way) AS field_revenue_united_way,
						SUM(rv.field_revenue_federal) AS field_revenue_federal,
						SUM(rv.field_revenue_state_local) AS field_revenue_state_local
						FROM revenue rv 
	          LEFT JOIN census_report cr ON rv.field_parent_census = cr.report_id WHERE cr.field_year != '' ";	  
	  $sql .= " GROUP BY cr.field_year "; 

		$query = $this->db->query($sql);
    $result =  $query->result_array();
		return $result;
	}

	/**
	 * Get yearly revenue data 
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_keyfund_query($where = NULL)
	{
		
		$sql = "SELECT rv.field_revenue_total_budget,rv.field_revenue_nul, rv.field_revenue_united_way,rv.field_revenue_federal,
		        rv.field_revenue_state_local,af.organization,af.affiliate_id,cr.report_id,cr.field_year
	          FROM revenue rv 
	          JOIN census_report cr ON rv.field_parent_census = cr.report_id 
						JOIN expenditures ex ON ex.field_parent_census = cr.report_id 
						JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value";

	  $flag = 0;
		if(isset($where['year'])){
		$sql .= ($flag == 0) ? " WHERE " : " AND ";
		$sql .= "  cr.field_year = ". $where['year'];
		$flag = 1;
	  }

		if(isset($where['affiliate'])){
		$sql .= ($flag == 0) ? " WHERE " : " AND ";	
		$sql .= "  af.field_affiliate_select_value = ". $where['affiliate'] ;
		$flag = 1;
		}

		$query = $this->db->query($sql);
    $result =  $query->result_array();
		return $result;

	}

	/**
	 * Get census report tab details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_census_data($year,$affiliate_id)
	{

		$sql = "SELECT cr.report_id,cr.field_president_ceo_first_name,cr.field_president_ceo_middle_name,cr.field_president_ceo_last_name,
		cr.field_date_established,cr.field_number_of_years_as_ceo,cr.field_address_line_1,cr.field_address_line_2,cr.field_city,cr.field_state_province,
		cr.field_zip_code,cr.field_telephone,cr.field_fax,cr.field_email_address,cr.field_number_of_years_of_service,cr.field_year,af.organization 
	          FROM census_report cr 
						JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value	
            WHERE cr.field_year = ? AND field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    	$result =  $query->row();
		return $result;
	}

	/**
	 * Get census report tab details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_civic_data($year,$affiliate_id)
	{

		$sql = "SELECT ce.* 
	          FROM civic_engagement ce
	          LEFT JOIN census_report cr ON ce.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? 
						";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}

	/**
	 * Get empowerment details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_empowerment_data($year,$affiliate_id)
	{

		$sql = "SELECT em.* 
	          FROM empowerment em
	          LEFT JOIN census_report cr ON em.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}

	/**
	 * Get employee board members details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_employees_board_data($year,$affiliate_id)
	{

		$sql = "SELECT emp.* 
	          FROM employees_board_members emp
	          LEFT JOIN census_report cr ON emp.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}

	/**
	 * Get contact data details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_contact_data($year,$affiliate_id)
	{

		$sql = "SELECT con.* 
	          FROM contact_data con
	          LEFT JOIN census_report cr ON con.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}	

	/**
	 * Get volunteers members details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_volunteers_members_data($year,$affiliate_id)
	{

		$sql = "SELECT vol.* 
	          FROM volunteers_members vol
	          LEFT JOIN census_report cr ON vol.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}	
	

	/**
	 * Get revenue tab details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_revenue_data($year,$affiliate_id)
	{

		$sql = "SELECT rv.* 
	          FROM revenue rv
	          LEFT JOIN census_report cr ON rv.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}

	/**
	 * Get expenditure tab details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_expenditure_data($year,$affiliate_id)
	{

		$sql = "SELECT exp.* 
	          FROM expenditures exp
	          LEFT JOIN census_report cr ON exp.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}

	/**
	 * Get community tab details using year and affiliate ID
	 * 
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_community_data($year,$affiliate_id)
	{

		$sql = "SELECT com.* 
	          FROM community_relations com
	          LEFT JOIN census_report cr ON com.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id]);
    $result =  $query->row();
		
		return $result;
	}	

	/**
	 * Get  program details
	 *  using year , affiliate ID and program area
	 *  
	 * 
	 * @param  int $affiliate_id
	 * @param  int $year
	 * @return array
	 */
	public function annual_census_pub_program_data($year,$affiliate_id,$edu_id)
	{

		$sql = "SELECT prg.* 
	          FROM programs prg
	          LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id 
            WHERE cr.field_year = ? AND cr.field_affiliate_select = ? AND prg.field_program_area_tid = ? ";
		$query = $this->db->query($sql,[$year,$affiliate_id,$edu_id]);
    $result =  $query->result_array();
		
		return $result;
	}	

	public function get_program_area_id($area)
	{
		$sql = "SELECT id FROM program_areas WHERE name = ? ";
		$query = $this->db->query($sql,[$area]);
    $result =  $query->row();
		return $result->id;
	}

	/**
	 * Get cumulative census revenue report data 
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_census_revenue()
	{
		$sql = "SELECT  year,SUM(revenue) as revenue,SUM(expenditures) as expenditures,SUM(net) as net FROM NUL_Census_Financials GROUP BY year ORDER BY year ASC "; 
		// $sql = "SELECT  year,revenue,expenditures,net FROM NUL_Census_Financials GROUP BY year ORDER BY year ASC"; 
		// $sql = "SELECT  year,SUM(revenue) as revenue,SUM(expenditures) as expenditures,SUM(net) as net FROM NUL_Census_Financials"; 

		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		

	}	

	/**
	 * Get cumulative people history report data 
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_people_history()
	{
		$sql = "SELECT cr.field_year, (SUM(field_public_total_male) + SUM(field_public_total_female)) AS public,
						(SUM(field_direct_total_male) + SUM(field_direct_total_female)) AS direct,
						SUM(field_indirect_contact_served) AS indirect, 
						(SUM(field_public_total_male) + SUM(field_public_total_female) + SUM(field_direct_total_male) + 
						SUM(field_direct_total_female) + SUM(field_indirect_contact_served)) AS net
						FROM 
		        contact_data contact
	          LEFT JOIN census_report cr ON contact.field_parent_census = cr.report_id  
						GROUP BY cr.field_year 
						ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Get cumulative people history report data 
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_people_history($params=NULL)
	{
		$sql = "SELECT af.organization,af.affiliate_id as org_id,cr.field_year,cr.report_id, (field_public_total_male + field_public_total_female) AS public,
						(field_direct_total_male + field_direct_total_female) AS direct,
						field_indirect_contact_served AS indirect, 
						(field_public_total_male + field_public_total_female + field_direct_total_male + 
						field_direct_total_female + field_indirect_contact_served) AS net
						FROM 
		        contact_data contact
	          LEFT JOIN census_report cr ON contact.field_parent_census = cr.report_id
						LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";

		$flag=0;
		if(isset($params['affiliate']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_affiliate_select`=".$params['affiliate'];
			$flag =1;
		}

		$sql .= "
						 ORDER BY cr.field_year DESC, af.organization DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	} 

	/**
	 * Get cumulative civic engagement 
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_civic_engagement()
	{
		$sql = "SELECT cr.field_year, SUM(field_voter_total) AS voter,
						SUM(field_forums_total)  AS community,
						SUM(field_crja_total) AS racial,
						SUM(field_police_total) AS police,
						SUM(field_advocacy_total) AS adv
						FROM 
		        civic_engagement civic
	          LEFT JOIN census_report cr ON civic.field_parent_census = cr.report_id  
						GROUP BY cr.field_year 
						ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	/**
	 * Get affiliate civic engagement 
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_civic_engagement($filters=NULL)
	{

		$sql =  "SELECT af.organization,af.affiliate_id AS affiliate,af.city,st.state,cr.field_year,cr.report_id, civic.field_voter_total AS voter,
		         if(civic.field_voter_registration, 'Yes', 'No') AS voter_reg,
						 civic.field_forums_total  AS community,
						 civic.field_crja_total AS racial,
						 civic.field_police_total AS police,
						 civic.field_advocacy_total AS adv
						 FROM 
		         civic_engagement civic
	           LEFT JOIN census_report cr ON civic.field_parent_census = cr.report_id
						 LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value 
						 LEFT JOIN `state` st ON st.stateid = af.state ";
		$flag=0;
		if(isset($filters['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$filters['year'];
			$flag =1;
		}

		if(isset($filters['affiliate']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$filters['affiliate'];
			$flag =1;
		}
		
		if(isset($filters['state']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`state`=".$filters['state'];
			$flag =1;
		}		

		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	} 

 
	/**
	 * Cumulative employee report 
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_employee_report()
	{
		$sql = "SELECT cr.field_year, SUM(field_full_time_employees) AS full_time,
						SUM(field_part_time_employees) AS part_time,
						AVG(field_average_employee_salary) AS average
						FROM 
		        employees_board_members emp
	          LEFT JOIN census_report cr ON emp.field_parent_census = cr.report_id  
						GROUP BY cr.field_year 
						ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

		

	/**
	 * Get affiliate employee report data 
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_employee_report($params=NULL)
	{
		$sql = "SELECT af.organization,cr.field_year,cr.report_id,
            field_full_time_employees AS full_time,
						field_part_time_employees AS part_time,
						field_average_employee_salary AS average		
						FROM 
		        employees_board_members emp
	          LEFT JOIN census_report cr ON emp.field_parent_census = cr.report_id
						LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";

		$flag=0;
		if(isset($params['affiliate']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_affiliate_select`=".$params['affiliate'];
			$flag =1;
		}

		if(isset($params['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$params['year'];
			$flag =1;
		}		

		$sql .= "
						 ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	/**
	 * Cumulative volunteer members 
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_mem_vol()
	{
		$sql = "SELECT cr.field_year, SUM(field_guild_members) AS guild,
						SUM(field_ypc_members) AS young,
						SUM(field_aux_members) AS other
						FROM 
		        volunteers_members vol
	          LEFT JOIN census_report cr ON vol.field_parent_census = cr.report_id  
						GROUP BY cr.field_year 
						ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	
	/**
	 * Get affiliate member volunteer 
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_mem_vol($params=NULL)
	{
		$sql = "SELECT af.organization,cr.field_year,cr.report_id,
            field_guild_members AS guild,
						field_ypc_members AS young,
						field_aux_members AS other		
						FROM 
		        volunteers_members vol
	          LEFT JOIN census_report cr ON vol.field_parent_census = cr.report_id
						LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";

		$flag=0;
		if(isset($params['affiliate']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_affiliate_select`=".$params['affiliate'];
			$flag =1;
		}


		if(isset($params['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$params['year'];
			$flag =1;
		}		

		$sql .= " ORDER BY cr.field_year DESC "; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}


	public function programs_by_year($year,$area) 
	{
		if($year == ""){
			$sql = "SELECT count(*) AS total FROM programs prg
				  LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id 
							WHERE field_program_area_tid = ".$area;
		}else{
			$sql = "SELECT count(*) AS total FROM programs prg
				  LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id 
							WHERE field_program_area_tid = ".$area." AND cr.field_year =".$year;
		}
		$query = $this->db->query($sql);
    	$result =  $query->row();
		return $result->total;
	}	
	
	public function programs_budget_by_year($year,$area) 
	{
		if($year == ""){
			$sql = "SELECT SUM(field_program_budget) AS budget FROM programs prg
	          LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id 
						WHERE field_program_area_tid = ".$area;
		}else{
			$sql = "SELECT SUM(field_program_budget) AS budget FROM programs prg
	          LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id 
						WHERE field_program_area_tid = ".$area." AND cr.field_year =".$year;
		}
		$query = $this->db->query($sql);
    	$result =  $query->row();
		return $result->budget;
	}
	
	public function programs_served_by_year($year,$area) 
	{
		if($year == ""){
			$sql = "SELECT SUM(field_program_served_total) AS served FROM programs prg
	          LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id 
						WHERE field_program_area_tid = ".$area;
		}else{
			$sql = "SELECT SUM(field_program_served_total) AS served FROM programs prg
	          LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id 
						WHERE field_program_area_tid = ".$area." AND cr.field_year =".$year;
		}		
		$query = $this->db->query($sql);
    	$result =  $query->row();
		return $result->served;
	}
	
	
	/**
	 * Get affiliate program area query 
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_program_area_query($params=NULL)
	{
		$sql = "SELECT af.organization,af.field_affiliate_select_value as org_id,cr.report_id as report_id,cr.field_year,
            area.name AS program_area,area.id AS area_id,
						prg.title AS program_name,prg.pk_id AS pk_id,
						if(prg.field_program_nul_funded, 'Yes', 'No') AS nul,
						prg.field_program_nul_funded AS nul_val,
						prg.field_program_served_total AS served,
						prg.field_program_budget AS budget		
						FROM 
		        programs prg
	          LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id
						LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value 
						LEFT JOIN program_areas area ON area.id = prg.field_program_area_tid ";

		$flag=0;
		if(isset($params['affiliate']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_affiliate_select`=".$params['affiliate'];
			$flag =1;
		}

		if(isset($params['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$params['year'];
			$flag =1;
		}		

		if(isset($params['program_area']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `prg`.`field_program_area_tid`=".$params['program_area'];
			$flag =1;
		}		

		if(isset($params['nul']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `prg`.`field_program_nul_funded`=".$params['nul'];
			$flag =1;
		}		

		if(isset($params['prg_name']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `prg`.`title` LIKE '%".$params['prg_name']."%'";
			$flag =1;
		}		

		$sql .= " ORDER BY cr.field_year DESC "; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	
	/**
	 * Get affiliate program area query 
	 * 
	 * 
	 * @return array
	 */	
	public function program_area_people_served_query($params=NULL,$export=NULL)
	{
		$sql = "SELECT af.organization,af.field_affiliate_select_value as org_id,cr.report_id as report_id,cr.field_year,
            area.name AS program_area,area.id AS area_id,
						prg.title AS program_name,prg.pk_id AS pk_id,
						prg.field_program_served_total AS served
						FROM 
		        programs prg
	          LEFT JOIN census_report cr ON prg.field_parent_census = cr.report_id
						LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value 
						LEFT JOIN program_areas area ON area.id = prg.field_program_area_tid ";

		$flag=0;
		if(isset($params['affiliate']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_affiliate_select`=".$params['affiliate'];
			$flag =1;
		}

		if(isset($params['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$params['year'];
			$flag =1;
		}		

		if(isset($params['program_area']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `prg`.`field_program_area_tid`=".$params['program_area'];
			$flag =1;
		}		
		
		$sql .= " ORDER BY cr.field_year DESC "; 
		if($export == 1 )
		 $sql .= "LIMIT 10";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	
	/**
	 * Cumulative education programs 
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_education_report()
	{
		$sql = "SELECT cr.field_year, SUM(field_program_ed_total_participa) AS total,cr.report_id AS report_id,
						SUM(field_program_ed_promoted) AS promoted,
						AVG(edu.field_program_ed_graduated) AS graduated,
						AVG(edu.field_program_ed_college_app) AS college,
						SUM(field_program_ed_scholar_total) AS scholar_tot,
						AVG(field_program_ed_scholar_avg) AS scholar_avg						
						FROM 
				education_program edu
		LEFT JOIN census_report cr ON edu.field_parent_census = cr.report_id
						WHERE cr.field_year NOT IN (2010,2011,2012,2013,2014,2015,2016,2017)  
						GROUP BY cr.field_year 
						ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;
	}
	
	/**
	 * Cumulative Health Report
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_health_report()
	{
		$sql = "SELECT cr.field_year as year,SUM(`field_program_health_total_parti`) as total,SUM(`field_program_health_participant`) as edu_cls_evnt_smnr,SUM(`field_program_health_enrolled`) as enrolled,SUM(`field_program_health_assisted`) as assisted FROM `health_quality_program` hqp LEFT JOIN census_report cr ON hqp.field_parent_census = cr.report_id WHERE cr.field_year NOT IN (2010,2011,2012,2013,2014,2015,2016,2017) GROUP BY cr.field_year ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Cumulative Housing Report
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_housing_report()
	{
		$sql = "SELECT cr.field_year as year,SUM(`field_program_housing_attended`) as attended,SUM(`field_program_housing_purchased`) as purchased,AVG(`field_program_housing_avg_price`) as avgprice,SUM(`field_program_housing_not4closed`) as foreclosure FROM `housing_community_development` hcd LEFT JOIN census_report cr ON hcd.field_parent_census = cr.report_id WHERE cr.field_year NOT IN (2010) GROUP BY cr.field_year ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Select tab statuses
	 * 
	 * 
	 * @return array
	 */	
	public function select_tab_statuses($report_id)
	{

		$sql = "SELECT sa.field_tab_status as serviceareas,
		        com.field_tab_status as community,
						emp.field_tab_status as employees,
						rev.field_tab_status as revenue,
						ex.field_tab_status as expenditure,
						edu.field_tab_status as education_program,
						entre.field_tab_status as entrepreneurship_program,
						hea.field_tab_status as health_quality,
						hou.field_tab_status as housing,
						wrk.field_tab_status as workforce,
						oth.field_tab_status as other_programs,
						covid.field_tab_status as covid,
						civ.field_tab_status as civic,
						em.field_tab_status as emergency_relief,
						cont.field_tab_status as contact_data,
						empow.field_tab_status as empowerment,
						vol.field_tab_status as volunteer
						-- cov.field_tab_status as covid
						
						FROM census_report cr 
						LEFT JOIN service_areas_main sa ON sa.field_parent_census = cr.report_id
						LEFT JOIN community_relations com ON com.field_parent_census = cr.report_id
						LEFT JOIN employees_board_members emp ON emp.field_parent_census = cr.report_id
						LEFT JOIN revenue rev ON rev.field_parent_census = cr.report_id
						LEFT JOIN expenditures ex ON ex.field_parent_census = cr.report_id
						LEFT JOIN education_program edu ON edu.field_parent_census = cr.report_id
						LEFT JOIN entrepreneurship_program entre ON entre.field_parent_census = cr.report_id
						LEFT JOIN health_quality_program hea ON hea.field_parent_census = cr.report_id
						LEFT JOIN housing_community_development hou ON hou.field_parent_census = cr.report_id
						LEFT JOIN workforce_develop_program wrk ON wrk.field_parent_census = cr.report_id
						LEFT JOIN other_programs oth ON oth.field_parent_census = cr.report_id
						LEFT JOIN covid_impact covid ON covid.field_parent_census = cr.report_id
						LEFT JOIN civic_engagement civ ON civ.field_parent_census = cr.report_id
						LEFT JOIN emergency_relief em ON em.field_parent_census = cr.report_id
						LEFT JOIN contact_data cont ON cont.field_parent_census = cr.report_id
						LEFT JOIN empowerment empow ON empow.field_parent_census = cr.report_id
						LEFT JOIN volunteers_members vol ON vol.field_parent_census = cr.report_id
						-- LEFT JOIN covid_impact cov ON cov.field_parent_census = cr.report_id
						WHERE cr.report_id = ? ";

		$query = $this->db->query($sql,[$report_id]);
		$result =  $query->row();
		return $result;		
		
	}

	/**
	 * Get revenue venture data
	 * @param  int $revenue_id
	 * @return array
	 */
	public function venture($revenue_id)
	{
		$this->db->select('*');
		$this->db->from('revenue_ventures rev_ven');
		$this->db->join('venture_type typ', 'rev_ven.field_budget_venture_type = typ.id', 'left');
    	$this->db->where('rev_ven.revenue_id', $revenue_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Cumulative Entrepreneurship Report
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_entrepreneurship_report_all()
	{
		$sql = "SELECT cr.field_year as year,SUM(`field_program_entpr_total_partic`) as total,SUM(`field_program_entpr_new`) as business,SUM(`field_program_entpr_sales`) as sales,SUM(`field_program_entpr_total_sales`) as valueall FROM `entrepreneurship_program` ep LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id WHERE cr.field_year NOT IN (2009) GROUP BY cr.field_year ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Cumulative Entrepreneurship Report with affiliates
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_entrepreneurship_report_aff()
	{
		$sql = "SELECT cr.field_year as year,SUM(ep.`field_program_entpr_total_partic`) as total,SUM(ep.`field_program_entpr_new`) as business,SUM(ep.`field_program_entpr_sales`) as sales,SUM(ep.`field_program_entpr_total_sales`) as valueall FROM `entrepreneurship_program` ep LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value WHERE cr.field_affiliate_select IN (26,30,36,2,38,8,9,5,14,6,68,15,87) GROUP BY cr.field_year ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 *Entrepreneurship Center with NUL
	 * 
	 * 
	 * @return array
	 */	
	public function entrepreneurship_center_report_nul($year)
	{
		$sql = "SELECT 
				af.organization as org, 
				af.field_affiliate_select_value as org_id,
				cr.field_year as year, 
				cr.report_id as report_id,
				ep.`field_program_entpr_total_partic` as tot, 
				ep.`field_program_entpr_new` as new, 
				ep.`field_program_entpr_sales` as totsale, 
				ep.`field_program_entpr_total_sales` as valofsale 
				FROM `entrepreneurship_program` ep 
				LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value  
				WHERE cr.field_affiliate_select IN (26,30,36,2,38,8,9,5,14,6,68,15,87)"; 
		$flag=1;
		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
		}

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 *Entrepreneurship Center without NUL
	 * 
	 * 
	 * @return array
	 */	
	public function entrepreneurship_center_report_no_nul($year)
	{
		$sql = "SELECT 
				af.organization as org, 
				af.field_affiliate_select_value as org_id,
				cr.field_year as year, 
				cr.report_id as report_id,
				ep.`field_program_entpr_total_partic` as tot, 
				ep.`field_program_entpr_new` as new, 
				ep.`field_program_entpr_sales` as totsale, 
				ep.`field_program_entpr_total_sales` as valofsale 
				FROM `entrepreneurship_program` ep 
				LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value  
				WHERE cr.field_affiliate_select NOT IN (26,30,36,2,38,8,9,5,14,6,68,15,87)"; 
		$flag=1;
		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
		}

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Cumulative Entrepreneurship Report without affiliates
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_entrepreneurship_report_aff_wo()
	{
		$sql = "SELECT cr.field_year as year,SUM(ep.`field_program_entpr_total_partic`) as total,SUM(ep.`field_program_entpr_new`) as business,SUM(ep.`field_program_entpr_sales`) as sales,SUM(ep.`field_program_entpr_total_sales`) as valueall FROM `entrepreneurship_program` ep LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value WHERE cr.field_affiliate_select NOT IN (26,30,36,2,38,8,9,5,14,6,68,15,87) GROUP BY cr.field_year ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	
	
	/**
	 * Affiliate Education Query Report
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_education_query_report($year,$affiliate)
	{
		$sql = "SELECT 
				af.organization as org,
				cr.report_id as report_id,
				cr.field_year as year,
				ep.`field_program_ed_total_participa` as total,
				ep.`field_program_ed_promoted` as promo,
				`field_program_ed_graduated` as grad,
				`field_program_ed_college_app` as clapp,
				`field_program_ed_scholar_total` as scholar,
				`field_program_ed_scholar_avg` as avg 
				FROM `education_program` ep 
				LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$flag=0;
		if($affiliate!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
			$flag =1;
		}

		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
			$flag =1;
		}	

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	/**
	 * Affiliate Health Query Report
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_health_query_report($year,$affiliate)
	{
		$sql = "SELECT 
				af.organization as org,
				cr.report_id as report_id,
				cr.field_year as year,
				hqp.`field_program_health_total_parti` as tot,
				hqp.`field_program_health_participant` as cse,
				hqp.`field_program_health_enrolled` as enrol,
				hqp.`field_program_health_assisted` as assisted 
				FROM `health_quality_program` hqp 
				LEFT JOIN census_report cr ON hqp.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value "; 

		$flag=0;
		if($affiliate!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
			$flag =1;
		}

		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
			$flag =1;
		}	

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	/**
	 * Affiliate Housing Query Report
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_housing_query_report($year,$affiliate)
	{
		$sql = "SELECT 
				af.organization as org,
				af.field_affiliate_select_value as org_id,
				cr.report_id as report_id,
				cr.field_year as year,
				hcd.`field_program_housing_total_part` as tot,
				hcd.`field_program_housing_attended` as att,
				hcd.`field_program_housing_purchased` purchase,
				hcd.`field_program_housing_avg_price` as avgprice,
				hcd.`field_program_housing_not4closed` as closed 
				FROM `housing_community_development` hcd 
				LEFT JOIN census_report cr ON hcd.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$flag=0;	
		if($affiliate!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
			$flag =1;
		}
		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
			$flag =1;
		}	

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	/**
	 * Cumulative Workforce Development Report
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_workforce_development_report()
	{
		$sql = "SELECT cr.field_year as year,SUM(wdp.`field_program_work_counseling`) as coun,SUM(wdp.`field_program_work_participants`) as empl_wrk,SUM(wdp.`field_program_work_placed`) as placed,AVG(wdp.`field_program_work_salary`) as annsal,AVG(wdp.`field_program_work_hourly`) as hour_rate,SUM(wdp.`field_program_work_welfare`) as wel_prt,SUM(wdp.`field_program_work_welfare_place`) as wel_placed,AVG(wdp.`field_program_work_welfare_salar`) as wel_sal,AVG(wdp.`field_program_work_welfare_hour`) as wel_hour FROM `workforce_develop_program` wdp LEFT JOIN census_report cr ON wdp.field_parent_census = cr.report_id GROUP BY cr.field_year ORDER BY cr.field_year DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Cumulative Workforce Development Report Filter
	 * 
	 * 
	 * @return array
	 */	
	public function cumulative_workforce_development_report_filter($affiliate)
	{
		$sql = "SELECT 
				cr.field_year as year,
				SUM(wdp.`field_program_work_counseling`) as coun,
				SUM(wdp.`field_program_work_participants`) as empl_wrk,
				SUM(wdp.`field_program_work_placed`) as placed,
				AVG(wdp.`field_program_work_salary`) as annsal,
				AVG(wdp.`field_program_work_hourly`) as hour_rate,
				SUM(wdp.`field_program_work_welfare`) as wel_prt,
				SUM(wdp.`field_program_work_welfare_place`) as wel_placed,
				AVG(wdp.`field_program_work_welfare_salar`) as wel_sal,
				AVG(wdp.`field_program_work_welfare_hour`) as wel_hour 
				FROM `workforce_develop_program` wdp 
				LEFT JOIN census_report cr ON wdp.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";

		$flag=0;
		if($affiliate!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
			$flag =1;
		}	

		$sql .= " GROUP BY cr.field_year ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Census Affiliate Workforce Query Report
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_workforce_query_report($year,$affiliate)
	{
		$sql = "SELECT 
				af.organization as org,
				af.field_affiliate_select_value as org_id,
				cr.report_id as report_id,
				cr.field_year as year, 
				wdp.`field_program_work_counseling` as coun, 
				wdp.`field_program_work_participants` as empl_wrk, 
				wdp.`field_program_work_placed` as placed, 
				wdp.`field_program_work_salary` as annsal, 
				wdp.`field_program_work_hourly` as hour_rate, 
				wdp.`field_program_work_welfare` as wel_prt, 
				wdp.`field_program_work_welfare_place` as wel_placed, 
				wdp.`field_program_work_welfare_salar` as wel_sal, 
				wdp.`field_program_work_welfare_hour` as wel_hour 
				FROM `workforce_develop_program` wdp 
				LEFT JOIN census_report cr ON wdp.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value "; 
		$flag=0;
		if($affiliate!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
			$flag =1;
		}

		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
			$flag =1;
		}	

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Census Affiliate Workforce Query Report Filter
	 * 
	 * 
	 * @return array
	 */	
	// public function affiliate_workforce_query_report_filter($year,$affiliate)
	// {
	// 	$sql = "SELECT 
	// 	af.organization as org,
	// 	cr.field_year as year, 
	// 	wdp.`field_program_work_counseling` as coun, 
	// 	wdp.`field_program_work_participants` as empl_wrk, 
	// 	wdp.`field_program_work_placed` as placed, 
	// 	wdp.`field_program_work_salary` as annsal, 
	// 	wdp.`field_program_work_hourly` as hour_rate, 
	// 	wdp.`field_program_work_welfare` as wel_prt, 
	// 	wdp.`field_program_work_welfare_place` as wel_placed, 
	// 	wdp.`field_program_work_welfare_salar` as wel_sal, 
	// 	wdp.`field_program_work_welfare_hour` as wel_hour 
	// 	FROM `workforce_develop_program` wdp 
	// 	LEFT JOIN census_report cr ON wdp.field_parent_census = cr.report_id 
	// 	LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";

	// 	$flag=0;
	// 	if($affiliate!='')
	// 	{
	// 		$sql .= ($flag == 0) ? "WHERE " : " AND ";
	// 		$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
	// 		$flag =1;
	// 	}

	// 	if(isset($year))
	// 	{
	// 		$sql .= ($flag == 0) ? "WHERE " : " AND ";
	// 		$sql .= "  `cr`.`field_year`=".$year;
	// 		$flag =1;
	// 	}	

	// 	$sql .= " ORDER BY cr.field_year DESC ";
	// 	$query = $this->db->query($sql);
	// 	$result =  $query->result_array();
	// 	return $result;		
	// }

	/**
	 * Census Affiliate Entrepreneurship Query Report
	 * 
	 * 
	 * @return array
	 */	
	public function affiliate_entrepreneurship_query_report($year,$affiliate)
	{
		$sql = "SELECT 
				af.organization as org, 
				af.field_affiliate_select_value as org_id,
				cr.report_id as report_id,
				cr.field_year as year, 
				ep.`field_program_entpr_total_partic` as tot, 
				ep.`field_program_entpr_new` as new, 
				ep.`field_program_entpr_sales` as totsale, 
				ep.`field_program_entpr_total_sales` as valofsale 
				FROM `entrepreneurship_program` ep 
				LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value "; 
		$flag=0;	
		if($affiliate!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
			$flag =1;
		}
		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
			$flag =1;
		}	

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * NUL Census Total Contacts Breakdown
	 * 
	 * 
	 * @return array
	 */	
	public function nul_census_total_contacts_breakdown($filters)
	{
		$sql = "SELECT 
				cr.field_year as year,
				af.organization as org,
				cr.report_id,
				COALESCE((field_public_total_male),0) + COALESCE((field_public_total_female),0) AS public,
				COALESCE((field_direct_total_male),0) + COALESCE((field_direct_total_female),0) AS direct, 
				COALESCE((field_indirect_contact_served),0) AS indirect, 
				COALESCE((field_public_total_male),0) + COALESCE((field_public_total_female),0) + COALESCE((field_direct_total_male),0) + COALESCE((field_direct_total_female),0) + COALESCE((field_indirect_contact_served),0) AS net 
				FROM contact_data contact 
				LEFT JOIN census_report cr ON contact.field_parent_census = cr.report_id
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value 
				WHERE cr.field_year=$filters[year] 
				ORDER BY cr.field_year DESC";

		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * NUL Census Total Contacts Breakdown Filter
	 * 
	 * 
	 * @return array
	 */	
	public function nul_census_total_contacts_breakdown_filter($year,$affiliate)
	{
		$sql = "SELECT 
				cr.field_year as year,
				cr.report_id, 
				af.organization as org,
                af.affiliate_id as af_id,
				COALESCE((field_public_total_male),0) + COALESCE((field_public_total_female),0) AS public, 
				COALESCE((field_direct_total_male),0) + COALESCE((field_direct_total_female),0) AS direct, 
				COALESCE((field_indirect_contact_served),0) AS indirect, 
				COALESCE((field_public_total_male),0) + COALESCE((field_public_total_female),0) + COALESCE((field_direct_total_male),0) + COALESCE((field_direct_total_female),0) + COALESCE((field_indirect_contact_served),0) AS net 
				FROM contact_data contact 
				LEFT JOIN census_report cr ON contact.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$flag=0;
		if($affiliate!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`field_affiliate_select_value`=".$affiliate;
			$flag =1;
		}
		
		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
			$flag =1;
		}	
		
		$sql .= " ORDER BY cr.field_year DESC ";

		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * Get drupal affiliate id 
	 * 
	 * 
	 * @return array
	 */		
	public function get_drupal_affiliate_id($affiliate_id)
	{
		$sql = "SELECT * FROM affiliate WHERE affiliate_id = ? ";
		$query = $this->db->query($sql,[$affiliate_id]);
		$result =  $query->row();
		return $result;		
	}

	public function revenue_expenditure_yearly_affiliate_export($where = NULL)
	{
		
		//$sql = "SELECT * FROM NUL_Census_Financials ";

		$sql = "SELECT af.affiliate_id,nf.censusid,nf.year,nf.affiliate,nf.revenue,nf.expenditures,nf.net,nf.revid,nf.exid,nf.id
						FROM NUL_Census_Financials nf 
	          LEFT JOIN affiliate af ON af.organization = nf.affiliate ";	  


		$flag = 0;
		if(isset($where['year'])){
		$sql .= ($flag == 0) ? "WHERE " : " AND ";
		$sql .= "  year = ". $where['year'] ;
		$flag = 1;
	  }

		if(isset($where['affiliate'])){
		$sql .= ($flag == 0) ? "WHERE " : " AND ";	
		$sql .= "  af.affiliate_id = '". $where['affiliate']."'" ;
		$flag = 1;
		}
		$sql .= " ORDER BY year ASC ";

		$query = $this->db->query($sql);
    $result =  $query->result_array();
		return $result;		

	}

	public function affiliate_keyfund_query_export($where = NULL)
	{
		
		$sql = "SELECT rv.field_revenue_total_budget,rv.field_revenue_nul, rv.field_revenue_united_way,rv.field_revenue_federal,
		        rv.field_revenue_state_local,af.organization,af.affiliate_id,cr.field_year
	          FROM revenue rv 
	          JOIN census_report cr ON rv.field_parent_census = cr.report_id 
						JOIN expenditures ex ON ex.field_parent_census = cr.report_id 
						JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value";

	  $flag = 0;
		if(isset($where['year'])){
		$sql .= ($flag == 0) ? " WHERE " : " AND ";
		$sql .= "  cr.field_year = ". $where['year'];
		$flag = 1;
	  }

		if(isset($where['affiliate'])){
		$sql .= ($flag == 0) ? " WHERE " : " AND ";	
		$sql .= "  af.affiliate_id = ". $where['affiliate'] ;
		$flag = 1;
		}

		$query = $this->db->query($sql);
    $result =  $query->result_array();
		return $result;

	}
	
	public function affiliate_people_history_exports($params=NULL)
	{
		$sql = "SELECT af.organization,af.affiliate_id as org_id,cr.field_year,cr.report_id, (field_public_total_male + field_public_total_female) AS public,
						(field_direct_total_male + field_direct_total_female) AS direct,
						field_indirect_contact_served AS indirect, 
						(field_public_total_male + field_public_total_female + field_direct_total_male + 
						field_direct_total_female + field_indirect_contact_served) AS net
						FROM 
		        contact_data contact
	          LEFT JOIN census_report cr ON contact.field_parent_census = cr.report_id
						LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";

		$flag=0;
		if(isset($params['affiliate']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`affiliate_id`=".$params['affiliate'];
			$flag =1;
		}

		$sql .= "
						 ORDER BY cr.field_year DESC, af.organization DESC"; 
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	public function affiliate_entrepreneurship_history($params=NULL)
	{
		$sql = "SELECT af.organization as org, cr.field_year as year, ep.`field_program_entpr_total_partic` as tot, ep.`field_program_entpr_new` as new, ep.`field_program_entpr_sales` as totsale, ep.`field_program_entpr_total_sales` as valofsale FROM `entrepreneurship_program` ep LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value WHERE cr.field_year=2018"; 
		

		
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	

	public function affiliate_civic_export($filters=NULL)
	{

		$sql =  "SELECT af.organization,af.city,af.affiliate_id AS affiliate,st.state,cr.field_year,cr.report_id, civic.field_voter_total AS voter,
		         if(civic.field_voter_registration, 'Yes', 'No') AS voter_reg,
						 civic.field_forums_total  AS community,
						 civic.field_crja_total AS racial,
						 civic.field_police_total AS police,
						 civic.field_advocacy_total AS adv
						 FROM 
		         civic_engagement civic
	           LEFT JOIN census_report cr ON civic.field_parent_census = cr.report_id
						 LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value 
						 LEFT JOIN `state` st ON st.stateid = af.state ";
		$flag=0;
		 if(isset($filters['year']))
		 {
		 	$sql .= ($flag == 0) ? "WHERE " : " AND ";
		 	$sql .= "  `cr`.`field_year`=".$filters['year'];
		 	$flag =1;
		 }

		 if(isset($filters['affiliate']))
		 {
			 $sql .= ($flag == 0) ? "WHERE " : " AND ";
			 $sql .= "  `af`.`affiliate_id`=".$filters['affiliate'];
			 $flag =1;
		 }

		$query = $this->db->query($sql);
		$result =  $query->result_array();
	
		return $result;		
	}

	public function entrepreneurship_centers_reports($year)
	{
		$sql = "SELECT 
				af.organization as org, 
				af.field_affiliate_select_value as org_id,
				cr.field_year as year, 
				ep.`field_program_entpr_total_partic` as tot, 
				ep.`field_program_entpr_new` as new, 
				ep.`field_program_entpr_sales` as totsale, 
				ep.`field_program_entpr_total_sales` as valofsale 
				FROM `entrepreneurship_program` ep 
				LEFT JOIN census_report cr ON ep.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value "; 
		$flag=0;
		if(isset($year))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$year;
			$flag =1;
		}	

		$sql .= " ORDER BY cr.field_year DESC ";
		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}

	/**
	 * NUL Census Total Contacts Breakdown export
	 * 
	 * 
	 * @return array
	 */	
	
	public function nul_census_total_contacts_breakdown_export($filters)
	{
		$sql = "SELECT 
				cr.field_year as year,
				cr.report_id, 
				af.organization as org, 
				COALESCE((field_public_total_male),0) + COALESCE((field_public_total_female),0) AS public, 
				COALESCE((field_direct_total_male),0) + COALESCE((field_direct_total_female),0) AS direct, 
				COALESCE((field_indirect_contact_served),0) AS indirect, 
				COALESCE((field_public_total_male),0) + COALESCE((field_public_total_female),0) + COALESCE((field_direct_total_male),0) + COALESCE((field_direct_total_female),0) + COALESCE((field_indirect_contact_served),0) AS net 
				FROM contact_data contact 
				LEFT JOIN census_report cr ON contact.field_parent_census = cr.report_id 
				LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$flag=0;
		if($filters['affiliate']!='')
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `af`.`affiliate_id`=".$filters['affiliate'];
			$flag =1;
		}
		
		if(isset($filters['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$filters['year'];
			$flag =1;
		}	
		
		$sql .= " ORDER BY cr.field_year DESC ";

		$query = $this->db->query($sql);
		$result =  $query->result_array();
		return $result;		
	}	
	
	/**
	 * Get covid data
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	
	public function covid_data_fetch($report_id)
	{
		$this->db->select('er.*,ts.status,cr.field_year,af.organization,af.city,af.state,');
		$this->db->from('covid_impact er');
		$this->db->join('census_report cr', 'cr.report_id = er.field_parent_census');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select', 'left');
		$this->db->join('census_tab_statuses ts', 'ts.status_id = er.field_tab_status');
    	$this->db->where('er.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}	

    /**
	 * Get entrepreneurship buisinesss data
	 * @param  int $entrepreneurship_id
	 * @return array
	 */
	public function buisiness($entrepre_id)
	{
		$this->db->select('* , ent_pro_bui.id as entre_id');
		$this->db->from('entrepreneurship_program_business ent_pro_bui');
		$this->db->join('type_of_business typ', 'ent_pro_bui.field_business_type_tid = typ.id', 'left');
    	$this->db->where('ent_pro_bui.entrepreneurship_id', $entrepre_id);
		$query = $this->db->get();
		return $query->result_array();
	}

    /**
	 * Get affiliate and ceo data
	 * @return array
	 */
	public function affiliates_and_ceo_s()
	{
		$this->db->select('* , aff.organization as affiliate,st.state as state');
		$this->db->from('users us');
		$this->db->join('affiliate aff', 'us.affiliate_id = aff.affiliate_id', 'left');
		$this->db->join('state st', 'aff.state = st.stateid', 'left');
		$this->db->like('us.user_title','President/CEO');
		//$this->db->or_like('us.user_title','President');
    	//$this->db->where('ent_pro_bui.entrepreneurship_id', $entrepre_id);
		$query = $this->db->get();
		return $query->result_array();
	}

}
