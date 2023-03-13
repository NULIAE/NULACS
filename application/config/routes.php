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
$route['user/delete-profile/(:num)'] = 'profile/delete_profile/$1';
$route['user/profile/update'] = 'profile/update';
$route['user/profile/change_password'] = 'profile/change_password';
$route['user/password/update'] = 'profile/update_password';
$route['user/profile/modules'] = 'profile/modules';

/* Routes for User Module Controllers */
$route['module/user'] = 'modules/user_management/user/index';
$route['module/user/filter'] = 'modules/user_management/user/filter';
$route['module/user/add'] = 'modules/user_management/user/add_form';
$route['module/user/insert'] = 'modules/user_management/user/insert';
$route['module/user/export'] = 'modules/user_management/user/export_user_list';
$route['module/user/import'] = 'modules/user_management/user/import_user_list';
$route['module/user/send_welcome_mail'] = 'modules/user_management/user/send_welcome_mail';

$route['module/notification/all'] = 'modules/notification_center/notification/index';
$route['module/notification/emails'] = 'modules/notification_center/email_template/index';
$route['module/notification/emails/add'] = 'modules/notification_center/email_template/add_form';
$route['module/notification/emails/save'] = 'modules/notification_center/email_template/save';
$route['module/notification/emails/update/(:num)'] = 'modules/notification_center/email_template/update/$1';
$route['module/notification/emails/preview/(:num)'] = 'modules/notification_center/email_template/preview/$1';
$route['module/notification/emails/send_reminder'] = 'modules/notification_center/email_template/send_remainders';

$route['module/settings'] = 'modules/settings/settings/index';
$route['module/settings/update'] = 'modules/settings/settings/update';

$route['module/affiliate'] = 'modules/affiliate/affiliate/index';
$route['module/affiliate/filter'] = 'modules/affiliate/affiliate/filter';
$route['module/affiliate/add'] = 'modules/affiliate/affiliate/add_form';
$route['module/affiliate/insert'] = 'modules/affiliate/affiliate/insert';
$route['module/affiliate/edit/(:num)'] = 'modules/affiliate/affiliate/edit_form/$1';
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
$route['module/affiliate/document/doupload'] = 'modules/affiliate/affiliate/doupload';
$route['module/affiliate/document/delete_upload'] = 'modules/affiliate/affiliate/delete_upload';
$route['module/affiliate/filter-performance-documents'] = 'modules/affiliate/affiliate/filter_performance_documents_by_year';
$route['module/affiliate/key-indicators/save'] = 'modules/affiliate/affiliate/save_key_indicators';
$route['module/affiliate/key-indicators/approve'] = 'modules/affiliate/affiliate/approve_key_indicators';
$route['module/affiliate/key-indicators/approvemonthly'] = 'modules/affiliate/affiliate/approve_key_indicatorsmonthly';
$route['module/affiliate/key-indicators/search'] = 'modules/affiliate/affiliate/search_key_indicators';
$route['module/affiliate/key-indicators/searchmonthly'] = 'modules/affiliate/affiliate/search_key_indicators_monthly';
$route['module/affiliate/key-indicators/savemonthly'] = 'modules/affiliate/affiliate/monthly_save_key_indicators';

/* Routes for Document Search Module Controllers */
$route['module/documents/search'] = 'modules/documents/DocumentsSearch/index';
$route['module/documents/search-documents'] = 'modules/documents/DocumentsSearch/search';
$route['module/documents/export'] = 'modules/documents/DocumentsSearch/export';
$route['module/reports'] = 'modules/reports/reports/index';
$route['module/filter/reports'] = 'modules/reports/reports/index';
$route['module/reports/export'] = 'modules/reports/reports/export_kpi_reports';

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
$route['module/assessment/delete'] = 'modules/assessment/assessment/delete';

