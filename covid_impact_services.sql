-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 10:30 AM
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
-- Table structure for table `covid_impact_services`
--

CREATE TABLE `covid_impact_services` (
  `id` int(11) NOT NULL,
  `covid_impact_id` int(11) NOT NULL,
  `field_what_kinds_of_supports` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid_impact_services`
--

INSERT INTO `covid_impact_services` (`id`, `covid_impact_id`, `field_what_kinds_of_supports`) VALUES
(7, 2664, 'Youth Development'),
(8, 2664, 'Academic Support/Homework Help/Tutoring/Accelerated Learning'),
(9, 2664, 'College Readiness'),
(12, 972, 'College Readiness'),
(22, 46692, 'College Readiness'),
(23, 46692, 'Academic Support/Homework Help/Tutoring/Accelerated Learning'),
(24, 46692, 'Career Readiness'),
(25, 46692, 'Counseling/Social Work'),
(26, 46694, 'Youth Development'),
(27, 46694, 'College Readiness'),
(28, 46694, 'Career Readiness'),
(38, 46705, 'Youth Development'),
(39, 46705, 'College Readiness'),
(40, 46705, 'Mentoring'),
(41, 46705, 'Health and Wellness (Mental, physical, etc.)'),
(42, 46705, 'Academic Support/Homework Help/Tutoring/Accelerated Learning'),
(43, 46705, 'TEM or STEAM (Science, Technology, Engineering, Arts/Agriculture and Math/Medicine)'),
(44, 46705, 'Career Readiness'),
(45, 46706, 'Mentoring');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_services`
--
ALTER TABLE `covid_impact_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_services`
--
ALTER TABLE `covid_impact_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
