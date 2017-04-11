-- phpMyAdmin SQL Dump
-- version 4.4.15.8
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 11, 2017 at 08:52 AM
-- Server version: 5.6.31
-- PHP Version: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `addressbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_numbers`
--

CREATE TABLE IF NOT EXISTS `contact_numbers` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `number` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_addresses`
--

CREATE TABLE IF NOT EXISTS `email_addresses` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE IF NOT EXISTS `group_members` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `group_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `group_names`
--

CREATE TABLE IF NOT EXISTS `group_names` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `person_details`
--

CREATE TABLE IF NOT EXISTS `person_details` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `create_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `street_addresses`
--

CREATE TABLE IF NOT EXISTS `street_addresses` (
  `id` int(10) unsigned NOT NULL,
  `person_id` int(10) unsigned NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_numbers`
--
ALTER TABLE `contact_numbers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `email_addresses`
--
ALTER TABLE `email_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `group_members`
--
ALTER TABLE `group_members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `group_names`
--
ALTER TABLE `group_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `person_details`
--
ALTER TABLE `person_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `street_addresses`
--
ALTER TABLE `street_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `person_id` (`person_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_numbers`
--
ALTER TABLE `contact_numbers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `email_addresses`
--
ALTER TABLE `email_addresses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_members`
--
ALTER TABLE `group_members`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `group_names`
--
ALTER TABLE `group_names`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `person_details`
--
ALTER TABLE `person_details`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `street_addresses`
--
ALTER TABLE `street_addresses`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact_numbers`
--
ALTER TABLE `contact_numbers`
  ADD CONSTRAINT `contact_numbers_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `email_addresses`
--
ALTER TABLE `email_addresses`
  ADD CONSTRAINT `email_addresses_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `group_members`
--
ALTER TABLE `group_members`
  ADD CONSTRAINT `group_members_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `group_members_ibfk_2` FOREIGN KEY (`group_id`) REFERENCES `group_names` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `street_addresses`
--
ALTER TABLE `street_addresses`
  ADD CONSTRAINT `street_addresses_ibfk_1` FOREIGN KEY (`person_id`) REFERENCES `person_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
