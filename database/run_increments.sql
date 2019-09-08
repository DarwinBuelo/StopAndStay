-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2019 at 02:29 PM
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
-- Database: `elearning`
--

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
(7, '../database/ffd.sql', '2019-09-03 21:54:51'),
(8, '../database/sdsd.sql', '2019-09-03 21:54:54'),
(9, '../database/DropExamTable and run this file.sql', '2019-09-05 19:39:31'),
(10, '../database/Add feature_image column to course table.sql', '2019-09-05 19:43:59'),
(11, '../database/DropExamTable and run this file.sql', '2019-09-05 19:46:59'),
(12, '../database/add_remove_column_to_course.sql', '2019-09-05 19:48:09'),
(13, '../database/create_table_registration_details_09062019_0917.sql', '2019-09-05 21:47:50'),
(14, '../database/drop_registered_user_table123.sql', '2019-09-06 19:01:19'),
(15, '../database/registered_user123.sql', '2019-09-06 19:01:19'),
(17, '../database/2019-09-06T101910_alter_registered_user.sql', '2019-09-06 22:21:26'),
(18, '../database/2019-09-07T080811_alter_exams_table.sql', '2019-09-07 20:09:29'),
(19, '../database/2019-09-07T081715_create_table_student_course.sql', '2019-09-07 20:18:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `run_increments`
--
ALTER TABLE `run_increments`
  ADD PRIMARY KEY (`run_increments_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `run_increments`
--
ALTER TABLE `run_increments`
  MODIFY `run_increments_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
