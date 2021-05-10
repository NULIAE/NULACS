<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

$config = Array(
    'protocol' => 'smtp',
    'smtp_crypto' =>"tls",
    'newline' => "\r\n",							
    'priority' => 1,
    'smtp_timeout' => 20,
    'mailtype' => 'html',
    'charset' => 'UTF-8',
    'wordwrap' => TRUE,
    'crlf' => "\r\n"
);
