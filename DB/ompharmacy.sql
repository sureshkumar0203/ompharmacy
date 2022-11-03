-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2019 at 01:23 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ompharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `vision_mission` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `description`, `vision_mission`, `created_at`, `updated_at`) VALUES
(1, '<p><strong>HAH</strong>&nbsp;(Healthcare@Home) is a new concept of providing personalised healthcare assistant to all. It runs under OM HEALTHCARE ENTERPRISES which is fullfilling patients healthcare needs for the last 19 years.</p>', '<p><strong>OUR VISION</strong></p>\r\n\r\n<p>HAH aims to provide easily accessible international standards of healthcare for each family in the comfort of their home.</p>\r\n\r\n<p><strong>OUR MISSION</strong></p>\r\n\r\n<ul>\r\n	<li>HAH has undertaken it as the most responsible mission to rise up as a premier health care unit in and around ODISHA.</li>\r\n	<li>HAH will promote the health and well-being of patients, members, and families by providing cost-effective, high-Standard healthcare Services at home and community.</li>\r\n	<li>HAH mission is to be a leader in the development of innovative services that enable people to function as independently as possible in their community and comfort of their home.</li>\r\n	<li>HAH will help to develop healthcare policies that support beneficial home- and community-based services.</li>\r\n</ul>', '2019-05-24 09:43:48', '2019-04-27 11:17:58');

-- --------------------------------------------------------

--
-- Table structure for table `associate_documents`
--

