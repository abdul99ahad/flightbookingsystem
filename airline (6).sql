-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 02:40 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `credit_card_no` int(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `ticket_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`credit_card_no`, `registration_id`, `ticket_no`) VALUES
(0, 0, 0),
(123, 75, 292590),
(111111, 60, 361768),
(122222, 76, 249322),
(1212212, 77, 267266),
(1234444, 81, 208340),
(11242311, 0, 113843),
(11244343, 59, 166988),
(12332323, 85, 495608),
(112423113, 0, 928293),
(213123123, 74, 672781),
(1124231122, 0, 818385),
(2147483647, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `arrival`
--

CREATE TABLE `arrival` (
  `arrival_id` int(11) NOT NULL,
  `arrival` varchar(255) NOT NULL,
  `arrival_time` time NOT NULL,
  `arrival_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arrival`
--

INSERT INTO `arrival` (`arrival_id`, `arrival`, `arrival_time`, `arrival_date`) VALUES
(1, 'sydney', '04:00:00', '2019-07-23'),
(2, 'karachi', '01:00:00', '2019-07-24'),
(3, 'chicago', '21:00:00', '2019-07-26'),
(4, 'beijing', '02:30:00', '2019-07-27'),
(5, 'shanghai', '03:40:00', '2019-07-28'),
(6, 'new york', '10:20:00', '2019-07-29'),
(7, 'detroit', '04:14:00', '2019-07-30'),
(8, 'los angeles', '07:50:00', '2019-07-31'),
(9, 'melbourne', '06:37:00', '2019-08-01'),
(10, 'islamabad', '09:45:00', '2019-08-02'),
(11, 'lahore', '12:00:00', '2019-10-09'),
(12, 'bristol', '16:34:00', '2019-08-03'),
(13, 'liverpool', '18:00:00', '2019-08-04'),
(14, 'paris', '23:30:00', '2019-08-05'),
(15, 'cannes', '20:00:00', '2019-08-06'),
(16, 'mumbai', '19:40:00', '2019-08-07'),
(17, 'chennai', '15:45:00', '2019-08-08'),
(18, 'pune', '17:16:00', '2019-08-09'),
(19, 'jeddah', '10:24:00', '2019-08-10'),
(20, 'riyadh', '21:30:00', '2019-08-11'),
(21, 'muscat', '18:50:00', '2019-08-12'),
(22, 'toronto', '13:55:00', '2019-08-14'),
(23, 'sharjah', '19:34:00', '2019-08-13'),
(24, 'istanbul', '23:44:00', '2019-08-15'),
(25, 'kuala lumpur', '03:20:00', '2019-08-16'),
(26, 'seoul', '02:48:00', '2019-08-17'),
(27, 'berlin', '05:43:00', '2019-08-18'),
(28, 'rome', '03:02:00', '2019-08-19'),
(29, 'venice', '12:34:00', '2019-08-20'),
(30, 'moscow', '02:45:00', '2019-08-21');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `dest_id` int(11) NOT NULL,
  `dest` varchar(255) NOT NULL,
  `destination_date` date NOT NULL,
  `destination_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`dest_id`, `dest`, `destination_date`, `destination_time`) VALUES
