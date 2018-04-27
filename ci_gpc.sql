-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2018 at 10:24 AM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_gpc`
--
CREATE DATABASE IF NOT EXISTS `ci_gpc` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `ci_gpc`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `unit` varchar(45) DEFAULT NULL,
  `grade` varchar(45) DEFAULT NULL,
  `user_id` varchar(45) DEFAULT NULL,
  `level_id` varchar(45) DEFAULT NULL,
  `semester` varchar(45) DEFAULT NULL,
  `session` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `code`, `unit`, `grade`, `user_id`, `level_id`, `semester`, `session`) VALUES
(7, 'CIS 101', '2', 'B', '1', '100', '1', NULL),
(8, 'CIS 102', '3', 'B', '1', '100', '1', NULL),
(9, 'CIS 103', '3', 'C', '1', '100', '1', NULL),
(10, 'CIS 104', '2', 'A', '1', '100', '1', NULL),
(11, 'CIS 105', '2', 'A', '1', '100', '1', NULL),
(12, 'CIS 106', '3', 'A', '1', '100', '1', NULL),
(13, 'CIS 107', '1', 'B', '1', '100', '1', NULL),
(14, 'GSS 101', '2', 'A', '2', '100', '2', NULL),
(15, 'GSS 102', '2', 'A', '2', '100', '2', NULL),
(16, 'GSS 103', '2', 'A', '2', '100', '2', NULL),
(17, 'GSS 104', '2', 'A', '2', '100', '2', NULL),
(18, 'GSS 105', '2', 'A', '2', '100', '2', NULL),
(19, 'GSS 106', '2', 'A', '2', '100', '2', NULL),
(20, 'GSS 107', '3', 'A', '2', '100', '2', NULL),
(21, 'CIS 201', '3', 'A', '2', '200', '1', NULL),
(22, 'CIS 202', '3', 'D', '2', '200', '1', NULL),
(23, 'CIS 203', '2', 'C', '2', '200', '1', NULL),
(24, 'CIS 204', '2', 'B', '2', '200', '1', NULL),
(25, 'CIS 205', '2', 'B', '2', '200', '1', NULL),
(26, 'CIS 206', '1', 'B', '2', '200', '1', NULL),
(27, 'CIS 207', '1', 'B', '2', '200', '1', NULL),
(45, 'CIS102', '3', 'A', '2', '100', '1', NULL),
(46, 'CIS201', '3', 'A', '2', '100', '1', NULL),
(47, 'CIS333', '2', 'C', '2', '100', '1', NULL),
(48, 'CIS104', '2', 'A', '2', '100', '1', NULL),
(49, 'CIS105', '1', 'E', '2', '100', '1', NULL),
(50, 'CIS106', '1', 'F', '2', '100', '1', NULL),
(51, 'GSS 201', '2', 'B', '2', '200', '2', NULL),
(52, 'GSS 202', '2', 'B', '2', '200', '2', NULL),
(53, 'GSS 203', '2', 'B', '2', '200', '2', NULL),
(54, 'GSS 204', '2', 'A', '2', '200', '2', NULL),
(55, 'GSS 205', '2', 'A', '2', '200', '2', NULL),
(56, 'GSS 206', '2', 'B', '2', '200', '2', NULL),
(57, 'GSS 207', '3', 'A', '2', '200', '2', NULL),
(58, 'GSS 208', '3', 'C', '2', '200', '2', NULL),
(59, 'GSS 209', '3', 'A', '2', '200', '2', NULL),
(60, 'GSS 210', '2', 'E', '2', '200', '2', NULL),
(61, 'GSS 211', '2', 'A', '2', '200', '2', NULL),
(62, 'Cis 101', '3', 'C', '4', '100', '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments` (
  `dept_id` int(11) NOT NULL,
  `department` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dept_id`, `department`) VALUES
(1, 'Computer Science');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL,
  `user_id` varchar(45) NOT NULL,
  `level_id` varchar(45) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `type` enum('gp','cgp','tcgpa') NOT NULL DEFAULT 'gp',
  `points` varchar(45) NOT NULL,
  `total_courses` int(11) NOT NULL,
  `total_credits` int(11) NOT NULL,
  `total_gp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`grade_id`, `user_id`, `level_id`, `semester`, `type`, `points`, `total_courses`, `total_credits`, `total_gp`) VALUES
(2, '1', '100', '1', 'gp', '4.25', 7, 16, 68),
(3, '2', '100', '2', 'gp', '5.0', 7, 15, 75),
(4, '2', '200', '1', 'gp', '3.64', 7, 14, 51),
(7, '2', '100', '1', 'gp', '3.91', 6, 12, 47),
(8, '2', '200', '2', 'gp', '4.12', 11, 25, 103),
(9, '4', '100', '1', 'gp', '3.00', 1, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels` (
  `level_id` int(11) NOT NULL,
  `level` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

DROP TABLE IF EXISTS `schools`;
CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `schoolname` varchar(45) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `schoolname`, `type`) VALUES
(1, 'Anambra state university', 'university'),
(2, 'Oko Polytechnic Ekwulobia', 'polytechnic');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pword` varchar(45) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `current_level` int(11) DEFAULT NULL,
  `dept_levels` int(11) DEFAULT NULL,
  `target_gradepoint` float NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `lastname`, `gender`, `email`, `pword`, `school_id`, `dept_id`, `current_level`, `dept_levels`, `target_gradepoint`, `role`) VALUES
(1, 'sylva berry', 'Larry', NULL, 'admin@admin.com', 'admin', 1, 1, 100, 400, 4.5, 1),
(2, 'Sylvester', 'Hilary', NULL, 'user@user.com', 'user', 1, 1, 200, 400, 3.5, 0),
(3, 'odinigwe', 'chiamaka', NULL, 'amyclinton@gmail.com', '1234', NULL, 1, 100, 400, 4.5, 0),
(4, 'Olum', 'Ekene', NULL, 'Olumekene@gmail.com', 'admin', NULL, 1, 100, 400, 4.5, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dept_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`grade_id`);

--
-- Indexes for table `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `grade_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `levels`
--
ALTER TABLE `levels`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
