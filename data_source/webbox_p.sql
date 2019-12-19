-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2019 at 10:28 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbox_p`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_m_users`
--

CREATE TABLE `tbl_m_users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `data_key` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_m_users`
--

INSERT INTO `tbl_m_users` (`id`, `username`, `password`, `data_key`, `email`) VALUES
(1, 'pong', 'Bß#ýÝ)?·övF57ffeba0e1b83e1e39df80bd3c397d48bf683a819f0e9036577a6770e1e2bea8aÆJÊù;·ÌS(âºé1gÈü¯KvA¨ªÊ<8\0ÝþæWgs73', '³szý82\Z³ Øª»ñã?F1^:=Ú', 'pog@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_m_users`
--
ALTER TABLE `tbl_m_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_m_users`
--
ALTER TABLE `tbl_m_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
