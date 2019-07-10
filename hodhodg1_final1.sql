-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2019 at 11:59 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hodhodg1_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `side` tinyint(4) NOT NULL DEFAULT 1,
  `position` tinyint(4) NOT NULL DEFAULT 1,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `select` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categoricals`
--

CREATE TABLE `categoricals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `categorical_id` int(11) NOT NULL,
  `categorical_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `color_product`
--

CREATE TABLE `color_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `designs`
--

CREATE TABLE `designs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `design_product`
--

CREATE TABLE `design_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `max_user` int(11) DEFAULT NULL,
  `max_price` int(11) DEFAULT NULL,
  `min_price` int(11) DEFAULT NULL,
  `users` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `categories` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expire` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_host` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(116, '2014_10_12_000000_create_users_table', 1),
(117, '2014_10_12_100000_create_password_resets_table', 1),
(118, '2019_03_13_110418_create_products_table', 1),
(119, '2019_03_13_110730_create_articles_table', 1),
(120, '2019_03_13_110924_create_categories_table', 1),
(121, '2019_03_13_111102_create_sliders_table', 1),
(122, '2019_03_13_111143_create_banners_table', 1),
(123, '2019_03_13_111246_create_comments_table', 1),
(124, '2019_03_13_164511_create_brands_table', 1),
(125, '2019_03_13_164638_create_colors_table', 1),
(126, '2019_03_13_164652_create_socials_table', 1),
(127, '2019_03_13_181433_create_designs_table', 1),
(128, '2019_03_17_091916_create_sizes_table', 1),
(129, '2019_04_07_055913_create_orders_table', 1),
(130, '2019_04_07_061537_create_order_items_table', 1),
(131, '2019_04_07_061601_create_discounts_table', 1),
(132, '2019_04_07_115835_create_provinces_table', 1),
(133, '2019_04_08_111240_create_settings_table', 1),
(134, '2019_04_08_133841_create_qas_table', 1),
(135, '2019_04_11_082522_create_tickets_table', 1),
(136, '2019_04_26_121531_create_roles_table', 1),
(137, '2019_05_23_132340_create_sms_registers_table', 1),
(138, '2019_06_25_140812_create_media_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `discount_id` int(10) UNSIGNED DEFAULT NULL,
  `province_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_type` int(11) DEFAULT NULL,
  `surprize` int(11) DEFAULT NULL,
  `receiver_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `receiver_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code_phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `total_raw` int(11) DEFAULT NULL,
  `discount_price` int(11) DEFAULT NULL,
  `province_price` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `time_receive` int(11) DEFAULT NULL,
  `receive_at` timestamp NULL DEFAULT NULL,
  `payment_reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_authority` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `visit` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `size_id` int(10) UNSIGNED DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `label`, `created_at`, `updated_at`) VALUES
