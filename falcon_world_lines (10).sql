-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2018 at 03:53 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `falcon_world_lines`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(64) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` varchar(128) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'codebucketz', 'codebucketz@gmail.com', '$2y$10$YACefy6wBbJsio1VuyFMU.ksupXA8hutzNF40uL0WNkWQ8mAT8i3i', 'COP', '', '2018-10-05 11:28:37', '0000-00-00 00:00:00'),
(2, 'agent', 'agent@gmail.com', '$2y$10$YACefy6wBbJsio1VuyFMU.ksupXA8hutzNF40uL0WNkWQ8mAT8i3i', 'AGE', '', '2018-10-05 11:28:44', '0000-00-00 00:00:00'),
(7, 'pcl', 'pcl@gmail.com', '$2y$10$YACefy6wBbJsio1VuyFMU.ksupXA8hutzNF40uL0WNkWQ8mAT8i3i', 'CUS', '', '2018-10-21 19:06:45', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `agent management`
--

CREATE TABLE `agent management` (
  `agent_management_id` int(11) NOT NULL,
  `agent_management_agent_id` int(11) DEFAULT '0',
  `agent_management_pick_location` varchar(255) DEFAULT NULL,
  `agent_management_drop_location` varchar(255) DEFAULT NULL,
  `agent_management_weight` int(11) DEFAULT NULL,
  `agent_management_cn` int(11) DEFAULT NULL,
  `agent_management_time` datetime DEFAULT NULL,
  `agent_management_date` datetime DEFAULT NULL,
  `agent_management_qrcode` int(10) UNSIGNED ZEROFILL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent management`
--

