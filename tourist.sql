-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2023 at 09:33 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tourist`
--

-- --------------------------------------------------------

--
-- Table structure for table `communities`
--

CREATE TABLE `communities` (
  `community_id` int(11) NOT NULL,
  `community_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communities`
--

INSERT INTO `communities` (`community_id`, `community_name`, `description`, `location`) VALUES
(2, 'บ้านชุมชนทดสอบ 1', 'ชุมชนสายน้ำ', 'ทดสอบ 1'),
(3, 'บ้านชุมชนทดสอบ 2', 'ชุมชนภูเขา', 'ทดสอบ 2'),
(4, 'บ้านชุมชนทดสอบ 3', 'ชุมชนทะเล', 'ทดสอบ 3');

-- --------------------------------------------------------

--
-- Table structure for table `communityactivities`
--

CREATE TABLE `communityactivities` (
  `activity_id` int(11) NOT NULL,
  `activity_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `community_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `communityactivities`
--

INSERT INTO `communityactivities` (`activity_id`, `activity_name`, `description`, `date`, `community_id`) VALUES
(2, 'กิจกรรมทดสอบ 1', 'กิจกรรมสนุกๆ', '2023-12-22', 2),
(3, 'กิจกรรมทดสอบ 2', 'กิจกรรมเพื่อสังคม', '2023-12-23', 3),
(4, 'กิจกรรมทดสอบ 3', 'กิจกรรมด้านศิลปะ', '2023-12-24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `touristspots`
--

CREATE TABLE `touristspots` (
  `spot_id` int(11) NOT NULL,
  `spot_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `community_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `touristspots`
--

INSERT INTO `touristspots` (`spot_id`, `spot_name`, `description`, `location`, `community_id`) VALUES
(2, 'สถานที่ท่องเที่ยวทดสอบ 1', 'สถานที่ท่องเที่ยวน่าสนใจ', 'ทดสอบ 1', 2),
(3, 'สถานที่ท่องเที่ยวทดสอบ 2', 'สถานที่ท่องเที่ยวละลาย', 'ทดสอบ 2', 3),
(4, 'สถานที่ท่องเที่ยวทดสอบ 3', 'สถานที่ท่องเที่ยวสวยงาม', 'ทดสอบ 3', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `communities`
--
ALTER TABLE `communities`
  ADD PRIMARY KEY (`community_id`);

--
-- Indexes for table `communityactivities`
--
ALTER TABLE `communityactivities`
  ADD PRIMARY KEY (`activity_id`),
  ADD KEY `community_id` (`community_id`);

--
-- Indexes for table `touristspots`
--
ALTER TABLE `touristspots`
  ADD PRIMARY KEY (`spot_id`),
  ADD KEY `community_id` (`community_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `communityactivities`
--
ALTER TABLE `communityactivities`
  MODIFY `activity_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `touristspots`
--
ALTER TABLE `touristspots`
  MODIFY `spot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `communityactivities`
--
ALTER TABLE `communityactivities`
  ADD CONSTRAINT `communityactivities_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`);

--
-- Constraints for table `touristspots`
--
ALTER TABLE `touristspots`
  ADD CONSTRAINT `touristspots_ibfk_1` FOREIGN KEY (`community_id`) REFERENCES `communities` (`community_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
