-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2021 at 04:45 AM
-- Server version: 8.0.23
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thglass`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dong', 'dong@gmail.com', '$2y$10$hF39zs7kBtU8sfaJT3n7sOOofc7qkNb6vrO3MMg2142rmCxKvaDCK', NULL, NULL, NULL, NULL),
(52, 'dong', 'donglee123321@gmail.com', '$2y$10$VCLA7wgmvBrYk.VIb8wGC.eOPIrZLk8Uo9s7sggfoWr2cBg6eyco2', NULL, '2021-04-23 06:12:00', '2021-04-23 06:12:00', NULL),
(53, 'dong', 'dong1232@gmail.com', '123456Ad', NULL, '2021-04-23 08:29:00', '2021-04-23 08:29:00', NULL),
(54, 'dong1', 'dong1@gmail.com', '123456Ad', NULL, '2021-04-23 08:51:21', '2021-04-27 01:39:30', '2021-04-27 01:39:30'),
(55, 'dong', 'dong111@gmail.com', '$2y$10$UdvhR6BHMihefXRxn0lM4.cDZV7WHMKtzhlnzp5pWeDdu0fSkh0y2', NULL, '2021-04-27 09:08:32', '2021-04-27 09:08:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'hinh1', 'banner1.png', NULL, NULL, NULL),
(2, 'hinh2', 'banner3.png', NULL, NULL, NULL),
(3, 'Hình 4', '8622_vé.PNG', '2021-04-27 07:49:30', '2021-04-27 08:10:36', '2021-04-27 08:10:36');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_day` date NOT NULL,
  `number_of_participants` bigint NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_time` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `the_remaining_amount` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `start_day`, `number_of_participants`, `image`, `public_time`, `status`, `created_at`, `updated_at`, `deleted_at`, `the_remaining_amount`) VALUES
(1, 'dong', 'Event sport', '2021-05-01', 200, '9916_vé.PNG', '2021-04-30', 'public', NULL, '2021-04-29 04:44:34', NULL, 190);

-- --------------------------------------------------------

--
-- Table structure for table `event_users`
--

CREATE TABLE IF NOT EXISTS `event_users` (
  `id` bigint unsigned NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `event_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_users`
--

INSERT INTO `event_users` (`id`, `user_id`, `event_id`, `created_at`, `updated_at`) VALUES
(2, 8, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(3, '2021_04_22_040758_create_admin_table', 1),
(4, '2021_04_22_041945_create_roles_table', 1),
(5, '2021_04_22_042024_create_permissions_table', 1),
(6, '2021_04_24_084811_add_column_delete_at_table_admins', 2),
(7, '2021_04_24_181338_add_column_parent_id_permissions', 2),
(8, '2021_04_25_014219_add_column_key_permissions', 2),
(9, '2021_04_27_014329_add_column_delete_users', 3),
(13, '2021_04_27_065304_create_banners_table', 6),
(14, '2021_04_27_072706_add_column_delete_banners', 7),
(16, '2014_10_12_100000_create_password_resets_table', 8),
(18, '2021_04_27_015151_create_events_table', 10),
(19, '2021_04_29_032433_create_registers_table', 11),
(20, '2021_04_27_064224_add_column_delete_events', 12),
(21, '2021_04_29_031322_add_column_the_remaining_amount_events', 13);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `id` bigint unsigned NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'donglee123321@gmail.com', 'kgfNTnVu7kusV2jsurYQzyjuuhTWGu3hoSEunO9w9anwIb7sfUKzqAhD18cD', '2021-04-28 03:30:29', '2021-04-28 06:16:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint unsigned NOT NULL,
  `permission_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'admin', 'Module admin', NULL, NULL, 0, 'null'),
