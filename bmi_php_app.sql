-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2024 at 02:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bmi_php_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `appusers`
--

CREATE TABLE `appusers` (
  `AppUserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appusers`
--

INSERT INTO `appusers` (`AppUserID`, `Username`, `Password`, `CreatedAt`) VALUES
(1, 'Safaa', '$2y$10$PFM3KCR5AUDe8vunP8uPhuHDahey5ZvUh4paN7LWkQapf7kf8e2/C', '2024-09-07 08:06:49'),
(2, 'saif', '$2y$10$L4fuy6PPyO8WSP8qwBfNXe74.6/uyg11xx4ecRGsDsFnT6RnSAt1y', '2024-09-07 10:05:53'),
(3, 'safa_C', '$2y$10$fU6ZQvexEC3lNLymZwuzduNzzj6/FWxli/ABoqEMInP0zwMM3wDSO', '2024-09-07 10:34:54');

-- --------------------------------------------------------

--
-- Table structure for table `bmirecords`
--

CREATE TABLE `bmirecords` (
  `RecordID` int(11) NOT NULL,
  `BMIUserID` int(11) DEFAULT NULL,
  `Height` float NOT NULL,
  `Weight` float NOT NULL,
  `BMI` float NOT NULL,
  `RecordedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmirecords`
--

INSERT INTO `bmirecords` (`RecordID`, `BMIUserID`, `Height`, `Weight`, `BMI`, `RecordedAt`) VALUES
(1, 1, 155, 40, 16.6493, '2024-09-07 10:28:38'),
(2, 2, 140, 44, 22.449, '2024-09-07 11:23:53');

-- --------------------------------------------------------

--
-- Table structure for table `bmiusers`
--

CREATE TABLE `bmiusers` (
  `BMIUserID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` enum('Male','Female','Other') DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmiusers`
--

INSERT INTO `bmiusers` (`BMIUserID`, `Name`, `Age`, `Gender`, `CreatedAt`) VALUES
(1, 'saimachysafa', 22, 'Female', '2024-09-07 10:25:43'),
(2, 'raha', 18, 'Female', '2024-09-07 11:23:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appusers`
--
ALTER TABLE `appusers`
  ADD PRIMARY KEY (`AppUserID`),
  ADD UNIQUE KEY `Username` (`Username`);

--
-- Indexes for table `bmirecords`
--
ALTER TABLE `bmirecords`
  ADD PRIMARY KEY (`RecordID`),
  ADD KEY `BMIUserID` (`BMIUserID`);

--
-- Indexes for table `bmiusers`
--
ALTER TABLE `bmiusers`
  ADD PRIMARY KEY (`BMIUserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appusers`
--
ALTER TABLE `appusers`
  MODIFY `AppUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bmirecords`
--
ALTER TABLE `bmirecords`
  MODIFY `RecordID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bmiusers`
--
ALTER TABLE `bmiusers`
  MODIFY `BMIUserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bmirecords`
--
ALTER TABLE `bmirecords`
  ADD CONSTRAINT `bmirecords_ibfk_1` FOREIGN KEY (`BMIUserID`) REFERENCES `bmiusers` (`BMIUserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
