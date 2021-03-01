<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('send_email_noification'))
{
    function send_email_noification($data) 
    {
        $ci = & get_instance();

        $ci->load->model('User_model');
        $ci->load->model('Affiliate_model');
        $ci->load->model('Settings_model');

        //Get affiliate details
        $affiliate = $ci->Affiliate_model->get_affiliate_by_id($data["affiliate_id"]);

        $data["organization"] = $affiliate["organization"];
        $data["city"] = $affiliate["city"];
        $data["state"] = $affiliate["state"];

        //echo "<pre>"; print_r($affiliate); echo "</pre>"; 

        //Get receiver email addresses based on the role
        /* if($data["role_id"] == 1)
        {
            $where = array(
                'users.affiliate_id' => $data["affiliate_id"],
                'users.is_adm_uploader' => 1,
                'users.user_status' => 1
            );
        }
        else
        { */
            $where = array(
                'users.role_id' => 1,
                'users.user_status' => 1
            );
        //}

        $receivers = "";
        
        $users = $ci->User_model->get_all_users(NULL, NULL, $where);
        
        foreach($users as $key => $user)
        {
            $receivers .= ($key == 0) ? "" : ",";
            $receivers .= $user["user_email_address_1"];
        }

        //echo "<pre>";echo $receivers; echo "</pre>"; 

        //Get SMTP settings
        $settings = array();
        
        $result = $ci->Settings_model->get_all_settings();

        foreach ( $result as $row)
		{
			$settings[$row['label']] = $row['value'];
		}

        $config['smtp_host'] = $settings['smtp_host'];
        $config['smtp_user'] = $settings['smtp_user'];
        $config['smtp_pass'] = $settings['smtp_pass'];
        $config['smtp_port'] = $settings['smtp_port'];

        //echo "<pre>"; print_r($config); echo "</pre>";
        
        $ci->load->library('email');
        
        $ci->email->initialize($config);

        $ci->email->from("noreply@nul.org", "National Urban League");
        $ci->email->to($receivers);
        //$ci->email->to("nulapplication@gmail.com");
    
        $ci->email->subject("New notification from NUL");

        $message = $ci->load->view('layout/email', $data, TRUE);

        //echo "<pre>"; echo $message; echo "</pre>"; 

        $ci->email->message($message);
    
        $ci->email->send();
    }
}