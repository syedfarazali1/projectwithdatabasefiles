-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 12:14 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `Id` int(11) NOT NULL,
  `FirstName` varchar(11) NOT NULL,
  `LastName` varchar(11) NOT NULL,
  `Age` int(50) NOT NULL,
  `Doctors` varchar(50) NOT NULL,
  `Specialization` varchar(60) NOT NULL,
  `Consultancy_Fees` int(100) NOT NULL,
  `Appointment_Date_Time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Contact_Number` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`Id`, `FirstName`, `LastName`, `Age`, `Doctors`, `Specialization`, `Consultancy_Fees`, `Appointment_Date_Time`, `Contact_Number`) VALUES
(27, 'zaha', 'rauf', 26, ' Dr.Amber Usman', 'Physician', 1500, '2022-10-18 03:19:00', '03009293482'),
(29, 'Anamta', 'Kashif', 15, ' Dr.Zeeshan Ali', 'Physician', 1000, '2022-10-13 03:22:00', '03368670920'),
(30, 'sadaf', 'shuja', 35, ' Dr.Wajahat', 'Diabetes', 1000, '2022-10-17 03:20:00', '03452326054'),
(32, 'faraz', 'ahmed', 25, ' 2', 'Skin Specialist', 1000, '2022-10-25 22:37:00', '03452326054');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `Id` int(11) NOT NULL,
  `Dr_Name` varchar(100) NOT NULL,
  `Spe_ID` int(11) NOT NULL,
  `Timing` varchar(100) NOT NULL,
  `Days` varchar(100) NOT NULL,
  `Cit_ID` int(11) NOT NULL,
  `Avaible_Status` varchar(100) NOT NULL,
  `Pic` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`Id`, `Dr_Name`, `Spe_ID`, `Timing`, `Days`, `Cit_ID`, `Avaible_Status`, `Pic`) VALUES
(1, 'Faraz', 1, '22:2:50', 'MWF', 1, '1', 'faraz'),
(2, 'waqas', 1, '22:2:50', 'MWF', 1, '1', 'faraz');

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE `specialist` (
  `ID` int(32) NOT NULL,
  `Name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialist`
--

INSERT INTO `specialist` (`ID`, `Name`) VALUES
(1, 'Physician'),
(2, 'ENT Specialist'),
(3, 'Diabetes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialist`
--
ALTER TABLE `specialist`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
