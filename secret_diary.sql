-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2021 at 04:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secret_diary`
--

-- --------------------------------------------------------

--
-- Table structure for table `diary`
--

CREATE TABLE `diary` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `diary` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `diary`
--

INSERT INTO `diary` (`id`, `email`, `password`, `diary`) VALUES
(7, 'a@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 'Hi everyone'),
(8, 's@gmail.com', '9f6e6800cfae7749eb6c486619254b9c', 'Good morning all of you'),
(10, 'w@gmail.com', '985bda1a6bf60cbb8960d0397c9b9d39', 'hey...how are you?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `diary`
--
ALTER TABLE `diary`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `diary`
--
ALTER TABLE `diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
