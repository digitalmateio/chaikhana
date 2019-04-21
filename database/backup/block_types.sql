-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 11, 2019 at 03:21 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaikhana`
--

-- --------------------------------------------------------

--
-- Table structure for table `block_types`
--

CREATE TABLE `block_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fields` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `block_types`
--

INSERT INTO `block_types` (`id`, `deleted_at`, `created_at`, `updated_at`, `type`, `fields`) VALUES
(1, '2019-04-04 06:05:41', '2019-04-04 06:05:41', '2019-04-04 06:05:41', 'thumbnail', '[]'),
(2, '2019-04-04 06:06:18', '2019-04-04 06:06:18', '2019-04-04 06:06:18', 'audio', '[]'),
(3, NULL, '2019-04-04 06:07:07', '2019-04-04 06:07:07', 'text', '[\"title\",\"caption\", \"sub_caption\", \"text\"]'),
(4, NULL, '2019-04-04 06:07:20', '2019-04-04 06:07:20', 'photo', '[\"title\",\"caption\",\"caption_align\",\"source\",\"infobox_type\",\"media_type\"]'),
(5, NULL, '2019-04-04 06:07:38', '2019-04-04 06:07:38', 'video', '[]'),
(6, NULL, '2019-04-04 06:07:57', '2019-04-04 06:07:57', 'slideshow', '[]'),
(7, NULL, '2019-04-04 06:08:36', '2019-04-04 06:08:36', 'sight photo + description', '[]'),
(8, NULL, '2019-04-04 06:09:07', '2019-04-04 06:09:07', '360 photo', '[]'),
(9, NULL, '2019-04-04 06:17:15', '2019-04-04 06:17:15', 'infographic', '[\"title\",\"caption\",\"description\",\"dataset_url\",\"subtype\",\"dynamic_url\",\"dynamic_code\"]'),
(12, NULL, '2019-04-04 06:24:41', '2019-04-04 06:24:41', 'embed media', '[\"title\" ,\"url\" ,\"code\"]'),
(13, NULL, '2019-04-04 06:25:07', '2019-04-04 06:25:07', 'youtube video', '[]'),
(14, NULL, '2019-04-04 06:26:01', '2019-04-04 06:26:01', 'paralax', '[]'),
(15, NULL, '2019-04-04 06:26:52', '2019-04-04 06:26:52', 'three  image', '[]');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `block_types`
--
ALTER TABLE `block_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `block_types`
--
ALTER TABLE `block_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
