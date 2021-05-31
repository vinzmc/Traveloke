-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2021 at 12:00 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

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
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hotel_list`
--

INSERT INTO `hotel_list` (`hotel-id`, `hotel-name`, `hotel-address`, `hotel-price`, `hotel-stock`, `hotel-photo`, `star`) VALUES
(1, 'Hotel Astoen', 'Bandung', 1500000, 0, 'aston.jpg', 5),
(2, 'Hotel Trans', 'Bandung', 2400000, 74, 'Hotel_Trans.jpg', 4),
(3, 'Four Seasons Resort', 'Jimbaran', 3000000, 86, 'jimbaran.jpg', 5),
(4, 'Akhyana Village', 'Jimbaran ', 2600000, 46, 'akhyana.jpg', 5),
(5, 'Ascott Waterplace Surabaya', 'Surabaya', 1190000, 86, 'ascot.jpg', 4),
(6, 'DoubleTree by Hilton', 'Surabaya', 1210000, 89, 'doubletree.jpg', 5),
(7, 'Grand City Hall Medan', 'Medan', 730000, 23, 'grand.jpg', 4),
(8, 'Cambridge Hotel Medan', 'Medan', 860000, 24, 'cambridge.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` varchar(32) NOT NULL,
  `total` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `hotel-id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `name`, `number`, `total`, `qty`, `user_id`, `hotel-id`, `date`) VALUES
(9, 'Hotel Trans', 'da3b69921579f5530672bdd7a6663b14', 2400000, 1, 1, 2, '2021-05-31');

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
(1, 'Kaleb Juliu', 'kaleb@admin.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '2001-05-01', '08122236458', 'assets/images/Kaleb.PNG', 2),
(2, 'Kang Riki', 'riki@gmail.com', '7720976bfca103422d1bc05c239b1f7a3fae6c580ca472c843104c705e843010', '2001-07-06', '081222364589', 'assets/images/riki.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hotel_list`
--
ALTER TABLE `hotel_list`
  ADD PRIMARY KEY (`hotel-id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `hotel-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
