-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 07:12 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Table structure for table `report_title`
--

CREATE TABLE `report_title` (
  `id` int(11) NOT NULL,
  `title` varchar(70) NOT NULL,
  `category` varchar(50) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report_title`
--

INSERT INTO `report_title` (`id`, `title`, `category`, `link`) VALUES
(1, 'Annual Census Publication Report', 'census_report', 'module/affiliateindex'),
(2, 'Annual Affliliate Census Report', 'census_report', 'module/census_affiliate/'),
(3, 'Annual Combined Census Summary Report', 'census_report', 'module/censussummary/'),
(4, 'Cumulative People Served History Report', 'people_served', 'modules/census/census_reports/cumulative_people_history'),
(5, 'Census Cumulative Program Report', 'programs', 'module/census_reports/cumulative_program_report'),
(6, 'Cumulative Census Revenue/Expenditure/Net Report', 'financials', 'module/census_report/cumulative_census_revenue'),
(7, 'Cumulative Employee Report', 'employees_volunteers', 'module/census_reports/cumulative_employee_report'),
(8, 'Affiliate Census Revenue/Expenditure/Net Report', 'financials', 'module/census_report/affiliate_census_revenue'),
(9, 'Cumulative Key Funding Revenue Report', 'financials', 'module/census_report/cumulative_keyfund_revenue'),
(10, 'Affiliate People Served History Report', 'people_served', 'modules/census/census_reports/affiliate_people_history'),
(11, 'Cumulative Civic Engagement Report', 'people_served', 'modules/census/census_reports/cumulative_civic_engagement'),
(12, 'Census Affiliate Civic Engagement Query Report', 'people_served', 'modules/census/census_reports/affiliate_civic_engagement_query'),
(13, 'Voter Registration', 'people_served', 'modules/census/census_reports/voter_registration'),
(14, 'COVID Related Questions - Aggregates', 'people_served', ''),
(15, 'COVID Related Questions', 'people_served', ''),
(16, 'Census Affiliate Employee Query Report', 'employees_volunteers', 'module/census_reports/affiliate_employee_report'),
(17, 'Cumulative Members and Volunteers Report', 'employees_volunteers', 'module/census_reports/cumulative_member_volunteer'),
(18, 'Census Affiliate Members and Volunteers Query Report', 'employees_volunteers', 'module/census_reports/affiliate_member_volunteer'),
(19, 'List of Affiliate CEO\'s', 'employees_volunteers', ''),
(20, 'Key Funding Revenue Query Report', 'financials', 'module/census_report/affiliate_keyfund_query'),
(21, 'Census Program Area Summary Report', 'programs', 'module/census_reports/program_area_summary'),
(22, 'Census Affiliate Program Area Query Report', 'programs', 'module/census_reports/affiliate_program_area_query'),
(23, 'Census Program Area People Served Query Report', 'programs', 'module/census_reports/program_area_people_served'),
(24, 'Cumulative Education Report', 'programs', 'module/census_reports/cumulative_education_report'),
(25, 'Census Affiliate Education Query Report', 'programs', 'module/census_reports/affiliate_education_query_report'),
(26, 'Cumulative Entrepreneurship Report', 'programs', 'module/census_reports/cumulative_entrepreneurship_report'),
(27, 'Census Affiliate Entrepreneurship Query Report', 'programs', 'module/census_reports/affiliate_entrepreneurship_query_report'),
(28, 'Cumulative Health Report', 'programs', 'module/census_reports/cumulative_health_report'),
(29, 'Census Affiliate Health Query Report', 'programs', 'module/census_reports/affiliate_health_query_report'),
(30, 'Cumulative Housing Report', 'programs', 'module/census_reports/cumulative_housing_report'),
(31, 'Census Affiliate Housing Query Report', 'programs', 'module/census_reports/affiliate_housing_query_report'),
(32, 'Cumulative Workforce Development Report', 'programs', 'module/census_reports/cumulative_workforce_development_report'),
(33, 'Census Affiliate Workforce Query Report', 'programs', 'module/census_reports/affiliate_workforce_query_report');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report_title`
--
ALTER TABLE `report_title`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report_title`
--
ALTER TABLE `report_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
