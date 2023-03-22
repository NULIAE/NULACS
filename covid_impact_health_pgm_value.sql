-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 03:24 PM
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
-- Table structure for table `covid_impact_health_pgm_value`
--

CREATE TABLE `covid_impact_health_pgm_value` (
  `id` int(11) NOT NULL,
  `covid_impact_health_pgm_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `covid_impact_health_pgm_value`
--

INSERT INTO `covid_impact_health_pgm_value` (`id`, `covid_impact_health_pgm_id`, `value`) VALUES
(1, 1, 'General Health Education'),
(2, 2, 'Access to Care'),
(3, 3, 'COVID 19 Vaccine Outreach, Education and Access'),
(4, 4, 'Nutritional access (food pantry, SNAP/WIC)'),
(5, 5, 'Physical Activity'),
(6, 6, 'Mental Health resources');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_health_pgm_value`
--
ALTER TABLE `covid_impact_health_pgm_value`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_health_pgm_value`
--
ALTER TABLE `covid_impact_health_pgm_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
