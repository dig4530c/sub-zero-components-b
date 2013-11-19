-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: sulley.cah.ucf.edu
-- Generation Time: Nov 14, 2013 at 01:58 PM
-- Server version: 5.5.34-0ubuntu0.12.04.1
-- PHP Version: 5.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ar400093`
--

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pid` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `review` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `pid`, `name`, `review`) VALUES
(1, 2, 'Rick', 'i like this!'),
(2, 2, 'John', 'I love it!'),
(3, 7, 'Steve', 'Alex likes this!'),
(4, 7, 'Carlos', 'Cool stuff bro!'),
(5, 7, 'Bailey', 'good stuff buy it!'),
(6, 7, 'Test user', 'Good product!'),
(7, 7, 'Bobby Sanchez', 'Very good!'),
(8, 7, 'Frank', 'Very good stuff!'),
(9, 6, 'Andy', 'Perfect!'),
(10, 6, 'Anonim', 'Good!mum-performance liquid cooling for your CPU in a quick, easy-to-install package. Unlike traditional liquid cooling systems, this self-contained unit comes prefilled and requires zero maintenance. The dual 120 mm Pulse Width Modulation (PWM) fans and 3rd generation copper coldplate ensure quiet, efficient cooling, while the 49 mm thick radiator is equipped to handle the highest performing CPUs on the market. Lastly, the included software helps you monitor and '),
(11, 37, 'test', 'test'),
(12, 36, 'Carlos', 'I loved it!'),
(13, 10, 'Snap', 'So chill');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
