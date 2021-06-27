-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2021 at 06:48 PM
-- Server version: 8.0.23
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` varchar(255) DEFAULT NULL,
  `book_name` varchar(255) DEFAULT NULL,
  `capacity` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`book_id`, `book_name`, `capacity`) VALUES
('3', 'harry potter', 3),
('4', 'critque', 2),
('1', 'very interesting book', 2),
('2', 'newbook', 3),
('5', 'child cursed', 4);

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE `issue` (
  `book_id` varchar(255) DEFAULT NULL,
  `uname` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`book_id`, `uname`, `status`) VALUES
('1', 'lmao2', 'pending'),
('2', 'lmao2', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uname` varchar(255) NOT NULL,
  `email_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uname`, `email_id`, `password`, `role`) VALUES
('lmao', 'lmao', '90bffe1884b84d5e255f12ff0ecbd70f2edfc877b68d612dc6fb50638b3ac17c', 'user'),
('lmao2', 'lmao', 'b707804a56c6b49d88630e953f03606c15e3244dc7a5b742679f8c87d8a550ce', 'admin'),
('lmao3', 'lmao3', 'bd466f4bd4f7f8285a8ed7ad3bd138dfcedfe60d235430c073bdf86b45790cd7', 'user'),
('lmao4', 'lmao3', 'bd466f4bd4f7f8285a8ed7ad3bd138dfcedfe60d235430c073bdf86b45790cd7', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
