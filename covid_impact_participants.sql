-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 12:48 PM
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
-- Table structure for table `covid_impact_participants`
--

CREATE TABLE `covid_impact_participants` (
  `id` int(11) NOT NULL,
  `covid_impact_id` int(11) DEFAULT NULL,
  `engage_participants` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `covid_impact_participants`
--

INSERT INTO `covid_impact_participants` (`id`, `covid_impact_id`, `engage_participants`) VALUES
(3, 2664, 'SMS'),
(4, 2664, 'Social Media'),
(5, 2979, 'SMS'),
(6, 46694, 'Phone'),
(7, 46694, 'Zoom or other Video Platform'),
(8, 46694, 'Social Media'),
(13, 46702, 'Phone'),
(14, 46702, 'SMS'),
(15, 46702, 'Zoom or other Video Platform'),
(16, 46702, 'Social Media'),
(25, 46705, 'Phone'),
(26, 46705, 'SMS'),
(27, 46705, 'Zoom or other Video Platform'),
(28, 46705, 'Social Media'),
(29, 46706, 'SMS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `covid_impact_participants`
--
ALTER TABLE `covid_impact_participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `covid_impact_participants`
--
ALTER TABLE `covid_impact_participants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
