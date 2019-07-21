-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 19, 2019 at 07:55 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `diagnostic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(22, '2019_06_03_104606_create_test_types_table', 1),
(23, '2019_06_03_183444_create_categories_table', 1),
(24, '2019_06_03_183803_create_phones_table', 1),
(25, '2019_06_03_185013_create_posts_table', 1),
(26, '2019_06_03_203632_create_prankers_table', 1),
(27, '2019_06_06_085212_create_tests_table', 1),
(28, '2019_06_06_090015_create_test_requests_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pranker_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pranker_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prankers`
--

CREATE TABLE `prankers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `test_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(8,2) NOT NULL,
  `test_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `test_name`, `fee`, `test_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Goodwin-Bosco', 533.00, 3, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(2, 'Leuschke, Stamm and Swift', 588.00, 5, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(3, 'Schmeler LLC', 564.00, 2, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(4, 'Pagac LLC', 530.00, 4, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(5, 'Shields-Roob', 505.00, 7, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(6, 'Huel-Kuhn', 580.00, 4, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(7, 'Zboncak and Sons', 536.00, 8, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(8, 'Sporer, Keeling and Jerde', 568.00, 6, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(9, 'Klein, Pagac and Ferry', 550.00, 1, '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(10, 'Lueilwitz Group', 556.00, 3, '2019-06-08 11:10:53', '2019-06-08 11:10:53');

-- --------------------------------------------------------

--
-- Table structure for table `test_requests`
--

CREATE TABLE `test_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `totalPayment` double(8,2) NOT NULL,
  `billNo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_requests`
--

INSERT INTO `test_requests` (`id`, `patient_name`, `birth_date`, `mobile_no`, `totalPayment`, `billNo`, `created_at`, `updated_at`) VALUES
(1, 'Silas Goyette V', '1977-06-03', '210-485-5544 x72200', 3300.00, '656.555.5295 x844', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(2, 'Graciela Braun', '1993-03-20', '1-374-232-9294', 3248.00, '941.878.0507', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(3, 'Frederik Boyle', '1995-12-18', '+16973518265', 3917.00, '(972) 710-0005', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(4, 'Wilfrid Yost', '1999-01-14', '+12836955759', 2116.00, '1-823-681-9420', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(5, 'Constance Johns', '2005-02-07', '+1 (481) 784-3201', 2439.00, '(885) 667-0116', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(6, 'Misael Hayes', '1987-01-08', '(426) 697-7198 x24353', 2739.00, '1-596-415-6087', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(7, 'Neva Rau', '1986-03-15', '+14546395160', 2967.00, '1-948-554-5950', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(8, 'Mr. Oren Pollich', '1998-12-10', '847.557.6662 x11249', 2081.00, '832-626-0940 x5156', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(9, 'Mr. Derrick Cruickshank Sr.', '1991-07-01', '(592) 531-5829', 2727.00, '+17183098257', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(10, 'Eunice Kassulke', '1989-01-14', '270.970.9277 x485', 3931.00, '+1-834-913-6207', '2019-06-08 11:10:55', '2019-06-08 11:10:55'),
(11, 'Sarjis', '2019-06-05', '12345', 0.00, '20196823197994', '2019-06-08 11:19:08', '2019-06-09 03:16:13');

-- --------------------------------------------------------

--
-- Table structure for table `test_types`
--

CREATE TABLE `test_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `test_types`
--

INSERT INTO `test_types` (`id`, `type_name`, `created_at`, `updated_at`) VALUES
(1, 'Cummingsview', '2019-06-08 11:10:53', '2019-06-08 11:10:53'),
(2, 'Roxanehaven', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(3, 'Langoshfort', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(4, 'Nicholasshire', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(5, 'West Mohamedview', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(6, 'West Clay', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(7, 'South Rosemaryborough', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(8, 'Reneeberg', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(9, 'East Ransom', '2019-06-08 11:10:54', '2019-06-08 11:10:54'),
(10, 'Emmitthaven', '2019-06-08 11:10:54', '2019-06-08 11:10:54');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prankers`
--
ALTER TABLE `prankers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tests_test_name_unique` (`test_name`);

--
-- Indexes for table `test_requests`
--
ALTER TABLE `test_requests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_requests_mobile_no_unique` (`mobile_no`),
  ADD UNIQUE KEY `test_requests_billno_unique` (`billNo`);

--
-- Indexes for table `test_types`
--
ALTER TABLE `test_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `test_types_type_name_unique` (`type_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prankers`
--
ALTER TABLE `prankers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test_requests`
--
ALTER TABLE `test_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `test_types`
--
ALTER TABLE `test_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
