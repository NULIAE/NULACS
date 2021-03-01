<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = Array(
    'protocol' => 'smtp',
    'smtp_crypto' =>"ssl",
    'newline' => "\r\n",							
    'priority' => 1,
    'smtp_timeout' => 20,
    'mailtype' => 'html',
    'charset' => 'iso-8859-1',
    'wordwrap' => TRUE
);
