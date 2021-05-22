-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 10:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uaslab`
--

-- --------------------------------------------------------

--
-- Table structure for table `hotel_list`
--

CREATE TABLE `hotel_list` (
  `hotel-id` int(11) NOT NULL,
  `hotel-name` varchar(200) NOT NULL,
  `hotel-address` varchar(200) NOT NULL,
  `hotel-price` int(11) NOT NULL,
  `hotel-stock` int(11) NOT NULL,
  `hotel-photo` varchar(200) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_list`
--

INSERT INTO `hotel_list` (`hotel-id`, `hotel-name`, `hotel-address`, `hotel-price`, `hotel-stock`, `hotel-photo`, `rating`) VALUES
(1, 'Hotel Astoen', 'Bandung', 1500000, 56, 'aston.jpg', 5),
(2, 'Hotel Trans', 'Bandung', 2400000, 75, 'trans.jpg', 4),
(3, 'Four Seasons Resort', 'Jimbaran', 3000000, 86, 'jimbaran.jpg', 5),
(4, 'Akhyana Village', 'Jimbaran ', 2600000, 46, 'akhyana.jpg', 5),
(5, 'Ascott Waterplace Surabaya', 'Surabaya', 1190000, 86, 'ascot.jpg', 4),
(6, 'DoubleTree by Hilton Surabaya', 'Surabaya', 1210000, 89, 'doubletree.jpg', 5),
(7, 'Grand City Hall Medan', 'Medan', 730000, 23, 'grand.jpg', 4),
(8, 'Cambridge Hotel Medan', 'Medan', 860000, 24, 'cambridge.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `phone` varchar(12) NOT NULL,
  `picture` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_id`, `name`, `email`, `password`, `date`, `phone`, `picture`, `role_id`) VALUES
(1, 'Kaleb Juliu', 'kaleb@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2021-05-02', '084512369871', 'assets/images/kaleb.png', 2),
(2, 'Kang Riki', 'riki@gmail.com', '7720976bfca103422d1bc05c239b1f7a3fae6c580ca472c843104c705e843010', '2001-07-06', '081212364589', 'assets/images/riki.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel_list`
--
ALTER TABLE `hotel_list`
  ADD PRIMARY KEY (`hotel-id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel_list`
--
ALTER TABLE `hotel_list`
  MODIFY `hotel-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
