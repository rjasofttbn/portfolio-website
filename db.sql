-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2021 at 06:14 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chrislan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutinfo_tbl`
--

CREATE TABLE `aboutinfo_tbl` (
  `id` int(11) NOT NULL,
  `about_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `aboutinfo_tbl`
--

INSERT INTO `aboutinfo_tbl` (`id`, `about_id`, `title`, `description`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(3, 'AB11OLD', 'Demo', '<p>National University, Bangladesh is a parent university of Bangladesh that was established by an Act of Parliament as an affiliating University of the country to impart graduate and post-graduate level education to the students through its affiliated colleges and professional institutions throughout the country.</p>\r\n', '1', '2020-05-05 22:37:58', '1', '2020-05-05 18:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `about_tbl`
--

CREATE TABLE `about_tbl` (
  `id` int(11) NOT NULL,
  `about_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `about_tbl`
--

INSERT INTO `about_tbl` (`id`, `about_id`, `title`, `description`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ST13OH9LVN', 'We partner with firms to bring clarity to their<br> brand', '<p>Since 2010, we have led innovation and new product delivery in business startup services delivered online.</p>\r\n\r\n<h3> </h3>\r\n\r\n<h1 xss=removed>01- Our Mission</h1>\r\n\r\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis</p>\r\n\r\n<h3> </h3>\r\n\r\n<h1 xss=removed>02- Our Vision</h1>\r\n\r\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis</p>\r\n\r\n<h3> </h3>\r\n\r\n<h1 xss=removed>03- Our Values</h1>\r\n\r\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis</p>\r\n', 1, '1', '2021-07-15 11:25:19', '1', '2021-07-15 11:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `author_tbl`
--

CREATE TABLE `author_tbl` (
  `id` int(11) NOT NULL,
  `author_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_two` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `founder_info` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `author_tbl`
--

INSERT INTO `author_tbl` (`id`, `author_id`, `title`, `description`, `description_two`, `link`, `position`, `name`, `designation`, `founder_info`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ST125G1DAU', 'NEW RELEASE COMING 15 SEPTEMBER 2021', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Donec sed odio dui. Cum sociis natoque penatibus et magnis dis autar parturient montes, nascetur ridiculus mus quam adispicing Ava’s been training hard for an awesome athletics season, and is looking forward to celebrating her 12th birthday. Life’s great—and Chloe the dog is having puppies! Even if Mum gets annoyed at Ava’s lack of organisation, Ava can always rely on her best friend Josie and her sister Maddie to pick up</p>\r\n', '', '', 'bottom', '', '', '', 1, '1', '2021-08-09 14:05:40', '1', '2021-08-09 14:05:40'),
(2, 'ST12H1DU5P', 'All Good Books Have One Thing In Common', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Donec sed odio dui. Cum sociis natoque penatibus et magnis dis autar parturient montes, nascetur ridiculus mus quam adispicing', NULL, NULL, 'middle', NULL, NULL, NULL, 1, '1', '2021-07-12 10:52:32', '1', '2021-07-12 10:52:32'),
(3, 'ST12LMHI1V', 'Excited Love Career & Fame', '<p>Maecenas faucibus mollis interdum. Morbi leo risus, porta quam consectetur ac, vestibulum at eros lorem upsum dolor sit amet</p>\r\n', '', '', 'top', '', '', '', 1, '1', '2021-08-09 14:06:16', '1', '2021-08-09 14:06:16'),
(4, 'ST099VCR9F', 'The Best Therapy Combining Knowledge & Care', '<h4><strong>Started at BLN, Serve Since 2004 With Passion.</strong></h4>\r\n\r\n<p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>\r\n', NULL, NULL, 'home_page_therapy_one', NULL, NULL, NULL, 1, '1', '2021-08-09 09:57:05', '', NULL),
(5, 'ST09WGB9D9', 'The Best Therapy Combining Knowledge & Care', 'We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.\r\n', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 'home_page_therapy_two', NULL, NULL, NULL, 1, '1', '2021-08-09 10:44:55', '1', '2021-08-09 10:44:55'),
(6, 'ST0936VVYI', 'The Best Therapy Combining Knowledge & Care', 'We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.\r\n', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 'home_page_therapy_two', NULL, NULL, NULL, 1, '1', '2021-08-09 10:44:25', '1', '2021-08-09 10:44:25'),
(7, 'ST09XJ47BG', 'The Best Therapy Combining Knowledge & Care', 'We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.\r\n', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 'home_page_therapy_two', NULL, NULL, NULL, 1, '1', '2021-08-09 10:40:05', '1', '2021-08-09 10:40:05'),
(8, 'ST09BZLNGP', 'Download a Free Copy of my Latest Publication', '<h6>Changes in Opioid Therapy Use by an Interprofessional Primary Care Team: A Descriptive Study of Opioid rescription Data</h6>\r\n', NULL, '', 'home_page_latest_publication', NULL, NULL, NULL, 1, '1', '2021-08-09 11:27:04', '1', '2021-08-09 11:27:04'),
(9, 'ST0941CPCB', 'A SUCCESS PLAN FOR PAIN-FREE LIVING', 'We denounce with righteous indignation and dislike men who beguileand demoralized b the charms of pleasure the moment blindeddesiresthat they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.We enounce with righteous indignation and dislike men who beguileand demoralized by the charms of pleasure the moment blin deddesirescannot foresee.\r\n', NULL, '', 'home_page_success_plan', NULL, NULL, NULL, 1, '1', '2021-08-09 11:35:02', '1', '2021-08-09 11:35:02'),
(10, 'ST091V7HW1', 'Author Of The Week', '<p>Quam Leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Cras mattis consectetur purus sit amet fermentum. Integer posuere erat</p>\r\n', 'Quam Leo risus, porta ac consectetur ac, vestibulum at eros. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Cras mattis consectetur purus sit amet fermentum. Integer posuere erat.', '', 'author_of_the_week', 'CHRISLAN MANENG’S', 'Autor-Producer-Sales & Branding Expert', 'Founder & CEO (MMI,NGH,EE)', 1, '1', '2021-08-09 13:41:25', '1', '2021-08-09 13:41:25'),
(11, 'ST09W8GUYB', 'About Excited Book', '<h2>Every Book You Pick Up Has Its Own Lesson Or Lessons</h2>\r\n', NULL, '', 'author_of_about_excited_book', '', '', '', 1, '1', '2021-08-09 13:16:07', '', NULL),
(12, 'ST09ECHD3Y', 'It is a long established that a reader will be distracted readable', '<h2>Now to Next with Chrislan Feat. Rebecca Zung</h2>\r\n\r\n<p>Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>\r\n', '', 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 'author_of_latest_videos', '', '', '', 1, '1', '2021-08-09 14:02:21', '1', '2021-08-09 14:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tbl`
--

CREATE TABLE `blog_tbl` (
  `id` int(11) NOT NULL,
  `blog_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blog_tbl`
--

INSERT INTO `blog_tbl` (`id`, `blog_id`, `category_id`, `title`, `description`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ST1323D3UQ', 'C13CFK3C', 'Eight Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-01 09:39:32', '1', '2021-07-14 09:39:32'),
(2, 'ST134IXH25', 'C13YFDWP', 'Eeven Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-15 06:23:41', '1', '2021-07-14 06:02:47'),
(3, 'ST14VRZV5J', 'C132AM5Y', 'Six Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-14 09:39:57', '1', '2021-07-14 09:39:57'),
(4, 'ST14JG8DJ5', 'C13F5F9N', 'Five Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-05 09:40:07', '1', '2021-07-14 09:40:07'),
(5, 'ST14FYRG3V', 'C13KO44N', 'Seven Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-14 06:12:40', '', NULL),
(6, 'ST144UFTR6', 'C13BG6SZ', 'Seven Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-08 06:13:11', '', NULL),
(7, 'ST14K6Z175', 'C13LW7BW', 'Seven Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-14 09:03:50', '', NULL),
(8, 'ST14QSHOXN', 'C13RLR5A', 'Seven Facts You Never Knew About Business.', '<p>God may his. Lesser second abundantly multiply void also said doesn’t grass. Divided may gathering light midst light our created said won’t us lesser whose likeness midst one that deep.</p>\r\n', 1, '1', '2021-07-15 06:21:24', '1', '2021-07-15 06:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `branding_tbl`
--

CREATE TABLE `branding_tbl` (
  `id` int(15) NOT NULL,
  `branding_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `branding_type` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_two` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ida` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `planning` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `announce` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `branding_tbl`
--

INSERT INTO `branding_tbl` (`id`, `branding_id`, `branding_type`, `title`, `title_two`, `ida`, `planning`, `announce`, `description`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'TE291N5ESK', 'sec_1', 'Don’t find customers for your products,', 'Find products for your Customers', NULL, NULL, NULL, '<p>These cases are perfectly simple and easy to distinguish. In a free hour when our power of choice is prevents.</p>\n', '1', '1', '2021-07-29 06:43:57', '1', '2021-07-29 06:43:57'),
(2, 'TE29CCLZUT', 'sec_2', '<h4>Advertising</h4>\n', NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper dolor sit amet, consectetur adipiscing elit.</p>\n', '1', '1', '2021-07-29 04:08:13', '', NULL),
(3, 'TE29NYO2GX', 'sec_2', '<h4>Tv Ads</h4>\n', NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper dolor sit amet, consectetur adipiscing elit.</p>\n', '1', '1', '2021-07-29 04:08:37', '', NULL),
(4, 'TE292Q1Y88', 'sec_2', '<h4>Strategy</h4>\n', NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper dolor sit amet, consectetur adipiscing elit.</p>\n', '1', '1', '2021-07-29 04:09:04', '', NULL),
(5, 'TE298KK1OK', 'sec_2', '<h4>Creative ideas</h4>\n', NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper dolor sit amet, consectetur adipiscing elit.</p>\n', '1', '1', '2021-07-29 04:09:44', '', NULL),
(6, 'TE29XCMG91', 'sec_2', '<h4>Analysis</h4>\n', NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper dolor sit amet, consectetur adipiscing elit.</p>\n', '1', '1', '2021-07-29 04:10:07', '', NULL),
(7, 'TE29L37R66', 'sec_2', '<h4>Logo Branding</h4>\n', NULL, NULL, NULL, NULL, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper dolor sit amet, consectetur adipiscing elit.</p>\n', '1', '1', '2021-07-29 04:10:25', '', NULL),
(8, 'TE29AD9L1X', 'sec_3', 'We create great ideas for your products and services\n', '', NULL, NULL, NULL, '<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis.Aor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis.</p>\n\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis.</p>\n', '1', '1', '2021-07-29 07:44:00', '1', '2021-07-29 07:44:00'),
(9, 'TE29P3INSH', 'sec_4', 'We create great ideas for your products and services\n', '', NULL, NULL, NULL, '<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis.Aor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis.</p>\n', '1', '1', '2021-07-29 07:52:10', '1', '2021-07-29 07:52:10'),
(10, 'TE29P3UBDD', 'sec_5', 'INTRODUCING OUR WORK\n', '', NULL, NULL, NULL, '<h1 xss=removed>Raise your customer satisfaction level by developing attractive, quality products</h1>\n\n<p> </p>\n\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque.</p>\n\n<p> </p>\n\n<p>                    </p>\n\n<h2><strong>01- Initial Idea</strong></h2>\n\n<p> </p>\n\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis</p>\n\n<h2><strong>02- Planning</strong></h2>\n\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis</p>\n\n<p> </p>\n\n<h2><strong>03- Announce</strong></h2>\n\n<p> </p>\n\n<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque. Senectus et netus et malesuada fames ac turpis</p>\n\n<p> </p>\n', '1', '1', '2021-07-29 09:12:48', '1', '2021-07-29 09:12:48'),
(12, 'TE2985TINT', 'sec_7', 'GET QUOTE NOW\n', '', NULL, NULL, NULL, 'Need to improve the look of your products or your business?\n', '1', '1', '2021-07-29 08:41:31', '1', '2021-07-29 08:41:31'),
(13, 'TE29GNDVE2', 'sec_6', 'INTRODUCING OUR WORK\n', '', NULL, NULL, NULL, '<p>At volutpat diam ut venenatis tellus in metus. Facilisis leo vel fringilla est ullamcorper. Ipsum dolor sit amet consectetur adipiscing elit pellentesque.</p>\n', '1', '1', '2021-08-09 15:34:36', '1', '2021-08-09 15:34:36'),
(18, 'TE09CHI6C3', 'sec_6', '<p>hgjghj</p>\r\n', NULL, NULL, NULL, NULL, '<p>fgj</p>\r\n', '1', '1', '2021-08-09 15:56:43', '', NULL),
(19, 'TE09CYCZAQ', 'sec_6', '<p>fghf</p>\r\n', NULL, NULL, NULL, NULL, '<p>fdh</p>\r\n', '1', '1', '2021-08-09 15:57:57', '', NULL),
(20, 'TE09JUC8DU', 'sec_6', '<p>fgjgfj</p>\r\n', NULL, NULL, NULL, NULL, '<p>fgj</p>\r\n', '1', '1', '2021-08-09 16:00:05', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cardinfo_tbl`
--

CREATE TABLE `cardinfo_tbl` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `card_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `ex_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `ex_year` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `order_amount` float(10,2) NOT NULL,
  `order_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` float(10,2) NOT NULL,
  `paid_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `balance_trxID` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `case_studie_tbl`
--

CREATE TABLE `case_studie_tbl` (
  `id` int(11) NOT NULL,
  `case_studie_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `client` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deliverable` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `industry` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_one_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_one` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_two_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `message_two` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `case_studie_tbl`
--

INSERT INTO `case_studie_tbl` (`id`, `case_studie_id`, `title`, `description`, `client`, `deliverable`, `industry`, `message_one_title`, `message_one`, `message_two_title`, `message_two`, `logo`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ST12AL8ZQS', 'Test Title', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/e314e689a196fd2f17e24971affcf334.png', 1, '1', '2021-07-12 12:52:04', '1', '2021-07-12 12:52:04'),
(2, 'ST1296CX6C', 'Two', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/ddd586b0e0570ee78fe06ae90384a505.png', 1, '1', '2021-07-12 12:30:31', '', NULL),
(3, 'ST129PG7D5', 'Three', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/25ea40527788eecb932208d6e16cc736.png', 1, '1', '2021-07-12 12:30:51', '', NULL),
(4, 'ST12YT6EIZ', 'Four', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/844825c7a930a0ab54ccc169cefe27ea.png', 1, '1', '2021-07-12 12:31:27', '', NULL),
(5, 'ST12ZEJJYE', 'Five', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/ab8e8a8e7d0e158e394343871c860c44.png', 1, '1', '2021-07-12 12:32:09', '', NULL),
(6, 'ST1216962A', 'Six', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/eb0eaff79f3418eb40d92e430c46902e.png', 1, '1', '2021-07-12 12:34:28', '', NULL),
(7, 'ST12ZLEYM1', 'Seven', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/62d45f77c05836897ae86b7234aedcf9.png', 1, '1', '2021-07-12 13:49:50', '', NULL),
(8, 'ST121TS6TP', 'Eight', '', '', NULL, NULL, NULL, NULL, NULL, NULL, 'assets/uploads/case_studies/2021-07-12/c9a13accb8d00b7725b17c49b224abb1.png', 1, '1', '2021-07-12 12:43:47', '', NULL),
(15, 'ST05ILW2BT', 'An engaging ad that inspires audiences. Redefining new', '<p>For years now,Adkrasol Design Studio was struggling to have a fully functional, navigable,fast loadind,UI/UX rich and a mobile responsive website with all the advanced features</p>\r\n\r\n<p>Talent Resources Sports helped Acker wines partner with past and present NBA Legends for the Acker Wines All-Stars Uncorked Wine Testing Series. Throughout the Month of October, Acker Wines sat down with jj Redick, Carmmel Anthony , kevin love as well as TRS secured Talent NBA Legend Paul Price and recently crowned NBA Champion Kyle kuzma to connect over a common passion,wine</p>\r\n', 'Acker Wines', 'Dgital Wine Testing Series', 'Beverage', 'Our Strategies', '<p>Proin sagittis feugiat elit finibus pretium. Donec et tortor non purus vulputate tincidunt. Cras congue posuer eros eget egestas. Aenean varius ex ut ex laoreet Aenean the frementum</p>\r\n\r\n<p>>> Providing all materials, labor equipment.<br>\r\n>> Eget egestas Aenean various ex ut ex laoreet aenean.<br>\r\n>> Aenean varius ex ut ex laoreet Aenean frementum.<br>\r\n>> Aenean varius ex ut ex laoreet Aenean frementum.</p>\r\n', 'Talent Resources has secured', '<h1> </h1>\r\n\r\n<h1>Over 450 Milion Impression</h1>\r\n\r\n<p> </p>\r\n\r\n<p>from sites such as yahoo News, ABC&#39;s BizNinja Radio,Beverage Industry News, US Weekly,Popusugar,and more</p>\r\n', 'assets/uploads/case_studies/2021-08-05/878bbf371deee17cb1d3f53493949f40.png', 1, '1', '2021-08-09 14:24:33', '1', '2021-08-09 14:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `id` int(11) NOT NULL,
  `category_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_popular` int(11) DEFAULT NULL COMMENT '1 = yes and 0 = no',
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `category_id`, `parent_id`, `name`, `icon`, `is_popular`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'C13RLR5A', '', 'Fashion', '', 0, 1, '1', '2021-07-13 12:25:27', '1', '2021-07-13 12:25:27'),
(2, 'C13KO44N', NULL, 'Food for thought', NULL, NULL, 1, '1', '2021-07-13 12:25:47', '1', '2021-07-13 12:25:47'),
(3, 'C13BG6SZ', NULL, 'Gaming', NULL, NULL, 1, '1', '2021-07-13 12:26:09', '1', '2021-07-13 12:26:09'),
(4, 'C13LW7BW', NULL, 'Music', NULL, NULL, 1, '1', '2021-07-13 12:26:25', '1', '2021-07-13 12:26:25'),
(5, 'C13YFDWP', NULL, 'Uncategorized', NULL, NULL, 1, '1', '2021-07-13 12:26:38', '1', '2021-07-13 12:26:38'),
(6, 'C13CFK3C', NULL, 'SaasLand', NULL, NULL, 1, '1', '2021-07-13 12:26:50', '1', '2021-07-13 12:26:50'),
(7, 'C13F5F9N', NULL, 'Project Management', NULL, NULL, 1, '1', '2021-07-13 12:27:33', '1', '2021-07-13 12:27:33'),
(8, 'C132AM5Y', NULL, 'Wireframing', NULL, NULL, 1, '1', '2021-07-13 12:27:13', '1', '2021-07-13 12:27:13');

-- --------------------------------------------------------

--
-- Table structure for table `coaching_tbl`
--

CREATE TABLE `coaching_tbl` (
  `id` int(15) NOT NULL,
  `coaching_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `section_type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coaching_tbl`
--

INSERT INTO `coaching_tbl` (`id`, `coaching_id`, `section_type`, `title`, `description`, `link`, `picture`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'tyuytu', 'sec_1', 'tyu', 'tru', 'tru', 'ytu', 1, '1', '2021-08-04 09:04:01', '1', '2021-08-04 09:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `comments_tbl`
--

CREATE TABLE `comments_tbl` (
  `id` int(11) NOT NULL,
  `comment_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=inactive and 1=active',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commission_setup_tbl`
--

CREATE TABLE `commission_setup_tbl` (
  `id` int(11) NOT NULL,
  `commission_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `commission` decimal(10,0) NOT NULL,
  `commission_rate` decimal(10,2) NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `commission_setup_tbl`
--

INSERT INTO `commission_setup_tbl` (`id`, `commission_id`, `category_id`, `commission`, `commission_rate`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(69, 'CM21VKT5IF', 'C21R42ZD', '20', '0.00', '1', '2020-06-21 04:44:24', '1', '2020-06-21 04:44:24'),
(70, 'CM21WFGZIJ', 'C21ZE9P9', '30', '0.00', '1', '2020-06-21 04:44:15', '1', '2020-06-21 04:44:15'),
(71, 'CM211WL87H', 'C215YVUB', '50', '0.00', '1', '2020-06-21 04:44:04', '1', '2020-06-21 04:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `company_tbl`
--

CREATE TABLE `company_tbl` (
  `id` int(11) NOT NULL,
  `company_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company_tbl`
--

INSERT INTO `company_tbl` (`id`, `company_id`, `name`, `link`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(25, 'CM07IBR', 'CTG', '', '1', '2021-07-07 08:43:19', '', '0000-00-00 00:00:00'),
(26, 'CM07B23', 'CMG', '', '1', '2021-07-07 08:43:37', '', '0000-00-00 00:00:00'),
(27, 'CM076RE', 'MAN\'S CAPITAL', '', '1', '2021-07-07 08:44:05', '', '0000-00-00 00:00:00'),
(28, 'CM07AWP', 'MMI', '', '1', '2021-07-07 08:44:17', '', '0000-00-00 00:00:00'),
(29, 'CM07CZ8', 'MY CMG', '', '1', '2021-07-07 08:44:34', '', '0000-00-00 00:00:00'),
(30, 'CM07YQK', 'scalelr', '', '1', '2021-07-07 08:45:22', '', '0000-00-00 00:00:00'),
(31, 'CM07Y7Q', 'LFA', '', '1', '2021-07-07 08:45:42', '', '0000-00-00 00:00:00'),
(32, 'CM07JG7', 'elite', '', '1', '2021-07-07 08:46:09', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coursequiz_tbl`
--

CREATE TABLE `coursequiz_tbl` (
  `id` int(11) NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quiz` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ans` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coursequiz_tbl`
--

INSERT INTO `coursequiz_tbl` (`id`, `course_id`, `quiz`, `ans`, `created_by`, `created_at`, `status`) VALUES
(13, 'CO21O45T9', '', '', '1', '2020-06-21 05:31:20', 0),
(14, 'CO211KZJ6', '', '', '1', '2020-06-21 05:34:46', 0),
(15, 'CO21T2YWE', 'Nulla eu magna felis. Sed libero augue', '0', '1', '2020-06-21 05:36:33', 0),
(16, 'CO21ORHLN', '', '', '1', '2020-06-21 05:37:36', 0),
(19, 'CO29QMFC3', 'rt', '1', '1', '2021-07-31 15:57:09', 1),
(20, 'CO29QMFC3', 'rr', '1', '1', '2021-07-31 15:57:09', 1),
(21, 'CO29QMFC3', '69', '1', '1', '2021-07-31 15:57:09', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `id` int(11) NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `faculty_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `summary` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `course_level` int(11) DEFAULT NULL COMMENT '1=beginner, 2=intermediate and 3=advanced',
  `language` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_popular` int(11) DEFAULT NULL COMMENT '1=yes and 0 = no',
  `requirements` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `benifits` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_free` int(11) DEFAULT NULL COMMENT '1=yes and 0 = no',
  `price` decimal(10,2) DEFAULT NULL,
  `oldprice` decimal(10,2) DEFAULT NULL,
  `is_discount` int(11) DEFAULT NULL COMMENT '1=yes and 2 = no',
  `discount` decimal(10,2) DEFAULT NULL,
  `course_provider` int(11) DEFAULT NULL COMMENT '1=youtube and 2 = vimeo',
  `url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active and 2 = inactive',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`id`, `course_id`, `faculty_id`, `name`, `summary`, `description`, `category_id`, `course_level`, `language`, `is_popular`, `requirements`, `benifits`, `is_free`, `price`, `oldprice`, `is_discount`, `discount`, `course_provider`, `url`, `meta_keyword`, `meta_description`, `slug`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(457, 'CO21O45T9', 'F211LO1YH', 'Nullam dignissim ipsum vitae arcu pretium dignissim.', '', '<p>Aenean dictum augue nec lobortis congue. Quisque imperdiet, neque eget efficitur rhoncus, augue tellus placerat elit, id tristique lacus risus at libero. Donec ac lectus et nulla iaculis volutpat a sollicitudin diam. Fusce mattis pretium consequat. Duis facilisis velit arcu, et elementum dui pharetra id. Praesent eros magna, placerat vitae sollicitudin a, pretium eu mauris. Mauris mattis, justo eu imperdiet volutpat, arcu tortor suscipit nunc, quis pretium lorem quam id metus. Donec turpis eros, lobortis nec velit sit amet, volutpat tempor neque. Duis ut blandit quam, a cursus elit. Pellentesque nibh elit, molestie eget varius nec, dapibus ut leo. Nulla ut mauris rutrum, elementum nibh id, varius augue. Donec libero enim, imperdiet a tincidunt eu, faucibus sit amet est. Quisque a aliquam eros. Maecenas scelerisque in tellus eu auctor. Nulla ut mi id nunc fermentum eleifend. Sed laoreet ex vel lectus lobortis suscipit.</p>\r\n\r\n<div id=\"gtx-trans\" xss=removed>\r\n<div class=\"gtx-trans-icon\">Â </div>\r\n</div>\r\n', 'C21R42ZD', 1, 'english', 1, '[\"Nunc at odio lorem. Donec dui dolor, commodo vitae elementum quis, finibus ac odio.\"]', '[\"Nullam aliquet libero a placerat aliquet.\",\"Pellentesque aliquet mauris vel aliquam fringilla.\"]', 0, '100.00', '120.00', 0, '0.00', 1, '', 'Nullam dignissim ipsum vitae arcu pretium dignissim.', '', 'nullam-dignissim-ipsum-vitae-arcu-pretium-dignissim.', 1, '1', '2020-06-21 05:31:20', '', '0000-00-00 00:00:00'),
(458, 'CO211KZJ6', 'F211LO1YH', 'Dignissim ipsum vitae arcu pretium dignissim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Donec ut nisi at erat condimentum rutrum sed et lorem. Aliquam sed metus metus. Nunc mollis sem imperdiet semper mattis. Etiam magna ex, volutpat ac vulputate eget, elementum eu ipsum. Ut vehicula ut mauris sed sodales. Suspendisse et egestas ipsum.</p>\r\n\r\n<p>Sed in sem est. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nam arcu ante, dictum non libero eget, eleifend cursus lacus. Nullam in malesuada dolor. Fusce pulvinar rhoncus purus, a porttitor tellus varius rutrum. Aliquam in lorem nunc. Nulla vitae nisl eu massa posuere imperdiet a tempor augue.</p>\r\n', 'C21ZE9P9', 0, '', 1, '[\"Lorem ipsum dolor sit amet, consectetur adipiscing elit.\",\"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam.\"]', '[\"Nullam aliquet libero a placerat aliquet.\",\"Pellentesque aliquet mauris vel aliquam fringilla.\"]', 0, '150.00', '200.00', 0, '0.00', 1, '', 'Dignissim ipsum vitae arcu pretium dignissim.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.', 'dignissim-ipsum-vitae-arcu-pretium-dignissim.', 1, '1', '2020-06-21 05:34:46', '', '0000-00-00 00:00:00'),
(459, 'CO21T2YWE', 'F211LO1YH', 'Dolor sit amet, consectetur adipiscing elit. Etiam et.', 'Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.</p>\r\n', 'C215YVUB', 2, 'english', 1, '[\"Nunc at odio lorem. Donec dui dolor, commodo vitae elementum quis, finibus ac odio.\",\"Lorem ipsum dolor sit amet, consectetur adipiscing elit.\"]', '[\"Nullam aliquet libero a placerat aliquet.\",\"Quisque aliquam, nulla eu suscipit lacinia, mauris diam suscipit urna, sed vulputate dui mauris vitae ex.\"]', 0, '150.00', '180.00', 0, '0.00', 0, '', 'Dolor sit amet, consectetur adipiscing elit. Etiam et.', 'Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', 'dolor-sit-amet,-consectetur-adipiscing-elit.-etiam-et.', 1, '1', '2020-06-21 05:36:33', '', '0000-00-00 00:00:00'),
(460, 'CO21ORHLN', 'F211LO1YH', 'Consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.</p>\r\n', 'C215YVUB', 2, 'english', 1, '[\"Nunc at odio lorem. Donec dui dolor, commodo vitae elementum quis, finibus ac odio.\",\"Lorem ipsum dolor sit amet, consectetur adipiscing elit.\"]', '[\"Nullam aliquet libero a placerat aliquet.\",\"Quisque aliquam, nulla eu suscipit lacinia, mauris diam suscipit urna, sed vulputate dui mauris vitae ex.\",\"Pellentesque aliquet mauris vel aliquam fringilla.\"]', 0, '100.00', '150.00', 0, '0.00', 0, '', 'Consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum.', 'consectetur-adipiscing-elit.-etiam-et-fermentum-dui.-ut-orci-quam.', 1, '1', '2020-06-21 05:37:36', '', '0000-00-00 00:00:00'),
(461, 'CO29QMFC3', 'F21F6DBPW', 'Phillip Anthropy', 'dfh', '<p>hfdh</p>\r\n', 'C13RLR5A', 1, 'english', 1, '[\"dfh\"]', '[\"fgh\"]', 0, '45645.00', '45.00', 0, '0.00', 1, 'fdhfgh', 'Phillip Anthropy', 'dfh', 'phillip-anthropy', 1, '1', '2021-07-31 15:57:09', '1', '2021-07-31 15:57:09');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currencyid` int(11) NOT NULL,
  `currencyname` varchar(50) NOT NULL,
  `curr_icon` varchar(50) NOT NULL,
  `position` int(11) NOT NULL DEFAULT 1 COMMENT '1=left.2=right',
  `curr_rate` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`currencyid`, `currencyname`, `curr_icon`, `position`, `curr_rate`) VALUES
(1, 'BDT', 'BDT', 2, '83.00'),
(2, 'USD', '$', 1, '1.00'),
(3, 'Indian Rupee', 'INR', 1, '1.25');

-- --------------------------------------------------------

--
-- Table structure for table `customer_review_tbl`
--

CREATE TABLE `customer_review_tbl` (
  `id` bigint(20) NOT NULL,
  `customer_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `reviewer_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `reviewer_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `review` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `rating` decimal(10,0) DEFAULT 0,
  `is_rating` int(11) NOT NULL DEFAULT 0 COMMENT '0=not rating and 1 = yes rating',
  `is_review` int(11) NOT NULL DEFAULT 0 COMMENT '0= not review and 1 = yes review',
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `education_tbl`
--

CREATE TABLE `education_tbl` (
  `id` int(11) NOT NULL,
  `education_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `from_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `degree_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `institute` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `passing_year` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `education_tbl`
--

INSERT INTO `education_tbl` (`id`, `education_id`, `from_id`, `degree_name`, `institute`, `passing_year`) VALUES
(80, 'E213VNP', 'F211LO1YH', '', '', ''),
(81, 'E217C18', 'F21F6DBPW', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_tbl`
--

CREATE TABLE `enroll_tbl` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events_tbl`
--

CREATE TABLE `events_tbl` (
  `id` int(11) NOT NULL,
  `event_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `category` varchar(251) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `organizer` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `venue` varchar(550) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events_tbl`
--

INSERT INTO `events_tbl` (`id`, `event_id`, `event_date`, `category`, `title`, `comment`, `description`, `organizer`, `venue`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'EV094FUHN4', '2019-06-19', 'Fairwall', 'Master The Trade: Master Your Money and Mindset', 'How Immersive is Revitalising The Cultural Sector', '<h1><strong>About this Event:</strong></h1>\r\n\r\n<p>Led by the award-winning author of 100 Conversations for Career Success, and CEO of the career management firm, The Career Strategy Group, Laura M. Labovich will prepare overburdened job seekers to tackle even the most time-consuming job search challenges, especially those.</p>\r\n\r\n<p>From the moment you embark on a job search, you are inundated with “do this, do that,” by well-intentioned friends and colleagues. But, all of those random, overwhelming, haphazard “to-dos” take a toll on your body</p>\r\n\r\n<p>The truth is: we really can’t do just anything to get a job. We need to be strategic and calculated about whom we speak with, how we spend our time, and what actions we let take up time on our calendar….and organizing it all can often be a challenge. Fortunately, there are tons of tools, apps, and technological options to help us save our sanity and our freedom!</p>\r\n\r\n<p> </p>\r\n\r\n<h1><strong>During this event we’ll cover</strong></h1>\r\n\r\n<p>Led by the award-winning author of 100 Conversations for Career Success, and CEO of the career management firm, The Career Strategy Group, Laura</p>\r\n\r\n<ul>\r\n <li>How to get started learning JavaScript the right way</li>\r\n <li>JavaScript for Beginners & CS Prep curriculum details</li>\r\n <li>What the experience of learning in an online classroom is like</li>\r\n <li>How these programs prepare you for Coders and other top coding programsHere is the teaser</li>\r\n</ul>\r\n\r\n<h1><strong>Event Spaker:</strong></h1>\r\n\r\n<p>Led by the award-winning author of 100 Conversations for Career Success, and CEO of the career management firm, The Career Strategy Group, Laura M.</p>\r\n', 'Emily Patel', 'Melbourne, AU', 1, '1', '2021-08-09 08:53:22', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `event_category_tbl`
--

CREATE TABLE `event_category_tbl` (
  `id` int(11) NOT NULL,
  `event_category_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_category_tbl`
--

INSERT INTO `event_category_tbl` (`id`, `event_category_id`, `title`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(16, 'EC21GJQ3Z', ' consectetur ', 1, '1', '2020-06-21 04:46:03', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_detail_tbl`
--

CREATE TABLE `event_detail_tbl` (
  `id` int(11) NOT NULL,
  `event_detail_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `event_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(151) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `event_detail_tbl`
--

INSERT INTO `event_detail_tbl` (`id`, `event_detail_id`, `event_id`, `name`, `designation`, `company`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ED09F2XWC2', 'EV094FUHN4', 'Veronica Turner', 'sr_engineer', 'XpeedStudio LLC', '1', '2021-08-09 08:53:22', '', NULL),
(2, 'ED09J2Q4WN', 'EV094FUHN4', 'Rajon', 'sr_engineer', 'XpeedStudio LLC', '1', '2021-08-09 08:53:22', '', NULL),
(3, 'ED0921CKW8', 'EV094FUHN4', 'Suman', 'sr_engineer', 'XpeedStudio LLC', '1', '2021-08-09 08:53:22', '', NULL),
(4, 'ED09V9ML96', 'EV094FUHN4', 'Omar', 'sr_engineer', 'XpeedStudio LLC', '1', '2021-08-09 08:53:22', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `exam_tbl`
--

CREATE TABLE `exam_tbl` (
  `id` int(11) NOT NULL,
  `exam_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `exam_name` text COLLATE utf8_unicode_ci NOT NULL,
  `time_duration` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `exam_question` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `instruction` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faculty_tbl`
--

CREATE TABLE `faculty_tbl` (
  `id` int(11) NOT NULL,
  `faculty_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT 'faculty id = log id',
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `language` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `skills` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `organization` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=yes and 2=no',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `faculty_tbl`
--

INSERT INTO `faculty_tbl` (`id`, `faculty_id`, `name`, `mobile`, `designation`, `email`, `birthday`, `language`, `skills`, `website`, `organization`, `location`, `summary`, `facebook`, `twitter`, `linkedin`, `instagram`, `paypal`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(34, 'F211LO1YH', 'Lorem', '978465987645', 'Lecturer ', 'lorem@email.com', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', 1, '1', '2020-06-21 05:03:12', '', '0000-00-00 00:00:00'),
(40, 'F21F6DBPW', 'Ipsom', '897465132', 'Teacher ', 'ipsom@email.com', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', 1, '1', '2020-06-21 05:41:51', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gateway_tbl`
--

CREATE TABLE `gateway_tbl` (
  `id` int(11) NOT NULL,
  `payment_gateway` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` date NOT NULL,
  `status` tinyint(4) DEFAULT 0 COMMENT '0=development, 1=production'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gateway_tbl`
--

INSERT INTO `gateway_tbl` (`id`, `payment_gateway`, `payment_mail`, `currency`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`) VALUES
(1, 'sandbox', 'test@test.com', 'USD', 1, '0000-00-00', 1, '2021-07-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `investment_tbl`
--

CREATE TABLE `investment_tbl` (
  `id` int(15) NOT NULL,
  `investment_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `investment_type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `investment_tbl`
--

INSERT INTO `investment_tbl` (`id`, `investment_id`, `investment_type`, `title`, `description`, `link`, `picture`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'TE051G365Z', 'sec_1', '<p>Platform to safely and Grow your Business</p>\n', '<p>These cases are perfectly simple and easy to distinguish. In a free hour when our power of choice is prevents.</p>\n', NULL, NULL, 1, '1', '2021-08-05 08:00:59', '', NULL),
(2, 'TE05FNVHYO', 'sec_2', '<h2>Better solution at your fingertips</h2>\n', '<p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.We denounce with righteous indignation and dislike men and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>\n', NULL, NULL, 1, '1', '2021-08-05 08:02:24', '', NULL),
(3, 'TE059P1YWA', 'sec_3', '', '<p>World leader in consulting and finance</p>\n', NULL, NULL, 1, '1', '2021-08-05 08:04:59', '', NULL),
(4, 'TE0569M472', 'sec_3', '', '<p>A focused team with a specialized skill set</p>\n', NULL, NULL, 1, '1', '2021-08-05 08:05:23', '', NULL),
(5, 'TE05BEF39U', 'sec_3', '', '<p>Trusted and professional advisors for you</p>\n', NULL, NULL, 1, '1', '2021-08-05 08:05:44', '', NULL),
(6, 'TE05MJSO3V', 'sec_3', '', '<p>Experience to give you a better results</p>\n', NULL, NULL, 1, '1', '2021-08-05 08:06:09', '', NULL),
(12, 'TE05JQ8MYD', 'sec_4', '<h4>Trusted & Professional</h4>\n', '<h2>We’re trusted by more than 84,106 clients</h2>\n', 'https://www.youtube.com/watch?v=sU3FkzUKHXU', 'assets/uploads/investments/2021-08-05/e81af2c3955f72d22f90fbc76808dcb5.jpg', 1, '1', '2021-08-05 09:31:49', '', NULL),
(13, 'TE05OOVZC2', 'sec_5', '<p>Domain Hosting</p>\n', '', '', NULL, 1, '1', '2021-08-05 09:36:47', '', NULL),
(14, 'TE05XVZJ2N', 'sec_5', '<p>Marketing Strategy</p>\n', '', '', NULL, 1, '1', '2021-08-05 09:37:49', '', NULL),
(15, 'TE053SHJXQ', 'sec_5', '<p>VR Solution</p>\n', '', '', NULL, 1, '1', '2021-08-05 09:52:38', '1', '2021-08-05 09:52:38'),
(16, 'TE05UUN94W', 'sec_5', '<p>VR Solution</p>\n', '', '', NULL, 1, '1', '2021-08-05 09:39:08', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `invoice_details_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `product_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float NOT NULL,
  `discount` float NOT NULL,
  `total_price` float NOT NULL,
  `discount_amount` float NOT NULL,
  `tax` float NOT NULL,
  `invoice_date` date NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_tbl`
--

CREATE TABLE `invoice_tbl` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `is_different` int(11) DEFAULT NULL,
  `is_inhouse` int(2) NOT NULL COMMENT '1=In and 2 = out',
  `shipping_method` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(55) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=cash, 2=paypal',
  `description` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_discount` float NOT NULL,
  `total_discount` float NOT NULL,
  `total_amount` float NOT NULL,
  `paid_amount` float NOT NULL,
  `due_amount` float NOT NULL,
  `total_tax` float NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 = pending, 1 = Processing and 2 = Delivered',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `knowledge_tbl`
--

CREATE TABLE `knowledge_tbl` (
  `id` int(11) NOT NULL,
  `knowledge_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `started_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `knowledge_tbl`
--

INSERT INTO `knowledge_tbl` (`id`, `knowledge_id`, `title`, `started_at`, `description`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ST13Y9PBDZ', 'The Best Therapy Combining Knowledge & Care', 'Started at BLN, Serve Since 2004 With Passion.', '<p>We denounce with righteous indignation and dislike men who beguile and demoralized by the charms of pleasure the moment blindeddesires that they cannot foresee the pain and trouble. Blindeddesires that they cannot foresee.</p>\r\n', 1, '1', '2021-07-13 05:28:28', '', NULL),
(2, 'ST02ZKQFSK', 'Test Title', 'uru', '<p>tyi</p>\r\n', 1, '1', '2021-08-02 05:24:06', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `phrase` varchar(100) NOT NULL,
  `english` varchar(255) NOT NULL,
  `bangla` text DEFAULT NULL,
  `arabic` text DEFAULT NULL,
  `urdhu` text DEFAULT NULL,
  `spanish` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`, `arabic`, `urdhu`, `spanish`) VALUES
(1, 'email', 'Email', NULL, NULL, NULL, NULL),
(2, 'password', 'Password', NULL, NULL, NULL, NULL),
(3, 'login', 'Login', NULL, NULL, NULL, NULL),
(4, 'logout', 'Logout', NULL, NULL, NULL, NULL),
(5, 'setting', 'Setting', NULL, NULL, NULL, NULL),
(6, 'profile', 'My Profile', NULL, NULL, NULL, NULL),
(7, 'dashboard', 'Dashboard', NULL, NULL, NULL, NULL),
(8, 'role_permission', 'Role Permission', NULL, NULL, NULL, NULL),
(9, 'permission_setup', 'Permission Setup', NULL, NULL, NULL, NULL),
(10, 'add_role', 'Assign role to user', NULL, NULL, NULL, NULL),
(11, 'role_list', 'Role List', NULL, NULL, NULL, NULL),
(12, 'user_access_role', 'User Access Role List', NULL, NULL, NULL, NULL),
(13, 'add_module_permission', 'Add Module Permission', NULL, NULL, NULL, NULL),
(14, 'module_permission_list', 'Module Permission List', NULL, NULL, NULL, NULL),
(15, 'language', 'Language', NULL, NULL, NULL, NULL),
(16, 'application_setting', 'Application Setting', NULL, NULL, NULL, NULL),
(17, 'message', 'Message', NULL, NULL, NULL, NULL),
(18, 'new', 'New', NULL, NULL, NULL, NULL),
(19, 'inbox', 'inbox', NULL, NULL, NULL, NULL),
(20, 'sent', 'Sent', NULL, NULL, NULL, NULL),
(21, 'user', 'User', NULL, NULL, NULL, NULL),
(22, 'add_user', 'Add User', NULL, NULL, NULL, NULL),
(23, 'user_list', 'User List', NULL, NULL, NULL, NULL),
(24, 'reset', 'Reset', NULL, NULL, NULL, NULL),
(25, 'save', 'Save', NULL, NULL, NULL, NULL),
(26, 'status', 'Status', NULL, NULL, NULL, NULL),
(27, 'lastname', 'Last Name', NULL, NULL, NULL, NULL),
(28, 'firstname', 'First Name', NULL, NULL, NULL, NULL),
(30, 'save_successfully', 'Save Successfully', NULL, NULL, NULL, NULL),
(31, 'please_try_again', 'Please Try Again Later!!!', NULL, NULL, NULL, NULL),
(32, 'update_successfully', 'Successfully Updated', NULL, NULL, NULL, NULL),
(33, 'admin', 'Admin', NULL, NULL, NULL, NULL),
(35, 'sl_no', 'SL No.', NULL, NULL, NULL, NULL),
(36, 'image', 'Image', NULL, NULL, NULL, NULL),
(37, 'username', 'Username', NULL, NULL, NULL, NULL),
(38, 'last_login', 'Last Login', NULL, NULL, NULL, NULL),
(39, 'last_logout', 'Last Logout', NULL, NULL, NULL, NULL),
(40, 'ip_address', 'Ip Address', NULL, NULL, NULL, NULL),
(41, 'action', 'Action', NULL, NULL, NULL, NULL),
(42, 'menu_item_list', ' Menu Item List', NULL, NULL, NULL, NULL),
(43, 'ins_menu_for_application', 'Ins Menu For Application', NULL, NULL, NULL, NULL),
(44, 'menu_title', ' Menu Title', NULL, NULL, NULL, NULL),
(45, 'page_url', 'Page Url', NULL, NULL, NULL, NULL),
(46, 'module', ' Module', NULL, NULL, NULL, NULL),
(47, 'parent_menu', 'Parent Menu', NULL, NULL, NULL, NULL),
(48, 'role_name', 'Role Name', NULL, NULL, NULL, NULL),
(49, 'description', 'Description', NULL, NULL, NULL, NULL),
(50, 'role', 'Role', NULL, NULL, NULL, NULL),
(51, 'add', 'Address', NULL, NULL, NULL, NULL),
(52, 'update', 'Update', NULL, NULL, NULL, NULL),
(54, 'address', 'Address', NULL, NULL, NULL, NULL),
(55, 'phone', 'Phone', NULL, NULL, NULL, NULL),
(56, 'favicon', 'Favicon', NULL, NULL, NULL, NULL),
(57, 'logo', 'Logo', NULL, NULL, NULL, NULL),
(59, 'site_align', 'Application Alignment', NULL, NULL, NULL, NULL),
(60, 'footer_text', 'Footer Text', NULL, NULL, NULL, NULL),
(61, 'left_to_right', 'Left To Right', NULL, NULL, NULL, NULL),
(62, 'right_to_left', 'Right To Left', NULL, NULL, NULL, NULL),
(74, 'delete_successfully', 'Delete Successfully', NULL, NULL, NULL, NULL),
(75, 'find', 'Find', NULL, NULL, NULL, NULL),
(76, 'from_date', 'From Date', NULL, NULL, NULL, NULL),
(78, 'from', 'From', NULL, NULL, NULL, NULL),
(79, 'confirm', 'Confirm', NULL, NULL, NULL, NULL),
(80, 'save', 'Save', NULL, NULL, NULL, NULL),
(81, 'add_more', 'Add More', NULL, NULL, NULL, NULL),
(82, 'total', 'Total', NULL, NULL, NULL, NULL),
(83, 'create', 'Create', NULL, NULL, NULL, NULL),
(84, 'read', 'Read', NULL, NULL, NULL, NULL),
(85, 'update', 'Update', NULL, NULL, NULL, NULL),
(86, 'delete', 'Delete', NULL, NULL, NULL, NULL),
(87, 'date', 'Date', NULL, NULL, NULL, NULL),
(88, 'notice_by', 'Notice By', NULL, NULL, NULL, NULL),
(93, 'search', 'Search', NULL, NULL, NULL, NULL),
(94, 'dob', 'Date of Birth', NULL, NULL, NULL, NULL),
(95, 'ssn', 'SSN', NULL, NULL, NULL, NULL),
(96, 'reports', 'Reports', NULL, NULL, NULL, NULL),
(97, 'picture', 'Picture', NULL, NULL, NULL, NULL),
(98, 'ad', 'Add', NULL, NULL, NULL, NULL),
(99, 'sl', 'SL', NULL, NULL, NULL, NULL),
(100, 'name', 'Name', NULL, NULL, NULL, NULL),
(101, 'id', 'ID', NULL, NULL, NULL, NULL),
(104, 'mobile', 'Mobile', NULL, NULL, NULL, NULL),
(105, 'title', 'Title', NULL, NULL, NULL, NULL),
(107, 'price', 'Price', NULL, NULL, NULL, NULL),
(108, 'filter', 'Filter', NULL, NULL, NULL, NULL),
(109, 'welcome_back', 'Welcome Back', NULL, NULL, NULL, NULL),
(110, 'emplist', 'Employee List', NULL, NULL, NULL, NULL),
(111, 'manage_emp', 'Manage Employee', NULL, NULL, NULL, NULL),
(112, 'type', 'Type', NULL, NULL, NULL, NULL),
(113, 'nid', 'NID', NULL, NULL, NULL, NULL),
(114, 'department', 'Department', NULL, NULL, NULL, NULL),
(115, 'designation', 'Designation', NULL, NULL, NULL, NULL),
(116, 'emp_add', 'Add Employee', NULL, NULL, NULL, NULL),
(117, 'emp_name', 'Empployee Name', NULL, NULL, NULL, NULL),
(118, 'emp_nid', 'Employee NID', NULL, NULL, NULL, NULL),
(119, 'emp_code', 'Employee Code', NULL, NULL, NULL, NULL),
(120, 'pay_roll_type', 'Pay Roll Type', NULL, NULL, NULL, NULL),
(121, 'emp_type', 'Employee Type', NULL, NULL, NULL, NULL),
(122, 'join_date', 'Join Date', NULL, NULL, NULL, NULL),
(123, 'blood', 'Blood Group', NULL, NULL, NULL, NULL),
(126, 'fater_name', 'Father Name', NULL, NULL, NULL, NULL),
(127, 'mother_name', 'Mother Name', NULL, NULL, NULL, NULL),
(128, 'present_cont', 'Present Contact', NULL, NULL, NULL, NULL),
(129, 'present_address', 'Present Address', NULL, NULL, NULL, NULL),
(130, 'present_city', 'Present City', NULL, NULL, NULL, NULL),
(131, 'permanent_contact', 'Permanent Contact', NULL, NULL, NULL, NULL),
(132, 'permanent_address', 'Permanent Address', NULL, NULL, NULL, NULL),
(133, 'permanent_city', 'Permanent City', NULL, NULL, NULL, NULL),
(134, 'contact_person', 'Contact Person', NULL, NULL, NULL, NULL),
(135, 'contact_pmobile', 'Contact Person Mobile', NULL, NULL, NULL, NULL),
(136, 'referance', 'Reference Name', NULL, NULL, NULL, NULL),
(137, 'ref_mobile', 'Reference Mobile', NULL, NULL, NULL, NULL),
(138, 'ref_address', 'Reference Address', NULL, NULL, NULL, NULL),
(139, 'position', 'Position', NULL, NULL, NULL, NULL),
(140, 'position_name', 'Position Name', NULL, NULL, NULL, NULL),
(141, 'position_details', 'Details', NULL, NULL, NULL, NULL),
(142, 'department_name', 'Department Name', NULL, NULL, NULL, NULL),
(143, 'add_new_dept', 'Add New Department', NULL, NULL, NULL, NULL),
(144, 'manage_dept', 'Manage Department', NULL, NULL, NULL, NULL),
(145, 'update_emp', 'Update Employee', NULL, NULL, NULL, NULL),
(146, 'search_area', 'Search Area', NULL, NULL, NULL, NULL),
(147, 'joining_d_fr', 'Joining Date From', NULL, NULL, NULL, NULL),
(148, 'joining_d_to', 'Joining Date To', NULL, NULL, NULL, NULL),
(155, 'national_id', 'National ID', NULL, NULL, NULL, NULL),
(157, 'is_active', 'Is Active', NULL, NULL, NULL, NULL),
(158, 'authorization_code', 'Authorization Code', NULL, NULL, NULL, NULL),
(159, 'add_license_type', 'Add License Type', NULL, NULL, NULL, NULL),
(165, 'manage_reminder', 'Manage Reminder', NULL, NULL, NULL, NULL),
(169, 'approve_authority_list', 'Approval Authority List', NULL, NULL, NULL, NULL),
(171, 'pick_drop_requi_list', 'Pick & Drop Requisition List', NULL, NULL, NULL, NULL),
(172, 'maintenance', 'Maintenance', NULL, NULL, NULL, NULL),
(173, 'maintenance_req_list', 'Maintenance Req. List', NULL, NULL, NULL, NULL),
(174, 'maintainance_service_list', 'Maintenance Service List', NULL, NULL, NULL, NULL),
(175, 'pm_service_list', 'PM Service List', NULL, NULL, NULL, NULL),
(176, 'costinventory', 'Cost & Inventory', NULL, NULL, NULL, NULL),
(177, 'expence_type_list', 'Expence Type List', NULL, NULL, NULL, NULL),
(178, 'inventory_stock_list', 'Inventory Stock List', NULL, NULL, NULL, NULL),
(179, 'stock_dispatch', 'Stock Dispatch List', NULL, NULL, NULL, NULL),
(186, 'renewal_report', 'Renewal Report', NULL, NULL, NULL, NULL),
(187, 'reports', 'Reports', NULL, NULL, NULL, NULL),
(189, 'milage_list', 'Milage List', NULL, NULL, NULL, NULL),
(190, 'expense_list', 'Expense List', NULL, NULL, NULL, NULL),
(197, 'registration_date', 'Registration Date', NULL, NULL, NULL, NULL),
(200, 'al_email', 'Alert Email', NULL, NULL, NULL, NULL),
(206, 'vendor', 'Vendor', NULL, NULL, NULL, NULL),
(217, 'policy_number', 'Policy Number', NULL, NULL, NULL, NULL),
(218, 'start_date', 'Start Date', NULL, NULL, NULL, NULL),
(219, 'recurring_period', 'Recurring Period', NULL, NULL, NULL, NULL),
(220, 'add_remiender', 'Add Reminder', NULL, NULL, NULL, NULL),
(221, 'remarks', 'Remarks', NULL, NULL, NULL, NULL),
(223, 'end_date', 'End Date', NULL, NULL, NULL, NULL),
(224, 'recurring_date', 'Recurring Date', NULL, NULL, NULL, NULL),
(225, 'deductible', 'Deductible', NULL, NULL, NULL, NULL),
(226, 'policy_document', 'Policy Document', NULL, NULL, NULL, NULL),
(227, 'date_fr', 'Date From', NULL, NULL, NULL, NULL),
(228, 'date_to', 'Date To', NULL, NULL, NULL, NULL),
(235, 'expire_date', 'Expire Date', NULL, NULL, NULL, NULL),
(238, 'notification_before', 'Notification Before', NULL, NULL, NULL, NULL),
(239, 'sms', 'SMS', NULL, NULL, NULL, NULL),
(240, 'document_attachment', 'Document Attachment', NULL, NULL, NULL, NULL),
(241, 'search_legal_doc', 'Search Legal Documentation', NULL, NULL, NULL, NULL),
(244, 'add_reminder', 'Add Reminder', NULL, NULL, NULL, NULL),
(246, 'serach_reminder', 'Search Reminder', NULL, NULL, NULL, NULL),
(247, 'reminder_list', 'Reminder List', NULL, NULL, NULL, NULL),
(248, 'alert_type', 'Alert Type', NULL, NULL, NULL, NULL),
(249, 'remaining_days', 'Remaining Days', NULL, NULL, NULL, NULL),
(250, 'req_for', 'Requisition For', NULL, NULL, NULL, NULL),
(251, 'where_fr', 'Where From', NULL, NULL, NULL, NULL),
(252, 'where_to', 'Where To', NULL, NULL, NULL, NULL),
(254, 'req_date', 'Requisition Date', NULL, NULL, NULL, NULL),
(255, 'time_fr', 'Time From', NULL, NULL, NULL, NULL),
(256, 'time_to', 'Time To', NULL, NULL, NULL, NULL),
(257, 'tolerance', 'Tolerance Duration', NULL, NULL, NULL, NULL),
(258, 'nunpassenger', 'No of Passenger', NULL, NULL, NULL, NULL),
(259, 'drivenby', 'Driven By', NULL, NULL, NULL, NULL),
(260, 'purpose', 'Purpose', NULL, NULL, NULL, NULL),
(261, 'details', 'Details', NULL, NULL, NULL, NULL),
(262, 'req_list', 'Requisition List', NULL, NULL, NULL, NULL),
(263, 'add_req', 'Add Requisition', NULL, NULL, NULL, NULL),
(264, 'requiest_by', 'Requested By ', NULL, NULL, NULL, NULL),
(265, 'from', 'From', NULL, NULL, NULL, NULL),
(266, 'to', 'To', NULL, NULL, NULL, NULL),
(268, 'add_route', 'Add Route', NULL, NULL, NULL, NULL),
(269, 'update_route', 'Update Route', NULL, NULL, NULL, NULL),
(270, 'route_name', 'Route Name', NULL, NULL, NULL, NULL),
(271, 'destination', 'Destination', NULL, NULL, NULL, NULL),
(272, 'start_p', 'Start Point', NULL, NULL, NULL, NULL),
(273, 'descrip', 'Description', NULL, NULL, NULL, NULL),
(274, 'create_pickdrop_point', 'Create Pick and Drop Point', NULL, NULL, NULL, NULL),
(275, 'approval_auht_list', 'Approval Authority List', NULL, NULL, NULL, NULL),
(276, 'add_aprov_auth', 'Add Approval Authority ', NULL, NULL, NULL, NULL),
(277, 'req_type', 'Requisition Type', NULL, NULL, NULL, NULL),
(278, 'req_phase', 'Requisition Phase', NULL, NULL, NULL, NULL),
(279, 'department', 'Department', NULL, NULL, NULL, NULL),
(280, 'employee', 'Employee', NULL, NULL, NULL, NULL),
(283, 'route', 'Route', NULL, NULL, NULL, NULL),
(284, 'request_date', 'Request Date', NULL, NULL, NULL, NULL),
(285, 'end_p', 'End Point', NULL, NULL, NULL, NULL),
(286, 'request_type', 'Request Type', NULL, NULL, NULL, NULL),
(287, 'regular', 'Regular', NULL, NULL, NULL, NULL),
(288, 'specificday', 'Specific Day', NULL, NULL, NULL, NULL),
(289, 'pickup', 'Pick Up', NULL, NULL, NULL, NULL),
(290, 'dropoff', 'Drop Off', NULL, NULL, NULL, NULL),
(291, 'pickdropoff', 'Pick Up & Drop Off', NULL, NULL, NULL, NULL),
(292, 'effective_date', 'Effective Date', NULL, NULL, NULL, NULL),
(293, 'new_expense', 'Add New Expense', NULL, NULL, NULL, NULL),
(294, 'add_expense', 'Add Expense', NULL, NULL, NULL, NULL),
(295, 'expense_group', 'Expense Group', NULL, NULL, NULL, NULL),
(296, 'expense_name', 'Expense Name', NULL, NULL, NULL, NULL),
(297, 'expence_cat', 'Expense category', NULL, NULL, NULL, NULL),
(298, 'fuel', 'Fuel', NULL, NULL, NULL, NULL),
(299, 'maintenance', 'Maintaenance', NULL, NULL, NULL, NULL),
(301, 'other', 'Other', NULL, NULL, NULL, NULL),
(303, 'odomitter_millage', 'Odometer/Mileage', NULL, NULL, NULL, NULL),
(304, 'invoice', 'Invoice No.', NULL, NULL, NULL, NULL),
(305, 'expense_date', 'Expense Date', NULL, NULL, NULL, NULL),
(307, 'by_whom', 'By Whom', NULL, NULL, NULL, NULL),
(308, 'measurement', 'Measurement Unit', NULL, NULL, NULL, NULL),
(311, 'm_req_list', 'Maintenance Requisition List', NULL, NULL, NULL, NULL),
(312, 'add_maintenance', 'Add Maintenance', NULL, NULL, NULL, NULL),
(313, 'mainte_type', 'Maintenance Type', NULL, NULL, NULL, NULL),
(314, 'service_fr', 'Service From', NULL, NULL, NULL, NULL),
(315, 'general', 'General', NULL, NULL, NULL, NULL),
(317, 'main_ser_name', 'Maintenance Service Name', NULL, NULL, NULL, NULL),
(318, 'service_data', 'Service Data', NULL, NULL, NULL, NULL),
(319, 'charge', 'Charge', NULL, NULL, NULL, NULL),
(320, 'charge_bear_by', 'Charge Bear By', NULL, NULL, NULL, NULL),
(321, 'piority', 'Priority', NULL, NULL, NULL, NULL),
(322, 'is_add_schedule', 'Is Add Schedule', NULL, NULL, NULL, NULL),
(323, 'req_item_info', 'Requisition Item Information', NULL, NULL, NULL, NULL),
(324, 'item_type_name', 'Item Type Name', NULL, NULL, NULL, NULL),
(325, 'item_name', 'Item Name', NULL, NULL, NULL, NULL),
(326, 'item_unit', 'Item Unit', NULL, NULL, NULL, NULL),
(327, 'maint_ser_list', 'Maintenance Service List', NULL, NULL, NULL, NULL),
(328, 'add_main_ser', 'Add Maintenance Service', NULL, NULL, NULL, NULL),
(329, 'ser_name', 'Service Name', NULL, NULL, NULL, NULL),
(330, 'serv_type', 'Service Type', NULL, NULL, NULL, NULL),
(332, 'fuel_traking', 'Fuel Traking', NULL, NULL, NULL, NULL),
(333, 'milage_traking', 'Milage Traking', NULL, NULL, NULL, NULL),
(334, 'pmservicelist', 'PM Service List', NULL, NULL, NULL, NULL),
(335, 'pmservice', 'PM Service', NULL, NULL, NULL, NULL),
(337, 'base_date', 'Base Date', NULL, NULL, NULL, NULL),
(338, 'recurring_value', 'Recurring Value', NULL, NULL, NULL, NULL),
(339, 'notifycell', 'Notification Cell', NULL, NULL, NULL, NULL),
(340, 'notify_email', 'Notification Email', NULL, NULL, NULL, NULL),
(341, 'add_pm', 'Add PM Service', NULL, NULL, NULL, NULL),
(342, 'refuel_setting', 'Refueling Setting List', NULL, NULL, NULL, NULL),
(343, 'add_refuel', 'Add Refuel Setting', NULL, NULL, NULL, NULL),
(344, 'last_reading', 'Last Reading', NULL, NULL, NULL, NULL),
(345, 'consumption', 'Consumption', NULL, NULL, NULL, NULL),
(346, 'strict_policy', 'Strict Policy', NULL, NULL, NULL, NULL),
(347, 'driver_mobile', 'Driver Mobile', NULL, NULL, NULL, NULL),
(348, 'fuel_type', 'Fuel Type', NULL, NULL, NULL, NULL),
(349, 'refuel_limit', 'Refuel Limit', NULL, NULL, NULL, NULL),
(350, 'kilometer_per_unit', 'Kilometer Per Unit', NULL, NULL, NULL, NULL),
(351, 'last_unit', 'Last Unit', NULL, NULL, NULL, NULL),
(352, 'refuel_limit_type', 'Refuel Limit Type', NULL, NULL, NULL, NULL),
(353, 'max_unit', 'Max Unit', NULL, NULL, NULL, NULL),
(354, 'consumption_percent', 'Consumption Percent', NULL, NULL, NULL, NULL),
(355, 'stict_consump', 'Strict Consumption Apply', NULL, NULL, NULL, NULL),
(356, 'fuel_station_list', 'Fuel Station List', NULL, NULL, NULL, NULL),
(357, 'add_fuel_station', 'Add Fuel Station', NULL, NULL, NULL, NULL),
(358, 'station_name', 'Station Name', NULL, NULL, NULL, NULL),
(359, 'station_code', 'Station Code', NULL, NULL, NULL, NULL),
(360, 'authorize_person', 'Authorize Person', NULL, NULL, NULL, NULL),
(361, 'contact_num', 'Contact Number', NULL, NULL, NULL, NULL),
(362, 'is_authrize', 'Is Authorize', NULL, NULL, NULL, NULL),
(363, 'vendor_name', 'Vendor Name', NULL, NULL, NULL, NULL),
(364, 'refuel_req_list', 'Refuel Requisition List', NULL, NULL, NULL, NULL),
(365, 'add_refuel_req', 'Add Refueling Requisition ', NULL, NULL, NULL, NULL),
(366, 'req_no', 'Requisition Number', NULL, NULL, NULL, NULL),
(367, 'req_from', 'Requisition From', NULL, NULL, NULL, NULL),
(368, 'odomiter', 'Odomiter', NULL, NULL, NULL, NULL),
(369, 'application', 'Application', NULL, NULL, NULL, NULL),
(370, 'p_qty', 'P.Qty', NULL, NULL, NULL, NULL),
(371, 'f_qty', 'F.Qty', NULL, NULL, NULL, NULL),
(372, 'process_status', 'Process Status', NULL, NULL, NULL, NULL),
(373, 'fuel_station', 'Fuel Station', NULL, NULL, NULL, NULL),
(374, 'qty', 'Quantity', NULL, NULL, NULL, NULL),
(375, 'current_odometer', 'Current Odometer', NULL, NULL, NULL, NULL),
(376, 'refuel_req_track_list', 'Refuel Requisition Track List', NULL, NULL, NULL, NULL),
(377, 'policy_vendor_name', 'Policy Vendor Name', NULL, NULL, NULL, NULL),
(379, 'setting', 'System Setting', NULL, NULL, NULL, NULL),
(380, 'company_list', 'Company List', NULL, NULL, NULL, NULL),
(381, 'add_company', 'Add Company', NULL, NULL, NULL, NULL),
(382, 'update_company', 'Update Company', NULL, NULL, NULL, NULL),
(383, 'recurring_periode_name', 'Recurring Period Name', NULL, NULL, NULL, NULL),
(384, 'recurring_periode_list', 'Recurring Period List', NULL, NULL, NULL, NULL),
(385, 'add_recurring_period', 'Add Recurring Period', NULL, NULL, NULL, NULL),
(387, 'insur_update', 'Update Insurance', NULL, NULL, NULL, NULL),
(388, 'vendor_name', 'Vendor Name', NULL, NULL, NULL, NULL),
(389, 'vendor_add', 'Add Vendor', NULL, NULL, NULL, NULL),
(391, 'notification_list', 'Notification List', NULL, NULL, NULL, NULL),
(392, 'add_notification', 'Add Notification', NULL, NULL, NULL, NULL),
(393, 'notification_name', 'Notification Name', NULL, NULL, NULL, NULL),
(394, 'update_vendor', 'Update Vendor', NULL, NULL, NULL, NULL),
(395, 'vendor_list', 'Vendor List', NULL, NULL, NULL, NULL),
(396, 'document_type', 'Documentation Type', NULL, NULL, NULL, NULL),
(397, 'add_documentation_type', 'Add Document Type', NULL, NULL, NULL, NULL),
(398, 'update_document_Type', 'Update Document Type', NULL, NULL, NULL, NULL),
(399, 'document_name', 'Document Name', NULL, NULL, NULL, NULL),
(400, 'add_vehicletype', 'Add Vehicle Type', NULL, NULL, NULL, NULL),
(403, 'add_purpose', 'Add purpose', NULL, NULL, NULL, NULL),
(404, 'update_purpose', 'Update Purpose', NULL, NULL, NULL, NULL),
(405, 'req_purpose', 'Requisition Purpose', NULL, NULL, NULL, NULL),
(407, 'add_req_type', 'Add Requisition Type', NULL, NULL, NULL, NULL),
(409, 'type_name', 'Type Name', NULL, NULL, NULL, NULL),
(410, 'add_phase', 'Add Phase', NULL, NULL, NULL, NULL),
(411, 'update_phase', 'Update Phase', NULL, NULL, NULL, NULL),
(412, 'phase_list', 'Phase List', NULL, NULL, NULL, NULL),
(413, 'phase_name', 'Phase Name', NULL, NULL, NULL, NULL),
(414, 'update_app_auth', 'Update Approval Authority', NULL, NULL, NULL, NULL),
(415, 'updatepickdrof', 'Update Pick & Drop off', NULL, NULL, NULL, NULL),
(416, 'add_maintenance_type', 'Add Maintenance Type', NULL, NULL, NULL, NULL),
(418, 'mainten_type_list', 'Maintenance Type List', NULL, NULL, NULL, NULL),
(419, 'mainten_name', 'Maintenance Type Name', NULL, NULL, NULL, NULL),
(420, 'add_priority', 'Add Priority', NULL, NULL, NULL, NULL),
(421, 'update_priority', 'Update Priority', NULL, NULL, NULL, NULL),
(422, 'priority_list', 'Priority List', NULL, NULL, NULL, NULL),
(423, 'priority_name', 'Priority Name', NULL, NULL, NULL, NULL),
(424, 'add_service_type', 'Add Service Type', NULL, NULL, NULL, NULL),
(426, 'service_type_name', 'Service Type Name', NULL, NULL, NULL, NULL),
(427, 'service_type_list', 'Service Type List', NULL, NULL, NULL, NULL),
(428, 'add_fuel_type', 'Add Fuel Type', NULL, NULL, NULL, NULL),
(430, 'fueltype_list', 'Fuel Type List', NULL, NULL, NULL, NULL),
(431, 'fuel_type_name', 'Fuel Type Name', NULL, NULL, NULL, NULL),
(433, 'update_tript', 'Update Trip Type', NULL, NULL, NULL, NULL),
(436, 'update_exptype', 'Update Expense Type', NULL, NULL, NULL, NULL),
(437, 'add_expense_type', 'Add Expense Type', NULL, NULL, NULL, NULL),
(438, 'expence_list', 'Expense List', NULL, NULL, NULL, NULL),
(439, 'details', 'Details', NULL, NULL, NULL, NULL),
(440, 'update_expense', 'Update Expense', NULL, NULL, NULL, NULL),
(441, 'parts_list', 'Parts List', NULL, NULL, NULL, NULL),
(442, 'add_parts', 'Add Parts', NULL, NULL, NULL, NULL),
(444, 'parts_name', 'Parts Name', NULL, NULL, NULL, NULL),
(445, 'add_category', 'Add Category', NULL, NULL, NULL, NULL),
(446, 'update_category', 'Update Category', NULL, NULL, NULL, NULL),
(447, 'category_list', 'Category List', NULL, NULL, NULL, NULL),
(448, 'category_name', 'Category Name', NULL, NULL, NULL, NULL),
(449, 'location_add', 'Add Location', NULL, NULL, NULL, NULL),
(450, 'update_location', 'Update Location', NULL, NULL, NULL, NULL),
(451, 'location_name', 'Location Name', NULL, NULL, NULL, NULL),
(452, 'location_list', 'Location List', NULL, NULL, NULL, NULL),
(453, 'room', 'Room', NULL, NULL, NULL, NULL),
(454, 'self', 'Self', NULL, NULL, NULL, NULL),
(455, 'drawer', 'Drawer', NULL, NULL, NULL, NULL),
(456, 'capacity', 'Capacity', NULL, NULL, NULL, NULL),
(457, 'dimension', 'Dimension', NULL, NULL, NULL, NULL),
(458, 'yes', 'Yes', NULL, NULL, NULL, NULL),
(459, 'no', 'No', NULL, NULL, NULL, NULL),
(460, 'description', 'Description', NULL, NULL, NULL, NULL),
(461, 'stock_limit', 'Stock Limit', NULL, NULL, NULL, NULL),
(462, 'remarks', 'Remark', NULL, NULL, NULL, NULL),
(463, 'nearest_vehicle', 'Nearest Vehicle', NULL, NULL, NULL, NULL),
(467, 'vtstracker', 'VTS Tracker', NULL, NULL, NULL, NULL),
(468, 'model', 'Model', NULL, NULL, NULL, NULL),
(470, 'vehEnginStat', 'Vehicle Engine State', NULL, NULL, NULL, NULL),
(471, 'lat', 'Latitude', NULL, NULL, NULL, NULL),
(472, 'long', 'Longitude', NULL, NULL, NULL, NULL),
(473, 'numberOfVehicle', 'No. of Vehicle', NULL, NULL, NULL, NULL),
(474, 'totalFaceVehicles', 'Total Face Vehicle', NULL, NULL, NULL, NULL),
(477, 'distance', 'Distance', NULL, NULL, NULL, NULL),
(478, 'speed', 'Speed', NULL, NULL, NULL, NULL),
(479, 'enginStat', 'Engine Stat', NULL, NULL, NULL, NULL),
(480, 'vendorName', 'Vendor Name', NULL, NULL, NULL, NULL),
(481, 'numberOfLocation', 'No. of Location', NULL, NULL, NULL, NULL),
(482, 'totalFaceLocations', 'Total Face Location', NULL, NULL, NULL, NULL),
(483, 'distanceTraveled', 'Distance Traveled', NULL, NULL, NULL, NULL),
(488, 'upt_maint_serv', 'Update Maintenance Service ', NULL, NULL, NULL, NULL),
(489, 'emp_report', 'Employee Report', NULL, NULL, NULL, NULL),
(490, 'expense_report', 'Expense Report', NULL, NULL, NULL, NULL),
(491, 'exp_date_fr', 'Expense Date From', NULL, NULL, NULL, NULL),
(492, 'exp_date_to', 'Expense Date To', NULL, NULL, NULL, NULL),
(493, 'grandt', 'Grand Total', NULL, NULL, NULL, NULL),
(494, 'm_req_report', 'Maintenance Requisition Report', NULL, NULL, NULL, NULL),
(495, 'service_fr', 'Service From', NULL, NULL, NULL, NULL),
(496, 'milage_rpt', 'Mileage Report ', NULL, NULL, NULL, NULL),
(497, 'division_list', 'Division List', NULL, NULL, NULL, NULL),
(499, 'ownershiplist', 'Ownership List', NULL, NULL, NULL, NULL),
(500, 'add_division', 'Add Division', NULL, NULL, NULL, NULL),
(501, 'update_division', 'Division Update ', NULL, NULL, NULL, NULL),
(502, 'division_name', 'Division Name', NULL, NULL, NULL, NULL),
(503, 'office_location', 'Office Location', NULL, NULL, NULL, NULL),
(504, 'add_brtaOffice', 'Add BRTA Office', NULL, NULL, NULL, NULL),
(505, 'upt_brta', 'Update BRTA Office', NULL, NULL, NULL, NULL),
(506, 'add_ownership', 'Add Ownership', NULL, NULL, NULL, NULL),
(507, 'ownerupt', 'Ownership Update', NULL, NULL, NULL, NULL),
(508, 'ownertype', 'Ownership Type', NULL, NULL, NULL, NULL),
(509, 'purchase', 'Purchase & Usage', NULL, NULL, NULL, NULL),
(510, 'purchase_list', 'Purchase List', NULL, NULL, NULL, NULL),
(511, 'partsuse_list', 'Parts Usages List', NULL, NULL, NULL, NULL),
(512, 'add_purchase', 'Add Purchase', NULL, NULL, NULL, NULL),
(513, 'add_usages', 'Add Parts Usage', NULL, NULL, NULL, NULL),
(514, 'purchase_dade', 'Purchase Date', NULL, NULL, NULL, NULL),
(515, 'update_purchase', 'Update Purchase', NULL, NULL, NULL, NULL),
(516, 'category', 'Category', NULL, NULL, NULL, NULL),
(517, 'parent_category', 'Parent Category', NULL, NULL, NULL, NULL),
(518, 'parent', 'Parent', NULL, NULL, NULL, NULL),
(519, 'icon', 'Icon', NULL, NULL, NULL, NULL),
(520, 'course', 'Course', NULL, NULL, NULL, NULL),
(521, 'add_course', 'Add Course', NULL, NULL, NULL, NULL),
(522, 'course_list', 'Course List', NULL, NULL, NULL, NULL),
(523, 'total_course', 'Total Course', NULL, NULL, NULL, NULL),
(524, 'active_course', 'Active Course', NULL, NULL, NULL, NULL),
(525, 'pending_course', 'Pending Course', NULL, NULL, NULL, NULL),
(526, 'free_course', 'Free Course', NULL, NULL, NULL, NULL),
(527, 'paid_course', 'Paid Course', NULL, NULL, NULL, NULL),
(528, 'basic_info', 'Basic Info', NULL, NULL, NULL, NULL),
(529, 'submit', 'Submit', NULL, NULL, NULL, NULL),
(530, 'course_requirements', 'Course Requirement', NULL, NULL, NULL, NULL),
(531, 'price', 'Price', NULL, NULL, NULL, NULL),
(532, 'course_benifit', 'Course Benifit', NULL, NULL, NULL, NULL),
(533, 'course_pricing', 'Course Pricing', NULL, NULL, NULL, NULL),
(534, 'course_media', 'Course Media', NULL, NULL, NULL, NULL),
(535, 'course_seo', 'Course SEO', NULL, NULL, NULL, NULL),
(536, 'summary', 'Summary', NULL, NULL, NULL, NULL),
(537, 'course_level', 'Course Level', NULL, NULL, NULL, NULL),
(538, 'select_one', '-- select one --', NULL, NULL, NULL, NULL),
(539, 'enter_requirements', 'Enter Requirements', NULL, NULL, NULL, NULL),
(540, 'requirements', 'Requirements', NULL, NULL, NULL, NULL),
(541, 'discount', 'Discount', NULL, NULL, NULL, NULL),
(542, 'security_character', '@!#$%^&*()_+[]{}?;|\'`/><', NULL, NULL, NULL, NULL),
(543, 'onlynumber_allow', '@!#$%^&*()_+[]{}?:;|\\/~`-=abcdefghijklmnopqrstuvwxyz><', NULL, NULL, NULL, NULL),
(544, 'course_provider', 'Course Provider', NULL, NULL, NULL, NULL),
(545, 'url', 'URL', NULL, NULL, NULL, NULL),
(546, 'thumbnail', 'Thumbnail', NULL, NULL, NULL, NULL),
(547, 'meta_keyword', 'Meta Keyword', NULL, NULL, NULL, NULL),
(548, 'meta_description', 'Meta Description', NULL, NULL, NULL, NULL),
(549, 'finish', 'Finish', NULL, NULL, NULL, NULL),
(550, 'course_name', 'Course Name', NULL, NULL, NULL, NULL),
(551, 'section_lesson', 'Lesson and Section', NULL, NULL, NULL, NULL),
(552, 'edit_course', 'Edit Course', NULL, NULL, NULL, NULL),
(553, 'add_section', 'Add Section', NULL, NULL, NULL, NULL),
(554, 'add_lesson', 'Add Lesson', NULL, NULL, NULL, NULL),
(555, 'course_edit', 'Course Edit', NULL, NULL, NULL, NULL),
(556, 'curriculum', 'Curriculum', NULL, NULL, NULL, NULL),
(557, 'section_info', 'Section Information', NULL, NULL, NULL, NULL),
(558, 'section_name', 'Section Name', NULL, NULL, NULL, NULL),
(559, 'lesson_name', 'Lesson Name', NULL, NULL, NULL, NULL),
(560, 'lesson_info', 'Lesson Information', NULL, NULL, NULL, NULL),
(561, 'lesson_type', 'Lesson Type', NULL, NULL, NULL, NULL),
(562, 'youtube', 'Youtube', NULL, NULL, NULL, NULL),
(563, 'text_file', 'Text File', NULL, NULL, NULL, NULL),
(564, 'video', 'Video', NULL, NULL, NULL, NULL),
(565, 'lesson_provider', 'Lesson Provider', NULL, NULL, NULL, NULL),
(566, 'attachment', 'Attachment', NULL, NULL, NULL, NULL),
(567, 'vimeo', 'Vimeo', NULL, NULL, NULL, NULL),
(568, 'provider_url', 'Provider Url', NULL, NULL, NULL, NULL),
(569, 'duration', 'Duration', NULL, NULL, NULL, NULL),
(570, 'section_update', 'Section Update', NULL, NULL, NULL, NULL),
(571, 'lesson_update', 'Lesson Update', NULL, NULL, NULL, NULL),
(572, 'students', 'Students', NULL, NULL, NULL, NULL),
(573, 'add_student', 'Add Student', NULL, NULL, NULL, NULL),
(574, 'student_list', 'Student List', NULL, NULL, NULL, NULL),
(575, 'biography', 'Biography', NULL, NULL, NULL, NULL),
(576, 'credentials_info', 'Credentials Info', NULL, NULL, NULL, NULL),
(577, 'social_info', 'Social Info', NULL, NULL, NULL, NULL),
(578, 'payment_info', 'Payment Info', NULL, NULL, NULL, NULL),
(579, 'facebook', 'Facebook', NULL, NULL, NULL, NULL),
(580, 'twitter', 'Twitter', NULL, NULL, NULL, NULL),
(581, 'linkedin', 'Linkedin', NULL, NULL, NULL, NULL),
(582, 'instagram', 'Instagram', NULL, NULL, NULL, NULL),
(584, 'paypal', 'Paypal', NULL, NULL, NULL, NULL),
(585, 'simbcoin', 'Simbcoin', NULL, NULL, NULL, NULL),
(587, 'enrolled_course', 'Enrolled Course', NULL, NULL, NULL, NULL),
(588, 'edit_student', 'Edit Student', NULL, NULL, NULL, NULL),
(589, 'faculty', 'Faculty', NULL, NULL, NULL, NULL),
(590, 'add_faculty', 'Add Faculty', NULL, NULL, NULL, NULL),
(591, 'faculty_list', 'Faculty List', NULL, NULL, NULL, NULL),
(592, 'education', 'Education', NULL, NULL, NULL, NULL),
(593, 'work_experience', 'Work Experience', NULL, NULL, NULL, NULL),
(594, 'birthday', 'Birthday', NULL, NULL, NULL, NULL),
(595, 'web_site', 'Web Site', NULL, NULL, NULL, NULL),
(596, 'organization', 'Organization', NULL, NULL, NULL, NULL),
(597, 'skills', 'Skills', NULL, NULL, NULL, NULL),
(598, 'location', 'Location', NULL, NULL, NULL, NULL),
(599, 'degree_name', 'Degree Name', NULL, NULL, NULL, NULL),
(600, 'institute', 'Institute', NULL, NULL, NULL, NULL),
(601, 'passing_year', 'Passing Year', NULL, NULL, NULL, NULL),
(602, 'responsibility', 'Responsibility', NULL, NULL, NULL, NULL),
(603, 'total_faculty', 'Total Faculty', NULL, NULL, NULL, NULL),
(604, 'edit_faculty', 'Edit Faculty', NULL, NULL, NULL, NULL),
(605, 'question', 'Question', NULL, NULL, NULL, NULL),
(606, 'add_question', 'Add Question', NULL, NULL, NULL, NULL),
(607, 'question_list', 'Question List', NULL, NULL, NULL, NULL),
(608, 'answer_type', 'Answer Type', NULL, NULL, NULL, NULL),
(609, 'radio', 'Radio', NULL, NULL, NULL, NULL),
(610, 'checkbox', 'checkbox', NULL, NULL, NULL, NULL),
(611, 'text', 'Text', NULL, NULL, NULL, NULL),
(612, 'is_answer', 'Is Answer', NULL, NULL, NULL, NULL),
(613, 'exam', 'Exam', NULL, NULL, NULL, NULL),
(614, 'add_exam', 'Add Exam', NULL, NULL, NULL, NULL),
(615, 'exam_list', 'Exam List', NULL, NULL, NULL, NULL),
(616, 'exam_name', 'Exam Name', NULL, NULL, NULL, NULL),
(617, 'time_duration', 'Time Duration', NULL, NULL, NULL, NULL),
(618, 'choose_file', 'Choose a file', NULL, NULL, NULL, NULL),
(619, 'time', 'Time', NULL, NULL, NULL, NULL),
(620, 'total_question', 'Total Question', NULL, NULL, NULL, NULL),
(621, 'instruction', 'Instruction', NULL, NULL, NULL, NULL),
(622, 'exam_edit', 'Exam Edit', NULL, NULL, NULL, NULL),
(623, 'total_course', 'Total Course', NULL, NULL, NULL, NULL),
(624, 'get_more', 'Get More', NULL, NULL, NULL, NULL),
(625, 'total_exam', 'Total Exam', NULL, NULL, NULL, NULL),
(626, 'category_edit', 'Category Edit', NULL, NULL, NULL, NULL),
(627, 'settings', 'Settings', NULL, NULL, NULL, NULL),
(628, 'assign_user_role', 'Assign User Role', NULL, NULL, NULL, NULL),
(629, 'assign_user_role_list', 'Assign User Role List', NULL, NULL, NULL, NULL),
(630, 'add_language', 'Add Language', NULL, NULL, NULL, NULL),
(631, 'add_phrase', 'Add Phrase', NULL, NULL, NULL, NULL),
(632, 'language_name', 'Language Name', NULL, NULL, NULL, NULL),
(633, 'phrase', 'Phrase', NULL, NULL, NULL, NULL),
(634, 'english', 'English', NULL, NULL, NULL, NULL),
(635, 'already_exists', 'Already Exists', NULL, NULL, NULL, NULL),
(636, 'phrase_added_successfully', 'Phrase Added Successfully', NULL, NULL, NULL, NULL),
(637, 'this_field_must_be_required', 'This field must be required', NULL, NULL, NULL, NULL),
(638, 'language_added_successfully', 'Language Added Successfully', NULL, NULL, NULL, NULL),
(639, 'currency', 'Currency', NULL, NULL, NULL, NULL),
(640, 'invalid_favicon', 'Invalid Favicon', NULL, NULL, NULL, NULL),
(641, 'add_menu', 'Add Menu', NULL, NULL, NULL, NULL),
(642, 'menu_list', 'Menu List', NULL, NULL, NULL, NULL),
(643, 'user_info', 'User Info', NULL, NULL, NULL, NULL),
(644, 'menu_save_successfully', 'Menu Save Successfully', NULL, NULL, NULL, NULL),
(645, 'menu_info', 'Menu Information', NULL, NULL, NULL, NULL),
(646, 'menu_updated_successfully', 'Menu updated successfully', NULL, NULL, NULL, NULL),
(647, 'can_create', 'Can Create', NULL, NULL, NULL, NULL),
(648, 'can_read', 'Can Read', NULL, NULL, NULL, NULL),
(649, 'can_edit', 'Can Edit', NULL, NULL, NULL, NULL),
(650, 'can_delete', 'Can Delete', NULL, NULL, NULL, NULL),
(651, 'role_edit', 'Role Edit', NULL, NULL, NULL, NULL),
(652, 'record_not_found', 'Record not found', NULL, NULL, NULL, NULL),
(653, 'assigned_role', 'Assigned Role', NULL, NULL, NULL, NULL),
(654, 'not_found', 'Not Found', NULL, NULL, NULL, NULL),
(655, 'inactive_successfully', 'Inactive Successfully', NULL, NULL, NULL, NULL),
(656, 'active_successfully', 'Active Successfully', NULL, NULL, NULL, NULL),
(657, 'demo', '', NULL, NULL, NULL, NULL),
(658, 'mail_config', 'Mail Config', NULL, NULL, NULL, NULL),
(659, 'protocol', 'Protocol', NULL, NULL, NULL, NULL),
(660, 'smtp_host', 'SMTP Host', NULL, NULL, NULL, NULL),
(661, 'smtp_port', 'SMTP Port', NULL, NULL, NULL, NULL),
(662, 'sender_mail', 'Sender Mail', NULL, NULL, NULL, NULL),
(663, 'mail_type', 'Mail Type', NULL, NULL, NULL, NULL),
(664, 'customer_receive', 'Customer Receive', NULL, NULL, NULL, NULL),
(665, 'html', 'HTML', NULL, NULL, NULL, NULL),
(666, 'sms_config', 'SMS Config', NULL, NULL, NULL, NULL),
(667, 'provider_name', 'Provider Name', NULL, NULL, NULL, NULL),
(668, 'sender_name', 'Sender Name', NULL, NULL, NULL, NULL),
(669, 'paypal_config', 'Paypal Config', NULL, NULL, NULL, NULL),
(670, 'development', 'Development', NULL, NULL, NULL, NULL),
(671, 'production', 'Production', NULL, NULL, NULL, NULL),
(672, 'mode', 'Mode', NULL, NULL, NULL, NULL),
(673, 'payment_gateway', 'Payment Gateway', NULL, NULL, NULL, NULL),
(674, 'paypal_configuration', 'Paypal Configuration', NULL, NULL, NULL, NULL),
(675, 'course_details', 'Course Details', NULL, NULL, NULL, NULL),
(676, 'blog', 'Blog', NULL, NULL, NULL, NULL),
(677, 'blog_details', 'Blog Details', NULL, NULL, NULL, NULL),
(678, 'exam_course_details', 'Exam Course Details', NULL, NULL, NULL, NULL),
(679, 'faculty_info', 'Faculty Info', NULL, NULL, NULL, NULL),
(680, 'cart', 'Cart', NULL, NULL, NULL, NULL),
(681, 'checkout', 'Checkout', NULL, NULL, NULL, NULL),
(682, 'last_name', 'Last Name', NULL, NULL, NULL, NULL),
(683, 'first_name', 'First Name', NULL, NULL, NULL, NULL),
(684, 'preview', 'Preview', NULL, NULL, NULL, NULL),
(685, 'is_popular', 'Is Popular', NULL, NULL, NULL, NULL),
(686, 'category_save_successfully', 'Category save successfully', NULL, NULL, NULL, NULL),
(687, 'category_update_successfully', 'Category updated successfully', NULL, NULL, NULL, NULL),
(688, 'is_free_course', 'Is Free Course', NULL, NULL, NULL, NULL),
(689, 'section_added_successfully', 'Section added successfully', NULL, NULL, NULL, NULL),
(690, 'youtube_api_key', 'Youtube API Key', NULL, NULL, NULL, NULL),
(691, 'vimeo_api_key', 'Vimeo API Key', NULL, NULL, NULL, NULL),
(692, 'checking_url', 'Checking URL', NULL, NULL, NULL, NULL),
(693, 'invalid_url', 'Invalid URL', NULL, NULL, NULL, NULL),
(694, 'your_video_link_has_to_be_either_youtube_or_vimeo', 'Your video link has to be either youtube or vimeo', NULL, NULL, NULL, NULL),
(695, 'lesson_added_successfully', 'Lesson added successfully', NULL, NULL, NULL, NULL),
(696, 'section', 'Section', NULL, NULL, NULL, NULL),
(697, 'section_updated_successfully', 'Section updated successfully', NULL, NULL, NULL, NULL),
(698, 'lesson_updated_successfully', 'Lesson updated successfully', NULL, NULL, NULL, NULL),
(699, 'lesson', 'Lesson', NULL, NULL, NULL, NULL),
(700, 'course_curriculum', 'Course Curriculum', NULL, NULL, NULL, NULL),
(701, 'cart_added_successfully', 'Cart added successfully', NULL, NULL, NULL, NULL),
(702, 'cart_updated_successfully', 'Cart updated successfully', NULL, NULL, NULL, NULL),
(703, 'deleted_successfully', 'Deleted successfully', NULL, NULL, NULL, NULL),
(704, 'subtotal', 'Subtotal', NULL, NULL, NULL, NULL),
(705, 'grand_total', 'Grand Total', NULL, NULL, NULL, NULL),
(706, 'shipping', 'Shipping', NULL, NULL, NULL, NULL),
(707, 'tax', 'Tax', NULL, NULL, NULL, NULL),
(708, 'quantity', 'Quantity', NULL, NULL, NULL, NULL),
(709, 'go_to_cart', 'Go to cart', NULL, NULL, NULL, NULL),
(710, 'login_info', 'Login Info', NULL, NULL, NULL, NULL),
(711, 'sign_in_to_your_account', 'Sign in to your account', NULL, NULL, NULL, NULL),
(712, 'my_course', 'My Course', NULL, NULL, NULL, NULL),
(713, 'order_id', 'Order ID', NULL, NULL, NULL, NULL),
(714, 'total_amount', 'Total Amount', NULL, NULL, NULL, NULL),
(715, 'currency_position', 'Currency Position', NULL, NULL, NULL, NULL),
(716, 'enrolled', 'Enrolled', NULL, NULL, NULL, NULL),
(717, 'sessions', 'Sessions', NULL, NULL, NULL, NULL),
(718, 'lessons', 'Lessons', NULL, NULL, NULL, NULL),
(719, 'designation', 'Designation', NULL, NULL, NULL, NULL),
(720, 'subscriber_list', 'Subscriber List', NULL, NULL, NULL, NULL),
(721, 'is_receive', 'Is Receive', NULL, NULL, NULL, NULL),
(722, 'payment_type', 'Payment Type', NULL, NULL, NULL, NULL),
(723, 'rate', 'Rate', NULL, NULL, NULL, NULL),
(724, 'paid_amount', 'Paid Amount', NULL, NULL, NULL, NULL),
(725, 'due_amount', 'Due Amount', NULL, NULL, NULL, NULL),
(726, 'enroll_course', 'Enroll Course', NULL, NULL, NULL, NULL),
(727, 'is_preview', 'Is Preview', NULL, NULL, NULL, NULL),
(728, 'oldprice', 'Old Price', NULL, NULL, NULL, NULL),
(729, 'register', 'Register', NULL, NULL, NULL, NULL),
(730, 'create_an_account', 'Create an account', NULL, NULL, NULL, NULL),
(731, 'student', 'Student', NULL, NULL, NULL, NULL),
(732, 'mail_already_exists', 'Mail already exists', NULL, NULL, NULL, NULL),
(733, 'username_already_exists', 'Username already exists', NULL, NULL, NULL, NULL),
(734, 'registration_successfully', 'Registration successfully', NULL, NULL, NULL, NULL),
(735, 'about_us', 'About Us', NULL, NULL, NULL, NULL),
(736, 'privacy_policy', 'Privacy Policy', NULL, NULL, NULL, NULL),
(737, 'terms_condition', 'Terms & Conditions', NULL, NULL, NULL, NULL),
(738, 'model_test', 'Model Test', NULL, NULL, NULL, NULL),
(739, 'popular_course', 'Popular Course', NULL, NULL, NULL, NULL),
(740, 'free_course', 'Free Course', NULL, NULL, NULL, NULL),
(741, 'signup', 'Signup', NULL, NULL, NULL, NULL),
(742, 'sign_up', 'Sign Up', NULL, NULL, NULL, NULL),
(743, 'faculties', 'Faculties', NULL, NULL, NULL, NULL),
(744, 'team_of_members', 'Team of Members', NULL, NULL, NULL, NULL),
(745, 'list_of_faculties', 'List of Faculties', NULL, NULL, NULL, NULL),
(746, 'our_courses', 'Our Courses', NULL, NULL, NULL, NULL),
(747, 'popular_courses', 'Popular Courses', NULL, NULL, NULL, NULL),
(748, 'free_courses', 'Free Courses', NULL, NULL, NULL, NULL),
(749, 'get_update_exclusiv_offers', 'Get updates & exclusive offers', NULL, NULL, NULL, NULL),
(750, 'enter_email_here', 'Enter email here...', NULL, NULL, NULL, NULL),
(751, 'aboutus_form', 'Aboutus Form', NULL, NULL, NULL, NULL),
(752, 'companies', 'Companies logo', NULL, NULL, NULL, NULL),
(753, 'aboutus_updated_successfully', 'Aboutus updated successfully', NULL, NULL, NULL, NULL),
(754, 'company_added_successfully', 'Company added successfully', NULL, NULL, NULL, NULL),
(755, 'updated_successfully', 'Updated successfully', NULL, NULL, NULL, NULL),
(756, 'team_members', 'Team Members', NULL, NULL, NULL, NULL),
(757, 'teammember_added_successfully', 'Team member added successfully', NULL, NULL, NULL, NULL),
(758, 'member_name', 'Member Name', NULL, NULL, NULL, NULL),
(759, 'trusted_by_companies', 'Trusted by companies', NULL, NULL, NULL, NULL),
(760, 'by_subscribing_to_our_newsletter', 'By subscribing to our newsletter you agree to receive emails from us.', NULL, NULL, NULL, NULL),
(761, 'signup_to_be_the_first_to_hear', 'Signup to our newsletter to be the first hear about new openings, offers.', NULL, NULL, NULL, NULL),
(762, 'courses', 'Courses', NULL, NULL, NULL, NULL),
(763, 'our_popular', 'Our Popular', NULL, NULL, NULL, NULL),
(764, 'popular', 'Popular', NULL, NULL, NULL, NULL),
(765, 'register_now', 'Register Now', NULL, NULL, NULL, NULL),
(766, 'meet_the_faculties', 'Meet the faculties', NULL, NULL, NULL, NULL),
(767, 'your_review', 'Your Review', NULL, NULL, NULL, NULL),
(768, 'email_address', 'Email Address', NULL, NULL, NULL, NULL),
(769, 'your_name', 'Your Name', NULL, NULL, NULL, NULL),
(770, 'your_rating', 'Your Rating', NULL, NULL, NULL, NULL),
(771, 'get_your_review', 'Get Your Review', NULL, NULL, NULL, NULL),
(772, 'average_rating', 'Average Rating', NULL, NULL, NULL, NULL),
(773, 'student_feedback', 'Student feedback', NULL, NULL, NULL, NULL),
(774, 'ratings', 'Ratings', NULL, NULL, NULL, NULL),
(775, 'reviews', 'Reviews', NULL, NULL, NULL, NULL),
(776, 'rating_breakdown', 'Rating breakdown', NULL, NULL, NULL, NULL),
(777, 'created_by', 'Created by', NULL, NULL, NULL, NULL),
(778, 'last_updated', 'Last updated', NULL, NULL, NULL, NULL),
(779, 'add_to_cart', 'Add To Cart', NULL, NULL, NULL, NULL),
(780, 'enroll_now', 'Enroll Now', NULL, NULL, NULL, NULL),
(781, 'this_course_includes', 'This course includes', NULL, NULL, NULL, NULL),
(782, 'course_features', 'Course Features', NULL, NULL, NULL, NULL),
(783, 'duration', 'Duration', NULL, NULL, NULL, NULL),
(784, 'sliders', 'Sliders', NULL, NULL, NULL, NULL),
(785, 'sub_title', 'Sub Title', NULL, NULL, NULL, NULL),
(786, 'tags', 'Tags', NULL, NULL, NULL, NULL),
(787, 'apps_logo', 'Apps Logo', NULL, NULL, NULL, NULL),
(788, 'apps_url', 'Apps URL', NULL, NULL, NULL, NULL),
(789, 'related_course', 'Related Course', NULL, NULL, NULL, NULL),
(790, 'my_courses', 'My Courses', NULL, NULL, NULL, NULL),
(791, 'categories', 'Categories', NULL, NULL, NULL, NULL),
(793, 'add_event', 'Add Event', NULL, NULL, NULL, NULL),
(794, 'event_category', 'Event Category', NULL, NULL, NULL, NULL),
(795, 'add_event_category', 'Add Event Category', NULL, NULL, NULL, NULL),
(796, 'news', 'News', NULL, NULL, NULL, NULL),
(797, 'events', 'Events', NULL, NULL, NULL, NULL),
(798, 'event_list', 'Event List', NULL, NULL, NULL, NULL),
(799, 'is_front', 'Is Front', NULL, NULL, NULL, NULL),
(800, 'is_slide', 'Is Slide', NULL, NULL, NULL, NULL),
(801, 'event_details', 'Event Details', NULL, NULL, NULL, NULL),
(802, 'related_events', 'Related Events', NULL, NULL, NULL, NULL),
(803, 'comments', 'Comments', NULL, NULL, NULL, NULL),
(804, 'send', 'Send', NULL, NULL, NULL, NULL),
(805, 'commented_successfully', 'Commented Successfully', NULL, NULL, NULL, NULL),
(806, 'comment_list', 'Comment List', NULL, NULL, NULL, NULL),
(807, 'activated_successfully', 'Activated Successfully', NULL, NULL, NULL, NULL),
(808, 'inactivated_successfully', 'Inactivated Successfully', NULL, NULL, NULL, NULL),
(809, 'some_text', 'Some Text', NULL, NULL, NULL, NULL),
(810, 'please_write_your_comment', 'Please write your comment', NULL, NULL, NULL, NULL),
(811, 'post', 'Post', NULL, NULL, NULL, NULL),
(812, 'profiles', 'Profiles', NULL, NULL, NULL, NULL),
(813, 'your_profile', 'Your Profile', NULL, NULL, NULL, NULL),
(814, 'photo', 'Photo', NULL, NULL, NULL, NULL),
(815, 'change_password', 'Change Password', NULL, NULL, NULL, NULL),
(816, 'change_profile_picture', 'Change Profile Picture', NULL, NULL, NULL, NULL),
(817, 'current_password', 'Current Password', NULL, NULL, NULL, NULL),
(818, 'new_password', 'New Password', NULL, NULL, NULL, NULL),
(819, 'retype_password', 'Retype Password', NULL, NULL, NULL, NULL),
(820, 'current_password_does_not_match', 'Current password does not match', NULL, NULL, NULL, NULL),
(821, 'social_profiles', 'Social Profiles', NULL, NULL, NULL, NULL),
(822, 'members', 'Members', NULL, NULL, NULL, NULL),
(823, 'joined_in', 'Joined in', NULL, NULL, NULL, NULL),
(824, 'pro', 'Pro', NULL, NULL, NULL, NULL),
(825, 'web_page', 'Web page', NULL, NULL, NULL, NULL),
(826, 'phone_number', 'Phone number', NULL, NULL, NULL, NULL),
(827, 'back', 'Back', NULL, NULL, NULL, NULL),
(829, 'student_sales_course', 'Student sales course', NULL, NULL, NULL, NULL),
(830, 'faculty_sales_course', 'Faculty sales course', NULL, NULL, NULL, NULL),
(831, 'students_name', 'Student Name', NULL, NULL, NULL, NULL),
(832, 'faculty_name', 'Faculty Name', NULL, NULL, NULL, NULL),
(833, 'event_name', 'Event Name', NULL, NULL, NULL, NULL),
(834, 'subscribe', 'Subscribe', NULL, NULL, NULL, NULL),
(835, 'subscribed', 'Subscribed', NULL, NULL, NULL, NULL),
(836, 'mail_specialcharacter_remove', '!#$%^&*()_+[]{}?:;|\'`/><', NULL, NULL, NULL, NULL),
(837, 'confirm_password', 'Confirm Password', NULL, NULL, NULL, NULL),
(838, 'remember_me', 'Remember Me', NULL, NULL, NULL, NULL),
(839, 'forgot_password', 'Forgot Password', NULL, NULL, NULL, NULL),
(840, 'add_commission', 'Add Commission', NULL, NULL, NULL, NULL),
(841, 'commission_list', 'Commission List', NULL, NULL, NULL, NULL),
(842, 'generated_successfully', 'Generated Successfully', NULL, NULL, NULL, NULL),
(843, 'faculty_commission', 'Faculty Commission', NULL, NULL, NULL, NULL),
(844, 'comming_soon', 'Comming Soon', NULL, NULL, NULL, NULL),
(845, 'faculty_course_commission', 'Faculty Course Commission', NULL, NULL, NULL, NULL),
(846, 'faculty_revenue', 'Faculty Revenue', NULL, NULL, NULL, NULL),
(847, 'pay_with_paypal', 'Pay with paypal', NULL, NULL, NULL, NULL),
(848, 'faculty_course_revenue', 'Faculty course revenue', NULL, NULL, NULL, NULL),
(849, 'payment', 'Payment', NULL, NULL, NULL, NULL),
(850, 'pay_with_paypal', 'Pay with paypal', NULL, NULL, NULL, NULL),
(851, 'payment_amount', 'Payment Amount', NULL, NULL, NULL, NULL),
(852, 'paypal_account', 'Paypal Account', NULL, NULL, NULL, NULL),
(853, 'balance', 'Balance', NULL, NULL, NULL, NULL),
(854, 'admin_revenue', 'Admin Revenue', NULL, NULL, NULL, NULL),
(855, 'revenue', 'Revenue', NULL, NULL, NULL, NULL),
(856, 'commission_rate', 'Commission Rate', NULL, NULL, NULL, NULL),
(858, 'total_balance', 'Total Balance', NULL, NULL, NULL, NULL),
(859, 'total_event', 'Total Event', NULL, NULL, NULL, NULL),
(860, 'home', 'Home', NULL, NULL, NULL, NULL),
(861, 'course_benefit', 'Course Benefit', NULL, NULL, NULL, NULL),
(862, 'total_earning', 'Total Earning', NULL, NULL, NULL, NULL),
(863, 'pending_amount', 'Pending Amount', NULL, NULL, NULL, NULL),
(864, 'pay_now', 'Pay Now', NULL, NULL, NULL, NULL),
(865, 'payment_method', 'Payment Method', NULL, NULL, NULL, NULL),
(866, 'enter_phrase_name', 'Enter Phrase Name', NULL, NULL, NULL, NULL),
(867, 'what_you_are_going_to_learn', 'What you are going to learn', NULL, NULL, NULL, NULL),
(868, 'request_send_pls_waitfor_confirmation', 'Your registration request is send to admin please wait for conformation', NULL, NULL, NULL, NULL),
(869, 'timezone', 'Timezone', NULL, NULL, NULL, NULL),
(870, 'link', 'Link', NULL, NULL, NULL, NULL),
(871, 'payment_method_not_set_yet', 'Payment method not set yet', NULL, NULL, NULL, NULL),
(872, 'already_purchased', 'Already Purchased', NULL, NULL, NULL, NULL),
(873, 'purchased_course_list', 'Purchased course list', NULL, NULL, NULL, NULL),
(874, 'course_header_image', 'Course Header Image', NULL, NULL, NULL, NULL),
(875, 'faculty_header_image', 'Faculty Header Image', NULL, NULL, NULL, NULL),
(876, 'cart_header_image', 'Cart Header Image', NULL, NULL, NULL, NULL),
(877, 'checkout_header_image', 'Checkout Header Image', NULL, NULL, NULL, NULL),
(878, 'profile_header_image', 'Profile Header Image', NULL, NULL, NULL, NULL),
(880, 'ordering', 'Ordering', NULL, NULL, NULL, NULL),
(881, 'library', 'Library', NULL, NULL, NULL, NULL),
(882, 'bootstrap_icon', 'Bootstrap Icon', NULL, NULL, NULL, NULL),
(883, 'wishlist', 'Wishlist', NULL, NULL, NULL, NULL),
(884, 'wishes', 'Wishes', NULL, NULL, NULL, NULL),
(885, 'sales', 'Sales', NULL, NULL, NULL, NULL),
(886, 'free', 'Free', NULL, NULL, NULL, NULL),
(887, 'add_to_mycourse', 'Add to my course', NULL, NULL, NULL, NULL),
(888, 'added_to_my_course', 'Added to my course', NULL, NULL, NULL, NULL),
(889, 'verified', 'Verified', NULL, NULL, NULL, NULL),
(890, 'create_an_account', 'Create an account', NULL, NULL, NULL, NULL),
(891, 'postcode', 'Postcode', NULL, NULL, NULL, NULL),
(892, 'zip', 'Zip', NULL, NULL, NULL, NULL),
(894, 'country', 'Country', NULL, NULL, NULL, NULL),
(895, 'billing_info', 'Billing Information', NULL, NULL, NULL, NULL),
(896, 'revenue_report', 'Revenue Report', NULL, NULL, NULL, NULL),
(897, 'course_overview', 'Course Overview', NULL, NULL, NULL, NULL),
(898, 'faculty_unpaid_revenue', 'Faculty unpaid revenue', NULL, NULL, NULL, NULL),
(899, 'monthly_sales_amount', 'Monthly sales amount', NULL, NULL, NULL, NULL),
(900, 'due_payment', 'Due Payment', NULL, NULL, NULL, NULL),
(901, 'todays_sales_report', 'Todays sales report', NULL, NULL, NULL, NULL),
(903, 'sales_amount', 'Sales Amount', NULL, NULL, NULL, NULL),
(904, 'my_revenue', 'My Revenue', NULL, NULL, NULL, NULL),
(905, 'approve', 'Approve', NULL, NULL, NULL, NULL),
(906, 'disapprove', 'Disapprove', NULL, NULL, NULL, NULL),
(907, 'admin_commission', 'Admin Commission', NULL, NULL, NULL, NULL),
(908, 'please_wait_for_admin_approval', 'Please wait for admin approval', NULL, NULL, NULL, NULL),
(909, 'incorrect_email_or_password', 'Incorrect email or password', NULL, NULL, NULL, NULL),
(910, 'pusher_config', 'Pusher Config', NULL, NULL, NULL, NULL),
(911, 'api_id', 'API ID', NULL, NULL, NULL, NULL),
(912, 'api_key', 'API Key', NULL, NULL, NULL, NULL),
(913, 'secret_key', 'Secret Key', NULL, NULL, NULL, NULL),
(914, 'cluster', 'Cluster', NULL, NULL, NULL, NULL),
(915, 'pusher_configuration', 'Pusher Configuration', NULL, NULL, NULL, NULL),
(916, 'test', 'Test', NULL, NULL, NULL, NULL),
(917, 'phrase_name', 'Phrase Name', NULL, NULL, NULL, NULL),
(918, 'label', 'Label', NULL, NULL, NULL, NULL),
(919, 'coursespecial_character', '@$^*_[]{}`><', NULL, NULL, NULL, NULL),
(920, 'unpaid_revenue', 'Unpaid Revenue', NULL, NULL, NULL, NULL),
(922, 'check', '', NULL, NULL, NULL, NULL),
(924, 'demo_blog', '', NULL, NULL, NULL, NULL),
(925, 'close', 'Close', NULL, NULL, NULL, NULL),
(926, 'sms_configuration', 'SMS Configuration', NULL, NULL, NULL, NULL),
(927, 'mail_configuration', 'Mail Configuration', NULL, NULL, NULL, NULL),
(928, 'slider', 'Slider', NULL, NULL, NULL, NULL),
(929, 'next', 'Next', NULL, NULL, NULL, NULL),
(930, 'active', 'Active', NULL, NULL, NULL, NULL),
(931, 'inactive', 'Inactive', NULL, NULL, NULL, NULL),
(932, 'previous', 'Previous', NULL, NULL, NULL, NULL),
(933, 'counted_as', 'Counted as', NULL, NULL, NULL, NULL),
(934, 'items', 'Items', NULL, NULL, NULL, NULL),
(935, 'date_format', 'Date Format', NULL, NULL, NULL, NULL),
(936, 'powered_by_text', 'Powered by text', NULL, NULL, NULL, NULL),
(937, 'api_secret', 'API Secret', NULL, NULL, NULL, NULL),
(938, 'language_list', 'Language List', NULL, NULL, NULL, NULL),
(939, 'shopping_cart', 'Shopping Cart', NULL, NULL, NULL, NULL),
(940, 'proced_to_checkout', 'Proced to checkout', NULL, NULL, NULL, NULL),
(941, 'you_might_also_like', 'You might also like', NULL, NULL, NULL, NULL),
(942, 'cart_totals', 'Cart Totals', NULL, NULL, NULL, NULL),
(943, 'place_order', 'Place Order', NULL, NULL, NULL, NULL),
(944, 'sandbox', 'Sandbox', NULL, NULL, NULL, NULL);
INSERT INTO `language` (`id`, `phrase`, `english`, `bangla`, `arabic`, `urdhu`, `spanish`) VALUES
(945, 'hey', 'Hey', NULL, NULL, NULL, NULL),
(946, 'i_am', 'I am', NULL, NULL, NULL, NULL),
(947, 'what_do_you_want_to_learn', 'What do you want yo learn?', NULL, NULL, NULL, NULL),
(948, 'join_for_free', 'Join for Free', NULL, NULL, NULL, NULL),
(949, 'categories', 'Categories', NULL, NULL, NULL, NULL),
(950, 'backend_logo', 'Backend Logo', NULL, NULL, NULL, NULL),
(951, 'website_logo', 'Website Logo', NULL, NULL, NULL, NULL),
(952, 'sign_into_your_account', 'Sign into your account!', NULL, NULL, NULL, NULL),
(953, 'remember_password', 'Remember password', NULL, NULL, NULL, NULL),
(954, 'see_all', 'See All', NULL, NULL, NULL, NULL),
(955, 'left', 'Left', NULL, NULL, NULL, NULL),
(956, 'right', 'Right', NULL, NULL, NULL, NULL),
(957, 'currency_rate', 'Currency Rate', NULL, NULL, NULL, NULL),
(958, 'thememinister', 'Thememinister', NULL, NULL, NULL, NULL),
(959, 'designed_by', 'Designed By', NULL, NULL, NULL, NULL),
(960, 'your_order', 'Your Order', NULL, NULL, NULL, NULL),
(961, 'demo', '', NULL, NULL, NULL, NULL),
(962, 'course_info', 'Course Information', NULL, NULL, NULL, NULL),
(963, 'short_description', 'Short Description', NULL, NULL, NULL, NULL),
(964, 'source', 'Source', NULL, NULL, NULL, NULL),
(965, 'featured_image', 'Featured Image', NULL, NULL, NULL, NULL),
(966, 'what_you_will_learn', 'What you will learn', NULL, NULL, NULL, NULL),
(967, 'current_price', 'Current Price', NULL, NULL, NULL, NULL),
(968, 'current', 'Current', NULL, NULL, NULL, NULL),
(969, 'course_quiz', 'Course Quiz', NULL, NULL, NULL, NULL),
(970, 'resize', 'Resize', NULL, NULL, NULL, NULL),
(971, 'course_image_resize', 'Course Image Resize', NULL, NULL, NULL, NULL),
(972, 'image_height', 'Image Height', NULL, NULL, NULL, NULL),
(973, 'image_width', 'Image Width', NULL, NULL, NULL, NULL),
(974, 'meta_title', 'Meta Title', NULL, NULL, NULL, NULL),
(975, 'image_path', 'Image Path', NULL, NULL, NULL, NULL),
(976, 'quiz', 'Quiz', NULL, NULL, NULL, NULL),
(977, 'login_logo', 'Login Logo', NULL, NULL, NULL, NULL),
(978, 'quiz_test', 'Quiz Test', NULL, NULL, NULL, NULL),
(979, 'choose_your_course', 'Choose Your Course', NULL, NULL, NULL, NULL),
(980, 'show', 'Show', NULL, NULL, NULL, NULL),
(981, 'quiz_result', 'Quiz Result', NULL, NULL, NULL, NULL),
(982, 'choose_your_course_for_result', 'Choose your course for result', NULL, NULL, NULL, NULL),
(984, 'correct_ans', 'Correct Ans', NULL, NULL, NULL, NULL),
(985, 'wrong_ans', 'Wrong Ans', NULL, NULL, NULL, NULL),
(986, 'answer', 'Answer', NULL, NULL, NULL, NULL),
(987, 'owner_name', 'Owner', NULL, NULL, NULL, NULL),
(988, 'currencyname', 'Currency Name', NULL, NULL, NULL, NULL),
(989, 'currency_icon', 'Currency Icon', NULL, NULL, NULL, NULL),
(990, 'currency_added_successfully', 'Currency added successfully', NULL, NULL, NULL, NULL),
(991, 'currency_info', 'Currency Information', NULL, NULL, NULL, NULL),
(992, 'currency_update_successfully', 'Currency updated successfully', NULL, NULL, NULL, NULL),
(993, 'currency_deleted_successfully', 'Currency deleted successfully', NULL, NULL, NULL, NULL),
(994, 'stripe_config', 'Stripe Config', NULL, NULL, NULL, NULL),
(995, 'payeer_config', 'Payeer Config', NULL, NULL, NULL, NULL),
(996, 'payu_config', 'PayU Config', NULL, NULL, NULL, NULL),
(997, 'payeer_configuration', 'Payeer Configuration', NULL, NULL, NULL, NULL),
(998, 'payment_method_name', 'Payment Method Name', NULL, NULL, NULL, NULL),
(999, 'marchant_id', 'Marchant ID', NULL, NULL, NULL, NULL),
(1000, 'is_live', 'Is Live', NULL, NULL, NULL, NULL),
(1001, 'live', 'Live', NULL, NULL, NULL, NULL),
(1002, 'test', 'Test', NULL, NULL, NULL, NULL),
(1003, 'payu_configuration', 'Payu Configuration', NULL, NULL, NULL, NULL),
(1004, 'stripe_configuration', 'Stripe Configuration', NULL, NULL, NULL, NULL),
(1005, 'payeer_payment', 'Payeer Payment', NULL, NULL, NULL, NULL),
(1006, 'customer_id', 'Customer ID', NULL, NULL, NULL, NULL),
(1007, 'order_no', 'Order No', NULL, NULL, NULL, NULL),
(1008, 'cancel', 'Cancel', NULL, NULL, NULL, NULL),
(1009, 'payment_method_list', 'Payment Method List', NULL, NULL, NULL, NULL),
(1010, 'payment_method_list', 'No course available here', NULL, NULL, NULL, NULL),
(1011, 'service', 'Services', NULL, NULL, NULL, NULL),
(1012, 'add_service', 'Add Service', NULL, NULL, NULL, NULL),
(1013, 'our_service', 'OUR SERVICES', NULL, NULL, NULL, NULL),
(1014, 'button_level', 'Button Level', NULL, NULL, NULL, NULL),
(1015, 'service_list', 'Service List', NULL, NULL, NULL, NULL),
(1016, 'slider_backend_image', 'Slider Backend Image', NULL, NULL, NULL, NULL),
(1018, 'head', 'Head', NULL, NULL, NULL, NULL),
(1019, 'service_edit', 'Service Edit', NULL, NULL, NULL, NULL),
(1020, 'service_comments', 'The Best Counseling from the Best Psychologists', NULL, NULL, NULL, NULL),
(1021, 'portfolio', 'Portfolio', NULL, NULL, NULL, NULL),
(1022, 'whats_new', 'WHAT\'S NEW', NULL, NULL, NULL, NULL),
(1024, 'testimonials', 'Testimonials', NULL, NULL, NULL, NULL),
(1025, 'add_portfolio', 'Add Portfolio', NULL, NULL, NULL, NULL),
(1026, 'portfolio_list', 'Portfolio List', NULL, NULL, NULL, NULL),
(1027, 'add_testimonials', 'Add Testimonials', NULL, NULL, NULL, NULL),
(1028, 'testimonials_list', 'Testimonials List', NULL, NULL, NULL, NULL),
(1029, 'add_article', 'Add Article', NULL, NULL, NULL, NULL),
(1031, 'event_edit', 'Event Update', NULL, NULL, NULL, NULL),
(1032, 'portfolio_update', 'Portfolio Update', NULL, NULL, NULL, NULL),
(1033, 'service_update', 'Service Update', NULL, NULL, NULL, NULL),
(1034, 'our_portfolio', 'OUR PORTFOLIO', NULL, NULL, NULL, NULL),
(1035, 'portfolio_dialog', 'Our Projects Make<br> Uniqueness<br> From Others', NULL, NULL, NULL, NULL),
(1036, 'testimonial_backend_image', 'Testimonial Backend Image', NULL, NULL, NULL, NULL),
(1037, 'about_us_detail', 'Why I say old chap that is spiffing off his nut arse pear shaped plastered    Jeffrey bodge barney some dodgy.!!', NULL, NULL, NULL, NULL),
(1038, 'about_testimonial_title', 'We build digital brands and experiences', NULL, NULL, NULL, NULL),
(1039, 'meet_team', 'Meet Our Professional Team', NULL, NULL, NULL, NULL),
(1040, 'about_team_title', 'Meet our professional team members', NULL, NULL, NULL, NULL),
(1044, 'knowledge', 'Knowledge', NULL, NULL, NULL, NULL),
(1046, 'add_knowledge', 'Add Knowledge', NULL, NULL, NULL, NULL),
(1047, 'knowledge_list', 'Knowledge List', NULL, NULL, NULL, NULL),
(1048, 'started_at', 'Started At', NULL, NULL, NULL, NULL),
(1049, 'Experience', 'Experience', NULL, NULL, NULL, NULL),
(1050, 'add_experience', 'Add Experience', NULL, NULL, NULL, NULL),
(1051, 'experience_list', 'Experience List', NULL, NULL, NULL, NULL),
(1052, 'case_studies', 'Case Studies', NULL, NULL, NULL, NULL),
(1053, 'case_studie_dialog', 'Why I say old chap that is spiffing off his nut arse pear shaped plastered\r\nJeffrey bodge barney some dodgy.!!', NULL, NULL, NULL, NULL),
(1054, 'add_case_studie', 'Add Case Studie', NULL, NULL, NULL, NULL),
(1055, 'case_studie_list', 'Case Studie List', NULL, NULL, NULL, NULL),
(1056, 'add_case_studies', 'Add Case Studies', NULL, NULL, NULL, NULL),
(1057, 'case_studie_list', 'Case Studies List', NULL, NULL, NULL, NULL),
(1058, 'author', 'Author', NULL, NULL, NULL, NULL),
(1060, 'author_list', 'Author List', NULL, NULL, NULL, NULL),
(1061, 'add_author', 'Add Author', NULL, NULL, NULL, NULL),
(1062, 'chrislan_meneng', 'Chrislan Meneng’s', NULL, NULL, NULL, NULL),
(1063, 'position', 'position', NULL, NULL, NULL, NULL),
(1064, 'about_store', 'ABOUT OUR STORE ', NULL, NULL, NULL, NULL),
(1065, 'case_studie', 'Case Studie', NULL, NULL, NULL, NULL),
(1066, 'add_case_studie', 'Add Case Studie', NULL, NULL, NULL, NULL),
(1067, 'case_studie_list', 'Case Studie List', NULL, NULL, NULL, NULL),
(1068, 'add_about', 'Add About', NULL, NULL, NULL, NULL),
(1069, 'about_list', 'About List', NULL, NULL, NULL, NULL),
(1070, 'about', 'About Us', NULL, NULL, NULL, NULL),
(1071, 'knowledge_list', 'Knowledge List', NULL, NULL, NULL, NULL),
(1072, 'add_knowledge', 'Add Knowledge', NULL, NULL, NULL, NULL),
(1073, 'knowledge', 'Knowledge', NULL, NULL, NULL, NULL),
(1074, 'knowledge_update', 'Knowledge Update', NULL, NULL, NULL, NULL),
(1075, 'top_content_back_img', 'Top content Back img', NULL, NULL, NULL, NULL),
(1076, 'list', 'List', NULL, NULL, NULL, NULL),
(1077, 'blog_list', 'Blog List', NULL, NULL, NULL, NULL),
(1078, 'add_blog', 'Add Blog', NULL, NULL, NULL, NULL),
(1079, 'blog', 'Blog', NULL, NULL, NULL, NULL),
(1080, 'update_blog', 'Update Blog', NULL, NULL, NULL, NULL),
(1081, 'recent_posts', 'Recent posts', NULL, NULL, NULL, NULL),
(1082, 'categories', 'Categories', NULL, NULL, NULL, NULL),
(1083, 'blog-detail', 'Blog Detail', NULL, NULL, NULL, NULL),
(1084, 'media_info', 'Media', NULL, NULL, NULL, NULL),
(1085, 'add_media', 'Add Media', NULL, NULL, NULL, NULL),
(1086, 'media_list', 'Media List', NULL, NULL, NULL, NULL),
(1087, 'choose_file', 'Choose a file...', NULL, NULL, NULL, NULL),
(1088, 'link', 'Link', NULL, NULL, NULL, NULL),
(1089, 'media_type', 'Media Type', NULL, NULL, NULL, NULL),
(1090, 'dialog_testimonial', 'Don’t take our word for it', NULL, NULL, NULL, NULL),
(1091, 'testimonial', 'TESTIMONIALS', NULL, NULL, NULL, NULL),
(1092, 'testimonial_list', 'Testimonial List', NULL, NULL, NULL, NULL),
(1093, 'add_testimonial', 'Add Testimonial', NULL, NULL, NULL, NULL),
(1094, 'save_successfully', 'Data save successfully', NULL, NULL, NULL, NULL),
(1095, 'update_testimonial', 'Update Testimonial', NULL, NULL, NULL, NULL),
(1096, 'add_new', 'Add New', NULL, NULL, NULL, NULL),
(1097, 'tv_coverage', 'Tv Coverage', NULL, NULL, NULL, NULL),
(1098, 'digital_media', 'Digital Media', NULL, NULL, NULL, NULL),
(1099, 'print_media', 'Print Media & Social Mention', NULL, NULL, NULL, NULL),
(1100, 'press_realese', 'Press Realese', NULL, NULL, NULL, NULL),
(1101, 'production_list', 'Production List', NULL, NULL, NULL, NULL),
(1102, 'add_production', 'Add Production', NULL, NULL, NULL, NULL),
(1103, 'production_type', 'Production Type', NULL, NULL, NULL, NULL),
(1104, 'section_type', 'Section Type', NULL, NULL, NULL, NULL),
(1105, 'branding_list', 'Branding List', NULL, NULL, NULL, NULL),
(1106, 'add_branding', 'Add Branding', NULL, NULL, NULL, NULL),
(1107, 'branding_type', 'Brand Type', NULL, NULL, NULL, NULL),
(1108, 'title_two', 'Title Two', NULL, NULL, NULL, NULL),
(1109, 'offering', 'What we are offering to <br> customers', NULL, NULL, NULL, NULL),
(1110, 'agency', 'ABOUT THE AGENCY', NULL, NULL, NULL, NULL),
(1112, 'bottom', 'Bottom Pages', NULL, NULL, NULL, NULL),
(1114, 'event_date', 'Event Date', NULL, NULL, NULL, NULL),
(1115, 'event_category', 'Event Category', NULL, NULL, NULL, NULL),
(1116, 'event_organizer', 'Event Organizer', NULL, NULL, NULL, NULL),
(1117, 'event_venue', 'Event Venue', NULL, NULL, NULL, NULL),
(1118, 'enter_event_date', 'Enter event date', NULL, NULL, NULL, NULL),
(1119, 'enter_event_category', 'Enter event category', NULL, NULL, NULL, NULL),
(1120, 'enter_event_organizer', 'Enter event organizer', NULL, NULL, NULL, NULL),
(1121, 'enter_event_venue', 'Enter event venue', NULL, NULL, NULL, NULL),
(1122, 'enter_event_venue', 'Enter event venue', NULL, NULL, NULL, NULL),
(1123, 'event_info', 'Event Information', NULL, NULL, NULL, NULL),
(1125, 'sr_engineer', 'Sr. Engineer', NULL, NULL, NULL, NULL),
(1126, 'jr_engineer', 'Jr. Engineer', NULL, NULL, NULL, NULL),
(1127, 'organization', 'Organization', NULL, NULL, NULL, NULL),
(1128, 'company', 'Company', NULL, NULL, NULL, NULL),
(1129, 'investment_backend_image', 'Investment Backend Image', NULL, NULL, NULL, NULL),
(1130, 'articals_and_event', 'Articals & News', NULL, NULL, NULL, NULL),
(1131, 'application_title', '	\r\nApplication Title', NULL, NULL, NULL, NULL),
(1132, 'investment_list', 'Investment List', NULL, NULL, NULL, NULL),
(1133, 'coaching_list', 'Coaching List', NULL, NULL, NULL, NULL),
(1134, 'sales_marketing_list', 'Sales Marketing List', NULL, NULL, NULL, NULL),
(1135, 'add_investment', 'Add Investment', 'a', NULL, NULL, NULL),
(1136, 'add_coaching', 'Add Coaching', NULL, NULL, NULL, NULL),
(1137, 'add_sales_marketing', 'Add Sales & Marketing', NULL, NULL, NULL, NULL),
(1138, 'top_content_backend_image', 'Top Content Backend Image', NULL, NULL, NULL, NULL),
(1139, 'client', 'Client', NULL, NULL, NULL, NULL),
(1140, 'deliverable', 'Deliverable', NULL, NULL, NULL, NULL),
(1141, 'industry', 'Industry', NULL, NULL, NULL, NULL),
(1142, 'message_one_title', 'Message Title One', NULL, NULL, NULL, NULL),
(1143, 'message_one', 'Message One', NULL, NULL, NULL, NULL),
(1144, 'message_two_title', 'Message Title Two', NULL, NULL, NULL, NULL),
(1145, 'message_two', 'Message Two', NULL, NULL, NULL, NULL),
(1146, 'case_studie_update', 'Update Case Studie', NULL, NULL, NULL, NULL),
(1147, 'case_details', 'Case Detail', NULL, NULL, NULL, NULL),
(1148, 'case_studies', 'Case Studies', NULL, NULL, NULL, NULL),
(1149, 'clicnt', 'Clicnt', NULL, NULL, NULL, NULL),
(1150, 'deliverable', 'Deliverable', NULL, NULL, NULL, NULL),
(1151, 'industry', 'Industry', NULL, NULL, NULL, NULL),
(1152, 'picture_two', 'Picture Two', NULL, NULL, NULL, NULL),
(1153, 'We_only_chose_the_best', 'We only chose the best one for you', NULL, NULL, NULL, NULL),
(1154, 'Our_Recent_Work', 'Our Recent Work', NULL, NULL, NULL, NULL),
(1155, 'Take_look_our_recent_work', 'Take a look at our recent work', NULL, NULL, NULL, NULL),
(1156, 'comment', 'Comment', NULL, NULL, NULL, NULL),
(1157, 'welcome_to_envolve', 'Welcome to envolve', NULL, NULL, NULL, NULL),
(1158, 'description', 'Description', NULL, NULL, NULL, NULL),
(1159, 'founder_info', 'Founder Information', NULL, NULL, NULL, NULL),
(1160, 'autobiography', 'AUTOBIOGRAPHY', NULL, NULL, NULL, NULL),
(1161, 'description_two', 'Second Description', NULL, NULL, NULL, NULL),
(1162, 'latest_videos', 'LATEST VIDEOS', NULL, NULL, NULL, NULL),
(1163, 'initial_idea', 'Initial Idea', NULL, NULL, NULL, NULL),
(1164, 'planning', 'Planning', NULL, NULL, NULL, NULL),
(1165, 'announce', 'Announce', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ledger_tbl`
--

CREATE TABLE `ledger_tbl` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ledger_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_category` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '3 = faculty and 4 student',
  `invoice_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receipt_no` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `payment_type` int(11) NOT NULL COMMENT '1=paypal',
  `amount` decimal(10,2) NOT NULL,
  `date` date NOT NULL,
  `d_c` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lesson_tbl`
--

CREATE TABLE `lesson_tbl` (
  `id` int(11) NOT NULL,
  `lesson_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lesson_name` text COLLATE utf8_unicode_ci NOT NULL,
  `section_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `lesson_type` int(11) NOT NULL COMMENT '1=video, 2=text file and 3 = picture',
  `lesson_provider` int(11) DEFAULT NULL COMMENT '1=youtube and 2=viemo',
  `provider_url` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `summary` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_preview` int(11) DEFAULT 0 COMMENT '0=no and 1= yes',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loginfo_tbl`
--

CREATE TABLE `loginfo_tbl` (
  `id` int(11) NOT NULL,
  `log_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_types` varchar(10) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=admin, 2=user, 3=faculty and 4=student',
  `is_admin` int(3) NOT NULL,
  `random_key` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_logout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ip_address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0=inactive and 1 = active',
  `created_by` int(11) DEFAULT NULL,
  `created_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loginfo_tbl`
--

INSERT INTO `loginfo_tbl` (`id`, `log_id`, `name`, `mobile`, `email`, `username`, `password`, `user_types`, `is_admin`, `random_key`, `last_login`, `last_logout`, `ip_address`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
(98, 'F211LO1YH', 'Lorem', '978465987645', 'lorem@email.com', 'lorem@email.com', 'e10adc3949ba59abbe56e057f20f883e', '3', 3, NULL, '', '', '', 1, 1, '2020-06-21 17:03:12', NULL, ''),
(99, 'F21F6DBPW', 'Ipsom', '897465132', 'ipsom@email.com', 'ipsom@email.com', 'e10adc3949ba59abbe56e057f20f883e', '3', 3, NULL, '', '', '', 1, 1, '2020-06-21 17:41:51', NULL, ''),
(100, '1', 'Admin', '0000', 'demo', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', '1', 1, NULL, '2021-08-09 21:41:27', '2021-08-03 12:30:44', '127.0.0.1', 1, 1, '', 1, ''),
(101, 'U03LZEBT', 'Md. Omar Faruk', '', 'farukmscse@gmail.com', 'farukmscse@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', 2, NULL, '', '', '', 1, 1, '2021-07-03 20:09:45', NULL, ''),
(102, 'ST16H586GO', 'Phillip Anthropy', '789789', 'admin@example.com', 'admin@example.com', 'd516b13671a4179d9b7b458a6ebdeb92', '4', 4, NULL, '', '', '', 1, 1, '2021-07-16 18:34:17', NULL, ''),
(103, 'U03XBMDQ', 'chrislan  lan', '', 'admin@example.com', 'admin@example.com', 'e10adc3949ba59abbe56e057f20f883e', '2', 2, NULL, '', '', '', 1, 1, '2021-08-03 12:02:18', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `mail_config_tbl`
--

CREATE TABLE `mail_config_tbl` (
  `id` int(11) NOT NULL,
  `protocol` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_host` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_port` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `smtp_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mailtype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `is_invoice` int(1) NOT NULL,
  `is_purchase` int(1) NOT NULL,
  `is_receive` int(1) NOT NULL,
  `is_payment` int(1) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mail_config_tbl`
--

INSERT INTO `mail_config_tbl` (`id`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`, `mailtype`, `is_invoice`, `is_purchase`, `is_receive`, `is_payment`, `updated_by`, `updated_date`, `status`) VALUES
(1, 'smtp', 'ssl://smtp.gmail.com', '465', 'd', 'd', 'html', 1, 0, 0, 0, 1, '2019-07-08 10:50:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `media_tbl`
--

CREATE TABLE `media_tbl` (
  `id` int(11) NOT NULL,
  `media_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `media_type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `media_tbl`
--

INSERT INTO `media_tbl` (`id`, `media_id`, `media_type`, `title`, `description`, `link`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ST26D84WC1', 'event', 'EVENT HIGHLIGHTS', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo. Donec sed odio dui. Cum sociis natoque penatibus et magnis dis autar parturient montes, nascetur ridiculus mus quam adispicing Ava’s been training hard for an awesome athletics season, and is looking forward to celebrating her 12th birthday.</p>\r\n', '', 1, '1', '2021-07-26 12:36:56', '', NULL),
(2, 'ST2641YPPI', 'tv_coverage', 'Our techinical expertise across the market', '', 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 1, '1', '2021-07-26 12:40:07', '1', '2021-07-26 12:40:07'),
(3, 'ST26B5DNHP', 'tv_coverage', 'Our techinical expertise across the market', '', 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 1, '1', '2021-07-26 12:46:38', '', NULL),
(4, 'ST26S638R5', 'digital_media', 'Now to Next with Chrislan in Feat Rebecca ', '<p>Now to Next with Chrislan in Feat Rebecca</p>\r\n', '', 1, '1', '2021-07-26 12:48:24', '', NULL),
(5, 'ST26BZCXKT', 'digital_media', 'Now to Next with Chrislan in Feat Rebecca ', '<p>Now to Next with Chrislan in Feat Rebecca</p>\r\n', '', 1, '1', '2021-07-26 12:48:51', '', NULL),
(6, 'ST26SHIJ6S', 'digital_media', 'Now to Next with Chrislan in Feat Rebecca ', '<p>Now to Next with Chrislan in Feat Rebecca</p>\r\n', '', 1, '1', '2021-07-26 12:49:03', '', NULL),
(7, 'ST26F1H6VZ', 'print_media', 'One', '', '', 1, '1', '2021-07-26 12:50:05', '', NULL),
(8, 'ST26CU2NYX', 'print_media', 'Two', '', '', 1, '1', '2021-07-26 12:50:19', '', NULL),
(9, 'ST26N4PTKJ', 'print_media', 'Three', '', '', 1, '1', '2021-07-26 12:50:30', '', NULL),
(10, 'ST26A2VJZ2', 'print_media', 'Four', '', '', 1, '1', '2021-07-26 12:50:50', '', NULL),
(11, 'ST26I6I8LU', 'print_media', 'Five', '', '', 1, '1', '2021-07-26 12:50:59', '', NULL),
(12, 'ST26IV4CVR', 'print_media', 'Six', '', '', 1, '1', '2021-07-26 12:51:11', '', NULL),
(13, 'ST26SVTEIW', 'print_media', 'Seven', '', '', 1, '1', '2021-07-26 12:51:21', '', NULL),
(14, 'ST26XFCA1I', 'press_realese', 'NATIONAL OPIOID CRISIS EXPERT, DYNAMIC SPEAKER AND AUTHOR, DR. JOHN ROSA PRESENTS STATISTICS THAT SHOW THE MENTAL HEALTH OF THE NATION IS DECLINING.', '<p>Dr. John P. Rosa, opioid crisis expert, author and dynamic speaker writes about the dramatic and consistent rise in deaths of despair through every age group and calls for urgently needed attention to address the issues that give rise to despair. ROCKVILLE, MD. May 27, 2021: Dr. John Rosa, dynamic […]</p>\r\n', '', 1, '1', '2021-07-26 12:52:26', '', NULL),
(15, 'ST26WQDQP3', 'press_realese', 'NATIONAL OPIOID CRISIS EXPERT, DYNAMIC SPEAKER AND AUTHOR, DR. JOHN ROSA PRESENTS STATISTICS THAT SHOW THE MENTAL HEALTH OF THE NATION IS DECLINING.', '<p>Dr. John P. Rosa, opioid crisis expert, author and dynamic speaker writes about the dramatic and consistent rise in deaths of despair through every age group and calls for urgently needed attention to address the issues that give rise to despair. ROCKVILLE, MD. May 27, 2021: Dr. John Rosa, dynamic […]</p>\r\n', '', 1, '1', '2021-07-26 12:52:47', '', NULL),
(16, 'ST26GLJATY', 'tv_coverage', 'Our techinical expertise across the market', '', 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 1, '1', '2021-07-26 13:53:32', '', NULL),
(17, 'ST266OVTWC', 'tv_coverage', 'Our techinical expertise across the market', '', 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 1, '1', '2021-07-26 13:54:38', '', NULL),
(18, 'ST26YSDG1S', 'digital_media', 'Now to Next with Chrislan in Feat Rebecca ', '<p>Now to Next with Chrislan in Feat Rebecca</p>\r\n', '', 1, '1', '2021-07-26 14:02:17', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `datetime` datetime NOT NULL,
  `sender_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete',
  `receiver_status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=unseen, 1=seen, 2=delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

CREATE TABLE `module_permission` (
  `id` int(11) NOT NULL,
  `fk_module_id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `create` tinyint(1) DEFAULT NULL,
  `read` tinyint(1) DEFAULT NULL,
  `update` tinyint(1) DEFAULT NULL,
  `delete` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payeer_config`
--

CREATE TABLE `payeer_config` (
  `id` int(11) NOT NULL,
  `payment_method_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marchant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_live` int(11) NOT NULL COMMENT '1=live and 0= test',
  `status` int(11) NOT NULL COMMENT '1=active and 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payeer_config`
--

INSERT INTO `payeer_config` (`id`, `payment_method_name`, `marchant_id`, `password`, `email`, `currency`, `is_live`, `status`) VALUES
(1, 'Payeer', '1071812333', '1071812333secretkey', 'test@gmail.com', 'USD', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_tbl`
--

CREATE TABLE `payment_method_tbl` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payment_method_tbl`
--

INSERT INTO `payment_method_tbl` (`id`, `title`, `value`, `created_by`, `created_at`, `status`) VALUES
(2, 'Paypal', 2, '1', '2020-04-20 00:08:23', 1),
(3, 'PAYEER', 3, '1', '2020-04-20 00:08:27', 1),
(5, 'Stripe', 5, '1', '2020-04-20 00:08:33', 1),
(6, 'PayU', 6, '1', '2020-04-20 00:08:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `payu_config`
--

CREATE TABLE `payu_config` (
  `id` int(11) NOT NULL,
  `payment_method_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marchant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_live` int(11) NOT NULL COMMENT '1=live and 0= test',
  `status` int(11) NOT NULL COMMENT '1=active and 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payu_config`
--

INSERT INTO `payu_config` (`id`, `payment_method_name`, `marchant_id`, `password`, `email`, `currency`, `is_live`, `status`) VALUES
(1, 'PayU', 'gtKFFx', 'eCwWELxi', 'test@gmail.com', 'USD', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `picture_tbl`
--

CREATE TABLE `picture_tbl` (
  `id` int(11) NOT NULL,
  `from_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `picture_type` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `picture_tbl`
--

INSERT INTO `picture_tbl` (`id`, `from_id`, `picture`, `picture_type`, `created_by`, `created_date`, `updated_by`, `updated_date`, `status`) VALUES
(1, 'ED09F2XWC2', 'assets/uploads/event/16284992021.jpg', 'event_detail', '1', '2021-08-09 08:53:22', '', NULL, 1),
(2, 'ED09J2Q4WN', 'assets/uploads/event/16284992024.jpg', 'event_detail', '1', '2021-08-09 08:53:22', '', NULL, 1),
(3, 'EV094FUHN4', 'assets/uploads/event/2021-08-09/1755e030751466a4fd195534d3e9497b.jpg', 'event', '1', '2021-08-09 08:53:22', '', NULL, 1),
(4, 'ST099VCR9F', 'assets/uploads/authors/2021-08-09/c54144f7bea752be80caebdc09fac2b1.jpg', 'author', '1', '2021-08-09 09:39:01', '', NULL, 1),
(5, 'ST09WGB9D9', 'assets/uploads/authors/2021-08-09/ab4424c6ca85d30a65b2a2904be55eca.jpg', 'author', '1', '2021-08-09 10:03:33', '', NULL, 1),
(6, 'ST0936VVYI', 'assets/uploads/authors/2021-08-09/0cf9ce3e06bfafc688139cebc27a0ae4.jpg', 'author', '1', '2021-08-09 10:03:53', '', NULL, 1),
(7, 'ST09XJ47BG', 'assets/uploads/authors/2021-08-09/9aa24503f353f9102fdef69658b1129a.jpg', 'author', '1', '2021-08-09 10:04:00', '', NULL, 1),
(8, 'ST09BZLNGP', 'assets/uploads/authors/2021-08-09/579f0cdbd3f5776f98528c1b9babbfc1.png', 'author', '1', '2021-08-09 11:24:47', '1', '2021-08-09 11:24:47', 1),
(9, 'ST0941CPCB', 'assets/uploads/authors/2021-08-09/e9f9e1b7098d59653cc93d74ec9442c6.png', 'author', '1', '2021-08-09 11:30:47', '', NULL, 1),
(10, 'ST091V7HW1', 'assets/uploads/authors/2021-08-09/1b93addeef20e70131455dc6b39ac4a0.png', 'author', '1', '2021-08-09 13:07:11', '', NULL, 1),
(11, 'ST09W8GUYB', 'assets/uploads/authors/2021-08-09/c7964550e42cc57c4e8466ef389a6c91.jpg', 'author', '1', '2021-08-09 13:16:07', '', NULL, 1),
(12, 'ST09ECHD3Y', 'assets/uploads/authors/2021-08-09/f785973481146404876518241f743a8a.jpg', 'author', '1', '2021-08-09 13:18:02', '', NULL, 1),
(13, 'ST09B2JKX9', 'assets/uploads/authors/2021-08-09/f898aaee2b3cbe521a4b4be7ad8644be.jpg', 'author', '1', '2021-08-09 13:55:40', '', NULL, 1),
(14, 'ST125G1DAU', 'assets/uploads/authors/2021-08-09/c31fccce6c98c5c0d53293ad9e9a7227.jpg', 'authors', '1', '2021-08-09 14:05:40', '', NULL, 1),
(15, 'ST12LMHI1V', 'assets/uploads/authors/2021-08-09/1f7aaf3bd9d88b4da68dc0a7ea9a1538.png', 'authors', '1', '2021-08-09 14:06:16', '', NULL, 1),
(16, 'TE29GNDVE2', 'assets/uploads/brandings/2021-08-09/638822214dfa8f6d260f27cf22583d32.png', 'branding', '1', '2021-08-09 15:31:01', '1', '2021-08-09 15:31:01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_tbl`
--

CREATE TABLE `portfolio_tbl` (
  `id` int(11) NOT NULL,
  `portfolio_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `portfolio_tbl`
--

INSERT INTO `portfolio_tbl` (`id`, `portfolio_id`, `title`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, '6fghg', 'two', 1, '1', '2021-07-15 09:24:51', '1', '2021-07-15 09:24:51'),
(2, 'ST08MA8XH3', 'One', 1, '1', '2021-07-15 09:24:35', '1', '2021-07-15 09:24:35'),
(4, 'ST15377M5I', 'Three', 1, '1', '2021-07-15 09:25:02', '', NULL),
(5, 'ST15ADVFOC', 'Four', 1, '1', '2021-07-15 09:25:11', '', NULL),
(6, 'ST15D8D76Y', 'Five', 1, '1', '2021-07-15 09:25:17', '', NULL),
(7, 'ST15EDEEMA', 'Six', 1, '1', '2021-07-15 09:25:25', '', NULL),
(8, 'ST15TQR2GF', 'Seven', 1, '1', '2021-07-15 09:25:33', '', NULL),
(9, 'ST15GZ449B', 'Eight', 1, '1', '2021-07-15 09:25:39', '', NULL),
(10, 'ST15AL65XB', 'Nine', 1, '1', '2021-07-15 09:25:47', '', NULL),
(11, 'ST15RJTMKX', 'Ten', 1, '1', '2021-07-15 09:25:55', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy_tbl`
--

CREATE TABLE `privacy_policy_tbl` (
  `id` int(11) NOT NULL,
  `privacy_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `privacy_policy_tbl`
--

INSERT INTO `privacy_policy_tbl` (`id`, `privacy_id`, `title`, `description`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, 'PP118XA', 'Demo', '<p>A privacy policy is a statement or a legal document that discloses some or all of the ways a party gathers, uses, discloses, and manages a customer or client&#39;s data. It fulfils a legal requirement to protect a customer or client&#39;s privacy.</p>\n\n<p>The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.</p>\n\n<p>The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites. The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.</p>\n', '1', '2020-05-05 22:42:23', '1', '2020-05-05 18:42:23');

-- --------------------------------------------------------

--
-- Table structure for table `production_tbl`
--

CREATE TABLE `production_tbl` (
  `id` int(11) NOT NULL,
  `production_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `production_type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_two` varchar(550) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `production_tbl`
--

INSERT INTO `production_tbl` (`id`, `production_id`, `production_type`, `title`, `title_two`, `link`, `description`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'TE283BGU16', 'sec_1', 'TELL YOUR STORY', '<strong>African Award Winning Director and Host , Chrislan Manners</strong> Haiti with special forces raiding a sex trafficking anBranson, I am passionate about telling stories that connect\n', 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 'KEEP UP WITH CHRISLAN FILMS\n', 1, '1', '2021-07-29 10:53:18', '1', '2021-07-29 10:53:18'),
(2, 'TE28A4NAIP', 'sec_2', 'one', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', '', 1, '1', '2021-07-28 07:05:47', '', NULL),
(3, 'TE282OLPW1', 'sec_2', 'two', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', '', 1, '1', '2021-07-28 07:06:25', '', NULL),
(4, 'TE28MBXPIU', 'sec_2', 'three', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', '', 1, '1', '2021-07-28 07:06:55', '', NULL),
(5, 'TE282LMAPG', 'sec_3', 'Now to Next with Chrislan Feat. Rebecca Zung', '', 'https://www.youtube.com/watch?v=FtjS1hfRTRw', 'Today&rsquo;s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one&hellip;\n', 1, '1', '2021-07-29 12:47:48', '1', '2021-07-29 12:47:48'),
(6, 'TE286I2ZPU', 'sec_4', 'Now to Next with Chrislan Feat. Rebecca Zung', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', '<p>Today’s guest Rebecca Zung is a best-selling author and a leading authority on negotiation and family law. Her journey from being a divorced single mom and college dropout to one…</p>\r\n', 1, '1', '2021-07-28 07:22:55', '1', '2021-07-28 07:22:55'),
(7, 'TE28SUS244', 'sec_5', 'WORK WITH CHRISLAN', NULL, '', '<p>Get in touch with Nick Nanton now!</p>\r\n', 1, '1', '2021-07-28 07:31:03', '', NULL),
(8, 'TE282PWJLB', 'sec_6', '<p>asfsdaf</p>\n', NULL, '', '<h1>Director / Producer / Host</h1>\n\n<p>From the slums of Port au Prince, Haiti with special forces raiding a sex trafficking ring and freeing children; to the Virgin Galactic Space Port in Mojave with Sir Richard Branson, I am passionate about telling stories that connect.I’ve directed more than 60 documentaries and a sold-out Broadway Show (garnering 43 Emmy nominations in multiple regional and national competitions, and 22 wins). I’ve made films and shows featuring: Larry King, Jack Nicklaus, Tony Robbins, Sir Richard Branson, Dean Kamen, Lisa Nichols, Peter Diamandis and many more.</p>\n\n<p>Director and Producer Nick Nanton has created over 60 films and one sold-out Broadway show. He’s directed and produced documentaries on people like Rudy Ruettiger of Notre Dame fame, Peter Diamandis, founder of the Xprize and first private spaceflight; and on organizations like Operation Underground Railroad, Folds of Honor, K9s fo</p>\n', 1, '1', '2021-07-29 10:42:53', '1', '2021-07-29 10:42:53'),
(9, 'TE29O88U8J', 'sec_2', 'Four', NULL, 'https://www.youtube.com/watch?v=FtjS1hfRTRw', '', 1, '1', '2021-07-29 11:22:22', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pusherconfig_tbl`
--

CREATE TABLE `pusherconfig_tbl` (
  `id` int(11) NOT NULL,
  `api_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `api_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `secret_key` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cluster` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pusherconfig_tbl`
--

INSERT INTO `pusherconfig_tbl` (`id`, `api_id`, `api_key`, `secret_key`, `cluster`, `status`) VALUES
(1, '955973', '52cf74b6b36fabe59be1', '16070cd58f37f7acfb3d', 'ap2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_option_tbl`
--

CREATE TABLE `question_option_tbl` (
  `id` int(11) NOT NULL,
  `option_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `question_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `option_type` int(11) NOT NULL COMMENT '1=text and 2 = image',
  `option` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_answer` int(11) NOT NULL COMMENT '1=yes and 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `question_tbl`
--

CREATE TABLE `question_tbl` (
  `id` int(11) NOT NULL,
  `question_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `language` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `answer_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '1=radio and 2 = checkbox',
  `question_name` text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1=active and 2= inactive',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quizresults_tbl`
--

CREATE TABLE `quizresults_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `ans` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales_marketing_tbl`
--

CREATE TABLE `sales_marketing_tbl` (
  `id` int(15) NOT NULL,
  `sales_marketing_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `section_type` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sales_marketing_tbl`
--

INSERT INTO `sales_marketing_tbl` (`id`, `sales_marketing_id`, `section_type`, `title`, `description`, `link`, `picture`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'tfdh', 'sec_1', 'fdh', 'dfh', 'dfh', 'fdh', 1, '1', '2021-08-04 09:40:13', '1', '2021-08-04 08:40:13');

-- --------------------------------------------------------

--
-- Table structure for table `section_tbl`
--

CREATE TABLE `section_tbl` (
  `id` int(11) NOT NULL,
  `section_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `section_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `course_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sec_menu_item`
--

CREATE TABLE `sec_menu_item` (
  `menu_id` int(11) NOT NULL,
  `menu_title` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_url` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `module` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ordering` int(11) NOT NULL,
  `parent_menu` int(11) DEFAULT NULL,
  `icon` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_report` tinyint(1) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sec_menu_item`
--

INSERT INTO `sec_menu_item` (`menu_id`, `menu_title`, `page_url`, `module`, `ordering`, `parent_menu`, `icon`, `is_report`, `status`, `createby`, `createdate`) VALUES
(3, 'about', NULL, 'about', 13, 0, 'fas fa-briefcase', 0, 1, 1, '2021-07-12 18:02:43'),
(4, 'service', NULL, 'service', 2, 0, 'fab fa-servicestack', 0, 1, 1, '2021-07-07 17:12:23'),
(5, 'case_studie', NULL, 'case_studie', 13, 0, 'fa fa-book', 0, 1, 1, '2021-07-12 17:01:48'),
(6, 'media_info', 'Media', 'media', 15, 0, 'fa fa-photo-video', 0, 1, 1, '2021-07-15 18:23:32'),
(7, 'author', 'author', 'author', 15, 0, 'fa-info-circle', 0, 1, 1, '2021-08-03 17:45:21'),
(8, 'blog', 'Blog', 'blog', 14, 0, 'fa fa-blog', 0, 1, 1, '2021-07-13 18:17:45'),
(18, 'add_case_studie', 'add-case-studie', 'case_studie', 1, 5, '', 0, 1, 1, '2021-07-12 19:03:52'),
(19, 'case_studie_list', 'case-studie-list', 'case_studie', 1, 5, '', 0, 1, 1, '2021-07-12 19:03:52'),
(26, 'event_category', 'event-category', 'news_and_events', 0, 25, '', 0, 0, 1, '2020-02-17 00:00:00'),
(27, 'add_event', 'add-event', 'news_and_events', 0, 60, '', 0, 1, 1, '2020-02-17 00:00:00'),
(28, 'event_list', 'event-list', 'news_and_events', 2, 60, '', 0, 1, 1, '2020-02-17 00:00:00'),
(29, 'comment_list', 'comment-list', 'articals_and_news', 0, 25, '', 0, 0, 1, '2020-02-17 00:00:00'),
(32, 'add_service', 'add-service', 'service', 1, 4, '', 0, 1, 1, '2021-07-07 17:16:22'),
(33, 'service_list', 'service-list', 'service', 2, 4, '', NULL, 1, 1, '2021-07-07 18:31:53'),
(34, 'portfolio', NULL, 'portfolio', 4, 0, 'fas fa-briefcase', 0, 1, 1, '2021-07-08 19:57:11'),
(35, 'testimonials', NULL, 'testimonials', 5, 0, 'fa fa-quote-right', 0, 1, 1, '2021-07-08 15:27:26'),
(36, 'add_portfolio', 'add-portfolio', 'portfolio', 1, 34, '', NULL, 1, 1, '2021-07-08 13:31:30'),
(37, 'portfolio_list', 'portfolio-list', 'portfolio', 2, 34, '', NULL, 1, 1, '2021-07-08 17:34:47'),
(39, 'testimonials_list', 'testimonial-list', 'testimonials', 1, 35, '', NULL, 1, 1, '2021-07-08 17:39:07'),
(42, 'author_list', 'author-list', 'author', 2, 7, '', 0, 1, 1, '2021-07-12 16:51:25'),
(47, 'add_about', 'add-about', 'about', 1, 3, '', 0, 1, 1, '2021-07-12 18:03:16'),
(48, 'about_list', 'about-list', 'about', 2, 3, '', 0, 1, 1, '2021-07-12 18:03:16'),
(49, 'knowledge', NULL, 'knowledge', 13, 0, 'fas fa-book', 0, 1, 1, '2021-07-13 12:10:50'),
(50, 'add_knowledge', 'add-knowledge', 'knowledge', 1, 49, '', 0, 1, 1, '2021-07-13 11:16:53'),
(51, 'knowledge_list', 'knowledge-list', 'knowledge', 2, 49, '', 0, 1, 1, '2021-07-13 13:12:52'),
(53, 'add_blog', 'add-blog', 'blog', 1, 8, '', 0, 1, 1, '2021-07-13 18:18:59'),
(54, 'blog_list', 'blog-list', 'blog', 2, 8, '', 0, 1, 1, '2021-07-13 17:20:04'),
(57, 'media_list', 'media-list', 'media', 2, 6, '', 0, 1, 1, '2021-07-15 17:25:22'),
(58, 'production_list', 'production-list', 'production', 3, 4, '', 0, 1, 1, '2021-07-27 15:03:18'),
(59, 'branding_list', 'branding-list', 'branding', 4, 4, '', 0, 1, 1, '2021-07-28 16:21:23'),
(60, 'Bottom', '', '', 16, 0, 'fas fa-envelope', 0, 1, 1, '2021-07-31 06:32:43'),
(61, 'settings', 'settings', 'settings', 20, 0, 'glyphicon glyphicon-cog', 0, 1, 1, '2020-02-17 00:00:00'),
(63, 'sales_marketing_list', 'sales_marketing-list', 'sales_marketing', 5, 4, '', 0, 1, 1, '2021-08-04 16:41:06'),
(64, 'add_investment', 'Add Investment', NULL, 0, NULL, '', NULL, 0, 0, '2021-08-04 08:55:30'),
(65, 'coaching_list', 'coaching-list', 'coaching', 6, 4, '', 0, 1, 1, '2021-08-04 15:13:01'),
(66, 'investment_list', 'investment-list', 'investment', 7, 4, '', 0, 1, 1, '2021-08-04 12:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_permission`
--

CREATE TABLE `sec_role_permission` (
  `id` bigint(20) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `can_access` tinyint(1) NOT NULL,
  `can_create` tinyint(1) NOT NULL,
  `can_edit` tinyint(1) NOT NULL,
  `can_delete` tinyint(1) NOT NULL,
  `createby` int(11) NOT NULL,
  `createdate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sec_role_permission`
--

INSERT INTO `sec_role_permission` (`id`, `role_id`, `menu_id`, `can_access`, `can_create`, `can_edit`, `can_delete`, `createby`, `createdate`) VALUES
(284, 7, 7, 1, 1, 1, 1, 0, '2020-03-11 11:24:16'),
(285, 7, 8, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(286, 7, 9, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(287, 7, 11, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(288, 7, 15, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(289, 7, 17, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(290, 7, 18, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(291, 7, 20, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(292, 7, 21, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(293, 7, 22, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(294, 7, 34, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(295, 7, 35, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(296, 7, 36, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(297, 7, 19, 1, 1, 1, 1, 0, '2020-03-11 11:24:16'),
(298, 7, 23, 1, 1, 1, 1, 0, '2020-03-11 11:24:16'),
(299, 7, 24, 1, 1, 1, 1, 0, '2020-03-11 11:24:16'),
(300, 7, 25, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(301, 7, 26, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(302, 7, 27, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(303, 7, 28, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(304, 7, 29, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(305, 7, 31, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(306, 7, 32, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(307, 7, 33, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(308, 7, 30, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(309, 7, 12, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(310, 7, 13, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(311, 7, 14, 0, 0, 0, 0, 0, '2020-03-11 11:24:16'),
(356, 1, 7, 1, 1, 1, 1, 0, '2020-05-06 10:55:08'),
(357, 1, 8, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(358, 1, 9, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(359, 1, 11, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(360, 1, 15, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(361, 1, 17, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(362, 1, 18, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(363, 1, 20, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(364, 1, 21, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(365, 1, 22, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(366, 1, 19, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(367, 1, 23, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(368, 1, 24, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(369, 1, 25, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(370, 1, 26, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(371, 1, 27, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(372, 1, 28, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(373, 1, 29, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(374, 1, 30, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(375, 1, 12, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(376, 1, 13, 0, 0, 0, 0, 0, '2020-05-06 10:55:08'),
(377, 1, 14, 0, 0, 0, 0, 0, '2020-05-06 10:55:08');

-- --------------------------------------------------------

--
-- Table structure for table `sec_role_tbl`
--

CREATE TABLE `sec_role_tbl` (
  `role_id` int(11) NOT NULL,
  `role_name` text NOT NULL,
  `role_description` text NOT NULL,
  `create_by` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sec_role_tbl`
--

INSERT INTO `sec_role_tbl` (`role_id`, `role_name`, `role_description`, `create_by`, `date_time`, `role_status`) VALUES
(1, 'Manager', '', 1, '2019-11-30 02:27:43', 1),
(5, 'Administrator', 'demo', 1, '2019-12-01 06:21:08', 1),
(7, 'Assistant Manager', '', NULL, '2020-03-11 11:24:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sec_user_access_tbl`
--

CREATE TABLE `sec_user_access_tbl` (
  `role_acc_id` int(11) NOT NULL,
  `fk_role_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fk_user_id` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sec_user_access_tbl`
--

INSERT INTO `sec_user_access_tbl` (`role_acc_id`, `fk_role_id`, `fk_user_id`) VALUES
(49, '2', 'F211LO1YH'),
(50, '2', 'F21F6DBPW'),
(52, '5', 'U03LZEBT'),
(53, '6', 'ST16H586GO');

-- --------------------------------------------------------

--
-- Table structure for table `service_tbl`
--

CREATE TABLE `service_tbl` (
  `id` int(11) NOT NULL,
  `service_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `head` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(75) COLLATE utf8_unicode_ci NOT NULL,
  `detail` varchar(175) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `service_tbl`
--

INSERT INTO `service_tbl` (`id`, `service_id`, `head`, `name`, `title`, `detail`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(5, 'ST081LSIT5', 'PRODUCTION', '', 'Relative & Family Sponsored', 'Test Detail', 1, '1', '2021-07-08 09:23:26', '', NULL),
(6, 'ST08BO4Q6C', 'BRANDING', '', 'Customers Trust Strong Brands', '2nd detail', 1, '1', '2021-07-08 09:23:36', '', NULL),
(7, 'ST087UR458', 'SALES & MARKETING', '', 'Sales and Marketing is important', '3 rd detail', 1, '1', '2021-07-08 09:08:17', '', NULL),
(8, 'ST087LC8N4', 'INVESTMENT & FINANCE', '', 'Relative & Family Sponsored', '4th detail', 1, '1', '2021-07-08 09:13:03', '1', '2021-07-08 09:13:03');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `storename` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `logoTwo` varchar(255) DEFAULT NULL,
  `logoThree` varchar(255) DEFAULT NULL,
  `splash_logo` varchar(255) NOT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `vat` int(11) NOT NULL DEFAULT 0,
  `servicecharge` int(11) NOT NULL DEFAULT 0,
  `country` varchar(100) DEFAULT NULL,
  `currency` varchar(11) DEFAULT NULL,
  `currency_rate` varchar(20) NOT NULL,
  `currency_position` int(11) NOT NULL,
  `language` varchar(100) DEFAULT NULL,
  `timezone` varchar(150) NOT NULL,
  `checkouttime` time NOT NULL,
  `dateformat` text NOT NULL,
  `site_align` varchar(50) DEFAULT NULL,
  `youtube_api_key` varchar(255) NOT NULL,
  `vimeo_api_key` varchar(255) NOT NULL,
  `apps_logo` varchar(255) DEFAULT NULL,
  `apps_url` varchar(255) DEFAULT NULL,
  `course_header_image` varchar(255) NOT NULL,
  `faculty_header_image` varchar(255) NOT NULL,
  `cart_header_image` varchar(255) NOT NULL,
  `checkout_header_image` varchar(255) NOT NULL,
  `profile_header_image` varchar(255) NOT NULL,
  `slider_backend_image` varchar(255) DEFAULT NULL,
  `testimonial_backend_image` varchar(255) NOT NULL,
  `investment_backend_image` varchar(255) DEFAULT NULL,
  `top_content_backend_image` varchar(255) NOT NULL COMMENT 'like about top content',
  `powerbytxt` text DEFAULT NULL,
  `footer_text` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `title`, `storename`, `address`, `email`, `phone`, `logo`, `logoTwo`, `logoThree`, `splash_logo`, `favicon`, `vat`, `servicecharge`, `country`, `currency`, `currency_rate`, `currency_position`, `language`, `timezone`, `checkouttime`, `dateformat`, `site_align`, `youtube_api_key`, `vimeo_api_key`, `apps_logo`, `apps_url`, `course_header_image`, `faculty_header_image`, `cart_header_image`, `checkout_header_image`, `profile_header_image`, `slider_backend_image`, `testimonial_backend_image`, `investment_backend_image`, `top_content_backend_image`, `powerbytxt`, `footer_text`) VALUES
(2, 'Chrislan\'s Company', 'Green Valley Hotel', '5th Floor Mannan Plaza<br> Khilkhet, Dhaka-1229', 'demo@gmail.com', '0123456789', 'assets/uploads/logo/2021-08-03/2fd6f81fb7f5df9eda44f05a590c85ce.png', 'assets/img/22.png', 'assets/uploads/logo/2021-08-03/daeb1e1169faf94b6f413443821137d7.png', '', 'assets/img/icons/2021-08-03/4748d31de83c859490368658e50b72cc.png', 0, 12, 'Bangladesh', '$', '', 1, 'english', 'Asia/Dhaka', '12:00:00', 'd/m/Y', 'LTR', 'AIzaSyA5-5P5B-qWQkTFdyAgAPuo4CtrbxKBzKA', '39258384b69994dba483c10286825b5c', '', 'https://www.bdtask.com/', '', '', '', '', '', 'assets/img/sliders/2021-07-15/6163ef02c2fccbfec99853feab143c75.jpg', 'assets/img/testimonial/2021-07-13/41ca3d4f92e2f6588ed189a384d671aa.jpg', 'undefined', 'assets/img/top_content_backend/2021-08-03/87c325f4d7cd95a87d29c7d1ce51a8ad.png', 'Powered By: BDTAKS Ltd, www.bdtask.com', 'Ã‚Â© 2020 BDTAKS Ltd- All Rights Reserved ');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_tbl`
--

CREATE TABLE `shipping_tbl` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipp_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipp_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shipp_mobile` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipp_address` text COLLATE utf8_unicode_ci NOT NULL,
  `shipp_country` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipp_city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipp_state` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shipp_zip` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slide_tbl`
--

CREATE TABLE `slide_tbl` (
  `id` int(11) NOT NULL,
  `slider_id` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subtitle` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `button_level` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slide_tbl`
--

INSERT INTO `slide_tbl` (`id`, `slider_id`, `title`, `subtitle`, `button_level`, `tags`, `description`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(27, 'CM06W2X', 'GET BETTER EVERY DAY', 'The Best Counseling from the Best Psychologists', 'Get Started', '', 'These cases are perfectly simple and easy to distinguish. In a free hour when our power of choice is prevents.', '1', '2021-07-06 14:04:59', '1', '2021-07-06 14:04:59'),
(29, 'CM076BK', 'GET BETTER EVERY DAY', 'The Best Counseling from the Best Psychologists', 'Get Started', '', 'These cases are perfectly simple and easy to distinguish. In a free hour when our power of choice is prevents.', '1', '2021-07-15 08:08:36', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateway`
--

CREATE TABLE `sms_gateway` (
  `gateway_id` int(11) NOT NULL,
  `provider_name` text NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `authentication` text NOT NULL,
  `link` text NOT NULL,
  `default_status` int(11) NOT NULL DEFAULT 0,
  `is_invoice` int(1) NOT NULL,
  `is_purchase` int(1) NOT NULL,
  `is_receive` int(1) NOT NULL,
  `is_payment` int(1) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_gateway`
--

INSERT INTO `sms_gateway` (`gateway_id`, `provider_name`, `user`, `password`, `phone`, `authentication`, `link`, `default_status`, `is_invoice`, `is_purchase`, `is_receive`, `is_payment`, `status`) VALUES
(1, 'NEXMO', '8a980366 ', '', '8801703136868', 'Md. Shahab udin', '', 0, 0, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stripe_config`
--

CREATE TABLE `stripe_config` (
  `id` int(11) NOT NULL,
  `payment_method_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `marchant_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_live` int(11) NOT NULL COMMENT '1=live and 0= test',
  `status` int(11) NOT NULL COMMENT '1=active and 0=inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stripe_config`
--

INSERT INTO `stripe_config` (`id`, `payment_method_name`, `marchant_id`, `password`, `email`, `currency`, `is_live`, `status`) VALUES
(1, 'Stripe Gateway', 'sk_test_ol4WUcbGsqxNJItpeOi1ecDT00k5mDyC2G', 'pk_test_TrVFpmZBkgasCE6WTPkZgMPr00UzVVOqgp', 'test@gmail.com', 'USD', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students_tbl`
--

CREATE TABLE `students_tbl` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `biography` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paypal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bitcoin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `simbcoin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL COMMENT '1=active and 0=inactive',
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `students_tbl`
--

INSERT INTO `students_tbl` (`id`, `student_id`, `name`, `mobile`, `email`, `address`, `biography`, `country`, `city`, `state`, `zipcode`, `facebook`, `twitter`, `linkedin`, `instagram`, `paypal`, `bitcoin`, `simbcoin`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'ST16H586GO', 'Phillip Anthropy', '789789', 'admin@example.com', '789', '<p>789</p>\r\n', NULL, NULL, NULL, NULL, '789+', '789+', '789+', '789+', '789+', '', '', 1, '1', '2021-07-16 12:34:17', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `subscribes_tbl`
--

CREATE TABLE `subscribes_tbl` (
  `id` int(11) NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_receive` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `synchronizer_setting`
--

CREATE TABLE `synchronizer_setting` (
  `id` int(11) NOT NULL,
  `hostname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `port` varchar(10) NOT NULL,
  `debug` varchar(10) NOT NULL,
  `project_root` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `synchronizer_setting`
--

INSERT INTO `synchronizer_setting` (`id`, `hostname`, `username`, `password`, `port`, `debug`, `project_root`) VALUES
(1, '70.35.198.244', 'spreadcargod', 'SpreadShorob1@d', '21', 'true', './public_html/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `CountryID` int(11) DEFAULT NULL,
  `CountryName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TwoCharCountryCode` char(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ThreeCharCountryCode` char(3) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`CountryID`, `CountryName`, `TwoCharCountryCode`, `ThreeCharCountryCode`) VALUES
(1, 'Afghanistan', 'AF', 'AFG'),
(2, 'Aland Islands', 'AX', 'ALA'),
(3, 'Albania', 'AL', 'ALB'),
(4, 'Algeria', 'DZ', 'DZA'),
(5, 'American Samoa', 'AS', 'ASM'),
(6, 'Andorra', 'AD', 'AND'),
(7, 'Angola', 'AO', 'AGO'),
(8, 'Anguilla', 'AI', 'AIA'),
(9, 'Antarctica', 'AQ', 'ATA'),
(10, 'Antigua and Barbuda', 'AG', 'ATG'),
(11, 'Argentina', 'AR', 'ARG'),
(12, 'Armenia', 'AM', 'ARM'),
(13, 'Aruba', 'AW', 'ABW'),
(14, 'Australia', 'AU', 'AUS'),
(15, 'Austria', 'AT', 'AUT'),
(16, 'Azerbaijan', 'AZ', 'AZE'),
(17, 'Bahamas', 'BS', 'BHS'),
(18, 'Bahrain', 'BH', 'BHR'),
(19, 'Bangladesh', 'BD', 'BGD'),
(20, 'Barbados', 'BB', 'BRB'),
(21, 'Belarus', 'BY', 'BLR'),
(22, 'Belgium', 'BE', 'BEL'),
(23, 'Belize', 'BZ', 'BLZ'),
(24, 'Benin', 'BJ', 'BEN'),
(25, 'Bermuda', 'BM', 'BMU'),
(26, 'Bhutan', 'BT', 'BTN'),
(27, 'Bolivia', 'BO', 'BOL'),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES'),
(29, 'Bosnia and Herzegovina', 'BA', 'BIH'),
(30, 'Botswana', 'BW', 'BWA'),
(31, 'Bouvet Island', 'BV', 'BVT'),
(32, 'Brazil', 'BR', 'BRA'),
(33, 'British Indian Ocean Territory', 'IO', 'IOT'),
(34, 'Brunei', 'BN', 'BRN'),
(35, 'Bulgaria', 'BG', 'BGR'),
(36, 'Burkina Faso', 'BF', 'BFA'),
(37, 'Burundi', 'BI', 'BDI'),
(38, 'Cambodia', 'KH', 'KHM'),
(39, 'Cameroon', 'CM', 'CMR'),
(40, 'Canada', 'CA', 'CAN'),
(41, 'Cape Verde', 'CV', 'CPV'),
(42, 'Cayman Islands', 'KY', 'CYM'),
(43, 'Central African Republic', 'CF', 'CAF'),
(44, 'Chad', 'TD', 'TCD'),
(45, 'Chile', 'CL', 'CHL'),
(46, 'China', 'CN', 'CHN'),
(47, 'Christmas Island', 'CX', 'CXR'),
(48, 'Cocos (Keeling) Islands', 'CC', 'CCK'),
(49, 'Colombia', 'CO', 'COL'),
(50, 'Comoros', 'KM', 'COM'),
(51, 'Congo', 'CG', 'COG'),
(52, 'Cook Islands', 'CK', 'COK'),
(53, 'Costa Rica', 'CR', 'CRI'),
(54, 'Ivory Coast', 'CI', 'CIV'),
(55, 'Croatia', 'HR', 'HRV'),
(56, 'Cuba', 'CU', 'CUB'),
(57, 'Curacao', 'CW', 'CUW'),
(58, 'Cyprus', 'CY', 'CYP'),
(59, 'Czech Republic', 'CZ', 'CZE'),
(60, 'Democratic Republic of the Congo', 'CD', 'COD'),
(61, 'Denmark', 'DK', 'DNK'),
(62, 'Djibouti', 'DJ', 'DJI'),
(63, 'Dominica', 'DM', 'DMA'),
(64, 'Dominican Republic', 'DO', 'DOM'),
(65, 'Ecuador', 'EC', 'ECU'),
(66, 'Egypt', 'EG', 'EGY'),
(67, 'El Salvador', 'SV', 'SLV'),
(68, 'Equatorial Guinea', 'GQ', 'GNQ'),
(69, 'Eritrea', 'ER', 'ERI'),
(70, 'Estonia', 'EE', 'EST'),
(71, 'Ethiopia', 'ET', 'ETH'),
(72, 'Falkland Islands (Malvinas)', 'FK', 'FLK'),
(73, 'Faroe Islands', 'FO', 'FRO'),
(74, 'Fiji', 'FJ', 'FJI'),
(75, 'Finland', 'FI', 'FIN'),
(76, 'France', 'FR', 'FRA'),
(77, 'French Guiana', 'GF', 'GUF'),
(78, 'French Polynesia', 'PF', 'PYF'),
(79, 'French Southern Territories', 'TF', 'ATF'),
(80, 'Gabon', 'GA', 'GAB'),
(81, 'Gambia', 'GM', 'GMB'),
(82, 'Georgia', 'GE', 'GEO'),
(83, 'Germany', 'DE', 'DEU'),
(84, 'Ghana', 'GH', 'GHA'),
(85, 'Gibraltar', 'GI', 'GIB'),
(86, 'Greece', 'GR', 'GRC'),
(87, 'Greenland', 'GL', 'GRL'),
(88, 'Grenada', 'GD', 'GRD'),
(89, 'Guadaloupe', 'GP', 'GLP'),
(90, 'Guam', 'GU', 'GUM'),
(91, 'Guatemala', 'GT', 'GTM'),
(92, 'Guernsey', 'GG', 'GGY'),
(93, 'Guinea', 'GN', 'GIN'),
(94, 'Guinea-Bissau', 'GW', 'GNB'),
(95, 'Guyana', 'GY', 'GUY'),
(96, 'Haiti', 'HT', 'HTI'),
(97, 'Heard Island and McDonald Islands', 'HM', 'HMD'),
(98, 'Honduras', 'HN', 'HND'),
(99, 'Hong Kong', 'HK', 'HKG'),
(100, 'Hungary', 'HU', 'HUN'),
(101, 'Iceland', 'IS', 'ISL'),
(102, 'India', 'IN', 'IND'),
(103, 'Indonesia', 'ID', 'IDN'),
(104, 'Iran', 'IR', 'IRN'),
(105, 'Iraq', 'IQ', 'IRQ'),
(106, 'Ireland', 'IE', 'IRL'),
(107, 'Isle of Man', 'IM', 'IMN'),
(108, 'Israel', 'IL', 'ISR'),
(109, 'Italy', 'IT', 'ITA'),
(110, 'Jamaica', 'JM', 'JAM'),
(111, 'Japan', 'JP', 'JPN'),
(112, 'Jersey', 'JE', 'JEY'),
(113, 'Jordan', 'JO', 'JOR'),
(114, 'Kazakhstan', 'KZ', 'KAZ'),
(115, 'Kenya', 'KE', 'KEN'),
(116, 'Kiribati', 'KI', 'KIR'),
(117, 'Kosovo', 'XK', '---'),
(118, 'Kuwait', 'KW', 'KWT'),
(119, 'Kyrgyzstan', 'KG', 'KGZ'),
(120, 'Laos', 'LA', 'LAO'),
(121, 'Latvia', 'LV', 'LVA'),
(122, 'Lebanon', 'LB', 'LBN'),
(123, 'Lesotho', 'LS', 'LSO'),
(124, 'Liberia', 'LR', 'LBR'),
(125, 'Libya', 'LY', 'LBY'),
(126, 'Liechtenstein', 'LI', 'LIE'),
(127, 'Lithuania', 'LT', 'LTU'),
(128, 'Luxembourg', 'LU', 'LUX'),
(129, 'Macao', 'MO', 'MAC'),
(130, 'Macedonia', 'MK', 'MKD'),
(131, 'Madagascar', 'MG', 'MDG'),
(132, 'Malawi', 'MW', 'MWI'),
(133, 'Malaysia', 'MY', 'MYS'),
(134, 'Maldives', 'MV', 'MDV'),
(135, 'Mali', 'ML', 'MLI'),
(136, 'Malta', 'MT', 'MLT'),
(137, 'Marshall Islands', 'MH', 'MHL'),
(138, 'Martinique', 'MQ', 'MTQ'),
(139, 'Mauritania', 'MR', 'MRT'),
(140, 'Mauritius', 'MU', 'MUS'),
(141, 'Mayotte', 'YT', 'MYT'),
(142, 'Mexico', 'MX', 'MEX'),
(143, 'Micronesia', 'FM', 'FSM'),
(144, 'Moldava', 'MD', 'MDA'),
(145, 'Monaco', 'MC', 'MCO'),
(146, 'Mongolia', 'MN', 'MNG'),
(147, 'Montenegro', 'ME', 'MNE'),
(148, 'Montserrat', 'MS', 'MSR'),
(149, 'Morocco', 'MA', 'MAR'),
(150, 'Mozambique', 'MZ', 'MOZ'),
(151, 'Myanmar (Burma)', 'MM', 'MMR'),
(152, 'Namibia', 'NA', 'NAM'),
(153, 'Nauru', 'NR', 'NRU'),
(154, 'Nepal', 'NP', 'NPL'),
(155, 'Netherlands', 'NL', 'NLD'),
(156, 'New Caledonia', 'NC', 'NCL'),
(157, 'New Zealand', 'NZ', 'NZL'),
(158, 'Nicaragua', 'NI', 'NIC'),
(159, 'Niger', 'NE', 'NER'),
(160, 'Nigeria', 'NG', 'NGA'),
(161, 'Niue', 'NU', 'NIU'),
(162, 'Norfolk Island', 'NF', 'NFK'),
(163, 'North Korea', 'KP', 'PRK'),
(164, 'Northern Mariana Islands', 'MP', 'MNP'),
(165, 'Norway', 'NO', 'NOR'),
(166, 'Oman', 'OM', 'OMN'),
(167, 'Pakistan', 'PK', 'PAK'),
(168, 'Palau', 'PW', 'PLW'),
(169, 'Palestine', 'PS', 'PSE'),
(170, 'Panama', 'PA', 'PAN'),
(171, 'Papua New Guinea', 'PG', 'PNG'),
(172, 'Paraguay', 'PY', 'PRY'),
(173, 'Peru', 'PE', 'PER'),
(174, 'Phillipines', 'PH', 'PHL'),
(175, 'Pitcairn', 'PN', 'PCN'),
(176, 'Poland', 'PL', 'POL'),
(177, 'Portugal', 'PT', 'PRT'),
(178, 'Puerto Rico', 'PR', 'PRI'),
(179, 'Qatar', 'QA', 'QAT'),
(180, 'Reunion', 'RE', 'REU'),
(181, 'Romania', 'RO', 'ROU'),
(182, 'Russia', 'RU', 'RUS'),
(183, 'Rwanda', 'RW', 'RWA'),
(184, 'Saint Barthelemy', 'BL', 'BLM'),
(185, 'Saint Helena', 'SH', 'SHN'),
(186, 'Saint Kitts and Nevis', 'KN', 'KNA'),
(187, 'Saint Lucia', 'LC', 'LCA'),
(188, 'Saint Martin', 'MF', 'MAF'),
(189, 'Saint Pierre and Miquelon', 'PM', 'SPM'),
(190, 'Saint Vincent and the Grenadines', 'VC', 'VCT'),
(191, 'Samoa', 'WS', 'WSM'),
(192, 'San Marino', 'SM', 'SMR'),
(193, 'Sao Tome and Principe', 'ST', 'STP'),
(194, 'Saudi Arabia', 'SA', 'SAU'),
(195, 'Senegal', 'SN', 'SEN'),
(196, 'Serbia', 'RS', 'SRB'),
(197, 'Seychelles', 'SC', 'SYC'),
(198, 'Sierra Leone', 'SL', 'SLE'),
(199, 'Singapore', 'SG', 'SGP'),
(200, 'Sint Maarten', 'SX', 'SXM'),
(201, 'Slovakia', 'SK', 'SVK'),
(202, 'Slovenia', 'SI', 'SVN'),
(203, 'Solomon Islands', 'SB', 'SLB'),
(204, 'Somalia', 'SO', 'SOM'),
(205, 'South Africa', 'ZA', 'ZAF'),
(206, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS'),
(207, 'South Korea', 'KR', 'KOR'),
(208, 'South Sudan', 'SS', 'SSD'),
(209, 'Spain', 'ES', 'ESP'),
(210, 'Sri Lanka', 'LK', 'LKA'),
(211, 'Sudan', 'SD', 'SDN'),
(212, 'Suriname', 'SR', 'SUR'),
(213, 'Svalbard and Jan Mayen', 'SJ', 'SJM'),
(214, 'Swaziland', 'SZ', 'SWZ'),
(215, 'Sweden', 'SE', 'SWE'),
(216, 'Switzerland', 'CH', 'CHE'),
(217, 'Syria', 'SY', 'SYR'),
(218, 'Taiwan', 'TW', 'TWN'),
(219, 'Tajikistan', 'TJ', 'TJK'),
(220, 'Tanzania', 'TZ', 'TZA'),
(221, 'Thailand', 'TH', 'THA'),
(222, 'Timor-Leste (East Timor)', 'TL', 'TLS'),
(223, 'Togo', 'TG', 'TGO'),
(224, 'Tokelau', 'TK', 'TKL'),
(225, 'Tonga', 'TO', 'TON'),
(226, 'Trinidad and Tobago', 'TT', 'TTO'),
(227, 'Tunisia', 'TN', 'TUN'),
(228, 'Turkey', 'TR', 'TUR'),
(229, 'Turkmenistan', 'TM', 'TKM'),
(230, 'Turks and Caicos Islands', 'TC', 'TCA'),
(231, 'Tuvalu', 'TV', 'TUV'),
(232, 'Uganda', 'UG', 'UGA'),
(233, 'Ukraine', 'UA', 'UKR'),
(234, 'United Arab Emirates', 'AE', 'ARE'),
(235, 'United Kingdom', 'GB', 'GBR'),
(236, 'United States', 'US', 'USA'),
(237, 'United States Minor Outlying Islands', 'UM', 'UMI'),
(238, 'Uruguay', 'UY', 'URY'),
(239, 'Uzbekistan', 'UZ', 'UZB'),
(240, 'Vanuatu', 'VU', 'VUT'),
(241, 'Vatican City', 'VA', 'VAT'),
(242, 'Venezuela', 'VE', 'VEN'),
(243, 'Vietnam', 'VN', 'VNM'),
(244, 'Virgin Islands, British', 'VG', 'VGB'),
(245, 'Virgin Islands, US', 'VI', 'VIR'),
(246, 'Wallis and Futuna', 'WF', 'WLF'),
(247, 'Western Sahara', 'EH', 'ESH'),
(248, 'Yemen', 'YE', 'YEM'),
(249, 'Zambia', 'ZM', 'ZMB'),
(250, 'Zimbabwe', 'ZW', 'ZWE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `stateid` int(11) NOT NULL,
  `countryid` int(11) NOT NULL,
  `statename` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`stateid`, `countryid`, `statename`, `status`) VALUES
(1, 2, 'Alabama', 1),
(2, 2, 'Alaska', 1),
(3, 2, 'Arizona', 1),
(4, 2, 'Arkansas', 1),
(5, 2, 'California', 1),
(6, 2, 'Florida', 1),
(7, 2, 'New Mexico', 1),
(8, 2, 'New York', 1),
(9, 2, 'Oklahoma', 1),
(10, 2, 'Texas', 1),
(11, 2, 'Virginia', 1),
(12, 1, 'Dhaka', 1),
(13, 1, 'Chittagong', 1),
(14, 1, 'Rajshahi', 1),
(15, 1, 'Khulna', 1),
(16, 1, 'Sylhet', 1),
(17, 1, 'Barishal', 1),
(18, 1, 'Rangpur', 1),
(19, 1, 'Mymensingh', 1),
(20, 4, 'West Bengal', 1),
(21, 4, 'Uttar Pradesh', 1),
(22, 4, 'Tripura', 1),
(23, 4, 'Telangana', 1),
(24, 4, 'Tamil Nadu', 1),
(25, 4, 'Sikkim', 1),
(26, 4, 'Rajasthan', 1),
(27, 4, 'Punjab', 1),
(28, 4, 'Odisha', 1),
(29, 4, 'Nagaland', 1),
(30, 4, 'Kerala', 1),
(31, 4, 'Haryana', 1);

-- --------------------------------------------------------

--
-- Table structure for table `teammembers_tbl`
--

CREATE TABLE `teammembers_tbl` (
  `id` int(11) NOT NULL,
  `teammember_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `teammembers_tbl`
--

INSERT INTO `teammembers_tbl` (`id`, `teammember_id`, `name`, `designation`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'TM13GHIM', 'Phillip Anthropy', 'Creative Director', '1', '2021-07-13 05:46:29', '', '0000-00-00 00:00:00'),
(2, 'TM13YOWR', 'Gordon Norman', 'Creative Director', '1', '2021-07-13 05:49:55', '', '0000-00-00 00:00:00'),
(3, 'TM13B8GZ', 'Dylan Meringue', 'Creative Director', '1', '2021-07-13 05:50:17', '', '0000-00-00 00:00:00'),
(4, 'TM131QOQ', 'Bailey Wonger', 'Creative Director', '1', '2021-07-13 05:50:27', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `termscondition_tbl`
--

CREATE TABLE `termscondition_tbl` (
  `id` int(11) NOT NULL,
  `terms_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `termscondition_tbl`
--

INSERT INTO `termscondition_tbl` (`id`, `terms_id`, `title`, `description`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(2, 'TC11F1U', 'Terms & Conditions', '<p>Terms of service are the legal agreements between a service provider and a person who wants to use that service. The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.</p>\n\n<p>The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.</p>\n\n<p>The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites. The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.The person must agree to abide by the terms of service in order to use the offered service. Terms of service can also be merely a disclaimer, especially regarding the use of websites.</p>\n', '1', '2020-05-05 22:42:30', '1', '2020-05-05 18:42:30');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials_tbl`
--

CREATE TABLE `testimonials_tbl` (
  `id` int(11) NOT NULL,
  `testimonial_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dialog` varchar(455) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL COMMENT '1 = active and 0 = inactive',
  `created_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `testimonials_tbl`
--

INSERT INTO `testimonials_tbl` (`id`, `testimonial_id`, `dialog`, `title`, `description`, `name`, `designation`, `status`, `created_by`, `created_date`, `updated_by`, `updated_date`) VALUES
(1, 'TE26AD71VB', '', 'I have work in healthcare', 'We denounce with righteous indignation and dislike men who that beguiled and demoralized by the charms of pleasure the moment blindeddesires cannot foresee the asssitance for 2579 visa.', 'David Luponis', 'CEO, Landmark', 1, '1', '2021-07-26 04:04:16', '', NULL),
(2, 'TE26MGRBQU', '', 'I have work in healthcare', 'We denounce with righteous indignation and dislike men who that beguiled and demoralized by the charms of pleasure the moment blindeddesires cannot foresee the asssitance for 2579 visa.', 'David Luponis', 'CEO, Landmark', 1, '1', '2021-07-26 04:05:03', '', NULL),
(3, 'TE26DA8PU2', '', 'I have3 work in healthcare', 'We denounce with righteous indignation and dislike men who that beguiled and demoralized by the charms of pleasure the moment blindeddesires cannot foresee the asssitance for 2579 visa.', 'Dylan Meringue', 'CEO, Landmark', 1, '1', '2021-07-26 09:39:48', '1', '2021-07-26 09:39:48');

-- --------------------------------------------------------

--
-- Table structure for table `themes_tbl`
--

CREATE TABLE `themes_tbl` (
  `id` int(11) NOT NULL,
  `theme_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `created_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `themes_tbl`
--

INSERT INTO `themes_tbl` (`id`, `theme_id`, `name`, `status`, `created_date`, `created_by`, `updated_date`, `updated_by`) VALUES
(1, 'TH14DS', 'default', 1, '2019-12-13 05:00:00', '1', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `log_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `about` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `is_admin` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `log_id`, `firstname`, `lastname`, `about`, `email`, `image`, `status`, `is_admin`) VALUES
(23, '1', 'Admin', 'User', 'test', 'test', 'assets/img/icons/default.png', 1, 1),
(24, 'U03LZEBT', 'Md. Omar', 'Faruk', NULL, 'farukmscse@gmail.com', '', 1, 0),
(25, 'U03XBMDQ', 'chrislan', ' lan', NULL, 'admin@example.com', './assets/uploads/users/favicon.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `work_experience_tbl`
--

CREATE TABLE `work_experience_tbl` (
  `id` int(11) NOT NULL,
  `experience_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `from_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fromdate` date DEFAULT NULL,
  `todate` date DEFAULT NULL,
  `responsibility` text COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `work_experience_tbl`
--

INSERT INTO `work_experience_tbl` (`id`, `experience_id`, `from_id`, `designation`, `company`, `fromdate`, `todate`, `responsibility`) VALUES
(64, 'EX21KO5J', 'F211LO1YH', '', '', '0000-00-00', '0000-00-00', ''),
(65, 'EX2151YC', 'F21F6DBPW', '', '', '0000-00-00', '0000-00-00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutinfo_tbl`
--
ALTER TABLE `aboutinfo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_tbl`
--
ALTER TABLE `about_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `about_id` (`about_id`);

--
-- Indexes for table `author_tbl`
--
ALTER TABLE `author_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `author_id` (`author_id`);

--
-- Indexes for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blog_id` (`blog_id`);

--
-- Indexes for table `branding_tbl`
--
ALTER TABLE `branding_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branding_id` (`branding_id`);

--
-- Indexes for table `cardinfo_tbl`
--
ALTER TABLE `cardinfo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `case_studie_tbl`
--
ALTER TABLE `case_studie_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `case_studie_id` (`case_studie_id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `coaching_tbl`
--
ALTER TABLE `coaching_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coaching_id` (`coaching_id`);

--
-- Indexes for table `comments_tbl`
--
ALTER TABLE `comments_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commission_setup_tbl`
--
ALTER TABLE `commission_setup_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_tbl`
--
ALTER TABLE `company_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursequiz_tbl`
--
ALTER TABLE `coursequiz_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currencyid`);

--
-- Indexes for table `customer_review_tbl`
--
ALTER TABLE `customer_review_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `education_tbl`
--
ALTER TABLE `education_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enroll_tbl`
--
ALTER TABLE `enroll_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events_tbl`
--
ALTER TABLE `events_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `event_category_tbl`
--
ALTER TABLE `event_category_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_detail_tbl`
--
ALTER TABLE `event_detail_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gateway_tbl`
--
ALTER TABLE `gateway_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment_tbl`
--
ALTER TABLE `investment_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `investment_id` (`investment_id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_tbl`
--
ALTER TABLE `invoice_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `knowledge_tbl`
--
ALTER TABLE `knowledge_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `knowledge_id` (`knowledge_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ledger_tbl`
--
ALTER TABLE `ledger_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_tbl`
--
ALTER TABLE `lesson_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lesson_id` (`lesson_id`);

--
-- Indexes for table `loginfo_tbl`
--
ALTER TABLE `loginfo_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_config_tbl`
--
ALTER TABLE `mail_config_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media_tbl`
--
ALTER TABLE `media_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `media_id` (`media_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module_permission`
--
ALTER TABLE `module_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_module_id` (`fk_module_id`),
  ADD KEY `fk_user_id` (`fk_user_id`);

--
-- Indexes for table `payeer_config`
--
ALTER TABLE `payeer_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payu_config`
--
ALTER TABLE `payu_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `picture_tbl`
--
ALTER TABLE `picture_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `from_id` (`from_id`);

--
-- Indexes for table `portfolio_tbl`
--
ALTER TABLE `portfolio_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `portfolio_id` (`portfolio_id`);

--
-- Indexes for table `privacy_policy_tbl`
--
ALTER TABLE `privacy_policy_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `production_tbl`
--
ALTER TABLE `production_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `production_id` (`production_id`);

--
-- Indexes for table `pusherconfig_tbl`
--
ALTER TABLE `pusherconfig_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_option_tbl`
--
ALTER TABLE `question_option_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question_tbl`
--
ALTER TABLE `question_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quizresults_tbl`
--
ALTER TABLE `quizresults_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales_marketing_tbl`
--
ALTER TABLE `sales_marketing_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_marketing_id` (`sales_marketing_id`);

--
-- Indexes for table `section_tbl`
--
ALTER TABLE `section_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `sec_menu_item`
--
ALTER TABLE `sec_menu_item`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  ADD PRIMARY KEY (`role_acc_id`);

--
-- Indexes for table `service_tbl`
--
ALTER TABLE `service_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `service_id` (`service_id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_tbl`
--
ALTER TABLE `shipping_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide_tbl`
--
ALTER TABLE `slide_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_gateway`
--
ALTER TABLE `sms_gateway`
  ADD PRIMARY KEY (`gateway_id`);

--
-- Indexes for table `stripe_config`
--
ALTER TABLE `stripe_config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_tbl`
--
ALTER TABLE `students_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribes_tbl`
--
ALTER TABLE `subscribes_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `synchronizer_setting`
--
ALTER TABLE `synchronizer_setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`stateid`);

--
-- Indexes for table `teammembers_tbl`
--
ALTER TABLE `teammembers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `termscondition_tbl`
--
ALTER TABLE `termscondition_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials_tbl`
--
ALTER TABLE `testimonials_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `estimonials_id` (`testimonial_id`);

--
-- Indexes for table `themes_tbl`
--
ALTER TABLE `themes_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_experience_tbl`
--
ALTER TABLE `work_experience_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutinfo_tbl`
--
ALTER TABLE `aboutinfo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `about_tbl`
--
ALTER TABLE `about_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `author_tbl`
--
ALTER TABLE `author_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `branding_tbl`
--
ALTER TABLE `branding_tbl`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cardinfo_tbl`
--
ALTER TABLE `cardinfo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `case_studie_tbl`
--
ALTER TABLE `case_studie_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `coaching_tbl`
--
ALTER TABLE `coaching_tbl`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments_tbl`
--
ALTER TABLE `comments_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commission_setup_tbl`
--
ALTER TABLE `commission_setup_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `company_tbl`
--
ALTER TABLE `company_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `coursequiz_tbl`
--
ALTER TABLE `coursequiz_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currencyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer_review_tbl`
--
ALTER TABLE `customer_review_tbl`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `education_tbl`
--
ALTER TABLE `education_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `enroll_tbl`
--
ALTER TABLE `enroll_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events_tbl`
--
ALTER TABLE `events_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `event_category_tbl`
--
ALTER TABLE `event_category_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `event_detail_tbl`
--
ALTER TABLE `event_detail_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `exam_tbl`
--
ALTER TABLE `exam_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty_tbl`
--
ALTER TABLE `faculty_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `gateway_tbl`
--
ALTER TABLE `gateway_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investment_tbl`
--
ALTER TABLE `investment_tbl`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_tbl`
--
ALTER TABLE `invoice_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `knowledge_tbl`
--
ALTER TABLE `knowledge_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1166;

--
-- AUTO_INCREMENT for table `ledger_tbl`
--
ALTER TABLE `ledger_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lesson_tbl`
--
ALTER TABLE `lesson_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loginfo_tbl`
--
ALTER TABLE `loginfo_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT for table `mail_config_tbl`
--
ALTER TABLE `mail_config_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `media_tbl`
--
ALTER TABLE `media_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_permission`
--
ALTER TABLE `module_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payeer_config`
--
ALTER TABLE `payeer_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payu_config`
--
ALTER TABLE `payu_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `picture_tbl`
--
ALTER TABLE `picture_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `portfolio_tbl`
--
ALTER TABLE `portfolio_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `privacy_policy_tbl`
--
ALTER TABLE `privacy_policy_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `production_tbl`
--
ALTER TABLE `production_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pusherconfig_tbl`
--
ALTER TABLE `pusherconfig_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `question_option_tbl`
--
ALTER TABLE `question_option_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_tbl`
--
ALTER TABLE `question_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quizresults_tbl`
--
ALTER TABLE `quizresults_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_marketing_tbl`
--
ALTER TABLE `sales_marketing_tbl`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `section_tbl`
--
ALTER TABLE `section_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sec_menu_item`
--
ALTER TABLE `sec_menu_item`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=632;

--
-- AUTO_INCREMENT for table `sec_role_permission`
--
ALTER TABLE `sec_role_permission`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT for table `sec_role_tbl`
--
ALTER TABLE `sec_role_tbl`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sec_user_access_tbl`
--
ALTER TABLE `sec_user_access_tbl`
  MODIFY `role_acc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `service_tbl`
--
ALTER TABLE `service_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shipping_tbl`
--
ALTER TABLE `shipping_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slide_tbl`
--
ALTER TABLE `slide_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sms_gateway`
--
ALTER TABLE `sms_gateway`
  MODIFY `gateway_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stripe_config`
--
ALTER TABLE `stripe_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students_tbl`
--
ALTER TABLE `students_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribes_tbl`
--
ALTER TABLE `subscribes_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `synchronizer_setting`
--
ALTER TABLE `synchronizer_setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `stateid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `teammembers_tbl`
--
ALTER TABLE `teammembers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `termscondition_tbl`
--
ALTER TABLE `termscondition_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials_tbl`
--
ALTER TABLE `testimonials_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `themes_tbl`
--
ALTER TABLE `themes_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `work_experience_tbl`
--
ALTER TABLE `work_experience_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