INSERT INTO `agent management` (`agent_management_id`, `agent_management_agent_id`, `agent_management_pick_location`, `agent_management_drop_location`, `agent_management_weight`, `agent_management_cn`, `agent_management_time`, `agent_management_date`, `agent_management_qrcode`) VALUES
(1, NULL, 'Karachi', 'Lahore', 55, NULL, NULL, NULL, NULL),
(2, NULL, 'Lahore', 'Karachi', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `assign_vehicle`
--

CREATE TABLE `assign_vehicle` (
  `id` int(11) NOT NULL,
  `fake_unique` int(11) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_vehicle`
--

INSERT INTO `assign_vehicle` (`id`, `fake_unique`, `order_id`) VALUES
(6, 708725, 5),
(7, 708725, 7),
(8, 223651, 3),
(9, 223651, 5),
(10, 910492, 7),
(11, 910492, 9),
(12, 992965, 3),
(13, 992965, 5),
(14, 992965, 7),
(17, 418377, 3),
(18, 418377, 5),
(19, 418377, 7),
(20, 724077, 3),
(21, 724077, 5),
(22, 724077, 7);

-- --------------------------------------------------------

--
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `barcode_status` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'Free',
  `barcode` varchar(191) DEFAULT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `more_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `barcode_status`, `barcode`, `extra_id`, `more_id`, `created_at`, `updated_at`) VALUES
(00000000001, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode1', NULL, NULL, '2018-10-31 09:14:48', '2018-10-31 09:14:48'),
(00000000002, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode2', NULL, NULL, '2018-10-31 09:14:48', '2018-10-31 09:14:48'),
(00000000003, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode3', NULL, NULL, '2018-10-31 09:14:49', '2018-10-31 09:14:49'),
(00000000004, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode4', NULL, NULL, '2018-10-31 09:14:50', '2018-10-31 09:14:50'),
(00000000005, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode5', NULL, NULL, '2018-10-31 09:14:51', '2018-10-31 09:14:51'),
(00000000006, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode6', NULL, NULL, '2018-10-31 09:14:52', '2018-10-31 09:14:52'),
(00000000007, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode7', NULL, NULL, '2018-10-31 09:14:52', '2018-10-31 09:14:52'),
(00000000008, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode8', NULL, NULL, '2018-10-31 09:14:52', '2018-10-31 09:14:53'),
(00000000009, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode9', NULL, NULL, '2018-10-31 09:14:54', '2018-10-31 09:14:54'),
(00000000010, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode10', NULL, NULL, '2018-10-31 09:14:54', '2018-10-31 09:14:54'),
(00000000011, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode11', NULL, NULL, '2018-10-31 09:14:55', '2018-10-31 09:14:55'),
(00000000012, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode12', NULL, NULL, '2018-10-31 09:14:55', '2018-10-31 09:14:55'),
(00000000013, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode13', NULL, NULL, '2018-10-31 09:14:55', '2018-10-31 09:14:56'),
(00000000014, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode14', NULL, NULL, '2018-10-31 09:14:56', '2018-10-31 09:14:56'),
(00000000015, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode15', NULL, NULL, '2018-10-31 09:14:56', '2018-10-31 09:14:56'),
(00000000016, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode16', NULL, NULL, '2018-10-31 09:14:56', '2018-10-31 09:14:57'),
(00000000017, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode17', NULL, NULL, '2018-10-31 09:14:57', '2018-10-31 09:14:57'),
(00000000018, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode18', NULL, NULL, '2018-10-31 09:14:57', '2018-10-31 09:14:57'),
(00000000019, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode19', NULL, NULL, '2018-10-31 09:14:58', '2018-10-31 09:14:58'),
(00000000020, 'Free', 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\barcode20', NULL, NULL, '2018-10-31 09:14:58', '2018-10-31 09:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`, `created_at`, `updated_at`) VALUES
(14, 'Multan', '2018-10-26 07:35:58', '2018-10-26 07:35:58'),
(15, 'Islamabad', '2018-10-26 09:22:50', '2018-10-26 09:22:50'),
(16, 'Hyderabad', '2018-10-26 12:49:38', '2018-10-26 12:49:38'),
(17, 'Lahore', '2018-10-26 14:59:00', '2018-10-26 14:59:00');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 COLLATE utf8_general_mysql500_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ali', '2018-10-04 07:04:26', '2018-10-04 07:04:26'),
(2, 'Akbar', '2018-10-04 07:04:26', '2018-10-04 07:04:26');

-- --------------------------------------------------------

--
-- Table structure for table `client_company`
--

CREATE TABLE `client_company` (
  `company_id` int(11) NOT NULL,
  `corporate_name` varchar(255) DEFAULT NULL,
  `client_company_ntn_number` int(255) DEFAULT NULL,
  `client_company_contact_number` varchar(255) DEFAULT NULL,
  `client_company_email` varchar(255) DEFAULT NULL,
  `client_company_zip_code` int(11) DEFAULT '0',
  `client_company_street_address` varchar(255) DEFAULT NULL,
  `client_company_city` varchar(255) DEFAULT NULL,
  `client_company_time` time DEFAULT NULL,
  `client_company_location` varchar(255) DEFAULT NULL,
  `client_company_contract_date` datetime DEFAULT NULL,
  `client_company_amount` int(11) DEFAULT '0',
  `client_company_credit_card` varchar(255) DEFAULT NULL,
  `client_company_password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_company`
--

INSERT INTO `client_company` (`company_id`, `corporate_name`, `client_company_ntn_number`, `client_company_contact_number`, `client_company_email`, `client_company_zip_code`, `client_company_street_address`, `client_company_city`, `client_company_time`, `client_company_location`, `client_company_contract_date`, `client_company_amount`, `client_company_credit_card`, `client_company_password`) VALUES
(1, 'Hexa Company', 23763498, '03124509774', 'hexa@gmail.com', 35, NULL, NULL, NULL, NULL, NULL, 7500, NULL, NULL),
(2, 'Binary Production', 23764287, '03112645764', 'binary@gmail.com', 85, NULL, NULL, NULL, NULL, NULL, 9500, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cn`
--

CREATE TABLE `cn` (
  `cn_id` int(11) NOT NULL,
  `cn_sender` varchar(191) DEFAULT NULL,
  `cn_reciever` varchar(191) DEFAULT NULL,
  `cn_product` varchar(191) DEFAULT NULL,
  `cn_quantity` int(11) DEFAULT '0',
  `cn_weight` int(11) DEFAULT '0',
  `cn_charges` int(255) DEFAULT NULL,
  `cn_advance` int(11) DEFAULT '0',
  `cn product description` int(11) DEFAULT '0',
  `cn_from` varchar(191) DEFAULT NULL,
  `cn_to` varchar(191) DEFAULT NULL,
  `cn_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cn_refernece`
--

CREATE TABLE `cn_refernece` (
  `cn_refernece_id` int(11) NOT NULL,
  `cn_refernece_invoice` int(11) DEFAULT NULL,
  `cn_refernece_cn` int(11) DEFAULT NULL,
  `cn_refernece_mcr` int(11) DEFAULT NULL,
  `cn_refernece_amount` int(11) DEFAULT NULL,
  `cn_refernece_date` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cod_customer`
--

CREATE TABLE `cod_customer` (
  `cod_ID` int(11) NOT NULL,
  `cod_name` longtext,
  `cod_contact_number` longtext,
  `cod_email` longtext,
  `cod_address` longtext,
  `cod_shipment_from` longtext,
  `cod_shipment_company` longtext,
  `cod_nic` longtext,
  `cod_product_id` int(11) DEFAULT NULL,
  `cod_date` datetime DEFAULT NULL,
  `cod_time` datetime DEFAULT NULL,
  `cod_status` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `company_working`
--

CREATE TABLE `company_working` (
  `company_working_ID` int(11) NOT NULL,
  `company_working_employee_management_id` int(11) DEFAULT '0',
  `company_working_office_expense_id` int(11) DEFAULT '0',
  `company_working_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `concignments`
--

CREATE TABLE `concignments` (
  `cn_id` int(11) NOT NULL,
  `cn_charges` int(11) DEFAULT NULL,
  `cn_advance` int(11) DEFAULT '0',
  `transaction_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `concignments`
--

INSERT INTO `concignments` (`cn_id`, `cn_charges`, `cn_advance`, `transaction_id`, `created_at`, `updated_at`) VALUES
(2, 200, 200, 8, '2018-10-10 14:26:43', '2018-10-10 14:26:43'),
(3, 200, 200, 8, '2018-10-10 14:30:02', '2018-10-10 14:30:02'),
(4, 200, 200, 9, '2018-10-11 01:07:53', '2018-10-11 01:07:53'),
(5, 200, 200, 9, '2018-10-11 01:08:02', '2018-10-11 01:08:02'),
(6, 200, 200, 9, '2018-10-11 01:09:31', '2018-10-11 01:09:31'),
(7, 200, 200, 9, '2018-10-11 01:11:52', '2018-10-11 01:11:52'),
(8, 200, 200, 9, '2018-10-11 01:12:57', '2018-10-11 01:12:57'),
(9, 200, 200, 9, '2018-10-11 01:14:52', '2018-10-11 01:14:52'),
(10, 200, 200, 9, '2018-10-11 01:16:05', '2018-10-11 01:16:05'),
(11, 200, 200, 10, '2018-10-13 06:22:47', '2018-10-13 06:22:47'),
(12, 500, 500, 11, '2018-10-13 06:35:14', '2018-10-13 06:35:14'),
(13, 200, 200, 24, '2018-10-13 17:03:59', '2018-10-13 17:03:59'),
(14, 200, 200, 24, '2018-10-13 17:04:07', '2018-10-13 17:04:07'),
(15, 200, 200, 22, '2018-10-13 17:04:42', '2018-10-13 17:04:42'),
(16, 200, 200, 28, '2018-10-13 17:08:41', '2018-10-13 17:08:41'),
(17, 200, 200, 26, '2018-10-13 17:10:58', '2018-10-13 17:10:58'),
(18, 200, 200, 13, '2018-10-19 02:11:37', '2018-10-19 02:11:37');

-- --------------------------------------------------------

--
-- Table structure for table `consignee`
--

CREATE TABLE `consignee` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `location` varchar(191) NOT NULL,
  `pic` varchar(191) NOT NULL,
  `contact` varchar(13) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consignee`
--

INSERT INTO `consignee` (`id`, `name`, `address`, `location`, `pic`, `contact`, `customer_id`, `created_at`, `updated_at`) VALUES
(1, 'Toshiba', 'Building no 77 Block L', 'Karachi', 'Saleem', '03002308876', 8, '2018-11-14 12:17:27', '2018-11-23 11:39:16'),
(2, 'Gourmet', 'Bhalla Chowk Painu Pakwan', 'Lahore', 'Bhaindo', '030077772', 8, '2018-11-23 12:42:58', '2018-11-23 12:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `consolidation_detail`
--

CREATE TABLE `consolidation_detail` (
  `consolidation_detail_id` int(11) NOT NULL,
  `consolidation_detail_mcr` int(11) DEFAULT NULL,
  `consolidation_detail_cn` int(11) DEFAULT NULL,
  `consolidation_detail_destination` longtext,
  `consolidation_detail_paid` longtext,
  `consolidation_detail_station` longtext,
  `consolidation_detail_amount` int(11) DEFAULT NULL,
  `consolidation_detail_topay` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coporates`
--

CREATE TABLE `coporates` (
  `c_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contract_date` datetime DEFAULT NULL,
  `contract_amount` int(11) DEFAULT '0',
  `status` varchar(128) DEFAULT 'Pending',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coporates`
--

INSERT INTO `coporates` (`c_id`, `company_id`, `city`, `location`, `contract_date`, `contract_amount`, `status`, `updated_at`, `created_at`) VALUES
(71, 7, 'karachi', 'CodeBucketz', '2018-10-18 00:00:00', NULL, 'accepted', '2018-10-23 10:54:06', '2018-10-15 16:20:03'),
(72, 7, 'karachi', 'CodeBucketz', '2018-10-19 00:00:00', 2000, 'accepted', '2018-10-22 02:28:12', '2018-10-17 16:23:22'),
(69, 2, 'karachi', 'CodeBucketz', '2018-10-17 00:00:00', 5000, 'accepted', '2018-10-22 01:57:12', '2018-10-13 08:23:52'),
(73, 2, 'karachi', 'Hyderabad', '2018-10-18 00:00:00', 0, 'Pending', '2018-10-22 01:57:16', '2018-10-21 13:33:22'),
(70, 5, 'karachi', 'CodeBucketz', '2018-10-17 00:00:00', 5000, 'rejected', '2018-10-22 01:57:20', '2018-10-15 15:02:22'),
(74, 5, 'karachi', 'Hyderabad', '2018-10-12 00:00:00', 0, 'Pending', '2018-10-22 01:57:23', '2018-10-21 15:00:16'),
(75, 7, 'karachi', 'Malir', '2018-10-24 00:00:00', 0, 'Pending', '2018-10-21 15:05:28', '2018-10-21 15:05:28');

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `currency_ID` int(11) NOT NULL,
  `currency_name` varchar(255) DEFAULT NULL,
  `currency_rate` decimal(18,0) DEFAULT '0',
  `currency_update_date` datetime DEFAULT NULL,
  `currency_country` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `acr` varchar(191) NOT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `contact_no` varchar(14) NOT NULL,
  `address` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `acr`, `email`, `password`, `contact_no`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Kohala Oils', 'KWL', 'kohala@fwl.com', '$2y$10$6xfuSMVsmhRvkcox.Roc2.bwbBmxKdN.PVLSNDaSPEOLZTce5vuMa', '0314738598', 'Office Number 3 Building No B', '2018-10-26 07:44:31', '2018-10-27 01:51:22'),
(2, 'Pakistan Cables', 'PCL', 'pcl@fwl.com', '$2y$10$1EgsKYwfXR642x8lyZ8vf.NN2XuJg0sXQWFiwMr/9bn72riFaZdN6', '02132312215', 'Office Number 5 Building No A', '2018-10-26 07:44:31', '2018-10-27 02:58:45'),
(3, 'NJ Autos', 'NJA', 'nj@fwl.com', '$2y$10$6xfuSMVsmhRvkcox.Roc2.bwbBmxKdN.PVLSNDaSPEOLZTce5vuMa', '02134543938', 'Office No 1 Building Z', '2018-10-26 05:14:50', '2018-10-27 01:51:31'),
(5, 'Radeon', 'RNG', 'radeon@fwl.com', '$2y$10$6xfuSMVsmhRvkcox.Roc2.bwbBmxKdN.PVLSNDaSPEOLZTce5vuMa', '02134543956', 'Office No 1 Building H', '2018-10-26 05:19:53', '2018-10-27 01:51:53'),
(6, 'Intel', 'INT', 'intel@fwl.com', '$2y$10$1EgsKYwfXR642x8lyZ8vf.NN2XuJg0sXQWFiwMr/9bn72riFaZdN6', '02134543965', 'Office No 5 Building P', '2018-10-26 05:21:16', '2018-10-27 01:51:58'),
(7, 'PSO', 'PSO', 'pso@fwl.com', '$2y$10$1EgsKYwfXR642x8lyZ8vf.NN2XuJg0sXQWFiwMr/9bn72riFaZdN6', '02134543968', 'Office No 10 Building AB', '2018-10-26 05:29:10', '2018-10-27 01:52:05'),
(8, 'Energy Star', 'EST', 'est@fwl.com', '$2y$10$ukLCuNkYTqKFaHOAG2MmU.qGrMykd7GOd7ARjt1xpwfoBMyvEOVV.', '+923422717348', 'Office No 77 Building AE', '2018-10-31 02:25:39', '2018-10-31 09:58:42'),
(15, 'Salman Optics', 'SPC', 'spc@fwl.com', '$2y$10$UwgmSeY1sAE/l9YJWcQ6seNZBhPPkKTLJNGukS9VvK7UPe9ltGYhi', '0213468866', 'Office No 54 Building K', '2018-11-08 11:14:48', '2018-11-08 11:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `customertariffs`
--

CREATE TABLE `customertariffs` (
  `id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `tarif_id` int(11) NOT NULL,
  `zn_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `ac_type` varchar(128) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customertariffs`
--

INSERT INTO `customertariffs` (`id`, `c_id`, `tarif_id`, `zn_id`, `city_id`, `ac_type`, `updated_at`, `created_at`) VALUES
(10, 12, 35, 16, 14, 'LTL', '2018-10-26 15:03:41', '2018-10-26 15:03:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer_pic`
--

CREATE TABLE `customer_pic` (
  `Id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_pic`
--

INSERT INTO `customer_pic` (`Id`, `pic_id`, `c_id`) VALUES
(1, 1, 12),
(2, 2, 12);

-- --------------------------------------------------------

--
-- Table structure for table `customer_reciver`
--

CREATE TABLE `customer_reciver` (
  `Id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `rec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_reciver`
--

INSERT INTO `customer_reciver` (`Id`, `cus_id`, `rec_id`) VALUES
(1, 12, 2),
(2, 12, 3),
(3, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customize_warehouse_management`
--

CREATE TABLE `customize_warehouse_management` (
  `cwm_id` int(11) NOT NULL,
  `wm_id` int(11) DEFAULT '0',
  `p_id` int(11) DEFAULT '0',
  `time` datetime DEFAULT NULL,
  `p_quantity` int(11) DEFAULT NULL,
  `qrcode` int(11) UNSIGNED ZEROFILL DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `action` int(10) UNSIGNED NOT NULL,
  `person_id` int(11) DEFAULT NULL,
  `head_id` int(11) DEFAULT '0',
  `vm_id` int(11) DEFAULT '0',
  `location_id` int(11) DEFAULT '0',
  `dm_id` int(11) DEFAULT '0',
  `tm_id` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customize_warehouse_management`
--

INSERT INTO `customize_warehouse_management` (`cwm_id`, `wm_id`, `p_id`, `time`, `p_quantity`, `qrcode`, `status`, `action`, `person_id`, `head_id`, `vm_id`, `location_id`, `dm_id`, `tm_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, 11, 00000000001, 'Inload', 0, 1, 1, 1, 1, 1, 1, '2018-10-11 09:28:36', '2018-10-11 09:28:36'),
(2, 2, 13, NULL, 12, 00000000002, 'Offload', 0, 2, 2, 2, 2, 2, 2, '2018-10-11 09:28:36', '2018-10-22 07:18:18');

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

CREATE TABLE `distribution` (
  `d_id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `customer_id` varchar(255) DEFAULT NULL,
  `warehouse_head_id` varchar(255) DEFAULT NULL,
  `mcr` int(11) DEFAULT NULL,
  `vehicle_no` int(11) DEFAULT NULL,
  `cn` int(11) DEFAULT NULL,
  `station` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `accept_status_time` varchar(255) NOT NULL,
  `delivered_status_time` varchar(255) NOT NULL,
  `re_routed` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `item` varchar(255) DEFAULT NULL,
  `dc` int(11) DEFAULT NULL,
  `packing` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT '0',
  `location_id` int(11) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `number_plate` varchar(255) DEFAULT NULL,
  `agent_name` int(11) DEFAULT NULL,
  `charges` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `distribution_management`
--

CREATE TABLE `distribution_management` (
  `dm_id` int(11) NOT NULL,
  `d_id` int(11) DEFAULT '0',
  `distributor_head_id` int(11) DEFAULT '0',
  `status` varchar(255) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `working hours` int(11) DEFAULT '0',
  `rate` int(11) DEFAULT '0',
  `tm_id` int(11) DEFAULT '0',
  `amount` int(11) DEFAULT '0',
  `cwm_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribution_management`
--

INSERT INTO `distribution_management` (`dm_id`, `d_id`, `distributor_head_id`, `status`, `date`, `working hours`, `rate`, `tm_id`, `amount`, `cwm_id`) VALUES
(1, 1, 1, 'Inload', NULL, 1, 1, 1, 1, 1),
(2, 2, 2, 'Offload', NULL, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) CHARACTER SET utf8 NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Faizan', '2018-10-04 07:04:49', '2018-10-04 07:04:49'),
(2, 'Munawwar', '2018-10-04 07:04:49', '2018-10-04 07:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `e_id` int(11) NOT NULL,
  `e_name` varchar(255) DEFAULT NULL,
  `e_nic` varchar(255) DEFAULT NULL,
  `e_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `e_address` varchar(255) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `e_desigination` varchar(255) DEFAULT NULL,
  `e_salary` varchar(255) DEFAULT NULL,
  `e_bonus` int(11) DEFAULT NULL,
  `status` varchar(128) NOT NULL DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`e_id`, `e_name`, `e_nic`, `e_number`, `email`, `e_address`, `city`, `e_desigination`, `e_salary`, `e_bonus`, `status`, `created_at`, `updated_at`) VALUES
(1, 'touqeer', '42201-2014810-3', '03402111701', 'banwooghar@gmail.com', 'Malir', 'karachi', 'Agent', '20000', 0, 'active', '2018-10-05 11:07:58', '0000-00-00 00:00:00'),
(2, 'Code Bucketz', '4220120148103', '030052364789', 'codebucketz@gmail.com', '1197 block 2 Azizabad fb area karachi', NULL, 'Agent', '20000', NULL, 'active', '2018-10-17 13:07:42', '2018-10-09 05:32:20'),
(3, 'Code Bucketz', '4220120148103', '030052364789', 'codebucketz@gmail.com', '1197 block 2 Azizabad fb area karachi', NULL, 'Agent', '20000', NULL, 'active', '2018-10-17 13:07:47', '2018-10-09 05:40:17'),
(5, 'Code Bucketz', '4220120148103', '030052364789', 'codebucketz@gmail.com', '1197 block 2 Azizabad fb area karachi', NULL, 'Agent', '20000', NULL, 'active', '2018-10-17 13:07:58', '2018-10-13 06:24:10'),
(6, 'Code Bucketz', '4220120148103', '030052364789', 'codebucketz@gmail.com', '1197 block 2 Azizabad fb area karachi', NULL, 'agent', '20000', NULL, 'active', '2018-10-17 13:08:13', '2018-10-16 07:12:11'),
(7, 'Event Bucketz', '4220120148103', '030052364789', 'EventBucketz@gmail.com', '1197 block 2 Azizabad fb area karachi', NULL, 'Agent', '20000', NULL, 'active', '2018-10-17 13:08:26', '2018-10-16 07:12:44'),
(8, 'Website and AdSense', '4220290020202020', '030052364789', 'codebucketz@gmail.com', 'House at Near Abdul Jabbar Dahani Street Naudero Raod Larkana', NULL, 'agent', '20000', NULL, 'active', '2018-10-17 08:08:45', '2018-10-17 08:08:45'),
(9, 'Code Bucketz', '4220120148103', '030052364789', 'codebucketz@gmail.com', '1197 block 2 Azizabad fb area karachi', NULL, 'agent', '20000', NULL, 'active', '2018-10-17 16:22:27', '2018-10-17 16:22:27'),
(10, 'Waqas', '03223', '023232', 'waqas@gmail.com', 'masroor', NULL, 'hr', '1000000', NULL, 'active', '2018-10-28 01:44:36', '2018-10-28 01:44:36'),
(11, '1', '1', '1', '1@gmail.com', '1', NULL, '1', '1', NULL, 'active', '2018-11-01 04:46:44', '2018-11-01 04:46:44');

-- --------------------------------------------------------

--
-- Table structure for table `employee_management`
--

CREATE TABLE `employee_management` (
  `employee_management_ID` int(11) NOT NULL,
  `employee_management_employee_id` int(11) DEFAULT '0',
  `employee_management_status` varchar(255) DEFAULT NULL,
  `employee_management_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ftl`
--

CREATE TABLE `ftl` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `cargo_type` text,
  `cargo_weight` text,
  `vechile_req` text,
  `movement_type` text,
  `origin` text,
  `destination` int(11) DEFAULT NULL,
  `date` text,
  `time` text,
  `mt_return` text,
  `mt_return_site` text,
  `loading` text,
  `offloading` text,
  `lifter` text,
  `tracker` text,
  `c_id` int(11) DEFAULT NULL,
  `dc_doc` text,
  `bc_doc` text,
  `cert_doc` text,
  `updated_at` varchar(255) DEFAULT NULL,
  `created_at` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `user_name` text,
  `shiper_name` text,
  `shiper_cell` text,
  `shiper_address` text,
  `rec_name` text,
  `rec_cell` text,
  `rec_address` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ftl`
--

INSERT INTO `ftl` (`id`, `order_id`, `cargo_type`, `cargo_weight`, `vechile_req`, `movement_type`, `origin`, `destination`, `date`, `time`, `mt_return`, `mt_return_site`, `loading`, `offloading`, `lifter`, `tracker`, `c_id`, `dc_doc`, `bc_doc`, `cert_doc`, `updated_at`, `created_at`, `status`, `amount`, `user_name`, `shiper_name`, `shiper_cell`, `shiper_address`, `rec_name`, `rec_cell`, `rec_address`) VALUES
(1, 10, 'Containerized', 'Upto 5-7 Tons', 'Boxed 18 FT', 'EXTODOOR', 'karachi', 14, '2018-11-08', '14:03', 'NO', NULL, 'ON', NULL, 'ON', NULL, 12, 'falcon.docx', 'Module-report-ERP.docx', 'REPORT.docx', '2018-11-06 11:55:47', '2018-11-06 11:55:47', 'Done', '3000', 'CodeBucketz', 'Touqeer', '03232322', 'malir', 'faraz', '0345672323', 'shahfaisal'),
(2, 11, 'Loose', 'Upto 5-7 Tons', 'Boxed 18 FT', 'EXTODOOR', 'karachi', 14, '2018-11-14', '01:01', 'NO', NULL, 'ON', NULL, NULL, 'ON', 12, 'falcon.docx', 'Module-report-ERP.docx', 'falcon.docx', '2018-11-07 08:45:34', '2018-11-07 08:45:34', 'Done', '6000', 'falcon', 'shahrukh', '03232322', 'malir', 'faraz', '0345672323', 'shahfaisal'),
(3, 12, 'Loose', 'Upto 5-7 Tons', 'Open 18 FT', 'EXTODOOR', 'karachi', 14, '2018-11-08', '01:00', 'NO', NULL, NULL, NULL, 'ON', NULL, 12, NULL, NULL, NULL, '2018-11-07 08:53:50', '2018-11-07 08:53:50', 'Request', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 3, 'Loose', 'Upto 5-7 Tons', 'Open 18 FT', 'PointToPoint', 'karachi', 14, '2018-11-02', '15:02', 'NO', NULL, NULL, NULL, NULL, NULL, 12, NULL, NULL, NULL, '2018-11-15 13:29:23', '2018-11-15 13:29:23', 'Request', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ftl_vendor`
--

CREATE TABLE `ftl_vendor` (
  `ID` int(11) NOT NULL,
  `ftl_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `trip_type` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `multi_stations` varchar(255) DEFAULT NULL,
  `payment` int(11) NOT NULL,
  `advance` int(11) DEFAULT NULL,
  `balance` int(11) DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `plate_no` varchar(255) DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `driver_contact` varchar(255) DEFAULT NULL,
  `detention` int(11) DEFAULT NULL,
  `deduction` int(11) DEFAULT NULL,
  `diversion` varchar(255) DEFAULT NULL,
  `stopover` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ftl_vendor`
--

INSERT INTO `ftl_vendor` (`ID`, `ftl_id`, `vendor_id`, `trip_type`, `credit`, `multi_stations`, `payment`, `advance`, `balance`, `tax`, `plate_no`, `driver_name`, `driver_contact`, `detention`, `deduction`, `diversion`, `stopover`, `status`, `updated_at`, `created_at`) VALUES
(7, 11, 1, 'multi-station', NULL, 'clifton,malir,kalaboard', 5000, NULL, 5000, 200, 'kqo-2952', 'waleed', '0232123221', 1000, 200, 'no', 'yes', 'done', '2018-11-22 10:02:33', '2018-11-14 06:24:10'),
(8, 10, 1, 'multi-station', NULL, 'clifton,malir,kalaboard', 9000, 5000, 4000, 500, 'kgh-231', 'kashif', '0232123221', 4000, 200, 'no', 'yes', 'done', '2018-11-22 10:02:37', '2018-11-14 07:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `inload_logs`
--

CREATE TABLE `inload_logs` (
  `id` int(11) NOT NULL,
  `inload_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_in` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `invoice_date` datetime DEFAULT NULL,
  `invoice_recieve` longtext,
  `invoice_customer_detail` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_ID` int(11) NOT NULL,
  `location_name` varchar(255) DEFAULT NULL,
  `location_longitude` varchar(255) DEFAULT NULL,
  `location_latitude` varchar(255) DEFAULT NULL,
  `location_radius` varchar(255) DEFAULT NULL,
  `location_zone` varchar(255) DEFAULT NULL,
  `location_zip_code` int(11) DEFAULT '0',
  `location_city` varchar(255) DEFAULT NULL,
  `location_country` varchar(255) DEFAULT NULL,
  `location_state` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_ID`, `location_name`, `location_longitude`, `location_latitude`, `location_radius`, `location_zone`, `location_zip_code`, `location_city`, `location_country`, `location_state`, `created_at`, `updated_at`) VALUES
(1, 'Jouhar', '25', '50', '30', 'East', 75, 'Karachi', 'Pakistan', 'Sindh', NULL, NULL),
(2, 'Gulshan', '50', '25', '45', 'West', 55, 'Lahore', 'Pakistan', 'Sindh', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `l_id` int(11) NOT NULL,
  `l_longitude` varchar(255) DEFAULT NULL,
  `l_latitude` varchar(255) DEFAULT NULL,
  `l_radius` varchar(255) DEFAULT NULL,
  `l_zone` varchar(255) DEFAULT NULL,
  `l_zip_code` int(11) DEFAULT '0',
  `l_city` varchar(255) DEFAULT NULL,
  `l_country` varchar(255) DEFAULT NULL,
  `l_state` varchar(255) DEFAULT NULL,
  `cn_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`l_id`, `l_longitude`, `l_latitude`, `l_radius`, `l_zone`, `l_zip_code`, `l_city`, `l_country`, `l_state`, `cn_id`, `created_at`, `updated_at`) VALUES
(14, '67.06142369999999', '24.9140526', NULL, NULL, 0, NULL, NULL, 'From Address', 16, '2018-10-13 17:08:44', '2018-10-13 17:08:44'),
(13, '67.1753509', '24.884567', NULL, NULL, 0, NULL, NULL, 'To Address', 16, '2018-10-13 17:08:43', '2018-10-13 17:08:43'),
(12, '67.06142369999999', '24.9140526', NULL, NULL, 0, NULL, NULL, 'From Address', 11, '2018-10-13 06:22:51', '2018-10-13 06:22:51'),
(11, '67.06142369999999', '24.9140526', NULL, NULL, 0, NULL, NULL, 'To Address', 11, '2018-10-13 06:22:51', '2018-10-13 06:22:51'),
(10, '67.06142369999999', '24.9140526', NULL, NULL, 0, NULL, NULL, 'From Address', 10, '2018-10-11 01:16:06', '2018-10-11 01:16:06'),
(9, '67.06142369999999', '24.9140526', NULL, NULL, 0, NULL, NULL, 'To Address', 10, '2018-10-11 01:16:06', '2018-10-11 01:16:06'),
(15, '67.06142369999999', '24.9140526', NULL, NULL, 0, NULL, NULL, 'To Address', 17, '2018-10-13 17:10:59', '2018-10-13 17:10:59'),
(16, '67.06142369999999', '24.9140526', NULL, NULL, 0, NULL, NULL, 'From Address', 17, '2018-10-13 17:10:59', '2018-10-13 17:10:59');

-- --------------------------------------------------------

--
-- Table structure for table `ltl`
--

CREATE TABLE `ltl` (
  `ltl_id` int(11) NOT NULL,
  `ltl_order` int(11) DEFAULT '0',
  `ltl_customer_name` longtext,
  `ltl_reciever_name` longtext,
  `ltl_mcr` longtext,
  `ltl_station` longtext,
  `ltl_distribution_type` longtext,
  `ltl_item` longtext,
  `ltl_dc` longtext,
  `ltl_packing` longtext,
  `ltl_quantity` int(11) DEFAULT '0',
  `ltl_delivery_location` longtext,
  `ltl_vehicle_type` longtext,
  `ltl_vendor_name` longtext,
  `ltl_number_plate` longtext,
  `ltl_cn` longtext,
  `ltl_agent_name` longtext,
  `ltl_charges` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ltlorder`
--

CREATE TABLE `ltlorder` (
  `Id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `ordercode` int(11) NOT NULL,
  `deliverypoint` int(11) NOT NULL,
  `deliverydate` text NOT NULL,
  `rec_id` int(11) NOT NULL,
  `destination` text NOT NULL,
  `productweight` int(11) NOT NULL,
  `dimensionweight` int(11) NOT NULL,
  `specailremarks` text NOT NULL,
  `totalcost` int(11) NOT NULL,
  `type` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `timeto` text,
  `timefrom` text,
  `picname` text,
  `piccell` text,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL,
  `cond` text NOT NULL,
  `shipment` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ltlorder`
--

INSERT INTO `ltlorder` (`Id`, `c_id`, `ordercode`, `deliverypoint`, `deliverydate`, `rec_id`, `destination`, `productweight`, `dimensionweight`, `specailremarks`, `totalcost`, `type`, `status`, `timeto`, `timefrom`, `picname`, `piccell`, `updated_at`, `created_at`, `cond`, `shipment`) VALUES
(3, 0, 0, 1, '2018-10-30', 2, '14', 22, 3, '0', 264, 'PointToPoint', 'save', NULL, NULL, NULL, NULL, '2018-10-28 12:03:05', '2018-10-28 12:03:05', '', ''),
(4, 12, 0, 3, '2018-10-31', 2, '14', 22, 3, '0', 264, 'PointToPoint', 'upload', NULL, NULL, NULL, NULL, '2018-10-28 12:03:48', '2018-10-28 12:03:48', '', ''),
(5, 12, 4, 1, '2018-10-24', 2, '14', 200, 20480, '0', 245760, 'PointToPoint', 'upload', NULL, NULL, NULL, NULL, '2018-10-28 12:39:17', '2018-10-28 12:39:17', '', ''),
(6, 5, 5, 2, '2018-10-31', 2, '14', 187, 108, '0', 2244, 'PointToPoint', 'save', NULL, NULL, NULL, NULL, '2018-10-28 14:16:06', '2018-10-28 14:16:06', '', ''),
(7, 12, 6, 1, '2018-10-24', 2, '14', 4, 0, '0', 48, 'PointToPoint', 'save', NULL, NULL, NULL, NULL, '2018-10-28 18:26:26', '2018-10-28 18:26:26', '', ''),
(8, 12, 7, 14, '2018-10-29', 3, '14', 144, 50, '0', 597, 'Ex To Point', 'upload', NULL, NULL, NULL, NULL, '2018-10-28 20:15:25', '2018-10-28 20:15:25', '', ''),
(9, 12, 8, 14, '2018-10-31', 3, '14', 1, 0, '0', 12, 'ExToPoint', 'save', '01:01', '01:01', 'Syed Ali Ahmed', '03323486878', '2018-10-28 20:44:38', '2018-10-28 20:44:38', '', ''),
(10, 12, 9, 1, '2018-10-25', 2, '14', 4, 0, '0', 48, 'PointToPoint', 'save', NULL, NULL, NULL, NULL, '2018-10-28 20:47:06', '2018-10-28 20:47:06', '', ''),
(11, 10, 10, 2, '2018-10-16', 2, '14', 9, 0, '0', 108, 'PointToPoint', 'save', NULL, NULL, NULL, NULL, '2018-10-29 06:46:32', '2018-10-29 06:46:32', '', ''),
(12, 11, 11, 2, '2018-10-30', 3, '14', 40, 640, '1', 7680, 'ExToPoint', 'save', '01:01', '01:01', 'Zohaid Faruqui', '02123232', '2018-10-29 08:27:31', '2018-10-29 08:27:31', '', ''),
(13, 12, 12, 1, '2018-10-31', 3, '14', 16, 0, '0', 192, 'ExToPoint', 'upload', '01:01', '01:01', 'Sharukh Khan', '0334345344', '2018-10-29 10:08:57', '2018-10-29 10:08:57', '', ''),
(14, 12, 13, 2, '2018-10-30', 2, '14', 101, 0, '1', 1212, 'PointToPoint', 'save', NULL, NULL, NULL, NULL, '2018-10-29 12:56:19', '2018-10-29 12:56:19', '', ''),
(15, 14, 14, 1, '2018-10-30', 2, '14', 4, 0, '1', 48, 'PointToPoint', 'save', NULL, NULL, NULL, NULL, '2018-10-29 13:05:16', '2018-10-29 13:05:16', 'Zone and Tarif Condition Applied', ''),
(16, 15, 15, 1, '2018-10-18', 3, '14', 100, 72, '0', 864, 'PointToPoint', 'upload', NULL, NULL, NULL, NULL, '2018-10-31 15:02:48', '2018-10-31 15:02:48', 'Zone and Tarif Condition Applied', '5'),
(17, 16, 16, 2, '2018-11-22', 39, '14', 170, 826, '0', 9912, 'ExToDoor', 'save', '02:00', '01:00', 'Zohaid Faruqui', '02123232', '2018-11-04 09:49:41', '2018-11-04 09:49:41', 'Zone Condition Applied', '2'),
(18, 12, 17, 2, '2018-11-28', 40, '14', 36, 1, '0', 432, 'ExToDoor', 'upload', '01:01', '01:01', 'Zohaid Faruqui', '02123232', '2018-11-04 09:53:49', '2018-11-04 09:53:49', 'Zone Condition Applied', '3'),
(19, 12, 18, 1, '2018-11-14', 5, '14', 240, 48, '0', 2880, 'PointToDoor', 'save', NULL, NULL, NULL, NULL, '2018-11-04 11:39:52', '2018-11-04 11:39:52', 'Zone Condition Applied', '2'),
(20, 12, 19, 1, '2018-11-21', 40, '14', 4, 0, '0', 48, 'PointToDoor', 'upload', NULL, NULL, NULL, NULL, '2018-11-04 11:43:11', '2018-11-04 11:43:11', 'Zone Condition Applied', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mcr`
--

CREATE TABLE `mcr` (
  `mcr_id` int(11) NOT NULL,
  `mcr_vehicle` int(11) DEFAULT NULL,
  `mcr_consolidate_name` varchar(191) DEFAULT NULL,
  `mcr_vendor` int(11) DEFAULT NULL,
  `mcr_driver_name` varchar(191) DEFAULT NULL,
  `mcr_driver_cell` varchar(191) DEFAULT NULL,
  `mcr_charges` int(11) DEFAULT NULL,
  `mcr_advance` int(11) DEFAULT NULL,
  `mcr_balance` int(11) DEFAULT NULL,
  `mcr_from` varchar(191) DEFAULT NULL,
  `mcr_to` varchar(191) DEFAULT NULL,
  `mcr_via` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mcr`
--

INSERT INTO `mcr` (`mcr_id`, `mcr_vehicle`, `mcr_consolidate_name`, `mcr_vendor`, `mcr_driver_name`, `mcr_driver_cell`, `mcr_charges`, `mcr_advance`, `mcr_balance`, `mcr_from`, `mcr_to`, `mcr_via`, `created_at`, `updated_at`) VALUES
(1, 1, 'CONSOLIDATE', 8, 'DRIVER', '92837837223', 500, 200, 300, 'MCR FROM', 'MCR TO', 'MCR VIA', '2018-12-03 13:56:23', '2018-12-03 14:39:52'),
(2, 2, 'CONSOLIDATE', 8, 'DRIVER', '92837837223', 500, 200, 300, 'MCR FROM', 'MCR TO', 'MCR VIA', '2018-12-03 13:56:23', '2018-12-03 14:39:55'),
(3, 1, NULL, 8, 'Shafiq', '5743658632', NULL, NULL, NULL, 'hyderabad', 'karachi', 'direct', '2018-12-03 14:47:41', '2018-12-03 14:47:41');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `office_expense`
--

CREATE TABLE `office_expense` (
  `office_expense_ID` int(11) NOT NULL,
  `office_expense_expense_name` varchar(255) DEFAULT NULL,
  `office_expense_expense_time` datetime DEFAULT NULL,
  `office_expense_expense_date` datetime DEFAULT NULL,
  `office_expense_authority` varchar(1) DEFAULT '0',
  `office_expense_expense_type` varchar(255) DEFAULT NULL,
  `office_expense_expense_amount` int(11) DEFAULT '0',
  `office_expense_status` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ofload_logs`
--

CREATE TABLE `ofload_logs` (
  `id` int(11) NOT NULL,
  `offload_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity_off` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_in_load`
--

CREATE TABLE `order_in_load` (
  `id` int(10) UNSIGNED NOT NULL,
  `grn` varchar(191) NOT NULL,
  `product_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `w_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `av_quantity` int(11) DEFAULT NULL,
  `no_of_pkgs` int(11) DEFAULT NULL,
  `av_pkgs` int(11) DEFAULT NULL,
  `remarks` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Pending',
  `sealStatus` varchar(191) DEFAULT NULL,
  `vehicle_no` varchar(191) NOT NULL,
  `vehicle_type` varchar(191) NOT NULL,
  `driver_name` varchar(191) NOT NULL,
  `driver_cnic` varchar(21) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_in_load`
--

INSERT INTO `order_in_load` (`id`, `grn`, `product_id`, `customer_id`, `w_id`, `quantity`, `av_quantity`, `no_of_pkgs`, `av_pkgs`, `remarks`, `status`, `sealStatus`, `vehicle_no`, `vehicle_type`, `driver_name`, `driver_cnic`, `created_at`, `updated_at`) VALUES
(1, 'GRN/EST/14/11/2018/1', 00000000001, 8, 1, 250, 40, NULL, NULL, 'All Okay', 'Accepted', 'Sealed', 'ABC-213', 'Suzuki', 'Fahad', '4220194084322', '2018-11-14 06:44:52', '2018-11-15 11:56:55'),
(2, 'GRN/EST/14/11/2018/2', 00000000001, 8, 3, 250, NULL, NULL, NULL, 'Not Allowed', 'Rejected', 'Sealed', 'CU-8994', 'Suzuki', 'Saleem', '422019753373', '2018-11-14 06:45:44', '2018-11-15 09:13:04'),
(3, 'GRN/PCL/14/11/2018/3', 00000000002, 2, 1, 500, 300, NULL, NULL, 'All Okay', 'Accepted', 'Sealed', 'CU-8994', 'Suzuki', 'Ashraf', '422017363532', '2018-11-14 08:09:49', '2018-11-15 09:13:09'),
(4, 'GRN/PCL/14/11/2018/4', 00000000002, 2, 2, 200, 100, NULL, NULL, 'All Okay', 'Accepted', 'Sealed', 'CU-8994', 'Suzuki', 'Asad', '422017653833', '2018-11-14 08:12:47', '2018-11-15 09:13:19'),
(5, 'GRN/EST/14/11/2018/5', 00000000001, 8, 1, 500, NULL, NULL, NULL, NULL, 'Pending', NULL, 'ABC-213', 'Suzuki', 'Asad', '422086775222', '2018-11-14 09:09:52', '2018-11-15 09:13:24'),
(6, 'GRN/EST/15/11/2018/6', 00000000001, 8, 3, 5000, 3000, NULL, NULL, 'All Okay', 'Accepted', 'Sealed', 'CU-8994', 'Suzuki', 'Fahad', '422019876524', '2018-11-15 09:43:43', '2018-11-22 14:30:42'),
(7, 'GRN/EST/15/11/2018/7', 00000000001, 8, 1, 1000, NULL, NULL, NULL, NULL, 'Pending', NULL, 'CJ-8763', 'Suzuki', 'Ashraf', '422019383632', '2018-11-15 10:10:10', '2018-11-15 10:10:10'),
(8, 'GRN/EST/16/11/2018/8', 00000000003, 8, 2, 5000, NULL, NULL, NULL, NULL, 'Pending', NULL, 'LHE-577', 'Highroof', 'Quddoos', '4220765438264', '2018-11-16 07:26:12', '2018-11-16 07:26:12'),
(9, 'GRN/EST/16/11/2018/9', 00000000003, 8, 2, 500, 300, NULL, NULL, 'All Okay', 'Accepted', 'Sealed', 'CU-8994', 'Highroof', 'Quddoos', '422018373234', '2018-11-16 10:42:31', '2018-11-22 14:37:25'),
(10, 'GRN/EST/16/11/2018/10', 00000000001, 8, 2, 1200, 200, NULL, NULL, 'All Okay', 'Accepted', 'Sealed', 'ABC-213', 'Suzuki', 'Fahad', '422018374732', '2018-11-16 10:43:49', '2018-11-22 14:37:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_off_load`
--

CREATE TABLE `order_off_load` (
  `id` int(10) UNSIGNED NOT NULL,
  `dcn` varchar(191) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `inload_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `consignee_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `remarks` varchar(191) DEFAULT NULL,
  `status` varchar(191) DEFAULT 'Pending',
  `picked` int(11) NOT NULL DEFAULT '0',
  `no_of_pkgs` int(11) DEFAULT NULL,
  `vehicle_type` varchar(191) DEFAULT NULL,
  `vehicle_no` varchar(191) DEFAULT NULL,
  `driver_name` varchar(191) DEFAULT NULL,
  `order_type` varchar(50) DEFAULT NULL,
  `sp_date` date DEFAULT NULL,
  `sp_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_off_load`
--

INSERT INTO `order_off_load` (`id`, `dcn`, `product_id`, `customer_id`, `inload_id`, `w_id`, `consignee_id`, `quantity`, `remarks`, `status`, `picked`, `no_of_pkgs`, `vehicle_type`, `vehicle_no`, `driver_name`, `order_type`, `sp_date`, `sp_time`, `created_at`, `updated_at`) VALUES
(1, 'FWL/PCL/14/11/2018/1', 2, 2, 3, 1, 1, 200, NULL, 'Accepted', 0, NULL, '', '', '', 'Very Urgent', NULL, NULL, '2018-11-14 08:12:03', '2018-11-29 08:10:38'),
(2, 'FWL/PCL/14/11/2018/2', 2, 2, 4, 2, 1, 100, 'Hand Over', 'Accepted', 0, NULL, '', '', '', 'Same Day', NULL, NULL, '2018-11-14 08:14:30', '2018-11-29 08:10:38'),
(3, 'FWL/EST/14/11/2018/3', 1, 8, 1, 1, 2, 50, 'Hand Over', 'Accepted', 1, NULL, '', '', '', 'Normal', NULL, NULL, '2018-11-14 09:02:28', '2018-11-29 08:10:01'),
(4, 'FWL/EST/14/11/2018/4', 1, 8, 1, 1, 1, 100, NULL, 'Pending', 1, NULL, '', '', '', 'Very Urgent', NULL, NULL, '2018-11-14 14:24:56', '2018-11-29 08:10:38'),
(5, 'FWL/EST/15/11/2018/5', 1, 8, 1, 1, 2, 50, 'Hand Over', 'Accepted', 1, NULL, '', '', '', 'Time Specific', '2018-11-17', '19:50:00', '2018-11-15 11:52:37', '2018-11-29 13:42:08'),
(6, 'FWL/EST/15/11/2018/6', 1, 8, 1, 1, 1, 10, NULL, 'Pending', 1, NULL, '', '', '', 'Same Day', NULL, NULL, '2018-11-15 11:56:54', '2018-11-29 08:10:38'),
(7, 'FWL/EST/16/11/2018/7', 1, 8, 10, 2, 1, 1000, NULL, 'Accepted', 1, NULL, '', '', '', 'Very Urgent', NULL, NULL, '2018-11-16 11:36:14', '2018-11-29 13:42:21'),
(8, 'FWL/EST/22/11/2018/8', 1, 8, 6, 3, 2, 2000, NULL, 'Pending', 0, NULL, '', '', '', 'Normal', NULL, NULL, '2018-11-22 14:30:41', '2018-11-29 08:10:38'),
(9, 'FWL/EST/22/11/2018/9', 3, 8, 9, 2, 1, 200, NULL, 'Pending', 1, NULL, '', '', '', 'Normal', NULL, NULL, '2018-11-22 14:31:00', '2018-11-29 08:10:38');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lenght` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `width` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `type`, `lenght`, `height`, `width`, `weight`, `c_id`) VALUES
(1, 'carton lux', 'cartan', 10, 10, 10, 10, 12),
(2, 'pipe roll', 'roll', 30, 30, 30, 5, 12),
(3, 'Asim', 'roll', 29, 19, 10, 12, 12),
(4, 'Ali', 'cartan', 1, 1, 1, 1, 12),
(5, 'tuc', '2', 2, 2, 2, 2, 12),
(6, 'Ali', 'cartan', 1, 1, 10, 1, 12),
(7, 'Ali', 'cartan', 1, 10, 10, 201, 12),
(8, 'Ali', 'cartan', 12, 12, 12, 12, 12);

-- --------------------------------------------------------

--
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `personal_info_personal_id` int(11) NOT NULL,
  `personal_info_person_name` varchar(191) DEFAULT NULL,
  `personal_info_person_nic` varchar(191) DEFAULT NULL,
  `personal_info_contact_number` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `personal_info_address` longtext,
  `personal_info_head` varchar(191) DEFAULT NULL,
  `personal_info_amount` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personal_info`
--

INSERT INTO `personal_info` (`personal_info_personal_id`, `personal_info_person_name`, `personal_info_person_nic`, `personal_info_contact_number`, `email`, `password`, `personal_info_address`, `personal_info_head`, `personal_info_amount`, `created_at`, `updated_at`) VALUES
(1, 'Waqar Ahmed', '4220187654309', '03002310443', 'waqar@gmail.com', '$2y$10$6xfuSMVsmhRvkcox.Roc2.bwbBmxKdN.PVLSNDaSPEOLZTce5vuMa', 'Home address block A Colony', '12', NULL, NULL, NULL),
(2, 'Naseem Siddiqui', '4220186345638', '03176598243', 'nasee@gmail.com', '$2y$10$6xfuSMVsmhRvkcox.Roc2.bwbBmxKdN.PVLSNDaSPEOLZTce5vuMa', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cell` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `c_id` int(11) NOT NULL,
  `updated_at` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `name` longtext,
  `company` longtext,
  `quantity` int(11) DEFAULT NULL,
  `customer_id` int(11) UNSIGNED DEFAULT NULL,
  `type` longtext,
  `price` int(11) DEFAULT NULL,
  `qrcode` varchar(191) DEFAULT NULL,
  `description` longtext,
  `packing` longtext,
  `height` int(11) DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `company`, `quantity`, `customer_id`, `type`, `price`, `qrcode`, `description`, `packing`, `height`, `width`, `length`, `weight`, `created_at`, `updated_at`) VALUES
(00000000001, 'Fan', NULL, NULL, 8, 'Ceiling Fan', 7500, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product1', 'Electronics', 'Boxes', NULL, NULL, NULL, NULL, '2018-11-14 06:43:12', '2018-11-16 08:18:55'),
(00000000002, 'Fiber Cables', NULL, NULL, 2, 'Wires', 10500, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product2', 'Electronics', 'Boxes', NULL, NULL, NULL, NULL, '2018-11-14 08:08:51', '2018-11-16 08:18:47'),
(00000000003, 'Sewing Machine', NULL, NULL, 8, 'Version 2.0', 13500, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product3', 'Electronics', 'Carton', NULL, NULL, NULL, NULL, '2018-11-15 12:01:06', '2018-11-16 08:18:45'),
(00000000004, 'Satelite', NULL, NULL, 8, 'Laptop', 31500, NULL, 'Core i7', 'Boxes', NULL, NULL, NULL, NULL, '2018-11-22 08:46:37', '2018-11-22 08:46:37');

-- --------------------------------------------------------

--
-- Table structure for table `product_logs`
--

CREATE TABLE `product_logs` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity_in` int(11) DEFAULT NULL,
  `quantity_off` int(11) DEFAULT NULL,
  `type` varchar(191) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_logs`
--

INSERT INTO `product_logs` (`id`, `p_id`, `customer_id`, `quantity_in`, `quantity_off`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 1000, NULL, 'New', '2018-11-14 06:43:12', '2018-11-14 06:43:12'),
(2, 1, 8, NULL, 250, 'Inload', '2018-11-14 06:47:43', '2018-11-14 06:47:43'),
(3, 2, 2, 1000, NULL, 'New', '2018-11-14 08:08:51', '2018-11-14 08:08:51'),
(4, 2, 2, NULL, 500, 'Inload', '2018-11-14 08:11:04', '2018-11-14 08:11:04'),
(5, 2, 2, NULL, 200, 'Inload', '2018-11-14 08:12:47', '2018-11-14 08:12:47'),
(6, 2, 2, 200, NULL, 'Increase', '2018-11-14 08:14:00', '2018-11-14 08:14:00'),
(7, 1, 8, 500, NULL, 'Increase', '2018-11-14 11:12:07', '2018-11-14 11:12:07'),
(8, 1, 8, NULL, 5000, 'Inload', '2018-11-15 12:03:02', '2018-11-15 12:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `sales work`
--

CREATE TABLE `sales work` (
  `ID` int(11) NOT NULL,
  `type of work` varchar(255) DEFAULT NULL,
  `agreement start` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `area id` varchar(255) DEFAULT NULL,
  `percentage done` varchar(255) DEFAULT NULL,
  `success client` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales_management`
--

CREATE TABLE `sales_management` (
  `sales_management_ID` int(11) NOT NULL,
  `sales_management_sales_person_id` varchar(255) DEFAULT NULL,
  `sales_management_sales_manager_id` int(255) DEFAULT NULL,
  `sales_management_status` varchar(255) DEFAULT NULL,
  `sales_management_work_assign` varchar(255) DEFAULT NULL,
  `sales_management_sales_work_id` int(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `standard_warehouse_management`
--

CREATE TABLE `standard_warehouse_management` (
  `swm_id` int(11) NOT NULL,
  `wm_id` int(11) DEFAULT '0',
  `p_id` int(11) DEFAULT '0',
  `time` datetime DEFAULT NULL,
  `p_quantity` longtext,
  `qr_code` longtext,
  `status` longtext,
  `person_name` longtext,
  `head_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tax`
--

CREATE TABLE `tax` (
  `tax_ID` int(11) NOT NULL,
  `tax_name` varchar(255) DEFAULT NULL,
  `tax_amount` int(11) DEFAULT '0',
  `tax_pecentage` decimal(18,0) DEFAULT '0',
  `tax_rate` int(11) DEFAULT '0',
  `tax_type` varchar(255) DEFAULT NULL,
  `tax_update_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tax`
--

INSERT INTO `tax` (`tax_ID`, `tax_name`, `tax_amount`, `tax_pecentage`, `tax_rate`, `tax_type`, `tax_update_date`) VALUES
(1, 'Super Tax', 5000, NULL, NULL, NULL, NULL),
(2, 'Income Tax', 10000, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `temporary_storage`
--

CREATE TABLE `temporary_storage` (
  `id` int(10) UNSIGNED NOT NULL,
  `w_id` int(11) NOT NULL,
  `space_taken` int(11) NOT NULL,
  `shelves_taken` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `time_management`
--

CREATE TABLE `time_management` (
  `time_management_ID` int(11) NOT NULL,
  `time_management_time_request` longtext,
  `time_management_time_accept` varchar(255) DEFAULT NULL,
  `time_management_time_warehouse_left` varchar(255) DEFAULT NULL,
  `time_management_time_deliver` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `t_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `client_company_id` int(11) UNSIGNED DEFAULT '0',
  `vehicle_managment_id` int(11) UNSIGNED DEFAULT '0',
  `warehouse_management_id` int(11) UNSIGNED DEFAULT '0',
  `tax_id` int(11) UNSIGNED DEFAULT '0',
  `distribution_id` int(11) UNSIGNED DEFAULT '0',
  `personal_info_id` int(10) UNSIGNED NOT NULL,
  `agent_management_id` int(11) UNSIGNED DEFAULT '0',
  `product_id` int(11) UNSIGNED DEFAULT '0',
  `amount` int(11) UNSIGNED DEFAULT '0',
  `status` varchar(255) DEFAULT NULL,
  `barcode` int(11) UNSIGNED ZEROFILL NOT NULL,
  `sales_id` int(11) UNSIGNED DEFAULT NULL,
  `booking_id` int(11) UNSIGNED DEFAULT NULL,
  `route_from` varchar(255) DEFAULT NULL,
  `route_to` varchar(255) DEFAULT NULL,
  `cn` varchar(255) DEFAULT NULL,
  `mcr` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`t_id`, `client_company_id`, `vehicle_managment_id`, `warehouse_management_id`, `tax_id`, `distribution_id`, `personal_info_id`, `agent_management_id`, `product_id`, `amount`, `status`, `barcode`, `sales_id`, `booking_id`, `route_from`, `route_to`, `cn`, `mcr`) VALUES
(00000000001, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'OnLoad', 00000000001, 1, 1, 'Karachi', 'Lahore', NULL, NULL),
(00000000002, 2, 2, 2, 2, 2, 2, 2, 13, 2, 'OffLoad', 00000000002, 2, 2, 'Lahore', 'Karachi', NULL, NULL),
(00000000003, 2, 1, 2, 2, 3, 2, 1, 1, 37000, 'Kidnapped', 00000000003, NULL, NULL, 'Karachi', 'Karachi', NULL, NULL),
(00000000004, 1, 2, 3, 2, 4, 2, 1, 13, 43000, 'Hijacked', 00000000004, NULL, NULL, 'Karachi', 'Karachi', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transport_route`
--

CREATE TABLE `transport_route` (
  `transport_route_ID` int(11) NOT NULL,
  ` transport_route_pick_from_id` int(11) DEFAULT '0',
  `transport_route_drop_id` int(11) DEFAULT '0',
  `transport_route_date` datetime DEFAULT NULL,
  ` _transport_route_distance_perKM` int(11) DEFAULT '0',
  `transport_route_transport_id` int(11) DEFAULT '0',
  `transport_route_rate_perKM` int(11) DEFAULT '0',
  `transport_route_amount` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_ID` int(11) NOT NULL,
  `vehicle_name` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL,
  `vehicle_number` varchar(255) DEFAULT NULL,
  `vehicle_color` varchar(255) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `vehicle_condition` varchar(255) DEFAULT NULL,
  `vehicle_entry_date_(O_S)` datetime DEFAULT NULL,
  `vehicle_contract_time_(O_S)` datetime DEFAULT NULL,
  `vehicle_contract_expire_date_(O_S)` datetime DEFAULT NULL,
  `vehicle_owner_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_ID`, `vehicle_name`, `vehicle_type`, `vehicle_number`, `vehicle_color`, `vehicle_model`, `vehicle_condition`, `vehicle_entry_date_(O_S)`, `vehicle_contract_time_(O_S)`, `vehicle_contract_expire_date_(O_S)`, `vehicle_owner_name`) VALUES
(1, 'Toyota', 'Dabba', 'AKZ765', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Suzuki', 'Khassi', 'BKG257', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_management`
--

CREATE TABLE `vehicle_management` (
  `vehicle_management_ID` int(11) NOT NULL,
  `vehicle_id` int(10) UNSIGNED NOT NULL,
  `vehicle_management_driver_id` int(11) DEFAULT '0',
  `vehicle_management_transport_id` int(11) DEFAULT '0',
  `vehicle_management_transport_manager_id` int(11) DEFAULT '0',
  `vehicle_management_transport_route_id_start` int(11) DEFAULT '0',
  `vehicle_management_transport_route_id_end` int(11) DEFAULT '0',
  `vehicle_management_client_id` int(11) DEFAULT '0',
  `vehicle_management_amount` int(11) DEFAULT '0',
  `vehicle_management_rate_perKG` int(11) DEFAULT '0',
  `vehicle_management_rate_perSize` int(11) DEFAULT '0',
  `vehicle_management_time` datetime DEFAULT NULL,
  `vehicle_management_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle_management`
--

INSERT INTO `vehicle_management` (`vehicle_management_ID`, `vehicle_id`, `vehicle_management_driver_id`, `vehicle_management_transport_id`, `vehicle_management_transport_manager_id`, `vehicle_management_transport_route_id_start`, `vehicle_management_transport_route_id_end`, `vehicle_management_client_id`, `vehicle_management_amount`, `vehicle_management_rate_perKG`, `vehicle_management_rate_perSize`, `vehicle_management_time`, `vehicle_management_date`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL),
(2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_management_product`
--

CREATE TABLE `vehicle_management_product` (
  `vehicle_management_product_ID` int(11) NOT NULL,
  `vehicle_management_product_vehicle_management_id` int(11) DEFAULT '0',
  `vehicle_management_product_product_id` int(11) DEFAULT '0',
  `vehicle_management_product_quantity` int(11) DEFAULT '0',
  `vehicle_management_product_weight` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `warehouses`
--

CREATE TABLE `warehouses` (
  `w_id` int(11) NOT NULL,
  `w_name` varchar(255) DEFAULT NULL,
  `warehouse_contract` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `warehouse_space` int(11) DEFAULT '0',
  `no_of_shelves` int(11) DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `free_space` int(11) DEFAULT '0',
  `free_shelves` int(11) DEFAULT '0',
  `warehouse_rate` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`w_id`, `w_name`, `warehouse_contract`, `location`, `warehouse_space`, `no_of_shelves`, `user_id`, `free_space`, `free_shelves`, `warehouse_rate`, `created_at`, `updated_at`) VALUES
(1, 'Korangi Warehouse', 'Siddique', 'Karachi', 50000, 1000, 1, 50000, 1000, 800, '2018-10-12 06:53:50', '2018-11-16 06:54:14'),
(2, 'Model Town Warehouse', 'Mustaqem', 'Lahore', 30000, 500, 2, 30000, 500, 750, '2018-10-12 06:54:35', '2018-11-16 06:54:25'),
(3, 'Clifton Warehouse', 'Farooq', 'Karachi', 70000, 2000, 2, 70000, 2000, 950, '2018-10-12 12:02:17', '2018-11-16 06:54:20');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_management`
--

CREATE TABLE `warehouse_management` (
  `wm_id` int(11) NOT NULL,
  `client_id` int(11) DEFAULT '0',
  `sales_person_id` int(11) DEFAULT '0',
  `w_id` int(11) DEFAULT '0',
  `no_of_shelves` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `rate_per_day` int(11) DEFAULT NULL,
  `rate_per_space` int(11) DEFAULT NULL,
  `qrcode` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `company_id` int(11) DEFAULT '0',
  `contract_type` longtext,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouse_management`
--

INSERT INTO `warehouse_management` (`wm_id`, `client_id`, `sales_person_id`, `w_id`, `no_of_shelves`, `duration`, `amount`, `rate_per_day`, `rate_per_space`, `qrcode`, `company_id`, `contract_type`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, 10, 4, 500, 10, 100, 0000001989, 1, 'Contract', '2018-10-03 05:23:58', '2018-10-23 07:38:24'),
(2, 2, 2, 3, 10, 4, 500, 10, 100, 0000003692, 1, 'Contract', '2018-10-04 05:20:20', '2018-10-23 07:38:35'),
(3, 1, 2, 2, 20, 5, 500, 10, 100, 0000001568, 2, 'Contract', '2018-10-04 05:23:59', '2018-10-23 07:32:31'),
(4, 2, 2, 2, 20, 5, 500, 10, 100, 0000007160, 2, 'Contract', '2018-10-04 05:25:39', '2018-10-23 07:38:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agent management`
--
ALTER TABLE `agent management`
  ADD PRIMARY KEY (`agent_management_id`),
  ADD KEY `agent management agent  id` (`agent_management_agent_id`);

--
-- Indexes for table `assign_vehicle`
--
ALTER TABLE `assign_vehicle`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barcode`
--
ALTER TABLE `barcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_company`
--
ALTER TABLE `client_company`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `zip code` (`client_company_zip_code`);

--
-- Indexes for table `cn`
--
ALTER TABLE `cn`
  ADD PRIMARY KEY (`cn_id`);

--
-- Indexes for table `cn_refernece`
--
ALTER TABLE `cn_refernece`
  ADD PRIMARY KEY (`cn_refernece_id`);

--
-- Indexes for table `cod_customer`
--
ALTER TABLE `cod_customer`
  ADD PRIMARY KEY (`cod_ID`),
  ADD KEY `product id` (`cod_product_id`);

--
-- Indexes for table `company_working`
--
ALTER TABLE `company_working`
  ADD PRIMARY KEY (`company_working_ID`),
  ADD KEY `employee_management_id` (`company_working_employee_management_id`),
  ADD KEY `office_expense_id` (`company_working_office_expense_id`);

--
-- Indexes for table `consignee`
--
ALTER TABLE `consignee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consolidation_detail`
--
ALTER TABLE `consolidation_detail`
  ADD PRIMARY KEY (`consolidation_detail_id`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`currency_ID`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `acr` (`acr`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `customize_warehouse_management`
--
ALTER TABLE `customize_warehouse_management`
  ADD PRIMARY KEY (`cwm_id`),
  ADD KEY `distribution management id` (`dm_id`),
  ADD KEY `place deliever id` (`location_id`),
  ADD KEY `product id` (`p_id`),
  ADD KEY `time management id` (`tm_id`),
  ADD KEY `vechicle management id` (`vm_id`),
  ADD KEY `warehouse head id` (`head_id`),
  ADD KEY `warehouse management id` (`wm_id`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `warehouse_head_id` (`warehouse_head_id`),
  ADD KEY `mcr_id` (`mcr`),
  ADD KEY `location_id` (`location_id`),
  ADD KEY `vehicle_mng_id` (`vehicle_no`),
  ADD KEY `cn_id` (`cn`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `distribution_management`
--
ALTER TABLE `distribution_management`
  ADD PRIMARY KEY (`dm_id`),
  ADD KEY `customize warehouse management id` (`cwm_id`),
  ADD KEY `distributor head id` (`distributor_head_id`),
  ADD KEY `distributor id` (`d_id`),
  ADD KEY `time management id` (`tm_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee_management`
--
ALTER TABLE `employee_management`
  ADD PRIMARY KEY (`employee_management_ID`),
  ADD KEY `employee_id` (`employee_management_employee_id`);

--
-- Indexes for table `inload_logs`
--
ALTER TABLE `inload_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_ID`),
  ADD KEY `zip code` (`location_zip_code`);

--
-- Indexes for table `ltl`
--
ALTER TABLE `ltl`
  ADD PRIMARY KEY (`ltl_id`);

--
-- Indexes for table `mcr`
--
ALTER TABLE `mcr`
  ADD PRIMARY KEY (`mcr_id`),
  ADD KEY `mcr_vehicle` (`mcr_vehicle`),
  ADD KEY `mcr_vendor` (`mcr_vendor`);

--
-- Indexes for table `office_expense`
--
ALTER TABLE `office_expense`
  ADD PRIMARY KEY (`office_expense_ID`);

--
-- Indexes for table `ofload_logs`
--
ALTER TABLE `ofload_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_in_load`
--
ALTER TABLE `order_in_load`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `w_id` (`w_id`);

--
-- Indexes for table `order_off_load`
--
ALTER TABLE `order_off_load`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dcn` (`dcn`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `inload_id` (`inload_id`),
  ADD KEY `consignee_id` (`consignee_id`),
  ADD KEY `w_id` (`w_id`);

--
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`personal_info_personal_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `product_logs`
--
ALTER TABLE `product_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales work`
--
ALTER TABLE `sales work`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `area id` (`area id`);

--
-- Indexes for table `sales_management`
--
ALTER TABLE `sales_management`
  ADD PRIMARY KEY (`sales_management_ID`),
  ADD KEY `sales manager id` (`sales_management_sales_manager_id`),
  ADD KEY `sales person id` (`sales_management_sales_person_id`),
  ADD KEY `sales work id` (`sales_management_sales_work_id`);

--
-- Indexes for table `standard_warehouse_management`
--
ALTER TABLE `standard_warehouse_management`
  ADD PRIMARY KEY (`swm_id`),
  ADD KEY `product id` (`p_id`),
  ADD KEY `warehouse head id` (`head_id`),
  ADD KEY `warehouse management id` (`wm_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_ID`);

--
-- Indexes for table `temporary_storage`
--
ALTER TABLE `temporary_storage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_management`
--
ALTER TABLE `time_management`
  ADD PRIMARY KEY (`time_management_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`t_id`),
  ADD KEY `agent_management_id` (`agent_management_id`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `booking_id` (`booking_id`),
  ADD KEY `client_company_id` (`client_company_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `sales_id` (`sales_id`),
  ADD KEY `tax_id` (`tax_id`),
  ADD KEY `vehicle managment id` (`vehicle_managment_id`),
  ADD KEY `warehouse_management_id` (`warehouse_management_id`);

--
-- Indexes for table `transport_route`
--
ALTER TABLE `transport_route`
  ADD PRIMARY KEY (`transport_route_ID`),
  ADD KEY `transport_id` (`transport_route_transport_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_ID`);

--
-- Indexes for table `vehicle_management`
--
ALTER TABLE `vehicle_management`
  ADD PRIMARY KEY (`vehicle_management_ID`),
  ADD KEY `client_id` (`vehicle_management_client_id`),
  ADD KEY `driver_id` (`vehicle_management_driver_id`),
  ADD KEY `transport_route_id_start` (`vehicle_management_transport_route_id_start`);

--
-- Indexes for table `vehicle_management_product`
--
ALTER TABLE `vehicle_management_product`
  ADD PRIMARY KEY (`vehicle_management_product_ID`),
  ADD KEY `product_id` (`vehicle_management_product_product_id`);

--
-- Indexes for table `warehouses`
--
ALTER TABLE `warehouses`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `warehouse head_Id` (`user_id`);

--
-- Indexes for table `warehouse_management`
--
ALTER TABLE `warehouse_management`
  ADD PRIMARY KEY (`wm_id`),
  ADD KEY `client id` (`client_id`),
  ADD KEY `company id` (`company_id`),
  ADD KEY `sales person id` (`sales_person_id`),
  ADD KEY `warehouse id` (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent management`
--
ALTER TABLE `agent management`
  MODIFY `agent_management_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assign_vehicle`
--
ALTER TABLE `assign_vehicle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `barcode`
--
ALTER TABLE `barcode`
  MODIFY `id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client_company`
--
ALTER TABLE `client_company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cn`
--
ALTER TABLE `cn`
  MODIFY `cn_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cn_refernece`
--
ALTER TABLE `cn_refernece`
  MODIFY `cn_refernece_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cod_customer`
--
ALTER TABLE `cod_customer`
  MODIFY `cod_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `company_working`
--
ALTER TABLE `company_working`
  MODIFY `company_working_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `consignee`
--
ALTER TABLE `consignee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consolidation_detail`
--
ALTER TABLE `consolidation_detail`
  MODIFY `consolidation_detail_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `currency_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `customize_warehouse_management`
--
ALTER TABLE `customize_warehouse_management`
  MODIFY `cwm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distribution_management`
--
ALTER TABLE `distribution_management`
  MODIFY `dm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employee_management`
--
ALTER TABLE `employee_management`
  MODIFY `employee_management_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inload_logs`
--
ALTER TABLE `inload_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ltl`
--
ALTER TABLE `ltl`
  MODIFY `ltl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mcr`
--
ALTER TABLE `mcr`
  MODIFY `mcr_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `office_expense`
--
ALTER TABLE `office_expense`
  MODIFY `office_expense_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ofload_logs`
--
ALTER TABLE `ofload_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_in_load`
--
ALTER TABLE `order_in_load`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_off_load`
--
ALTER TABLE `order_off_load`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `personal_info_personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_logs`
--
ALTER TABLE `product_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sales work`
--
ALTER TABLE `sales work`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales_management`
--
ALTER TABLE `sales_management`
  MODIFY `sales_management_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `standard_warehouse_management`
--
ALTER TABLE `standard_warehouse_management`
  MODIFY `swm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `temporary_storage`
--
ALTER TABLE `temporary_storage`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_management`
--
ALTER TABLE `time_management`
  MODIFY `time_management_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `t_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transport_route`
--
ALTER TABLE `transport_route`
  MODIFY `transport_route_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_management`
--
ALTER TABLE `vehicle_management`
  MODIFY `vehicle_management_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehicle_management_product`
--
ALTER TABLE `vehicle_management_product`
  MODIFY `vehicle_management_product_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `warehouse_management`
--
ALTER TABLE `warehouse_management`
  MODIFY `wm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
