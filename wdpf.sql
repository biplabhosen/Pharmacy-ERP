-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 20, 2025 at 03:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdpf`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int(11) NOT NULL,
  `purchase_date` datetime DEFAULT current_timestamp(),
  `supplier_id` int(11) DEFAULT NULL,
  `total_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('paid','credit','partial') DEFAULT 'credit',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_purchases`
--

INSERT INTO `core_purchases` (`id`, `purchase_date`, `supplier_id`, `total_amount`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '2025-10-07 00:00:00', 0, 5488.00, 'paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2025-10-20 00:00:00', 0, 5488.00, 'paid', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '2025-10-16 00:00:00', 0, 7885.00, '', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '2025-10-30 00:00:00', 0, 7885.00, 'credit', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '2025-10-16 00:00:00', 0, 5488.00, 'partial', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '2025-10-19 23:16:12', 0, 35.50, '', '2025-10-19 23:16:12', '2025-10-19 23:16:12'),
(7, '2025-10-19 23:24:01', 2, 28.00, '', '2025-10-19 23:24:01', '2025-10-19 23:24:01'),
(8, '2025-10-20 00:08:03', 8, 8.00, '', '2025-10-20 00:08:03', '2025-10-20 00:08:03'),
(9, '2025-10-20 00:08:50', 8, 20.00, '', '2025-10-20 00:08:50', '2025-10-20 00:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `core_purchase_details`
--

CREATE TABLE `core_purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) DEFAULT NULL,
  `medicine_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `batch_number` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_purchase_details`
--

INSERT INTO `core_purchase_details` (`id`, `purchase_id`, `medicine_id`, `quantity`, `unit_price`, `subtotal`, `expiry_date`, `batch_number`, `created_at`, `updated_at`) VALUES
(1, 6, 2, 14, 0.00, 0.00, '2028-10-19', 'batch_number', '2025-10-19 23:16:12', '2025-10-19 23:16:12'),
(2, 6, 1, 3, 0.00, 0.00, '2028-10-19', 'batch_number', '2025-10-19 23:16:12', '2025-10-19 23:16:12'),
(3, 7, 2, 4, 0.00, 0.00, '2028-10-19', 'batch_number', '2025-10-19 23:24:01', '2025-10-19 23:24:01'),
(4, 7, 1, 8, 0.00, 0.00, '2028-10-19', 'batch_number', '2025-10-19 23:24:01', '2025-10-19 23:24:01'),
(5, 8, 2, 4, 2.00, 8.00, '2028-10-20', 'batch_number', '2025-10-20 00:08:03', '2025-10-20 00:08:03'),
(6, 8, 1, 8, 0.00, 0.00, '2028-10-20', 'batch_number', '2025-10-20 00:08:03', '2025-10-20 00:08:03'),
(7, 9, 1, 8, 2.50, 20.00, '2028-10-20', 'batch_number', '2025-10-20 00:08:50', '2025-10-20 00:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `core_suppliers`
--

CREATE TABLE `core_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'ACI Limited', '024987832', 'aciefr@aci.com', '146 hous, badda, Dhaka', '2025-10-19 19:14:14', '2025-10-19 19:14:14'),
(2, 'Aristopharma Ltd.', '035778887', 'aristopharma@aristopharma.com', '145 Tejgaon Commercial Area', '2025-10-19 19:16:46', '2025-10-19 19:16:46'),
(3, 'Beximco Pharmaceuticals Ltd.', '880-2-58611001-7', 'beximco@beximco.com', '19 Dhanmondi R/A, Road No. 7, Dhaka 1205, Bangladesh.', '2025-10-19 19:18:32', '2025-10-19 19:18:32'),
(4, 'Everest Pharmaceuticals Ltd.', '(+8802) 01958 311318', 'everest@everest.com	', 'Rahman Regnum Centre ', '2025-10-19 19:21:35', '2025-10-19 19:21:35'),
(5, 'Incepta Pharmaceuticals Ltd.', '+88-02-8891190', 'everest@everest.com', '40 Shahid Tajuddin Ahmed Sarani, Tejgaon I/A, Dhaka -1208, Bangladesh', '2025-10-19 19:23:15', '2025-10-19 19:23:15'),
(6, 'Ibn Sina Pharmaceuticals Ltd.', '02498886', 'everest@everest.com	', 'Tanin Center, 3 Asad Gate, Mirpur Road, Mohammadpur, Dhaka-1207', '2025-10-19 19:24:10', '2025-10-19 19:24:10'),
(7, 'Eskayef Pharmaceuticals Ltd.', '880-2-8818327', 'aciefr@aci.com', 'Plot 82, Road 14, Block B, Banani, Dhaka-1213 ', '2025-10-19 19:25:46', '2025-10-19 19:25:46'),
(8, 'Square Pharmaceuticals PLC', ' +88-2-8833047-56', 'aquare@aquare.com', 'SQUARE Centre, 48, Mohakhali C/A, Dhaka 1212, Bangladesh ', '2025-10-19 19:27:51', '2025-10-19 19:27:51'),
(9, 'Ziska Pharmaceuticals Ltd.', '88-02-8300667', 'aristopharma@aristopharma.com', 'Green City Edge (3rd floor) 89 Kakrail C/A, Dhaka-1000 ', '2025-10-19 19:28:52', '2025-10-19 19:28:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_purchases`
--
ALTER TABLE `core_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_purchases`
--
ALTER TABLE `core_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
