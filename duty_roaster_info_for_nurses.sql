-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2023 at 03:19 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `duty_roaster_info_for_nurses`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `pid` int(11) NOT NULL,
  `firstname` text DEFAULT NULL,
  `lastname` text DEFAULT NULL,
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(60) NOT NULL DEFAULT '',
  `address` varchar(50) NOT NULL DEFAULT '',
  `disability` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` varchar(10) NOT NULL DEFAULT '',
  `card_num` text NOT NULL DEFAULT '0',
  `date` varchar(150) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roaster`
--

CREATE TABLE `roaster` (
  `rid` int(11) NOT NULL,
  `entry_fullname` longtext NOT NULL,
  `entry_date` int(11) NOT NULL DEFAULT 0,
  `uid` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL DEFAULT '',
  `staff_id` varchar(150) NOT NULL DEFAULT '',
  `patients` varchar(80) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roaster`
--

INSERT INTO `roaster` (`rid`, `entry_fullname`, `entry_date`, `uid`, `email`, `staff_id`, `patients`) VALUES
(16, 'Abraham Kingsley', 1688589068, 4, '', 'Iou/26', ''),
(19, 'Abraham Kingsley', 1688653372, 4, '', 'Iou/26', ''),
(20, 'Esther Gospel', 1688681946, 3, '', 'Iou/26', ''),
(21, 'Esther Gospel', 1688773551, 3, '', 'Iou/26', ''),
(23, 'Vicky Brown', 1698227823, 5, 'vickybrown@gmail.com', 'Iou/27', '5'),
(24, 'Vicky Brown', 1698194650, 5, 'vickybrown@gmail.com', 'Iou/27', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `email` varchar(150) NOT NULL DEFAULT '',
  `phone` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(150) NOT NULL DEFAULT '',
  `type` int(11) NOT NULL DEFAULT 1,
  `fullname` varchar(255) NOT NULL DEFAULT '',
  `supervisor` int(11) NOT NULL DEFAULT 0,
  `staff_id` varchar(150) NOT NULL DEFAULT '',
  `status` text DEFAULT NULL,
  `address` varchar(60) NOT NULL DEFAULT '',
  `disability` text DEFAULT NULL,
  `gender` text DEFAULT NULL,
  `dob` varchar(30) NOT NULL DEFAULT '',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `email`, `phone`, `password`, `type`, `fullname`, `supervisor`, `staff_id`, `status`, `address`, `disability`, `gender`, `dob`, `date_created`) VALUES
(1, 'emmanuelokolie550@gmail.com', '0902345464', '503559086cc04a2052f7e6ad769a307ef43c685a', 9, 'Emmanuel Okolie', 0, 'Iou/23', 'Admin', '', NULL, NULL, '', '0000-00-00 00:00:00'),
(2, 'destinyokudiri23@yahoo.com', '09023454649', '48510e7809620f2709c4a27694e81ff7765568de', 5, 'Destiny Okudiri', 1, 'Iou/24', 'Supervisor', '', NULL, NULL, '', '0000-00-00 00:00:00'),
(3, 'esthergospel@yahoo.com', '0802390849', '5d7b68652ce5d89d3af3130b98f477924fee4af5', 1, 'Esther Gospel', 0, 'Iou/25', 'Nurse', '', NULL, NULL, '', '0000-00-00 00:00:00'),
(4, 'abrahamkingsley@gmail.com', '09023458675', '1dd74c26119e70e48acd8f45c0b1433eaa86b387', 1, 'Abraham Kingsley', 0, 'Iou/26', 'Nurse', '', NULL, NULL, '', '0000-00-00 00:00:00'),
(5, 'vickybrown@gmail.com', '0802348584', '8728d32805494a3e508203ab447cfc481c73fd2f', 1, 'VickyBrown', 0, '', 'Nurse', '', NULL, NULL, '', '2023-07-19 12:13:43'),
(6, 'davidokolie34@gmail.com', '(+234)7069191651', '8689328c5ec47aac47a654d687feb52e1eb88089', 5, 'David Okolie', 1, '', 'Supervisor', '37 Chigbu Street By Ejigini Mile 3 Diobu Port Harcourt', 'Not Handicaped', 'Male', '2008-02-06', '2023-10-25 12:04:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `roaster`
--
ALTER TABLE `roaster`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roaster`
--
ALTER TABLE `roaster`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
