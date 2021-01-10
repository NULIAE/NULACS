<?php
/**
 * DocumentSearch_model
 * */
class DocumentSearch_model extends CI_Model 
{	
	/**
	 * Filter monthly documents
	 *
	 * @param  mixed $data
	 * @return array
	 */
	public function get_monthly_documents($data, $document_id = NULL)
	{
		$this->db->select('doc.document_name,a.city,stateabbreviation as state,monthly_submitted_date as submitted_on,monthly_upload_file as file_path,monthly_upload_file_name as file_name');
		$this->db->from('documents doc');
		$this->db->join('monthly_document_status mds', 'mds.document_id = doc.document_id');
		$this->db->join('affiliate a', 'mds.affiliate_id=a.affiliate_id');
		$this->db->join('state', 'state.stateid = a.state');
		
		if(isset($document_id))
		{
			$this->db->where('mds.document_id', $document_id);
		}
		else if(!empty($data['document']))
		{
			$this->db->where_in('mds.document_id', $data['document']);
		}

		if($data['docstatus'] !== "")
		{
			$this->db->where('mds.monthly_compliance_status', $data['docstatus']);
		}

		if($data['month'] !== "")
		{
			$this->db->where('mds.document_month', $data['month']);
		}

		if($data['year'] !== "")
		{
			$this->db->where('mds.document_year', $data['year']);
		}

		$this->db->order_by('monthly_submitted_date','ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Filter quarterly documents
	 *
	 * @param  mixed $data
	 * @return array
	 */
	public function get_quarterly_documents($data, $document_id = NULL)
	{
		$this->db->select('doc.document_name,a.city,stateabbreviation as state,quarterly_submitted_date as submitted_on,quarterly_upload_file as file_path,quarterly_upload_file_name as file_name');
		$this->db->from('documents doc');
		$this->db->join('quarterly_document_status qds', 'qds.document_id = doc.document_id');
		$this->db->join('affiliate a', 'qds.affiliate_id=a.affiliate_id');
		$this->db->join('state', 'state.stateid = a.state');
		
		if(isset($document_id))
		{
			$this->db->where('qds.document_id', $document_id);
		}
		else if(!empty($data['document']))
		{
			$this->db->where_in('qds.document_id', $data['document']);
		}

		if($data['docstatus'] !== "")
		{
			$this->db->where('qds.quarterly_compliance_status', $data['docstatus']);
		}

		if($data['quarter'] !== "")
		{
			$this->db->where('qds.document_month', $data['quarter']);
		}

		if($data['year'] !== "")
		{
			$this->db->where('qds.document_year', $data['year']);
		}

		$this->db->order_by('quarterly_submitted_date','ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Filter yearly documents
	 *
	 * @param  mixed $data
	 * @return array
	 */
	public function get_yearly_documents($data, $document_id = NULL)
	{
		$this->db->select('doc.document_name,a.city,stateabbreviation as state,yearly_submitted_date as submitted_on,yearly_upload_file as file_path,yearly_upload_file_name as file_name');
		$this->db->from('documents doc');
		$this->db->join('yearly_document_status yds', 'yds.document_id = doc.document_id');
		$this->db->join('affiliate a', 'yds.affiliate_id=a.affiliate_id');
		$this->db->join('state', 'state.stateid = a.state');
		
		if(isset($document_id))
		{
			$this->db->where('yds.document_id', $document_id);
		}
		else if(!empty($data['document']))
		{
			$this->db->where_in('yds.document_id', $data['document']);
		}

		if($data['docstatus'] !== "")
		{
			$this->db->where('yds.yearly_compliance_status', $data['docstatus']);
		}

		if($data['year'] !== "")
		{
			$this->db->where('yds.document_year', $data['year']);
		}

		$this->db->order_by('yearly_submitted_date','ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Filter Organizational Soundness documents
	 *
	 * @param  mixed $data
	 * @return array
	 */
	public function get_organizational_soundness_documents($document_id, $data)
	{
		$this->db->select('doc.document_name,a.city,stateabbreviation as state,performance_org_doc_submitted_date as submitted_on,performance_org_doc_upload_file as file_path,performance_org_doc_upload_file_name as file_name');
		$this->db->from('documents doc');
		$this->db->join('performance_org_sndns_document_status osd', 'osd.document_id = doc.document_id');
		$this->db->join('affiliate a', 'osd.affiliate_id=a.affiliate_id');
		$this->db->join('state', 'state.stateid = a.state');
		$this->db->where('osd.document_id', $document_id);

		if(isset($data['year']))
		{
			$this->db->where('osd.document_year', $data['year']);
		}

		$this->db->order_by('performance_org_doc_submitted_date','ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Filter Organizational Vitality documents
	 *
	 * @param  mixed $data
	 * @return array
	 */
	public function get_organizational_vitality_documents($document_id, $data)
	{
		$this->db->select('doc.document_name,a.city,stateabbreviation as state,performance_vitality_submitted_date as submitted_on,performance_vitality_upload_file as file_path,performance_vitality_upload_file_name as file_name');
		$this->db->from('documents doc');
		$this->db->join('performance_vitality_document_status ovd', 'ovd.document_id = doc.document_id');
		$this->db->join('affiliate a', 'ovd.affiliate_id=a.affiliate_id');
		$this->db->join('state', 'state.stateid = a.state');
		$this->db->where('ovd.document_id', $document_id);

		if(isset($data['year']))
		{
			$this->db->where('ovd.document_year', $data['year']);
		}

		$this->db->order_by('performance_vitality_submitted_date','ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

	/**
	 * Filter Implementation of Mission documents
	 *
	 * @param  mixed $data
	 * @return array
	 */
	public function get_implementation_mission_documents($data)
	{
		$this->db->select('doc.document_name,a.city,stateabbreviation as state,performance_im_mi_submitted_date as submitted_on,performance_im_mi_upload_file as file_path,performance_im_mi_upload_file_name as file_name');
		$this->db->from('documents doc');
		$this->db->join('performance_impli_mission_document_status imd', 'imd.document_id = doc.document_id');
		$this->db->join('affiliate a', 'imd.affiliate_id=a.affiliate_id');
		$this->db->join('state', 'state.stateid = a.state');
		$this->db->where_in('imd.document_id', $data['document']);

		if(isset($data['year']))
		{
			$this->db->where('imd.document_year', $data['year']);
		}

		$this->db->order_by('performance_im_mi_submitted_date','ASC');

		$query = $this->db->get();

		return $query->result_array();
	}

}
