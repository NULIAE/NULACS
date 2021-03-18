<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* Routes for Auth Controllers */
$route['login'] = 'auth/login/index';
$route['authenticate'] = 'auth/login/authenticate';
$route['logout'] = 'auth/login/logout';
$route['reset-password/update'] = 'auth/reset_password/update';
$route['reset-password/(:any)'] = 'auth/reset_password/index/$1';
$route['send-token'] = 'auth/reset_password/send_token';

/* Routes for Document Controllers */
$route['document/metadata'] = 'application_management/DocumentMetaData/index';
$route['document/metadata/update'] = 'application_management/DocumentMetaData/update';
$route['document/get-documents/(:num)'] = 'application_management/DocumentMetaData/get_documents_by_type/$1';
$route['document/get-document-metadata/(:num)'] = 'application_management/DocumentMetaData/get_document_metadata/$1';

/* Routes for User Profile Controllers */
$route['user/view-profile/(:num)'] = 'profile/index/$1';
$route['user/edit-profile/(:num)'] = 'profile/edit/$1';
$route['user/profile/update'] = 'profile/update';
$route['user/delete-profile/(:num)'] = 'profile/delete_profile/$1';
$route['user/profile/change_password'] = 'profile/change_password';
$route['user/password/update'] = 'profile/update_password';
$route['user/profile/modules'] = 'profile/modules';

/* Routes for User Module Controllers */
$route['module/user'] = 'modules/user_management/user/index';
$route['module/user/filter'] = 'modules/user_management/user/filter';
$route['module/user/add'] = 'modules/user_management/user/add_form';
$route['module/user/insert'] = 'modules/user_management/user/insert';
$route['module/affiliate/document/doupload'] = 'modules/affiliate/affiliate/doupload';


$route['module/notification/all'] = 'modules/notification_center/notification/index';
$route['module/notification/emails'] = 'modules/notification_center/email_template/index';
$route['module/notification/emails/update/(:num)'] = 'modules/notification_center/email_template/update/$1';

$route['module/settings'] = 'modules/settings/settings/index';
$route['module/settings/update'] = 'modules/settings/settings/update';

$route['module/affiliate'] = 'modules/affiliate/affiliate/index';
$route['module/affiliate/filter'] = 'modules/affiliate/affiliate/filter';
$route['module/affiliate/add'] = 'modules/affiliate/affiliate/add_form';
$route['module/affiliate/insert'] = 'modules/affiliate/affiliate/insert';
$route['module/affiliate/update'] = 'modules/affiliate/affiliate/update';
$route['module/affiliate/status'] = 'modules/affiliate/affiliate/status';
$route['module/affiliate/status/monthly/(:any)'] = 'modules/affiliate/affiliate/get_monthly_status/$1';
$route['module/affiliate/status/quarterly/(:any)'] = 'modules/affiliate/affiliate/get_quarterly_status/$1';
$route['module/affiliate/status/yearly/(:any)'] = 'modules/affiliate/affiliate/get_yearly_status/$1';
$route['module/affiliate/status/details/(:num)'] = 'modules/affiliate/affiliate/affiliate_status_details/$1';
$route['module/affiliate/compliance/update'] = 'modules/affiliate/affiliate/update_compliance_status';
$route['module/affiliate/document/update'] = 'modules/affiliate/affiliate/update_affiliate_document_status';
$route['module/affiliate/document/add-comment'] = 'modules/affiliate/affiliate/add_document_comment';
$route['module/affiliate/document/upload'] = 'modules/affiliate/affiliate/upload_document';
$route['module/affiliate/filter-performance-documents'] = 'modules/affiliate/affiliate/filter_performance_documents_by_year';
$route['module/affiliate/key-indicators/save'] = 'modules/affiliate/affiliate/save_key_indicators';
$route['module/affiliate/key-indicators/search'] = 'modules/affiliate/affiliate/search_key_indicators';

/* Routes for Document Search Module Controllers */
$route['module/documents/search'] = 'modules/documents/DocumentsSearch/index';
$route['module/documents/search-documents'] = 'modules/documents/DocumentsSearch/search';
$route['module/reports'] = 'modules/reports/reports/index';
$route['module/filter/reports'] = 'modules/reports/reports/index';

/* Routes for Performance Assessment Controllers */
$route['module/assessment/assessment'] = 'modules/assessment/assessment/index';
$route['module/assessment/assessment-listing'] = 'modules/assessment/assessment/assessment_listing';
$route['module/assessment/criteria-answers'] = 'modules/assessment/assessment/criteria_answers';
$route['module/assessment/criteria-answers-view'] = 'modules/assessment/assessment/criteria_answers_view';
$route['module/assessment/rating'] = 'modules/assessment/assessment/rating';
$route['module/assessment/assessment-summary'] = 'modules/assessment/assessment/assessment_summary';	
$route['module/assessment/assessment-pdf'] = 'modules/assessment/assessment/assessment_pdf';	
$route['module/assessment/form-data'] = 'modules/assessment/assessment/formData';
$route['module/assessment/add_self_assessment_data'] = 'modules/assessment/assessment/add_self_assessment_data';

$route['module/documents/export'] = 'modules/documents/DocumentsSearch/export';
$route['module/affiliate/document/doupload'] = 'modules/affiliate/affiliate/doupload';
$route['module/affiliate/edit/(:num)'] = 'modules/affiliate/affiliate/edit_form/$1';
$route['module/affiliate/key-indicators/approve'] = 'modules/affiliate/affiliate/approve_key_indicators';


$route['module/affiliate/document/delete_upload'] = 'modules/affiliate/affiliate/delete_upload';
$route['module/user/export'] = 'modules/user_management/user/export_user_list';
$route['module/reports/export'] = 'modules/reports/reports/export_kpi_reports';

$route['module/notification/emails/add'] = 'modules/notification_center/email_template/add_form';
$route['module/notification/emails/save'] = 'modules/notification_center/email_template/save';
$route['module/notification/emails/preview/(:num)'] = 'modules/notification_center/email_template/preview/$1';

$route['module/notification/emails/send_reminder'] = 'modules/notification_center/email_template/send_remainders';
