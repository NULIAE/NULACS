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
-- Table structure for table `covid_impact_health_pgm`
--

CREATE TABLE `covid_impact_health_pgm` (
  `id` int(11) NOT NULL,
  `covid_impact_id` int(11) NOT NULL,
  `field_what_health_programs` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid_impact_health_pgm`
--

INSERT INTO `covid_impact_health_pgm` (`id`, `covid_impact_id`, `field_what_health_programs`) VALUES
(3, 2664, 'Access to Care'),
(4, 2664, 'Physical Activity'),
(9, 2979, 'COVID 19 Vaccine Outreach, Education and Access'),
(10, 2979, 'Physical Activity'),
(11, 2979, 'Access to Care'),
(12, 954, 'Access to Care'),
(13, 954, 'Nutritional access (food pantry, SNAP/WIC)'),
(14, 954, 'Mental Health resources'),
(27, 46692, 'COVID 19 Vaccine Outreach, Education and Access'),
(28, 46692, 'Nutritional access (food pantry, SNAP/WIC)'),
(29, 46694, 'General Health Education'),
(30, 46695, 'COVID 19 Vaccine Outreach, Education and Access'),
(43, 46705, 'General Health Education'),
(44, 46705, 'COVID 19 Vaccine Outreach, Education and Access'),
(45, 46705, 'Physical Activity'),
(46, 46705, 'Access to Care'),
(47, 46705, 'Nutritional access (food pantry, SNAP/WIC)'),
(48, 46705, 'Mental Health resources'),
(49, 46706, 'General Health Education');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_health_pgm`
--
ALTER TABLE `covid_impact_health_pgm`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_health_pgm`
--
ALTER TABLE `covid_impact_health_pgm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
