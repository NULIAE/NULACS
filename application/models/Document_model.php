<?php
/**
 * Document_model
 * */
class Document_model extends CI_Model 
{	
	/**
	 * Get all the document types
	 *
	 * @return array List of all document types
	 */
	public function get_document_types()
	{
		$this->db->order_by('document_type_id');
		$query = $this->db->get('document_type');

		return $query->result_array();
	}
	
	/**
	 * Get all the active documents for a document type
	 *
	 * @param  int $document_type_id
	 * @param  array $exclude - List of documents that should be excluded
	 * @return array List of all active documents
	 */
	public function get_documents($document_type_id, $exclude = NULL)
	{
		$this->db->select('document_id, document_type_id, document_name,document_file_extension,metadata,ref_document');
		$this->db->where('active_y_n', 'Y');
		$this->db->where('document_type_id', $document_type_id);

		if( $exclude !== NULL)
		{
			$this->db->where_not_in('document_id', $exclude);
		}
		
		$query = $this->db->get('documents');

		return $query->result_array();
	}
	
	/**
	 * Get document by `document_id`
	 *
	 * @param  int $document_id
	 * @return array
	 */
	public function get_document($document_id)
	{
		$this->db->where('active_y_n', 'Y');
		$this->db->where('document_id', $document_id);
		
		$query = $this->db->get('documents');

		return $query->row_array();
	}
	
	/**
	 * Update document details
	 *
	 * @param  int $document_id
	 * @param  array $data
	 * @return boolean
	 */
	public function update_document($document_id, $data)
	{
		$this->db->set($data);
		$this->db->where('document_id', $document_id);

		return $this->db->update('documents');
	}

	/**
	 * get_document_status_flags
	 *
	 * @return array
	 */
	public function get_document_status_flags()
	{
		$this->db->where('type', 2);

		$query = $this->db->get('status_flags');

		return $query->result_array();
	}
	/**
	 * get affiliate details 
	 *
	 * @return array
	 */
	public function get_affiliate_details()
	{

		$query = $this->db->get('users');

		return $query->result_array();
	}

	 /**
	 * Get all notifications
	 *
	 * @return array List of all notifications
	 */
	public function get_notifications()
	{
		$this->db->select('*');
		$this->db->join('users u', 'u.user_id = notification_summary.created_by');
		$this->db->join('affiliate af', 'af.affiliate_id = notification_summary.affiliate_id');
		$this->db->join('state st', 'st.stateid = af.state');
		$this->db->where('created_by !=', $this->session->user_id);
		$this->db->where('flag', 1);
		
		if($this->session->role_id != 1)
		{
			$this->db->where('af.affiliate_id =',$this->session->affiliate_id);
		}
		
		$query = $this->db->get('notification_summary'); 
		
		$result = $query->result_array();
		
		foreach($result as $key => $row)
		{
			$base_url = base_url().'module/affiliate/status/details/' . $row['affiliate_id'] . '?id=' . $row['notification_id'];
			
			if($row['document_type_id'] == 1)
			{
				$this->db->select('document_month,document_year,doc.document_name');
				$this->db->from('monthly_document_status');
				$this->db->join('documents doc', 'doc.document_id = monthly_document_status.document_id');
				$this->db->where('monthly_document_id', $row['document_id']);

				$query = $this->db->get();

				$doc_data = $query->row_array();

				if($doc_data != NULL)
				{
					$result[$key]['month'] = $doc_data['document_month'];
					$result[$key]['year'] = $doc_data['document_year'];
					$result[$key]['link'] = $base_url . '&interval=nav-y1&monthly_year='.$doc_data['document_year'].'&month='.$doc_data['document_month'];
					$result[$key]['doc_name'] = $doc_data['document_name'];

				}
			} 
			else if($row['document_type_id'] == 2)
			{
				$this->db->select('document_month,document_year,doc.document_name');
				$this->db->from('quarterly_document_status');
				$this->db->join('documents doc', 'doc.document_id = quarterly_document_status.document_id');
				$this->db->where('quarterly_id', $row['document_id']);

				$query = $this->db->get();

				$doc_data = $query->row_array();

				if($doc_data != NULL)
				{
					$result[$key]['quarter'] = $doc_data['document_month'];
					$result[$key]['year'] = $doc_data['document_year'];
					$result[$key]['link'] = $base_url . '&interval=nav-y2&quarterly_year='.$doc_data['document_year'].'&quarter='.$doc_data['document_month'];
					$result[$key]['doc_name'] = $doc_data['document_name'];
				}
			}
			else if($row['document_type_id'] == 3)
			{
				$this->db->select('document_year,doc.document_name');
				$this->db->from('yearly_document_status');
				$this->db->join('documents doc', 'doc.document_id = yearly_document_status.document_id');
				$this->db->where('yearly_d_id', $row['document_id']);

				$query = $this->db->get();

				$doc_data = $query->row_array();

				if($doc_data != NULL)
				{
					$result[$key]['year'] = $doc_data['document_year'];
					$result[$key]['link'] = $base_url . '&interval=nav-y3&yearly_year='.$doc_data['document_year'];
					$result[$key]['doc_name'] = $doc_data['document_name'];
				}
			}
		}

		return $result;
	}

