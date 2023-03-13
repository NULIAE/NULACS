-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 12:49 PM
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
-- Table structure for table `covid_impact_disruptions`
--

CREATE TABLE `covid_impact_disruptions` (
  `id` int(11) NOT NULL,
  `covid_impact_id` int(11) NOT NULL,
  `field_were_there_any_disruptions` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid_impact_disruptions`
--

INSERT INTO `covid_impact_disruptions` (`id`, `covid_impact_id`, `field_were_there_any_disruptions`) VALUES
(3, 2664, 'Parent, Family and Caregiver supports and services'),
(4, 2664, 'Health partnerships that serve children, youth and families (community clinics)'),
(9, 2979, 'Advocacy and engagement partnerships'),
(10, 2979, 'Health partnerships that serve children, youth and families (community clinics)'),
(11, 2979, 'Social service partnerships'),
(12, 46694, 'School-based partnerships- limited access to school buildings, students and families'),
(13, 46694, 'Advocacy and engagement partnerships'),
(14, 46694, 'Internships or Summer Youth Employment placements'),
(15, 46694, 'Out of school time partnerships- limited access to museums, parks, recreational facilities, etc.'),
(16, 46694, 'Parent, Family and Caregiver supports and services'),
(17, 46695, 'School-based partnerships- limited access to school buildings, students and families'),
(18, 46695, 'Parent, Family and Caregiver supports and services'),
(35, 46705, 'School-based partnerships- limited access to school buildings, students and families'),
(36, 46705, 'Advocacy and engagement partnerships'),
(37, 46705, 'Internships or Summer Youth Employment placements'),
(38, 46705, 'Health partnerships that serve children, youth and families (community clinics)'),
(39, 46705, 'Out of school time partnerships- limited access to museums, parks, recreational facilities, etc.'),
(40, 46705, 'Parent, Family and Caregiver supports and services'),
(41, 46705, 'Social service partnerships'),
(42, 46705, 'Disruptions resulted in no new partnerships established'),
(43, 46706, 'Advocacy and engagement partnerships');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_disruptions`
--
ALTER TABLE `covid_impact_disruptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_disruptions`
--
ALTER TABLE `covid_impact_disruptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
