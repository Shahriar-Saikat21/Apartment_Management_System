-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2023 at 04:09 PM
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
  `id` varchar(20) NOT NULL,
  `ownerId` varchar(20) DEFAULT NULL,
  `_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `ownerId`, `_password`) VALUES
('A100', 'F100', 'A1234');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `tenant_id` varchar(20) NOT NULL,
  `flat_id` varchar(20) NOT NULL,
  `rent` int(11) DEFAULT NULL,
  `maintenance` int(11) DEFAULT NULL,
  `e_bill` float DEFAULT NULL,
  `e_ref` varchar(50) DEFAULT NULL,
  `g_bill` float DEFAULT NULL,
  `g_ref` varchar(50) DEFAULT NULL,
  `w_bill` float DEFAULT NULL,
  `w_ref` varchar(50) DEFAULT NULL,
  `_month` varchar(20) DEFAULT NULL,
  `_year` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `designation` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `salary` int(11) DEFAULT NULL,
  `_status` smallint(6) DEFAULT NULL,
  `adminId` varchar(20) DEFAULT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `nid`, `designation`, `address`, `phone`, `salary`, `_status`, `adminId`, `start_time`, `end_time`) VALUES
('E100', 'Abdul Aziz', 'BGD000999', 'Security Guard', 'Uzirpur,Barishal', '0112223', 8000, 1, 'A100', '2022-12-01', NULL),
('E101', 'Kamal Mia', 'BGD234999', 'Security Guard', 'Chorpokkhimari,Sherpur', '0112345', 7500, 1, 'A100', '2023-11-11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `flatowner`
--

CREATE TABLE `flatowner` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nid` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `_status` smallint(6) DEFAULT NULL,
  `_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flatowner`
--

INSERT INTO `flatowner` (`id`, `name`, `nid`, `address`, `phone`, `_status`, `_password`) VALUES
('F100', 'Rakib Khan', 'BGD100200', 'RotonPur,Noakhali', '0112233', 1, 'F1234'),
('F101', 'Abir Khan', 'BGD100201', 'Sodor,Gopalgonj', '0112232', 1, 'F1234'),
('F102', 'Sojib Ahmed', 'BGD112201', 'Bhayadanga,Sherpur', '0112245', 1, 'F1234');

-- --------------------------------------------------------

--
-- Table structure for table `flats`
--

CREATE TABLE `flats` (
  `id` varchar(20) NOT NULL,
  `ownerId` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flats`
--

INSERT INTO `flats` (`id`, `ownerId`) VALUES
('1A', 'F100'),
('1B', 'F100'),
('2A', 'F101'),
('3B', 'F102');

-- --------------------------------------------------------

--
-- Table structure for table `guard`
--

CREATE TABLE `guard` (
  `id` varchar(20) NOT NULL,
  `employee_Id` varchar(20) DEFAULT NULL,
  `_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guard`
--

INSERT INTO `guard` (`id`, `employee_Id`, `_password`) VALUES
('G100', 'E100', 'G1234'),
('G101', 'E101', 'G1234');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `flat_id` varchar(20) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `_date` date NOT NULL,
  `_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`flat_id`, `name`, `address`, `phone`, `_date`, `_time`) VALUES
('1A', 'Shifty', 'Dhaka', '000222', '2023-04-02', '00:00:00'),
('1A', 'alif', 'asas', '1111', '2023-04-02', '00:00:00'),
('1A', 'alif', 'aaaa', '1111', '2023-04-02', '00:00:00'),
('2A', 'shoishob', 'Moghbazar', '555889', '2023-04-02', '00:00:00'),
('3B', 'Brishty', 'Chittagong', '654111', '2023-04-02', '00:00:00'),
('1B', 'Atika', 'Bonosree', '000111', '2023-04-02', '00:00:00'),
('2A', 'shahriar', 'Rampura', '444555', '2023-04-02', '19:49:03');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `tenant_id` varchar(20) NOT NULL,
  `flat_id` varchar(20) NOT NULL,
  `body` varchar(500) DEFAULT NULL,
  `_time` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenant`
--

CREATE TABLE `tenant` (
  `id` varchar(20) NOT NULL,
  `flat_Id` varchar(20) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `_status` smallint(6) DEFAULT NULL,
  `_password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tenant`
--

INSERT INTO `tenant` (`id`, `flat_Id`, `name`, `nid`, `address`, `phone`, `_status`, `_password`) VALUES
('T100', '1A', 'Ratul Ahmed', 'BGD123435', 'Moghbazar,Dhaka', '0981234', 1, 'T1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`tenant_id`,`flat_id`),
  ADD KEY `flat_id` (`flat_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adminId` (`adminId`);

--
-- Indexes for table `flatowner`
--
ALTER TABLE `flatowner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ownerId` (`ownerId`);

--
-- Indexes for table `guard`
--
ALTER TABLE `guard`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_Id` (`employee_Id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD KEY `flat_ID_Cons` (`flat_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`tenant_id`,`flat_id`),
  ADD KEY `flat_id` (`flat_id`);

--
-- Indexes for table `tenant`
--
ALTER TABLE `tenant`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flat_Id` (`flat_Id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `flatowner` (`id`);

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`adminId`) REFERENCES `admin` (`id`);

--
-- Constraints for table `flats`
--
ALTER TABLE `flats`
  ADD CONSTRAINT `flats_ibfk_1` FOREIGN KEY (`ownerId`) REFERENCES `flatowner` (`id`);

--
-- Constraints for table `guard`
--
ALTER TABLE `guard`
  ADD CONSTRAINT `guard_ibfk_1` FOREIGN KEY (`employee_Id`) REFERENCES `employee` (`id`);

--
-- Constraints for table `guest`
--
ALTER TABLE `guest`
  ADD CONSTRAINT `guest_ibfk_1` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`tenant_id`) REFERENCES `tenant` (`id`),
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`flat_id`) REFERENCES `flats` (`id`);

--
-- Constraints for table `tenant`
--
ALTER TABLE `tenant`
  ADD CONSTRAINT `tenant_ibfk_1` FOREIGN KEY (`flat_Id`) REFERENCES `flats` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
