-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2024 at 04:05 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ooty_hotels`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_hotel`
--

CREATE TABLE `about_hotel` (
  `id` int(11) NOT NULL,
  `h_id` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `image_path` varchar(1000) NOT NULL,
  `hotel_description` text NOT NULL,
  `activities` varchar(1000) NOT NULL,
  `services` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `about_hotel`
--

INSERT INTO `about_hotel` (`id`, `h_id`, `hotel_name`, `address`, `image_path`, `hotel_description`, `activities`, `services`) VALUES
(22, '2', 'Alpha home stay', '33,Alpha home stay febrock road', '[\"Upload\\/01.jpg\",\"Upload\\/02.jpg\",\"Upload\\/04.jpg\",\"Upload\\/05.jpg\",\"Upload\\/06.jpg\",\"Upload\\/07.jpg\"]', 'We focus a great deal on the understanding of behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn\'t going to get the job done so that\'s why this rickets is packed with practical hands-on examples that you can follow step by step.\r\nBehavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn\'t going to get the job done so that\'s why this tickets is packed with practical hands-on examples that you can follow step by step.', 'Swimming pool, Spa, Kids\' play area, Gym', 'Dry cleaning, Room Service, Special service, Waiting Area, Laundry facilities, Ironing Service'),
(23, '3', 'Hotel 03', 'Hotel Address', '[\"Upload\\/02.jpg\",\"Upload\\/03.jpg\",\"Upload\\/05.jpg\",\"Upload\\/06.jpg\",\"Upload\\/07.jpg\",\"Upload\\/08.jpg\"]', 'We focus a great deal on the understanding of behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn\'t going to get the job done so that\'s why this rickets is packed with practical hands-on examples that you can follow step by step. Behavioral psychology and influence triggers which are crucial for becoming a well rounded Digital Marketer. We understand that theory is important to build a solid foundation, we understand that theory alone isn\'t going to get the job done so that\'s why this tickets is packed with practical hands-on examples that you can follow step by step.', 'Swimming pool, Spa, Kids\' play area, Gym', 'Dry cleaning, Room Service, Special service, Waiting Area, Laundry facilities, Ironing Service'),
(25, '3', 'Hotel PNR international', '51/E/18 hotel pnr international ettines road', '[\"Upload\\/01.jpg\",\"Upload\\/02.jpg\",\"Upload\\/03.jpg\",\"Upload\\/04.jpg\",\"Upload\\/05.jpg\",\"Upload\\/06.jpg\"]', 'Demesne far-hearted suppose venture excited see had has. Dependent on so extremely delivered by. Yet no jokes worse her why. Bed one supposing breakfast day fulfilled off depending questions. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. Water timed folly right aware if oh truth.Demesne far-hearted suppose venture excited see had has. Dependent on so extremely delivered by. Yet no jokes worse her why. Bed one supposing breakfast day fulfilled off depending questions. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. Water timed folly right aware if oh truth.Demesne far-hearted suppose venture excited see had has. Dependent on so extremely delivered by. Yet no jokes worse her why. Bed one supposing breakfast day fulfilled off depending questions. Delivered dejection necessary objection do Mr prevailed. Mr feeling does chiefly cordial in do. Water timed folly right aware if oh truth.', 'Swimming pool, Spa, Kids\' play area, Gym', 'Dry cleaning, Room Service, Special service, Waiting Area, Laundry facilities, Ironing Service');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `h_id` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `hotel_address` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `image_path` varchar(200) NOT NULL,
  `original_cost` varchar(200) NOT NULL,
  `discount_cost` varchar(200) NOT NULL,
  `tax_amount` varchar(200) NOT NULL,
  `adult` varchar(200) NOT NULL,
  `child` varchar(200) NOT NULL,
  `district` varchar(200) NOT NULL,
  `hotel_state` varchar(200) NOT NULL,
  `pincode` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `h_id`, `hotel_name`, `hotel_address`, `image`, `image_path`, `original_cost`, `discount_cost`, `tax_amount`, `adult`, `child`, `district`, `hotel_state`, `pincode`, `phone`) VALUES
(14, 'hotel_1', 'Hotel PNR international', '51/E/18 hotel pnr international ettines road', '', '01.jpg', '4000', '3500', '250', '1000', '500', 'Ooty', 'Tamilnadu', '643001', ' 9786000163'),
(15, 'hotel_2', 'Alpha home stay', '33,Alpha home stay febrock road', '', '02.jpg', '3000', '2500', '350', '1200', '600', 'Ooty', 'Tamilnadu', '643001', ' 9791278706'),
(17, 'hotel_3', 'Hotel 03', 'Hotel Address', '', '03.jpg', '2500', '2000', '250', '1000', '500', 'chennai', 'Tamilnadu', '600001', '8899001122');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpass` varchar(200) NOT NULL,
  `profile_photo_path` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `mobile_number` varchar(200) NOT NULL,
  `nationality` varchar(200) NOT NULL,
  `date_of_birth` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `u_id`, `email`, `password`, `cpass`, `profile_photo_path`, `full_name`, `mobile_number`, `nationality`, `date_of_birth`, `gender`, `address`) VALUES
(41, 'user_1', 'selva@gmail.com', '1807', '1807', '01.jpg', 'selva kumar', '9500912258', 'India', '08 Feb 2024', 'female', 'selva address');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `cpass` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `u_id`, `email`, `password`, `cpass`) VALUES
(1, 'user_9', 's3@gmail.com', 's3', 's3'),
(2, 'user_10', 'tamilinfos@gmail.com', 'titinfos', 'titinfo'),
(3, 'user_1', 'selva@gmail.com', '1807', '1807');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_hotel`
--
ALTER TABLE `about_hotel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_hotel`
--
ALTER TABLE `about_hotel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
