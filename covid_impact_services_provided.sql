-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 12:47 PM
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
-- Table structure for table `covid_impact_services_provided`
--

CREATE TABLE `covid_impact_services_provided` (
  `id` int(11) NOT NULL,
  `covid_impact_id` int(11) DEFAULT NULL,
  `services_provided` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid_impact_services_provided`
--

INSERT INTO `covid_impact_services_provided` (`id`, `covid_impact_id`, `services_provided`) VALUES
(4, 2664, 'Masks'),
(5, 2664, 'Medical assistance for an adult'),
(6, 2664, 'Financial assistance for food'),
(7, 2979, 'Vaccine Assistance'),
(8, 2979, 'Access to Wi-Fi'),
(9, 2979, 'Medical assistance for an adult'),
(11, 972, 'Financial assistance for rent'),
(89, 46690, 'Information about COVID related symptom'),
(90, 46690, 'Medical assistance for a child/children'),
(91, 46690, 'Financial assistance for rent'),
(92, 46690, 'Financial assistance for utilities'),
(93, 46690, 'Assistance for a person with a disability'),
(94, 46690, 'Mental Health Assistance (anxiety/stress/depression/trouble sleeping)'),
(95, 46690, 'Vaccine Assistance'),
(96, 46690, 'Access to Wi-Fi'),
(102, 46631, 'Assistance for a person with a disability'),
(103, 46631, 'Mental Health Assistance (anxiety/stress/depression/trouble sleeping)'),
(104, 46631, 'Vaccine Assistance'),
(105, 46631, 'Access to Wi-Fi'),
(106, 1311, 'Medical assistance for a child/children'),
(107, 46689, 'Financial assistance for mortgage'),
(108, 39335, 'Mental Health Assistance (anxiety/stress/depression/trouble sleeping)'),
(111, 44536, 'Financial assistance for rent'),
(112, 44536, 'Financial assistance for utilities'),
(113, 46692, 'Vaccine Assistance'),
(114, 46692, 'Masks'),
(115, 46692, 'Information on respiratory/ hygiene and other infection prevention techniques'),
(116, 46694, 'Assistance for a person with a disability'),
(117, 46694, 'Financial assistance for mortgage'),
(150, 46705, 'Information about COVID related symptom'),
(151, 46705, 'Medical assistance for a child/children'),
(152, 46705, 'Financial assistance for rent'),
(153, 46705, 'Financial assistance for utilities'),
(154, 46705, 'Assistance for a person with a disability'),
(155, 46705, 'Mental Health Assistance (anxiety/stress/depression/trouble sleeping)'),
(156, 46705, 'Vaccine Assistance'),
(157, 46705, 'Access to Wi-Fi'),
(158, 46705, 'Masks'),
(159, 46705, 'Medical assistance for an adult'),
(160, 46705, 'Financial assistance for mortgage'),
(161, 46705, 'Financial assistance for food'),
(162, 46705, 'Medical referral to a clinic/physician/hospital'),
(163, 46705, 'Information on respiratory/ hygiene and other infection prevention techniques'),
(164, 46705, 'Job placement'),
(165, 46705, 'Bereavement'),
(166, 46706, 'Masks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_services_provided`
--
ALTER TABLE `covid_impact_services_provided`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_services_provided`
--
ALTER TABLE `covid_impact_services_provided`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
