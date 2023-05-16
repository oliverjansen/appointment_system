-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2023 at 09:36 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unpublish_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `title`, `body`, `publish_date`, `unpublish_date`, `created_at`, `updated_at`) VALUES
(1, 'LIbre Tuli', 'Mag sasagawa po kami ng libreng tuli sa dadating na sabado May 6, 2023. Ito ay magagandap sa ating health center.', '2023-05-01', '2023-05-06', '2023-05-01 15:42:37', '2023-05-02 01:25:35'),
(6, 'Libreng Pakain sa Aso', '-', '2023-05-02', '2023-05-05', '2023-05-02 01:27:59', '2023-05-02 02:48:23');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_contactnumber` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_id` int(11) NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `service_category_id` int(11) DEFAULT NULL,
  `pediatic_id` int(11) DEFAULT NULL,
  `appointment_services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_vaccine_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_dose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_vaccine_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `appointment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `user_id`, `user_contactnumber`, `appointment_id`, `service_id`, `service_category_id`, `pediatic_id`, `appointment_services`, `appointment_vaccine_category`, `appointment_dose`, `appointment_vaccine_type`, `appointment_date`, `appointment_status`, `created_at`, `updated_at`) VALUES
(2, 1, '+639171822295', 93677835, 1, 1, NULL, 'Vaccine', 'Pediatric Vaccination', NULL, 'Bgc', '2023-05-01', 'success', '2023-05-01 15:10:56', '2023-05-01 15:12:00'),
(4, 1, '+639171822295', 88138160, 3, 4, NULL, 'Checkup', 'General Checkup', NULL, NULL, '2023-05-01', 'success', '2023-05-01 15:37:55', '2023-05-01 15:39:53'),
(11, 1, '+639171822295', 21835654, 1, 1, NULL, 'Vaccine', 'Pediatric Vaccination', NULL, 'Bgc', '2023-05-02', 'success', '2023-05-01 17:30:14', '2023-05-01 17:31:22'),
(12, 1, '+639171822295', 21168302, 1, 4, NULL, 'Vaccine', 'Covid Vaccination', '1', 'Sinovac', '2023-05-02', 'success', '2023-05-02 02:13:40', '2023-05-02 02:15:15'),
(13, 1, '+639171822295', 48505911, 3, 5, NULL, 'Checkup', 'Dental Checkup', NULL, NULL, '2023-05-10', 'pending', '2023-05-02 02:50:39', '2023-05-02 02:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `availableslot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories_vaccine`
--

CREATE TABLE `categories_vaccine` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_vaccine`
--

INSERT INTO `categories_vaccine` (`id`, `service_id`, `category`, `category_availability`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pediatric Vaccination', 'No', '2023-05-01 14:56:48', '2023-05-02 02:55:23'),
(2, 1, 'Covid Vaccination', 'Yes', '2023-05-01 14:57:55', '2023-05-01 14:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `checkup`
--

CREATE TABLE `checkup` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `general_checkup` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `checkup_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_09_01_040223_create_services_table', 1),
(7, '2022_09_03_040834_create_sessions_table', 1),
(8, '2022_09_13_033246_create_calendars_table', 1),
(9, '2022_09_16_032208_create_categories_table', 1),
(10, '2022_09_17_080036_vaccine', 1),
(11, '2022_10_02_082726_create_flights_table', 1),
(12, '2022_10_03_224841_create_medicines_table', 1),
(13, '2022_11_07_212104_create_check_ups_table', 1),
(14, '2022_11_07_212922_create_other_services_table', 1),
(15, '2022_11_08_053029_create_appointments_table', 1),
(16, '2022_11_19_042848_checkup', 1),
(17, '2022_11_19_045723_announcement', 1),
(18, '2022_11_19_045855_pediatic_vaccine', 1),
(19, '2022_12_07_201050_create_residents_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `other_services`
--

CREATE TABLE `other_services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `other_services` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_services_slot` int(11) DEFAULT NULL,
  `other_services_availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `other_services`
--

INSERT INTO `other_services` (`id`, `service_id`, `other_services`, `other_services_slot`, `other_services_availability`, `created_at`, `updated_at`) VALUES
(1, 2, 'Hypertension', 130, 'Yes', '2023-05-01 15:02:36', '2023-05-01 15:06:39'),
(4, 3, 'General Checkup', 24, 'Yes', '2023-05-01 15:05:38', '2023-05-01 15:06:22'),
(5, 3, 'Dental Checkup', 49, 'Yes', '2023-05-01 15:06:13', '2023-05-01 15:06:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('oliverjansen16@gmail.com', '5uBktIxagfkxxsznwVuJ3QF4c22Z9vX9umEVcw7HC2EYa4xmaMSzu6tVklRTKPA9', '2023-05-01 15:15:41'),
('oliverjansen16@gmail.com', '0ERlcDdjIRvcfRxwtWAHm7eyzT3M8aWhle7BZXc5wf6MdQsMh7psNyrUI5YSpVdx', '2023-05-01 15:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `residents`
--

CREATE TABLE `residents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `resident_firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resident_barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `residents`
--

INSERT INTO `residents` (`id`, `resident_firstname`, `resident_middlename`, `resident_lastname`, `resident_gender`, `resident_birthdate`, `resident_age`, `resident_address`, `resident_barangay`, `created_at`, `updated_at`) VALUES
(1, 'khali', 'junatas', 'jamison', 'male', '2000-10-09', '22', '1864 antipolo street', '368', '2023-05-02 15:24:19', '2023-05-02 15:24:19'),
(31, 'alberto', 'g', 'kevin', 'male', '2000-01-01', '22', '1322 sisa st sampaloc manila', '517', '2023-05-02 16:06:28', '2023-05-02 16:06:28'),
(32, 'jabal', 'a', 'adieser', 'male', '2000-01-02', '23', '1323 sisa st sampaloc manila', '518', '2023-05-02 16:06:28', '2023-05-02 16:06:28'),
(33, 'pasco', 'l', 'nicko', 'male', '2000-01-03', '24', '1324 sisa st sampaloc manila', '519', '2023-05-02 16:06:28', '2023-05-02 16:06:28'),
(34, 'flores', 'k', 'marcus', 'male', '2000-01-04', '25', '1325 sisa st sampaloc manila', '520', '2023-05-02 16:06:28', '2023-05-02 16:06:28');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service`, `availability`, `created_at`, `updated_at`) VALUES
(1, 'Vaccine', 'Yes', '2023-05-01 14:55:19', '2023-05-01 14:56:16'),
(2, 'Medicine', 'Yes', '2023-05-01 14:56:01', '2023-05-01 14:56:22'),
(3, 'Checkup', 'Yes', '2023-05-01 14:56:08', '2023-05-01 14:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('AidgB60H9GeWKtl0zVMB4PtJabth7DI5WHR1L6wb', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.68', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiamZxQXZQTHhqcXJLdDZhQzZ2eE5JWGs1eENmako5ZkdDZk1XeUUxcCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NToiYWxlcnQiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1683099405),
('R4zBRffbzuoHvGGyGkLMIq0UUfg27VnlrrglNCN3', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36 Edg/112.0.1722.68', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZ1NBOFBYbjZSVTczZzdvVGJZaXBRajJNclA1UzB1Z2x3M1dUNTQ5TyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6MzoidXJsIjthOjA6e31zOjU6ImFsZXJ0IjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo0O30=', 1683083860);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contactnumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthdate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identification` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `identificationtype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `barangay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstname`, `middlename`, `lastname`, `contactnumber`, `gender`, `birthdate`, `age`, `identification`, `identificationtype`, `address`, `barangay`, `account_type`, `status`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'oliverjansen16@gmail.com', 'oliver jansen', 'vanicer', 'rodriguez', '+639171822295', 'male', '2000-09-16', '22', 'images/j65aPaXM057uuBMPpfhzwlrorLNBukYiAxjER5JS.png', 'drivers license', '1372 sisa st. sampaloc manila', '518', 'user', 'approved', NULL, '$2y$10$nLsjAMCuIZvedSImol71FOA/k6y9l/KCUfroDKk.XE8cRwlGcv/HK', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-01 14:49:26', '2023-05-01 17:22:13'),
(2, 'oliver@gmail.com', 'oliver', 'jansen', 'rodriguez', '+639691324344', 'male', '2000-09-16', '22', 'images/BkYjYV45a6H73zm2QHmn1nXc5n8urxInd7dN4dYX.png', 'UMID', '1864 antipolo street', '518', 'admin', 'approved', NULL, '$2y$10$HEGgaWjtidI75ba2T0.N4OvkUsTPgYL/rwzYJk.xAcdWIspWMZAue', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-01 14:51:07', '2023-05-01 14:51:07'),
(3, 'staff@gmail.com', 'staff', 'staff', 'staff', 'IgG5T8rTsl', 'staff', 'staff', 'staff', 'staff', 'staff', 'staff', NULL, 'staff', 'approved', NULL, '$2y$10$zxrdQcbqVHlEgq4McRs6tulcIMt67NbIz0QSYPh8yw8qYtoWF4PIu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-01 15:13:32', '2023-05-01 15:13:32'),
(4, 'admin@gmail.com', 'admin', 'admin', 'admin', '+639777850026', 'male', '2022-12-03', '22', 'images/fua550Z4wJOfpfSCTjBHAypXl99OMemV8gsSXzbl.jpg', 'drivers license', '1864 antipolo street', '518', 'admin', 'approved', NULL, '$2y$10$YoESJHcjBk69TVXOC5Dd2OnGDQ7g7S3zUph/zXQrUHXoumX.AsdhS', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-01 17:03:28', '2023-05-02 16:11:19'),
(5, 'staff2@gmail.com', 'staff2', 'staff', 'staff', '6JeIy9rBGJ', 'staff', 'staff', 'staff', 'staff', 'staff', 'staff', NULL, 'staff', 'approved', NULL, '$2y$10$rwtlAjmsTiqKzBBmjWh0yurUFFKV4KOQFOJIgN2coJViI5qUmJ6U6', NULL, NULL, NULL, NULL, NULL, NULL, '2023-05-02 16:13:45', '2023-05-02 16:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine`
--

CREATE TABLE `vaccine` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `dose` int(11) DEFAULT NULL,
  `vaccine_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vaccine_slot` int(11) DEFAULT NULL,
  `vaccine_availability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vaccine`
--

INSERT INTO `vaccine` (`id`, `service_id`, `category_id`, `dose`, `vaccine_type`, `vaccine_slot`, `vaccine_availability`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 'Bgc', 98, 'No', '2023-05-01 14:57:08', '2023-05-01 14:57:08'),
(4, 1, 2, 1, 'Sinovac', 129, 'Yes', '2023-05-01 14:59:47', '2023-05-01 14:59:56'),
(5, 1, 2, 2, 'Pizer', 150, 'Yes', '2023-05-01 15:00:23', '2023-05-01 15:00:32'),
(6, 1, 2, 3, 'Sinovac', 140, 'Yes', '2023-05-01 15:01:53', '2023-05-01 15:02:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_appointment_id_unique` (`appointment_id`),
  ADD KEY `appointments_user_id_foreign` (`user_id`),
  ADD KEY `appointments_user_contactnumber_foreign` (`user_contactnumber`),
  ADD KEY `appointments_service_id_foreign` (`service_id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_vaccine`
--
ALTER TABLE `categories_vaccine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_vaccine_service_id_foreign` (`service_id`);

--
-- Indexes for table `checkup`
--
ALTER TABLE `checkup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkup_user_id_foreign` (`user_id`);

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
-- Indexes for table `other_services`
--
ALTER TABLE `other_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `other_services_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `residents`
--
ALTER TABLE `residents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contactnumber_unique` (`contactnumber`);

--
-- Indexes for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vaccine_service_id_foreign` (`service_id`),
  ADD KEY `vaccine_category_id_foreign` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories_vaccine`
--
ALTER TABLE `categories_vaccine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `checkup`
--
ALTER TABLE `checkup`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `other_services`
--
ALTER TABLE `other_services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `residents`
--
ALTER TABLE `residents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vaccine`
--
ALTER TABLE `vaccine`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_user_contactnumber_foreign` FOREIGN KEY (`user_contactnumber`) REFERENCES `users` (`contactnumber`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `appointments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `categories_vaccine`
--
ALTER TABLE `categories_vaccine`
  ADD CONSTRAINT `categories_vaccine_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `checkup`
--
ALTER TABLE `checkup`
  ADD CONSTRAINT `checkup_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `other_services`
--
ALTER TABLE `other_services`
  ADD CONSTRAINT `other_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vaccine`
--
ALTER TABLE `vaccine`
  ADD CONSTRAINT `vaccine_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories_vaccine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vaccine_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
