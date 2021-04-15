-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 15, 2021 at 05:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food donation system`
--

-- --------------------------------------------------------

--
-- Table structure for table `caterer_status`
--

CREATE TABLE `caterer_status` (
  `cno` int(11) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `caterer_status`
--

INSERT INTO `caterer_status` (`cno`, `Email`, `Status`) VALUES
(4, 'uvw789@gmail.com', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `dno` int(11) NOT NULL,
  `rno` int(11) NOT NULL,
  `EmailOrg` varchar(60) NOT NULL,
  `EmailRes` varchar(60) NOT NULL,
  `EmailCat` varchar(60) NOT NULL,
  `OFD` varchar(10) NOT NULL,
  `collected` varchar(10) NOT NULL,
  `delivered` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`dno`, `rno`, `EmailOrg`, `EmailRes`, `EmailCat`, `OFD`, `collected`, `delivered`) VALUES
(29, 6, 'abc456@gmail.com', 'xyz123@gmail.com', 'uvw789@gmail.com', 'yes', 'yes', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `food_requests`
--

CREATE TABLE `food_requests` (
  `rno` int(11) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Details` varchar(5000) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_requests`
--

INSERT INTO `food_requests` (`rno`, `Subject`, `Details`, `Email`, `status`) VALUES
(6, 'Food Required', 'Vegetarian food required for around 30 people.', 'abc456@gmail.com', 'done');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Email` varchar(30) NOT NULL,
  `Password` varchar(60) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Name` varchar(60) NOT NULL,
  `Contact` varchar(20) NOT NULL,
  `About` varchar(500) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(20) NOT NULL,
  `Pincode` varchar(10) NOT NULL,
  `State` varchar(20) NOT NULL,
  `token` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Email`, `Password`, `Role`, `Name`, `Contact`, `About`, `Address`, `City`, `Pincode`, `State`, `token`) VALUES
('abc456@gmail.com', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'Organisation', 'Delphi Orphanage', '9871224564', 'Delphi Orphange has been running since 1995. Constitutes 30 adults and 120 children.', 'Avinashi Road, Peelamedu', 'Coimbatore', '641004', 'Tamil Nadu', 'ee28c594acf13171e5ec4dc7e3932b08a26ecd8f60bf5ca1cc859c77c2c42bb1'),
('uvw789@gmail.com', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'Caterer', 'Ravichandran P.', '6678123561', 'Have been working as a caterer for past 5 years in Coimbatore. Knows languages - Tamil, English', 'Peelamedu', 'Coimbatore', '641004', 'Tamil Nadu', '84222b13e362c28ffe82f3e8070c794047cd0cbfec74c2906b10065a8855c827'),
('xyz123@gmail.com', '$2y$10$iusesomecrazystrings2ur6nj.D8DC3mirp3W7h1NPF6FmX3StMW', 'Restaurant', 'Delhi Darbar', '9034561243', 'Restaurant with multiple cusines including indian,chinese,arabic. Have been in business since 2010', 'Peelamedu', 'Coimbatore', '641004', 'Tamil Nadu', '03f78517a21a0996ec1f2710b186bc5b56722622e6ec09d1f41647b919439433');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caterer_status`
--
ALTER TABLE `caterer_status`
  ADD PRIMARY KEY (`cno`),
  ADD KEY `cs` (`Email`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`dno`);

--
-- Indexes for table `food_requests`
--
ALTER TABLE `food_requests`
  ADD PRIMARY KEY (`rno`),
  ADD KEY `fk1` (`Email`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caterer_status`
--
ALTER TABLE `caterer_status`
  MODIFY `cno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `dno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `food_requests`
--
ALTER TABLE `food_requests`
  MODIFY `rno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `caterer_status`
--
ALTER TABLE `caterer_status`
  ADD CONSTRAINT `cs` FOREIGN KEY (`Email`) REFERENCES `signup` (`Email`);

--
-- Constraints for table `food_requests`
--
ALTER TABLE `food_requests`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`Email`) REFERENCES `signup` (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
