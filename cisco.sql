-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2022 at 07:18 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cisco`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_tokens`
--

CREATE TABLE `access_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `expires_at` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `access_tokens`
--

INSERT INTO `access_tokens` (`id`, `token`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'c48757292507190b93808627460961cc', 1642350797, 1642264397, 1642264397),
(2, '5c4895bed85767def45cb1e6266986d1', 1642350881, 1642264481, 1642264481),
(3, '651b92f43a8a8288b75a6029a7d93ac6', 1642352379, 1642265979, 1642265979),
(4, 'b2e81e4362c17450cd1fd9b70dc931a8', 1642352397, 1642265997, 1642265997),
(5, 'dd7523354cc1c6955b0437955c2f0fac', 1642414685, 1642328285, 1642328285);

-- --------------------------------------------------------

--
-- Table structure for table `router_master`
--

CREATE TABLE `router_master` (
  `id` int(11) NOT NULL,
  `sapid` varchar(18) NOT NULL,
  `hostname` varchar(14) NOT NULL,
  `loopback` varchar(20) NOT NULL,
  `mac_id` varchar(17) NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `delete_status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0 - Deleted , 1 - Not Deleted'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `router_master`
--

INSERT INTO `router_master` (`id`, `sapid`, `hostname`, `loopback`, `mac_id`, `created_on`, `updated_on`, `delete_status`) VALUES
(39, '1', '53223231', '111.111.111.111', '8', '2022-01-24 23:30:10', '2022-01-24 18:00:10', 1),
(40, '3', '5322323', '111.111.111.111', '8', '2022-01-24 23:30:10', '2022-01-24 18:00:10', 1),
(41, '7', '2233232', '111.111.111.111', '21', '2022-01-24 23:30:10', '2022-01-24 18:00:10', 1),
(45, '1', 'asd', '111.111.111.111', '7877', '2022-01-24 23:42:19', '2022-01-24 18:12:19', 1),
(46, '1', '667', '111.111.111.111', '7877', '2022-01-24 23:42:19', '2022-01-24 18:12:19', 1),
(47, '3', '5', '111.111.111.111', '8', '2022-01-24 23:42:19', '2022-01-24 18:12:19', 1),
(48, '7', '11', '111.111.111.111', '8', '2022-01-24 23:42:19', '2022-01-24 18:12:19', 1),
(52, '1', '6671', '111.111.111.111', '7877', '2022-01-24 23:44:15', '2022-01-24 18:14:15', 1),
(53, '1', '6672', '111.111.111.111', '7877', '2022-01-24 23:44:15', '2022-01-24 18:14:15', 1);

-- --------------------------------------------------------

--
-- Table structure for table `temp_router_master`
--

CREATE TABLE `temp_router_master` (
  `id` int(11) NOT NULL,
  `sapid` text NOT NULL,
  `hostname` text NOT NULL,
  `loopback` text NOT NULL,
  `mac_id` text NOT NULL,
  `success_status` int(11) NOT NULL DEFAULT 0,
  `fail_validation_reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_tokens`
--
ALTER TABLE `access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `router_master`
--
ALTER TABLE `router_master`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_index` (`hostname`,`loopback`,`mac_id`);

--
-- Indexes for table `temp_router_master`
--
ALTER TABLE `temp_router_master`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access_tokens`
--
ALTER TABLE `access_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `router_master`
--
ALTER TABLE `router_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `temp_router_master`
--
ALTER TABLE `temp_router_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
