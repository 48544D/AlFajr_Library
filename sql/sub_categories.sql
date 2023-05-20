-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2023 at 09:25 PM
-- Server version: 5.7.36
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alfajr_library`
--

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_categories_category_id_foreign` (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `name`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'Petite section', 1, '2023-05-15 23:58:00', '2023-05-15 23:58:00'),
(2, 'Crayons de couleur', 2, '2023-05-15 23:58:00', '2023-05-15 23:58:00'),
(3, 'Brosse pour tableau', 2, '2023-05-15 23:58:00', '2023-05-15 23:58:00'),
(4, 'Romans arabes', 1, '2023-05-17 18:20:11', '2023-05-17 18:20:11'),
(5, 'Feutres de couleur', 2, '2023-05-17 20:04:59', '2023-05-17 20:04:59'),
(6, 'Craie', 2, '2023-05-17 20:04:59', '2023-05-17 20:04:59'),
(7, 'Feutres de tableau', 2, '2023-05-17 20:04:59', '2023-05-17 20:04:59'),
(8, 'Colles', 2, '2023-05-17 20:04:59', '2023-05-17 20:04:59'),
(9, 'Gommes', 2, '2023-05-17 20:04:59', '2023-05-17 20:04:59'),
(10, 'Taille crayons', 2, '2023-05-17 20:04:59', '2023-05-17 20:04:59');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
