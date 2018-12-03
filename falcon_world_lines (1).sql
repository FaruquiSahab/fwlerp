-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 06:23 PM
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
  `agent_management_pick_location` longtext,
  `agent_management_drop_location` longtext,
  `agent_management_weight` int(11) DEFAULT NULL,
  `agent_management_cn` int(11) DEFAULT NULL,
  `agent_management_time` datetime DEFAULT NULL,
  `agent_management_date` datetime DEFAULT NULL,
  `agent_management_qrcode` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `client_company`
--

CREATE TABLE `client_company` (
  `client_company_ID` int(11) NOT NULL,
  `client_company_corporate_name` varchar(255) DEFAULT NULL,
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
-- Table structure for table `customize_warehouse_management`
--

CREATE TABLE `customize_warehouse_management` (
  `customize_warehouse_management_ID` int(11) NOT NULL,
  `customize_warehouse_management_warehouse_management_id` int(11) DEFAULT '0',
  `customize_warehouse_management_product_id` int(11) DEFAULT '0',
  `customize_warehouse_management_time` datetime DEFAULT NULL,
  `customize_warehouse_management_product_quantity` int(11) DEFAULT NULL,
  `customize_warehouse_management_qrcode` longtext,
  `customize_warehouse_management_status` longtext,
  `customize_warehouse_management_person_name` longtext,
  `customize_warehouse_management_warehouse_head_id` int(11) DEFAULT '0',
  `customize_warehouse_management_vechicle_management_id` int(11) DEFAULT '0',
  `customize_warehouse_management_place_deliever_id` int(11) DEFAULT '0',
  `customize_warehouse_management_distribution management id` int(11) DEFAULT '0',
  `customize_warehouse_management_time_management_id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `distribution`
--

CREATE TABLE `distribution` (
  `distribution_id` int(11) NOT NULL,
  `distribution_order` int(11) DEFAULT '0',
  `distribution_customer_name` longtext,
  `distribution_reciever_name` longtext,
  `distribution_mcr` int(11) DEFAULT NULL,
  `distribution_station` longtext,
  `distribution_distribution_type` longtext,
  `distribution_item` longtext,
  `distribution_dc` longtext,
  `distribution_packing` longtext,
  `distribution_quantity` int(11) DEFAULT '0',
  `distribution_delivery_location` longtext,
  `distribution_vehicle_type` longtext,
  `distribution_vendor_name` longtext,
  `distribution_number_plate` longtext,
  `distribution_cn` int(11) DEFAULT NULL,
  `distribution_agent_name` longtext,
  `distribution_charges` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `distribution_management`
--

CREATE TABLE `distribution_management` (
  `distribution_management_ID` int(11) NOT NULL,
  `distribution_management_distributor_id` int(11) DEFAULT '0',
  `distribution_management_distributor_head_id` int(11) DEFAULT '0',
  `distribution_management_status` longtext,
  `distribution_management_date` datetime DEFAULT NULL,
  `distribution_management_working hour` int(11) DEFAULT '0',
  `distribution_management_rate` int(11) DEFAULT '0',
  `time_management_id` int(11) DEFAULT '0',
  `distribution_management_amount` int(11) DEFAULT '0',
  `distribution_management_customize_warehouse management id` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `location_state` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Table structure for table `personal_info`
--

CREATE TABLE `personal_info` (
  `personal_info_personal_id` int(11) NOT NULL,
  `personal_info_person_name` longtext,
  `personal_info_person_nic` longtext,
  `personal_info_contact_number` longtext,
  `personal_info_email` longtext,
  `personal_info_address` longtext,
  `personal_info_head` longtext,
  `personal_info_amount` longtext,
  `personal_info_password` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` longtext,
  `product_company` longtext,
  `product_qunatity` int(11) DEFAULT NULL,
  `product_type` longtext,
  `prodduct_price` int(11) DEFAULT NULL,
  `product_date` datetime DEFAULT NULL,
  `product_qr_code` longtext,
  `product_description` longtext,
  `product_packing` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `standard_warehouse_management_ID` int(11) NOT NULL,
  `standard_warehouse_management_warehouse_management_id` int(11) DEFAULT '0',
  `standard_warehouse_management_product_id` int(11) DEFAULT '0',
  `standard_warehouse_management_time` datetime DEFAULT NULL,
  `standard_warehouse_management_product_quantity` longtext,
  `standard_warehouse_management_qr_code` longtext,
  `standard_warehouse_management_status` longtext,
  `standard_warehouse_management_person_name` longtext,
  `standard_warehouse_management_warehouse_head_id` int(11) DEFAULT '0'
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
  `transaction_ID` int(11) NOT NULL,
  `transaction_client_company_id` int(11) DEFAULT '0',
  `transaction_vehicle_managment_id` int(11) DEFAULT '0',
  `transaction_warehouse_management_id` int(11) DEFAULT '0',
  `transaction_tax_id` int(11) DEFAULT '0',
  `transaction_distribution_id` int(11) DEFAULT '0',
  `transaction_agent_management_id` int(11) DEFAULT '0',
  `transaction_product_id` int(11) DEFAULT '0',
  `transaction_amount` int(11) DEFAULT '0',
  `transaction_status` varchar(255) DEFAULT NULL,
  `transaction_barcode` varchar(255) DEFAULT NULL,
  `transaction_sales_id` varchar(255) DEFAULT NULL,
  `transaction_booking_id` varchar(255) DEFAULT NULL,
  `transaction_route_from` varchar(255) DEFAULT NULL,
  `transaction_route_to` varchar(255) DEFAULT NULL,
  `transaction_company_id` int(11) DEFAULT '0',
  `transaction_cn` varchar(255) DEFAULT NULL,
  `transaction_mcr` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
  `vehicle_type` varchar(255) DEFAULT NULL,
  `vehicle_number` varchar(255) DEFAULT NULL,
  `vehicle_color` varchar(255) DEFAULT NULL,
  `vehicle_model` varchar(255) DEFAULT NULL,
  `vehicle_condition` varchar(255) DEFAULT NULL,
  `vehicle_entry_date_(O_S)` datetime DEFAULT NULL,
  `vehicle_contract_time_(O_S)` datetime DEFAULT NULL,
  `vehicle_contract_expire_date_(O_S)` datetime DEFAULT NULL,
  `vehicle_name` varchar(255) DEFAULT NULL,
  `vehicle_owner_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_management`
--

CREATE TABLE `vehicle_management` (
  `vehicle_management_ID` int(11) NOT NULL,
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
  `warehouse_ID` int(11) NOT NULL,
  `warehouse_name` varchar(255) DEFAULT NULL,
  `warehouse_contract` varchar(255) DEFAULT NULL,
  `warehouse_location` varchar(255) DEFAULT NULL,
  `warehouse_space` int(11) DEFAULT '0',
  `warehouse_no_of_shelves` int(11) DEFAULT '0',
  `warehouse_head_Id` int(11) DEFAULT NULL,
  `warehouse_free_space` int(11) DEFAULT '0',
  `warehouse_free_shelves` int(11) DEFAULT '0',
  `warehouse_updated_date` datetime DEFAULT NULL,
  `warehouse_rate` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `warehouses`
--

INSERT INTO `warehouses` (`warehouse_ID`, `warehouse_name`, `warehouse_contract`, `warehouse_location`, `warehouse_space`, `warehouse_no_of_shelves`, `warehouse_head_Id`, `warehouse_free_space`, `warehouse_free_shelves`, `warehouse_updated_date`, `warehouse_rate`, `created_at`, `updated_at`) VALUES
(1, 'Gujjar Warehouse', NULL, NULL, 50, 10, NULL, 50, 10, NULL, 500, NULL, NULL),
(2, 'Garbage Warehouse', 'Farooq', 'Karachi', 50, 10, 13, 20, 10, '2018-10-02 00:00:00', 100, '2018-10-02 02:11:24', '2018-10-02 02:11:24'),
(3, 'Ghalib Warehouse', 'Mustaqeem', 'Islamabad', 5000, 500, 13, 5000, 500, '2018-10-02 00:00:00', 5000, '2018-10-02 06:01:18', '2018-10-02 06:01:18'),
(4, 'Ghalib Warehouse', 'Mustaqeem', 'Islamabad', 5000, 500, NULL, 5000, 10, NULL, 5000, '2018-10-02 09:48:34', '2018-10-02 09:48:34'),
(5, 'Gujjar Warehouse', 'Ahmed', 'Bhawalpur', 50, 10, NULL, 50, 10, NULL, 500, '2018-10-02 10:29:45', '2018-10-02 10:29:45'),
(6, 'Gujjar Warehouse', NULL, 'Karachi', 50, 10, NULL, 50, NULL, NULL, 500, '2018-10-02 11:06:05', '2018-10-02 11:06:05'),
(7, 'Gujjar Warehouse', NULL, 'Karachi', 50, 10, NULL, 50, NULL, NULL, 500, '2018-10-02 11:07:42', '2018-10-02 11:07:42'),
(8, 'Gujjar Warehouse', NULL, 'Karachi', 50, 10, NULL, 50, 10, NULL, 500, '2018-10-02 11:10:24', '2018-10-02 11:10:24'),
(9, NULL, NULL, NULL, 0, 0, NULL, 0, 0, NULL, 0, '2018-10-02 11:18:55', '2018-10-02 11:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `warehouse_management`
--

CREATE TABLE `warehouse_management` (
  `warehouse_management_ID` int(11) NOT NULL,
  `warehouse_management_client_id` int(11) DEFAULT '0',
  `warehouse_management_sales_person_id` int(11) DEFAULT '0',
  `warehouse_management_warehouse_id` int(11) DEFAULT '0',
  `warehouse_management_number_of_shelf` longtext,
  `warehouse_management_date` datetime DEFAULT NULL,
  `warehouse_management_time` datetime DEFAULT NULL,
  `warehouse_management_duration` longtext,
  `warehouse_management_amount` longtext,
  `warehouse_management_rate_per_day` int(11) DEFAULT NULL,
  `warehouse_management_rate_per_space` int(11) DEFAULT NULL,
  `warehouse_management_barcode` longtext,
  `warehouse_management_company_id` int(11) DEFAULT '0',
  `warehouse_management_contract_type` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

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
-- Indexes for table `client_company`
--
ALTER TABLE `client_company`
  ADD PRIMARY KEY (`client_company_ID`),
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
-- Indexes for table `customize_warehouse_management`
--
ALTER TABLE `customize_warehouse_management`
  ADD PRIMARY KEY (`customize_warehouse_management_ID`),
  ADD KEY `distribution management id` (`customize_warehouse_management_distribution management id`),
  ADD KEY `place deliever id` (`customize_warehouse_management_place_deliever_id`),
  ADD KEY `product id` (`customize_warehouse_management_product_id`),
  ADD KEY `time management id` (`customize_warehouse_management_time_management_id`),
  ADD KEY `vechicle management id` (`customize_warehouse_management_vechicle_management_id`),
  ADD KEY `warehouse head id` (`customize_warehouse_management_warehouse_head_id`),
  ADD KEY `warehouse management id` (`customize_warehouse_management_warehouse_management_id`);

--
-- Indexes for table `distribution`
--
ALTER TABLE `distribution`
  ADD PRIMARY KEY (`distribution_id`);

--
-- Indexes for table `distribution_management`
--
ALTER TABLE `distribution_management`
  ADD PRIMARY KEY (`distribution_management_ID`),
  ADD KEY `customize warehouse management id` (`distribution_management_customize_warehouse management id`),
  ADD KEY `distributor head id` (`distribution_management_distributor_head_id`),
  ADD KEY `distributor id` (`distribution_management_distributor_id`),
  ADD KEY `time management id` (`time_management_id`);

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
-- Indexes for table `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`personal_info_personal_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

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
  ADD PRIMARY KEY (`standard_warehouse_management_ID`),
  ADD KEY `product id` (`standard_warehouse_management_product_id`),
  ADD KEY `warehouse head id` (`standard_warehouse_management_warehouse_head_id`),
  ADD KEY `warehouse management id` (`standard_warehouse_management_warehouse_management_id`);

--
-- Indexes for table `tax`
--
ALTER TABLE `tax`
  ADD PRIMARY KEY (`tax_ID`);

--
-- Indexes for table `time_management`
--
ALTER TABLE `time_management`
  ADD PRIMARY KEY (`time_management_ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_ID`),
  ADD KEY `agent_management_id` (`transaction_agent_management_id`),
  ADD KEY `barcode` (`transaction_barcode`),
  ADD KEY `booking_id` (`transaction_booking_id`),
  ADD KEY `client_company_id` (`transaction_client_company_id`),
  ADD KEY `company_id` (`transaction_company_id`),
  ADD KEY `product_id` (`transaction_product_id`),
  ADD KEY `sales_id` (`transaction_sales_id`),
  ADD KEY `tax_id` (`transaction_tax_id`),
  ADD KEY `vehicle managment id` (`transaction_vehicle_managment_id`),
  ADD KEY `warehouse_management_id` (`transaction_warehouse_management_id`);

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
  ADD PRIMARY KEY (`warehouse_ID`),
  ADD KEY `warehouse head_Id` (`warehouse_head_Id`);

--
-- Indexes for table `warehouse_management`
--
ALTER TABLE `warehouse_management`
  ADD PRIMARY KEY (`warehouse_management_ID`),
  ADD KEY `client id` (`warehouse_management_client_id`),
  ADD KEY `company id` (`warehouse_management_company_id`),
  ADD KEY `sales person id` (`warehouse_management_sales_person_id`),
  ADD KEY `warehouse id` (`warehouse_management_warehouse_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agent management`
--
ALTER TABLE `agent management`
  MODIFY `agent_management_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_company`
--
ALTER TABLE `client_company`
  MODIFY `client_company_ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `customize_warehouse_management`
--
ALTER TABLE `customize_warehouse_management`
  MODIFY `customize_warehouse_management_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distribution`
--
ALTER TABLE `distribution`
  MODIFY `distribution_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distribution_management`
--
ALTER TABLE `distribution_management`
  MODIFY `distribution_management_ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `location_ID` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `personal_info`
--
ALTER TABLE `personal_info`
  MODIFY `personal_info_personal_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `standard_warehouse_management_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tax`
--
ALTER TABLE `tax`
  MODIFY `tax_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_management`
--
ALTER TABLE `time_management`
  MODIFY `time_management_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transport_route`
--
ALTER TABLE `transport_route`
  MODIFY `transport_route_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_management`
--
ALTER TABLE `vehicle_management`
  MODIFY `vehicle_management_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vehicle_management_product`
--
ALTER TABLE `vehicle_management_product`
  MODIFY `vehicle_management_product_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `warehouses`
--
ALTER TABLE `warehouses`
  MODIFY `warehouse_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `warehouse_management`
--
ALTER TABLE `warehouse_management`
  MODIFY `warehouse_management_ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
