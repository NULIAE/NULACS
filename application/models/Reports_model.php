<?php
/**
 * Affiliate_model
 */
class Reports_model extends CI_Model 
{	
    /**
     * Get the affiliates submitted key indicators
     *  *
	 * @param  array $where
	 * @return int
     */
    public function get_all_affiliates(){
        $this->db->select('CONCAT(affiliate.city, '.', state.stateabbreviation) AS name, key_indicators.affiliate_id as affiliate_id');
        $this->db->from('key_indicators');
        $this->db->join('affiliate', 'affiliate.affiliate_id = key_indicators.affiliate_id');
        $this->db->join('state', 'state.stateid = affiliate.state');
        
        $this->db->group_by('affiliate.affiliate_id'); 
        
        $query = $this->db->get();
		return  $query->result_array();

    }

    /**
     * Get the  key indicators value
     *  *
	 * @param  array $where
	 * @return int
     */
    public function get_key_indicators($affiliate, $year){
        $this->db->select('*, CONCAT(affiliate.city, '.', state.stateabbreviation) AS name, key_indicators.affiliate_id as affiliate_id');
        $this->db->from('key_indicators');
        $this->db->join('affiliate', 'affiliate.affiliate_id = key_indicators.affiliate_id');
        $this->db->join('state', 'state.stateid = affiliate.state');
        if($affiliate){
            $this->db->where('key_indicators.quarter', $affiliate);
        }
        if($year){
            $this->db->where('key_indicators.year', $year);
        }
        $this->db->group_by('affiliate.affiliate_id'); 
        
        $query = $this->db->get();
		return  $query->result_array();

    }

    /**
     * Get the  key indicators value
     *  *
	 * @param  array $where
	 * @return int
     */
    public function get_kpi_report($affiliate, $year){
        $this->db->select('*, CONCAT(affiliate.city, '.', state.stateabbreviation) AS name, key_indicators.affiliate_id as affiliate_id');
        $this->db->from('key_indicators');
        $this->db->join('affiliate', 'affiliate.affiliate_id = key_indicators.affiliate_id');
        $this->db->join('state', 'state.stateid = affiliate.state');
        if($affiliate){
            $this->db->where('key_indicators.affiliate_id', $affiliate);
        }
        if($year){
            $this->db->where('key_indicators.year', $year);
        }
        $this->db->group_by('affiliate.affiliate_id'); 
        
        $query = $this->db->get();
		return  $query->result_array();
	}
	
	/**
	 * Detail report of affiliate key indicator
	 * list
	 */
	public function get_ind_affiliate_report($affiliate){
		if($affiliate){
			$this->db->select('*');
			$this->db->from('key_indicators');
			$this->db->where('key_indicators.affiliate_id', $affiliate);
			// $this->db->group_by('key_indicators.year'); 
			$this->db->order_by("quarter", "asc");
			$query = $this->db->get();
			return  $query->result_array();
		}	
	}

	/**
	 * Detail report of affiliate key indicator year
	 * list
	 */
	public function get_ind_affiliate_yr_report($affiliate){
		if($affiliate){
			$this->db->select('year');
			$this->db->from('key_indicators');
			$this->db->where('key_indicators.affiliate_id', $affiliate);
			$this->db->group_by('key_indicators.year'); 
			$query = $this->db->get();
			return  $query->result_array();
		}		
	}

    

	/**
	 * Get the count of all affiliate using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function get_affiliate_count($where = NULL) 
	{
		if( $where !== NULL)
		{
			$this->db->where($where);
		}

        return $this->db->count_all_results('affiliate');
	}
	
	/**
	 * Get all affiliates and sort them using conditions
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $where
	 * @return void
	 */
	// public function get_all_affiliates($limit = NULL, $start = NULL, $where = NULL, $isYearNeeded = FALSE)
	// {
	// 	$this->db->select('*, region.name AS region');
	// 	$this->db->from('affiliate');
	// 	$this->db->join('region', 'region.region_id = affiliate.region_id');
	// 	$this->db->join('state', 'state.stateid = affiliate.state');

	// 	if( $isYearNeeded )
	// 	{
	// 		$this->db->join('financial_year', 'financial_year.affiliate_id = affiliate.affiliate_id');
	// 	}

	// 	if( $where !== NULL)
	// 	{
	// 		$this->db->where($where);
	// 	}

