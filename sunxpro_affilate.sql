-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 24, 2018 at 10:53 AM
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
  `gender` varchar(55) NOT NULL DEFAULT 'NOT SELECTED',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cleartext` varchar(255) NOT NULL,
  `contactNumber` varchar(15) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gov_id` varchar(255) NOT NULL,
  `POA` varchar(255) NOT NULL,
  `activationCode` varchar(255) NOT NULL,
  `referal_code` varchar(255) NOT NULL,
  `sponsor` varchar(255) NOT NULL,
  `activationStatus` varchar(2) NOT NULL,
  `dateRegistered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`_id`, `username`, `fullname`, `gender`, `email`, `password`, `cleartext`, `contactNumber`, `country`, `state`, `city`, `phone`, `address`, `gov_id`, `POA`, `activationCode`, `referal_code`, `sponsor`, `activationStatus`, `dateRegistered`) VALUES
(4, 'imman', 'Adeojo emmanuel', 'Male', 'emmanuel.adeojo@yahoo.com', '$2a$10$3a1daea1c554c5eec6398uNBbpHHbYpg8VmDvBLZhAEeVekzybMJ.', 'mag', '08149848925', 'Nigeria', 'Abuja', 'Fct', '08149848925', 'apo zone a extention', './../../uploads/1535096910_MG_1685.jpg', './../../uploads/1535096910_MG_4829.jpg', '01292029', '', '', '1', '2018-05-05 09:43:02'),
(10, '', '', '0', 'adeojo.emmanuel@iodevtech.com', '$2a$10$084fdd005455d308ecb84OpQtX2Kyl/phbDgvE5El.TPElQhh2vmS', 'mag', '', '', '', '', '', '', '', '', 'iRuQd8elwtsEry0Q1WiB', '49577472', '', '0', '2018-08-21 13:06:12'),
(11, '', '', '0', 'emmanuel.adeAojo.ibk@gmail.com', '$2a$10$73d90835180843b3f4956un3/uIKJfV02I/yjMFxfnfDVKjZ1FIAq', 'mag', '', '', '', '', '', '', '', '', 'tyQmiaDUaQnwgEbKrVJv', '1232', '', '0', '2018-08-23 21:22:41');

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
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
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
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
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
  MODIFY `_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `deposit_history`
--
ALTER TABLE `deposit_history`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
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
