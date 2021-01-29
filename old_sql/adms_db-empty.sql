-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2021 at 08:43 AM
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
-- Database: `adms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `document_type_id` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `record_id` int(11) NOT NULL,
  `affiliate_id` bigint(20) NOT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate`
--

CREATE TABLE `affiliate` (
  `affiliate_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `organization` varchar(200) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` int(8) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `board_meeting_frequency` int(11) DEFAULT NULL,
  `compliance_dues` tinyint(1) NOT NULL DEFAULT 0,
  `affiliate_status` tinyint(1) NOT NULL DEFAULT 0,
  `affiliate_compliance_yes_no` varchar(1) DEFAULT NULL,
  `affiliate_performance_year` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_compliance_status_monthly`
--

CREATE TABLE `affiliate_compliance_status_monthly` (
  `id` bigint(20) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `month` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `compliance_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_compliance_status_quarterly`
--

CREATE TABLE `affiliate_compliance_status_quarterly` (
  `id` bigint(20) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `quarter` int(11) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `compliance_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_compliance_status_yearly`
--

CREATE TABLE `affiliate_compliance_status_yearly` (
  `id` bigint(20) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL,
  `compliance_status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `automated_mails`
--

CREATE TABLE `automated_mails` (
  `automated_mail_id` int(11) NOT NULL,
  `calendar_month` varchar(10) NOT NULL,
  `calendar_year` varchar(10) NOT NULL,
  `reminder_mail_sent` varchar(1) DEFAULT NULL,
  `overdue_mail_sent` varchar(1) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `calendar_quarter` varchar(10) NOT NULL,
  `temp_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `automated_mail_log`
--

CREATE TABLE `automated_mail_log` (
  `id` bigint(20) NOT NULL,
  `automated_mail_id` int(11) NOT NULL,
  `email` varchar(10) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `current_status`
--

CREATE TABLE `current_status` (
  `id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `status_year` int(11) DEFAULT NULL,
  `status_quarter` int(11) DEFAULT NULL,
  `status_quarter_year` int(11) DEFAULT NULL,
  `status_month` int(11) DEFAULT NULL,
  `status_month_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` int(11) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `document_name` varchar(150) NOT NULL,
  `document_file_extension` varchar(50) NOT NULL,
  `periodicity` varchar(50) DEFAULT NULL,
  `active_y_n` varchar(4) NOT NULL,
  `performance_y_n` varchar(4) NOT NULL,
  `compliance_deadline` int(1) NOT NULL,
  `metadata` text DEFAULT NULL,
  `ref_document` int(11) DEFAULT NULL COMMENT 'Reference Document for avoiding duplication',
  `created_by` varchar(50) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE `document_type` (
  `document_type_id` int(11) NOT NULL,
  `document_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE `email_template` (
  `temp_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `html_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `financial_year`
--

CREATE TABLE `financial_year` (
  `id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `year_start` date DEFAULT NULL,
  `year_end` date DEFAULT NULL,
  `monthly_grace` int(11) DEFAULT NULL,
  `quarterly_grace` int(11) DEFAULT NULL,
  `yearly_grace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `key_indicators`
--

CREATE TABLE `key_indicators` (
  `id` bigint(20) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `quarter` varchar(10) NOT NULL,
  `year` varchar(25) NOT NULL,
  `indicators` text DEFAULT NULL,
  `created` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `legal_document_status`
--

CREATE TABLE `legal_document_status` (
  `legal_d_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `quarterly_submitted_by` int(11) DEFAULT NULL,
  `quarterly_submitted_date` varchar(100) DEFAULT NULL,
  `quarterly_submitted_ontime_yes_no` varchar(1) DEFAULT NULL,
  `quarterly_reviewed_date` datetime DEFAULT NULL,
  `quarterly_reviewed_by` int(11) DEFAULT NULL,
  `quarterly_review_status` varchar(1) DEFAULT NULL,
  `quarterly_compliance_status` int(11) DEFAULT NULL,
  `quarterly_upload_file` varchar(255) DEFAULT NULL,
  `quarterly_upload_file_name` varchar(150) DEFAULT NULL,
  `quarterly_upload_file_extension` varchar(50) DEFAULT NULL,
  `quarterly_document_comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_document_status`
--

CREATE TABLE `monthly_document_status` (
  `monthly_document_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `document_month` int(11) NOT NULL,
  `document_year` int(11) NOT NULL,
  `monthly_cutoff_date` datetime DEFAULT NULL,
  `monthly_submitted_by` int(11) DEFAULT NULL,
  `monthly_submitted_date` datetime DEFAULT NULL,
  `monthly_submitted_ontime_yes_no` varchar(5) DEFAULT NULL,
  `monthly_reviewed_date` datetime DEFAULT NULL,
  `monthly_reviewed_by` int(11) DEFAULT NULL,
  `monthly_review_status` varchar(1) DEFAULT NULL,
  `monthly_compliance_status` int(11) DEFAULT NULL,
  `monthly_upload_file` varchar(255) DEFAULT NULL,
  `monthly_upload_file_name` varchar(150) DEFAULT NULL,
  `monthly_upload_file_extension` varchar(50) DEFAULT NULL,
  `metadata_value` text DEFAULT NULL,
  `monthly_document_comment` varchar(500) DEFAULT NULL,
  `monthly_replaced_document_yes_no` varchar(1) DEFAULT NULL,
  `monthly_replaced_by` int(5) DEFAULT NULL,
  `monthly_replaced_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `notification_summary`
--

CREATE TABLE `notification_summary` (
  `notification_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `document_type_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `notification` varchar(500) NOT NULL,
  `flag` int(11) NOT NULL DEFAULT 1,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `other_document_status`
--

CREATE TABLE `other_document_status` (
  `id` bigint(20) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `other_submitted_by` int(11) DEFAULT NULL,
  `other_submitted_date` datetime DEFAULT NULL,
  `other_upload_file` varchar(255) DEFAULT NULL,
  `other_upload_file_name` varchar(150) DEFAULT NULL,
  `other_upload_file_extension` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `performance_assesment`
--

CREATE TABLE `performance_assesment` (
  `id` int(11) NOT NULL,
  `criteria` varchar(255) DEFAULT NULL,
  `standard` varchar(255) DEFAULT NULL,
  `question` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `performance_assesment_answers`
--

CREATE TABLE `performance_assesment_answers` (
  `id` int(11) NOT NULL,
  `question_id` int(11) DEFAULT NULL,
  `answers` text DEFAULT NULL,
  `affiliate_id` int(50) NOT NULL,
  `created` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `year` varchar(11) DEFAULT NULL,
  `rating` varchar(11) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `include_in_summary` int(11) DEFAULT NULL,
  `self_assessment_id` int(12) DEFAULT NULL,
  `last_update` varchar(100) NOT NULL,
  `form_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `performance_impli_mission_document_status`
--

CREATE TABLE `performance_impli_mission_document_status` (
  `performance_i_m_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `document_year` int(11) DEFAULT NULL,
  `performance_im_mi_cutoff_date` datetime DEFAULT NULL,
  `performance_im_mi_submitted_by` int(11) DEFAULT NULL,
  `performance_im_mi_submitted_date` datetime DEFAULT NULL,
  `performance_im_mi_submitted_ontime_yes_no` varchar(1) DEFAULT NULL,
  `performance_im_mi_reviewed_date` datetime DEFAULT NULL,
  `performance_im_mi_reviewed_by` int(11) DEFAULT NULL,
  `performance_im_mi_upload_file` varchar(255) DEFAULT NULL,
  `performance_im_mi_upload_file_name` varchar(150) DEFAULT NULL,
  `performance_im_mi_upload_file_extension` varchar(50) DEFAULT NULL,
  `metadata_value` text DEFAULT NULL,
  `performance_im_mi_document_comment` varchar(255) DEFAULT NULL,
  `performance_im_mi_replaced_document_yes_no` varchar(13) DEFAULT NULL,
  `performance_im_mi_replaced_by` int(5) DEFAULT NULL,
  `performance_im_mi_replaced_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `performance_org_sndns_document_status`
--

CREATE TABLE `performance_org_sndns_document_status` (
  `performance_o_s_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `document_year` int(11) DEFAULT NULL,
  `performance_org_doc_cutoff_date` datetime DEFAULT NULL,
  `performance_org_doc_submitted_by` int(11) DEFAULT NULL,
  `performance_org_doc_submitted_date` datetime DEFAULT NULL,
  `performance_org_doc_submitted_ontime_yes_no` varchar(1) DEFAULT NULL,
  `performance_org_doc_reviewed_date` datetime DEFAULT NULL,
  `performance_org_doc_reviewed_by` int(11) DEFAULT NULL,
  `performance_org_doc_upload_file` varchar(255) DEFAULT NULL,
  `performance_org_doc_upload_file_name` varchar(150) DEFAULT NULL,
  `performance_org_doc_upload_file_extension` varchar(50) DEFAULT NULL,
  `metadata_value` text DEFAULT NULL,
  `performance_org_doc_document_comment` varchar(255) DEFAULT NULL,
  `performance_org_doc_replaced_document_yes_no` varchar(1) DEFAULT NULL,
  `performance_org_doc_replaced_by` int(1) DEFAULT NULL,
  `performance_org_doc_replaced_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `performance_other_document_status`
--

CREATE TABLE `performance_other_document_status` (
  `performance_o_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `document_year` int(11) DEFAULT NULL,
  `performance_other_cutoff_date` datetime DEFAULT NULL,
  `performance_other_submitted_by` int(11) DEFAULT NULL,
  `performance_other_submitted_date` datetime DEFAULT NULL,
  `performance_other_submitted_ontime_yes_no` varchar(1) DEFAULT NULL,
  `performance_other_reviewed_date` datetime DEFAULT NULL,
  `performance_other_reviewed_by` int(11) DEFAULT NULL,
  `performance_other_upload_file` varchar(255) DEFAULT NULL,
  `performance_other_upload_file_name` varchar(150) DEFAULT NULL,
  `performance_other_upload_file_extension` varchar(50) DEFAULT NULL,
  `performance_other_document_comment` varchar(255) DEFAULT NULL,
  `performance_other_replaced_document_yes_no` varchar(3) DEFAULT NULL,
  `performance_other_replaced_by` int(5) DEFAULT NULL,
  `performance_other_replaced_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `performance_vitality_document_status`
--

CREATE TABLE `performance_vitality_document_status` (
  `performance_v_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `document_year` int(11) DEFAULT NULL,
  `performance_vitality_cutoff_date` datetime DEFAULT NULL,
  `performance_vitality_submitted_by` int(11) DEFAULT NULL,
  `performance_vitality_submitted_date` datetime DEFAULT NULL,
  `performance_vitality_submitted_ontime_yes_no` varchar(1) DEFAULT NULL,
  `performance_vitality_reviewed_date` datetime DEFAULT NULL,
  `performance_vitality_reviewed_by` int(11) DEFAULT NULL,
  `performance_vitality_upload_file` varchar(255) DEFAULT NULL,
  `performance_vitality_upload_file_name` varchar(150) DEFAULT NULL,
  `performance_vitality_upload_file_extension` varchar(50) DEFAULT NULL,
  `metadata_value` text DEFAULT NULL,
  `performance_vitality_document_comment` varchar(255) DEFAULT NULL,
  `performance_vitality_replaced_document_yes_no` varchar(3) DEFAULT NULL,
  `performance_vitality_replaced_by` int(10) DEFAULT NULL,
  `performance_vitality_replaced_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `quarterly_document_status`
--

CREATE TABLE `quarterly_document_status` (
  `quarterly_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `document_month` int(11) NOT NULL,
  `document_year` int(11) NOT NULL,
  `quarterly_cutoff_date` datetime DEFAULT NULL,
  `quarterly_submitted_by` int(11) DEFAULT NULL,
  `quarterly_submitted_date` datetime DEFAULT NULL,
  `quarterly_submitted_ontime_yes_no` varchar(6) DEFAULT NULL,
  `quarterly_reviewed_date` datetime DEFAULT NULL,
  `quarterly_reviewed_by` int(11) DEFAULT NULL,
  `quarterly_review_status` varchar(1) DEFAULT NULL,
  `quarterly_compliance_status` int(11) DEFAULT NULL,
  `quarterly_upload_file` varchar(255) DEFAULT NULL,
  `quarterly_upload_file_name` varchar(150) DEFAULT NULL,
  `quarterly_upload_file_extension` varchar(50) DEFAULT NULL,
  `metadata_value` text DEFAULT NULL,
  `quarterly_document_comment` varchar(255) DEFAULT NULL,
  `quarterly_replaced_document_yes_no` varchar(5) DEFAULT NULL,
  `quarterly_replaced_by` int(1) DEFAULT NULL,
  `quarterly_replaced_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_id` int(4) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `role_description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `self_assessment`
--

CREATE TABLE `self_assessment` (
  `self_assessment_id` int(11) NOT NULL,
  `affiliate_id` int(11) DEFAULT NULL,
  `assessment_start_year` varchar(4) DEFAULT NULL,
  `assessment_end_year` varchar(4) DEFAULT NULL,
  `document_name` varchar(250) DEFAULT NULL,
  `document_path` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateid` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `stateabbreviation` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `status_flags`
--

CREATE TABLE `status_flags` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `prifix` varchar(10) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `user_suffix` varchar(50) DEFAULT NULL,
  `user_title` varchar(100) DEFAULT NULL,
  `user_email_address_1` varchar(50) DEFAULT NULL,
  `user_email_address_2` varchar(50) DEFAULT NULL,
  `user_email_address_3` varchar(50) DEFAULT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT 0,
  `user_password` varchar(255) DEFAULT NULL,
  `reset_password_token` varchar(255) DEFAULT NULL,
  `user_phone` varchar(20) DEFAULT NULL,
  `user_super_visor_name` varchar(50) DEFAULT NULL,
  `user_super_visor_phone` varchar(50) DEFAULT NULL,
  `user_super_visor_email` varchar(50) DEFAULT NULL,
  `user_board_meeting_month` varchar(255) DEFAULT NULL,
  `user_year_ending_date` varchar(50) DEFAULT NULL,
  `isuser_super_administrator` tinyint(1) NOT NULL DEFAULT 0,
  `is_adm_uploader` tinyint(1) NOT NULL DEFAULT 0,
  `is_board_chair` tinyint(1) NOT NULL DEFAULT 0,
  `last_login` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `yearly_document_status`
--

CREATE TABLE `yearly_document_status` (
  `yearly_d_id` bigint(20) NOT NULL,
  `document_id` int(11) NOT NULL,
  `affiliate_id` int(11) NOT NULL,
  `document_year` int(11) NOT NULL,
  `yearly_cutoff_date` datetime DEFAULT NULL,
  `yearly_submitted_by` int(11) DEFAULT NULL,
  `yearly_submitted_date` datetime DEFAULT NULL,
  `yearly_submitted_ontime_yes_no` varchar(1) DEFAULT NULL,
  `yearly_reviewed_date` datetime DEFAULT NULL,
  `yearly_reviewed_by` int(11) DEFAULT NULL,
  `yearly_review_status` varchar(1) DEFAULT NULL,
  `yearly_compliance_status` int(11) DEFAULT NULL,
  `yearly_upload_file` varchar(255) DEFAULT NULL,
  `yearly_upload_file_name` varchar(150) DEFAULT NULL,
  `yearly_upload_file_extension` varchar(50) DEFAULT NULL,
  `metadata_value` text DEFAULT NULL,
  `yearly_document_comment` varchar(255) DEFAULT NULL,
  `yearly_replaced_document_yes_no` varchar(1) DEFAULT NULL,
  `yearly_replaced_by` int(1) DEFAULT NULL,
  `yearly_replaced_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `yearly_notifications`
--

CREATE TABLE `yearly_notifications` (
  `id` bigint(20) NOT NULL,
  `yearly_d_id` bigint(20) NOT NULL,
  `comment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_user_id` (`user_id`),
  ADD KEY `fk_affiliate_document_type1_id` (`document_type_id`),
  ADD KEY `fk_affiliate_document01_id` (`document_id`);

--
-- Indexes for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD PRIMARY KEY (`affiliate_id`),
  ADD KEY `fk_affiliate_region_id` (`region_id`),
  ADD KEY `fk_affiliate_state_id` (`state`);

--
-- Indexes for table `affiliate_compliance_status_monthly`
--
ALTER TABLE `affiliate_compliance_status_monthly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_affiliate9_id` (`affiliate_id`),
  ADD KEY `fk_affiliate_compliance1_status` (`compliance_status`);

--
-- Indexes for table `affiliate_compliance_status_quarterly`
--
ALTER TABLE `affiliate_compliance_status_quarterly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_affiliate10_id` (`affiliate_id`),
  ADD KEY `fk_affiliate_compliance2_status` (`compliance_status`);

--
-- Indexes for table `affiliate_compliance_status_yearly`
--
ALTER TABLE `affiliate_compliance_status_yearly`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_affiliate11_id` (`affiliate_id`),
  ADD KEY `fk_affiliate_compliance3_status` (`compliance_status`);

--
-- Indexes for table `automated_mails`
--
ALTER TABLE `automated_mails`
  ADD PRIMARY KEY (`automated_mail_id`),
  ADD KEY `automated_mail_id` (`automated_mail_id`);

--
-- Indexes for table `automated_mail_log`
--
ALTER TABLE `automated_mail_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_automated_id` (`automated_mail_id`);

--
-- Indexes for table `current_status`
--
ALTER TABLE `current_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_affiliate_id` (`affiliate_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `document_type`
--
ALTER TABLE `document_type`
  ADD PRIMARY KEY (`document_type_id`),
  ADD KEY `document_type` (`document_type`);

--
-- Indexes for table `email_template`
--
ALTER TABLE `email_template`
  ADD PRIMARY KEY (`temp_id`),
  ADD KEY `temp_id` (`temp_id`);

--
-- Indexes for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_affiliate1_id` (`affiliate_id`);

--
-- Indexes for table `key_indicators`
--
ALTER TABLE `key_indicators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_idki` (`affiliate_id`);

--
-- Indexes for table `legal_document_status`
--
ALTER TABLE `legal_document_status`
  ADD PRIMARY KEY (`legal_d_id`),
  ADD KEY `fk_affiliate_document02_id` (`document_id`),
  ADD KEY `fk_affiliate_affiliate04_id` (`affiliate_id`);

--
-- Indexes for table `monthly_document_status`
--
ALTER TABLE `monthly_document_status`
  ADD PRIMARY KEY (`monthly_document_id`),
  ADD KEY `fk_affiliate_document_id` (`document_id`),
  ADD KEY `fk_affiliate_affiliate2_id` (`affiliate_id`);

--
-- Indexes for table `notification_summary`
--
ALTER TABLE `notification_summary`
  ADD PRIMARY KEY (`notification_id`),
  ADD KEY `fk_document_type1` (`document_type_id`),
  ADD KEY `fk_affiliate_id` (`affiliate_id`) USING BTREE;

--
-- Indexes for table `other_document_status`
--
ALTER TABLE `other_document_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_affiliate_affiliate5_id` (`affiliate_id`);

--
-- Indexes for table `performance_assesment`
--
ALTER TABLE `performance_assesment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_assesment_answers`
--
ALTER TABLE `performance_assesment_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `performance_impli_mission_document_status`
--
ALTER TABLE `performance_impli_mission_document_status`
  ADD PRIMARY KEY (`performance_i_m_id`),
  ADD KEY `fk_affiliate_document5_id` (`document_id`),
  ADD KEY `fk_affiliate_affiliate8_id` (`affiliate_id`);

--
-- Indexes for table `performance_org_sndns_document_status`
--
ALTER TABLE `performance_org_sndns_document_status`
  ADD PRIMARY KEY (`performance_o_s_id`),
  ADD KEY `fk_affiliate_affiliate60_id` (`affiliate_id`),
  ADD KEY `fk_affiliate_document30_id` (`document_id`);

--
-- Indexes for table `performance_other_document_status`
--
ALTER TABLE `performance_other_document_status`
  ADD PRIMARY KEY (`performance_o_id`),
  ADD KEY `fk_affiliate_document51_id` (`document_id`),
  ADD KEY `fk_affiliate_affiliate81_id` (`affiliate_id`);

--
-- Indexes for table `performance_vitality_document_status`
--
ALTER TABLE `performance_vitality_document_status`
  ADD PRIMARY KEY (`performance_v_id`),
  ADD KEY `fk_affiliate_document4_id` (`document_id`),
  ADD KEY `fk_affiliate_affiliate7_id` (`affiliate_id`);

--
-- Indexes for table `quarterly_document_status`
--
ALTER TABLE `quarterly_document_status`
  ADD PRIMARY KEY (`quarterly_id`),
  ADD KEY `fk_affiliate_document2_id` (`document_id`),
  ADD KEY `fk_affiliate_affiliate4_id` (`affiliate_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`),
  ADD KEY `region_id` (`region_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `self_assessment`
--
ALTER TABLE `self_assessment`
  ADD PRIMARY KEY (`self_assessment_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateid`),
  ADD KEY `stateid` (`stateid`);

--
-- Indexes for table `status_flags`
--
ALTER TABLE `status_flags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_affiliate_affiliate12_id` (`affiliate_id`),
  ADD KEY `fk_affiliate_region1_id` (`region_id`),
  ADD KEY `fk_affiliate_role_id` (`role_id`);

--
-- Indexes for table `yearly_document_status`
--
ALTER TABLE `yearly_document_status`
  ADD PRIMARY KEY (`yearly_d_id`),
  ADD KEY `fk_affiliate_document1_id` (`document_id`),
  ADD KEY `fk_affiliate_affiliate3_id` (`affiliate_id`);

--
-- Indexes for table `yearly_notifications`
--
ALTER TABLE `yearly_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_upload1_id` (`yearly_d_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=709;

--
-- AUTO_INCREMENT for table `affiliate`
--
ALTER TABLE `affiliate`
  MODIFY `affiliate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `affiliate_compliance_status_monthly`
--
ALTER TABLE `affiliate_compliance_status_monthly`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=666;

--
-- AUTO_INCREMENT for table `affiliate_compliance_status_quarterly`
--
ALTER TABLE `affiliate_compliance_status_quarterly`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `affiliate_compliance_status_yearly`
--
ALTER TABLE `affiliate_compliance_status_yearly`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `automated_mails`
--
ALTER TABLE `automated_mails`
  MODIFY `automated_mail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `automated_mail_log`
--
ALTER TABLE `automated_mail_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `current_status`
--
ALTER TABLE `current_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `document_type`
--
ALTER TABLE `document_type`
  MODIFY `document_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `email_template`
--
ALTER TABLE `email_template`
  MODIFY `temp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `financial_year`
--
ALTER TABLE `financial_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `key_indicators`
--
ALTER TABLE `key_indicators`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `legal_document_status`
--
ALTER TABLE `legal_document_status`
  MODIFY `legal_d_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `monthly_document_status`
--
ALTER TABLE `monthly_document_status`
  MODIFY `monthly_document_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75167;

--
-- AUTO_INCREMENT for table `notification_summary`
--
ALTER TABLE `notification_summary`
  MODIFY `notification_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `other_document_status`
--
ALTER TABLE `other_document_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `performance_assesment`
--
ALTER TABLE `performance_assesment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `performance_assesment_answers`
--
ALTER TABLE `performance_assesment_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `performance_impli_mission_document_status`
--
ALTER TABLE `performance_impli_mission_document_status`
  MODIFY `performance_i_m_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=664;

--
-- AUTO_INCREMENT for table `performance_org_sndns_document_status`
--
ALTER TABLE `performance_org_sndns_document_status`
  MODIFY `performance_o_s_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3235;

--
-- AUTO_INCREMENT for table `performance_other_document_status`
--
ALTER TABLE `performance_other_document_status`
  MODIFY `performance_o_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2136;

--
-- AUTO_INCREMENT for table `performance_vitality_document_status`
--
ALTER TABLE `performance_vitality_document_status`
  MODIFY `performance_v_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5650;

--
-- AUTO_INCREMENT for table `quarterly_document_status`
--
ALTER TABLE `quarterly_document_status`
  MODIFY `quarterly_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8360;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `self_assessment`
--
ALTER TABLE `self_assessment`
  MODIFY `self_assessment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `status_flags`
--
ALTER TABLE `status_flags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `yearly_document_status`
--
ALTER TABLE `yearly_document_status`
  MODIFY `yearly_d_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7117;

--
-- AUTO_INCREMENT for table `yearly_notifications`
--
ALTER TABLE `yearly_notifications`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD CONSTRAINT `fk_affiliate_document01_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document_type1_id` FOREIGN KEY (`document_type_id`) REFERENCES `document_type` (`document_type_id`),
  ADD CONSTRAINT `fk_affiliate_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `affiliate`
--
ALTER TABLE `affiliate`
  ADD CONSTRAINT `fk_affiliate_region_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_state_id` FOREIGN KEY (`state`) REFERENCES `state` (`stateid`);

--
-- Constraints for table `affiliate_compliance_status_monthly`
--
ALTER TABLE `affiliate_compliance_status_monthly`
  ADD CONSTRAINT `fk_affiliate_affiliate9_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`),
  ADD CONSTRAINT `fk_affiliate_compliance1_status` FOREIGN KEY (`compliance_status`) REFERENCES `status_flags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `affiliate_compliance_status_quarterly`
--
ALTER TABLE `affiliate_compliance_status_quarterly`
  ADD CONSTRAINT `fk_affiliate_affiliate10_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`),
  ADD CONSTRAINT `fk_affiliate_compliance2_status` FOREIGN KEY (`compliance_status`) REFERENCES `status_flags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `affiliate_compliance_status_yearly`
--
ALTER TABLE `affiliate_compliance_status_yearly`
  ADD CONSTRAINT `fk_affiliate_affiliate11_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`),
  ADD CONSTRAINT `fk_affiliate_compliance3_status` FOREIGN KEY (`compliance_status`) REFERENCES `status_flags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `automated_mail_log`
--
ALTER TABLE `automated_mail_log`
  ADD CONSTRAINT `fk_automated_id` FOREIGN KEY (`automated_mail_id`) REFERENCES `automated_mails` (`automated_mail_id`) ON DELETE CASCADE;

--
-- Constraints for table `current_status`
--
ALTER TABLE `current_status`
  ADD CONSTRAINT `fk_affiliate_affiliate_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE;

--
-- Constraints for table `financial_year`
--
ALTER TABLE `financial_year`
  ADD CONSTRAINT `fk_affiliate_affiliate1_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE;

--
-- Constraints for table `key_indicators`
--
ALTER TABLE `key_indicators`
  ADD CONSTRAINT `fk_affiliate_idki` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE;

--
-- Constraints for table `legal_document_status`
--
ALTER TABLE `legal_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate04_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document02_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `monthly_document_status`
--
ALTER TABLE `monthly_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate2_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `notification_summary`
--
ALTER TABLE `notification_summary`
  ADD CONSTRAINT `fk_document_type1` FOREIGN KEY (`document_type_id`) REFERENCES `document_type` (`document_type_id`) ON DELETE CASCADE;

--
-- Constraints for table `other_document_status`
--
ALTER TABLE `other_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate5_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE;

--
-- Constraints for table `performance_impli_mission_document_status`
--
ALTER TABLE `performance_impli_mission_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate8_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document5_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `performance_org_sndns_document_status`
--
ALTER TABLE `performance_org_sndns_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate60_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document30_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `performance_other_document_status`
--
ALTER TABLE `performance_other_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate81_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document51_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `performance_vitality_document_status`
--
ALTER TABLE `performance_vitality_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate7_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document4_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `quarterly_document_status`
--
ALTER TABLE `quarterly_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate4_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document2_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_affiliate_affiliate12_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`),
  ADD CONSTRAINT `fk_affiliate_region1_id` FOREIGN KEY (`region_id`) REFERENCES `region` (`region_id`),
  ADD CONSTRAINT `fk_affiliate_role_id` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `yearly_document_status`
--
ALTER TABLE `yearly_document_status`
  ADD CONSTRAINT `fk_affiliate_affiliate3_id` FOREIGN KEY (`affiliate_id`) REFERENCES `affiliate` (`affiliate_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_affiliate_document1_id` FOREIGN KEY (`document_id`) REFERENCES `documents` (`document_id`);

--
-- Constraints for table `yearly_notifications`
--
ALTER TABLE `yearly_notifications`
  ADD CONSTRAINT `fk_upload1_id` FOREIGN KEY (`yearly_d_id`) REFERENCES `yearly_document_status` (`yearly_d_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
