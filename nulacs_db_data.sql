-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 06:21 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nulacs_db_prod1`
--

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `document_type_id`, `document_name`, `document_file_extension`, `periodicity`, `active_y_n`, `performance_y_n`, `compliance_deadline`, `metadata`, `ref_document`, `created_by`, `created`) VALUES
(1, 1, 'Board Minutes', '.pdf,.doc,.docx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(2, 1, 'Committee Board Minutes', '.pdf,.doc,.docx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(3, 1, 'Statement of Financial Position', '.pdf,.xls,.xlsx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(4, 1, 'Statement of Activities', '.pdf,.xls,.xlsx', '', 'Y', 'Y', 0, '[{\"metadata\":\"Revenu\",\"datatype\":\"number\"},{\"metadata\":\"Expenses\",\"datatype\":\"number\"},{\"metadata\":\"test\",\"datatype\":\"text\"},{\"metadata\":\"test 2\",\"datatype\":\"text\"},{\"metadata\":\"Test1\",\"datatype\":\"text\"}]', NULL, '1', '2010-06-15 09:57:56'),
(5, 1, 'Statement of Budget to Actual', '.pdf,.xls,.xlsx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(6, 1, 'Others', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(7, 2, 'Form 941 (adequate funding of affiliate\'s pension plan)', '.pdf,.xls,.xlsx', '', 'Y', 'Y', 0, '[{\"metadata\":\"pension amount\",\"datatype\":\"number\"},{\"metadata\":\"test\",\"datatype\":\"text\"}]', NULL, '1', '2010-06-15 09:57:56'),
(8, 2, 'Others', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(9, 3, 'Statement of Cash Flow (accrual basis)', '.pdf,.xls,.xlsx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(10, 3, 'Audit and Management Letter', '.pdf', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(11, 3, 'Form 990', '.pdf,.xls,.xlsx', '', 'Y', 'Y', 0, '[{\"metadata\":\"total amount\",\"datatype\":\"number\"}]', NULL, '1', '2010-06-15 09:57:56'),
(12, 3, 'Board Roster', '.pdf,.xls,.xlsx,.doc,.docx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(13, 3, 'Annual Budget', '.pdf,.xls,.xlsx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(14, 3, 'Others', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(15, 5, 'By Laws', '.pdf', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(16, 5, 'Strategic Plan', '.pdf,.doc,.docx', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(17, 5, 'Articles of Incorporation', '.pdf', '', 'Y', 'Y', 0, NULL, NULL, '1', '2010-06-15 09:57:56'),
(18, 6, 'Document Retention Policy', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:34'),
(19, 6, 'IRS Determination Letter', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:34'),
(20, 6, 'Affiliate By Laws', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:34'),
(21, 6, 'Articles of Incorporation', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(22, 6, 'Board Minutes', '', '', 'Y', 'Y', 0, NULL, '1', '1', '2011-02-17 12:49:35'),
(23, 6, 'Finance Committee Minutes', '', '', 'Y', 'Y', 0, NULL, '74', '1', '2011-02-17 12:49:35'),
(24, 6, 'Nominating Committee Minutes', '', '', 'Y', 'Y', 0, NULL, '75', '1', '2011-02-17 12:49:35'),
(25, 6, 'Executive Committee Minutes', '', '', 'Y', 'Y', 0, NULL, '76', '1', '2011-02-17 12:49:35'),
(26, 6, 'Job Descriptions of the board', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(27, 6, 'Current Strategic Plan', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(28, 6, 'Board Roster', '', '', 'Y', 'Y', 0, NULL, '12', '1', '2011-02-17 12:49:35'),
(29, 6, 'Affiliate Policies and Procedures Manual', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(30, 6, 'Slates from Nominating Committee', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(31, 6, 'Legal Counsel – Letter', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(32, 6, 'Current Annual Report', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(33, 7, 'Form 990', '', '', 'Y', 'Y', 0, NULL, '11', '1', '2011-02-17 12:49:35'),
(34, 7, 'Form 941', '', '', 'Y', 'Y', 0, NULL, '7', '1', '2011-02-17 12:49:35'),
(35, 7, 'Audited Financial Statements', '', '', 'Y', 'Y', 0, NULL, '7', '1', '2011-02-17 12:49:35'),
(36, 7, 'Monthly Financial Statements', '', '', 'Y', 'Y', 0, NULL, '3,4,5', '1', '2011-02-17 12:49:35'),
(37, 7, 'Personnel Manual', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(38, 7, 'I-9s', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(39, 7, 'Office Lease', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(40, 7, 'Building Deed', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(41, 7, 'Insurances  General Liability/Commercial Umbrella', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(42, 7, 'Insurances Directors & Officers Liability', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(43, 7, 'Insurances  Health', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(44, 7, 'Insurances Unemployment', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(45, 7, 'Insurances  Workers’ Compensations', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(46, 7, 'Insurances  Disability – Short and Long Term', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(47, 7, 'Insurances Dental', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(48, 7, 'Insurances Retirement', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(49, 7, 'Conflict of Interest Statements – Board, Staff, Volunteers', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(50, 7, 'Code of Ethics Statements', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(51, 7, 'Job Descriptions for Staff', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(52, 7, 'Annual Performance Reviews', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(53, 7, 'Accounting Manual', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(54, 7, 'Board Contribution Summary', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(55, 7, 'Fund Development Strategy', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(56, 7, 'Strategy for Diversifying Funds', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(57, 7, 'Current Operating Budget', '', '', 'Y', 'Y', 0, NULL, '13', '1', '2011-02-17 12:49:35'),
(58, 7, 'Capital Budget', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(59, 7, 'Cash Reserves – Restricted and Unrestricted', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(60, 7, 'Risk Management Plan', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(61, 7, 'Crisis Communication Plan', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(62, 7, 'Staff Roster', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(63, 8, 'List of Programs and Funding', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(64, 8, 'Funding Reports', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(65, 8, 'Volunteer Handbook', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(66, 8, 'Communications and Marketing Plan', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(67, 9, 'Others', '', '', 'Y', 'Y', 0, NULL, NULL, '1', '2011-02-17 12:49:35'),
(73, 6, 'Organization Chart', '', NULL, 'Y', 'Y', 0, NULL, NULL, '1', '2020-12-16 17:28:35'),
(74, 1, 'Finance Committee', '', NULL, 'Y', 'Y', 0, NULL, NULL, '1', '2020-12-16 17:31:45'),
(75, 1, 'Nominating Committee', '', NULL, 'Y', 'Y', 0, NULL, NULL, '1', '2020-12-16 17:32:34'),
(76, 1, 'Executive Committee', '', NULL, 'Y', 'Y', 0, NULL, NULL, '1', '2020-12-16 17:33:05'),
(77, 7, 'State Tax Requirement', '', NULL, 'Y', 'Y', 0, NULL, NULL, '1', '2020-12-17 11:21:14');

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`document_type_id`, `document_type`) VALUES
(8, 'Implementation of Mission'),
(10, 'Legal Documents'),
(1, 'Monthly Document'),
(6, 'Organizational Soundness'),
(7, 'Organizational Vitality'),
(11, 'Other Compliance'),
(9, 'Performance Other'),
(2, 'Quarterly Document'),
(5, 'Revision Document'),
(3, 'Yearly Document');

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`temp_id`, `name`, `html_code`, `subject`, `type`) VALUES
(4, 'Monthly reminder template', '<p>Good Morning.</p>\n\n<p>Happy Valentine&rsquo;s Day!</p>\n\n<p>Please upload your <strong>{month} {year} </strong>monthly documents by the close of business, <strong>{last_date}!</strong></p>\n\n<p><strong>The Monthly Compliance Documents for {month} {year} are:</strong></p>\n\n<ul>\n	<li>\n	<p>Board Minutes</p>\n	</li>\n	<li>\n	<p>Committee Board Minutes</p>\n	</li>\n	<li>\n	<p>Statement of Financial Position</p>\n	</li>\n	<li>\n	<p>Statement of Functional Expenses (YTD included)</p>\n	</li>\n	<li>\n	<p>Statement of Budget-to-Actual (YTD included)</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><em>To ensure your documents upload and open easily, </em><em><strong>please convert your Excel and Word documents to PDFs</strong></em><em>. </em></p>\n\n<p>For those affiliates who may need my help, please contact me ASAP, especially, if you are falling behind in your monthly uploads. I can help you upload them.</p>\n\n<p><strong>If your affiliate has already uploaded the monthly documents for {month} {year}, thank you!</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Thank you and have a wonderful day!</p>\n', 'Monthly reminder', 'monthly'),
(5, 'Quarterly Reminder Template', '<p>Good Morning.<br />\n&nbsp;</p>\n\n<p>Happy Valentine&rsquo;s Day!</p>\n\n<p>Please upload your <strong>{quarter} {year} </strong>quarterly documents by the close of business, <strong>{last_date}!</strong></p>\n\n<p>&nbsp;</p>\n\n<p><strong>The Quarterly Form 941 for ({quarter} {year}) Compliance Reporting</strong></p>\n\n<p>&nbsp;</p>\n\n<p><em>To ensure your documents upload and open easily, </em><em><strong>please convert your Excel and Word documents to PDFs</strong></em><em>. </em></p>\n\n<p>For those affiliates who may need my help, please contact me ASAP, especially, if you are falling behind in your monthly uploads. I can help you upload them.</p>\n\n<p><strong>If your affiliate has already uploaded the quarterly documents for {quarter} {year}, thank you!</strong></p>\n\n<p>&nbsp;</p>\n\n<p>Thank you and have a wonderful day!</p>\n', 'Quarterly Reminder', 'quarterly'),
(6, 'Yearly Reminder Template', '<p>Good morning/afternoon</p>\n\n<p>&nbsp;</p>\n\n<p>Time to upload your {year} year-end documents!</p>\n\n<p>Please upload your<strong>&nbsp;annual documents, </strong>(for those affiliates who have <strong>June 2019 Fiscal Year Ending,)</strong><strong> </strong><strong>all due by {last_date}.</strong></p>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p><strong>Annual FYE June Audits 2019 and Management Letter, (including the A-133, where applicable) and FYE June 2019 Form 990s.</strong></p>\n	</li>\n</ul>\n\n<ul>\n	<li>\n	<p>FY 2019 Audit/A-133 (ending June 30th) &amp; Management Letter Due or Extension Letter</p>\n	</li>\n	<li>\n	<p>FY 2019 Form 990 (ending June 30th) or Extension Letter</p>\n	</li>\n	<li>\n	<p>Board Roster</p>\n	</li>\n	<li>\n	<p>Annual Budget</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><em>To ensure your documents upload easily, </em><em><strong>please convert your documents to PDFs</strong></em><em>. We have been having some difficulty opening some of the documents when they are not in a PDF format. </em></p>\n\n<p>For those affiliates who may need my help, please contact me ASAP.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>If your affiliate has already uploaded the {year}&nbsp;Audit, Management Letter and Form 990, thank you!</strong></p>\n', 'Yearly Reminder', 'yearly'),
(7, 'Combined Email Template', '<p>Good morning/afternoon</p>\n\n<p>&nbsp;</p>\n\n<p>Time to upload your {year} year-end documents!</p>\n\n<p>Please upload your <strong>monthly, quarterly (form 941) and your annual documents, </strong>(for those affiliates who have <strong>June 2019 Fiscal Year Ending,)</strong><strong> </strong><strong>all due by {last_date}.</strong></p>\n\n<ul>\n	<li>\n	<p><strong>The Monthly Compliance Documents for {month} {year} are:</strong></p>\n	</li>\n</ul>\n\n<ul>\n	<li>\n	<p>Board Minutes</p>\n	</li>\n	<li>\n	<p>Committee Board Minutes</p>\n	</li>\n	<li>\n	<p>Statement of Financial Position</p>\n	</li>\n	<li>\n	<p>Statement of Functional Expenses (YTD included)</p>\n	</li>\n	<li>\n	<p>Statement of Budget-to-Actual (YTD included)</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p><strong>Quarterly Form 941 for ({quarter} {year}) Compliance Reporting.</strong></p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<ul>\n	<li>\n	<p><strong>Annual FYE June Audits 2019 and Management Letter, (including the A-133, where applicable) and FYE June 2019 Form 990s.</strong></p>\n	</li>\n</ul>\n\n<ul>\n	<li>\n	<p>FY 2019 Audit/A-133 (ending June 30th) &amp; Management Letter Due or Extension Letter</p>\n	</li>\n	<li>\n	<p>FY 2019 Form 990 (ending June 30th) or Extension Letter</p>\n	</li>\n	<li>\n	<p>Board Roster</p>\n	</li>\n	<li>\n	<p>Annual Budget</p>\n	</li>\n</ul>\n\n<p>&nbsp;</p>\n\n<p><em>To ensure your documents upload easily, </em><em><strong>please convert your documents to PDFs</strong></em><em>. We have been having some difficulty opening some of the documents when they are not in a PDF format. </em></p>\n\n<p>&nbsp;</p>\n\n<p>For those affiliates who may need my help, please contact me ASAP.</p>\n\n<p>&nbsp;</p>\n\n<p><strong>If your affiliate has already uploaded the {year} Audit, Management Letter and Form 990, thank you!</strong></p>\n', 'Combined Reminder', 'combined');

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_id`, `role_name`, `role_description`) VALUES
(1, 1, 'NUL Administrator', 'NUL Administrator'),
(2, 2, 'Affiliate User', 'Affiliate User'),
(3, 3, 'Executive User', 'Executive User');

--
-- Dumping data for table `status_flags`
--

INSERT INTO `status_flags` (`id`, `type`, `name`, `icon`) VALUES
(1, 1, 'Pending', NULL),
(2, 1, 'InTime', NULL),
(3, 1, 'Late', NULL),
(4, 2, 'Submission Pending', '<i class=\"i i-document-status d-status\"></i>'),
(5, 2, 'Review Pending', '<i class=\"i i-review-pending r-pending\"></i>'),
(6, 2, 'Waiting', '<i class=\"i i-waiting wait\"></i>'),
(7, 2, 'Approved', '<i class=\"i i-approved apprvd\"></i>'),
(8, 3, 'Compliant', '<i class=\"i i-compliant cmplt\"></i>'),
(9, 3, 'Non-Compliant', '<i class=\"i i-non-compliant n-cmplt\"></i>'),
(10, 3, 'Waiting', '<i class=\"i i-waiting wait\"></i>'),
(11, 3, 'Indeterminate', '<i class=\"i i-Indeterminate inter\"></i>');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
