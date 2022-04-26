-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 07:12 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.0.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mychat`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_country` text NOT NULL,
  `user_gender` text NOT NULL,
  `forgotten_answer` varchar(100) NOT NULL,
  `log_in` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`, `user_email`, `user_profile`, `user_country`, `user_gender`, `forgotten_answer`, `log_in`) VALUES
(8, 'rohit bisht', '123456789', 'rohit24@gmail.com', 'images/image1.jpg.jpg.84', 'India', 'Male', 'rohit', 'Offline'),
(9, 'HR', '123456789', 'hritiksantoshi99@gmail.com', 'images/image2.jpg', 'India', 'Male', '', 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `userschat`
--

CREATE TABLE `userschat` (
  `msg_id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `receiver_username` varchar(100) NOT NULL,
  `msg_content` varchar(255) NOT NULL,
  `msg_status` text NOT NULL,
  `msg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userschat`
--

INSERT INTO `userschat` (`msg_id`, `sender_username`, `receiver_username`, `msg_content`, `msg_status`, `msg_date`) VALUES
(1, 'hritik_s', 'rohit_b', 'hello', 'unread', '2020-02-26 12:43:36'),
(2, 'hritik_s', 'rohit_b', '', 'unread', '2020-02-26 12:43:40'),
(3, 'hritik_s', 'rohit_b', 'h', 'unread', '2020-02-26 12:44:12'),
(4, 'hritik_s', 'rohit_b', 'h', 'unread', '2020-02-26 12:44:15'),
(5, 'rohit bisht', 'rudraksh_k', 'helo', 'read', '2020-02-28 06:55:27'),
(6, 'rohit bisht', 'rohit_b', 'helo', 'unread', '2020-02-28 06:51:29'),
(7, 'shubham', 'rohit bisht', 'helo', 'unread', '2020-02-29 06:09:46'),
(8, 'shubham', 'rohit bisht', '', 'unread', '2020-02-29 06:10:00'),
(9, 'shubham', 'rohit bisht', '', 'unread', '2020-02-29 06:10:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `userschat`
--
ALTER TABLE `userschat`
  ADD PRIMARY KEY (`msg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userschat`
--
ALTER TABLE `userschat`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
