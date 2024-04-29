-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 29, 2024 at 10:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `mobile` varchar(15) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uid`, `name`, `email`, `password`, `profile_pic`, `mobile`, `created_at`, `updated_at`) VALUES
(1, 'jayesh', 'ladvajayesh93@gmail.com', 'MTIzNDU2', 'profile1.png', '9987933004', 1713162854, 1713162854),
(2, 'jayeshladva', 'ladva@gmail.com', 'MTIzNDU2', 'Screenshot 2024-03-07 at 10.33.42.png', '9897944001', 1713163897, 1713163897),
(3, 'jayeshladva', 'jayesh@g.com', 'MTIzNDU2', 'Screenshot 2024-03-07 at 10.33.42.png', '8797979988', 1713164490, 1713164490),
(4, 'fdsf', 'jayesh@gmail.com', 'MTIzNDU2', 'Screenshot_2024-03-07_at_10.33.42.png', '8797999789', 1713165385, 1713165385),
(5, '', 'ladvajayesh93@gmail.com', 'MTIzNDU2', 'Jayesh_PHOTO.jpg', '9987933004', 1714372334, 1714372334),
(6, 'Jayesh Ladva', 'ladvajayesh93@gmail.com', 'MTIzNDU2', 'Jayesh_PHOTO.jpg', '9987933004', 1714372387, 1714372387),
(7, 'Jayesh Chavada', 'ladvajayesh93@gmail.co', 'MTIzNDU2', 'Jayesh_PHOTO.jpg', '9987933002', 1714374061, 1714374061);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
