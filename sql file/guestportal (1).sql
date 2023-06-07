-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 11:52 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guestportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dname` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dname`, `created_at`, `updated_at`) VALUES
(1, 'Social Science', NULL, NULL),
(2, 'Art and Drama', NULL, NULL),
(3, 'IT Department\r\n', NULL, NULL),
(4, 'Other', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_05_23_073313_create_visitors_table', 1),
(7, '2023_05_23_074451_create_purposes_table', 1),
(8, '2023_05_23_074520_create_departments_table', 1),
(9, '2023_05_25_074523_create_visits_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purposes`
--

CREATE TABLE `purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hammad', 'hammadbukhari4252@gmail.com', NULL, '$2y$10$yJpqJNvbzq4o9lClHIptsuGL31afBMVn01TkJc6dv/HK0kyO.aX6u', NULL, '2023-05-29 16:36:01', '2023-05-29 16:36:01');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `numofvisit` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) DEFAULT NULL,
  `fathername` varchar(255) DEFAULT NULL,
  `cnic` varchar(255) DEFAULT NULL,
  `yearofadmission` int(11) DEFAULT NULL,
  `yearofgraduation` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `role`, `numofvisit`, `name`, `fathername`, `cnic`, `yearofadmission`, `yearofgraduation`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 'currentstudent', 0, 'Hammad', 'Abid Shah', '38403-5967597-1', 2022, 0, 'satisfied', '1684920647.webp', '2023-05-24 16:30:47', '2023-05-24 16:30:47'),
(2, 'guest', 0, 'unreal', 'real', '38403-5897598-1', 2000, 2022, 'satisfied', NULL, '2023-05-24 16:32:35', '2023-05-24 16:32:35'),
(4, 'exstudent', 0, 'john Doe', 'real', '38403-5897598-2', 546, 2022, 'blacklist', NULL, '2023-05-24 18:34:15', '2023-05-24 18:34:15'),
(5, 'exstudent', 0, 'Henny Caber', 'real', '38403-5897598-3', 45, 2020, 'satisfied', NULL, '2023-05-24 18:34:15', '2023-05-24 18:34:15'),
(6, 'exstudent', 0, 'Steve', 'real', '38403-5897598-4', 5, 2021, 'blacklist', NULL, '2023-05-24 18:34:15', '2023-05-24 18:34:15'),
(7, 'exstudent', 0, 'Adam W', 'real', '38403-5897598-5', 45, 1992, 'satisfied', NULL, '2023-05-24 18:34:15', '2023-05-24 18:34:15'),
(8, 'exstudent', 0, 'Tom ', 'real', '38403-5897598-6', 45, 1999, 'satisfied', NULL, '2023-05-24 18:34:15', '2023-05-24 18:34:15'),
(9, 'guest', 0, 'Hammad', 'Abid Shah', '55555-5555555-5', NULL, NULL, 'satisfied', '1684998264.webp', '2023-05-25 14:04:24', '2023-05-25 14:04:24'),
(10, 'guest', 0, 'shaq', 'Abid Shah', '43543-5435435-4', NULL, NULL, 'satisfied', '1684998631.webp', '2023-05-25 14:10:31', '2023-05-25 14:10:31'),
(11, 'currentstudent', 0, 'ewr', 'Abid Shah', '67575-6757567-5', 2022, 0, 'satisfied', '1684998711.webp', '2023-05-25 14:11:51', '2023-05-25 14:11:51'),
(12, 'currentstudent', 0, 'Hammad', 'Abid Shah', '45645-6546456-_', 2022, 0, 'satisfied', '1684998980.jpg', '2023-05-25 14:16:20', '2023-05-25 14:16:20'),
(13, 'currentstudent', 0, 'Hammadwerwe', 'Abid Shah', '54887-7877987-9', 2022, 0, 'satisfied', '1684999190.jpg', '2023-05-25 14:19:50', '2023-05-25 14:19:50'),
(14, 'guest', 0, 'Hammad', 'Abid Shah', '99999-9999999-9', NULL, NULL, 'satisfied', '1684999387.webp', '2023-05-25 14:23:07', '2023-05-25 14:23:07'),
(15, 'currentstudent', 0, 'Hammad', 'Abid Shah', '48424-9865784-9', 447, 0, 'satisfied', '1684999512.jpg', '2023-05-25 14:25:12', '2023-05-25 14:25:12'),
(16, 'exstudent', 0, 'wsd', 'Abid Shah', '65489-8487754-8', 2022, 234234, 'satisfied', NULL, '2023-05-25 14:33:09', '2023-05-25 14:33:09'),
(17, 'exstudent', 0, 'Hammadrwer', 'Abid Shah', '65465-4654654-5', 2022, 0, 'satisfied', NULL, '2023-05-25 14:34:04', '2023-05-25 14:34:04'),
(18, 'guest', 0, 'Hammadwe', 'Abid Shah', '65545-4654654-4', NULL, NULL, 'satisfied', '1685001661.webp', '2023-05-25 15:01:01', '2023-05-25 15:01:01'),
(19, 'guest', 0, 'Hammade', 'Abid Shah', '59989-8546546-5', NULL, NULL, 'satisfied', NULL, '2023-05-25 16:39:30', '2023-05-25 16:39:30'),
(20, 'guest', 0, 'Hammadww', 'Abid Shah', '54654-8217777-8', NULL, NULL, 'satisfied', NULL, '2023-05-25 16:41:02', '2023-05-25 16:41:02'),
(21, 'currentstudent', 0, 'Hammadsdwae', 'Abid Shah', '38406-4548784-5', 2018, 0, 'satisfied', '1685013205.png', '2023-05-25 18:13:25', '2023-05-25 18:13:25'),
(22, 'guest', 0, 'unreal', 'real', '38403-5897598-1', 2000, 2022, 'satisfied', NULL, '2023-05-25 18:23:55', '2023-05-25 18:23:55'),
(23, 'exstudent', 0, 'john Doe', 'real', '38403-5897598-2', 546, 2022, 'blacklist', NULL, '2023-05-25 18:23:55', '2023-05-25 18:23:55'),
(24, 'exstudent', 0, 'Henny Caber', 'real', '38403-5897598-3', 45, 2020, 'satisfied', NULL, '2023-05-25 18:23:55', '2023-05-25 18:23:55'),
(25, 'exstudent', 0, 'Steve', 'real', '38403-5897598-4', 5, 2021, 'blacklist', NULL, '2023-05-25 18:23:55', '2023-05-25 18:23:55'),
(26, 'exstudent', 0, 'Adam W', 'real', '38403-5897598-5', 45, 1992, 'satisfied', NULL, '2023-05-25 18:23:55', '2023-05-25 18:23:55'),
(27, 'exstudent', 0, 'Tom ', 'real', '38403-5897598-6', 45, 1999, 'satisfied', NULL, '2023-05-25 18:23:55', '2023-05-25 18:23:55'),
(28, 'guest', 0, 'Hammad', 'Abid Shah', '58725-4979946-5', NULL, NULL, 'satisfied', NULL, '2023-05-26 10:56:37', '2023-05-26 10:56:37'),
(29, 'exstudent', 0, 'Hammad', 'Abid Shah', '77777-7777743-3', 2022, NULL, 'satisfied', NULL, '2023-05-26 10:57:16', '2023-05-26 10:57:16'),
(30, 'vendor', 0, 'Hammad', 'Abid Shah', '98798-7899798-7', NULL, NULL, 'satisfied', NULL, '2023-05-26 10:59:39', '2023-05-26 10:59:39'),
(31, 'exstudent', 0, 'Hammad', 'Abid Shah', '23423-4234234-2', 2022, 0, 'satisfied', NULL, '2023-05-26 11:01:20', '2023-05-26 11:01:20'),
(32, 'vendor', 0, 'Hammad', 'Abid Shah', '98237-3243524-5', NULL, NULL, 'satisfied', NULL, '2023-05-26 11:06:41', '2023-05-26 11:06:41'),
(33, 'guest', 0, 'Hammad', 'Abid Shah', '38403-5967597-5', NULL, NULL, 'satisfied', NULL, '2023-05-26 13:46:04', '2023-05-26 13:46:04'),
(34, 'guest', 0, 'unreal', 'real', '38403-5897598-1', 2000, 2022, 'satisfied', NULL, '2023-05-26 13:51:49', '2023-05-26 13:51:49'),
(35, 'exstudent', 0, 'john Doe', 'real', '38403-5897598-2', 546, 2022, 'blacklist', NULL, '2023-05-26 13:51:49', '2023-05-26 13:51:49'),
(36, 'exstudent', 0, 'Henny Caber', 'real', '38403-5897598-3', 45, 2020, 'satisfied', NULL, '2023-05-26 13:51:49', '2023-05-26 13:51:49'),
(37, 'exstudent', 0, 'Steve', 'real', '38403-5897598-4', 5, 2021, 'blacklist', NULL, '2023-05-26 13:51:49', '2023-05-26 13:51:49'),
(38, 'exstudent', 0, 'Adam W', 'real', '38403-5897598-5', 45, 1992, 'satisfied', NULL, '2023-05-26 13:51:49', '2023-05-26 13:51:49'),
(39, 'exstudent', 0, 'Tom ', 'real', '38403-5897598-6', 45, 1999, 'satisfied', NULL, '2023-05-26 13:51:49', '2023-05-26 13:51:49'),
(40, 'exstudent', 0, 'Arslan', 'Aslam', '12121-2121212-1', 2022, 2025, 'satisfied', NULL, '2023-05-29 11:42:09', '2023-05-29 11:42:09'),
(41, 'currentstudent', 0, 'Huzaifa', 'Yaman', '78787-8787878-7', 2022, 0, 'satisfied', '1685335427.webp', '2023-05-29 11:43:47', '2023-05-29 11:43:47'),
(42, 'exstudent', 0, 'Awais', 'Aslam', '89898-9898989-8', 2022, 78548, 'blacklist', '1685344912.jpg', '2023-05-29 14:21:52', '2023-05-29 14:21:52'),
(43, 'guest', 0, 'Rohan Aslam', 'Abid Shah', '89898-9898989-7', 2018, 0, 'satisfied', NULL, '2023-05-29 14:25:27', '2023-05-29 14:25:27');

-- --------------------------------------------------------

--
-- Table structure for table `visits`
--

CREATE TABLE `visits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_cnic` varchar(255) DEFAULT NULL,
  `purpose` varchar(1000) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `gueststatus` varchar(30) DEFAULT 'in',
  `out` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits`
--

INSERT INTO `visits` (`id`, `user_cnic`, `purpose`, `department`, `gueststatus`, `out`, `created_at`, `updated_at`) VALUES
(1, '54654-8217777-8', 'khhkjjkhjk', '3', 'out', '2023-05-12 05:12:47', '2023-05-25 16:41:02', '2023-05-25 16:41:02'),
(2, '55585-5958579-1', 'truuytuytu', '2', 'out', '2023-05-19 05:12:50', '2023-05-25 17:36:57', '2023-05-25 17:36:57'),
(3, '38403-5967597-1', 'xzczxczxc', '3', 'out', '2023-05-03 05:12:54', '2023-05-25 17:39:07', '2023-05-25 17:39:07'),
(4, '38403-5967597-1', 'xzczxczxc', '3', 'out', '2023-05-18 05:13:00', '2023-05-25 17:39:26', '2023-05-25 17:39:26'),
(5, '38403-5967597-1', 'Try another users', '4', 'out', '2023-05-12 05:12:58', '2023-05-25 18:09:25', '2023-05-25 18:09:25'),
(6, '38403-5967597-1', 'Graduated', '2', 'out', '2023-05-25 05:13:03', '2023-05-26 10:53:50', '2023-05-26 10:53:50'),
(14, '98237-3243524-5', 'Hello', '1', 'out', '2023-05-11 05:12:56', '2023-05-26 11:06:19', '2023-05-26 11:06:19'),
(15, '98237-3243524-5', 'Hello', '1', 'out', '2023-05-11 05:13:05', '2023-05-26 11:06:40', '2023-05-26 11:06:40'),
(16, '38403-5967597-1', 'Just here to visit sir for the final semester', '2', 'out', '2023-05-10 05:13:08', '2023-05-26 11:23:44', '2023-05-26 11:23:44'),
(20, '38403-5967597-1', 'Meet bakir raza for the final thesis', '2', 'out', '2023-05-26 13:52:25', '2023-05-26 13:50:49', '2023-05-26 13:52:25'),
(23, '12121-2121212-1', 'I want  to meet sir qasim to ask a query about the portal', '3', 'out', '2023-05-29 11:48:13', '2023-05-29 11:42:09', '2023-05-29 11:48:13'),
(24, '12121-2121212-1', 'Here to meet sir qasim again to meet the deadline of the portal', '4', 'out', '2023-05-29 11:44:12', '2023-05-29 11:43:06', '2023-05-29 11:44:12'),
(25, '89898-9898989-8', 'HEllo', '3', 'out', '2023-05-29 14:26:54', '2023-05-29 14:22:25', '2023-05-29 14:26:54'),
(26, '89898-9898989-8', 'fajshdfjhsdfuhsdf', '3', 'out', '2023-05-29 14:26:53', '2023-05-29 14:22:37', '2023-05-29 14:26:53'),
(27, '89898-9898989-7', 'sdsadsadsadsad', '2', 'in', NULL, '2023-05-29 14:25:27', '2023-05-29 14:25:27'),
(28, '89898-9898989-7', 'sdhfdsjafsdf', '3', 'out', '2023-05-29 14:26:56', '2023-05-29 14:26:06', '2023-05-29 14:26:56'),
(29, '89898-9898989-7', NULL, '1', 'out', '2023-05-29 14:26:55', '2023-05-29 14:26:40', '2023-05-29 14:26:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `purposes`
--
ALTER TABLE `purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visits`
--
ALTER TABLE `visits`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purposes`
--
ALTER TABLE `purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `visits`
--
ALTER TABLE `visits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