	// 	if( ($limit !== NULL) && ($start !== NULL) )
	// 	{
	// 		$this->db->limit($limit, $start);
	// 	}

	// 	$query = $this->db->get();

	// 	$affiliates =  $query->result_array();

	// 	//Fetch users under each affiliate
	// 	foreach( $affiliates as $key => $affiliate )
	// 	{
	// 		$affiliates[$key]['users'] = $this->get_affiliate_users($affiliate['affiliate_id']);
	// 	}

	// 	return $affiliates;
	// }
	
	/**
	 * Get an affiliate details by affiliate_id
	 *
	 * @param  int $affiliate_id
	 * @return array
	 */
	public function get_affiliate_by_id($affiliate_id)
	{
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('financial_year', 'financial_year.affiliate_id = affiliate.affiliate_id');
		$this->db->where('affiliate.affiliate_id', $affiliate_id);
		
		$query = $this->db->get('affiliate');

		return $query->row_array();
	}

	/**
	 * Create new affiliate and return affiliate_id
	 *
	 * @param  array $data
	 * @return `affiliate_id` if added; otherwise return FALSE
	 */
	public function insert($data)
	{
		if( $this->db->insert('affiliate', $data) )
		{
			return $this->db->insert_id();
		}

		return FALSE;
	}
	
	/**
	 * Update existing affiliate
	 *
	 * @param  int $affiliate_id
	 * @param  array $data
	 * @return boolean
	 */
	public function update($data)
	{
		$affiliate_id = $data['affiliate_id'];
		$year_end = $data['year_end'];
		$board_chair = $data['board_chair'];
		$adm_uploader = $data['adm_uploader'];

		unset($data['year_end']);
		unset($data['board_chair']);
		unset($data['adm_uploader']);

		//Update Affiliate details
		$this->db->where('affiliate_id', $affiliate_id);
		$status = $this->db->update('affiliate', $data);

		if ( $status === TRUE )
		{
			$this->db->where('affiliate_id', $affiliate_id);

			if( $this->db->count_all_results('financial_year') )
			{
				//Update financial year for the affiliate
				$this->update_financial_year($affiliate_id, $year_end);
			}
			else
			{
				//Insert financial year for the affiliate
				$this->add_financial_year($affiliate_id, $year_end);
			}

			//Update board chair user
			if( isset($board_chair) && ($board_chair !== "") )
			{
				$this->db->where('user_id', $board_chair);
				$this->db->update('users', array('is_board_chair' => '1'));
			}
			else
			{
				$this->db->where('affiliate_id', $affiliate_id);
				$this->db->update('users', array('is_board_chair' => '0'));
			}
			
			//Update ADM Uploader user
			if( isset($adm_uploader) && ($adm_uploader !== "") )
			{
				$this->db->where('user_id', $adm_uploader);
				$this->db->update('users', array('is_adm_uploader' => '1'));
			}
			else
			{
				$this->db->where('affiliate_id', $affiliate_id);
				$this->db->update('users', array('is_adm_uploader' => '0'));
			}
		}

		return $status;
	}
	
	/**
	 * add_financial_year when creating an affiliate
	 *
	 * @param  int $affiliate_id
	 * @param  date $year_end
	 * @return void
	 */
	public function add_financial_year($affiliate_id, $year_end)
	{
		//Calculate the previous month as `year_start`
		$date_to_time = strtotime($year_end);
		$year_start = date("Y-m-d", strtotime("-1 month", $date_to_time));
		
		$data = array(
			'affiliate_id' => $affiliate_id,
			'year_start'   => $year_start,
			'year_end'   => $year_end,
			'monthly_grace'   => 30,
			'quarterly_grace'   => 30,
			'yearly_grace'   => 30,
		);

		$this->db->insert('financial_year', $data);
	}