/* Routes for Census Controllers */
$route['module/census_affiliate'] = 'modules/census/census_affiliate/index';
$route['module/census_affiliate/filter'] = 'modules/census/census_affiliate/filter';
$route['module/census_report'] = 'modules/census/census_affiliate/censusreport';
$route['module/census_report/create'] = 'modules/census/census_affiliate/censusreportadd';
$route['module/census_report/savenew'] = 'modules/census/forms_update/newreportsave';
$route['module/censusreport/filter'] = 'modules/census/census_affiliate/filter';
$route['module/census_report/(:num)/view'] = 'modules/census/census_affiliate/contactinfo/$1';
$route['module/census_report/(:num)/printform'] = 'modules/census/census_affiliate/printcensusform/$1';
$route['module/census_report/(:num)/serviceareas'] = 'modules/census/census_affiliate/serviceareas/$1';
$route['module/census_report/(:num)/community'] = 'modules/census/census_affiliate/community/';
$route['module/census_report/(:num)/employees'] = 'modules/census/census_affiliate/employees';
$route['module/census_report/(:num)/revenue'] = 'modules/census/census_affiliate/revenue';
$route['module/census_report/(:num)/expenditure'] = 'modules/census/census_affiliate/expenditure';
$route['module/census_report/(:num)/education_program'] = 'modules/census/census_affiliate/education_prg';
$route['module/census_report/(:num)/entrepreneurship_program'] = 'modules/census/census_affiliate/entrepreneurship_prg';
$route['module/census_report/(:num)/health_quality'] = 'modules/census/census_affiliate/health_prg';
$route['module/census_report/(:num)/housing'] = 'modules/census/census_affiliate/housing_prg';
$route['module/census_report/(:num)/workforce'] = 'modules/census/census_affiliate/workforce_prg';
$route['module/census_report/(:num)/other_programs'] = 'modules/census/census_affiliate/other_prg';
$route['module/census_report/(:num)/emergency_relief'] = 'modules/census/census_affiliate/emergency_relief';
$route['module/census_report/(:num)/contact_data'] = 'modules/census/census_affiliate/contact_data';
$route['module/census_report/contactinfo/(:num)'] = 'modules/assessment/assessment/contactinfoexports/$i';
$route['module/census_report/censusexport'] = 'modules/assessment/assessment/censusexport/';

$route['module/census_report/(:num)/civic'] = 'modules/census/census_affiliate/civic';
$route['module/census_report/(:num)/empowerment'] = 'modules/census/census_affiliate/empowerment';
$route['module/census_report/(:num)/volunteer'] = 'modules/census/census_affiliate/volunteer';
$route['module/census_report/(:num)/covid'] = 'modules/census/census_affiliate/covid';

//Census report tabs update
$route['module/forms_update/contactinfo/update'] = 'modules/census/forms_update/contactinfo_update';
$route['module/forms_update/reviewed_complete'] = 'modules/census/forms_update/contactinfo_reviewed_complete';
$route['module/forms_update/service_area/update'] = 'modules/census/forms_update/service_area_update';
$route['module/forms_update/service_area/delete'] = 'modules/census/forms_update/service_area_delete';
$route['module/forms_update/community/update'] = 'modules/census/forms_update/community_update';
$route['module/forms_update/employees/update'] = 'modules/census/forms_update/employees_update';
$route['module/forms_update/revenue/update'] = 'modules/census/forms_update/revenue_update';
$route['module/forms_update/revenue/venture_type_delete'] = 'modules/census/forms_update/venture_type_delete';
$route['module/forms_update/entrepreneurship/buisiness_type_delete'] = 'modules/census/forms_update/buisiness_type_delete';
$route['module/forms_update/expenditure/update'] = 'modules/census/forms_update/expenditure_update';
$route['module/forms_update/civic/update'] = 'modules/census/forms_update/civic_update';
$route['module/forms_update/emergency/update'] = 'modules/census/forms_update/emergency_relief_update';
$route['module/forms_update/contact_data/update'] = 'modules/census/forms_update/contact_data_update';
$route['module/forms_update/empowerment/update'] = 'modules/census/forms_update/empowerment_update';
$route['module/forms_update/volunteer/update'] = 'modules/census/forms_update/volunteer_update';
$route['module/forms_update/education_prg/update'] = 'modules/census/forms_update/education_prg_update';
$route['module/forms_update/entrepreneurship_prg/update'] = 'modules/census/forms_update/entrepreneurship_prg_update';
$route['module/forms_update/health_quality_prg/update'] = 'modules/census/forms_update/health_quality_prg_update';
$route['module/forms_update/housing_prg/update'] = 'modules/census/forms_update/housing_prg_update';
$route['module/forms_update/workforce_prg/update'] = 'modules/census/forms_update/workforce_prg_update';
$route['module/forms_update/other_prg/update'] = 'modules/census/forms_update/other_prg_update';
$route['module/forms_update/covid/update'] = 'modules/census/forms_update/covid_update';

