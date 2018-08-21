-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 21, 2018 at 02:16 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sunxpro_affilate`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cleartext` varchar(255) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `activationCode` varchar(255) NOT NULL,
  `referal_code` varchar(255) NOT NULL,
  `activationStatus` varchar(2) NOT NULL,
  `dateRegistered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`_id`, `username`, `fullname`, `email`, `password`, `cleartext`, `contactNumber`, `address`, `activationCode`, `referal_code`, `activationStatus`, `dateRegistered`) VALUES
(4, 'imman', 'Adeojo emmanuel', 'emmanuel.adeojo@yahoo.com', '$2a$10$1aa375585814f5476dce0eRTsyKf0E084MUe3L1j2wOU9HU7SO.sm', 'magnitude', '08149848925', '', '01292029', '', '1', '2018-05-05 09:43:02'),
(9, 'abraham', 'abraham alex', 'adeojo.emmanuel@lmu.edu.ng', '$2a$10$e3b986198878f126000bdOrY.zaJcmzquG2CfJlW7XjC0q/lCn3Zi', 'magnitude', '08125442337', '', '6borJyjcPae7Evw7tn3q', '', '0', '2018-08-19 07:58:40'),
(10, '', '', 'adeojo.emmanuel@iodevtech.com', '$2a$10$084fdd005455d308ecb84OpQtX2Kyl/phbDgvE5El.TPElQhh2vmS', 'mag', '', '', 'iRuQd8elwtsEry0Q1WiB', '49577472', '0', '2018-08-21 13:06:12');

-- --------------------------------------------------------

--
-- Table structure for table `deposit_history`
--

CREATE TABLE `deposit_history` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `date_performed` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passrecovery`
--

CREATE TABLE `passrecovery` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `recovery_code` varchar(255) NOT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passrecovery`
--

INSERT INTO `passrecovery` (`id`, `email`, `userid`, `recovery_code`, `status`, `date_added`) VALUES
(1, 'emmanuel.adeojo@yahoo.com', 4, '1023a', 1, '2018-07-08 11:09:22'),
(2, 'emmanuel.adeojo@yahoo.com', 0, 'BN7Jn2OSfnFEFoyb039j', 1, '2018-07-08 16:10:26'),
(3, 'emmanuel.adeojo@yahoo.com', 4, 'pNvPCZq5w57Ksh8Nf771', 1, '2018-07-08 16:17:12'),
(4, 'emmanuel.adeojo@yahoo.com', 4, 'yAcCCd37IGHE7MmCrUCH', 1, '2018-07-08 16:23:47'),
(5, 'emmanuel.adeojo@yahoo.com', 4, 'qSKSVqmnHeHi2hQW7aOD', 1, '2018-07-08 16:25:13');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `transid` varchar(255) NOT NULL,
  `amount` int(255) NOT NULL,
  `afterbalance` varchar(255) NOT NULL,
  `charge` varchar(255) NOT NULL,
  `details` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wallet`
--

CREATE TABLE `wallet` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `withdrawal_bal` varchar(255) NOT NULL,
  `total_deposit` varchar(255) NOT NULL,
  `total_profit` varchar(255) NOT NULL,
  `total_withdrawal` varchar(255) NOT NULL,
  `total_active_investment` varchar(255) NOT NULL,
  `total_investment` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wallet`
--

INSERT INTO `wallet` (`id`, `userid`, `withdrawal_bal`, `total_deposit`, `total_profit`, `total_withdrawal`, `total_active_investment`, `total_investment`, `date_added`, `date_updated`) VALUES
(1, 4, '0', '0', '0', '0', '0', '0', '2018-07-20 06:40:08', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `deposit_history`
--
ALTER TABLE `deposit_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passrecovery`
--
ALTER TABLE `passrecovery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallet`
--
ALTER TABLE `wallet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `deposit_history`
--
ALTER TABLE `deposit_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passrecovery`
--
ALTER TABLE `passrecovery`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet`
--
ALTER TABLE `wallet`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;