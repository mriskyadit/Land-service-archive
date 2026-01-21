-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 21, 2026 at 07:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `land_archive`
--

-- --------------------------------------------------------

--
-- Table structure for table `arsips`
--

CREATE TABLE `arsips` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `id` bigint UNSIGNED NOT NULL,
  `permohonan_id` bigint UNSIGNED DEFAULT NULL,
  `activity` text COLLATE utf8mb4_unicode_ci,
  `status_lama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_baru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`id`, `permohonan_id`, `activity`, `status_lama`, `status_baru`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 9, NULL, NULL, 'Loket', 'Permohonan diajukan di loket', '2026-01-13 06:22:42', '2026-01-13 06:22:42'),
(2, 8, NULL, 'baru', 'H2P', 'Permohonan dikirim dari Loket ke H2P', '2026-01-13 06:57:13', '2026-01-13 06:57:13'),
(3, 2, NULL, 'Loket', 'H2P', 'Data diambil oleh H2P', '2026-01-13 18:14:54', '2026-01-13 18:14:54'),
(4, 9, NULL, 'Loket', 'H2P', 'Data diambil oleh H2P', '2026-01-13 18:14:54', '2026-01-13 18:14:54'),
(5, 2, NULL, 'H2P', 'Menunggu Arsip', 'H2P mengajukan permintaan arsip', '2026-01-14 03:57:18', '2026-01-14 03:57:18'),
(6, 2, NULL, 'Menunggu Arsip', 'Ditolak Arsip', 'Arsip menolak permintaan', '2026-01-14 03:57:34', '2026-01-14 03:57:34'),
(7, 4, NULL, 'H2P', 'Menunggu Arsip', 'H2P mengajukan permintaan arsip', '2026-01-14 03:57:44', '2026-01-14 03:57:44'),
(8, 4, NULL, 'Menunggu Arsip', 'Ditolak Arsip', 'Arsip menolak permintaan', '2026-01-14 03:57:52', '2026-01-14 03:57:52'),
(9, 8, NULL, 'H2P', 'Menunggu Arsip', 'H2P mengajukan permintaan arsip', '2026-01-18 19:33:30', '2026-01-18 19:33:30'),
(10, 8, NULL, 'Menunggu Arsip', 'Ditolak Arsip', 'Arsip menolak permintaan', '2026-01-18 19:33:43', '2026-01-18 19:33:43'),
(11, 10, NULL, NULL, 'Loket', 'Permohonan diajukan di loket', '2026-01-19 18:02:16', '2026-01-19 18:02:16'),
(12, 11, NULL, NULL, 'Loket', 'Permohonan diajukan di loket', '2026-01-19 18:04:05', '2026-01-19 18:04:05'),
(13, 10, NULL, 'Loket', 'H2P', 'Data diambil oleh H2P', '2026-01-19 18:10:36', '2026-01-19 18:10:36'),
(14, 11, NULL, 'Loket', 'H2P', 'Data diambil oleh H2P', '2026-01-19 18:10:36', '2026-01-19 18:10:36'),
(15, 12, NULL, NULL, 'Loket', 'Permohonan diajukan di loket', '2026-01-20 00:41:28', '2026-01-20 00:41:28'),
(16, 12, NULL, 'Loket', 'H2P', 'Data diambil oleh H2P', '2026-01-20 00:53:26', '2026-01-20 00:53:26'),
(17, 5, NULL, 'H2P', 'Diproses Loket', 'Berkas dikirim ke Loket (PH)', '2026-01-20 00:54:22', '2026-01-20 00:54:22'),
(18, 6, NULL, 'H2P', 'Menunggu Arsip', 'H2P mengajukan permintaan arsip', '2026-01-20 00:54:38', '2026-01-20 00:54:38'),
(19, 9, NULL, 'H2P', 'Diproses Loket', 'Berkas dikirim ke Loket (Balik Nama)', '2026-01-20 20:30:41', '2026-01-20 20:30:41'),
(20, 10, NULL, 'H2P', 'Diproses Loket', 'Berkas dikirim ke Loket (PH)', '2026-01-20 20:49:07', '2026-01-20 20:49:07'),
(21, 11, NULL, 'H2P', 'Selesai', 'Berkas diproses H2P dan diselesaikan oleh Loket (PH)', '2026-01-20 21:02:59', '2026-01-20 21:02:59');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_11_19_022114_create_permohonans_table', 1),
(5, '2025_11_19_063012_add_status_to_permohonan_table', 1),
(6, '2025_11_20_072010_create_histories_table', 1),
(7, '2025_11_21_040343_add_activity_to_histories_table', 1),
(8, '2025_11_21_040841_update_histories_make_permohonan_id_nullable', 1),
(9, '2025_12_12_102654_create_permohonan_table', 1),
(10, '2025_12_12_104735_add_email_to_permohonans_table', 2),
(11, '2026_01_09_040949_add_h2p_fields_to_permohonans', 2),
(12, '2026_01_19_023037_add_role_to_users_table', 3);

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
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_permohonan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permohonans`
--

