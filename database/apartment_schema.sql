-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 06:29 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apartment_schema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `_password`) VALUES
(10011, 'aa@gmail.com', 'A1234'),
(10012, 'ab@gmail.com', 'A1234');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `f_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `electricity` float DEFAULT NULL,
  `water` float DEFAULT NULL,
  `gas` float DEFAULT NULL,
  `rent` float DEFAULT NULL,
  `maintenance` float DEFAULT NULL,
  `_month` varchar(20) DEFAULT NULL,
  `_year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `_status` smallint(6) NOT NULL,
  `salary` int(11) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `a_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `nid`, `address`, `phone`, `designation`, `_status`, `salary`, `start_time`, `end_time`, `a_id`) VALUES
(5001, 'Abul Kalam', 'AB100200', 'Rotonpur,Noakhali', '0170000', 'Security Guard', 1, 5000, '2022-03-01', NULL, 10011);

-- --------------------------------------------------------

--
-- Table structure for table `flat`
--

CREATE TABLE `flat` (
  `id` int(11) NOT NULL,
  `ownerId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flat`
--

INSERT INTO `flat` (`id`, `ownerId`) VALUES
(11, 20011);

-- --------------------------------------------------------

--
-- Table structure for table `flatowner`
--

CREATE TABLE `flatowner` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `_status` smallint(6) NOT NULL,
  `_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flatowner`
--

INSERT INTO `flatowner` (`id`, `name`, `nid`, `address`, `phone`, `_status`, `_password`) VALUES
(20011, 'Majid Khan', 'BG2221111', 'Nurpur,Chittagong', '01223344', 1, 'F1234');

-- --------------------------------------------------------

--
-- Table structure for table `guard`
--

CREATE TABLE `guard` (
  `id` int(11) NOT NULL,
  `e_id` int(11) DEFAULT NULL,
  `_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guard`
--

INSERT INTO `guard` (`id`, `e_id`, `_password`) VALUES
(40011, 5001, 'G1234');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `name` varchar(50) DEFAULT NULL,
  `f_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `f_id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `body` varchar(300) DEFAULT NULL,
  `_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `id` int(11) NOT NULL,
  `flatId` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `nid` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `_status` smallint(6) DEFAULT NULL,
  `_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `flatId`, `name`, `nid`, `address`, `phone`, `_status`, `_password`) VALUES
(30011, 11, 'Ratul Ahmed', 'GH123435', 'Moghbazar,Dhaka', '0981234', 1, 'T1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`f_id`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `a_id` (`a_id`);

--
-- Indexes for table `flat`
--
ALTER TABLE `flat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `flatowner`
--
ALTER TABLE `flatowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guard`
--
ALTER TABLE `guard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `e_id` (`e_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`f_id`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`f_id`,`t_id`),
  ADD KEY `t_id` (`t_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flatId` (`flatId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `flat` (`id`),
  ADD CONSTRAINT `bills_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tenant` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `flat`
--
ALTER TABLE `flat`
  ADD CONSTRAINT `flat_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `flatowner` (`id`);

--
-- Constraints for table `guard`
--
ALTER TABLE `guard`
  ADD CONSTRAINT `guard_ibfk_1` FOREIGN KEY (`e_id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `guest_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `flat` (`id`),
  ADD CONSTRAINT `guest_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tenant` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `flat` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`t_id`) REFERENCES `tenant` (`id`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`flatId`) REFERENCES `flat` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
