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
-- Table structure for table `workforce_develop_participants`
--

CREATE TABLE `workforce_develop_participants` (
  `id` int(11) NOT NULL,
  `pk_id` int(11) DEFAULT NULL,
  `field_participants_place` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workforce_develop_participants`
--

INSERT INTO `workforce_develop_participants` (`id`, `pk_id`, `field_participants_place`) VALUES
(8, 45268, 'Construction'),
(9, 45268, 'Cyber-Security'),
(10, 45268, 'Other'),
(11, 45268, 'Clean Energy'),
(16, 36626, 'Construction'),
(17, 36626, 'Cyber-Security'),
(21, 2027, 'Construction'),
(22, 2027, 'Cyber-Security'),
(23, 2027, 'Automation'),
(52, 46695, 'Cyber-Security'),
(53, 46695, 'Clean Energy'),
(55, 46710, 'Construction'),
(56, 46710, 'Cyber-Security'),
(57, 46710, 'Other'),
(58, 46710, 'Clean Energy'),
(59, 46710, 'Automation'),
(75, 46713, 'Construction'),
(76, 46713, 'Cyber-Security'),
(77, 46713, 'Other'),
(78, 46713, 'Clean Energy'),
(79, 46713, 'Automation'),
(81, 46715, 'Construction');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workforce_develop_participants`
--
ALTER TABLE `workforce_develop_participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workforce_develop_participants`
--
ALTER TABLE `workforce_develop_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
