-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2019 at 09:25 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stop_n_stay`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `chat_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` longtext NOT NULL,
  `time_sent` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`chat_id`, `sender_id`, `receiver_id`, `message`, `time_sent`, `status`) VALUES
(1, 12, 11, 'hghg', '2019-11-01 11:20:11', 0),
(2, 12, 11, 'ghg', '2019-11-01 11:20:16', 0),
(3, 11, 12, 'vcvc', '2019-11-01 11:20:41', 0),
(4, 11, 12, 'Your reservation for My Boarding House2 had been approved', '2019-11-01 11:32:49', 0),
(5, 11, 12, 'Your reservation for My Boarding House2 had been rejected', '2019-11-01 11:47:04', 0),
(6, 11, 12, 'Your reservation for My Boarding House2 had been approved', '2019-11-01 11:47:14', 0),
(7, 11, 12, 'Your reservation for testing room had been approved', '2019-11-02 19:22:27', 0),
(8, 11, 11, 'adsad', '2019-11-06 04:52:46', 0),
(9, 11, 11, 'Your reservation for My Boarding House2 had been approved', '2019-11-06 05:44:09', 0),
(10, 11, 11, 'Your reservation for My Boarding House2 had been rejected', '2019-11-06 05:44:19', 0),
(11, 11, 11, 'Your reservation for Mirage had been approved', '2019-11-06 05:44:25', 0),
(12, 11, 11, 'Your reservation for Mirage had been rejected', '2019-11-06 05:44:31', 0),
(13, 11, 11, 'Your reservation for My Boarding House2 had been approved', '2019-11-06 05:58:05', 0),
(14, 11, 11, 'Your reservation for My Boarding House2 had been rejected', '2019-11-06 05:58:15', 0),
(15, 11, 11, 'Your reservation for My Boarding House2 had been rejected', '2019-11-06 06:04:41', 0),
(16, 11, 11, 'Your reservation for My Boarding House2 had been approved', '2019-11-06 06:04:47', 0),
(17, 11, 11, 'Your reservation for My Boarding House2 had been rejected', '2019-11-06 06:04:57', 0),
(18, 11, 11, 'Your reservation for My Boarding House2 had been approved', '2019-11-06 06:05:05', 0),
(19, 11, 11, 'Your reservation for My Boarding House2 had been rejected', '2019-11-06 06:05:34', 0),
(20, 11, 11, 'Your reservation for My Boarding House2 had been approved', '2019-11-06 06:06:03', 0),
(21, 11, 11, 'Your reservation for Mirage had been approved', '2019-11-06 06:12:31', 0),
(22, 11, 11, 'Your reservation for Mirage had been rejected', '2019-11-06 06:13:30', 0),
(23, 11, 11, 'Your reservation for Mirage had been approved', '2019-11-06 06:13:54', 0),
(24, 11, 11, 'Your reservation for Mirage had been rejected', '2019-11-06 06:15:00', 0),
(25, 11, 11, 'Your reservation for Mirage had been approved', '2019-11-06 06:15:05', 0),
(26, 11, 11, 'Your reservation for My Boarding House2 had been rejected', '2019-11-06 06:15:08', 0),
(27, 11, 11, 'Your reservation for My Boarding House2 had been approved', '2019-11-06 06:15:10', 0),
(28, 11, 11, 'Your reservation for zxcxzc had been approved', '2019-11-06 11:40:17', 0),
(29, 11, 11, 'Your reservation for zxcxzc had been rejected', '2019-11-06 11:40:24', 0),
(30, 11, 11, 'Your reservation for zxcxzc had been rejected', '2019-11-06 11:41:51', 0),
(31, 11, 11, 'Your reservation for zxcxzc had been rejected', '2019-11-06 11:42:24', 0),
(32, 11, 11, 'Your reservation for zxcxzc had been approved', '2019-11-06 11:42:25', 0),
(33, 11, 11, 'Your reservation for zxcxzc had been rejected', '2019-11-06 11:42:26', 0),
(34, 11, 11, 'Your reservation for zxcxzc had been rejected', '2019-11-06 11:42:36', 0),
(35, 11, 11, 'Your reservation for zxcxzc had been rejected', '2019-11-06 11:43:50', 0),
(36, 11, 11, 'Your reservation for Mirage had been rejected', '2019-11-06 11:43:51', 0),
(37, 11, 11, 'Your reservation for Mirage had been approved', '2019-11-06 11:43:52', 0),
(38, 11, 11, 'Your reservation for Mirage had been approved', '2019-11-06 11:44:07', 0),
(39, 11, 11, 'Your reservation for Mirage had been approved', '2019-11-06 11:44:18', 0),
(40, 11, 11, 'Your reservation for Mirage had been rejected', '2019-11-06 11:44:19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `review_id` int(11) NOT NULL,
  `prop_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`review_id`, `prop_id`, `user_id`, `rate`, `name`, `comment`, `date`) VALUES
