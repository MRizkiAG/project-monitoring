-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2022 at 11:05 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `project_monitoring`
--

CREATE TABLE `project_monitoring` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `client` varchar(100) NOT NULL,
  `leader` varchar(100) NOT NULL,
  `leader_email` varchar(100) NOT NULL,
  `leader_photo` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `progress` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_monitoring`
--

INSERT INTO `project_monitoring` (`id`, `project_name`, `client`, `leader`, `leader_email`, `leader_photo`, `start_date`, `end_date`, `progress`) VALUES
(5, 'Membuat Sistem Informasi Project Monitoring', 'Yayasan Hasnur Centre', 'Muhammad Rizki Al-Ghifari', 'mrizkiag1027@gmail.com', '62d51b556bc7b.jpg', '2022-07-18 23:03:00', '2022-07-18 23:59:00', 100),
(6, 'Membuat Aplikasi Penilaian Mahasiswa', 'Yayasan Hasnur Centre', 'Muhammad Rizki Al-Ghifari', 'mrizkiag1027@gmail.com', '62d51b85d1291.jpg', '2022-07-16 08:21:00', '2022-07-17 06:00:00', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_monitoring`
--
ALTER TABLE `project_monitoring`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
