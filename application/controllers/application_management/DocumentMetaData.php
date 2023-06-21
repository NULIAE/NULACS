<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DocumentMetaData extends MY_Controller 
{
	public function __construct()
	{
		 parent::__construct();
		 $this->load->model('Document_model');
		 //$this->output->enable_profiler(TRUE);
	}

	/**
	 * Show the Document Metadata form
	 *
	 * @return view `application_management/metadata`
	 */
	public function index()
	{
		$data['content'] = array(
			'document_types' => $this->Document_model->get_document_types(),
			'documents_list' => $this->Document_model->document_metadata_listing()
		);
		$data['notifications'] = $this->Document_model->get_notifications();
		$user_id = $this->session->user_id;
		$data['user_detail'] = $this->Document_model->get_user_detail($user_id);
		//Name of the view file
		$data['view_name'] = 'application_management/metadata';
		//Page specific javascript files
		$data['footer']['js'] = array('pages/document_metadata.js');

		$this->load->view('template', $data);
	}

		
	/**
	 * Get all the documents for a document type
	 *
	 * @param  int $document_type_id
	 * @return json array
	 */
	public function get_documents_by_type($document_type_id)
	{
		$documents = $this->Document_model->get_documents($document_type_id);

		echo json_encode($documents);
	}
	
	/**
	 * Get metadata for a document by `document_id`
	 *
	 * @param  int $document_id
	 * @return json array
	 */
	public function get_document_metadata($document_id)
	{
		$document = $this->Document_model->get_document($document_id);

		if( ! empty($document) )
			echo json_encode(array('success'=> TRUE, 'metadata' => $document['metadata']));
		else
			echo json_encode(array('success'=> FALSE, 'metadata' => NULL));
	}
	
	/**
	 * Update document metadata
	 *
	 * @return json array
	 */
	public function update()
	{
		//XSS Filter all the input post fields
		$data = $this->input->post(NULL, TRUE);

		$metadata = json_decode($data['metadata']);

		$update_data =  array(
			'metadata' => count($metadata) > 0 ? $data['metadata'] : NULL
		);

		$status = $message = NULL;

		if ( $this->Document_model->update_document($data['document_id'], $update_data) )
		{
			//Metadata updated successfully
			$status = TRUE;
			$message = 'Metadata updated successfully';

			$log_data = array(
				'user_id' => $this->session->user_id,
				'document_id' => $data['document_id'],
				'document_type_id' => $data['document_type_id'],
				'affiliate_id' => $this->session->affiliate_id,
				'note' => 'Metadata updated'
			);
	
			//Log user activities
			$this->User_model->user_log($log_data);
		}
		else
		{
			//Failed to update the metadata.
			$status = FALSE;
			$message = 'Updation failed. Please try again later.';
		}

		$response = array(
			'success' => $status,
			'message' => $message
		);

		echo json_encode($response);
	}
}