CREATE TABLE `permohonans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_pemohon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_pemohon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_layanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Loket',
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warkah` tinyint(1) NOT NULL DEFAULT '0',
  `buku_tanah` tinyint(1) NOT NULL DEFAULT '0',
  `surat_ukur` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permohonans`
--

INSERT INTO `permohonans` (`id`, `nama_pemohon`, `email_pemohon`, `jenis_layanan`, `status`, `keterangan`, `created_at`, `updated_at`, `warkah`, `buku_tanah`, `surat_ukur`) VALUES
(2, 'aditiarise', NULL, 'balik nama', 'Ditolak Arsip', 'permohonan', '2025-12-12 22:35:00', '2026-01-14 03:57:34', 0, 0, 0),
(4, 'zuda ardiansa', NULL, 'Uabah HGB ke HM(Hak Guna Bangunan - Hak Milik)', 'Ditolak Arsip', 'pemohon', '2026-01-08 21:55:23', '2026-01-14 03:57:52', 0, 0, 0),
(5, 'aditiarise', NULL, 'pengawinan', 'Diproses Loket', 'pemohon', '2026-01-08 21:56:29', '2026-01-20 00:54:22', 0, 0, 0),
(6, 'zuda ardiansa', NULL, 'pengawinan', 'Menunggu Arsip', 'pemohon', '2026-01-12 22:45:30', '2026-01-20 00:54:38', 0, 0, 0),
(8, 'aditiarise', NULL, 'Uabah HGB ke HM(Hak Guna Bangunan - Hak Milik)', 'Ditolak Arsip', 'e6de', '2026-01-12 22:48:23', '2026-01-18 19:33:43', 0, 0, 0),
(9, 'bapaak hartono', NULL, 'peralihan hak', 'Diproses Loket', 'warkah 123 hgb 2019', '2026-01-13 06:22:42', '2026-01-20 20:30:41', 0, 0, 0),
(10, 'azahahraaa', NULL, 'peralihan hak', 'Diproses Loket', 'cewe aku', '2026-01-19 18:02:16', '2026-01-20 20:49:07', 0, 0, 0),
(11, 'M RISKY ADITIA', NULL, 'pengawinan', 'Selesai', 'proses', '2026-01-19 18:04:05', '2026-01-20 21:02:59', 0, 0, 0),
(12, 'M RISKY ADITIA', NULL, 'pengawinan', 'H2P', 'WARKAH', '2026-01-20 00:41:28', '2026-01-20 00:53:26', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('019ddU4wRdrqvdHUGZ1MwddGCWt6UazFGZgPtoRa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUmZybnRiREl6Y3NjeXpCTk50MEtIWVFxS2xjZ1VxbnRIR3FUOElXSyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9oaXN0b3J5IjtzOjU6InJvdXRlIjtzOjEzOiJoaXN0b3J5LmluZGV4Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1765604122),
('5PxC5O7K9UgZAJLuXr4o9dj9ng4n7tKZplkL4om6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMjU1WUc0eXJHbGMxcUhIMER5N1A5SXBRNGdQcEs1NVA2RGVEajl3eCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767885746),
('eS97tGYlfWF9dIC1tvLeWG1CCnn2SMknHKxuCzdO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoib0UwQVRPeGxITTZLWlhySHZWSVE4VzBVYXRDOVhBbEoxRE1QU3dQRSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765621754),
('HTUd5Z8o33hbrMflkrtvdS0tGPvBTRkexvYGPJF4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoidkxIYllCcmcxV1NucFlwblZKUGpqdkM1ZGZZU3M4a0Q4OHVOcDR1eCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO3M6NToicm91dGUiO3M6OToiZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1765693761),
('lW8MXFlvNe2pUo1pHQeM5PbdmAPX8XLlyOP7zhkM', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiTVdnUlhFYk9ka1BIa1BCMU5MdEU0WHpiVU5RT3U5bHFTekpNZ28wYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767886409),
('pEsF31f8DzXrGkXVeqIq1V6dqSsLEncFAePtXEuz', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWW04U0NkQlI0bG9aN3UwZE1VNTdIV2dDWHFTYWNlRzJwQkVsbGZucyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1767886036),
('R4SaX4g8tit3vmxiFNVJWalPtvhLMYzD7vbsZtX4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiWVdTNmpLeFJSSGN0MXI1Q0k3aVRhZzYwTlFKNFBkY2s1UzVBV2RXUCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765621755),
('T3dzKOBSxHqtz6vdzAFRptMbntkeqteTWkaBIV7G', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYVVXdU5QNUxpdmdxWE02MXZKVGVmYUw3Z1o5R3c2VTNMNXlBNkJ6SSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7czo1OiJyb3V0ZSI7czo1OiJsb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1767886408),
('X85KNCUqcack4ZiuqnqtMyoJjPBwy6ouvL1kvLo1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36 Edg/143.0.0.0', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiNkx1YTlYbmhsa1k5aENRdlBnMTBlbkx3U1N3b3R0SHlkcmZiQnlwdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1765621845);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'loket',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'adtt@gmail.com', NULL, '$2y$12$QYMdfkQ757jjWjqFLMrq1eBshe5KmF9SigjmkXg1Xev5YMI3stgyK', 'admin', NULL, '2025-12-12 21:15:03', '2025-12-12 21:15:03'),
(3, 'Kepala Kantor', 'kepala@gmail.com', NULL, '$2y$12$FylV4XGcspABpbh88NybDuPiRmeM/MG.EZPX.TF/I4diuPgdMn1m6', 'kepala', NULL, '2026-01-21 02:38:09', '2026-01-20 19:56:50'),
(4, 'Petugas Loket', 'loket@gmail.com', NULL, '$2y$12$Sx4IQ4739QrT1/rXmfTokOHhhNnnPKeZfBiwU8dXn68VVQ.yqZEmS', 'loket', NULL, '2026-01-21 02:38:40', '2026-01-20 20:18:10'),
(5, 'Petugas H2P', 'h2p@gmail.com', NULL, '$2y$12$ZHis1kXA/yCyE8nTV4vPuOSYSrtCrCh5dB35KWrRdpFVybTb8ufCu', 'h2p', NULL, '2026-01-21 02:39:04', '2026-01-20 21:01:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arsips`
--
ALTER TABLE `arsips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `histories_permohonan_id_foreign` (`permohonan_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permohonans`
--
ALTER TABLE `permohonans`
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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `arsips`
--
ALTER TABLE `arsips`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permohonans`
--
ALTER TABLE `permohonans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `histories`
--
ALTER TABLE `histories`
  ADD CONSTRAINT `histories_permohonan_id_foreign` FOREIGN KEY (`permohonan_id`) REFERENCES `permohonans` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
