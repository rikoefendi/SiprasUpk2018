-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 26, 2018 at 07:06 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.25-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `upk2018`
--

-- --------------------------------------------------------

CREATE DATABASE upk2018;

USE upk2018;

--
-- Table structure for table `disposisis`
--

CREATE TABLE `disposisis` (
  `id` int(10) UNSIGNED NOT NULL,
  `tujuan_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batas_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sifat_disposisi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_surat` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisis`
--

INSERT INTO `disposisis` (`id`, `tujuan_disposisi`, `isi_disposisi`, `batas_waktu`, `catatan`, `sifat_disposisi`, `id_surat`, `created_at`, `updated_at`) VALUES
(1, 'kepala sekolah', 'undagan rapat', '2018-02-08', 'segera datang', 'Segera', 1, '2018-02-24 18:29:04', '2018-02-24 18:29:04');

-- --------------------------------------------------------

--
-- Table structure for table `inboxes`
--

CREATE TABLE `inboxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `received_at` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_place` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_docx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inboxes`
--

INSERT INTO `inboxes` (`id`, `no_agenda`, `mail_date`, `received_at`, `mail_number`, `mail_place`, `subject`, `desc`, `mail_docx`, `id_users`, `created_at`, `updated_at`) VALUES
(1, '00123', '2018-02-08', '2018-02-22', '11/wkr/11/2', 'Jakarta', 'undangan rapat', 'Undangan', '1519521589~contoh-surat-undangan-resmi(copy).docx', 1, '2018-02-24 18:19:49', '2018-02-24 18:19:49'),
(2, '002', '2018-02-02', '2018-02-14', '11/smk/11/3', 'dinas', 'Undagan Ke dinas', 'undangan', '1519521709~contoh-surat-undangan-resmi.docx', 1, '2018-02-24 18:21:49', '2018-02-24 18:21:49');

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
(3, '2018_02_14_014759_create_inbox_table', 1),
(4, '2018_02_14_015715_create_outbox_table', 1),
(5, '2018_02_14_020217_create_disposisi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outboxes`
--

CREATE TABLE `outboxes` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_agenda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mail_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sended_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_keluar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_docx` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_users` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outboxes`
--

INSERT INTO `outboxes` (`id`, `no_agenda`, `mail_number`, `subject`, `sended_to`, `tgl_surat`, `tgl_keluar`, `file_docx`, `id_users`, `created_at`, `updated_at`) VALUES
(1, '00134', '11/wkr/10', 'undangan', 'smk wikrama', '2018-02-03', '2018-02-02', '1519522312~contoh-surat-undangan-resmi(copy).docx', 1, '2018-02-24 18:31:28', '2018-02-24 18:31:52');

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
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci,
  `telp` int(11) DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `alamat`, `telp`, `foto`, `status`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'riko efendi', 'rikoefendi100@gmail.com', '$2y$10$848MjatenPD08yr2FZrE2uQlw/5c50s5qQ/a5AB7bKZZAveczxPUi', NULL, NULL, NULL, 1, 1, 'XgMmpniMO8WoRM48btaq6PG0ILCVDuslnNOCYTu2ongGTVlbGGHFdf18RFiZ', '2018-02-24 18:14:44', '2018-02-24 18:14:44'),
(2, 'ardian hadiyono', 'ardianyono11@gmail.com', '$2y$10$KMlnDWDObx3lV8BjVtteJ.nAerP/QqTm9JyV51W.IaW3LPEd80dOq', NULL, NULL, NULL, 1, 0, NULL, '2018-02-24 18:32:29', '2018-02-24 18:37:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisis`
--
ALTER TABLE `disposisis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disposisis_id_surat_foreign` (`id_surat`);

--
-- Indexes for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `inboxes_id_users_foreign` (`id_users`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outboxes`
--
ALTER TABLE `outboxes`
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
-- AUTO_INCREMENT for table `disposisis`
--
ALTER TABLE `disposisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `inboxes`
--
ALTER TABLE `inboxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `outboxes`
--
ALTER TABLE `outboxes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `disposisis`
--
ALTER TABLE `disposisis`
  ADD CONSTRAINT `disposisis_id_surat_foreign` FOREIGN KEY (`id_surat`) REFERENCES `inboxes` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `inboxes`
--
ALTER TABLE `inboxes`
  ADD CONSTRAINT `inboxes_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
