-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 01:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ID` int(32) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `ID` int(11) NOT NULL,
  `Date_Time` varchar(100) NOT NULL,
  `Pat_ID` int(32) NOT NULL,
  `Doctor_ID` int(11) NOT NULL,
  `Ph_Num` varchar(100) NOT NULL,
  `Address` varchar(400) NOT NULL,
  `Consultancy_Fees` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`ID`, `Date_Time`, `Pat_ID`, `Doctor_ID`, `Ph_Num`, `Address`, `Consultancy_Fees`) VALUES
(9, '22:54 MWF', 4, 12, ' asd', 'asd', '5000'),
(10, '22:54 MWF', 4, 12, ' ada', 'asdas', '5000'),
(11, '00:17 TTS', 4, 17, ' da', 'adas', '5000'),
(12, '22:54 MWF', 4, 12, ' adsad', 'asdad', '5000'),
(13, '13:14 MWF', 4, 14, ' Faraz Ali', 'Faraz Ali', '5000'),
(14, '02:40 MWF', 4, 21, ' 03170296559', 'malir karachi pakistan', '');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `ID` int(32) NOT NULL,
  `Name` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`ID`, `Name`) VALUES
(1, 'Karachis'),
(2, 'Lahore'),
(5, 'Islamabad'),
(7, 'Hydrabad'),
(8, 'Peshawar'),
(10, 'Multan');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `ID` int(32) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Massage` varchar(500) NOT NULL,
  `Subject` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`ID`, `Name`, `Email`, `Massage`, `Subject`) VALUES
(2, 'zain', 'zain@gmail.com', 'checks', ''),
(3, 'checksss', 'syedfarazali066@gmail.comsss', 'checkss', 'checkss'),
(4, 'fafafaf', 'syedfarazali066@gmail.com', 'asdasd', 'adas'),
(5, 'check', 'syedfarazali066@gmail.com', 'fdf', 'check'),
(6, 'check', 'syedfarazali066@gmail.com', 'adda', 'Subjects');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `ID` int(32) NOT NULL,
  `Dr_Name` varchar(100) NOT NULL,
  `Spe_ID` int(32) NOT NULL,
  `Timing` varchar(100) NOT NULL,
  `Days` varchar(50) NOT NULL,
  `Cit_ID` int(32) NOT NULL,
  `Avaible_Status` varchar(100) NOT NULL,
  `Pic` varchar(500) DEFAULT NULL,
  `Consultancy_Fees` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`ID`, `Dr_Name`, `Spe_ID`, `Timing`, `Days`, `Cit_ID`, `Avaible_Status`, `Pic`, `Consultancy_Fees`) VALUES
(12, 'faraz', 6, '22:54', 'MWF', 5, 'Active', '', '5000'),
(14, 'Faraz Ali', 6, '13:14', 'MWF', 5, 'Active', 'WhatsApp Image 2022-08-22 at 10.18.01 PM.jpeg', '5000'),
(15, 'Faraz Ali', 6, '13:14', 'MWF', 5, 'Active', 'WhatsApp Image 2022-08-22 at 10.18.01 PM.jpeg', '5000'),
(16, 'Faraz Ali', 6, '13:14', 'MWF', 5, 'Active', 'WhatsApp Image 2022-08-22 at 10.18.01 PM.jpeg', '5000'),
(17, 'faraz', 6, '00:17', 'TTS', 2, 'Active', 'Screen-Shot-2016-11-22-at-2.13.47-PM.webp', '5000'),
(21, 'Syed Faraz Ali', 8, '02:40', 'MWF', 2, 'Active', 'user.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `ID` int(11) NOT NULL,
  `MASSAGE` varchar(1000) NOT NULL,
  `Pat_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`ID`, `MASSAGE`, `Pat_ID`) VALUES
(10, 'dada', 4),
(24, 'adasdasdadadasdddddddddddddddddd', 8);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `images` varchar(500) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Ph_Num` varchar(100) NOT NULL,
  `Age` varchar(50) NOT NULL,
  `CIt_Id` int(32) NOT NULL,
  `Blood Group` varchar(100) NOT NULL,
  `Password` varchar(500) NOT NULL,
  `Email` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`ID`, `Name`, `images`, `Address`, `Ph_Num`, `Age`, `CIt_Id`, `Blood Group`, `Password`, `Email`) VALUES
(4, 'saad', 'testimonial-2.jpg', 'ss', '000', '22', 1, 'a+', 'asdas', 'dad'),
(5, 'waqas', 'ss', 'ss', '000', '22', 1, 'a+', 'asdas', 'dad'),
(7, 'waqas', 'My Invitation (5).jpeg', 'ss', '000', '22', 1, 'a+', 'asdas', 'dad'),
(8, 'zain', 'blog-1.jpg', 'malir karachi pakistan', '03170296559', ' 16464646', 7, 'aaa', 'syedfarazali066@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `ID` int(11) NOT NULL,
  `REPORT_TITTLE` varchar(500) NOT NULL,
  `Pat_ID` int(11) NOT NULL,
  `DATE_TIME` varchar(500) NOT NULL,
  `DOCUMENTS` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`ID`, `REPORT_TITTLE`, `Pat_ID`, `DATE_TIME`, `DOCUMENTS`) VALUES
(4, 'sdad', 4, '2022-10-05T02:47', 'IMG-1994.JPG'),
(6, 'dasd', 4, '2022-10-12T03:10', 'page1.docx'),
(7, 'asdas', 4, '', 'ASL-Ace Star Logistics Short Description.docx'),
(8, 'dasd', 4, '2022-10-12T03:10', 'page1.docx'),
(10, 'zain', 5, '2022-10-12T10:45', 'SYED WAJAHAT ALI _ CV.pdf'),
(11, 'waqar', 4, '2022-11-11T11:34', 'SYED WAJAHAT ALI _ CV.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `email`, `pass`, `type`) VALUES
(1, 'admin', 'admin@gmail.com', '1234', 'admin'),
(2, 'faraz', 'faraz@gmail.com', '1234', 'user');

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
(6, 'Eyes'),
(8, 'Ears'),
(9, 'Skin ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pat_ID` (`Pat_ID`),
  ADD KEY `Doctor_ID` (`Doctor_ID`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Spe_ID` (`Spe_ID`,`Cit_ID`),
  ADD KEY `Spe_ID_2` (`Spe_ID`,`Cit_ID`),
  ADD KEY `Cit_ID` (`Cit_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pat_ID` (`Pat_ID`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CIt_Id` (`CIt_Id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Pat_ID` (`Pat_ID`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialist`
--
ALTER TABLE `specialist`
  MODIFY `ID` int(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_1` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`Doctor_ID`) REFERENCES `doctor` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`Spe_ID`) REFERENCES `specialist` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctor_ibfk_2` FOREIGN KEY (`Cit_ID`) REFERENCES `cities` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`CIt_Id`) REFERENCES `cities` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`Pat_ID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
