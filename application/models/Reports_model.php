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
	public function get_ind_affiliate_report($filter = NULL){
        $fromQuery = $toQuery = NULL;
		if(isset($filter['affiliate']) && ($filter['affiliate'] != "")){
            $sql = "SELECT * FROM key_indicators WHERE affiliate_id=".$filter['affiliate'];
            if(isset($filter['from_quarter']) && ($filter['from_quarter'] != "") && isset($filter['from_year']) && ($filter['from_year'] != ""))
            {
                $fromQuery = " AND (year > ".$filter['from_year']." OR (quarter >= ".$filter['from_quarter']." AND year = ".$filter['from_year']."))";
            }
            if(isset($filter['to_quarter']) && ($filter['to_quarter'] != "") && isset($filter['to_year']) && ($filter['to_year'] != ""))
            {
                $toQuery .= " AND id IN (SELECT id FROM key_indicators WHERE affiliate_id=".$filter['affiliate']." AND (year < ".$filter['to_year']." OR (quarter <= ".$filter['to_quarter']." AND year = ".$filter['to_year'].")))";
            }

            if(isset($fromQuery) && isset($toQuery))
            {
                $sql .= $fromQuery . $toQuery;
            }
            else if(isset($fromQuery))
            {
                $sql .= $fromQuery;
            }
            else if(isset($toQuery))
            {
                $sql .= $toQuery;
            }
            $sql .= " ORDER BY year DESC, quarter DESC";
			
            $query = $this->db->query($sql);
			
            return  $query->result_array();
		}
	}
}
