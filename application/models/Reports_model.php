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
        $this->db->select('*, CONCAT(affiliate.city,",",state.stateabbreviation) AS name, key_indicators.affiliate_id as affiliate_id');
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
	public function get_ind_affiliate_report($affiliate, $year = NULL){
		if($affiliate){
			$this->db->select('*');
			$this->db->from('key_indicators');
			$this->db->where('key_indicators.affiliate_id', $affiliate);
			if(isset($year))
				$this->db->where('key_indicators.year', $year); 
			$this->db->order_by("year");
			$this->db->order_by("quarter");
			$query = $this->db->get();
			return  $query->result_array();
		}	
	}
}
