-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 26, 2017 at 03:24 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.15-0ubuntu0.16.04.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encarta`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user_name` char(6) NOT NULL,
  `password` char(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `code_prelims`
--

CREATE TABLE `code_prelims` (
  `user_id` int(11) NOT NULL,
  `q1` set('not_attempted','not_solved','solved') NOT NULL DEFAULT 'not_attempted',
  `q2` set('not_attempted','not_solved','solved') NOT NULL DEFAULT 'not_attempted',
  `q3` set('not_attempted','not_solved','solved') NOT NULL DEFAULT 'not_attempted',
  `q4` set('not_attempted','not_solved','solved') NOT NULL DEFAULT 'not_attempted',
  `q5` set('not_attempted','not_solved','solved') NOT NULL DEFAULT 'not_attempted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `total` int(11) NOT NULL DEFAULT '0',
  `code_marathon` tinyint(1) NOT NULL DEFAULT '0',
  `insomnia` tinyint(1) NOT NULL DEFAULT '0',
  `python_phreakers` tinyint(1) NOT NULL DEFAULT '0',
  `klutzy_code` tinyint(1) NOT NULL DEFAULT '0',
  `chaos` tinyint(1) NOT NULL DEFAULT '0',
  `bragging` tinyint(1) NOT NULL DEFAULT '0',
  `the_gauntlet` tinyint(1) NOT NULL DEFAULT '0',
  `bandit` tinyint(1) NOT NULL DEFAULT '0',
  `webcrats` tinyint(1) NOT NULL DEFAULT '0',
  `euts` tinyint(1) NOT NULL DEFAULT '0',
  `head_rush` tinyint(1) NOT NULL DEFAULT '0',
  `digital_fortress` tinyint(1) NOT NULL DEFAULT '0',
  `quiz_up` tinyint(1) NOT NULL DEFAULT '0',
  `accelera` tinyint(1) NOT NULL DEFAULT '0',
  `youth_parliament` tinyint(1) NOT NULL DEFAULT '0',
  `mad_about_ads` tinyint(1) NOT NULL DEFAULT '0',
  `blue_print` tinyint(1) NOT NULL DEFAULT '0',
  `circuit_cipher` tinyint(1) NOT NULL DEFAULT '0',
  `line_follower_race` tinyint(1) NOT NULL DEFAULT '0',
  `dalal_street` tinyint(1) NOT NULL DEFAULT '0',
  `encarta_hunt` tinyint(1) NOT NULL DEFAULT '0',
  `pick_a_pic` tinyint(1) NOT NULL DEFAULT '0',
  `counter_strike` tinyint(1) NOT NULL DEFAULT '0',
  `need_for_speed` tinyint(1) NOT NULL DEFAULT '0',
  `mini_militia` tinyint(1) NOT NULL DEFAULT '0',
  `open_hardware` tinyint(1) NOT NULL DEFAULT '0',
  `open_software` tinyint(1) NOT NULL DEFAULT '0',
  `art_design` tinyint(1) NOT NULL DEFAULT '0',
  `code_mutants` tinyint(1) NOT NULL DEFAULT '0',
  `clean_the_bugs` tinyint(1) NOT NULL DEFAULT '0',
  `table_no` set('0','1','2','3') NOT NULL DEFAULT '0',
  `locked` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hint`
--

CREATE TABLE `hint` (
  `hint_id` int(11) NOT NULL,
  `hint_name` varchar(25) NOT NULL,
  `reward` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `hint_description` text NOT NULL,
  `Password_description` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ques_table`
--

CREATE TABLE `ques_table` (
  `q_id` int(11) NOT NULL,
  `question` varchar(300) NOT NULL,
  `answer` varchar(20) NOT NULL,
  `lat` double NOT NULL,
  `longitude` double NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(11) NOT NULL,
  `reg_encarta_id` varchar(200) NOT NULL,
  `reg_encarta_password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` varchar(11) NOT NULL,
  `score` int(11) NOT NULL,
  `answer_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `password` varchar(10) NOT NULL DEFAULT 'encartaK16',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `college` varchar(100) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `sem` tinyint(4) NOT NULL,
  `mobile` char(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(60) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `code` char(32) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userx`
--

CREATE TABLE `userx` (
  `teamx_id` int(11) NOT NULL,
  `userx1_id` varchar(200) NOT NULL,
  `userx2_id` varchar(200) NOT NULL,
  `passwordx` varchar(200) NOT NULL,
  `challenge_no` int(11) NOT NULL DEFAULT '1',
  `bitcoin` int(11) NOT NULL DEFAULT '100',
  `hint_status` int(11) NOT NULL DEFAULT '0',
  `challenge_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `code_prelims`
--
ALTER TABLE `code_prelims`
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `hint`
--
ALTER TABLE `hint`
  ADD PRIMARY KEY (`hint_id`);

--
-- Indexes for table `ques_table`
--
ALTER TABLE `ques_table`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `userx`
--
ALTER TABLE `userx`
  ADD PRIMARY KEY (`teamx_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `hint`
--
ALTER TABLE `hint`
  MODIFY `hint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=595;
--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16011;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `userx`
--
ALTER TABLE `userx`
  MODIFY `teamx_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `code_prelims`
--
ALTER TABLE `code_prelims`
  ADD CONSTRAINT `code_prelims_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