	 /**
	 * update notification flag
	 *
	 * @return array update notification flag
	 */
	public function change_flag($notification_id)
	{
		$update_data =  array(
			'flag' => 0
		);
		$this->db->set($update_data);
		$this->db->where('notification_id', $notification_id);

		return $this->db->update('notification_summary');
	}

 	/**
	 * get  user details
	 *
	 * @return array user details 
	 */
	public function user_data()
	{
		$this->db->select('*');
		$this->db->from('users as u');
		$this->db->join('affiliate as a', 'a.affiliate_id = u.affiliate_id');
		$this->db->where('u.affiliate_id =',$this->session->affiliate_id);
		$query = $this->db->get(); 
		return $query->row();
	}
	 /**
	 * get current user notification
	 *
	 * @return array user notification 
	 */
	public function user_notifications($keyword = NULL)
	{
		$this->db->select('ns.*, u.first_name,u.last_name,af.organization,af.city,st.stateabbreviation');
		$this->db->join('users as u', 'u.user_id = ns.created_by');
		$this->db->join('affiliate af', 'af.affiliate_id = ns.affiliate_id');
		$this->db->join('state st', 'st.stateid = af.state');
		if($this->session->affiliate_id != 1)
		{
			$this->db->where('ns.affiliate_id =',$this->session->affiliate_id);
		}

		if(isset($keyword))
		{
			$this->db->like('ns.notification', $keyword);
			$this->db->or_like('u.first_name', $keyword);
			$this->db->or_like('u.last_name', $keyword);
		}

		$this->db->group_by('ns.notification_id');

		$query = $this->db->get('notification_summary as ns'); 
		
		$result = $query->result_array();
		
		foreach($result as $key => $row)
		{
			$base_url = base_url().'module/affiliate/status/details/' . $row['affiliate_id'] . '?id=' . $row['notification_id'];
			
			if($row['document_type_id'] == 1)
			{
				$this->db->select('document_month,document_year,doc.document_name');
				$this->db->from('monthly_document_status');
				$this->db->join('documents doc', 'doc.document_id = monthly_document_status.document_id');
				$this->db->where('monthly_document_id', $row['document_id']);

				$query = $this->db->get();

				$doc_data = $query->row_array();

				if($doc_data != NULL)
				{
					$result[$key]['month'] = $doc_data['document_month'];
					$result[$key]['year'] = $doc_data['document_year'];
					$result[$key]['link'] = $base_url . '&interval=nav-y1&monthly_year='.$doc_data['document_year'].'&month='.$doc_data['document_month'];
					$result[$key]['doc_name'] = $doc_data['document_name'];
				}
			} 
			else if($row['document_type_id'] == 2)
			{
				$this->db->select('document_month,document_year,quarterly_upload_file_name,doc.document_name');
				$this->db->from('quarterly_document_status');
				$this->db->join('documents doc', 'doc.document_id = quarterly_document_status.document_id');
				$this->db->where('quarterly_id', $row['document_id']);

				$query = $this->db->get();

				$doc_data = $query->row_array();

				if($doc_data != NULL)
				{
					$result[$key]['quarter'] = $doc_data['document_month'];
					$result[$key]['year'] = $doc_data['document_year'];
					$result[$key]['link'] = $base_url . '&interval=nav-y2&quarterly_year='.$doc_data['document_year'].'&quarter='.$doc_data['document_month'];
					$result[$key]['doc_name'] = $doc_data['document_name'];
				}
			}
			else if($row['document_type_id'] == 3)
			{
				$this->db->select('document_year,yearly_upload_file_name,doc.document_name');
				$this->db->from('yearly_document_status');
				$this->db->join('documents doc', 'doc.document_id = yearly_document_status.document_id');
				$this->db->where('yearly_d_id', $row['document_id']);

				$query = $this->db->get();

				$doc_data = $query->row_array();

				if($doc_data != NULL)
				{
					$result[$key]['year'] = $doc_data['document_year'];
					$result[$key]['link'] = $base_url . '&interval=nav-y3&yearly_year='.$doc_data['document_year'];
					$result[$key]['doc_name'] = $doc_data['document_name'];
				}
			}
		}

		return $result;
	}
	
