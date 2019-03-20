-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2018 at 03:35 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lowbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datepaid` date NOT NULL,
  `consumerId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `cpenalty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `officialReciept` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `amount`, `datepaid`, `consumerId`, `status`, `cpenalty`, `discount`, `officialReciept`, `created_at`, `updated_at`) VALUES
(13, '11025', '2018-03-24', 77, 1, '0', '7', '123', '2018-03-24 12:39:59', '2018-03-24 12:39:59'),
(15, '12135', '2018-03-24', 77, 1, '0', '7', '1236', '2018-03-24 13:01:23', '2018-03-24 13:01:23');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concessionaires`
--

CREATE TABLE `concessionaires` (
  `id` int(10) UNSIGNED NOT NULL,
  `meternum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `clark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `concessionaires`
--

INSERT INTO `concessionaires` (`id`, `meternum`, `userId`, `clark`, `pic`, `category`, `status`, `created_at`, `updated_at`) VALUES
(52, '12345', '77', 'Quarry', 'pic', 5, 'connected', '2018-03-24 12:21:05', '2018-03-24 13:03:07'),
(53, '888888', '78', 'Quarry', 'pic', 5, 'connected', '2018-03-24 13:12:40', '2018-03-24 13:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(89, '2018_01_08_175453_create_concessionaires_table', 1),
(90, '2018_01_09_044636_create_settings_table', 1),
(91, '2018_01_09_052032_create_bills_table', 1),
(92, '2018_01_09_053234_create_services_table', 1),
(93, '2018_01_09_053628_create_servicesets_table', 1),
(94, '2018_01_09_054008_create_servicelimits_table', 1),
(95, '2018_01_09_055441_create_monthlybills_table', 1),
(96, '2018_01_09_060423_create_tempbills_table', 1),
(97, '2018_03_02_130947_create_categories_table', 1),
(98, '2018_03_02_131221_create_rates_table', 1),
(99, '2018_03_02_131245_create_positions_table', 1),
(100, '2018_03_19_175626_create_table_payments', 2);

-- --------------------------------------------------------

--
-- Table structure for table `monthlybills`
--

CREATE TABLE `monthlybills` (
  `id` int(10) UNSIGNED NOT NULL,
  `cubicCount` int(11) NOT NULL,
  `prevrec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `newrec` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthlyDueDate` date NOT NULL,
  `monthlyRecordDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monthlyBillDate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billAmount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `meternum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthlybills`
--

INSERT INTO `monthlybills` (`id`, `cubicCount`, `prevrec`, `newrec`, `monthlyDueDate`, `monthlyRecordDate`, `monthlyBillDate`, `billAmount`, `status`, `meternum`, `created_at`, `updated_at`) VALUES
(74, 1111, '0', '1111', '2018-02-01', '2018-03-24 20:38:40', '2018-01', '11040', 1, '12345', '2018-03-24 12:38:40', '2018-03-24 12:39:59'),
(76, 1222, '1111', '2333', '2018-03-31', '2018-03-24 20:56:04', '2018-03', '12150', 1, '12345', '2018-03-24 12:56:04', '2018-03-24 13:01:23'),
(78, 22, '0', '22', '2018-03-31', '2018-03-24 21:14:03', '2018-03', '150', 0, '888888', '2018-03-24 13:14:03', '2018-03-24 13:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `conId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentdate` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(12, 'cashier', '2018-03-23 06:32:28', '2018-03-23 06:32:28'),
(13, 'Meter Reader', '2018-03-23 06:32:40', '2018-03-23 08:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `rates`
--

CREATE TABLE `rates` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `minimum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excessrate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rates`
--

INSERT INTO `rates` (`id`, `name`, `minimum`, `rate`, `excessrate`, `created_at`, `updated_at`) VALUES
(5, 'residential', '15', '80', '10', '2018-03-23 06:32:13', '2018-03-23 06:32:13'),
(6, 'commercial', '30', '200', '50', '2018-03-23 08:32:31', '2018-03-23 08:32:31');

-- --------------------------------------------------------

--
-- Table structure for table `servicelimits`
--

CREATE TABLE `servicelimits` (
  `id` int(10) UNSIGNED NOT NULL,
  `serviceLimitId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceLimitFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceLimitTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceLimitAmount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `serviceName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `servicesets`
--

CREATE TABLE `servicesets` (
  `id` int(10) UNSIGNED NOT NULL,
  `serviceId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceFrom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceTo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serviceAmount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `penalty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duedate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `penalty`, `duedate`, `discount`, `days`, `created_at`, `updated_at`) VALUES
(2, '7', '7', '15', '2', NULL, '2018-03-24 08:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `tempbills`
--

CREATE TABLE `tempbills` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `MonthlyBillId` int(11) NOT NULL,
  `billAmount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meternum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `mname`, `lname`, `usertype`, `meternum`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'Gege', 'dsadas', 'dsadsd', 'admin', '0000-00-0', 'gegejosper@gmail.com', '$2y$10$zp5/Cj.VXJzQtzT3MiO3B.GNEqGD8P0wwX.XVd6tY0gfr..cx9lqO', 'wAX6V1k301TtQQ40XTWp9KbScPGJbwlPjIeuqOgJ1zll53aLs2MaZ8GfCSqJ', '2018-03-04 05:44:55', '2018-03-04 05:44:55'),
(67, 'tttt', 't', 'gggg', 'cashier', '0000-00-0', 'gege@gmail.com', '$2y$10$7qToh.JnPhFG5XzVV35GX.ajjQPvNkK/s5X7iDSm6V3I6/rCHi8E.', 'kNTYaiIQltOmA5a4mgPNaP5OBAFSqprFAMShVswjPGzAdeubaEwQFUnrqV86', '2018-03-24 09:37:09', '2018-03-24 09:37:09'),
(68, 'rr', 't', 'ttt', 'Meter Reader', '0000-00-0', 'gg@gmail.com', '$2y$10$EUeDxcegeZ7.R/fzdiI/beDYlJhZ80R9IA2kvCXzn9KUhYiSNEea.', 'L5EylssWQtskpVcaz7NapyNW2rcOT0j8DbkY4BMF8VFEDV1xxtXq84i3aM3D', '2018-03-24 09:37:40', '2018-03-24 09:37:40'),
(77, 'jing', 's', 'samulde', 'concessionaire', '12345', 'jingsamulde@yahoo.com', '$2y$10$zp5/Cj.VXJzQtzT3MiO3B.GNEqGD8P0wwX.XVd6tY0gfr..cx9lqO', 'imsTXOcmtdHOXlLxvo6Ana2xMFvHXOQb2hPMqRk3DFNezZXYd6Zq2hGQm3U2', '2018-03-24 12:21:05', '2018-03-24 12:21:05'),
(78, 'dong', 'g', 'ganay', 'concessionaire', '888888', 'dong@gmail.com', '$2y$10$RWEhp.esxA43Vssisj.Cv.J.QAgSXF9opYimepj4G2yG7QmAdOyym', NULL, '2018-03-24 13:12:40', '2018-03-24 13:12:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `concessionaires`
--
ALTER TABLE `concessionaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthlybills`
--
ALTER TABLE `monthlybills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicelimits`
--
ALTER TABLE `servicelimits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicesets`
--
ALTER TABLE `servicesets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tempbills`
--
ALTER TABLE `tempbills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `concessionaires`
--
ALTER TABLE `concessionaires`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `monthlybills`
--
ALTER TABLE `monthlybills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `servicelimits`
--
ALTER TABLE `servicelimits`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `servicesets`
--
ALTER TABLE `servicesets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tempbills`
--
ALTER TABLE `tempbills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
