-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2013 at 05:08 PM
-- Server version: 5.1.53
-- PHP Version: 5.3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `subzero`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `pass` binary(32) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `pass`, `user_type`, `date_created`) VALUES
(4, 'Super', 'super@subzerocomponents.com', 'Supa', 'Mayne', 'a≥ïƒyÀî≥xYﬂ[G€µ˛ø\r‚Ó7πª˜‰öC', 'super', '2013-10-30 11:13:57'),
(3, 'Admin', 'admin@subzerocomponents.com', 'Andy', 'Mint', '⁄§''´%V…J9é\Zg*⁄‰ã≠Ê°oáØ1¿Ïæ,¥', 'admin', '2013-10-30 11:11:34'),
(5, 'brodiapunch', 'edjimenez87@gmail.com', 'Edgardo', 'Jimenez', 'R¨U‰œ§=Õ?7íÊ±2”≠[öÅÆD€º£ò"–gHÚ’', '', '2013-10-30 11:14:52');
