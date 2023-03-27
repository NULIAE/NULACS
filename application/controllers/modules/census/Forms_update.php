<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forms_update extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('CensusForms_model');
    }

    /**
     * Update Contact Information
     *
     */
    public function contactinfo_update()
    {
        //XSS Filter all the input post fields

        $data = $this->input->post(null, true);

        if(!empty($_FILES['photo']['name'])){
            $file = $_FILES['photo'];
            $file_name = $file['name'];

            $data['field_photo_title'] = 'uploads/Documents/'.$file_name;


            $filePath = './uploads/Documents/';
            $config['upload_path'] = $filePath;
            $config['allowed_types'] = '*';

            $this->load->library('upload', $config);

            if(!empty($_FILES['photo']['name'])){
                $this->upload->do_upload('photo');
            }else{
                //
            }
        }

        $report_id = $data['report_id'];

        // To show Enter name of certifier only if status is submitted and in reviewd complete 
        if($data['edit-field-survey-name-of-certifier']=='' || empty($data['edit-field-survey-name-of-certifier'])){
            unset($data['edit-field-survey-name-of-certifier']);
        }

        $status = $message = null;

        if ($this->CensusForms_model->census_report_data_update($report_id, $data)) {

            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
             */

            $status = true;
            $message = 'Contact details updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
            'report_id' => $report_id,
        );

        echo json_encode($response);

    }

    /**
     * Update Status to Review Complete
     *
     */
    public function contactinfo_reviewed_complete()
    {
        $data = $this->input->post(null, true);
        $report_id = $data['report_id'];

        $tab_status =  $this->CensusReport_model->select_tab_statuses($report_id);
        foreach ($tab_status as $status) {
            $array_status[] = $status;
        }
        if(array_unique($array_status) === array('123')) {
            $data['field_census_status'] = 127;
            $this->CensusForms_model->change_tab_status_to_reviewed_complete($report_id);
        }

		$this->db->where('report_id', $report_id);
		$this->db->update('census_report', $data);

        $response = array(
            'success' => "Success",
            'message' => "Success",
            'report_id' => $report_id,
        );

        echo json_encode($response);

    }

    /**
     * Update service area
     *
     */
    public function service_area_update()
    {
        //XSS Filter all the input post fields

        $data = $this->input->post(null, true);

        //check data already exist
        $this->CensusForms_model->service_area_main_update($data['pk_id'], $data['tab_status'], $data['parent_census']);        

        $new = [];
        $arr = [];
        foreach ($data as $key => $value) {
            if (substr($key, 0, 4) === "area") {
                $split = explode('-', $key);
                $arr[$split[1]][$split[2]] = $value;
            }

            if (substr($key, 0, 3) === "new") {
                $split = explode('-', $key);
                $new[$split[1]][$split[2]] = $value;
            }
        }

        $err = 0;
        if (count($arr) > 0) {
            foreach ($arr as $key => $val) {
                $result = $this->CensusForms_model->service_area_update($key, $val);
                if (!$result) {
                    $err++;
                }

            }
        }

        if (count($new) > 0) {
            foreach ($new as $key => $val) {
                $result = $this->CensusForms_model->service_area_insert($val, $data['pk_id']);
                if (!$result) {
                    $err++;
                }

            }
        }

        $status = $message = null;

        if ($err) {
            $status = false;
            $message = 'Something went wrong. Try again later.';
        } else {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
             */

            $status = true;
            $message = 'Service area details updated successfully.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);

    }

    /**
     * Delete service area
     *
     */
    public function service_area_delete()
    {

        $data = $this->input->post(null, true);
        if ($this->CensusForms_model->service_area_delete($data['areaId'])) {
            $status = true;
            $message = 'Deleted successfully.';
        } else {
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }
        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }

    /**
     * Update Community information
     *
     */
    public function community_update()
    {
        //XSS Filter all the input post fields

        $form_data = $this->input->post(null, true);
        $report_id = $form_data['field_parent_census'];
        $status = $message = null;

        $community_relation_id = $this->CensusForms_model->community_data_select($report_id);

        $ad_marketting = [];
        $community_data = [];
        foreach ($form_data as $key => $value) {

            if (substr($key, 0, 29) === "field_method_of_ad_marketing-") {
                $split = explode('-', $key);
                array_push($ad_marketting, $split[1]);
            } else {
                $community_data[$key] = $value;
            }

        }

        $community_data['field_monthly_website_hits'] = str_replace(',','',$community_data['field_monthly_website_hits']);
        
        if ($this->CensusForms_model->community_data_update($community_relation_id, $community_data)) {

            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );
            //Log user activities
            $this->User_model->user_log($log_data);
             */
            if ($this->CensusForms_model->community_ad_marketting_update($report_id, $ad_marketting)) {
                $status = true;
                $message = 'Community relations data updated successfully.';
            } else {
                $status = false;
                $message = 'Some error in Ad-marketing section update.';
            }

        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);

    }

    /**
     * Update employees and board members
     *
     */
    public function employees_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);
        $employee_data = [];
        foreach ($form_data as $key => $value) {
            $employee_data[$key] = $value;
        }
        $employee_data['field_full_time_employees'] = str_replace(',','',$employee_data['field_full_time_employees']);
        $employee_data['field_part_time_employees'] = str_replace(',','',$employee_data['field_part_time_employees']);
        $employee_data['field_average_employee_salary'] = str_replace(',','',$employee_data['field_average_employee_salary']);
        $employee_data['field_number_of_satellite_office'] = str_replace(',','',$employee_data['field_number_of_satellite_office']);
        $employee_data['field_board_white_males'] = str_replace(',','',$employee_data['field_board_white_males']);
        $employee_data['field_board_white_females'] = str_replace(',','',$employee_data['field_board_white_females']);
        $employee_data['field_board_white_total'] = str_replace(',','',$employee_data['field_board_white_total']);
        $employee_data['field_board_hispanic_males'] = str_replace(',','',$employee_data['field_board_hispanic_males']);
        $employee_data['field_board_hispanic_females'] = str_replace(',','',$employee_data['field_board_hispanic_females']);
        $employee_data['field_board_hispanic_total'] = str_replace(',','',$employee_data['field_board_hispanic_total']);
        $employee_data['field_board_asian_am_males'] = str_replace(',','',$employee_data['field_board_asian_am_males']);
        $employee_data['field_board_asian_am_females'] = str_replace(',','',$employee_data['field_board_asian_am_females']);
        $employee_data['field_board_asian_am_total'] = str_replace(',','',$employee_data['field_board_asian_am_total']);
        $employee_data['field_board_native_am_males'] = str_replace(',','',$employee_data['field_board_native_am_males']);
        $employee_data['field_board_native_am_females'] = str_replace(',','',$employee_data['field_board_native_am_females']);
        $employee_data['field_board_native_am_total'] = str_replace(',','',$employee_data['field_board_native_am_total']);
        $employee_data['field_board_african_am_males'] = str_replace(',','',$employee_data['field_board_african_am_males']);
        $employee_data['field_board_african_am_females'] = str_replace(',','',$employee_data['field_board_african_am_females']);
        $employee_data['field_board_african_am_total'] = str_replace(',','',$employee_data['field_board_african_am_total']);
        $employee_data['field_board_other_males'] = str_replace(',','',$employee_data['field_board_other_males']);
        $employee_data['field_board_other_females'] = str_replace(',','',$employee_data['field_board_other_females']);
        $employee_data['field_board_other_total'] = str_replace(',','',$employee_data['field_board_other_total']);
        $employee_data['field_board_member_grand_total'] = str_replace(',','',$employee_data['field_board_member_grand_total']);

        $report_id = $form_data['field_parent_census'];
        $status = $message = null;

        if ($this->CensusForms_model->employee_data_update($report_id, $employee_data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
             */

            $status = true;
            $message = 'Employees and Board Members data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }

    /**
     * Create Census Report
     *
     */
    public function newreportsave()
    {
        //XSS Filter all the input post fields

        $data = $this->input->post(null, true);

        $file = $_FILES['photo'];
        $file_name = $file['name'];

        $data['field_photo_title'] = './uploads/Documents/'.$file_name;

        $filePath = './uploads/Documents/';
        $config['upload_path'] = $filePath;
		$config['allowed_types'] = '*';

        $this->load->library('upload', $config);

        if(!empty($_FILES['photo']['name'])){
            $this->upload->do_upload('photo');
        }else{
            //
        }

        //$report_id= $data['report_id'];

        $status = $message = null;
        $reportid = $this->CensusForms_model->census_report_add($data);

        if ($reportid) {

            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
             */

            $status = true;
            $message = 'Contact details updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
            'reportid' => $reportid,
        );

        echo json_encode($response);

    }

    /**
     * Update revenue data
     *
     */
    public function revenue_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);
        //print_r($form_data);

        $exists = $this->CensusForms_model->check_revenue_exists($form_data['field_parent_census']);
        //print_r($exists);

        if($exists){

            //Update
            $new = [];
            $arr = [];
            $venture_id = [];
            //echo "Last revenue".count($form_data)."<br>";
            foreach ($form_data as $key => $value) {
                if (substr($key, 0, 9) === "ventureid") {
                    $split = explode('-', $key);
                    $arr[$split[1]][$split[2]] = str_replace(',','',$value);
                    unset($form_data[$key]);
                }
                if (substr($key, 0, 3) === "new") {
                    $split = explode('-', $key);
                    $new[$split[1]][$split[2]] = str_replace(',','',$value);
                    unset($form_data[$key]);
                }
            }

            $err = 0;
            if (count($arr) > 0) {
                foreach ($arr as $key => $val) {
                    // print_r($key);
                    // echo "Data";
                    // print_r($arr[$key]);
                    // echo "<br>";
                    $result = $this->CensusForms_model->revenue_venture_update($key, $arr[$key]);
                    if (!$result) {
                        $err++;
                    }
                }
            }
            if (count($new) > 0) {
                foreach ($new as $key => $val) {
                    //echo "<br>".$key."---".$val."<br>";
                    //print_r($new[$key]); echo "<br>";
                    $result = $this->CensusForms_model->revenue_venture_insert($new[$key],$form_data['pk_id']);
                    //print_r($result);
                    if (!$result) {
                        $err++;
                    }
    
                }
            }
                //echo "Last revenue".count($form_data)."<br>";

        $revenue_data = [];

        foreach ($form_data as $key => $value) {
            $revenue_data[$key] = $value;
        }

        $data = array(
            'field_revenue_investment' => str_replace(',','',$revenue_data['field_revenue_investment']),
            'field_revenue_corporations' => str_replace(',','',$revenue_data['field_revenue_corporations']),
            'field_revenue_foundations' => str_replace(',','',$revenue_data['field_revenue_foundations']),
            'field_revenue_individual_members' => str_replace(',','',$revenue_data['field_revenue_individual_members']),
            'field_revenue_special_events' => str_replace(',','',$revenue_data['field_revenue_special_events']),
            'field_revenue_united_way' => str_replace(',','',$revenue_data['field_revenue_united_way']),
            'field_revenue_federal' => str_replace(',','',$revenue_data['field_revenue_federal']),
            'field_revenue_state_local' => str_replace(',','',$revenue_data['field_revenue_state_local']),
            'field_revenue_nul' => str_replace(',','',$revenue_data['field_revenue_nul']),
            'field_revenue_purpose_of_funding' => $revenue_data['field_revenue_purpose_of_funding'],
            'field_revenue_other' => str_replace(',','',$revenue_data['field_revenue_other']),
            'field_revenue_total_budget' => str_replace(',','',$revenue_data['field_revenue_total_budget']),
            'field_revenue_endowment_amount' => str_replace(',','',$revenue_data['field_revenue_endowment_amount']),
            'field_revenue_has_endowment' => $revenue_data['field_revenue_has_endowment'],
            'field_tab_status' => $revenue_data['field_tab_status'],
            'field_parent_census' => $revenue_data['field_parent_census'],
            'field_legacy_budgetnulfunding' => str_replace(',','',$revenue_data['field_legacy_budgetnulfunding']),
            'pk_id' => $revenue_data['pk_id'],
        );

        $pk_id = $form_data['pk_id'];
        $status = $message = null;
        unset($revenue_data["pk_id"]);

        if ($this->CensusForms_model->revenue_data_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
             */

            $status = true;
            $message = 'Revenue data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }


        }
        // else{

        //     echo "Data not found to update ";

        // }
        // die();


        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }

    /**
     * Update expenditure data
     *
     */
    public function expenditure_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $expenditure_data = [];
        $own_rent = [];

        foreach ($form_data as $key => $value) {

            if (substr($key, 0, 23) === "edit-field-own-or-rent-") {
                array_push($own_rent, $value);
            } else {
                $expenditure_data[$key] = $value;
            }

        }

        $data = array(
            'field_total_expenditures' => str_replace(',','',$expenditure_data['field_total_expenditures']),
            'field_a_salaries_wages' => str_replace(',','',$expenditure_data['field_a_salaries_wages']),
            'field_b_fringe_benefits' => str_replace(',','',$expenditure_data['field_b_fringe_benefits']),
            'field_c_professional_fees' => str_replace(',','',$expenditure_data['field_c_professional_fees']),
            'field_d_travel' => str_replace(',','',$expenditure_data['field_d_travel']),
            'field_e_postage_freight' => str_replace(',','',$expenditure_data['field_e_postage_freight']),
            'field_f_insurance' => str_replace(',','',$expenditure_data['field_f_insurance']),
            'field_g_interest_payments' => str_replace(',','',$expenditure_data['field_g_interest_payments']),
            'field_h_dues_subscription_regist' => str_replace(',','',$expenditure_data['field_h_dues_subscription_regist']),
            'field_i_depreciation' => str_replace(',','',$expenditure_data['field_i_depreciation']),
            'field_j_taxes_including_property' => str_replace(',','',$expenditure_data['field_j_taxes_including_property']),
            'field_k_utilities' => str_replace(',','',$expenditure_data['field_k_utilities']),
            'field_l_equipment_space_rental' => str_replace(',','',$expenditure_data['field_l_equipment_space_rental']),
            'field_m_goods_and_services' => str_replace(',','',$expenditure_data['field_m_goods_and_services']),
            'field_n_rent_mortgage_payments' => str_replace(',','',$expenditure_data['field_n_rent_mortgage_payments']),
            'field_o_other' => str_replace(',','',$expenditure_data['field_o_other']),
            'field_number_properties_owned' => str_replace(',','',$expenditure_data['field_number_properties_owned']),
            'field_number_properties_rented' => str_replace(',','',$expenditure_data['field_number_properties_rented']),
            'field_market_value_of_property' => str_replace(',','',$expenditure_data['field_market_value_of_property']),
            'field_capital_budget' => $expenditure_data['field_capital_budget'],
            'field_capital_budget_amount' => str_replace(',','',$expenditure_data['field_capital_budget_amount']),
            'field_tab_status' => $expenditure_data['field_tab_status'],
            'field_parent_census' => $expenditure_data['field_parent_census'],
            'pk_id' => $expenditure_data['pk_id'],
        );

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->expenditure_data_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
             */

            if ($this->CensusForms_model->expenditure_ownrent_update($pk_id, $own_rent)) {
                $status = true;
                $message = 'Expenditure data updated successfully.';
            } else {
                $status = false;
                $message = 'Some error in Ad-marketing section update.';
            }
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }

    /**
     * Update civic data
     *
     */
    public function civic_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $civic_data = [];

        foreach ($form_data as $key => $value) {
            $civic_data[$key] = $value;
        }

        $civic_data['field_comm_org_total'] = str_replace(',','',$civic_data['field_comm_org_total']);
        $civic_data['field_comm_org_white_male'] = str_replace(',','',$civic_data['field_comm_org_white_male']);
        $civic_data['field_comm_org_white_female'] = str_replace(',','',$civic_data['field_comm_org_white_female']);
        $civic_data['field_comm_org_african_am_male'] = str_replace(',','',$civic_data['field_comm_org_african_am_male']);
        $civic_data['field_comm_org_african_am_female'] = str_replace(',','',$civic_data['field_comm_org_african_am_female']);
        $civic_data['field_comm_org_asian_am_male'] = str_replace(',','',$civic_data['field_comm_org_asian_am_male']);
        $civic_data['field_comm_org_hispanic_male'] = str_replace(',','',$civic_data['field_comm_org_hispanic_male']);
        $civic_data['field_comm_org_asian_am_female'] = str_replace(',','',$civic_data['field_comm_org_asian_am_female']);
        $civic_data['field_comm_org_hispanic_female'] = str_replace(',','',$civic_data['field_comm_org_hispanic_female']);
        $civic_data['field_comm_org_native_am_male'] = str_replace(',','',$civic_data['field_comm_org_native_am_male']);
        $civic_data['field_comm_org_other_male'] = str_replace(',','',$civic_data['field_comm_org_other_male']);
        $civic_data['field_comm_org_other_female'] = str_replace(',','',$civic_data['field_comm_org_other_female']);
        $civic_data['field_comm_org_native_am_female'] = str_replace(',','',$civic_data['field_comm_org_native_am_female']);
        $civic_data['field_comm_org_societal_impact'] = str_replace(',','',$civic_data['field_comm_org_societal_impact']);
        $civic_data['field_advocacy_total'] = str_replace(',','',$civic_data['field_advocacy_total']);
        $civic_data['field_voter_total'] = str_replace(',','',$civic_data['field_voter_total']);
        $civic_data['field_forums_total'] = str_replace(',','',$civic_data['field_forums_total']);
        $civic_data['field_crja_total'] = str_replace(',','',$civic_data['field_crja_total']);
        $civic_data['field_police_total'] = str_replace(',','',$civic_data['field_police_total']);
        $civic_data['field_voter_societal_impact'] = str_replace(',','',$civic_data['field_voter_societal_impact']);
        $civic_data['field_forums_societal_impact'] = str_replace(',','',$civic_data['field_forums_societal_impact']);
        $civic_data['field_crja_societal_impact'] = str_replace(',','',$civic_data['field_crja_societal_impact']);
        $civic_data['field_police_societal_impact'] = str_replace(',','',$civic_data['field_police_societal_impact']);
        $civic_data['field_advocacy_societal_impact'] = str_replace(',','',$civic_data['field_advocacy_societal_impact']);

        $civic_data['field_voter_white_male'] = str_replace(',','',$civic_data['field_voter_white_male']);
        $civic_data['field_voter_white_female'] = str_replace(',','',$civic_data['field_voter_white_female']);
        $civic_data['field_voter_hispanic_male'] = str_replace(',','',$civic_data['field_voter_hispanic_male']);
        $civic_data['field_voter_hispanic_female'] = str_replace(',','',$civic_data['field_voter_hispanic_female']);
        $civic_data['field_voter_asian_am_male'] = str_replace(',','',$civic_data['field_voter_asian_am_male']);
        $civic_data['field_voter_asian_am_female'] = str_replace(',','',$civic_data['field_voter_asian_am_female']);
        $civic_data['field_voter_native_am_male'] = str_replace(',','',$civic_data['field_voter_native_am_male']);
        $civic_data['field_voter_native_am_female'] = str_replace(',','',$civic_data['field_voter_native_am_female']);
        $civic_data['field_voter_african_am_male'] = str_replace(',','',$civic_data['field_voter_african_am_male']);
        $civic_data['field_voter_african_am_female'] = str_replace(',','',$civic_data['field_voter_african_am_female']);
        $civic_data['field_voter_other_male'] = str_replace(',','',$civic_data['field_voter_other_male']);
        $civic_data['field_voter_other_female'] = str_replace(',','',$civic_data['field_voter_other_female']);
        
        $civic_data['field_forums_white_male'] = str_replace(',','',$civic_data['field_forums_white_male']);
        $civic_data['field_forums_white_female'] = str_replace(',','',$civic_data['field_forums_white_female']);
        $civic_data['field_forums_hispanic_male'] = str_replace(',','',$civic_data['field_forums_hispanic_male']);
        $civic_data['field_forums_hispanic_female'] = str_replace(',','',$civic_data['field_forums_hispanic_female']);
        $civic_data['field_forums_asian_am_male'] = str_replace(',','',$civic_data['field_forums_asian_am_male']);
        $civic_data['field_forums_asian_am_female'] = str_replace(',','',$civic_data['field_forums_asian_am_female']);
        $civic_data['field_forums_native_am_male'] = str_replace(',','',$civic_data['field_forums_native_am_male']);
        $civic_data['field_forums_native_am_female'] = str_replace(',','',$civic_data['field_forums_native_am_female']);
        $civic_data['field_forums_african_am_male'] = str_replace(',','',$civic_data['field_forums_african_am_male']);
        $civic_data['field_forums_african_am_female'] = str_replace(',','',$civic_data['field_forums_african_am_female']);
        $civic_data['field_forums_other_male'] = str_replace(',','',$civic_data['field_forums_other_male']);
        $civic_data['field_forums_other_female'] = str_replace(',','',$civic_data['field_forums_other_female']);

        $civic_data['field_crja_white_male'] = str_replace(',','',$civic_data['field_crja_white_male']);
        $civic_data['field_crja_white_female'] = str_replace(',','',$civic_data['field_crja_white_female']);
        $civic_data['field_crja_hispanic_male'] = str_replace(',','',$civic_data['field_crja_hispanic_male']);
        $civic_data['field_crja_hispanic_female'] = str_replace(',','',$civic_data['field_crja_hispanic_female']);
        $civic_data['field_crja_asian_am_male'] = str_replace(',','',$civic_data['field_crja_asian_am_male']);
        $civic_data['field_crja_asian_am_female'] = str_replace(',','',$civic_data['field_crja_asian_am_female']);
        $civic_data['field_crja_native_am_male'] = str_replace(',','',$civic_data['field_crja_native_am_male']);
        $civic_data['field_crja_native_am_female'] = str_replace(',','',$civic_data['field_crja_native_am_female']);
        $civic_data['field_crja_african_am_male'] = str_replace(',','',$civic_data['field_crja_african_am_male']);
        $civic_data['field_crja_african_am_female'] = str_replace(',','',$civic_data['field_crja_african_am_female']);
        $civic_data['field_crja_other_male'] = str_replace(',','',$civic_data['field_crja_other_male']);
        $civic_data['field_crja_other_female'] = str_replace(',','',$civic_data['field_crja_other_female']);

        $civic_data['field_police_white_male'] = str_replace(',','',$civic_data['field_police_white_male']);
        $civic_data['field_police_white_female'] = str_replace(',','',$civic_data['field_police_white_female']);
        $civic_data['field_police_hispanic_male'] = str_replace(',','',$civic_data['field_police_hispanic_male']);
        $civic_data['field_police_hispanic_female'] = str_replace(',','',$civic_data['field_police_hispanic_female']);
        $civic_data['field_police_asian_am_male'] = str_replace(',','',$civic_data['field_police_asian_am_male']);
        $civic_data['field_police_asian_am_female'] = str_replace(',','',$civic_data['field_police_asian_am_female']);
        $civic_data['field_police_native_am_male'] = str_replace(',','',$civic_data['field_police_native_am_male']);
        $civic_data['field_police_native_am_female'] = str_replace(',','',$civic_data['field_police_native_am_female']);
        $civic_data['field_police_african_am_male'] = str_replace(',','',$civic_data['field_police_african_am_male']);
        $civic_data['field_police_african_am_female'] = str_replace(',','',$civic_data['field_police_african_am_female']);
        $civic_data['field_police_other_male'] = str_replace(',','',$civic_data['field_police_other_male']);
        $civic_data['field_police_other_female'] = str_replace(',','',$civic_data['field_police_other_female']);

        $civic_data['field_advocacy_white_male'] = str_replace(',','',$civic_data['field_advocacy_white_male']);
        $civic_data['field_advocacy_white_female'] = str_replace(',','',$civic_data['field_advocacy_white_female']);
        $civic_data['field_advocacy_hispanic_male'] = str_replace(',','',$civic_data['field_advocacy_hispanic_male']);
        $civic_data['field_advocacy_hispanic_female'] = str_replace(',','',$civic_data['field_advocacy_hispanic_female']);
        $civic_data['field_advocacy_asian_am_male'] = str_replace(',','',$civic_data['field_advocacy_asian_am_male']);
        $civic_data['field_advocacy_asian_am_female'] = str_replace(',','',$civic_data['field_advocacy_asian_am_female']);
        $civic_data['field_advocacy_native_am_male'] = str_replace(',','',$civic_data['field_advocacy_native_am_male']);
        $civic_data['field_advocacy_native_am_female'] = str_replace(',','',$civic_data['field_advocacy_native_am_female']);
        $civic_data['field_advocacy_african_am_male'] = str_replace(',','',$civic_data['field_advocacy_african_am_male']);
        $civic_data['field_advocacy_african_am_female'] = str_replace(',','',$civic_data['field_advocacy_african_am_female']);
        $civic_data['field_advocacy_other_male'] = str_replace(',','',$civic_data['field_advocacy_other_male']);
        $civic_data['field_advocacy_other_female'] = str_replace(',','',$civic_data['field_advocacy_other_female']);



        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->civic_data_update($pk_id, $civic_data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
             */

            $status = true;
            $message = 'Civic data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }		

   /**
     * Emergency relief data 
     *
     */
    public function emergency_relief_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $emergency = [];

        foreach ($form_data as $key => $value) {
            $emergency[$key] = $value;
        }

        $emergency['field_relief_total_served']   = str_replace(',','',$emergency['field_relief_total_served']);
        $emergency['field_relief_ed_served']      = str_replace(',','',$emergency['field_relief_ed_served']);
        $emergency['field_relief_employ_served']  = str_replace(',','',$emergency['field_relief_employ_served']);
        $emergency['field_relief_health_served']  = str_replace(',','',$emergency['field_relief_health_served']);
        $emergency['field_relief_civic_served']   = str_replace(',','',$emergency['field_relief_civic_served']);
        $emergency['field_relief_justice_served'] = str_replace(',','',$emergency['field_relief_justice_served']);

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->emergency_data_update($pk_id, $emergency)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Emergency Relief data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }	
    
   /**
     * Contact data 
     *
     */
    public function contact_data_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $contact = [];

        foreach ($form_data as $key => $value) {
            $contact[$key] = $value;
        }

        $data = array(
            'field_direct_white_male'         => str_replace(',','',$contact['field_direct_white_male']),
            'field_direct_white_female'       => str_replace(',','',$contact['field_direct_white_female']),
            'field_direct_hispanic_male'      => str_replace(',','',$contact['field_direct_hispanic_male']),
            'field_direct_hispanic_female'    => str_replace(',','',$contact['field_direct_hispanic_female']),
            'field_direct_asian_am_male'      => str_replace(',','',$contact['field_direct_asian_am_male']),
            'field_direct_asian_am_female'    => str_replace(',','',$contact['field_direct_asian_am_female']),
            'field_direct_native_am_male'     => str_replace(',','',$contact['field_direct_native_am_male']),
            'field_direct_native_am_female'   => str_replace(',','',$contact['field_direct_native_am_female']),
            'field_direct_african_am_male'    => str_replace(',','',$contact['field_direct_african_am_male']),
            'field_direct_african_am_female'  => str_replace(',','',$contact['field_direct_african_am_female']),
            'field_direct_other_male'         => str_replace(',','',$contact['field_direct_other_male']),
            'field_direct_other_female'       => str_replace(',','',$contact['field_direct_other_female']),
            'field_direct_total_male'         => str_replace(',','',$contact['field_direct_total_male']),
            'field_direct_total_female'       => str_replace(',','',$contact['field_direct_total_female']),
            'field_public_white_male'         => str_replace(',','',$contact['field_public_white_male']),
            'field_public_white_female'       => str_replace(',','',$contact['field_public_white_female']),
            'field_public_hispanic_male'      => str_replace(',','',$contact['field_public_hispanic_male']),
            'field_public_hispanic_female'    => str_replace(',','',$contact['field_public_hispanic_female']),
            'field_public_asian_am_male'      => str_replace(',','',$contact['field_public_asian_am_male']),
            'field_public_asian_am_female'    => str_replace(',','',$contact['field_public_asian_am_female']),
            'field_public_native_am_male'     => str_replace(',','',$contact['field_public_native_am_male']),
            'field_public_native_am_female'   => str_replace(',','',$contact['field_public_native_am_female']),
            'field_public_african_am_male'    => str_replace(',','',$contact['field_public_african_am_male']),
            'field_public_african_am_female'  => str_replace(',','',$contact['field_public_african_am_female']),
            'field_public_other_male'         => str_replace(',','',$contact['field_public_other_male']),
            'field_public_other_female'       => str_replace(',','',$contact['field_public_other_female']),
            'field_public_total_male'         => str_replace(',','',$contact['field_public_total_male']),
            'field_public_total_female'       => str_replace(',','',$contact['field_public_total_female']),
            'field_indirect_contact_served'   => str_replace(',','',$contact['field_indirect_contact_served']),
            'field_tab_status'                => $contact['field_tab_status'],
            'field_parent_census'             => $contact['field_parent_census'],
            'pk_id'                           => $contact['pk_id']
        );

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->contact_data_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Contact data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }    

   /**
     * Empowerment data 
     *
     */
    public function empowerment_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $empowerment = [];

        foreach ($form_data as $key => $value) {
            $empowerment[$key] = $value;
        }

        $empowerment['field_empower_economic']          = str_replace(',','',$empowerment['field_empower_economic']);
        $empowerment['field_empower_education']         = str_replace(',','',$empowerment['field_empower_education']);
        $empowerment['field_empower_civic_engagement']  = str_replace(',','',$empowerment['field_empower_civic_engagement']);
        $empowerment['field_empower_civil_rights']      = str_replace(',','',$empowerment['field_empower_civil_rights']);
        $empowerment['field_empower_other']             = str_replace(',','',$empowerment['field_empower_other']);
        $empowerment['field_empower_other_description'] = str_replace(',','',$empowerment['field_empower_other_description']);

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->empowerment_update($pk_id, $empowerment)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Empowerment data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }

   /**
     * Volunteer data 
     *
     */
    public function volunteer_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $volunteer = [];

        foreach ($form_data as $key => $value) {
            $volunteer[$key] = $value;
        }

        $data = array(
            'field_is_there_a_guild_' => $volunteer['field_is_there_a_guild_'],
            'field_guild_members' => str_replace(',','',$volunteer['field_guild_members']),
            'field_guild_male' => str_replace(',','',$volunteer['field_guild_male']),
            'field_guild_female' => str_replace(',','',$volunteer['field_guild_female']),
            'field_guild_white' => str_replace(',','',$volunteer['field_guild_white']),
            'field_guild_hispanic_latino' => str_replace(',','',$volunteer['field_guild_hispanic_latino']),
            'field_guild_asian_american' => str_replace(',','',$volunteer['field_guild_asian_american']),
            'field_guild_native_american' => str_replace(',','',$volunteer['field_guild_native_american']),
            'field_guild_african_american' => str_replace(',','',$volunteer['field_guild_african_american']),
            'field_guild_other_heritage' => str_replace(',','',$volunteer['field_guild_other_heritage']),
            'field_guild_16_20' => str_replace(',','',$volunteer['field_guild_16_20']),
            'field_guild_21_30' => str_replace(',','',$volunteer['field_guild_21_30']),
            'field_guild_31_40' => str_replace(',','',$volunteer['field_guild_31_40']),
            'field_guild_41_65' => str_replace(',','',$volunteer['field_guild_41_65']),
            'field_guild_66_81' => str_replace(',','',$volunteer['field_guild_66_81']),
            'field_guild_82_and_above' => str_replace(',','',$volunteer['field_guild_82_and_above']),
            'field_is_there_a_ypc' => $volunteer['field_is_there_a_ypc'],
            'field_ypc_members' => str_replace(',','',$volunteer['field_ypc_members']),
            'field_ypc_male' => str_replace(',','',$volunteer['field_ypc_male']),
            'field_ypc_female' => str_replace(',','',$volunteer['field_ypc_female']),
            'field_ypc_white' => str_replace(',','',$volunteer['field_ypc_white']),
            'field_ypc_hispanic_latino' => str_replace(',','',$volunteer['field_ypc_hispanic_latino']),
            'field_ypc_asian_american' => str_replace(',','',$volunteer['field_ypc_asian_american']),
            'field_ypc_native_american' => str_replace(',','',$volunteer['field_ypc_native_american']),
            'field_ypc_african_american' => str_replace(',','',$volunteer['field_ypc_african_american']),
            'field_ypc_other_heritage' => str_replace(',','',$volunteer['field_ypc_other_heritage']),
            'field_ypc_16_20' => str_replace(',','',$volunteer['field_ypc_16_20']),
            'field_ypc_21_30' => str_replace(',','',$volunteer['field_ypc_21_30']),
            'field_ypc_31_40' => str_replace(',','',$volunteer['field_ypc_31_40']),
            'field_ypc_41_65' => str_replace(',','',$volunteer['field_ypc_41_65']),
            'field_ypc_66_81' => str_replace(',','',$volunteer['field_ypc_66_81']),
            'field_ypc_82_and_above' => str_replace(',','',$volunteer['field_ypc_82_and_above']),
            'field_other_volunteer_aux_groups' => $volunteer['field_other_volunteer_aux_groups'],
            'field_aux_members' => str_replace(',','',$volunteer['field_aux_members']),
            'field_aux_male' => str_replace(',','',$volunteer['field_aux_male']),
            'field_aux_female' => str_replace(',','',$volunteer['field_aux_female']),
            'field_aux_white' => str_replace(',','',$volunteer['field_aux_white']),
            'field_aux_hispanic_latino' => str_replace(',','',$volunteer['field_aux_hispanic_latino']),
            'field_aux_asian_american' => str_replace(',','',$volunteer['field_aux_asian_american']),
            'field_aux_native_american' => str_replace(',','',$volunteer['field_aux_native_american']),
            'field_aux_african_american' => str_replace(',','',$volunteer['field_aux_african_american']),
            'field_aux_other_heritage' => str_replace(',','',$volunteer['field_aux_other_heritage']),
            'field_aux_16_20' => str_replace(',','',$volunteer['field_aux_16_20']),
            'field_aux_21_30' => str_replace(',','',$volunteer['field_aux_21_30']),
            'field_aux_31_40' => str_replace(',','',$volunteer['field_aux_31_40']),
            'field_aux_41_65' => str_replace(',','',$volunteer['field_aux_41_65']),
            'field_aux_66_81' => str_replace(',','',$volunteer['field_aux_66_81']),
            'field_aux_82_and_above' => str_replace(',','',$volunteer['field_aux_82_and_above']),
            'field_volunteer_total' => str_replace(',','',$volunteer['field_volunteer_total']),
            'field_tab_status' => str_replace(',','',$volunteer['field_tab_status']),
            'field_parent_census' => str_replace(',','',$volunteer['field_parent_census']),
            'pk_id' => $volunteer['pk_id'],
        );

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->volunteer_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Empowerment data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    } 

   /**
     * Education Program 
     *
     */
    public function education_prg_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $edu = [];

        foreach ($form_data as $key => $value) {
            $edu[$key] = $value;
        }

        $data = array(
            'field_do_you_offer_programs_of_t' => $edu['field_do_you_offer_programs_of_t'],
            'field_ed_overseer_name' => $edu['field_ed_overseer_name'],
            'field_ed_overseer_email' => $edu['field_ed_overseer_email'],
            'field_program_ed_total_participa' => str_replace(',','',$edu['field_program_ed_total_participa']),
            'field_program_ed_mentoring' => $edu['field_program_ed_mentoring'],
            'field_program_ed_homeless_youth' => $edu['field_program_ed_homeless_youth'],
            'field_program_ed_title1' => $edu['field_program_ed_title1'],
            'field_program_ed_school_building' => $edu['field_program_ed_school_building'],
            'field_program_ed_school_day' => $edu['field_program_ed_school_day'],
            'field_program_ed_mentoring' => $edu['field_program_ed_mentoring'],
            'field_program_ed_mentors_annual' => str_replace(',','',$edu['field_program_ed_mentors_annual']),
            'field_program_ed_scholar_total' => str_replace(',','',$edu['field_program_ed_scholar_total']),
            'field_program_ed_scholar_avg' => str_replace(',','',$edu['field_program_ed_scholar_avg']),
            'field_program_ed_charter_school' => $edu['field_program_ed_charter_school'],
            'field_program_ed_charter_mngmt' => $edu['field_program_ed_charter_mngmt'],
            'field_program_ed_charter_board' => $edu['field_program_ed_charter_board'],
            'field_program_ed_charter_service' => $edu['field_program_ed_charter_service'],
            'field_program_ed_advocacy' => $edu['field_program_ed_advocacy'],
            'field_program_ed_adv_partners' => str_replace(',','',$edu['field_program_ed_adv_partners']),
            'field_program_ed_model' => $edu['field_program_ed_model'],
            'field_program_ed_foster' => $edu['field_program_ed_foster'],
            'field_program_ed_foster_total' => str_replace(',','',$edu['field_program_ed_foster_total']),
            'field_program_ed_promoted' => str_replace(',','',$edu['field_program_ed_promoted']),
            'field_program_ed_graduated' => str_replace(',','',$edu['field_program_ed_graduated']),
            'field_program_ed_college_app' => str_replace(',','',$edu['field_program_ed_college_app']),
            'field_parent_census' => $edu['field_parent_census'],
            'field_tab_status' => $edu['field_tab_status'],
            'pk_id' => $edu['pk_id'],
        );

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->education_prg_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Education program data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }    

   /**
     * Entrepreneurship Program 
     *
     */
    public function entrepreneurship_prg_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);   
        
            $new = [];
            
            foreach ($form_data as $key => $value) {
                if (substr($key, 0, 3) === "new") {
                    $split = explode('-', $key);
                    $new[$split[1]][$split[2]] = str_replace(',','',$value);
                    unset($form_data[$key]);
                }
            }
            
        $result = $this->CensusForms_model->entrepreneurship_buisiness_insert($new,$form_data['pk_id']);
                    

        $entrepreneurship = [];

        foreach ($form_data as $key => $value) {
            $entrepreneurship[$key] = $value;
        }

        $data = array(
            'field_do_you_offer_programs_of_t' => $entrepreneurship['field_do_you_offer_programs_of_t'],
            'field_entpr_overseer_name' => $entrepreneurship['field_entpr_overseer_name'],
            'field_ed_overseer_email' => $entrepreneurship['field_ed_overseer_email'],
            'field_program_entpr_total_partic' => str_replace(',','',$entrepreneurship['field_program_entpr_total_partic']),
            'field_program_entpr_staff_aff' => str_replace(',','',$entrepreneurship['field_program_entpr_staff_aff']),
            'field_program_entpr_staff_entpr' => str_replace(',','',$entrepreneurship['field_program_entpr_staff_entpr']),
            'field_program_entpr_staff_other' => str_replace(',','',$entrepreneurship['field_program_entpr_staff_other']),
            'field_program_entpr_new' => str_replace(',','',$entrepreneurship['field_program_entpr_new']),
            'field_program_entpr_jobs_ft' => str_replace(',','',$entrepreneurship['field_program_entpr_jobs_ft']),
            'field_program_entpr_jobs_pt' => str_replace(',','',$entrepreneurship['field_program_entpr_jobs_pt']),
            'field_program_entpr_certs' => str_replace(',','',$entrepreneurship['field_program_entpr_certs']),
            'field_program_entpr_new_dollars' => str_replace(',','',$entrepreneurship['field_program_entpr_new_dollars']),
            'field_program_entpr_sales' => str_replace(',','',$entrepreneurship['field_program_entpr_sales']),
            'field_program_entpr_total_sales' => str_replace(',','',$entrepreneurship['field_program_entpr_total_sales']),
            'field_program_entpr_stage_0_2' => str_replace(',','',$entrepreneurship['field_program_entpr_stage_0_2']),
            'field_program_entpr_stage_3_5' => str_replace(',','',$entrepreneurship['field_program_entpr_stage_3_5']),
            'field_program_entpr_stage_5_10' => str_replace(',','',$entrepreneurship['field_program_entpr_stage_5_10']),
            'field_parent_census' => $entrepreneurship['field_parent_census'],
            'field_tab_status' => $entrepreneurship['field_tab_status'],
            'field_legacy_business_sales_tot' => str_replace(',','',$entrepreneurship['field_legacy_business_sales_tot']),
            'field_ennumofparticipantsbusdev' => str_replace(',','',$entrepreneurship['field_ennumofparticipantsbusdev']),
            'pk_id' => $entrepreneurship['pk_id'],
        );

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->entrepreneurship_prg_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Entrepreneurship program data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }    
    

   /**
     * Health and Quality of Life Program 
     *
     */
    public function health_quality_prg_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);     

        $health = [];

        foreach ($form_data as $key => $value) {
            $health[$key] = $value;
        }

        $data = array(
            'field_do_you_offer_programs_of_t'      => $health['field_do_you_offer_programs_of_t'],
            'field_health_overseer_name'            => $health['field_health_overseer_name'],
            'field_health_overseer_email'           => $health['field_health_overseer_email'],
            'field_program_health_total_parti'      => str_replace(',','',$health['field_program_health_total_parti']),
            'field_program_health_chw'              => $health['field_program_health_chw'],
            'field_program_health_advocacy'         => $health['field_program_health_advocacy'],            
            'field_program_health_participant'      => str_replace(',','',$health['field_program_health_participant']),
            'field_program_health_enrolled'         => str_replace(',','',$health['field_program_health_enrolled']),
            'field_program_health_assisted'         => str_replace(',','',$health['field_program_health_assisted']),
            'field_program_avg_participants'        => $health['field_program_avg_participants'],
            'field_program_avg_participants1'       => $health['field_program_avg_participants1'],
            'field_program_num_individual'          => $health['field_program_num_individual'],
            'field_program_remove_question'         => $health['field_program_remove_question'],
            'field_program_health_insurance'        => $health['field_program_health_insurance'],
            'field_program_social_determinants'     => $health['field_program_social_determinants'],
            'field_tab_status'                      => $health['field_tab_status'],
            'pk_id'                                 => $health['pk_id']
        );

        $health_programs       = $health['field_health_programs'];

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        $health_pgm_update       = $this->CensusForms_model->health_pgm_update($pk_id, $health_programs);

        if ($this->CensusForms_model->health_quality_prg_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Health and Quality of Life program data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }        
    
   /**
     * Housing and Community Development
     *
     */
    public function housing_prg_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $housing = [];

        foreach ($form_data as $key => $value) {
            $housing[$key] = $value;
        }

        $housing['field_rent_per_month'] = str_replace(',','',$housing['field_rent_per_month']);
        $housing['field_ownership'] = str_replace(',','',$housing['field_ownership']);
        $housing['field_program_housing_avg_price'] = str_replace(',','',$housing['field_program_housing_avg_price']);
        $housing['field_program_housing_value'] = str_replace(',','',$housing['field_program_housing_value']);
        $housing['field_program_housing_total_part'] = str_replace(',','',$housing['field_program_housing_total_part']);
        $housing['field_program_housing_improved'] = str_replace(',','',$housing['field_program_housing_improved']);
        $housing['field_program_homeless_assistance'] = str_replace(',','',$housing['field_program_homeless_assistance']);
        $housing['field_house_counseling'] = str_replace(',','',$housing['field_house_counseling']);
        $housing['field_program_housing_attended'] = str_replace(',','',$housing['field_program_housing_attended']);
        $housing['field_program_housing_purchased'] = str_replace(',','',$housing['field_program_housing_purchased']);
        $housing['field_program_housing_fixed'] = str_replace(',','',$housing['field_program_housing_fixed']);
        $housing['field_program_housing_adjustable'] = str_replace(',','',$housing['field_program_housing_adjustable']);
        $housing['field_program_housing_not4closed'] = str_replace(',','',$housing['field_program_housing_not4closed']);
        $housing['field_program_housing_month_late'] = str_replace(',','',$housing['field_program_housing_month_late']);
        $housing['field_program_housing_alternate'] = str_replace(',','',$housing['field_program_housing_alternate']);
        $housing['field_program_housing_have_kids'] = str_replace(',','',$housing['field_program_housing_have_kids']);
        $housing['field_program_housing_projects'] = str_replace(',','',$housing['field_program_housing_projects']);
        $housing['field_program_housing_affordable'] = str_replace(',','',$housing['field_program_housing_affordable']);
        $housing['field_program_housing_facilities'] = str_replace(',','',$housing['field_program_housing_facilities']);
        $housing['field_legacy_months_behind'] = str_replace(',','',$housing['field_legacy_months_behind']);

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->housing_prg_update($pk_id, $housing)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Housing and Community Development program data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }    

   /**
     * Workforce Development Program
     *
     */
    public function workforce_prg_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $work = [];

        foreach ($form_data as $key => $value) {
            $work[$key] = $value;
        }

        $data = array(
            'field_do_you_offer_programs_of_t'      => $work['field_do_you_offer_programs_of_t'],
            'field_work_overseer_name'              => $work['field_work_overseer_name'],
            'field_work_overseer_email'             => $work['field_work_overseer_email'],
            'field_program_work_total'              => str_replace(',','',$work['field_program_work_total']),
            'field_program_work_counseling'         => str_replace(',','',$work['field_program_work_counseling']),
            'field_program_work_participants'       => str_replace(',','',$work['field_program_work_participants']),
            'field_program_work_placed'             => str_replace(',','',$work['field_program_work_placed']),
            'field_program_work_retained'           => str_replace(',','',$work['field_program_work_retained']),
            'field_program_work_salary'             => str_replace(',','',$work['field_program_work_salary']),
            'field_program_work_hourly'             => str_replace(',','',$work['field_program_work_hourly']),
            'field_program_work_welfare'            => str_replace(',','',$work['field_program_work_welfare']),
            'field_program_work_welfare_place'      => str_replace(',','',$work['field_program_work_welfare_place']),
            'field_program_work_welfare_salar'      => str_replace(',','',$work['field_program_work_welfare_salar']),
            'field_program_work_welfare_hour'       => str_replace(',','',$work['field_program_work_welfare_hour']),
            'field_program_work_total_partici'      => str_replace(',','',$work['field_program_work_total_partici']),
            'field_program_work_credentials'        => str_replace(',','',$work['field_program_work_credentials']),
            'field_program_work_wia'                => $work['field_program_work_wia'],
            'field_program_work_wia_deliverer'      => $work['field_program_work_wia_deliverer'],
            'field_program_work_wia_provider'       => $work['field_program_work_wia_provider'],
            'field_parent_census'                   => $work['field_parent_census'],
            'field_tab_status'                      => $work['field_tab_status'],
            'field_program_work_sub_housing'        => str_replace(',','',$work['field_program_work_sub_housing']),
            'field_program_work_sub_health'         => str_replace(',','',$work['field_program_work_sub_health']),
            'field_program_work_sub_business'       => str_replace(',','',$work['field_program_work_sub_business']),
            'field_program_work_sub_workforce'      => str_replace(',','',$work['field_program_work_sub_workforce']),
            'field_program_work_subsidiary'         => $work['field_program_work_subsidiary'],
            'field_program_work_sub_profit'         => $work['field_program_work_sub_profit'],
            'field_program_work_sub_ownership'      => $work['field_program_work_sub_ownership'],
            'field_program_work_aff_profit'         => $work['field_program_work_aff_profit'],
            'field_legacy_work_sub_budget'          => str_replace(',','',$work['field_legacy_work_sub_budget']),
            'field_program_work_sub_ownership'      => $work['field_program_work_sub_ownership'],
            'field_program_financial_assist'        => str_replace(',','',$work['field_program_financial_assist']),
            'pk_id'                                 => $work['pk_id']
        );
        $financial_incentives      = $work['field_financial_incentives'];
        $field_industries_work    = $work['field_industries_work'];
        $participants_place       = $work['field_participants_place'];

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        $participants_update       = $this->CensusForms_model->financial_incnt_update($pk_id, $financial_incentives);
        $industry_work_update      = $this->CensusForms_model->industry_work_update($pk_id, $field_industries_work);
        $participant_place_update  = $this->CensusForms_model->participant_place_update($pk_id, $participants_place);

        if ($this->CensusForms_model->workforce_prg_update($pk_id, $data)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Workforce Development program data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    } 
    
   /**
     * Other Programs
     *
     */
    public function other_prg_update()
    {
        //XSS Filter all the input post fields
        $form_data = $this->input->post(null, true);

        $other = [];

        foreach ($form_data as $key => $value) {
            $other[$key] = $value;
        }
        $other['field_program_other_total_partic'] = str_replace(',','',$other['field_program_other_total_partic']);

        $pk_id = $form_data['pk_id'];
        $status = $message = null;

        if ($this->CensusForms_model->other_prg_update($pk_id, $other)) {
            /* log action
            $log_data = array(
            'user_id' => $this->session->user_id,
            'affiliate_id' => $this->session->affiliate_id,
            'record_id'    => $data['affiliate_id'],
            'note' => 'Affiliate details updated'
            );

            //Log user activities
            $this->User_model->user_log($log_data);
            */

            $status = true;
            $message = 'Other program data updated successfully.';
        } else {
            //Failed to add new user.
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    } 
    
   /**
     * Programs add page
     *
     */
    public function programs_update()
    {
        $form_data = $this->input->post(null, true);
        
        $programs = [];
        $fun_source = [];
        $prg_ser = [];

        $skip_insert = ['field_program_target_group','field_program_area'];

        foreach ($form_data as $key => $value) {
                if(!in_array($key,$skip_insert)){
                    if(substr($key, 0, 6) === "newser"){
                        $split = explode('-', $key);
                        $prg_ser[$split[1]][$split[2]] = $value;                    
                    }elseif (substr($key, 0, 3) === "new") {
                        $split = explode('-', $key);
                        $fun_source[$split[1]][$split[2]] = $value;
                    }else{                    
                        $programs[$key] = $value;
                    }
              }    
        }
        $programs['field_program_budget'] = str_replace(',','',$programs['field_program_budget']);
        $programs['field_program_served_total'] = str_replace(',','',$programs['field_program_served_total']);
        $programs['field_program_duration_amount'] = str_replace(',','',$programs['field_program_duration_amount']);
        $programs['field_program_target_age'] = str_replace(',','',$programs['field_program_target_age']);
        $programs['field_program_percent_black']          = str_replace(',','',$programs['field_program_percent_black']);
        $programs['field_program_percent_white']          = str_replace(',','',$programs['field_program_percent_white']);
        $programs['field_program_percent_asian']          = str_replace(',','',$programs['field_program_percent_asian']);
        $programs['field_program_percent_native']          = str_replace(',','',$programs['field_program_percent_native']);
        $programs['field_program_percent_immigrant']          = str_replace(',','',$programs['field_program_percent_immigrant']);
        $programs['field_program_percent_newcomer']          = str_replace(',','',$programs['field_program_percent_newcomer']);
        $programs['field_program_percent_hispanic']          = str_replace(',','',$programs['field_program_percent_hispanic']);
        $programs['field_program_percent_non_hispan']          = str_replace(',','',$programs['field_program_percent_non_hispan']);
        $programs['field_program_percent_male']          = str_replace(',','',$programs['field_program_percent_male']);
        $programs['field_program_percent_female']          = str_replace(',','',$programs['field_program_percent_female']);

        $status = $message = null;
        $url = 'module/census_report/'.$programs['field_parent_census'].'/'.$form_data['field_program_area'].'?msg=programAdded';
        if ($program_id = $this->CensusForms_model->programs_insert($programs)) {

            if(!empty($form_data['field_program_target_group'])){
                $this->CensusForms_model->target_served_insert($program_id, $form_data['field_program_target_group']);
            }

            if ($this->CensusForms_model->program_funding_source_update($program_id, $fun_source)) {
                $status = true;
                $message = 'Programs data updated successfully.';
            }else{
                $message = 'Error updating funding source.';
            }
            
            if ($this->CensusForms_model->program_prg_services_update($program_id, $prg_ser)) {
                $status = true;
                $message = 'Programs data updated successfully.';
            }else{
                $message = 'Error updating program services.';
                $status = false;
            }
        } else {
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }

        $response = array(
            'success' => $status,
            'message' => $message,
            'url' => $url,
        );
        echo json_encode($response); 
    }
    /**
     * Delete venture type 
     *
     */
    public function venture_type_delete()
    {
    
        $data = $this->input->post(null, true);
        if ($this->CensusForms_model->venture_type_delete($data['venture_id'])) {
            $status = true;
            $message = 'Deleted successfully.';
        } else {
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }
        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }

    /**
     * Programs update page
     *
     */
    public function view_prg_update()
    {
        $form_data = $this->input->post(null, true);

        $form_data['field_program_budget']          = str_replace(',','',$form_data['field_program_budget']);
        $form_data['field_program_duration_amount'] = str_replace(',','',$form_data['field_program_duration_amount']);
        $form_data['field_program_served_total']     = str_replace(',','',$form_data['field_program_served_total']);
        $form_data['field_program_target_age']       = str_replace(',','',$form_data['field_program_target_age']);
        $form_data['field_program_percent_black']          = str_replace(',','',$form_data['field_program_percent_black']);
        $form_data['field_program_percent_white']          = str_replace(',','',$form_data['field_program_percent_white']);
        $form_data['field_program_percent_asian']          = str_replace(',','',$form_data['field_program_percent_asian']);
        $form_data['field_program_percent_native']          = str_replace(',','',$form_data['field_program_percent_native']);
        $form_data['field_program_percent_immigrant']          = str_replace(',','',$form_data['field_program_percent_immigrant']);
        $form_data['field_program_percent_newcomer']          = str_replace(',','',$form_data['field_program_percent_newcomer']);
        $form_data['field_program_percent_hispanic']          = str_replace(',','',$form_data['field_program_percent_hispanic']);
        $form_data['field_program_percent_non_hispan']          = str_replace(',','',$form_data['field_program_percent_non_hispan']);
        $form_data['field_program_percent_male']          = str_replace(',','',$form_data['field_program_percent_male']);
        $form_data['field_program_percent_female']          = str_replace(',','',$form_data['field_program_percent_female']);




        $programs = [];
        $fun_source = [];
        $prg_ser = [];

        $skip_insert = ['field_program_target_group','field_program_area'];

        foreach ($form_data as $key => $value) {
                if(!in_array($key,$skip_insert)){
                    if(substr($key, 0, 6) === "newser"){
                        $split = explode('-', $key);
                        $prg_ser[$split[1]][$split[2]] = $value;                    
                    }elseif (substr($key, 0, 3) === "new") {
                        $split = explode('-', $key);
                        $fun_source[$split[1]][$split[2]] = $value;
                    }else{                    
                        $programs[$key] = $value;
                    }
              }    
        }

        $status = $message = null;
        $url = 'module/census_report/'.$form_data['field_parent_census'].'/'.$form_data['pk_id'].'/viewprogram?msg=programUpdated';

        if ($this->CensusForms_model->program_funding_source_update($form_data['pk_id'], $fun_source)) {
            $status = true;
            $message = 'Programs data updated successfully.';
        }else{
            $message = 'Error updating funding source.';
        }

        if ($this->CensusForms_model->program_prg_services_update($form_data['pk_id'], $prg_ser)) {
            $status = true;
            $message = 'Programs data updated successfully.';
        }else{
            $message = 'Error updating program services.';
            $status = false;
        }

        $this->CensusForms_model->update_program_by_id($form_data);

        $response = array(
            'success' => $status,
            'message' => $message,
            'url' => $url,
        );

        echo json_encode($response);
    }

    /**
	 * Update field_tab_status value 
	 * @param  int $report_id
	 * @param  string $table
	 * @return array
	 */
	public function update_tab_status_complete()
	{
        $form_data = $this->input->post(null, true);
        $report_id = $form_data['report_id']; 
        if($form_data['table_name'] == 'service_areas_main'){
            $tab_name = "serviceareas";
        }elseif($form_data['table_name'] == 'community_relations'){
            $tab_name = "community";
        }elseif($form_data['table_name'] == 'employees_board_members'){
            $tab_name = "employees"; 
        }elseif($form_data['table_name'] == 'revenue'){
            $tab_name = "revenue"; 
        }elseif($form_data['table_name'] == 'expenditures'){
            $tab_name = "expenditure"; 
        }elseif($form_data['table_name'] == 'education_program'){
            $tab_name = "education_program"; 
        }elseif($form_data['table_name'] == 'entrepreneurship_program'){
            $tab_name = "entrepreneurship_program"; 
        }elseif($form_data['table_name'] == 'health_quality_program'){
            $tab_name = "health_quality"; 
        }elseif($form_data['table_name'] == 'housing_community_development'){
            $tab_name = "housing"; 
        }elseif($form_data['table_name'] == 'workforce_develop_program'){
            $tab_name = "workforce"; 
        }elseif($form_data['table_name'] == 'other_programs'){
            $tab_name = "other_programs"; 
        }elseif($form_data['table_name'] == 'covid_impact'){
            $tab_name = "covid"; 
        }elseif($form_data['table_name'] == 'civic_engagement'){
            $tab_name = "civic"; 
        }elseif($form_data['table_name'] == 'emergency_relief'){
            $tab_name = "emergency_relief"; 
        }elseif($form_data['table_name'] == 'contact_data'){
            $tab_name = "contact_data"; 
        }elseif($form_data['table_name'] == 'empowerment'){
            $tab_name = "empowerment"; 
        }elseif($form_data['table_name'] == 'volunteers_members'){
            $tab_name = "volunteer"; 
        }

        $tab_status =  $this->CensusReport_model->select_tab_statuses($report_id);
        $is_all_119 = true;
        foreach ($tab_status as $key => $value) {
            if ($key !== $tab_name && $value !== '119') {
                $is_all_119 = false;
                break;
            }
        }
        if ($is_all_119) {
            $table = "census_report";
            $sql = "UPDATE  $table SET field_census_status = 125
	          WHERE $table.report_id = ".$report_id;
		    $query = $this->db->query($sql);

        }
        
        $table = $form_data['table_name'];
        $field_tab_status = $form_data['field_tab_status'];
		$sql = "UPDATE  $table SET field_tab_status = $field_tab_status
	          WHERE field_parent_census = ".$report_id;
		$query = $this->db->query($sql);
		echo json_encode(["data"=>$query]);
	}

    

    /**
	 * delete census report
	 * @param  int $report_id
	 * @return array
	 */
	public function delete_census_report()
	{
        $form_data = $this->input->post(null, true);
        $report_id = $form_data['report_id'];

        $arr = [
                 'census_report',
                 'service_areas_main',
                 'community_relations',
                 'employees_board_members',
                 'revenue','expenditures',
                 'education_program',
                 'entrepreneurship_program',
                 'health_quality_program',
                 'housing_community_development',
                 'workforce_develop_program',
                 'other_programs',
                 'emergency_relief',
                 'contact_data',
                 'civic_engagement',
                 'empowerment',
                 'volunteers_members',
                 'covid_impact',
                ];

        $output = $this->CensusForms_model->delete_censusreport($report_id,$arr);
		echo json_encode(["data"=>$output]);
	}

     /**
	 * delete census report tabwise
	 * @param  int $report_id
	 * @return array
	 */

    public function delete_census_report_tabwise()
	{
        $form_data = $this->input->post(null, true);
        $report_id = $form_data['report_id'];
        $table_name = $form_data['table'];
        $pk_id = $form_data['pk_id'];
        $status = $form_data['status'];
		$report_details = $this->CensusForms_model->report_details($report_id);
        if($status == "Completed" && $report_details->field_census_status == 125){
            $table = "census_report";
            $sql = "UPDATE  $table SET field_census_status = 126
	          WHERE $table.report_id = ".$report_id;
		    $query = $this->db->query($sql);
        }

        $output = $this->CensusForms_model->delete_censusreport_tab($report_id,$table_name,$pk_id);
		echo json_encode(["data"=>$output]);
	}

    /**
     * Update Covid information
     *
     */

    public function covid_update()
    {
       //XSS Filter all the input post fields
       $form_data = $this->input->post(null, true);
       $data = array(
            'field_did_the_affiliate_launch_o'      => $form_data['field_did_the_affiliate_launch_o'],
            'field_how_many_additional_childr'      => str_replace(',','',$form_data['field_how_many_additional_childr']),
            'field_how_many_children_or_youth'      => str_replace(',','',$form_data['field_how_many_children_or_youth']),
            'field_how_many_child_or_youth'         => str_replace(',','',$form_data['field_how_many_child_or_youth']),
            'field_how_many_ch'                     => str_replace(',','',$form_data['field_how_many_ch']),
            'field_were_your_programs_impacte'      => $form_data['field_were_your_programs_impacte'],
            'field_were_job_placement_perform'      => $form_data['field_were_job_placement_perform'],
            'field_by_your_estimates_by_how_m'      => $form_data['field_by_your_estimates_by_how_m'],
            'field_1_were_covid_19_relief_ser'      => $form_data['field_1_were_covid_19_relief_ser'],
            'field_2_number_of_entrepreneursh'      => str_replace(',','',$form_data['field_2_number_of_entrepreneursh']),
            'field_percentage_of_entrepreneur'      => $form_data['field_percentage_of_entrepreneur'],
            'field__how_many_times_did_you_me'      => str_replace(',','',$form_data['field__how_many_times_did_you_me']),
            'field_how_many_times_did_you_mee'      => str_replace(',','',$form_data['field_how_many_times_did_you_mee']),
            'field_did_the_affiliate_receive_'      => $form_data['field_did_the_affiliate_receive_'],
            'field_did_the_affiliate_provide'       => $form_data['field_did_the_affiliate_provide'],
            'field_tab_status'                      => $form_data['field_tab_status'],
            'field_parent_census'                   => $form_data['pk_id'],
            'pk_id'                                 => $form_data['pk_id']
        );
       
       $covid_services       = $form_data['field_what_kinds_of_supports'];
       $covid_disruptions    = $form_data['field_were_there_any_disruptions'];
       $covid_health_program = $form_data['field_what_health_programs'];
       $covid_participants   = $form_data['engage_participants'];
       $covid_serv_requested = $form_data['services_requested'];
       $covid_serv_provided  = $form_data['services_provided'];            
       
       $pk_id = $form_data['pk_id'];
       $status = $message = null;        

       if ($this->CensusForms_model->covid_data_update($pk_id, $data)) {

           $services       = $this->CensusForms_model->covid_services_update($pk_id, $covid_services);
           $disruption     = $this->CensusForms_model->covid_disruptions_update($pk_id, $covid_disruptions);
           $health         = $this->CensusForms_model->covid_health_pgm_update($pk_id,$covid_health_program);
           $participants   = $this->CensusForms_model->covid_participants($pk_id,$covid_participants);
           $serv_requested = $this->CensusForms_model->covid_serv_requested($pk_id,$covid_serv_requested);
           $serv_provided  = $this->CensusForms_model->covid_serv_provided($pk_id,$covid_serv_provided);
           
           $status = true;
           $message = 'Covid data updated successfully.';
       } else {
           //Failed to add new user.
           $status = false;
           $message = 'Something went wrong. Try again later.';
       }

       $response = array(
           'success' => $status,
           'message' => $message,
       );
       echo json_encode($response);
    }	
    /**
     * Delete Buisiness type 
     *
     */
    public function buisiness_type_delete()
    {
        $data = $this->input->post(null, true);
        // dd($data);
        if ($this->CensusForms_model->buisiness_type_delete($data['id'])) {
            $status = true;
            $message = 'Deleted successfully.';
        } else {
            $status = false;
            $message = 'Something went wrong. Try again later.';
        }
        $response = array(
            'success' => $status,
            'message' => $message,
        );
        echo json_encode($response);
    }

}
