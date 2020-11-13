-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2020 at 09:14 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sfb_promo`
--

-- --------------------------------------------------------

--
-- Table structure for table `sf_events`
--

CREATE TABLE `sf_events` (
  `id` int(11) NOT NULL,
  `locationID` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `happen_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_events`
--

INSERT INTO `sf_events` (`id`, `locationID`, `name`, `happen_on`) VALUES
(1, 4, 'Safety 101', '2020-11-14 19:47:18'),
(2, 4, 'App Lunch', '2020-11-12 19:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `sf_journeys`
--

CREATE TABLE `sf_journeys` (
  `id` int(11) NOT NULL,
  `radiusID` int(11) NOT NULL,
  `origin` int(11) NOT NULL,
  `destination` int(11) NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_journeys`
--

INSERT INTO `sf_journeys` (`id`, `radiusID`, `origin`, `destination`, `rate`) VALUES
(1, 1, 1, 4, 3000),
(2, 1, 4, 1, 3000),
(3, 1, 2, 4, 3500),
(4, 1, 4, 2, 3500),
(5, 1, 3, 4, 2500),
(6, 1, 4, 3, 2500),
(7, 2, 6, 4, 5000),
(8, 2, 4, 6, 5000),
(9, 2, 7, 4, 6000),
(10, 2, 4, 7, 6000),
(11, 1, 1, 3, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `sf_locations`
--

CREATE TABLE `sf_locations` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_locations`
--

INSERT INTO `sf_locations` (`id`, `name`) VALUES
(1, 'Kagoma'),
(2, 'Kawala'),
(3, 'Bwaise'),
(4, 'Lugogo'),
(5, 'Bugolabi'),
(6, 'Kijura'),
(7, 'Kihande');

-- --------------------------------------------------------

--
-- Table structure for table `sf_promocodes`
--

CREATE TABLE `sf_promocodes` (
  `id` int(11) NOT NULL,
  `radiusID` int(11) NOT NULL,
  `eventID` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `expire_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_promocodes`
--

INSERT INTO `sf_promocodes` (`id`, `radiusID`, `eventID`, `code`, `status`, `amount`, `create_at`, `expire_at`) VALUES
(1, 1, 1, 'Hi5', 1, 50, '2020-11-12 20:06:21', '2020-11-14 20:00:37'),
(2, 1, 1, 'Hi4', 1, 75, '2020-11-12 20:07:56', '2020-11-12 20:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `sf_radius`
--

CREATE TABLE `sf_radius` (
  `id` int(11) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sf_radius`
--

INSERT INTO `sf_radius` (`id`, `name`) VALUES
(1, 'Central'),
(2, 'West'),
(3, 'East');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sf_events`
--
ALTER TABLE `sf_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_journeys`
--
ALTER TABLE `sf_journeys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_locations`
--
ALTER TABLE `sf_locations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_promocodes`
--
ALTER TABLE `sf_promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sf_radius`
--
ALTER TABLE `sf_radius`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sf_events`
--
ALTER TABLE `sf_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sf_journeys`
--
ALTER TABLE `sf_journeys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sf_locations`
--
ALTER TABLE `sf_locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sf_promocodes`
--
ALTER TABLE `sf_promocodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sf_radius`
--
ALTER TABLE `sf_radius`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