	/**
	 * update_financial_year when updating an affiliate
	 *
	 * @param  int $affiliate_id
	 * @param  date $year_end
	 * @return void
	 */
	public function update_financial_year($affiliate_id, $year_end)
	{
		//Calculate the previous month as `year_start`
		$date_to_time = strtotime($year_end);
		$year_start = date("Y-m-d", strtotime("-1 month", $date_to_time));
		
		$data = array(
			'year_start'   => $year_start,
			'year_end'   => $year_end
		);

		$this->db->where('affiliate_id', $affiliate_id);
		$this->db->update('financial_year', $data);
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
	 * Get all users under an affiliate
	 *
	 * @param  int $affiliate_id
	 * @return array
	 */
	public function get_affiliate_users($affiliate_id)
	{
		$this->db->select('user_id, prifix, first_name, last_name, is_board_chair, is_adm_uploader');
		$this->db->where('affiliate_id', $affiliate_id);

		$query = $this->db->get('users');

		return $query->result_array();
	}
	
	/**
	 * get_compliance_status_flags
	 *
	 * @return array
	 */
	public function get_compliance_status_flags()
	{
		$this->db->where('type', 3);

		$query = $this->db->get('status_flags');

		return $query->result_array();
	}
	
	/**
	 * Affiliate filter for dashboard page
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  int $status
	 * @param  string $search
	 * @return array
	 */
	public function home_affiliate_filter($limit = NULL, $start = NULL, $status = NULL, $search = NULL)
	{
		if( $search !== NULL )
		{
			$this->db->select('affiliate.affiliate_id');
			$this->db->from('affiliate');
			$this->db->join('state', 'state.stateid = affiliate.state');
			$this->db->like('city', $search);
			$this->db->or_like('state.state', $search);
			$this->db->or_like('state.stateabbreviation', $search);

			$query = $this->db->get();

			$affiliates = array();

			$result = $query->result_array();

			foreach($result as $res)
			{
				array_push($affiliates, $res['affiliate_id']);
			}
		}

		//Get the last month and year
		$month = date("m", strtotime("-1 month", time()));
		$year = date("Y", strtotime("-1 month", time()));

		$this->db->select('affiliate.affiliate_id,email,phone,city,stateabbreviation as state,month,year,compliance_status,status_flags.name as status_name,icon');
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_monthly cms', 'cms.affiliate_id = affiliate.affiliate_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('status_flags', 'status_flags.id = cms.compliance_status');
		$this->db->where('cms.year', $year);
		$this->db->where('cms.month', $month);

		if( $search !== NULL )
		{
			$this->db->where_in('affiliate.affiliate_id', $affiliates);
		}
		
		if( $status !== NULL )
		{
			$this->db->where('cms.compliance_status', $status);
		}

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get();

		$affiliate_list = $query->result_array();

		foreach($affiliate_list as $key => $row)
		{
			$this->db->select('last_login');
			$this->db->where('affiliate_id', $row['affiliate_id']);
			$this->db->where('last_login !=', NULL);
			$this->db->order_by('last_login', 'DESC');
			$this->db->limit(1);

			$query = $this->db->get('users');

			$last_login = $query->row_array();

			$affiliate_list[$key]['last_login'] = empty($last_login) ? NULL : $last_login['last_login'];
		}

		return $affiliate_list;
	}

	/**
	 * Get the count of all affiliate monthly status using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function monthly_compliance_status_count($where = NULL) 
	{
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_monthly cms', 'cms.affiliate_id = affiliate.affiliate_id');

		if( $where !== NULL )
		{
			$this->db->where($where);
		}

        return $this->db->count_all_results();
	}
	
	
	/**
	 * Get list of affiliates with their monthly compliance status
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $filter
	 * @return void
	 */
	public function monthly_compliance_status($limit = NULL, $start = NULL, $filter = NULL)
	{
		$this->db->select('affiliate.affiliate_id,city,stateabbreviation as state,compliance_status,status_flags.name as status_name,icon');
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_monthly cms', 'cms.affiliate_id = affiliate.affiliate_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('status_flags', 'status_flags.id = cms.compliance_status');
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get();

		return $query->result_array();
	}
	
	/**
	 * Get list of monthly documents of an Affiliate with its compliance status
	 * Other files are omitted
	 * 
	 * @param  int $affiliate_id
	 * @param  array $filter
	 * @return array
	 */
	public function monthly_document_status($affiliate_id, $filter = NULL)
	{
		$this->db->select('mds.monthly_document_id,doc.document_id,doc.document_type_id,document_name,document_month,document_year,monthly_submitted_date,monthly_upload_file,monthly_upload_file_name,monthly_review_status,monthly_compliance_status,sf.name as status_name,sf.icon');
		$this->db->from('documents doc');
		$this->db->join('monthly_document_status mds', 'mds.document_id = doc.document_id', 'left');
		$this->db->join('status_flags sf', 'sf.id = mds.monthly_compliance_status');
		$this->db->where('mds.affiliate_id', $affiliate_id);
		$this->db->where('doc.document_id !=', 6);
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Get the count of all affiliate quarterly status using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function quarterly_compliance_status_count($where = NULL) 
	{
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_quarterly cqs', 'cqs.affiliate_id = affiliate.affiliate_id');

		if( $where !== NULL )
		{
			$this->db->where($where);
		}

        return $this->db->count_all_results();
	}
	
	/**
	 * Get list of affiliates with their quarterly compliance status
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $filter
	 * @return void
	 */
	public function quarterly_compliance_status($limit = NULL, $start = NULL, $filter = NULL)
	{
		$this->db->select('affiliate.affiliate_id,city,stateabbreviation as state,compliance_status,status_flags.name as status_name,icon');
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_quarterly cqs', 'cqs.affiliate_id = affiliate.affiliate_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('status_flags', 'status_flags.id = cqs.compliance_status');
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Get list of quarterly documents of an Affiliate with its compliance status
	 * Other files are omitted
	 * 
	 * @param  int $affiliate_id
	 * @param  array $filter
	 * @return array
	 */
	public function quarterly_document_status($affiliate_id, $filter = NULL)
	{
		$this->db->select('qds.quarterly_id,doc.document_id,doc.document_type_id,document_name,document_month,document_year,quarterly_submitted_date,quarterly_upload_file,quarterly_upload_file_name,quarterly_review_status,quarterly_compliance_status,sf.name as status_name,sf.icon');
		$this->db->from('documents doc');
		$this->db->join('quarterly_document_status qds', 'qds.document_id = doc.document_id', 'left');
		$this->db->join('status_flags sf', 'sf.id = qds.quarterly_compliance_status');
		$this->db->where('qds.affiliate_id', $affiliate_id);
		$this->db->where('doc.document_id !=', 8);
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Get the count of all affiliate yearly status using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function yearly_compliance_status_count($where = NULL) 
	{
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_yearly cys', 'cys.affiliate_id = affiliate.affiliate_id');

		if( $where !== NULL )
		{
			$this->db->where($where);
		}

        return $this->db->count_all_results();
	}
	
	/**
	 * Get list of affiliates with their yearly compliance status
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $filter
	 * @return void
	 */
	public function yearly_compliance_status($limit = NULL, $start = NULL, $filter = NULL)
	{
		$this->db->select('affiliate.affiliate_id,city,stateabbreviation as state,compliance_status,status_flags.name as status_name,icon');
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_yearly cys', 'cys.affiliate_id = affiliate.affiliate_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('status_flags', 'status_flags.id = cys.compliance_status');
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$this->db->limit($limit, $start);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Get list of yearly documents of an Affiliate with its compliance status
	 * Other files are omitted
	 * 
	 * @param  int $affiliate_id
	 * @param  array $filter
	 * @return array
	 */
	public function yearly_document_status($affiliate_id, $filter = NULL)
	{
		$this->db->select('yds.yearly_d_id,doc.document_id,doc.document_type_id,document_name,document_year,yearly_submitted_date,yearly_upload_file,yearly_upload_file_name,yearly_review_status,yearly_compliance_status,sf.name as status_name,sf.icon');
		$this->db->from('documents doc');
		$this->db->join('yearly_document_status yds', 'yds.document_id = doc.document_id', 'left');
		$this->db->join('status_flags sf', 'sf.id = yds.yearly_compliance_status');
		$this->db->where('yds.affiliate_id', $affiliate_id);
		$this->db->where('doc.document_id !=', 14);
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		$query = $this->db->get();

		return $query->result_array();
	}
	
	/**
	 * Insert or update monthly compliance status of an Affiliate
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function update_monthly_compliance($data)
	{
		$where = array(
			'affiliate_id'=> $data['affiliate_id'],
			'month'=> $data['month'],
			'year'=> $data['year'],
		);

		$this->db->where($where);
		$this->db->from('affiliate_compliance_status_monthly');
		
		if($this->db->count_all_results() == 0)
		{
			$where['compliance_status'] = $data['status'];

			return $this->db->insert('affiliate_compliance_status_monthly', $where);
		}
		else
		{
			$this->db->set('compliance_status', $data['status']);
			$this->db->where($where);

			return $this->db->update('affiliate_compliance_status_monthly');
		}
	}

	/**
	 * Insert or update quarterly compliance status of an Affiliate
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function update_quarterly_compliance($data)
	{
		$where = array(
			'affiliate_id'=> $data['affiliate_id'],
			'quarter'=> ceil($data['month']/3),
			'year'=> $data['year'],
		);

		$this->db->where($where);
		$this->db->from('affiliate_compliance_status_quarterly');
		
		if($this->db->count_all_results() == 0)
		{
			$where['compliance_status'] = $data['status'];

			return $this->db->insert('affiliate_compliance_status_quarterly', $where);
		}
		else
		{
			$this->db->set('compliance_status', $data['status']);
			$this->db->where($where);

			return $this->db->update('affiliate_compliance_status_quarterly');
		}
	}

	/**
	 * Insert or update yearly compliance status of an Affiliate
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function update_yearly_compliance($data)
	{
		$where = array(
			'affiliate_id'=> $data['affiliate_id'],
			'year'=> $data['year'],
		);

		$this->db->where($where);
		$this->db->from('affiliate_compliance_status_yearly');
		
		if($this->db->count_all_results() == 0)
		{
			$where['compliance_status'] = $data['status'];

			return $this->db->insert('affiliate_compliance_status_yearly', $where);
		}
		else
		{
			$this->db->set('compliance_status', $data['status']);
			$this->db->where($where);

			return $this->db->update('affiliate_compliance_status_yearly');
		}
	}

	public function get_self_assessment_documents($affiliate_id)
	{
		$this->db->where('affiliate_id', $affiliate_id);
		$this->db->order_by('self_assessment_id', 'DESC');
		$this->db->limit(10);

		$query = $this->db->get('self_assessment');

		return $query->result_array();
	}

	public function soundness_document_status($affiliate_id, $document_id, $filter = NULL)
	{
		$this->db->select('psd.performance_o_s_id,doc.document_id,doc.document_type_id,document_name,document_year,performance_org_doc_submitted_date,performance_org_doc_upload_file,performance_org_doc_upload_file_name');
		$this->db->from('documents doc');
		$this->db->join('performance_org_sndns_document_status psd', 'psd.document_id = doc.document_id', 'left');
		$this->db->where('psd.affiliate_id', $affiliate_id);
		$this->db->where('psd.document_id', $document_id);
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	public function vitality_document_status($affiliate_id, $document_id, $filter = NULL)
	{
		$this->db->select('pvd.performance_v_id,doc.document_id,doc.document_type_id,document_name,document_year,performance_vitality_submitted_date,performance_vitality_upload_file,performance_vitality_upload_file_name');
		$this->db->from('documents doc');
		$this->db->join('performance_vitality_document_status pvd', 'pvd.document_id = doc.document_id', 'left');
		$this->db->where('pvd.affiliate_id', $affiliate_id);
		$this->db->where('pvd.document_id', $document_id);
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

	public function mission_document_status($affiliate_id, $document_id, $filter = NULL)
	{
		$this->db->select('pim.performance_i_m_id,doc.document_id,doc.document_type_id,document_name,document_year,performance_im_mi_submitted_date,performance_im_mi_upload_file,performance_im_mi_upload_file_name');
		$this->db->from('documents doc');
		$this->db->join('performance_impli_mission_document_status pim', 'pim.document_id = doc.document_id', 'left');
		$this->db->where('pim.affiliate_id', $affiliate_id);
		$this->db->where('pim.document_id', $document_id);
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		$query = $this->db->get();

		return $query->result_array();
    }
    
    

	// public function get_key_indicators($affiliate_id, $quarter, $year)
	// {
	// 	$this->db->where('affiliate_id', $affiliate_id);
	// 	$this->db->where('quarter', $quarter);
	// 	$this->db->where('year', $year);

	// 	$query = $this->db->get('key_indicators');

	// 	$row = $query->row_array();

	// 	if(isset($row)) {
	// 		return array("key_indicators_id" => $row['id'], "key_indicators" => json_decode($row['indicators'], TRUE));
	// 	}

	// 	return NULL;
	// }

	public function save_key_indicators($data)
	{
		$status = FALSE;

		$id = $data['key_id'];
		unset($data['key_id']);
		
		if(isset($id) && $id !== "")
		{
			$this->db->where('id', $id);

			$status = $this->db->update('key_indicators', $data);
		}
		else
		{
			$status = $this->db->insert('key_indicators', $data);

			if($status)
			{
				$id = $this->db->insert_id();
			}
		}

		return ($status === TRUE) ? $id : $status;
	}
	
}
