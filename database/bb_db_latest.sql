-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2019 at 05:19 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bb_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ads`
--

CREATE TABLE `tbl_ads` (
  `id` int(11) NOT NULL,
  `ad_title` varchar(225) NOT NULL,
  `ad_date` date NOT NULL,
  `ad_image` varchar(255) NOT NULL,
  `ad_stat` int(11) NOT NULL DEFAULT '0',
  `ads_location` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ads`
--

INSERT INTO `tbl_ads` (`id`, `ad_title`, `ad_date`, `ad_image`, `ad_stat`, `ads_location`) VALUES
(1, 'TestAD', '2019-02-25', 'testimage.png', 1, 0),
(2, 'testad2', '2019-02-26', 'ad.png', 1, 1),
(3, 'testad2', '2019-02-26', 'Untitled-1.jpg', 1, 2),
(4, 'testadheader2', '2019-02-26', 'Untitled-2.jpg', 1, 2),
(5, 'testadheader3', '2019-02-26', 'banner1.jpg', 1, 2),
(9, 'ads123', '2019-07-26', 'ball4.jpg', 1, 0),
(10, 's', '2019-07-26', 'ball.jpg,ball2.jpg', 0, 1);

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
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_property`
--

INSERT INTO `tbl_property` (`ID`, `title`, `photos`, `contact`, `price`, `description`, `size`, `tcf`, `bed`, `bath`, `dev`, `ready`, `acf`, `pri`, `location`, `extras`, `status`) VALUES
(1, 'House And Lot', 'androidpolice.jpg', '09065958644', 250, 'Good', '2000 sq', 100, '4', '4', 'Daniel Gomez', '2019-01-18', 2000, 'ssss', 'Daraga, Albay', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Central A/C & Heating, Concierge Service', 1),
(2, 'Apartment', 'androidpolice.jpg--/ascreed.jpg--/devil may cry.jpg', '09065958644', 2, 'No Scratches, Smooth from inside out', '500 sq', 2000000, '5', '6', 'Daniel Gomez', '2019-07-13', 0, 'gfgf', 'Daraga, Albay', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Central A/C & Heating, Concierge Service, Covered Parking, Maid Service, Private Garden, Private Gym', 1),
(3, 'Condo', 'lot.jpg--/materialbg.jpg', '09065958644', 250, 'Newly Open', '50 sq', 2000000, '2', '1', 'Daniel Gomez', '2019-07-20', 0, 'ssss', 'Daraga, Albay', 'Balcony, Built n Kitchen Appliances, Built in Wardrobes, Central A/C & Heating, Concierge Service, Covered Parking, Security, Shared Pool, Shared Spa, View of Landmark, View of Water', 1),
(4, 'Daniel CPJ-2245 blue flame custom site 2', 'hnl.jpg--/hnl2.jpg', '09065958644', 4500000, 'fsdfd', '500 sqm', 4000000, '8', '7', 'Sunwest', '2019-09-04', 0, '', 'Daraga, Albay', 'Built n Kitchen Appliances, Study, View of Landmark', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_props`
--

CREATE TABLE `tbl_props` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `title` varchar(225) NOT NULL,
  `photos` text NOT NULL,
  `contact` varchar(25) NOT NULL,
  `price` double NOT NULL,
  `description` text NOT NULL,
  `age` varchar(225) NOT NULL,
  `usge` varchar(225) NOT NULL,
  `cond` varchar(225) NOT NULL,
  `location` varchar(225) NOT NULL,
  `stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_props`
--

INSERT INTO `tbl_props` (`ID`, `user`, `title`, `photos`, `contact`, `price`, `description`, `age`, `usge`, `cond`, `location`, `stat`) VALUES
(1, 2, 'Test1', 'EVE.png', '09054838123', 250, 'This is a test item loreadoifjzxo\r\nxzcvxzcvxzcsadfsdaasdf asdf asdf\r\nsafasdf sdaf sadf sadf sdfsdfsdf\r\nadfd afsdf  asdfsd\r\nsadasd fasdf asdfas\r\nfssdf sdfsdfs dfsd fsdf sdf s\r\ndafsadfasdfsad fsad fasd f adsfasdf\r\nsadfsadfasdfsadf', '12', 'Dive', 'Bnew', 'Ligao Ciry', 0);

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
  `confirm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `user_name`, `user_pass`, `user_fname`, `user_contact`, `user_email`, `confirm`) VALUES
(1, 'admitratorzxcv32lc', '123456', 'admin', 0, 'admin123@gmail.com', 0),
(9, '', '123456', 'User', 0, 'user123@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_property`
--
ALTER TABLE `tbl_property`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_props`
--
ALTER TABLE `tbl_props`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_ads`
--
ALTER TABLE `tbl_ads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_property`
--
ALTER TABLE `tbl_property`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
