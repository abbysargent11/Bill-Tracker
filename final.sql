-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2022 at 04:33 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `bill_id` int NOT NULL,
  `userID` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`bill_id`, `userID`, `name`, `amount`) VALUES
(11, 22, 'Internet', '120.00'),
(13, 22, 'Netflix', '20.00'),
(14, 22, 'Savings', '50.00'),
(15, 22, 'Cat Food', '40.00'),
(16, 28, 'Rent', '340.00'),
(17, 28, 'Electric', '60.00'),
(18, 28, 'Gas', '100.00'),
(20, 28, 'Internet', '122.50'),
(21, 29, 'Insurance', '40.00'),
(23, 29, 'Rent', '500.00'),
(24, 29, 'Hulu', '14.00'),
(25, 31, 'Rent', '340.00'),
(27, 31, 'Hulu', '12.00'),
(28, 32, 'Rent', '340.00'),
(30, 32, 'Hulu', '14.00');

-- --------------------------------------------------------

--
-- Table structure for table `paid`
--

CREATE TABLE `paid` (
  `userID` int NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `paid_id` int NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paid`
--

INSERT INTO `paid` (`userID`, `name`, `paid_id`, `date`) VALUES
(28, 'Rent', 1, '2022-12-06'),
(28, 'Electric', 2, '2022-11-27'),
(28, 'Gas', 3, '2022-11-15'),
(28, 'Phone', 4, '2022-11-04'),
(28, 'Internet', 5, '2022-11-21'),
(29, 'Phone', 6, '2022-12-06'),
(29, 'Phone', 7, '2022-12-09'),
(29, 'Rent', 8, '2022-11-14'),
(31, 'Rent', 9, '2022-12-01'),
(31, 'Hulu', 10, '2022-12-07'),
(32, 'Rent', 11, '2022-12-01'),
(32, 'Hulu', 12, '2022-12-07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar_path` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `firstname`, `lastname`, `username`, `password`, `avatar_path`) VALUES
(22, 'abby', 's', 'ss', '$2y$10$pghDOhdyDIKtB9yZf0d93eNfRydwRHGhR/4TnEWGFE9OoAVP5cJfy', 'uploads/ss.jpg'),
(23, 'Ryan', 'Briese', 'Ryan', '$2y$10$wIpUw6/C6UGmsSNabqluR.DloHnaeO1Wwx6GLhFQDJ4aIquTbPqx.', 'uploads/Ryan.png'),
(24, 'aa', 'aa', 'aa', '$2y$10$5uSPtQQdhT.CO7r9LDPdpuHhbmFRSrAFZBwWTGwb5SmXp.JlpVzUW', 'uploads/aa'),
(25, 'qq', 'qq', 'qq', '$2y$10$sbJGlIDTWyBf8EtK49lAEuJDHaGGQyT3Qb1SNsq16x4yjTsljbtk2', 'uploads/qq.jpg'),
(26, 'rr', 'rr', 'rr', '$2y$10$83cm3DxqVNZBQZz.ZXIpsezykOY4bwvrCZoCCssr1fg/q59cCPz6W', 'uploads/rr.jpg'),
(27, 'test', 'test', 'test', '$2y$10$TAZZoUbl/u/PXCJfLk/lju4jBy0HXfpmRwmOzZ5VQSK1mla/6Vh.2', 'uploads/test.jpg'),
(28, 'Abby', 'Sargent', 'Abby123', '$2y$10$3ooLnJ86dFwYRKDO5bd3W.6e4VPxfCBZlqrsVooXwrjJd.Stb.n7q', 'uploads/Abby123.jpg'),
(29, 'Ryan', 'Briese', 'breezy', '$2y$10$lmiScWCKclzRx/Ieln0.desArDCZ5gclVm1.jN1VTloG26EXf3r6e', 'uploads/breezy.jpg'),
(30, 'Abby', 'Sargent', 'abby', '$2y$10$VDWC.Snv4..m47KZtVB6xe83jFILyU2CwrMyK1ybL81Ejt9FW9kc2', 'uploads/abby.jpg'),
(31, 'Abby', 'Sargent', 'abby', '$2y$10$d9yI1bKngtNf6.icW1IolOLmvTWZe3wSCf7uyHF6KixAu4QjXAs1e', 'uploads/abby.jpg'),
(32, 'Abby', 'Sargent', 'abbyy', '$2y$10$BKGDEcSLAeio9ol0.tNId.5vhTzm2HxHhbTF.vKWGDG2wpbImivRa', 'uploads/abbyy.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`bill_id`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `paid`
--
ALTER TABLE `paid`
  ADD PRIMARY KEY (`paid_id`),
  ADD KEY `bill_id` (`name`),
  ADD KEY `id` (`userID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `bill_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `paid`
--
ALTER TABLE `paid`
  MODIFY `paid_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bills`
--
ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `paid`
--
ALTER TABLE `paid`
  ADD CONSTRAINT `paid_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
