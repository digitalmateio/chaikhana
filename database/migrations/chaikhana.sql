-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2019 at 11:13 AM
-- Server version: 5.6.37
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chaikhana`
--

-- --------------------------------------------------------

--
-- Table structure for table `backups`
--

CREATE TABLE `backups` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `file_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `backup_size` varchar(10) COLLATE utf8_unicode_ci DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `tags` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '[]',
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `tags`, `color`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Administration', '[]', '#000', NULL, '2019-03-14 04:08:06', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `designation` varchar(50) COLLATE utf8_unicode_ci DEFAULT '',
  `gender` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'Male',
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `designation`, `gender`, `email`, `dept`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'niko', 'Super Admin', 'Male', 'niko@digitalmate.io', 1, NULL, '2019-03-14 04:08:25', '2019-03-14 04:08:25');

-- --------------------------------------------------------

--
-- Table structure for table `la_configs`
--

CREATE TABLE `la_configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `section` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_configs`
--

INSERT INTO `la_configs` (`id`, `key`, `section`, `value`, `created_at`, `updated_at`) VALUES
(1, 'sitename', '', 'Admin', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(2, 'sitename_part1', '', 'Admin', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(3, 'sitename_part2', '', 'Skeleton', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(4, 'sitename_short', '', 'AS', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(5, 'site_description', '', 'Admin Panel Description', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(6, 'sidebar_search', '', '1', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(7, 'show_messages', '', '1', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(8, 'show_notifications', '', '1', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(9, 'show_tasks', '', '1', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(10, 'show_rightsidebar', '', '1', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(11, 'skin', '', 'skin-white', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(12, 'layout', '', 'fixed', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(13, 'default_email', '', 'test@example.com', '2019-03-14 04:08:06', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `la_menus`
--

CREATE TABLE `la_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `type` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'module',
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `hierarchy` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `la_menus`
--

INSERT INTO `la_menus` (`id`, `name`, `url`, `icon`, `type`, `parent`, `hierarchy`, `created_at`, `updated_at`) VALUES
(1, 'Team', '#', 'fa-group', 'custom', 0, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(2, 'Users', 'users', 'fa-group', 'module', 1, 0, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(3, 'Uploads', 'uploads', 'fa-files-o', 'module', 0, 0, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(4, 'Departments', 'departments', 'fa-tags', 'module', 1, 0, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(5, 'Employees', 'employees', 'fa-group', 'module', 1, 0, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(6, 'Roles', 'roles', 'fa-user-plus', 'module', 1, 0, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(7, 'Permissions', 'permissions', 'fa-magic', 'module', 1, 0, '2019-03-14 04:08:06', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_05_26_050000_create_modules_table', 1),
(2, '2014_05_26_055000_create_module_field_types_table', 1),
(3, '2014_05_26_060000_create_module_fields_table', 1),
(4, '2014_10_12_000000_create_users_table', 1),
(5, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2014_12_01_000000_create_uploads_table', 1),
(7, '2016_05_26_064006_create_departments_table', 1),
(8, '2016_05_26_064007_create_employees_table', 1),
(9, '2016_05_26_064446_create_roles_table', 1),
(10, '2016_07_05_115343_create_role_user_table', 1),
(11, '2016_07_07_134058_create_backups_table', 1),
(12, '2016_07_07_134058_create_menus_table', 1),
(13, '2016_09_10_163337_create_permissions_table', 1),
(14, '2016_09_10_163520_create_permission_role_table', 1),
(15, '2016_09_22_105958_role_module_fields_table', 1),
(16, '2016_09_22_110008_role_module_table', 1),
(17, '2016_10_06_115413_create_la_configs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_db` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `view_col` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fa_icon` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'fa-cube',
  `is_gen` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `label`, `name_db`, `view_col`, `model`, `controller`, `fa_icon`, `is_gen`, `created_at`, `updated_at`) VALUES
(1, 'Users', 'Users', 'users', 'name', 'User', 'UsersController', 'fa-group', 1, '2019-03-14 04:08:03', '2019-03-14 04:08:06'),
(2, 'Uploads', 'Uploads', 'uploads', 'name', 'Upload', 'UploadsController', 'fa-files-o', 1, '2019-03-14 04:08:03', '2019-03-14 04:08:06'),
(3, 'Departments', 'Departments', 'departments', 'name', 'Department', 'DepartmentsController', 'fa-tags', 1, '2019-03-14 04:08:03', '2019-03-14 04:08:06'),
(4, 'Employees', 'Employees', 'employees', 'name', 'Employee', 'EmployeesController', 'fa-group', 1, '2019-03-14 04:08:04', '2019-03-14 04:08:06'),
(5, 'Roles', 'Roles', 'roles', 'name', 'Role', 'RolesController', 'fa-user-plus', 1, '2019-03-14 04:08:04', '2019-03-14 04:08:06'),
(6, 'Backups', 'Backups', 'backups', 'name', 'Backup', 'BackupsController', 'fa-hdd-o', 1, '2019-03-14 04:08:04', '2019-03-14 04:08:06'),
(7, 'Permissions', 'Permissions', 'permissions', 'name', 'Permission', 'PermissionsController', 'fa-magic', 1, '2019-03-14 04:08:05', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `module_fields`
--

CREATE TABLE `module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `colname` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `label` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `module` int(10) UNSIGNED NOT NULL,
  `field_type` int(10) UNSIGNED NOT NULL,
  `unique` tinyint(1) NOT NULL DEFAULT '0',
  `defaultvalue` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `minlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `maxlength` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `popup_vals` text COLLATE utf8_unicode_ci NOT NULL,
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_fields`
--

INSERT INTO `module_fields` (`id`, `colname`, `label`, `module`, `field_type`, `unique`, `defaultvalue`, `minlength`, `maxlength`, `required`, `popup_vals`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'name', 'Name', 1, 16, 0, '', 5, 250, 1, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(2, 'context_id', 'Context', 1, 13, 0, '0', 0, 0, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(3, 'email', 'Email', 1, 8, 1, '', 0, 250, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(4, 'password', 'Password', 1, 17, 0, '', 6, 250, 1, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(5, 'type', 'User Type', 1, 7, 0, 'Employee', 0, 0, 0, '[\"Employee\",\"Client\"]', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(6, 'name', 'Name', 2, 16, 0, '', 5, 250, 1, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(7, 'path', 'Path', 2, 19, 0, '', 0, 250, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(8, 'extension', 'Extension', 2, 19, 0, '', 0, 20, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(9, 'user_id', 'Owner', 2, 7, 0, '1', 0, 0, 0, '@users', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(10, 'public', 'Is Public', 2, 2, 0, '0', 0, 0, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(11, 'type', 'Type', 2, 13, 0, '0', 0, 20, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(12, 'size', 'Size', 2, 22, 0, '', 0, 250, 1, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(13, 'url', 'Url', 2, 19, 0, '', 0, 250, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(14, 'name', 'Name', 3, 16, 1, '', 1, 250, 1, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(15, 'tags', 'Tags', 3, 20, 0, '[]', 0, 0, 0, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(16, 'color', 'Color', 3, 19, 0, '', 0, 50, 1, '', 0, '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(17, 'name', 'Name', 4, 16, 0, '', 5, 250, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(18, 'designation', 'Designation', 4, 19, 0, '', 0, 50, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(19, 'gender', 'Gender', 4, 18, 0, 'Male', 0, 0, 1, '[\"Male\",\"Female\"]', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(20, 'email', 'Email', 4, 8, 1, '', 5, 250, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(21, 'dept', 'Department', 4, 7, 0, '0', 0, 0, 1, '@departments', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(22, 'name', 'Name', 5, 16, 1, '', 1, 250, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(23, 'display_name', 'Display Name', 5, 19, 0, '', 0, 250, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(24, 'description', 'Description', 5, 21, 0, '', 0, 1000, 0, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(25, 'parent', 'Parent Role', 5, 7, 0, '1', 0, 0, 0, '@roles', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(26, 'dept', 'Department', 5, 7, 0, '1', 0, 0, 0, '@departments', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(27, 'name', 'Name', 6, 16, 1, '', 0, 250, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(28, 'file_name', 'File Name', 6, 19, 1, '', 0, 250, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(29, 'backup_size', 'File Size', 6, 19, 0, '0', 0, 10, 1, '', 0, '2019-03-14 04:08:04', '2019-03-14 04:08:04'),
(30, 'name', 'Name', 7, 16, 1, '', 1, 250, 1, '', 0, '2019-03-14 04:08:05', '2019-03-14 04:08:05'),
(31, 'display_name', 'Display Name', 7, 19, 0, '', 0, 250, 1, '', 0, '2019-03-14 04:08:05', '2019-03-14 04:08:05'),
(32, 'description', 'Description', 7, 21, 0, '', 0, 1000, 0, '', 0, '2019-03-14 04:08:05', '2019-03-14 04:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `module_field_types`
--

CREATE TABLE `module_field_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `module_field_types`
--

INSERT INTO `module_field_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Address', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(2, 'Checkbox', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(3, 'Currency', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(4, 'Date', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(5, 'Datetime', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(6, 'Decimal', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(7, 'Dropdown', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(8, 'Email', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(9, 'File', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(10, 'Float', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(11, 'HTML', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(12, 'Image', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(13, 'Integer', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(14, 'Mobile', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(15, 'Multiselect', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(16, 'Name', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(17, 'Password', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(18, 'Radio', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(19, 'String', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(20, 'Taginput', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(21, 'Textarea', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(22, 'TextField', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(23, 'URL', '2019-03-14 04:08:03', '2019-03-14 04:08:03'),
(24, 'Files', '2019-03-14 04:08:03', '2019-03-14 04:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN_PANEL', 'Admin Panel', 'Admin Panel Permission', NULL, '2019-03-14 04:08:06', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `display_name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `dept` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `parent`, `dept`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'SUPER_ADMIN', 'Super Admin', 'Full Access Role', 1, 1, NULL, '2019-03-14 04:08:06', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_module`
--

CREATE TABLE `role_module` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `module_id` int(10) UNSIGNED NOT NULL,
  `acc_view` tinyint(1) NOT NULL,
  `acc_create` tinyint(1) NOT NULL,
  `acc_edit` tinyint(1) NOT NULL,
  `acc_delete` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module`
--

INSERT INTO `role_module` (`id`, `role_id`, `module_id`, `acc_view`, `acc_create`, `acc_edit`, `acc_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(2, 1, 2, 1, 1, 1, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(3, 1, 3, 1, 1, 1, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(4, 1, 4, 1, 1, 1, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(5, 1, 5, 1, 1, 1, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(6, 1, 6, 1, 1, 1, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(7, 1, 7, 1, 1, 1, 1, '2019-03-14 04:08:06', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_module_fields`
--

CREATE TABLE `role_module_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `field_id` int(10) UNSIGNED NOT NULL,
  `access` enum('invisible','readonly','write') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_module_fields`
--

INSERT INTO `role_module_fields` (`id`, `role_id`, `field_id`, `access`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(2, 1, 2, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(3, 1, 3, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(4, 1, 4, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(5, 1, 5, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(6, 1, 6, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(7, 1, 7, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(8, 1, 8, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(9, 1, 9, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(10, 1, 10, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(11, 1, 11, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(12, 1, 12, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(13, 1, 13, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(14, 1, 14, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(15, 1, 15, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(16, 1, 16, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(17, 1, 17, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(18, 1, 18, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(19, 1, 19, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(20, 1, 20, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(21, 1, 21, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(22, 1, 22, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(23, 1, 23, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(24, 1, 24, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(25, 1, 25, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(26, 1, 26, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(27, 1, 27, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(28, 1, 28, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(29, 1, 29, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(30, 1, 30, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(31, 1, 31, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06'),
(32, 1, 32, 'write', '2019-03-14 04:08:06', '2019-03-14 04:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`id`, `role_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE `uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `path` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `extension` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `public` tinyint(1) DEFAULT '0',
  `type` int(10) UNSIGNED DEFAULT NULL,
  `size` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `context_id` int(10) UNSIGNED DEFAULT '0',
  `email` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci DEFAULT '',
  `type` varchar(191) COLLATE utf8_unicode_ci DEFAULT 'Employee',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `context_id`, `email`, `password`, `type`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'niko', 1, 'niko@digitalmate.io', '$2y$10$tfj5CMHXkCDKZO8LGDxqpuDrgiT43c3rCqscylLa8aCExPYX3LniW', 'Employee', NULL, NULL, '2019-03-14 04:08:25', '2019-03-14 04:08:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `backups`
--
ALTER TABLE `backups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `backups_name_unique` (`name`),
  ADD UNIQUE KEY `backups_file_name_unique` (`file_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_dept_foreign` (`dept`);

--
-- Indexes for table `la_configs`
--
ALTER TABLE `la_configs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `la_menus`
--
ALTER TABLE `la_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `module_fields_module_foreign` (`module`),
  ADD KEY `module_fields_field_type_foreign` (`field_type`);

--
-- Indexes for table `module_field_types`
--
ALTER TABLE `module_field_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_parent_foreign` (`parent`),
  ADD KEY `roles_dept_foreign` (`dept`);

--
-- Indexes for table `role_module`
--
ALTER TABLE `role_module`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_role_id_foreign` (`role_id`),
  ADD KEY `role_module_module_id_foreign` (`module_id`);

--
-- Indexes for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_module_fields_role_id_foreign` (`role_id`),
  ADD KEY `role_module_fields_field_id_foreign` (`field_id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `role_user_user_id_foreign` (`user_id`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `backups`
--
ALTER TABLE `backups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `la_configs`
--
ALTER TABLE `la_configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `la_menus`
--
ALTER TABLE `la_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `module_fields`
--
ALTER TABLE `module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `module_field_types`
--
ALTER TABLE `module_field_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `role_module`
--
ALTER TABLE `role_module`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `role_user`
--
ALTER TABLE `role_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_dept_foreign` FOREIGN KEY (`dept`) REFERENCES `departments` (`id`);

--
-- Constraints for table `module_fields`
--
ALTER TABLE `module_fields`
  ADD CONSTRAINT `module_fields_field_type_foreign` FOREIGN KEY (`field_type`) REFERENCES `module_field_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `module_fields_module_foreign` FOREIGN KEY (`module`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `roles`
--
ALTER TABLE `roles`
  ADD CONSTRAINT `roles_dept_foreign` FOREIGN KEY (`dept`) REFERENCES `departments` (`id`),
  ADD CONSTRAINT `roles_parent_foreign` FOREIGN KEY (`parent`) REFERENCES `roles` (`id`);

--
-- Constraints for table `role_module`
--
ALTER TABLE `role_module`
  ADD CONSTRAINT `role_module_module_id_foreign` FOREIGN KEY (`module_id`) REFERENCES `modules` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_module_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_module_fields`
--
ALTER TABLE `role_module_fields`
  ADD CONSTRAINT `role_module_fields_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `module_fields` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_module_fields_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
