-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: infospica-manager-mysql
-- Generation Time: Mar 13, 2023 at 12:58 PM
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
-- Table structure for table `workforce_develop_industries`
--

CREATE TABLE `workforce_develop_industries` (
  `id` int(11) NOT NULL,
  `pk_id` int(11) DEFAULT NULL,
  `field_industries_work` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `workforce_develop_industries`
--

INSERT INTO `workforce_develop_industries` (`id`, `pk_id`, `field_industries_work`) VALUES
(8, 45268, 'Skilled Trades'),
(9, 45268, 'Construction'),
(10, 45268, 'Manufacturing'),
(11, 45268, 'Retail'),
(15, 36626, 'Energy (traditional or clean)'),
(16, 36626, 'Skilled Trades'),
(17, 36626, 'Retail'),
(21, 2027, 'Hospitality'),
(22, 2027, 'Energy (traditional or clean)'),
(23, 2027, 'Manufacturing'),
(38, 46692, 'Technology'),
(58, 46695, 'Energy (traditional or clean)'),
(59, 46695, 'Manufacturing'),
(61, 46710, 'Technology'),
(62, 46710, 'Energy (traditional or clean)'),
(63, 46710, 'General Business'),
(64, 46710, 'Other'),
(65, 46710, 'Retail'),
(93, 46713, 'Technology'),
(94, 46713, 'Hospitality'),
(95, 46713, 'Energy (traditional or clean)'),
(96, 46713, 'General Business'),
(97, 46713, 'Other'),
(98, 46713, 'Skilled Trades'),
(99, 46713, 'Construction'),
(100, 46713, 'Manufacturing'),
(101, 46713, 'Retail'),
(103, 46715, 'Technology');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `workforce_develop_industries`
--
ALTER TABLE `workforce_develop_industries`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `workforce_develop_industries`
--
ALTER TABLE `workforce_develop_industries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
