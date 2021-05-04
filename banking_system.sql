-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 04, 2021 at 04:23 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `banking_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `current_balance` bigint(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `current_balance`) VALUES
(1, 'Rahul Singh', 'rs@gmail.com', 15910),
(2, 'Ramu Kannaujia', 'rk@gmail.com', 9862),
(3, 'Shivam kumar', 'sk@gmail.com', 9550),
(4, 'Saurabh Sahini', 'ss@gmail.com', 31415),
(5, 'Shivank Verma', 'sv@gmail.com', 27600),
(6, ' Aman singh', 'as@gmail.com', 13078),
(7, 'Omjee Gupta', 'og@gmail.com', 27000),
(8, 'Sarvesh verma', 'rk@gmail.com', 35000),
(9, 'kamal kaushal', 'kk@gmail.com', 23000),
(10, 'Suman Singh', 'ss@gmail.com', 40000);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` varchar(30) NOT NULL,
  `receiver` varchar(30) NOT NULL,
  `amount` int(100) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `sender`, `receiver`, `amount`, `date_time`) VALUES
(1, 'Shivank Verma', 'Rahul Singh', 1000, '2021-05-04 06:13:04'),
(2, 'Shivank Verma', 'Rahul Singh', 1000, '2021-05-04 06:15:57'),
(3, 'Shivam kumar', 'Shivank Verma', 2000, '2021-05-04 09:51:13'),
(4, 'Shivam kumar', 'Shivank Verma', 2000, '2021-05-04 09:51:23'),
(5, 'Rahul Singh', 'Ramu Kannaujia', 45, '2021-05-04 09:57:47'),
(6, 'Rahul Singh', 'Ramu Kannaujia', 45, '2021-05-04 09:58:40'),
(7, 'Ramu Kannaujia', 'Shivank Verma', 678, '2021-05-04 14:21:25'),
(8, 'Shivank Verma', ' Aman singh', 78, '2021-05-04 14:22:19'),
(9, 'Shivam kumar', 'Ramu Kannaujia', 450, '2021-05-04 14:25:49');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
