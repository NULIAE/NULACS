<?php
/**
 * Affiliate_model
 */
class Affiliate_model extends CI_Model  
{	
	/**
	 * Get the count of all affiliate using the filters
	 *
	 * @param  array $where
	 * @return int
	 */
	public function get_affiliate_count($where = NULL) 
	{
		$sql = "SELECT * FROM `affiliate` ";

		$flag = 0;

		if(isset($where['affiliate.region_id']))
		{
			$sql .= "WHERE `region_id`=".$where['affiliate.region_id'];

			$flag = 1;
		} 
		
		if(isset($where['affiliate_id']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "`affiliate_id`=".$where['affiliate_id'];

			$flag = 1;
		} 
		
		if(isset($where['affiliate.organization']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "`affiliate_id` IN (SELECT `affiliate_id` FROM `affiliate` WHERE `organization` LIKE '%" .
			$this->db->escape_like_str($where['affiliate.organization'])."%' ESCAPE '!' OR `city` LIKE '%" .
			$this->db->escape_like_str($where['affiliate.organization'])."%' ESCAPE '!')";
		}
		
		$query = $this->db->query($sql);

		return $query->num_rows();
	}
	
	/**
	 * Get all affiliates and sort them using conditions
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $where
	 * @return void
	 */
	public function get_all_affiliates($limit = NULL, $start = NULL, $where = NULL, $isYearNeeded = FALSE)
	{
		$sql = "SELECT *, region.name AS region FROM `affiliate` ";
		$sql .= "JOIN region ON region.region_id = affiliate.region_id ";
		$sql .= "JOIN state ON state.stateid = affiliate.state ";

		if( $isYearNeeded )
		{
			$sql .= "JOIN financial_year ON financial_year.affiliate_id = affiliate.affiliate_id ";
		}

		$flag = 0;

		if(isset($where['affiliate.region_id']))
		{
			$sql .= "WHERE `region`.`region_id`=".$where['affiliate.region_id'];

			$flag = 1;
		}
		
		if(isset($where['affiliate.organization']))
		{
			$sql .= ($flag == 0) ? "WHERE " : " AND ";
			$sql .= "`affiliate`.`affiliate_id` IN (SELECT `affiliate_id` FROM `affiliate` WHERE `organization` LIKE '%" .
			$this->db->escape_like_str($where['affiliate.organization'])."%' ESCAPE '!' OR `city` LIKE '%" .
			$this->db->escape_like_str($where['affiliate.organization'])."%' ESCAPE '!')";
		}

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$sql .= " LIMIT $limit OFFSET $start";
		}
		
		$query = $this->db->query($sql);

		$affiliates =  $query->result_array();

		//Fetch users under each affiliate
		foreach( $affiliates as $key => $affiliate )
		{
			$affiliates[$key]['users'] = $this->get_affiliate_users($affiliate['affiliate_id']);
			$affiliates[$key]['current_compliance_status'] = $this->current_compliance_status($affiliate['affiliate_id']);
			$affiliates[$key]['performance_score'] = $this->get_performance_score($affiliate['affiliate_id']);

			$this->db->select('last_login');
			$this->db->where('affiliate_id', $affiliate['affiliate_id']);
			$this->db->where('last_login !=', NULL);
			$this->db->order_by('last_login', 'DESC');
			$this->db->limit(1);

			$query = $this->db->get('users');

			$last_login = $query->row_array();

			$affiliates[$key]['last_login'] = empty($last_login) ? "NA" : $last_login['last_login'];
		}

		return $affiliates;
	}
	
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
		//$board_chair = isset($data['board_chair']) ? $data['board_chair'] : "";
		$adm_uploader = isset($data['adm_uploader']) ? $data['adm_uploader'] : "";

		unset($data['year_end']);
		//unset($data['board_chair']);
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
			/* if( isset($board_chair) && ($board_chair !== "") )
			{
				$this->db->where('user_id', $board_chair);
				$this->db->update('users', array('is_board_chair' => '1'));
			}
			else
			{
				$this->db->where('affiliate_id', $affiliate_id);
				$this->db->update('users', array('is_board_chair' => '0'));
			} */
			
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
		$this->db->select('user_id, name, prifix, first_name, last_name, is_board_chair, is_adm_uploader, role_description');
		$this->db->join('roles', 'roles.role_id = users.role_id');
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
		$this->db->select('affiliate.affiliate_id,city,stateabbreviation as state');
		$this->db->from('affiliate');
		$this->db->join('state', 'state.stateid = affiliate.state');
		
		if( $search !== NULL )
		{
			$this->db->like('city', $search);
			$this->db->or_like('state.state', $search);
			$this->db->or_like('state.stateabbreviation', $search);
		}

		$query = $this->db->get();

		$affiliate_list = $query->result_array();

		foreach($affiliate_list as $key => $row)
		{
			$affiliate_list[$key]['compliance_status'] = $this->current_compliance_status($row['affiliate_id']);
			$affiliate_list[$key]['performance_score'] = $this->get_performance_score($row['affiliate_id']);

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

		if(isset($where['affiliate'])){
			unset($where['affiliate']);
		}
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
		if(isset($filter['affiliate'])){
			$this->db->where('affiliate.affiliate_id',$filter['affiliate']);
		}
		if( $filter !== NULL )
		{
			unset($filter['affiliate']);
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
	public function monthly_document_status($affiliate_id, $filter = NULL, $exclude_other = FALSE)
	{
		$this->db->select('mds.monthly_document_id,doc.document_id,doc.document_type_id,document_name,document_month,document_year,monthly_submitted_date,monthly_upload_file,monthly_upload_file_name,monthly_review_status,monthly_compliance_status,sf.name as status_name,sf.icon');
		$this->db->from('documents doc');
		$this->db->join('monthly_document_status mds', 'mds.document_id = doc.document_id', 'left');
		$this->db->join('status_flags sf', 'sf.id = mds.monthly_compliance_status');
		$this->db->where('mds.affiliate_id', $affiliate_id);
		
		if($exclude_other)
			$this->db->where('doc.document_id !=', 6);
		
		if( $filter !== NULL )
		{
			unset($filter['affiliate']);
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
			unset($where['affiliate']);
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
		
		if(isset($filter['affiliate'])){
			$this->db->where('affiliate.affiliate_id',$filter['affiliate']);
				unset($filter['affiliate']);
		}
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
	public function quarterly_document_status($affiliate_id, $filter = NULL, $exclude_other = FALSE)
	{
		$this->db->select('qds.quarterly_id,doc.document_id,doc.document_type_id,document_name,document_month,document_year,quarterly_submitted_date,quarterly_upload_file,quarterly_upload_file_name,quarterly_review_status,quarterly_compliance_status,sf.name as status_name,sf.icon');
		$this->db->from('documents doc');
		$this->db->join('quarterly_document_status qds', 'qds.document_id = doc.document_id', 'left');
		$this->db->join('status_flags sf', 'sf.id = qds.quarterly_compliance_status');
		$this->db->where('qds.affiliate_id', $affiliate_id);

		if($exclude_other)
			$this->db->where('doc.document_id !=', 8);
		
		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}

		$query = $this->db->get();

		return $query->result_array();
	}

		/**
	 * Get list of key indicator of an Affiliate with its compliance status
	 * Other files are omitted
	 * 
	 * @param  int $affiliate_id
	 * @param  array $filter
	 * @return array
	 */
	public function key_indicator($affiliate_id, $filter = NULL)
	{

		$this->db->select('*');
		$this->db->from('key_indicators ki');
		$this->db->where('ki.affiliate_id', $affiliate_id);
		
		if( $filter !== NULL )
		{
			$this->db->where('ki.quarter', $filter['document_month'] );
			$this->db->where('ki.year', $filter['document_year'] );
		}

		$query = $this->db->get();

		return $query->result_array();
	}
		/**
	 * Get list of key indicator
	 * 
	 * @param  int $affiliate_id
	 * @return array
	 */
	public function key_indicatorList($affiliate_id)
	{

		$this->db->select('*');
		$this->db->from('key_indicators ki');
		$this->db->where('ki.affiliate_id', $affiliate_id);
		$query = $this->db->get();

		return $query->result_array();
	}
		/**
	 * Get list of key indicator
	 * 
	 * @param  int $affiliate_id
	 * @return array
	 */
	public function key_indicatorList_monthly($affiliate_id)
	{

		$this->db->select('*');
		$this->db->from('key_indicators_monthly ki');
		$this->db->where('ki.affiliate_id', $affiliate_id);
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
		if(isset($where['affiliate'])){
			$this->db->where('affiliate.affiliate_id',$where['affiliate']);
			unset($where['affiliate']);
		}
		
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
		
		if(isset($filter['affiliate'])){
			$this->db->where('affiliate.affiliate_id',$filter['affiliate']);
			unset($filter['affiliate']);
		}
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
	public function yearly_document_status($affiliate_id, $filter = NULL, $exclude_other = FALSE)
	{
		$this->db->select('yds.yearly_d_id,doc.document_id,doc.document_type_id,document_name,document_year,yearly_submitted_date,yearly_upload_file,yearly_upload_file_name,yearly_review_status,yearly_compliance_status,sf.name as status_name,sf.icon');
		$this->db->from('documents doc');
		$this->db->join('yearly_document_status yds', 'yds.document_id = doc.document_id', 'left');
		$this->db->join('status_flags sf', 'sf.id = yds.yearly_compliance_status');
		$this->db->where('yds.affiliate_id', $affiliate_id);

		if($exclude_other)
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
			'quarter'=> $data['quarter'],
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

	public function get_key_indicators($affiliate_id, $quarter, $year)
	{
		$this->db->where('affiliate_id', $affiliate_id);
		$this->db->where('quarter', $quarter);
		$this->db->where('year', $year);

		$query = $this->db->get('key_indicators');

		$row = $query->row_array();

		if(isset($row)) 
		{
			return array("id" => $row['id'], "status"=>$row['status'], "key_indicators" => json_decode($row['indicators'], TRUE));
		} 
		else 
		{
			return NULL;
		}
	}
	public function get_key_indicators_monthly($affiliate_id, $quarter, $year)
	{
		$this->db->where('affiliate_id', $affiliate_id);
		$this->db->where('month', $quarter);
		$this->db->where('year', $year);

		$query = $this->db->get('key_indicators_monthly');

		$row = $query->row_array();

		if(isset($row)) 
		{
			return array("id" => $row['id'], "status"=>$row['status'], "key_indicators_monthly" => json_decode($row['indicators'], TRUE));
		} 
		else 
		{
			return NULL;
		}
	}
	public function save_key_indicators($data)
	{
		$row = $this->get_key_indicators($data['affiliate_id'], $data['quarter'], $data['year']);

		if(isset($row))
		{
			$this->db->where('id', $row['id']);

			return $this->db->update('key_indicators', $data);
		}
		else
		{
			return $this->db->insert('key_indicators', $data);
		}
	}
	public function save_key_indicators_monthly($data)
	{
		$row = $this->get_key_indicators_monthly($data['affiliate_id'], $data['month'], $data['year']);

		if(isset($row))
		{
			$this->db->where('id', $row['id']);

			return $this->db->update('key_indicators_monthly', $data);
		}
		else
		{
			return $this->db->insert('key_indicators_monthly', $data);
		}
	}
	public function approve_key_indicators($data)
	{
		$row = $this->get_key_indicators($data['affiliate_id'], $data['quarter'], $data['year']);

		if(isset($row))
		{
			$insert_data = array(
				"status" => $data['status'],
		
			);
			$this->db->where('id', $row['id']);

			return $this->db->update('key_indicators', $insert_data);
		}
		
	}
	public function approve_key_indicatorsmonthly($data)
	{
		$row = $this->get_key_indicators_monthly($data['affiliate_id'], $data['month'], $data['year']);

		if(isset($row))
		{
			$insert_data = array(
				"status" => $data['status'],
		
			);
			$this->db->where('id', $row['id']);

			return $this->db->update('key_indicators_monthly', $insert_data);
		}
		
	}
	/**
	 * get_legal_document
	 *
	 * @return array
	 */
	public function get_legal_document($affiliate_id)
	{
		$this->db->select('*');
		$this->db->from('legal_document_status');
		$this->db->where('affiliate_id',$affiliate_id);


		$query = $this->db->get(); 

		$result = $query->result_array();

		foreach($result as $key => $row)
		{
			$result[$key]['comments'] = $this->Document_model->get_document_comments($row['legal_d_id'], 10);
		}

		return $result;
	}
		/**
	 * get_other_document
	 *
	 * @return array
	 */
	public function get_other_document($affiliate_id, $document_type_id)
	{
		$this->db->select('*');
		$this->db->from('other_document_status');
		$this->db->where('affiliate_id',$affiliate_id);
		$this->db->where('document_type_id',$document_type_id);

		$query = $this->db->get(); 

		$result = $query->result_array();

		foreach($result as $key => $row)
		{
			$result[$key]['comments'] = $this->Document_model->get_document_comments($row['id'], $row['document_type_id']);
		}

		return $result;
	}
	
			/**
	 * get_other_document
	 *
	 * @return array
	 */
	public function get_other_performance_documents($affiliate_id,$document_type_id)
	{
		$this->db->select('*');
		$this->db->from('performance_other_document_status');
		$this->db->where('affiliate_id',$affiliate_id);

		$query = $this->db->get(); 

		$result = $query->result_array();

		foreach($result as $key => $row)
		{
			$result[$key]['comments'] = $this->Document_model->get_document_comments($row['performance_o_id'], $row['document_id']);
		}

		return $result;
	}
	public function legal_compliance_document($data)
	{
		$insert_data = array(
			"document_id" => $data['document_type_id'],
			"affiliate_id" => $data['affiliate_id'],
			'quarterly_submitted_by' =>$this->session->user_id,
			'quarterly_submitted_date'=>date("Y-m-d H:i:s"),
			'quarterly_upload_file'=>$data['file_path'],
			'quarterly_upload_file_name'=>$data['upload_file_name'],
			'quarterly_upload_file_extension'=>$data['upload_file_extension']
		);

		if(isset($data['legal_d_id']))
		{
			$this->db->where('legal_d_id', $data['legal_d_id']);
			
			$this->db->update('legal_document_status', $insert_data);

			return $data['legal_d_id'];
		}
		else
		{
			$this->db->insert('legal_document_status', $insert_data);
			
			return $this->db->insert_id();
		}
	}

	public function other_document($data)
	{
		$insert_data = array(
			"document_type_id" => $data['document_type_id'],
			"affiliate_id" =>  $data['affiliate_id'],
			'other_submitted_by' =>$this->session->user_id,
			'other_submitted_date'=>date("Y-m-d H:i:s"),
			'other_upload_file'=>$data['file_path'],
			'other_upload_file_name'=>$data['upload_file_name'],
			'other_upload_file_extension'=>$data['upload_file_extension'],
		);

		if(isset($data['id']))
		{
			$this->db->where('id', $data['id']);

			$this->db->update('other_document_status', $insert_data);

			return $data['id'];
		}
		else
		{
			$this->db->insert('other_document_status', $insert_data);
			
			return $this->db->insert_id();	
		}
	}

	public function performance_other_document($data)
	{
		$insert_data = array(
			"document_id" => $data['document_type_id'],
			"affiliate_id" =>  $data['affiliate_id'],
			'performance_other_submitted_by' =>$this->session->user_id,
			'performance_other_submitted_date'=>date("Y-m-d H:i:s"),
			'performance_other_upload_file'=>$data['file_path'],
			'performance_other_upload_file_name'=>$data['upload_file_name'],
			'performance_other_upload_file_extension'=>$data['upload_file_extension'],
		);

		if(isset($data['performance_o_id']))
		{
			$this->db->where('performance_o_id', $data['id']);

			$this->db->update('performance_other_document_status', $insert_data);

			return $data['performance_o_id'];
		}
		else
		{
			$this->db->insert('performance_other_document_status', $insert_data);
			
			return $this->db->insert_id();	
		}
	}

	public function recent_affiliate_data($affiliate_id, $role_id)
	{
		/*if($role_id == 1) // For Administrator
		{
			//Check for affiliate monthly compliance status
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("year", "DESC");
			$this->db->order_by("month", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('affiliate_compliance_status_monthly');

			$recent_month = $query->row_array();

			if(isset($recent_month))
			{
				if($recent_month["compliance_status"] != 11)
				{
					$currentTime = mktime(0,0,0, $recent_month["month"], 1, $recent_month["year"]);
					$date = explode("-", date("Y-n", strtotime("+1 months", $currentTime)));
					$recent_month["year"] = $date[0];
					$recent_month["month"] = $date[1];
				}
			} 

			//Check for affiliate quarterly compliance status
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("year", "DESC");
			$this->db->order_by("quarter", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('affiliate_compliance_status_quarterly');

			$recent_quarter = $query->row_array();

			if(isset($recent_quarter))
			{
				if($recent_quarter["compliance_status"] != 11)
				{
					$month = $recent_quarter["quarter"] * 3;
					$currentTime = mktime(0,0,0, $month, 1, $recent_quarter["year"]);
					$date = explode("-", date("Y-n", strtotime("+1 months", $currentTime)));
					$recent_quarter["year"] = $date[0];
					$recent_quarter["quarter"] = ceil($date[1]/3);
				}
			}

			//Check for affiliate yearly compliance status
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("year", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('affiliate_compliance_status_yearly');

			$recent_year = $query->row_array();

			if(isset($recent_year))
			{
				if($recent_year["compliance_status"] != 11)
				{
					$recent_year["year"] += 1;
				}
			}

			//Check for affiliate key indicators
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("year", "DESC");
			$this->db->order_by("quarter", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('key_indicators');

			$recent_key_indicator = $query->row_array();

			if(isset($recent_key_indicator))
			{
				if($recent_key_indicator["status"] == 1)
				{
					$month = $recent_key_indicator["quarter"] * 3;
					$currentTime = mktime(0,0,0, $month, 1, $recent_key_indicator["year"]);
					$date = explode("-", date("Y-n", strtotime("+1 months", $currentTime)));
					$recent_key_indicator["year"] = $date[0];
					$recent_key_indicator["quarter"] = ceil($date[1]/3);
				}
			}
		}
		else
		{*/
			//Check for affiliate monthly document status
			$this->db->select("document_month AS month, document_year AS year");
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("document_year", "DESC");
			$this->db->order_by("document_month", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('monthly_document_status');

			$recent_month = $query->row_array();

			if(isset($recent_month))
			{
				$this->db->where("affiliate_id", $affiliate_id);
				$this->db->where("document_month", $recent_month["month"]);
				$this->db->where("document_year", $recent_month["year"]);
				$this->db->where_in("document_id", array(1, 2, 3, 4, 5));
				$this->db->where("monthly_compliance_status !=", 4);

				if($this->db->count_all_results('monthly_document_status') == 5) 
				{
					if($role_id != 1)
					{
						//For affiliate user, move to next month if all files uploaded
						$currentTime = mktime(0,0,0, $recent_month["month"], 1, $recent_month["year"]);
						$date = explode("-", date("Y-n", strtotime("+1 months", $currentTime)));
						$recent_month["year"] = $date[0];
						$recent_month["month"] = $date[1];
					}
				}
				else if($role_id == 1 && $this->input->get('month') == NULL)
				{
					//For administrator, move to previous month if all files not uploaded when first page load
					$currentTime = mktime(0,0,0, $recent_month["month"], 1, $recent_month["year"]);
					$date = explode("-", date("Y-n", strtotime("-1 months", $currentTime)));
					$recent_month["year"] = $date[0];
					$recent_month["month"] = $date[1];
				}
			} 
			
			//Check for affiliate quarterly document status
			$this->db->select("document_month AS quarter, document_year AS year");
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("document_year", "DESC");
			$this->db->order_by("document_month", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('quarterly_document_status');
			
			$recent_quarter = $query->row_array();

			if(isset($recent_quarter))
			{
				$this->db->where("affiliate_id", $affiliate_id);
				$this->db->where("document_month", $recent_quarter["quarter"]);
				$this->db->where("document_year", $recent_quarter["year"]);
				$this->db->where_in("document_id", array(7));
				$this->db->where("quarterly_compliance_status !=", 4);

				if($this->db->count_all_results('quarterly_document_status') == 1)
				{
					if($role_id != 1)
					{
						$month = $recent_quarter["quarter"] * 3;
						$currentTime = mktime(0,0,0, $month, 1, $recent_quarter["year"]);
						$date = explode("-", date("Y-n", strtotime("+1 months", $currentTime)));
						$recent_quarter["year"] = $date[0];
						$recent_quarter["quarter"] = ceil($date[1]/3);
					}
				}
				else if($role_id == 1 && $this->input->get('quarter') == NULL)
				{
					$month = ($recent_quarter["quarter"] - 1) * 3;
					$currentTime = mktime(0,0,0, $month, 1, $recent_quarter["year"]);
					$date = explode("-", date("Y-n", strtotime("-1 months", $currentTime)));
					$recent_quarter["year"] = $date[0];
					$recent_quarter["quarter"] = ceil($date[1]/3);
				}
			}
			
			//Check for affiliate yearly document status
			$this->db->select("document_year AS year");
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("year", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('yearly_document_status');
			
			$recent_year = $query->row_array();

			if(isset($recent_year))
			{
				$this->db->where("affiliate_id", $affiliate_id);
				$this->db->where("document_year", $recent_year["year"]);
				$this->db->where_in("document_id", array(9,10,11,12,13));
				$this->db->where("yearly_compliance_status !=", 4);

				if($this->db->count_all_results('yearly_document_status') == 5)
				{
					if($role_id != 1)
					{
						//For affiliate user, move to next year if all files uploaded
						$recent_year["year"] += 1;
					}
				}
				else if($role_id == 1 && $this->input->get('yearly_year') == NULL)
				{
					//For administrator, move to previous year if all files not uploaded when first page load
					$recent_year["year"] -= 1;
				}
			}
	
			//Check for affiliate key indicators
			$this->db->where("affiliate_id", $affiliate_id);
			$this->db->order_by("year", "DESC");
			$this->db->order_by("quarter", "DESC");
			$this->db->limit(1);
			$query = $this->db->get('key_indicators');
			
			$recent_key_indicator = $query->row_array();

			if(isset($recent_key_indicator))
			{
				$month = $recent_key_indicator["quarter"] * 3;
				$currentTime = mktime(0,0,0, $month, 1, $recent_key_indicator["year"]);
				$date = explode("-", date("Y-n", strtotime("+1 months", $currentTime)));
				$recent_key_indicator["year"] = $date[0];
				$recent_key_indicator["quarter"] = ceil($date[1]/3);
			}
		//} 

		return array(
			'monthly' => $recent_month,
			'quarterly' => $recent_quarter,
			'yearly' => $recent_year,
			'key_indicator' => $recent_key_indicator
		);
	}

	/**
	 * get_legal_document with document id
	 *
	 * @return array
	 */
	public function get_legal_document_id($docId)
	{
		$this->db->select('*');
		$this->db->from('legal_document_status');
		$this->db->where('legal_d_id',$docId);

		$query = $this->db->get(); 
		$result = $query->row_array();

		return $result;
	}
	
	/**
	 *delete_legal_document with document id
	 *
	 * @return array
	 */
	public function delete_legal_document($docId)
	{
		$this->db->where('legal_d_id', $docId);
		$del = $this->db->delete('legal_document_status');
		return $del;

	
	}

		/**
	 * get_other_compliance_document_id with document id
	 *
	 * @return array
	 */
	public function get_other_compliance_document_id($docId)
	{
		$this->db->select('*');
		$this->db->from('other_document_status');
		$this->db->where('id',$docId);

		$query = $this->db->get(); 
		$result = $query->row_array();

		return $result;
	}
	
	/**
	 *delete_other_compliance_document with document id
	 *
	 * @return array
	 */
	public function delete_other_compliance_document($docId)
	{
		$this->db->where('id', $docId);
		$del = $this->db->delete('other_document_status');
		return $del;

	
	}

			/**
	 * get_performance_other_document_id with document id
	 *
	 * @return array
	 */
	public function get_performance_other_document_id($docId)
	{
		$this->db->select('*');
		$this->db->from('performance_other_document_status');
		$this->db->where('performance_o_id',$docId);

		$query = $this->db->get(); 
		$result = $query->row_array();

		return $result;
	}
	
	/**
	 *delete_performance_other_document with document id
	 *
	 * @return array
	 */
	public function delete_performance_other_document($docId)
	{
		$this->db->where('performance_o_id', $docId);
		$del = $this->db->delete('performance_other_document_status');
		return $del;

	
	}
	

	/**
	 * delete notification summary  with document id
	 *
	 * @return array
	 */
	public function delete_notification_summary($docId)
	{

		$this->db->where('document_id', $docId);
		$del = $this->db->delete('notification_summary');
		 return $del;

	
	}
	/**
	 * Get all affiliates and sort them using conditions
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $where
	 * @return void
	 */
	public function get_all_affiliates_list($limit = NULL, $start = NULL, $where = NULL, $isYearNeeded = FALSE)
	{
		$this->db->select('*,stateabbreviation as state, region.name AS region');
		$this->db->from('affiliate');
		$this->db->join('region', 'region.region_id = affiliate.region_id');
		$this->db->join('state', 'state.stateid = affiliate.state');

		if(isset($where['affiliate']))
		{
			$this->db->where('affiliate.affiliate_id',$where['affiliate']);
		}

		
		if( $isYearNeeded )
		{
			$this->db->join('financial_year', 'financial_year.affiliate_id = affiliate.affiliate_id');
		}

		if(isset($where['affiliate.organization']))
		{
			$aname = $where['affiliate.organization'];
			$this->db->like('affiliate.organization', $aname);
			unset($where['affiliate.organization']);
		}
		if(isset($where['month'])){
			unset($where['month']);
		}

		if(isset($where['year'])){
			unset($where['year']);
		}

		if(isset($where['affiliate'])){
			unset($where['affiliate']);
		}
		if(isset($where['quarter'])){
			unset($where['quarter']);
		}
		
		if( $where !== NULL)
		{

			$this->db->where($where);
		}

		if( ($limit !== NULL) && ($start !== NULL) )
		{
			$this->db->limit($limit, $start);
		}
		$this->db->group_by('affiliate.affiliate_id'); 
		$query = $this->db->get();

		$affiliates =  $query->result_array();
		return $affiliates;
	}

		/**
	 * Get list of affiliates with their monthly compliance status
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $filter
	 * @return void
	 */
	public function monthly_compliance_status_listing($limit = NULL, $start = NULL, $filter = NULL,$affiliate_id)
	{
		$this->db->select('affiliate.affiliate_id,city,stateabbreviation as state,compliance_status,status_flags.name as status_name,status_flags.icon');
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_monthly cms', 'cms.affiliate_id = affiliate.affiliate_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('status_flags', 'status_flags.id = cms.compliance_status');
		if(isset($affiliate_id)){
			$this->db->where('affiliate.affiliate_id', $affiliate_id);

		}
		if(isset($filter['affiliate'])){
			unset($filter['affiliate']);
		}

		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}
		$query = $this->db->get();
		 return $query->row_array();
	}
	/**
	 * Get list of affiliates with their quarterly compliance status
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $filter
	 * @return void
	 */
	public function quarterly_compliance_status_listing($limit = NULL, $start = NULL, $filter = NULL,$affiliate_id)
	{
		$this->db->select('affiliate.affiliate_id,city,stateabbreviation as state,compliance_status,status_flags.name as status_name,icon');
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_quarterly cqs', 'cqs.affiliate_id = affiliate.affiliate_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('status_flags', 'status_flags.id = cqs.compliance_status');
		if($affiliate_id){
			$this->db->where('affiliate.affiliate_id', $affiliate_id);

		}
		if(isset($filter['affiliate'])){
			unset($filter['affiliate']);
		}

		if( $filter !== NULL )
		{
			$this->db->where($filter);
		}
		$query = $this->db->get();
		return $query->row_array();
	}

		/**
	 * Get list of affiliates with their yearly compliance status
	 *
	 * @param  int $limit
	 * @param  int $start
	 * @param  array $filter
	 * @return void
	 */
	public function yearly_compliance_status_listing($limit = NULL, $start = NULL, $filter = NULL,$affiliate_id)
	{
		$this->db->select('affiliate.affiliate_id,city,stateabbreviation as state,compliance_status,status_flags.name as status_name,icon');
		$this->db->from('affiliate');
		$this->db->join('affiliate_compliance_status_yearly cys', 'cys.affiliate_id = affiliate.affiliate_id');
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->join('status_flags', 'status_flags.id = cys.compliance_status');
		
		if($affiliate_id){
			$this->db->where('affiliate.affiliate_id', $affiliate_id);

		}
		if(isset($filter['affiliate'])){
			unset($filter['affiliate']);
		}

		if( $filter !== NULL )
		{
			
			$this->db->where($filter);
		}
		$query = $this->db->get();
		return $query->row_array();
	}

	/**
	 * Get the current compliance status
	 */
	public function current_compliance_status($affiliate_id)
	{
		$this->db->select('quarter,year,compliance_status,status_flags.name as status_name,icon');
		$this->db->from('affiliate_compliance_status_quarterly cqs');
		$this->db->join('status_flags', 'status_flags.id = cqs.compliance_status');
		$this->db->where('cqs.affiliate_id', $affiliate_id);
		$this->db->order_by('year', 'DESC');
		$this->db->order_by('quarter', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		return $query->row_array();
	}

	/**
	 * Get the performance score
	 */
	public function get_performance_score($affiliate_id)
	{
		$this->db->select('pa.performance_score');
		$this->db->from('self_assessment sa');
		$this->db->join('performance_assesment_answers pa', 'pa.self_assessment_id = sa.self_assessment_id');
		$this->db->where('sa.affiliate_id', $affiliate_id);
		$this->db->where('pa.user_id', NULL);
		$this->db->order_by('sa.assessment_end_year', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();

		$result = $query->row_array();

		return isset($result['performance_score']) ? $result['performance_score'] : '';
	}



	/**
	 * Get monthly/quarterly/yearly uploaded file
	 */
	public function get_term_document($data)
	{
		$field_name = $table_name = NULL;
		if($data['interval'] == "month")
		{
			$field_name = 'monthly_document_id';
			$table_name = 'monthly_document_status';
		}
		else if($data['interval'] == "quarter")
		{
			$field_name = 'quarterly_id';
			$table_name = 'quarterly_document_status';
		}
		else if($data['interval'] == "year")
		{
			$field_name = 'yearly_d_id';
			$table_name = 'yearly_document_status';
		}
		
		if(isset($field_name) && isset($table_name))
		{
			$this->db->where($field_name, $data['uploaded_id']);
	
			$query = $this->db->get($table_name);

			return $query->row_array();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Delete monthly/quarterly/yearly uploaded file
	 */
	public function delete_term_document($data)
	{
		$field_name = $table_name = NULL;
		if($data['interval'] == "month")
		{
			$field_name = 'monthly_document_id';
			$table_name = 'monthly_document_status';
		}
		else if($data['interval'] == "quarter")
		{
			$field_name = 'quarterly_id';
			$table_name = 'quarterly_document_status';
		}
		else if($data['interval'] == "year")
		{
			$field_name = 'yearly_d_id';
			$table_name = 'yearly_document_status';
		}
		
		if(isset($field_name) && isset($table_name))
		{
			$this->db->where($field_name, $data['uploaded_id']);
	
			return $this->db->delete($table_name);
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * Get an affiliate id by city name 
	 *
	 * @param  string $affiliate_name
	 * @return array
	 */
	public function get_affiliateid_by_name($affiliate_name)
	{
		$this->db->join('state', 'state.stateid = affiliate.state');
		$this->db->where('affiliate.city', $affiliate_name);
		$query = $this->db->get('affiliate');
		return $query->row_array();
	}

	public function report_details($report_id)
	{

		$sql  = " SELECT cr.*,af.organization FROM census_report cr ";
		$sql .= " LEFT JOIN affiliate af ON cr.field_affiliate_select = af.field_affiliate_select_value ";
		$sql .= " WHERE cr.report_id = ? ";
		$query = $this->db->query($sql,[$report_id]);
		$result =  $query->row();
		return $result;

	}
	
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

	public function service_areas_details($service_area_id)
	{
		$this->db->select('ser.*');
		$this->db->from('service_areas ser');
		$this->db->where('ser.fk_service_area_id', $service_area_id);
		$this->db->where('ser.is_deleted', 0);
		$query = $this->db->get();
		return $query->result_array();
	}  

	public function census_report_statuses()
	{
		$this->db->select('stat.*');
		$this->db->from('census_statuses stat');
		$query = $this->db->get();
		return $query->result_array();
	}
	
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

	public function revenue($report_id)
	{
		$this->db->select('rev.*');
		$this->db->from('revenue rev');
    	$this->db->where('rev.field_parent_census', $report_id);
		$query = $this->db->get();
		return $query->result_array();
	}

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
	 * Get entire census report
	 * 
	 * @param  int $creport_year
	 * @return array
	 */
	public function census_report($report_year, $affiliate_id = NULL, $status = NULL)
	{
		$this->db->select('rep.*,af.organization,af.city,af.state,cs.status,exp.field_total_expenditures,exp.field_a_salaries_wages,exp.field_b_fringe_benefits,exp.field_c_professional_fees,exp.field_d_travel,exp.field_e_postage_freight,
						   exp.field_f_insurance,exp.field_g_interest_payments,exp.field_h_dues_subscription_regist,exp.field_i_depreciation,exp.field_j_taxes_including_property,exp.field_k_utilities,exp.field_l_equipment_space_rental,
						   exp.field_m_goods_and_services,exp.field_n_rent_mortgage_payments,exp.field_o_other,exp.field_number_properties_rented,exp.field_capital_budget_amount,rev.field_revenue_corporations,rev.field_revenue_foundations,rev.field_revenue_individual_members,
						   rev.field_revenue_special_events,rev.field_revenue_united_way,rev.field_revenue_federal,rev.field_revenue_state_local,rev.field_revenue_other,rev.field_revenue_nul,rev.field_revenue_investment,rev.field_revenue_total_budget,
						   rev.field_revenue_endowment_amount,com.field_produces_annual_report,
						   com.field_newsletter,com.field_state_of_black_report,com.field_marketing_kit_or_pamphlet,com.field_affiliate_website_address,com.field_is_website_linked_to_nul,com.field_has_ad_marketing_campaign,
						   emp.field_board_member_grand_total,emp.field_part_time_employees,emp.field_full_time_employees,ce.field_voter_registration,ce.field_community_forums,ce.field_crja,ce.field_police_brutality,ce.field_advocacy_efforts,
						   vm.field_ypc_members,vm.field_aux_members,vm.field_guild_members,GROUP_CONCAT(p.title) as program_titles,GROUP_CONCAT(p.field_program_area_tid) as program_areas,sam.pk_id as sam_pk_id');
		$this->db->from('census_report rep');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = rep.field_affiliate_select', 'left');
		$this->db->join('expenditures exp', 'rep.report_id = exp.field_parent_census', 'left');
		$this->db->join('revenue rev', 'rep.report_id = rev.field_parent_census', 'left');
		$this->db->join('community_relations com', 'rep.report_id = com.field_parent_census','left');
		$this->db->join('employees_board_members emp', 'rep.report_id = emp.field_parent_census','left');
		$this->db->join('civic_engagement ce', 'rep.report_id = ce.field_parent_census','left');
		$this->db->join('volunteers_members vm', 'rep.report_id = vm.field_parent_census','left');
		$this->db->join('programs p', 'rep.report_id = p.field_parent_census','left');
		$this->db->join('service_areas_main sam', 'rep.report_id = sam.field_parent_census','left');
		$this->db->join('census_statuses cs', 'cs.status_id = rep.field_census_status','left');
		$this->db->group_by('rep.report_id');
		$this->db->order_by('af.city', 'ASC');
		
		$this->db->where('rep.field_year', $report_year);
		if($status != NULL){
			$this->db->where('rep.field_census_status', $status);
		}
		if($affiliate_id != NULL){
			$this->db->where('rep.field_affiliate_select', $affiliate_id);
		}

		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Get single census report
	 * 
	 * @param  int $creport_year
	 * @return array
	 */
	public function single_census_report($report_id)
	{
		$this->db->select('rep.*,af.organization,af.city,af.state,cs.status,exp.field_total_expenditures,exp.field_a_salaries_wages,exp.field_b_fringe_benefits,exp.field_c_professional_fees,exp.field_d_travel,exp.field_e_postage_freight,
						   exp.field_f_insurance,exp.field_g_interest_payments,exp.field_h_dues_subscription_regist,exp.field_i_depreciation,exp.field_j_taxes_including_property,exp.field_k_utilities,exp.field_l_equipment_space_rental,
						   exp.field_m_goods_and_services,exp.field_n_rent_mortgage_payments,exp.field_o_other,exp.field_number_properties_rented,exp.field_capital_budget_amount,rev.field_revenue_corporations,rev.field_revenue_foundations,rev.field_revenue_individual_members,
						   rev.field_revenue_special_events,rev.field_revenue_united_way,rev.field_revenue_federal,rev.field_revenue_state_local,rev.field_revenue_other,rev.field_revenue_nul,rev.field_revenue_investment,rev.field_revenue_total_budget,
						   rev.field_revenue_endowment_amount,com.field_produces_annual_report,
						   com.field_newsletter,com.field_state_of_black_report,com.field_marketing_kit_or_pamphlet,com.field_affiliate_website_address,com.field_is_website_linked_to_nul,com.field_has_ad_marketing_campaign,
						   emp.field_board_member_grand_total,emp.field_part_time_employees,emp.field_full_time_employees,ce.field_voter_registration,ce.field_community_forums,ce.field_crja,ce.field_police_brutality,ce.field_advocacy_efforts,
						   vm.field_ypc_members,vm.field_aux_members,vm.field_guild_members,GROUP_CONCAT(p.title) as program_titles,GROUP_CONCAT(p.field_program_area_tid) as program_areas,sam.pk_id as sam_pk_id');
		$this->db->from('census_report rep');
		$this->db->join('affiliate af', 'af.field_affiliate_select_value = rep.field_affiliate_select', 'left');
		$this->db->join('expenditures exp', 'rep.report_id = exp.field_parent_census', 'left');
		$this->db->join('revenue rev', 'rep.report_id = rev.field_parent_census', 'left');
		$this->db->join('community_relations com', 'rep.report_id = com.field_parent_census','left');
		$this->db->join('employees_board_members emp', 'rep.report_id = emp.field_parent_census','left');
		$this->db->join('civic_engagement ce', 'rep.report_id = ce.field_parent_census','left');
		$this->db->join('volunteers_members vm', 'rep.report_id = vm.field_parent_census','left');
		$this->db->join('programs p', 'rep.report_id = p.field_parent_census','left');
		$this->db->join('service_areas_main sam', 'rep.report_id = sam.field_parent_census','left');
		$this->db->join('census_statuses cs', 'cs.status_id = rep.field_census_status','left');
		$this->db->group_by('rep.report_id');
		
		$this->db->where('rep.report_id', $report_id);

		$query = $this->db->get();
		return $query->result_array();
	}
}
