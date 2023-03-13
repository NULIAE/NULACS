-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 12:46 PM
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
-- Table structure for table `covid_impact_services_requested`
--

CREATE TABLE `covid_impact_services_requested` (
  `id` int(11) NOT NULL,
  `covid_impact_id` int(11) DEFAULT NULL,
  `services_requested` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid_impact_services_requested`
--

INSERT INTO `covid_impact_services_requested` (`id`, `covid_impact_id`, `services_requested`) VALUES
(4, 2664, 'Information about COVID related symptom'),
(5, 2664, 'Assistance for a person with a disability'),
(6, 2664, 'Medical referral to a clinic/physician/hospital'),
(7, 2979, 'Financial assistance for mortgage'),
(8, 2979, 'Medical referral to a clinic/physician/hospital'),
(10, 972, 'Job placement'),
(80, 46693, 'Medical assistance for an adult'),
(81, 46693, 'Financial assistance for mortgage'),
(82, 46693, 'Medical referral to a clinic/physician/hospital'),
(83, 46690, 'Information about COVID related symptom'),
(84, 46690, 'Medical assistance for a child/children'),
(85, 46690, 'Financial assistance for rent'),
(86, 46690, 'Financial assistance for utilities'),
(87, 46690, 'Assistance for a person with a disability'),
(88, 46690, 'Mental Health Assistance (anxiety/stress/depression/trouble sleeping)'),
(89, 46690, 'Vaccine Assistance'),
(90, 46690, 'Access to Wi-Fi'),
(97, 46631, 'Information about COVID related symptom'),
(98, 46631, 'Medical assistance for a child/children'),
(99, 46631, 'Vaccine Assistance'),
(100, 1311, 'Access to Wi-Fi'),
(101, 46689, 'Assistance for a person with a disability'),
(102, 46692, 'Assistance for a person with a disability'),
(103, 46692, 'Medical assistance for an adult'),
(104, 46694, 'Financial assistance for rent'),
(105, 46694, 'Medical referral to a clinic/physician/hospital'),
(138, 46705, 'Information about COVID related symptom'),
(139, 46705, 'Medical assistance for a child/children'),
(140, 46705, 'Financial assistance for rent'),
(141, 46705, 'Financial assistance for utilities'),
(142, 46705, 'Assistance for a person with a disability'),
(143, 46705, 'Mental Health Assistance (anxiety/stress/depression/trouble sleeping)'),
(144, 46705, 'Vaccine Assistance'),
(145, 46705, 'Access to Wi-Fi'),
(146, 46705, 'Masks'),
(147, 46705, 'Medical assistance for an adult'),
(148, 46705, 'Financial assistance for mortgage'),
(149, 46705, 'Financial assistance for food'),
(150, 46705, 'Medical referral to a clinic/physician/hospital'),
(151, 46705, 'Information on respiratory/ hygiene and other infection prevention techniques'),
(152, 46705, 'Job placement'),
(153, 46705, 'Bereavement Assistance'),
(154, 46706, 'Masks');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_services_requested`
--
ALTER TABLE `covid_impact_services_requested`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_services_requested`
--
ALTER TABLE `covid_impact_services_requested`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