(1, 11, 0, 4, 'Dan Gomez', 'This is nice', '2019-10-05 21:27:43'),
(2, 11, 0, 4, '', 'this is awesome', '2019-10-09 21:36:16'),
(3, 11, 0, 5, '', 'awesome', '2019-10-09 21:39:10'),
(4, 11, 0, 5, '', 'asds', '2019-10-09 21:39:31'),
(5, 11, 0, 5, 'sss', 'xc', '2019-10-09 21:40:10'),
(6, 11, 0, 5, 'Daniel Gomez', 'zxcx', '2019-10-09 21:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `room_details_id` int(11) NOT NULL,
  `tbl_property_id` int(11) NOT NULL,
  `room_type` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `vacant` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`room_details_id`, `tbl_property_id`, `room_type`, `price`, `capacity`, `vacant`) VALUES
(20, 20, 'Deluxe', 2500, 5, 5),
(21, 20, 'Regular', 1500, 10, 9),
(22, 20, 'Low end', 250, 2, 2),
(23, 22, 'adssad', 22, 2, 2),
(24, 22, 'asda', 11, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `run_increments`
--

CREATE TABLE `run_increments` (
  `run_increments_id` int(11) NOT NULL,
  `file_name` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `run_increments`
--

INSERT INTO `run_increments` (`run_increments_id`, `file_name`, `date`) VALUES
(20, '../database/tes.sql', '2019-09-08 20:34:56'),
(21, '../database/2019-09-08T092510_alter_tbl_property.sql', '2019-09-08 21:28:19'),
(22, '../database/2019-09-08T092511_alter_tbl_property.sql', '2019-09-08 21:28:48'),
(23, '../database/2019-09-13T092511_alter_tbl_user.sql', '2019-09-14 16:08:11'),
(24, '../database/2019-09-13T092512_alter_tbl_user.sql', '2019-09-14 16:08:11'),
(25, '../database/2019-09-14T051423_create_table_tenant_reservation.sql', '2019-09-14 17:17:37'),
(26, '../database/2019-09-14T062912_create_comments_table.sql', '2019-09-30 12:40:48'),
(27, '../database/2019-09-14T073321_alter_table_tenant_reservation.sql', '2019-09-30 12:40:49'),
(28, '../database/2019-09-19T103723_add_chat_table.sql', '2019-09-30 12:40:49'),
(29, '../database/2019-09-20T110730_added_column_status_on_chats.sql', '2019-09-30 12:40:50'),
(30, '../database/2019-09-25T102045_alter_tbl_props.sql', '2019-09-30 12:40:51'),
(31, '../database/2019-10-01T054422_add_review_table.sql', '2019-10-05 21:16:16'),
(32, '../database/2019-10-30T210100_alter_review_table.sql', '2019-11-01 01:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_property`
--

CREATE TABLE `tbl_property` (
  `ID` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `photos` text NOT NULL,
  `contact` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `size` varchar(225) NOT NULL,
  `tcf` double NOT NULL,
  `bed` varchar(25) NOT NULL,
  `bath` varchar(25) NOT NULL,
  `dev` varchar(225) NOT NULL,
  `ready` date NOT NULL,
  `acf` double NOT NULL,
  `pri` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `coord` longtext NOT NULL,
  `extras` text NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`ID`, `title`, `photos`, `contact`, `price`, `description`, `size`, `tcf`, `bed`, `bath`, `dev`, `ready`, `acf`, `pri`, `location`, `coord`, `extras`, `status`, `user_id`, `property_type`) VALUES
(20, 'My Boarding House2', 'android2.jpg--/ascreed.jpg--/gauntlet2.jpg', '09155297872', 0, 'adegege', '20sqm', 2222, '6', '7', '', '2019-11-06', 0, '', 'Sagpon, Daraga, Albay', '123.71730745407251,13.146805345161027', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes', 1, 11, 0),
(21, 'Mirage', 'android2.jpg--/androidpolice.jpg', '09155297872', 2800, '<pre style=\"background-color: white; border: none\">adsd</pre>', '20sqm', 2222, '5', '3', '', '2019-11-06', 0, '', 'Sagpon, Daraga, Albay', '123.71730745407251,13.15035136562851', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Private Gym', 1, 11, 1),
(22, 'zxcxzc', 'joker2.jpg--/joker3.jpg--/thanos gauntlet.jpg', '09155297872', 0, '<pre style=\"background-color: white; border: none\">adas</pre>', '20sqm', 2222, '7', '9', '', '2019-11-06', 0, '', 'Sipi, Daraga, Albay', '123.70966032987843,13.14916936450237', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Walk-in Closet', 1, 11, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `user_pass` varchar(150) NOT NULL,
  `user_fname` varchar(150) NOT NULL,
  `user_contact` int(140) NOT NULL,
  `user_email` varchar(140) NOT NULL,
  `confirm` int(11) NOT NULL,
  `user_type` varchar(25) NOT NULL,
  `facebook_id` varchar(225) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_pass`, `user_fname`, `user_contact`, `user_email`, `confirm`, `user_type`, `facebook_id`, `role`) VALUES
(1, 'admitratorzxcv32lc', '123456', 'admin', 0, 'admin123@gmail.com', 0, '', NULL, 0),
(9, '', '123456', 'User', 0, 'user123@gmail.com', 1, '', NULL, 0),
(10, '', '', 'Dan Gomez', 0, '', 1, '', '10205940959599910', 0),
(11, '', 'dangmail27', 'Daniel Gomez', 0, 'danphilspain7@gmail.com', 1, '', NULL, 1),
(12, '', 'alicia', 'Daniel testing', 0, 'sartealicia@gmail.com', 0, '', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_reservation`
--

CREATE TABLE `tenant_reservation` (
  `tenant_reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tbl_property_id` int(11) NOT NULL,
  `room_details_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` int(11) NOT NULL,
  `approve` int(11) NOT NULL DEFAULT '0',
  `property_type` int(11) NOT NULL,
  `date_reserved` date NOT NULL,
  `date_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenant_reservation`
--

INSERT INTO `tenant_reservation` (`tenant_reservation_id`, `user_id`, `tbl_property_id`, `room_details_id`, `date`, `owner_id`, `approve`, `property_type`, `date_reserved`, `date_expiration`) VALUES
(11, 11, 21, 0, '2019-11-05 21:42:37', 11, 0, 1, '2019-11-05', '2019-11-07'),
(16, 11, 22, 24, '2019-11-05 22:56:40', 11, 0, 0, '2019-11-05', '2019-11-06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`chat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`room_details_id`);

--
-- Indexes for table `run_increments`
--
ALTER TABLE `run_increments`
  ADD PRIMARY KEY (`run_increments_id`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tenant_reservation`
--
ALTER TABLE `tenant_reservation`
  ADD PRIMARY KEY (`tenant_reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `chat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `room_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `run_increments`
--
ALTER TABLE `run_increments`
  MODIFY `run_increments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tenant_reservation`
--
ALTER TABLE `tenant_reservation`
  MODIFY `tenant_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