(1, 'create-product', 'ایجاد محصول', NULL, NULL),
(2, 'update-product', 'ویرایش محصول', NULL, NULL),
(3, 'show-product', 'مشاهده محصول', NULL, NULL),
(4, 'create-color', 'ایجاد رنگ', NULL, NULL),
(5, 'update-color', 'ویرایش رنگ', NULL, NULL),
(6, 'show-color', 'مشاهده رنگ', NULL, NULL),
(7, 'create-brand', 'ایجاد برند', NULL, NULL),
(8, 'update-brand', 'ویرایش برند', NULL, NULL),
(9, 'show-brand', 'مشاهده برند', NULL, NULL),
(10, 'create-design', 'ایجاد طرح', NULL, NULL),
(11, 'update-design', 'ویرایش طرح', NULL, NULL),
(12, 'show-design', 'مشاهده طرح', NULL, NULL),
(13, 'create-size', 'ایجاد سایز', NULL, NULL),
(14, 'update-size', 'ویرایش سایز', NULL, NULL),
(15, 'show-size', 'مشاهده سایز', NULL, NULL),
(16, 'create-discount', 'ایجاد تخفیف', NULL, NULL),
(17, 'update-discount', 'ویرایش تخفیف', NULL, NULL),
(18, 'show-discount', 'مشاهده تخفیف', NULL, NULL),
(19, 'create-banner', 'ایجاد بنر', NULL, NULL),
(20, 'update-banner', 'ویرایش بنر', NULL, NULL),
(21, 'show-banner', 'مشاهده بنر', NULL, NULL),
(22, 'create-slider', 'ایجاد اسلایدر', NULL, NULL),
(23, 'update-slider', 'ویرایش اسلایدر', NULL, NULL),
(24, 'show-slider', 'مشاهدهمقالات اسلایدر', NULL, NULL),
(25, 'create-article', 'ایجاد مقالات', NULL, NULL),
(26, 'update-article', 'ویرایش مقالات', NULL, NULL),
(27, 'show-article', 'مشاهده مقالات', NULL, NULL),
(28, 'create-category', 'ایجاد دسته بندی', NULL, NULL),
(29, 'update-category', 'ویرایش دسته بندی', NULL, NULL),
(30, 'show-category', 'مشاهده دسته بندی', NULL, NULL),
(31, 'create-user', 'ایجاد کاربران', NULL, NULL),
(32, 'update-user', 'ویرایش کاربران', NULL, NULL),
(33, 'show-user', 'مشاهده کاربران', NULL, NULL),
(34, 'create-province', 'ایجاد استان', NULL, NULL),
(35, 'update-province', 'ویرایش استان', NULL, NULL),
(36, 'show-province', 'مشاهده استان', NULL, NULL),
(37, 'create-ticket', 'ایجاد تیکت', NULL, NULL),
(38, 'update-ticket', 'ویرایش تیکت', NULL, NULL),
(39, 'show-ticket', 'مشاهده تیکت', NULL, NULL),
(40, 'update-order', 'ویرایش سفارشات', NULL, NULL),
(41, 'show-order', 'مشاهده سفارشات', NULL, NULL),
(42, 'create-qas', 'ایجاد سوالات', NULL, NULL),
(43, 'update-qas', 'ویرایش سوالات', NULL, NULL),
(44, 'show-qas', 'مشاهده سوالات', NULL, NULL),
(45, 'create-setting', 'ایجاد تنظیمات', NULL, NULL),
(46, 'update-setting', 'ویرایش تنظیمات', NULL, NULL),
(47, 'show-setting', 'مشاهده تنظیمات', NULL, NULL),
(48, 'show-map', 'مشاهده نقشه سفارشات', NULL, NULL),
(49, 'read-product', 'مشاهده نقشه سفارشات', NULL, NULL),
(50, 'read-order', 'مشاهده نقشه سفارشات', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_roles`
--

CREATE TABLE `permissions_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `permission_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions_roles`
--

INSERT INTO `permissions_roles` (`id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(2, '2', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(3, '3', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(4, '4', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(5, '5', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(6, '6', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(7, '7', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(8, '8', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(9, '9', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(10, '10', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(11, '11', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(12, '12', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(13, '13', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(14, '14', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(15, '15', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(16, '16', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(17, '17', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(18, '18', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(19, '19', '1', '2019-07-07 04:18:30', '2019-07-07 04:18:30'),
(20, '20', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(21, '21', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(22, '22', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(23, '23', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(24, '24', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(25, '25', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(26, '26', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(27, '27', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(28, '28', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(29, '29', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(30, '30', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(31, '31', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(32, '32', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(33, '33', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(34, '34', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(35, '35', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(36, '36', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(37, '37', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(38, '38', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(39, '39', '1', '2019-07-07 04:18:31', '2019-07-07 04:18:31'),
(40, '40', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(41, '41', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(42, '42', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(43, '43', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(44, '44', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(45, '45', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(46, '46', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(47, '47', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(48, '48', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(49, '49', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(50, '50', '1', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(51, '1', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(52, '2', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(53, '4', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(54, '5', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(55, '7', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(56, '8', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(57, '10', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(58, '11', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(59, '13', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(60, '14', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(61, '40', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(62, '41', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32'),
(63, '48', '2', '2019-07-07 04:18:32', '2019-07-07 04:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `related` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `stock` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL DEFAULT 0,
  `offer` int(11) NOT NULL DEFAULT 0,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `gallery` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `situation` tinyint(4) NOT NULL DEFAULT 0,
  `view_count` int(11) NOT NULL DEFAULT 0,
  `order_count` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE `product_size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `city`, `price`, `created_at`, `updated_at`) VALUES
(1, 'آذربايجان شرقي', '[\"\\u0622\\u0630\\u0631 \\u0634\\u0647\\u0631\",\"\\u0627\\u0633\\u0643\\u0648\",\"\\u0627\\u0647\\u0631\",\"\\u0628\\u0633\\u062a\\u0627\\u0646 \\u0622\\u0628\\u0627\\u062f\",\"\\u0628\\u0646\\u0627\\u0628\",\"\\u0628\\u0646\\u062f\\u0631 \\u0634\\u0631\\u0641\\u062e\\u0627\\u0646\\u0647\",\"\\u062a\\u0628\\u0631\\u064a\\u0632\",\"\\u062a\\u0633\\u0648\\u062c\",\"\\u062c\\u0644\\u0641\\u0627\",\"\\u0633\\u0631\\u0627\\u0628\",\"\\u0634\\u0628\\u0633\\u062a\\u0631\",\"\\u0635\\u0648\\u0641\\u06cc\\u0627\\u0646\",\"\\u0639\\u062c\\u0628\\u0634\\u064a\\u0631\",\"\\u0642\\u0631\\u0647 \\u0622\\u063a\\u0627\\u062c\",\"\\u0643\\u0644\\u064a\\u0628\\u0631\",\"\\u0643\\u0646\\u062f\\u0648\\u0627\\u0646\",\"\\u0645\\u0631\\u0627\\u063a\\u0647\",\"\\u0645\\u0631\\u0646\\u062f\",\"\\u0645\\u0644\\u0643\\u0627\\u0646\",\"\\u0645\\u0645\\u0642\\u0627\\u0646\",\"\\u0645\\u064a\\u0627\\u0646\\u0647\",\"\\u0647\\u0627\\u062f\\u064a\\u0634\\u0647\\u0631\",\"\\u0647\\u0631\\u064a\\u0633\",\"\\u0647\\u0634\\u062a\\u0631\\u0648\\u062f\",\"\\u0648\\u0631\\u0632\\u0642\\u0627\\u0646\"]', 5000, NULL, NULL),
(2, 'آذربايجان غربي', '[\"\\u0627\\u0631\\u0648\\u0645\\u064a\\u0647\",\"\\u0627\\u0634\\u0646\\u0648\\u064a\\u0647\",\"\\u0628\\u0627\\u0632\\u0631\\u06af\\u0627\\u0646\",\"\\u0628\\u0648\\u0643\\u0627\\u0646\",\"\\u067e\\u0644\\u062f\\u0634\\u062a\",\"\\u067e\\u064a\\u0631\\u0627\\u0646\\u0634\\u0647\\u0631\",\"\\u062a\\u0643\\u0627\\u0628\",\"\\u062e\\u0648\\u064a\",\"\\u0633\\u0631\\u062f\\u0634\\u062a\",\"\\u0633\\u0644\\u0645\\u0627\\u0633\",\"\\u0633\\u064a\\u0647 \\u0686\\u0634\\u0645\\u0647- \\u0686\\u0627\\u0644\\u062f\\u0631\\u0627\\u0646\",\"\\u0633\\u06cc\\u0645\\u06cc\\u0646\\u0647\",\"\\u0634\\u0627\\u0647\\u064a\\u0646 \\u062f\\u0698\",\"\\u0634\\u0648\\u0637\",\"\\u0645\\u0627\\u0643\\u0648\",\"\\u0645\\u0647\\u0627\\u0628\\u0627\\u062f\",\"\\u0645\\u064a\\u0627\\u0646\\u062f\\u0648\\u0622\\u0628\",\"\\u0646\\u0642\\u062f\\u0647\"]', 5000, NULL, NULL),
(3, 'اردبيل', '[\"\\u0627\\u0631\\u062f\\u0628\\u064a\\u0644\",\"\\u0628\\u064a\\u0644\\u0647 \\u0633\\u0648\\u0627\\u0631\",\"\\u067e\\u0627\\u0631\\u0633 \\u0622\\u0628\\u0627\\u062f\",\"\\u062e\\u0644\\u062e\\u0627\\u0644\",\"\\u0633\\u0631\\u0639\\u064a\\u0646\",\"\\u0643\\u064a\\u0648\\u064a (\\u0643\\u0648\\u062b\\u0631)\",\"\\u06af\\u0631\\u0645\\u064a (\\u0645\\u063a\\u0627\\u0646)\",\"\\u0645\\u0634\\u06af\\u064a\\u0646 \\u0634\\u0647\\u0631\",\"\\u0645\\u063a\\u0627\\u0646 (\\u0633\\u0645\\u0646\\u0627\\u0646)\",\"\\u0646\\u0645\\u064a\\u0646\",\"\\u0646\\u064a\\u0631\"]', 5000, NULL, NULL),
(4, 'اصفهان', '[\"\\u0622\\u0631\\u0627\\u0646 \\u0648 \\u0628\\u064a\\u062f\\u06af\\u0644\",\"\\u0627\\u0631\\u062f\\u0633\\u062a\\u0627\\u0646\",\"\\u0627\\u0635\\u0641\\u0647\\u0627\\u0646\",\"\\u0628\\u0627\\u063a \\u0628\\u0647\\u0627\\u062f\\u0631\\u0627\\u0646\",\"\\u062a\\u064a\\u0631\\u0627\\u0646\",\"\\u062e\\u0645\\u064a\\u0646\\u064a \\u0634\\u0647\\u0631\",\"\\u062e\\u0648\\u0627\\u0646\\u0633\\u0627\\u0631\",\"\\u062f\\u0647\\u0627\\u0642\\u0627\\u0646\",\"\\u062f\\u0648\\u0644\\u062a \\u0622\\u0628\\u0627\\u062f-\\u0627\\u0635\\u0641\\u0647\\u0627\\u0646\",\"\\u0632\\u0631\\u064a\\u0646 \\u0634\\u0647\\u0631\",\"\\u0632\\u064a\\u0628\\u0627\\u0634\\u0647\\u0631 (\\u0645\\u062d\\u0645\\u062f\\u064a\\u0647)\",\"\\u0633\\u0645\\u064a\\u0631\\u0645\",\"\\u0634\\u0627\\u0647\\u064a\\u0646 \\u0634\\u0647\\u0631\",\"\\u0634\\u0647\\u0631\\u0636\\u0627\",\"\\u0641\\u0631\\u064a\\u062f\\u0646\",\"\\u0641\\u0631\\u064a\\u062f\\u0648\\u0646 \\u0634\\u0647\\u0631\",\"\\u0641\\u0644\\u0627\\u0648\\u0631\\u062c\\u0627\\u0646\",\"\\u0641\\u0648\\u0644\\u0627\\u062f \\u0634\\u0647\\u0631\",\"\\u0642\\u0647\\u062f\\u0631\\u06cc\\u062c\\u0627\\u0646\",\"\\u0643\\u0627\\u0634\\u0627\\u0646\",\"\\u06af\\u0644\\u067e\\u0627\\u064a\\u06af\\u0627\\u0646\",\"\\u06af\\u0644\\u062f\\u0634\\u062a \\u0627\\u0635\\u0641\\u0647\\u0627\\u0646\",\"\\u06af\\u0644\\u062f\\u0634\\u062a \\u0645\\u0631\\u0643\\u0632\\u06cc\",\"\\u0645\\u0628\\u0627\\u0631\\u0643\\u0647 \\u0627\\u0635\\u0641\\u0647\\u0627\\u0646\",\"\\u0645\\u0647\\u0627\\u0628\\u0627\\u062f-\\u0627\\u0635\\u0641\\u0647\\u0627\\u0646\",\"\\u0646\\u0627\\u064a\\u064a\\u0646\",\"\\u0646\\u062c\\u0641 \\u0622\\u0628\\u0627\\u062f\",\"\\u0646\\u0637\\u0646\\u0632\",\"\\u0647\\u0631\\u0646\\u062f\"]', 5000, NULL, NULL),
(5, 'البرز', '[\"\\u0622\\u0633\\u0627\\u0631\\u0627\",\"\\u0627\\u0634\\u062a\\u0647\\u0627\\u0631\\u062f\",\"\\u0634\\u0647\\u0631 \\u062c\\u062f\\u064a\\u062f \\u0647\\u0634\\u062a\\u06af\\u0631\\u062f\",\"\\u0637\\u0627\\u0644\\u0642\\u0627\\u0646\",\"\\u0643\\u0631\\u062c\",\"\\u06af\\u0644\\u0633\\u062a\\u0627\\u0646 \\u062a\\u0647\\u0631\\u0627\\u0646\",\"\\u0646\\u0638\\u0631\\u0622\\u0628\\u0627\\u062f\",\"\\u0647\\u0634\\u062a\\u06af\\u0631\\u062f\"]', 5000, NULL, NULL),
(6, 'ايلام', '[\"\\u0622\\u0628\\u062f\\u0627\\u0646\\u0627\\u0646\",\"\\u0627\\u064a\\u0644\\u0627\\u0645\",\"\\u0627\\u064a\\u0648\\u0627\\u0646\",\"\\u062f\\u0631\\u0647 \\u0634\\u0647\\u0631\",\"\\u062f\\u0647\\u0644\\u0631\\u0627\\u0646\",\"\\u0633\\u0631\\u0627\\u0628\\u0644\\u0647\",\"\\u0634\\u064a\\u0631\\u0648\\u0627\\u0646 \\u0686\\u0631\\u062f\\u0627\\u0648\\u0644\",\"\\u0645\\u0647\\u0631\\u0627\\u0646\"]', 5000, NULL, NULL),
(7, 'بوشهر', '[\"\\u0622\\u0628\\u067e\\u062e\\u0634\",\"\\u0627\\u0647\\u0631\\u0645\",\"\\u0628\\u0631\\u0627\\u0632\\u062c\\u0627\\u0646\",\"\\u0628\\u0646\\u062f\\u0631 \\u062f\\u064a\\u0631\",\"\\u0628\\u0646\\u062f\\u0631 \\u062f\\u064a\\u0644\\u0645\",\"\\u0628\\u0646\\u062f\\u0631 \\u0643\\u0646\\u06af\\u0627\\u0646\",\"\\u0628\\u0646\\u062f\\u0631 \\u06af\\u0646\\u0627\\u0648\\u0647\",\"\\u0628\\u0648\\u0634\\u0647\\u0631\",\"\\u062a\\u0646\\u06af\\u0633\\u062a\\u0627\\u0646\",\"\\u062c\\u0632\\u064a\\u0631\\u0647 \\u062e\\u0627\\u0631\\u0643\",\"\\u062c\\u0645 (\\u0648\\u0644\\u0627\\u064a\\u062a)\",\"\\u062e\\u0648\\u0631\\u0645\\u0648\\u062c\",\"\\u062f\\u0634\\u062a\\u0633\\u062a\\u0627\\u0646 - \\u0634\\u0628\\u0627\\u0646\\u06a9\\u0627\\u0631\\u0647\",\"\\u062f\\u0644\\u0648\\u0627\\u0631\",\"\\u0639\\u0633\\u0644\\u0648\\u06cc\\u0647\"]', 5000, NULL, NULL),
(8, 'تهران', '[\"\\u0627\\u0633\\u0644\\u0627\\u0645\\u0634\\u0647\\u0631\",\"\\u0628\\u0648\\u0645\\u0647\\u0646\",\"\\u067e\\u0627\\u0643\\u062f\\u0634\\u062a\",\"\\u062a\\u0647\\u0631\\u0627\\u0646\",\"\\u0686\\u0647\\u0627\\u0631\\u062f\\u0627\\u0646\\u06af\\u0647\",\"\\u062f\\u0645\\u0627\\u0648\\u0646\\u062f\",\"\\u0631\\u0648\\u062f\\u0647\\u0646\",\"\\u0631\\u064a\",\"\\u0634\\u0631\\u064a\\u0641 \\u0622\\u0628\\u0627\\u062f\",\"\\u0634\\u0647\\u0631 \\u0631\\u0628\\u0627\\u0637 \\u0643\\u0631\\u064a\\u0645\",\"\\u0634\\u0647\\u0631 \\u0634\\u0647\\u0631\\u064a\\u0627\\u0631\",\"\\u0641\\u0634\\u0645\",\"\\u0641\\u064a\\u0631\\u0648\\u0632\\u0643\\u0648\\u0647\",\"\\u0642\\u062f\\u0633\",\"\\u0643\\u0647\\u0631\\u064a\\u0632\\u0643\",\"\\u0644\\u0648\\u0627\\u0633\\u0627\\u0646 \\u0628\\u0632\\u0631\\u06af\",\"\\u0645\\u0644\\u0627\\u0631\\u062f\",\"\\u0648\\u0631\\u0627\\u0645\\u064a\\u0646\"]', 5000, NULL, NULL),
(9, 'چهارمحال بختياري', '[\"\\u0627\\u0631\\u062f\\u0644\",\"\\u0628\\u0631\\u0648\\u062c\\u0646\",\"\\u0686\\u0644\\u06af\\u0631\\u062f (\\u0643\\u0648\\u0647\\u0631\\u0646\\u06af)\",\"\\u0633\\u0627\\u0645\\u0627\\u0646\",\"\\u0634\\u0647\\u0631\\u0643\\u0631\\u062f\",\"\\u0641\\u0627\\u0631\\u0633\\u0627\\u0646\",\"\\u0644\\u0631\\u062f\\u06af\\u0627\\u0646\"]', 5000, NULL, NULL),
(10, 'خراسان جنوبي', '[\"\\u0628\\u0634\\u0631\\u0648\\u06cc\\u0647\",\"\\u0628\\u064a\\u0631\\u062c\\u0646\\u062f\",\"\\u062e\\u0636\\u0631\\u06cc\",\"\\u062e\\u0648\\u0633\\u0641\",\"\\u0633\\u0631\\u0627\\u06cc\\u0627\\u0646\",\"\\u0633\\u0631\\u0628\\u064a\\u0634\\u0647\",\"\\u0637\\u0628\\u0633\",\"\\u0641\\u0631\\u062f\\u0648\\u0633\",\"\\u0642\\u0627\\u0626\\u0646\",\"\\u0646\\u0647\\u0628\\u0646\\u062f\\u0627\\u0646\"]', 5000, NULL, NULL),
(11, 'خراسان رضوي', '[\"\\u0628\\u062c\\u0633\\u062a\\u0627\\u0646\",\"\\u0628\\u0631\\u062f\\u0633\\u0643\\u0646\",\"\\u062a\\u0627\\u064a\\u0628\\u0627\\u062f\",\"\\u062a\\u0631\\u0628\\u062a \\u062c\\u0627\\u0645\",\"\\u062a\\u0631\\u0628\\u062a \\u062d\\u064a\\u062f\\u0631\\u064a\\u0647\",\"\\u062c\\u063a\\u062a\\u0627\\u06cc\",\"\\u062c\\u0648\\u06cc\\u0646\",\"\\u0686\\u0646\\u0627\\u0631\\u0627\\u0646\",\"\\u062e\\u0644\\u06cc\\u0644 \\u0622\\u0628\\u0627\\u062f\",\"\\u062e\\u0648\\u0627\\u0641\",\"\\u062f\\u0631\\u06af\\u0632\",\"\\u0631\\u0634\\u062a\\u062e\\u0648\\u0627\\u0631\",\"\\u0633\\u0628\\u0632\\u0648\\u0627\\u0631\",\"\\u0633\\u0631\\u062e\\u0633\",\"\\u0637\\u0628\\u0633\",\"\\u0637\\u0631\\u0642\\u0628\\u0647\",\"\\u0641\\u0631\\u064a\\u0645\\u0627\\u0646\",\"\\u0642\\u0648\\u0686\\u0627\\u0646\",\"\\u0643\\u0627\\u0634\\u0645\\u0631\",\"\\u0643\\u0644\\u0627\\u062a\",\"\\u06af\\u0646\\u0627\\u0628\\u0627\\u062f\",\"\\u0645\\u0634\\u0647\\u062f\",\"\\u0646\\u064a\\u0634\\u0627\\u0628\\u0648\\u0631\"]', 5000, NULL, NULL),
(12, 'خراسان شمالي', '[\"\\u0622\\u0634\\u062e\\u0627\\u0646\\u0647\\u060c \\u0645\\u0627\\u0646\\u0647 \\u0648 \\u0633\\u0645\\u0631\\u0642\\u0627\\u0646\",\"\\u0627\\u0633\\u0641\\u0631\\u0627\\u064a\\u0646\",\"\\u0628\\u062c\\u0646\\u0648\\u0631\\u062f\",\"\\u062c\\u0627\\u062c\\u0631\\u0645\",\"\\u0634\\u064a\\u0631\\u0648\\u0627\\u0646\",\"\\u0641\\u0627\\u0631\\u0648\\u062c\"]', 5000, NULL, NULL),
(13, 'خوزستان', '[\"\\u0622\\u0628\\u0627\\u062f\\u0627\\u0646\",\"\\u0627\\u0645\\u064a\\u062f\\u064a\\u0647\",\"\\u0627\\u0646\\u062f\\u064a\\u0645\\u0634\\u0643\",\"\\u0627\\u0647\\u0648\\u0627\\u0632\",\"\\u0627\\u064a\\u0630\\u0647\",\"\\u0628\\u0627\\u063a \\u0645\\u0644\\u0643\",\"\\u0628\\u0633\\u062a\\u0627\\u0646\",\"\\u0628\\u0646\\u062f\\u0631 \\u0645\\u0627\\u0647\\u0634\\u0647\\u0631\",\"\\u0628\\u0646\\u062f\\u0631\\u0627\\u0645\\u0627\\u0645 \\u062e\\u0645\\u064a\\u0646\\u064a\",\"\\u0628\\u0647\\u0628\\u0647\\u0627\\u0646\",\"\\u062e\\u0631\\u0645\\u0634\\u0647\\u0631\",\"\\u062f\\u0632\\u0641\\u0648\\u0644\",\"\\u0631\\u0627\\u0645\\u0634\\u06cc\\u0631\",\"\\u0631\\u0627\\u0645\\u0647\\u0631\\u0645\\u0632\",\"\\u0633\\u0648\\u0633\\u0646\\u06af\\u0631\\u062f\",\"\\u0634\\u0627\\u062f\\u06af\\u0627\\u0646\",\"\\u0634\\u0648\\u0634\",\"\\u0634\\u0648\\u0634\\u062a\\u0631\",\"\\u0644\\u0627\\u0644\\u064a\",\"\\u0645\\u0633\\u062c\\u062f \\u0633\\u0644\\u064a\\u0645\\u0627\\u0646\",\"\\u0647\\u0646\\u062f\\u064a\\u062c\\u0627\\u0646\",\"\\u0647\\u0648\\u064a\\u0632\\u0647\"]', 5000, NULL, NULL),
(14, 'زنجان', '[\"\\u0622\\u0628 \\u0628\\u0631 (\\u0637\\u0627\\u0631\\u0645)\",\"\\u0627\\u0628\\u0647\\u0631\",\"\\u062e\\u0631\\u0645\\u062f\\u0631\\u0647\",\"\\u0632\\u0631\\u06cc\\u0646 \\u0622\\u0628\\u0627\\u062f (\\u0627\\u06cc\\u062c\\u0631\\u0648\\u062f)\",\"\\u0632\\u0646\\u062c\\u0627\\u0646\",\"\\u0642\\u06cc\\u062f\\u0627\\u0631 (\\u062e\\u062f\\u0627 \\u0628\\u0646\\u062f\\u0647)\",\"\\u0645\\u0627\\u0647\\u0646\\u0634\\u0627\\u0646\"]', 5000, NULL, NULL),
(15, 'سمنان', '[\"\\u0627\\u064a\\u0648\\u0627\\u0646\\u0643\\u064a\",\"\\u0628\\u0633\\u0637\\u0627\\u0645\",\"\\u062f\\u0627\\u0645\\u063a\\u0627\\u0646\",\"\\u0633\\u0631\\u062e\\u0647\",\"\\u0633\\u0645\\u0646\\u0627\\u0646\",\"\\u0634\\u0627\\u0647\\u0631\\u0648\\u062f\",\"\\u0634\\u0647\\u0645\\u06cc\\u0631\\u0632\\u0627\\u062f\",\"\\u06af\\u0631\\u0645\\u0633\\u0627\\u0631\",\"\\u0645\\u0647\\u062f\\u06cc\\u0634\\u0647\\u0631\"]', 5000, NULL, NULL),
(16, 'سيستان و بلوچستان', '[\"\\u0627\\u064a\\u0631\\u0627\\u0646\\u0634\\u0647\\u0631\",\"\\u0686\\u0627\\u0628\\u0647\\u0627\\u0631\",\"\\u062e\\u0627\\u0634\",\"\\u0631\\u0627\\u0633\\u0643\",\"\\u0632\\u0627\\u0628\\u0644\",\"\\u0632\\u0627\\u0647\\u062f\\u0627\\u0646\",\"\\u0633\\u0631\\u0627\\u0648\\u0627\\u0646\",\"\\u0633\\u0631\\u0628\\u0627\\u0632\",\"\\u0645\\u064a\\u0631\\u062c\\u0627\\u0648\\u0647\",\"\\u0646\\u064a\\u0643\\u0634\\u0647\\u0631\"]', 5000, NULL, NULL),
(17, 'فارس', '[\"\\u0622\\u0628\\u0627\\u062f\\u0647\",\"\\u0622\\u0628\\u0627\\u062f\\u0647 \\u0637\\u0634\\u0643\",\"\\u0627\\u0631\\u062f\\u0643\\u0627\\u0646\",\"\\u0627\\u0631\\u0633\\u0646\\u062c\\u0627\\u0646\",\"\\u0627\\u0633\\u062a\\u0647\\u0628\\u0627\\u0646\",\"\\u0627\\u0634\\u0643\\u0646\\u0627\\u0646\",\"\\u0627\\u0642\\u0644\\u064a\\u062f\",\"\\u0627\\u0648\\u0632\",\"\\u0627\\u06cc\\u062c\",\"\\u0627\\u06cc\\u0632\\u062f \\u062e\\u0648\\u0627\\u0633\\u062a\",\"\\u0628\\u0627\\u0628 \\u0627\\u0646\\u0627\\u0631\",\"\\u0628\\u0627\\u0644\\u0627\\u062f\\u0647\",\"\\u0628\\u0646\\u0627\\u0631\\u0648\\u064a\\u0647\",\"\\u0628\\u0647\\u0645\\u0646\",\"\\u0628\\u0648\\u0627\\u0646\\u0627\\u062a\",\"\\u0628\\u064a\\u0631\\u0645\",\"\\u0628\\u06cc\\u0636\\u0627\",\"\\u062c\\u0646\\u062a \\u0634\\u0647\\u0631\",\"\\u062c\\u0647\\u0631\\u0645\",\"\\u062d\\u0627\\u062c\\u064a \\u0622\\u0628\\u0627\\u062f-\\u0632\\u0631\\u06cc\\u0646 \\u062f\\u0634\\u062a\",\"\\u062e\\u0627\\u0648\\u0631\\u0627\\u0646\",\"\\u062e\\u0631\\u0627\\u0645\\u0647\",\"\\u062e\\u0634\\u062a\",\"\\u062e\\u0641\\u0631\",\"\\u062e\\u0646\\u062c\",\"\\u062e\\u0648\\u0631\",\"\\u062f\\u0627\\u0631\\u0627\\u0628\",\"\\u0631\\u0648\\u0646\\u064a\\u0632 \\u0639\\u0644\\u064a\\u0627\",\"\\u0632\\u0627\\u0647\\u062f\\u0634\\u0647\\u0631\",\"\\u0632\\u0631\\u0642\\u0627\\u0646\",\"\\u0633\\u062f\\u0647\",\"\\u0633\\u0631\\u0648\\u0633\\u062a\\u0627\\u0646\",\"\\u0633\\u0639\\u0627\\u062f\\u062a \\u0634\\u0647\\u0631\",\"\\u0633\\u0648\\u0631\\u0645\\u0642\",\"\\u0634\\u0634\\u062f\\u0647\",\"\\u0634\\u064a\\u0631\\u0627\\u0632\",\"\\u0635\\u063a\\u0627\\u062f\",\"\\u0635\\u0641\\u0627\\u0634\\u0647\\u0631\",\"\\u0639\\u0644\\u0627\\u0621 \\u0645\\u0631\\u0648\\u062f\\u0634\\u062a\",\"\\u0639\\u0646\\u0628\\u0631\",\"\\u0641\\u0631\\u0627\\u0634\\u0628\\u0646\\u062f\",\"\\u0641\\u0633\\u0627\",\"\\u0641\\u064a\\u0631\\u0648\\u0632 \\u0622\\u0628\\u0627\\u062f\",\"\\u0642\\u0627\\u0626\\u0645\\u064a\\u0647\",\"\\u0642\\u0627\\u062f\\u0631 \\u0622\\u0628\\u0627\\u062f\",\"\\u0642\\u0637\\u0628 \\u0622\\u0628\\u0627\\u062f\",\"\\u0642\\u064a\\u0631\",\"\\u0643\\u0627\\u0632\\u0631\\u0648\\u0646\",\"\\u0643\\u0646\\u0627\\u0631 \\u062a\\u062e\\u062a\\u0647\",\"\\u06af\\u0631\\u0627\\u0634\",\"\\u0644\\u0627\\u0631\",\"\\u0644\\u0627\\u0645\\u0631\\u062f\",\"\\u0644\\u067e\\u0648\\u0626\\u06cc\",\"\\u0644\\u0637\\u064a\\u0641\\u064a\",\"\\u0645\\u0628\\u0627\\u0631\\u0643 \\u0622\\u0628\\u0627\\u062f \\u062f\\u064a\\u0632\",\"\\u0645\\u0631\\u0648\\u062f\\u0634\\u062a\",\"\\u0645\\u0634\\u0643\\u0627\\u0646\",\"\\u0645\\u0635\\u064a\\u0631\",\"\\u0645\\u0647\\u0631 \\u0641\\u0627\\u0631\\u0633(\\u06af\\u0644\\u0647 \\u062f\\u0627\\u0631)\",\"\\u0645\\u064a\\u0645\\u0646\\u062f\",\"\\u0646\\u0648\\u0628\\u0646\\u062f\\u06af\\u0627\\u0646\",\"\\u0646\\u0648\\u062f\\u0627\\u0646\",\"\\u0646\\u0648\\u0631\\u0622\\u0628\\u0627\\u062f\",\"\\u0646\\u064a \\u0631\\u064a\\u0632\",\"\\u06a9\\u0648\\u0627\\u0631\"]', 5000, NULL, NULL),
(18, 'قزوين', '[\"\\u0622\\u0628\\u064a\\u0643\",\"\\u0627\\u0644\\u0628\\u0631\\u0632\",\"\\u0628\\u0648\\u0626\\u064a\\u0646 \\u0632\\u0647\\u0631\\u0627\",\"\\u062a\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\",\"\\u0642\\u0632\\u0648\\u064a\\u0646\",\"\\u0645\\u062d\\u0645\\u0648\\u062f \\u0622\\u0628\\u0627\\u062f \\u0646\\u0645\\u0648\\u0646\\u0647\"]', 5000, NULL, NULL),
(19, 'قم', '[\"\\u0642\\u0645\"]', 5000, NULL, NULL),
(20, 'كردستان', '[\"\\u0628\\u0627\\u0646\\u0647\",\"\\u0628\\u064a\\u062c\\u0627\\u0631\",\"\\u062f\\u0647\\u06af\\u0644\\u0627\\u0646\",\"\\u062f\\u064a\\u0648\\u0627\\u0646\\u062f\\u0631\\u0647\",\"\\u0633\\u0642\\u0632\",\"\\u0633\\u0646\\u0646\\u062f\\u062c\",\"\\u0642\\u0631\\u0648\\u0647\",\"\\u0643\\u0627\\u0645\\u064a\\u0627\\u0631\\u0627\\u0646\",\"\\u0645\\u0631\\u064a\\u0648\\u0627\\u0646\"]', 5000, NULL, NULL),
(21, 'كرمان', '[\"\\u0628\\u0627\\u0628\\u0643\",\"\\u0628\\u0627\\u0641\\u062a\",\"\\u0628\\u0631\\u062f\\u0633\\u064a\\u0631\",\"\\u0628\\u0645\",\"\\u062c\\u064a\\u0631\\u0641\\u062a\",\"\\u0631\\u0627\\u0648\\u0631\",\"\\u0631\\u0641\\u0633\\u0646\\u062c\\u0627\\u0646\",\"\\u0632\\u0631\\u0646\\u062f\",\"\\u0633\\u064a\\u0631\\u062c\\u0627\\u0646\",\"\\u0643\\u0631\\u0645\\u0627\\u0646\",\"\\u0643\\u0647\\u0646\\u0648\\u062c\",\"\\u0645\\u0646\\u0648\\u062c\\u0627\\u0646\"]', 5000, NULL, NULL),
(22, 'كرمانشاه', '[\"\\u0627\\u0633\\u0644\\u0627\\u0645 \\u0622\\u0628\\u0627\\u062f \\u063a\\u0631\\u0628\",\"\\u067e\\u0627\\u0648\\u0647\",\"\\u062a\\u0627\\u0632\\u0647 \\u0622\\u0628\\u0627\\u062f- \\u062b\\u0644\\u0627\\u062b \\u0628\\u0627\\u0628\\u0627\\u062c\\u0627\\u0646\\u06cc\",\"\\u062c\\u0648\\u0627\\u0646\\u0631\\u0648\\u062f\",\"\\u0633\\u0631 \\u067e\\u0644 \\u0630\\u0647\\u0627\\u0628\",\"\\u0633\\u0646\\u0642\\u0631 \\u0643\\u0644\\u064a\\u0627\\u0626\\u064a\",\"\\u0635\\u062d\\u0646\\u0647\",\"\\u0642\\u0635\\u0631 \\u0634\\u064a\\u0631\\u064a\\u0646\",\"\\u0643\\u0631\\u0645\\u0627\\u0646\\u0634\\u0627\\u0647\",\"\\u0643\\u0646\\u06af\\u0627\\u0648\\u0631\",\"\\u06af\\u064a\\u0644\\u0627\\u0646 \\u063a\\u0631\\u0628\",\"\\u0647\\u0631\\u0633\\u064a\\u0646\"]', 5000, NULL, NULL),
(23, 'كهكيلويه و بويراحمد', '[\"\\u062f\\u0647\\u062f\\u0634\\u062a\",\"\\u062f\\u0648\\u06af\\u0646\\u0628\\u062f\\u0627\\u0646\",\"\\u0633\\u064a \\u0633\\u062e\\u062a- \\u062f\\u0646\\u0627\",\"\\u06af\\u0686\\u0633\\u0627\\u0631\\u0627\\u0646\",\"\\u064a\\u0627\\u0633\\u0648\\u062c\"]', 5000, NULL, NULL),
(24, 'گلستان', '[\"\\u0622\\u0632\\u0627\\u062f \\u0634\\u0647\\u0631\",\"\\u0622\\u0642 \\u0642\\u0644\\u0627\",\"\\u0627\\u0646\\u0628\\u0627\\u0631\\u0622\\u0644\\u0648\\u0645\",\"\\u0627\\u06cc\\u0646\\u0686\\u0647 \\u0628\\u0631\\u0648\\u0646\",\"\\u0628\\u0646\\u062f\\u0631 \\u06af\\u0632\",\"\\u062a\\u0631\\u0643\\u0645\\u0646\",\"\\u062c\\u0644\\u06cc\\u0646\",\"\\u062e\\u0627\\u0646 \\u0628\\u0628\\u06cc\\u0646\",\"\\u0631\\u0627\\u0645\\u064a\\u0627\\u0646\",\"\\u0633\\u0631\\u062e\\u0633 \\u06a9\\u0644\\u0627\\u062a\\u0647\",\"\\u0633\\u06cc\\u0645\\u06cc\\u0646 \\u0634\\u0647\\u0631\",\"\\u0639\\u0644\\u064a \\u0622\\u0628\\u0627\\u062f \\u0643\\u062a\\u0648\\u0644\",\"\\u0641\\u0627\\u0636\\u0644 \\u0622\\u0628\\u0627\\u062f\",\"\\u0643\\u0631\\u062f\\u0643\\u0648\\u064a\",\"\\u0643\\u0644\\u0627\\u0644\\u0647\",\"\\u06af\\u0627\\u0644\\u06cc\\u06a9\\u0634\",\"\\u06af\\u0631\\u06af\\u0627\\u0646\",\"\\u06af\\u0645\\u06cc\\u0634 \\u062a\\u067e\\u0647\",\"\\u06af\\u0646\\u0628\\u062f \\u0643\\u0627\\u0648\\u0648\\u0633\",\"\\u0645\\u0631\\u0627\\u0648\\u0647 \\u062a\\u067e\\u0647\",\"\\u0645\\u064a\\u0646\\u0648 \\u062f\\u0634\\u062a\",\"\\u0646\\u06af\\u06cc\\u0646 \\u0634\\u0647\\u0631\",\"\\u0646\\u0648\\u062f\\u0647 \\u062e\\u0627\\u0646\\u062f\\u0648\\u0632\",\"\\u0646\\u0648\\u06a9\\u0646\\u062f\\u0647\"]', 5000, NULL, NULL),
(25, 'گيلان', '[\"\\u0622\\u0633\\u062a\\u0627\\u0631\\u0627\",\"\\u0622\\u0633\\u062a\\u0627\\u0646\\u0647 \\u0627\\u0634\\u0631\\u0641\\u064a\\u0647\",\"\\u0627\\u0645\\u0644\\u0634\",\"\\u0628\\u0646\\u062f\\u0631\\u0627\\u0646\\u0632\\u0644\\u064a\",\"\\u062e\\u0645\\u0627\\u0645\",\"\\u0631\\u0634\\u062a\",\"\\u0631\\u0636\\u0648\\u0627\\u0646 \\u0634\\u0647\\u0631\",\"\\u0631\\u0648\\u062f \\u0633\\u0631\",\"\\u0631\\u0648\\u062f\\u0628\\u0627\\u0631\",\"\\u0633\\u064a\\u0627\\u0647\\u0643\\u0644\",\"\\u0634\\u0641\\u062a\",\"\\u0635\\u0648\\u0645\\u0639\\u0647 \\u0633\\u0631\\u0627\",\"\\u0641\\u0648\\u0645\\u0646\",\"\\u0643\\u0644\\u0627\\u0686\\u0627\\u064a\",\"\\u0644\\u0627\\u0647\\u064a\\u062c\\u0627\\u0646\",\"\\u0644\\u0646\\u06af\\u0631\\u0648\\u062f\",\"\\u0644\\u0648\\u0634\\u0627\\u0646\",\"\\u0645\\u0627\\u0633\\u0627\\u0644\",\"\\u0645\\u0627\\u0633\\u0648\\u0644\\u0647\",\"\\u0645\\u0646\\u062c\\u064a\\u0644\",\"\\u0647\\u0634\\u062a\\u067e\\u0631\"]', 5000, NULL, NULL),
(26, 'لرستان', '[\"\\u0627\\u0632\\u0646\\u0627\",\"\\u0627\\u0644\\u0634\\u062a\\u0631\",\"\\u0627\\u0644\\u064a\\u06af\\u0648\\u062f\\u0631\\u0632\",\"\\u0628\\u0631\\u0648\\u062c\\u0631\\u062f\",\"\\u067e\\u0644\\u062f\\u062e\\u062a\\u0631\",\"\\u062e\\u0631\\u0645 \\u0622\\u0628\\u0627\\u062f\",\"\\u062f\\u0648\\u0631\\u0648\\u062f\",\"\\u0633\\u067e\\u06cc\\u062f \\u062f\\u0634\\u062a\",\"\\u0643\\u0648\\u0647\\u062f\\u0634\\u062a\",\"\\u0646\\u0648\\u0631\\u0622\\u0628\\u0627\\u062f (\\u062e\\u0648\\u0632\\u0633\\u062a\\u0627\\u0646)\"]', 5000, NULL, NULL),
(27, 'مازندران', '[\"\\u0622\\u0645\\u0644\",\"\\u0628\\u0627\\u0628\\u0644\",\"\\u0628\\u0627\\u0628\\u0644\\u0633\\u0631\",\"\\u0628\\u0644\\u062f\\u0647\",\"\\u0628\\u0647\\u0634\\u0647\\u0631\",\"\\u067e\\u0644 \\u0633\\u0641\\u064a\\u062f\",\"\\u062a\\u0646\\u0643\\u0627\\u0628\\u0646\",\"\\u062c\\u0648\\u064a\\u0628\\u0627\\u0631\",\"\\u0686\\u0627\\u0644\\u0648\\u0633\",\"\\u062e\\u0631\\u0645 \\u0622\\u0628\\u0627\\u062f\",\"\\u0631\\u0627\\u0645\\u0633\\u0631\",\"\\u0631\\u0633\\u062a\\u0645 \\u06a9\\u0644\\u0627\",\"\\u0633\\u0627\\u0631\\u064a\",\"\\u0633\\u0644\\u0645\\u0627\\u0646\\u0634\\u0647\\u0631\",\"\\u0633\\u0648\\u0627\\u062f \\u0643\\u0648\\u0647\",\"\\u0641\\u0631\\u064a\\u062f\\u0648\\u0646 \\u0643\\u0646\\u0627\\u0631\",\"\\u0642\\u0627\\u0626\\u0645 \\u0634\\u0647\\u0631\",\"\\u06af\\u0644\\u0648\\u06af\\u0627\\u0647\",\"\\u0645\\u062d\\u0645\\u0648\\u062f\\u0622\\u0628\\u0627\\u062f\",\"\\u0645\\u0631\\u0632\\u0646 \\u0622\\u0628\\u0627\\u062f\",\"\\u0646\\u0643\\u0627\",\"\\u0646\\u0648\\u0631\",\"\\u0646\\u0648\\u0634\\u0647\\u0631\"]', 5000, NULL, NULL),
(28, 'مركزي', '[\"\\u0622\\u0634\\u062a\\u064a\\u0627\\u0646\",\"\\u0627\\u0631\\u0627\\u0643\",\"\\u062a\\u0641\\u0631\\u0634\",\"\\u062e\\u0645\\u064a\\u0646\",\"\\u062f\\u0644\\u064a\\u062c\\u0627\\u0646\",\"\\u0633\\u0627\\u0648\\u0647\",\"\\u0634\\u0627\\u0632\\u0646\\u062f\",\"\\u0645\\u062d\\u0644\\u0627\\u062a\",\"\\u06a9\\u0645\\u06cc\\u062c\\u0627\\u0646\"]', 5000, NULL, NULL),
(29, 'هرمزگان', '[\"\\u0627\\u0628\\u0648\\u0645\\u0648\\u0633\\u064a\",\"\\u0627\\u0646\\u06af\\u0647\\u0631\\u0627\\u0646\",\"\\u0628\\u0633\\u062a\\u0643\",\"\\u0628\\u0646\\u062f\\u0631 \\u062c\\u0627\\u0633\\u0643\",\"\\u0628\\u0646\\u062f\\u0631 \\u0644\\u0646\\u06af\\u0647\",\"\\u0628\\u0646\\u062f\\u0631\\u0639\\u0628\\u0627\\u0633\",\"\\u067e\\u0627\\u0631\\u0633\\u06cc\\u0627\\u0646\",\"\\u062d\\u0627\\u062c\\u064a \\u0622\\u0628\\u0627\\u062f\",\"\\u062f\\u0634\\u062a\\u06cc\",\"\\u062f\\u0647\\u0628\\u0627\\u0631\\u0632 (\\u0631\\u0648\\u062f\\u0627\\u0646)\",\"\\u0642\\u0634\\u0645\",\"\\u0643\\u064a\\u0634\",\"\\u0645\\u064a\\u0646\\u0627\\u0628\"]', 5000, NULL, NULL),
(30, 'همدان', '[\"\\u0627\\u0633\\u062f\\u0622\\u0628\\u0627\\u062f\",\"\\u0628\\u0647\\u0627\\u0631\",\"\\u062a\\u0648\\u064a\\u0633\\u0631\\u0643\\u0627\\u0646\",\"\\u0631\\u0632\\u0646\",\"\\u0643\\u0628\\u0648\\u062f\\u0631 \\u0627\\u0647\\u0646\\u06af\",\"\\u0645\\u0644\\u0627\\u064a\\u0631\",\"\\u0646\\u0647\\u0627\\u0648\\u0646\\u062f\",\"\\u0647\\u0645\\u062f\\u0627\\u0646\"]', 5000, NULL, NULL),
(31, 'يزد', '[\"\\u0627\\u0628\\u0631\\u0643\\u0648\\u0647\",\"\\u0627\\u0631\\u062f\\u0643\\u0627\\u0646\",\"\\u0627\\u0634\\u0643\\u0630\\u0631\",\"\\u0628\\u0627\\u0641\\u0642\",\"\\u062a\\u0641\\u062a\",\"\\u0645\\u0647\\u0631\\u064a\\u0632\",\"\\u0645\\u064a\\u0628\\u062f\",\"\\u0647\\u0631\\u0627\\u062a\",\"\\u064a\\u0632\\u062f\"]', 5000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qas`
--

CREATE TABLE `qas` (
  `id` int(10) UNSIGNED NOT NULL,
  `quest` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `label`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'مدیریت کل ', NULL, NULL, NULL),
(2, 'manager', 'مدیریت سفارشات', NULL, NULL, NULL),
(3, 'customer', 'مشتری', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles_users`
--

CREATE TABLE `roles_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles_users`
--

INSERT INTO `roles_users` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `type` tinyint(4) NOT NULL DEFAULT 1,
  `selected` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_registers`
--

CREATE TABLE `sms_registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `socials`
--

CREATE TABLE `socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `lname` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `province_id` int(10) UNSIGNED DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_status` int(11) DEFAULT NULL,
  `filled` int(11) DEFAULT NULL,
  `mac` varchar(17) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `lname`, `sex`, `postal_code`, `phone`, `avatar`, `province_id`, `city`, `status`, `address`, `sms_status`, `filled`, `mac`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'امیر', 'شیردل', 1, '123456789', '09024809750', '/public/upload/amirex.jpg', 1, 'مشهد', 1, 'قاسم آباد بلوار شریعتی ', 1, 1, NULL, 'amirex128@gmail.com', NULL, '$2y$10$qtL0cUPJGHAjTNDbIMMQZe5EOgFVarwfoSSwWVZduonJRFpqgkUba', NULL, '2019-07-07 04:34:20', '2019-07-07 04:34:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categoricals`
--
ALTER TABLE `categoricals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designs`
--
ALTER TABLE `designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `design_product`
--
ALTER TABLE `design_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `qas`
--
ALTER TABLE `qas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles_users`
--
ALTER TABLE `roles_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_registers`
--
ALTER TABLE `sms_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socials`
--
ALTER TABLE `socials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_mac_unique` (`mac`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categoricals`
--
ALTER TABLE `categoricals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `designs`
--
ALTER TABLE `designs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `design_product`
--
ALTER TABLE `design_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `permissions_roles`
--
ALTER TABLE `permissions_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `qas`
--
ALTER TABLE `qas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles_users`
--
ALTER TABLE `roles_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_registers`
--
ALTER TABLE `sms_registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `socials`
--
ALTER TABLE `socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