(1, 'karachi', '2019-07-16', '02:00:00'),
(2, 'sydney', '2019-07-17', '03:05:00'),
(3, 'islamabad', '2019-07-18', '03:45:00'),
(4, 'chicago', '2019-07-18', '04:50:00'),
(5, 'beijing', '2019-07-20', '12:45:00'),
(6, 'shanghai', '2019-07-21', '12:32:00'),
(7, 'new york', '2019-07-23', '05:14:00'),
(8, 'detroit', '2019-07-24', '05:55:00'),
(9, 'los angeles', '2019-07-25', '06:13:00'),
(10, 'melbourne', '2019-07-26', '07:00:00'),
(11, 'bristol', '2019-07-27', '08:07:00'),
(12, 'lahore', '2019-07-28', '10:09:00'),
(13, 'liverpool', '2019-07-29', '11:30:00'),
(14, 'paris', '2019-07-31', '12:25:00'),
(15, 'cannes', '2019-08-01', '14:00:00'),
(16, 'mumbai', '2019-08-03', '14:50:00'),
(17, 'chennai', '2019-08-04', '15:38:00'),
(18, 'pune', '2019-08-05', '16:16:00'),
(19, 'jeddah', '2019-08-06', '17:37:00'),
(20, 'riyadh', '2019-08-07', '18:43:00'),
(21, 'muscat', '2019-08-08', '19:00:00'),
(22, 'toronto', '2019-08-09', '20:20:00'),
(23, 'sharjah', '2019-08-10', '20:56:00'),
(24, 'istanbul', '2019-08-11', '21:15:00'),
(25, 'kuala lumpur', '2019-08-12', '21:49:00'),
(26, 'seoul', '2019-08-13', '22:28:00'),
(27, 'berlin', '2019-08-14', '23:50:00'),
(28, 'rome', '2019-08-17', '00:00:00'),
(29, 'venice', '2019-08-15', '01:09:00'),
(30, 'moscow', '2019-08-16', '06:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `flight_booking`
--

CREATE TABLE `flight_booking` (
  `flight_no` int(11) NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `flight_class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_booking`
--

INSERT INTO `flight_booking` (`flight_no`, `arrival_id`, `price`, `flight_class_id`) VALUES
(3334, 1, 346000, 1),
(6656, 1, 239000, 2),
(7867, 1, 165700, 3),
(7899, 1, 987000, 4);

-- --------------------------------------------------------

--
-- Table structure for table `flight_cancellation`
--

CREATE TABLE `flight_cancellation` (
  `pnr` int(11) NOT NULL,
  `amount_refunded` int(255) NOT NULL,
  `amount_deducted` int(255) NOT NULL,
  `account_no` int(30) NOT NULL,
  `ticket_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `flight_class_relation`
--

CREATE TABLE `flight_class_relation` (
  `flight_class_id` int(11) NOT NULL,
  `flight_class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_class_relation`
--

INSERT INTO `flight_class_relation` (`flight_class_id`, `flight_class`) VALUES
(1, 'Economy'),
(2, 'Business'),
(3, 'Premium Economy'),
(4, 'First Class');

-- --------------------------------------------------------

--
-- Table structure for table `passenger_details_primary`
--

CREATE TABLE `passenger_details_primary` (
  `registration_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `pnr` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `postal_address` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(11) NOT NULL,
  `passport_number` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger_details_primary`
--

INSERT INTO `passenger_details_primary` (`registration_id`, `first_name`, `last_name`, `email`, `pnr`, `passenger_id`, `contact_no`, `gender`, `postal_address`, `country`, `date_of_birth`, `age`, `passport_number`) VALUES
(48, 'asd', '', '', 0, 13, 0, '', '', '', '0000-00-00', 0, 0),
(48, 'asd', 'sfsdfds', '', 0, 14, 0, '', '', '', '0000-00-00', 0, 0),
(48, 'asd', 'sfsdfds', 'abdul9ahad@gmail.com', 0, 15, 0, '', '', '', '0000-00-00', 0, 0),
(48, 'Abdul', 'Ahad', 'abdul9ahad@gmail.com', 0, 16, 2147483647, '', '', '', '0000-00-00', 0, 0),
(48, 'Abdul', 'Ahad', 'abdul9ahad@gmail.com', 0, 17, 0, '', '', '', '0000-00-00', 0, 0),
(48, 'Abdul', 'Ahad', 'abdul9ahad@gmail.com', 0, 18, 2147483647, 'Male', '', '', '0000-00-00', 0, 0),
(48, 'Abdul', 'Ahad', 'abdul9ahad@gmail.com', 0, 19, 2147483647, 'Male', 'kasdksdskd', 'Pakistan', '0000-00-00', 0, 0),
(48, 'Abdul', 'Ahad', 'abdul9ahad@gmail.com', 0, 20, 2147483647, 'Male', 'kasdksdskd', 'Pakistan', '1999-12-04', 0, 0),
(48, 'Abdul', 'Ahad', 'abdul9ahad@gmail.com', 0, 21, 2147483647, 'Male', 'kasdksdskd', 'Pakistan', '1999-12-04', 0, 1234322222),
(48, 'asdasd', 'asdasdsdsad', '', 0, 22, 0, 'Male', '', '', '0000-00-00', 0, 0),
(48, 'asdasd', 'asdasdsdsad', '', 0, 23, 0, 'Male', '', '', '0000-00-00', 0, 0),
(0, '', '', '', 0, 24, 0, 'Male', '', '', '0000-00-00', 0, 0),
(0, 'asd', 'asdasds', 'abdul9ahad@gmail.com', 0, 25, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '0000-00-00', 0, 1234322222),
(59, '', '', '', 0, 26, 0, 'Male', '', '', '0000-00-00', 0, 0),
(60, 'sadasdsad', 'ad', 'abdul9ahad@gmail.com', 0, 27, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '1989-12-03', 0, 123123123),
(60, 'sadasdsad', 'ad', 'abdul9ahad@gmail.com', 0, 28, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '1989-12-03', 0, 123123123),
(60, 'sadasdsad', 'ad', 'abdul9ahad@gmail.com', 0, 29, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '1989-12-03', 0, 123123123),
(60, 'sadasdsad', 'ad', 'abdul9ahad@gmail.com', 0, 30, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '1989-12-03', 0, 123123123),
(60, 'sadasdsad', 'ad', 'abdul9ahad@gmail.com', 0, 31, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '1989-12-03', 0, 123123123),
(60, 'sadasdsad', 'ad', 'abdul9ahad@gmail.com', 0, 32, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '1989-12-03', 0, 123123123),
(60, 'sadasdsad', 'ad', 'abdul9ahad@gmail.com', 0, 33, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '1989-12-03', 0, 123123123),
(60, '', '', '', 0, 34, 0, 'Male', '', '', '0000-00-00', 0, 0),
(60, '', '', '', 0, 35, 0, 'Male', '', '', '0000-00-00', 0, 0),
(60, 'asd', 'sa', 'abdul9ahad@gmail.com', 0, 36, 2147483647, 'Male', 'kisidisfisifsdiisd', 'Pakistan', '0000-00-00', 0, 1123123),
(60, 'asd', 'sa', 'abdul9ahad@gmail.com', 0, 37, 2147483647, 'Male', 'kisidisfisifsdiisd', 'Pakistan', '0000-00-00', 0, 1123123),
(60, 'asd', 'sa', 'abdul9ahad@gmail.com', 0, 38, 2147483647, 'Male', 'kisidisfisifsdiisd', 'Pakistan', '0000-00-00', 0, 1123123),
(63, 'sadasdsad', 'sfsdfds', 'abdul9ahad@gmail.com', 0, 39, 2147483647, 'Male', 'kisidisfisifsdiisd', 'Pakistan', '0000-00-00', 0, 1232323),
(64, '', '', '', 0, 40, 0, 'Male', '', '', '0000-00-00', 0, 0),
(65, '', '', '', 0, 41, 0, 'Male', '', '', '0000-00-00', 0, 0),
(65, '', '', '', 0, 42, 0, 'Male', '', '', '0000-00-00', 0, 0),
(66, '', '', '', 0, 43, 0, 'Male', '', '', '0000-00-00', 0, 0),
(66, '', '', '', 0, 44, 0, 'Male', '', '', '0000-00-00', 0, 0),
(66, '', '', '', 0, 45, 0, 'Male', '', '', '0000-00-00', 0, 0),
(66, '', '', '', 0, 46, 0, 'Male', '', '', '0000-00-00', 0, 0),
(68, '', '', '', 0, 47, 0, 'Male', '', '', '0000-00-00', 0, 0),
(68, '', '', '', 0, 48, 0, 'Male', '', '', '0000-00-00', 0, 0),
(69, '', '', '', 0, 49, 0, 'Male', '', '', '0000-00-00', 0, 0),
(70, '', '', '', 0, 50, 0, 'Male', '', '', '0000-00-00', 0, 0),
(70, '', '', '', 0, 51, 0, 'Male', '', '', '0000-00-00', 0, 0),
(70, '', '', '', 0, 52, 0, 'Male', '', '', '0000-00-00', 0, 0),
(70, '', '', '', 0, 53, 0, 'Male', '', '', '0000-00-00', 0, 0),
(71, '', '', '', 0, 54, 0, 'Male', '', '', '0000-00-00', 0, 0),
(71, '', '', '', 0, 55, 0, 'Male', '', '', '0000-00-00', 0, 0),
(71, '', '', '', 0, 56, 0, 'Male', '', '', '0000-00-00', 0, 0),
(72, 'asd', 'asdasds', 'abdul9ahad@gmail.com', 0, 57, 2147483647, 'Male', 'adasd', 'Pakistan', '0000-00-00', 0, 0),
(72, 'sadasdsad', 'asdasds', '', 0, 58, 0, 'Male', '', '', '0000-00-00', 0, 0),
(72, 'thired', 'sdsd', '', 0, 59, 0, 'Male', '', '', '0000-00-00', 0, 0),
(73, '', '', '', 0, 60, 0, 'Male', '', '', '0000-00-00', 0, 0),
(73, '', '', '', 0, 61, 0, 'Male', '', '', '0000-00-00', 0, 0),
(73, '', '', '', 0, 62, 0, 'Male', '', '', '0000-00-00', 0, 0),
(73, '', '', '', 0, 63, 0, 'Male', '', '', '0000-00-00', 0, 0),
(73, '', '', '', 0, 64, 0, 'Male', '', '', '0000-00-00', 0, 0),
(74, '', '', '', 0, 65, 0, 'Male', '', '', '0000-00-00', 0, 0),
(74, '', '', '', 0, 66, 0, 'Male', '', '', '0000-00-00', 0, 0),
(74, '', '', '', 0, 67, 0, 'Male', '', '', '0000-00-00', 0, 0),
(75, 'Abdul ', 'Ahad', 'abdulahad@gmail.com', 0, 68, 2147483647, 'Male', 'Blah blah', 'Pakistan', '1999-12-04', 0, 1123123),
(76, 'asd', 'asdasds', 'abdul9ahad@gmail.com', 0, 69, 2147483647, 'Male', 'asdasdsd', 'Pakistan', '0000-00-00', 0, 1232323),
(76, 'Abdul ', 'sfsdfds', 'abdul9ahad@gmail.com', 0, 70, 2147483647, 'Male', 'kisidisfisifsdiisd', '', '0000-00-00', 0, 1123123),
(76, 'sadasdsad', 'sfsdfds', 'sd@df.com', 0, 71, 2147483647, 'Male', 'kisidisfisifsdiisd', 'pakistan', '0000-00-00', 0, 1232323),
(77, 'asd', 'sfsdfds', 'abdul9ahad@gmail.com', 0, 72, 2147483647, 'Male', 'kisidisfisifsdiisd', 'Pakistan', '0000-00-00', 0, 1123123),
(77, 'asd', 'asdasds', 'abdul9ahad@gmail.com', 0, 73, 2147483647, 'Male', 'kisidisfisifsdiisd', 'pakistan', '0000-00-00', 0, 1234322222),
(81, 'asd', 'asdasds', '', 0, 74, 0, 'Male', '', '', '0000-00-00', 0, 1234322222),
(81, 'Abdul ', 'asdasds', '', 0, 75, 0, 'Male', '', '', '0000-00-00', 0, 1234322222),
(84, '', '', '', 0, 76, 0, 'Male', '', '', '0000-00-00', 0, 0),
(84, '', '', '', 0, 77, 0, 'Male', '', '', '0000-00-00', 0, 0),
(85, '', '', '', 0, 78, 0, 'Male', '', '', '0000-00-00', 0, 0),
(85, '', '', '', 0, 79, 0, 'Male', '', '', '0000-00-00', 0, 0),
(85, '', '', '', 0, 80, 0, 'Male', '', '', '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `register_passenger`
--

CREATE TABLE `register_passenger` (
  `cnic` bigint(11) NOT NULL,
  `registration_id` int(11) NOT NULL,
  `passenger_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register_passenger`
--

INSERT INTO `register_passenger` (`cnic`, `registration_id`, `passenger_id`) VALUES
(12122222, 60, 37),
(12122222, 60, 38),
(232443, 63, 39),
(0, 64, 40),
(0, 65, 41),
(0, 65, 42),
(0, 66, 43),
(0, 66, 44),
(0, 66, 45),
(0, 66, 46),
(0, 68, 47),
(0, 68, 48),
(0, 69, 49),
(0, 70, 50),
(0, 70, 51),
(0, 70, 52),
(0, 70, 53),
(0, 71, 54),
(0, 71, 55),
(0, 71, 56),
(0, 72, 57),
(0, 72, 58),
(0, 72, 59),
(0, 73, 60),
(0, 73, 61),
(0, 73, 62),
(0, 73, 63),
(0, 73, 64),
(0, 74, 65),
(0, 74, 66),
(0, 74, 67),
(1222, 75, 68),
(2434, 76, 69),
(12232333, 76, 70),
(12232333, 76, 71),
(4220168582643, 77, 72),
(4220168582643, 77, 73),
(2434, 81, 74),
(12232333, 81, 75),
(0, 84, 76),
(0, 84, 77),
(0, 85, 78),
(0, 85, 79),
(0, 85, 80);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `registration_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `cnic` bigint(255) NOT NULL,
  `adults` int(11) NOT NULL,
  `children` int(11) DEFAULT NULL,
  `dest_id` int(11) NOT NULL,
  `arrival_id` int(11) NOT NULL,
  `time_rn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`registration_id`, `full_name`, `email`, `cnic`, `adults`, `children`, `dest_id`, `arrival_id`, `time_rn`) VALUES
(29, 'Ahad', '', 30121, 2, 1, 1, 1, '2019-07-14 11:45:18'),
(30, 'Ahad', '', 30121, 2, 1, 1, 1, '2019-07-14 11:45:18'),
(31, 'Ahad', '', 30121, 2, 1, 1, 1, '2019-07-14 11:45:18'),
(32, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(33, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(34, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(35, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(36, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(37, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(38, 'Ahad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(39, 'Ahad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(40, 'Ahad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(41, 'Ahad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(42, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(43, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(44, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(45, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(46, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(47, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(48, 'fluffs', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(49, 'fluffs', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(50, 'Ahad', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(51, 'Ahad', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(52, 'Asad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(53, 'Asad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(54, 'Asad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(55, 'as', '', 1234457887, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(56, 'as', '', 1234457887, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(57, 'sd', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(58, 'Ahad', '', 12232333, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(59, 'Ahad', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(60, 'sd', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(61, 'zulfiqar', '', 12333333, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(62, 'zulfiqar', '', 12333333, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(63, 'fluffs', '', 111212121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(64, 'sd', '', 30121, 1, 2, 1, 1, '2019-07-14 11:45:18'),
(65, 'sd', '', 30121, 1, 2, 1, 1, '2019-07-14 11:45:18'),
(66, 'asss', '', 30121, 1, 2, 1, 1, '2019-07-14 11:45:18'),
(67, 'Ahad', '', 30121, 1, 2, 1, 1, '2019-07-14 11:45:18'),
(68, 'Ahad', '', 30121, 1, 2, 1, 1, '2019-07-14 11:45:18'),
(69, 'Ahad', '', 30121, 1, 2, 1, 1, '2019-07-14 11:45:18'),
(70, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(71, 'sd', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(72, 'Ahad', '', 30121, 2, 1, 1, 1, '2019-07-14 11:45:18'),
(73, 'Ahad', '', 22324, 1, 3, 1, 1, '2019-07-14 11:45:18'),
(74, 'sd', '', 30121, 2, 1, 1, 1, '2019-07-14 11:45:18'),
(75, 'Ahad', '', 12343, 1, 0, 5, 3, '2019-07-14 11:45:18'),
(76, 'Ahad', '', 30121, 1, 2, 1, 1, '2019-07-14 11:45:18'),
(77, 'sd', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(79, 'fluffs', '', 420032133323, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(81, 'wali', '', 4221111111, 1, 1, 1, 1, '2019-07-14 11:45:18'),
(84, 'Ahad', '', 30121, 1, 1, 1, 22, '2019-07-14 11:45:18'),
(85, 'Ahad', '', 30121, 1, 1, 1, 1, '2019-07-14 11:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

CREATE TABLE `seat` (
  `seat_no` int(11) NOT NULL,
  `flight_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_details`
--

CREATE TABLE `ticket_details` (
  `ticket_no` int(30) NOT NULL,
  `seat_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`credit_card_no`);

--
-- Indexes for table `arrival`
--
ALTER TABLE `arrival`
  ADD PRIMARY KEY (`arrival_id`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`dest_id`);

--
-- Indexes for table `flight_booking`
--
ALTER TABLE `flight_booking`
  ADD PRIMARY KEY (`flight_no`);

--
-- Indexes for table `flight_cancellation`
--
ALTER TABLE `flight_cancellation`
  ADD PRIMARY KEY (`pnr`),
  ADD KEY `ticket_no` (`ticket_no`);

--
-- Indexes for table `flight_class_relation`
--
ALTER TABLE `flight_class_relation`
  ADD PRIMARY KEY (`flight_class_id`);

--
-- Indexes for table `passenger_details_primary`
--
ALTER TABLE `passenger_details_primary`
  ADD PRIMARY KEY (`passenger_id`) USING BTREE;

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`registration_id`),
  ADD KEY `destination_id` (`dest_id`) USING BTREE,
  ADD KEY `arrival_id` (`arrival_id`);

--
-- Indexes for table `ticket_details`
--
ALTER TABLE `ticket_details`
  ADD PRIMARY KEY (`ticket_no`),
  ADD KEY `seat_no` (`seat_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arrival`
--
ALTER TABLE `arrival`
  MODIFY `arrival_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `dest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `passenger_details_primary`
--
ALTER TABLE `passenger_details_primary`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flight_cancellation`
--
ALTER TABLE `flight_cancellation`
  ADD CONSTRAINT `flight_cancellation_ibfk_1` FOREIGN KEY (`ticket_no`) REFERENCES `ticket_details` (`ticket_no`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`dest_id`) REFERENCES `destination` (`dest_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`arrival_id`) REFERENCES `arrival` (`arrival_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
