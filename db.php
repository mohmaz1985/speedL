-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 17, 2017 at 04:41 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `speedLinkDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1507278291),
('m130524_201442_init', 1507278304);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `titleEN` varchar(255) NOT NULL,
  `titleAR` varchar(255) NOT NULL,
  `modelName` varchar(255) NOT NULL,
  `modelTableName` varchar(255) NOT NULL,
  `dataPerPageEN` int(11) NOT NULL,
  `dataPerPageAR` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT 'active=>1,delete=>2',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `titleEN`, `titleAR`, `modelName`, `modelTableName`, `dataPerPageEN`, `dataPerPageAR`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'Settings', 'Settings', 'Settings', 'settings', 1, 3, 1, 1508079125, 1, 0, 0),
(2, 'Users Management', 'ادارة المستخدمين', 'UsersManagement', 'uesr', 1, 3, 1, 1508079988, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jobTitle` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(355) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(3) NOT NULL COMMENT 'admin=>201,user=>202,me=>203',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `firstName`, `lastName`, `jobTitle`, `image`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `type`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
(1, 'mohammad', 'Mohammad', 'Alsayyed', 'Web Development', 'uploadFile/userImage/mohammad_2017_10_14_09_10_47.jpg', 'LyUEvj-7uhwpEfgcvL_agLyy-3iGZdGY', '$2y$13$5bTR7XOmcm5wZwWIKs2YY.PMiPTBrXilDUq0HWAEiI2LUypul7sQW', NULL, 'mohmaz1985@yahoo.com', 203, 101, 1507962784, 0, 1508088390, 1),
(2, 'zaid', 'Zaid', 'Alsayyed', 'Account', 'uploadFile/userImage/zaid_2017_10_14_10_10_34.jpg', 'dj4RQk-KOEjeTQeskTTR-v1HLWz1Lf5G', '$2y$13$xSoeSS2F7YrNkSu4VLnaGOGtMLZfbW.jmEvtR58fXVhxDNJOcxI7O', NULL, 'zaid@yahoo.com', 202, 101, 1507962842, 1, 1508081205, 1),
(6, 'zaid33', 'tt', 'tttttt', 'ttt', '', 'l1uCife1wEpLUmTCaDGaxTQk4bUmi-zj', '$2y$13$TyhkdMEHuSgffqkMXGLOoOclY80c7/RJMB5l1FaPDDTQmri3sGoCW', NULL, 'ttt@t.com', 201, 101, 1508086578, 1, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;