-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 03:17 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'nokia', 'nokia is good', 1, '2018-07-29 10:16:00', '2018-07-29 10:16:00'),
(2, 'Nokia', 'Nokia is best', 1, '2018-07-31 09:31:55', '2018-07-31 09:31:55'),
(3, 'Noah', 'Noah is best', 1, '2018-07-31 09:32:28', '2018-07-31 09:32:28');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'clothes', 'nice clothes', 0, '2018-07-29 10:09:33', '2018-07-29 10:09:40'),
(2, 'T-shirt', 'best T-shirt', 1, '2018-07-29 10:17:07', '2018-07-29 10:17:07'),
(3, 'Car', 'best Car', 1, '2018-07-31 09:30:17', '2018-07-31 09:30:17'),
(4, 'Mobile', 'best Mobile', 1, '2018-07-31 09:30:36', '2018-07-31 09:30:36'),
(5, 'Property', 'Luxuries Property', 1, '2018-07-31 09:31:21', '2018-07-31 09:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(11, 'Himel', 'Khan', 'habibadnan8540@gmail.com', '$2y$10$8Dd53ptaDKuAQ2cUBSI/3uZfYnMJb8uiC/4HZRRCaOrb6QB7ihbLC', '01770936854', 'Kurigram', '2018-08-03 04:11:02', '2018-08-03 04:11:02');

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
(3, '2018_07_29_155441_create_categories_table', 2),
(4, '2018_07_29_155623_create_brands_table', 3),
(5, '2018_07_29_155747_create_products_table', 4),
(6, '2018_08_01_150958_create_customers_table', 5),
(7, '2018_08_01_162100_create_shippings_table', 6),
(8, '2018_08_02_041458_create_orders_table', 7),
(9, '2018_08_02_041519_create_payments_table', 7),
(10, '2018_08_02_041540_create_order_details_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `oreder_total` double(10,2) NOT NULL,
  `oreder_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `shipping_id`, `oreder_total`, `oreder_status`, `created_at`, `updated_at`) VALUES
(16, 11, 5, 280090.00, 'pending', '2018-08-03 04:11:54', '2018-08-03 04:11:54'),
(17, 11, 6, 90405.00, 'pending', '2018-08-03 10:53:31', '2018-08-03 10:53:31'),
(18, 11, 7, 900290.00, 'pending', '2018-08-03 10:56:22', '2018-08-03 10:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(22, 16, 4, 'Samsung Galaxy s-8', 10000.00, 9, '2018-08-03 04:11:54', '2018-08-03 04:11:54'),
(23, 16, 5, 'I-phone-X', 10000.00, 9, '2018-08-03 04:11:54', '2018-08-03 04:11:54'),
(24, 16, 3, 'Himel house', 10000.00, 10, '2018-08-03 04:11:55', '2018-08-03 04:11:55'),
(25, 17, 3, 'Himel house', 10000.00, 9, '2018-08-03 10:53:31', '2018-08-03 10:53:31'),
(26, 17, 1, 'Armani T-shirt', 33.00, 9, '2018-08-03 10:53:31', '2018-08-03 10:53:31'),
(27, 17, 2, 'Bmw Car', 2.00, 9, '2018-08-03 10:53:31', '2018-08-03 10:53:31'),
(28, 18, 4, 'Samsung Galaxy s-8', 10000.00, 90, '2018-08-03 10:56:22', '2018-08-03 10:56:22'),
(29, 18, 2, 'Bmw Car', 2.00, 100, '2018-08-03 10:56:22', '2018-08-03 10:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('habibadnan6854@gmail.com', '$2y$10$J6ixJnukPA2hhHAgajZw0.gRvbBoQouFX.FVUSm80.ZZv9Lha1pDG', '2018-07-31 02:35:36');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(16, 16, 'cash', 'pending', '2018-08-03 04:11:54', '2018-08-03 04:11:54'),
(17, 17, 'cash', 'pending', '2018-08-03 10:53:31', '2018-08-03 10:53:31'),
(18, 18, 'cash', 'pending', '2018-08-03 10:56:22', '2018-08-03 10:56:22');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `publication_status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_id`, `brand_id`, `product_name`, `short_description`, `long_description`, `product_image`, `quantity`, `product_price`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'Armani T-shirt', 'rtg5y64u6 4', 'yu64u 6u6u', 'product-image/barmuda1.jpg', 23, 33.00, 1, '2018-07-29 10:17:46', '2018-07-29 10:18:08'),
(2, 3, 3, 'Bmw Car', 'Bmw Car is very luxuries', 'Bmw Car is very luxuries Bmw Car is very luxuries Bmw Car is very luxuries Bmw Car is very luxuries', 'product-image/bus.jpg', 2, 2.00, 1, '2018-07-31 09:33:29', '2018-07-31 09:33:29'),
(3, 5, 1, 'Himel house', 'Himel house is bestHimel house is best', 'Himel house is bestHimel house is best Himel house is bestHimel house is best', 'product-image/merin-drive.jpg', 1, 10000.00, 1, '2018-07-31 09:41:12', '2018-07-31 09:41:12'),
(4, 4, 1, 'Samsung Galaxy s-8', 'Samsung Galaxy s-8 is best', 'Samsung Galaxy s-8 is best Samsung Galaxy s-8 is best', 'product-image/iphone4.jpg', 12, 10000.00, 1, '2018-07-31 09:42:36', '2018-07-31 09:42:36'),
(5, 4, 2, 'I-phone-X', 'I-phone-X is best', 'I-phone-X is best I-phone-X is best', 'product-image/iphone2.jpg', 12, 10000.00, 1, '2018-07-31 09:43:53', '2018-07-31 09:43:53'),
(6, 2, 1, 'T-shirt Armani', 'Armani T-shirt is best', 'Armani T-shirt is best  Armani T-shirt is best', 'product-image/b1.jpg', 3, 20000.00, 1, '2018-08-04 09:13:32', '2018-08-04 09:13:32');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `full_name`, `email`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(5, 'Hasanur Rahman', 'habibadnan8540@gmail.com', '01770936854', 'Razarhat , Kurigram', '2018-08-03 04:11:46', '2018-08-03 04:11:46'),
(6, 'Himel Khan', 'habibadnan8540@gmail.com', '01770936854', 'Kurigram', '2018-08-03 10:53:27', '2018-08-03 10:53:27'),
(7, 'hasanur rahman khan', 'habibadnan8540@gmail.com', '0177', 'Nazim khan', '2018-08-03 10:56:18', '2018-08-03 10:56:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Himel khan', 'habibadnan6854@gmail.com', '$2y$10$vJnIUGUGuqdqhQkPMoPVsu2cPPSAGv38wwxpWpb1GX5objCHhZUzu', '2X2jw54AtJ9nJ0GynlvfP5cL1dSn0WRIJjPoA08XWJ5BlV0JmbWMhknkB4Xk', '2018-07-29 09:52:12', '2018-07-29 09:52:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
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
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
