-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 04:20 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tyc`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `disp` ()  SELECT *FROM consig$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`username`, `password`) VALUES
('admin', '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityname` varchar(100) NOT NULL,
  `constat` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityname`, `constat`) VALUES
('Banglore', 1),
('HONNVAR', 1),
('Manglore', 1),
('MYSORE', 1),
('Puttur', 1),
('SAGAR', 1),
('Shimogga', 1),
('Udupi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `consig`
--

CREATE TABLE `consig` (
  `id` int(10) NOT NULL,
  `ord_by` varchar(200) NOT NULL,
  `sc` varchar(100) NOT NULL,
  `dc` varchar(100) NOT NULL,
  `cc` varchar(100) NOT NULL,
  `serv_type` int(11) NOT NULL DEFAULT 2,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT -1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consig`
--

INSERT INTO `consig` (`id`, `ord_by`, `sc`, `dc`, `cc`, `serv_type`, `added_on`, `status`) VALUES
(14, 'vikas', 'Banglore', 'Manglore', 'Manglore', 2, '2017-04-05 19:51:27', 0),
(15, 'diwakar', 'Banglore', 'Shimogga', 'Shimogga', 3, '2017-04-06 16:56:38', 0),
(16, 'vikas', 'Banglore', 'Banglore', 'Banglore', 1, '2017-04-07 12:45:36', 0),
(17, 'vikas', 'Banglore', 'Banglore', 'Banglore', 1, '2017-04-07 12:45:36', 0),
(18, 'vikas', 'Banglore', 'Shimogga', 'Shimogga', 2, '2019-11-19 10:35:51', 0),
(19, 'vikas', 'Banglore', 'Shimogga', 'Shimogga', 2, '2017-04-07 12:46:22', -1),
(20, 'vikas', 'Banglore', 'Udupi', 'Udupi', 2, '2019-11-19 11:19:54', 0),
(21, 'vikas', 'Banglore', 'Udupi', 'Udupi', 2, '2017-04-07 12:46:45', 0),
(22, 'vikas', 'Banglore', 'Puttur', 'Puttur', 2, '2017-04-07 12:49:14', -1),
(23, 'vikas', 'Banglore', 'Manglore', 'Manglore', 3, '2017-04-07 12:50:09', -1),
(24, 'vikas', 'Banglore', 'Shimogga', 'Shimogga', 1, '2017-04-07 12:50:47', -1),
(25, 'parag', 'Udupi', 'Banglore', 'Banglore', 2, '2017-04-13 01:29:08', 2),
(26, 'parag', 'Udupi', 'Banglore', 'Banglore', 2, '2017-04-13 02:33:07', 1),
(100, 'sonu1', 'Banglore', 'Shimogga', 'Manglore', 2, '2019-11-15 05:08:53', 0),
(101, 'vikas', 'Banglore', 'Manglore', 'Banglore', 1, '2019-11-19 11:20:45', -1);

--
-- Triggers `consig`
--
DELIMITER $$
CREATE TRIGGER `tt` BEFORE INSERT ON `consig` FOR EACH ROW begin

set new.added_on=CURRENT_TIMESTAMP();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `distlist`
--

