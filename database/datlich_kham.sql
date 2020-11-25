-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2020 at 11:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datlich_kham`
--

-- --------------------------------------------------------

--
-- Table structure for table `bacsi`
--

CREATE TABLE `bacsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenbacsi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hocvi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_benhvien` bigint(20) UNSIGNED NOT NULL,
  `id_chuyenkhoa` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bacsi`
--

INSERT INTO `bacsi` (`id`, `tenbacsi`, `hocvi`, `id_benhvien`, `id_chuyenkhoa`, `created_at`, `updated_at`) VALUES
(1, 'Mai Thị Quỳnh', 'Thạc sĩ', 1, 2, '2020-08-16 19:41:26', '2020-08-16 19:41:26'),
(2, 'Võ Thị Thu Thảo', 'Tiến sĩ', 2, 4, '2020-08-16 19:41:57', '2020-08-16 19:41:57'),
(3, 'Trần Gia Huy', 'Thạc sĩ', 1, 1, '2020-08-16 19:42:17', '2020-08-16 19:42:17'),
(4, 'Nguyễn Phạm Trúc Phương', 'Tiến sĩ', 2, 3, '2020-08-16 19:42:51', '2020-08-16 19:42:51');

-- --------------------------------------------------------

--
-- Table structure for table `benhnhan`
--

CREATE TABLE `benhnhan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hovaten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaykham` date NOT NULL,
  `sodienthoai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_benhvien` bigint(20) UNSIGNED NOT NULL,
  `id_khunggio` bigint(20) UNSIGNED NOT NULL,
  `id_bacsi` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `id_chuyenkhoa` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benhnhan`
--

INSERT INTO `benhnhan` (`id`, `hovaten`, `ngaysinh`, `gioitinh`, `ngaykham`, `sodienthoai`, `diachi`, `email`, `id_benhvien`, `id_khunggio`, `id_bacsi`, `id_user`, `id_chuyenkhoa`, `created_at`, `updated_at`) VALUES
(1, 'aaaaaa', '2010-02-02', 'Male', '2020-08-20', '0388748282', 'Quận 1', 'thuhuong9x.td@gmail.com', 1, 2, 1, 1, 2, '2020-08-16 20:01:12', '2020-08-16 20:01:12');

-- --------------------------------------------------------

--
-- Table structure for table `benhvien`
--

CREATE TABLE `benhvien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenbenhvien` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `benhvien`
--

INSERT INTO `benhvien` (`id`, `tenbenhvien`, `diachi`, `created_at`, `updated_at`) VALUES
(1, 'Chợ Rẫy', 'Quận 5', '2020-08-16 19:39:58', '2020-08-16 19:39:58'),
(2, 'Đại Học y dược', 'Quận 5', '2020-08-16 19:40:11', '2020-08-16 19:40:11');

-- --------------------------------------------------------

--
-- Table structure for table `chuyenkhoa`
--

CREATE TABLE `chuyenkhoa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenchuyenkhoa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_benhvien` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chuyenkhoa`
--

