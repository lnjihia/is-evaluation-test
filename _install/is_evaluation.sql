-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2021 at 01:07 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `is_evaluation`
--

-- --------------------------------------------------------

--
-- Table structure for table `password`
--

CREATE TABLE `password` (
  `id` int(11) NOT NULL,
  `staffid` varchar(5) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `password`
--

INSERT INTO `password` (`id`, `staffid`, `password`) VALUES
(1, 'IS001', 'Doe123');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` int(11) NOT NULL,
  `platform` varchar(10) NOT NULL,
  `link` text DEFAULT NULL,
  `staff_id` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `platform`, `link`, `staff_id`) VALUES
(2, 'Facebook', 'www.facebook.com/johndoe2', 'IS001'),
(5, 'Twitter', 'www.twitter.com/johndoe', 'IS001');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staffid` varchar(5) NOT NULL COMMENT 'unique Evidence Action employee id provided by HR department',
  `firstname` varchar(15) NOT NULL,
  `lastname` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phonenumber` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staffid`, `firstname`, `lastname`, `email`, `phonenumber`) VALUES
('IS001', 'John', 'Doe', 'john.doe@evidenceaction.org', '0700000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `password`
--
ALTER TABLE `password`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `fk_login_users_staff_staffid` (`staffid`) USING BTREE;

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_social_media_staff_staffid` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staffid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `password`
--
ALTER TABLE `password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `password`
--
ALTER TABLE `password`
  ADD CONSTRAINT `password_ibfk_1` FOREIGN KEY (`staffid`) REFERENCES `staff` (`staffid`);

--
-- Constraints for table `social_media`
--
ALTER TABLE `social_media`
  ADD CONSTRAINT `social_media_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staffid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
