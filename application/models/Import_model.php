<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Import_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function insert($data)
    {
        $res = $this->db->insert_batch('performance_assesment_answers',$data);
        if ($res)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
?>
