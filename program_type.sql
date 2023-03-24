-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 24, 2023 at 11:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adms_db_25_03`
--

-- --------------------------------------------------------

--
-- Table structure for table `program_type`
--

CREATE TABLE `program_type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'Primary Key: Unique term ID.',
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT 'The term name.',
  `program_areas_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_type`
--

INSERT INTO `program_type` (`id`, `name`, `program_areas_id`) VALUES
(553, 'Business Incubator or Accelerator', 495),
(554, 'College & Career Readiness', 494),
(555, 'College Preparation & Access', 494),
(556, 'College Scholarship Program', 494),
(557, 'Designated National Urban League Entrepreneurship Center', 495),
(558, 'Early Childhood Education Program (other than Head Start)', 494),
(559, 'Early Head Start', 494),
(560, 'Education Programing for Adults', 494),
(561, 'Events Only', 495),
(562, 'Head Start', 494),
(563, 'Mentoring Programs for children and youth (1st – 12th grade)', 494),
(564, 'Non- Project Ready STEM or STEAM', 494),
(565, 'Other Entrepreneurship Program', 495),
(566, 'Out of School Time (OST), Afterschool & Extended Day Program', 494),
(567, 'Parent Advocacy', 494),
(568, 'Parent Engagement', 494),
(569, 'Pre-/Post-Loan Counseling or Small Business Lending', 495),
(570, 'Project Ready', 494),
(571, 'Service Learning', 494),
(572, 'Youth Development', 494);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `program_type`
--
ALTER TABLE `program_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `program_type`
--
ALTER TABLE `program_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary Key: Unique term ID.', AUTO_INCREMENT=573;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
