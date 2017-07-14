-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2017 at 09:05 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gallary`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallaries`
--

CREATE TABLE `gallaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `privacy` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallaries`
--

INSERT INTO `gallaries` (`id`, `name`, `description`, `cover_image`, `user_id`, `privacy`, `created_at`, `updated_at`) VALUES
(8, 'Bird Gallary', 'This gallary is  for bird pictures.', 'folder.jpg', 1, 1, '2017-07-14 12:44:31', '2017-07-14 12:44:31'),
(9, 'Flower Gallary', 'This gallary is  for flower pictures.', 'folder.jpg', 1, 0, '2017-07-14 12:49:11', '2017-07-14 12:49:11'),
(10, 'Third Gallary', 'This is third gallary', 'folder.jpg', 1, 1, '2017-07-14 12:51:42', '2017-07-14 12:51:42'),
(11, 'Book Gallary', 'This gallary is  for book pictures.', '14.jpg', 1, 1, '2017-07-14 12:52:26', '2017-07-14 12:52:26'),
(12, 'Fourth Gallary', 'sample gallary', '4.jpg', 1, 1, '2017-07-14 12:53:09', '2017-07-14 12:53:09'),
(13, 'Fifth Gallary', 'sample gallary', 'Happy New Year 2017 Animated Wallpapers.gif', 1, 1, '2017-07-14 12:54:19', '2017-07-14 12:54:19'),
(14, 'Sixth Gallary', 'sample gallary', 'rocket.jpg', 1, 1, '2017-07-14 12:54:51', '2017-07-14 12:54:51'),
(15, 'Eighth Gallary', 'sample gallary', 'switch.png', 1, 1, '2017-07-14 12:55:28', '2017-07-14 12:55:28'),
(16, 'Ninth Gallary', 'sample gallary', 'asp.PNG', 1, 1, '2017-07-14 12:56:08', '2017-07-14 12:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '2014_10_12_000000_create_users_table', 1),
(11, '2014_10_12_100000_create_password_resets_table', 1),
(12, '2017_05_15_091703_create_gallary_table', 1),
(13, '2017_05_15_091729_create_photo_table', 1),
(14, '2017_05_16_121219_create_tags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(10) UNSIGNED NOT NULL,
  `gallary_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `privacy` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `gallary_id`, `title`, `description`, `location`, `image`, `tag`, `privacy`, `user_id`, `created_at`, `updated_at`) VALUES
(23, 8, 'First Bird', 'This is first bird', 'Rangamati', '6.jpg', 'bird', 1, 1, '2017-07-14 12:46:11', '2017-07-14 12:46:11'),
(24, 8, 'Second bird', 'Sample bird', 'Rangamati', '7.jpg', 'bird', 1, 1, '2017-07-14 12:47:16', '2017-07-14 12:47:16'),
(25, 8, 'Third bird', 'Sample bird', 'Rangamati', '8.jpg', 'bird', 1, 1, '2017-07-14 12:47:36', '2017-07-14 12:47:36'),
(26, 8, 'Fourth Bird', 'Sample bird', 'Dhaka', '10.jpg', 'bird', 1, 1, '2017-07-14 12:48:07', '2017-07-14 12:48:07'),
(27, 8, 'Fifth bird', 'Sample bird', 'Rangamati', '9.jpg', 'bird', 1, 1, '2017-07-14 12:48:31', '2017-07-14 12:48:31'),
(28, 9, 'First flower', 'Sample flower', 'Dinajpur', '1.jpg', 'flower', 0, 1, '2017-07-14 12:49:50', '2017-07-14 12:49:50'),
(29, 9, 'Second flower', 'Sample flower', 'Dhaka', '2.jpg', 'flower', 0, 1, '2017-07-14 12:50:15', '2017-07-14 12:50:15'),
(30, 9, 'Third flower', 'Sample flower', 'Dinajpur', '3.jpg', 'flower', 0, 1, '2017-07-14 12:50:52', '2017-07-14 12:50:52'),
(31, 13, 'First Photo', 'Sample flower', 'Rangamati', '3.jpg', 'flower', 1, 1, '2017-07-14 12:57:07', '2017-07-14 12:57:07');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'No tag',
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `tag`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'flower', 1, '2017-05-16 06:24:12', '2017-05-16 06:24:12'),
(2, 'bird', 1, '2017-05-16 06:25:19', '2017-05-16 06:25:19'),
(3, 'Man', 1, '2017-05-16 11:22:54', '2017-05-16 11:22:54'),
(4, 'Women', 1, '2017-05-16 11:23:01', '2017-05-16 11:23:01'),
(5, 'girl', 1, '2017-05-16 11:23:07', '2017-05-16 11:23:07'),
(6, 'flower', 1, '2017-05-17 06:54:04', '2017-05-17 06:54:04'),
(7, 'nice', 2, '2017-05-17 08:55:55', '2017-05-17 08:55:55'),
(8, 'beauty', 2, '2017-05-17 08:56:01', '2017-05-17 08:56:01'),
(9, 'lovely', 2, '2017-05-17 08:56:08', '2017-05-17 08:56:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Smk Pobon', 'smk@gmail.com', '$2y$10$Yp6kKLK6VdLcqvsnsOhUAOPkxE89Zi0NfwbidCLA9F5Btxyxl0zAK', 'VGPtDZDuJpe95O6vy46JQYdOgSn4gQVDKosSV85Cv8m6mWKCZvPDSorRMvDO', '2017-05-16 06:16:35', '2017-05-16 06:16:35'),
(2, 'karim', 's@gmail.com', '$2y$10$BrIvw3dZFntVlkG4RlElg..9lTHCFoHBOdjlFBG5WlmXBHJJ0JIp2', 'CQXQ41CVryPjE6HgzlO7KWW4qe6XjXieTZ1BvDZMjpXtglH2cCgcu4BLa3RP', '2017-05-16 11:37:53', '2017-05-16 11:37:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallaries`
--
ALTER TABLE `gallaries`
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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `gallaries`
--
ALTER TABLE `gallaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
