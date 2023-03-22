-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 03:23 PM
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
-- Table structure for table `covid_impact_disruptions_value`
--

CREATE TABLE `covid_impact_disruptions_value` (
  `id` int(11) NOT NULL,
  `covid_impact_disruptions_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `covid_impact_disruptions_value`
--

INSERT INTO `covid_impact_disruptions_value` (`id`, `covid_impact_disruptions_id`, `value`) VALUES
(1, 1, 'School-based partnerships- limited access to school buildings, students and families'),
(2, 2, 'Out of school time partnerships- limited access to museums, parks, recreational facilities, etc.'),
(3, 3, 'Advocacy and engagement partnerships'),
(4, 4, 'Parent, Family and Caregiver supports and services'),
(5, 5, 'Internships or Summer Youth Employment placements'),
(6, 6, 'Social service partnerships'),
(7, 7, 'Health partnerships that serve children, youth and families (community clinics)'),
(8, 8, 'Disruptions resulted in no new partnerships established');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_disruptions_value`
--
ALTER TABLE `covid_impact_disruptions_value`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_disruptions_value`
--
ALTER TABLE `covid_impact_disruptions_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
