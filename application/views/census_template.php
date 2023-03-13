<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* 
* Loading the header view from the layout 
*/
$this->load->view('layout/census/header');

/* 
* Loading the page content from the controller
*/
$this->load->view($view_name, $content);

/* 
* Loading the footer view from the layout 
*/
$this->load->view('layout/census/footer', $footer);