INSERT INTO `chuyenkhoa` (`id`, `tenchuyenkhoa`, `id_benhvien`, `created_at`, `updated_at`) VALUES
(1, 'răng hàm mặt', 1, '2020-08-16 19:40:25', '2020-08-16 19:40:25'),
(2, 'khoa ngoại', 1, '2020-08-16 19:40:33', '2020-08-16 19:40:33'),
(3, 'Da liễu', 2, '2020-08-16 19:40:43', '2020-08-16 19:40:43'),
(4, 'khoa nội', 2, '2020-08-16 19:40:52', '2020-08-16 19:40:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khunggio`
--

CREATE TABLE `khunggio` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khunggio` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_benhvien` bigint(20) UNSIGNED NOT NULL,
  `id_chuyenkhoa` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `gioihan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khunggio`
--

INSERT INTO `khunggio` (`id`, `khunggio`, `id_benhvien`, `id_chuyenkhoa`, `created_at`, `updated_at`, `gioihan`) VALUES
(1, '7h-7h10', 1, 1, '2020-08-16 19:43:13', '2020-08-16 19:43:13', 2),
(2, '7h10-7h20', 1, 2, '2020-08-16 19:43:36', '2020-08-16 19:43:36', 2),
(3, '7h20-7h30', 2, 3, '2020-08-16 19:43:58', '2020-08-16 19:43:58', 2),
(4, '7h30-7h40', 2, 4, '2020-08-16 19:44:22', '2020-08-16 19:44:22', 2);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_03_24_131338_create_permission_tables', 1),
(5, '2020_07_01_164554_benhvien', 1),
(6, '2020_07_01_164845_chuyenkhoa', 1),
(7, '2020_07_03_143553_bacsi', 1),
(8, '2020_07_03_144122_khunggio', 1),
(9, '2020_07_03_145039_benhnhan', 1),
(10, '2020_07_03_145632_sms', 1),
(11, '2020_07_09_130913_add_gioihan_to_khunggio_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 2),
(2, 'App\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user-list', 'web', '2020-08-16 19:46:36', '2020-08-16 19:46:36'),
(2, 'user-delete', 'web', '2020-08-16 19:46:44', '2020-08-16 19:46:44'),
(3, 'user-create', 'web', '2020-08-16 19:46:49', '2020-08-16 19:46:49'),
(4, 'user-edit', 'web', '2020-08-16 19:46:55', '2020-08-16 19:46:55'),
(5, 'role-list', 'web', '2020-08-16 19:47:02', '2020-08-16 19:47:02'),
(6, 'role-delete', 'web', '2020-08-16 19:47:08', '2020-08-16 19:47:08'),
(7, 'role-create', 'web', '2020-08-16 19:47:27', '2020-08-16 19:47:27'),
(8, 'role-edit', 'web', '2020-08-16 19:47:53', '2020-08-16 19:47:53'),
(9, 'patient-list', 'web', '2020-08-16 19:51:02', '2020-08-16 19:51:02'),
(10, 'patient-create', 'web', '2020-08-16 19:51:14', '2020-08-16 19:51:14'),
(11, 'patient-delete', 'web', '2020-08-16 19:51:25', '2020-08-16 19:51:25'),
(12, 'patient-edit', 'web', '2020-08-16 19:51:35', '2020-08-16 19:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2020-08-16 19:49:34', '2020-08-16 19:49:34'),
(2, 'User', 'web', '2020-08-16 19:52:19', '2020-08-16 19:52:19');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sodienthoai` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_benhnhan` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `danhso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `danhso`, `hoten`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'abc@gmail.com', '001', 'abc', '$2y$10$iYdqq2Zkr532YjkV/um4Ee6tb2EOIAGlymq8kU7eXqo/SKV0CldR6', 'upload/avatar/hwzK_ZDxN_Koala.jpg', NULL, '2020-08-16 18:15:06', '2020-08-16 19:53:30'),
(2, 'Admin', 'admin@gmail.com', NULL, 'admin', '$2y$10$vEgNqcCjDtTtGHKUu199euMHuaXqqJe0H2obgPCYLd11HxFi5q2xy', 'upload/avatar/b6TH_default.jpg', NULL, '2020-08-16 19:37:20', '2020-08-16 19:53:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bacsi_id_benhvien_foreign` (`id_benhvien`),
  ADD KEY `bacsi_id_chuyenkhoa_foreign` (`id_chuyenkhoa`);

--
-- Indexes for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `benhnhan_id_benhvien_foreign` (`id_benhvien`),
  ADD KEY `benhnhan_id_khunggio_foreign` (`id_khunggio`),
  ADD KEY `benhnhan_id_bacsi_foreign` (`id_bacsi`),
  ADD KEY `benhnhan_id_user_foreign` (`id_user`),
  ADD KEY `benhnhan_id_chuyenkhoa_foreign` (`id_chuyenkhoa`);

--
-- Indexes for table `benhvien`
--
ALTER TABLE `benhvien`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chuyenkhoa_id_benhvien_foreign` (`id_benhvien`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `khunggio`
--
ALTER TABLE `khunggio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khunggio_id_benhvien_foreign` (`id_benhvien`),
  ADD KEY `khunggio_id_chuyenkhoa_foreign` (`id_chuyenkhoa`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sms_id_benhnhan_foreign` (`id_benhnhan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bacsi`
--
ALTER TABLE `bacsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `benhnhan`
--
ALTER TABLE `benhnhan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `benhvien`
--
ALTER TABLE `benhvien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khunggio`
--
ALTER TABLE `khunggio`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bacsi`
--
ALTER TABLE `bacsi`
  ADD CONSTRAINT `bacsi_id_benhvien_foreign` FOREIGN KEY (`id_benhvien`) REFERENCES `benhvien` (`id`),
  ADD CONSTRAINT `bacsi_id_chuyenkhoa_foreign` FOREIGN KEY (`id_chuyenkhoa`) REFERENCES `chuyenkhoa` (`id`);

--
-- Constraints for table `benhnhan`
--
ALTER TABLE `benhnhan`
  ADD CONSTRAINT `benhnhan_id_bacsi_foreign` FOREIGN KEY (`id_bacsi`) REFERENCES `bacsi` (`id`),
  ADD CONSTRAINT `benhnhan_id_benhvien_foreign` FOREIGN KEY (`id_benhvien`) REFERENCES `benhvien` (`id`),
  ADD CONSTRAINT `benhnhan_id_chuyenkhoa_foreign` FOREIGN KEY (`id_chuyenkhoa`) REFERENCES `chuyenkhoa` (`id`),
  ADD CONSTRAINT `benhnhan_id_khunggio_foreign` FOREIGN KEY (`id_khunggio`) REFERENCES `khunggio` (`id`),
  ADD CONSTRAINT `benhnhan_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `chuyenkhoa`
--
ALTER TABLE `chuyenkhoa`
  ADD CONSTRAINT `chuyenkhoa_id_benhvien_foreign` FOREIGN KEY (`id_benhvien`) REFERENCES `benhvien` (`id`);

--
-- Constraints for table `khunggio`
--
ALTER TABLE `khunggio`
  ADD CONSTRAINT `khunggio_id_benhvien_foreign` FOREIGN KEY (`id_benhvien`) REFERENCES `benhvien` (`id`),
  ADD CONSTRAINT `khunggio_id_chuyenkhoa_foreign` FOREIGN KEY (`id_chuyenkhoa`) REFERENCES `chuyenkhoa` (`id`);

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sms`
--
ALTER TABLE `sms`
  ADD CONSTRAINT `sms_id_benhnhan_foreign` FOREIGN KEY (`id_benhnhan`) REFERENCES `benhnhan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
