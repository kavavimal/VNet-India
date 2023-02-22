-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 05:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erp`
--

-- --------------------------------------------------------

--
-- Table structure for table `address_rec_tbl`
--

CREATE TABLE `address_rec_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `display` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `addr_1` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `addr_2` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suburb` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postcode` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `address_rec_tbl`
--

INSERT INTO `address_rec_tbl` (`id`, `display`, `customer_id`, `addr_1`, `addr_2`, `suburb`, `city`, `state`, `postcode`, `lat`, `long`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(1, '84 Onsgard Lane', 2, '84 Onsgard', 'Lane', NULL, 'Birmingham', 'Alabama', '35215', '33.6493', '-86.7057', '2022-10-04 07:21:21', NULL, 2, NULL, '0', '0'),
(2, '7 Algoma Hill	', 3, '7 Algoma', 'Hill', NULL, 'Colorado Springs', 'Colorado', '80920', '38.9497', '-104.767	', '2022-10-04 07:21:21', NULL, 3, NULL, '0', '0'),
(3, '869 Katie Parkway	', 3, '869 ', 'Katie Parkway	', NULL, 'AN', 'Andalucia', '41703', '37.1952335', '-3.664859', '2022-10-07 18:17:28', NULL, 1, NULL, '0', '0'),
(4, '5160 Bunting Plaza	', 4, '5160	', 'Bunting Plaza	', NULL, 'AN', 'Andalucia', '23005', '37.7801069', '-3.8235525', '2022-10-07 18:17:28', NULL, 1, NULL, '0', '0'),
(5, '776 Ridgeview Trail	', 5, '776 ', 'Ridgeview Trail', NULL, 'Andalucia', 'AN', '23005', '37.7801069', '-3.8235525', '2022-10-06 18:26:16', NULL, 2, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `conli_rec__tbl`
--

CREATE TABLE `conli_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `conli_con_id` bigint(20) UNSIGNED NOT NULL,
  `conli_pi_id` bigint(20) DEFAULT NULL,
  `conli_cust_id` bigint(20) DEFAULT NULL,
  `conli_qty` decimal(10,4) DEFAULT NULL,
  `conli_total_pkg` decimal(10,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conli_rec__tbl`
--

INSERT INTO `conli_rec__tbl` (`id`, `conli_con_id`, `conli_pi_id`, `conli_cust_id`, `conli_qty`, `conli_total_pkg`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(1, 5, 1, 1, NULL, '12.0000', '2022-12-19 06:40:36', '2022-12-19 06:40:36', NULL, NULL, '0', '0'),
(2, 5, 2, 1, NULL, '0.0000', '2022-12-19 06:44:56', '2022-12-19 07:05:16', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `contacts_rec__tbl`
--

CREATE TABLE `contacts_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_type` enum('0','1') COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '0 = isPerson, 1 = Company',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts_rec__tbl`
--

INSERT INTO `contacts_rec__tbl` (`id`, `title`, `fname`, `lname`, `is_type`, `email`, `phone1`, `phone2`, `fax`, `address`, `city`, `postal_code`, `country`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(1, 'Ms', 'Johan', 'Needham', '0', 'jneedham0@amazon.co.uk', '135-759-7671', '256-412-3079', '292-53-5863', '1874 Twin Pines Place', 'Drohiczyn', '17-312', 'Poland', '2022-10-21 10:02:48', '2022-11-01 07:47:27', 1, NULL, '0', '0'),
(2, 'Mrs', 'Reine', 'Ilieve', '1', 'rilieve1@myspace.com', '675-489-8120', '440-987-1097', '201-27-2074', '214 Acker Junction', 'Yingwusitang', '69490-000', 'China', '2022-10-21 10:02:48', '2022-11-02 04:05:24', 1, NULL, '0', '0'),
(3, 'Mrs', 'Randie', 'Rudinger', '0', 'rrudinger2@reddit.com', '429-914-5392', '684-604-2981', '165-37-2302', '6 Fair Oaks Place', 'Maraã', '9610', 'Brazil', '2022-10-21 10:05:25', '2022-11-02 07:22:52', 1, NULL, '0', '0'),
(5, 'Honorable', 'Even', 'Ketchaside', '1', 'eketchaside4@tinyurl.com	', '428-495-0749	', '833-556-0501	', '533-90-5292	', '6468 Roxbury Drive	', 'Panalingaan	', '9610', 'Philippines\r\n', '2022-10-21 10:15:57', NULL, NULL, NULL, '0', '0'),
(6, 'Mr', 'Hurleigh', 'Petzolt', '1', 'hpetzolt5@bbc.co.uk', '695-842-4248', '934-955-4012', '719-82-1942', '6060 Superior Road', 'Schellenberg', '9488', 'Liechtenstein', '2022-10-21 10:15:57', '2022-11-02 07:51:41', 1, NULL, '0', '0'),
(7, 'Mr', 'Wells', 'Kippen', '1', 'wkippen6@tamu.edu	', '223-558-0626	', '156-998-6051	', '669-56-5750	', '811 Bluejay Trail	', 'Thị Trấn Nước Hai	', '9610', 'Vietnam\r\n', '2022-10-21 10:18:06', NULL, 1, NULL, '0', '0'),
(8, 'Mr', 'Ondrea', 'McFetridge', '0', 'omcfetridge7@woothemes.com	', '620-623-1513	', '784-293-7705	', '662-51-9902	', '98 Susan Lane	', 'Ciela Lebak	', '9610', 'Indonesia', '2022-10-21 10:18:06', NULL, 1, NULL, '0', '0'),
(11, 'Mr', 'vandan', 'makwana', '0', 'rilieve1@myspace.com', '675-489-8120', '440-987-1097', '201-27-2074', 'satyanarayn so, gatru', 'Yingwusitang', '69490-000', 'india', '2022-11-02 00:16:23', '2022-11-02 00:16:23', NULL, NULL, '0', '0'),
(13, 'mr', 'Reinesss', 'Ilievesss', '0', 'vanda11n@artifex-online.com', '675-489-8120', '440-987-1097', '201-27-2074', '214 Acke1111r Junction', 'Yingwusitang', '69490-000', 'China', '2022-11-02 07:49:02', '2022-11-02 07:49:02', NULL, NULL, '0', '0'),
(15, 'mr', 'havy', 'driver', '1', 'havy@gmail.com', '675-489-8120', '440-987-1097', '201-27-2074', 'havy track drivere', 'Yingwusitang', '69490-000', 'india', '2022-11-02 08:12:02', '2022-11-02 08:12:02', NULL, NULL, '0', '0'),
(16, 'Ms', 'jiansh', 'vaghela', '0', 'jivbu@gmail.com', '675-489-8120', NULL, NULL, 'pehgam roaf dserw', 'Yingwusitang', NULL, 'China', '2022-11-02 08:23:32', '2022-11-02 08:23:32', NULL, NULL, '0', '0'),
(17, 'Mr', 'jiansh12', 'vaghela', '0', 'jivbu@gmail.com', '675-489-8120', '440-987-1097', '201-27-2074', 'fdsfwrerwer', 'Schellenberg', '69490-000', 'China', '2022-11-02 08:34:46', '2022-11-02 08:36:47', NULL, NULL, '0', '0'),
(18, 'sad', 'ad', 'ad', '0', 'rilieve1@myspace.com', '675-489-8120', '440-987-1097', '201-27-2074', 'satyanarayn so, gatru', 'Yingwusitang', '69490-000', 'China', '2022-11-02 21:48:34', '2022-11-02 21:48:34', NULL, NULL, '0', '0'),
(19, 'Mr', 'Reinesss', 'Ilievesss', '0', 'rilieve1@myspace.com', '675-489-8120', '440-987-1097', '719-82-1942', '214 Acker Junction', 'Yingwusitang', '69490-000', 'China', '2022-11-03 23:20:01', '2022-11-03 23:20:01', NULL, NULL, '0', '0'),
(20, 'erwe', 'wer', 'werew', '0', 'werer', 'were', 'werwer', 'wrewer', 'werer', 'werwer', 'wrer', 'werer', '2022-11-03 23:36:33', '2022-11-03 23:36:33', NULL, NULL, '0', '0'),
(21, 'sf', NULL, NULL, '0', 'sfdsf@fdg', 'sdf', NULL, NULL, 'sdfsdsd', NULL, NULL, NULL, '2022-11-03 23:37:49', '2022-11-04 00:02:41', NULL, NULL, '0', '0'),
(52, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-04 04:57:38', '2022-11-04 04:57:38', NULL, NULL, '0', '0'),
(56, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'fdsf', NULL, NULL, NULL, '2022-11-04 05:28:57', '2022-11-04 05:28:57', NULL, NULL, '0', '0'),
(57, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'gf', NULL, NULL, NULL, '2022-11-04 05:47:51', '2022-11-04 05:47:51', NULL, NULL, '0', '0'),
(58, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'adsdsad', NULL, NULL, NULL, '2022-11-04 05:54:36', '2022-11-04 05:54:36', NULL, NULL, '0', '0'),
(59, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'fsfdsfs', NULL, NULL, NULL, '2022-11-04 06:14:09', '2022-11-04 06:14:09', NULL, NULL, '0', '0'),
(60, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'dsfderergdf', NULL, NULL, NULL, '2022-11-07 01:25:57', '2022-11-07 01:25:57', NULL, NULL, '0', '0'),
(61, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'sdfr4354rsfd', NULL, NULL, NULL, '2022-11-07 01:44:00', '2022-11-07 01:44:00', NULL, NULL, '0', '0'),
(62, 'demo', 'john', 'catter', '0', 'john@gmail.com', '1234324543', '1234324543', '1234324543', 'newyork side ', 'ahemdabad', '345654', 'india', '2022-11-07 07:13:13', '2022-11-16 05:13:41', NULL, NULL, '0', '0'),
(63, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'dasd', NULL, NULL, NULL, '2022-11-07 23:00:43', '2022-11-07 23:00:43', NULL, NULL, '0', '0'),
(64, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'vandan', NULL, NULL, NULL, '2022-11-07 23:15:55', '2022-11-07 23:15:55', NULL, NULL, '0', '0'),
(65, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'deeeeee', NULL, NULL, NULL, '2022-11-07 23:20:00', '2022-11-07 23:20:00', NULL, NULL, '0', '0'),
(66, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'demo address', NULL, NULL, NULL, '2022-11-08 01:24:40', '2022-11-08 01:24:40', NULL, NULL, '0', '0'),
(69, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'kesariya', NULL, NULL, NULL, '2022-11-08 05:21:32', '2022-11-08 05:21:32', NULL, NULL, '0', '0'),
(70, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'asdds', NULL, NULL, NULL, '2022-11-08 08:34:18', '2022-11-08 08:34:18', NULL, NULL, '0', '0'),
(71, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'sdf', NULL, NULL, NULL, '2022-11-08 08:48:28', '2022-11-08 08:48:28', NULL, NULL, '0', '0'),
(72, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'adds', NULL, NULL, NULL, '2022-11-09 00:42:11', '2022-11-09 00:42:11', NULL, NULL, '0', '0'),
(73, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'sfdf', NULL, NULL, NULL, '2022-11-09 00:50:36', '2022-11-09 00:50:36', NULL, NULL, '0', '0'),
(74, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'sfsdfs', NULL, NULL, NULL, '2022-11-09 00:50:56', '2022-11-09 00:50:56', NULL, NULL, '0', '0'),
(75, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'dasdsadad', NULL, NULL, NULL, '2022-11-09 02:13:48', '2022-11-09 02:13:48', NULL, NULL, '0', '0'),
(76, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'sdfsdfs', NULL, NULL, NULL, '2022-11-09 02:27:13', '2022-11-09 02:27:13', NULL, NULL, '0', '0'),
(77, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', 'Schellenberg', NULL, NULL, '2022-11-17 06:25:13', '2022-11-17 06:25:13', NULL, NULL, '0', '0'),
(78, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '6060 Superior Road', 'Schellenberg', NULL, NULL, '2022-11-17 06:27:14', '2022-11-17 06:27:14', NULL, NULL, '0', '0'),
(79, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '6060 Superior Road', 'sydney', NULL, NULL, '2022-11-17 06:27:52', '2022-11-17 06:27:52', NULL, NULL, '0', '0'),
(80, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '6060 Superior Road', 'sydney', NULL, NULL, '2022-11-17 06:52:38', '2022-11-17 06:52:38', NULL, NULL, '0', '0'),
(81, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '6060 Superior Road1', 'sydney', NULL, NULL, '2022-11-17 06:53:04', '2022-11-17 07:47:41', NULL, NULL, '0', '0'),
(82, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-17 07:43:24', '2022-11-17 07:43:24', NULL, NULL, '0', '0'),
(83, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '6060 Superior Road1', 'sydney', NULL, NULL, '2022-11-17 07:44:36', '2022-11-17 07:44:36', NULL, NULL, '0', '0'),
(84, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '6060 Superior Road1', 'sydney', NULL, NULL, '2022-11-17 07:46:56', '2022-11-17 07:46:56', NULL, NULL, '0', '0'),
(85, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'fromAddress21', NULL, NULL, NULL, '2022-11-17 07:48:03', '2022-11-17 07:53:38', NULL, NULL, '0', '0'),
(86, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'sdfewrer42353', NULL, NULL, NULL, '2022-11-17 07:51:41', '2022-11-17 07:51:41', NULL, NULL, '0', '0'),
(87, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-17 08:08:36', '2022-11-17 08:08:36', NULL, NULL, '0', '0'),
(88, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, 'sdferewwerw1', NULL, NULL, NULL, '2022-11-17 08:17:55', '2022-11-17 08:25:13', NULL, NULL, '0', '0'),
(89, NULL, NULL, NULL, '0', NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-17 08:25:28', '2022-11-17 08:25:28', NULL, NULL, '0', '0'),
(90, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-18 06:36:37', '2022-11-18 06:36:37', NULL, NULL, '0', '0'),
(91, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road1', NULL, NULL, NULL, '2022-11-18 07:13:16', '2022-11-18 07:13:16', NULL, NULL, '0', '0'),
(92, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road1', NULL, NULL, NULL, '2022-11-18 07:13:37', '2022-11-18 07:13:37', NULL, NULL, '0', '0'),
(93, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vadad', NULL, NULL, NULL, '2022-11-18 07:15:44', '2022-11-18 07:15:44', NULL, NULL, '0', '0'),
(94, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road', NULL, NULL, NULL, '2022-11-18 07:17:55', '2022-11-18 07:17:55', NULL, NULL, '0', '0'),
(95, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-18 07:18:39', '2022-11-18 07:18:39', NULL, NULL, '0', '0'),
(96, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-18 07:22:04', '2022-11-18 07:22:04', NULL, NULL, '0', '0'),
(97, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vvv', NULL, NULL, NULL, '2022-11-18 07:23:46', '2022-11-18 07:23:46', NULL, NULL, '0', '0'),
(98, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vdfdf', NULL, NULL, NULL, '2022-11-18 07:24:59', '2022-11-18 07:24:59', NULL, NULL, '0', '0'),
(99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dgdfgd', NULL, NULL, NULL, '2022-11-18 07:26:21', '2022-11-18 07:26:21', NULL, NULL, '0', '0'),
(100, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sdddfdfddfdssd', NULL, NULL, NULL, '2022-11-18 07:32:21', '2022-11-18 07:32:21', NULL, NULL, '0', '0'),
(101, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asd', NULL, NULL, NULL, '2022-11-18 07:34:08', '2022-11-18 07:34:08', NULL, NULL, '0', '0'),
(102, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bbbb', NULL, NULL, NULL, '2022-11-18 07:35:20', '2022-11-18 07:35:20', NULL, NULL, '0', '0'),
(103, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'cccc', NULL, NULL, NULL, '2022-11-18 07:36:24', '2022-11-18 07:36:24', NULL, NULL, '0', '0'),
(104, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dddd', NULL, NULL, NULL, '2022-11-18 07:40:40', '2022-11-18 07:40:40', NULL, NULL, '0', '0'),
(105, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asasasa', NULL, NULL, NULL, '2022-11-18 07:41:44', '2022-11-18 07:41:44', NULL, NULL, '0', '0'),
(106, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-18 07:42:30', '2022-11-18 07:42:30', NULL, NULL, '0', '0'),
(107, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan', NULL, NULL, NULL, '2022-11-18 07:42:47', '2022-11-18 07:42:47', NULL, NULL, '0', '0'),
(108, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dddsdsdsdsd', NULL, NULL, NULL, '2022-11-18 07:42:58', '2022-11-18 07:42:58', NULL, NULL, '0', '0'),
(109, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'brian', NULL, NULL, NULL, '2022-11-18 07:50:16', '2022-11-18 07:50:16', NULL, NULL, '0', '0'),
(110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new york', NULL, NULL, NULL, '2022-11-18 23:52:07', '2022-11-18 23:52:07', NULL, NULL, '0', '0'),
(111, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'bhavnagar', NULL, NULL, NULL, '2022-11-18 23:55:32', '2022-11-18 23:55:32', NULL, NULL, '0', '0'),
(112, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 00:31:59', '2022-11-19 00:31:59', NULL, NULL, '0', '0'),
(113, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-19 00:32:02', '2022-11-19 00:32:02', NULL, NULL, '0', '0'),
(114, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-19 01:12:52', '2022-11-19 01:12:52', NULL, NULL, '0', '0'),
(115, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-19 23:14:34', '2022-11-19 23:14:34', NULL, NULL, '0', '0'),
(116, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-19 23:15:40', '2022-11-19 23:15:40', NULL, NULL, '0', '0'),
(117, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction111', NULL, NULL, NULL, '2022-11-19 23:18:19', '2022-11-19 23:28:58', NULL, NULL, '0', '0'),
(118, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction111', NULL, NULL, NULL, '2022-11-19 23:27:12', '2022-11-19 23:29:21', NULL, NULL, '0', '0'),
(119, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'brian', NULL, NULL, NULL, '2022-11-19 23:34:17', '2022-11-21 01:12:15', NULL, NULL, '0', '0'),
(121, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru1212', NULL, NULL, NULL, '2022-11-20 21:45:30', '2022-11-21 00:52:20', NULL, NULL, '0', '0'),
(122, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '11111111', NULL, NULL, NULL, '2022-11-20 21:50:02', '2022-11-20 21:50:11', NULL, NULL, '0', '0'),
(123, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru11', NULL, NULL, NULL, '2022-11-20 21:55:14', '2022-11-20 21:55:25', NULL, NULL, '0', '0'),
(124, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sddf1', NULL, NULL, NULL, '2022-11-20 22:04:44', '2022-11-20 22:04:50', NULL, NULL, '0', '0'),
(125, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdsd11', NULL, NULL, NULL, '2022-11-20 22:21:23', '2022-11-20 22:29:43', NULL, NULL, '0', '0'),
(126, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2121111', NULL, NULL, NULL, '2022-11-20 22:29:49', '2022-11-20 22:30:02', NULL, NULL, '0', '0'),
(127, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'nfsdfnsdkjfn11', NULL, NULL, NULL, '2022-11-20 23:14:01', '2022-11-20 23:27:50', NULL, NULL, '0', '0'),
(128, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-20 23:23:42', '2022-11-20 23:23:42', NULL, NULL, '0', '0'),
(129, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sad', NULL, NULL, NULL, '2022-11-20 23:25:49', '2022-11-20 23:25:49', NULL, NULL, '0', '0'),
(130, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdsd', NULL, NULL, NULL, '2022-11-20 23:26:17', '2022-11-20 23:26:17', NULL, NULL, '0', '0'),
(131, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rwer234', NULL, NULL, NULL, '2022-11-20 23:26:28', '2022-11-20 23:26:28', NULL, NULL, '0', '0'),
(132, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '343434', NULL, NULL, NULL, '2022-11-20 23:26:44', '2022-11-20 23:26:44', NULL, NULL, '0', '0'),
(133, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1212111', NULL, NULL, NULL, '2022-11-20 23:53:01', '2022-11-21 02:05:06', NULL, NULL, '0', '0'),
(134, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '434', NULL, NULL, NULL, '2022-11-21 00:06:34', '2022-11-21 00:06:34', NULL, NULL, '0', '0'),
(135, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '546', NULL, NULL, NULL, '2022-11-21 00:07:16', '2022-11-21 00:07:16', NULL, NULL, '0', '0'),
(136, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new value', NULL, NULL, NULL, '2022-11-21 01:12:28', '2022-11-21 01:12:28', NULL, NULL, '0', '0'),
(137, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new value122', NULL, NULL, NULL, '2022-11-21 01:13:00', '2022-11-21 01:13:00', NULL, NULL, '0', '0'),
(138, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new value take 1', NULL, NULL, NULL, '2022-11-21 01:13:45', '2022-11-21 01:13:45', NULL, NULL, '0', '0'),
(139, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new value take 3', NULL, NULL, NULL, '2022-11-21 01:17:29', '2022-11-21 01:17:38', NULL, NULL, '0', '0'),
(140, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new value 5', NULL, NULL, NULL, '2022-11-21 01:18:06', '2022-11-21 01:18:13', NULL, NULL, '0', '0'),
(141, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '121212', NULL, NULL, NULL, '2022-11-21 02:02:54', '2022-11-21 02:02:54', NULL, NULL, '0', '0'),
(142, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '453', NULL, NULL, NULL, '2022-11-21 02:03:47', '2022-11-21 02:03:47', NULL, NULL, '0', '0'),
(143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '67565611111111', NULL, NULL, NULL, '2022-11-21 02:04:17', '2022-11-21 02:04:34', NULL, NULL, '0', '0'),
(144, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '12546', NULL, NULL, NULL, '2022-11-21 02:05:11', '2022-11-21 02:05:11', NULL, NULL, '0', '0'),
(145, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dsfd', NULL, NULL, NULL, '2022-11-21 04:23:09', '2022-11-21 04:23:09', NULL, NULL, '0', '0'),
(146, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan1', NULL, NULL, NULL, '2022-11-21 04:31:29', '2022-11-21 04:31:35', NULL, NULL, '0', '0'),
(147, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road1re', NULL, NULL, NULL, '2022-11-21 04:31:58', '2022-11-21 04:32:04', NULL, NULL, '0', '0'),
(148, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan1', NULL, NULL, NULL, '2022-11-21 05:01:43', '2022-11-21 05:01:48', NULL, NULL, '0', '0'),
(149, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan', NULL, NULL, NULL, '2022-11-21 05:12:08', '2022-11-21 05:12:08', NULL, NULL, '0', '0'),
(150, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction11', NULL, NULL, NULL, '2022-11-21 05:15:48', '2022-11-21 06:19:41', NULL, NULL, '0', '0'),
(151, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-21 05:47:43', '2022-11-21 05:47:43', NULL, NULL, '0', '0'),
(152, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-21 05:47:53', '2022-11-21 05:47:53', NULL, NULL, '0', '0'),
(153, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan1', NULL, NULL, NULL, '2022-11-21 06:19:26', '2022-11-21 06:19:34', NULL, NULL, '0', '0'),
(154, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-21 06:19:46', '2022-11-21 06:19:46', NULL, NULL, '0', '0'),
(155, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'brian1', NULL, NULL, NULL, '2022-11-21 06:20:00', '2022-11-21 06:20:06', NULL, NULL, '0', '0'),
(156, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan', NULL, NULL, NULL, '2022-11-21 06:25:27', '2022-11-21 06:25:27', NULL, NULL, '0', '0'),
(157, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan', NULL, NULL, NULL, '2022-11-21 06:26:33', '2022-11-21 06:26:33', NULL, NULL, '0', '0'),
(158, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru1', NULL, NULL, NULL, '2022-11-21 06:39:12', '2022-11-21 06:39:25', NULL, NULL, '0', '0'),
(159, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asdsd', NULL, NULL, NULL, '2022-11-21 06:40:23', '2022-11-21 06:40:23', NULL, NULL, '0', '0'),
(160, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-21 06:42:09', '2022-11-21 06:42:09', NULL, NULL, '0', '0'),
(161, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru12', NULL, NULL, NULL, '2022-11-25 04:44:33', '2022-11-25 04:53:01', NULL, NULL, '0', '0'),
(162, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-25 04:53:26', '2022-11-25 04:53:26', NULL, NULL, '0', '0'),
(163, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road1', NULL, NULL, NULL, '2022-11-25 04:53:34', '2022-11-25 04:53:34', NULL, NULL, '0', '0'),
(164, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-29 00:54:58', '2022-11-29 00:54:58', NULL, NULL, '0', '0'),
(165, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-29 00:55:05', '2022-11-29 00:55:05', NULL, NULL, '0', '0'),
(166, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-29 01:30:12', '2022-11-29 01:30:12', NULL, NULL, '0', '0'),
(167, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road1', NULL, NULL, NULL, '2022-11-29 01:30:43', '2022-11-29 01:30:43', NULL, NULL, '0', '0'),
(168, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road1', NULL, NULL, NULL, '2022-11-29 03:53:26', '2022-11-29 03:53:26', NULL, NULL, '0', '0'),
(169, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-11-29 03:57:21', '2022-11-29 03:57:21', NULL, NULL, '0', '0'),
(170, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road111', NULL, NULL, NULL, '2022-11-29 04:05:55', '2022-11-29 04:07:28', NULL, NULL, '0', '0'),
(171, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan11', NULL, NULL, NULL, '2022-11-29 04:06:51', '2022-11-29 04:07:03', NULL, NULL, '0', '0'),
(172, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'dfds', NULL, NULL, NULL, '2022-11-29 04:07:45', '2022-11-29 04:07:45', NULL, NULL, '0', '0'),
(173, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-29 04:08:06', '2022-11-29 04:08:06', NULL, NULL, '0', '0'),
(174, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-29 04:08:11', '2022-11-29 04:08:11', NULL, NULL, '0', '0'),
(175, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan111111', NULL, NULL, NULL, '2022-11-29 04:08:19', '2022-11-29 04:08:24', NULL, NULL, '0', '0'),
(176, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru11', NULL, NULL, NULL, '2022-11-29 04:11:55', '2022-11-29 04:12:34', NULL, NULL, '0', '0'),
(177, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6060 Superior Road1', NULL, NULL, NULL, '2022-11-29 04:12:17', '2022-11-29 04:12:17', NULL, NULL, '0', '0'),
(178, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-29 04:34:14', '2022-11-29 04:34:14', NULL, NULL, '0', '0'),
(179, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-29 04:34:19', '2022-11-29 04:34:19', NULL, NULL, '0', '0'),
(180, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru', NULL, NULL, NULL, '2022-11-29 05:48:13', '2022-11-29 05:48:13', NULL, NULL, '0', '0'),
(181, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan1', NULL, NULL, NULL, '2022-11-29 05:50:00', '2022-11-29 05:50:00', NULL, NULL, '0', '0'),
(182, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'vandan1', NULL, NULL, NULL, '2022-11-29 05:50:56', '2022-11-29 05:50:56', NULL, NULL, '0', '0'),
(183, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction', NULL, NULL, NULL, '2022-11-29 05:51:35', '2022-11-29 05:51:35', NULL, NULL, '0', '0'),
(184, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'satyanarayn so, gatru1111', NULL, NULL, NULL, '2022-11-29 05:52:05', '2022-11-29 06:03:14', NULL, NULL, '0', '0'),
(185, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '214 Acker Junction11', NULL, NULL, NULL, '2022-11-29 05:57:38', '2022-11-29 05:57:50', NULL, NULL, '0', '0'),
(186, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'v11', NULL, NULL, NULL, '2022-11-29 06:02:12', '2022-11-29 06:02:26', NULL, NULL, '0', '0'),
(187, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'n1111', NULL, NULL, NULL, '2022-11-29 06:02:33', '2022-11-29 06:02:38', NULL, NULL, '0', '0'),
(188, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 's1111', NULL, NULL, NULL, '2022-11-29 06:03:01', '2022-11-29 06:03:07', NULL, NULL, '0', '0'),
(189, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'scincec city1', NULL, NULL, NULL, '2022-11-29 06:05:46', '2022-11-29 06:05:57', NULL, NULL, '0', '0'),
(190, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'sola brige', NULL, NULL, NULL, '2022-11-29 06:06:15', '2022-11-29 06:06:27', NULL, NULL, '0', '0'),
(191, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'new york', NULL, NULL, NULL, '2022-11-29 06:08:16', '2022-11-29 06:08:16', NULL, NULL, '0', '0'),
(192, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'california', NULL, NULL, NULL, '2022-11-29 06:08:35', '2022-11-29 06:08:35', NULL, NULL, '0', '0'),
(193, 'asds', '', '', '0', '', '', '', '', 'werer11', '', '', '', '2022-11-30 00:53:16', '2022-11-30 01:54:39', NULL, NULL, '0', '0'),
(194, 'dsf', '', '', '0', '', '', '', '', 'fdsfwerr11', '', '', '', '2022-11-30 00:53:16', '2022-11-30 01:54:39', NULL, NULL, '0', '0'),
(195, 'asdasd', '', '', '0', '', '', '', '', 'sadsd111', '', '', '', '2022-11-30 01:54:39', '2022-11-30 01:54:39', NULL, NULL, '0', '0'),
(196, 'Mr', 'Vandan', 'Makwana', '0', '', '', '', '', 'bhavnagar', '', '', '', '2022-11-30 01:58:24', '2022-12-09 05:56:00', NULL, NULL, '0', '0'),
(197, 'ewrwer', '', '', '0', '', '', '', '', 'sfdsf', '', '', '', '2022-11-30 01:58:24', '2022-11-30 01:58:24', NULL, NULL, '0', '0'),
(198, 'erwer', '', '', '0', '', '', '', '', 'sfdf', '', '', '', '2022-11-30 01:58:24', '2022-11-30 01:58:24', NULL, NULL, '0', '0'),
(199, 'dfg111', '', '', '0', '', '', '', '', 'dfgrte111', '', '', '', '2022-11-30 05:41:13', '2022-11-30 05:47:22', NULL, NULL, '0', '0'),
(200, 'fdggd', '', '', '0', '', '', '', '', 'dgfg', '', '', '', '2022-11-30 05:41:13', '2022-11-30 05:41:13', NULL, NULL, '0', '0'),
(201, 'sfdf', '', '', '0', '', '', '', '', 'sdfdf', '', '', '', '2022-11-30 05:47:42', '2022-11-30 05:47:42', NULL, NULL, '0', '0'),
(202, 'Mr', 'rajiv', 'sharma', '0', 'rajivsharma@gmail.com', '', '', '', 'science city Ahmdabad', '', '', '', '2022-11-30 05:54:48', '2022-12-01 04:47:53', NULL, NULL, '0', '0'),
(203, 'asdsd', '', '', '0', '', '', '', '', 'adsd', '', '', '', '2022-11-30 05:54:48', '2022-11-30 05:54:48', NULL, NULL, '0', '0'),
(204, 'adsd', '', '', '0', '', '', '', '', 'adsdasd', '', '', '', '2022-11-30 05:55:44', '2022-11-30 05:55:44', NULL, NULL, '0', '0'),
(205, 'asd', 'asd', 'sdf', '0', 'sdfd@fdsf', '', '', '', 'asdasd', '', '', '', '2022-12-01 23:06:08', '2022-12-02 07:52:15', NULL, NULL, '0', '0'),
(206, '', '', '', '0', '', '', '', '', 'sdfdf', '', '', '', '2022-12-01 23:06:24', '2022-12-01 23:06:24', NULL, NULL, '0', '0'),
(207, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'india', NULL, NULL, NULL, '2022-12-09 06:03:48', '2022-12-09 06:04:11', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `con_payment_terms__enum`
--

CREATE TABLE `con_payment_terms__enum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','180 Days DA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','180 day DA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `con_payment_terms__enum`
--

INSERT INTO `con_payment_terms__enum` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', NULL, NULL),
(2, '180 Days DA', '180 day DA', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `con_rec__tbl`
--

CREATE TABLE `con_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `con_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `date_ship` date DEFAULT NULL,
  `from_addr_id` bigint(20) DEFAULT NULL,
  `dest_addr_id` bigint(20) DEFAULT NULL,
  `con_vessel_id` bigint(20) DEFAULT NULL,
  `con_blno` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `con_payment_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `con_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `con_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `con_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`con_fields`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `con_rec__tbl`
--

INSERT INTO `con_rec__tbl` (`id`, `con_number`, `customer_id`, `date`, `date_ship`, `from_addr_id`, `dest_addr_id`, `con_vessel_id`, `con_blno`, `con_payment_type_id`, `con_type_id`, `con_status_id`, `con_fields`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(2, '552398', 2, '2022-12-14', NULL, 184, 186, 12, 'dsdsd', 2, 2, 2, '{\"erp-field-brand_name\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-volume\":{\"view\":\"1\",\"print\":\"1\"}}', '2022-12-14 07:34:49', '2022-12-19 07:32:31', NULL, NULL, '0', '0'),
(5, '897313', 1, '2022-12-16', '2022-12-16', 184, 186, 12, 'dsdsd', 2, 2, 3, '{\"erp-field-brand_name\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-volume\":{\"view\":\"1\",\"print\":\"1\"}}', '2022-12-16 04:52:19', '2022-12-20 03:46:13', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `con_status__enum`
--

CREATE TABLE `con_status__enum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','Draft','Ready For Shipping','Pre Transit','In Transit','Arrived','Shipped','Canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','draft','ready','pre-transit','in-transit','arrived','shipped','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `con_status__enum`
--

INSERT INTO `con_status__enum` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', NULL, NULL),
(2, 'Draft', 'draft', NULL, NULL),
(3, 'Ready For Shipping', 'ready', NULL, NULL),
(4, 'Pre Transit', 'pre-transit', NULL, NULL),
(5, 'In Transit', 'in-transit', NULL, NULL),
(6, 'Arrived', 'arrived', NULL, NULL),
(7, 'Shipped', 'shipped', NULL, NULL),
(8, 'Canceled', 'canceled', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `con_type__enum`
--

CREATE TABLE `con_type__enum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','Shipping Container','Air Freight','Hand Delivered') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','container','air-freight','by-hand') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `con_type__enum`
--

INSERT INTO `con_type__enum` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', NULL, NULL),
(2, 'Shipping Container', 'container', NULL, NULL),
(3, 'Air Freight', 'air-freight', NULL, NULL),
(4, 'Hand Delivered', 'by-hand', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_contacts`
--

CREATE TABLE `customer_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_contacts`
--

INSERT INTO `customer_contacts` (`id`, `cust_id`, `contact_id`) VALUES
(1, 1, 62),
(3, 1, 20),
(4, 15, 146),
(5, 15, 147),
(9, 16, 168),
(11, 17, 170),
(12, 17, 171),
(13, 17, 172),
(14, 18, 173),
(15, 18, 174),
(16, 18, 175),
(17, 4, 178),
(18, 4, 179),
(19, 19, 205),
(20, 19, 206);

-- --------------------------------------------------------

--
-- Table structure for table `cust_rec_tbl`
--

CREATE TABLE `cust_rec_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cust_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked',
  `contact_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cust_rec_tbl`
--

INSERT INTO `cust_rec_tbl` (`id`, `cust_name`, `code`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`, `contact_id`) VALUES
(1, 'Tiffanie Maben', '12453', '2022-10-03 09:38:50', NULL, 1, NULL, '0', '0', 1),
(2, 'Armando Portriss', '43325', '2022-10-03 09:38:50', '2022-10-31 03:10:49', 1, NULL, '-1', '0', 2),
(3, 'Kaylyn Zammett', '34546', '2022-10-03 09:39:35', NULL, 2, NULL, '0', '0', 1),
(4, 'Tom Boocock', '56453', '2022-10-03 09:39:35', '2022-11-29 00:55:07', 1, NULL, '0', '0', 0),
(5, NULL, '12345', '2022-10-07 18:15:16', '2022-10-21 06:28:01', 1, NULL, '0', '0', 1),
(6, 'Andrej Iltchev', '76787', '2022-10-07 18:15:16', NULL, 1, NULL, '0', '0', 1),
(7, 'Carolina Hopfer', '34324', '2022-10-07 18:16:06', NULL, 1, NULL, '0', '0', 5),
(8, 'Marketa Fache', '43564', '2022-10-07 18:16:06', NULL, 2, NULL, '0', '0', 2),
(9, 'Claybourne Ulyat', '23432', '2022-10-07 18:16:06', NULL, 2, NULL, '0', '0', 1),
(10, 'Kissiah De Miranda', '34543', '2022-10-07 18:16:06', '2022-10-31 03:10:37', 1, NULL, '-1', '0', 4),
(11, NULL, '23232', '2022-10-21 06:30:00', '2022-10-21 06:30:00', NULL, NULL, '0', '0', 2),
(12, 'dfsfewdad', 'dasdddsad', '2022-11-07 07:12:54', '2022-11-07 07:27:19', NULL, NULL, '0', '0', 62),
(13, 'dsadsd', 'ad', '2022-11-08 08:48:35', '2022-11-08 08:49:20', NULL, NULL, '0', '0', 71),
(14, NULL, NULL, '2022-11-10 20:56:17', '2022-11-10 20:56:17', NULL, NULL, '0', '0', 0),
(15, 'sfdf', '23232', '2022-11-21 04:31:37', '2022-11-21 04:31:47', NULL, NULL, '0', '0', 0),
(16, NULL, NULL, '2022-11-29 03:57:09', '2022-11-29 03:57:09', NULL, NULL, '0', '0', 0),
(17, 'dedererdf', '4354', '2022-11-29 04:06:27', '2022-11-29 04:06:27', NULL, NULL, '0', '0', 0),
(18, 'dsf', 'dsf', '2022-11-29 04:08:28', '2022-11-29 04:08:28', NULL, NULL, '0', '0', 0),
(19, 'asd', 'asdsd', '2022-12-01 23:06:08', '2022-12-01 23:06:08', NULL, NULL, '0', '0', NULL);

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
-- Table structure for table `ga_address`
--

CREATE TABLE `ga_address` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ga_address`
--

INSERT INTO `ga_address` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'from', '2022-10-31 18:30:00', NULL),
(2, 'destination', '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ga_to_contacts`
--

CREATE TABLE `ga_to_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ga_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ga_to_contacts`
--

INSERT INTO `ga_to_contacts` (`id`, `ga_id`, `contact_id`) VALUES
(2, 1, 184),
(3, 1, 185),
(4, 2, 186),
(5, 2, 187),
(6, 2, 188),
(7, 1, 189),
(8, 2, 190),
(9, 1, 191),
(10, 2, 192),
(11, 1, 207);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_10_03_045345_cust_rec__tbl', 2),
(11, '2022_10_03_045815_address_rec__tbl', 3),
(17, '2022_10_04_112018_prd_rec__tbl', 4),
(27, '2022_10_19_092326_prd_image__tbl', 7),
(28, '2022_10_20_131820_add_new_notes_fields_into_products', 8),
(29, '2022_10_21_094856_contacts_rec__tbl', 9),
(30, '2022_10_21_102142_add_customer_details', 10),
(32, '2022_10_04_111734_sup_rec__tbl', 12),
(34, '2022_10_21_102910_supplier_contacts', 13),
(35, '2022_11_07_044515_change_supplier_columns_type', 14),
(36, '2022_10_03_084854_pi_shipping_terms__enum', 15),
(37, '2022_10_03_085238_pi_payment_terms__enum', 15),
(38, '2022_10_04_120334_pili_unit__enum', 15),
(39, '2022_11_07_111559_customer_contacts', 16),
(43, '2022_10_03_093216_pi_rec__tbl', 19),
(47, '2022_11_17_091429_proformainvoice_contacts', 20),
(48, '2022_11_17_093141_proformainvoice_dcontacts', 20),
(49, '2022_10_11_112312_add_proformainvoice_new_columns', 21),
(51, '2022_10_03_050125_pi_status_enum_tbl', 22),
(53, '2022_11_29_105344_ga_address_to_contacts', 24),
(54, '2022_11_29_104547_ga_address', 25),
(55, '2022_12_02_064128_add_fields_on_products', 26),
(60, '2022_12_13_052237_con_type__enum', 28),
(61, '2022_12_13_052918_con_payment_terms__enum', 28),
(67, '2022_12_13_051329_con_status__enum', 29),
(70, '2022_12_14_091602_add_column_to_product', 32),
(72, '2022_12_13_055837_con_rec__tbl', 33),
(74, '2022_12_15_124503_add_con_id_into_conli_item', 35),
(75, '2022_12_16_110648_add_column_to_conli', 36),
(76, '2022_12_19_040758_add_fields_on_conli', 37),
(81, '2022_12_13_053539_conli_rec__tbl', 38),
(82, '2022_12_17_041052_create_permission_tables', 39),
(83, '2022_12_15_053514_add_sys_status_to_users', 40),
(86, '2022_10_05_043810_pili_rec__tbl', 41),
(87, '2022_12_20_092444_po_status__enum', 42),
(88, '2022_12_20_093401_po_payment_terms__enum', 42),
(89, '2022_12_20_093747_po_rec__tbl', 42),
(90, '2022_12_22_092604_poli_rec__tbl', 43),
(91, '2022_12_22_131440_add_column_to_purchaseorder', 44);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_permissions`
--

INSERT INTO `model_has_permissions` (`permission_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 1),
(4, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 11),
(2, 'App\\Models\\User', 12);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('vandan.vmjs@gmail.com', '$2y$10$ol/lLBXVAGo5l6TmsohXNejOdci9hiE02GoX7sqot7k650dpxQFzK', '2022-12-15 00:28:16'),
('superadmin@gmail.com', '$2y$10$ax1qILgf8y8pibwCJ7DStuPDrM3U951XQ4DizRqHGfy8H3WAPgrre', '2022-12-15 00:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(2, 'role-create', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(3, 'role-edit', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(4, 'role-delete', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(5, 'product-list', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(6, 'product-create', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(7, 'product-edit', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(8, 'product-delete', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(9, 'product-tab-show', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(10, 'supplier-create', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(11, 'supplier-list', 'web', '2022-12-17 03:39:29', '2022-12-17 03:39:29'),
(12, 'supplier-edit', 'web', '2022-12-21 10:51:01', '2022-12-21 10:51:01'),
(13, 'supplier-delete', 'web', '2022-12-21 10:51:49', '2022-12-21 10:51:49'),
(14, 'supplier-tab-show', 'web', '2022-12-21 10:51:49', '2022-12-21 10:51:49'),
(15, 'customer-list', 'web', '2022-12-21 11:01:11', '2022-12-21 11:01:11'),
(16, 'customer-create', 'web', '2022-12-21 11:01:11', '2022-12-21 11:01:11'),
(17, 'customer-edit', 'web', '2022-12-21 11:01:41', '2022-12-21 11:01:41'),
(18, 'customer-delete', 'web', '2022-12-21 11:01:41', '2022-12-21 11:01:41'),
(19, 'customer-tab-show', 'web', '2022-12-21 11:02:12', '2022-12-21 11:02:12'),
(20, 'proformainvoice-list', 'web', '2022-12-21 11:21:06', '2022-12-21 11:21:06'),
(21, 'proformainvoice-create', 'web', '2022-12-21 11:21:06', '2022-12-21 11:21:06'),
(22, 'proformainvoice-edit', 'web', '2022-12-21 11:21:39', '2022-12-21 11:21:39'),
(23, 'proformainvoice-delete', 'web', '2022-12-21 11:21:39', '2022-12-21 11:21:39'),
(24, 'proformainvoice-tab-show', 'web', '2022-12-21 11:22:06', '2022-12-21 11:22:06'),
(25, 'consignment-list', 'web', '2022-12-21 11:42:07', '2022-12-21 11:42:07'),
(26, 'consignment-create', 'web', '2022-12-21 11:42:07', '2022-12-21 11:42:07'),
(27, 'consignment-edit', 'web', '2022-12-21 11:42:39', '2022-12-21 11:42:39'),
(28, 'consignment-delete', 'web', '2022-12-21 11:42:39', '2022-12-21 11:42:39'),
(29, 'consignment-tab-show', 'web', '2022-12-21 11:43:10', '2022-12-21 11:43:10'),
(30, 'purchaseorder-list', 'web', '2022-12-21 11:57:01', '2022-12-21 11:57:01'),
(31, 'purchaseorder-create', 'web', '2022-12-21 11:57:01', '2022-12-21 11:57:01'),
(32, 'purchaseorder-edit', 'web', '2022-12-21 11:57:27', '2022-12-21 11:57:27'),
(33, 'purchaseorder-delete', 'web', '2022-12-21 11:57:27', '2022-12-21 11:57:27'),
(34, 'purchaseorder-tab-show', 'web', '2022-12-21 11:58:00', '2022-12-21 11:58:00'),
(35, 'user-list', 'web', '2022-12-21 12:21:16', '2022-12-21 12:21:16'),
(36, 'user-create', 'web', '2022-12-21 12:21:16', '2022-12-21 12:21:16'),
(37, 'user-edit', 'web', '2022-12-21 12:21:43', '2022-12-21 12:21:43'),
(38, 'user-delete', 'web', '2022-12-21 12:21:43', '2022-12-21 12:21:43'),
(39, 'user-tab-show', 'web', '2022-12-21 12:22:18', '2022-12-21 12:22:18'),
(40, 'role-tab-show', 'web', '2022-12-21 12:46:03', '2022-12-21 12:46:03');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pili_rec__tbl`
--

CREATE TABLE `pili_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pili_pi_id` bigint(20) UNSIGNED NOT NULL,
  `pili_sup_id` bigint(20) DEFAULT NULL,
  `pili_prd_id` bigint(20) DEFAULT NULL,
  `pili_line_order` int(11) DEFAULT NULL,
  `pili_sup` decimal(10,4) DEFAULT NULL,
  `pili_upmp` decimal(10,4) DEFAULT NULL,
  `pili_qty` decimal(10,4) DEFAULT NULL,
  `ttl_pkg` decimal(10,4) DEFAULT NULL,
  `ttl_vol` decimal(10,4) DEFAULT NULL,
  `gwt` decimal(10,4) DEFAULT NULL,
  `nwt` decimal(10,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pili_rec__tbl`
--

INSERT INTO `pili_rec__tbl` (`id`, `pili_pi_id`, `pili_sup_id`, `pili_prd_id`, `pili_line_order`, `pili_sup`, `pili_upmp`, `pili_qty`, `ttl_pkg`, `ttl_vol`, `gwt`, `nwt`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(1, 18, 1, 22, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-19 23:55:49', '2022-12-20 00:08:34', NULL, NULL, '0', '0'),
(2, 18, 4, 2, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-19 23:59:14', '2022-12-20 00:08:34', NULL, NULL, '0', '0'),
(3, 18, 2, 1, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 00:08:24', '2022-12-20 00:08:34', NULL, NULL, '0', '0'),
(4, 19, 2, 2, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(5, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(6, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(7, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(8, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(9, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(10, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(11, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(12, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(13, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0'),
(14, 19, 3, 3, NULL, '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '0.0000', '2022-12-20 21:52:24', '2022-12-20 21:52:24', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `pili_unit__enum`
--

CREATE TABLE `pili_unit__enum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','PCS','CTN','KG','Grams','SET') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','pcs','ctn','kg','gms','set') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pili_unit__enum`
--

INSERT INTO `pili_unit__enum` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', '2022-10-05 09:09:02', '2022-10-05 09:09:02'),
(2, 'PCS', 'pcs', '2022-10-05 09:09:02', '2022-10-05 09:09:02'),
(3, 'CTN', 'ctn', '2022-10-05 09:09:37', '2022-10-05 09:09:37'),
(4, 'KG', 'kg', '2022-10-05 09:09:37', '2022-10-05 09:09:37'),
(5, 'Grams', 'gms', '2022-10-05 09:10:15', '2022-10-05 09:10:15'),
(6, 'SET', 'set', '2022-10-05 09:10:15', '2022-10-05 09:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `pi_destination_address_contacts`
--

CREATE TABLE `pi_destination_address_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pi_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pi_destination_address_contacts`
--

INSERT INTO `pi_destination_address_contacts` (`id`, `pi_id`, `contact_id`) VALUES
(7, 7, 158),
(8, 0, 163);

-- --------------------------------------------------------

--
-- Table structure for table `pi_from_address_contacts`
--

CREATE TABLE `pi_from_address_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pi_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pi_from_address_contacts`
--

INSERT INTO `pi_from_address_contacts` (`id`, `pi_id`, `contact_id`) VALUES
(6, 5, 87),
(7, 5, 88),
(8, 5, 89),
(11, 7, 150),
(13, 7, 159),
(14, 8, 160),
(15, 9, 162);

-- --------------------------------------------------------

--
-- Table structure for table `pi_payment_terms__enum_tbl`
--

CREATE TABLE `pi_payment_terms__enum_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','100% Advance','30% Advance 70% Before Shipment','50% Advance 50% Against The B/L Copy','100% Against B/L') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','100adv','30-70','50-50','100-bl') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pi_payment_terms__enum_tbl`
--

INSERT INTO `pi_payment_terms__enum_tbl` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', '2022-10-03 09:44:22', NULL),
(2, '100% Advance', '100adv', '2022-10-03 09:45:29', NULL),
(3, '30% Advance 70% Before Shipment', '30-70', '2022-10-03 09:44:51', NULL),
(4, '50% Advance 50% Against The B/L Copy', '50-50', '2022-10-03 09:44:51', NULL),
(5, '100% Against B/L', '100-bl', '2022-10-03 09:45:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pi_rec__tbl`
--

CREATE TABLE `pi_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `ordered_on` date DEFAULT NULL,
  `expected_on` date DEFAULT NULL,
  `lead_time` date DEFAULT NULL,
  `from_addr_id` bigint(20) DEFAULT NULL,
  `dest_addr_id` bigint(20) DEFAULT NULL,
  `term` bigint(20) UNSIGNED NOT NULL,
  `payment` bigint(20) UNSIGNED NOT NULL,
  `status` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked',
  `pi_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`pi_fields`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pi_rec__tbl`
--

INSERT INTO `pi_rec__tbl` (`id`, `order_number`, `customer_id`, `ordered_on`, `expected_on`, `lead_time`, `from_addr_id`, `dest_addr_id`, `term`, `payment`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`, `pi_fields`) VALUES
(5, '570493', 2, '2022-11-17', NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-17 08:08:50', '2022-12-06 03:33:11', NULL, NULL, '', '0', '{\n  \"erp-field-pili_sup_id\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-pili_prd_id\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_supplier_item\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_our_item_no\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_barcode\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_hs_code\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_images_url\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_gwt_ctn\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_ctn_wt\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_pcs_per_ctn\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_cbm_ctn\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_unit_type\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_ttl_pkg\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_gwt\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_nwt\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-prd_pup\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-pili_upmp\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-pili_sup\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-pili_qty\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-pili_unit\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  },\n  \"erp-field-pili_total_usd\": {\n    \"view\": \"1\",\n    \"print\": \"1\"\n  }\n}'),
(7, '756733', 1, '2022-11-21', NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-21 05:17:58', '2022-11-24 22:27:44', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(8, '642011', 4, '2022-11-21', NULL, NULL, NULL, NULL, 1, 1, 1, '2022-11-21 06:42:26', '2022-11-24 01:58:50', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(9, '938897', 1, '2022-11-25', NULL, NULL, NULL, NULL, 1, 2, 1, '2022-11-25 04:54:34', '2022-11-25 09:03:47', NULL, NULL, '', '0', '{\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"}}'),
(10, '963031', 4, '2022-11-29', '2022-11-30', NULL, NULL, NULL, 1, 1, 1, '2022-11-29 04:35:41', '2022-11-29 04:53:17', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(11, '194426', 4, '2022-11-29', NULL, NULL, 0, 0, 1, 1, 1, '2022-11-29 06:07:05', '2022-11-29 06:07:05', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(12, '863809', 1, '2022-11-29', NULL, NULL, 0, 0, 1, 1, 1, '2022-11-29 07:30:16', '2022-11-29 07:30:16', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(13, '807054', 1, '2022-11-29', NULL, NULL, 0, 0, 1, 1, 1, '2022-11-29 07:38:27', '2022-11-29 07:38:27', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(14, '369820', 1, '2022-11-29', NULL, NULL, 0, 0, 1, 1, 1, '2022-11-29 07:44:30', '2022-11-29 07:44:30', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(15, '327118', 1, '2022-11-29', NULL, NULL, 0, 0, 1, 1, 1, '2022-11-29 07:58:37', '2022-11-29 07:58:37', NULL, NULL, '', '0', '{\"erp-field-pili_sup_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_prd_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmv\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_up\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit_id\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(16, '208051', 1, '2022-12-06', NULL, NULL, 0, 0, 2, 1, 1, '2022-12-06 04:12:12', '2022-12-09 06:17:09', NULL, NULL, '', '0', '{\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ctn_wt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_unit_type\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"0\",\"print\":\"1\"}}'),
(17, '318306', 1, '2022-12-08', '2022-12-09', '2022-12-11', NULL, NULL, 1, 2, 1, '2022-12-08 06:18:15', '2022-12-09 06:18:20', NULL, NULL, '', '0', '{\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ctn_wt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_unit_type\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit\":{\"view\":\"0\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(18, '555538', 1, '2022-12-13', NULL, NULL, 184, 186, 1, 2, 1, '2022-12-12 23:42:26', '2022-12-20 00:08:34', NULL, NULL, '', '0', '{\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ctn_wt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_unit_type\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}'),
(19, '441368', 1, '2022-12-13', NULL, NULL, 184, 186, 3, 4, 1, '2022-12-13 00:12:19', '2022-12-21 07:11:04', NULL, NULL, '', '0', '{\"erp-field-prd_supplier_item\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_images_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ctn_wt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pcs_per_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_cbm_ctn\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_unit_type\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_ttl_cbm\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_pup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_upmp\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_sup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_qty\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_unit\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-pili_total_usd\":{\"view\":\"1\",\"print\":\"1\"}}');

-- --------------------------------------------------------

--
-- Table structure for table `pi_shipping_terms__enum_tbl`
--

CREATE TABLE `pi_shipping_terms__enum_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','EX WORK','FOB / EX WRK','CIF') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','ex-work','fob-ex-work','cif') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pi_shipping_terms__enum_tbl`
--

INSERT INTO `pi_shipping_terms__enum_tbl` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', '2022-10-03 09:45:48', NULL),
(2, 'EX WORK', 'ex-work', '2022-10-03 09:45:48', NULL),
(3, 'FOB / EX WRK', 'fob-ex-work', '2022-10-03 09:46:10', NULL),
(4, 'CIF', 'cif', '2022-10-03 09:46:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pi_status_enum_tbl`
--

CREATE TABLE `pi_status_enum_tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('Draft','Ready','Approved','Sent','Negotiating','Canceled','Agreed','Rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('draft','ready','approved','sent','negotiating','canceled','agreed','rejected') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pi_status_enum_tbl`
--

INSERT INTO `pi_status_enum_tbl` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Draft', 'draft', NULL, NULL),
(2, 'Ready', 'ready', NULL, NULL),
(3, 'Approved', 'approved', NULL, NULL),
(4, 'Sent', 'sent', NULL, NULL),
(5, 'Negotiating', 'negotiating', NULL, NULL),
(6, 'Canceled', 'canceled', NULL, NULL),
(7, 'Agreed', 'agreed', NULL, NULL),
(8, 'Rejected', 'rejected', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `poli_rec__tbl`
--

CREATE TABLE `poli_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `poli_pi_id` bigint(20) DEFAULT NULL,
  `poli_qty_pkg` decimal(10,4) DEFAULT NULL,
  `poli_pcup` decimal(10,4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `po_payment_terms__enum`
--

CREATE TABLE `po_payment_terms__enum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','180 Days DA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','180 day DA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_payment_terms__enum`
--

INSERT INTO `po_payment_terms__enum` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', '2022-12-21 08:26:19', NULL),
(2, '180 Days DA', '180 day DA', '2022-12-20 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `po_rec__tbl`
--

CREATE TABLE `po_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `po_number` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier_id` bigint(20) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `date_delivery` date DEFAULT NULL,
  `po_payment_type_id` bigint(20) UNSIGNED DEFAULT NULL,
  `po_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `po_fields` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`po_fields`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_rec__tbl`
--

INSERT INTO `po_rec__tbl` (`id`, `po_number`, `supplier_id`, `date`, `date_delivery`, `po_payment_type_id`, `po_status_id`, `po_fields`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(1, 'PO-638377', 1, '2022-12-24', '2022-12-16', 2, 3, '{\"erp-field-brand_name\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_image_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-poli_qty_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-volume\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-poli_pcup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-total_usd\":{\"view\":\"1\",\"print\":\"1\"}}', '2022-12-21 03:00:37', '2022-12-21 03:12:56', NULL, NULL, '0', '0'),
(2, 'PO-737756', 1, '2022-12-22', '2022-12-24', 1, 4, '{\"erp-field-brand_name\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_our_item_no\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_description\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_barcode\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_hs_code\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-prd_image_url\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-ttl_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-poli_qty_pkg\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-gwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-nwt\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-volume\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-poli_pcup\":{\"view\":\"1\",\"print\":\"1\"},\"erp-field-total_usd\":{\"view\":\"1\",\"print\":\"1\"}}', '2022-12-22 08:11:27', '2022-12-22 08:11:27', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `po_status__enum`
--

CREATE TABLE `po_status__enum` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` enum('None','Draft','Ready For Ordering','Is ordered','Under Production','Under Inspection','Completed','Canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` enum('none','draft','ready','ordered','production','inspection','completed','canceled') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `po_status__enum`
--

INSERT INTO `po_status__enum` (`id`, `text`, `code`, `created_at`, `updated_at`) VALUES
(1, 'None', 'none', '2022-12-21 08:27:26', NULL),
(2, 'Draft', 'draft', '2022-12-20 18:30:00', NULL),
(3, 'Ready For Ordering', 'ready', '2022-12-21 08:28:14', NULL),
(4, 'Is ordered', 'ordered', '2022-12-20 18:30:00', NULL),
(5, 'Under Production', 'production', '2022-12-20 18:30:00', NULL),
(6, 'Under Inspection', 'inspection', '2022-12-21 08:30:06', NULL),
(7, 'Completed', 'completed', '2022-12-21 08:30:15', NULL),
(8, 'Canceled', 'canceled', '2022-12-20 18:30:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `prd_image__tbl`
--

CREATE TABLE `prd_image__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prd_id` int(11) DEFAULT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Filepath',
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prd_image__tbl`
--

INSERT INTO `prd_image__tbl` (`id`, `prd_id`, `filename`, `alt`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(18, 1, '634feb1b590d3_Screenshot 2021-11-12 175013.png', NULL, '2022-10-19 06:48:35', '2022-10-19 06:48:35', NULL, NULL, '0', '0'),
(27, 0, '634ff64645979_Screenshot (4).png', NULL, '2022-10-19 07:36:14', '2022-10-19 07:36:14', NULL, NULL, '0', '0'),
(28, 0, '634ff6464fc91_Screenshot (5).png', NULL, '2022-10-19 07:36:14', '2022-10-19 07:36:14', NULL, NULL, '0', '0'),
(33, 5, '634ff8d02794d_Screenshot (4).png', NULL, '2022-10-19 07:47:04', '2022-10-19 07:47:04', NULL, NULL, '0', '0'),
(121, 1, '635fcd9bbdcae_logo_full.png', NULL, '2022-10-31 07:58:59', '2022-10-31 07:58:59', NULL, NULL, '0', '0'),
(122, 16, '6363cf4a41882_Screenshot (5).png', NULL, '2022-11-03 08:55:14', '2022-11-03 08:55:14', NULL, NULL, '0', '0'),
(125, 20, '6369f6624828e_Screenshot 2021-11-12 175013.png', NULL, '2022-11-08 00:55:38', '2022-11-08 00:55:38', NULL, NULL, '0', '0'),
(126, 22, '637dfe0f5fd7e_1.png', NULL, '2022-11-23 05:33:43', '2022-11-23 05:33:43', NULL, NULL, '0', '0'),
(127, 25, '6389d38d9a300_2.png', NULL, '2022-12-02 04:59:33', '2022-12-02 04:59:33', NULL, NULL, '0', '0'),
(128, 26, '63999baa82808_logo_full.png', NULL, '2022-12-14 04:17:22', '2022-12-14 04:17:22', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `prd_rec__tbl`
--

CREATE TABLE `prd_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `prd_supplier_id` bigint(20) UNSIGNED NOT NULL,
  `prd_supplier_item` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_our_item_no` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_barcode` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_hs_code` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prd_pcs_per_ctn` decimal(10,4) DEFAULT NULL,
  `prd_cbm_ctn` decimal(10,4) DEFAULT NULL,
  `prd_pup` decimal(10,4) DEFAULT NULL,
  `prd_sup` decimal(10,4) DEFAULT NULL,
  `prd_add_notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_id` bigint(20) DEFAULT NULL,
  `prd_sold_by` enum('None','PCS','CTN','KG','Grams','SET') COLLATE utf8mb4_unicode_ci NOT NULL,
  `prd_gw_ctn` decimal(10,4) DEFAULT NULL,
  `prd_ctn_wt` decimal(10,4) DEFAULT NULL,
  `prd_unit_type` enum('PKG','SINGLE') COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prd_rec__tbl`
--

INSERT INTO `prd_rec__tbl` (`id`, `prd_supplier_id`, `prd_supplier_item`, `prd_our_item_no`, `prd_barcode`, `prd_hs_code`, `prd_description`, `prd_pcs_per_ctn`, `prd_cbm_ctn`, `prd_pup`, `prd_sup`, `prd_add_notes`, `customer_id`, `prd_sold_by`, `prd_gw_ctn`, `prd_ctn_wt`, `prd_unit_type`, `brand_name`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(1, 2, '1234567', '12786', '123456543565', '123434543454', 'mollis molestie lorem quisque ut erat curabitur gravida nisi at nibh in hac habitasse platea', '0.0000', '10.0000', '10.0000', '10.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-05 09:00:15', '2022-11-25 09:00:18', 1, NULL, '0', '0'),
(2, 2, '0913432', '12354', '123212345432', '123789878987', 'sagittis sapien cum sociis natoque penatibus et magnis dis parturient', '10.0000', '20.0000', '20.0000', '20.0000', NULL, 1, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-05 09:00:15', '2022-11-15 06:43:41', 2, NULL, '0', '0'),
(3, 3, '29005', '04005', '123456543565', '123434543454', 'Mauris enim leo, rhoncus sed, vestibulum', '12.0000', '10.0000', '10.0000', '10.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-11-15 06:48:21', 1, NULL, '0', '0'),
(4, 6, '0913632', '123548', '123212345432', '123789878987', 'Mauris enim leo, rhoncus sed, vestibulum', '20.0000', '20.0000', '20.0000', '20.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-10-31 03:24:01', 1, NULL, '-1', '0'),
(5, 1, '09113632', '1231548', '123212345432', '123789878987', 'Mauris enim leo, rhoncus sed, vestibulum', '20.0000', '20.0000', '20.0000', '20.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-11-16 23:29:26', 1, NULL, '0', '0'),
(6, 3, '09113632', '1231548', '123212345432', '123789878987', 'Mauris enim leo, rhoncus sed, vestibulum', '4.0000', '20.0000', '20.0000', '20.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-11-15 06:48:21', 1, NULL, '0', '0'),
(7, 4, '09113632', '1231548', '123212345432', '123789878987', 'Mauris enim leo, rhoncus sed, vestibulum', '20.0000', '20.0000', '20.0000', '20.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-11-15 06:24:05', 1, NULL, '0', '0'),
(8, 1, '09113632', '1231548', '123212345432', '123789878987', 'Mauris enim leo, rhoncus sed, vestibulum', '20.0000', '20.0000', '20.0000', '20.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-11-15 05:40:35', 1, NULL, '0', '0'),
(9, 4, '09113632', '1231548', '123212345432', '123789878987', 'Mauris enim leo, rhoncus sed, vestibulum', '20.0000', '20.0000', '20.0000', '20.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-11-15 06:48:21', 1, NULL, '0', '0'),
(10, 7, '09113632', '1231548', '123212345432', '123789878987', 'Mauris enim leo, rhoncus sed, vestibulum', '20.0000', '20.0000', '20.0000', '20.0000', NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-10-07 18:43:30', '2022-10-14 05:55:16', 1, NULL, '0', '0'),
(11, 1, '12345671', 'adadad', '435451', '35453', 'cscfdsf', '4.0000', '4.0000', '4.0000', '4.0000', 'htyyfbh', NULL, 'None', '12.0000', '1.0000', 'PKG', 'lays', '2022-10-19 07:39:29', '2022-11-11 05:44:58', NULL, NULL, '0', '0'),
(16, 1, 'ad', 'BG 113', '9330832007573', '9330832007665', '7\" round plate - Φ175 mm', '1000.0000', '4.0000', '1.0000', '1.0000', '1', NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-03 08:55:14', '2022-11-03 08:55:14', NULL, NULL, '0', '0'),
(17, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-08 00:42:25', '2022-11-08 00:42:58', NULL, NULL, '-1', '0'),
(18, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-08 00:43:16', '2022-11-08 00:43:59', NULL, NULL, '-1', '0'),
(19, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-08 00:44:18', '2022-11-08 00:45:31', NULL, NULL, '-1', '0'),
(20, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-08 00:45:45', '2022-11-08 00:45:45', NULL, NULL, '0', '0'),
(21, 33, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-11 05:36:04', '2022-11-11 05:36:04', NULL, NULL, '0', '0'),
(22, 1, 'BG 113', 'BG 113', '9330832007665', '9330832007665', '7\" round plate - Φ175 mm', '1000.0000', NULL, NULL, NULL, NULL, 1, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-23 05:33:43', '2022-11-25 04:04:34', NULL, NULL, '0', '0'),
(24, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'None', NULL, NULL, 'PKG', 'lays', '2022-11-25 02:01:27', '2022-11-25 02:01:27', NULL, NULL, '0', '0'),
(25, 1, '12345671', 'BG 113', '9330832007665', '9330832007665', '7\" round plate - Φ175 mm', '12.0000', '0.5000', '1.8000', '0.0000', 'nothing', 1, 'CTN', '8.0000', '1.0000', 'SINGLE', 'lays', '2022-12-02 04:57:10', '2022-12-05 07:02:45', NULL, NULL, '0', '0'),
(26, 1, '12345671', 'adadad', '9330832007665', '9330832007665', '7\" round plate - Φ175 mm', '1000.0000', '4.0000', '1.8000', '0.0000', 'nothing', 1, 'PCS', '12.0000', '1.0000', 'PKG', 'lays', '2022-12-14 04:17:22', '2022-12-14 04:17:56', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'web', '2022-12-19 21:22:11', '2022-12-19 21:22:11'),
(2, 'admin', 'web', '2022-12-20 21:58:38', '2022-12-20 21:58:38');

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
(1, 4),
(1, 6),
(2, 1),
(2, 6),
(3, 1),
(3, 6),
(4, 1),
(4, 6),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(9, 4),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_contacts`
--

CREATE TABLE `supplier_contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sup_id` bigint(20) DEFAULT NULL,
  `contact_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier_contacts`
--

INSERT INTO `supplier_contacts` (`id`, `sup_id`, `contact_id`) VALUES
(88, 33, 119),
(92, 33, 121),
(93, 33, 122),
(94, 33, 123),
(95, 33, 124),
(98, 33, 127),
(104, 34, 133),
(105, 34, 134),
(106, 34, 135),
(107, 34, 136),
(108, 34, 137),
(109, 34, 138),
(110, 33, 139),
(111, 34, 140),
(112, 34, 141),
(113, 34, 142),
(114, 34, 143),
(115, 34, 144),
(116, 35, 145),
(117, 36, 166),
(119, 37, 176),
(120, 37, 177),
(121, 40, 193),
(122, 40, 194),
(123, 40, 195),
(124, 42, 196),
(125, 42, 197),
(127, 53, 199),
(128, 53, 200),
(129, 53, 201),
(130, 54, 202),
(131, 54, 203),
(132, 54, 204);

-- --------------------------------------------------------

--
-- Table structure for table `sup_rec__tbl`
--

CREATE TABLE `sup_rec__tbl` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted',
  `tbit` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = modified, 1 = tracked'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sup_rec__tbl`
--

INSERT INTO `sup_rec__tbl` (`id`, `name`, `code`, `contact_id`, `created_at`, `updated_at`, `created_by`, `updated_by`, `sys_state`, `tbit`) VALUES
(1, 'Roxine Amthor', '71453', 2, '2022-10-05 08:56:42', NULL, 1, NULL, '0', '0'),
(2, 'Henry Cordrey', '34367', 1, '2022-10-05 08:56:42', NULL, 2, NULL, '0', '0'),
(3, 'Ivor Dell', '41020', 2, '2022-10-19 18:37:17', NULL, 1, NULL, '0', '0'),
(4, 'Luce Andros', '4005', 1, '2022-10-08 18:37:17', NULL, 1, NULL, '0', '0'),
(5, 'Lorin Andros', '29015', 2, '2022-10-13 18:39:43', '2022-10-21 06:26:41', 2, NULL, '0', '0'),
(6, 'Geoffrey Mack', '29015', 2, '2022-10-21 18:39:43', NULL, 2, NULL, '0', '0'),
(7, 'Currey Farley', '29005', 2, '2022-10-12 18:41:00', NULL, 2, NULL, '0', '0'),
(8, 'Nolan Toddy', '29010', 5, '2022-10-14 18:41:00', '2022-10-20 07:41:53', 1, NULL, '0', '0'),
(9, 'Leon Kermie', '18005', 4, '2022-10-19 18:41:00', NULL, 2, NULL, '0', '0'),
(10, 'Bo Morly', '4070', 3, '2022-10-19 18:41:00', '2022-10-31 02:58:30', 2, NULL, '0', '0'),
(11, 'david warner', '123454', 5, '2022-10-20 07:44:11', '2022-10-20 07:44:11', NULL, NULL, '0', '0'),
(12, 'aron finch', '345433', 2, '2022-10-20 07:45:39', '2022-10-20 07:45:39', NULL, NULL, '0', '0'),
(13, 'hard', '2323', 17, '2022-11-02 08:38:53', '2022-11-02 09:19:51', NULL, NULL, '0', '0'),
(14, 'dmo', '1323', 0, '2022-11-03 23:20:01', '2022-11-03 23:26:52', NULL, NULL, '0', '0'),
(15, 'fdsff', '0', 20, '2022-11-03 23:36:33', '2022-11-03 23:36:33', NULL, NULL, '0', '0'),
(16, 'fsdfewrer', '0', 21, '2022-11-03 23:37:49', '2022-11-04 03:32:10', NULL, NULL, '0', '0'),
(20, 'vandan', '534345', 52, '2022-11-04 04:57:51', '2022-11-04 04:57:51', NULL, NULL, '0', '0'),
(21, 'czcxvcv', '4325453', 53, '2022-11-04 05:04:33', '2022-11-04 05:04:33', NULL, NULL, '0', '0'),
(22, 'addjdsf', '342', 54, '2022-11-04 05:05:34', '2022-11-04 05:05:34', NULL, NULL, '0', '0'),
(23, 'cxzdsfdf', '456456', 52, '2022-11-04 05:07:18', '2022-11-04 05:07:18', NULL, NULL, '0', '0'),
(24, 'sdfsdfd', '5345', 56, '2022-11-04 05:33:27', '2022-11-04 05:37:27', NULL, NULL, '0', '0'),
(25, 'dasd', '4535453', 0, '2022-11-04 05:48:04', '2022-11-04 06:13:30', NULL, NULL, '0', '0'),
(26, 'Nolan Toddy1', '123454', 59, '2022-11-04 06:14:17', '2022-11-04 06:14:17', NULL, NULL, '0', '0'),
(27, 'fdsfd', 'fdsf', 59, '2022-11-06 23:08:10', '2022-11-06 23:20:49', NULL, NULL, '0', '0'),
(29, 'sdffdsf', '345345453', 61, '2022-11-07 01:43:46', '2022-11-07 04:48:47', NULL, NULL, '0', '0'),
(30, 'sdff', 'fdsfdf', 65, '2022-11-07 23:20:10', '2022-11-07 23:20:10', NULL, NULL, '0', '0'),
(31, 'sad', 'rewsf', 65, '2022-11-07 23:26:14', '2022-11-07 23:26:14', NULL, NULL, '0', '0'),
(32, 'adsds', 'rwrer', 72, '2022-11-09 00:42:21', '2022-11-09 00:42:21', NULL, NULL, '0', '0'),
(33, 'sdfd', 'sdff', 0, '2022-11-09 00:50:44', '2022-11-24 23:02:06', NULL, NULL, '0', '0'),
(34, 'dsf', 'ewre', 0, '2022-11-21 02:09:10', '2022-11-21 04:22:42', NULL, NULL, '0', '0'),
(35, 'dsa', '123454', 0, '2022-11-21 04:22:57', '2022-11-24 23:21:14', NULL, NULL, '0', '0'),
(36, 'Nolan Toddy1df', '121', 0, '2022-11-29 01:30:15', '2022-11-29 01:30:15', NULL, NULL, '0', '0'),
(37, 'sdf', 'sdfsd', 0, '2022-11-29 04:11:58', '2022-11-29 04:11:58', NULL, NULL, '0', '0'),
(38, 'sdfdf', 'sfdfsf', 0, '2022-11-30 00:49:28', '2022-11-30 00:49:28', NULL, NULL, '0', '0'),
(39, 'were', 'ewre', 0, '2022-11-30 00:51:33', '2022-11-30 00:51:33', NULL, NULL, '0', '0'),
(40, 'sdsd', 'sdasd', 0, '2022-11-30 00:53:16', '2022-11-30 00:53:16', NULL, NULL, '0', '0'),
(41, 'sad', 'ad', 0, '2022-11-30 01:02:17', '2022-11-30 01:02:17', NULL, NULL, '0', '0'),
(42, 'Nolan Toddy1fsdf', 'sads', 0, '2022-11-30 01:58:24', '2022-11-30 01:58:24', NULL, NULL, '0', '0'),
(53, 'dgf111', 'dfg', 0, '2022-11-30 05:41:13', '2022-11-30 05:47:22', NULL, NULL, '0', '0'),
(54, 'new1212', 'dsds121', 0, '2022-11-30 05:54:48', '2022-11-30 05:55:44', NULL, NULL, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `sys_state` enum('0','1','-1') COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '0 = active, 1 = inactive, -1 = deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `fname`, `lname`, `status`, `sys_state`) VALUES
(1, 'Gregoor Cashley', 'gcashley0@blogspot.com', NULL, '', NULL, '2022-10-03 09:37:25', NULL, '', '', 1, '0'),
(2, 'Niki Haxby', 'nhaxby1@mapy.cz', NULL, '', NULL, '2022-10-03 09:37:25', NULL, '', '', 1, '0'),
(3, 'vandan', 'vandan@gmail.com', NULL, '$2y$10$YywCU1KEmpPVDJCAAbq0Z.IMqGUk2JzTTOy.F.AghvejSYnhqj7/2', 'MjnF5lLxT7vNQtxCZTjRWvictj4jTsPZagd8oqTDgdyr4X5haZDL7aimznj3', '2022-11-27 23:33:40', '2022-11-28 05:09:41', '', '', 1, '0'),
(4, 'vandan1', 'vandan.vmjs@gmail.com', NULL, '$2y$10$WsIZUFo7lpo4Zl.LSVcbBO14so/dHGfxK7ioFAKvz4P1oECPVxBIu', 'PUcjb2l8IgQAjqB8HTQ2dROzzEoG9fhPNqHrWoHbyPyXjlGG8SXbV2PUoZfa', '2022-11-28 01:00:43', '2022-11-28 04:49:59', '', '', 1, '0'),
(6, 'vandan1111', 'vandan111@gmail.com', NULL, '$2y$10$5wIhMyqke6k7cVkpDw2cp.H5G8kpdUC0Sj7YFnuzv.6F4Y4rocYFG', NULL, '2022-12-01 06:34:22', '2022-12-01 06:34:22', '', '', 1, '0'),
(7, 'asdsd', 'asd@fdsdfs', NULL, '$2y$10$oLzTOLYxjPfcYZQlHCka5ekAJveNq7sQQCSX5OSBweDOjXLAA593C', NULL, '2022-12-01 06:37:15', '2022-12-01 06:37:15', '', '', 1, '0'),
(11, 'Super Admin', 'superadmin@gmail.com', NULL, '$2y$10$nt8wEUvErfysdRoNDriqFuLv/RRZkXP8wf6fvfE/75OXAnXcU9Foa', NULL, '2022-12-19 21:22:11', '2022-12-20 03:45:25', 'super', 'admin', 1, '0'),
(12, 'brian pinto', 'brian.pinto@cybernetworks.com.au', NULL, '$2y$10$RWLzbbxY4yBSULxc3BXipusmtf1UOsj5ZTp35Zd2CqeoJQQEtI86G', NULL, '2022-12-20 22:00:16', '2022-12-20 22:00:16', 'brian', 'pinto', 1, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address_rec_tbl`
--
ALTER TABLE `address_rec_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `address_rec_tbl_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `conli_rec__tbl`
--
ALTER TABLE `conli_rec__tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conli_rec__tbl_conli_con_id_foreign` (`conli_con_id`);

--
-- Indexes for table `contacts_rec__tbl`
--
ALTER TABLE `contacts_rec__tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `con_payment_terms__enum`
--
ALTER TABLE `con_payment_terms__enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `con_rec__tbl`
--
ALTER TABLE `con_rec__tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `con_rec__tbl_customer_id_foreign` (`customer_id`),
  ADD KEY `con_rec__tbl_con_status_id_foreign` (`con_status_id`),
  ADD KEY `con_rec__tbl_con_type_id_foreign` (`con_type_id`),
  ADD KEY `con_rec__tbl_con_payment_type_id_foreign` (`con_payment_type_id`);

--
-- Indexes for table `con_status__enum`
--
ALTER TABLE `con_status__enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `con_type__enum`
--
ALTER TABLE `con_type__enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_contacts`
--
ALTER TABLE `customer_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cust_rec_tbl`
--
ALTER TABLE `cust_rec_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ga_address`
--
ALTER TABLE `ga_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ga_to_contacts`
--
ALTER TABLE `ga_to_contacts`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pili_rec__tbl`
--
ALTER TABLE `pili_rec__tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pili_rec__tbl_pili_pi_id_foreign` (`pili_pi_id`);

--
-- Indexes for table `pili_unit__enum`
--
ALTER TABLE `pili_unit__enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pi_destination_address_contacts`
--
ALTER TABLE `pi_destination_address_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pi_from_address_contacts`
--
ALTER TABLE `pi_from_address_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pi_payment_terms__enum_tbl`
--
ALTER TABLE `pi_payment_terms__enum_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pi_rec__tbl`
--
ALTER TABLE `pi_rec__tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pi_rec__tbl_customer_id_foreign` (`customer_id`),
  ADD KEY `pi_rec__tbl_status_foreign` (`status`),
  ADD KEY `pi_rec__tbl_term_foreign` (`term`),
  ADD KEY `pi_rec__tbl_payment_foreign` (`payment`);

--
-- Indexes for table `pi_shipping_terms__enum_tbl`
--
ALTER TABLE `pi_shipping_terms__enum_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pi_status_enum_tbl`
--
ALTER TABLE `pi_status_enum_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `poli_rec__tbl`
--
ALTER TABLE `poli_rec__tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_payment_terms__enum`
--
ALTER TABLE `po_payment_terms__enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_rec__tbl`
--
ALTER TABLE `po_rec__tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `po_rec__tbl_po_payment_type_id_foreign` (`po_payment_type_id`),
  ADD KEY `po_rec__tbl_po_status_id_foreign` (`po_status_id`);

--
-- Indexes for table `po_status__enum`
--
ALTER TABLE `po_status__enum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_image__tbl`
--
ALTER TABLE `prd_image__tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prd_rec__tbl`
--
ALTER TABLE `prd_rec__tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prd_rec__tbl_prd_supplier_id_foreign` (`prd_supplier_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `supplier_contacts`
--
ALTER TABLE `supplier_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sup_rec__tbl`
--
ALTER TABLE `sup_rec__tbl`
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
-- AUTO_INCREMENT for table `address_rec_tbl`
--
ALTER TABLE `address_rec_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `conli_rec__tbl`
--
ALTER TABLE `conli_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts_rec__tbl`
--
ALTER TABLE `contacts_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=208;

--
-- AUTO_INCREMENT for table `con_payment_terms__enum`
--
ALTER TABLE `con_payment_terms__enum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `con_rec__tbl`
--
ALTER TABLE `con_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `con_status__enum`
--
ALTER TABLE `con_status__enum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `con_type__enum`
--
ALTER TABLE `con_type__enum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customer_contacts`
--
ALTER TABLE `customer_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cust_rec_tbl`
--
ALTER TABLE `cust_rec_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ga_address`
--
ALTER TABLE `ga_address`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ga_to_contacts`
--
ALTER TABLE `ga_to_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pili_rec__tbl`
--
ALTER TABLE `pili_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pili_unit__enum`
--
ALTER TABLE `pili_unit__enum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pi_destination_address_contacts`
--
ALTER TABLE `pi_destination_address_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pi_from_address_contacts`
--
ALTER TABLE `pi_from_address_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pi_payment_terms__enum_tbl`
--
ALTER TABLE `pi_payment_terms__enum_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pi_rec__tbl`
--
ALTER TABLE `pi_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pi_shipping_terms__enum_tbl`
--
ALTER TABLE `pi_shipping_terms__enum_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pi_status_enum_tbl`
--
ALTER TABLE `pi_status_enum_tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `poli_rec__tbl`
--
ALTER TABLE `poli_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `po_payment_terms__enum`
--
ALTER TABLE `po_payment_terms__enum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_rec__tbl`
--
ALTER TABLE `po_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `po_status__enum`
--
ALTER TABLE `po_status__enum`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `prd_image__tbl`
--
ALTER TABLE `prd_image__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `prd_rec__tbl`
--
ALTER TABLE `prd_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `supplier_contacts`
--
ALTER TABLE `supplier_contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `sup_rec__tbl`
--
ALTER TABLE `sup_rec__tbl`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address_rec_tbl`
--
ALTER TABLE `address_rec_tbl`
  ADD CONSTRAINT `address_rec_tbl_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `cust_rec_tbl` (`id`);

--
-- Constraints for table `conli_rec__tbl`
--
ALTER TABLE `conli_rec__tbl`
  ADD CONSTRAINT `conli_rec__tbl_conli_con_id_foreign` FOREIGN KEY (`conli_con_id`) REFERENCES `con_rec__tbl` (`id`);

--
-- Constraints for table `con_rec__tbl`
--
ALTER TABLE `con_rec__tbl`
  ADD CONSTRAINT `con_rec__tbl_con_payment_type_id_foreign` FOREIGN KEY (`con_payment_type_id`) REFERENCES `con_payment_terms__enum` (`id`),
  ADD CONSTRAINT `con_rec__tbl_con_status_id_foreign` FOREIGN KEY (`con_status_id`) REFERENCES `con_status__enum` (`id`),
  ADD CONSTRAINT `con_rec__tbl_con_type_id_foreign` FOREIGN KEY (`con_type_id`) REFERENCES `con_type__enum` (`id`),
  ADD CONSTRAINT `con_rec__tbl_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `cust_rec_tbl` (`id`);

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
-- Constraints for table `pili_rec__tbl`
--
ALTER TABLE `pili_rec__tbl`
  ADD CONSTRAINT `pili_rec__tbl_pili_pi_id_foreign` FOREIGN KEY (`pili_pi_id`) REFERENCES `pi_rec__tbl` (`id`);

--
-- Constraints for table `pi_rec__tbl`
--
ALTER TABLE `pi_rec__tbl`
  ADD CONSTRAINT `pi_rec__tbl_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `cust_rec_tbl` (`id`),
  ADD CONSTRAINT `pi_rec__tbl_payment_foreign` FOREIGN KEY (`payment`) REFERENCES `pi_payment_terms__enum_tbl` (`id`),
  ADD CONSTRAINT `pi_rec__tbl_status_foreign` FOREIGN KEY (`status`) REFERENCES `pi_status_enum_tbl` (`id`),
  ADD CONSTRAINT `pi_rec__tbl_term_foreign` FOREIGN KEY (`term`) REFERENCES `pi_shipping_terms__enum_tbl` (`id`);

--
-- Constraints for table `po_rec__tbl`
--
ALTER TABLE `po_rec__tbl`
  ADD CONSTRAINT `po_rec__tbl_po_payment_type_id_foreign` FOREIGN KEY (`po_payment_type_id`) REFERENCES `po_payment_terms__enum` (`id`),
  ADD CONSTRAINT `po_rec__tbl_po_status_id_foreign` FOREIGN KEY (`po_status_id`) REFERENCES `po_status__enum` (`id`);

--
-- Constraints for table `prd_rec__tbl`
--
ALTER TABLE `prd_rec__tbl`
  ADD CONSTRAINT `prd_rec__tbl_prd_supplier_id_foreign` FOREIGN KEY (`prd_supplier_id`) REFERENCES `sup_rec__tbl` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