CREATE TABLE `associate_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `id_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `residence_proof` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `educational_certificates` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `verification_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agreement_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `associate_documents`
--

INSERT INTO `associate_documents` (`id`, `user_id`, `id_proof`, `residence_proof`, `educational_certificates`, `verification_certificate`, `experience_certificate`, `agreement_letter`, `created_at`, `updated_at`) VALUES
(4, 18, 'idproof/0CDvW6wPqj8EfcrZ54kjvUbZuZ90FDBO1yAlfM0f.jpeg', 'residenceproof/EqCA8DVT7mHJxwbGHytGyHUoqyS9IKUtoFhBSS7a.jpeg', 'educational_certificates/2JdvBO0y73mw3fThUUIBXTg8J2yMG0rUMwiX138A.jpeg', 'verification_certificate/LjZATVqRqLWAg5buk7JsJfSQFqRscgzqYU7W5zYg.jpeg', 'experience_certificate/7Lyv5Jl9vZmX6RVknsxCK9mALbpbCOM13kcwnkDd.jpeg', 'agreement_letter/zrdZaenapbkEZtcucuMo8RgNLYEUtjenSyv8mXZY.jpeg', '2019-01-28 03:45:30', '2019-05-02 04:07:52'),
(7, 21, 'idproof/tz5D52AkiargeEBbuLOLHyuVKQX1CwQ2uvN0mwFv.jpeg', 'residenceproof/WpbeNQfnG1cX1zltzIDEX3cisBfk0mLVMZssqAV5.jpeg', 'educational_certificates/JohiW3gF2LP44PFOZxJ4F3w13feWLKVWJhnxD4Hb.jpeg', 'verification_certificate/XY7t6SKDhrxELxwqjP74ht125Fd3JVDW6V4EDcbK.jpeg', 'experience_certificate/cr8VSCyALJMa6o6FvHktZZLJA1EVYNKgITrwqEVt.jpeg', 'agreement_letter/yXfg1jiVVLocGBggSpWfHBDuIEtTAcBJGQ30sacD.jpeg', '2019-02-21 01:13:30', '2019-05-02 01:05:42'),
(8, 29, 'idproof/DTHIH3SnPGIE3IAscGAMxjHjChclWEvC79bmY26q.jpeg', 'residenceproof/JKHdq7amSHU8OSbAN26fPRm2MccmUazYQia45kBA.jpeg', 'educational_certificates/C3lTFXzE63BwFlQVmeAPb3yrTK0eqtUumZynEHPA.jpeg', 'verification_certificate/dhWxQlYY6tFw8SKytyJ4YzR1q827M6H6gmNN1Lzq.jpeg', 'experience_certificate/36uFqpK7Fk3Q22nrFC1uXTiDX6gFTFYhLgNagL2b.jpeg', 'agreement_letter/2K7kuFXPBHS2nOhisAz7uvPW0dP6rGsB3of7tumd.jpeg', '2019-05-02 04:49:44', '2019-05-02 04:49:44'),
(9, 32, 'idproof/6x1DrfKbQw1K9unZ4Zp5ZEcOpda2uNAxH7F2wX91.jpeg', 'residenceproof/UPsyMf9KkMesmFZppmnEqKicV8POk00mlHOgG3ds.jpeg', 'educational_certificates/vHlwUeXILRX05JTnGkFTHYdn3SzDowBlkqimEGTc.jpeg', 'verification_certificate/lPz6OesORnJlYpv2Ly2GJO5KDljWpYayP1awQfHX.png', 'experience_certificate/2Fut7qBY156MHeqBSdWFXngydRc1BwCgZx39vKdV.jpeg', 'agreement_letter/nncZH1RqDNoBHtGZeDxiBXbx9ndd2jWRwiNioUzG.jpeg', '2019-05-22 11:43:00', '2019-05-22 11:43:00');

-- --------------------------------------------------------

--
-- Table structure for table `bank_transfers`
--

CREATE TABLE `bank_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_holder_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ifsc_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bank_transfers`
--

INSERT INTO `bank_transfers` (`id`, `account_holder_name`, `account_number`, `branch_name`, `bank_name`, `ifsc_code`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trideep Dakua', '0030121444527', 'Saheednagar', 'SBI', 'SBIN00045654', '100.00', 1, '2019-07-03 11:01:07', '2019-07-03 11:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `description`, `link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'DIETCIAN', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices .', 'http://google.com/', '2y10ZlxZrlfRc7Y38SQrONoqtezdj9ua5ZbwAQ9Kdl58d9H6jhocKMve.jpg', '2018-12-11 13:42:12', '2019-01-09 05:57:50'),
(2, 'DOCTOR VISIT', 'easily book your doctor consultation', 'http://yahoo.com/', '2y10csyGzLM34jGplzYjNmSmDOUCbg2YprrszcXcU94lmquZAIts0ysW.jpg', '2018-12-11 13:42:32', '2019-05-24 10:39:23'),
(3, 'ELDER CARE', 'Get an Healthy, Active, Happy life every day', 'https://www.bletechnolabs.com/projects/ompharmacy/our-services/65-elder-care', '2y10gMqPQj5TP96WmYZA19meDom3VOypk4z6GQgQRsuTobLVa8kuWi32.jpg', '2019-05-24 10:45:54', '2019-05-24 10:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `slug`, `sort_description`, `description`, `image`, `author`, `status`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`) VALUES
(3, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting-industry', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting', '<p style=\"text-align:justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software</p>\r\n\r\n<p style=\"text-align:justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2y10YDqPZXXUKL1Lr7Acp8nOxtAB4M1EeAXyC5KcrvrnHhgm4VEqAHgW.jpg', 'Trideep', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', 'Lorem, Ipsum,', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', '2018-12-19 10:49:25', '2018-12-20 04:45:59'),
(4, 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'lorem-ipsum-is-simply-dummy-text-of-the-printing-and-typesetting', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software', '<p style=\"text-align:justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software</p>\r\n\r\n<p style=\"text-align:justify\">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2y10FLWnHYB0EzJOeJXXoW25Ue4Oqo6th9O4du11TE8oNHfXyw2RhaC.jpg', 'Soumya', 1, 'Lorem Ipsum is simply dummy text of the printing and typesetting', 'Lorem, Ipsum, printing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', '2018-12-19 10:50:12', '2018-12-19 13:14:50'),
(5, 'Test', 'test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempo...	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempo...', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempo... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempo... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempo... Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempo...</p>', '2y10ZIaJKrtpOUjGBgh3dqGAwFapldvTt4XwK3sniOrhhGjWXAN2mQS.jpeg', 'sdfsdf', 1, 'sdfs', 'fsdfsd', 'fs', '2019-05-01 07:14:44', '2019-05-01 07:14:44');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `blog_id`, `name`, `email`, `comment`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 'Hakeem Sweeney', 'kola@mailinator.com', 'Quia non obcaecati aut ea ullam debitis neque aliquid odio numquam dolorum tempor ex ad qui duis', 1, '2018-12-20 12:11:11', '2019-01-14 06:56:51'),
(2, 4, 'Trideep Dakua', 'trideep@bletindia.com', 'Test comment', 1, '2018-12-20 12:11:45', '2019-05-16 10:24:15'),
(5, 3, 'Jason Brewer', 'biwariz@mailinator.com', 'Aut repudiandae duis voluptate illo voluptas', 1, '2018-12-20 12:14:54', '2019-05-16 10:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `book_services`
--

CREATE TABLE `book_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `services_id` int(10) UNSIGNED DEFAULT NULL,
  `associate_ids` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `acpt_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Not Accepted,1=Accepted, 2=Cancellation, 3=Complete',
  `req_acpt_id` int(10) UNSIGNED DEFAULT NULL,
  `req_assign_by` int(11) UNSIGNED DEFAULT NULL,
  `disp_only_adm` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=Both,1=Admin',
  `price` decimal(7,2) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` time DEFAULT NULL,
  `service_address` text COLLATE utf8mb4_unicode_ci,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cancel_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `book_services`
--

INSERT INTO `book_services` (`id`, `user_id`, `services_id`, `associate_ids`, `acpt_status`, `req_acpt_id`, `req_assign_by`, `disp_only_adm`, `price`, `booking_date`, `booking_time`, `service_address`, `lat`, `lng`, `cancel_note`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '1', 0, NULL, NULL, 1, '100.00', '2019-07-03', '18:00:00', 'Bhubaneswar, LS,Odisha', '20.2913503', '85.8716515', NULL, '2019-07-03 11:03:05', '2019-07-03 11:03:05'),
(2, 1, 18, '1', 2, NULL, NULL, 1, '1.00', '2019-06-12', '12:15:00', 'RMRC Campus,kalinga hospital square, samanta vihar,bhubaneswar', '20.2913503', '85.8716515', 'By mistakly  booked', '2019-07-03 11:05:57', '2019-07-03 11:13:30'),
(3, 1, 19, '29,18', 3, 18, NULL, 0, '1.00', '2019-06-12', '12:15:00', 'RMRC Campus,kalinga hospital square, samanta vihar,bhubaneswar', '20.2913503', '85.8716515', NULL, '2019-07-03 11:09:56', '2019-07-03 11:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_keywords` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`, `updated_at`) VALUES
(1, 'Terms and condition', 'terms-and-condition', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'Terms and condition', 'Terms and condition', 'Terms and condition', '2019-01-29 04:54:03', '2019-05-20 05:58:47'),
(2, 'Privacy policy', 'privacy-policy', '<p>As per company policy&nbsp;</p>', 'Privacy policy', 'Privacy policy', 'Privacy policy', '2019-01-29 04:48:16', '2019-05-24 10:47:31'),
(3, 'Refund and cancellation', 'refund-and-cancellation', '<p>As guided by company</p>', 'Refund and cancellation', 'Refund and cancellation', 'Refund and cancellation', '2019-01-29 05:57:14', '2019-04-28 12:52:12'),
(4, 'Payment', 'payment', '<p>All type of option available</p>', 'Payment', 'Payment', 'Payment', NULL, '2019-04-28 12:53:37'),
(5, 'Cancellation of Service', 'cancellation-of-service', '<p>As per company policy</p>', 'Cancellation of Service', 'Cancellation of Service', 'Cancellation of Service', NULL, '2019-04-28 12:54:37'),
(6, 'Video Content', 'video-content', '<p>All medicines, food stuff &amp; toiletries are purchased against 100% bills &amp; hence they carry a genuine &amp; authentic.</p>', NULL, NULL, NULL, NULL, '2019-05-23 09:13:51');

-- --------------------------------------------------------

--
-- Table structure for table `cms_pages`
--

CREATE TABLE `cms_pages` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `adv_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `btn_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `service_request` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - Both, 1 - Admin',
  `from_time` time DEFAULT NULL,
  `to_time` time DEFAULT NULL,
  `time24_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0=24 Hour, 1=Restriction',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cms_pages`
--

INSERT INTO `cms_pages` (`id`, `title`, `slug`, `description`, `image`, `banner_img`, `adv_img`, `btn_name`, `parent_id`, `status`, `service_request`, `from_time`, `to_time`, `time24_status`, `created_at`, `updated_at`) VALUES
(1, 'PHARMACY', 'pharmacy', '<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2y10zEnUpiHNcmRIeKAGPlope45Zv8jHISLEFb88JJW79OKASQP9.jpg', '2y10Op57EN2KeXn15igw559SIee7IsIOXKSQ4ezlAAjTpAAYVR6nsvhxS.jpg', NULL, 'Order Now', 0, 1, 0, NULL, NULL, 0, '2019-01-08 07:16:14', '2019-05-01 09:16:33'),
(2, 'PATHOLAB', 'patholab', '<p>simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '2y10gRTJsh8RszL7XAcnNrNeP2qv52wOsmMaIxAX4uAGuU4IQTmd60a.jpg', '2y102CU7XW382l3wOvwhiGFBOUSeajacxux3lRtLstwwYx8ztX7NdUK.jpg', '2y10YBoWjf4oWGW0AAZJ9xo1nhdE8SoEu5rkc6yA1Bi99AR8eCOlGq.jpg', 'Book Now', 0, 1, 0, NULL, NULL, 0, '2019-01-08 07:17:11', '2019-05-31 10:39:16'),
(3, 'ELDER CARE', 'elder-care', '<p><strong>ELDER CARE </strong></p>\r\n\r\n<p>Elder care, also referred to as senior care, is a special care service designed to meet the various needs and requirements of senior citizens. Elder care is a vast field and includes varied services like assisted living, nursing care, adult day care and home care. Although old age itself is no reason to consider Elder care, it is the varied physical disabilities and diseases that lead a person to contemplate on availing elder care services. A large number of senior citizens still live with their family and their care is jointly undertaken by family members. However, in today&rsquo;s situation there are cases when most family members work and are unable to give proper attention and care to their ailing seniors and as such seek for reliable and efficient elder care programs. HAH (Healthcare At Home) brings to you a comprehensive healthcare solution for all ageing needs. Our Care Plans are specially crafted in catering to individual healthcare needs. With a dedicated Health Manager assigned, who ensures all your healthcare needs are taken care of, be rest assured. Through this plan, we also assist you with services such as Doctor Visits, Diagnostic Services, Nurse, Trained Attendants, Pharmacy, Equipment, Physiotherapy and Nutrition.</p>\r\n\r\n<p><strong>Importance of Elderly care</strong></p>\r\n\r\n<p>Getting old could be a difficult experience when your health starts to deteriorate and you get increasingly dependent on others for your daily activities. It is at this time that the elderly require the most care and compassion. The importance of a proper elderly care can never be overstated as they too deserve dignity of life. Although modern constraints of life do not always allow people to take care of their elderly however, they can always opt for appropriate elderly home health care service for the smooth functioning of their life.</p>\r\n\r\n<p><strong>When is Elder Care Needed? </strong></p>\r\n\r\n<p>Elder care becomes necessary when old people start facing troubles with daily life activities like cooking, cleaning, bathing, taking medicines etc, and there is no family member available to look over them. Varied diseases and physical disabilities in old people also make elder care mandatory for them, so that they too can live independently and with dignity. The type of geriatric care needed depends on the health condition of the old person and the severity of the problem and the type of care needed. Most people don&rsquo;t require full time nurses, while there are a few who needed a 24/7 caregiver owing to the severity of their problem.</p>\r\n\r\n<p><strong>Any HAH (Healthcare At Home) Service worth Rs. 999/-</strong></p>\r\n\r\n<p>Avail any HAH (Healthcare At Home) service worth Rs. 999/-. HAH (Healthcare At Home) specializes in Diagnostics, Physiotherapy, Nutrition, Nurse, Trained Attendants, Elder Care, Doctor Consultations, Mother &amp; Baby Care, Vaccination, &amp; Surgery Assistance at the comfort of your home.</p>\r\n\r\n<p><strong>* Personal Health Manager </strong></p>\r\n\r\n<p>As a member of our Care Plan, a dedicated Health Manager is assigned to you. This Health Manager will be your single point of contact with HAH(Healthcare At Home) , be it an appointment booking, general queries on your health, or a medical query.</p>\r\n\r\n<p><strong>* Doctor Consultation </strong></p>\r\n\r\n<p>Avail 1 Doctor Consultation on call worth Rs. 200/- at the comfort of your home.</p>\r\n\r\n<p><strong>* Nutrition Assessment </strong></p>\r\n\r\n<p>Avail 1 Nutrition Assessment on call worth Rs. 200/- at the comfort of your home.</p>\r\n\r\n<p><strong>* Customized Care Plan </strong></p>\r\n\r\n<p>Every individual is unique. Based on your medical condition and requirements, the medical team at Portea creates a customized care plan free of cost. Customized care plans cost anywhere between Rs. 2500 to Rs. 3000.</p>\r\n\r\n<p><strong>* Check Health Records Online</strong></p>\r\n\r\n<p>All your health records are updated on our portal and can be viewed by you or your guardian at anytime from anywhere.</p>\r\n\r\n<p><strong>* Discounted Medicine Home Delivery</strong></p>\r\n\r\n<p>Home delivery of Pharmacy is now available. Avail 12% off an all orders.</p>\r\n\r\n<p><strong>* Discounted Equipment (Rentals &amp; Purchase) </strong><br />\r\nHome delivery of Equipment (Rental &amp; Purchase) is now available. Avail 5% off on equipment purchase and 10% off on equipment rentals.</p>\r\n\r\n<p><strong>How to prepare for Elderly care service at home</strong></p>\r\n\r\n<p>Before you select any elderly home care services there are few things you need to keep in mind. For instance, the type of care needed and the type of care available, the types of elderly health care services offered to provide overall care and can the service be modified to suit one&rsquo;s need.</p>\r\n\r\n<p>After having selected an appropriate geriatric care, there are a few things that you need to make prior preparation for an effective and smooth elder care at home</p>\r\n\r\n<p>&bull; Keep all the prescriptions and medications of the elderly handy as the caregiver would ask for it. &bull; Note down a family members contact number in case of emergencies.</p>\r\n\r\n<p>&bull; Note down the doctors name and contact numbers who have been overlooking the elderly healthcare services.</p>\r\n\r\n<p>&bull; Provide the list of diet and nutritional needs as prescribed by the doctor so that the caregiver can plan meals accordingly.</p>\r\n\r\n<p>&bull; Prepare a list of activities or exercises to be performed by the elderly as prescribed by the doctor, so that the caregiver is aware of it and would help the elderly in doing so.</p>\r\n\r\n<p>&bull; Inform the caregiver of any special needs or concerns that needs to be taken care of by the caregiver.</p>\r\n\r\n<p>Caring for the elderly can be extremely challenging if the caregiver is not able to strike a chord with the elderly. However, our caregivers are compassionate people and know how to establish a bond to provide proper care. And as much as physical care is needed, all that the elderly longs for is someone to listen to them and communicate with them. Our caregivers are appropriately trained to give overall elder care at home that includes their physical and mental well being.</p>', NULL, NULL, NULL, NULL, 5, 1, 0, NULL, NULL, 0, '2019-01-09 10:08:20', '2019-04-24 14:05:31'),
(4, 'Patient Benefits from switching to home delivery', 'patient-benefits-from-switching-to-home-delivery', '<ul>\r\n	<li>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</li>\r\n	<li>Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s,</li>\r\n	<li>when an unknown printer took a galley of type and scrambled it to make a type specimen book.</li>\r\n</ul>\r\n\r\n<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 0, '2019-01-09 10:19:05', '2019-01-16 07:23:25'),
(5, 'Key features', 'key-features', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 1, 1, 0, NULL, NULL, 0, '2019-01-09 10:37:25', '2019-01-28 05:23:45'),
(6, 'Features', 'features', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 2, 1, 0, NULL, NULL, 0, '2019-01-09 10:40:43', '2019-01-09 10:40:43'),
(7, 'Packages', 'packages', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 2, 1, 0, NULL, NULL, 0, '2019-01-09 10:41:02', '2019-01-09 10:41:02'),
(8, 'How can we help', 'how-can-we-help', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 2, 1, 0, NULL, NULL, 0, '2019-01-09 10:41:43', '2019-02-04 06:59:13'),
(9, 'This is for testing', 'this-is-for-testing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 3, 1, 0, NULL, NULL, 0, '2019-01-09 10:58:04', '2019-04-22 19:07:16'),
(10, 'When do you need us', 'when-do-you-need-us', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 3, 1, 0, NULL, NULL, 0, '2019-01-09 10:58:36', '2019-01-09 10:58:36'),
(11, 'How can we help', 'how-can-we-help', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 3, 1, 0, NULL, NULL, 0, '2019-01-09 11:06:08', '2019-01-09 11:06:08'),
(12, 'Executive health check up for women', 'executive-health-check-up-for-women', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', NULL, NULL, NULL, NULL, 7, 1, 0, NULL, NULL, 0, '2019-01-09 12:25:32', '2019-01-09 12:25:32'),
(14, 'BED SIDE ATTENTANT', 'bed-side-attentant', '<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '', '', '', '', 14, 1, 0, NULL, NULL, 0, '2019-01-28 07:02:02', '2019-04-06 13:43:22'),
(27, 'MATERNAL CARE', 'maternal-care', '<p>Maternal health is the health of women during pregnancy, childbirth, and the postpartum period. It encompasses the health care dimensions of family planning, preconception, prenatal, and postnatal care in order to ensure a positive and fulfilling experience in most cases and reduce maternal morbidity and mortality in other cases</p>', '2y10YoQMqPc0gRNFedbDKtT5eDnUuV36WjtAIzudbj9iaZ6wJRwkh8O.png', '2y10c01F4crv0M2d2LmjBmiuVWa64VR1plvSezfENRjFJiwXEarkG.jpg', '2y10X8fwyRilCnKfGGKsIQcI5ufX0mIW6ZFj7Sz6WfUla5OTJw8mi8W.jpg', 'MOTHER & CHILD CARE', 0, 1, 1, '06:00:00', '23:45:00', 1, '2019-04-09 17:07:40', '2019-05-31 09:54:56');
INSERT INTO `cms_pages` (`id`, `title`, `slug`, `description`, `image`, `banner_img`, `adv_img`, `btn_name`, `parent_id`, `status`, `service_request`, `from_time`, `to_time`, `time24_status`, `created_at`, `updated_at`) VALUES
(34, 'NURSING CARE', 'nursing-care', '<p><strong><em>WHAT IS AN IN-HOME NURSING SERVICE?</em></strong></p>\r\n\r\n<p>Home nursing services encompasses a wide range of healthcare services that can be easily administered at your home. Home care nursing services are usually cheaper than hospitals and nursing homes, while being just as effective as the medical care offered in a hospital or nursing home. An in-home nursing service offers personalized nursing care at home as offered in a typical hospital while being more compassionate towards the patient and gets integrated into the patient&rsquo;s family and develops an emotional bond with the patient and their family. The services offered by home care nursing are provided by registered nurses, physiotherapists and occupational therapists among others. And as such you need not worry on the quality of service offered by the home nurse. In the past, the phrases In-Home Care, Home Care and Home Health Care were used interchangeably. Today however, people have developed a better understanding towards Home Health Care or In-Home nursing service which is basically skilled nursing care whereas the term In-Home Care refers to non-medical care services like personal care and companionship and supervision.</p>\r\n\r\n<p><em><strong>WHEN DO YOU NEED US?</strong></em></p>\r\n\r\n<p>The main goal of home nursing service is to treat an illness or injury. The home nursing services usually entails wound care for pressure sores or surgical wound, patient and care &ndash; giver education, Intravenous or nutrition therapy, injections, rehabilitation therapies and monitoring serious illness and unstable health status. Our in-home nurses excel in providing services such as post-surgical care, elder care, chronic care, tracheotomy, urinary catheterization care, wound care, injections, and IV infusion. What&rsquo;s more, they are always supervised by a senior doctor. Get well sooner by getting 12 / 24-hr care from a HAH (Healthcare At Home) in-home nurse.</p>\r\n\r\n<p><em><strong>Benefits of home nursing care at home: </strong></em></p>\r\n\r\n<p>The benefit of home health care is plenty. Besides being convenient than getting admitted in a hospital or nursing home, the nursing care at home also helps a patient recover sooner, as it has been found that people tend to recover sooner from their illness or ailments when surrounded by their loved ones</p>\r\n\r\n<p>. &bull; It brings skilled nursing care in the comfort of your home.</p>\r\n\r\n<p>&bull; Nursing care at home also helps in managing chronic health conditions to avoid unnecessary hospitalization.</p>\r\n\r\n<p>&bull; Home care nursing services also help in providing recovery care at home following a hospital stay for illness or injury.</p>\r\n\r\n<p>&nbsp;&bull; It offers one &ndash; on &ndash; one focus and support.</p>\r\n\r\n<p>&bull; Clients have better health outcomes.</p>\r\n\r\n<p>&bull; It offers medication management.</p>\r\n\r\n<p>&bull; It also supports diet and nutrition. Home health care nurses can be there to support the patient in your absence.</p>\r\n\r\n<p><em><strong>What to expect from Nursing Services at home?</strong></em></p>\r\n\r\n<p>Home care nursing starts only after the recommendation of a doctor, and it is important for the patient to see a home nurse as often as a doctor. The nursing services as mentioned before are provided by registered nurses who help in ongoing medical support and rehabilitative care. The basic medical attention one can expect from a nursing assistant are as follows:</p>\r\n\r\n<p>&bull; Home care nurses on their part check upon the diet of the patient, take readings of blood pressure, temperature, heart rate and breathing.</p>\r\n\r\n<p>&bull; Regularly check whether the patient is properly following the prescription and any other treatments. &bull; Enquire about your health and any sort of pain experienced.</p>\r\n\r\n<p>&bull; Check on the safety of the patient at home, whether any medical device is needed for the care of the patient and its feasibility at home.</p>\r\n\r\n<p>&bull; Educate the patient about self-care.</p>\r\n\r\n<p>&bull; And most importantly regularly co &ndash; ordinate with the doctor to provide a proper course of health care.</p>\r\n\r\n<p><em><strong>Cost of Nursing Care Services: </strong></em></p>\r\n\r\n<p>The home nursing services are now much in demand owing to rising hospitalization charges, availability of quality health care services and the demand of the elderly who prefer familiar surroundings to sterile hospitals and nursing homes. The cost of home care nursing services varies depending on the criticality of the illness and the duration of the service sought. Nevertheless the cost of the home care nursing services has been found to be anywhere between 20% and 50% cheaper as compared to hospitalization.</p>\r\n\r\n<p>Looking at the growth of the home healthcare services, several insurance agencies have brought forth varied policies and coverage options that cater to various needs and specifications. The benefit period ranges from three to five years and is related to maximum daily benefit over the number of years in the benefit period. However, insurance covers only part of the total claims for specific products and services and the amount for home healthcare is capped.</p>\r\n\r\n<p>The cost of home health care insurance also depends on several factors like your residential area and the type of care you need. Contact your general insurance provider and enquire about their home health care policy and the premium they can work out for you.</p>\r\n\r\n<p><em><strong>Preparing for Home Nursing Service:</strong></em></p>\r\n\r\n<p>Proper prior preparation for home healthcare is ideal to make the most of the at home nursing service. There are a few set of things that need to be done before you avail of the nursing services like;</p>\r\n\r\n<p>&bull; Create a personal emergency contact list.&nbsp;</p>\r\n\r\n<p>&bull; Have your prescription and other reports ready.</p>\r\n\r\n<p>&bull; Contact list of your doctor.</p>\r\n\r\n<p>&bull; Make a list of the tasks expected from the nurse.</p>\r\n\r\n<p>&bull; Explain to the nurse any specific instruction you would like the nurse to know.</p>\r\n\r\n<p><em><strong>HOW CAN WE HELP? </strong></em></p>\r\n\r\n<p>Our in-home nurses excel in providing services such as post-surgical care, elder care, chronic care, tracheotomy, urinary catheterization care, wound care, injections, and IV infusion. What&rsquo;s more, they are always supervised by a senior doctor. Get well sooner by getting 12 / 24-hr care from a HAH (Healthcare At Home) in-home nurse.</p>\r\n\r\n<p><strong>Oxygen Administration:</strong></p>\r\n\r\n<p>Oxygen administration is required in both acute and chronic conditions like trauma, hemorrhage, shock, breathlessness, pulmonary disease, and more. Don&rsquo;t panic if you require one. Call a HAH(Healthcare At Home) nurse home and sit back, while she does the needful.&nbsp;</p>\r\n\r\n<p><strong>Post-surgical Care:</strong></p>\r\n\r\n<p>Post-surgical care is critical, and includes everything from pain management &amp; feeding to respiratory management &amp; fluid management. Get well sooner under the care of our nurses, who will help you with all of this in the comfort of your home.</p>\r\n\r\n<p><em><strong>ABOUT NURSING SERVICES FOR VACCINATIONS AT HOME: </strong></em></p>\r\n\r\n<p>Vaccination is crucial to develop immunity against various diseases and to keep hazardous ailments at bay. So, administering and educating the patients with regards to various immunization programs becomes evident. And, professional nurses play a vital role in administering various vaccines to help you stay healthy and disease-free. Professional nurses are trained in delivering various vaccines to you in the right way. Nurses also educate the people about the importance of the vaccines and take utmost care ensuring that the vaccines are delivered to the concerned person properly. Caring and qualified nurses are skilled in delivering vaccinations for various diseases, such as hepatitis, typhoid, H1N1, pneumonia, and many other ailments, appropriately without any concerns. They take care that the concerned person receives the vaccination appropriately without causing any discomfort. Also, caring nurses are expert in delivering the vaccinations to individuals of all age groups, no matter whether it&rsquo;s an infant, kid, an adult, elderly, or bedridden individual who needs vaccination. And, the best part is that, with in-home nursing care services, you can receive any vaccine in comfort of your home without having to visit any clinic or hospital as a qualified nurse would be visiting your home for delivering the necessary vaccine to you properly. Stay safe and away from various infectious diseases by receiving vaccinations in comfort of your home.</p>\r\n\r\n<p><strong>3 NOTEWORTHY BENEFITS OF GETTING VACCINATIONS DONE AT HOME: </strong></p>\r\n\r\n<p><em><strong>1. Get Vaccinated In Comfort Of Your Home:</strong></em></p>\r\n\r\n<p>Choosing in-home nursing care service helps you receive the required vaccine in comfort of your home without having to travel all the way to clinic or hospital. A qualified nurse would visit you at your home and administer the necessary vaccination to you appropriately without causing any discomfort to you. Getting vaccination nursing care at home not only saves your travel expenses, precious energy, and time, but also ensures you receive vaccination in your comfort zone without any concerns.</p>\r\n\r\n<p><em><strong>2. Vaccination For Individuals Of Age Groups: </strong></em></p>\r\n\r\n<p>Trained nurses are skilled in delivering the required vaccine to the individuals of all age groups. Whether it&rsquo;s an infant, kid, grown-up, aged, or a bedridden individual who requires a vaccine, caring nurses can handle an individual of any age group and deliver the vaccine to the concerned individual properly without any concerns. So, any of your family member can receive the necessary vaccine with in-home nursing care service smoothly without any hassles.</p>\r\n\r\n<p><em><strong>3. Best Vaccination Care In Your Absence: </strong></em></p>\r\n\r\n<p>If any of your family member needs to get vaccination done and if you are away from home for some work purpose, you need not worry with in-home nursing care service available for you. Choosing in-home nursing care service will ensure that your dear family member will get the required vaccination done comfortably at your home without any problem. A qualified nurse would visit your home and administer the vaccine to the concerned family member appropriately. So, if any time you need to get any vaccination done in comfort of your home, get in contact with us at HAH(Healthcare At Home) without a second thought and receive the necessary vaccination properly, safely, and without any hassles.</p>\r\n\r\n<p><strong>VACCINATION AT HOME </strong></p>\r\n\r\n<p>So, if any time you need to get any vaccination done in comfort of your home, get in contact with us at HAH(Healthcare At Home) without a second thought and receive the necessary vaccination properly, safely, and without any hassles.</p>\r\n\r\n<p><strong>WHAT IS WOUND? </strong></p>\r\n\r\n<p>A wound is an injury to the skin due to a cut, scrapes and punctures or a heavy blow. Pathologically speaking, a wound is a sharp injury to the dermis layer of the skin. A wound is not only the injury suffered due to accidents inside or outside the home, it is also the surgical incisions and cuts made for catheters to go inside the body as in the case suprapubic catheter.</p>\r\n\r\n<p><strong>Types of Wound</strong></p>\r\n\r\n<p>Wounds are essentially of two kinds &ndash; open wounds and closed wounds. Open wounds and closed wounds can be further classified according to the object that caused the wound.</p>\r\n\r\n<p><strong>Types of open wound:</strong></p>\r\n\r\n<p>&bull; Incision &ndash; a sharp cut made by a sharp object like knife, razor or glass splinters.</p>\r\n\r\n<p>&bull; Lacerations &ndash; a deep cut or tear of the skin or flesh resulting in a jagged and irregular wound.</p>\r\n\r\n<p>&bull; Abrasions &ndash; superficial wound to the epidermis layer, caused by sliding fall.</p>\r\n\r\n<p>&bull; Avulsions &ndash; full or partial amputation of a body part not through surgical procedure, but has been pulled off forcibly, like explosions or violent accidents.</p>\r\n\r\n<p>&bull; Puncture &ndash; when an object punctures the skin like nails or splinters.</p>\r\n\r\n<p>&bull; Penetration &ndash; a wound made by knife or any other object that goes through a body part.</p>\r\n\r\n<p>&bull; Gunshot wounds &ndash; caused by bullets.</p>\r\n\r\n<p><strong>Types of closed wound:</strong></p>\r\n\r\n<p>Closed wounds are as dangerous as open wounds. There are two types of closed wound namely;&nbsp;</p>\r\n\r\n<p><strong>Hematomas</strong> (Blood tumor) &ndash; It is caused by injury to a blood vessel, leading to blood collection under the skin.&nbsp;</p>\r\n\r\n<p><strong>Crush injury</strong> &ndash; It is caused by extreme force applied over a long period of time.</p>\r\n\r\n<p><strong>Wound Treatment: </strong></p>\r\n\r\n<p>Minor open wound treatment doesn&rsquo;t require a doctor&rsquo;s attention and can be treated easily at home like superficial cuts and scrapes. In this type of minor wound treatment, you need to wash and clean the wound and then apply sterile dressing or bandage to help it heal. Very minor kind of wounds won&rsquo;t even require any elaborate wound treatment or even bandaging, just clean the wound and keep it dry to let it heal. However, you need to see a doctor if the wound is deeper than half inch, the bleeding does not stop even after the application of pressure, bleeding is caused by a serious accident. Such type of wound treatment involves various procedures from closing the open wound with skin glue, sutures and stitches to tetanus booster shots and pain medication to name a few.</p>\r\n\r\n<p><strong>Wound Infection Treatment:&nbsp;</strong></p>\r\n\r\n<p>Wound infection is caused due to the infestation of bacteria in the wound. Such infections require immediate medical attention. The wound infection treatment involves the following preventive measures;</p>\r\n\r\n<p>&bull; Preventive antibiotics &ndash; are the first step in wound infection treatment. It helps in killing bacteria cells.</p>\r\n\r\n<p>&bull; Use of slow releasing antiseptics &ndash; it slows down the growth of bacteria.</p>\r\n\r\n<p>&bull; Application of sulphadizaine solution; It is a solution of the metal silver that destroys broad spectrum bacteria.</p>\r\n\r\n<p><strong>What is wound care?</strong></p>\r\n\r\n<p>Wound care, simply put is the treatment of a wound through the application of varied techniques suited to the type of wound. Wound care involves;</p>\r\n\r\n<p>&bull; Giving local care to the skin with debridement and dressing.</p>\r\n\r\n<p>&bull; Application of medicated bandages and compression.</p>\r\n\r\n<p>&bull; Treatment of wound Infection.</p>\r\n\r\n<p>&bull; Treatment of Edema.</p>\r\n\r\n<p>&bull; Maximizing blood flow and oxygen for faster healing</p>\r\n\r\n<p><strong>Types of Wound care: </strong></p>\r\n\r\n<p>There are many types of wounds and so are its causes. While some superficial wounds don&rsquo;t demand much attention and heal on their own, there are several other types of wounds that demand a lot of attention and care to heal properly. Depending upon the type of wound a doctor recommends the wound care types to be employed.</p>\r\n\r\n<p><strong>Advanced wound care dressings </strong>&ndash; Advanced wound care dressings are meant to the bleeding and absorb any secretion to aid healing of the wound. Wound care dressings are of several types, namely;</p>\r\n\r\n<p><strong>1. Hydrocolloid Dressings</strong> &ndash; This type of wound care dressings is mainly applicable for burn injuries, pressure ulcers and venous ulcers.</p>\r\n\r\n<p><strong>2. Hydrogel Dressings &ndash;</strong> Hydrogel dressings are used for the treatment of infected wounds and or wounds with little secretion.</p>\r\n\r\n<p><strong>3. Alginate Dressings&ndash; </strong>Alginate is particularly used to heal wounds with high amounts of wound drainage.</p>\r\n\r\n<p><strong>4. Collagen Dressings &ndash;</strong> Collagen is primarily used to treat large wounds, bed sores and transplant sites.</p>\r\n\r\n<p><strong>Negative Pressure Wound Dressings</strong> &ndash; Negative pressure wound dressings involves the technique of vacuum dressing to drain out excess secretion/fluid from the wound to simulate the flow of blood in the area to heal the wound.</p>\r\n\r\n<p><strong>Debridement &ndash;</strong> Debridement of a wound is the removal of any foreign object lodged in the wound or the removal of dead skin from the wound when the skin is unable to do so naturally.</p>\r\n\r\n<p><strong>Wraps to decrease lower leg swelling</strong> &ndash; In this treatment technique, a bandage is tightly wrapped around the lower leg to reduce the swelling and increase blood circulation.</p>\r\n\r\n<p><strong>ABOUT WOUND CARE NURSING SERVICES AT HOME: </strong></p>\r\n\r\n<p>Every one of us suffers wound some or other time in the life. So, proper wound dressing and right wound care becomes inevitable for quick healing of the wound. In such circumstances, the assistance of caring nurses for wound dressing turns to be a boon for quick relief. You can find expert wound care nursing for wound dressing to take appropriate care of your wound at your doorstep. Depending on the type of wound, its healing process varies. And, our trained and experienced nurses for wound dressing are skilled in taking care of each type of wound. Whether you suffer from pressure sores, injuries, bruises, infected wounds or need wound care at home after surgery, our trained and caring nurses would not only dress your wound properly but also take its good care to promote its quick healing.</p>\r\n\r\n<p>Besides this, with HAH(Healthcare At Home) at your service, our skilled nurses would visit you at your home for wound dressing and wound care without having you travel all the way to clinic or hospital. Our wound care nurses would clean and dress the patient&rsquo;s wounds and take the right care to prevent the risk of any complications, such as infections. Keeping your comfort as priority, we aim to offer you the best wound care nursing services in comfort of your place of abode. So, count on our wound dressing and wound care nursing services for quick healing of your wound.</p>\r\n\r\n<p><strong>3 BENEFITS OF GETTING WOUND CARE NURSING AT HOME:</strong></p>\r\n\r\n<p><strong>1 Educates You &amp; Your Family Members About Wound Care:</strong></p>\r\n\r\n<p>Nurses for wound dressing and wound care not only take care of your wounds but also educate you and your family members how to take the right care of your wounds for its quick healing. Expert and caring nurses provide all necessary care instructions to you and your caring family members for its proper healing. Not only nurses clean and dress your wounds, but also caring nurses teach your dear ones how to clean and dress the wounds, if need be, and what care to exercise to prevent the risk of complications, such as infection.</p>\r\n\r\n<p><strong>2 At-Home Wound Care Promotes Healing:</strong> Whether you suffer from post-surgical wounds, pressure sores, or injuries, at-home wound dressing by caring nurses prevents you from traveling to the hospital or clinic, saves your energy, and saves you from exertion. As you get your wound cleaned and dressed at home in your comfort zone, your wound gets continuous, great relief which promotes its quick healing.</p>\r\n\r\n<p><strong>3 Regular Wound Care At-Home Prevents Complications:</strong> If you have a deep wound that needs a lot of care to prevent it from getting affected with possible complications, you may need regular wound dressing. And, at-home wound care nurse can prove highly beneficial for the right care of your wound and keeping the risk of complications at bay. Wound care nurse would clean your wound properly and dress it appropriately in comfort of your home avoiding the chances of infections.</p>\r\n\r\n<p><strong>WOUND CARE AT HOME&nbsp;</strong></p>\r\n\r\n<p>So, if you happen to suffer from any kind of wound, count on our wound care nurses for wound dressing for its quick healing and preventing the risk of complications.</p>\r\n\r\n<p><strong>NJECTION ADMINISTRATION AT HOME: </strong></p>\r\n\r\n<p>Getting injection is one of the most basic of medical procedures, yet it demands proper attention and a pair of well experienced and trained hands. As simple as it may appear, we still can&rsquo;t administer one our self and yet a lot many of us have difficulty in taking the trip to a doctor due to various reasons like old age, injury, ill health or lack of time. For such people getting the required injections at the comfort of their home is a big advantage, as they not only get saved from the hassles of travelling but are also able to stay up to date with their medical needs. HAH(Healthcare At Home), a leading in &ndash; home healthcare provider offers high-quality nursing facility at your doorstep for a comfortable and hassle &ndash; free injection service at home.<br />\r\n<strong>BENEFITS OF GETTING INJECTION AT HOME:</strong></p>\r\n\r\n<p>Getting injection service at home with the assistance of trained and experienced nurses comes with several benefits. Find below some of the prominent benefits of having injections administered at home.</p>\r\n\r\n<p><strong>1. Saves Your Time &amp; Energy:</strong></p>\r\n\r\n<p>One of the most obvious benefits of getting injection service at home is saved time and energy. Not only does a trip to a doctor or nursing clinic involve some amount of travel but also costs significant time and energy. Moreover in today&rsquo;s time when almost everything is made available at your doorstep, it is but essential for medical services to follow suit. Moving in this regard HAH(Healthcare At Home) offers people the facility to get injection at home.</p>\r\n\r\n<p><strong>2. Makes It A Easy &amp; Hassle-Free Experience:</strong></p>\r\n\r\n<p>Seeking medical care is quite harrowing for the elderly and or the injured and someone suffering from ill health. Even something as simple as getting injections proves to be an uphill task for them and as such these people get highly benefitted by the injection service at home. Injection phobia is another significant factor that prevents people from promptly getting injections and as such for them the option to get injection at home, with their loved one beside them is nothing sort of a boon.</p>\r\n\r\n<p><strong>3. Right Injection Management for Kids: </strong></p>\r\n\r\n<p>After the elderly, if any one requires intermittent injections, then it is the babies and young kids, who need regular vaccine injections to protect them from varied diseases. Administering injection to babies and kids is quite challenging, owing to the phobia and pain attached to it. In such cases getting at home injection nurse service is quite beneficial for both the child and the parent. HAH(Healthcare At Home) &rsquo;s in &ndash; home injection nurse are highly experienced and are skilled in managing kids and administering them the required injection as painlessly as possible.</p>\r\n\r\n<p><strong>4. Economical Medical Assistance: </strong></p>\r\n\r\n<p>Economically too, it is much wiser to get injection at home as compared to getting injections at a hospital or nursing clinic. You not only save money on travelling, but also enjoy home injection nurse service. So, if you need services of a nurse injection for patient contact us at HAH(Healthcare At Home) and let our well trained nurse attend to you at the comfort of your home.</p>\r\n\r\n<p><strong>INJECTION AT HOME</strong></p>\r\n\r\n<p>HAH(Healthcare At Home) is the leading in &ndash; home healthcare provider. So if you need services of a nurse injection for patient then just get in touch with us and our highly experienced nurse will efficiently administer the required injection swiftly and in a painless manner.</p>\r\n\r\n<p><strong>WHAT IS CATHETERIZATION?</strong></p>\r\n\r\n<p>Catheterization is basically the process of inserting a catheter into a body cavity to allow body fluids to pass out of the body. Catheterization procedure is of two types &ndash; cardiac catheterization (where a catheter is inserted into the heart through a vein in the arm to diagnose heart problems) and urinary catheterization (where a catheter is inserted into the bladder through the urethra to drain out urine from the body).</p>\r\n\r\n<p><strong>What is a Urinary Catheter? </strong></p>\r\n\r\n<p>A urinary catheter is a flexible, hollow tube that is inserted into the bladder to help drain out the urine. The various kind of urinary catheters available are; Rubber Catheter, Silicone Catheter and Plastic or PVC catheter.</p>\r\n\r\n<p><strong>Why are urinary catheter used? </strong></p>\r\n\r\n<p>There are many medical reasons behind the use of a urinary catheter. A doctor usually recommends the use of a urinary catheter in the following medical conditions;</p>\r\n\r\n<p>&bull; When a patient is suffering from urinary incontinence</p>\r\n\r\n<p>&bull; A patient has a problem of urine retention</p>\r\n\r\n<p>&bull; Blocked urine flow owing to kidney or bladder stones, blood clots in the urine and severe enlargement of the prostate gland</p>\r\n\r\n<p>&bull; Prostate gland surgery</p>\r\n\r\n<p>&bull; Surgery in the genital area like hysterectomy</p>\r\n\r\n<p>&bull; To drain the bladder during childbirth, if epidural anesthetic is administered<br />\r\n&bull; To drain the bladder prior to any surgery, like &ndash; womb, ovaries or bowels</p>\r\n\r\n<p>&bull; To directly administer medicine into the bladder during chemotherapy for bladder cancer</p>\r\n\r\n<p>&bull; Spinal cord injury</p>\r\n\r\n<p>&bull; Dementia</p>\r\n\r\n<p>&bull; Spina bifida</p>\r\n\r\n<p><strong>Urinary Catheter Types:</strong></p>\r\n\r\n<p>Urinary catheters are of three types &ndash; indwelling catheter, external catheters and intermittent catheters.</p>\r\n\r\n<p><strong>Indwelling Catheters:</strong></p>\r\n\r\n<p>Indwelling catheter also referred to as urethral, foley or suprapubic catheter is the type of catheter which is left inside the bladder for a week, month or as needed and recommended by the doctor. In foley catheterization, a catheter is inserted in the bladder through the urethra, while in suprapubic catheter a tube is inserted in the bladder through an incision made in the belly instead of the urethra. The catheter is made to stay inside the bladder with the help of a tiny inflated balloon. This balloon can be deflated at the time of removal of the catheter.</p>\r\n\r\n<p><strong>Side effects of indwelling catheters:</strong></p>\r\n\r\n<p>Even after taking a lot of precautions and practicing caution in catheter care, there still remains the danger of infections like;</p>\r\n\r\n<p>&bull; Indwelling catheter is prone to several side effects like;</p>\r\n\r\n<p>&bull; Infections,</p>\r\n\r\n<p>&bull; Leakage around the catheter</p>\r\n\r\n<p>&bull; Bladder spasm</p>\r\n\r\n<p>&bull; Pain or burning sensation in urethra, bladder, abdomen or lower back</p>\r\n\r\n<p>&bull; Foul smelling urine</p>\r\n\r\n<p>&bull; Blood, mucus or pus in urine or around catheter</p>\r\n\r\n<p><strong>External Catheters: </strong></p>\r\n\r\n<p>External catheters are convenient and suitable to be used only in men owing to the shape of the catheter. In this type of catheter a condom like device covers the head of the penis and a tube leads from the condom device to a drainage bag. This type of catheter carries a lower risk of infection and can be daily changed.</p>\r\n\r\n<p><strong>Intermittent catheter or short term catheter: </strong></p>\r\n\r\n<p>This type of catheter is used especially during medical procedure for a short time and should be removed after the procedure is completed. External catheters are often referred to as in and out catheter by healthcare professionals. External catheters are relatively safe to use and don&rsquo;t cause any infections or other health problems.</p>\r\n\r\n<p><strong>Female Catheterization: </strong></p>\r\n\r\n<p>Female catheterization is different from male catheterization, since female urethra is shorter in length than male urethra. There are three types of female intermittent catheters, namely;</p>\r\n\r\n<p><strong>Straight catheter &ndash;</strong> Female intermittent straight catheters are uncoated and need to be lubricated before it can be inserted.</p>\r\n\r\n<p><strong>Hydrophilic catheter &ndash;</strong> Hydrophilic catheter are similar to straight catheters, the only difference being it comes with coating that is activated by water making it slippery and ready to use</p>\r\n\r\n<p><strong>Closed system catheter &ndash; </strong>Closed system catheters are pre &ndash; lubricated and contain a self contained collection bag.</p>\r\n\r\n<p><strong>Dialysis Catheter &ndash; </strong>A dialysis catheter is a catheter used to swap blood from a haemodialysis machine to a patient. The dialysis catheter has two openings one red which is for the arterial opening to draw blood out of your body to the haemodialysis machine and a blue opening that returns the cleaned blood to the body. The catheter used in haemodialysis is a tunneled catheter and is placed under the skin. Tunneled catheters are of two types &ndash; cuffed tunneled catheter and non &ndash; cuffed tunneled catheter. Non &ndash; cuffed tunneled catheter is typically used during emergencies and for a shorter duration, while the cuffed tunneled catheter can be used for longer period of time. Dialysis catheter can cause infection and blood clot inside the catheter even after a lot of catheter care. Some of the symptoms of infections due to the catheter are;</p>\r\n\r\n<p>&bull; Fever</p>\r\n\r\n<p>&bull; Chills</p>\r\n\r\n<p>&bull; Drainage from the exit site of the catheter</p>\r\n\r\n<p>&bull; Redness or tenderness around the catheter exit site</p>\r\n\r\n<p>&bull; A general feeling of weakness and illness.</p>\r\n\r\n<p><strong>CATHETERISATION AT HOME</strong></p>\r\n\r\n<p>We at HAH(Healthcare At Home) have a team of trained and caring nurses who are always available at your service to ensure you have smooth catheterisation in comfort of your home. Our skilled nurses take all the necessary care to prevent you from any pressure injuries, tripping, accidents, or any other discomfort due to catheterisation. Nurses also help the patient to drain the urine bag carefully at regular intervals without any concerns. Besides these, experienced nurses are skilled in taking the necessary care after catheter removal. Our nursing service for catheterisation is available for the individuals of all age-groups, no matter whether it&rsquo;s a kid, adult, or an aged individual. With Portea at your service, you need not have to travel to and fro from hospital for urinary catheterisation as we provide your nursing service conveniently at home by keeping your comfort as priority. So, simply call us or get in touch with us to receive the best nursing for catheterisation in your place of abode without any concerns.</p>\r\n\r\n<p><strong>3 BENEFITS OF GETTING NURSING FOR CATHETERISATION AT HOME:</strong></p>\r\n\r\n<p><strong>1 Ensures You Follow Necessary Healthy Diet: </strong></p>\r\n\r\n<p>Nurses visiting you at home for nursing assistance for catheterisation also guide you with healthy diet tips. They ensure you have fiber rich diet to help you keep constipation troubles at bay, as constipation may affect catheter drainage adversely. Nurses recommend you to have healthy diet comprising figs, nuts, dried prunes, and dates and have good intake of fluids so that you stay healthy and constipation-free during catheterisation.</p>\r\n\r\n<p><strong>2 Catheterisation For All Age Groups: </strong></p>\r\n\r\n<p>Caring nurses are skilled in taking the right catheterisation care of individuals of all age groups. Whether it&rsquo;s a child or an elderly individual who needs catheterisation, expert nurses are efficient enough to take care of catheterisation without causing any discomfort to the patient and take into consideration the psychology of the patient. For instance, if a child in your family needs catheterisation and he is scared of it, caring nurses will convince the kid that there is nothing to panic and ensure that the child receives smooth catheterisation.</p>\r\n\r\n<p><strong>3 Educates You With Care After Catheter Removal: </strong></p>\r\n\r\n<p>You need to take a great care during catheterisation as well as after catheter removal. Nurses educate you with the right care that you need to take post catheter removal. They recommend you to wear loose clothes if you suffer rash or irritation due to catheter, drink plenty of healthy liquids, and go for a sitz bath if you face trouble urinating after catheter removal.</p>\r\n\r\n<p>So, if you need nursing for catheterisation, contact us at HAH(Healthcare At Home) and you will receive excellent nursing assistance for the same in comfort of your home.</p>\r\n\r\n<p><strong>CATHETERISATION AT HOME </strong></p>\r\n\r\n<p>So, if you need nursing for catheterisation, contact us at HAH(Healthcare At Home) and you will receive excellent nursing assistance for the same in comfort of your home.</p>', '2y10D7aLZd5cJP2nE165pG8eSppFNqzxyuXCCyeDtQKqcdDkvx6.jpg', '2y10CfJhopaxb1CDXGNaBGj8sO78nTVQt9D47iqpIZnPZ1t2MtJ27ANS.jpg', '2y10buhlbOWfUzG0YOdZmQOb4KhW3TuwOg7EJoynEuSx0tSll9KfS.jpg', 'BOOK NOW', 0, 1, 0, '09:00:00', '23:00:00', 1, '2019-04-22 12:51:25', '2019-05-24 05:23:21'),
(35, 'ELDER CARE', 'elder-care', '<p>Elder care ............</p>', NULL, NULL, NULL, NULL, 11, 1, 0, NULL, NULL, 0, '2019-04-24 14:13:15', '2019-04-24 14:13:15'),
(36, 'ORTHO', 'ortho', '<p>AAAAAAAAAAA</p>', NULL, NULL, NULL, NULL, 11, 1, 0, NULL, NULL, 0, '2019-04-24 14:16:30', '2019-04-24 14:16:30'),
(37, 'ELDERCARE', 'eldercare', '<p>ADDDDDDDDDDDDDDDDDDDD</p>', NULL, NULL, NULL, NULL, 36, 1, 0, NULL, NULL, 0, '2019-04-24 14:51:00', '2019-04-24 14:51:00'),
(38, 'ELDERCARE', 'eldercare', '<p>1111333</p>', NULL, NULL, NULL, NULL, 35, 1, 0, NULL, NULL, 0, '2019-04-24 14:54:50', '2019-04-24 14:54:50'),
(39, 'ELDER-CARE', 'elder-care', '<p>1111333</p>', NULL, NULL, NULL, NULL, 35, 1, 0, NULL, NULL, 0, '2019-04-24 14:55:44', '2019-04-24 14:55:44'),
(40, 'Test', 'test', '<p>dfds</p>', NULL, NULL, NULL, NULL, 39, 1, 0, NULL, NULL, 0, '2019-04-25 11:23:33', '2019-04-25 11:23:33'),
(59, 'Physiotherapy', 'physiotherapy', '<p>Physical therapy (PT), also known as physiotherapy, is one of the allied health professions that, by using mechanical force and movements (bio-mechanics or kinesiology), manual therapy, exercise therapy, and electrotherapy, remediates impairments and promotes mobility and function. Physical therapy is used to improve a patient&#39;s quality of life through examination, diagnosis, prognosis, physical intervention, and patient education. It is performed by physical therapists (known as physiotherapists in many countries). In addition to clinical practice, other activities encompassed in the physical therapy profession include research, education, consultation and administration. Physical therapy services may be provided as primary care treatment or alongside, or in conjunction with, other medical services.</p>', '2y10LdVgCAbf51dggliqaYsRe27Yb6vMhlHNZL5we7Ay2J3vGP1f9fK.jpg', '2y10FZoew0IKrnDEG0IDth8TsYC6Nv542aqOqQvIj1KWqae5LM7GMa.jpg', '2y10mFlhPpe7X85RlpLDBhB3OFe3rwNL71LvLJwhKYTTDTdrfLDVm.jpg', 'BOOK NOW', 0, 1, 0, NULL, NULL, 0, '2019-04-26 18:12:25', '2019-05-01 09:36:38'),
(61, 'Skumar Test', 'skumar-test', '<p>Skumar Test</p>', NULL, NULL, NULL, 'Test', 0, 1, 0, '20:30:00', '23:30:00', 1, '2019-05-01 07:21:31', '2019-07-02 07:06:13'),
(62, 'Skumar Test step 1', 'skumar-test-step-1', '<p>Skumar Test step 1</p>', NULL, NULL, NULL, NULL, 61, 1, 0, NULL, NULL, 0, '2019-05-01 07:23:56', '2019-05-01 09:20:02'),
(63, 'Skumar Test step 2', 'skumar-test-step-2', '<p>Skumar Test step 2</p>', NULL, NULL, NULL, NULL, 61, 0, 0, NULL, NULL, 0, '2019-05-01 07:24:08', '2019-05-01 09:19:45'),
(64, 'Skumat TEst step3', 'skumat-test-step3', '<p>Skumat TEst step3Skumat TEst step3Skumat TEst step3Skumat TEst step3</p>', NULL, NULL, NULL, NULL, 62, 1, 0, NULL, NULL, 0, '2019-05-01 08:48:30', '2019-05-01 08:48:30'),
(65, 'ELDER CARE', 'elder-care', '<p>Test</p>', '2y10qOFabJQPvVjX5Sf49hD1jytQYR76bWVE8vTe7cHMsRj7Pg0q.jpeg', '2y10WJHepbEo4uNzk7c8KAkOCaklRdYQTxRT85kg7NjHZDdYKqKNjYK.jpeg', '2y10iNSF0ue2rDmMHmp2OFYGuWvqmpnax26ny8DQNmdyPUQ45GPHNdO.jpg', 'BOOK NOW', 0, 1, 0, NULL, NULL, 0, '2019-05-20 07:40:21', '2019-06-01 07:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `device_tokens`
--

CREATE TABLE `device_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `ass_user_id` int(11) DEFAULT NULL,
  `user_type` tinyint(4) NOT NULL COMMENT '1=Associate, 2=User',
  `device_token` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `device_tokens`
--

INSERT INTO `device_tokens` (`id`, `ass_user_id`, `user_type`, `device_token`, `created_at`, `updated_at`) VALUES
(3, 29, 1, 'f5P12OZHTss:APA91bGjZL_bkQbCqIWGRQUru7vXuEriMYSoGwzcgcZ1KJ-hn1M9hxgV-MTGZdtNH_Fw1ctWyj9TrKjYTQp_DjhfzeG4BXXEn8MJ9oB6X0sbFfbfe5rpsJcqKmAEf1YQM9cgc5-fJoMS', '2019-06-10 07:00:35', '2019-06-10 07:00:35'),
(5, 1, 2, '54654654', '2019-06-17 05:09:11', '2019-06-17 05:09:11'),
(6, 1, 2, 'd2BXs34fT00:APA91bE5MbFgATpK4m1ivAmkcgFvxAe8BTf1IcDOxDfbe50mGl297YsTfvtXWAF-YkHutrKMxGZlaXLLOdxw1g-3501ig6HwhpPlYkniuBUtX_8co4JU5aSvXpha6mPZ6NARw_iDrdEj', '2019-06-17 05:36:26', '2019-06-17 05:36:26'),
(7, 1, 2, 'd2BXs34fT00:APA91bE5MbFgATpK4m1ivAmkcgFvxAe8BTf1IcDOxDfbe50mGl297YsTfvtXWAF-YkHutrKMxGZlaXLLOdxw1g-3501ig6HwhpPlYkniuBUtX_8co4JU5aSvXpha6mPZ6NARw_iDrdEj', '2019-06-17 05:37:40', '2019-06-17 05:37:40'),
(8, 1, 2, 'd2BXs34fT00:APA91bE5MbFgATpK4m1ivAmkcgFvxAe8BTf1IcDOxDfbe50mGl297YsTfvtXWAF-YkHutrKMxGZlaXLLOdxw1g-3501ig6HwhpPlYkniuBUtX_8co4JU5aSvXpha6mPZ6NARw_iDrdEj', '2019-06-17 05:49:48', '2019-06-17 05:49:48'),
(13, 18, 1, '5454654', '2019-06-17 06:38:05', '2019-06-17 06:38:05'),
(17, 18, 1, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-17 09:51:15', '2019-06-17 09:51:15'),
(18, 18, 1, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-17 09:51:37', '2019-06-17 09:51:37'),
(19, 18, 1, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-17 09:54:01', '2019-06-17 09:54:01'),
(20, 18, 1, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-17 09:58:07', '2019-06-17 09:58:07'),
(21, 18, 1, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-17 09:58:09', '2019-06-17 09:58:09'),
(53, 6, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-19 13:16:41', '2019-06-19 13:16:41'),
(61, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-20 12:54:55', '2019-06-20 12:54:55'),
(62, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 06:00:05', '2019-06-21 06:00:05'),
(63, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 06:44:20', '2019-06-21 06:44:20'),
(64, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 06:49:08', '2019-06-21 06:49:08'),
(65, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 07:06:20', '2019-06-21 07:06:20'),
(66, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 07:08:30', '2019-06-21 07:08:30'),
(67, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 07:09:57', '2019-06-21 07:09:57'),
(68, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 07:32:27', '2019-06-21 07:32:27'),
(69, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 07:34:05', '2019-06-21 07:34:05'),
(70, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 07:36:38', '2019-06-21 07:36:38'),
(71, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 09:40:28', '2019-06-21 09:40:28'),
(72, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 09:42:29', '2019-06-21 09:42:29'),
(73, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:06:42', '2019-06-21 10:06:42'),
(74, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:08:33', '2019-06-21 10:08:33'),
(75, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:10:15', '2019-06-21 10:10:15'),
(76, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:26:03', '2019-06-21 10:26:03'),
(77, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:26:59', '2019-06-21 10:26:59'),
(78, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:31:26', '2019-06-21 10:31:26'),
(79, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:32:21', '2019-06-21 10:32:21'),
(80, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:33:15', '2019-06-21 10:33:15'),
(81, 1, 2, 'eUkcxZsEM4g:APA91bEHPBpLOPo3WZ9LdZduXdIIzgaq6Mm1LWLi8bfjVN5iBm4Z71LIvZ0h0c0_PZZHQV3-rtC0uVjhkIiV1iKPNT33iT350OQVM6QyQ18RvkwVVk0iUBfYJUSLHcTXKdIHOV6rBUom', '2019-06-21 10:34:16', '2019-06-21 10:34:16'),
(82, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:38', '2019-06-24 05:25:38'),
(83, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:38', '2019-06-24 05:25:38'),
(84, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:39', '2019-06-24 05:25:39'),
(85, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:39', '2019-06-24 05:25:39'),
(86, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:39', '2019-06-24 05:25:39'),
(87, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:40', '2019-06-24 05:25:40'),
(88, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:40', '2019-06-24 05:25:40'),
(89, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:41', '2019-06-24 05:25:41'),
(90, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:41', '2019-06-24 05:25:41'),
(91, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:41', '2019-06-24 05:25:41'),
(92, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:42', '2019-06-24 05:25:42'),
(93, 18, 1, 'd_xZbcW4Y8M:APA91bFjP9TbmbhWUFOqaeQkkuO4loppy0RszfWscYeAlFw5A_1e7yp2HwYI_6glnAUGtchVggP64S85aV69f4-4dw6-svAPnpIlacBFKtP0CVGnz9K_5BwG3zlLJTommEgnV17cqgFe', '2019-06-24 05:25:42', '2019-06-24 05:25:42'),
(94, 32, 2, '54654555654', '2019-06-27 10:40:58', '2019-06-27 10:40:58'),
(95, 1, 2, '54654555654', '2019-06-27 10:45:16', '2019-06-27 10:45:16'),
(96, 1, 2, '54654555654', '2019-06-27 12:12:51', '2019-06-27 12:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(11) NOT NULL,
  `happy_patients` varchar(133) NOT NULL,
  `success_mission` varchar(133) NOT NULL,
  `qualified_doctors` varchar(133) NOT NULL,
  `years_of_experience` varchar(133) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `happy_patients`, `success_mission`, `qualified_doctors`, `years_of_experience`, `created_at`, `updated_at`) VALUES
(1, '250', '100', '100', '19', '2019-04-09 05:40:21', '2019-04-09 11:10:21');

-- --------------------------------------------------------

--
-- Table structure for table `health_activities`
--

CREATE TABLE `health_activities` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_activities`
--

INSERT INTO `health_activities` (`id`, `user_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 19, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', '2019-05-30 05:32:27', '2019-05-30 05:32:27'),
(3, 19, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '2019-05-30 05:44:04', '2019-05-30 05:44:04'),
(4, 1, 'HAH (Healthcare@Home) is a new concept of providing personalised healthcare assistant to all. It runs under OM HEALTHCARE ENTERPRISES which is fullfilling patients healthcare needs for the last 19 years.', '2019-06-03 07:29:07', '2019-06-03 07:29:07'),
(5, 1, 'HAH is a new concept of providing personalized healthcare assistant to all.', '2019-06-03 07:29:22', '2019-06-03 07:29:22');

-- --------------------------------------------------------

--
-- Table structure for table `measurements`
--

CREATE TABLE `measurements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `measurements_type_id` int(10) UNSIGNED DEFAULT NULL,
  `measurements_value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurements`
--

INSERT INTO `measurements` (`id`, `user_id`, `measurements_type_id`, `measurements_value`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '90/100', '2019-04-05 17:54:52', '2019-04-05 17:54:52'),
(2, 1, 1, '65', '2019-04-05 17:55:03', '2019-04-05 17:55:03'),
(3, 3, 3, '120', '2019-04-06 15:39:34', '2019-04-06 15:39:34'),
(4, 12, 3, '125/80', '2019-04-09 17:24:45', '2019-04-09 17:24:45'),
(5, 12, 1, '73', '2019-04-09 17:26:12', '2019-04-09 17:26:12'),
(6, 12, 2, '90', '2019-04-09 17:26:28', '2019-04-09 17:26:28'),
(7, 2, 4, '90', '2019-04-09 17:31:00', '2019-04-09 17:31:00'),
(8, 1, 4, '55', '2019-04-09 17:32:37', '2019-04-09 17:32:37'),
(9, 2, 2, '95', '2019-04-09 17:34:50', '2019-04-09 17:34:50'),
(10, 2, 3, '120', '2019-04-09 17:36:08', '2019-04-09 17:36:08'),
(11, 12, 5, 'fine', '2019-04-09 17:38:31', '2019-04-09 17:38:31'),
(12, 13, 5, 'GOOD', '2019-04-12 10:39:09', '2019-04-12 10:39:09'),
(13, 13, 2, '80 PER MINUTE', '2019-04-12 10:39:27', '2019-04-12 10:39:27'),
(14, 13, 4, '91', '2019-04-12 10:39:41', '2019-04-12 10:39:41'),
(15, 13, 3, '122/85', '2019-04-12 10:40:02', '2019-04-12 10:40:02'),
(16, 13, 1, '72 KG', '2019-04-12 10:40:16', '2019-04-12 10:40:16'),
(17, 4, 5, 'VERY GOOD', '2019-04-12 10:41:29', '2019-04-12 10:41:29'),
(18, 4, 4, '95', '2019-04-12 10:41:50', '2019-04-12 10:41:50'),
(19, 4, 3, '117/82', '2019-04-12 10:42:07', '2019-04-12 10:42:07'),
(20, 4, 2, '85', '2019-04-12 10:42:19', '2019-04-12 10:42:19'),
(21, 4, 1, '56 KG', '2019-04-12 10:42:41', '2019-04-12 10:42:41'),
(22, 4, 6, 'MEMBER IN GOOD CONDITION HE FEEL VERY NICE', '2019-04-12 10:47:02', '2019-04-12 10:47:02'),
(23, 4, 6, 'again i can repet the same on same date', '2019-04-12 10:55:28', '2019-04-12 10:55:28'),
(24, 1, 6, 'GOOD FEELING', '2019-04-13 13:18:24', '2019-04-13 13:18:24'),
(25, 1, 5, 'FINE MOMENT TODAY', '2019-04-13 13:18:49', '2019-04-13 13:18:49'),
(26, 1, 4, '91', '2019-04-13 13:19:04', '2019-04-13 13:19:04'),
(27, 1, 3, '12280', '2019-04-13 13:19:22', '2019-04-13 13:19:22'),
(28, 1, 2, '78', '2019-04-13 13:19:41', '2019-04-13 13:19:41'),
(29, 1, 1, '56', '2019-04-13 13:19:53', '2019-04-13 13:19:53'),
(30, 4, 6, 'GOOD FEELS', '2019-04-13 13:23:09', '2019-04-13 13:23:09'),
(31, 4, 5, 'FINE', '2019-04-13 13:23:22', '2019-04-13 13:23:22'),
(32, 4, 4, '81', '2019-04-13 13:23:30', '2019-04-13 13:23:30'),
(33, 4, 3, '122/78', '2019-04-13 13:23:43', '2019-04-13 13:23:43'),
(34, 4, 2, '75', '2019-04-13 13:23:54', '2019-04-13 13:23:54'),
(35, 4, 1, '56', '2019-04-13 13:24:03', '2019-04-13 13:24:03'),
(36, 13, 4, '110', '2019-04-17 16:09:35', '2019-04-17 16:09:35'),
(37, 13, 3, '120/82', '2019-04-17 16:09:58', '2019-04-17 16:09:58'),
(38, 13, 2, '75', '2019-04-17 16:10:09', '2019-04-17 16:10:09'),
(39, 13, 1, '78', '2019-04-17 16:10:22', '2019-04-17 16:10:22'),
(40, 14, 3, '120/82', '2019-04-17 16:43:12', '2019-04-17 16:43:12'),
(41, 14, 4, '100', '2019-04-17 16:43:24', '2019-04-17 16:43:24'),
(42, 14, 2, '76', '2019-04-17 16:43:34', '2019-04-17 16:43:34'),
(43, 14, 1, '61', '2019-04-17 16:43:44', '2019-04-17 16:43:44'),
(44, 4, 5, 'GOOD', '2019-04-18 16:01:34', '2019-04-18 16:01:34'),
(45, 4, 4, '112', '2019-04-18 16:02:37', '2019-04-18 16:02:37'),
(46, 4, 3, '120/85', '2019-04-18 16:03:46', '2019-04-18 16:03:46'),
(47, 4, 4, '102', '2019-04-19 19:13:08', '2019-04-19 19:13:08'),
(48, 4, 3, '123/87', '2019-04-19 19:13:23', '2019-04-19 19:13:23'),
(49, 4, 2, '68', '2019-04-19 19:13:37', '2019-04-19 19:13:37'),
(50, 4, 1, '56.2', '2019-04-19 19:13:53', '2019-04-19 19:13:53'),
(51, 4, 5, '000', '2019-04-22 23:51:39', '2019-04-22 23:51:39'),
(52, 4, 4, '100', '2019-04-22 23:51:48', '2019-04-22 23:51:48'),
(53, 4, 3, '11580', '2019-04-22 23:52:39', '2019-04-22 23:52:39'),
(54, 4, 2, '80', '2019-04-22 23:52:50', '2019-04-22 23:52:50'),
(55, 4, 1, '56', '2019-04-22 23:52:59', '2019-04-22 23:52:59'),
(56, 5, 3, '9461', '2019-04-23 00:04:54', '2019-04-23 00:04:54'),
(57, 5, 2, '81', '2019-04-23 00:05:03', '2019-04-23 00:05:03'),
(58, 5, 1, '60', '2019-04-23 00:05:14', '2019-04-23 00:05:14'),
(59, 15, 3, '9481', '2019-04-23 00:10:42', '2019-04-23 00:10:42'),
(60, 15, 2, '81', '2019-04-23 00:10:49', '2019-04-23 00:10:49'),
(61, 15, 1, '60', '2019-04-23 00:10:56', '2019-04-23 00:10:56'),
(62, 15, 4, '100', '2019-04-23 00:11:03', '2019-04-23 00:11:03'),
(63, 3, 3, '120/80', '2019-04-28 09:38:05', '2019-04-28 09:38:05'),
(64, 7, 4, '120', '2019-04-28 19:09:07', '2019-04-28 19:09:07'),
(65, 7, 5, 'pain in left hand', '2019-04-28 19:09:24', '2019-04-28 19:09:24'),
(66, 7, 3, '138/85', '2019-04-28 19:09:37', '2019-04-28 19:09:37'),
(67, 7, 2, '79', '2019-04-28 19:09:46', '2019-04-28 19:09:46'),
(68, 7, 1, '82', '2019-04-28 19:09:56', '2019-04-28 19:09:56'),
(69, 17, 4, '12', '2019-04-30 06:37:05', '2019-04-30 06:37:05'),
(70, 17, 3, '120/130', '2019-04-30 06:37:18', '2019-04-30 06:37:18'),
(71, 17, 4, '121', '2019-05-01 07:05:04', '2019-05-01 07:05:04');

-- --------------------------------------------------------

--
-- Table structure for table `measurement_types`
--

CREATE TABLE `measurement_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `types` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `measurement_types`
--

INSERT INTO `measurement_types` (`id`, `types`, `type_unit`, `type_slug`, `created_at`, `updated_at`) VALUES
(1, 'Weight', 'KG', 'weight', '2019-04-05 17:50:54', '2019-04-05 17:50:54'),
(2, 'PULSE', 'PULSE PER MINUTE', 'blood-pressure', '2019-04-05 17:51:19', '2019-04-06 14:06:56'),
(3, 'BLOOD PRESURE', 'mm/hg', 'blood-presure', '2019-04-06 15:08:09', '2019-04-06 15:08:09'),
(4, 'RANDOM BLOOD SUGAR (RBS)', 'unit', 'random-blood-sugar-rbs', '2019-04-09 17:30:09', '2019-04-10 14:09:32'),
(5, 'MOBILITY  OF JOINTS', 'ELDER CARE', 'how-was-your-day', '2019-04-09 17:38:04', '2019-04-25 10:31:36'),
(6, 'SUGGESTION', '.', 'suggestion', '2019-04-12 10:44:53', '2019-04-12 10:48:07');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `notice_status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_name`, `link`, `class_name`, `status`, `notice_status`, `created_at`, `updated_at`) VALUES
(1, 'Home', '', 'flaticon-home-1', 1, 0, '2017-06-01 16:14:39', '2017-06-01 16:14:39'),
(5, 'About', '', 'flaticon-businessman-talking-about-data-analysis', 1, 0, '2017-06-01 18:08:52', '2017-06-01 18:08:52'),
(13, 'Blog', '', 'flaticon-digital-marketing', 1, 1, '2018-04-15 23:53:24', '2018-04-15 23:53:24'),
(14, 'CMS', '', 'flaticon-maintenance', 1, 0, '2018-04-16 20:11:00', '2018-04-16 20:11:00'),
(15, 'Category Content', 'cms-page', 'flaticon-category', 1, 0, '2018-04-17 00:08:42', '2018-04-17 00:08:42'),
(16, 'Services', 'services', 'flaticon-customer', 1, 0, '2018-04-20 09:43:29', '2018-04-20 09:43:29'),
(17, 'Associate Registration', 'associate-registration', 'flaticon-partnership', 1, 0, '2018-04-24 11:16:34', '2018-04-24 11:16:34'),
(18, 'Measurement Types', 'measurement-types', 'flaticon-stethoscope', 1, 0, '2018-05-01 08:54:16', '2018-05-01 08:54:16'),
(19, 'Customer Listing', 'customer', 'flaticon-user', 1, 0, '2018-05-08 09:51:25', '2018-05-08 09:51:25'),
(20, 'Bookings', '', 'flaticon-script', 1, 1, '2018-05-24 10:19:45', '2018-05-24 10:19:45'),
(21, 'Manage Prescription', 'prescription/prescription-uploaded', 'flaticon-prescription', 1, 1, '2018-09-18 09:16:09', '2018-09-18 09:16:09'),
(22, 'Transfer', 'transfer', 'flaticon-bank', 1, 1, '2019-04-16 23:37:09', '2019-04-16 23:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permit`
--

CREATE TABLE `menu_permit` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `menu_id` int(11) DEFAULT '0',
  `sub_menu_id` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu_permit`
--

INSERT INTO `menu_permit` (`id`, `user_id`, `menu_id`, `sub_menu_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(2, 1, 5, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(3, 1, 13, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(4, 1, 14, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(5, 1, 15, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(6, 1, 16, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(7, 1, 17, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(8, 1, 18, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(9, 1, 19, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(10, 1, 20, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(11, 1, 21, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(12, 1, 22, 0, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(13, 1, 1, 1, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(14, 1, 1, 2, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(15, 1, 1, 3, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(16, 1, 1, 4, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(17, 1, 5, 5, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(18, 1, 5, 6, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(19, 1, 13, 7, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(20, 1, 13, 8, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(21, 1, 14, 9, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(22, 1, 20, 10, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(23, 1, 20, 11, 1, '2019-05-01 06:42:37', '2019-05-01 06:42:37'),
(24, 27, 1, 0, 1, '2019-05-01 06:44:16', '2019-05-01 06:44:16'),
(25, 27, 19, 0, 1, '2019-05-01 06:44:16', '2019-05-01 06:44:16'),
(26, 27, 1, 1, 1, '2019-05-01 06:44:16', '2019-05-01 06:44:16'),
(37, 23, 16, 0, 1, '2019-05-21 11:23:58', '2019-05-21 11:23:58'),
(38, 25, 19, 0, 1, '2019-05-24 06:07:10', '2019-05-24 06:07:10'),
(39, 25, 20, 0, 1, '2019-05-24 06:07:10', '2019-05-24 06:07:10'),
(40, 25, 20, 10, 1, '2019-05-24 06:07:10', '2019-05-24 06:07:10'),
(41, 25, 20, 11, 1, '2019-05-24 06:07:10', '2019-05-24 06:07:10');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2018_10_24_140711_create_banners_table', 1),
(10, '2018_10_24_180015_create_testimonials_table', 1),
(11, '2018_10_25_100637_create_clients_table', 1),
(12, '2018_12_11_180433_create_user_registrations_table', 2),
(13, '2018_12_18_184310_create_blogs_table', 3),
(14, '2018_12_20_104432_create_blog_comments', 4),
(15, '2018_12_26_143615_create_cms_pages_table', 5),
(16, '2019_01_08_141034_create_our_teams_table', 6),
(17, '2019_01_21_161118_create_associate_documents', 7),
(18, '2019_01_23_104426_create_cms_table', 8),
(19, '2019_01_24_103556_create_services_table', 9),
(20, '2019_01_30_114856_create_book_services_table', 10),
(21, '2019_01_31_160527_create_service_requests_table', 11),
(22, '2019_02_26_114741_create_transaction_history_table', 12),
(23, '2019_02_28_161850_create_prescription_uploads_table', 13),
(24, '2019_03_05_155858_create_zones_table', 14),
(25, '2019_03_28_113459_create_bank_transfers_table', 14),
(26, '2019_04_01_140241_create_measurement_types_table', 15),
(27, '2019_04_01_140722_create_measurements_table', 16),
(28, '2019_05_01_152441_create_rating_reviews_table', 17),
(29, '2019_05_24_121839_create_pills_managements_table', 18),
(30, '2019_05_30_104032_create_health_activities_table', 19),
(31, '2019_06_10_104205_create_device_tokens_table', 20);

-- --------------------------------------------------------

--
-- Table structure for table `our_teams`
--

CREATE TABLE `our_teams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `our_teams`
--

INSERT INTO `our_teams` (`id`, `name`, `designation`, `mobile`, `image`, `created_at`, `updated_at`) VALUES
(11, 'hgjyjuhku', 'tfghtghuy', '7894561236', '2y10Sa51vShk7mVdIk4A8uOfgTKV6jOhY0szwWUiE42gnTMHZpBLYS.jpg', '2019-06-28 10:56:32', '2019-06-28 10:56:32'),
(14, 'rt', 'hdfg', '1234567890', '2y10qZX7HsOWMNuYd44hb9bNdp2thQW0QoCrA8TxQDliIJcnhcdCv8C6.jpg', '2019-06-28 11:09:30', '2019-06-28 11:09:30'),
(15, 'fdgds', 'dfghdsf', '1234567891', '2y105YdPit7akEmmY4YNNcVAXFzilKsJoSaUNhIxargD5BJpjnjXw1.jpg', '2019-06-28 11:11:32', '2019-06-28 11:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('biswaranjan.sahoo@ompharmacy.com', '$2y$10$1OxF59IFpebk/29gM6AZguveGhKLgqICfN0QxKR.IQ2b2OlU7UCRG', '2019-04-28 12:35:26'),
('byaptibirliptajena@gmail.com', '$2y$10$NPLyX/CKbBlfRh09yfBbIeDUvZp0yYs/IqvpCXVvMnnT7BSyypbfK', '2019-06-04 11:21:22'),
('ms@bletindia.com', '$2y$10$0wiZsJCMZW5Q2U3lqfx0Z.agN3HSYaL.Z6VFkq7.4LlmBdewrBvKC', '2019-07-02 08:42:13'),
('suresh@bletindia.com', '$2y$10$mjX7ruEIAsPK3LvkuOTqa.qbTMcgNGbfCE0cuvay34hUuC2SRzcva', '2019-07-02 10:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `pills_managements`
--

CREATE TABLE `pills_managements` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `medicine` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `days` int(11) DEFAULT NULL,
  `alert_type` tinyint(4) DEFAULT NULL COMMENT '1 - SMS, 2 - Call',
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pills_managements`
--

INSERT INTO `pills_managements` (`id`, `user_id`, `medicine`, `start_date`, `time`, `days`, `alert_type`, `status`, `created_at`, `updated_at`) VALUES
(1, 17, 'Glucose', '2019-06-05', '12:59:00', 30, 1, 5, '2019-05-28 05:14:08', '2019-06-05 07:29:07'),
(4, 1, 'Glucose Super power', '2019-06-05', '12:57:00', 30, 1, 5, '2019-05-28 06:28:19', '2019-06-05 07:27:58'),
(5, 11, 'Organic India Sugar Balance 60 Capsules', NULL, '17:40:00', 30, 1, 1, '2019-05-30 12:08:56', '2019-05-30 12:10:52'),
(6, 19, 'Himalaya Diabecon Ds Tablet', NULL, '17:40:00', 30, 1, 1, '2019-05-30 12:10:19', '2019-05-30 12:10:53'),
(8, 19, 'Orlando Rasmussen', '2019-06-05', '10:00:00', 30, 1, 0, '2019-06-05 06:16:20', '2019-06-05 06:16:20'),
(9, 19, 'Sarah Carson', '2019-06-10', '15:00:00', 20, 1, 0, '2019-06-05 06:50:42', '2019-06-05 06:52:20'),
(10, 18, 'Sleeping tablet', '2019-06-06', '15:20:00', 30, 1, 0, '2019-06-06 09:49:17', '2019-06-06 09:49:17'),
(11, 18, 'Durbala Medicine', '2019-06-06', '15:22:00', 30, 1, 0, '2019-06-06 09:49:52', '2019-06-06 09:49:52'),
(12, 1, 'x', '2019-06-19', '15:50:00', 2, 1, 0, '2019-06-17 10:18:46', '2019-06-17 10:18:46');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_uploads`
--

CREATE TABLE `prescription_uploads` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `address` text COLLATE utf8mb4_unicode_ci,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `admin_note` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_uploads`
--

INSERT INTO `prescription_uploads` (`id`, `user_id`, `image`, `note`, `address`, `status`, `admin_note`, `created_at`, `updated_at`) VALUES
(1, 1, 'prescription/pUleffbTJtnn9OQuHMWAitVvAlP68rToGFaeYcne.jpeg', 'Hello, testing.', 'bhubaneswar Odisha,', 1, 'https://yahoo.com\r\nTracking ID : #123566', '2019-04-05 18:34:32', '2019-04-05 18:36:18'),
(2, 2, 'prescription/roSQK9KevBv3hY4jlIfikwkemGs1ZY8Il55zqm6l.jpeg', '1-2 strip\r\n2-1 strip', 'Rasulgarh,BBSR', 1, 'medicine is delivery with in 12 hours', '2019-04-06 12:54:39', '2019-04-06 12:57:24'),
(3, 1, 'prescription/61SaXelj5UzkDfRbnyg2KuUXs5RGi3Yoa4zwTim5.jpeg', 'send the price first', 'acharya vihar', 1, 'price rs 5000', '2019-04-06 17:02:16', '2019-04-06 17:06:45'),
(4, 2, 'prescription/0IIp9L1oacp7E82fGHe4lelmm8sISeEcOmgQkprY.jpeg', '1-5strp\r\n2-2strip\r\n3-2strip', 'samanta vihar,bbsr', 1, 'one process with in 2 hours .', '2019-04-22 13:08:19', '2019-04-22 13:09:52'),
(7, 4, 'prescription/fTixFWAbJ7DmLtaWorkE1r4a5ZdkCIOpC1n1M9t3.jpeg', 'sl no 2-25 tab', 'balianta', 0, NULL, '2019-04-27 16:35:22', '2019-04-27 16:35:22'),
(8, 7, 'prescription/pZhsyfarveUWFh0WCu7vistCvhtfwYHhv1fOYzTZ.png', 'sl 2-50 tab', 'niladrivihar', 1, 'your medicine is ready to deliver.Contact for home delivery- 7381025181', '2019-04-28 19:14:25', '2019-05-16 06:27:01'),
(9, 17, 'prescription/Ky8sxUbMOGVXl83JzcCIzoz3eibWmMZ7icQDY6uV.png', 'Need the medicine No.1 ,2 & 3.', 'Plot No. 1242 P - 8\r\nGovindaprasad,Bomikhal\r\nBhubaneswar - 751010', 1, 'your medicine is ready to deliver.Contact for home delivery- 7381025181', '2019-04-30 06:33:26', '2019-04-30 06:34:25'),
(22, 1, 'prescription/7JwjaMgwTH0ejbxDAxw96mh0yVsXiHpJVBlSPhlv.png', 'This is #####', 'This is $$$$$', 0, NULL, '2019-06-04 10:09:13', '2019-06-04 10:09:13'),
(25, 1, 'prescription/nSvqADhMbUqyQDgijNm1adpLsCXIWA7RfUNvTTeb.jpeg', 'Angga', 'Indonesia', 0, NULL, '2019-06-04 10:50:15', '2019-06-04 10:50:15'),
(27, 1, 'prescription/mFjRiSjd62sKtKZAnZ1fujrnPie8ugxQZNtiyRJm.jpeg', 'Aaaa', 'Indonesia', 0, NULL, '2019-06-06 05:49:14', '2019-06-06 05:49:14'),
(28, 1, 'prescription/MaHHL2H1jVf8EU3F2z757Bc7mnKl24FZU3CvQi0I.jpeg', 'Aaaa', 'Indonesia', 0, NULL, '2019-06-06 05:53:42', '2019-06-06 05:53:42'),
(30, 1, 'prescription/FGpN6gI5MQkgVtJs5NLVfpStg7kYRF5fzZnruhoZ.jpeg', 'Aaaa', 'Indonesia', 0, NULL, '2019-06-06 06:40:39', '2019-06-06 06:40:39'),
(31, 1, 'prescription/pyycMuDJf6dNJEskM8qMJ8og7jn9qEhlZEczGf6p.jpeg', 'Aaaa', 'Indonesia', 0, NULL, '2019-06-06 06:47:14', '2019-06-06 06:47:14'),
(34, 1, 'prescription/KUqf8FFlaGGMGkw0LwG2iva9uDzkMPPMTt4i2cvz.jpeg', 'Abc', 'abcd', 0, NULL, '2019-06-20 10:35:13', '2019-06-20 10:35:13'),
(36, 1, 'prescription/L46WTLebUhkd0BejkJtKPCflrEbozDdiIp6Y99rz.png', 'Note', 'Bhubaneswar, LS,Odisha', 0, NULL, '2019-06-20 10:37:24', '2019-06-20 10:37:24'),
(37, 1, 'prescription/1VCPmdtKBSYPcD3NmxjJvJo7hLWRBjSAnbJOg3kE.jpeg', 'Bday', 'Adrrss blet', 0, NULL, '2019-07-02 13:42:03', '2019-07-02 13:42:03');

-- --------------------------------------------------------

--
-- Table structure for table `rating_reviews`
--

CREATE TABLE `rating_reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `rated_by` int(11) DEFAULT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'AD - Admin, SU - Subadmin, AS - Associate, US - User',
  `rating` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rating_reviews`
--

INSERT INTO `rating_reviews` (`id`, `booking_id`, `rated_by`, `type`, `rating`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 3, 18, 'AS', '4', 'This is testing feedback', '2019-07-03 11:17:52', '2019-07-03 11:17:52'),
(2, 3, 1, 'US', '5', 'Good', '2019-07-03 11:18:11', '2019-07-03 11:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `cms_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shot_description` text COLLATE utf8mb4_unicode_ci,
  `test_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sale_price` decimal(7,2) NOT NULL,
  `hour` int(11) DEFAULT '0',
  `minute` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `cms_id`, `name`, `shot_description`, `test_id`, `sale_price`, `hour`, `minute`, `created_at`, `updated_at`) VALUES
(2, 27, 'ALBUMIN & IGG, CSF INCLUDES CSF IGG/ ALBUMIN RATIO', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown', 'Z088', '2230.00', 2, 0, '2019-01-24 09:01:53', '2019-04-25 10:10:21'),
(3, 34, 'ALBUMIN FLUID', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknownLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown', 'P026', '1.00', 150, 0, '2019-01-29 05:42:30', '2019-07-02 09:35:20'),
(7, 27, 'Test', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown', '8956', '200.00', 2, 30, '2019-02-05 12:50:22', '2019-04-25 10:10:31'),
(8, 27, 'Regular Care', 'This is a test content', '123', '100.00', 1, 0, '2019-02-05 12:57:57', '2019-04-25 10:13:22'),
(9, 27, 'MOTHER & CHILD CARE', 'MOTHER & CHILD CARE', 'MOTHER & CHILD CARE', '999.00', 11, 59, '2019-04-09 16:33:16', '2019-04-25 10:09:48'),
(10, 27, 'VACCINE MANAGEMENT', 'PREVENTION IS BETTER THAN CURE', 'DFGH', '1000.00', 3, 5, '2019-04-09 19:06:45', '2019-04-09 19:06:45'),
(11, 2, 'diabetes package', '..', '654545412', '100.00', 2, 0, '2019-04-11 16:02:59', '2019-04-30 06:52:09'),
(12, 2, 'malaria test', '..', '1234', '321.00', 1, 2, '2019-04-11 16:03:56', '2019-04-11 16:03:56'),
(13, 2, 'thyroid', '4567', '6545454', '654.00', 200, 2, '2019-04-11 16:04:59', '2019-05-24 05:22:42'),
(14, 59, 'Pediatric Physical Therapy', 'Childhood is a time when the body grows very fast, and problems in childhood can have a negative effect on the rest of a person’s life. Pediatric physical therapy is particularly designed to help adolescents, children and babies to make the most of their growth, overcome problems, and build their muscular and skeletal strength, often teaching them movement types and ranges of movement which they may never have experienced before.', '00125', '1.00', 1, 0, '2019-04-27 12:39:44', '2019-04-27 12:39:44'),
(15, 59, 'Geriatric Physical Therapy', 'Getting older can be very tough on the muscles and skeleton. Over our lives, we can get used to using our muscles in ways which are unhealthy or unwise, such as bad posture or damaging gait, which we often don’t recognize because we compensate for them using the rest of our bodies; but as we get older, we may notice more problems, as our muscles stop being strong enough to compensate as they have in the past. Geriatric physical therapy is about taking steps to use the muscles you have in a way which is more efficient and safe, and is less likely to lead to injuries.', '00124', '1.00', 1, 0, '2019-04-27 12:40:37', '2019-04-27 12:40:37'),
(16, 61, 'SKTest1', 'Skumar Test', 'TST1', '2.00', 2, 0, '2019-05-02 06:13:30', '2019-05-23 06:19:47'),
(17, 61, 'SKTest2', 'SKTEest2 SKTEest2', 'TST', '3.00', 1, 30, '2019-05-02 06:14:07', '2019-05-02 06:14:54'),
(18, 27, 'This is test', 'This is test description', '6526', '1.00', 200, 0, '2019-05-16 09:56:15', '2019-05-24 05:20:40'),
(19, 34, 'Test Service', 'Test Service', '245232', '1.00', 0, 0, '2019-05-24 05:28:56', '2019-07-02 11:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `service_requests`
--

CREATE TABLE `service_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `services_id` int(10) UNSIGNED DEFAULT NULL,
  `associate_id` int(10) UNSIGNED DEFAULT NULL,
  `disp_id` tinyint(1) NOT NULL COMMENT '0=Both,1=Admin,2=Associate',
  `booking_date` date DEFAULT NULL,
  `booking_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_menu`
--

CREATE TABLE `sub_menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `link` varchar(191) NOT NULL,
  `status` int(11) NOT NULL,
  `notice_status` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sub_menu`
--

INSERT INTO `sub_menu` (`id`, `menu_id`, `name`, `link`, `status`, `notice_status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Banner Management', 'banners', 1, 0, '2017-06-02 18:03:41', '2017-06-02 18:03:41'),
(2, 1, 'Video Management', 'video', 1, 0, '2017-06-02 18:07:33', '2017-06-02 18:07:33'),
(3, 1, 'Testimonial Management', 'testimonials', 1, 0, '2017-06-02 18:06:59', '2017-06-02 18:06:59'),
(4, 1, 'Featured Management', 'featured', 1, 0, '2017-06-02 18:08:50', '2017-06-02 18:08:50'),
(5, 5, 'Manage About Us Content', 'about-content', 1, 0, '2017-06-02 18:09:28', '2017-06-02 18:09:28'),
(6, 5, 'Manage Our Team', 'our-team', 1, 0, '2017-06-02 18:09:59', '2017-06-02 18:09:59'),
(7, 13, 'Blog Management', 'blogs', 1, 0, '2017-06-02 18:13:18', '2017-06-02 18:13:18'),
(8, 13, 'Blog comments', 'blog-comment', 1, 1, '2017-06-22 15:12:31', '2017-06-22 15:12:31'),
(9, 14, 'CMS Management', 'page-content', 1, 0, '2018-04-16 17:54:18', '2018-04-16 17:54:18'),
(10, 20, 'Associates', 'booking', 1, 1, '2018-04-16 17:55:57', '2018-04-16 17:55:57'),
(11, 20, 'Admin', 'admin-booking', 1, 1, '2018-04-17 14:12:03', '2018-04-17 14:12:03');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'K SRIKRISHNA', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis.', '2y10eDshQdd2BxGgrxHgoqkpPOcXURZCjS3DwiUNCvfKoEafXcdP5FXe.png', '2018-12-11 13:44:15', '2019-04-19 18:59:46'),
(2, 'SOUMYA Smith', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempor, suscipit mauris condimentum..', '2y10V7RCqfIYZsKJPYVzdvy3wOQHNRRmVvt4a8TujrxRhD9kYLp2xsV6.png', '2018-12-11 13:44:41', '2019-01-09 06:24:35'),
(3, 'MALAYA R', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempor, suscipit mauris condimentum, ultrices sem. In vehicula, justo laoreet faucibus aliquam, metus lacus iaculis eros...', '2y10sWBRVaQ8B89ldabn74FIluILKpBzrq1YaR694IfV5EPT8IVSvOOjC.png', '2018-12-11 13:46:19', '2019-01-09 06:24:04'),
(4, 'Trideep', 'This is demo content', '2y10Ueluiwyp60L30EoNaqmwYOqdKBTMzHlNbS0ozv2FQCR3a3kwfFZC.jpg', '2019-01-09 06:16:19', '2019-01-09 06:24:23'),
(5, 'fghf', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies nec sit amet turpis. Pellentesque a nulla tempoLorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut lacus vitae enim ultrices ultricies ne', '2y104FHCUF55sgWt1rLf8AcuumQIYp3MUJZ0O7x9VpHMRvlVoveYCkK.jpeg', '2019-05-01 07:11:31', '2019-05-01 07:13:53'),
(6, 'Test', 'fdhdfgdfgdfg', NULL, '2019-05-01 07:15:37', '2019-05-01 07:15:37');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `booking_id` int(10) UNSIGNED DEFAULT NULL,
  `transfer_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1-Transfer, 2-Cancel',
  `debit_amount` decimal(8,2) DEFAULT NULL,
  `credit_amount` decimal(8,2) DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_history`
--

INSERT INTO `transaction_history` (`id`, `user_id`, `booking_id`, `transfer_status`, `debit_amount`, `credit_amount`, `transaction_id`, `transfer_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 0, NULL, '1000.00', 'TRNS3123213', NULL, '2019-07-02 23:00:00', '2019-07-02 23:00:00'),
(2, 1, NULL, 1, '100.00', NULL, 'TRNSID45646', 1, '2019-07-03 11:01:07', '2019-07-03 11:02:10'),
(3, 1, 1, 0, '100.00', NULL, NULL, NULL, '2019-07-03 11:03:05', '2019-07-03 11:03:05'),
(4, 1, 2, 0, '1.00', NULL, NULL, NULL, '2019-07-03 11:05:57', '2019-07-03 11:05:57'),
(5, 1, 3, 0, '1.00', NULL, NULL, NULL, '2019-07-03 11:09:56', '2019-07-03 11:09:56'),
(6, 1, 2, 2, NULL, '1.00', NULL, NULL, '2019-07-03 11:13:30', '2019-07-03 11:13:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landline` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tollfree_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permanent_address` text COLLATE utf8mb4_unicode_ci,
  `dob` date DEFAULT NULL,
  `skill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `experience` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fathers_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zone` text COLLATE utf8mb4_unicode_ci,
  `gst_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `googleplus_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `associate_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` text COLLATE utf8mb4_unicode_ci COMMENT 'id = 1 (Admin), type = 1 (Subadmin), type = null (Associate)',
  `active` int(11) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_no`, `landline`, `tollfree_no`, `address`, `lat`, `lng`, `permanent_address`, `dob`, `skill`, `experience`, `fathers_name`, `zone`, `gst_no`, `facebook_url`, `twitter_url`, `linkedin_url`, `googleplus_url`, `image`, `associate_id`, `type`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ADMIN(HAH)', 'care@healthcarehome.in', '$2y$10$UMQvCEcyN3a3OXe8XW8vrOm3svyGrk4hye2iPp6vATqFm6m6qogTG', '9861245555', '0674 - 2300467', '1800-120-0431', 'M -38, Samanta Vihar, Kalinga Hospital Square, Chandrasekharpur,  Bhubaneswar - 751017, Odisha', NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, '21AABCO1578M1ZD', 'https://www.facebook.com/Om-Healthcare-Enterprises-Limited-228261374346697/?ref=admin_hovercard', 'https://twitter.com/OmHealthcare', 'https://linkedin.com/in/om-healthcare-enterprises-ltd-385864144/', 'https://plus.google.com/', '0404191554376601.jpg', NULL, '{\"Inquiry\":\"care@healthcarehome.in\",\"Work with us\":\"hrd@omhealthcare.org\"}', 1, 'H3FKuLx3jTszQxGdvhuauRz1YaInD4PQcF3erIhxAITxoSFrQuNuyTlFOhCv', '2018-10-22 00:07:24', '2019-06-05 04:51:40'),
(18, 'Trideep Dakua', 'trideep@bletindia.com', '$2y$10$.1G08yR6DjnVlDPMcFVNb.fmlBJ.Cha7Cz/RUYxNS1l56QzU2jvGe', '7205821247', NULL, NULL, 'Bhubaneswar Odisha', '20.332426201068238', '85.82684306321198', 'Bhubaneswar 1', '1996-05-31', 'Test', '2 Years', 'Kailsh Chandra Dakua', 'Bhubaneswar', NULL, NULL, NULL, NULL, NULL, '2801191548682691.jpg', 'ASS_TRI18', NULL, 1, 'wovYcLqaQC9OURu9EbXeQI9PQhfyHeBknkfo7vICheiBNz6b0wrRWfWHxQ6G', '2019-01-28 09:15:30', '2019-06-20 07:19:06'),
(21, 'Julian Wall', 'gitosi@mailinator.net', '$2y$10$.x/Ked1cgVSPZJeo4l2lM.ihEqC5ghF7/YJSXzZwdxLGUdGaHYqQq', '9898955454', NULL, NULL, 'Odit repellendus Un', '20.39577', '85.82596439999998', 'Quisquam architecto', '1992-04-16', 'At mollit anim nihil', 'Nobis fuga Culpa no', 'Rinah Manning', 'Dolores nostrud elit', NULL, NULL, NULL, NULL, NULL, NULL, 'ASS_JUL21', NULL, 1, NULL, '2019-02-21 06:43:30', '2019-05-02 06:35:42'),
(23, 'Biswaranjan sahoo', 'biswaranjan.sahoo@ompharmacy.com', '$2y$10$zcmOb45j9xExpw9NYsRjAuMDaZIkSecW41M2DWnKv2JXntCMUM9oi', '7381012222', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, NULL, '2019-04-22 23:55:22', '2019-05-20 07:24:06'),
(24, 'NITAI PATRA', 'nitai@ompharmacy.com', '$2y$10$2gS6pjNCrbtGoQiL9NmYGuDl4jo7qmP3hfayiVtf06GQaElws7RXK', '7381018300', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '4dhSidoYzxQY44KwiyVsCqTJ9TubxpcQGQcBtgS0bZq0yKyG01Jk7suBdFwi', '2019-04-23 14:45:24', '2019-04-27 12:33:54'),
(25, 'Manoranjan Swain', 'ms@bletindia.com', '$2y$10$zGjqUgl/yOVtINRD.ChSJebiimwYN3kGsU4WnqjvSqrvbP4Sa1Fle', '9338455675', NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1605191557988713.jpg', NULL, '1', 1, 'SLkR1Fc97SCONOYAE8WVcBKrkq7YdThsjXwCFWkSALgmXV0g5Sz55zkV0mzJ', '2019-04-25 13:08:14', '2019-06-04 11:29:52'),
(27, 'Suresh', 'suresh1@bletindia.com', '$2y$10$tTT0azLQ79gvQaTVMg92zexRYLYxIlfiOgihZZtvH.rbVAURd4G7i', '9861245556', NULL, NULL, NULL, NULL, NULL, NULL, '1970-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0105191556690114.png', NULL, '1', 1, 'Gc3tm5c9yncrzexJ5vwAE0sDIKGFHMT4scBSGJ4rQYydKWYaw6gC4W00dDU4', '2019-05-01 05:52:00', '2019-05-01 05:55:34'),
(29, 'Suresh Kumar', 'suresh@bletindia.com', '$2y$10$GQtFlDAXQQH/JYPpe5eZmuL3g3qS3.yTDAr7Y4.IyTMh0MKjnfLFK', '9861245555', NULL, NULL, 'Bomikhal, Bhubaneswar Odisha', '20.2856928', '85.85798599999998', 'Bhubaneswar Odisha', '1990-01-30', 'Software Engineer', '2 Years', 'Suresh Kumar Khatua', 'Bomikhal', NULL, NULL, NULL, NULL, NULL, NULL, 'ASS_SUR29', NULL, 1, NULL, '2019-05-02 10:19:44', '2019-05-02 10:19:44'),
(30, 'Trideep Dakua', 'trideepdakua@gmail.com', '$2y$10$DsmvhVSzsWFUTuZhmZDutepmRHRbQfrs1sE3YstdQGd4K9KN.Foxe', '9853283229', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, '9LmDZJbwDxcIeBoFo6p3DC4etvGCPsmzs2N2yLsQK934ncD2f7zLywju2tGu', '2019-05-21 13:00:00', '2019-05-21 13:00:00'),
(31, 'jagdish test', 'jagdishpany572@gmail.com', '$2y$10$EPA9yTP9gDwxe/2KYL4FJO3FagfIQSxlGLFHm1vPcQ4eVhu51UpPq', '7381018301', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', 1, 'wL2ZNT2MQOKFTMchFHUeHERX0LtMNqAvnrcGEZ4D7mSvJ9kBqy5oJeJorccr', '2019-05-22 15:24:42', '2019-05-22 15:24:42'),
(32, 'jaga nil', 'jagdishpany1997@gmail.com', '$2y$10$VfhQXZC9BoaINK51DjwcAOyUXQl3vDNjw1fVuu2TV0U88mW61retK', '8917520850', NULL, NULL, 'acharya vihar', NULL, NULL, 'same as present', '1997-12-02', 'dressing', '2years', 'gokul chandra', 'cspur', NULL, NULL, NULL, NULL, NULL, NULL, 'ASS_JAG32', NULL, 1, NULL, '2019-05-22 17:13:00', '2019-05-22 17:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_registrations`
--

CREATE TABLE `user_registrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `pincode` int(11) DEFAULT NULL,
  `profile_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disease_profile` text COLLATE utf8mb4_unicode_ci,
  `consultant_contact_dtls` text COLLATE utf8mb4_unicode_ci,
  `hospital_dtls` text COLLATE utf8mb4_unicode_ci,
  `relative_contact_dtls` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lng` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_registrations`
--

INSERT INTO `user_registrations` (`id`, `first_name`, `last_name`, `phone`, `email`, `address`, `pincode`, `profile_img`, `disease_profile`, `consultant_contact_dtls`, `hospital_dtls`, `relative_contact_dtls`, `password`, `lat`, `lng`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Trideep', 'Dakua', '7205821247', 'trideep@bletindia.com', 'Bhubaneswar, LS,Odisha', 751010, '2y10y0sLrCAATemSSrY805j2I6xuZw6jlrm4Bh76MmUYG2qYwlyUUG.jpg', 'Test', 'Suresh Kumar  9861245555', 'Test', 'Suresh Kumar  9861245555', '$2y$10$pwx2ei4kM2MEfMo3.HkAvujFjIGhmiWDhpD6NgU4vrx.VUXAQ5eEO', '20.2913503', '85.8716515', 1, '2018-12-18 07:21:38', '2019-06-19 11:22:22'),
(2, 'nitai', 'patra', '7381018300', 'nitai@ompharmacy.com', 'Durga Mandap,Bomikhal,Bhubaneswar', 751010, '2y10QpZO9VVrF6P4A2SoClzeshWUNY5dJ6a3p1IHW839FMtauVCpC.jpg', NULL, NULL, NULL, NULL, '$2y$10$fv62qYO1Dfp8JuIYl6gKRe.nxus2jeLupMDxCyOv.HtQRqKGG5kS6', '20.2913503', '85.8716515', 1, '2018-12-17 18:11:06', '2019-04-18 16:55:43'),
(3, 'jagdish', 'pany', '7381018301', 'jagdish.p@ompharmacy.com', 'acharya vihar', 751013, '2y10fSOBdY0giz95caucrBfgfuaUqnTY3LbIPGrVGsdX2jRiyyokvVSKm.jpg', NULL, NULL, NULL, NULL, '$2y$10$IDCtF2s/V8GXW8pW.Wa3vufisj/8yF.EK0SsZxxZXKNKQDAqvRLR2', '20.3081', '85.8255855', 1, '2018-12-17 18:14:58', '2019-04-18 20:41:40'),
(4, 'Biswaranjan', 'Sahoo', '7381012222', 'biswaranjan.sahoo@ompharmacy.com', 'Naharakanta,Near Maharatha Bidyapitha, Cuttack - Bhubaneswar Rd, Haridaspur, Naharkanta, BhubanESWAR', 752101, '2y10PUZ6XNLZgGFOq0vvYoqOYF61P2lNTUsyVCfY7OBEYR8nDNCfSYy.jpg', NULL, NULL, NULL, NULL, '$2y$10$9/aUfhjDRNH0Xr11oKnAV.6X9Unmg8NZim3YqfeSOQMIql2e0VJIa', '20.280963', '85.8799018', 1, '2018-12-17 19:20:04', '2019-04-19 19:11:09'),
(5, 'SUMITA', 'BHAGAT', '9556545182', 'sbiswaranjan.sahoo@gmail.com', 'BDA ,C S PUR', 752017, NULL, NULL, NULL, NULL, NULL, '$2y$10$3o9byCVM420kLwlisLXZ5.n60X2PI.CVvS0NIemw.R5fZYdLam2Rq', '19.9673711', '85.62292959999999', 0, '2019-02-08 10:45:12', '2019-04-23 00:08:05'),
(6, 'Biswajit', 'Sahoo', '7008280309', 'biswajit@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$QW0cBBGKJpM2b7mD3JtRMuaWUI6wetjrb5la0aLBnhKH/lI53SPxS', NULL, NULL, 1, '2019-02-11 10:07:27', '2019-06-19 13:16:31'),
(7, 'Prasant', 'Khandai', '7381013003', 'connectprasant@gmail.com', 'Niladri Vihar,CSPur', 751021, NULL, NULL, NULL, NULL, NULL, '$2y$10$nOQKFiBa1y.xHM62sUjBbuPOszcVPKMhX4DfyWkn.TE6WdSTHU9N6', '20.3221701', '85.7922905', 1, '2019-02-19 14:19:14', '2019-04-28 19:07:33'),
(8, 'SUKANTA', 'KHATUA', '9556319957', 'sukanta.grvc@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$WrU/ahVhWuLA./YoUzhVA.tKQqjjA0ogvuxeJqAqotJobmOFJ8xO6', NULL, NULL, 1, '2019-02-24 13:47:09', '2019-02-24 13:47:09'),
(9, 'Bapi', 'Dakua', '7008152714', 'bapidakua@gmail.com', 'Bhubaneswar Odisha', 751016, '2y10p01lVJBQWLIlsYDTzAbvLe6jhHK8GWylFF8KLeYG1S45up5mb3Su.jpg', NULL, NULL, NULL, NULL, '$2y$10$w2cjb5xXkxXNfOl3GWvH/eVzbwWBIjEGK3l9jWNpERv2B.Vc0Rvr6', '20.3300482', '85.81884', 1, '2019-03-18 06:22:34', '2019-04-01 07:08:58'),
(10, 'Suresh', 'Kumar', '9862245555', 'suresh1@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SLvWOkemYzZ2dDAQuinePuBzfgW1L0tAsOl0GJBYiPn6ZO.N36n/2', NULL, NULL, 1, '2019-04-04 08:41:52', '2019-04-04 08:41:52'),
(11, 'Suren', 'Rana', '7008336586', 'sr@bletindia.com', 'Chakeisihani, Bhubaneswar', 751010, '2y10QiDmTBpK0ELXfakWsPxMsOGvTPgr2wa2ftXcxOjz4pqjVs2gSXWL6.gif', NULL, NULL, NULL, NULL, '$2y$10$UMd/RjUKLjozBm7ysKwoduM0xT1/TmjhNwDvWAcAE5Yng25qKjZxa', '20.2913503', '85.8716515', 1, '2019-04-04 13:27:56', '2019-04-04 13:38:27'),
(12, 'Abinash', 'Baliarsingh', '7008019711', 'itdepartment@ompharmacy.com', 'M-54,Samantavihar', 751017, NULL, NULL, NULL, NULL, NULL, '$2y$10$ysKd0jOFuf/47tNKv2qsFuSi9kOu16izku4f55CNRifmZZQmnMtlG', '20.3350392', '85.833266', 1, '2019-04-09 17:11:49', '2019-04-09 17:16:19'),
(13, 'Tusharranjan', 'Mallick', '9776641453', 'tushar.alembic@yahoo.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$FfvE.m2LIPkI0wdKWcd9eu6W7Addrc3ROWbm28GRgdeYdsZ7Cz27a', NULL, NULL, 1, '2019-04-10 12:52:35', '2019-04-10 12:52:35'),
(14, 'ADITYA', 'BASUDEV', '9776082457', 'aditya.b@omhealthcare.org', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$lk97fFm3gDac8K9PooCj0OwK1MGATsph5nnz4jOkp/6bduUHY6NFi', NULL, NULL, 1, '2019-04-17 16:40:44', '2019-04-17 16:40:44'),
(15, 'SUMITA', 'BHAGAT', '9437267889', 'sumita11@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$bTsFrzuoNHxod1IlzgWa/uWKCulzzWZU3JepTUAuYcQvCZcy5C58W', NULL, NULL, 1, '2019-04-23 00:01:44', '2019-04-23 00:08:26'),
(16, 'Abinas', 'Sahoo', '9853130405', 'abinash@ompharmacy.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$y7LmGLyJcmIxIaXFcobzS.y2aObs7MEWAWUYbdu6ZJ0EPch6XR8Nu', NULL, NULL, 1, '2019-04-27 12:44:50', '2019-04-27 12:44:50'),
(17, 'Suresh', 'Kumar', '9861245555', 'suresh@bletindia.com', 'Plot No - 1242 P - 8\r\nBomikhal, Bhubaneswar.', 751007, '2y10woj14crwXTPCDEcigRowtOeVnMtuC2LdqEsWklJCjWYdOolWzla.png', NULL, NULL, NULL, NULL, '$2y$10$E0btHcjUSpDM3zXhI58.N.IkKGaE9RiYs8fqGOAWtUUQUg57X8U.a', '20.3117397', '85.8537418', 1, '2019-04-29 07:19:43', '2019-05-02 12:17:01'),
(18, 'Subrat', 'Prusty', '9853283229', 'subrat@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/phkuKnzgXB2ytrlY.bt9OXbQppJ7ID9rWvE137gGt6cB36JdZVt.', NULL, NULL, 1, '2019-05-17 06:34:13', '2019-05-17 06:34:13'),
(19, 'Saurajit', 'Patnayak', '7008873948', 'saurajit@bletindia.com', 'Bhubaneswar Odisha', 751010, '2y10Tg3LyonUbGbPl2npN8GiduqxSbOJQuh2ZoeJ1JFKVoaD8oAqtyOBW.gif', NULL, NULL, NULL, NULL, '$2y$10$LGIGzyak89ZzwQmYkQrVJORd.SpW/giWDo6UsrrPG2RugvSRWG0Ba', '20.2913503', '85.8716515', 1, '2019-05-22 06:40:35', '2019-05-22 06:42:37'),
(20, 'Trideep', 'Dakua', '7205821249', 'trideep2@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2FmVP4seLHqt5mTOjGaqFextoxVfOLV0.s/rAok4N.m.zrgXVDkhC', NULL, NULL, 1, '2019-06-03 07:04:46', '2019-06-03 07:04:46'),
(21, 'Trideep', 'Dakua', '7205821250', 'trideep3@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$SJaxClSmfq1j9lStBIZug.E8sNX7Et4x/ih4BWj55S.XeQOLR1i6m', NULL, NULL, 1, '2019-06-03 07:05:02', '2019-06-03 07:05:02'),
(25, 'Trideep', 'Dakua', '7205821241', 'trideep33@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$G7jiAL0P4MQKIs/UTwRQ8OF5g61q.O09ZYHvOHStHLWZI/GY1dZ36', NULL, NULL, 1, '2019-06-03 07:07:15', '2019-06-03 07:07:15'),
(27, 'Rahul', 'Kumar', '1234567890', 'ab@g.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$NVqWiM2iwnNltOUk5/cNFuhM3o4mhPJV2aCGxc7cSizQH9.VvJlKO', NULL, NULL, 1, '2019-06-03 07:27:14', '2019-06-03 07:27:14'),
(28, 'Rahul', 'Kumar', '9853112233', 'abc@xyz.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$b/hZpiYyBbZxi6fWqfJsX.dlxszB5TsPiji4rW0kDcmBZ/GU.VHV2', NULL, NULL, 1, '2019-06-04 09:46:52', '2019-06-04 09:46:52'),
(29, 'Pritish', 'Sahoo', '7008435171', 'pritish@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Qx/ItrTgNR.8WZfayJxlMuzcxR3iBJCqZrnAs/jEnO.xm4q9UgLci', NULL, NULL, 1, '2019-06-08 10:27:21', '2019-06-08 10:27:21'),
(31, 'Trideep', 'Dakua', '7205821292', 'trideep991@bletindia.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$MZUN4DvxWaIICyD9CDJAuOcJpnMyYGQXbID90gZajmTa1LTSV/6zm', NULL, NULL, 1, '2019-06-20 06:26:15', '2019-06-20 06:26:15'),
(32, 'Test', 'User', '9439874759', 'test@test.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$61IA3K/kpkA4AmJHLvpO8upasv7lb12EoLwO.sxmsHi6Rs85zbESO', NULL, NULL, 1, '2019-06-27 10:35:32', '2019-06-27 10:35:32');

-- --------------------------------------------------------

--
-- Table structure for table `video_management`
--

CREATE TABLE `video_management` (
  `id` int(11) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_management`
--

INSERT INTO `video_management` (`id`, `video`, `created_at`, `updated_at`) VALUES
(6, '2y10rbfGs7Fvh6g6Pc0KqfEHfuSgUyIXSmQedbUXAuhhWPNAglMQlEQoa.mp4', '2019-03-12 11:14:58', '2019-03-12 11:14:58'),
(7, '2y10RKjbmwrfBIbTq9RsgGQ7GVRu32elIncdLRQPCUqWraprmTqxpRdW.mp4', '2019-05-01 06:56:04', '2019-05-01 06:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `zones`
--

CREATE TABLE `zones` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `associate_documents`
--
ALTER TABLE `associate_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `associate_documents_associate_id_foreign` (`user_id`);

--
-- Indexes for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_comments_blog_id_foreign` (`blog_id`),
  ADD KEY `email` (`email`) USING BTREE,
  ADD KEY `blog_comments_email` (`email`) USING BTREE;

--
-- Indexes for table `book_services`
--
ALTER TABLE `book_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_services_user_id_foreign` (`user_id`),
  ADD KEY `book_services_services_id_foreign` (`services_id`),
  ADD KEY `book_services_req_acpt_id_foreign` (`req_acpt_id`),
  ADD KEY `book_services_req_assign_by_foreign` (`req_assign_by`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_pages`
--
ALTER TABLE `cms_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_tokens`
--
ALTER TABLE `device_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_activities`
--
ALTER TABLE `health_activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `health_activities_user_id_foreign` (`user_id`);

--
-- Indexes for table `measurements`
--
ALTER TABLE `measurements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `measurements_user_id_foreign` (`user_id`),
  ADD KEY `measurements_measurements_type_id_foreign` (`measurements_type_id`);

--
-- Indexes for table `measurement_types`
--
ALTER TABLE `measurement_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `menu_permit`
--
ALTER TABLE `menu_permit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `our_teams`
--
ALTER TABLE `our_teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `our_teams_mobile_unique` (`mobile`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pills_managements`
--
ALTER TABLE `pills_managements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pills_managements_user_id_foreign` (`user_id`);

--
-- Indexes for table `prescription_uploads`
--
ALTER TABLE `prescription_uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescription_uploads_user_id_foreign` (`user_id`);

--
-- Indexes for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rating_reviews_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_cms_id_foreign` (`cms_id`);

--
-- Indexes for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_requests_user_id_foreign` (`user_id`),
  ADD KEY `service_requests_services_id_foreign` (`services_id`),
  ADD KEY `service_requests_associate_id_foreign` (`associate_id`);

--
-- Indexes for table `sub_menu`
--
ALTER TABLE `sub_menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_history_user_id_foreign` (`user_id`),
  ADD KEY `transaction_history_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_registrations`
--
ALTER TABLE `user_registrations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_registrations_phone_unique` (`phone`),
  ADD UNIQUE KEY `user_registrations_email_unique` (`email`);

--
-- Indexes for table `video_management`
--
ALTER TABLE `video_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zones`
--
ALTER TABLE `zones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `associate_documents`
--
ALTER TABLE `associate_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `book_services`
--
ALTER TABLE `book_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cms_pages`
--
ALTER TABLE `cms_pages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `device_tokens`
--
ALTER TABLE `device_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health_activities`
--
ALTER TABLE `health_activities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `measurements`
--
ALTER TABLE `measurements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `measurement_types`
--
ALTER TABLE `measurement_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `menu_permit`
--
ALTER TABLE `menu_permit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `our_teams`
--
ALTER TABLE `our_teams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pills_managements`
--
ALTER TABLE `pills_managements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prescription_uploads`
--
ALTER TABLE `prescription_uploads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `service_requests`
--
ALTER TABLE `service_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_menu`
--
ALTER TABLE `sub_menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user_registrations`
--
ALTER TABLE `user_registrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `video_management`
--
ALTER TABLE `video_management`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `zones`
--
ALTER TABLE `zones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `associate_documents`
--
ALTER TABLE `associate_documents`
  ADD CONSTRAINT `associate_documents_associate_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `blog_comments_blog_id_foreign` FOREIGN KEY (`blog_id`) REFERENCES `blogs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `book_services`
--
ALTER TABLE `book_services`
  ADD CONSTRAINT `book_services_req_acpt_id_foreign` FOREIGN KEY (`req_acpt_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_services_req_assign_by_foreign` FOREIGN KEY (`req_assign_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `book_services_services_id_foreign` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `book_services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_registrations` (`id`);

--
-- Constraints for table `health_activities`
--
ALTER TABLE `health_activities`
  ADD CONSTRAINT `health_activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_registrations` (`id`);

--
-- Constraints for table `measurements`
--
ALTER TABLE `measurements`
  ADD CONSTRAINT `measurements_measurements_type_id_foreign` FOREIGN KEY (`measurements_type_id`) REFERENCES `measurement_types` (`id`),
  ADD CONSTRAINT `measurements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_registrations` (`id`);

--
-- Constraints for table `pills_managements`
--
ALTER TABLE `pills_managements`
  ADD CONSTRAINT `pills_managements_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_registrations` (`id`);

--
-- Constraints for table `prescription_uploads`
--
ALTER TABLE `prescription_uploads`
  ADD CONSTRAINT `prescription_uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_registrations` (`id`);

--
-- Constraints for table `rating_reviews`
--
ALTER TABLE `rating_reviews`
  ADD CONSTRAINT `rating_reviews_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `book_services` (`id`);

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_cms_id_foreign` FOREIGN KEY (`cms_id`) REFERENCES `cms_pages` (`id`);

--
-- Constraints for table `service_requests`
--
ALTER TABLE `service_requests`
  ADD CONSTRAINT `service_requests_associate_id_foreign` FOREIGN KEY (`associate_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `service_requests_services_id_foreign` FOREIGN KEY (`services_id`) REFERENCES `services` (`id`),
  ADD CONSTRAINT `service_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_registrations` (`id`);

--
-- Constraints for table `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `transaction_history_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `book_services` (`id`),
  ADD CONSTRAINT `transaction_history_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_registrations` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