/* Add programs route */
//$route['module/census_report/(:num)/program_education'] = 'modules/census/census_affiliate/program_education';
//$route['module/census_report/(:num)/program_entrepreneurship'] = 'modules/census/census_affiliate/program_entrepreneurship';
//$route['module/census_report/(:num)/program_health'] = 'modules/census/census_affiliate/program_health';
//$route['module/census_report/(:num)/program_housing'] = 'modules/census/census_affiliate/program_housing';
//$route['module/census_report/(:num)/program_workforce'] = 'modules/census/census_affiliate/program_workforce';
//$route['module/census_report/(:num)/program_other'] = 'modules/census/census_affiliate/program_other';

$route['module/census_report/(:num)/add_program/(:any)'] = 'modules/census/census_affiliate/add_program/$1/$2';
$route['module/forms_update/programs/update'] = 'modules/census/forms_update/programs_update';
$route['module/forms_update/view_prg/update'] = 'modules/census/forms_update/view_prg_update';

$route['module/affiliateindex'] = 'modules/census/census_affiliate/affiliateindex';
$route['module/affiliateindex/filter'] = 'modules/census/census_affiliate/filter_affiliate_index';
$route['module/affiliateindex/organization/(:num)/(:num)'] = 'modules/census/census_affiliate/organization_page/$1/$2';
$route['module/censussummary'] = 'modules/census/census_affiliate/censussummary';
$route['module/censussummary/filter'] = 'modules/census/census_affiliate/censussummary_filter';
$route['module/censussummary/export'] = 'modules/census/census_affiliate/censussummary_export';
$route['module/census_report/cumulative_census_revenue'] = 'modules/census/census_affiliate/cumulative_census_revenue';
$route['module/census_report/affiliate_census_revenue'] = 'modules/census/census_affiliate/affiliate_census_revenue';
$route['module/census_report/cumulative_keyfund_revenue'] = 'modules/census/census_affiliate/cumulative_keyfund_revenue';
$route['module/census_report/affiliate_keyfund_query'] = 'modules/census/census_affiliate/affiliate_keyfund_query';
$route['module/census_report/affiliate_keyfund_query/filter'] = 'modules/census/census_affiliate/affiliate_keyfund_query_filter';

//reports people served
$route['module/census_reports/cumulative_people_history'] = 'modules/census/census_reports/cumulative_people_history';
$route['module/census_reports/affiliate_people_history'] = 'modules/census/census_reports/affiliate_people_history';
$route['module/census_reports/affiliate_people_history/filter'] = 'modules/census/census_reports/affiliate_people_history_filter';

$route['module/census_reports/nul_census_total_contacts_breakdown'] = 'modules/census/census_reports/nul_census_total_contacts_breakdown';
$route['module/census_reports/nul_census_total_contacts_breakdown/filter'] = 'modules/census/census_reports/nul_census_total_contacts_breakdown_filter';

$route['modules/census/census_reports/cumulative_civic_engagement'] = 'modules/census/census_reports/cumulative_civic_engagement';
$route['modules/census/census_reports/affiliate_civic_engagement_query'] = 'modules/census/census_reports/affiliate_civic_engagement_query';
$route['modules/census/census_reports/affiliate_civic_engagement_query/filter'] = 'modules/census/census_reports/affiliate_civic_engagement_query_filter';

