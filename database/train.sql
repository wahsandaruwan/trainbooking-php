-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 09, 2018 at 06:10 PM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `train`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `book_id` int(11) NOT NULL AUTO_INCREMENT,
  `train_id` int(11) NOT NULL,
  `cust_id` int(10) NOT NULL,
  `route_no` int(10) NOT NULL,
  `date` varchar(10) NOT NULL,
  `full_ticket` int(10) NOT NULL,
  `half_ticket` int(10) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`book_id`, `train_id`, `cust_id`, `route_no`, `date`, `full_ticket`, `half_ticket`) VALUES
(7, 1, 2, 0, '2018-10-26', 3, 4),
(8, 2, 2, 4, '2018-10-27', 3, 5),
(9, 2, 1, 5, '2018-10-27', 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `cgr`
--

DROP TABLE IF EXISTS `cgr`;
CREATE TABLE IF NOT EXISTS `cgr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cgr`
--

INSERT INTO `cgr` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_name` varchar(100) NOT NULL,
  `cust_address` varchar(200) NOT NULL,
  `cust_tele` int(10) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_address`, `cust_tele`) VALUES
(1, 'kasun', 'No. 122, 1st Lane, Kaduwela', 114567898),
(2, 'jagath', 'No. 22, jaya lane, pettah', 113554466),
(3, 'Himal', 'No. 122/a horana road,Panadura', 345678993),
(4, 'Sandun', 'No. 122, 1st Lane, Maharagama', 41241255);

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

DROP TABLE IF EXISTS `route`;
CREATE TABLE IF NOT EXISTS `route` (
  `route_no` int(11) NOT NULL AUTO_INCREMENT,
  `starting_place` varchar(50) NOT NULL,
  `ending_place` varchar(50) NOT NULL,
  PRIMARY KEY (`route_no`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_no`, `starting_place`, `ending_place`) VALUES
(1, 'pettah', 'rathmalana'),
(2, 'pettah', 'kalutara'),
(3, 'pettah', 'galle'),
(4, 'pettah', 'kandy'),
(5, 'pettah', 'matara'),
(6, 'pettah', 'jaffna'),
(7, 'pettah', 'kurunegala'),
(8, 'pettah', 'maradana'),
(9, 'pettah', 'dvsdv');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

DROP TABLE IF EXISTS `train`;
CREATE TABLE IF NOT EXISTS `train` (
  `train_id` int(11) NOT NULL AUTO_INCREMENT,
  `train_name` varchar(100) NOT NULL,
  `route_no` int(11) NOT NULL,
  `time_id` int(11) NOT NULL,
  PRIMARY KEY (`train_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`train_id`, `train_name`, `route_no`, `time_id`) VALUES
(1, 'Sagarika', 3, 1),
(2, 'Udarata Menike', 5, 3),
(3, 'Yal Devi', 7, 2),
(4, 'fsdgsdgs', 3, 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_time`
--

DROP TABLE IF EXISTS `t_time`;
CREATE TABLE IF NOT EXISTS `t_time` (
  `time_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` varchar(11) NOT NULL,
  `end_time` varchar(11) NOT NULL,
  PRIMARY KEY (`time_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_time`
--

INSERT INTO `t_time` (`time_id`, `start_time`, `end_time`) VALUES
(1, '10.00', '11.00'),
(2, '9.00', '13.30'),
(3, '7.15', '18.00'),
(4, '08.50', '09.50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