	/**
	 * Update monthly compliance status of a document
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function update_monthly_document($data)
	{
		$this->db->set('monthly_compliance_status', $data['status']);
		$this->db->where('monthly_document_id', $data['document_id']);

		return $this->db->update('monthly_document_status');
	}

	/**
	 * Update quarterly compliance status of a document
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function update_quarterly_document($data)
	{
		$this->db->set('quarterly_compliance_status', $data['status']);
		$this->db->where('quarterly_id', $data['document_id']);

		return $this->db->update('quarterly_document_status');
	}

	/**
	 * Update yearly compliance status of a document
	 *
	 * @param  array $data
	 * @return bool
	 */
	public function update_yearly_document($data)
	{
		$this->db->set('yearly_compliance_status', $data['status']);
		$this->db->where('yearly_d_id', $data['document_id']);

		return $this->db->update('yearly_document_status');
	}
	
	/**
	 * Get the comments for a document
	 *
	 * @param  mixed $document_id
	 * @param  mixed $document_type_id
	 * @return void
	 */
	public function get_document_comments($document_id, $document_type_id, $filter = NULL)
	{
		$this->db->select('ns.*,u.first_name,u.last_name');
		$this->db->from('notification_summary ns');
		$this->db->join('users u', 'u.user_id = ns.created_by');
		$this->db->where('ns.document_id', $document_id);
		$this->db->where('ns.document_type_id', $document_type_id);
		
		if(isset($filter))
		{
			$this->db->where($filter);
		}

		$this->db->order_by('ns.notification_id', 'ASC');

		$query = $this->db->get();

		return $query->result_array();
	}
	
