<?php
/**
 * CensusAffiliate_model
 */
class CensusAffiliate_model extends CI_Model  
{	
	 /**
	 * Get all affiliates for selection box
	 */
	public function get_all_affiliates($id=NULL)
	{

		$sql = "SELECT *, region.name AS region FROM `affiliate` ";
		$sql .= "JOIN region ON region.region_id = affiliate.region_id ";
		$sql .= "JOIN state ON state.stateid = affiliate.state ";
		
		$flag = 0;
		if($id != NULL)
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "   `affiliate`.`field_affiliate_select_value`=".$id;
			$flag = 1;
		}		

		$sql .= " order by  affiliate.organization asc ";

		$query = $this->db->query($sql);
		$affiliates =  $query->result_array();
		return $affiliates;

	}

	/**
	 * Get the report titles
	 */

	public function get_titles() 
	{
		$this->db->select('*');
		$query = $this->db->get('report_title');
		return $query->result_array();
	}

	/**
	 * Filter Affiliate report for census_affiliate page
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  int $status
	 * @param  string $search
	 * @return array
	 */
	public function affiliate_report_filter($limit = NULL, $start = NULL, $search)
	{
		$sql = "SELECT cr.report_id,cr.field_year, cs.status,af.organization from census_report cr";
		$sql .= " JOIN census_statuses cs ON cs.status_id = cr.field_census_status ";
		$sql .= "  JOIN affiliate af  ON af.field_affiliate_select_value = cr.field_affiliate_select ";

		$flag=0;
		if(isset($search['field_year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$search['field_year'];
			$flag =1;
		}
		

		if(isset($search['field_census_status']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "   `cr`.`field_census_status`=".$search['field_census_status'];
			$flag = 1;
		}

		if(isset($search['field_affiliate_select']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_affiliate_select`=".$search['field_affiliate_select'];
			$flag = 1;
		}
        
		$sql .= " ORDER BY af.organization ASC,cr.field_year DESC";

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$sql .= " LIMIT $limit OFFSET $start";
		}
		//print $sql;
		$query = $this->db->query($sql);

		$report_list = $query->result_array();
		return $report_list;
	}


	/**
	 * Get the count of all affiliate report using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function get_report_count($where = NULL) 
	{

		$sql = "SELECT * FROM `census_report` as cr ";
		$sql .= " JOIN census_statuses cs ON cs.status_id = cr.field_census_status ";
		$sql .= "  JOIN affiliate af  ON af.field_affiliate_select_value = cr.field_affiliate_select ";

		$flag=0;
		if(isset($where['field_year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$where['field_year'];
			$flag =1;
		}

		if(isset($where['field_census_status']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "   `cr`.`field_census_status`=".$where['field_census_status'];
			$flag = 1;
		}

		if(isset($where['field_affiliate_select']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_affiliate_select`=".$where['field_affiliate_select'];
			$flag = 1;
		}
		
		$query = $this->db->query($sql);

		return $query->num_rows();
	}


	/**
	 * get_all_states
	 *
	 * @return array
	 */
	public function get_all_states()
	{
		$query = $this->db->get('state');

		return $query->result_array();
	}



	/**
	 * Get the count of all affiliate report using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function get_affiliateindex_count($where = NULL) 
	{

		$sql = "SELECT af.affiliate_id,af.organization, cr.field_city as city,cr.field_state_province as `state` from census_report cr";
		$sql .= " JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";


		$flag=0;
		if(isset($where['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$where['year'];
			$flag =1;
		}

		if(isset($where['state']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_state_province`= '".$where['state']."'";
			$flag =1;
		}
	
		
		$sql .= " ORDER BY af.organization ASC";
		
		//print $sql;
		$query = $this->db->query($sql);

		return $query->num_rows();
	}

	/**
	 * Filter Affiliate report for census_affiliate page
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  int $status
	 * @param  string $search
	 * @return array
	 */
	/*#########
	CHANGE affiliate_id WITH CORRESPONDING DRUPAL ID
	###########*/
	public function affiliateindex_report_filter($limit = NULL, $start = NULL, $search)
	{
		$sql = "SELECT af.affiliate_id,af.organization, cr.field_year, cr.field_city as city,cr.field_state_province as `state` from census_report cr";
		$sql .= " LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";


		$flag=0;
		if(isset($search['year']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_year`=".$search['year'];
			$flag =1;
		}

		if(isset($search['state']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "  `cr`.`field_state_province`= '".$search['state']."'";
			$flag =1;
		}
		

		// if(isset($search['field_census_status']))
		// {
		// 	$sql .= ($flag == 0) ? "WHERE " : " AND ";
		// 	$sql .= "   `cr`.`field_census_status`=".$search['field_census_status'];
		// 	$flag = 1;
		// }

		// if(isset($search['field_affiliate_select']))
		// {
		// 	$sql .= ($flag == 0) ? "WHERE " : " AND ";
		// 	$sql .= "  `cr`.`field_affiliate_select`=".$search['field_affiliate_select'];
		// 	$flag = 1;
		// }
		
		$sql .= " ORDER BY af.organization ASC";

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$sql .= " LIMIT $limit OFFSET $start";
		}

		
		//print $sql;
		$query = $this->db->query($sql);

		$report_list = $query->result_array();
		return $report_list;
	}
	/**
	 * get_all_parent_census
	 *
	 * @return array
	 */
	public function get_all_parent_census()
	{
		$sql = "SELECT af.organization, cr.field_year, cr.report_id FROM census_report cr ";
		$sql .= "JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$sql .= " order by cr.field_year,cr.report_id asc";

		$query = $this->db->query($sql);
		$parent_census =  $query->result_array();
		return $parent_census;
	}
	/**
	 * get_all_business_type
	 *
	 * @return array
	 */
	public function get_all_business_type()
	{
		$this->db->select('*');
		$query = $this->db->get('type_of_business');
		return $query->result_array();
	}

	/**
	 * Get the funding_sectors
	*/
	public function funding_sectors() 
	{
		$this->db->select('*');
		$this->db->order_by("name", "asc");
		$query = $this->db->get('funding_sectors');
		return $query->result_array();
	}

	/**
	 * Target Group(s) Served by pk_id
	 * 
	 * @param  int $pk_id
	 * 
	 */
	public function get_target_groups_served_by_program($pk_id)
	{
		$sql  = " SELECT tgs.`tid`,tgs.`name` FROM `target_groups_served` tgs INNER JOIN `programs_target_groups_served` ptgs ON ptgs.target_group_id=tgs.tid ";
		$sql .= " WHERE ptgs.programs_id = ? ";
		$query = $this->db->query($sql,$pk_id);
		$result =  $query->result_array();
		return $result;

	}

	/**
	 * Get the funding_vehicles
	*/
	public function funding_vehicles() 
	{
		$this->db->select('*');
		$this->db->order_by("name", "asc");
		$query = $this->db->get('funding_vehicles');
		return $query->result_array();
	}

	/**
	 * Get the funding_organizations
	*/
	public function funding_organizations() 
	{
		$this->db->select('*');
		$this->db->order_by("name", "asc");
		$query = $this->db->get('funding_organizations');
		return $query->result_array();
	}

	/**
	 * Get the services_provided
	*/
	public function services_provided() 
	{
		$this->db->select('*');
		$this->db->order_by("name", "asc");
		$query = $this->db->get('services_provided');
		return $query->result_array();
	}
	/**
	 * Get the program_type
	*/
	public function program_type() 
	{
		$this->db->select('*');
		$this->db->order_by("name", "asc");
		$query = $this->db->get('program_type');
		return $query->result_array();
	}

	/**
	 * Get community_relation_method_ad_market
	 * 
	 * @param  int $community_relation_id
	 * @return array
	 */
	public function get_community_relation_method_ad_market($community_relation_id)
	{
		$this->db->select('comrel.field_method_of_ad_marketing');
		$this->db->from('community_relation_method_ad_market comrel');
    	$this->db->where('comrel.community_relation_id', $community_relation_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get get_expenditure_own_rent
	 * 
	 * @param  int $report_id
	 * @return array
	 */
	public function get_expenditure_own_rent($report_id)
	{
		$this->db->select('expown.field_own_or_rent');
		$this->db->from('expenditure_own_rent expown');
		$this->db->join('expenditures exp', 'exp.pk_id = expown.fk_expenditure_id');
    	$this->db->where('expown.fk_expenditure_id', $report_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get get_programs
	 * 
	 * @param  int $field_parent_census
	 * @return array
	 */
	public function get_programs($field_parent_census,$field_program_area_tid)
	{
		$this->db->select('p.*');
		$this->db->from('programs p');
    	$this->db->where('p.field_parent_census', $field_parent_census);
		$this->db->where('p.field_program_area_tid', $field_program_area_tid);
		$this->db->order_by("p.title", "asc");
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get previoous census_report 
	 * 
	 * @param  int $affiliate
	 * @param int $current_year
	 * @return array
	 */
	public function get_previous_report_data($affiliate,$year)
	{

		$sql  = " SELECT cr.*,af.organization FROM census_report cr ";
		$sql .= " LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$sql .= " WHERE cr.field_affiliate_select = ? AND cr.field_year < ? ORDER BY cr.field_year DESC LIMIT 1";
		$query = $this->db->query($sql,[$affiliate,$year]);
		$result =  $query->row();
		return $result;

	}

	/**
	 * census report basic data 
	 * 
	 * @param  int $report_id
	 * 
	 */
	public function report_details($report_id)
	{

		$sql  = " SELECT cr.*,af.organization,af.affiliate_id FROM census_report cr ";
		$sql .= " LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$sql .= " WHERE cr.report_id = ? ";
		$query = $this->db->query($sql,[$report_id]);
		$result =  $query->row();
		return $result;

	}
	
	/**
	 * Target Group(s) Served
	 * 
	 * @param  int $report_id
	 * 
	 */
	public function get_target_groups_served($prg_type)
	{

		$sql  = " SELECT * FROM `target_groups_served` tgs ";
		$sql .= " WHERE `type`= ? ";
		$query = $this->db->query($sql,$prg_type);
		$result =  $query->result_array();
		return $result;

	}

	/**
	 * Get get_programs_details
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function get_programs_details($report_id,$pk_id)
	{
		$this->db->select('p.*,af.organization,cr.field_year, pa.name as programarea, pt.name as program_type_name');
		$this->db->from('programs p');
		$this->db->join('census_report cr', 'p.field_parent_census = cr.report_id');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = cr.field_affiliate_select');
		$this->db->join('program_areas pa', 'pa.id = p.field_program_area_tid');
		$this->db->join('program_type pt','p.field_program_types = pt.id', 'left');
		$this->db->where('p.field_parent_census', $report_id);
		$this->db->where('p.pk_id', $pk_id);
		$this->db->order_by("p.title", "asc");
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * get_all_venture_type
	 *
	 * @return array
	 */
	public function get_all_venture_type()
	{
		$this->db->select('*');
		$this->db->order_by("name", "asc");
		$query = $this->db->get('venture_type');
		return $query->result_array();
	}

	/**
	 * Get Funding Source Details by Program
	 * 
	 * @param  int $pk_id
	 * @return array
	 */

	public function get_funding_sources_by_program_id($pk_id)
	{
		$sql = 'SELECT fsou.`program_id`,
				fsou.`field_funding_sector_tid`,
				fsec.name as sector,
				fsou.`field_funding_organization_tid`,
				forg.name as org,
				fsou.`field_funding_vehicle_tid`,
				fveh.name as vehicle,
				fsou.`field_funding_amount_value` as amount
				FROM `funding_source` fsou 
				INNER JOIN `funding_sectors` fsec ON fsec.id=fsou.field_funding_sector_tid
				INNER JOIN `funding_organizations` forg ON forg.id=fsou.field_funding_organization_tid
				INNER JOIN `funding_vehicles` fveh ON fveh.id=fsou.field_funding_vehicle_tid 
				WHERE fsou.`program_id`= ? ';

		$query = $this->db->query($sql,$pk_id);
		$result =  $query->result_array();

		return $result;
	}

	/**
	 * Get Program Service Details by Program
	 * 
	 * @param  int $pk_id
	 * @return array
	 */

	public function get_program_services_by_program_id($pk_id)
	{
		$sql = 'SELECT ps.`program_id`,
				ps.`field_program_service_provided_tid`,
				sp.name as servic,
				ps.`field_program_service_served_value` as people_served,
				ps.`field_program_service_hours_value` as hour,
				ps.`field_program_service_dollars_value` as dollar 
				FROM `program_services` ps 
				INNER JOIN `services_provided` sp ON sp.id=ps.field_program_service_provided_tid 
				WHERE `program_id`= ? ';

		$query = $this->db->query($sql,$pk_id);
		$result =  $query->result_array();

		return $result;
	}

	/**
	 * Get Covid Impact Services
	 * 
	 * @param  int $covid_impact_id
	 * @return array
	 */

	public function get_covid_impact_services($covid_impact_id)
	{
		$this->db->select('cis.field_what_kinds_of_supports');
		$this->db->from('covid_impact_services cis');
    	$this->db->where('cis.covid_impact_id', $covid_impact_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get Covid Impact Services Requested
	 * 
	 * @param  int $covid_impact_id
	 * @return array
	 */

	public function get_covid_impact_services_req($covid_impact_id)
	{
		$this->db->select('cis.services_requested');
		$this->db->from('covid_impact_services_requested cis');
    	$this->db->where('cis.covid_impact_id', $covid_impact_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get Covid Impact Services Provided
	 * 
	 * @param  int $covid_impact_id
	 * @return array
	 */

	public function get_covid_impact_services_prov($covid_impact_id)
	{
		$this->db->select('cis.services_provided');
		$this->db->from('covid_impact_services_provided cis');
    	$this->db->where('cis.covid_impact_id', $covid_impact_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get Covid Impact Services Provided
	 * 
	 * @param  int $covid_impact_id
	 * @return array
	 */

	public function get_covid_impact_participants($covid_impact_id)
	{
		$this->db->select('cip.engage_participants');
		$this->db->from('covid_impact_participants cip');
    	$this->db->where('cip.covid_impact_id', $covid_impact_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get Covid Impact Health Programs
	 * 
	 * @param  int $covid_impact_id
	 * @return array
	 */

	public function get_covid_impact_health_programs($covid_impact_id)
	{
		$this->db->select('cihp.field_what_health_programs');
		$this->db->from('covid_impact_health_pgm cihp');
    	$this->db->where('cihp.covid_impact_id', $covid_impact_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}

	/**
	 * Get Covid Impact Disruptions
	 * 
	 * @param  int $covid_impact_id
	 * @return array
	 */
	
	public function get_covid_impact_disruptions($covid_impact_id)
	{
		$this->db->select('cid.field_were_there_any_disruptions');
		$this->db->from('covid_impact_disruptions cid');
    	$this->db->where('cid.covid_impact_id', $covid_impact_id);
		$query = $this->db->get();
		//echo $this->db->last_query();
		return $query->result_array();
	}
	
	/**
	 * Get Workforce Participants
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function get_all_participants($pk_id)
	{
		$this->db->select('wdp.field_participants_place');
		$this->db->from('workforce_develop_participants wdp');
    	$this->db->where('wdp.pk_id', $pk_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get Workforce Industries
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function get_all_industries($pk_id)
	{
		$this->db->select('wdi.field_industries_work');
		$this->db->from('workforce_develop_industries wdi');
    	$this->db->where('wdi.pk_id', $pk_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get Workforce Incentives
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function get_all_incentives($pk_id)
	{
		$this->db->select('wdi.field_financial_incentives');
		$this->db->from('workforce_develop_incentives wdi');
    	$this->db->where('wdi.pk_id', $pk_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get health Programs Offered
	 * 
	 * @param  int $pk_id
	 * @return array
	 */
	public function get_all_health_prg($pk_id)
	{
		$this->db->select('hqpo.field_health_programs');
		$this->db->from('health_quality_pgm_offered hqpo');
    	$this->db->where('hqpo.pk_id', $pk_id);
		$query = $this->db->get();
		return $query->result_array();
	}
	
	/**
	 * Get  Affiliate Id
	 * 
	 * @param  int $id
	 * 
	 */
	public function get_affiliate_id($id)
	{

		$this->db->select('aff.affiliate_id');
		$this->db->from('affiliate aff');
    	$this->db->where('aff.field_affiliate_select_value', $id);
		$query = $this->db->get();
		return $query->result_array();

	}


}	
