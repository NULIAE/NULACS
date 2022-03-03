<?php
defined("BASEPATH") or exit("No direct script access allowed");

require_once APPPATH . "third_party/excel/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// use PhpOffice\PhpSpreadsheet\IOFactory;
// use PhpOffice\PhpSpreadsheet\Reader\Exception;

class Import extends CI_Controller
{
    // construct
    public function __construct()
    {
        parent::__construct();
        // load model
        $this->load->model("Import_model", "import");
        $this->load->model("Affiliate_model", "affiliate");
        $this->load->model("Assessment_model", "assessment");

        //$this->load->helper(array('url','html','form'));
    }
    public function index()
    {
        $inputFileType = "Xlsx";
        $reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);
        $reader->setReadDataOnly(true);
        $reader->setReadEmptyCells(false);
        $path = "./resources/template/PAScoresasofJune2021-format.xlsx";
        $excel = $reader->load($path);

        $sheet = $excel->getActiveSheet()->toArray(null, true, true, true);
        $arrayCount = count($sheet);
        //echo "Array COunt".$arrayCount."<br>";
        $flag = true;
        $i = 2;
        //print_r($this->session->userdata); 
        foreach ($sheet as $value) {
            if ($flag) {
                $flag = false;
                continue;
            }
            //echo $value["A"];
            $affiliate_name=$print = explode(',',$value["A"])[0];
            //echo $affiliate_name;
            $affiliate_id=$this->affiliate->get_affiliateid_by_name($affiliate_name);
            
            //print_r($affiliate_id['affiliate_id']);
            //echo "<br>";
           // echo $affiliate_id['stateid'];
           if(isset($affiliate_id['affiliate_id'])){
                $data=array(
                        "affiliate_id" => $affiliate_id['affiliate_id'],
                        "assessment_from_year" => $value["D"],
                        "assessment_end_year" => $value["E"],
                );
                $self_assessment_id=$this->assessment->add_self_assessment_data($data);
                    //die();
                    $inserdata[$i]["question_id"] = "";
                    $inserdata[$i]["answers"] = "";
                    $inserdata[$i]["affiliate_id"] = $affiliate_id['affiliate_id']; //value[A]
                    $inserdata[$i]["created"] = '';
                    $inserdata[$i]["created_by"] = $this->session->user_id;
                    $inserdata[$i]["year"] = $value["D"];
                    $inserdata[$i]["rating"] = NULL;
                    $inserdata[$i]["comment"] = NULL;
                    $inserdata[$i]["include_in_summary"] = NULL;
                    $inserdata[$i]["self_assessment_id"] = $self_assessment_id;
                    $inserdata[$i]["last_update"] = '';
                    $inserdata[$i]["form_status"] = '';
                    $inserdata[$i]["user_id"] = NULL;
                    $inserdata[$i]["flag"] = 0;
                    $inserdata[$i]["performance_score"] = $value["C"];
            }
            
            $i++;
            
        }
        //print_r($inserdata);
        //die();
        $result = $this->import->insert($inserdata);
        if ($result) {
            echo "Imported successfully";
        } else {
            echo "ERROR !";
        }
        die();
    }
}
?>