	/**
	 * Add document comment to notification_summary table
	 *
	 * @param  mixed $data
	 * @return void
	 */
	public function add_comment($data)
	{
		if( $this->db->insert('notification_summary', $data) )
		{
			$id = $this->db->insert_id();

			return $this->get_document_comments($data['document_id'], $data['document_type_id'], array('notification_id' => $id));
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * add_monthly_document
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_monthly_document($data)
	{
		$insert_data = array(
			"document_id" => $data["document_id"],
			"affiliate_id" => $data["affiliate_id"],
			"document_month" => $data["month"],
			"document_year" => $data["year"],
			"monthly_submitted_by" => $data["submitted_by"],
			"monthly_submitted_date" => date('Y-m-d H:i:s'),
			"monthly_compliance_status" => "5",
			"monthly_upload_file" => $data["full_path"],
			"monthly_upload_file_name" => $data["file_name"],
			"monthly_upload_file_extension" => $data["file_ext"],
			"metadata_value" => $data["metadata"],
		);

		//Check document already uploaded
		$this->db->where("document_id", $data["document_id"]);
		$this->db->where("affiliate_id", $data["affiliate_id"]);
		$this->db->where("document_month", $data["month"]);
		$this->db->where("document_year", $data["year"]);

		$query = $this->db->get('monthly_document_status');

		$row = $query->row_array();
		
		if (isset($row) && ($row['document_id'] != 6))
		{
			//Delete already existing file
			$path = FCPATH . $row["monthly_upload_file"];
			if(file_exists($row["monthly_upload_file"]))
			{
				unlink(FCPATH . $row["monthly_upload_file"]);
			}
			
			//Update the new details
			$this->db->where("monthly_document_id", $row["monthly_document_id"]);
			
			if( $this->db->update('monthly_document_status', $insert_data) )
			{
				return $row["monthly_document_id"];
			}
			else
			{
				return FALSE;
			}
		}
		else if( $this->db->insert('monthly_document_status', $insert_data) ) //Insert new document
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * add_quarterly_document
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_quarterly_document($data)
	{
		$insert_data = array(
			"document_id" => $data["document_id"],
			"affiliate_id" => $data["affiliate_id"],
			"document_month" => $data["quarter"],
			"document_year" => $data["year"],
			"quarterly_submitted_by" => $data["submitted_by"],
			"quarterly_submitted_date" => date('Y-m-d H:i:s'),
			"quarterly_compliance_status" => "5",
			"quarterly_upload_file" => $data["full_path"],
			"quarterly_upload_file_name" => $data["file_name"],
			"quarterly_upload_file_extension" => $data["file_ext"],
			"metadata_value" => $data["metadata"],
		);

		//Check document already uploaded
		$this->db->where("document_id", $data["document_id"]);
		$this->db->where("affiliate_id", $data["affiliate_id"]);
		$this->db->where("document_month", $data["quarter"]);
		$this->db->where("document_year", $data["year"]);

		$query = $this->db->get('quarterly_document_status');

		$row = $query->row_array();
		
		if (isset($row) && ($row['document_id'] != 8))
		{
			//Delete already existing file
			$path = FCPATH . $row["quarterly_upload_file"];
			if(file_exists($row["quarterly_upload_file"]))
			{
				unlink(FCPATH . $row["quarterly_upload_file"]);
			}
			
			//Update the new details
			$this->db->where("quarterly_id", $row["quarterly_id"]);
			
			if( $this->db->update('quarterly_document_status', $insert_data) )
			{
				return $row["quarterly_id"];
			}
			else
			{
				return FALSE;
			}
		}
		else if( $this->db->insert('quarterly_document_status', $insert_data) ) //Insert new document
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * add_yearly_document
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_yearly_document($data)
	{
		$insert_data = array(
			"document_id" => $data["document_id"],
			"affiliate_id" => $data["affiliate_id"],
			"document_year" => $data["year"],
			"yearly_submitted_by" => $data["submitted_by"],
			"yearly_submitted_date" => date('Y-m-d H:i:s'),
			"yearly_compliance_status" => "5",
			"yearly_upload_file" => $data["full_path"],
			"yearly_upload_file_name" => $data["file_name"],
			"yearly_upload_file_extension" => $data["file_ext"],
			"metadata_value" => $data["metadata"],
		);

		//Check document already uploaded
		$this->db->where("document_id", $data["document_id"]);
		$this->db->where("affiliate_id", $data["affiliate_id"]);
		$this->db->where("document_year", $data["year"]);

		$query = $this->db->get('yearly_document_status');

		$row = $query->row_array();
		
		if (isset($row) && ($row['document_id'] != 14))
		{
			//Delete already existing file
			$path = FCPATH . $row["yearly_upload_file"];
			if(file_exists($row["yearly_upload_file"]))
			{
				unlink(FCPATH . $row["yearly_upload_file"]);
			}
			
			//Update the new details
			$this->db->where("yearly_d_id", $row["yearly_d_id"]);
			
			if( $this->db->update('yearly_document_status', $insert_data) )
			{
				return $row["yearly_d_id"];
			}
			else
			{
				return FALSE;
			}
		}
		else if( $this->db->insert('yearly_document_status', $insert_data) ) //Insert new document
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}
	
	/**
	 * add_performance_soundness_document
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_performance_soundness_document($data)
	{
		$insert_data = array(
			"document_id" => $data["document_id"],
			"affiliate_id" => $data["affiliate_id"],
			"document_year" => $data["year"],
			"performance_org_doc_submitted_by" => $data["submitted_by"],
			"performance_org_doc_submitted_date" => date('Y-m-d H:i:s'),
			"performance_org_doc_upload_file" => $data["full_path"],
			"performance_org_doc_upload_file_name" => $data["file_name"],
			"performance_org_doc_upload_file_extension" => $data["file_ext"],
			"metadata_value" => $data["metadata"]
		);

		if( $this->db->insert('performance_org_sndns_document_status', $insert_data) )
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * add_performance_vitality_document
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_performance_vitality_document($data)
	{
		$insert_data = array(
			"document_id" => $data["document_id"],
			"affiliate_id" => $data["affiliate_id"],
			"document_year" => $data["year"],
			"performance_vitality_submitted_by" => $data["submitted_by"],
			"performance_vitality_submitted_date" => date('Y-m-d H:i:s'),
			"performance_vitality_upload_file" => $data["full_path"],
			"performance_vitality_upload_file_name" => $data["file_name"],
			"performance_vitality_upload_file_extension" => $data["file_ext"],
			"metadata_value" => $data["metadata"]
		);

		if( $this->db->insert('performance_vitality_document_status', $insert_data) )
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * add_performance_mission_document
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_performance_mission_document($data)
	{
		$insert_data = array(
			"document_id" => $data["document_id"],
			"affiliate_id" => $data["affiliate_id"],
			"document_year" => $data["year"],
			"performance_im_mi_submitted_by" => $data["submitted_by"],
			"performance_im_mi_submitted_date" => date('Y-m-d H:i:s'),
			"performance_im_mi_upload_file" => $data["full_path"],
			"performance_im_mi_upload_file_name" => $data["file_name"],
			"performance_im_mi_upload_file_extension" => $data["file_ext"],
			"metadata_value" => $data["metadata"]
		);

		if( $this->db->insert('performance_impli_mission_document_status', $insert_data) )
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * add_self_assessment_document
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_self_assessment_document($data)
	{
		$insert_data = array(
			"affiliate_id" => $data["affiliate_id"],
			"assessment_start_year" => $data["assessment_start_year"],
			"assessment_end_year" => $data["assessment_end_year"],
			"document_name" => $data["document_name"],
			"document_path" => $data["full_path"]
		);

		if( $this->db->insert('self_assessment', $insert_data) )
		{
			return $this->db->insert_id();
		}
		else
		{
			return FALSE;
		}
	}

	/**
	 * get monthly_compliance_status
	 *
	 * @return array monthly compliance
	 */
	public function monthly_compliance_status($filterWMonth,$filterWyear)
	{
		$this->db->select('*');
		$this->db->from('affiliate_compliance_status_monthly as acsm');
		$this->db->join('status_flags as sf', 'sf.id = acsm.compliance_status');
		$this->db->where('acsm.affiliate_id =',$this->session->affiliate_id);
		$this->db->where('acsm.year',$filterWyear);
		$this->db->where('acsm.month',$filterWMonth);
		$this->db->order_by('acsm.month' , 'desc');
		$query = $this->db->get(); 
		$resp = $query->result_array();
		
	    return $resp;
	}

    /**
	 * get quarterly compliance status
	 *
	 * @return array uarterly compliance 
	 */
	public function quarterly_compliance_status($quarter,$filterWyear)
	{
		$this->db->select('*');
		$this->db->from('affiliate_compliance_status_quarterly as acsq');
		$this->db->join('status_flags as sf', 'sf.id = acsq.compliance_status');
		$this->db->where('acsq.affiliate_id =',$this->session->affiliate_id);
		$this->db->where('acsq.year', $filterWyear);
		$this->db->where('acsq.quarter', $quarter);
		$this->db->order_by('acsq.quarter' , 'desc');
		$query = $this->db->get(); 
		$resp = $query->result_array();
	    return $resp;
	}

    /**
	 * get yearly compliance status
	 *
	 * @return array yearly compliance 
	 */
	public function yearly_compliance_status($year)
	{
		$this->db->select('*');
		$this->db->from('affiliate_compliance_status_yearly as acsy');
		$this->db->join('status_flags as sf', 'sf.id = acsy.compliance_status');
		$this->db->where('acsy.affiliate_id =',$this->session->affiliate_id);
		$this->db->where('acsy.year =', $year);
		$this->db->order_by('acsy.year' , 'desc');

		$query = $this->db->get(); 
		$resp = $query->result_array();
	    return $resp;
	}

	 /**
	 * get monthly_status
	 *
	 * @return array monthly_status
	 */
	public function monthly_status($filterWMonth, $filterWyear,$documentId)
	{
		$this->db->select('*');
		$this->db->from('documents');
		$this->db->join('monthly_document_status as mds', 'mds.document_id = documents.document_id', 'left');
		$this->db->join('status_flags', 'status_flags.id = mds.monthly_compliance_status','left');
		$this->db->where('mds.affiliate_id', $this->session->affiliate_id);
		$this->db->where('documents.document_id !=', 6);
		$this->db->where('documents.document_id ', $documentId);
		$this->db->where('mds.document_year',$filterWyear);
		$this->db->where_in('mds.document_month', $filterWMonth);
		$this->db->order_by('mds.document_month' , 'desc');
		$query = $this->db->get(); 
		$resp = $query->result_array();

	    return $resp;
	}

	/**
	 * get quarter status
	 *
	 * @return array quarter status
	 */
	public function get_quarter_status($month,$filterWyear,$documentId)
	{
		$this->db->select('*');  
		$this->db->from('documents');
		$this->db->join('quarterly_document_status as qds', 'qds.document_id = documents.document_id', 'left');
		$this->db->join('status_flags', 'status_flags.id = qds.quarterly_compliance_status','left');
		$this->db->where('qds.affiliate_id', $this->session->affiliate_id);
		$this->db->where('qds.document_month =', $month);
		$this->db->where('documents.document_id ', $documentId);
		$this->db->where('qds.document_year ', $filterWyear);
		$this->db->group_by('qds.document_month' , 'desc');
		$query = $this->db->get(); 
		
		$resp = $query->result_array();

	    return $resp;
	}

    /**
	 * get yearly status
	 *
	 * @return array yearly status
	 */
	public function get_yearly_status($year,$documentId)
	{
		$this->db->select('*');  
		$this->db->from('documents');
		$this->db->join('yearly_document_status as yds', 'yds.document_id = documents.document_id', 'left');
		$this->db->join('status_flags', 'status_flags.id = yds.yearly_compliance_status','left');
		$this->db->where('yds.affiliate_id',$this->session->affiliate_id);
		$this->db->where('yds.document_year =', $year);
		$this->db->where('documents.document_id ', $documentId);
		$this->db->group_by('yds.document_year' , 'desc');
		$query = $this->db->get(); 
		$resp = $query->result_array();

	    return $resp;
	}


    /**
	 * get document_metadata_listing
	 *
	 * @return array documents 
	 */
	public function document_metadata_listing()
	{
		$this->db->select('d.document_id, d.document_type_id, d.document_name, dt.document_type');
		$this->db->from('documents d');
		$this->db->join('document_type dt', 'dt.document_type_id = d.document_type_id');
		$this->db->where('d.metadata !=', NULL);
	
		$query = $this->db->get(); 
	    
		return $query->result_array();;
	}

	/**
	 * Get name of document
	 *
	 * @param  int $document_type_id
	 * @return array Name of documents type
	 */
	public function get_documents_type_name($document_type_id)
	{
		$this->db->select('document_type');
		$this->db->where('document_type_id', $document_type_id);
		$result = $this->db->get('document_type');
		$query = $result->row();
		return $query->document_type;
	}

	
	public function get_user_detail($user_id)
	{
		$this->db->select('u.*,u.is_census,u.user_id');
		$this->db->from('users u');
		$this->db->where('u.user_id', $user_id);
		$this->db->where('u.is_deleted', 0);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	* Get first 10 notifications
	*
	* @return array List of all notifications
	*/
   public function get_limited_notification()
   {
	   $this->db->select('*');
	   $this->db->join('users u', 'u.user_id = notification_summary.created_by');
	   $this->db->join('affiliate af', 'af.affiliate_id = notification_summary.affiliate_id');
	   $this->db->join('state st', 'st.stateid = af.state');
	   $this->db->where('created_by !=', $this->session->user_id);
	   $this->db->where('flag', 1);
	   
	   if($this->session->role_id != 1)
	   {
		   $this->db->where('af.affiliate_id =',$this->session->affiliate_id);
	   }
	   
	   $this->db->limit(10);
	   $query = $this->db->get('notification_summary'); 
	   
	   $result = $query->result_array();
	   
	   foreach($result as $key => $row)
	   {
		   $base_url = base_url().'module/affiliate/status/details/' . $row['affiliate_id'] . '?id=' . $row['notification_id'];
		   
		   if($row['document_type_id'] == 1)
		   {
			   $this->db->select('document_month,document_year,doc.document_name');
			   $this->db->from('monthly_document_status');
			   $this->db->join('documents doc', 'doc.document_id = monthly_document_status.document_id');
			   $this->db->where('monthly_document_id', $row['document_id']);

			   $query = $this->db->get();

			   $doc_data = $query->row_array();

			   if($doc_data != NULL)
			   {
				   $result[$key]['month'] = $doc_data['document_month'];
				   $result[$key]['year'] = $doc_data['document_year'];
				   $result[$key]['link'] = $base_url . '&interval=nav-y1&monthly_year='.$doc_data['document_year'].'&month='.$doc_data['document_month'];
				   $result[$key]['doc_name'] = $doc_data['document_name'];

			   }
		   } 
		   else if($row['document_type_id'] == 2)
		   {
			   $this->db->select('document_month,document_year,doc.document_name');
			   $this->db->from('quarterly_document_status');
			   $this->db->join('documents doc', 'doc.document_id = quarterly_document_status.document_id');
			   $this->db->where('quarterly_id', $row['document_id']);

			   $query = $this->db->get();

			   $doc_data = $query->row_array();

			   if($doc_data != NULL)
			   {
				   $result[$key]['quarter'] = $doc_data['document_month'];
				   $result[$key]['year'] = $doc_data['document_year'];
				   $result[$key]['link'] = $base_url . '&interval=nav-y2&quarterly_year='.$doc_data['document_year'].'&quarter='.$doc_data['document_month'];
				   $result[$key]['doc_name'] = $doc_data['document_name'];
			   }
		   }
		   else if($row['document_type_id'] == 3)
		   {
			   $this->db->select('document_year,doc.document_name');
			   $this->db->from('yearly_document_status');
			   $this->db->join('documents doc', 'doc.document_id = yearly_document_status.document_id');
			   $this->db->where('yearly_d_id', $row['document_id']);

			   $query = $this->db->get();

			   $doc_data = $query->row_array();

			   if($doc_data != NULL)
			   {
				   $result[$key]['year'] = $doc_data['document_year'];
				   $result[$key]['link'] = $base_url . '&interval=nav-y3&yearly_year='.$doc_data['document_year'];
				   $result[$key]['doc_name'] = $doc_data['document_name'];
			   }
		   }
	   }

	   return $result;
   }

   /**
   * Get first 10 notifications
   *
   * @return array List of all notifications
   */
  public function get_notification_count()
  {
	  $this->db->select('*');
	  $this->db->join('users u', 'u.user_id = notification_summary.created_by');
	  $this->db->join('affiliate af', 'af.affiliate_id = notification_summary.affiliate_id');
	  $this->db->join('state st', 'st.stateid = af.state');
	  $this->db->where('created_by !=', $this->session->user_id);
	  $this->db->where('flag', 1);
	  
	  if($this->session->role_id != 1)
	  {
		  $this->db->where('af.affiliate_id =',$this->session->affiliate_id);
	  }

	  $query = $this->db->get('notification_summary'); 
	  $row_count = $query->num_rows();	

	  return $row_count;
  }

}