$route['modules/census/census_reports/voter_registration'] = 'modules/census/census_reports/voter_registration';
$route['modules/census/census_reports/voter_registration/filter'] = 'modules/census/census_reports/voter_registration_filter';
$route['modules/census/census_reports/census_covid_questions_aggregate'] = 'modules/census/census_reports/census_covid_questions_aggregate';
$route['modules/census/census_reports/census_covid_questions'] = 'modules/census/census_reports/census_covid_questions';

//reports employees volunteers
$route['module/census_reports/cumulative_employee_report'] = 'modules/census/census_reports/cumulative_employee_report';
$route['module/census_reports/affiliate_employee_report'] = 'modules/census/census_reports/affiliate_employee_report';
$route['module/census_reports/affiliate_employee_report/filter'] = 'modules/census/census_reports/affiliate_employee_report_filter';
$route['module/census_reports/affiliate_employee_report/export'] = 'modules/census/census_reports/affiliate_employee_report_export';
$route['module/census_reports/cumulative_member_volunteer'] = 'modules/census/census_reports/cumulative_mem_vol';
$route['module/census_reports/affiliate_member_volunteer'] = 'modules/census/census_reports/affiliate_mem_vol';
$route['module/census_reports/affiliate_member_volunteer/filter'] = 'modules/census/census_reports/affiliate_mem_vol_filter';
$route['module/census_reports/affiliate_member_volunteer/export'] = 'modules/census/census_reports/affiliate_mem_vol_export';
$route['module/census_reports/affiliates_and_ceo_s'] = 'modules/census/census_reports/affiliates_and_ceo_s';

//reports program related
$route['module/census_reports/cumulative_program_report'] = 'modules/census/census_reports/cumulative_program_report';
$route['module/census_reports/program_area_summary'] = 'modules/census/census_reports/program_area_summary';
$route['module/census_reports/program_area_summary/filter'] = 'modules/census/census_reports/program_area_summary_filter';
$route['module/census_reports/affiliate_program_area_query'] = 'modules/census/census_reports/affiliate_program_area_query';
$route['module/census_reports/affiliate_program_area_query/filter'] = 'modules/census/census_reports/affiliate_program_area_query_filter';
$route['module/census_reports/affiliate_program_area_query/export'] = 'modules/census/census_reports/affiliate_program_area_query_export';
$route['module/census_reports/program_area_people_served'] = 'modules/census/census_reports/program_area_people_served';
$route['module/census_reports/program_area_people_served/filter'] = 'modules/census/census_reports/program_area_people_served_filter';
$route['module/census_reports/program_area_people_served/export'] = 'modules/census/census_reports/program_area_people_served_export';
$route['module/census_reports/cumulative_education_report'] = 'modules/census/census_reports/cumulative_education_report';
$route['module/census_reports/affiliate_education_query_report'] = 'modules/census/census_reports/affiliate_education_query_report';

$route['module/census_reports/affiliate_education_query_report/filter'] = 'modules/census/census_reports/affiliate_education_query_report_filter';

$route['module/census_reports/cumulative_entrepreneurship_report'] = 'modules/census/census_reports/cumulative_entrepreneurship_report';
$route['module/census_reports/affiliate_entrepreneurship_query_report'] = 'modules/census/census_reports/affiliate_entrepreneurship_query_report';

$route['module/census_reports/affiliate_entrepreneurship_query_report/filter'] = 'modules/census/census_reports/affiliate_entrepreneurship_query_report_filter';

$route['module/census_reports/cumulative_health_report'] = 'modules/census/census_reports/cumulative_health_report';
$route['module/census_reports/affiliate_health_query_report'] = 'modules/census/census_reports/affiliate_health_query_report';

$route['module/census_reports/affiliate_health_query_report/filter'] = 'modules/census/census_reports/affiliate_health_query_report_filter';

