-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 03:32 PM
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
-- Database: `adms_db_22_03`
--

-- --------------------------------------------------------

--
-- Table structure for table `covid_impact_services_value`
--

CREATE TABLE `covid_impact_services_value` (
  `id` int(11) NOT NULL,
  `covid_impact_services_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `covid_impact_services_value`
--

INSERT INTO `covid_impact_services_value` (`id`, `covid_impact_services_id`, `value`) VALUES
(1, 1, 'Youth Development'),
(2, 2, 'Academic Support/ Homework Help/ Tutoring/ Accelerated Learning'),
(3, 3, 'College Readiness'),
(4, 4, 'Career Readiness'),
(5, 5, 'Mentoring'),
(6, 6, 'Counseling/Social Work'),
(7, 7, 'Health and Wellness (Mental, physical, etc.)'),
(8, 8, 'Athletics'),
(9, 9, 'STEM or STEAM (Science, Technology, Engineering, Arts/Agriculture and Math/Medicine)');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_services_value`
--
ALTER TABLE `covid_impact_services_value`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_services_value`
--
ALTER TABLE `covid_impact_services_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
