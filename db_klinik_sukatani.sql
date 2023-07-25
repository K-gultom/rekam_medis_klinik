-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2023 at 06:48 PM
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
-- Database: `klinikaja`
--

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
(47, '2014_10_12_000000_create_users_table', 1),
(48, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(49, '2019_08_19_000000_create_failed_jobs_table', 1),
(50, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(51, '2023_05_31_150210_create_pasiens_table', 1),
(52, '2023_06_02_074504_create_observasiawals_table', 1),
(53, '2023_06_02_074525_create_observasilanjuts_table', 1),
(54, '2023_07_13_082742_create_rekmeds_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `observasiawals`
--

CREATE TABLE `observasiawals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tglhadir` date NOT NULL,
  `suhutubuh` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sistole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diastole` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beratbadan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggibadan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `observasiawals`
--

INSERT INTO `observasiawals` (`id`, `pasien_id`, `user_id`, `tglhadir`, `suhutubuh`, `sistole`, `diastole`, `beratbadan`, `tinggibadan`, `created_at`, `updated_at`) VALUES
(71, 14, 1, '2023-07-25', '36', '120', '80', '77', '177', '2023-07-25 09:47:13', '2023-07-25 09:47:13');

-- --------------------------------------------------------

--
-- Table structure for table `observasilanjuts`
--

CREATE TABLE `observasilanjuts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tglhadir` date NOT NULL,
  `subjective` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `assesment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `planing` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `observasilanjuts`
--

INSERT INTO `observasilanjuts` (`id`, `pasien_id`, `user_id`, `tglhadir`, `subjective`, `assesment`, `planing`, `created_at`, `updated_at`) VALUES
(63, 14, 1, '2023-07-25', 'dfbbdbfdbdf', 'bdfbdfbdfbdfbdf', 'bdfdbfbdffbdbdf', '2023-07-25 09:47:24', '2023-07-25 09:47:24');

-- --------------------------------------------------------

--
-- Table structure for table `pasiens`
--

CREATE TABLE `pasiens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noNIK` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noBpjs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `jeniskelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alergiobat` enum('Y','N') COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaayah` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaibu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namasuami` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namaisteri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasiens`
--

INSERT INTO `pasiens` (`id`, `nama`, `noNIK`, `noBpjs`, `tempatlahir`, `tgllahir`, `jeniskelamin`, `alamat`, `telp`, `alergiobat`, `namaayah`, `namaibu`, `namasuami`, `namaisteri`, `created_at`, `updated_at`) VALUES
(14, 'test', '***', '***', '***', '1445-08-22', 'P', 'Jl. Pemancingan', '1231234232123', 'N', '***', '***', '***', '***', '2023-06-23 00:41:03', '2023-06-23 00:41:03');

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
-- Table structure for table `rekmeds`
--

CREATE TABLE `rekmeds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pasien_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tglinput` date NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempatlahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `jeniskelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('dokterumum','doktergigi','bidan','perawat','admin','superadmin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `tempatlahir`, `tgllahir`, `jeniskelamin`, `alamat`, `telp`, `email`, `password`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'Palembang', '2002-08-19', 'L', 'Jl. Sukabangun', '123412341234', 'kiel1@gmail.com', '$2y$10$dAf6OreckEYqUMG/2y.dm.4WkqBE2G2ivVC2k/vDUffm0FjHgpSYO', 'superadmin', '2023-06-15 19:20:45', '2023-07-25 09:48:18'),
(18, 'Test1', 'Palembang', '1995-12-28', 'P', 'Jl. Sejahtera', '123412341234', 'test1@gmail.com', '$2y$10$ZQH/hOk1imkyK7ynhUrLMeuea7AaSP0NIxBNWmP1NpJYpWBEMXnUe', 'dokterumum', '2023-07-25 09:42:53', '2023-07-25 09:42:53'),
(19, 'Test2', 'Palembang', '1974-09-15', 'L', 'Jl. Sukamandi', '1231234232123', 'test2@gmail.com', '$2y$10$.oshoylh7IrmyCPiPVlsFu4iPH700bkk82anhQn4zSoSdXUhjlOJW', 'perawat', '2023-07-25 09:43:58', '2023-07-25 09:43:58'),
(20, 'Test3', 'Sukabumi', '1995-03-26', 'P', 'Jl. Naskah', '1231234232123', 'test3@gmail.com', '$2y$10$Eej67Qvm38xMfj3frO..Y.b5Oi8spXyZAyTRv9XjFgw/6xDhfhnay', 'admin', '2023-07-25 09:44:31', '2023-07-25 09:44:31');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `observasiawals`
--
ALTER TABLE `observasiawals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `observasilanjuts`
--
ALTER TABLE `observasilanjuts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pasiens`
--
ALTER TABLE `pasiens`
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
-- Indexes for table `rekmeds`
--
ALTER TABLE `rekmeds`
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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `observasiawals`
--
ALTER TABLE `observasiawals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `observasilanjuts`
--
ALTER TABLE `observasilanjuts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `pasiens`
--
ALTER TABLE `pasiens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekmeds`
--
ALTER TABLE `rekmeds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
