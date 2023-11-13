-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2023 at 04:32 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_chiper`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id`, `username`, `password`) VALUES
(35, 'asdasdasdasd123', 'ngwefrtwqolh123'),
(36, 'asdasdasdasd1232', 'ngwefrtwqolh1232'),
(37, 'asdasdasdasd1239', 'ngwefrtwqolh1238'),
(38, 'fdgdfgdf12', 'srzhsuwj12'),
(39, 'fdgdfgdf1233', 'srzhsuwj1233'),
(40, 'fdgdfgdf1244', 'srzhsuwj1255'),
(41, 'fdgdfgdf13', 'srzhsuwj13'),
(42, 'fdgdfgdf19', 'srzhsuwj18'),
(43, 'admin12', 'nrfma12'),
(44, 'sdgsdfg1V*^&T)10-gf1-9', 'frzwqtz1I*^&G)10-uy1-9'),
(45, 'asd', 'nrfma13'),
(46, 'asd1', 'ngw1'),
(47, 'admin15', 'nrfma15'),
(48, 'admin21', 'nrfma21'),
(49, 'zxcvb12', 'mlvzo12'),
(50, 'zxvcsd12', 'mlogfr12'),
(51, 'dsgffdbd12', 'qgzjsruh12'),
(52, 'dsgffdbd122', 'qgzjsruh122'),
(53, 'admin123', 'nrfma123'),
(54, 'aDm!n12', 'nRf!a12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
