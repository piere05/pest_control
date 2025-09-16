-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2025 at 02:20 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pest_control`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `alternate_mobile` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `trn_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `company_name`, `customer_name`, `email`, `mobile`, `alternate_mobile`, `location`, `trn_no`, `address`, `city`, `status`, `created_by`, `created_datetime`, `modified_by`, `modified_datetime`) VALUES
(2, 'Rancon', 'Johan', 'johangkjohangk287@gmail.com', '507558854', '501124456', '', '', 'Al Fattan Plaza Airport Road\r\n(D89), Al Garhoud', 'Dubai', 1, 1001, '2025-07-22 13:44:18', 1001, '2025-08-04 17:14:18'),
(3, 'Vegas', 'Amal', 'test@gmail.com', '555488897', '586969877', '', '', ' Marina Heights\r\nDubai Marina', 'Dubai', 1, 1001, '2025-07-22 17:05:50', 1001, '2025-09-10 11:50:25'),
(4, 'Walmart', 'Harish', 'test@gmail.com', '586969877', '565656565', '', '', 'Al Fattan Plaza Airport Road\r\n(D89), Al Garhoud', 'Dubai', 1, 1001, '2025-07-24 16:04:33', 1001, '2025-08-01 14:53:45'),
(8, 'Blue Sky Marketing', 'Praveen', 'piere2004amal@gmail.com', '586965477', '569687777', '', '', 'Al Rigga Road, Deira', 'Dubai', 1, 1001, '2025-07-30 13:32:39', 1001, '2025-09-15 12:08:06'),
(9, 'Logiyas', 'Logesh', 'logesh@gmail.com', '589367555', '586989555', '', '', 'Flat 402, Al Raffa Building\r\nStreet 12A, Al Mankhool', 'Dubai', 1, 1001, '2025-07-31 14:06:36', 1001, '2025-08-04 17:14:56'),
(10, 'Mist Solutions', 'Sujith', 'sujith@gmail.com', '701036617', '586996963', '', '', 'Sheikh Zayed Road, Trade Centre 2,', 'Dubai', 1, 1001, '2025-07-31 16:58:00', 1001, '2025-09-11 11:00:43'),
(11, 'sss ', 'Mani R', 'mani@gmail.com', '569685558', '586715655', '', '', 'Office 405, Al Maktoum Building, Deira', 'Dubai', 1, 1001, '2025-08-01 13:41:06', 1001, '2025-08-05 12:12:17'),
(12, 'Ramcon', 'Testq', 'ramcon@gmail.com', '934258574', '586989454', '', '', 'Flat 302, Al Fahidi Building,\r\nAl Waleed Street', 'Dubai', 1, 1001, '2025-08-05 15:59:39', 1001, '2025-08-05 16:04:03'),
(13, 'Joshco', 'Harish', 'piereamal@gmail.com', '569875585', '784572003', '', '', 'saff dsgds', 'dsdsfdsq', 1, 1001, '2025-08-05 16:07:41', 1001, '2025-09-08 18:27:46'),
(14, 'A2B', 'Nandha ', 'a2b@gmail.com', '586586586', '589696855', '', '', 'Al Fahidi Street, Bur Dubai', 'Dubai', 1, 1001, '2025-08-07 13:47:31', 1001, '2025-09-10 15:43:18'),
(15, 'Ragecom', 'Ramkumar', 'ram@gmail.com', '586936646', '', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '232323234323', 'Apartment 301, Al Murar Building  \r\nDeira,', 'Dubai', 1, 1001, '2025-08-14 18:20:19', 1001, '2025-08-18 15:26:25'),
(16, 'Ranconsadsda', 'Sujith', 'test@gmail.com', '586865465', '598545456', '', '', 'sdasadsdasda', 'Dubai', 1, 1001, '2025-08-25 18:43:34', 1001, '2025-09-10 15:40:55'),
(17, 'Mascos', 'James', 'james@gmail.com', '585858847', '', '', '', '1st Street, Downtown, Dubai', 'Dubai', 1, 1001, '2025-09-01 11:36:25', 0, '0000-00-00 00:00:00'),
(18, 'Mist Solutions', 'Amal', 'johangkjohangk287@gmail.com', '588787654', '589878978', '', '', 'sdasdasda\r\nsadsdasdasda', 'Dubai', 1, 1001, '2025-09-01 11:56:48', 1001, '2025-09-01 12:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `ratings` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `job_order`
--

CREATE TABLE `job_order` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `type_of_job` tinyint(4) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `customer_mobile` varchar(150) NOT NULL,
  `job_order_date` date NOT NULL,
  `site_id` int(11) NOT NULL,
  `site_name` varchar(150) NOT NULL,
  `site_address` text NOT NULL,
  `location` text DEFAULT NULL,
  `supervisor_id` int(11) NOT NULL,
  `supervisor_name` varchar(150) NOT NULL,
  `job_date` date NOT NULL,
  `job_time` varchar(11) NOT NULL,
  `job_description` text NOT NULL,
  `total_amount` varchar(150) NOT NULL,
  `type_of_report` tinyint(4) NOT NULL,
  `is_mail_sent` int(11) NOT NULL,
  `feedback_posted` int(11) NOT NULL,
  `status` tinyint(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_order`
--

INSERT INTO `job_order` (`id`, `quotation_id`, `customer_id`, `type_of_job`, `company_name`, `customer_mobile`, `job_order_date`, `site_id`, `site_name`, `site_address`, `location`, `supervisor_id`, `supervisor_name`, `job_date`, `job_time`, `job_description`, `total_amount`, `type_of_report`, `is_mail_sent`, `feedback_posted`, `status`, `created_datetime`, `modified_datetime`) VALUES
(1, 25, 8, 0, 'Blue Sky Marketing', '586965477', '2025-08-05', 8, 'Blue Sky', 'Down Town, Dubai', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1007, 'Raja', '2025-08-30', '11:00 AM', '', '840.00', 0, 0, 0, 1, '2025-08-05 13:04:19', '0000-00-00 00:00:00'),
(2, 28, 12, 0, 'Ramcon', '934258574', '2025-08-05', 20, 'SRMV Builders', '2nd Street, Down Town, Dubai', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 1007, 'Raja', '2025-08-15', '10:00 AM', '', '262.50', 0, 0, 0, 1, '2025-08-05 16:04:37', '0000-00-00 00:00:00'),
(4, 24, 8, 0, 'Blue Sky Marketing', '586965477', '2025-08-05', 17, 'Blue Sky new', 'Down Town, Dubai', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-08-25', '3:00 PM', '', '367.50', 1, 0, 0, 3, '2025-08-05 16:12:16', '0000-00-00 00:00:00'),
(5, 29, 13, 0, 'Joshco', '569875585', '2025-08-05', 20, 'SRMV Builders', 'SRMV Builders, Mall Road, Dubai', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 1007, 'Raja', '2025-08-07', '4:00 PM', '', '8295.00', 2, 0, 0, 3, '2025-08-05 16:28:57', '0000-00-00 00:00:00'),
(6, 30, 14, 0, 'A2B', '586586586', '2025-08-07', 21, 'A2B ', 'Villa 42, Al Wasl Road\r\nJumeirah 1 Dubai', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 1010, 'Amal', '2025-08-30', '10:00 AM', '', '577.50', 0, 0, 0, 3, '2025-08-07 13:56:59', '0000-00-00 00:00:00'),
(7, 17, 2, 0, 'Rancon', '507558854', '2025-08-07', 2, 'ABC Textiles, Coimbatore', 'saasss', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1007, 'Raja', '2025-08-21', '9:00 AM', '', '105.00', 0, 0, 0, 1, '2025-08-07 17:59:49', '0000-00-00 00:00:00'),
(8, 31, 14, 0, 'A2B', '586586586', '2025-08-08', 21, 'A2B ', 'Villa 42, Al Wasl Road\r\nJumeirah 1 Dubai', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 1010, 'Amal', '2025-08-18', '11:00 AM', '', '367.50', 0, 0, 0, 3, '2025-08-07 18:45:28', '0000-00-00 00:00:00'),
(9, 32, 3, 0, 'Vegas', '555488897', '2025-08-12', 16, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 1010, 'Amal', '2025-08-31', '11:00 AM', '', '1050.00', 0, 0, 0, 3, '2025-08-12 16:58:36', '0000-00-00 00:00:00'),
(10, 33, 3, 0, 'Vegas', '555488897', '2025-08-13', 16, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1007, 'Raja', '2025-08-30', '10:00 AM', '', '4725.00', 0, 0, 0, 0, '2025-08-13 16:17:42', '0000-00-00 00:00:00'),
(11, 36, 15, 0, 'Ragecom', '586936646', '2025-08-14', 24, 'Ragecom', 'Office 505, Sheikh Zayed Road,  \r\nBusiness Bay, Dubai  ', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 1010, 'Amal', '2025-08-28', '11:00 AM', '', '4620.00', 0, 0, 0, 3, '2025-08-14 18:28:42', '0000-00-00 00:00:00'),
(12, 37, 10, 0, 'Mist Solutions', '701036617', '2025-08-19', 25, 'Akshay', 'Akshay\r\nWarehouse , AL Quasis, Dubai,\r\nUAE', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-08-29', '10:00 AM', '', '1764.00', 0, 0, 0, 3, '2025-08-19 13:56:12', '0000-00-00 00:00:00'),
(13, 39, 16, 0, 'Ranconsadsda', '586865465', '2025-08-25', 26, 'sads', 'sdasda sdasdasdaasdasdas', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 1007, 'Raja', '2025-08-28', '8:00 AM', '', '525.00', 1, 0, 0, 1, '2025-08-25 18:43:59', '0000-00-00 00:00:00'),
(14, 38, 10, 0, 'Mist Solutions', '701036617', '2025-08-26', 25, 'Akshay', 'Akshay\r\nWarehouse , AL Quasis, Dubai,\r\nUAE', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-03', '11:00 AM', '', '262.50', 0, 0, 0, 3, '2025-08-26 10:08:41', '0000-00-00 00:00:00'),
(15, 18, 2, 0, 'Rancon', '507558854', '2025-08-26', 6, 'Mist Solutions', 'Dubai Silicon Oasisdsds', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 1007, 'Raja', '2025-08-27', '11:00 AM', '', '105.00', 0, 0, 0, 0, '2025-08-26 16:30:36', '0000-00-00 00:00:00'),
(18, 41, 3, 0, 'Vegas', '555488897', '2025-09-02', 16, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-06', '11:00 AM', '', '525.00', 0, 0, 0, 3, '2025-09-02 15:15:04', '0000-00-00 00:00:00'),
(19, 43, 18, 0, 'Mist Solutions', '588787654', '2025-09-02', 28, 'Vadavalli', 'sdasdasda\r\nsdadsasda', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-26', '9:00 AM', '', '105.00', 0, 0, 0, 3, '2025-09-02 15:17:21', '0000-00-00 00:00:00'),
(20, 44, 8, 0, 'Blue Sky Marketing', '586965477', '2025-09-02', 17, 'Blue Sky new', 'Down Town, Dubai', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-28', '5:00 AM', '', '525.00', 0, 0, 0, 3, '2025-09-02 15:23:26', '0000-00-00 00:00:00'),
(21, 23, 10, 0, 'Mist Solutions', '701036617', '2025-09-02', 10, 'Deira', '110, Raju naidu Street, Deira, Dubai', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-06', '10:00 AM', '', '105.00', 2, 0, 0, 0, '2025-09-02 18:54:40', '0000-00-00 00:00:00'),
(22, 22, 9, 0, 'Logiyas', '589367555', '2025-09-02', 9, 'Logiyas', 'Fourth Cross Street, Down Town, Dubai', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-07', '7:00 AM', '', '273.00', 1, 0, 0, 3, '2025-09-02 18:56:04', '0000-00-00 00:00:00'),
(23, 45, 3, 0, 'Vegas', '555488897', '2025-09-08', 16, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-11', '10:00 AM', '', '525.00', 1, 0, 0, 3, '2025-09-08 10:12:03', '0000-00-00 00:00:00'),
(24, 46, 13, 0, 'Joshco', '569875585', '2025-09-08', 29, 'Jos', 'sdsddddssdsd', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1010, 'Amal', '2025-09-19', '4:00 AM', '', '105.00', 0, 0, 0, 3, '2025-09-08 18:28:11', '0000-00-00 00:00:00'),
(25, 47, 3, 1, 'Vegas', '555488897', '2025-09-10', 16, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1011, 'Kavin', '2025-09-11', '9:00 AM', '', '1050.00', 0, 0, 0, 0, '2025-09-10 15:32:25', '0000-00-00 00:00:00'),
(26, 47, 3, 1, 'Vegas', '555488897', '2025-09-10', 16, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1011, 'Kavin', '2025-12-11', '9:00 AM', '', '1050.00', 0, 0, 0, 0, '2025-09-10 15:32:25', '0000-00-00 00:00:00'),
(27, 47, 3, 1, 'Vegas', '555488897', '2025-09-10', 16, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1011, 'Kavin', '2026-03-11', '9:00 AM', '', '1050.00', 0, 0, 0, 0, '2025-09-10 15:32:25', '0000-00-00 00:00:00'),
(28, 48, 8, 0, 'Blue Sky Marketing', '586965477', '2025-09-10', 17, 'Blue Sky new', 'Down Town, Dubai', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 1011, 'Kavin', '2025-09-26', '8:00 AM', '', '262.50', 1, 0, 0, 0, '2025-09-10 15:39:57', '0000-00-00 00:00:00'),
(29, 49, 16, 1, 'Ranconsadsda', '586865465', '2025-09-10', 30, 'sads', 'sdasda sdasdasdaasdasdas', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 1010, 'Amal', '2025-09-20', '9:00 AM', '', '525.00', 0, 0, 0, 0, '2025-09-10 15:41:24', '0000-00-00 00:00:00'),
(30, 49, 16, 1, 'Ranconsadsda', '586865465', '2025-09-10', 30, 'sads', 'sdasda sdasdasdaasdasdas', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 1010, 'Amal', '2025-09-27', '9:00 AM', '', '525.00', 0, 0, 0, 0, '2025-09-10 15:41:24', '0000-00-00 00:00:00'),
(31, 49, 16, 1, 'Ranconsadsda', '586865465', '2025-09-10', 30, 'sads', 'sdasda sdasdasdaasdasdas', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 1010, 'Amal', '2025-10-04', '9:00 AM', '', '525.00', 0, 0, 0, 0, '2025-09-10 15:41:24', '0000-00-00 00:00:00'),
(32, 50, 14, 1, 'A2B', '586586586', '2025-09-10', 31, 'A2B ', 'Villa 42, Al Wasl Road\r\nJumeirah 1 Dubai', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 1010, 'Amal', '2025-09-11', '9:00 AM', '', '262.50', 0, 0, 0, 0, '2025-09-10 15:43:59', '0000-00-00 00:00:00'),
(33, 52, 8, 1, 'Blue Sky Marketing', '586965477', '2025-09-11', 17, 'Blue Sky new', 'Down Town, Dubai', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1011, 'Kavin', '2025-09-19', '10:00 AM', '', '1050.00', 1, 0, 0, 0, '2025-09-11 13:01:48', '0000-00-00 00:00:00'),
(34, 52, 8, 1, 'Blue Sky Marketing', '586965477', '2025-09-11', 17, 'Blue Sky new', 'Down Town, Dubai', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 1011, 'Kavin', '2025-09-26', '10:00 AM', '', '1050.00', 1, 0, 0, 0, '2025-09-11 13:01:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_order_details`
--

CREATE TABLE `job_order_details` (
  `id` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `inspection_image1` varchar(255) NOT NULL,
  `inspection_image2` varchar(255) NOT NULL,
  `inspection_image3` varchar(255) NOT NULL,
  `inspection_image4` varchar(255) NOT NULL,
  `inspection_image5` varchar(255) NOT NULL,
  `inspection_description` text NOT NULL,
  `before_image1` varchar(255) NOT NULL,
  `before_image2` varchar(255) NOT NULL,
  `before_image3` varchar(255) NOT NULL,
  `before_image4` varchar(255) NOT NULL,
  `before_image5` varchar(255) NOT NULL,
  `service_image1` varchar(255) NOT NULL,
  `service_image2` varchar(255) NOT NULL,
  `service_image3` varchar(255) NOT NULL,
  `service_image4` varchar(255) NOT NULL,
  `service_image5` varchar(255) NOT NULL,
  `after_image1` varchar(255) NOT NULL,
  `after_image2` varchar(255) NOT NULL,
  `after_image3` varchar(255) NOT NULL,
  `after_image4` varchar(255) NOT NULL,
  `after_image5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_order_details`
--

INSERT INTO `job_order_details` (`id`, `job_order_id`, `inspection_image1`, `inspection_image2`, `inspection_image3`, `inspection_image4`, `inspection_image5`, `inspection_description`, `before_image1`, `before_image2`, `before_image3`, `before_image4`, `before_image5`, `service_image1`, `service_image2`, `service_image3`, `service_image4`, `service_image5`, `after_image1`, `after_image2`, `after_image3`, `after_image4`, `after_image5`) VALUES
(2, 8, '2025081917170546849_bg.png', '202508191717057182_Capture.JPG', '', '', '', 'Need Pest Control for 1200sqft', '2025082012371562807_bg_(1).png', '', '', '', '', '2025082012550013545_bg.png', '2025082012550178626_download.jpg', '', '', '', '2025082012550195842_best-cooling-tower-motors_IMGCentury.webp', '2025082012550197222_kodai-resorts_IMGCentury_(1).webp', '2025082012550185329_bus-stop_9252511.png', '2025082012550126295_ab-1.png', ''),
(3, 9, '2025082013030647877_file_(1).png', '2025082013030684309_file.webp', '', '', '', 'system or organization that provides the public with something that it needs', '2025082013080469489_pic3.jpg', '2025082013080454597_top3.jpg', '2025082013080464369_5.jpg', '', '', '2025082013080539842_about.jpg', '2025082013080586199_after-img-one.jpg', '2025082013080518891_why-renewable-2.jpg', '', '', '2025082610583935444_file_(1).png', '202508261058394169_Untitled.png', '2025082610583930033_3e91bdf6-b12f-475c-afae-5cd4e6e8ccb3.webp', '', ''),
(4, 11, '2025082013224788798_bg4.jpg', '2025082013224782597_ab1.png', '', '', '', 'Services cover only the pests and areas mentioned in the quotation.', '2025082211572447523_202638-simple-light-color-background-vector-eps.jpg', '', '', '', '', '2025090214063596005_Adobe_Express_-_file.jpg', '', '', '', '', '', '', '', '', ''),
(5, 4, '', '', '', '', '', '', '2025082112075013005_13.jpg', '2025082112075095753_file_(1).png', '', '', '', '', '', '', '', '', '2025082112083398454_faq.jpg', '2025082112083312356_file_(2).png', '', '', ''),
(6, 5, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '2025082212054639263_after-img-one.jpg', '2025082212054618909_ab1.png', '', '', ''),
(7, 6, '2025082813031527617_bg.png', '', '', '', '', '', '2025090210222754545_bg.png', '2025090210222750943_tt-1718023034590.webp', '2025090210222721652_51Tm1zXTBhL.jpg', '', '', '2025090210222754465_best-cooling-tower-motors_IMGCentury.webp', '2025090210222787584_file_(1).png', '', '', '', '', '', '', '', ''),
(8, 12, '2025090210502952573_bg.png', '', '', '', '', '', '2025090210502989389_51Tm1zXTBhL.jpg', '', '', '', '', '2025090211020097653_bg.png', '', '', '', '', '2025090211020072397_tt-1718023034590.webp', '', '', '', ''),
(9, 14, '2025090213525892335_bg.png', '', '', '', '', '', '', '', '', '', '', '2025090213562360148_unnamed.jpg', '', '', '', '', '', '', '', '', ''),
(10, 18, '2025090215161392131_download_(6).jpeg', '202509021516139837_unnamed_(1).jpg', '', '', '', '', '', '', '', '', '', '202509021516523754_bg.png', '2025090215165224592_unnamed.jpg', '', '', '', '', '', '', '', ''),
(11, 19, '2025090215181454407_bg.png', '20250902151814973_sa.jpg', '', '', '', '', '202509021518147971_Capture.JPG', '2025090215181477363_13.jpg', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(12, 20, '2025090215243638785_bg_(1).png', '2025090215243652457_download_(6).jpeg', '', '', '', '', '2025090215243699806_bg.png', '2025090215243620566_Capture.JPG', '', '', '', '2025090215371823839_bg.png', '2025090215371858326_download_(2).jpg', '', '', '', '2025090215371876030_Untitled.png', '2025090215371845159_logo_(5).png', '', '', ''),
(13, 23, '2025090810140876697_bg.png', '', '', '', '', '', '2025090810140953227_51Tm1zXTBhL.jpg', '2025090810140953393_qrcode_www.google.com.png', '', '', '', '2025090810144460776_51Tm1zXTBhL.jpg', '2025090810144445701_FCWEUHFSCYWM4YBK_4.webp', '2025090810144499215_images.jpg', '', '', '2025090810144474148_bg.png', '', '', '', ''),
(14, 22, '2025090817480435782_download_(6).jpeg', '', '', '', '', '', '2025090817480479973_bg.png', '', '', '', '', '2025090817481760797_bg.png', '', '', '', '', '2025090817481742882_faq.jpg', '', '', '', ''),
(15, 24, '2025090818283373434_2025082715072124008_Featured_image.jpeg', '2025090818283396315_unnamed.jpg', '', '', '', '', '', '', '', '', '', '2025090818284728854_bg.png', '2025090818284791726_11.jpg', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `job_order_product`
--

CREATE TABLE `job_order_product` (
  `id` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_type` varchar(150) NOT NULL,
  `duration` varchar(150) NOT NULL,
  `amc_fromdate` date NOT NULL,
  `amc_todate` date NOT NULL,
  `amc_description` text NOT NULL,
  `amount` varchar(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `total` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_order_product`
--

INSERT INTO `job_order_product` (`id`, `job_order_id`, `job_type_id`, `job_type`, `duration`, `amc_fromdate`, `amc_todate`, `amc_description`, `amount`, `vat`, `total`, `description`, `created_datetime`) VALUES
(1, 1, 0, 'Mosquito control', 'amc', '2025-08-09', '2025-11-27', 'sdasdasda sasdadsasa', '800', 5, '840.00', 'sdsdaasd', '2025-08-05 13:04:19'),
(2, 2, 0, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', '250', 5, '262.50', 'sdsafdsadssasadada', '2025-08-05 16:04:37'),
(5, 4, 0, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', '350', 5, '367.50', 'saadsdas csasasadsdasda', '2025-08-05 16:12:16'),
(6, 5, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', '2400', 5, '2520.00', 'test', '2025-08-05 16:28:57'),
(7, 5, 0, 'Mosquito control', 'amc', '2025-08-13', '2027-06-09', 'fhfd gfdg', '5500', 5, '5775.00', 'dgdfgfd gfd', '2025-08-05 16:28:57'),
(8, 6, 0, 'Water Tank Clean', 'one-time', '0000-00-00', '0000-00-00', '', '550', 5, '577.50', 'Need High Water Tank Cleaning ', '2025-08-07 13:56:59'),
(9, 7, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', '100', 5, '105.00', 'dsdssd', '2025-08-07 17:59:49'),
(10, 8, 0, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', '350', 5, '367.50', 'assd asassdsad', '2025-08-07 18:45:28'),
(11, 9, 0, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', '1000', 5, '1050.00', 'asdasdsdasadd', '2025-08-12 16:58:36'),
(12, 10, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', '500', 5, '525.00', 'adasddsad', '2025-08-13 16:17:42'),
(13, 10, 7, 'General Pest Control', 'amc', '2025-09-06', '2025-08-29', 'ssadsasdas sasdasdasdasads', '4000', 5, '4200.00', 'a sacsasdasdsad ', '2025-08-13 16:17:42'),
(14, 11, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', '600', 5, '630.00', 'asdsadsadd', '2025-08-14 18:28:42'),
(15, 11, 9, 'Tap Pest Cleaning ', 'amc', '2025-08-15', '2025-11-15', 'sadsa dssdadsa dasdas dasda ass xsdasdads adsa', '3800', 5, '3990.00', 'asdasasd xsadsdasda', '2025-08-14 18:28:42'),
(16, 12, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', '180', 5, '189.00', 'sdsadsasda', '2025-08-19 13:56:12'),
(17, 12, 7, 'General Pest Control', 'amc', '2025-08-27', '2025-09-13', 'sasadsad  sasdasdasdasda cxsfsdadsasdasda', '1500', 5, '1575.00', 'asasddsa sadsddsadasds', '2025-08-19 13:56:12'),
(18, 13, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', '500', 5, '525.00', 'asdasdsdasad', '2025-08-25 18:43:59'),
(19, 14, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', '250', 5, '262.50', '', '2025-08-26 10:08:41'),
(20, 15, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', '100', 5, '105.00', 'sdsfdsfdd', '2025-08-26 16:30:36'),
(23, 18, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', '500', 5, '525.00', 'sadasdasdd', '2025-09-02 15:15:04'),
(24, 19, 8, 'Water Tank Clean', 'one-time', '0000-00-00', '0000-00-00', '', '100', 5, '105.00', 'sdsdsa', '2025-09-02 15:17:21'),
(25, 20, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', '500', 5, '525.00', '', '2025-09-02 15:23:26'),
(26, 21, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', '100', 5, '105.00', 'fgedfsdsdsfds', '2025-09-02 18:54:40'),
(27, 22, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', '260', 5, '273.00', 'sddd', '2025-09-02 18:56:04'),
(28, 23, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', '500', 5, '525.00', 'dadsfsdds', '2025-09-08 10:12:03'),
(29, 24, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', '100', 5, '105.00', 'asdssas', '2025-09-08 18:28:11'),
(30, 25, 6, 'Mosquito control', 'amc', '2025-09-19', '2026-07-31', 'sdasdsddssdasd', '1000', 5, '1050.00', '', '2025-09-10 15:32:25'),
(31, 26, 6, 'Mosquito control', 'amc', '2025-09-19', '2026-07-31', 'sdasdsddssdasd', '1000', 5, '1050.00', '', '2025-09-10 15:32:25'),
(32, 27, 6, 'Mosquito control', 'amc', '2025-09-19', '2026-07-31', 'sdasdsddssdasd', '1000', 5, '1050.00', '', '2025-09-10 15:32:25'),
(33, 28, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', '250', 5, '262.50', 'asdassdasdsd', '2025-09-10 15:39:57'),
(34, 29, 9, 'Tap Pest Cleaning ', 'amc', '2025-09-25', '2026-03-28', 'ssasdsdsdfds', '500', 5, '525.00', 'fghfghg', '2025-09-10 15:41:24'),
(35, 30, 9, 'Tap Pest Cleaning ', 'amc', '2025-09-25', '2026-03-28', 'ssasdsdsdfds', '500', 5, '525.00', 'fghfghg', '2025-09-10 15:41:24'),
(36, 31, 9, 'Tap Pest Cleaning ', 'amc', '2025-09-25', '2026-03-28', 'ssasdsdsdfds', '500', 5, '525.00', 'fghfghg', '2025-09-10 15:41:24'),
(37, 32, 6, 'Mosquito control', 'amc', '2025-09-27', '2025-10-04', 'sddsasaddas', '250', 5, '262.50', 'sdasasdsd', '2025-09-10 15:43:59'),
(38, 33, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', '1000', 5, '1050.00', 'fdsfdssdf', '2025-09-11 13:01:48'),
(39, 34, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', '1000', 5, '1050.00', 'fdsfdssdf', '2025-09-11 13:01:48');

-- --------------------------------------------------------

--
-- Table structure for table `job_type`
--

CREATE TABLE `job_type` (
  `id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `scope_of_work` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_type`
--

INSERT INTO `job_type` (`id`, `job_type`, `scope_of_work`, `status`, `created_by`, `created_datetime`, `modified_by`, `modified_datetime`) VALUES
(2, 'Termite Control', 'Termite control involves treating and preventing termite infestations to protect structures from damage.', '1', 1001, '2025-07-21 12:00:23', 1001, '2025-08-04 10:31:33'),
(4, 'Bed bug treatment', 'Bed bug treatment eliminates bed bugs through safe, effective chemical or heat-based solutions.', '1', 1001, '2025-07-24 18:25:06', 1001, '2025-08-04 10:30:59'),
(5, 'Rodent removal', 'Mosquito Control Service includes site\r\ninspection, identification of breeding sources,\r\nelimination of stagnant water, application of\r\nlarvicides, fogging treatment, monitoring\r\nmosquito activity, advising on preventive\r\nmeasures, and maintaining service records. This\r\ncomprehensive approach ensures effective\r\nmosquito management and supports a healthier,\r\nsafer environment.', '1', 1001, '2025-07-24 18:25:17', 1001, '2025-09-15 10:24:43'),
(6, 'Mosquito control', 'Mosquito Control Service includes site\r\ninspection, identification of breeding sources,\r\nelimination of stagnant water, application of\r\nlarvicides, fogging treatment, monitoring\r\nmosquito activity, advising on preventive\r\nmeasures, and maintaining service records. This\r\ncomprehensive approach ensures effective\r\nmosquito management and supports a healthier,\r\nsafer environment.', '1', 1001, '2025-07-24 18:25:25', 1001, '2025-09-15 10:22:24'),
(7, 'General Pest Control', 'assas csdsasa saasdd sasdasda\r\ndsas dsadsa asdsdasad', '1', 1001, '2025-07-25 12:29:44', 1001, '2025-08-04 10:29:01'),
(8, 'Water Tank Clean', 'Deep Cleaning Service – Scope of Work\r\nService Detail: Kitchen: Cleaning of\r\nkitchen cabinet & drawers (Emptied by\r\nclient) Cleaning sink &\r\nfaucets De-greasing of kitchen hood\r\n(only Outside area) Cleaning of kitchen\r\nappliance outside. Deep cleaning of\r\nkitchen flooring Toilet: 1) Cleaning\r\nof toilet cabinets & drawers (Emptied by\r\nthe client) 2) Cleaning of the toilet\r\nsink, toilet walls (Only tile area),\r\ntoilet flooring, toilet seat, mirrors &\r\nglass doors 3) Deep cleaning for the\r\nshower area General: Cleaning of\r\nbedroom cabinets (Emptied by the\r\nclient) Cleaning of light\r\nfixtures Cleaning of AC grills\r\n(Accessible) Cleaning of\r\ncorners Cleaning of internal\r\nwidows Cleaning of windowsills and\r\nframes Cleaning of glass door &\r\nsills Cleaning of wooden\r\ndoors Flooring: 1) Cleaning of all\r\nTiles & marble flooring using scrubber\r\nmachines. 2) Removal of paint marks\r\nwhere possible from flooring & windows\r\n(where possible) External: 1) Deep\r\ncleaning of balcony floor (where\r\naccessible – indoor part only) 2)\r\nDeep cleaning of balcony handrail &\r\ncorners (where accessible – indoor\r\npart only) Excluded: 1) Sofa,\r\nCarpets 2) Kitchen Utensils 3) Area\r\nCannot be accessed by 2 to 4 m ladder.', '1', 1001, '2025-08-04 13:55:53', 1001, '2025-09-01 12:20:42'),
(9, 'Tap Pest Cleaning ', '', '1', 1001, '2025-08-12 10:48:17', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` int(11) NOT NULL,
  `lead_type` varchar(255) NOT NULL,
  `job_type` varchar(150) NOT NULL,
  `required_date` date DEFAULT NULL,
  `required_time` varchar(150) NOT NULL,
  `location` text NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `site_name` varchar(150) NOT NULL,
  `site_address` text NOT NULL,
  `work_description` text NOT NULL,
  `lead_priority` varchar(150) NOT NULL,
  `is_inspection_required` tinyint(4) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `supervisor_name` varchar(255) NOT NULL,
  `inspection_date` date NOT NULL,
  `inspection_time` varchar(150) NOT NULL,
  `inspection_description` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL,
  `image5` varchar(255) NOT NULL,
  `inspection_status` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL,
  `inspected_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leads`
--

INSERT INTO `leads` (`id`, `lead_type`, `job_type`, `required_date`, `required_time`, `location`, `company_name`, `customer_name`, `mobile`, `email`, `site_name`, `site_address`, `work_description`, `lead_priority`, `is_inspection_required`, `supervisor_id`, `supervisor_name`, `inspection_date`, `inspection_time`, `inspection_description`, `image1`, `image2`, `image3`, `image4`, `image5`, `inspection_status`, `status`, `created_datetime`, `modified_datetime`, `inspected_datetime`) VALUES
(1, 'Email', 'Bed bug treatment', '0000-00-00', '', '', 'MakeWell', 'Piere', '569686966', '', 'EA Mall, Downtown', 'EA Mall, Downtown, Dubai ', 'Need much pest control for 1200sqft', 'hot', 0, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-07-28 15:29:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'Phone Call', 'Termite Control', '0000-00-00', '', '', 'Joshco', 'Harish', '569875585', '', 'SRMV Builders', 'SRMV Builders, Mall Road, Dubai', 'sd, dfmdnd dsn fmdfn dnd fmn msnd md fn ', 'hot', 1, 1010, 'Amal', '2025-07-31', '11:00 AM', 'Inspection Completed and  need general pest control for 1200sqft', '2025072817512067973_forgot-2.png', '2025072817512018662_user.png', '2025072818332068586_award.png', '', '', 1, 1, '2025-07-28 15:32:57', '0000-00-00 00:00:00', '2025-07-29 11:53:06'),
(3, 'Referral', 'Mosquito control', '0000-00-00', '', '', 'Rancon', 'Testq', '586969877', '', 'ABC Textiles', 'Down Town, Dubai', 'dasd  dasbsda njbsdanb nbsdanbsda ', 'cold', 0, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-07-28 18:38:55', '2025-07-29 12:50:28', '0000-00-00 00:00:00'),
(4, 'Phone Call', 'Termite Control', '0000-00-00', '', '', 'sadsdaasdsa', 'Harish', '586622144', '', 'Placzo Mina ', 'Dubai ', 'sds dsd, mnm m,dsnsd ', 'hot', 1, 1011, 'Kavin', '2025-07-30', '11:00 AM', 'assadasasdsssda', '2025081912040874454_3e91bdf6-b12f-475c-afae-5cd4e6e8ccb3.webp', '2025081912040822612_file_(1).png', '2025081912040854588_best-montessori-montessori-for-pre-kindergarten.png', '', '', 1, 0, '2025-07-28 18:41:05', '0000-00-00 00:00:00', '2025-08-19 12:04:08'),
(6, 'Website', 'Rodent removal', '0000-00-00', '', '', 'Ramcon', 'Testq', '934258574', '', 'SRMV Builders', '2nd Street, Down Town, Dubai ', 'sdknsd mnbsdnsd bjsd n nm n bsdnm ', 'hot', 1, 1007, 'Raja', '2025-08-04', '12:00 PM', 'dfsd d sdfsdf sdf dsfsdf', '2025080411210420824_best-montessori-montessori-for-pre-kindergarten.png', '2025080411210447442_ab-1.png', '', '', '2025080114571076360_FCWEUHFSCYWM4YBK_4.webp', 1, 1, '2025-07-29 11:19:31', '2025-07-29 11:57:38', '2025-08-04 11:21:04'),
(7, 'Whatsapp', 'Bed bug treatment', '0000-00-00', '', '', 'sss ', 'Mani', '569685558', '', 'Fourway Hotel', 'Al Shafar Tower 1, Dubai', 'Need Beg bug control for 1200sqft', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 1, 0, '2025-07-29 11:50:34', '2025-08-01 13:38:37', '0000-00-00 00:00:00'),
(8, 'Whatsapp', 'Termite Control', '0000-00-00', '', '', 'Blue Sky Marketing', 'Ranjith', '586967474', '', 'The Offices 3, One Central', 'World Trade Centre Area, Dubai', 'Need the termite control for 1200sqft', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-07-29 11:52:38', '2025-07-29 17:53:50', '0000-00-00 00:00:00'),
(9, 'Website', 'Rodent removal', '0000-00-00', '', '', 'Mist Solutions', 'Sujith', '701036617', '', 'Deira', '110, Raju naidu Street, Deira, Dubai', 'Need to Clean Water Tank', 'hot', 1, 1007, 'Raja', '2025-08-04', '5:00 PM', 'sadsad a sd asd', '2025072916254137909_fav-icon-1-Photoroom.png', '2025072916254166230_bg.png', '', '', '', 1, 1, '2025-07-29 16:19:15', '2025-07-29 16:24:34', '2025-07-29 16:25:41'),
(10, 'Website', 'Mosquito control', '0000-00-00', '', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 'sdsad', 'sadas', '555488897', 'sdsad@gmail.com', 'dgds', 'dsgds', 'dsgsdg', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-07-29 16:32:28', '2025-08-04 12:50:03', '0000-00-00 00:00:00'),
(11, 'Website', 'Bed bug treatment', '0000-00-00', '', '', 'Blue Sky Marketing', 'Praveen', '586965477', '', 'Blue Sky', 'Down Town, Dubai', 'Need pest control for 1200sqft', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 1, '2025-07-30 10:16:43', '2025-07-30 10:19:54', '0000-00-00 00:00:00'),
(12, 'Whatsapp', 'Rodent removal', '0000-00-00', '', '', 'Logiyas', 'Logesh', '589367555', '', 'Logiyas', 'Fourth Cross Street, Down Town, Dubai', 'Need Rodent Removal for 1200sqft and need general clean up for 1500sqft', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-07-31 13:58:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'Website', 'General Pest Control', '2025-08-05', '11:00AM', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 'Rancon', 'Amal', '586855554', 'amaln@gmail.com', 'DFD ', '3rd Floor ,Down Town', 'Need Pest Control for 1200sqft', 'hot', 0, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-08-04 12:02:21', '2025-08-04 12:59:59', '0000-00-00 00:00:00'),
(14, 'Website', 'Water Tank Clean', '2025-08-09', '11:00AM', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 'EDS', 'Natham', '586967454', 'eds@gmail.com', 'EDS Construction', 'Sheikh Rashid Road,\r\nNear Dubai  Airport,', 'Need to clean 10000ltr water tank ', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-08-04 13:38:23', '2025-08-04 18:18:30', '0000-00-00 00:00:00'),
(15, 'Instagram', 'Mosquito control', '2025-08-18', '8:00AM', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 'Mist Solutions', 'Sujith', '569685558', 'sujith@gmail.com', 'ABC Textiles', 'ABC Textiles, Dubai ', 'dssadsda cxsdsddsdsd', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-08-04 14:41:06', '2025-08-04 18:18:19', '0000-00-00 00:00:00'),
(16, 'Instagram', 'Water Tank Clean', '2025-08-30', '10:00AM', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', 'A2B', 'Nandha ', '586586586', 'a2b@gmail.com', 'A2B ', 'Villa 42, Al Wasl Road\r\nJumeirah 1 Dubai', 'Need Deep Water Tank Cleaning for 1000ltr water tank ', 'hot', 1, 1007, 'Raja', '2025-08-19', '10:00 AM', 'Inspection Completed and Need medium water cleaning ', '2025080713370661446_17545539922053775642181651459776.jpg', '2025080713370688978_17545540062054061457032441690407.jpg', '2025080713370712750_1754554014712896885364084450838.jpg', '', '', 1, 1, '2025-08-07 13:35:04', '0000-00-00 00:00:00', '2025-08-07 13:43:28'),
(18, 'Website', 'Tap Pest Cleaning ', '0000-00-00', '', '', '', 'Raju', '568565854', 'raju@gmail.com', '', '12A, Cross Walk, Down Town Dubai', '', 'hot', 3, 0, '', '0000-00-00', ':00 AM', '', '', '', '', '', '', 0, 0, '2025-08-12 10:49:41', '2025-08-12 11:10:40', '0000-00-00 00:00:00'),
(19, 'Whatsapp', 'Water Tank Clean', '0000-00-00', '', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', 'Rancon', 'Sujith', '586865465', 'test@gmail.com', '', 'sdasda sdasdasdaasdasdas', 'sdasd csdasasdasdasdasdads', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 1, '2025-08-14 13:27:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(20, 'Website', 'General Pest Control', '0000-00-00', '', '', '', 'Ramkumar', '586936646', 'ram@gmail.com', '', 'Office 505, Sheikh Zayed Road,  \r\nBusiness Bay, Dubai  ', '', 'hot', 3, 0, '', '0000-00-00', ':00 AM', '', '', '', '', '', '', 0, 1, '2025-08-14 18:17:08', '2025-08-14 18:17:52', '0000-00-00 00:00:00'),
(21, 'Direct Marketing', 'Tap Pest Cleaning ', '0000-00-00', '', '', 'Mist Solutions', 'Mani', '701036617', 'sujith.mist@gmail.com', '', 'Akshay\r\nWarehouse , AL Quasis, Dubai,\r\nUAE', 'Deep Cleaning of Flat. Special attention Given\r\nto the AC Grills. Customer needs Perfect Cleaning of Flat', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 1, '2025-08-18 15:32:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'Instagram', 'Water Tank Clean', '0000-00-00', '', '', 'Mascos', 'James', '585858847', 'james@gmail.com', '', '1st Street, Downtown, Dubai', 'sdadsa dsaksdankdsndsa  sdanbsdajnsbdbhadsads', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-09-01 11:35:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(23, 'Referral', 'Tap Pest Cleaning ', '0000-00-00', '', '', 'Mist Solutions', 'Amal', '588787654', 'johangkjohangk287@gmail.com', '', 'sdasdasda\r\nsdadsasda', 'asasddsadsasda', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 1, '2025-09-01 11:56:19', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(24, 'Website', 'Water Tank Clean', '0000-00-00', '', '', '', 'Piere', '598789798', 'test@gmail.com', '', 'sdasdasdasdasd', 'dsdasdasdasda\r\nssdsdsdsdsdaasd', 'hot', 3, 0, '', '0000-00-00', ':00 AM', '', '', '', '', '', '', 0, 0, '2025-09-02 13:12:01', '2025-09-02 13:29:20', '0000-00-00 00:00:00'),
(25, 'Website', 'sadsdasdas', '0000-00-00', '', '', '', 'Amal', '934258574', 'johangkjohangk287@gmail.com', '', 'sadsdasada', '', '', 0, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-09-02 13:44:06', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(26, 'Referral', 'Tap Pest Cleaning ', '0000-00-00', '', '', 'Joshco', 'Harish', '569875585', 'piere2004amal@gmail.com', '', 'sdsddddssdsd', 'dfdfdfdsfddsfdf', 'hot', 3, 0, '', '0000-00-00', ':00 AM', '', '', '', '', '', '', 0, 1, '2025-09-08 18:11:16', '2025-09-08 18:11:45', '0000-00-00 00:00:00'),
(27, 'Instagram', 'Mosquito control', '0000-00-00', '', '', 'A2B', 'Nandha', '586586586', 'a2b@gmail.com', '', 'dsadssdaasdsd', 'sadsdasdads', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 0, '2025-09-11 14:48:17', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'Email', 'Water Tank Clean', '0000-00-00', '', '', 'SRMV', 'Arun', '588798679', 'srmv@gmail.com', 'ssdaadsasdasd', 'dsdsaddsdas', 'asddsadsadsaads', 'hot', 3, 0, '', '0000-00-00', ':00 AM', '', '', '', '', '', '', 0, 0, '2025-09-15 11:45:28', '2025-09-15 11:45:41', '0000-00-00 00:00:00'),
(29, 'Email', 'General Pest Control', '0000-00-00', '', '', 'Blue Sky Marketing', 'Praveen', '586965477', 'piere2004amal@gmail.com', '', 'Down Town, Dubai', 'saasddsasd', 'hot', 3, 0, '', '0000-00-00', '', '', '', '', '', '', '', 0, 1, '2025-09-15 11:48:50', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lead_type`
--

CREATE TABLE `lead_type` (
  `id` int(11) NOT NULL,
  `lead_type` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lead_type`
--

INSERT INTO `lead_type` (`id`, `lead_type`, `status`, `created_by`, `created_datetime`, `modified_by`, `modified_datetime`) VALUES
(1, 'Phone Call', '1', 1001, '2025-07-21 11:39:18', 1001, '2025-07-21 12:00:03'),
(3, 'Whatsapp', '1', 1001, '2025-07-21 14:17:16', 0, '0000-00-00 00:00:00'),
(4, 'Email', '1', 1001, '2025-07-21 14:17:21', 0, '0000-00-00 00:00:00'),
(5, 'Referral', '1', 1001, '2025-07-21 14:17:49', 0, '0000-00-00 00:00:00'),
(6, 'Instagram', '1', 1001, '2025-07-25 10:35:41', 0, '0000-00-00 00:00:00'),
(7, 'Direct Marketing', '1', 1001, '2025-07-25 12:29:29', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `pestcontrol_report`
--

CREATE TABLE `pestcontrol_report` (
  `id` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `site_incharge` varchar(150) NOT NULL,
  `site_mobile` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `visit_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` varchar(150) NOT NULL,
  `end_time` varchar(150) NOT NULL,
  `inspection_details` text NOT NULL,
  `sanitation_level` varchar(255) NOT NULL,
  `infestation_level` tinyint(4) NOT NULL,
  `type_of_treatment` text NOT NULL,
  `area` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `customer_sign_name` varchar(255) NOT NULL,
  `customer_sign_mobile` varchar(150) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pestcontrol_report`
--

INSERT INTO `pestcontrol_report` (`id`, `job_order_id`, `sl_no`, `client_name`, `site_name`, `mobile`, `site_incharge`, `site_mobile`, `address`, `visit_no`, `date`, `start_time`, `end_time`, `inspection_details`, `sanitation_level`, `infestation_level`, `type_of_treatment`, `area`, `remarks`, `customer_sign_name`, `customer_sign_mobile`, `created_datetime`) VALUES
(1, 8, 3, 'Nandha ', 'A2B ', '586586586', 'Rajagopal', '568686456', 'Villa 42, Al Wasl Road\r\nJumeirah 1 Dubai', 1, '2025-08-18', '10:00 AM', '5:00 PM', 'Cockroaches,Bed Bugs,Flying Insects,Crawling Insects', 'Dirty', 0, 'Thermal Fogging,Termite Injection,Fumigation,ULV fogging', '', 'ddsasddsasda', '', '', '2025-08-26 13:41:16'),
(2, 5, 10, 'Harish', 'SRMV Builders', '569875585', 'Harish', '586784544', 'SRMV Builders, Mall Road, Dubai', 1, '2025-08-07', '5:00 PM', '11:00 PM', '', '', 0, '', '', 'saddssdasdasd s\r\nsdadsdsas', '', '', '2025-08-22 12:12:04'),
(4, 9, 10, 'Amal', 'Vagamon Square', '555488897', 'dsf', '934258574', 'wddssdsdssdd, sdsddsd', 1, '2025-08-31', '8:00 AM', '12:00 PM', '', 'Clean,Dirty', 0, 'Spray', 'sadsddsa', 'asddassdasda', 'Amal', '585567454', '2025-08-28 17:26:57'),
(5, 12, 15, 'Sujith', 'Akshay', '701036617', 'Ramachandran', '586857895', 'Akshay\r\nWarehouse , AL Quasis, Dubai,\r\nUAE', 1, '2025-08-29', '10:00 AM', '9:00 PM', 'Cockroaches,Bed Bugs', 'Clean', 0, 'Spray', 'Basement', 'sdasda,mmdsamasdnsd\r\nsadlsdmn,dsands,snd \r\nsadsdnasdam,ndsa,masnd', 'Raj', '589887874', '2025-09-02 11:03:25'),
(6, 14, 545, 'Sujith', 'Akshay', '701036617', 'Ramachandran', '586857895', 'Akshay\r\nWarehouse , AL Quasis, Dubai,\r\nUAE', 1, '2025-09-03', '6:00 AM', '10:00 AM', 'Cockroaches,Crawling Insects,Cats & dogs,Snakes & Scorpions', 'Clean,Dirty', 0, 'Spray,Rodent Control', 'Rooftop', 'Services cover only the pests and areas mentioned in the quotation.\r\nClients must ensure access to the premises on the scheduled date.\r\n\r\nTreatments use municipality-approved, eco-safe pest control chemicals.\r\nWarranty applies only if hygiene and cleanlin', 'Raj', '589878787', '2025-09-02 14:02:49'),
(7, 20, 10, 'Praveen', 'Blue Sky new', '586965477', 'Piere', '585856554', 'Down Town, Dubai', 10, '2025-09-28', '4:00 AM', '9:00 AM', 'Cockroaches,dsfdsfeewrewrrew', 'Clean', 0, 'Spray', 'dadasads', 'sdsdaasd', 'sadsda', '658789487', '2025-09-08 18:02:42'),
(8, 24, 10, 'Harish', 'Jos', '569875585', 'Piere', '934258574', 'sdsddddssdsd', 1, '2025-09-19', '5:00 AM', '10:00 AM', 'Cockroaches,sadsdasadsd', 'Clean', 0, 'Spray', 'ssdasd', 'sdasdadsasda', 'Amal', '658976514', '2025-09-08 18:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `pestcontrol_report_product`
--

CREATE TABLE `pestcontrol_report_product` (
  `id` int(11) NOT NULL,
  `pest_control_report_id` int(11) NOT NULL,
  `pestiside_used` varchar(255) NOT NULL,
  `concentration` varchar(150) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pestcontrol_report_product`
--

INSERT INTO `pestcontrol_report_product` (`id`, `pest_control_report_id`, `pestiside_used`, `concentration`, `remarks`, `created_datetime`) VALUES
(13, 2, 'Fipronil', '', 'asdasdsads', '2025-08-22 12:12:04'),
(15, 1, 'Boric Acid', '', 'sasdaadas', '2025-08-26 13:41:16'),
(16, 1, 'Pyrethroids', '', 'ddsasddsasda', '2025-08-26 13:41:16'),
(31, 4, 'Chlorpyrifos', 'dsads', 'dsadsasad', '2025-08-28 17:26:57'),
(32, 4, 'Pyrethroids', 'sdads', 'asddassdasda', '2025-08-28 17:26:57'),
(33, 5, 'Chlorpyrifos', 'asadsadsda', 'sdasdasdaasdasd', '2025-09-02 11:03:25'),
(34, 6, 'Fipronil', 'sadsda', 'sadsdsa', '2025-09-02 14:02:49'),
(36, 7, 'Chlorpyrifos', '1', 'sdsdaasd', '2025-09-08 18:02:42'),
(37, 8, 'Fipronil', '10', 'sadsadsda', '2025-09-08 18:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `pestiside_used`
--

CREATE TABLE `pestiside_used` (
  `id` int(11) NOT NULL,
  `pestiside_used` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pestiside_used`
--

INSERT INTO `pestiside_used` (`id`, `pestiside_used`, `status`, `created_by`, `created_datetime`, `modified_by`, `modified_datetime`) VALUES
(1, 'Boric Acid', '1', 1001, '2025-08-20 16:55:33', 0, '0000-00-00 00:00:00'),
(2, 'Fipronil', '1', 1001, '2025-08-20 16:55:40', 1001, '2025-08-20 16:55:43'),
(3, 'Hydramethylnon', '1', 1001, '2025-08-20 16:55:54', 0, '0000-00-00 00:00:00'),
(4, 'Chlorpyrifos', '1', 1001, '2025-08-20 16:56:00', 0, '0000-00-00 00:00:00'),
(5, 'Pyrethroids', '1', 1001, '2025-08-20 16:56:17', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `price_log`
--

CREATE TABLE `price_log` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `job_type` varchar(255) NOT NULL,
  `job_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `total` varchar(150) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `price_log`
--

INSERT INTO `price_log` (`id`, `quotation_id`, `product_id`, `job_type`, `job_id`, `amount`, `vat`, `total`, `created_datetime`) VALUES
(6, 22, 57, 'General Pest Control', 7, 250, 5, '262.50', '2025-08-04 17:01:46'),
(8, 22, 60, 'General Pest Control', 7, 200, 5, '210.00', '2025-08-04 17:03:52'),
(10, 18, 62, 'General Pest Control', 7, 100, 5, '105.00', '2025-08-04 17:14:10'),
(11, 17, 63, 'Bed bug treatment', 4, 100, 5, '105.00', '2025-08-04 17:14:18'),
(12, 22, 65, 'General Pest Control', 7, 260, 5, '273.00', '2025-08-04 17:14:56'),
(13, 23, 66, 'Bed bug treatment', 4, 100, 5, '105.00', '2025-08-04 17:18:06'),
(14, 23, 67, 'General Pest Control', 7, 600, 5, '630.00', '2025-08-04 17:18:06'),
(15, 23, 69, 'General Pest Control', 7, 400, 5, '420.00', '2025-08-04 17:20:15'),
(16, 24, 76, 'Mosquito control', 6, 350, 5, '367.50', '2025-08-05 11:03:18'),
(17, 24, 77, 'Termite Control', 2, 1000, 5, '1050.00', '2025-08-05 11:03:18'),
(18, 25, 78, 'Mosquito control', 6, 800, 5, '840.00', '2025-08-05 11:38:35'),
(21, 27, 85, 'General Pest Control', 7, 250, 5, '262.50', '2025-08-05 15:59:39'),
(22, 28, 86, 'Mosquito control', 6, 250, 5, '262.50', '2025-08-05 16:02:22'),
(23, 29, 88, 'General Pest Control', 7, 2500, 5, '2625.00', '2025-08-05 16:07:41'),
(24, 29, 89, 'Mosquito control', 6, 5500, 5, '5775.00', '2025-08-05 16:07:41'),
(25, 29, 92, 'General Pest Control', 7, 2400, 5, '2520.00', '2025-08-05 16:08:59'),
(26, 23, 96, 'General Pest Control', 7, 100, 5, '105.00', '2025-08-05 17:30:15'),
(27, 30, 99, 'Water Tank Clean', 8, 550, 5, '577.50', '2025-08-07 13:47:31'),
(28, 31, 100, 'Rodent removal', 5, 350, 5, '367.50', '2025-08-07 18:43:44'),
(29, 32, 101, 'Rodent removal', 5, 1000, 5, '1050.00', '2025-08-12 16:56:23'),
(30, 33, 102, 'Bed bug treatment', 4, 500, 5, '525.00', '2025-08-13 15:51:00'),
(31, 33, 103, 'General Pest Control', 7, 4000, 5, '4200.00', '2025-08-13 15:51:00'),
(32, 34, 104, 'General Pest Control', 7, 1000, 5, '1050.00', '2025-08-14 18:20:19'),
(33, 34, 105, 'Mosquito control', 6, 4000, 5, '4200.00', '2025-08-14 18:20:19'),
(34, 35, 106, 'Bed bug treatment', 4, 500, 5, '525.00', '2025-08-14 18:24:12'),
(35, 36, 107, 'Bed bug treatment', 4, 600, 5, '630.00', '2025-08-14 18:26:32'),
(36, 36, 108, 'Tap Pest Cleaning ', 9, 4000, 5, '4200.00', '2025-08-14 18:26:32'),
(37, 36, 110, 'Tap Pest Cleaning ', 9, 3800, 5, '3990.00', '2025-08-14 18:26:54'),
(38, 37, 111, 'Rodent removal', 5, 180, 5, '189.00', '2025-08-18 15:34:35'),
(39, 37, 112, 'General Pest Control', 7, 1500, 5, '1575.00', '2025-08-18 15:34:35'),
(40, 38, 113, 'Mosquito control', 6, 250, 5, '262.50', '2025-08-19 12:38:55'),
(41, 39, 114, 'Mosquito control', 6, 500, 5, '525.00', '2025-08-25 18:43:34'),
(42, 40, 115, 'Bed bug treatment', 4, 500, 5, '525.00', '2025-08-28 13:22:37'),
(43, 41, 117, 'Mosquito control', 6, 500, 5, '525.00', '2025-09-01 10:38:06'),
(45, 43, 119, 'Mosquito control', 6, 100, 5, '105.00', '2025-09-01 11:56:48'),
(46, 43, 120, 'Water Tank Clean', 8, 100, 5, '105.00', '2025-09-01 12:14:16'),
(47, 44, 121, 'Rodent removal', 5, 500, 5, '525.00', '2025-09-02 15:23:14'),
(48, 45, 122, 'Bed bug treatment', 4, 500, 5, '525.00', '2025-09-08 10:11:06'),
(49, 46, 123, 'General Pest Control', 7, 100, 5, '105.00', '2025-09-08 18:27:46'),
(50, 47, 124, 'Mosquito control', 6, 1000, 5, '1050.00', '2025-09-10 11:50:25'),
(51, 48, 125, 'Rodent removal', 5, 250, 5, '262.50', '2025-09-10 15:39:25'),
(52, 49, 126, 'Tap Pest Cleaning ', 9, 500, 5, '525.00', '2025-09-10 15:40:55'),
(53, 50, 127, 'Mosquito control', 6, 250, 5, '262.50', '2025-09-10 15:43:18'),
(54, 51, 128, 'Mosquito control', 6, 2500, 5, '2625.00', '2025-09-11 11:00:43'),
(55, 52, 129, 'Bed bug treatment', 4, 1000, 5, '1050.00', '2025-09-11 13:01:15'),
(56, 53, 130, 'Mosquito control', 6, 500, 5, '525.00', '2025-09-15 10:21:52'),
(57, 53, 131, 'Rodent removal', 5, 1000, 5, '1050.00', '2025-09-15 10:21:52'),
(58, 53, 137, 'General Pest Control', 7, 1000, 5, '1050.00', '2025-09-15 11:07:14'),
(59, 53, 140, 'Water Tank Clean', 8, 1000, 5, '1050.00', '2025-09-15 11:07:38'),
(62, 56, 145, 'Rodent removal', 5, 1000, 5, '1050.00', '2025-09-15 12:06:33'),
(63, 57, 146, 'Bed bug treatment', 4, 1000, 5, '1050.00', '2025-09-15 12:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `quotation`
--

CREATE TABLE `quotation` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `customer_mobile` varchar(150) NOT NULL,
  `site_id` int(11) NOT NULL,
  `site_name` varchar(150) NOT NULL,
  `lead_id` int(11) NOT NULL,
  `service_count` int(11) NOT NULL,
  `location` text NOT NULL,
  `required_date` date NOT NULL,
  `required_time` varchar(150) NOT NULL,
  `quotation_date` date NOT NULL,
  `terms_condition` text NOT NULL,
  `total_amount` varchar(150) NOT NULL,
  `is_reservice` tinyint(4) NOT NULL,
  `is_mail_sent` tinyint(4) NOT NULL,
  `status` tinyint(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation`
--

INSERT INTO `quotation` (`id`, `customer_id`, `company_name`, `customer_mobile`, `site_id`, `site_name`, `lead_id`, `service_count`, `location`, `required_date`, `required_time`, `quotation_date`, `terms_condition`, `total_amount`, `is_reservice`, `is_mail_sent`, `status`, `created_datetime`, `modified_datetime`) VALUES
(1, 10, 'Mist Solutions', '701036617', 10, 'Deira', 9, 2, '', '0000-00-00', '', '2025-07-31', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li><li>Payment must be made as per the agreed terms and timeline.</li></ul>', '787.50', 0, 0, 0, '2025-07-31 16:58:00', '2025-07-31 18:01:56'),
(2, 2, 'Rancon', '507558854', 2, 'ABC Textiles, Coimbatore', 0, 2, '', '0000-00-00', '', '2025-07-30', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li></ul>', '840.00', 0, 0, 0, '2025-07-31 17:05:16', '2025-07-31 17:59:41'),
(17, 2, 'Rancon', '507558854', 2, 'ABC Textiles, Coimbatore', 0, 1, '', '0000-00-00', '', '2025-08-04', '<p>fddfsdsf xc</p>', '105.00', 0, 1, 1, '2025-08-01 15:04:05', '2025-08-04 17:14:18'),
(18, 2, 'Rancon', '507558854', 6, 'Mist Solutions', 0, 1, '', '0000-00-00', '', '2025-08-04', '<p>dssdfd sd</p><p>sfddsfdfs</p><p>sfdfdsfdssdfdf</p>', '105.00', 0, 0, 1, '2025-08-01 15:04:38', '2025-08-04 17:14:10'),
(22, 9, 'Logiyas', '589367555', 9, 'Logiyas', 0, 1, '', '0000-00-00', '', '2025-08-04', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li></ul>', '273.00', 0, 0, 1, '2025-08-04 17:01:46', '2025-08-04 17:14:56'),
(23, 10, 'Mist Solutions', '701036617', 10, 'Deira', 0, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '2025-08-30', '10:00AM', '2025-08-05', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li><li>Payment must be made as per the agreed terms and timeline.</li></ul>', '105.00', 0, 0, 1, '2025-08-04 17:18:06', '2025-08-05 17:31:01'),
(24, 8, 'Blue Sky Marketing', '586965477', 17, 'Blue Sky new', 0, 2, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '2025-08-25', '3:00AM', '2025-08-05', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li></ul>', '1417.50', 0, 0, 1, '2025-08-05 11:03:18', '2025-08-05 15:52:15'),
(25, 8, 'Blue Sky Marketing', '586965477', 8, 'Blue Sky', 11, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '2025-08-30', '11:00AM', '2025-08-05', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li></ul>', '840.00', 0, 0, 1, '2025-08-05 11:38:35', '2025-08-05 11:48:44'),
(28, 12, 'Ramcon', '934258574', 20, 'SRMV Builders', 6, 1, 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', '2025-08-15', '10:00AM', '2025-08-05', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li><li>Payment must be made as per the agreed terms and timeline.</li></ul>', '262.50', 0, 0, 1, '2025-08-05 16:02:22', '2025-08-05 16:04:03'),
(29, 13, 'Joshco', '569875585', 20, 'SRMV Builders', 2, 2, 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', '2025-08-06', '4:00AM', '2025-08-05', '<ul><li>fd gfdg fdg fdg dfg</li><li>fd gfd gfd gfdg fdg</li></ul>', '8295.00', 0, 0, 1, '2025-08-05 16:07:41', '2025-08-05 16:08:59'),
(30, 14, 'A2B', '586586586', 21, 'A2B ', 16, 1, 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', '2025-08-30', '10:00AM', '2025-08-07', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li></ul>', '577.50', 0, 0, 1, '2025-08-07 13:47:31', '0000-00-00 00:00:00'),
(31, 14, 'A2B', '586586586', 21, 'A2B ', 0, 1, 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', '2025-08-18', '11:00AM', '2025-08-07', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li></ul>', '367.50', 0, 0, 1, '2025-08-07 18:43:44', '0000-00-00 00:00:00'),
(32, 3, 'Vegas', '555488897', 16, 'Vagamon Square', 0, 1, 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', '0000-00-00', ':00AM', '2025-08-12', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li><li>Payment must be made as per the agreed terms and timeline.</li></ul>', '1050.00', 0, 0, 1, '2025-08-12 16:56:23', '0000-00-00 00:00:00'),
(33, 3, 'Vegas', '555488897', 16, 'Vagamon Square', 0, 2, '', '0000-00-00', ':00AM', '2025-08-13', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li></ul>', '4725.00', 0, 0, 1, '2025-08-13 15:51:00', '0000-00-00 00:00:00'),
(36, 15, 'Ragecom', '586936646', 24, 'Ragecom', 20, 2, '', '0000-00-00', ':00AM', '2025-08-14', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li><li>Payment must be made as per the agreed terms and timeline.</li></ul>', '4620.00', 0, 0, 1, '2025-08-14 18:26:32', '2025-08-14 18:26:54'),
(37, 10, 'Mist Solutions', '701036617', 25, 'Akshay', 21, 2, '', '0000-00-00', ':00AM', '2025-08-18', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li><li>Payment must be made as per the agreed terms and timeline.</li></ul>', '1764.00', 0, 0, 1, '2025-08-18 15:34:35', '0000-00-00 00:00:00'),
(38, 10, 'Mist Solutions', '701036617', 25, 'Akshay', 0, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '0000-00-00', ':00AM', '2025-08-19', '', '262.50', 0, 0, 1, '2025-08-19 12:38:55', '0000-00-00 00:00:00'),
(39, 16, 'Ranconsadsda', '586865465', 26, 'sads', 19, 1, 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', '0000-00-00', ':00AM', '2025-08-25', '<ul><li>Services cover only the pests and areas mentioned in the quotation.</li><li>Clients must ensure access to the premises on the scheduled date.</li><li>Treatments use municipality-approved, eco-safe pest control chemicals.</li><li>Warranty applies only if hygiene and cleanliness are maintained.</li><li>Payment must be made as per the agreed terms and timeline.</li></ul>', '525.00', 0, 0, 1, '2025-08-25 18:43:34', '0000-00-00 00:00:00'),
(40, 8, 'Blue Sky Marketing', '586965477', 17, 'Blue Sky new', 0, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '0000-00-00', ':00AM', '2025-08-28', '', '525.00', 0, 0, 0, '2025-08-28 13:22:37', '2025-08-28 13:23:11'),
(41, 3, 'Vegas', '555488897', 16, 'Vagamon Square', 0, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '0000-00-00', ':00AM', '2025-09-01', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>The LPO/cheque shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC, DEIRA, DUBAI, UAE</li></ul>', '525.00', 0, 0, 1, '2025-09-01 10:38:06', '0000-00-00 00:00:00'),
(43, 18, 'Mist Solutions', '588787654', 28, 'Vadavalli', 23, 1, '', '0000-00-00', ':00AM', '2025-09-01', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>The LPO/cheque shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC, DEIRA, DUBAI, UAE</li></ul>', '105.00', 0, 0, 1, '2025-09-01 11:56:48', '2025-09-01 12:14:16'),
(44, 8, 'Blue Sky Marketing', '586965477', 17, 'Blue Sky new', 0, 1, '', '0000-00-00', ':00AM', '2025-09-02', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '525.00', 0, 0, 1, '2025-09-02 15:23:14', '0000-00-00 00:00:00'),
(45, 3, 'Vegas', '555488897', 16, 'Vagamon Square', 0, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '0000-00-00', ':00AM', '2025-09-08', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '525.00', 0, 0, 1, '2025-09-08 10:11:06', '0000-00-00 00:00:00'),
(46, 13, 'Joshco', '569875585', 29, 'Jos', 26, 1, '', '0000-00-00', ':00AM', '2025-09-08', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '105.00', 0, 0, 1, '2025-09-08 18:27:46', '0000-00-00 00:00:00'),
(47, 3, 'Vegas', '555488897', 16, 'Vagamon Square', 0, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '0000-00-00', ':00AM', '2025-09-10', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '1050.00', 0, 0, 1, '2025-09-10 11:50:25', '0000-00-00 00:00:00'),
(48, 8, 'Blue Sky Marketing', '586965477', 17, 'Blue Sky new', 0, 1, '', '0000-00-00', ':00AM', '2025-09-10', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '262.50', 0, 0, 1, '2025-09-10 15:39:25', '0000-00-00 00:00:00'),
(49, 16, 'Ranconsadsda', '586865465', 30, 'sads', 0, 1, '', '0000-00-00', ':00AM', '2025-09-10', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '525.00', 0, 0, 1, '2025-09-10 15:40:55', '0000-00-00 00:00:00'),
(50, 14, 'A2B', '586586586', 31, 'A2B ', 0, 1, 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', '0000-00-00', ':00AM', '2025-09-10', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '262.50', 0, 0, 1, '2025-09-10 15:43:18', '0000-00-00 00:00:00'),
(51, 10, 'Mist Solutions', '701036617', 25, 'Akshay', 0, 1, 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '0000-00-00', ':00AM', '2025-09-11', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '2625.00', 0, 0, 0, '2025-09-11 11:00:43', '0000-00-00 00:00:00'),
(52, 8, 'Blue Sky Marketing', '586965477', 17, 'Blue Sky new', 0, 1, '', '0000-00-00', ':00AM', '2025-09-11', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '1050.00', 0, 0, 1, '2025-09-11 13:01:15', '0000-00-00 00:00:00'),
(53, 8, 'Blue Sky Marketing', '586965477', 17, 'Blue Sky new', 0, 2, '', '0000-00-00', ':00AM', '2025-09-15', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '1575.00', 0, 0, 0, '2025-09-15 10:21:52', '2025-09-15 11:08:34'),
(56, 8, 'Blue Sky Marketing', '586965477', 8, 'Blue Sky', 29, 1, '', '0000-00-00', ':00AM', '2025-09-15', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '1050.00', 0, 0, 0, '2025-09-15 12:06:33', '0000-00-00 00:00:00'),
(57, 8, 'Blue Sky Marketing', '586965477', 8, 'Blue Sky', 0, 1, '', '0000-00-00', ':00AM', '2025-09-15', '<ul><li>Building Management/ Client responsible for Water and Power during the cleaning.</li><li>Supernova responsible for Professional and equipped work force for water Cleaning and Disinfection of the Inspected Building.</li><li>Supernova would require LPO or Written work order to be issued by the client before the commencement of work.</li><li>Charges towards Gate Pass, custom clearance etc. for our personal and equipment if any to be borne by the client.</li><li>Our quotation is valid for a period of 30 days &amp; valid only for the specification mentioned as per proposal.</li><li>In the event of cancellation of the job after mobilization to site, per day charges shall be applicable.</li><li>Where there is a variation / increase in work requirements post quotation, those works will need to be supported by an amended Purchase Order &amp;/or signed verification on the Work Scope Assessment Request where applicable.</li><li>Late payment fee @ 2% per month will be levied on invoice which is not settle within the Payment terms agreed as per quotation</li><li>Upon completion of the above scope of work if the project is cancelled or hold by the client or end user then SUPERNOVA is entitled to invoice 100% against all the completed work.</li><li>50% of the Quoated amount shall be relased upfron t. remmaining 50% of the Payment shall be after completing 50% of work.</li><li>As per the federal Regulation, VAT will be applied on the Total Amount.</li><li>The LPO/cheque issued shall be addressed to SUPERNOVA PEST CONTROL SERVICES LLC</li></ul>', '1050.00', 0, 0, 0, '2025-09-15 12:08:06', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `quotation_product`
--

CREATE TABLE `quotation_product` (
  `id` int(11) NOT NULL,
  `quotation_id` int(11) NOT NULL,
  `job_type_id` int(11) NOT NULL,
  `job_type` varchar(150) NOT NULL,
  `duration` varchar(150) NOT NULL,
  `amc_fromdate` date NOT NULL,
  `amc_todate` date NOT NULL,
  `amc_description` text NOT NULL,
  `amount` int(11) NOT NULL,
  `vat` int(11) NOT NULL,
  `total` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quotation_product`
--

INSERT INTO `quotation_product` (`id`, `quotation_id`, `job_type_id`, `job_type`, `duration`, `amc_fromdate`, `amc_todate`, `amc_description`, `amount`, `vat`, `total`, `description`, `created_datetime`) VALUES
(9, 2, 7, 'General Pest Control', 'amc', '2025-08-09', '2026-04-30', 'saasdsdsds', 700, 5, '735.00', 'asdadv sfddsv vffvfd', '2025-07-31 17:59:41'),
(10, 2, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 100, 5, '105.00', 'sdfsddsf', '2025-07-31 17:59:41'),
(12, 1, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 150, 5, '157.50', 'Eco-friendly pest control treatment', '2025-07-31 18:01:56'),
(13, 1, 7, 'General Pest Control', 'amc', '2025-08-03', '2026-07-31', 'grdffd fgdsfgfx', 600, 5, '630.00', 'fdds fdddsdffd dsfsdfdsf ', '2025-07-31 18:01:56'),
(62, 18, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', 100, 5, '105.00', 'sdsfdsfdd', '2025-08-04 17:14:10'),
(63, 17, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 100, 5, '105.00', 'dsdssd', '2025-08-04 17:14:18'),
(65, 22, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', 260, 5, '273.00', 'sddd', '2025-08-04 17:14:56'),
(80, 25, 6, 'Mosquito control', 'amc', '2025-08-09', '2025-11-27', 'sdasdasda sasdadsasa', 800, 5, '840.00', 'sdsdaasd', '2025-08-05 11:48:44'),
(83, 24, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', 350, 5, '367.50', 'saadsdas csasasadsdasda', '2025-08-05 15:52:15'),
(84, 24, 2, 'Termite Control', 'amc', '2025-08-06', '2025-08-30', 'asassad csadsasdadsasad', 1000, 5, '1050.00', 'dasd csadsdaasddsaasd', '2025-08-05 15:52:15'),
(87, 28, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', 250, 5, '262.50', 'sdsafdsadsda', '2025-08-05 16:04:03'),
(92, 29, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', 2400, 5, '2520.00', 'test', '2025-08-05 16:08:59'),
(93, 29, 6, 'Mosquito control', 'amc', '2025-08-13', '2027-06-09', 'fhfd gfdg', 5500, 5, '5775.00', 'dgdfgfd gfd', '2025-08-05 16:08:59'),
(98, 23, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', 100, 5, '105.00', 'fgedfsdsdsfds', '2025-08-05 17:31:01'),
(99, 30, 8, 'Water Tank Clean', 'one-time', '0000-00-00', '0000-00-00', '', 550, 5, '577.50', 'Need High Water Tank Cleaning ', '2025-08-07 13:47:31'),
(100, 31, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 350, 5, '367.50', 'assd asassdsad', '2025-08-07 18:43:44'),
(101, 32, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 1000, 5, '1050.00', 'asdasdsdasadd', '2025-08-12 16:56:23'),
(102, 33, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 500, 5, '525.00', 'adasddsad', '2025-08-13 15:51:00'),
(103, 33, 7, 'General Pest Control', 'amc', '2025-09-06', '2025-08-29', 'ssadsasdas sasdasdasdasads', 4000, 5, '4200.00', 'a sacsasdasdsad ', '2025-08-13 15:51:00'),
(109, 36, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 600, 5, '630.00', 'asdsadsadd', '2025-08-14 18:26:54'),
(110, 36, 9, 'Tap Pest Cleaning ', 'amc', '2025-08-15', '2025-11-15', 'sadsa dssdadsa dasdas dasda ass xsdasdads adsa', 3800, 5, '3990.00', 'asdasasd xsadsdasda', '2025-08-14 18:26:54'),
(111, 37, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 180, 5, '189.00', 'sdsadsasda', '2025-08-18 15:34:35'),
(112, 37, 7, 'General Pest Control', 'amc', '2025-08-27', '2025-09-13', 'sasadsad  sasdasdasdasda cxsfsdadsasdasda', 1500, 5, '1575.00', 'asasddsa sadsddsadasds', '2025-08-18 15:34:35'),
(113, 38, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', 250, 5, '262.50', '', '2025-08-19 12:38:55'),
(114, 39, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', 500, 5, '525.00', 'asdasdsdasad', '2025-08-25 18:43:34'),
(116, 40, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 500, 5, '525.00', 'asdasdsdasd', '2025-08-28 13:23:11'),
(117, 41, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', 500, 5, '525.00', 'sadasdasdd', '2025-09-01 10:38:06'),
(120, 43, 8, 'Water Tank Clean', 'one-time', '0000-00-00', '0000-00-00', '', 100, 5, '105.00', 'sdsdsa', '2025-09-01 12:14:16'),
(121, 44, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 500, 5, '525.00', '', '2025-09-02 15:23:14'),
(122, 45, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 500, 5, '525.00', 'dadsfsdds', '2025-09-08 10:11:06'),
(123, 46, 7, 'General Pest Control', 'one-time', '0000-00-00', '0000-00-00', '', 100, 5, '105.00', 'asdssas', '2025-09-08 18:27:46'),
(124, 47, 6, 'Mosquito control', 'amc', '2025-09-19', '2026-07-31', 'sdasdsddssdasd', 1000, 5, '1050.00', '', '2025-09-10 11:50:25'),
(125, 48, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 250, 5, '262.50', 'asdassdasdsd', '2025-09-10 15:39:25'),
(126, 49, 9, 'Tap Pest Cleaning ', 'amc', '2025-09-25', '2026-03-28', 'ssasdsdsdfds', 500, 5, '525.00', 'fghfghg', '2025-09-10 15:40:55'),
(127, 50, 6, 'Mosquito control', 'amc', '2025-09-27', '2025-10-04', 'sddsasaddas', 250, 5, '262.50', 'sdasasdsd', '2025-09-10 15:43:18'),
(128, 51, 6, 'Mosquito control', 'amc', '2025-09-26', '2026-03-11', 'sadsdadsaddas', 2500, 5, '2625.00', 'sdsddssda', '2025-09-11 11:00:43'),
(129, 52, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 1000, 5, '1050.00', 'fdsfdssdf', '2025-09-11 13:01:15'),
(141, 53, 6, 'Mosquito control', 'one-time', '0000-00-00', '0000-00-00', '', 500, 5, '525.00', 'asddasdadas', '2025-09-15 11:08:34'),
(142, 53, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 1000, 5, '1050.00', 'sdfdsffdfdsfsd', '2025-09-15 11:08:34'),
(145, 56, 5, 'Rodent removal', 'one-time', '0000-00-00', '0000-00-00', '', 1000, 5, '1050.00', 'dsasdsaddsa', '2025-09-15 12:06:33'),
(146, 57, 4, 'Bed bug treatment', 'one-time', '0000-00-00', '0000-00-00', '', 1000, 5, '1050.00', 'saddsasasd', '2025-09-15 12:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `safety_instructions`
--

CREATE TABLE `safety_instructions` (
  `id` int(11) NOT NULL,
  `safety_instruction` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `safety_instructions`
--

INSERT INTO `safety_instructions` (`id`, `safety_instruction`, `created_by`, `created_datetime`, `modified_by`, `modified_datetime`) VALUES
(1, '<p><strong>&nbsp; &nbsp;Before Treatment:</strong></p><ol><li>Prepare Home for Pesticide Spray.</li><li>If the kitchen is infested. Remove the Utensils from the kitchen selves and store in Middle of the Hall or any room where the Pesticide is not required.</li><li>Remove the Food Items from the Kitchen</li><li>Store the Foods in a covered Container, Preferred Inside the Refrigerator.</li><li>Keep aquariums covered for at least 24 hours.</li></ol><p><strong>&nbsp; &nbsp; During Treatment:&nbsp;</strong></p><ol><li>Switch OFF the AC</li><li>Pesticides are approved by UAE MOCCAE. However, it is advised to stay away.</li><li>Stay Out of the Home, During the Pesticide Spray.</li><li>Keep your pets away during the Pesticide Spray.</li></ol><p><strong>&nbsp; &nbsp;After Treatment:</strong></p><ol><li>Switch off the AC.</li><li>Leave the Home for 4 Hours after the service. <strong>Do Not</strong> stay in the Home, even the treatment is carried in single Room.</li><li>On re-entering, open all doors and windows for at least 15–20 minutes to ventilate.</li><li>Do a Dry mopping for the House Before you use.&nbsp;</li><li>Clean all the Kitchen Utensils.&nbsp;</li><li>Fix the Issues mentioned by our technicians during his Inspection.</li><li>Keep the House clean,</li><li>Avoid water Stagnation, leaky pipes, and damp areas.</li><li>Avoid organic matter spillage, including crumbs, grease, garbage, and sugary substances.</li><li>Avoid Dark, undisturbed spaces like cracks, under appliances, and storage areas offer ideal hiding spots.</li><li>Wash utensils, cutlery, and cookware before use.</li><li>Avoid disturbing bait stations, traps, or gel applications.</li><li>Do not use any other chemicals or cleaners in the treated area for at least 48 hours.</li><li>Wipe and clean all kitchen counters, dining tables, and food-contact surfaces with mild soap and water.</li></ol><p><strong>&nbsp; &nbsp;Pest Free environment / DIY Approach:</strong></p><ul><li><strong>Keep your home clean &nbsp;</strong>, especially kitchen and dining areas</li><li><strong>Seal cracks and gaps &nbsp;</strong> in walls, doors, and windows</li><li><strong>Dispose of garbage regularly &nbsp;</strong> &nbsp;and use sealed bins</li><li><strong>Fix leaky pipes and faucets &nbsp;</strong> &nbsp;to eliminate moisture</li><li><strong>Store food in airtight containers</strong></li><li><strong>Clean up spills and crumbs immediately</strong></li><li><strong>Trim plants and shrubs &nbsp;</strong> &nbsp;away from the house</li><li><strong>Install window screen &nbsp;</strong> &nbsp;to block flying insects</li><li><strong>Use natural repellents &nbsp;</strong> &nbsp;like neem oil, vinegar, or essential oils</li><li><strong>Declutter storage areas &nbsp;</strong> &nbsp;to reduce hiding spots</li><li><strong>Set traps for rodents &nbsp;</strong> &nbsp;in suspected areas</li><li><strong>Sprinkle boric acid or diatomaceous earth &nbsp; &nbsp;</strong> &nbsp;in corners</li><li><strong>Keep firewood and debris &nbsp;</strong> &nbsp;away from the house</li><li><strong>Vacuum carpets and upholstery &nbsp; &nbsp;</strong> &nbsp;regularly</li><li><strong>Inspect regularly &nbsp;</strong> &nbsp;for signs of pest activity</li></ul>', 1001, '2025-08-25 12:05:49', 1001, '2025-09-02 12:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `customer_mobile` int(11) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `site_address` text NOT NULL,
  `email_service` tinyint(4) NOT NULL,
  `incharge_name` varchar(150) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `location` text NOT NULL,
  `description` text NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_datetime` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `customer_id`, `company_name`, `customer_mobile`, `site_name`, `site_address`, `email_service`, `incharge_name`, `mobile`, `email`, `location`, `description`, `status`, `created_by`, `created_datetime`, `modified_by`, `modified_datetime`) VALUES
(2, 2, 'Rancon', 507558854, 'ABC Textiles, Coimbatore', 'saasss', 0, '', '', '', '', 'sadsdsdddss sSDSSDSSDDSDSS', '1', 1001, '2025-07-21 12:00:33', 1001, '2025-08-04 17:14:18'),
(4, 3, 'Vegas', 555488897, 'Vadavalli', 'wddssdsdssdd, sdsddsd', 0, '', '', '', '', 'assaddsdssdkop;sld', '1', 1001, '2025-07-22 13:43:21', 1001, '2025-08-01 13:59:51'),
(5, 4, 'Walmart', 586969877, 'SRMV Builders2', 'SRMV 2nd Building,\r\nMall Road,\r\nDubai', 0, '', '', '', '', 'sasd sdasddas dsanksdbm sndb sa', '1', 1001, '2025-07-25 10:38:06', 1001, '2025-08-19 12:40:40'),
(6, 2, 'Rancon', 507558854, 'Mist Solutions', 'Dubai Silicon Oasisdsds', 0, '', '', '', '', 'Dubai Silicon Oasis', '1', 1001, '2025-07-25 12:29:13', 1001, '2025-08-04 17:14:10'),
(8, 8, 'Blue Sky Marketing', 586965477, 'Blue Sky', 'Down Town, Dubai', 0, 'Mani', '598798984', 'mani@gmail.com', '', '', '1', 1001, '2025-07-30 13:32:39', 1001, '2025-09-15 12:08:06'),
(9, 9, 'Logiyas', 589367555, 'Logiyas', 'Fourth Cross Street, Down Town, Dubai', 0, '', '', '', '', '', '1', 1001, '2025-07-31 14:06:36', 1001, '2025-08-04 17:14:56'),
(10, 10, 'Mist Solutions', 701036617, 'Deira', '110, Raju naidu Street, Deira, Dubai', 0, '', '', '', '', '', '1', 1001, '2025-07-31 16:58:00', 1001, '2025-08-05 17:31:01'),
(11, 10, 'Mist Solutions', 701036617, 'Third Site', 'Third Site', 0, '', '', '', '', 'Third Site', '1', 1001, '2025-08-01 10:12:16', 0, '0000-00-00 00:00:00'),
(12, 9, 'Logiyas', 589367555, 'Logiya', 'Fourth Cross Street, Down Town, Dubai', 0, '', '', '', '', '', '1', 1001, '2025-08-01 12:31:12', 0, '0000-00-00 00:00:00'),
(13, 11, 'sss ', 569685558, 'Fourway Hotel', 'Al Shafar Tower 1, Dubai', 0, '', '', '', '', '', '1', 1001, '2025-08-01 13:41:06', 1001, '2025-08-01 13:53:21'),
(15, 4, 'Walmart', 586969877, 'SRMV Builders', 'SRMV Builders,\r\nMall Road,\r\nDubai', 0, '', '', '', '', '', '1', 1001, '2025-08-01 14:52:56', 1001, '2025-08-01 14:53:45'),
(16, 3, 'Vegas', 555488897, 'Vagamon Square', 'wddssdsdssdd, sdsddsd', 0, 'dsf', '934258574', 'test@gmail.com', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', 'ds', '1', 1001, '2025-08-04 16:32:39', 1001, '2025-09-10 11:50:25'),
(17, 8, 'Blue Sky Marketing', 586965477, 'Blue Sky new', 'Down Town, Dubai', 0, 'Piere', '585856554', 'piereamal@gmail.com', '', '', '1', 1001, '2025-08-05 11:03:18', 1001, '2025-09-15 12:05:52'),
(18, 11, 'sss ', 569685558, 'SSS Hotel', 'Al Shafar Tower 1, Dubai', 0, '', '', '', '', '', '1', 1001, '2025-08-05 12:12:17', 0, '0000-00-00 00:00:00'),
(20, 12, 'Ramcon', 934258574, 'Sai Builders', 'Sai Builders, Mall Road, Dubai', 0, '', '', '', '', '', '1', 1001, '2025-08-05 16:02:22', 1001, '2025-08-19 12:41:40'),
(21, 14, 'A2B', 586586586, 'A2B ', 'Villa 42, Al Wasl Road\r\nJumeirah 1 Dubai', 0, 'Rajagopal', '568686456', 'test@gmail.com', 'https://maps.app.goo.gl/sw6bivdt6tm9EmD37', '', '1', 1001, '2025-08-07 13:47:31', 1001, '2025-08-14 17:20:50'),
(24, 15, 'Ragecom', 586936646, 'Ragecom', 'Office 505, Sheikh Zayed Road,  \r\nBusiness Bay, Dubai  ', 2, 'Jaden', '586996866', 'jaden@gmail.com', 'https://maps.app.goo.gl/5UzB9VYyBeKdvQ598', '', '1', 1001, '2025-08-14 18:26:32', 1001, '2025-08-19 11:24:07'),
(25, 10, 'Mist Solutions', 701036617, 'Akshay', 'Akshay\r\nWarehouse , AL Quasis, Dubai,\r\nUAE', 2, 'Ramachandran', '586857895', 'ramchandran@gmail.com', 'https://maps.app.goo.gl/qQ1HRocGhxNEHM7z6', '', '1', 1001, '2025-08-18 15:34:35', 1001, '2025-09-11 11:00:43'),
(26, 16, 'Ranconsadsda', 586865465, 'sads', 'sdasda sdasdasdaasdasdas', 0, 'Jowen ', '586844444', 'jowen@gmail.com', '', '', '1', 1001, '2025-08-25 18:43:34', 0, '0000-00-00 00:00:00'),
(27, 17, 'Mascos', 585858847, 'Mascos', '1st Street, Downtown, Dubai', 0, 'James', '587548878', 'james2@gmail.com', '', '', '1', 1001, '2025-09-01 11:36:25', 0, '0000-00-00 00:00:00'),
(28, 18, 'Mist Solutions', 588787654, 'Vadavalli', 'sdasdasda\r\nsdadsasda', 0, 'Piere', '934258574', 'piereamal@gmail.com', '', '', '1', 1001, '2025-09-01 11:56:48', 1001, '2025-09-01 12:14:16'),
(29, 13, 'Joshco', 569875585, 'Jos', 'sdsddddssdsd', 0, 'Piere', '934258574', 'piereamal@gmail.com', '', '', '1', 1001, '2025-09-08 18:27:46', 0, '0000-00-00 00:00:00'),
(30, 16, 'Ranconsadsda', 586865465, 'sads', 'sdasda sdasdasdaasdasdas', 0, 'Jowen ', '586844444', 'jowen@gmail.com', '', '', '1', 1001, '2025-09-10 15:40:55', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `technician_log`
--

CREATE TABLE `technician_log` (
  `id` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `supervisor_id` int(11) NOT NULL,
  `technician_id` int(11) NOT NULL,
  `technician_name` varchar(255) NOT NULL,
  `technician_mobile` int(11) NOT NULL,
  `clock_in_time` varchar(150) NOT NULL,
  `clock_out_time` varchar(150) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technician_log`
--

INSERT INTO `technician_log` (`id`, `job_order_id`, `supervisor_id`, `technician_id`, `technician_name`, `technician_mobile`, `clock_in_time`, `clock_out_time`, `created_datetime`) VALUES
(1, 5, 1007, 1013, 'Mani', 586968665, '4:00 PM', '9:00 PM', '2025-08-07 10:36:08'),
(2, 5, 1007, 1012, 'Raghu', 596587545, '4:00 PM', '9:10 PM', '2025-08-07 10:36:08'),
(4, 4, 1010, 1013, 'Mani', 586968665, '11:00 AM', '6:00 PM', '2025-08-07 14:23:09'),
(5, 4, 1010, 1004, 'Ravi', 53456578, '3:00 PM', '6:15 PM', '2025-08-07 14:23:09'),
(6, 1, 1007, 1013, 'Mani', 586968665, '11:00 AM', '', '2025-08-07 16:39:59'),
(7, 1, 1007, 1012, 'Raghu', 596587545, '11:00 AM', '', '2025-08-07 16:39:59'),
(8, 2, 1007, 1013, 'Mani', 586968665, '11:00 AM', '', '2025-08-07 16:58:29'),
(9, 2, 1007, 1004, 'Ravi', 53456578, '3:00 PM', '', '2025-08-07 16:58:29'),
(10, 6, 1010, 1004, 'Ravi', 53456578, '10:00 AM', '10:00 PM', '2025-08-07 17:21:08'),
(11, 7, 1007, 1013, 'Mani', 586968665, '11:00 AM', '', '2025-08-07 18:00:05'),
(12, 7, 1007, 1012, 'Raghu', 596587545, '11:00 AM', '', '2025-08-07 18:00:05'),
(13, 7, 1007, 1004, 'Ravi', 53456578, '3:00 PM', '', '2025-08-07 18:00:05'),
(18, 8, 1010, 1013, 'Mani', 586968665, '11:00 AM', '6:00 PM', '2025-08-12 17:16:32'),
(19, 8, 1010, 1012, 'Raghu', 596587545, '11:00 AM', '6:00 PM', '2025-08-12 17:16:32'),
(20, 11, 1010, 1013, 'Mani', 586968665, '11:00 AM', '8:00 AM', '2025-08-18 10:31:36'),
(22, 9, 1010, 1010, 'Amal', 567567567, '11:00 AM', '8:00 PM', '2025-08-20 12:59:11'),
(25, 13, 1007, 1012, 'Raghu', 596587545, '', '', '2025-08-25 18:44:41'),
(26, 12, 1010, 1013, 'Mani', 586968665, '10:00 AM', '6:00 PM', '2025-09-02 10:43:45'),
(27, 14, 1010, 1013, 'Mani', 586968665, '11:00 AM', '8:00 AM', '2025-09-02 13:49:36'),
(28, 18, 1010, 1013, 'Mani', 586968665, '11:00 AM', '6:00 PM', '2025-09-02 15:15:37'),
(29, 18, 1010, 1012, 'Raghu', 596587545, '11:00 AM', '6:00 PM', '2025-09-02 15:15:37'),
(30, 19, 1010, 1007, 'Raja', 543543543, '9:00 AM', '6:00 PM', '2025-09-02 15:17:29'),
(31, 19, 1010, 1004, 'Ravi', 53456578, '9:00 AM', '6:00 PM', '2025-09-02 15:17:29'),
(32, 20, 1010, 1013, 'Mani', 586968665, '5:00 AM', '9:00 PM', '2025-09-02 15:23:42'),
(33, 20, 1010, 1012, 'Raghu', 596587545, '5:00 AM', '9:00 PM', '2025-09-02 15:23:42'),
(34, 23, 1010, 1010, 'Amal', 567567567, '10:00 AM', '6:00 PM', '2025-09-08 10:13:56'),
(35, 23, 1010, 1013, 'Mani', 586968665, '10:00 AM', '6:00 PM', '2025-09-08 10:13:56'),
(36, 22, 1010, 1013, 'Mani', 586968665, '7:00 AM', '8:00 AM', '2025-09-08 17:47:45'),
(37, 24, 1010, 1004, 'Ravi', 53456578, '4:00 AM', '9:00 AM', '2025-09-08 18:28:21');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(11) NOT NULL,
  `user_type` tinyint(4) NOT NULL,
  `UserName` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `name` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL,
  `Password` varchar(1000) COLLATE latin1_general_ci NOT NULL,
  `master_admin` varchar(55) COLLATE latin1_general_ci NOT NULL,
  `AddedDate` datetime NOT NULL,
  `UpdatedDate` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `user_type`, `UserName`, `name`, `status`, `Password`, `master_admin`, `AddedDate`, `UpdatedDate`) VALUES
(1001, 0, 'supernova_2025', 'Super Admin', 1, 'dGpoeDEwWTJKaHRaTFBVRGpuVnVodz09', 'Yes', '2013-09-23 00:00:00', '2025-07-21 13:26:12'),
(1003, 1, '534567891', 'Manager', 1, 'MUJEZnd5YXBaZWlJR3hvejJYSDBDUT09', 'No', '2025-07-21 13:06:38', '2025-09-11 13:16:55'),
(1004, 3, '53456578', 'Ravi', 1, 'dGpoeDEwWTJKaHRaTFBVRGpuVnVodz09', 'No', '2025-07-21 13:08:37', '2025-07-22 17:11:22'),
(1007, 2, '543543543', 'Raja', 1, 'dGpoeDEwWTJKaHRaTFBVRGpuVnVodz09', 'No', '2025-07-21 16:20:54', '2025-08-07 10:04:55'),
(1010, 2, '567567567', 'Amal', 1, 'dGpoeDEwWTJKaHRaTFBVRGpuVnVodz09', 'No', '2025-07-21 16:22:28', '2025-07-23 13:53:16'),
(1011, 2, '586527528', 'Kavin', 1, 'dGpoeDEwWTJKaHRaTFBVRGpuVnVodz09', 'No', '2025-07-21 16:29:26', '2025-07-25 11:33:30'),
(1012, 3, '596587545', 'Raghu', 1, 'dGpoeDEwWTJKaHRaTFBVRGpuVnVodz09', 'No', '2025-07-21 16:29:48', '2025-07-25 11:31:01'),
(1013, 3, '586968665', 'Mani', 1, 'dGpoeDEwWTJKaHRaTFBVRGpuVnVodz09', '', '2025-08-06 11:39:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `watertank_report`
--

CREATE TABLE `watertank_report` (
  `id` int(11) NOT NULL,
  `job_order_id` int(11) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `client_name` varchar(150) NOT NULL,
  `site_name` varchar(255) NOT NULL,
  `mobile` varchar(150) NOT NULL,
  `site_incharge` varchar(150) NOT NULL,
  `site_mobile` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `visit_no` int(11) NOT NULL,
  `date` date NOT NULL,
  `type_of_facility` varchar(255) NOT NULL,
  `nature_of_job` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `completed_date` date NOT NULL,
  `defects` text NOT NULL,
  `chemical_used` varchar(255) NOT NULL,
  `date_of_cleaning` date NOT NULL,
  `next_cleaning_date` date NOT NULL,
  `gas_leveling_finding` varchar(255) NOT NULL,
  `job_completed` varchar(150) NOT NULL,
  `further_action` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `customer_sign_name` varchar(255) NOT NULL,
  `customer_sign_mobile` varchar(150) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watertank_report`
--

INSERT INTO `watertank_report` (`id`, `job_order_id`, `sl_no`, `client_name`, `site_name`, `mobile`, `site_incharge`, `site_mobile`, `address`, `visit_no`, `date`, `type_of_facility`, `nature_of_job`, `start_date`, `completed_date`, `defects`, `chemical_used`, `date_of_cleaning`, `next_cleaning_date`, `gas_leveling_finding`, `job_completed`, `further_action`, `remarks`, `customer_sign_name`, `customer_sign_mobile`, `created_datetime`) VALUES
(1, 4, 10, 'Praveen', 'Blue Sky new', '586965477', 'Praveen', '588554414', 'Down Town, Dubai', 2, '2025-08-25', 'Building', 'Fire water tank Cleaning', '2025-08-22', '2025-08-23', 'casdsd', 'asddsdsadsa', '2025-08-23', '2026-02-23', 'ssdads', 'yes', 'dsasda', 'sdadsadasasdads', '', '', '2025-08-22 11:55:38'),
(2, 23, 10, 'Amal', 'Vagamon Square', '555488897', 'dsf', '934258574', 'wddssdsdssdd, sdsddsd', 1, '2025-09-11', 'Select Facility', 'Waste water tank', '2025-09-09', '2025-09-12', 'sdfdsdsfsdffds', 'fdsfdsfdsfdsd', '2025-09-12', '2026-03-12', 'sfdfdsfd', 'yes', 'No', 'dsdsdsdsa', 'Amal', '598997979', '2025-09-08 10:16:48');

-- --------------------------------------------------------

--
-- Table structure for table `watertank_report_product`
--

CREATE TABLE `watertank_report_product` (
  `id` int(11) NOT NULL,
  `watertank_report_id` int(11) NOT NULL,
  `type_of_tank` varchar(255) NOT NULL,
  `size_of_tank` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `watertank_report_product`
--

INSERT INTO `watertank_report_product` (`id`, `watertank_report_id`, `type_of_tank`, `size_of_tank`, `location`, `created_datetime`) VALUES
(13, 1, 'Fiber Tank', '15', 'Roof Top', '2025-08-22 11:55:38'),
(14, 1, 'GRP Tank', '20', 'Basement', '2025-08-22 11:55:38'),
(15, 2, 'Fiber Tank', '12', 'Roof Top', '2025-09-08 10:16:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_order`
--
ALTER TABLE `job_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_order_details`
--
ALTER TABLE `job_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_order_product`
--
ALTER TABLE `job_order_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_type`
--
ALTER TABLE `job_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lead_type`
--
ALTER TABLE `lead_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pestcontrol_report`
--
ALTER TABLE `pestcontrol_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pestcontrol_report_product`
--
ALTER TABLE `pestcontrol_report_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pestiside_used`
--
ALTER TABLE `pestiside_used`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `price_log`
--
ALTER TABLE `price_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation`
--
ALTER TABLE `quotation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotation_product`
--
ALTER TABLE `quotation_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `safety_instructions`
--
ALTER TABLE `safety_instructions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technician_log`
--
ALTER TABLE `technician_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `watertank_report`
--
ALTER TABLE `watertank_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `watertank_report_product`
--
ALTER TABLE `watertank_report_product`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_order`
--
ALTER TABLE `job_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `job_order_details`
--
ALTER TABLE `job_order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `job_order_product`
--
ALTER TABLE `job_order_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `job_type`
--
ALTER TABLE `job_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `lead_type`
--
ALTER TABLE `lead_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pestcontrol_report`
--
ALTER TABLE `pestcontrol_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pestcontrol_report_product`
--
ALTER TABLE `pestcontrol_report_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `pestiside_used`
--
ALTER TABLE `pestiside_used`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `price_log`
--
ALTER TABLE `price_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `quotation`
--
ALTER TABLE `quotation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `quotation_product`
--
ALTER TABLE `quotation_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `safety_instructions`
--
ALTER TABLE `safety_instructions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `technician_log`
--
ALTER TABLE `technician_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1014;

--
-- AUTO_INCREMENT for table `watertank_report`
--
ALTER TABLE `watertank_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `watertank_report_product`
--
ALTER TABLE `watertank_report_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
