-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2019 at 03:52 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comments_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(25, '../database/2019-09-14T051423_create_table_tenant_reservation.sql', '2019-09-14 17:17:37');

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
  `extras` text NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `property_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`ID`, `title`, `photos`, `contact`, `price`, `description`, `size`, `tcf`, `bed`, `bath`, `dev`, `ready`, `acf`, `pri`, `location`, `extras`, `status`, `user_id`, `property_type`) VALUES
(1, 'House And Lot', 'androidpolice.jpg', '09065958644', 250, 'Good', '2000 sq', 100, '4', '4', 'Daniel Gomez', '2019-01-18', 2000, 'ssss', 'Daraga, Albay', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Central A/C & Heating, Concierge Service', 1, 0, 0),
(2, 'Apartment', 'androidpolice.jpg--/ascreed.jpg--/devil may cry.jpg', '09065958644', 2, 'No Scratches, Smooth from inside out', '500 sq', 2000000, '5', '6', 'Daniel Gomez', '2019-07-13', 0, 'gfgf', 'Daraga, Albay', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Central A/C & Heating, Concierge Service, Covered Parking, Maid Service, Private Garden, Private Gym', 1, 0, 0),
(3, 'Condo', 'lot.jpg--/materialbg.jpg', '09065958644', 250, 'Newly Open', '50 sq', 2000000, '2', '1', 'Daniel Gomez', '2019-07-20', 0, 'ssss', 'Daraga, Albay', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Central A/C & Heating, Concierge Service, Covered Parking, Security, Shared Pool, Shared Spa, View of Landmark, View of Water', 1, 0, 0),
(4, 'Daniel CPJ-2245 blue flame custom site 2', 'hnl.jpg--/hnl2.jpg', '09065958644', 4500000, 'fsdfd', '500 sqm', 4000000, '8', '7', 'Sunwest', '2019-09-04', 0, '', 'Daraga, Albay', 'Built n Kitchen Appliances, Study, View of Landmark', 1, 0, 0),
(5, 'Course Interface and Backend Done', 'android2.jpg--/androidpolice.jpg--/ascreed.jpg', '09065958644', 21, 'fdf', '20m', 200, '4', '3', '', '2019-09-08', 0, '', 'Albay', 'Built in Wardrobes, Covered Parking, Maid Service', 1, 9, 0),
(6, 'Course Interface and Backend Done', 'images (1).jpg', '09065958644', 21, 'csdcs', '20m', 200, '8', '2', '', '2019-09-08', 0, '', 'sds', 'Balcony', 1, 9, 0),
(7, 'dsad', 'images.jpg', '09065958644', 21, 'safsad', '20m', 200, '7', '7', '', '2019-09-08', 0, '', 'asfdv', 'Built n Kitchen Appliances', 1, 9, 1),
(8, 'asd', 'P_20180813_145821.jpg', '1232', 22, 'fdf', '22', 24, '8', '9', '', '2019-09-14', 0, '', 'ads', 'Balcony', 0, 10, 0);

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
  `facebook_id` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_pass`, `user_fname`, `user_contact`, `user_email`, `confirm`, `user_type`, `facebook_id`) VALUES
(1, 'admitratorzxcv32lc', '123456', 'admin', 0, 'admin123@gmail.com', 0, '', NULL),
(9, '', '123456', 'User', 0, 'user123@gmail.com', 1, '', NULL),
(10, '', '', 'Dan Gomez', 0, '', 1, '', '10205940959599910'),
(11, '', 'dangmail27', 'Daniel Gomez', 0, 'danphilspain7@gmail.com', 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tenant_reservation`
--

CREATE TABLE `tenant_reservation` (
  `tenant_reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tbl_property_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `owner_id` int(11) NOT NULL,
  `approve` int(11) NOT NULL DEFAULT '0',
  `property_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tenant_reservation`
--

INSERT INTO `tenant_reservation` (`tenant_reservation_id`, `user_id`, `tbl_property_id`, `date`, `owner_id`, `approve`, `property_type`) VALUES
(4, 10, 1, '2019-09-14 12:23:11', 0, 0, 0),
(6, 10, 7, '2019-09-14 13:15:02', 9, 1, 1),
(8, 0, 2, '2019-09-14 15:17:06', 0, 0, 0),
(9, 9, 6, '2019-09-15 07:41:10', 9, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comments_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comments_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `run_increments`
--
ALTER TABLE `run_increments`
  MODIFY `run_increments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tenant_reservation`
--
ALTER TABLE `tenant_reservation`
  MODIFY `tenant_reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
