-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 12:13 PM
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
-- Table structure for table `workforce_develop_incentives`
--

CREATE TABLE `workforce_develop_incentives` (
  `id` int(11) NOT NULL,
  `pk_id` int(11) DEFAULT NULL,
  `field_financial_incentives` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workforce_develop_incentives`
--

INSERT INTO `workforce_develop_incentives` (`id`, `pk_id`, `field_financial_incentives`) VALUES
(2, 45268, 'Wage subsidy'),
(3, 45268, 'learn and earn incentives'),
(4, 36626, 'learn and earn incentives'),
(5, 36626, 'financial supports to make work accessible (transportation assistance, uniform/equipment, fees/miscellaneous costs)'),
(7, 2027, 'learn and earn incentives'),
(31, 46695, 'Wage subsidy'),
(32, 46695, 'learn and earn incentives'),
(33, 46695, 'financial supports to make work accessible (transportation assistance, uniform/equipment, fees/miscellaneous costs)'),
(43, 46713, 'Wage subsidy'),
(44, 46713, 'learn and earn incentives'),
(45, 46713, 'financial supports to make work accessible (transportation assistance, uniform/equipment, fees/miscellaneous costs)'),
(47, 46715, 'learn and earn incentives');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workforce_develop_incentives`
--
ALTER TABLE `workforce_develop_incentives`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workforce_develop_incentives`
--
ALTER TABLE `workforce_develop_incentives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
