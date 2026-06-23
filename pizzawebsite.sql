-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 23, 2026 at 05:18 PM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pizzawebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'VEG PIZZA', 'A delight for veggie lovers! Choose from our wide range of delicious vegetarian pizzas, it\\\'s softer and tastier', 'menu_images/card-1.jpg', '2025-03-04 05:47:28', '2025-03-04 05:47:28', NULL),
(2, 'NON-VEG PIZZA', 'Choose your favourite non-veg pizzas from the Domino\\\'s Pizza menu. Get fresh non-veg pizza with your choice of crusts & toppings', 'menu_images/card-2.jpg', '2025-03-04 05:48:01', '2025-03-04 05:48:01', NULL),
(3, 'PIZZA MANIA', 'Indulge into mouth-watering taste of Pizza mania range, perfect answer to all your food cravings', 'menu_images/card-3.jpg', '2025-03-04 05:48:36', '2025-03-04 05:48:36', NULL),
(4, 'SIDES ORDERS', 'Complement your pizza with wide range of sides available at Domino\\\'s Pizza India', 'menu_images/card-4.jpg', '2025-03-04 05:49:06', '2025-03-04 05:49:06', NULL),
(5, 'BEVERAGES', 'Complement your pizza with wide range of beverages available at Domino\\\'s Pizza India', 'menu_images/card-5.jpg', '2025-03-04 05:49:45', '2025-03-04 05:49:45', NULL),
(6, 'CHOICE OF CRUSTS', 'Fresh Pan Pizza Tastiest Pan Pizza. ... Domino\\\'s freshly made pan-baked pizza; deliciously soft ,buttery,extra cheesy and delightfully crunchy.', 'menu_images/card-6.jpg', '2025-03-04 05:50:20', '2025-03-04 05:50:20', NULL),
(7, 'BURGER PIZZA', 'Domino’s Pizza Introducing all new Burger Pizza with the tag line looks like a burger, tastes like a pizza. Burger Pizza is burger sized but comes in a small pizza box. It is come with pizza toppings such as herbs, vegetables, tomato sauce and mozzarella', 'menu_images/card-7.jpg', '2025-03-04 05:50:59', '2025-03-04 05:50:59', NULL),
(8, 'CHOICE OF TOPPINGS', 'CHOICE OF TOPPINGS', 'menu_images/card-8.jpg', '2025-03-04 05:51:21', '2025-03-04 05:51:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0000_02_02_114522_create_categories_table', 1),
(2, '0000_02_25_181045_create_pizzas_table', 1),
(3, '2014_10_12_000000_create_users_table', 1),
(4, '2014_10_12_100000_create_password_resets_table', 1),
(5, '2019_08_19_000000_create_failed_jobs_table', 1),
(6, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2025_03_04_141935_add_deleted_at_to_users_table', 1),
(8, '2025_03_20_110322_add_deleted_at_to_categories_table', 1),
(9, '2025_03_22_154353_add_deleted_at_to_pizzas', 1),
(10, '2025_03_22_162542_create_view_cart_table', 1),
(11, '2025_03_29_011832_create_orders_table', 1),
(12, '2025_03_29_015044_create_orderitems_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

DROP TABLE IF EXISTS `orderitems`;
CREATE TABLE IF NOT EXISTS `orderitems` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `orderId` bigint UNSIGNED NOT NULL,
  `pizzaId` bigint UNSIGNED NOT NULL,
  `itemQuantity` bigint NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orderitems_orderid_foreign` (`orderId`),
  KEY `orderitems_pizzaid_foreign` (`pizzaId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `orderId`, `pizzaId`, `itemQuantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2025-12-01 10:45:10', '2025-12-01 10:45:10'),
(2, 2, 1, 1, '2025-12-01 11:58:01', '2025-12-01 11:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` bigint UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipCode` bigint NOT NULL,
  `phoneNo` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` bigint NOT NULL,
  `paymentMode` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = cash delivery, 1 = online',
  `orderStatus` enum('0','1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = Order placed, 1 = Order confirmed, 2 = Preparing, 3 = On the way, 4 = Delivered, 5 = Denied, 6 = Cancelled',
  `OrderDate` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`orderId`),
  KEY `orders_userid_foreign` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderId`, `userId`, `address`, `zipCode`, `phoneNo`, `amount`, `paymentMode`, `orderStatus`, `OrderDate`, `created_at`, `updated_at`) VALUES
(1, 1, '123, gujarat', 380055, '1234567890', 99, '0', '0', '2025-12-01 16:15:10', '2025-12-01 10:45:10', '2025-12-01 10:45:10'),
(2, 9, '123, gujarat', 380055, '1234567890', 99, '0', '0', '2025-12-01 17:28:01', '2025-12-01 11:58:01', '2025-12-01 11:58:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pizzas`
--

DROP TABLE IF EXISTS `pizzas`;
CREATE TABLE IF NOT EXISTS `pizzas` (
  `pizzaId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pizzaName` varchar(21) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pizzaPrice` int NOT NULL,
  `pizzaDesc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pizzaCategorieId` bigint UNSIGNED NOT NULL,
  `pizzaPhoto` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`pizzaId`),
  UNIQUE KEY `pizzas_pizzaname_unique` (`pizzaName`),
  KEY `pizzas_pizzacategorieid_foreign` (`pizzaCategorieId`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`pizzaId`, `pizzaName`, `pizzaPrice`, `pizzaDesc`, `pizzaCategorieId`, `pizzaPhoto`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Margherita', 99, 'A hugely popular margherita, with a deliciously tangy single cheese topping', 1, 'pizza_images/pizza-1.jpg', '2025-03-04 05:53:41', '2025-03-04 05:53:41', NULL),
(2, 'Cheese Margherita', 199, 'The ever-popular Margherita - loaded with extra cheese... oodies of it', 1, 'pizza_images/pizza-2.jpg', '2025-03-04 05:58:59', '2025-03-04 05:58:59', NULL),
(3, 'Farm House', 149, 'A pizza that goes ballistic on veggies! Check out this mouth watering overload of crunchy, crisp capsicum, succulent mushrooms and fresh tomatoes', 1, 'pizza_images/pizza-3.jpg', '2025-03-04 05:59:50', '2025-03-04 05:59:50', NULL),
(4, 'Peppy Paneer', 249, 'Chunky paneer with crisp capsicum and spicy red pepper - quite a mouthful!', 1, 'pizza_images/pizza-4.jpg', '2025-03-04 06:09:34', '2025-03-04 06:09:34', NULL),
(5, 'Mexican Green Wave', 149, 'A pizza loaded with crunchy onions, crisp capsicum, juicy tomatoes and jalapeno with a liberal sprinkling of exotic Mexican herbs.', 1, 'pizza_images/pizza-5.jpg', '2025-03-04 06:13:21', '2025-03-04 06:13:21', NULL),
(6, 'Deluxe Veggie', 319, 'For a vegetarian looking for a BIG treat that goes easy on the spices, this one\\\'s got it all.. The onions, the capsicum, those delectable mushrooms - with paneer and golden corn to top it all.', 1, 'pizza_images/pizza-6.jpg', '2025-03-04 06:21:15', '2025-03-04 06:21:15', NULL),
(7, 'Veg Extravaganza', 299, 'A pizza that decidedly staggers under an overload of golden corn, exotic black olives, crunchy onions, crisp capsicum, succulent mushrooms, juicyfresh tomatoes and jalapeno - with extra cheese to go all around.', 1, 'pizza_images/pizza-7.jpg', '2025-03-04 06:21:53', '2025-03-04 06:21:53', NULL),
(8, 'Cheese N Corn', 199, 'Cheese I Golden Corn', 1, 'pizza_images/pizza-8.jpg', '2025-03-04 06:22:30', '2025-03-04 06:22:30', NULL),
(9, 'PANEER MAKHANI', 219, 'Paneer and Capsicum on Makhani Sauce', 1, 'pizza_images/pizza-9.jpg', '2025-03-04 06:23:04', '2025-03-04 06:23:04', NULL),
(10, 'VEGGIE PARADISE', 299, 'Goldern Corn, Black Olives, Capsicum & Red Paprika', 1, 'pizza_images/pizza-10.jpg', '2025-03-04 06:23:40', '2025-03-04 06:23:40', NULL),
(11, 'FRESH VEGGIE', 149, 'Onion I Capsicum', 1, 'pizza_images/pizza-11.jpg', '2025-03-04 06:24:12', '2025-03-04 06:24:12', NULL),
(12, 'Tandoori Paneer', 349, 'It is hot. It is spicy. It is oh-so-Indian. Tandoori paneer with capsicum I red paprika I mint mayo', 1, 'pizza_images/pizza-12.jpg', '2025-03-04 06:24:53', '2025-03-04 06:24:53', NULL),
(13, 'BARBECUE CHICKEN', 199, 'Pepper Barbecue Chicken I Cheese', 2, 'pizza_images/pizza-13.jpg', '2025-03-04 06:25:41', '2025-03-04 06:25:41', NULL),
(14, 'CHICKEN SAUSAGE', 249, 'Chicken Sausage I Cheese', 2, 'pizza_images/pizza-14.jpg', '2025-03-04 06:26:29', '2025-03-04 06:26:29', NULL),
(15, 'Chicken Delight', 249, 'Mmm! Barbeque chicken with a topping of golden corn loaded with extra cheese. Worth its weight in gold!', 2, 'pizza_images/pizza-15.jpg', '2025-03-04 06:27:33', '2025-03-04 06:27:33', NULL),
(16, 'Non Veg Supreme', 399, 'Bite into supreme delight of Black Olives, Onions, Grilled Mushrooms, Pepper BBQ Chicken, Peri-Peri Chicken, Grilled Chicken Rashers', 2, 'pizza_images/pizza-16.jpg', '2025-03-04 06:28:16', '2025-03-04 06:28:16', NULL),
(17, 'Chicken Dominator', 319, 'Treat your taste buds with Double Pepper Barbecue Chicken, Peri-Peri Chicken, Chicken Tikka & Grilled Chicken Rashers', 2, 'pizza_images/pizza-17.jpg', '2025-03-04 06:29:00', '2025-03-04 06:29:00', NULL),
(18, 'PEPPER BARBECUE', 249, 'Pepper Barbecue Chicken I Onion', 2, 'pizza_images/pizza-18.jpg', '2025-03-04 06:40:04', '2025-03-04 06:40:04', NULL),
(19, 'CHICKEN FIESTA', 199, 'Grilled Chicken Rashers I Peri-Peri Chicken I Onion I Capsicum', 2, 'pizza_images/pizza-19.jpg', '2025-03-04 06:41:42', '2025-03-04 06:41:42', NULL),
(20, 'Chicken Tikka', 349, 'The wholesome flavour of tandoori masala with Chicken tikka I onion I red paprika I mint mayo', 2, 'pizza_images/pizza-20.jpg', '2025-03-04 06:42:28', '2025-03-04 06:42:28', NULL),
(21, 'TOMATO', 99, 'Juicy tomato in a flavourful combination with cheese I tangy sauce', 3, 'pizza_images/pizza-21.jpg', '2025-03-04 06:46:27', '2025-03-04 06:46:27', NULL),
(22, 'VEG LOADED', 149, 'Tomato | Grilled Mushroom |Jalapeno |Golden Corn | Beans in a fresh pan crust', 3, 'pizza_images/pizza-22.jpg', '2025-03-04 06:47:05', '2025-03-04 06:47:05', NULL),
(23, 'CHEESY', 99, 'Orange Cheddar Cheese I Mozzarella', 3, 'pizza_images/pizza-23.jpg', '2025-03-04 06:47:39', '2025-03-04 06:47:39', NULL),
(24, 'CAPSICUM', 99, 'Capsicum', 3, 'pizza_images/pizza-24.jpg', '2025-03-04 06:48:09', '2025-03-04 06:48:09', NULL),
(25, 'ONION', 99, 'onion', 3, 'pizza_images/pizza-25.jpg', '2025-03-04 06:48:53', '2025-03-04 06:48:53', NULL),
(26, 'GOLDEN CORN', 139, 'Golden Corn', 3, 'pizza_images/pizza-26.jpg', '2025-03-04 06:49:33', '2025-03-04 06:49:33', NULL),
(27, 'PANEER & ONION', 149, 'Creamy Paneer | Onion', 3, 'pizza_images/pizza-27.jpg', '2025-03-04 06:50:11', '2025-03-04 06:50:11', NULL),
(28, 'CHEESE N TOMATO', 149, 'A delectable combination of cheese and juicy tomato', 3, 'pizza_images/pizza-28.jpg', '2025-03-04 06:51:26', '2025-03-04 06:51:26', NULL),
(29, 'Garlic Breadsticks', 99, 'The endearing tang of garlic in breadstics baked to perfection.', 4, 'pizza_images/pizza-29.jpg', '2025-03-04 06:51:59', '2025-03-04 06:51:59', NULL),
(30, 'Stuffed Garlic Bread', 99, 'Freshly Baked Garlic Bread stuffed with mozzarella cheese, sweet corns & tangy and spicy jalapeños', 4, 'pizza_images/pizza-30.jpg', '2025-03-04 06:52:41', '2025-03-04 06:52:41', NULL),
(31, 'Veg Pasta Italiano', 99, 'Penne Pasta tossed with extra virgin olive oil, exotic herbs & a generous helping of new flavoured sauce.', 4, 'pizza_images/pizza-31.jpg', '2025-03-04 06:53:40', '2025-03-04 06:53:40', NULL),
(32, 'NonVeg Pasta Italiano', 99, 'Penne Pasta tossed with extra virgin olive oil, exotic herbs & a generous helping of new flavoured sauce.', 4, 'pizza_images/pizza-32.jpg', '2025-03-04 06:54:50', '2025-03-04 06:54:50', NULL),
(33, 'Cheese Jalapeno Dip', 35, 'A soft creamy cheese dip spiced with jalapeno.', 4, 'pizza_images/pizza-33.jpg', '2025-03-04 06:55:29', '2025-03-04 06:55:29', NULL),
(34, 'Cheese Dip', 35, 'A dreamy creamy cheese dip to add that extra tang to your snack.', 4, 'pizza_images/pizza-34.jpg', '2025-03-04 06:56:01', '2025-03-04 06:56:01', NULL),
(35, 'Lava Cake', 99, 'Filled with delecious molten chocolate inside.', 4, 'pizza_images/pizza-35.jpg', '2025-03-04 06:56:30', '2025-03-04 06:56:30', NULL),
(36, 'Butterscotch Mousse', 149, 'A Creamy & Chocolaty indulgence with layers of rich, fluffy Butterscotch Cream and delicious Dark Chocolate Cake, topped with crunchy Dark Chocolate morsels - for a perfect dessert treat!', 4, 'pizza_images/pizza-36.jpg', '2025-03-04 06:57:14', '2025-03-04 06:57:14', NULL),
(37, 'Lipton Ice Tea', 25, '250ml', 5, 'pizza_images/pizza-37.jpg', '2025-03-04 06:57:46', '2025-03-04 06:57:46', NULL),
(38, 'Mirinda', 35, '500ml', 5, 'pizza_images/pizza-38.jpg', '2025-03-04 06:58:16', '2025-03-04 06:58:16', NULL),
(39, 'PEPSI BLACK CAN', 45, 'PEPSI BLACK CAN', 5, 'pizza_images/pizza-39.jpg', '2025-03-04 06:58:44', '2025-03-04 06:58:44', NULL),
(40, 'Pepsi', 52, '500ml', 5, 'pizza_images/pizza-40.jpg', '2025-03-04 06:59:14', '2025-03-04 06:59:14', NULL),
(41, 'Cheese Burst', 249, 'Crust with oodles of yummy liquid cheese filled inside.', 6, 'pizza_images/pizza-42.jpg', '2025-03-04 07:03:56', '2025-03-04 07:03:56', NULL),
(42, 'Classic Hand Tossed', 249, 'Dominos traditional hand stretched crust, crisp on outside, soft & light inside.', 6, 'pizza_images/pizza-43.jpg', '2025-03-04 07:04:30', '2025-03-04 07:04:30', NULL),
(43, 'Wheat Thin Crust', 299, 'Presenting the light healthier and delicious light wheat thin crust from Dominos.', 6, 'pizza_images/pizza-44.jpg', '2025-03-04 07:05:04', '2025-03-04 07:05:04', NULL),
(44, 'Fresh Pan Pizza', 299, 'Tastiest Pan Pizza.Ever.Domino’s freshly made pan-baked pizza; deliciously soft ,buttery,extra cheesy and delightfully crunchy.', 6, 'pizza_images/pizza-45.jpg', '2025-03-04 07:05:50', '2025-03-04 07:05:50', NULL),
(45, 'New Hand Tossed', 299, 'Classic Domino\\\'s crust. Fresh, hand stretched.', 6, 'pizza_images/pizza-46.jpg', '2025-03-04 07:06:37', '2025-03-04 07:06:37', NULL),
(46, 'PIZZA-CLASSIC VEG', 129, 'Bite into delight! Witness the epic combination of pizza and burger with our classic Burger Pizza, that looks good and tastes great!', 7, 'pizza_images/pizza-47.jpg', '2025-03-04 07:08:00', '2025-03-04 07:08:00', NULL),
(47, 'PIZZA- PREMIUM VEG', 139, 'The good just got better! Treat yourself to the premium taste of the Burger Pizza, that looks good and tastes great with paneer and red paprika.', 7, 'pizza_images/pizza-48.jpg', '2025-03-04 07:08:34', '2025-03-04 07:08:34', NULL),
(48, 'PIZZA-CLASSIC NONVEG', 149, 'For all the meat cravers, try the classic non-veg Burger Pizza loaded with the goodness of burger and the greatness of pizza.', 7, 'pizza_images/pizza-49.jpg', '2025-03-04 07:09:36', '2025-03-04 07:09:36', NULL),
(49, 'Extra Cheese', 35, 'Extra Cheese', 8, 'pizza_images/pizza-50.jpg', '2025-03-04 07:10:06', '2025-03-04 07:10:06', NULL),
(50, 'veg toppings', 55, 'Black Olives, Crisp Capsicum, Paneer, Mushroom, Golden Corn, Fresh Tomato, Jalapeno, Red Pepper & Babycorn.', 8, 'pizza_images/pizza-51.jpg', '2025-03-04 07:10:35', '2025-03-04 07:10:35', NULL),
(51, 'Non Veg Toppings', 55, 'Barbeque Chicken, Hot Spicy Chicken,Chunky Chicken and Chicken Salami.', 8, 'pizza_images/pizza-52.jpg', '2025-03-04 07:11:12', '2025-03-04 07:11:12', NULL),
(52, 'Drinking Water', 20, 'Drinking Water', 5, 'pizza_images/pizza-53.jpg', '2025-03-04 07:11:55', '2025-03-04 07:11:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `dob` date NOT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `m_name`, `l_name`, `usertype`, `dob`, `file_name`, `email`, `email_verified_at`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'xyz', 'xyz', 'xyz', 'admin', '2005-09-15', 'images/admin1.png', 'xyz@example.com', NULL, '1234567890', '$2y$10$UvfycZrrbNOP9jYi9spmN.JwV1A7N5P.o/RIdetj85qA/DuodfuKC', NULL, '2025-03-04 05:21:10', '2026-06-23 11:47:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `view_cart`
--

DROP TABLE IF EXISTS `view_cart`;
CREATE TABLE IF NOT EXISTS `view_cart` (
  `cartItemId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `pizzaId` bigint UNSIGNED NOT NULL,
  `itemQuantity` bigint NOT NULL,
  `userId` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cartItemId`),
  KEY `view_cart_pizzaid_foreign` (`pizzaId`),
  KEY `view_cart_userid_foreign` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
