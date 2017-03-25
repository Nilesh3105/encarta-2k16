-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 26, 2016 at 01:31 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bandit`
--

-- --------------------------------------------------------

--
-- Table structure for table `hint`
--

CREATE TABLE IF NOT EXISTS `hint` (
  `hint_id` int(11) NOT NULL AUTO_INCREMENT,
  `hint_name` varchar(25) NOT NULL,
  `reward` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `hint_description` text NOT NULL,
  `Password_description` varchar(200) NOT NULL,
  PRIMARY KEY (`hint_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `hint`
--

INSERT INTO `hint` (`hint_id`, `hint_name`, `reward`, `cost`, `hint_description`, `Password_description`) VALUES
(1, 'Q1', 1, 2, 'Password lies in the following keywords. ', '15august'),
(3, 'Q3', 2, 7, 'press ctlr+A', '61rekcah'),
(2, 'Q2', 6, 2, 'go to the link.', 'krchoudhary'),
(4, 'Q4', 6, 16, 'open archive.org and paste\r\nhttp://mbm.ac.in', 'navin'),
(5, 'Q5', 3, 12, 'Press ctrl + u and search', 'hacker16'),
(6, 'Q6', 7, 19, 'Ananlyse the Java Script Code', 'hell'),
(7, 'Q7', 8, 14, 'Change the URL', 'password'),
(10, 'Q10', 3, 7, 'Rot13 Caeser Cipher', 'dixitmalviya'),
(8, 'Q8', 11, 29, 'Change the extension of file', 'BEABANDITANDSAVELIVES'),
(9, 'Q9', 13, 21, 'Check the properties', 'chocolate');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE IF NOT EXISTS `registration` (
  `reg_id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_encarta_id` varchar(200) NOT NULL,
  `reg_encarta_password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `reg_encarta_id`, `reg_encarta_password`, `status`) VALUES
(1, 'encarta11', '11', 1),
(2, 'encarta13', '13', 1),
(3, 'encarta15', '15', 0),
(4, 'encarta16', '16', 1),
(5, 'encarta17', '17', 1),
(6, 'encarta18', '18', 1),
(7, 'encarta19', '19', 0);

-- --------------------------------------------------------

--
-- Table structure for table `userx`
--

CREATE TABLE IF NOT EXISTS `userx` (
  `teamx_id` int(11) NOT NULL AUTO_INCREMENT,
  `userx1_id` varchar(200) NOT NULL,
  `userx2_id` varchar(200) NOT NULL,
  `passwordx` varchar(200) NOT NULL,
  `challenge_no` int(11) NOT NULL DEFAULT '1',
  `bitcoin` int(11) NOT NULL DEFAULT '100',
  `hint_status` int(11) NOT NULL DEFAULT '0',
  `challenge_status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`teamx_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `userx`
--

INSERT INTO `userx` (`teamx_id`, `userx1_id`, `userx2_id`, `passwordx`, `challenge_no`, `bitcoin`, `hint_status`, `challenge_status`) VALUES
(4, '1', '1', '1', 10, 7, 1, 0),
(5, 'encarta17', 'encarta18', '1', 2, 97, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