$route['module/census_reports/cumulative_housing_report'] = 'modules/census/census_reports/cumulative_housing_report';
$route['module/census_reports/affiliate_housing_query_report'] = 'modules/census/census_reports/affiliate_housing_query_report';

$route['module/census_reports/affiliate_housing_query_report/filter'] = 'modules/census/census_reports/affiliate_housing_query_report_filter';

$route['module/census_reports/affiliate_housing_query_report/export'] = 'modules/census/census_reports/affiliate_housing_query_report_export';

$route['module/census_reports/cumulative_workforce_development_report'] = 'modules/census/census_reports/cumulative_workforce_development_report';
$route['module/census_reports/cumulative_workforce_development_report/filter'] = 'modules/census/census_reports/cumulative_workforce_development_report_filter';

$route['module/census_reports/affiliate_workforce_query_report'] = 'modules/census/census_reports/affiliate_workforce_query_report';

$route['module/census_reports/affiliate_workforce_query_report/filter'] = 'modules/census/census_reports/affiliate_workforce_query_report_filter';

$route['module/census_reports/affiliate_workforce_query_report/export'] = 'modules/census/census_reports/affiliate_workforce_query_report_export';

/* For CEO's */
 $route['module/censuses-for-my-affiliate'] = 'modules/census/census_affiliate/censuses_for_my_affiliate';

 $route['module/census_report/(:num)/(:num)/viewprogram'] = 'modules/census/census_affiliate/viewprogram';

 /*  tab_status update */
 $route['module/forms_update/tab_status_change'] = 'modules/census/forms_update/update_tab_status_complete';

 /*  delete census report */
 $route['module/forms_update/delete'] = 'modules/census/forms_update/delete_census_report';
 $route['module/forms_update/delete_tabwise'] = 'modules/census/forms_update/delete_census_report_tabwise';

 $route['module/census_reports/cumulative_people_history/export'] = 'modules/census/census_reports/cumulative_people_history_export';
 $route['modules/census/census_reports/affiliate_civic_engagement/export'] = 'modules/census/census_reports/affiliate_civic_engagement_export';
 $route['module/census_reports/affiliate_entrepreneurship_query_report/export'] = 'modules/census/census_reports/affiliate_entrepreneurship_query_report_export';
 $route['module/census_reports/affiliate_people_history/export'] = 'modules/census/census_reports/affiliate_people_history_export';
 $route['module/census_report/cumulative_census_revenue/export'] = 'modules/census/census_affiliate/cumulative_census_revenue_export';
 $route['module/census_report/cumulative_keyfund_revenue/export'] = 'modules/census/census_affiliate/cumulative_keyfund_revenue_export';
 $route['module/census_report/affiliate_keyfund_query/export'] = 'modules/census/census_affiliate/affiliate_keyfund_query_export';
 $route['module/census_report/affiliate_census_revenue/export'] = 'modules/census/census_affiliate/affiliate_census_revenue_export';
 $route['module/census_reports/entrepreneurship_centers_report'] = 'modules/census/census_reports/entrepreneurship_centers_report';
 $route['module/census_reports/entrepreneurship_centers_report/filter'] = 'modules/census/census_reports/entrepreneurship_centers_report_filter';
 $route['module/census_reports/entrepreneurship_centers_report_wnul'] = 'modules/census/census_reports/entrepreneurship_centers_report_w_nul';
 $route['module/census_reports/entrepreneurship_centers_report_wnul/filter'] = 'modules/census/census_reports/entrepreneurship_centers_report_w_nul_filter';
 $route['module/census_reports/nul_census_total_contacts_breakdown/export'] = 'modules/census/census_reports/nul_census_total_contacts_breakdown_export';

$route['module/notification/emails/send_testmail'] = 'modules/notification_center/email_template/send_testmails';
$route['module/affiliate/document/delete_termly_document'] = 'modules/affiliate/affiliate/delete_termly_document';
