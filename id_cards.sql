-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 30, 2015 at 09:39 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `id_cards`
--

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE IF NOT EXISTS `complaints` (
  `form_number` bigint(255) NOT NULL AUTO_INCREMENT,
  `complainDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `mat_no` varchar(15) NOT NULL,
  `full_name` varchar(60) NOT NULL,
  `category` varchar(60) NOT NULL,
  `complaint_type` varchar(40) NOT NULL,
  `admin_id` int(20) NOT NULL,
  PRIMARY KEY (`form_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`form_number`, `complainDate`, `mat_no`, `full_name`, `category`, `complaint_type`, `admin_id`) VALUES
(12, '2015-03-04 08:48:30', '', 'Bayode', 'Staff', '8', 0),
(13, '2015-03-04 09:37:43', '169911', 'Adewere Fikayo', 'Staff', '7', 0),
(14, '2015-03-05 10:34:22', '169911', 'Adewere Fikayo', 'Student', '7', 0),
(15, '2015-03-06 07:50:44', '164499', 'Sanni Oluwafikayomi', 'Student', '8', 0),
(19, '2015-03-16 08:43:55', '170934', 'Karcsh Moni', 'Student', '5', 0),
(20, '2015-03-17 14:01:19', '164499', 'Sanni Oluwafikayomi', 'Student', '9', 0);

-- --------------------------------------------------------

--
-- Table structure for table `complaint_type`
--

CREATE TABLE IF NOT EXISTS `complaint_type` (
  `type_id` int(3) NOT NULL AUTO_INCREMENT,
  `type` text NOT NULL,
  `cost` int(5) NOT NULL,
  `last_altered_by_id` int(20) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `complaint_type`
--

INSERT INTO `complaint_type` (`type_id`, `type`, `cost`, `last_altered_by_id`) VALUES
(3, 'Change of Department', 600, 0),
(4, 'Promotion (Staff)', 600, 0),
(5, 'Broken ID Card', 600, 0),
(6, 'Loss of ID Card', 1000, 0),
(7, 'Change of Passport', 1000, 0),
(8, 'Late Complaint for Student(Per Session)', 600, 0),
(9, 'Deface of ID Card', 600, 0),
(10, 'Change of Signature', 1000, 0),
(11, 'Late Portal Access', 1000, 0),
(12, 'New Staff', 600, 0),
(13, 'Change of Name', 1000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(50) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`) VALUES
(1, 'Fikayomi', 'millicent.q');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
