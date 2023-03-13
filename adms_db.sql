-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 10:22 AM
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
-- Table structure for table `health_quality_pgm_offered`
--

CREATE TABLE `health_quality_pgm_offered` (
  `id` int(11) NOT NULL,
  `pk_id` int(11) DEFAULT NULL,
  `field_health_programs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `health_quality_pgm_offered`
--

INSERT INTO `health_quality_pgm_offered` (`id`, `pk_id`, `field_health_programs`) VALUES
(7, 45820, 'Housing assistance'),
(8, 45820, 'Physical Activity'),
(9, 45820, 'Access to Care (i.e., Insurance or Patient Navigation)'),
(10, 45820, 'Job Placement'),
(11, 11851, 'Housing assistance'),
(12, 11851, 'Access to Care (i.e., Insurance or Patient Navigation)'),
(13, 11851, 'Nutritional access (food pantry, SNAP/WIC)'),
(14, 44492, 'General Health Education'),
(15, 44492, 'COVID 19 Vaccine Outreach, Education and Access'),
(16, 44492, 'Housing assistance'),
(17, 44492, 'Physical Activity'),
(30, 11702, 'General Health Education'),
(31, 11702, 'COVID 19 Vaccine Outreach, Education and Access'),
(32, 11702, 'Nutritional access (food pantry, SNAP/WIC)'),
(33, 11702, 'Mental Health resources'),
(37, 1256, 'Housing assistance'),
(38, 45895, 'COVID 19 Vaccine Outreach, Education and Access'),
(39, 45895, 'Job Placement'),
(52, 46713, 'General Health Education'),
(53, 46713, 'COVID 19 Vaccine Outreach, Education and Access'),
(54, 46713, 'Housing assistance'),
(61, 46712, 'General Health Education'),
(62, 46712, 'COVID 19 Vaccine Outreach, Education and Access'),
(63, 46712, 'Housing assistance'),
(83, 46638, 'General Health Education'),
(84, 46638, 'Physical Activity'),
(87, 46716, 'Housing assistance'),
(88, 46716, 'Job Placement'),
(113, 46732, 'General Health Education'),
(114, 46732, 'COVID 19 Vaccine Outreach, Education and Access'),
(115, 46732, 'Housing assistance'),
(116, 46732, 'Physical Activity'),
(117, 46732, 'Access to Care (i.e., Insurance or Patient Navigation)'),
(118, 46732, 'Job Placement'),
(119, 46732, 'Nutritional access (food pantry, SNAP/WIC)'),
(120, 46732, 'Mental Health resources'),
(126, 46735, 'General Health Education'),
(127, 46735, 'COVID 19 Vaccine Outreach, Education and Access'),
(128, 46735, 'Physical Activity'),
(129, 46735, 'Access to Care (i.e., Insurance or Patient Navigation)'),
(130, 46735, 'Mental Health resources');

-- --------------------------------------------------------

--
-- Table structure for table `target_groups_served`
--

CREATE TABLE `target_groups_served` (
  `tid` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key: Unique term ID.',
  `name` varchar(255) NOT NULL DEFAULT '' COMMENT 'The term name.',
  `type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Stores term information.';

--
-- Dumping data for table `target_groups_served`
--

INSERT INTO `target_groups_served` (`tid`, `name`, `type`) VALUES
(640, 'Adults', 'health_quality'),
(641, 'Adults (25 – 54)', 'housing'),
(642, 'Adults with no HS Diploma (18+ years old)', 'education_program'),
(643, 'African American', 'entrepreneurship_program'),
(644, 'African Americans', 'health_quality'),
(645, 'All students P-16', 'education_program'),
(646, 'Boys and Young Men of Color Specific (Any age)', 'education_program'),
(647, 'Charter School Parents', 'education_program'),
(648, 'Charter School Students', 'education_program'),
(649, 'College Students (Associates and Bachelors Programs)', 'education_program'),
(650, 'Communities of Color', 'health_quality'),
(651, 'Community Leaders, Stakeholders and Advocates', 'education_program'),
(652, 'Counselors', 'education_program'),
(653, 'Court Involved Youth', 'education_program'),
(654, 'DBE (Certified)', 'entrepreneurship_program'),
(655, 'Elementary Age Children', 'health_quality'),
(656, 'Elementary Age Students', 'education_program'),
(657, 'Ethnic Minority', 'entrepreneurship_program'),
(658, 'Female Specific (Any age)', 'health_quality'),
(659, 'Foster Care Children & Youth', 'education_program'),
(660, 'Girls and Young Women of Color Specific (Any age)', 'education_program'),
(661, 'Health & Wellness Stakeholders & Advocates', 'health_quality'),
(662, 'High School Age Students', 'education_program'),
(663, 'High School Age Young Adults', 'health_quality'),
(664, 'Home Schooled Students', 'education_program'),
(665, 'Homeless Children Youth', 'education_program'),
(666, 'Immigrant & newcomer Parents, Families and Guardians', 'education_program'),
(667, 'Immigrant & Newcomer Populations', 'health_quality'),
(668, 'Immigrant & Newcomer Students', 'education_program'),
(669, 'Long-term Unemployed (26+ weeks or more)', 'workforce'),
(670, 'Male Specific (Any age)', 'health_quality'),
(671, 'MBE (Certified)', 'entrepreneurship_program'),
(672, 'Middle School / Jr. High Age Students', 'education_program'),
(673, 'Middle School / Jr. High Age Youth', 'health_quality'),
(674, 'Middle/ Jr. High or High School Students Assigned to Alternative School or Program', 'education_program'),
(675, 'Minority-Owned Business (Not certified)', 'entrepreneurship_program'),
(676, 'Newborn – 4 years old', 'health_quality'),
(677, 'Older Adults: (55+)', 'workforce'),
(678, 'Other (EDGE, SBE)', 'entrepreneurship_program'),
(679, 'Out of School Youth (Not Enrolled in School or Employed)', 'education_program'),
(680, 'Over Aged Students (19+ years old)', 'education_program'),
(681, 'Parents, Guardians & Caregivers', 'education_program'),
(682, 'Participants Diagnosed with Specific Conditions (Hypertension, Diabetes, HIV-AIDS, etc.)', 'health_quality'),
(683, 'Populations Particularly Vulnerable to Specific Conditions and Diagnoses (Hypertension, Diabetes, HIV-AIDS, etc.)', 'health_quality'),
(684, 'Pregnant or Parenting Students (Under 19 years old)', 'education_program'),
(685, 'Principals', 'education_program'),
(686, 'Public Benefit Beneficiaries', 'workforce'),
(687, 'Residents of Public Housing Facilities', 'health_quality'),
(688, 'Residents of Specific Neighborhoods, Communities and Geographic Locations', 'health_quality'),
(689, 'Returning Citizens (Ex-offenders)', 'workforce'),
(690, 'Seniors (55 years of age and older)', 'education_program'),
(691, 'Small Businesses', 'entrepreneurship_program'),
(692, 'STEAM Students (Science, Technology, Engineering, Arts / Agriculture and Math)', 'education_program'),
(693, 'Students from Across a Specific District', 'education_program'),
(694, 'Students from Multiple Districts', 'education_program'),
(695, 'Students in a Specific Geographic Catchment Area (Housing Development)', 'education_program'),
(696, 'Students in a Specific Geographic Catchment Area (Neighborhood)', 'education_program'),
(697, 'Students in a Specific School', 'education_program'),
(698, 'Students in a Specific Set of Schools (Feeder Pattern)', 'education_program'),
(699, 'Students Under 18 years of age pursuing a GED', 'education_program'),
(700, 'Students with Disabilities', 'education_program'),
(701, 'Teachers', 'education_program'),
(702, 'Truant or Suspended Youth', 'education_program'),
(703, 'Under-credited Students (Designated by School or District)', 'education_program'),
(704, 'Underemployed', 'workforce'),
(705, 'Unemployed', 'workforce'),
(706, 'Uninsured & Underinsured Populations', 'health_quality'),
(707, 'Veterans', 'workforce'),
(708, 'WBE (Certified)', 'entrepreneurship_program'),
(709, 'Woman-Owned Business (Not certified)', 'entrepreneurship_program'),
(710, 'Youth (16 – 24)', 'workforce'),
(711, 'Youth (Elementary through High School)', 'entrepreneurship_program'),
(712, 'Youth Interested in Pursuing a Specific Career or Course of Study', 'education_program');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `health_quality_pgm_offered`
--
ALTER TABLE `health_quality_pgm_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `target_groups_served`
--
ALTER TABLE `target_groups_served`
  ADD PRIMARY KEY (`tid`),
  ADD KEY `taxonomy_tree` (`name`),
  ADD KEY `vid_name` (`name`),
  ADD KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `health_quality_pgm_offered`
--
ALTER TABLE `health_quality_pgm_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `target_groups_served`
--
ALTER TABLE `target_groups_served`
  MODIFY `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key: Unique term ID.', AUTO_INCREMENT=713;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
