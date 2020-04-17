-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2020 at 08:45 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `linco`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `image` varchar(500) DEFAULT '',
  `team_id` int(11) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `status` enum('Completed','Not Required','Terminate/Quite','Re-training Due','NA') NOT NULL DEFAULT 'NA',
  `year` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `image`, `team_id`, `timestamp`, `course_id`, `status`, `year`) VALUES
(17, '', 1, 1579002719, 5, 'Not Required', '2020'),
(19, '', 1, 1578987200, 7, 'NA', '2020'),
(20, '', 2, 1578987272, 4, 'NA', '2020'),
(21, './dropbox-files/1579003054/linco-03.png', 2, 1579003054, 5, 'Completed', '2020'),
(23, '', 2, 1578987272, 7, 'NA', '2020'),
(27, '', 1, 1579000344, 4, 'Terminate/Quite', '2020');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` int(11) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `name`, `year`, `status`) VALUES
(4, 'Test', 2020, 'a'),
(5, 'Test', 2020, 'a'),
(7, 'Test 2', 2020, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` varchar(50) NOT NULL,
  `orientation` varchar(50) NOT NULL,
  `status` enum('a','d') NOT NULL DEFAULT 'a'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `date`, `orientation`, `status`) VALUES
(1, 'Himanshu Sharma 6', '09.01.2020', 'Test', 'a'),
(2, 'Himanshu Sharma', '10.01.2020', 'Test', 'a');

-- --------------------------------------------------------

--
-- Table structure for table `file_system`
--

CREATE TABLE `file_system` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `parent` int(11) NOT NULL DEFAULT 0,
  `type` enum('folder','ppt','word','file','image','music','video','zip','excel','pdf') NOT NULL,
  `timestamp` bigint(20) NOT NULL,
  `status` enum('delete','alive') NOT NULL DEFAULT 'alive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file_system`
--

INSERT INTO `file_system` (`id`, `name`, `parent`, `type`, `timestamp`, `status`) VALUES
(14, 'Website_Contact_forms.docx', 0, 'word', 1577291688, 'alive'),
(15, 'my-icons-collection.zip', 0, 'zip', 1577291688, 'alive'),
(16, 'test', 0, 'folder', 1577291706, 'alive'),
(17, '8026Kartikeya_Gummakonda1.png', 16, 'image', 1577291723, 'alive'),
(18, 'ajio_coupons.jpg', 16, 'image', 1577291723, 'alive'),
(19, 'ajio_coupons.jpg(1)', 16, 'image', 1577291792, 'alive'),
(20, 'logo.gif', 16, 'image', 1577291792, 'alive'),
(21, 'amazon-1486980509477.jpeg', 16, 'image', 1577291792, 'alive'),
(22, 'flipkart-1447769846055.jpeg', 16, 'image', 1577291793, 'alive'),
(23, 'Construction_Schedule.xlsx', 0, 'file', 1579009695, 'alive'),
(24, 'Construction_Schedule.xlsx(1)', 0, 'file', 1579010048, 'alive');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `hoteladdress` varchar(500) NOT NULL,
  `hospitaladdress` varchar(500) NOT NULL,
  `vendorname` varchar(200) NOT NULL,
  `vendornumber` varchar(200) NOT NULL,
  `contactperson` varchar(200) NOT NULL,
  `vendoraddress` varchar(600) NOT NULL,
  `projectstart` varchar(30) NOT NULL,
  `projectend` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(11) NOT NULL,
  `serviceprovide` varchar(50) NOT NULL,
  `serviceNumber` varchar(50) NOT NULL,
  `contactperson` varchar(50) NOT NULL,
  `project` int(11) NOT NULL,
  `address` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file_system`
--
ALTER TABLE `file_system`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `file_system`
--
ALTER TABLE `file_system`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
