-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2023 at 09:34 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nul_adms_alpha`
--

-- --------------------------------------------------------

--
-- Table structure for table `emergency_covid_services`
--

CREATE TABLE `emergency_covid_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emergency_covid_services`
--

INSERT INTO `emergency_covid_services` (`id`, `name`) VALUES
(1, 'Rent'),
(2, 'Utilities'),
(3, 'Car payments'),
(4, 'Access to Wi-Fi'),
(5, 'Access to computers'),
(6, 'Childcare services'),
(7, 'Home Schooling'),
(8, 'Counseling'),
(9, 'Groceries'),
(10, 'Clothing'),
(11, 'Job Training'),
(12, 'Bereavement Assistance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `emergency_covid_services`
--
ALTER TABLE `emergency_covid_services`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `emergency_covid_services`
--
ALTER TABLE `emergency_covid_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
