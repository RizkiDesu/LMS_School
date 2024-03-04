-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 04, 2024 at 09:50 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school.com`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_by` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Leaguage', 0, 0, 1, '2024-02-19 03:25:06', '2024-02-20 07:43:24'),
(2, 'B INDO', 0, 1, 1, '2024-02-19 03:53:41', '2024-02-19 04:23:35'),
(3, 'LARA TELEGRAM', 1, 1, 16, '2024-02-19 03:55:12', '2024-02-19 04:23:27'),
(4, 'TIK', 0, 0, 1, '2024-02-19 04:23:40', '2024-02-19 04:23:40'),
(5, 'part time', 0, 0, 1, '2024-02-19 04:30:36', '2024-02-23 17:55:44'),
(6, 'Full Time', 0, 0, 1, '2024-02-24 01:35:13', '2024-02-24 01:35:24');

-- --------------------------------------------------------

--
-- Table structure for table `class_subject`
--

CREATE TABLE `class_subject` (
  `id` bigint UNSIGNED NOT NULL,
  `class_id` int NOT NULL,
  `subject_id` int NOT NULL,
  `created_by` int NOT NULL,
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_subject`
--

INSERT INTO `class_subject` (`id`, `class_id`, `subject_id`, `created_by`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, 0, '2024-02-20 07:41:49', '2024-02-23 18:59:55'),
(2, 5, 4, 1, 0, 0, '2024-02-20 07:41:49', '2024-02-20 07:41:49'),
(3, 5, 2, 1, 0, 0, '2024-02-20 07:41:49', '2024-02-20 07:41:49'),
(4, 4, 7, 1, 0, 0, '2024-02-20 07:41:49', '2024-02-23 18:59:29'),
(14, 4, 1, 1, 0, 1, '2024-02-23 18:43:28', '2024-02-23 18:43:28'),
(16, 1, 4, 1, 0, 1, '2024-02-23 18:47:15', '2024-02-23 18:47:15'),
(17, 5, 6, 1, 0, 1, '2024-02-23 18:47:15', '2024-02-23 18:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_19_085359_create_class_table', 2),
(6, '2024_02_19_144219_create_subject_table', 3),
(7, '2024_02_20_034302_create_class_subject_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `name`, `type`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'AGRIC SCINCE', 'theory', 1, 0, 0, '2024-02-19 21:04:22', '2024-02-19 21:04:22'),
(2, 'BASIC TECNOLOGY', 'theory', 1, 0, 0, '2024-02-19 21:04:40', '2024-02-19 21:04:40'),
(3, 'HOME ECONOMIC', 'theory', 1, 0, 0, '2024-02-19 21:04:56', '2024-02-19 21:04:56'),
(4, 'BASIC SCIENCE AND TECNOLOGY', 'theory', 1, 0, 0, '2024-02-19 21:05:42', '2024-02-19 21:05:42'),
(5, 'SOCIAL STUDIES', 'theory', 1, 0, 0, '2024-02-19 21:06:04', '2024-02-19 21:06:04'),
(6, 'ENGLISH LAGUAGE', 'theory', 1, 0, 0, '2024-02-19 21:06:18', '2024-02-19 21:06:18'),
(7, 'MATEMATIC', 'practical', 1, 0, 0, '2024-02-19 21:06:32', '2024-02-19 21:06:32'),
(8, 'part time', 'theory', 1, 0, 0, '2024-02-23 17:55:17', '2024-02-23 17:55:17');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `parent_id` int UNSIGNED DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_number` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `class_id` int DEFAULT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `caste` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_number` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `profile_pic` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_grup` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_type` tinyint DEFAULT NULL COMMENT '1: admin, 2: teacher, 3: studen, 4: parent',
  `is_delete` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0: not delete, 1:delete',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `parent_id`, `name`, `last_name`, `email`, `password`, `remember_token`, `admission_number`, `roll_number`, `class_id`, `gender`, `date_of_birth`, `caste`, `religion`, `mobile_number`, `admission_date`, `profile_pic`, `blood_grup`, `height`, `weight`, `occupation`, `address`, `user_type`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Rizki', '', 'admin@gmail.com', '$2y$12$SJQUCu24oeDJCzEopsjT3eGW3ilFTkckzbg/eK0o86yMt1hlWZZ8G', '0GenP60f0KCBf7rAvStbIwngZhCkx3qOrz20KqwYig6CooFkPSccbd7EQuQT', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-02-18 06:27:17', '2024-02-23 19:43:07'),
(2, NULL, 'pak supra', '', 'teacher@gmail.com', '$2y$12$SDgjKE6JQ8As7j9Le52yTu41Xf2R2RrFjkBVIxkAc5Yal5wfe8bEi', 'ot9vYXiqCiyx36fkOtVmSDf2OZFUk6Z89hJPJkZVrk1KiQvg9RxxKw5dL7bW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 0, 0, '2024-02-18 07:40:37', '2024-02-18 07:40:38'),
(3, NULL, 'noval', 'Utama Endriansyah', 'student@gmail.com', '$2y$12$wyRIwBj/PCeV1LDkpUAaaOD0hbB6zeQQbY35uZS.2OcpnIWvDIQBO', '5e3aThrfmaJhIWMB3XKInxMTWuQVIgFtZvteyVrDdMe2jnpxDCs8R84nVk23', '3123321', '', 6, 'Female', '2024-02-08', NULL, NULL, NULL, '2024-02-24', '20240224093611w4lqjqzg97tetw7kzjn6.png', NULL, NULL, NULL, NULL, NULL, 3, 0, 1, '2024-02-18 07:42:11', '2024-02-24 21:49:23'),
(4, NULL, 'pak budi', 'Jojo', 'parent@gmail.com', '$2y$12$SDgjKE6JQ8As7j9Le52yTu41Xf2R2RrFjkBVIxkAc5Yal5wfe8bEi', 'aBStJK1jUz7RHGmCQ1EpphgDB2MDHwS7dQDr6TrmGB5JlsJcsSpoOnqIFZlh', NULL, NULL, NULL, 'Male', NULL, NULL, NULL, '321435435646', NULL, '20240301030615e7sywd1gmbst3la7xou1.png', NULL, NULL, NULL, '', 'Desa Rejosari', 4, 0, 0, '2024-02-18 07:42:40', '2024-02-29 20:13:54'),
(5, NULL, 'supri adi', '', 'admin3@gmail.com', '$2y$12$i1F9rO42XOIL5JITBVtenOvluNMze.lvUkHdJ7W6LrpMPJEQQC2qG', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-18 07:01:28', '2024-02-19 01:50:04'),
(6, NULL, 'Rizki Putra Utama Endriansyah', '', 'admin5@gmail.com', '$2y$12$H2ukoFc1oNPk625bbOq8puKJV2EGXYbQVmKcPvEvT8uC24EGc8CrC', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-18 18:51:05', '2024-02-19 01:50:06'),
(7, NULL, 'Rizki Putra Utama Endriansyah', '', 'admin4@gmail.com', '$2y$12$BLUAF2r.a93g/spEAbEiVuGoH4lljOCfhIa74boP1Lety.5jalW9C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-18 18:51:22', '2024-02-19 01:50:07'),
(10, NULL, 'Rizki Putra Utama Endriansyah', '', 'admin2@gmail.com', '$2y$12$ztczUw1/5Y.hJaxftyPMSeWoN83mwnX71Kd20X.Qxl/Qibkokuzci', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-18 18:53:29', '2024-02-19 01:50:10'),
(12, NULL, 'aaa', '', 'admin45@gmail.com', '$2y$12$TvS56FNPO4k30wMsGx9ykORXD4g2ZGJx4UjdsVh2k8gGW1Ir0Gd8.', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-18 18:58:30', '2024-02-19 01:50:13'),
(14, NULL, 'aan', '', 'aan@gmail.com', '$2y$12$eUpBxr2hm7.0RFLQyJJJpeamg/3VrdcZ7vUcqb3WLMLga5RjjJ2Ue', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 0, '2024-02-18 19:01:53', '2024-02-19 01:50:12'),
(15, NULL, 'ADMIN', '', 'admin111@gmail.com', '$2y$12$pjyTkM2cG61EjCs3RKROr.Y3B898PzVPUc/.skPMdrrLtEj6dkV/q', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-02-18 19:22:50', '2024-02-19 03:54:14'),
(16, NULL, 'SUPRI', '', 'supri@gmail.com', '$2y$12$c9GCWdEpWx3R5t/hI4X6GOJ8b2nNNUeO5pZW6/ivvZC6ylNB0WyWS', '0HmsIhzyXREjrdbkYAukzsJAuHOgNWY44NpSjDFSknQUBYmuUe2YWk3CRNEd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-02-18 19:40:45', '2024-02-19 03:54:58'),
(17, NULL, 'ADMIN', '', 'alex@gmail.com', '$2y$12$f0wFGk25yDvt8hKDjf2HEOg9orG2wNyqtMrckvfssx8/tKIdCWR1G', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-02-18 19:46:00', '2024-02-19 07:31:50'),
(18, NULL, 'Rizki Putra Utama Endriansyah', '', 'ad@gmail.com', '$2y$12$h1fSsxkCabvcaq7RhEo1z.7cS7uL7tEnqYaYNU0k60n4suFgHpy7i', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, '2024-02-23 17:53:57', '2024-02-23 17:53:57'),
(25, NULL, 'supri', 'adi', 'solusidesu@gmail.com', '$2y$12$mACD9WLuYReZko7TwRR5L.TnzVl/BmLpbVIXiDNbp7.9bQOnCgq5K', NULL, '3123321', '3213213', 5, 'Male', '2024-02-24', '2323', 'indonesia', '085850663731', '2024-02-24', '20240224111550zithrn7blt6tkfnbdvxz.png', 'B', '212', '323', NULL, NULL, 3, 0, 0, '2024-02-24 00:37:25', '2024-02-24 04:16:00'),
(26, NULL, 'Rizki Putra', 'Utama Endriansyah', 'rizkissas@gmail.com', '$2y$12$KulV0zGTn2lohSpHoNpe.uPdn/e8dlm/DWBXwYEbpvNZlXxLlp99m', NULL, '3123321', '', 5, 'Male', '2024-02-16', NULL, 'indonesia', NULL, '2024-02-24', '20240224093440pqbnn2ucdnkx5wxt86hp.png', 'B', NULL, NULL, NULL, NULL, 3, 0, 0, '2024-02-24 00:43:28', '2024-02-24 04:15:16'),
(27, 28, 'ti', 'adi', 'ti@gmail.com', '$2y$12$/ND6SZ.DFhceip0tUtiqgOqBgNealFHcC8lS0eE6MWJbMmjMeV92i', NULL, '312', '3232', 1, 'Female', '2024-02-28', NULL, NULL, NULL, '2024-02-15', '20240226015755z8jjoi0ectv0eow3k5oh.png', NULL, NULL, NULL, NULL, NULL, 3, 0, 0, '2024-02-25 18:57:56', '2024-02-29 22:39:09'),
(28, NULL, 'Rizki', 'Utama', 'parent2@gmail.com', '$2y$12$yP.ysa0e/Ao.Ww7iONhio.kf9XphIB3l1SYt0pWcpgY4v9G3ag4na', NULL, NULL, NULL, NULL, 'Female', NULL, NULL, NULL, '321454536', NULL, '20240226030051ahus3bxvypzvbvcnamfu.png', NULL, NULL, NULL, 'dsadsdasd', 'Dusun Kutukan', 4, 0, 0, '2024-02-26 08:00:52', '2024-03-04 13:16:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_subject`
--
ALTER TABLE `class_subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
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
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `class_subject`
--
ALTER TABLE `class_subject`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
