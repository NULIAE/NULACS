<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentsSearch extends MY_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Document_model');
		$this->load->model('DocumentSearch_model');
		$this->load->model('Affiliate_model');
		// $this->output->enable_profiler(TRUE);	
	}

	/**
	 * Show the Document Search form
	 *
	 * @return view 'modules/documents/search.php'
	 */
	public function index()
	{
		$data['content'] = array(
			'document_types' => $this->Document_model->get_document_types(),
			'document_status' => $this->Document_model->get_document_status_flags(),
			'affiliates' => $this->Affiliate_model->get_all_affiliates()
		);
		
		//Name of the view file
		$data['view_name'] = 'modules/documents/search';
		//Page specific javascript files
		$data['footer']['js'] = array(
			'https://unpkg.com/mustache@latest',
			'pages/modules/documents_search.js'
		);
		
		$data['notifications'] = $this->Document_model->get_notifications();
		
		$this->load->view('template', $data);
	}

	public function search()
	{
		//XSS Filter all the input post fields
		$data = $this->input->get(NULL, TRUE);
		
		$documents = array();
		
		if($data['doctype'] == 1) //Monthly Documents
		{
			$documents = $this->DocumentSearch_model->get_monthly_documents($data);
		} 
		else if($data['doctype'] == 2) //Quarterly Documents
		{
			$documents = $this->DocumentSearch_model->get_quarterly_documents($data);
		}
		else if($data['doctype'] == 3) //Yearly Documents
		{
			$documents = $this->DocumentSearch_model->get_yearly_documents($data);
		}
		else if($data['doctype'] == 6) //Organizational Soundness Documents
		{
			foreach($data['document'] as $document_id)
			{
				$doc = $this->Document_model->get_document($document_id);
				
				$doc_list = $this->DocumentSearch_model->get_organizational_soundness_documents($document_id, $data);

				if(empty($doc_list) && ($doc['ref_document'] !== NULL))
				{
					if($doc['document_name'] == "Board Roster")
					{
						$doc_list = $this->DocumentSearch_model->get_yearly_documents($data, $doc['ref_document']);
					}
					else
					{
						$doc_list = $this->DocumentSearch_model->get_monthly_documents($data, $doc['ref_document']);
					}
				}
				
				foreach($doc_list as $row)
				{
					array_push($documents, $row);
				}
			}
		}
		else if($data['doctype'] == 7) //Organizational Vitality Documents
		{
			foreach($data['document'] as $document_id)
			{
				$doc = $this->Document_model->get_document($document_id);
				
				$doc_list = $this->DocumentSearch_model->get_organizational_vitality_documents($document_id, $data);

				if(empty($doc_list) && ($doc['ref_document'] !== NULL))
				{
					if($doc['document_name'] == "Form 990" || $doc['document_name'] == "Current Operating Budget")
					{
						$doc_list = $this->DocumentSearch_model->get_yearly_documents($data, $doc['ref_document']);
					}
					else if($doc['document_name'] == "Form 941" || $doc['document_name'] == "Audited Financial Statements")
					{
						$doc_list = $this->DocumentSearch_model->get_quarterly_documents($data, $doc['ref_document']);
					}
					else
					{
						$doc_list = $this->DocumentSearch_model->get_monthly_documents($data, $doc['ref_document']);
					}
				}
				
				foreach($doc_list as $row)
				{
					array_push($documents, $row);
				}
			}
		}
		else if($data['doctype'] == 8) //Implementation of Mission Documents
		{
			$documents = $this->DocumentSearch_model->get_implementation_mission_documents($data);
		}

		$response = array(
			'documents' => $documents
		);

		echo json_encode($response);
	}


	public function export()
	{
		$data = $_POST;

		$data['document'] = explode(",",$_POST['document']);


		$documents = array();
		
		if($data['doctype'] == 1) //Monthly Documents
		{
			$documents = $this->DocumentSearch_model->get_monthly_documents($data);
		} 
		else if($data['doctype'] == 2) //Quarterly Documents
		{
			$documents = $this->DocumentSearch_model->get_quarterly_documents($data);
		}
		else if($data['doctype'] == 3) //Yearly Documents
		{
			$documents = $this->DocumentSearch_model->get_yearly_documents($data);
		}
		else if($data['doctype'] == 6) //Organizational Soundness Documents
		{
			foreach($data['document'] as $document_id)
			{
				$doc = $this->Document_model->get_document($document_id);
				
				$doc_list = $this->DocumentSearch_model->get_organizational_soundness_documents($document_id, $data);

				if(empty($doc_list) && ($doc['ref_document'] !== NULL))
				{
					if($doc['document_name'] == "Board Roster")
					{
						$doc_list = $this->DocumentSearch_model->get_yearly_documents($data, $doc['ref_document']);
					}
					else
					{
						$doc_list = $this->DocumentSearch_model->get_monthly_documents($data, $doc['ref_document']);
					}
				}
				
				foreach($doc_list as $row)
				{
					array_push($documents, $row);
				}
			}
		}
		else if($data['doctype'] == 7) //Organizational Vitality Documents
		{
			foreach($data['document'] as $document_id)
			{
				$doc = $this->Document_model->get_document($document_id);
				
				$doc_list = $this->DocumentSearch_model->get_organizational_vitality_documents($document_id, $data);

				if(empty($doc_list) && ($doc['ref_document'] !== NULL))
				{
					if($doc['document_name'] == "Form 990" || $doc['document_name'] == "Current Operating Budget")
					{
						$doc_list = $this->DocumentSearch_model->get_yearly_documents($data, $doc['ref_document']);
					}
					else if($doc['document_name'] == "Form 941" || $doc['document_name'] == "Audited Financial Statements")
					{
						$doc_list = $this->DocumentSearch_model->get_quarterly_documents($data, $doc['ref_document']);
					}
					else
					{
						$doc_list = $this->DocumentSearch_model->get_monthly_documents($data, $doc['ref_document']);
					}
				}
				
				foreach($doc_list as $row)
				{
					array_push($documents, $row);
				}
			}
		}
		else if($data['doctype'] == 8) //Implementation of Mission Documents
		{
			$documents = $this->DocumentSearch_model->get_implementation_mission_documents($data);
		}

		   header("Content-type: application/csv");
		   header("Content-Disposition: attachment; filename=\"documents".".csv\"");
		   header("Pragma: no-cache");
		   header("Expires: 0");
	
		   $file = fopen('php://output', 'w');
		   $header = array("Affiliate Name","Document Name","Link"); 
			fputcsv($file, $header);
		   foreach ($documents as $data_array) {
	
				$row['affiliate'] = $data_array['document_name'];
				$row['documentname'] = $data_array['city']." ".$data_array['state'];
				$row['link'] =  base_url().$data_array['file_path']; 
				fputcsv($file, array_values($row));
		
		   }	
			   fclose($file);
			   exit;


	}
}
