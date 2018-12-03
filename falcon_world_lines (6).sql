-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2018 at 08:01 AM
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
-- Table structure for table `barcode`
--

CREATE TABLE `barcode` (
  `id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `barcode_status` varchar(11) CHARACTER SET utf8 NOT NULL DEFAULT 'Free',
  `barcode` int(10) UNSIGNED ZEROFILL DEFAULT NULL,
  `extra_id` int(11) DEFAULT NULL,
  `more_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barcode`
--

INSERT INTO `barcode` (`id`, `barcode_status`, `barcode`, `extra_id`, `more_id`, `created_at`, `updated_at`) VALUES
(00000000001, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:29:59', '2018-10-27 00:30:00'),
(00000000002, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:00', '2018-10-27 00:30:00'),
(00000000003, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:00', '2018-10-27 00:30:00'),
(00000000004, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:00', '2018-10-27 00:30:00'),
(00000000005, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:00', '2018-10-27 00:30:00'),
(00000000006, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:00', '2018-10-27 00:30:00'),
(00000000007, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:00', '2018-10-27 00:30:00'),
(00000000008, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:00', '2018-10-27 00:30:00'),
(00000000009, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000010, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000011, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000012, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000013, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000014, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000015, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000016, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:01', '2018-10-27 00:30:01'),
(00000000017, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:02', '2018-10-27 00:30:02'),
(00000000018, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:02', '2018-10-27 00:30:02'),
(00000000019, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:02', '2018-10-27 00:30:02'),
(00000000020, 'Free', 0000000000, NULL, NULL, '2018-10-27 00:30:02', '2018-10-27 00:30:02');

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
  `cn_d` int(11) NOT NULL,
  `cn_sender` longtext,
  `cn_reciever` longtext,
  `cn_product` longtext,
  `cn_quantity` int(11) DEFAULT '0',
  `cn_weight` int(11) DEFAULT '0',
  `cn_charges` int(255) DEFAULT NULL,
  `cn_advance` int(11) DEFAULT '0',
  `cn product description` int(11) DEFAULT '0',
  `cn_from` longtext,
  `cn_to` longtext,
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
(7, 'PSO', 'PSO', 'pso@fwl.com', '$2y$10$1EgsKYwfXR642x8lyZ8vf.NN2XuJg0sXQWFiwMr/9bn72riFaZdN6', '02134543968', 'Office No 10 Building AB', '2018-10-26 05:29:10', '2018-10-27 01:52:05');

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
  `d_order` int(11) DEFAULT '0',
  `customer_name` varchar(255) DEFAULT NULL,
  `reciever_name` varchar(255) DEFAULT NULL,
  `mcr` int(11) DEFAULT NULL,
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
  `vehicle_type` int(11) DEFAULT NULL,
  `vendor_name` varchar(255) DEFAULT NULL,
  `number_plate` varchar(255) DEFAULT NULL,
  `cn` int(11) DEFAULT NULL,
  `agent_name` int(11) DEFAULT NULL,
  `charges` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `distribution`
--

INSERT INTO `distribution` (`d_id`, `d_order`, `customer_name`, `reciever_name`, `mcr`, `station`, `type`, `status`, `accept_status_time`, `delivered_status_time`, `re_routed`, `item`, `dc`, `packing`, `quantity`, `location_id`, `vehicle_type`, `vendor_name`, `number_plate`, `cn`, `agent_name`, `charges`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Asim', 'Ali', NULL, 'Station', NULL, 'Done', '2018-10-11 10:18:08', '2018-10-11 10:18:17', 0, 'Item', NULL, 'Packing', 25, 56, 1, NULL, NULL, 39, 65, 75, '2018-10-10 05:21:21', '2018-10-12 05:45:49'),
(2, NULL, 'Toqer', 'Shahrukh', NULL, 'Station', NULL, 'Done', '2018-10-11 10:15:08', '2018-10-11 10:18:14', 0, 'Saman', NULL, 'Khulla', 45, 76, 2, NULL, NULL, 554, 2, 88, '2018-10-10 05:21:21', '2018-10-12 05:45:54'),
(3, NULL, 'Aijaz', 'Ahsan', NULL, 'Station', NULL, 'Done', '2018-10-11 10:13:59', '2018-10-11 10:15:13', 0, 'Item', NULL, 'Packed', 65, 66, 1, NULL, NULL, 47, 3, 77, '2018-10-10 06:34:39', '2018-10-12 05:45:58'),
(4, NULL, 'Saleem', 'Basheer', NULL, 'Station', NULL, 'Done', '2018-10-11 10:18:11', '2018-10-11 10:18:20', 0, 'Saman', NULL, 'Khulla', 85, 92, 2, NULL, NULL, 667, 2, 91, '2018-10-11 08:05:37', '2018-10-12 05:46:02');

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
-- Table structure for table `mcr`
--

CREATE TABLE `mcr` (
  `mcr_id` int(11) NOT NULL,
  `mcr_vehicle` longtext,
  `mcr_consolidate_name` longtext,
  `mcr_vendor_name` longtext,
  `mcr_driver_name` longtext,
  `mcr_driver_cell` longtext,
  `mcr_charges` int(11) DEFAULT NULL,
  `mcr_advance` int(11) DEFAULT NULL,
  `mcr_balance` int(11) DEFAULT NULL,
  `mcr_from` longtext,
  `mcr_ to` longtext,
  `mcr_via` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Table structure for table `order_in_load`
--

CREATE TABLE `order_in_load` (
  `id` int(10) UNSIGNED NOT NULL,
  `grn` varchar(191) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `av_quantity` int(11) DEFAULT NULL,
  `no_of_pkgs` int(11) DEFAULT NULL,
  `av_pkgs` int(11) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Pending',
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

INSERT INTO `order_in_load` (`id`, `grn`, `product_id`, `customer_id`, `quantity`, `av_quantity`, `no_of_pkgs`, `av_pkgs`, `status`, `vehicle_no`, `vehicle_type`, `driver_name`, `driver_cnic`, `created_at`, `updated_at`) VALUES
(1, 'GRN/KWL/23/10/2018/01', 1, 1, 500, 500, NULL, NULL, 'Pending', 'CU-6588', 'High Roof', 'Imran', '4220145637823', '2018-10-23 12:36:08', '2018-10-28 16:33:51'),
(2, 'GRN/NJA/24/10/2018/02', 15, 3, 30, 30, NULL, NULL, 'Pending', 'SU-7661', 'Suzuki', 'Arif', '4220123746832', '2018-10-24 08:22:41', '2018-10-27 02:26:30'),
(3, 'GRN/PCL/24/10/2018/03', 31, 2, 200, 150, NULL, NULL, 'Accepted', 'SU-7661', 'Suzuki', 'Arif', '4636453452564', '2018-10-24 09:14:50', '2018-10-27 02:51:46'),
(8, 'GRN/RNG/24/10/2018/08', 13, 5, 700, 700, NULL, NULL, 'Pending', 'CU-6588', 'Truck', 'Shahrukh', '4210123242697', '2018-10-24 09:50:17', '2018-10-27 02:26:58'),
(10, 'GRN/PSO/24/10/2018/10', 31, 7, 65, 35, NULL, NULL, 'Pending', 'CE-7655', 'High Roof', 'Ibad', '4220167549024', '2018-10-25 11:47:15', '2018-10-27 02:27:24'),
(11, 'GRN/INT/24/10/2018/11', 15, 6, 200, 200, NULL, NULL, 'Pending', 'SU-7661', 'Suzuki', 'Arif', '4220137382374', '2018-10-25 12:18:37', '2018-10-27 02:27:50'),
(12, 'GRN/PCL/26/10/2018/12', 27, 2, 200, 200, NULL, NULL, 'Accepted', 'JF-7811', 'Faw', 'Maqsood', '4220876543210', '2018-10-26 13:01:25', '2018-10-28 17:09:56'),
(19, 'GRN/PCL/27/10/2018/19', 31, 2, 650, 450, NULL, NULL, 'Accepted', 'JF-7811', 'Faw', 'Maqsood', '422098763537', '2018-10-27 02:17:05', '2018-10-27 03:42:51'),
(23, 'GRN/PCL/27/10/2018/23', 27, 2, 750, 750, NULL, NULL, 'Pending', 'CN-7521', 'High Roof', 'Abbas', '42220987653278', '2018-10-27 03:31:48', '2018-10-27 03:31:49');

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
  `quantity` int(11) NOT NULL,
  `no_of_pkgs` int(11) DEFAULT NULL,
  `vehicle_type` varchar(191) DEFAULT NULL,
  `vehicle_no` varchar(191) DEFAULT NULL,
  `driver_name` varchar(191) DEFAULT NULL,
  `status` varchar(191) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_off_load`
--

INSERT INTO `order_off_load` (`id`, `dcn`, `product_id`, `customer_id`, `inload_id`, `quantity`, `no_of_pkgs`, `vehicle_type`, `vehicle_no`, `driver_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 'FWL/PCL/27/10/2018/1', 31, 2, 3, 50, NULL, 'Suzuki', 'SU-7661', 'Arif', 'Accepted', '2018-10-27 02:51:46', '2018-10-27 02:56:06'),
(5, 'FWL/PCL/27/10/2018/5', 31, 2, 19, 200, NULL, 'High Roof', 'SU-7661', 'Abbas', 'Pending', '2018-10-27 03:42:51', '2018-10-27 03:42:51');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `name`, `company`, `quantity`, `customer_id`, `type`, `price`, `qrcode`, `description`, `packing`, `height`, `width`, `length`, `weight`, `created_at`, `updated_at`) VALUES
(00000000001, 'Product A', 'Company Z', 100, 1, 'Point To Point', 20, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product1', 'Useful Product', 'Carton', 275, 20, 20, 210, '2018-10-03 08:15:20', '2018-10-03 08:15:20'),
(00000000013, 'Product B', 'Poco Fone Company', 2, 2, 'Point To Point', 32, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product13', 'Useful Product', 'Carton', 220, 25, 33, 550, '2018-10-04 11:10:26', '2018-10-04 11:10:26'),
(00000000015, 'Coke', 'D Company', 2, 1, 'Point To Point', 22, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product15', 'Useful Product', 'Carton', 125, 15, 35, 500, '2018-10-04 11:14:25', '2018-10-04 11:14:25'),
(00000000027, 'Singham', 'Bollywood Unleashed', 10, 2, 'Point To Point', 11, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product27', 'Useful Product', 'Carton', 170, 14, 15, 390, '2018-10-03 08:15:20', '2018-10-03 08:15:20'),
(00000000031, 'Soap', 'X Company', 2, 2, 'Point To Point', 25, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product31', 'Useful Product', 'Carton', 200, 22, 20, 275, '2018-10-03 08:15:20', '2018-10-03 08:15:20'),
(00000000036, 'Redmi', 'MI Xiaomii', 30, 1, 'Point To Point', 30, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product36', 'Useful Product', 'Carton', 460, 85, 65, 475, '2018-10-03 08:15:20', '2018-10-03 08:15:20'),
(00000000037, 'Aquafina', 'Pepsi', 200, 1, 'Point To Point', 25, 'C:\\xampp\\htdocs\\fwlerp\\storage\\app/public\\product37', 'Useful Product', 'Cartan', 440, 45, 45, 450, NULL, NULL);

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

--
-- Dumping data for table `temporary_storage`
--

INSERT INTO `temporary_storage` (`id`, `w_id`, `space_taken`, `shelves_taken`, `created_at`, `updated_at`) VALUES
(1, 3, 20, 5, '2018-10-15 01:41:54', '2018-10-15 01:41:54');

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
(1, 'Warehouse 1', 'Siddique', 'Karachi', 50, 10, 1, 30, 5, 500, '2018-10-12 06:53:50', '2018-10-13 07:52:43'),
(2, 'Warehouse 2', 'Mustaqem', 'Lahore', 100, 40, 2, 100, 40, 500, '2018-10-12 06:54:35', '2018-10-12 12:02:47'),
(3, 'Warehouse 3', 'Farooq', 'Karachi', 50, 20, 2, 30, 15, 500, '2018-10-12 12:02:17', '2018-10-15 06:41:54');

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
  ADD PRIMARY KEY (`cn_d`);

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
  ADD PRIMARY KEY (`d_id`);

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
  ADD PRIMARY KEY (`mcr_id`);

--
-- Indexes for table `office_expense`
--
ALTER TABLE `office_expense`
  ADD PRIMARY KEY (`office_expense_ID`);

--
-- Indexes for table `order_in_load`
--
ALTER TABLE `order_in_load`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_off_load`
--
ALTER TABLE `order_off_load`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dcn` (`dcn`);

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
  MODIFY `cn_d` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customize_warehouse_management`
--
ALTER TABLE `customize_warehouse_management`
  MODIFY `cwm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `mcr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `office_expense`
--
ALTER TABLE `office_expense`
  MODIFY `office_expense_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_in_load`
--
ALTER TABLE `order_in_load`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `order_off_load`
--
ALTER TABLE `order_off_load`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `personal_info_personal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