CREATE TABLE `distlist` (
  `city1` varchar(100) NOT NULL,
  `city2` varchar(100) NOT NULL,
  `dist` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `distlist`
--

INSERT INTO `distlist` (`city1`, `city2`, `dist`) VALUES
('Banglore', 'Manglore', 50),
('Manglore', 'Banglore', 50),
('Udupi', 'Manglore', 105),
('Manglore', 'Udupi', 105),
('Banglore', 'Udupi', 55),
('Udupi', 'Banglore', 55),
('Shimogga', 'Manglore', 1050),
('Manglore', 'Shimogga', 1050),
('Shimogga', 'Udupi', 1055),
('Udupi', 'Shimogga', 1055),
('Banglore', 'Shimogga', 1000),
('Shimogga', 'Banglore', 1000),
('MYSORE', 'Manglore', 605),
('Manglore', 'MYSORE', 605),
('MYSORE', 'Banglore', 555),
('Banglore', 'MYSORE', 555),
('MYSORE', 'Shimogga', 1555),
('Shimogga', 'MYSORE', 1555),
('Udupi', 'MYSORE', 500),
('MYSORE', 'Udupi', 500),
('Puttur', 'Manglore', 1330),
('Manglore', 'Puttur', 1330),
('Puttur', 'Udupi', 1335),
('Udupi', 'Puttur', 1335),
('Puttur', 'Banglore', 1280),
('Banglore', 'Puttur', 1280),
('Puttur', 'MYSORE', 1835),
('MYSORE', 'Puttur', 1835),
('Shimogga', 'Puttur', 280),
('Puttur', 'Shimogga', 280),
('SAGAR', 'Manglore', 400),
('Manglore', 'SAGAR', 400),
('SAGAR', 'Udupi', 405),
('Udupi', 'SAGAR', 405),
('SAGAR', 'Shimogga', 1350),
('Shimogga', 'SAGAR', 1350),
('SAGAR', 'MYSORE', 905),
('MYSORE', 'SAGAR', 905),
('SAGAR', 'Puttur', 1630),
('Puttur', 'SAGAR', 1630),
('Banglore', 'SAGAR', 350),
('SAGAR', 'Banglore', 350),
('HONNVAR', 'Manglore', 550),
('Manglore', 'HONNVAR', 550),
('HONNVAR', 'Udupi', 555),
('Udupi', 'HONNVAR', 555),
('HONNVAR', 'Shimogga', 1500),
('Shimogga', 'HONNVAR', 1500),
('HONNVAR', 'MYSORE', 1055),
('MYSORE', 'HONNVAR', 1055),
('HONNVAR', 'Puttur', 1780),
('Puttur', 'HONNVAR', 1780),
('HONNVAR', 'SAGAR', 850),
('SAGAR', 'HONNVAR', 850),
('Banglore', 'HONNVAR', 500),
('HONNVAR', 'Banglore', 500);

-- --------------------------------------------------------

--
-- Table structure for table `empuserinfo`
--

CREATE TABLE `empuserinfo` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `vstatus` int(1) NOT NULL DEFAULT 0,
  `pname` varchar(200) NOT NULL,
  `phno` varchar(15) NOT NULL,
  `eml` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `empuserinfo`
--

INSERT INTO `empuserinfo` (`username`, `password`, `vstatus`, `pname`, `phno`, `eml`, `address`, `city`) VALUES
('monu', '123456789', 1, 'Monu', '1231233213', 'monu@hotmail.com', 'INDIA', 'Udupi'),
('sonu', '123456789', 1, 'Sonu', '7777777777', 'markzuckerburg@gmail.com', 'MANIT\r\nNIT BPL', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `phno` varchar(15) NOT NULL,
  `eml` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `city` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`username`, `password`, `pname`, `phno`, `eml`, `address`, `city`) VALUES
('aniket', '987654321', 'Aniket Vajpayee', '9667691161', 'aniketvajpayee@gmail.com', 'Zone 4, M.P. Nagar, Pin Code-462003', 'Banglore'),
('diwakar', '987654321', 'Diwakar', '7878787878', 'diwakar@gmail.com', '', 'Banglore'),
('kd', '987654321', 'karthik', '7894561230', 'kd@gmail.com', 'puutur', 'Shimogga'),
('parag', '987654321', 'parag gupta', '1234567890', 'parag@gmail.com', '', 'Udupi'),
('sonu1', '987654321', 'Sonu', '1111111111', 'sonu@monu.com', 'mejestic', 'Banglore'),
('vikas', '987654321', 'Vikas Choudhary', '8827254074', 'vkc11097@gmail.com', '', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `vcons`
--

CREATE TABLE `vcons` (
  `id` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `vby` varchar(200) NOT NULL,
  `etd` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vcons`
--

INSERT INTO `vcons` (`id`, `price`, `vby`, `etd`) VALUES
(14, 100, 'sonu', '2017-04-11 02:37:18'),
(15, 3000, 'sonu', '2017-04-11 02:37:18'),
(16, 0, 'sonu', '2017-04-11 02:37:18'),
(17, 0, 'sonu', '2017-04-14 02:39:35'),
(18, 700, 'monu', '2019-11-21 10:35:51'),
(20, 511, 'sonu', '2019-11-21 11:19:54'),
(21, 2, 'sonu', '2017-04-11 02:37:18'),
(25, 110, 'monu', '2017-04-11 02:37:18'),
(26, 511, 'monu', '2017-04-15 02:52:16'),
(100, 700, 'monu', '2019-11-17 05:08:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD UNIQUE KEY `cityname` (`cityname`),
  ADD KEY `cityname_2` (`cityname`),
  ADD KEY `cityname_3` (`cityname`);

--
-- Indexes for table `consig`
--
ALTER TABLE `consig`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ord_by` (`ord_by`),
  ADD KEY `sc` (`sc`),
  ADD KEY `dc` (`dc`),
  ADD KEY `cc` (`cc`);

--
-- Indexes for table `distlist`
--
ALTER TABLE `distlist`
  ADD KEY `city1` (`city1`),
  ADD KEY `city2` (`city2`);

--
-- Indexes for table `empuserinfo`
--
ALTER TABLE `empuserinfo`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `city` (`city`);

--
-- Indexes for table `vcons`
--
ALTER TABLE `vcons`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `vby` (`vby`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consig`
--
ALTER TABLE `consig`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consig`
--
ALTER TABLE `consig`
  ADD CONSTRAINT `consig_ibfk_1` FOREIGN KEY (`ord_by`) REFERENCES `userinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consig_ibfk_2` FOREIGN KEY (`sc`) REFERENCES `city` (`cityname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consig_ibfk_3` FOREIGN KEY (`dc`) REFERENCES `city` (`cityname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consig_ibfk_4` FOREIGN KEY (`cc`) REFERENCES `city` (`cityname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `distlist`
--
ALTER TABLE `distlist`
  ADD CONSTRAINT `distlist_ibfk_1` FOREIGN KEY (`city1`) REFERENCES `city` (`cityname`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `distlist_ibfk_2` FOREIGN KEY (`city2`) REFERENCES `city` (`cityname`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vcons`
--
ALTER TABLE `vcons`
  ADD CONSTRAINT `vcons_ibfk_1` FOREIGN KEY (`id`) REFERENCES `consig` (`id`)ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vcons_ibfk_2` FOREIGN KEY (`vby`) REFERENCES `empuserinfo` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
