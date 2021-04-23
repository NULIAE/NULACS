<?php
/**
 * Assessment_model
 * */
class Assessment_model extends CI_Model 
{	

	
   /**
	 * get criteria_question
	 *
	 * @return array criteria_question 
	 */
	public function criteria_question($criteria,$standard)
	{
		$this->db->select('pa.id as cid, pa.criteria, pa.standard, pa.question, paa.answers');
		$this->db->from('performance_assesment pa');
		$this->db->join('performance_assesment_answers paa', 'paa.question_id = pa.id','left');

		$this->db->where('pa.criteria', $criteria);
		$this->db->where('pa.standard', $standard);
	
		$query = $this->db->get(); 
	    return $query->row();
	}


  /**
	* get criteria_answers
	*
	* @return array criteria_answers 
	*/
	public function criteria_answers($data)
	{
		$flag='';
		if(isset($data['userId']) && !empty($data['userId'])){
			$userId = $data['userId'];
			$flag =0;
		}else{
			$userId =NULL;
			$flag =1;
		}
		$this->db->select('id');
		$this->db->from('performance_assesment_answers');
		$wCondition = array('question_id =' => $data['criteriaId'],
							' affiliate_id =' => $data['affiliateId'],
							'self_assessment_id' =>$data['selfAssessmentId'],
							'user_id' =>$userId						
						);
		$this->db->where($wCondition);
		$query = $this->db->get(); 


	if($query->num_rows() == 0){
		$insert_data = array(
			"answers" => json_encode($data),
			"question_id" => $data['criteriaId'],
			"affiliate_id" =>  $data['affiliateId'],
			'self_assessment_id' =>$data['selfAssessmentId'],
			'created_by'=> $this->session->affiliate_id,
			'year'=>  date("Y"), 
			'created'=>date("m-d-Y"),
			'last_update'=>date("m-d-Y"),
			'user_id'=>$userId,
			'flag'=>$flag,
		);
	 
		$this->db->insert('performance_assesment_answers', $insert_data);
		
		if(empty($userId)){
			$update_flag = array("flag" =>1);
			$this->db->where('self_assessment_id',  $data['selfAssessmentId']);
			$this->db->update('performance_assesment_answers', $update_flag);
		}
	}else{

		$update_data = array(
			"answers" => json_encode($data),
			'last_update'=>date("m-d-Y"),
		);
		
		$this->db->where('question_id', $data['criteriaId']);
		$this->db->where('affiliate_id',  $data['affiliateId']);
		$this->db->where('self_assessment_id',  $data['selfAssessmentId']);
		$this->db->where('user_id',$userId);


		$this->db->update('performance_assesment_answers', $update_data);
		if(empty($userId)){
			$update_flag = array("flag" =>1);
			$this->db->where('self_assessment_id',  $data['selfAssessmentId']);
			$this->db->update('performance_assesment_answers', $update_flag);
		}
		
	}


	}

   /**
	* get document_listing
	*
	* @return array document_listing 
	*/
	public function criteria_answers_view($data)
	{
		$this->db->select('*');
		$this->db->from('performance_assesment_answers');
		$this->db->where('self_assessment_id', $data['selfAssessmentId']);
		$this->db->where('affiliate_id', $data['affiliateId']);
		if(isset($data['userId']) && !empty($data['userId'])){
			$this->db->where('user_id', $data['userId']);
		}else{
			$where_cond = "user_id is  NULL";
			$this->db->where($where_cond);
		}

		$query = $this->db->get(); 
		return $query->result_array();
	}

  /**
	* get assessment rating
	*
	* @return array rating 
	*/
	public function rating($selfAssessmentId,$affiliateId,$userId)
	{
		$this->db->select('*');
		$this->db->from('performance_assesment_answers');
		$this->db->where('self_assessment_id', $selfAssessmentId);
		$this->db->where('affiliate_id', $affiliateId);
		if(isset($userId) && !empty($userId)){
			$this->db->where('user_id', $userId);
		}else{
			$where_cond = "user_id is  NULL";
			$this->db->where($where_cond);
		}
		$query = $this->db->get(); 

		return $query->result_array();
	}
	
