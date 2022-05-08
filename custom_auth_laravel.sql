-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2021 at 03:20 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `custom_auth_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `followers` int(11) NOT NULL DEFAULT 0,
  `following` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `followers`, `following`, `created_at`, `updated_at`) VALUES
(1, 'yordanmilchev', '1@abv.bg', '$2y$10$nG.65Q5VQcd8LFEedX0nT.ry2RJ4BUq./CiAvV0LBbyDbOtOnX9qi', 2, 3, '2021-08-22 06:52:40', '2021-08-24 10:16:54'),
(2, 'Ivan Ivanov', '2@abv.bg', '$2y$10$SydwbjyynTu78bF0CV7Z5OCB1N8alkc2CQPkwROwB4qOUXyr4b1v6', 1, 2, '2021-08-22 06:53:01', '2021-08-24 10:12:35'),
(3, 'Penko Penkov', '3@abv.bg', '$2y$10$rFW5CJ1.uTsaIKoPkLb2LeVEusW9GrHo284BHQs50nOzmVzWHRmp.', 2, 1, '2021-08-22 06:53:14', '2021-08-22 07:34:54'),
(4, 'testing123', '4@abv.bg', '$2y$10$lWX2j7q09jNMT6Z8TUTanekT/xV6tXtKbPm1QT9NlhJFxvfZUaYyK', 3, 2, '2021-08-22 06:53:48', '2021-08-23 18:32:27'),
(5, 'RealG', 'realg@abv.bg', '$2y$10$Kl55P7c5pKubUoZq58/rHOmnCVsOd7KBqEeUFYSANPjiZ3eWqfyWe', 4, 4, '2021-08-22 06:53:59', '2021-08-24 06:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pic_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userid`, `comment`, `pic_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'Wow I\'ve been there', 17, '2021-08-22 07:22:28', '2021-08-22 07:22:28'),
(2, 3, 'Top', 8, '2021-08-22 07:31:33', '2021-08-22 07:31:33'),
(3, 1, 'vui', 35, '2021-08-23 11:14:25', '2021-08-23 11:14:25'),
(5, 1, 'bechi', 9, '2021-08-23 17:54:35', '2021-08-23 17:54:35'),
(6, 1, 'palma a', 11, '2021-08-23 17:55:52', '2021-08-23 17:55:52'),
(7, 1, 'post', 8, '2021-08-23 17:57:33', '2021-08-23 17:57:33'),
(8, 1, 'nice a', 28, '2021-08-23 17:58:16', '2021-08-23 17:58:16'),
(9, 1, 'yes', 29, '2021-08-23 18:13:01', '2021-08-23 18:13:01'),
(10, 1, '<3', 27, '2021-08-23 18:30:32', '2021-08-23 18:30:32'),
(11, 1, 'party yes', 8, '2021-08-23 18:31:12', '2021-08-23 18:31:12'),
(12, 1, 'party yes', 23, '2021-08-23 18:31:25', '2021-08-23 18:31:25'),
(13, 1, 'a ko stana sq', 22, '2021-08-23 18:32:14', '2021-08-23 18:32:14'),
(14, 1, 'oki', 9, '2021-08-24 06:19:52', '2021-08-24 06:19:52'),
(15, 1, 'yes', 32, '2021-08-24 10:09:20', '2021-08-24 10:09:20'),
(16, 1, ':D', 35, '2021-08-24 10:14:24', '2021-08-24 10:14:24');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follows`
--

CREATE TABLE `follows` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` int(11) NOT NULL,
  `follow` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follows`
--

INSERT INTO `follows` (`id`, `userid`, `follow`, `created_at`, `updated_at`) VALUES
(1, 5, 1, '2021-08-22 07:21:07', '2021-08-22 07:21:07'),
(2, 5, 4, '2021-08-22 07:21:15', '2021-08-22 07:21:15'),
(5, 1, 3, '2021-08-22 07:22:57', '2021-08-22 07:22:57'),
(6, 2, 4, '2021-08-22 07:26:43', '2021-08-22 07:26:43'),
(7, 2, 5, '2021-08-22 07:32:18', '2021-08-22 07:32:18'),
(8, 5, 2, '2021-08-22 07:32:56', '2021-08-22 07:32:56'),
(9, 5, 3, '2021-08-22 07:33:07', '2021-08-22 07:33:07'),
(10, 4, 5, '2021-08-22 07:33:52', '2021-08-22 07:33:52'),
(11, 4, 1, '2021-08-22 07:34:12', '2021-08-22 07:34:12'),
(12, 3, 5, '2021-08-22 07:34:54', '2021-08-22 07:34:54'),
(35, 1, 4, '2021-08-23 18:32:27', '2021-08-23 18:32:27'),
(36, 1, 5, '2021-08-24 06:20:01', '2021-08-24 06:20:01');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int(255) NOT NULL,
  `profile_pic_id` int(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `description`, `image`, `userid`, `profile_pic_id`, `created_at`, `updated_at`) VALUES