(2, 'admin-list', 'Danh sách admin', NULL, NULL, 1, 'admin-list'),
(3, 'admin-edit', 'Sửa admin', NULL, NULL, 1, 'admin-edit'),
(4, 'admin-add', 'Thêm admin', NULL, NULL, 1, 'admin-add'),
(5, 'admin-delete', 'Xóa admin', NULL, NULL, 1, 'admin-delete'),
(6, 'role', 'Module role', NULL, NULL, 0, 'null'),
(7, 'role-list', 'Danh sách role', NULL, NULL, 6, 'role-list'),
(8, 'role-edit', 'Sửa role', NULL, NULL, 6, 'role-edit'),
(9, 'role-add', 'Thêm role', NULL, NULL, 6, 'role-add'),
(10, 'role-delete', 'Xóa role', NULL, NULL, 6, 'role-delete'),
(11, 'banner', 'Module banner', NULL, NULL, 0, 'null'),
(12, 'banner-list', 'Danh sách banner', NULL, NULL, 11, 'banner-list'),
(13, 'banner-edit', 'Sửa banner', NULL, NULL, 11, 'banner-edit'),
(14, 'banner-add', 'Thêm banner', NULL, NULL, 11, 'banner-add'),
(15, 'banner-delete', 'Xóa banner', NULL, NULL, 11, 'banner-delete'),
(16, 'event', 'Module event', NULL, NULL, 0, 'null'),
(17, 'event-list', 'Danh sách event', NULL, NULL, 16, 'event-list'),
(18, 'event-edit', 'Sửa event', NULL, NULL, 16, 'event-edit'),
(19, 'event-add', 'Thêm event', NULL, NULL, 16, 'event-add'),
(20, 'event-delete', 'Xóa event', NULL, NULL, 16, 'event-delete'),
(21, 'user', 'Module user', NULL, NULL, 0, 'null'),
(22, 'user-list', 'Danh sách user', NULL, NULL, 21, 'user-list'),
(23, 'user-edit', 'Sửa user', NULL, NULL, 21, 'user-edit'),
(24, 'user-add', 'Thêm user', NULL, NULL, 21, 'user-add'),
(25, 'user-delete', 'Xóa user', NULL, NULL, 21, 'user-delete');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE IF NOT EXISTS `registers` (
  `id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint unsigned NOT NULL,
  `role_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Chức năng là ông nội có tất cả các quyền', NULL, NULL),
(2, 'manager', 'Quản lý 1 các trang danh sách user, và banner', NULL, NULL),
(3, 'normal', 'Chả có tác dụng gì ngoài xem xem', NULL, NULL),
(4, 'user', 'Chỉ có quyền user', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_admins`
--

CREATE TABLE IF NOT EXISTS `role_admins` (
  `id` bigint unsigned NOT NULL,
  `admin_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_admins`
--

INSERT INTO `role_admins` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, NULL, NULL),
(3, 52, 2, '2021-04-23 06:12:00', '2021-04-23 06:12:00'),
(4, 53, 3, '2021-04-23 08:29:00', '2021-04-23 08:29:00'),
(5, 54, 1, '2021-04-23 08:51:21', '2021-04-23 08:51:21'),
(6, 55, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permissions`
--

CREATE TABLE IF NOT EXISTS `role_permissions` (
  `id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `permission_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=81 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_permissions`
--

INSERT INTO `role_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(36, 1, 1, NULL, NULL),
(37, 1, 2, NULL, NULL),
(38, 1, 3, NULL, NULL),
(39, 1, 4, NULL, NULL),
(40, 1, 5, NULL, NULL),
(41, 1, 6, NULL, NULL),
(42, 1, 7, NULL, NULL),
(43, 1, 8, NULL, NULL),
(44, 1, 9, NULL, NULL),
(45, 1, 10, NULL, NULL),
(46, 1, 11, NULL, NULL),
(47, 1, 12, NULL, NULL),
(48, 1, 13, NULL, NULL),
(49, 1, 14, NULL, NULL),
(50, 1, 15, NULL, NULL),
(51, 1, 16, NULL, NULL),
(52, 1, 17, NULL, NULL),
(53, 1, 18, NULL, NULL),
(54, 1, 19, NULL, NULL),
(55, 1, 20, NULL, NULL),
(56, 1, 21, NULL, NULL),
(57, 1, 22, NULL, NULL),
(58, 1, 23, NULL, NULL),
(59, 1, 24, NULL, NULL),
(60, 1, 25, NULL, NULL),
(61, 2, 6, NULL, NULL),
(62, 2, 7, NULL, NULL),
(63, 2, 8, NULL, NULL),
(64, 2, 9, NULL, NULL),
(65, 2, 10, NULL, NULL),
(66, 2, 11, NULL, NULL),
(67, 2, 12, NULL, NULL),
(68, 2, 13, NULL, NULL),
(69, 2, 14, NULL, NULL),
(70, 2, 15, NULL, NULL),
(71, 2, 16, NULL, NULL),
(72, 2, 17, NULL, NULL),
(73, 2, 18, NULL, NULL),
(74, 2, 19, NULL, NULL),
(75, 2, 20, NULL, NULL),
(76, 2, 21, NULL, NULL),
(77, 2, 22, NULL, NULL),
(78, 2, 23, NULL, NULL),
(79, 2, 24, NULL, NULL),
(80, 2, 25, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'dong1', 'dong@gmail.com', NULL, '123456', 'hinh1.jpg', NULL, NULL, '2021-04-28 08:08:45', NULL),
(3, 'dong', 'donglee12@gmail.com', NULL, '1234Ad', '7141_login.png', NULL, '2021-04-26 09:46:55', '2021-04-26 09:46:55', NULL),
(4, 'dong1', 'donglee11123321@gmail.com', NULL, '123456Ad', '8701_login.png', NULL, '2021-04-27 01:27:33', '2021-04-27 01:27:33', NULL),
(5, 'dong', 'dong123123@gmail.com', NULL, '$2y$10$lNfaHqfLOzUftkYQCqdPuOZt2QQem8uWoZgmJPhvFqDhO7.cEAJWe', '6787_vé.PNG', NULL, '2021-04-28 01:54:09', '2021-04-28 01:54:09', NULL),
(6, 'dong11111123', 'dong11111111@gmail.com', NULL, '$2y$10$HOaNVgrqZrHjcxRxF3bmEu5HwIqUDPl4FFg9oqYS4uT/weSO2pif2', '561_login.png', NULL, '2021-04-28 01:55:05', '2021-04-28 02:11:49', NULL),
(7, 'dong1111', 'dong111231@gmail.com', NULL, '$2y$10$VJax0kkZVIerOJ81aONAMeTqqsh6u1uQ2XX/YK9HejGgnWcBeXLp6', '1722_vé.PNG', NULL, '2021-04-28 02:20:14', '2021-04-28 02:20:14', NULL),
(8, 'dong', 'donglee123321@gmail.com', NULL, '$2y$10$RUk53JAwTCJPQL/jleKiBercbEtEmQACQ5fOKygjGjpROXa/EdMge', '898_login.png', NULL, '2021-04-28 03:08:05', '2021-04-28 03:08:05', NULL),
(9, 'dong', '1dong@gmail.com', NULL, '123456Ad', '8075_vé.PNG', NULL, '2021-04-28 08:11:47', '2021-04-28 08:14:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_users`
--
ALTER TABLE `event_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_users_user_id_foreign` (`user_id`),
  ADD KEY `event_users_event_id_foreign` (`event_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_permission_name_unique` (`permission_name`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_role_name_unique` (`role_name`);

--
-- Indexes for table `role_admins`
--
ALTER TABLE `role_admins`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_admins_admin_id_foreign_key` (`admin_id`),
  ADD KEY `role_admins_role_id_foreign_key` (`role_id`);

--
-- Indexes for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_permissions_permission_id_foreign` (`permission_id`);

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
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `event_users`
--
ALTER TABLE `event_users`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role_admins`
--
ALTER TABLE `role_admins`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role_permissions`
--
ALTER TABLE `role_permissions`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `event_users`
--
ALTER TABLE `event_users`
  ADD CONSTRAINT `event_users_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`),
  ADD CONSTRAINT `event_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_admins`
--
ALTER TABLE `role_admins`
  ADD CONSTRAINT `role_admins_admin_id_foreign_key` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `role_admins_role_id_foreign_key` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `role_permissions`
--
ALTER TABLE `role_permissions`
  ADD CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`),
  ADD CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