   /**
	* get assessment_listing
	*
	* @return array assessment_listing 
	*/
	public function assessment_listing($data)
	{
		$this->db->select('*, sa.self_assessment_id as sid, sa.affiliate_id as affiliate_id, paa.form_status as formstatus, paa.user_id as user_id_check');
		$this->db->from('self_assessment sa');
		$this->db->join('performance_assesment_answers paa', 'paa.self_assessment_id = sa.self_assessment_id','left');
		$this->db->join('affiliate a', 'a.affiliate_id = sa.affiliate_id','left');
		$this->db->join('state s', 's.stateid = a.state','left');
		if(isset($this->session->role_id ) && $this->session->role_id != 1 ){ 
			$this->db->where('sa.affiliate_id', $this->session->affiliate_id);
		}
		if(isset($data['affiliate_id']) && !empty($data['affiliate_id'])){
			$this->db->where('sa.affiliate_id', $data['affiliate_id']);
		}
		if(isset($data['performance_assessment_from']) && !empty($data['performance_assessment_from'])){
			$this->db->where('sa.assessment_start_year >=', $data['performance_assessment_from']);
			// $this->db->where('s.assessment_start_year', $data['performance_assessment_from']);
		}
		if(isset($data['performance_assessment_to'])&& !empty($data['performance_assessment_to'])){
			$this->db->where('sa.assessment_end_year <=', $data['performance_assessment_to']);
			// $this->db->where('s.assessment_end_year',   $data['performance_assessment_to']);
		}
		 
		$this->db->order_by('sa.self_assessment_id','desc');
		$this->db->limit(5); 
		$this->db->group_by('sa.self_assessment_id');
		$query = $this->db->get(); 

		return $query->result_array();
	}

	/**
	* get affiliate_details
	*
	* @return array affiliate_details 
	*/
	public function affiliate_details($data)
	{
		$this->db->select('*');
		$this->db->from('self_assessment sa');
		$this->db->join('affiliate a', 'a.affiliate_id = sa.affiliate_id','left');
		$this->db->join('state s', 's.stateid = a.state','left');
		if(isset($this->session->role_id ) && $this->session->role_id == 3 || $this->session->role_id == 2 ){ 
			$this->db->where('sa.affiliate_id', $this->session->affiliate_id);
		}
		if(isset($data['aid']) && !empty($data['aid'])){
			$this->db->where('sa.affiliate_id',   $data['aid']);
		}
		if(isset($data['sid']) && !empty($data['sid'])){
			$this->db->where('sa.self_assessment_id',   $data['sid']);
		}
		$this->db->group_by('sa.affiliate_id');
		$query = $this->db->get(); 
		return $query->result_array();
	}

		/**
	* get get_assessement_answers_details
	*
	* @return array get_assessement_answers_details 
	*/
	public function get_assessement_answers_details()
	{
		$this->db->select('*');
		$this->db->from('self_assessment sa');
		$this->db->join('performance_assesment_answers paa', 'paa.self_assessment_id = sa.self_assessment_id','join');
		$this->db->group_by('sa.self_assessment_id');
		$query = $this->db->get(); 
		return $query->result_array();
	}
	
   /**
	* get save 
	*
	* @return array save form 
	*/
	public function saveform($data)
	{
		$update_data = array(
			"form_status" => "yes",
		);
		
		$this->db->where('affiliate_id',  $data['affiliateId']);
		$this->db->where('self_assessment_id',  $data['selfAssessmentId']);
		if(isset( $data['userId']) && !empty( $data['userId'])){
			$this->db->where('user_id',  $data['userId']);
		}else{
			$where_cond = "user_id is  NULL";
			$this->db->where($where_cond);
		}

		$this->db->update('performance_assesment_answers', $update_data);
	}

	/**
	 * add_self_assessment_data
	 *
	 * @param  array $data
	 * @return void
	 */
	public function add_self_assessment_data($data)
	{
		$insert_data = array(
			"affiliate_id" => $data["affiliate_id"],
			"assessment_start_year" => $data["assessment_from_year"],
			"assessment_end_year" => $data["assessment_end_year"],
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
	
}