(6, NULL, '1629626065.jpg', 1, 1, '2021-08-22 06:54:25', '2021-08-22 06:54:25'),
(8, 'Sea Path', '1629626534.jpg', 1, NULL, '2021-08-22 07:02:14', '2021-08-22 07:02:14'),
(9, 'Me ;P', '1629626550.jpg', 1, NULL, '2021-08-22 07:02:30', '2021-08-22 07:02:30'),
(10, 'Night out', '1629626566.jpg', 1, NULL, '2021-08-22 07:02:46', '2021-08-22 07:02:46'),
(11, 'The sky I see', '1629626621.jpg', 1, NULL, '2021-08-22 07:03:41', '2021-08-22 07:03:41'),
(12, NULL, '1629626709.jpg', 2, 2, '2021-08-22 07:05:09', '2021-08-22 07:05:09'),
(13, 'Cooking', '1629626724.jpg', 2, NULL, '2021-08-22 07:05:24', '2021-08-22 07:05:24'),
(14, 'roadtrip', '1629626742.jpg', 2, NULL, '2021-08-22 07:05:42', '2021-08-22 07:05:42'),
(15, 'Brid view', '1629626769.jpg', 2, NULL, '2021-08-22 07:06:09', '2021-08-22 07:06:09'),
(16, NULL, '1629626921.jpg', 3, 3, '2021-08-22 07:08:41', '2021-08-22 07:08:41'),
(17, 'Beaching', '1629626947.jpg', 3, NULL, '2021-08-22 07:09:07', '2021-08-22 07:09:07'),
(18, 'Beach x2', '1629627000.jpg', 3, NULL, '2021-08-22 07:10:00', '2021-08-22 07:10:00'),
(19, 'Food <3', '1629627036.jpg', 3, NULL, '2021-08-22 07:10:36', '2021-08-22 07:10:36'),
(20, 'Amazing post', '1629627087.jpg', 3, NULL, '2021-08-22 07:11:27', '2021-08-22 07:11:27'),
(21, NULL, '1629627125.jpg', 4, 4, '2021-08-22 07:12:05', '2021-08-22 07:12:05'),
(22, 'Budd', '1629627148.jpg', 4, NULL, '2021-08-22 07:12:28', '2021-08-22 07:12:28'),
(23, 'Budd X2', '1629627299.jpg', 4, NULL, '2021-08-22 07:14:59', '2021-08-22 07:14:59'),
(24, 'Bud x3', '1629627321.jpg', 4, NULL, '2021-08-22 07:15:21', '2021-08-22 07:15:21'),
(25, 'Budd x4', '1629627395.jpg', 4, NULL, '2021-08-22 07:16:35', '2021-08-22 07:16:35'),
(26, NULL, '1629627483.jpg', 5, 5, '2021-08-22 07:18:03', '2021-08-22 07:18:03'),
(27, 'Trip', '1629627517.jpg', 5, NULL, '2021-08-22 07:18:37', '2021-08-22 07:18:37'),
(28, 'My room', '1629627534.jpg', 5, NULL, '2021-08-22 07:18:54', '2021-08-22 07:18:54'),
(29, 'View from my room', '1629627559.jpg', 5, NULL, '2021-08-22 07:19:20', '2021-08-22 07:19:20'),
(30, 'THE waterfall', '1629627609.jpg', 5, NULL, '2021-08-22 07:20:09', '2021-08-22 07:20:09'),
(31, 'Wow', '1629627647.jpg', 5, NULL, '2021-08-22 07:20:47', '2021-08-22 07:20:47'),
(32, 'dji photo', '1629627859.jpg', 5, NULL, '2021-08-22 07:24:19', '2021-08-22 07:24:19'),
(33, 'Xps', '1629627892.jpg', 2, NULL, '2021-08-22 07:24:52', '2021-08-22 07:24:52'),
(34, 'Xps x2', '1629627914.jpg', 2, NULL, '2021-08-22 07:25:14', '2021-08-22 07:25:14'),
(35, 'Sup', '1629628066.jpg', 5, NULL, '2021-08-22 07:27:46', '2021-08-22 07:27:46'),
(36, 'Hey', '1629628073.jpg', 5, NULL, '2021-08-22 07:27:53', '2021-08-22 07:27:53'),
(37, 'mmm', '1629628174.jpg', 3, NULL, '2021-08-22 07:29:34', '2021-08-22 07:29:34'),
(39, 'mood', '1629810818.jpg', 1, NULL, '2021-08-24 10:13:38', '2021-08-24 10:13:38');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_07_13_101810_create_admins_table', 1),
(5, '2021_07_18_134512_create_images_table', 1),
(6, '2021_08_14_172835_create_follows_table', 2),
(7, '2021_08_19_083100_create_comments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `follows`
--
ALTER TABLE `follows`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follows`
--
ALTER TABLE `follows`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
