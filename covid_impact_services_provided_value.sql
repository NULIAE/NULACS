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
-- Table structure for table `covid_impact_services_provided_value`
--

CREATE TABLE `covid_impact_services_provided_value` (
  `id` int(11) NOT NULL,
  `covid_impact_services_provided_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `covid_impact_services_provided_value`
--

INSERT INTO `covid_impact_services_provided_value` (`id`, `covid_impact_services_provided_id`, `value`) VALUES
(1, 1, 'Information about COVID related symptoms'),
(2, 2, 'Masks'),
(3, 3, 'Medical assistance for a child/children'),
(4, 4, 'Medical assistance for an adult'),
(5, 5, 'Financial assistance for rent'),
(6, 6, 'Financial assistance for mortgage'),
(7, 7, 'Financial assistance for utilities'),
(8, 8, 'Financial assistance for food'),
(9, 9, 'Assistance for a person with a disability'),
(10, 10, 'Medical referral to a clinic/physician/hospital'),
(11, 11, 'Mental Health Assistance (anxiety/stress/depression/trouble sleeping)'),
(12, 12, 'Information on respiratory/ hygiene and other infection prevention techniques'),
(13, 13, 'Vaccine Assistance'),
(14, 14, 'Job placement'),
(15, 15, 'Access to Wi-Fi'),
(16, 16, 'Bereavement Assistance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_services_provided_value`
--
ALTER TABLE `covid_impact_services_provided_value`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_services_provided_value`
--
ALTER TABLE `covid_impact_services_provided_value`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
