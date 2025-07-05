-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 05, 2025 at 09:06 AM
-- Server version: 8.0.42
-- PHP Version: 8.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tarataxi_taxi_ride`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int NOT NULL,
  `fname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `created` varchar(255) NOT NULL,
  `protocol` varchar(255) DEFAULT NULL,
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(255) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `fname`, `username`, `email`, `password`, `mobile`, `status`, `created`, `protocol`, `smtp_host`, `smtp_port`, `smtp_user`, `smtp_pass`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '8745858585', 1, '', 'smtp', 'mail.tarataxi.technoderivation.com', '587', 'tara_rental@tarataxi.technoderivation.com\n', 'tara_rental@12345678');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car`
--

CREATE TABLE `tbl_car` (
  `id` int NOT NULL,
  `car_owner_id` int NOT NULL DEFAULT '0',
  `car_location` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `map_url` varchar(255) DEFAULT NULL,
  `car_address` varchar(255) DEFAULT NULL,
  `car_type` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `interior_color` varchar(255) DEFAULT NULL,
  `exterior_color` varchar(255) DEFAULT NULL,
  `transmission` varchar(255) DEFAULT NULL,
  `vin` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `seating_capacity` varchar(255) DEFAULT NULL,
  `fuel_type` varchar(255) DEFAULT NULL,
  `description` text,
  `insurence` varchar(255) DEFAULT NULL,
  `rear_view_image` varchar(255) DEFAULT NULL,
  `front_view_image` varchar(255) DEFAULT NULL,
  `right_side_image` varchar(255) DEFAULT NULL,
  `left_side_image` varchar(255) DEFAULT NULL,
  `interior_image` varchar(255) DEFAULT NULL,
  `or_cr_doc` varchar(255) DEFAULT NULL,
  `car_video` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '0',
  `modified` varchar(255) DEFAULT NULL,
  `modified_by` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `car_availability` int NOT NULL DEFAULT '1',
  `unlimited_distance` int NOT NULL DEFAULT '0' COMMENT '0 means off, 1 means on',
  `maximum_kilometer` varchar(255) DEFAULT NULL,
  `excess_fee_per_kilometer` varchar(255) DEFAULT NULL,
  `time_penalty_per_hour` varchar(255) DEFAULT NULL,
  `min_price` int DEFAULT '0',
  `max_price` int DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_car`
--

INSERT INTO `tbl_car` (`id`, `car_owner_id`, `car_location`, `lat`, `lng`, `place_id`, `map_url`, `car_address`, `car_type`, `brand`, `model`, `year`, `interior_color`, `exterior_color`, `transmission`, `vin`, `mileage`, `seating_capacity`, `fuel_type`, `description`, `insurence`, `rear_view_image`, `front_view_image`, `right_side_image`, `left_side_image`, `interior_image`, `or_cr_doc`, `car_video`, `created`, `created_by`, `modified`, `modified_by`, `status`, `car_availability`, `unlimited_distance`, `maximum_kilometer`, `excess_fee_per_kilometer`, `time_penalty_per_hour`, `min_price`, `max_price`) VALUES
(47, 47, '29 Cruzadas, Makati, 1225 Metro Manila, Philippines', '14.555542576326575', '121.03046938776968', NULL, NULL, '29 Cruzadas, Makati, 1225 Metro Manila, Philippines', 'Sedan', 'Hyundai', 'Santro', '2022', 'gray', 'red', 'Manual', 'MP 16 WE2344', '12 Km/Hour', '6', 'Petrol', 'The modern automobile is a complex technical system employing subsystems with specific design functions. Some of these consist of thousands of component parts that have evolved from breakthroughs in existing technology or from new technologies', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '28-WhatsApp-Video.mp4', '2024-07-10', 0, '2024-07-10', 0, 1, 1, 0, '90', '10', '1000', 3000, 3100),
(48, 47, 'Vikramaditya Marg,Sector 7, Jhalana Chhod, 4/208, SFS Cross Rd, Sector 4, Mansarovar, Jaipur, Rajasthan 302020, India', '26.8406257', '75.7755487', 'ChIJMRhaFZG1bTkRrr8yTMe9K6I', 'https://maps.google.com/?cid=11685642321817419694', 'Vikramaditya Marg,Sector 7, Jhalana Chhod, 4/208, SFS Cross Rd, Sector 4, Mansarovar, Jaipur, Rajasthan 302020, India', 'Sedan', 'Kia', 'Soluto', '2024', 'Black', 'Red', 'Automatic', '00001', '2500', '4', 'Unleaded', 'Description', '18-1000090781.jpg', '35-20240729173310.jpg', '24-20240822121047.jpg', '29-20240729172018.jpg', '30-20240729173729.jpg', '19-20240729173216.jpg', '31-1000090798.jpg', '28-WhatsApp-Video.mp4', '2024-07-15', 0, '2024-07-15', 0, 1, 1, 0, '100', '190', '1000', 3000, 3200),
(49, 47, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'Toyota', 'Vios', '2025', 'Black', 'Red', 'Automatic', '00002', '2400', '4', 'Unleaded', 'Description', '18-1000090781.jpg', '15-1000090814.png', '26-1000090816.png', '28-1000090817.png', '19-1000090815.png', '32-1000090813.png', '23-1000090794.jpg', '28-WhatsApp-Video.mp4', '2024-07-16', 0, '2024-07-16', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(50, 49, '6 San Ignacio, Makati, 1225 Metro Manila, Philippines', '14.556545975231726', '121.02788206189871', NULL, NULL, '6 San Ignacio, Makati, 1225 Metro Manila, Philippines', 'Electric', 'BYD', 'Sealion 6', '2024', 'Black', 'Silver', 'Automatic', '12345', '100', '6', 'Electric', '', '18-1000090781.jpg', '28-1000091065.jpg', '15-20250303140918.jpg', '34-1000091065.jpg', '15-1000091065.jpg', '30-1000091065.jpg', '19-1000091065.jpg', '28-WhatsApp-Video.mp4', '2024-07-23', 0, '2024-07-23', 0, 1, 1, 1, '', '', '', 3300, 3400),
(51, 49, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'Honda', 'Civic', '2025', 'Black', 'Red', 'Automatic', '00005', '2400', '4', 'Unleaded', 'Description', '18-1000090781.jpg', '17-20240724160925.jpg', '33-20240724160924.jpg', '28-20240724160925.jpg', '15-20240724160925.jpg', '28-20240724160926.jpg', '25-20240724160926.jpg', '28-WhatsApp-Video.mp4', '2024-07-24', 0, '2024-07-24', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(52, 52, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'Honda', 'Civic', '2025', 'Gray', 'Blue', 'Automatic', '000005', '2000', '4', 'Unleaded', '', '18-1000090781.jpg', '15-20240726191350.jpg', '28-20240726191348.jpg', '33-20240726191351.jpg', '21-20240726191349.jpg', '24-20240726191351.jpg', '33-20240726191352.jpg', '28-WhatsApp-Video.mp4', '2024-07-26', 0, '2024-07-26', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(60, 69, 'Depalpur Rd, Devi Ahillyabai Holkar Airport Area, Indore, Madhya Pradesh 452005, India', '22.7287381', '75.80759929999999', NULL, NULL, 'Depalpur Rd, Devi Ahillyabai Holkar Airport Area, Indore, Madhya Pradesh 452005, India', 'Sport', 'Jaguar ', 'A8', '2020', 'Red', 'Red', 'Auto', 'RJ20SN8295', '10', '3', 'Petrol ', '', '18-1000090781.jpg', '19-20240909165332.jpg', '24-20240909165331.jpg', '23-20240909165332.jpg', '16-20240909165332.jpg', '18-20240909165333.jpg', '27-20240909165333.jpg', '28-WhatsApp-Video.mp4', '2024-09-09', 0, '2024-09-09', 0, 1, 1, 0, '300', '2000', '3000', 5000, 9000),
(61, 69, 'VP24+8J3, Leela Jat Ki Dhani, Jaisinghpura, Bhankrota, Rajasthan 302029, India', '26.851114559240123', '75.70681594312191', NULL, NULL, 'VP24+8J3, Leela Jat Ki Dhani, Jaisinghpura, Bhankrota, Rajasthan 302029, India', 'Sedan', 'Audi', 'A9', '2020', 'Black', 'Black', 'Auto', 'RJ20SN8299', '13', '5', 'Petrol ', '', '18-1000090781.jpg', '34-20240909165549.jpg', '21-20240909165548.jpg', '21-20240909165548.jpg', '19-20240909165550.jpg', '29-20240909165551.jpg', '32-20240909165550.jpg', '28-WhatsApp-Video.mp4', '2024-09-09', 0, '2024-09-09', 0, 0, 1, 0, NULL, NULL, NULL, 2500, 4000),
(62, 69, 'HH 152, Jhalana Gram, Malviya Nagar, Jaipur, Rajasthan 302017, India', '26.86430412719265', '75.81630941480398', NULL, NULL, 'HH 152, Jhalana Gram, Malviya Nagar, Jaipur, Rajasthan 302017, India', 'Sedan', 'Audi', 'A2', '2020', 'Red', 'Black', 'Auto', 'RJ20SN8230', '10', '5', 'Petrol ', '', '18-1000090781.jpg', '20-20240909165744.jpg', '35-20240909165743.jpg', '18-20240909165743.jpg', '19-20240909165744.jpg', '29-20240909165744.jpg', '29-20240909165744.jpg', '28-WhatsApp-Video.mp4', '2024-09-09', 0, '2024-09-09', 0, 1, 1, 0, NULL, NULL, NULL, 300, 9000),
(63, 69, 'C1, Sudarshanpura, Bais Godam, Jaipur, Rajasthan 302006, India', '26.893377599332606', '75.79048778861761', NULL, NULL, 'C1, Sudarshanpura, Bais Godam, Jaipur, Rajasthan 302006, India', 'Sedan', 'Rolls-Royce ', 'Phantom', '2023', 'Red', 'Black', 'Auto', 'RJ20SN8296', '10', '5', 'Petrol ', '', '18-1000090781.jpg', '28-20240909170133.jpg', '17-20240909170132.jpg', '17-20240909170133.jpg', '24-20240909170133.jpg', '35-20240909170133.jpg', '23-20240909170134.jpg', '28-WhatsApp-Video.mp4', '2024-09-09', 0, '2024-09-09', 0, 1, 1, 1, '430', '10', '5', 4000, 6000),
(64, 49, NULL, NULL, NULL, NULL, NULL, NULL, 'sadan', 'Honda', 'city', '2002', 'gray', 'red', 'Manual', 'MP 16 WE2343', '12 Km/Hour', '6', 'Petrol', 'The modern automobile is a complex technical system employing subsystems with specific design functions. Some of these consist of thousands of component parts that have evolved from breakthroughs in existing technology or from new technologies', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '28-WhatsApp-Video.mp4', '2024-12-09', 0, '2024-12-09', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(65, 49, NULL, NULL, NULL, NULL, NULL, NULL, 'sadan', 'Honda', 'city', '2002', 'gray', 'red', 'Manual', '1', '12 Km/Hour', '6', 'Petrol', 'The modern automobile is a complex technical system employing subsystems with specific design functions. Some of these consist of thousands of component parts that have evolved from breakthroughs in existing technology or from new technologies', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '28-WhatsApp-Video.mp4', '2024-12-09', 0, '2024-12-09', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(66, 49, NULL, NULL, NULL, NULL, NULL, NULL, 'carAddVM.car_type.value', 'carAddVM.brand.value', 'carAddVM.model.value', 'carAddVM.year.value', 'carAddVM.interior_color.value', 'carAddVM.exterior_color.value', 'carAddVM.transmission.value', 'carAddVM.vin.value', 'carAddVM.mileage.value', 'carAddVM.seating_capacity.value', 'carAddVM.fuel_type.value', 'carAddVM.description.value', '18-1000090781.jpg', '33-20241209151519.jpg', '19-20241209151518.jpg', '30-20241209151518.jpg', '22-20241209151519.jpg', '23-20241209151519.jpg', '34-20241209151519.jpg', '28-WhatsApp-Video.mp4', '2024-12-09', 0, '2024-12-09', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(67, 49, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'Toyoto', 'Vios', '2020', 'Black', 'Black', 'Automatic', '3', '1000', '4', 'Diesel', '', '18-1000090781.jpg', '31-20241209152912.jpg', '32-20241209152910.jpg', '19-20241209152912.jpg', '28-20241209152912.jpg', '20-20241209152912.jpg', '27-20241209152913.jpg', '28-WhatsApp-Video.mp4', '2024-12-09', 0, '2024-12-09', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(68, 49, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'Toyoto', 'Vios', '2020', 'Black', 'Black', 'Automatic', '796641', '1000', '4', 'Diesel', '', '18-1000090781.jpg', '30-20241209163336.jpg', '27-20241209163335.jpg', '31-20241209163336.jpg', '25-20241209163336.jpg', '23-20241209163337.jpg', '35-20241209163337.jpg', '28-WhatsApp-Video.mp4', '2024-12-09', 0, '2024-12-09', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(69, 49, NULL, NULL, NULL, NULL, NULL, NULL, 'Coupe', 'Toyota', 'Vios', '2021', 'Black', 'Black', 'Automatic', '72524', '1000', '4', 'Diesel', '', '18-1000090781.jpg', '16-20241209165612.jpg', '15-20241209165611.jpg', '25-20241209165611.jpg', '26-20241209165612.jpg', '22-20241209165613.jpg', '30-20241209165613.jpg', '28-WhatsApp-Video.mp4', '2024-12-09', 0, '2024-12-09', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(70, 69, NULL, NULL, NULL, NULL, NULL, NULL, 'SUV', 'KIA', 'Cranes ', '2024', 'Blue', 'Black ', 'Manual', '123456789', '21', '7', 'Petrol', '', '18-1000090781.jpg', '23-20250115162140.jpg', '21-20250115162139.jpg', '15-20250115162139.jpg', '30-20250115162140.jpg', '28-20250115162140.jpg', '31-20250115162140.jpg', '28-WhatsApp-Video.mp4', '2025-01-15', 0, '2025-01-15', 0, 1, 1, 0, NULL, NULL, NULL, 3000, 5000),
(71, 69, NULL, NULL, NULL, NULL, NULL, NULL, 'sadan', 'Honda', 'city', '2002', 'gray', 'red', 'Manual', 'MP 17 WE2343', '12 Km/Hour', '6', 'Petrol', 'The modern automobile is a complex technical system employing subsystems with specific design functions. Some of these consist of thousands of component parts that have evolved from breakthroughs in existing technology or from new technologies', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '28-WhatsApp-Video.mp4', '2025-01-16', 0, '2025-01-16', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(72, 69, NULL, NULL, NULL, NULL, NULL, NULL, 'SUV', 'MG', 'Hector ', '2025', 'black ', 'black ', 'Automatic', 'RJ45UA0001', '15', '5', 'Petrol', '', '', '18-2025-01-16-12:45:48.797340.png', '24-2025-01-16-12:45:53.486617.png', '31-2025-01-16-12:45:58.216048.png', '18-2025-01-16-12:46:02.982573.png', '33-2025-01-16-12:46:07.838104.png', '32-2025-01-16-12:46:19.905695.png', '28-WhatsApp-Video.mp4', '2025-01-16', 0, '2025-01-16', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(73, 69, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'Maruti ', 'shift ', '2021', 'white ', 'black', 'Automatic', 'RJ29GA2134', '25', '5', 'Diesel', '', '', '35-2025-01-16-13:03:51.358512.png', '26-2025-01-16-13:03:55.906725.png', '25-2025-01-16-13:04:01.299378.png', '16-2025-01-16-13:04:06.322547.png', '22-2025-01-16-13:04:12.525003.png', '27-2025-01-16-13:04:16.371760.png', '28-WhatsApp-Video.mp4', '2025-01-16', 0, '2025-01-16', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(74, 165, NULL, NULL, NULL, NULL, NULL, NULL, 'SUV', 'kia', 'sonet', '2024', 'black ', 'white', 'Manual', 'drgh6ed', '18', '5', 'Petrol', '', '', '23-2025-02-06-12:39:04.769908.png', '32-2025-02-06-12:39:08.928021.png', '30-2025-02-06-12:38:58.987222.png', '20-2025-02-06-12:39:01.707632.png', '18-2025-02-06-12:38:55.662138.png', '20-2025-02-06-12:38:52.375162.png', '', '2025-02-06', 0, '2025-02-06', 0, 1, 1, 1, '100', '15', '10', 5000, 10000),
(75, 165, 'Sri Lanka', '7.873053999999999', '80.77179699999999', NULL, NULL, 'Sri Lanka', 'SUV', 'MG', 'Hector', '2024', 'black ', 'black ', 'Manual', 'fzfxgxgf', '12', '5', 'Petrol', '', '', '19-2025-02-06-12:49:41.191496.png', '35-2025-02-06-12:50:00.565247.png', '20-2025-02-06-12:49:49.168277.png', '32-2025-02-06-12:49:56.322316.png', '34-2025-02-06-12:49:51.292666.png', '26-2025-02-06-12:49:54.199527.png', '', '2025-02-06', 0, '2025-02-06', 0, 1, 1, 1, '100', '10', '20', 0, 0),
(76, 165, NULL, NULL, NULL, NULL, NULL, NULL, 'Hatchback', 'Maruti Suzuki ', 'Shift ', '2021', 'White ', 'Black ', 'Manual', 'cgfyrwdf', '28', '5', 'CNG', '', '', '15-2025-02-07-10:16:41.558138.png', '25-2025-02-07-10:16:52.322965.png', '31-2025-02-07-10:17:02.587831.png', '20-2025-02-07-10:17:08.798452.png', '25-2025-02-07-10:17:18.409510.png', '35-2025-02-07-10:17:30.890585.png', 'null', '2025-02-07', 0, '2025-02-07', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(77, 126, 'Jaipur, Rajasthan, India', '26.9124336', '75.7872709', NULL, NULL, 'Jaipur, Rajasthan, India', 'sadan', 'Honda', 'city', '2002', 'gray', 'red', 'Manual', 'MP 16 WE2323', '12 Km/Hour', '6', 'Petrol', 'The modern automobile is a complex technical system employing subsystems with specific design functions. Some of these consist of thousands of component parts that have evolved from breakthroughs in existing technology or from new technologies', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '34-15-hyundai-new-santro-imperial-beige.png', '28-WhatsApp-Video.mp4', '2025-02-24', 0, '2025-02-24', 0, 1, 1, 1, '120', '15', '20', 1800, 2500),
(78, 126, 'Long Beach, CA, USA', '33.7700504', '-118.1937395', NULL, NULL, 'Long Beach, CA, USA', 'Coupe', 'TATA', 'nano', '2010', 'White ', 'black ', 'Manual', 'MP12RG2010', '25', '5', 'Petrol', '', '', '20-2025-02-24-13:10:16.173325.png', '30-2025-02-24-13:10:02.160842.png', '35-2025-02-24-13:09:56.317164.png', '25-2025-02-24-13:09:59.060879.png', '17-2025-02-24-13:09:53.267161.png', '35-2025-02-24-13:09:50.430158.png', '', '2025-02-24', 0, '2025-02-24', 0, 1, 1, 2, '18', '10', '20', 1000, 2000),
(112, 231, '728 P. Paterno Street, Manila, Metro Manila', '14.5995', '120.9842', NULL, NULL, '728 P. Paterno Street, Manila, Metro Manila', 'Sports Car', 'Porsche', '718 Boxster', '2024', 'Black', 'Blue', 'Manual', '62864129', '27 MPG', '2', 'Petrol', '', '', '33-car-image-2.jpg', '33-car-image-5.jpg', '18-car-image-1.jpg', '30-car-image-4.jpg', '23-car-image-3.jpg', '30-orcr.jpg', '15-car_video.mp4', '2025-04-16', 0, '2025-04-16', 0, 1, 1, 0, NULL, NULL, NULL, 2000, 3000),
(116, 127, 'Jaipur, Rajasthan, India', '26.9124336', '75.7872709', NULL, NULL, 'Jaipur, Rajasthan, India', 'Coupe', 'volvo ', '2024', '24', 'vvvv', 'vvv', 'Automatic', 'aaa', 'vvv', '4', 'Diesel', '', '', '34-2025-04-28-11:45:08.475664.png', '30-2025-04-28-11:44:59.405210.png', '18-2025-04-28-11:45:09.519609.png', '24-2025-04-28-11:45:14.191906.png', '20-2025-04-28-11:45:16.412466.png', '21-2025-04-28-11:45:15.438544.png', 'null', '2025-04-28', 0, '2025-04-28', 0, 1, 1, 0, NULL, NULL, NULL, 50000, 60000),
(117, 126, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'Suzuki ', '2024', '2024', 'black ', 'black', 'Manual', '158576', '20', '5', 'Diesel', '', '', '33-2025-04-29-16:36:16.927879.png', '25-2025-04-29-16:44:57.826520.png', '24-2025-04-29-16:45:18.061693.png', '29-2025-04-29-16:45:36.772942.png', '15-2025-04-29-16:55:24.300761.png', '26-2025-04-29-16:55:48.550611.png', '29-2025-04-29-16:41:32.925146.mp4', '2025-04-29', 0, '2025-04-29', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(118, 127, NULL, NULL, NULL, NULL, NULL, NULL, 'Sedan', 'BYD', '2025', '2025', 'black', 'white ', 'Automatic', 'csv58457', '20', '5', 'EVs', '', '', '29-2025-05-01-15:03:26.030598.png', '33-2025-05-01-15:03:29.182410.png', '35-2025-05-01-15:03:32.009170.png', '15-2025-05-01-15:03:36.064776.png', '25-2025-05-01-15:03:46.367528.png', '18-2025-05-01-15:03:43.724179.png', 'null', '2025-05-01', 0, '2025-05-01', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0),
(121, 309, '2410 General Vito Belarmino Street, Makati, Metro Manila', '14.540574', '121.014729', NULL, NULL, '2410 General Vito Belarmino Street, Makati, Metro Manila', 'SUV', 'Mitsubishi', 'Montero GSR', '2022', 'Black', 'White', 'Auto', 'MMAGUKS10SH001260', '17.7km/L', '6', 'Diesel', 'T he Mitsubishi Montero Sport GSR is a special edition, blacked-out version of the Montero Sport SUV, offering a more sporty and aggressive look. It features blacked-out accents, a unique 2.4-liter turbo diesel engine, and a range of safety and convenience features. ', '', '30-car-image-1.jpg', '29-car-image-4.jpg', '18-car-image-5.jpg', '30-car-image-3.jpg', '30-car-image-2.jpg', '26-orcr.jpg', '19-car_video.mp4', '2025-06-03', 0, '2025-06-03', 0, 1, 1, 1, '', '', '', 3000, 4000),
(122, 231, '2410 General Vito Belarmino Street, Makati, Metro Manila', '14.540574', '121.014729', NULL, NULL, '2410 General Vito Belarmino Street, Makati, Metro Manila', 'Sports Car', 'Ferrari', 'F40', '1992', 'Red/Black', 'Red', 'Manual', '121434243v2', '1000km', '2', 'Petrol', 'The Ferrari F40 is a legendary, mid-engine, rear-wheel-drive sports car, produced from 1987 to 1992. It was designed by Pininfarina to celebrate Ferrari\'s 40th anniversary and was the last car personally approved by Enzo Ferrari. The F40 is known for its lightweight composite body, powerful twin-turbocharged V8 engine, and distinctive, aggressive design. ', '28-1750053097-upload.jpg', '22-1750053554-upload.jpg', '15-1750053552-upload.jpg', '24-1750053089-upload.jpg', '20-1750053091-upload.jpg', '18-1750053094-upload.jpg', '21-1750053095-upload.jpg', NULL, '2025-06-16', 0, '2025-06-16', 0, 1, 1, 1, '', '', '', 5000, 6500),
(123, 343, NULL, NULL, NULL, NULL, NULL, NULL, 'SUV', 'Hyundai ', 'Stargazer ', '2025', 'Black ', 'White ', 'Automatic', 'MF3NC81DESJ067829', '4284', '8', 'Petrol', '', '18-1000090781.jpg', '33-20250703111949.jpg', '24-20250703111947.jpg', '22-20250703111948.jpg', '22-20250703111950.jpg', '34-20250703111951.jpg', '32-20250703111951.jpg', '28-WhatsApp-Video.mp4', '2025-07-03', 0, '2025-07-03', 0, 1, 1, 0, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_order_booking`
--

CREATE TABLE `tbl_car_order_booking` (
  `id` int NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `car_id` int NOT NULL DEFAULT '0',
  `car_owner_id` int NOT NULL DEFAULT '0',
  `pickup_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `total_fair` varchar(255) DEFAULT NULL,
  `payment_mode` varchar(255) DEFAULT NULL,
  `qr_image` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `booking_status` varchar(255) DEFAULT NULL COMMENT 'Pending,Ongoing,Done,Cancelled',
  `front_view_image` varchar(255) DEFAULT NULL,
  `left_side_image` varchar(255) DEFAULT NULL,
  `back_side_image` varchar(255) DEFAULT NULL,
  `right_side_image` varchar(255) DEFAULT NULL,
  `interior_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_car_order_booking`
--

INSERT INTO `tbl_car_order_booking` (`id`, `order_id`, `user_id`, `car_id`, `car_owner_id`, `pickup_date`, `return_date`, `total_fair`, `payment_mode`, `qr_image`, `created`, `modified`, `status`, `booking_status`, `front_view_image`, `left_side_image`, `back_side_image`, `right_side_image`, `interior_image`) VALUES
(56, 'TARA-DP3KI5QLTF', 155, 47, 47, '2025-01-14', '2025-01-16', '9000', 'CASH_ON_PICKUP', 'TARA-DP3KI5QLTF01-13-2025.png', '2025-01-13', '2025-01-13', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(57, 'Job order 20250212263', 171, 47, 47, '2025-02-13', '2025-02-15', '9600', 'CASH_ON_PICKUP', 'Job order 2025021226302-12-2025.png', '2025-02-12', '2025-02-12', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(58, 'Job order 20250221115', 161, 48, 47, '2024-09-12', '2024-09-15', '600', 'CASH_ON_PICKUP', 'Job order 2025022111502-21-2025.png', '2025-02-21', '2025-02-21', 1, 'Ongoing', '20-2025-04-29-11:26:55.654396.png', '24-2025-04-29-11:25:55.327859.png', '23-2025-04-29-11:27:08.772138.png', '21-2025-04-29-11:26:19.595095.png', '29-2025-04-29-11:26:36.687753.png'),
(59, 'Job order 20250221703', 161, 62, 69, '2025-03-02', '2025-03-10', '2700', 'CASH_ON_PICKUP', 'Job order 2025022170302-21-2025.png', '2025-02-21', '2025-02-21', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(60, 'Job order 20250221931', 161, 62, 69, '2025-02-21', '2025-02-28', '2400', 'CASH_ON_PICKUP', 'Job order 2025022193102-21-2025.png', '2025-02-21', '2025-02-21', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(61, 'Job order 20250221356', 161, 63, 69, '2025-02-21', '2025-02-28', '32000', 'CASH_ON_PICKUP', 'Job order 2025022135602-21-2025.png', '2025-02-21', '2025-02-21', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(62, 'Job order 20250221972', 161, 48, 47, '2025-02-21', '2025-02-28', '24016', 'CASH_ON_PICKUP', 'Job order 2025022197202-21-2025.png', '2025-02-21', '2025-02-21', 1, 'Done', NULL, NULL, NULL, NULL, NULL),
(63, 'Job order 20250224057', 161, 78, 126, '2025-02-25', '2025-02-28', '4000', 'CASH_ON_PICKUP', 'Job order 2025022405702-24-2025.png', '2025-02-24', '2025-02-24', 1, 'Ongoing', '', '', '', '', ''),
(64, 'Job order 20250227552', 155, 47, 47, '2025-03-03', '2025-03-05', '9600', 'CASH_ON_PICKUP', 'Job order 2025022755202-27-2025.png', '2025-02-27', '2025-02-27', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(65, 'Job order 20250228650', 178, 47, 47, '2025-03-13', '2025-03-20', '25600', 'CASH_ON_PICKUP', 'Job order 2025022865002-28-2025.png', '2025-02-28', '2025-02-28', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(66, 'Job order 20250303025', 183, 50, 49, '2025-03-10', '2025-03-14', '16500', 'CASH_ON_PICKUP', 'Job order 2025030302503-03-2025.png', '2025-03-03', '2025-03-03', 1, 'Ongoing', '26-20250303141833.jpg', '15-20250303141835.jpg', '16-20250303141834.jpg', '17-20250303141834.jpg', '35-20250303141836.jpg'),
(67, 'Job order 20250305695', 155, 50, 49, '2025-03-18', '2025-03-20', '9900', 'CASH_ON_PICKUP', 'Job order 2025030569503-05-2025.png', '2025-03-05', '2025-03-05', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(68, 'Job order 20250305162', 155, 50, 49, '2025-03-26', '2025-03-27', '6600', 'CASH_ON_PICKUP', 'Job order 2025030516203-05-2025.png', '2025-03-05', '2025-03-05', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(69, 'Job order 20250305869', 155, 50, 49, '2025-03-28', '2025-03-29', '6700', 'CASH_ON_PICKUP', 'Job order 2025030586903-05-2025.png', '2025-03-05', '2025-03-05', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(70, 'Job order 20250310916', 162, 47, 47, '2025-03-27', '2025-03-31', '16000', 'CASH_ON_PICKUP', 'Job order 2025031091603-10-2025.png', '2025-03-10', '2025-03-10', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(71, 'Job order 20250425760', 269, 48, 47, '2025-05-04', '2025-05-12', '27000', 'CASH_ON_PICKUP', 'Job order 2025042576004-25-2025.png', '2025-04-25', '2025-04-25', 1, 'Done', NULL, NULL, NULL, NULL, NULL),
(72, 'Job order 20250428386', 269, 77, 126, '2025-05-01', '2025-05-04', '7200', 'CASH_ON_PICKUP', 'Job order 2025042838604-28-2025.png', '2025-04-28', '2025-04-28', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(73, 'Job order 20250428007', 161, 62, 69, '2025-04-29', '2025-05-08', '3000', 'CASH_ON_PICKUP', 'Job order 2025042800704-28-2025.png', '2025-04-28', '2025-04-28', 1, 'Done', NULL, NULL, NULL, NULL, NULL),
(74, 'Job order 20250428109', 161, 116, 127, '2025-05-01', '2025-05-12', '600000', 'CASH_ON_PICKUP', 'Job order 2025042810904-28-2025.png', '2025-04-28', '2025-04-28', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(75, 'Job order 20250507126', 283, 111, 231, '2025-05-07', '2025-05-11', '11000', 'CASH_ON_PICKUP', 'Job order 2025050712605-07-2025.png', '2025-05-07', '2025-05-07', 1, 'Done', NULL, NULL, NULL, NULL, NULL),
(76, 'Job order 20250519131', 261, 111, 231, '2025-05-19', '2025-05-29', '27000', 'CASH_ON_PICKUP', 'Job order 2025051913105-19-2025.png', '2025-05-19', '2025-05-19', 1, 'Done', '123.png', '123.png', '123.png', '123.png', '123.png'),
(77, 'Job order 20250520986', 261, 47, 47, '2025-05-20', '2025-05-21', '6400', 'CASH_ON_PICKUP', 'Job order 2025052098605-20-2025.png', '2025-05-20', '2025-05-20', 1, 'Ongoing', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(78, 'Job order 20250520171', 261, 48, 47, '2024-08-19', '2024-08-21', '2400', 'CASH_ON_PICKUP', 'Job order 2025052017105-20-2025.png', '2025-05-20', '2025-05-20', 1, 'Done', '21-20250520152327.jpg', '34-20250520152329.jpg', '27-20250520152328.jpg', '35-20250520152328.jpg', '16-20250520152329.jpg'),
(79, 'Job order 20250520896', 261, 112, 231, '2025-05-23', '2025-05-25', '7000', 'CASH_ON_PICKUP', 'Job order 2025052089605-20-2025.png', '2025-05-20', '2025-05-20', 1, 'Done', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(80, 'Job order 20250520063', 261, 115, 231, '2025-05-22', '2025-05-31', '9000', 'CASH_ON_PICKUP', 'Job order 2025052006305-20-2025.png', '2025-05-20', '2025-05-20', 1, 'Done', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(81, 'Job order 20250520247', 261, 114, 231, '2025-05-20', '2025-05-31', '33000', 'CASH_ON_PICKUP', 'Job order 2025052024705-20-2025.png', '2025-05-20', '2025-05-20', 1, 'Done', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(82, 'Job order 20250521949', 261, 47, 47, '2025-05-22', '2025-05-23', '6400', 'CASH_ON_PICKUP', 'Job order 2025052194905-21-2025.png', '2025-05-21', '2025-05-21', 1, 'Ongoing', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABAGgAwAEAAAAAQAABQAAAAAA/8AAEQgFAAQBAwEiAAIRAQMRAf/EAB8AAAEFAQE', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(83, 'Job order 20250521249', 261, 112, 231, '2025-06-01', '2025-06-02', '5000', 'CASH_ON_PICKUP', 'Job order 2025052124905-21-2025.png', '2025-05-21', '2025-05-21', 1, 'Done', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(84, 'Job order 20250522889', 261, 47, 47, '2025-05-25', '2025-05-26', '6400', 'CASH_ON_PICKUP', 'Job order 2025052288905-22-2025.png', '2025-05-22', '2025-05-22', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(85, 'Job order 20250522739', 261, 114, 231, '2025-06-01', '2025-06-03', '9000', 'CASH_ON_PICKUP', 'Job order 2025052273905-22-2025.png', '2025-05-22', '2025-05-22', 1, 'Done', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(86, 'Job order 20250522305', 290, 112, 231, '2025-05-26', '2025-05-28', '6000', 'CASH_ON_PICKUP', 'Job order 2025052230505-22-2025.png', '2025-05-22', '2025-05-22', 1, 'Done', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(87, 'Job order 20250522235', 290, 50, 49, '2025-05-22', '2025-05-23', '6600', 'CASH_ON_PICKUP', 'Job order 2025052223505-22-2025.png', '2025-05-22', '2025-05-22', 1, 'Ongoing', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAmSgAwAEAAAAAQAAAZgAAAAA/8AAEQgBmAJkAwERAAIRAQMRAf/EAB8AAAEFAQE'),
(88, 'Job order 20250522559', 290, 111, 231, '2025-06-02', '2025-06-03', '6000', 'CASH_ON_PICKUP', 'Job order 2025052255905-22-2025.png', '2025-05-22', '2025-05-22', 1, 'Done', '28-20250522133937.jpg', '23-20250522133939.jpg', '20-20250522133938.jpg', '19-20250522133938.jpg', '35-20250522133939.jpg'),
(89, 'Job order 20250522348', 290, 119, 231, '2025-05-22', '2025-05-23', '16000', 'CASH_ON_PICKUP', 'Job order 2025052234805-22-2025.png', '2025-05-22', '2025-05-22', 1, 'Done', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA6KgAwAEAAAAAQAAAaYAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAABf6gAwAEAAAAAQAAArIAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAApmgAwAEAAAAAQAAAXcAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAligAwAEAAAAAQAAASwAAAAA/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAA'),
(90, 'Job order 20250523445', 290, 112, 231, '2025-05-29', '2025-05-30', '4000', 'CASH_ON_PICKUP', 'Job order 2025052344505-23-2025.png', '2025-05-23', '2025-05-23', 1, 'Done', NULL, NULL, NULL, NULL, NULL),
(91, 'Job order 20250531768', 208, 112, 231, '2025-06-03', '2025-06-04', '4000', 'CASH_ON_PICKUP', 'Job order 2025053176805-31-2025.png', '2025-05-31', '2025-05-31', 1, 'Done', NULL, NULL, NULL, NULL, NULL),
(92, 'Job order 20250603200', 310, 121, 309, '2025-06-04', '2025-06-06', '9500', 'CASH_ON_PICKUP', 'Job order 2025060320006-03-2025.png', '2025-06-03', '2025-06-03', 1, 'Ongoing', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAqagAwAEAAAAAQAAAcQAAAAA/8AAEQgBxAKmAwEiAAIRAQMRAf/EAB8AAAEFAQE', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAoqgAwAEAAAAAQAAAa4AAAAA/8AAEQgBrgKKAwEiAAIRAQMRAf/EAB8AAAEFAQE', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAA4SgAwAEAAAAAQAAAlgAAAAA/8AAEQgCWAOEAwERAAIRAQMRAf/EAB8AAAEFAQE', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAqagAwAEAAAAAQAAAcQAAAAA/8AAEQgBxAKmAwEiAAIRAQMRAf/EAB8AAAEFAQE', '/9j/4AAQSkZJRgABAQAASABIAAD/4QCMRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgEoAAMAAAABAAIAAIdpAAQAAAABAAAAWgAAAAAAAABIAAAAAQAAAEgAAAABAAOgAQADAAAAAQABAACgAgAEAAAAAQAAAqagAwAEAAAAAQAAAcQAAAAA/8AAEQgBxAKmAwEiAAIRAQMRAf/EAB8AAAEFAQE'),
(93, 'Job order 20250609433', 261, 121, 309, '2025-06-09', '2025-06-10', '6000', 'CASH_ON_PICKUP', 'Job order 2025060943306-09-2025.png', '2025-06-09', '2025-06-09', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(94, 'Job order 20250613153', 320, 47, 47, '2025-06-13', '2025-06-14', '6400', 'CASH_ON_PICKUP', 'Job order 2025061315306-13-2025.png', '2025-06-13', '2025-06-13', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(95, 'Job order 20250613587', 327, 112, 231, '2025-06-27', '2025-06-28', '5000', 'CASH_ON_PICKUP', 'Job order 2025061358706-13-2025.png', '2025-06-13', '2025-06-13', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(96, 'Job order 20250616675', 261, 122, 231, '2025-06-16', '2025-06-17', '10000', 'CASH_ON_PICKUP', 'Job order 2025061667506-16-2025.png', '2025-06-16', '2025-06-16', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(97, 'Job order 20250616998', 261, 112, 231, '2025-06-16', '2025-06-17', '4000', 'CASH_ON_PICKUP', 'Job order 2025061699806-16-2025.png', '2025-06-16', '2025-06-16', 1, 'Ongoing', '33-20250616141451.jpg', '35-20250616141453.jpg', '30-20250616141452.jpg', '22-20250616141452.jpg', '34-20250616141453.jpg'),
(98, 'Job order 20250630688', 228, 47, 47, '2025-07-04', '2025-07-05', '6400', 'CASH_ON_PICKUP', 'Job order 2025063068806-30-2025.png', '2025-06-30', '2025-06-30', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(99, 'Job order 20250704221', 345, 121, 309, '2025-07-07', '2025-07-08', '6000', 'CASH_ON_PICKUP', 'Job order 2025070422107-04-2025.png', '2025-07-04', '2025-07-04', 1, 'Pending', NULL, NULL, NULL, NULL, NULL),
(100, 'Job order 20250704851', 345, 50, 49, '2025-07-13', '2025-07-14', '6700', 'CASH_ON_PICKUP', 'Job order 2025070485107-04-2025.png', '2025-07-04', '2025-07-04', 1, 'Pending', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_price_calender`
--

CREATE TABLE `tbl_car_price_calender` (
  `id` int NOT NULL,
  `car_id` int NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `start` varchar(255) DEFAULT NULL,
  `end` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_car_price_calender`
--

INSERT INTO `tbl_car_price_calender` (`id`, `car_id`, `price`, `start`, `end`, `created`, `status`) VALUES
(164, 47, '3500', '2024-07-22', NULL, '2024-07-21', 1),
(165, 47, '2500', '2024-07-23', NULL, '2024-07-21', 1),
(166, 48, '3200', '2024-07-25', NULL, '2024-07-22', 1),
(167, 48, '3200', '2024-07-28', NULL, '2024-07-25', 1),
(168, 48, '3200', '2024-08-01', NULL, '2024-07-25', 1),
(169, 48, '3205', '2024-08-03', NULL, '2024-07-25', 1),
(170, 48, '3300', '2024-08-09', NULL, '2024-07-25', 1),
(171, 48, '3600', '2024-09-01', NULL, '2024-07-25', 1),
(172, 48, '3603', '2024-09-16', NULL, '2024-07-25', 1),
(173, 48, '3000', '2024-10-04', NULL, '2024-07-25', 1),
(174, 48, '3502', '2024-07-17', NULL, '2024-07-26', 1),
(175, 48, '3002', '2024-07-01', NULL, '2024-07-26', 1),
(176, 48, '3010', '2024-06-13', NULL, '2024-07-26', 1),
(179, 48, '3006', '2024-06-04', NULL, '2024-07-26', 1),
(183, 48, '3003', '2024-07-11', NULL, '2024-07-29', 1),
(184, 48, '3005', '2024-07-12', NULL, '2024-07-31', 1),
(185, 53, '1200', '2024-07-31', NULL, '2024-07-31', 1),
(186, 48, '3200', '2024-07-29', NULL, '2024-08-05', 1),
(187, 48, '3200', '2024-07-30', NULL, '2024-08-05', 1),
(188, 48, '3004', '2024-08-07', NULL, '2024-08-05', 1),
(189, 56, '2200', '2024-08-08', NULL, '2024-08-08', 1),
(190, 48, '0', '2024-08-10', NULL, '2024-08-08', 1),
(191, 48, '0', '2024-08-11', NULL, '2024-08-08', 1),
(192, 48, '0', '2024-08-24', NULL, '2024-08-08', 1),
(193, 48, '1000', '2024-08-25', NULL, '2024-08-08', 1),
(194, 48, '0', '2024-08-26', NULL, '2024-08-08', 1),
(195, 45, '2200', '2024-08-28', NULL, '2024-08-15', 1),
(196, 47, '3200', '2024-08-29', NULL, '2024-08-28', 1),
(197, 47, '3200', '2024-09-03', NULL, '2024-08-28', 1),
(198, 47, '3200', '2024-09-04', NULL, '2024-08-28', 1),
(199, 47, '3200', '2024-09-05', NULL, '2024-08-28', 1),
(200, 47, '3200', '2024-09-06', NULL, '2024-08-28', 1),
(201, 47, '3200', '2024-09-07', NULL, '2024-08-28', 1),
(202, 60, '200', '2024-07-20', NULL, '2024-09-28', 1),
(203, 47, '3200', '2025-01-01', '2025-01-02', '2025-01-06', 1),
(204, 70, '3000', '2025-01-07', NULL, '2025-01-17', 1),
(205, 47, '3200', '2024-07-28', NULL, '2025-01-17', 1),
(206, 47, '3200', '2024-07-29', NULL, '2025-01-17', 1),
(207, 47, '3200', '2024-07-30', NULL, '2025-01-17', 1),
(208, 61, '2000', '2025-05-14', NULL, '2025-01-18', 1),
(209, 61, '2000', '2025-01-17', NULL, '2025-01-18', 1),
(210, 61, '2900', '2025-01-14', NULL, '2025-01-18', 1),
(211, 47, '3200', '2024-07-31', NULL, '2025-01-18', 1),
(212, 47, '3200', '2024-08-01', NULL, '2025-01-18', 1),
(213, 47, '3200', '2024-08-02', NULL, '2025-01-18', 1),
(214, 47, '3200', '2024-08-03', NULL, '2025-01-18', 1),
(215, 47, '3200', '2024-08-04', NULL, '2025-01-18', 1),
(216, 47, '3200', '2024-08-05', NULL, '2025-01-18', 1),
(217, 47, '3200', '2024-08-06', NULL, '2025-01-18', 1),
(218, 47, '3200', '2024-08-07', NULL, '2025-01-18', 1),
(219, 47, '3200', '2024-08-08', NULL, '2025-01-18', 1),
(220, 47, '3200', '2024-08-09', NULL, '2025-01-18', 1),
(221, 47, '3200', '2024-08-10', NULL, '2025-01-18', 1),
(222, 47, '3200', '2024-08-11', NULL, '2025-01-18', 1),
(223, 47, '3200', '2024-08-12', NULL, '2025-01-18', 1),
(224, 47, '3200', '2024-08-13', NULL, '2025-01-18', 1),
(225, 47, '3200', '2024-08-14', NULL, '2025-01-18', 1),
(226, 47, '3200', '2024-08-15', NULL, '2025-01-18', 1),
(227, 47, '3200', '2024-08-16', NULL, '2025-01-18', 1),
(228, 47, '3200', '2024-08-17', NULL, '2025-01-18', 1),
(229, 47, '3200', '2024-08-18', NULL, '2025-01-18', 1),
(230, 47, '3200', '2024-08-19', NULL, '2025-01-18', 1),
(231, 47, '3200', '2024-08-20', NULL, '2025-01-18', 1),
(232, 47, '3200', '2024-08-21', NULL, '2025-01-18', 1),
(233, 47, '3200', '2024-08-22', NULL, '2025-01-18', 1),
(234, 47, '3200', '2024-08-23', NULL, '2025-01-18', 1),
(235, 47, '3200', '2024-08-24', NULL, '2025-01-18', 1),
(236, 47, '3200', '2024-08-25', NULL, '2025-01-18', 1),
(237, 47, '3200', '2024-08-26', NULL, '2025-01-18', 1),
(238, 47, '3200', '2024-08-27', NULL, '2025-01-18', 1),
(239, 47, '3200', '2024-08-28', NULL, '2025-01-18', 1),
(240, 47, '3200', '2024-08-30', NULL, '2025-01-18', 1),
(241, 47, '3200', '2024-08-31', NULL, '2025-01-18', 1),
(242, 47, '3200', '2024-09-01', NULL, '2025-01-18', 1),
(243, 47, '3200', '2024-09-02', NULL, '2025-01-18', 1),
(244, 47, '3200', '2024-09-08', NULL, '2025-01-18', 1),
(245, 47, '3200', '2024-09-09', NULL, '2025-01-18', 1),
(246, 47, '3200', '2024-09-10', NULL, '2025-01-18', 1),
(247, 47, '3200', '2024-09-11', NULL, '2025-01-18', 1),
(248, 47, '3200', '2024-09-12', NULL, '2025-01-18', 1),
(249, 47, '3200', '2024-09-13', NULL, '2025-01-18', 1),
(250, 47, '3200', '2024-09-14', NULL, '2025-01-18', 1),
(251, 47, '3200', '2024-09-15', NULL, '2025-01-18', 1),
(252, 47, '3200', '2024-09-16', NULL, '2025-01-18', 1),
(253, 47, '3200', '2024-09-17', NULL, '2025-01-18', 1),
(254, 47, '3200', '2024-09-18', NULL, '2025-01-18', 1),
(255, 47, '3200', '2024-09-19', NULL, '2025-01-18', 1),
(256, 47, '3200', '2024-09-20', NULL, '2025-01-18', 1),
(257, 47, '3200', '2024-09-21', NULL, '2025-01-18', 1),
(258, 47, '3200', '2024-09-22', NULL, '2025-01-18', 1),
(259, 47, '3200', '2024-09-23', NULL, '2025-01-18', 1),
(260, 47, '3200', '2024-09-24', NULL, '2025-01-18', 1),
(261, 47, '3200', '2024-09-25', NULL, '2025-01-18', 1),
(262, 47, '3200', '2024-09-26', NULL, '2025-01-18', 1),
(263, 47, '3200', '2024-09-27', NULL, '2025-01-18', 1),
(264, 47, '3200', '2024-09-28', NULL, '2025-01-18', 1),
(265, 47, '3200', '2024-09-29', NULL, '2025-01-18', 1),
(266, 47, '3200', '2024-09-30', NULL, '2025-01-18', 1),
(267, 47, '3200', '2024-10-01', NULL, '2025-01-18', 1),
(268, 47, '3200', '2024-10-02', NULL, '2025-01-18', 1),
(269, 47, '3200', '2024-10-03', NULL, '2025-01-18', 1),
(270, 47, '3200', '2024-10-04', NULL, '2025-01-18', 1),
(271, 47, '3200', '2024-10-05', NULL, '2025-01-18', 1),
(272, 47, '3200', '2024-10-06', NULL, '2025-01-18', 1),
(273, 47, '3200', '2024-10-07', NULL, '2025-01-18', 1),
(274, 47, '3200', '2024-10-08', NULL, '2025-01-18', 1),
(275, 47, '3200', '2024-10-09', NULL, '2025-01-18', 1),
(276, 47, '3200', '2024-10-10', NULL, '2025-01-18', 1),
(277, 47, '3200', '2024-10-11', NULL, '2025-01-18', 1),
(278, 47, '3200', '2024-10-12', NULL, '2025-01-18', 1),
(279, 47, '3200', '2024-10-13', NULL, '2025-01-18', 1),
(280, 47, '3200', '2024-10-14', NULL, '2025-01-18', 1),
(281, 47, '3200', '2024-10-15', NULL, '2025-01-18', 1),
(282, 47, '3200', '2024-10-16', NULL, '2025-01-18', 1),
(283, 47, '3200', '2024-10-17', NULL, '2025-01-18', 1),
(284, 47, '3200', '2024-10-18', NULL, '2025-01-18', 1),
(285, 47, '3200', '2024-10-19', NULL, '2025-01-18', 1),
(286, 47, '3200', '2024-10-20', NULL, '2025-01-18', 1),
(287, 47, '3200', '2024-10-21', NULL, '2025-01-18', 1),
(288, 47, '3200', '2024-10-22', NULL, '2025-01-18', 1),
(289, 47, '3200', '2024-10-23', NULL, '2025-01-18', 1),
(290, 47, '3200', '2024-10-24', NULL, '2025-01-18', 1),
(291, 47, '3200', '2024-10-25', NULL, '2025-01-18', 1),
(292, 47, '3200', '2024-10-26', NULL, '2025-01-18', 1),
(293, 47, '3200', '2024-10-27', NULL, '2025-01-18', 1),
(294, 47, '3200', '2024-10-28', NULL, '2025-01-18', 1),
(295, 47, '3200', '2024-10-29', NULL, '2025-01-18', 1),
(296, 47, '3200', '2024-10-30', NULL, '2025-01-18', 1),
(297, 47, '3200', '2024-10-31', NULL, '2025-01-18', 1),
(298, 47, '3200', '2024-11-01', NULL, '2025-01-18', 1),
(299, 47, '3200', '2024-11-02', NULL, '2025-01-18', 1),
(300, 47, '3200', '2024-11-03', NULL, '2025-01-18', 1),
(301, 47, '3200', '2024-11-04', NULL, '2025-01-18', 1),
(302, 47, '3200', '2024-11-05', NULL, '2025-01-18', 1),
(303, 47, '3200', '2024-11-06', NULL, '2025-01-18', 1),
(304, 47, '3200', '2024-11-07', NULL, '2025-01-18', 1),
(305, 47, '3200', '2024-11-08', NULL, '2025-01-18', 1),
(306, 47, '3200', '2024-11-09', NULL, '2025-01-18', 1),
(307, 47, '3200', '2024-11-10', NULL, '2025-01-18', 1),
(308, 47, '3200', '2024-11-11', NULL, '2025-01-18', 1),
(309, 47, '3200', '2024-11-12', NULL, '2025-01-18', 1),
(310, 47, '3200', '2024-11-13', NULL, '2025-01-18', 1),
(311, 47, '3200', '2024-11-14', NULL, '2025-01-18', 1),
(312, 47, '3200', '2024-11-15', NULL, '2025-01-18', 1),
(313, 47, '3200', '2024-11-16', NULL, '2025-01-18', 1),
(314, 47, '3200', '2024-11-17', NULL, '2025-01-18', 1),
(315, 47, '3200', '2024-11-18', NULL, '2025-01-18', 1),
(316, 47, '3200', '2024-11-19', NULL, '2025-01-18', 1),
(317, 47, '3200', '2024-11-20', NULL, '2025-01-18', 1),
(318, 47, '3200', '2024-11-21', NULL, '2025-01-18', 1),
(319, 47, '3200', '2024-11-22', NULL, '2025-01-18', 1),
(320, 47, '3200', '2024-11-23', NULL, '2025-01-18', 1),
(321, 47, '3200', '2024-11-24', NULL, '2025-01-18', 1),
(322, 47, '3200', '2024-11-25', NULL, '2025-01-18', 1),
(323, 47, '3200', '2024-11-26', NULL, '2025-01-18', 1),
(324, 47, '3200', '2024-11-27', NULL, '2025-01-18', 1),
(325, 47, '3200', '2024-11-28', NULL, '2025-01-18', 1),
(326, 47, '3200', '2024-11-29', NULL, '2025-01-18', 1),
(327, 47, '3200', '2024-11-30', NULL, '2025-01-18', 1),
(328, 47, '3200', '2024-12-01', NULL, '2025-01-18', 1),
(329, 47, '3200', '2024-12-02', NULL, '2025-01-18', 1),
(330, 47, '3200', '2024-12-03', NULL, '2025-01-18', 1),
(331, 47, '3200', '2024-12-04', NULL, '2025-01-18', 1),
(332, 47, '3200', '2024-12-05', NULL, '2025-01-18', 1),
(333, 47, '3200', '2024-12-06', NULL, '2025-01-18', 1),
(334, 47, '3200', '2024-12-07', NULL, '2025-01-18', 1),
(335, 47, '3200', '2024-12-08', NULL, '2025-01-18', 1),
(336, 47, '3200', '2024-12-09', NULL, '2025-01-18', 1),
(337, 47, '3200', '2024-12-10', NULL, '2025-01-18', 1),
(338, 47, '3200', '2024-12-11', NULL, '2025-01-18', 1),
(339, 47, '3200', '2024-12-12', NULL, '2025-01-18', 1),
(340, 47, '3200', '2024-12-13', NULL, '2025-01-18', 1),
(341, 47, '3200', '2024-12-14', NULL, '2025-01-18', 1),
(342, 47, '3200', '2024-12-15', NULL, '2025-01-18', 1),
(343, 47, '3200', '2024-12-16', NULL, '2025-01-18', 1),
(344, 47, '3200', '2024-12-17', NULL, '2025-01-18', 1),
(345, 47, '3200', '2024-12-18', NULL, '2025-01-18', 1),
(346, 47, '3200', '2024-12-19', NULL, '2025-01-18', 1),
(347, 47, '3200', '2024-12-20', NULL, '2025-01-18', 1),
(348, 47, '3200', '2024-12-21', NULL, '2025-01-18', 1),
(349, 47, '3200', '2024-12-22', NULL, '2025-01-18', 1),
(350, 47, '3200', '2024-12-23', NULL, '2025-01-18', 1),
(351, 47, '3200', '2024-12-24', NULL, '2025-01-18', 1),
(352, 47, '3200', '2024-12-25', NULL, '2025-01-18', 1),
(353, 47, '3200', '2024-12-26', NULL, '2025-01-18', 1),
(354, 47, '3200', '2024-12-27', NULL, '2025-01-18', 1),
(355, 47, '3200', '2024-12-28', NULL, '2025-01-18', 1),
(356, 47, '3200', '2024-12-29', NULL, '2025-01-18', 1),
(357, 47, '3200', '2024-12-30', NULL, '2025-01-18', 1),
(358, 47, '3200', '2024-12-31', NULL, '2025-01-18', 1),
(359, 47, '3200', '2025-01-02', NULL, '2025-01-18', 1),
(360, 47, '3200', '2025-01-03', NULL, '2025-01-18', 1),
(361, 47, '3200', '2025-01-04', NULL, '2025-01-18', 1),
(362, 47, '3200', '2025-01-05', NULL, '2025-01-18', 1),
(363, 47, '3200', '2025-01-06', NULL, '2025-01-18', 1),
(364, 47, '3200', '2025-01-07', NULL, '2025-01-18', 1),
(365, 47, '3200', '2025-01-08', NULL, '2025-01-18', 1),
(366, 47, '3200', '2025-01-09', NULL, '2025-01-18', 1),
(367, 47, '3200', '2025-01-10', NULL, '2025-01-18', 1),
(368, 47, '3200', '2025-01-11', NULL, '2025-01-18', 1),
(369, 47, '3200', '2025-01-12', NULL, '2025-01-18', 1),
(370, 47, '3200', '2025-01-13', NULL, '2025-01-18', 1),
(371, 47, '3200', '2025-01-14', NULL, '2025-01-18', 1),
(372, 47, '3200', '2025-01-15', NULL, '2025-01-18', 1),
(373, 47, '3200', '2025-01-16', NULL, '2025-01-18', 1),
(374, 47, '3200', '2025-01-17', NULL, '2025-01-18', 1),
(375, 47, '3200', '2025-01-18', NULL, '2025-01-18', 1),
(376, 47, '3200', '2025-01-19', NULL, '2025-01-18', 1),
(377, 47, '3200', '2025-01-20', NULL, '2025-01-18', 1),
(378, 47, '3200', '2025-01-21', NULL, '2025-01-18', 1),
(379, 47, '3200', '2025-01-22', NULL, '2025-01-18', 1),
(380, 47, '3200', '2025-01-23', NULL, '2025-01-18', 1),
(381, 47, '3200', '2025-01-24', NULL, '2025-01-18', 1),
(382, 47, '3200', '2025-01-25', NULL, '2025-01-18', 1),
(383, 47, '3200', '2025-01-26', NULL, '2025-01-18', 1),
(384, 47, '3200', '2025-01-27', NULL, '2025-01-18', 1),
(385, 47, '3200', '2025-01-28', NULL, '2025-01-18', 1),
(386, 47, '3200', '2025-01-29', NULL, '2025-01-18', 1),
(387, 47, '3200', '2025-01-30', NULL, '2025-01-18', 1),
(388, 47, '3200', '2025-01-31', NULL, '2025-01-18', 1),
(389, 47, '3200', '2025-02-01', NULL, '2025-01-18', 1),
(390, 47, '3200', '2025-02-02', NULL, '2025-01-18', 1),
(391, 47, '3200', '2025-02-03', NULL, '2025-01-18', 1),
(392, 47, '3200', '2025-02-04', NULL, '2025-01-18', 1),
(393, 47, '3200', '2025-02-05', NULL, '2025-01-18', 1),
(394, 47, '3200', '2025-02-06', NULL, '2025-01-18', 1),
(395, 47, '3200', '2025-02-07', NULL, '2025-01-18', 1),
(396, 47, '3200', '2025-02-08', NULL, '2025-01-18', 1),
(397, 47, '3200', '2025-02-09', NULL, '2025-01-18', 1),
(398, 47, '3200', '2025-02-10', NULL, '2025-01-18', 1),
(399, 47, '3200', '2025-02-11', NULL, '2025-01-18', 1),
(400, 47, '3200', '2025-02-12', NULL, '2025-01-18', 1),
(401, 47, '3200', '2025-02-13', NULL, '2025-01-18', 1),
(402, 47, '3200', '2025-02-14', NULL, '2025-01-18', 1),
(403, 47, '3200', '2025-02-15', NULL, '2025-01-18', 1),
(404, 47, '3200', '2025-02-16', NULL, '2025-01-18', 1),
(405, 47, '3200', '2025-02-17', NULL, '2025-01-18', 1),
(406, 47, '3200', '2025-02-18', NULL, '2025-01-18', 1),
(407, 47, '3200', '2025-02-19', NULL, '2025-01-18', 1),
(408, 47, '3200', '2025-02-20', NULL, '2025-01-18', 1),
(409, 47, '3200', '2025-02-21', NULL, '2025-01-18', 1),
(410, 47, '3200', '2025-02-22', NULL, '2025-01-18', 1),
(411, 47, '3200', '2025-02-23', NULL, '2025-01-18', 1),
(412, 47, '3200', '2025-02-24', NULL, '2025-01-18', 1),
(413, 47, '3200', '2025-02-25', NULL, '2025-01-18', 1),
(414, 47, '3200', '2025-02-26', NULL, '2025-01-18', 1),
(415, 47, '3200', '2025-02-27', NULL, '2025-01-18', 1),
(416, 47, '3200', '2025-02-28', NULL, '2025-01-18', 1),
(417, 47, '3200', '2025-03-01', NULL, '2025-01-18', 1),
(418, 47, '3200', '2025-03-02', NULL, '2025-01-18', 1),
(419, 47, '3200', '2025-03-03', NULL, '2025-01-18', 1),
(420, 47, '3200', '2025-03-04', NULL, '2025-01-18', 1),
(421, 47, '3200', '2025-03-05', NULL, '2025-01-18', 1),
(422, 47, '3200', '2025-03-06', NULL, '2025-01-18', 1),
(423, 47, '3200', '2025-03-07', NULL, '2025-01-18', 1),
(424, 47, '3200', '2025-03-08', NULL, '2025-01-18', 1),
(425, 47, '3200', '2025-03-09', NULL, '2025-01-18', 1),
(426, 47, '3200', '2025-03-10', NULL, '2025-01-18', 1),
(427, 47, '3200', '2025-03-11', NULL, '2025-01-18', 1),
(428, 47, '3200', '2025-03-12', NULL, '2025-01-18', 1),
(429, 47, '3200', '2025-03-13', NULL, '2025-01-18', 1),
(430, 47, '3200', '2025-03-14', NULL, '2025-01-18', 1),
(431, 47, '3200', '2025-03-15', NULL, '2025-01-18', 1),
(432, 47, '3200', '2025-03-16', NULL, '2025-01-18', 1),
(433, 47, '3200', '2025-03-17', NULL, '2025-01-18', 1),
(434, 47, '3200', '2025-03-18', NULL, '2025-01-18', 1),
(435, 47, '3200', '2025-03-19', NULL, '2025-01-18', 1),
(436, 47, '3200', '2025-03-20', NULL, '2025-01-18', 1),
(437, 47, '3200', '2025-03-21', NULL, '2025-01-18', 1),
(438, 47, '3200', '2025-03-22', NULL, '2025-01-18', 1),
(439, 47, '3200', '2025-03-23', NULL, '2025-01-18', 1),
(440, 47, '3200', '2025-03-24', NULL, '2025-01-18', 1),
(441, 47, '3200', '2025-03-25', NULL, '2025-01-18', 1),
(442, 47, '3200', '2025-03-26', NULL, '2025-01-18', 1),
(443, 47, '3200', '2025-03-27', NULL, '2025-01-18', 1),
(444, 47, '3200', '2025-03-28', NULL, '2025-01-18', 1),
(445, 47, '3200', '2025-03-29', NULL, '2025-01-18', 1),
(446, 47, '3200', '2025-03-30', NULL, '2025-01-18', 1),
(447, 47, '3200', '2025-03-31', NULL, '2025-01-18', 1),
(448, 47, '3200', '2025-04-01', NULL, '2025-01-18', 1),
(449, 47, '3200', '2025-04-02', NULL, '2025-01-18', 1),
(450, 47, '3200', '2025-04-03', NULL, '2025-01-18', 1),
(451, 47, '3200', '2025-04-04', NULL, '2025-01-18', 1),
(452, 47, '3200', '2025-04-05', NULL, '2025-01-18', 1),
(453, 47, '3200', '2025-04-06', NULL, '2025-01-18', 1),
(454, 47, '3200', '2025-04-07', NULL, '2025-01-18', 1),
(455, 47, '3200', '2025-04-08', NULL, '2025-01-18', 1),
(456, 47, '3200', '2025-04-09', NULL, '2025-01-18', 1),
(457, 47, '3200', '2025-04-10', NULL, '2025-01-18', 1),
(458, 47, '3200', '2025-04-11', NULL, '2025-01-18', 1),
(459, 47, '3200', '2025-04-12', NULL, '2025-01-18', 1),
(460, 47, '3200', '2025-04-13', NULL, '2025-01-18', 1),
(461, 47, '3200', '2025-04-14', NULL, '2025-01-18', 1),
(462, 47, '3200', '2025-04-15', NULL, '2025-01-18', 1),
(463, 47, '3200', '2025-04-16', NULL, '2025-01-18', 1),
(464, 47, '3200', '2025-04-17', NULL, '2025-01-18', 1),
(465, 47, '3200', '2025-04-18', NULL, '2025-01-18', 1),
(466, 47, '3200', '2025-04-19', NULL, '2025-01-18', 1),
(467, 47, '3200', '2025-04-20', NULL, '2025-01-18', 1),
(468, 47, '3200', '2025-04-21', NULL, '2025-01-18', 1),
(469, 47, '3200', '2025-04-22', NULL, '2025-01-18', 1),
(470, 47, '3200', '2025-04-23', NULL, '2025-01-18', 1),
(471, 47, '3200', '2025-04-24', NULL, '2025-01-18', 1),
(472, 47, '3200', '2025-04-25', NULL, '2025-01-18', 1),
(473, 47, '3200', '2025-04-26', NULL, '2025-01-18', 1),
(474, 47, '3200', '2025-04-27', NULL, '2025-01-18', 1),
(475, 47, '3200', '2025-04-28', NULL, '2025-01-18', 1),
(476, 47, '3200', '2025-04-29', NULL, '2025-01-18', 1),
(477, 47, '3200', '2025-04-30', NULL, '2025-01-18', 1),
(478, 47, '3200', '2025-05-01', NULL, '2025-01-18', 1),
(479, 47, '3200', '2025-05-02', NULL, '2025-01-18', 1),
(480, 47, '3200', '2025-05-03', NULL, '2025-01-18', 1),
(481, 47, '3200', '2025-05-04', NULL, '2025-01-18', 1),
(482, 47, '3200', '2025-05-05', NULL, '2025-01-18', 1),
(483, 47, '3200', '2025-05-06', NULL, '2025-01-18', 1),
(484, 47, '3200', '2025-05-07', NULL, '2025-01-18', 1),
(485, 47, '3200', '2025-05-08', NULL, '2025-01-18', 1),
(486, 47, '3200', '2025-05-09', NULL, '2025-01-18', 1),
(487, 47, '3200', '2025-05-10', NULL, '2025-01-18', 1),
(488, 47, '3200', '2025-05-11', NULL, '2025-01-18', 1),
(489, 47, '3200', '2025-05-12', NULL, '2025-01-18', 1),
(490, 47, '3200', '2025-05-13', NULL, '2025-01-18', 1),
(491, 47, '3200', '2025-05-14', NULL, '2025-01-18', 1),
(492, 47, '3200', '2025-05-15', NULL, '2025-01-18', 1),
(493, 47, '3200', '2025-05-16', NULL, '2025-01-18', 1),
(494, 47, '3200', '2025-05-17', NULL, '2025-01-18', 1),
(495, 47, '3200', '2025-05-18', NULL, '2025-01-18', 1),
(496, 47, '3200', '2025-05-19', NULL, '2025-01-18', 1),
(497, 47, '3200', '2025-05-20', NULL, '2025-01-18', 1),
(498, 47, '3200', '2025-05-21', NULL, '2025-01-18', 1),
(499, 47, '3200', '2025-05-22', NULL, '2025-01-18', 1),
(500, 47, '0', '2025-05-23', NULL, '2025-01-18', 1),
(501, 47, '0', '2025-05-24', NULL, '2025-01-18', 1),
(502, 47, '3200', '2025-05-25', NULL, '2025-01-18', 1),
(503, 47, '3200', '2025-05-26', NULL, '2025-01-18', 1),
(504, 47, '3200', '2025-05-27', NULL, '2025-01-18', 1),
(505, 47, '3200', '2025-05-28', NULL, '2025-01-18', 1),
(506, 47, '3200', '2025-05-29', NULL, '2025-01-18', 1),
(507, 47, '3200', '2025-05-30', NULL, '2025-01-18', 1),
(508, 47, '3200', '2025-05-31', NULL, '2025-01-18', 1),
(509, 47, '3200', '2025-06-01', NULL, '2025-01-18', 1),
(510, 47, '3200', '2025-06-02', NULL, '2025-01-18', 1),
(511, 47, '3200', '2025-06-03', NULL, '2025-01-18', 1),
(512, 47, '3200', '2025-06-04', NULL, '2025-01-18', 1),
(513, 47, '3200', '2025-06-05', NULL, '2025-01-18', 1),
(514, 47, '3200', '2025-06-06', NULL, '2025-01-18', 1),
(515, 47, '3200', '2025-06-07', NULL, '2025-01-18', 1),
(516, 47, '3200', '2025-06-08', NULL, '2025-01-18', 1),
(517, 47, '3200', '2025-06-09', NULL, '2025-01-18', 1),
(518, 47, '3200', '2025-06-10', NULL, '2025-01-18', 1),
(519, 47, '3200', '2025-06-11', NULL, '2025-01-18', 1),
(520, 47, '3200', '2025-06-12', NULL, '2025-01-18', 1),
(521, 47, '3200', '2025-06-13', NULL, '2025-01-18', 1),
(522, 47, '3200', '2025-06-14', NULL, '2025-01-18', 1),
(523, 47, '3200', '2025-06-15', NULL, '2025-01-18', 1),
(524, 47, '3200', '2025-06-16', NULL, '2025-01-18', 1),
(525, 47, '3200', '2025-06-17', NULL, '2025-01-18', 1),
(526, 47, '3200', '2025-06-18', NULL, '2025-01-18', 1),
(527, 47, '3200', '2025-06-19', NULL, '2025-01-18', 1),
(528, 47, '3200', '2025-06-20', NULL, '2025-01-18', 1),
(529, 47, '3200', '2025-06-21', NULL, '2025-01-18', 1),
(530, 47, '3200', '2025-06-22', NULL, '2025-01-18', 1),
(531, 47, '3200', '2025-06-23', NULL, '2025-01-18', 1),
(532, 47, '3200', '2025-06-24', NULL, '2025-01-18', 1),
(533, 47, '3200', '2025-06-25', NULL, '2025-01-18', 1),
(534, 47, '3200', '2025-06-26', NULL, '2025-01-18', 1),
(535, 47, '3200', '2025-06-27', NULL, '2025-01-18', 1),
(536, 47, '3200', '2025-06-28', NULL, '2025-01-18', 1),
(537, 47, '3200', '2025-06-29', NULL, '2025-01-18', 1),
(538, 47, '3200', '2025-06-30', NULL, '2025-01-18', 1),
(539, 47, '3200', '2025-07-01', NULL, '2025-01-18', 1),
(540, 47, '3200', '2025-07-02', NULL, '2025-01-18', 1),
(541, 47, '3200', '2025-07-03', NULL, '2025-01-18', 1),
(542, 47, '3200', '2025-07-04', NULL, '2025-01-18', 1),
(543, 47, '3200', '2025-07-05', NULL, '2025-01-18', 1),
(544, 47, '3200', '2025-07-06', NULL, '2025-01-18', 1),
(545, 47, '3200', '2025-07-07', NULL, '2025-01-18', 1),
(546, 47, '3200', '2025-07-08', NULL, '2025-01-18', 1),
(547, 47, '3200', '2025-07-09', NULL, '2025-01-18', 1),
(548, 47, '3200', '2025-07-10', NULL, '2025-01-18', 1),
(549, 47, '3200', '2025-07-11', NULL, '2025-01-18', 1),
(550, 47, '3200', '2025-07-12', NULL, '2025-01-18', 1),
(551, 47, '3200', '2025-07-13', NULL, '2025-01-18', 1),
(552, 47, '3200', '2025-07-14', NULL, '2025-01-18', 1),
(553, 47, '3200', '2025-07-15', NULL, '2025-01-18', 1),
(554, 47, '3200', '2025-07-16', NULL, '2025-01-18', 1),
(555, 47, '3200', '2025-07-17', NULL, '2025-01-18', 1),
(556, 47, '3200', '2025-07-18', NULL, '2025-01-18', 1),
(557, 47, '3200', '2025-07-19', NULL, '2025-01-18', 1),
(558, 47, '3200', '2025-07-20', NULL, '2025-01-18', 1),
(559, 47, '3200', '2025-07-21', NULL, '2025-01-18', 1),
(560, 47, '3200', '2025-07-22', NULL, '2025-01-18', 1),
(561, 47, '3200', '2025-07-23', NULL, '2025-01-18', 1),
(562, 47, '3200', '2025-07-24', NULL, '2025-01-18', 1),
(563, 47, '3200', '2025-07-25', NULL, '2025-01-18', 1),
(564, 47, '3200', '2025-07-26', NULL, '2025-01-18', 1),
(565, 47, '3200', '2025-07-27', NULL, '2025-01-18', 1),
(566, 47, '3200', '2025-07-28', NULL, '2025-01-18', 1),
(567, 47, '3200', '2025-07-29', NULL, '2025-01-18', 1),
(568, 47, '3200', '2025-07-30', NULL, '2025-01-18', 1),
(569, 114, '200', '2025-04-08', NULL, '2025-04-22', 1),
(570, 114, '600', '2025-04-10', NULL, '2025-04-22', 1),
(571, 114, '200', '2025-04-09', NULL, '2025-04-23', 1),
(572, 112, '3500', '2025-04-22', NULL, '2025-04-23', 1),
(573, 112, '3500', '2025-04-23', NULL, '2025-04-23', 1),
(574, 112, '3500', '2025-04-24', NULL, '2025-04-23', 1),
(575, 112, '3500', '2025-04-25', NULL, '2025-04-23', 1),
(576, 112, '3500', '2025-04-26', NULL, '2025-04-23', 1),
(577, 112, '3500', '2025-04-27', NULL, '2025-04-23', 1),
(578, 112, '3500', '2025-04-28', NULL, '2025-04-23', 1),
(579, 112, '3500', '2025-04-29', NULL, '2025-04-23', 1),
(580, 112, '3500', '2025-04-30', NULL, '2025-04-23', 1),
(581, 112, '3500', '2025-05-01', NULL, '2025-04-23', 1),
(582, 112, '3500', '2025-05-02', NULL, '2025-04-23', 1),
(583, 112, '3500', '2025-05-03', NULL, '2025-04-23', 1),
(584, 112, '3500', '2025-05-04', NULL, '2025-04-23', 1),
(585, 112, '3500', '2025-05-05', NULL, '2025-04-23', 1),
(586, 112, '3500', '2025-05-06', NULL, '2025-04-23', 1),
(587, 112, '3500', '2025-05-07', NULL, '2025-04-23', 1),
(588, 112, '3500', '2025-05-08', NULL, '2025-04-23', 1),
(589, 112, '3500', '2025-05-09', NULL, '2025-04-23', 1),
(590, 112, '3500', '2025-05-10', NULL, '2025-04-23', 1),
(591, 112, '3500', '2025-05-11', NULL, '2025-04-23', 1),
(592, 112, '3500', '2025-05-12', NULL, '2025-04-23', 1),
(593, 112, '3500', '2025-05-13', NULL, '2025-04-23', 1),
(594, 112, '3500', '2025-05-14', NULL, '2025-04-23', 1),
(595, 112, '3500', '2025-05-15', NULL, '2025-04-23', 1),
(596, 112, '3500', '2025-05-16', NULL, '2025-04-23', 1),
(597, 112, '3500', '2025-05-17', NULL, '2025-04-23', 1),
(598, 112, '3500', '2025-05-18', NULL, '2025-04-23', 1),
(599, 112, '3500', '2025-05-19', NULL, '2025-04-23', 1),
(600, 112, '3500', '2025-05-20', NULL, '2025-04-23', 1),
(601, 112, '3500', '2025-05-21', NULL, '2025-04-23', 1),
(602, 112, '3500', '2025-05-22', NULL, '2025-04-23', 1),
(603, 115, '1000', '2025-05-20', NULL, '2025-05-06', 1),
(604, 115, '2000', '2025-05-22', NULL, '2025-05-06', 1),
(605, 111, '9000', '2025-05-29', NULL, '2025-05-06', 1),
(606, 111, '2000', '2025-05-30', NULL, '2025-05-06', 1),
(607, 111, '4500', '2025-05-31', NULL, '2025-05-06', 1),
(608, 111, '3000', '2025-05-21', NULL, '2025-05-06', 1),
(609, 121, '3500', '2025-06-04', NULL, '2025-06-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_rating`
--

CREATE TABLE `tbl_car_rating` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `car_id` int DEFAULT NULL,
  `rating` varchar(255) DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `comments` text,
  `status` int DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chassis_trailer_type`
--

CREATE TABLE `tbl_chassis_trailer_type` (
  `id` int NOT NULL,
  `trailer_type` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chassis_trailer_type`
--

INSERT INTO `tbl_chassis_trailer_type` (`id`, `trailer_type`, `status`, `created`) VALUES
(1, '20 Footer', 1, NULL),
(2, '40 Footer', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_chat`
--

CREATE TABLE `tbl_chat` (
  `id` int NOT NULL,
  `sendor_id` int NOT NULL DEFAULT '0',
  `receiver_id` int DEFAULT '0',
  `message` text,
  `car_id` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `created` varchar(255) DEFAULT NULL,
  `dated` varchar(255) DEFAULT NULL,
  `times` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_chat`
--

INSERT INTO `tbl_chat` (`id`, `sendor_id`, `receiver_id`, `message`, `car_id`, `status`, `created`, `dated`, `times`) VALUES
(188, 161, 69, 'hello', 62, 1, '2025-02-27 12:25:02', '2025-02-27', '12:25:02'),
(189, 151, 69, 'hiii', 62, 1, '2025-02-27 12:27:46', '2025-02-27', '12:27:46'),
(191, 69, 151, 'text', 62, 1, '2025-02-27 12:48:37', '2025-02-27', '12:48:37'),
(193, 69, 151, 'text', 62, 1, '2025-02-27 12:50:57', '2025-02-27', '12:50:57'),
(194, 69, 151, 'text', 62, 1, '2025-02-27 12:51:42', '2025-02-27', '12:51:42'),
(195, 161, 69, 'hiii', 62, 1, '2025-02-27 13:12:32', '2025-02-27', '13:12:32'),
(196, 161, 69, 'hello ', 62, 1, '2025-02-27 13:13:35', '2025-02-27', '13:13:35'),
(197, 178, 47, 'hello ', 47, 1, '2025-02-28 02:27:56', '2025-02-28', '02:27:56'),
(198, 161, 69, 'hello sir', 62, 1, '2025-02-28 04:28:46', '2025-02-28', '04:28:46'),
(199, 151, 69, 'hello ', 62, 1, '2025-02-28 04:40:18', '2025-02-28', '04:40:18'),
(200, 151, 69, 'TARA ', 62, 1, '2025-02-28 04:40:57', '2025-02-28', '04:40:57'),
(201, 161, 69, 'tara taxi ', 62, 1, '2025-02-28 04:43:54', '2025-02-28', '04:43:54'),
(202, 161, 69, 'hiii', 62, 1, '2025-02-28 04:47:33', '2025-02-28', '04:47:33'),
(203, 62, 69, '161', 0, 1, '2025-02-28 04:53:33', '2025-02-28', '04:53:33'),
(204, 161, 69, 'gfffhj', 62, 1, '2025-02-28 04:57:09', '2025-02-28', '04:57:09'),
(205, 161, 69, 'hhhhhfhjf', 62, 1, '2025-02-28 05:37:45', '2025-02-28', '05:37:45'),
(206, 151, 69, 'vdhhdjd', 62, 1, '2025-02-28 05:43:23', '2025-02-28', '05:43:23'),
(207, 161, 69, 'hiiii', 62, 1, '2025-02-28 05:46:19', '2025-02-28', '05:46:19'),
(208, 161, 69, 'hiiii', 62, 1, '2025-02-28 05:47:36', '2025-02-28', '05:47:36'),
(209, 161, 69, 'hiiiii', 62, 1, '2025-02-28 05:50:08', '2025-02-28', '05:50:08'),
(210, 161, 69, 'cdcvdhd', 62, 1, '2025-02-28 05:52:56', '2025-02-28', '05:52:56'),
(211, 151, 69, 'hiii', 62, 1, '2025-02-28 05:56:28', '2025-02-28', '05:56:28'),
(212, 69, 151, 'text', 62, 1, '2025-02-28 05:58:17', '2025-02-28', '05:58:17'),
(213, 69, 161, 'text', 62, 1, '2025-02-28 06:00:16', '2025-02-28', '06:00:16'),
(214, 161, 69, 'hiiii', 62, 1, '2025-02-28 06:00:56', '2025-02-28', '06:00:56'),
(215, 69, 161, 'Hello', 62, 1, '2025-02-28 06:01:09', '2025-02-28', '06:01:09'),
(216, 69, 161, 'Hello', 62, 1, '2025-02-28 06:02:58', '2025-02-28', '06:02:58'),
(217, 161, 69, 'hiii', 62, 1, '2025-02-28 06:04:03', '2025-02-28', '06:04:03'),
(218, 69, 161, 'Hello', 62, 1, '2025-02-28 06:04:16', '2025-02-28', '06:04:16'),
(219, 0, 161, '62', 69, 1, '2025-02-28 06:06:36', '2025-02-28', '06:06:36'),
(220, 69, 161, 'gdgdgd', 62, 1, '2025-02-28 06:08:10', '2025-02-28', '06:08:10'),
(221, 69, 161, 'vxvxvxvx', 62, 1, '2025-02-28 06:08:46', '2025-02-28', '06:08:46'),
(222, 69, 161, 'bcbchchc', 62, 1, '2025-02-28 06:08:55', '2025-02-28', '06:08:55'),
(223, 69, 161, 'hello ', 62, 1, '2025-02-28 06:09:44', '2025-02-28', '06:09:44'),
(224, 69, 151, 'hiii', 62, 1, '2025-02-28 06:09:52', '2025-02-28', '06:09:52'),
(225, 161, 69, 'hiii', 62, 1, '2025-02-28 06:10:25', '2025-02-28', '06:10:25'),
(226, 161, 69, 'hello', 62, 1, '2025-02-28 06:10:32', '2025-02-28', '06:10:32'),
(227, 69, 161, 'dvdvvx', 62, 1, '2025-02-28 06:11:14', '2025-02-28', '06:11:14'),
(228, 69, 161, 'gjfjfjf', 62, 1, '2025-02-28 06:12:38', '2025-02-28', '06:12:38'),
(229, 69, 161, 'vdghx', 62, 1, '2025-02-28 06:12:42', '2025-02-28', '06:12:42'),
(230, 161, 69, 'hello tara', 62, 1, '2025-02-28 06:13:07', '2025-02-28', '06:13:07'),
(231, 69, 161, 'how are you', 62, 1, '2025-02-28 06:13:48', '2025-02-28', '06:13:48'),
(232, 161, 69, 'fine', 62, 1, '2025-02-28 06:14:19', '2025-02-28', '06:14:19'),
(233, 161, 69, 'and you', 62, 1, '2025-02-28 06:14:27', '2025-02-28', '06:14:27'),
(234, 69, 161, 'I am also fine', 62, 1, '2025-02-28 06:15:14', '2025-02-28', '06:15:14'),
(235, 155, 49, 'Test1', 50, 1, '2025-03-05 06:43:35', '2025-03-05', '06:43:35'),
(236, 155, 49, 'test2', 50, 1, '2025-03-05 07:00:30', '2025-03-05', '07:00:30'),
(237, 155, 49, 'hans2@gmail.com', 50, 1, '2025-03-09 13:18:40', '2025-03-09', '13:18:40'),
(238, 155, 49, 'hans2@gmail.com', 50, 1, '2025-03-09 13:18:57', '2025-03-09', '13:18:57'),
(239, 47, 47, 'hans@gmail.com', 48, 1, '2025-03-11 10:51:56', '2025-03-11', '10:51:56'),
(240, 47, 47, 'hans@gmail.com', 48, 1, '2025-03-11 10:52:12', '2025-03-11', '10:52:12'),
(241, 47, 47, 'hans@gmail.com', 47, 1, '2025-03-12 10:16:05', '2025-03-12', '10:16:05'),
(242, 47, 47, 'gdxsol', 47, 1, '2025-03-12 10:16:13', '2025-03-12', '10:16:13'),
(243, 47, 47, 'ewlwqh', 47, 1, '2025-03-12 10:26:05', '2025-03-12', '10:26:05'),
(244, 155, 49, 'tpkmbw', 50, 1, '2025-03-15 20:11:18', '2025-03-15', '20:11:18'),
(245, 155, 47, 'hans2@gmail.com', 47, 1, '2025-03-15 20:16:37', '2025-03-15', '20:16:37'),
(246, 155, 47, 'hans2@gmail.com', 47, 1, '2025-03-15 20:16:51', '2025-03-15', '20:16:51'),
(247, 47, 47, 'hans@gmail.com', 47, 1, '2025-04-12 18:30:42', '2025-04-12', '18:30:42'),
(248, 47, 47, 'effzel', 47, 1, '2025-04-12 18:30:51', '2025-04-12', '18:30:51'),
(249, 269, 47, 'hello ', 47, 1, '2025-04-25 17:29:06', '2025-04-25', '17:29:06'),
(250, 269, 47, 'hello ', 47, 1, '2025-04-25 17:29:09', '2025-04-25', '17:29:09'),
(251, 269, 47, 'hello ', 47, 1, '2025-04-25 17:29:15', '2025-04-25', '17:29:15'),
(252, 269, 69, 'hey', 63, 1, '2025-04-25 17:30:00', '2025-04-25', '17:30:00'),
(253, 269, 69, 'hey', 63, 1, '2025-04-25 17:30:03', '2025-04-25', '17:30:03'),
(254, 269, 69, 'hello ', 63, 1, '2025-04-25 17:30:21', '2025-04-25', '17:30:21'),
(255, 269, 69, 'hey ', 62, 1, '2025-04-25 18:16:42', '2025-04-25', '18:16:42'),
(256, 161, 127, 'hello ', 116, 1, '2025-04-28 14:23:09', '2025-04-28', '14:23:09'),
(257, 127, 161, 'hello ', 116, 1, '2025-04-28 14:23:26', '2025-04-28', '14:23:26'),
(258, 161, 69, 'hiii', 62, 1, '2025-05-13 20:09:15', '2025-05-13', '20:09:15'),
(259, 261, 231, 'g', 111, 1, '2025-05-21 18:56:56', '2025-05-21', '18:56:56'),
(260, 231, 231, 'hauwbsva', 114, 1, '2025-05-21 19:07:31', '2025-05-21', '19:07:31'),
(261, 261, 231, 'Hello', 122, 1, '2025-06-17 14:56:14', '2025-06-17', '14:56:14'),
(262, 261, 231, 'Hello', 112, 1, '2025-06-27 15:39:54', '2025-06-27', '15:39:54'),
(263, 261, 231, 'ggvdzaveaed', 112, 1, '2025-06-27 15:40:36', '2025-06-27', '15:40:36'),
(264, 261, 231, 'Gregory', 112, 1, '2025-06-27 17:36:31', '2025-06-27', '17:36:31'),
(265, 261, 231, 'Faqfefd', 112, 1, '2025-06-27 17:51:50', '2025-06-27', '17:51:50'),
(266, 261, 231, 'Dfsfsdf', 112, 1, '2025-06-27 17:53:43', '2025-06-27', '17:53:43'),
(267, 261, 231, 'Refer', 112, 1, '2025-06-27 17:55:46', '2025-06-27', '17:55:46'),
(268, 261, 231, 'He hut', 112, 1, '2025-06-27 17:56:11', '2025-06-27', '17:56:11'),
(269, 261, 231, 'Rascal', 112, 1, '2025-06-27 18:00:21', '2025-06-27', '18:00:21'),
(270, 261, 231, 'Greve', 112, 1, '2025-06-27 18:01:42', '2025-06-27', '18:01:42'),
(271, 261, 231, 'Greg we’ve', 112, 1, '2025-06-27 18:03:08', '2025-06-27', '18:03:08'),
(272, 261, 231, 'Fewwef', 112, 1, '2025-06-27 18:12:19', '2025-06-27', '18:12:19'),
(273, 261, 231, 'Fqfwef', 112, 1, '2025-06-27 18:14:26', '2025-06-27', '18:14:26'),
(274, 261, 231, 'Dad', 112, 1, '2025-06-27 18:14:33', '2025-06-27', '18:14:33'),
(275, 261, 231, 'Dead', 112, 1, '2025-06-27 18:16:28', '2025-06-27', '18:16:28'),
(276, 47, 47, 'tpkmbw', 47, 1, '2025-06-30 00:18:38', '2025-06-30', '00:18:38'),
(277, 261, 231, 'Fssdfs', 122, 1, '2025-07-02 14:56:56', '2025-07-02', '14:56:56'),
(278, 261, 231, 'Ewe', 122, 1, '2025-07-02 15:21:51', '2025-07-02', '15:21:51'),
(279, 261, 231, 'Tweet', 122, 1, '2025-07-02 15:27:38', '2025-07-02', '15:27:38'),
(280, 261, 231, 'R3r3', 122, 1, '2025-07-02 15:27:41', '2025-07-02', '15:27:41'),
(281, 261, 231, 'Dsdsd', 122, 1, '2025-07-02 15:28:45', '2025-07-02', '15:28:45'),
(282, 261, 231, 'Dvsvs', 122, 1, '2025-07-02 15:47:18', '2025-07-02', '15:47:18'),
(283, 261, 231, 'E2E', 122, 1, '2025-07-02 15:47:43', '2025-07-02', '15:47:43'),
(284, 261, 231, 'Wewew', 122, 1, '2025-07-02 15:47:46', '2025-07-02', '15:47:46'),
(285, 315, 231, 'Hello', 112, 1, '2025-07-02 16:09:13', '2025-07-02', '16:09:13'),
(286, 315, 231, 'Hello', 122, 1, '2025-07-02 16:19:41', '2025-07-02', '16:19:41'),
(287, 315, 231, 'Hello', 122, 1, '2025-07-02 16:21:32', '2025-07-02', '16:21:32'),
(288, 231, 231, 'Hello', 122, 1, '2025-07-02 16:27:55', '2025-07-02', '16:27:55'),
(289, 231, 231, 'Heldasdalo', 122, 1, '2025-07-02 16:29:50', '2025-07-02', '16:29:50'),
(290, 231, NULL, 'Heldasdalo', 261, 1, '2025-07-02 16:35:08', '2025-07-02', '16:35:08'),
(291, 231, 231, 'gevvekke', 122, 1, '2025-07-02 16:44:44', '2025-07-02', '16:44:44'),
(292, 261, 231, 'Fdfdf', 122, 1, '2025-07-02 17:15:43', '2025-07-02', '17:15:43'),
(293, 261, 231, 'Is the air conditioning working well?', 122, 1, '2025-07-02 17:54:34', '2025-07-02', '17:54:34'),
(294, 231, 231, 'Yes. The AC is very cold and works perfectly', 122, 1, '2025-07-02 17:55:07', '2025-07-02', '17:55:07'),
(295, 261, 231, 'What about the mileage?', 122, 1, '2025-07-02 17:55:44', '2025-07-02', '17:55:44'),
(296, 231, 231, 'Current mileage is around 42,000km. Very fuel-efficient', 122, 1, '2025-07-02 17:56:43', '2025-07-02', '17:56:43'),
(297, 261, 231, 'Great. How’s the overall condition of the car? Any issues I should know about?', 122, 1, '2025-07-02 17:57:33', '2025-07-02', '17:57:33'),
(298, 231, 231, 'The car is in excellent condition, no mechanical issues, smooth driving, and well-maintained.', 122, 1, '2025-07-02 17:58:20', '2025-07-02', '17:58:20'),
(299, 231, 231, 'fccdd', 112, 1, '2025-07-02 18:06:53', '2025-07-02', '18:06:53'),
(300, 261, 231, 'Okay', 122, 1, '2025-07-03 15:22:57', '2025-07-03', '15:22:57'),
(301, 231, 231, 'Csca', 112, 1, '2025-07-03 16:31:38', '2025-07-03', '16:31:38'),
(302, 261, 231, 'bdjsbsv', 112, 1, '2025-07-03 16:44:50', '2025-07-03', '16:44:50'),
(303, 261, 231, ' scaasvf', 112, 1, '2025-07-03 16:45:59', '2025-07-03', '16:45:59'),
(304, 309, 309, 'Hello', 121, 1, '2025-07-03 17:29:57', '2025-07-03', '17:29:57'),
(305, 261, 309, 'Hello juan', 121, 1, '2025-07-03 17:30:29', '2025-07-03', '17:30:29'),
(306, 309, 309, 'Dasda', 121, 1, '2025-07-03 17:38:20', '2025-07-03', '17:38:20'),
(307, 309, 309, 'Fewgeg', 121, 1, '2025-07-03 17:40:11', '2025-07-03', '17:40:11'),
(308, 309, 309, 'hahahahah', 121, 1, '2025-07-03 17:42:03', '2025-07-03', '17:42:03'),
(309, 309, 309, 'Hello Karl Joshua', 121, 1, '2025-07-03 17:42:49', '2025-07-03', '17:42:49'),
(310, 231, 231, 'hello', 112, 1, '2025-07-04 12:02:09', '2025-07-04', '12:02:09'),
(311, 261, 231, 'Ngfnfgn', 112, 1, '2025-07-04 12:02:32', '2025-07-04', '12:02:32'),
(312, 231, 231, 'vcgbvd', 112, 1, '2025-07-04 12:02:53', '2025-07-04', '12:02:53'),
(313, 261, 231, 'Fiji', 112, 1, '2025-07-04 12:04:23', '2025-07-04', '12:04:23'),
(314, 231, 231, 'bdsvs', 112, 1, '2025-07-04 12:04:41', '2025-07-04', '12:04:41'),
(315, 261, 231, 'hello', 112, 1, '2025-07-04 12:08:53', '2025-07-04', '12:08:53'),
(316, 261, 231, 'hi', 112, 1, '2025-07-04 12:08:57', '2025-07-04', '12:08:57'),
(317, 231, 231, 'Gaffs', 112, 1, '2025-07-04 12:09:05', '2025-07-04', '12:09:05'),
(318, 261, 231, 'bs sbs', 112, 1, '2025-07-04 12:14:14', '2025-07-04', '12:14:14'),
(319, 261, 231, 'bs ehei', 112, 1, '2025-07-04 12:14:19', '2025-07-04', '12:14:19'),
(320, 261, 231, 'vs', 112, 1, '2025-07-04 12:14:26', '2025-07-04', '12:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int NOT NULL,
  `country_id` int NOT NULL DEFAULT '0',
  `state_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `place_id` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `map_url` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `modified_by` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `country_id`, `state_id`, `name`, `place_id`, `lat`, `lng`, `map_url`, `status`, `created`, `created_by`, `modified_by`, `modified`) VALUES
(1, 5, 3, 'Indore', 'ChIJ2w1BG638YjkR9EBiNdrEbgk', '22.7195687', '75.8577258', 'https://maps.google.com/?q=Indore,+Madhya+Pradesh,+India&ftid=0x3962fcad1b410ddb:0x96ec4da356240f4', 1, '2024-05-10', '1', '1', '2024-05-10'),
(2, 6, 5, 'Caloocan', 'ChIJXxuEGbWxlzMRGi0EJeJw5wU', '14.7565784', '121.0449768', 'https://maps.google.com/?q=Caloocan,+Metro+Manila,+Philippines&ftid=0x3397b1b519841b5f:0x5e770e225042d1a', 1, '2024-06-13', '1', '1', '2024-06-13'),
(3, 6, 5, 'Las PiÃ±as', 'ChIJbyuXNQjOlzMRS3eB0pUy8w8', '14.444546', '120.9938736', 'https://maps.google.com/?q=Las+Pi%C3%B1as,+Metro+Manila,+Philippines&ftid=0x3397ce0835972b6f:0xff33295d281774b', 1, '2024-06-13', '1', '1', '2024-06-13'),
(4, 6, 5, 'Makati', 'ChIJAe2gZALJlzMRzsoweNVuBis', '14.554729', '121.0244452', 'https://maps.google.com/?q=Makati,+Metro+Manila,+Philippines&ftid=0x3397c90264a0ed01:0x2b066ed57830cace', 1, '2024-06-13', '1', '1', '2024-06-13'),
(5, 6, 5, 'Malabon', 'ChIJbTDTbGu0lzMRevHRY44dJSA', '14.6680747', '120.9658454', 'https://maps.google.com/?q=Malabon,+Metro+Manila,+Philippines&ftid=0x3397b46b6cd3306d:0x20251d8e63d1f17a', 1, '2024-06-13', '1', '1', '2024-06-13'),
(6, 6, 5, 'Mandaluyong', 'ChIJeZt7xzXIlzMR-DfSuchHSdw', '14.5794443', '121.0359174', 'https://maps.google.com/?q=Mandaluyong,+Metro+Manila,+Philippines&ftid=0x3397c835c77b9b79:0xdc4947c8b9d237f8', 1, '2024-06-13', '1', '1', '2024-06-13'),
(7, 6, 5, 'Manila', 'ChIJi8MeVwPKlzMRH8FpEHXV0Wk', '14.5995124', '120.9842195', 'https://maps.google.com/?q=Manila,+Metro+Manila,+Philippines&ftid=0x3397ca03571ec38b:0x69d1d5751069c11f', 1, '2024-06-13', '1', '1', '2024-06-13'),
(8, 6, 5, 'Marikina', 'ChIJ-QB6d6K5lzMRxi-hKfTINm0', '14.65073', '121.1028546', 'https://maps.google.com/?q=Marikina,+Metro+Manila,+Philippines&ftid=0x3397b9a2777a00f9:0x6d36c8f429a12fc6', 1, '2024-06-13', '1', '1', '2024-06-13'),
(9, 6, 5, 'Muntinlupa', 'ChIJReOxxyzQlzMRE_DafOS-_VE', '14.4125897', '121.0343247', 'https://maps.google.com/?q=Muntinlupa,+Metro+Manila,+Philippines&ftid=0x3397d02cc7b1e345:0x51fdbee47cdaf013', 1, '2024-06-13', '1', '1', '2024-06-13'),
(10, 6, 5, 'Navotas', 'ChIJL7wYP7C1lzMRE5I5ETs70mU', '14.6732182', '120.9350106', 'https://maps.google.com/?q=Navotas,+Metro+Manila,+Philippines&ftid=0x3397b5b03f18bc2f:0x65d23b3b11399213', 1, '2024-06-13', '1', '1', '2024-06-13'),
(11, 6, 5, 'ParaÃ±aque', 'ChIJCV0X-V3OlzMR5UIoC7sbBC0', '14.4793208', '121.0197486', 'https://maps.google.com/?q=Para%C3%B1aque,+Metro+Manila,+Philippines&ftid=0x3397ce5df9175d09:0x2d041bbb0b2842e5', 1, '2024-06-13', '1', '1', '2024-06-13'),
(12, 6, 5, 'Pasay', 'ChIJbeLv-EnJlzMRYGYlOUfvTJU', '14.5376736', '121.000815', 'https://maps.google.com/?q=Pasay,+Metro+Manila,+Philippines&ftid=0x3397c949f8efe26d:0x954cef4739256660', 1, '2024-06-13', '1', '1', '2024-06-13'),
(13, 6, 5, 'Pasig', 'ChIJT7L3iNzHlzMRif00SysrWUo', '14.5736192', '121.0784984', 'https://maps.google.com/?q=Pasig,+Metro+Manila,+Philippines&ftid=0x3397c7dc88f7b24f:0x4a592b2b4b34fd89', 1, '2024-06-13', '1', '1', '2024-06-13'),
(14, 6, 5, 'Pateros', 'ChIJB9wnuJrIlzMR0SeifBqaYMw', '14.5454321', '121.0686773', 'https://maps.google.com/?q=Pateros,+Metro+Manila,+Philippines&ftid=0x3397c89ab827dc07:0xcc609a1a7ca227d1', 1, '2024-06-13', '1', '1', '2024-06-13'),
(15, 6, 5, 'Quezon City', 'ChIJdXPvQgm6lzMRQD0I_tkymko', '14.6760413', '121.0437003', 'https://maps.google.com/?q=Quezon+City,+Metro+Manila,+Philippines&ftid=0x3397ba0942ef7375:0x4a9a32d9fe083d40', 1, '2024-06-13', '1', '1', '2024-06-13'),
(16, 6, 5, 'San Juan', 'ChIJcRVe-CnIlzMRNPQOOXNw7ek', '14.6019874', '121.0354596', 'https://maps.google.com/?q=San+Juan,+Metro+Manila,+Philippines&ftid=0x3397c829f85e1571:0xe9ed7073390ef434', 1, '2024-06-13', '1', '1', '2024-06-13'),
(17, 6, 5, 'Taguig', 'ChIJATD-VErPlzMRrdKYqfB6ri8', '14.5176184', '121.0508645', 'https://maps.google.com/?q=Taguig,+Metro+Manila,+Philippines&ftid=0x3397cf4a54fe3001:0x2fae7af0a998d2ad', 1, '2024-06-13', '1', '1', '2024-06-13'),
(18, 6, 5, 'Valenzuela', 'ChIJa2ZSw_KzlzMRWH15-i2Nrwk', '14.7010556', '120.9830225', 'https://maps.google.com/?q=Valenzuela,+Metro+Manila,+Philippines&ftid=0x3397b3f2c352666b:0x9af8d2dfa797d58', 1, '2024-06-13', '1', '1', '2024-06-13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_color`
--

CREATE TABLE `tbl_color` (
  `id` int NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `hexcode` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created` varchar(255) DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '1',
  `modified` varchar(255) DEFAULT NULL,
  `modified_by` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_color`
--

INSERT INTO `tbl_color` (`id`, `name`, `hexcode`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Yellow', '#e9de16', 1, '2024-05-10', 1, '2024-05-10', 1),
(2, 'Green', '#1cba26', 1, '2024-05-10', 1, '2024-05-10', 1),
(3, 'Blue', '#463370', 1, '2024-05-10', 1, '2024-05-10', 1),
(4, 'Red', '#f90b0b', 1, '2024-05-10', 1, '2024-05-10', 1),
(5, 'Pink', '#ff8fdb', 1, '2024-05-10', 1, '2024-05-10', 1),
(6, 'White', '#ffffff', 1, '2024-05-10', 1, '2024-05-10', 1),
(7, 'Black', '#000000', 1, '2024-05-10', 1, '2024-05-10', 1),
(8, 'Grey', '#d1d1d1', 1, '2024-05-10', 1, '2024-05-10', 1),
(9, 'Silver', '#f1eaea', 1, '2024-05-10', 1, '2024-05-10', 1),
(10, 'Purple', '#b72489', 1, '2024-05-10', 1, '2024-05-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int NOT NULL,
  `country_name` varchar(255) DEFAULT NULL,
  `country_code` varchar(255) DEFAULT NULL,
  `country_mobile_code` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '1',
  `modified` varchar(255) DEFAULT NULL,
  `modified_by` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `country_name`, `country_code`, `country_mobile_code`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(5, 'India', 'IN', '+91', 1, '2024-04-29', 1, '2024-04-29', 1),
(6, 'Philippines', 'PH', '+63', 1, '2024-04-29', 1, '2024-04-29', 1),
(7, 'United States', 'US', '+1', 1, '2024-04-29', 1, '2024-04-29', 1),
(8, 'South Africa', 'ZA', '+27', 1, '2024-04-29', 1, '2024-04-29', 1),
(9, 'United Kingdom', 'GB', '+44', 1, '2024-04-29', 1, '2024-04-29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fair_management`
--

CREATE TABLE `tbl_fair_management` (
  `id` int NOT NULL,
  `diesel_price` varchar(255) DEFAULT NULL,
  `total_km` varchar(255) DEFAULT NULL,
  `types` varchar(255) DEFAULT NULL,
  `labor_cost_charge` varchar(255) DEFAULT NULL,
  `batteries_charge` varchar(255) DEFAULT NULL,
  `depreciation_charge` varchar(255) DEFAULT NULL,
  `interest_expense_charge` varchar(255) DEFAULT NULL,
  `repairs_and_maintenance_charge` varchar(255) DEFAULT NULL,
  `registration_and_insurance_charge` varchar(255) DEFAULT NULL,
  `comminication_equipments_charge` varchar(255) DEFAULT NULL,
  `other_investments_charge` varchar(255) DEFAULT NULL,
  `markup_charge` varchar(255) DEFAULT NULL,
  `vat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_fair_management`
--

INSERT INTO `tbl_fair_management` (`id`, `diesel_price`, `total_km`, `types`, `labor_cost_charge`, `batteries_charge`, `depreciation_charge`, `interest_expense_charge`, `repairs_and_maintenance_charge`, `registration_and_insurance_charge`, `comminication_equipments_charge`, `other_investments_charge`, `markup_charge`, `vat`) VALUES
(1, '55', '1', '1', '2285.56', '44.8875', '2861.50', '1591.02', '385.00', '102.51', '73.30', '37.83', '30', '12'),
(2, '55', '1', '2', '2285.56', '44.8875', '3694.83', '1935.40', '468.33', '102.51', '73.30', '37.83', '30', '12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_find_driver`
--

CREATE TABLE `tbl_find_driver` (
  `id` int NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `driver_id` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL DEFAULT '0',
  `pickup_port` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `pick_up_date_time` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `is_confirm` int NOT NULL DEFAULT '0',
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_find_driver`
--

INSERT INTO `tbl_find_driver` (`id`, `order_id`, `driver_id`, `user_id`, `pickup_port`, `delivery_address`, `total_amount`, `pick_up_date_time`, `status`, `is_confirm`, `created`) VALUES
(386, 'Job order 20250507316', 101, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-07', 0, 1, '2025-05-07'),
(387, 'Job order 20250507316', 116, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-07', 0, 1, '2025-05-07'),
(388, 'Job order 20250507316', 170, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-07', 1, 1, '2025-05-07'),
(389, 'Job order 20250507316', 276, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-07', 0, 1, '2025-05-07'),
(390, 'Job order 20250508218', 101, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-08', 0, 0, '2025-05-08'),
(391, 'Job order 20250508218', 116, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-08', 0, 0, '2025-05-08'),
(392, 'Job order 20250508218', 170, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-08', 0, 0, '2025-05-08'),
(393, 'Job order 20250508218', 276, 161, 'Manila', 'Manila, Metro Manila, Philippines', '11196.61', '2025-05-08', 0, 0, '2025-05-08'),
(394, 'Job order 20250528785', 101, 163, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-05-28'),
(395, 'Job order 20250528785', 116, 163, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-05-28'),
(396, 'Job order 20250528785', 170, 163, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-05-28'),
(397, 'Job order 20250528785', 276, 163, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-05-28'),
(398, 'Job order 20250617390', 101, 261, 'Manila', 'smx convention center manila', '254000', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(399, 'Job order 20250617390', 116, 261, 'Manila', 'smx convention center manila', '254000', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(400, 'Job order 20250617390', 170, 261, 'Manila', 'smx convention center manila', '254000', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(401, 'Job order 20250617390', 276, 261, 'Manila', 'smx convention center manila', '254000', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(402, 'Job order 20250617475', 101, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(403, 'Job order 20250617475', 116, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(404, 'Job order 20250617475', 170, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(405, 'Job order 20250617475', 276, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(406, 'Job order 20250617116', 101, 261, 'Manila', 'smx convention center manila', '11616.92', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(407, 'Job order 20250617116', 116, 261, 'Manila', 'smx convention center manila', '11616.92', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(408, 'Job order 20250617116', 170, 261, 'Manila', 'smx convention center manila', '11616.92', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(409, 'Job order 20250617116', 276, 261, 'Manila', 'smx convention center manila', '11616.92', '2024-12-28 16:20', 0, 0, '2025-06-17'),
(410, 'Job order 20250617415', 101, 261, 'Manila', 'smx convention center manila', '150025.32', '2025-06-17 16:20', 0, 0, '2025-06-17'),
(411, 'Job order 20250617415', 116, 261, 'Manila', 'smx convention center manila', '150025.32', '2025-06-17 16:20', 0, 0, '2025-06-17'),
(412, 'Job order 20250617415', 170, 261, 'Manila', 'smx convention center manila', '150025.32', '2025-06-17 16:20', 0, 0, '2025-06-17'),
(413, 'Job order 20250617415', 276, 261, 'Manila', 'smx convention center manila', '150025.32', '2025-06-17 16:20', 0, 0, '2025-06-17'),
(414, 'Job order 20250618034', 101, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(415, 'Job order 20250618034', 116, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(416, 'Job order 20250618034', 170, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(417, 'Job order 20250618034', 276, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(418, 'Job order 20250618034', 315, 261, 'Manila', 'smx convention center manila', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(419, 'Job order 20250618134', 101, 261, 'Manila', 'Estrellas ham', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(420, 'Job order 20250618134', 116, 261, 'Manila', 'Estrellas ham', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(421, 'Job order 20250618134', 170, 261, 'Manila', 'Estrellas ham', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(422, 'Job order 20250618134', 276, 261, 'Manila', 'Estrellas ham', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(423, 'Job order 20250618134', 315, 261, 'Manila', 'Estrellas ham', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(424, 'Job order 20250618608', 101, 261, 'Manila', 'Calatagan', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(425, 'Job order 20250618608', 116, 261, 'Manila', 'Calatagan', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(426, 'Job order 20250618608', 170, 261, 'Manila', 'Calatagan', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(427, 'Job order 20250618608', 276, 261, 'Manila', 'Calatagan', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(428, 'Job order 20250618608', 315, 261, 'Manila', 'Calatagan', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(429, 'Job order 20250618025', 101, 261, 'Manila', 'Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(430, 'Job order 20250618025', 116, 261, 'Manila', 'Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(431, 'Job order 20250618025', 170, 261, 'Manila', 'Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(432, 'Job order 20250618025', 276, 261, 'Manila', 'Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(433, 'Job order 20250618025', 315, 261, 'Manila', 'Calatagan Batangas', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(434, 'Job order 20250618570', 101, 261, 'Manila', 'Brgy 1. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(435, 'Job order 20250618570', 116, 261, 'Manila', 'Brgy 1. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(436, 'Job order 20250618570', 170, 261, 'Manila', 'Brgy 1. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(437, 'Job order 20250618570', 276, 261, 'Manila', 'Brgy 1. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(438, 'Job order 20250618570', 315, 261, 'Manila', 'Brgy 1. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(439, 'Job order 20250618099', 101, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(440, 'Job order 20250618099', 116, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(441, 'Job order 20250618099', 170, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(442, 'Job order 20250618099', 276, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(443, 'Job order 20250618099', 315, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(444, 'Job order 20250618898', 101, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(445, 'Job order 20250618898', 116, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(446, 'Job order 20250618898', 170, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(447, 'Job order 20250618898', 276, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(448, 'Job order 20250618898', 315, 261, 'Manila', 'Brgy 3. Calatagan Batangas', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(449, 'Job order 20250618563', 101, 261, 'Manila', 'Bucal Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(450, 'Job order 20250618563', 116, 261, 'Manila', 'Bucal Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(451, 'Job order 20250618563', 170, 261, 'Manila', 'Bucal Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(452, 'Job order 20250618563', 276, 261, 'Manila', 'Bucal Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(453, 'Job order 20250618563', 315, 261, 'Manila', 'Bucal Batangas', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(454, 'Job order 20250618301', 101, 261, 'Manila', 'Balayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(455, 'Job order 20250618301', 116, 261, 'Manila', 'Balayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(456, 'Job order 20250618301', 170, 261, 'Manila', 'Balayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(457, 'Job order 20250618301', 276, 261, 'Manila', 'Balayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(458, 'Job order 20250618301', 315, 261, 'Manila', 'Balayan Batangas', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(459, 'Job order 20250618580', 101, 261, 'Manila', 'Bayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(460, 'Job order 20250618580', 116, 261, 'Manila', 'Bayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(461, 'Job order 20250618580', 170, 261, 'Manila', 'Bayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(462, 'Job order 20250618580', 276, 261, 'Manila', 'Bayan Batangas', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(463, 'Job order 20250618580', 315, 261, 'Manila', 'Bayan Batangas', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(464, 'Job order 20250618310', 101, 261, 'Manila', 'Upper Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(465, 'Job order 20250618310', 116, 261, 'Manila', 'Upper Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(466, 'Job order 20250618310', 170, 261, 'Manila', 'Upper Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(467, 'Job order 20250618310', 276, 261, 'Manila', 'Upper Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 1, '2025-06-18'),
(468, 'Job order 20250618310', 315, 261, 'Manila', 'Upper Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 1, 1, '2025-06-18'),
(469, 'Job order 20250619573', 101, 261, 'Manila', 'Lower Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-19'),
(470, 'Job order 20250619573', 116, 261, 'Manila', 'Lower Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-19'),
(471, 'Job order 20250619573', 170, 261, 'Manila', 'Lower Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-19'),
(472, 'Job order 20250619573', 276, 261, 'Manila', 'Lower Bicutan, 7-eleven', '150025.32', '2024-12-28 16:20', 0, 0, '2025-06-19'),
(473, 'Job order 20250619771', 101, 261, 'Manila', 'Lower Bicutan, Taguig', '1500225.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(474, 'Job order 20250619771', 116, 261, 'Manila', 'Lower Bicutan, Taguig', '1500225.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(475, 'Job order 20250619771', 170, 261, 'Manila', 'Lower Bicutan, Taguig', '1500225.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(476, 'Job order 20250619771', 276, 261, 'Manila', 'Lower Bicutan, Taguig', '1500225.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(477, 'Job order 20250619771', 315, 261, 'Manila', 'Lower Bicutan, Taguig', '1500225.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(478, 'Job order 20250619362', 101, 261, 'Manila', 'Lower Bicutan, Taguig', '15005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(479, 'Job order 20250619362', 116, 261, 'Manila', 'Lower Bicutan, Taguig', '15005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(480, 'Job order 20250619362', 170, 261, 'Manila', 'Lower Bicutan, Taguig', '15005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(481, 'Job order 20250619362', 276, 261, 'Manila', 'Lower Bicutan, Taguig', '15005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(482, 'Job order 20250619362', 315, 261, 'Manila', 'Lower Bicutan, Taguig', '15005.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(483, 'Job order 20250619586', 101, 261, 'Manila', 'Lower Bicutan, Taguig', '16005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(484, 'Job order 20250619586', 116, 261, 'Manila', 'Lower Bicutan, Taguig', '16005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(485, 'Job order 20250619586', 170, 261, 'Manila', 'Lower Bicutan, Taguig', '16005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(486, 'Job order 20250619586', 276, 261, 'Manila', 'Lower Bicutan, Taguig', '16005.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(487, 'Job order 20250619586', 315, 261, 'Manila', 'Lower Bicutan, Taguig', '16005.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(488, 'Job order 20250619927', 101, 261, 'Manila', 'Lower Bicutan, 7-eleven', '250025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(489, 'Job order 20250619927', 116, 261, 'Manila', 'Lower Bicutan, 7-eleven', '250025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(490, 'Job order 20250619927', 170, 261, 'Manila', 'Lower Bicutan, 7-eleven', '250025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(491, 'Job order 20250619927', 276, 261, 'Manila', 'Lower Bicutan, 7-eleven', '250025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(492, 'Job order 20250619927', 315, 261, 'Manila', 'Lower Bicutan, 7-eleven', '250025.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(493, 'Job order 20250619997', 101, 261, 'Manila', 'Lower Bicutan, 7-eleven', '50025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(494, 'Job order 20250619997', 116, 261, 'Manila', 'Lower Bicutan, 7-eleven', '50025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(495, 'Job order 20250619997', 170, 261, 'Manila', 'Lower Bicutan, 7-eleven', '50025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(496, 'Job order 20250619997', 276, 261, 'Manila', 'Lower Bicutan, 7-eleven', '50025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(497, 'Job order 20250619997', 315, 261, 'Manila', 'Lower Bicutan, 7-eleven', '50025.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(498, 'Job order 20250619227', 101, 261, 'Manila', 'Upper Bicutan, Taguih', '20025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(499, 'Job order 20250619227', 116, 261, 'Manila', 'Upper Bicutan, Taguih', '20025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(500, 'Job order 20250619227', 170, 261, 'Manila', 'Upper Bicutan, Taguih', '20025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(501, 'Job order 20250619227', 276, 261, 'Manila', 'Upper Bicutan, Taguih', '20025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(502, 'Job order 20250619227', 315, 261, 'Manila', 'Upper Bicutan, Taguih', '20025.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(503, 'Job order 20250619721', 101, 261, 'Manila', 'Upper Bicutan, Taguig', '120025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(504, 'Job order 20250619721', 116, 261, 'Manila', 'Upper Bicutan, Taguig', '120025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(505, 'Job order 20250619721', 170, 261, 'Manila', 'Upper Bicutan, Taguig', '120025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(506, 'Job order 20250619721', 276, 261, 'Manila', 'Upper Bicutan, Taguig', '120025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(507, 'Job order 20250619721', 315, 261, 'Manila', 'Upper Bicutan, Taguig', '120025.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(508, 'Job order 20250619095', 101, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(509, 'Job order 20250619095', 116, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(510, 'Job order 20250619095', 170, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(511, 'Job order 20250619095', 276, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-19'),
(512, 'Job order 20250619095', 315, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 1, 1, '2025-06-19'),
(513, 'Job order 20250620087', 101, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-20'),
(514, 'Job order 20250620087', 116, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-20'),
(515, 'Job order 20250620087', 170, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-20'),
(516, 'Job order 20250620087', 276, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 0, 1, '2025-06-20'),
(517, 'Job order 20250620087', 315, 261, 'Manila', 'Upper Bicutan, Taguig ST', '100025.32', '2024-12-28 16:20', 1, 1, '2025-06-20'),
(518, 'Job order 20250623269', 101, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 16:32', 0, 1, '2025-06-23'),
(519, 'Job order 20250623269', 116, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 16:32', 0, 1, '2025-06-23'),
(520, 'Job order 20250623269', 170, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 16:32', 0, 1, '2025-06-23'),
(521, 'Job order 20250623269', 276, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 16:32', 0, 1, '2025-06-23'),
(522, 'Job order 20250623269', 315, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 16:32', 1, 1, '2025-06-23'),
(523, 'Job order 20250623734', 101, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 16:51', 0, 1, '2025-06-23'),
(524, 'Job order 20250623734', 116, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 16:51', 0, 1, '2025-06-23'),
(525, 'Job order 20250623734', 170, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 16:51', 0, 1, '2025-06-23'),
(526, 'Job order 20250623734', 276, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 16:51', 0, 1, '2025-06-23'),
(527, 'Job order 20250623734', 315, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 16:51', 1, 1, '2025-06-23'),
(528, 'Job order 20250623986', 101, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 17:27', 0, 1, '2025-06-23'),
(529, 'Job order 20250623986', 116, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 17:27', 0, 1, '2025-06-23'),
(530, 'Job order 20250623986', 170, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 17:27', 0, 1, '2025-06-23'),
(531, 'Job order 20250623986', 276, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 17:27', 0, 1, '2025-06-23'),
(532, 'Job order 20250623986', 315, 261, 'Subic Bay', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '26700.55', '2025-06-23 17:27', 1, 1, '2025-06-23'),
(533, 'Job order 20250623563', 101, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(534, 'Job order 20250623036', 101, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(535, 'Job order 20250623563', 116, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(536, 'Job order 20250623036', 116, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(537, 'Job order 20250623563', 170, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(538, 'Job order 20250623036', 170, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(539, 'Job order 20250623563', 276, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(540, 'Job order 20250623036', 276, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 0, 1, '2025-06-23'),
(541, 'Job order 20250623563', 315, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 1, 1, '2025-06-23'),
(542, 'Job order 20250623036', 315, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-23 17:57', 1, 1, '2025-06-23'),
(543, 'Job order 20250623042', 101, 261, 'Manila', '1438 Captain A. Apolinario Street, Makati, Metro Manila, Philippines', '11626.48', '2025-06-23 18:03', 0, 1, '2025-06-23'),
(544, 'Job order 20250623042', 116, 261, 'Manila', '1438 Captain A. Apolinario Street, Makati, Metro Manila, Philippines', '11626.48', '2025-06-23 18:03', 0, 1, '2025-06-23'),
(545, 'Job order 20250623042', 170, 261, 'Manila', '1438 Captain A. Apolinario Street, Makati, Metro Manila, Philippines', '11626.48', '2025-06-23 18:03', 0, 1, '2025-06-23'),
(546, 'Job order 20250623042', 276, 261, 'Manila', '1438 Captain A. Apolinario Street, Makati, Metro Manila, Philippines', '11626.48', '2025-06-23 18:03', 0, 1, '2025-06-23'),
(547, 'Job order 20250623042', 315, 261, 'Manila', '1438 Captain A. Apolinario Street, Makati, Metro Manila, Philippines', '11626.48', '2025-06-23 18:03', 1, 1, '2025-06-23'),
(548, 'Job order 20250624080', 101, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(549, 'Job order 20250624255', 101, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(550, 'Job order 20250624080', 116, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(551, 'Job order 20250624255', 116, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(552, 'Job order 20250624080', 170, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(553, 'Job order 20250624255', 170, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(554, 'Job order 20250624080', 276, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(555, 'Job order 20250624080', 315, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 1, 1, '2025-06-24'),
(556, 'Job order 20250624255', 276, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 0, 1, '2025-06-24'),
(557, 'Job order 20250624255', 315, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-06-24 11:14', 1, 1, '2025-06-24'),
(558, 'Job order 20250624242', 101, 261, 'Manila', '193 Trinanes St, Taguig, 1631 Metro Manila, Philippines', '12524.41', '2025-06-24 12:42', 0, 1, '2025-06-24'),
(559, 'Job order 20250624242', 116, 261, 'Manila', '193 Trinanes St, Taguig, 1631 Metro Manila, Philippines', '12524.41', '2025-06-24 12:42', 0, 1, '2025-06-24'),
(560, 'Job order 20250624242', 170, 261, 'Manila', '193 Trinanes St, Taguig, 1631 Metro Manila, Philippines', '12524.41', '2025-06-24 12:42', 0, 1, '2025-06-24'),
(561, 'Job order 20250624242', 276, 261, 'Manila', '193 Trinanes St, Taguig, 1631 Metro Manila, Philippines', '12524.41', '2025-06-24 12:42', 0, 1, '2025-06-24'),
(562, 'Job order 20250624242', 315, 261, 'Manila', '193 Trinanes St, Taguig, 1631 Metro Manila, Philippines', '12524.41', '2025-06-24 12:42', 1, 1, '2025-06-24'),
(563, 'Job order 20250624701', 101, 261, 'Manila', 'Lower Bicutan, Taguig', '130025.32', '2024-12-28 16:20', 0, 1, '2025-06-24'),
(564, 'Job order 20250624701', 116, 261, 'Manila', 'Lower Bicutan, Taguig', '130025.32', '2024-12-28 16:20', 0, 1, '2025-06-24'),
(565, 'Job order 20250624701', 170, 261, 'Manila', 'Lower Bicutan, Taguig', '130025.32', '2024-12-28 16:20', 0, 1, '2025-06-24'),
(566, 'Job order 20250624701', 276, 261, 'Manila', 'Lower Bicutan, Taguig', '130025.32', '2024-12-28 16:20', 0, 1, '2025-06-24'),
(567, 'Job order 20250624701', 315, 261, 'Manila', 'Lower Bicutan, Taguig', '130025.32', '2024-12-28 16:20', 1, 1, '2025-06-24'),
(568, 'Job order 20250624481', 101, 261, 'Manila', '3124, Pantabangan, Nueva Ecija, Philippines', '31476.88', '2025-06-24 12:46', 0, 1, '2025-06-24'),
(569, 'Job order 20250624481', 116, 261, 'Manila', '3124, Pantabangan, Nueva Ecija, Philippines', '31476.88', '2025-06-24 12:46', 0, 1, '2025-06-24'),
(570, 'Job order 20250624481', 170, 261, 'Manila', '3124, Pantabangan, Nueva Ecija, Philippines', '31476.88', '2025-06-24 12:46', 0, 1, '2025-06-24'),
(571, 'Job order 20250624481', 276, 261, 'Manila', '3124, Pantabangan, Nueva Ecija, Philippines', '31476.88', '2025-06-24 12:46', 0, 1, '2025-06-24'),
(572, 'Job order 20250624481', 315, 261, 'Manila', '3124, Pantabangan, Nueva Ecija, Philippines', '31476.88', '2025-06-24 12:46', 1, 1, '2025-06-24'),
(573, 'Job order 20250624012', 101, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(574, 'Job order 20250624246', 101, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(575, 'Job order 20250624012', 116, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(576, 'Job order 20250624246', 116, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(577, 'Job order 20250624012', 170, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(578, 'Job order 20250624246', 170, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(579, 'Job order 20250624012', 276, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(580, 'Job order 20250624246', 276, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 0, 1, '2025-06-24'),
(581, 'Job order 20250624012', 315, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 1, 1, '2025-06-24'),
(582, 'Job order 20250624246', 315, 261, 'Manila', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '11664.68', '2025-06-24 17:35', 1, 1, '2025-06-24'),
(583, 'Job order 20250624483', 101, 261, 'Manila', 'Riverside Drive, Manila, Metro Manila, Philippines', '11091.52', '2025-06-24 17:42', 1, 1, '2025-06-24'),
(584, 'Job order 20250624483', 116, 261, 'Manila', 'Riverside Drive, Manila, Metro Manila, Philippines', '11091.52', '2025-06-24 17:42', 0, 1, '2025-06-24'),
(585, 'Job order 20250624483', 170, 261, 'Manila', 'Riverside Drive, Manila, Metro Manila, Philippines', '11091.52', '2025-06-24 17:42', 0, 1, '2025-06-24'),
(586, 'Job order 20250624483', 276, 261, 'Manila', 'Riverside Drive, Manila, Metro Manila, Philippines', '11091.52', '2025-06-24 17:42', 0, 1, '2025-06-24'),
(587, 'Job order 20250624483', 315, 261, 'Manila', 'Riverside Drive, Manila, Metro Manila, Philippines', '11091.52', '2025-06-24 17:42', 1, 1, '2025-06-24'),
(588, 'Job order 20250624193', 101, 261, 'Manila', 'Rizal Memorial Baseball Stadium, Manila, Metro Manila, Philippines', '11320.78', '2025-06-24 17:45', 0, 1, '2025-06-24'),
(589, 'Job order 20250624193', 116, 261, 'Manila', 'Rizal Memorial Baseball Stadium, Manila, Metro Manila, Philippines', '11320.78', '2025-06-24 17:45', 0, 1, '2025-06-24'),
(590, 'Job order 20250624193', 170, 261, 'Manila', 'Rizal Memorial Baseball Stadium, Manila, Metro Manila, Philippines', '11320.78', '2025-06-24 17:45', 0, 1, '2025-06-24'),
(591, 'Job order 20250624193', 276, 261, 'Manila', 'Rizal Memorial Baseball Stadium, Manila, Metro Manila, Philippines', '11320.78', '2025-06-24 17:45', 0, 1, '2025-06-24'),
(592, 'Job order 20250624193', 315, 261, 'Manila', 'Rizal Memorial Baseball Stadium, Manila, Metro Manila, Philippines', '11320.78', '2025-06-24 17:45', 1, 1, '2025-06-24'),
(593, 'Job order 20250624568', 101, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(594, 'Job order 20250624307', 101, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(595, 'Job order 20250624568', 116, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(596, 'Job order 20250624307', 116, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(597, 'Job order 20250624568', 170, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(598, 'Job order 20250624307', 170, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(599, 'Job order 20250624568', 276, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(600, 'Job order 20250624307', 276, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 0, 1, '2025-06-24'),
(601, 'Job order 20250624568', 315, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 1, 1, '2025-06-24'),
(602, 'Job order 20250624307', 315, 261, 'Manila', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '12849.21', '2025-06-24 17:58', 1, 1, '2025-06-24'),
(603, 'Job order 20250624640', 101, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(604, 'Job order 20250624139', 101, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(605, 'Job order 20250624640', 116, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(606, 'Job order 20250624139', 116, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(607, 'Job order 20250624640', 170, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(608, 'Job order 20250624640', 276, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(609, 'Job order 20250624139', 170, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(610, 'Job order 20250624640', 315, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 1, 1, '2025-06-24'),
(611, 'Job order 20250624139', 276, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 0, 1, '2025-06-24'),
(612, 'Job order 20250624139', 315, 261, 'Manila', '40 Melantic Street, Makati, Metro Manila, Philippines', '11846.17', '2025-06-24 18:01', 1, 1, '2025-06-24'),
(613, 'Job order 20250624839', 101, 261, 'Manila', 'Colonel Jesus Villamor Air Base, Pasay, Metro Manila, Philippines', '12037.23', '2025-06-24 18:04', 0, 1, '2025-06-24'),
(614, 'Job order 20250624839', 116, 261, 'Manila', 'Colonel Jesus Villamor Air Base, Pasay, Metro Manila, Philippines', '12037.23', '2025-06-24 18:04', 0, 1, '2025-06-24'),
(615, 'Job order 20250624839', 170, 261, 'Manila', 'Colonel Jesus Villamor Air Base, Pasay, Metro Manila, Philippines', '12037.23', '2025-06-24 18:04', 0, 1, '2025-06-24'),
(616, 'Job order 20250624839', 276, 261, 'Manila', 'Colonel Jesus Villamor Air Base, Pasay, Metro Manila, Philippines', '12037.23', '2025-06-24 18:04', 0, 1, '2025-06-24'),
(617, 'Job order 20250624839', 315, 261, 'Manila', 'Colonel Jesus Villamor Air Base, Pasay, Metro Manila, Philippines', '12037.23', '2025-06-24 18:04', 1, 1, '2025-06-24'),
(618, 'Job order 20250624005', 101, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(619, 'Job order 20250624025', 101, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(620, 'Job order 20250624005', 116, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(621, 'Job order 20250624025', 116, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(622, 'Job order 20250624005', 170, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(623, 'Job order 20250624025', 170, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(624, 'Job order 20250624005', 276, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(625, 'Job order 20250624025', 276, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 0, 1, '2025-06-24'),
(626, 'Job order 20250624005', 315, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 1, 1, '2025-06-24'),
(627, 'Job order 20250624025', 315, 261, 'Manila', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '11807.97', '2025-06-24 18:05', 1, 1, '2025-06-24'),
(628, 'Job order 20250626544', 101, 261, 'Manila', 'Osmeña Highway, Makati, Metro Manila, Philippines', '12342.92', '2025-06-26 12:20', 0, 1, '2025-06-26'),
(629, 'Job order 20250626544', 116, 261, 'Manila', 'Osmeña Highway, Makati, Metro Manila, Philippines', '12342.92', '2025-06-26 12:20', 0, 1, '2025-06-26'),
(630, 'Job order 20250626544', 170, 261, 'Manila', 'Osmeña Highway, Makati, Metro Manila, Philippines', '12342.92', '2025-06-26 12:20', 0, 1, '2025-06-26'),
(631, 'Job order 20250626544', 276, 261, 'Manila', 'Osmeña Highway, Makati, Metro Manila, Philippines', '12342.92', '2025-06-26 12:20', 0, 1, '2025-06-26'),
(632, 'Job order 20250626544', 315, 261, 'Manila', 'Osmeña Highway, Makati, Metro Manila, Philippines', '12342.92', '2025-06-26 12:20', 1, 1, '2025-06-26'),
(633, 'Job order 20250626870', 101, 261, 'Manila', 'Villamor Air Base Golf Course, Pasay, Metro Manila, Philippines', '11884.4', '2025-06-26 12:27', 0, 1, '2025-06-26'),
(634, 'Job order 20250626870', 116, 261, 'Manila', 'Villamor Air Base Golf Course, Pasay, Metro Manila, Philippines', '11884.4', '2025-06-26 12:27', 0, 1, '2025-06-26'),
(635, 'Job order 20250626870', 170, 261, 'Manila', 'Villamor Air Base Golf Course, Pasay, Metro Manila, Philippines', '11884.4', '2025-06-26 12:27', 0, 1, '2025-06-26'),
(636, 'Job order 20250626870', 276, 261, 'Manila', 'Villamor Air Base Golf Course, Pasay, Metro Manila, Philippines', '11884.4', '2025-06-26 12:27', 0, 1, '2025-06-26'),
(637, 'Job order 20250626870', 315, 261, 'Manila', 'Villamor Air Base Golf Course, Pasay, Metro Manila, Philippines', '11884.4', '2025-06-26 12:27', 1, 1, '2025-06-26'),
(638, 'Job order 20250626937', 101, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(639, 'Job order 20250626937', 116, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(640, 'Job order 20250626937', 170, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(641, 'Job order 20250626937', 276, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(642, 'Job order 20250626937', 315, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 1, 1, '2025-06-26'),
(643, 'Job order 20250626594', 101, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(644, 'Job order 20250626594', 116, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(645, 'Job order 20250626594', 170, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(646, 'Job order 20250626594', 276, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 0, 1, '2025-06-26'),
(647, 'Job order 20250626594', 315, 261, 'Manila', 'Edsa, Makati, Metro Manila, Philippines', '11932.16', '2025-06-26 12:38', 1, 1, '2025-06-26'),
(648, 'Job order 20250626803', 101, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(649, 'Job order 20250626803', 116, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(650, 'Job order 20250626803', 170, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(651, 'Job order 20250626803', 276, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(652, 'Job order 20250626803', 315, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 1, 1, '2025-06-26'),
(653, 'Job order 20250626667', 101, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(654, 'Job order 20250626667', 116, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(655, 'Job order 20250626667', 170, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(656, 'Job order 20250626667', 276, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 0, 1, '2025-06-26'),
(657, 'Job order 20250626667', 315, 261, 'Manila', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '12524.41', '2025-06-26 13:31', 1, 1, '2025-06-26'),
(658, 'Job order 20250626548', 101, 261, 'Manila', '3121, San Jose City, Nueva Ecija, Philippines', '29661.88', '2025-06-26 13:36', 0, 1, '2025-06-26'),
(659, 'Job order 20250626548', 116, 261, 'Manila', '3121, San Jose City, Nueva Ecija, Philippines', '29661.88', '2025-06-26 13:36', 0, 1, '2025-06-26'),
(660, 'Job order 20250626548', 170, 261, 'Manila', '3121, San Jose City, Nueva Ecija, Philippines', '29661.88', '2025-06-26 13:36', 0, 1, '2025-06-26'),
(661, 'Job order 20250626548', 276, 261, 'Manila', '3121, San Jose City, Nueva Ecija, Philippines', '29661.88', '2025-06-26 13:36', 0, 1, '2025-06-26'),
(662, 'Job order 20250626548', 315, 261, 'Manila', '3121, San Jose City, Nueva Ecija, Philippines', '29661.88', '2025-06-26 13:36', 1, 1, '2025-06-26'),
(663, 'Job order 20250626347', 101, 261, 'Manila', '2315, Capas, Tarlac, Philippines', '23070.56', '2025-06-26 13:40', 0, 1, '2025-06-26'),
(664, 'Job order 20250626347', 116, 261, 'Manila', '2315, Capas, Tarlac, Philippines', '23070.56', '2025-06-26 13:40', 0, 1, '2025-06-26'),
(665, 'Job order 20250626347', 170, 261, 'Manila', '2315, Capas, Tarlac, Philippines', '23070.56', '2025-06-26 13:40', 0, 1, '2025-06-26'),
(666, 'Job order 20250626347', 276, 261, 'Manila', '2315, Capas, Tarlac, Philippines', '23070.56', '2025-06-26 13:40', 0, 1, '2025-06-26'),
(667, 'Job order 20250626347', 315, 261, 'Manila', '2315, Capas, Tarlac, Philippines', '23070.56', '2025-06-26 13:40', 1, 1, '2025-06-26'),
(668, 'Job order 20250626013', 101, 261, 'Manila', 'Ragay Gulf, Calabarzon, Philippines', '35488.99', '2025-06-26 13:41', 0, 1, '2025-06-26'),
(669, 'Job order 20250626013', 116, 261, 'Manila', 'Ragay Gulf, Calabarzon, Philippines', '35488.99', '2025-06-26 13:41', 0, 1, '2025-06-26'),
(670, 'Job order 20250626013', 170, 261, 'Manila', 'Ragay Gulf, Calabarzon, Philippines', '35488.99', '2025-06-26 13:41', 0, 1, '2025-06-26'),
(671, 'Job order 20250626013', 276, 261, 'Manila', 'Ragay Gulf, Calabarzon, Philippines', '35488.99', '2025-06-26 13:41', 0, 1, '2025-06-26'),
(672, 'Job order 20250626013', 315, 261, 'Manila', 'Ragay Gulf, Calabarzon, Philippines', '35488.99', '2025-06-26 13:41', 1, 1, '2025-06-26'),
(673, 'Job order 20250626277', 101, 261, 'Manila', '4318, Calauag, Quezon, Philippines', '33673.99', '2025-06-26 13:42', 0, 1, '2025-06-26'),
(674, 'Job order 20250626277', 116, 261, 'Manila', '4318, Calauag, Quezon, Philippines', '33673.99', '2025-06-26 13:42', 0, 1, '2025-06-26'),
(675, 'Job order 20250626277', 170, 261, 'Manila', '4318, Calauag, Quezon, Philippines', '33673.99', '2025-06-26 13:42', 0, 1, '2025-06-26'),
(676, 'Job order 20250626277', 276, 261, 'Manila', '4318, Calauag, Quezon, Philippines', '33673.99', '2025-06-26 13:42', 0, 1, '2025-06-26'),
(677, 'Job order 20250626277', 315, 261, 'Manila', '4318, Calauag, Quezon, Philippines', '33673.99', '2025-06-26 13:42', 1, 1, '2025-06-26'),
(678, 'Job order 20250626111', 101, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(679, 'Job order 20250626111', 116, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(680, 'Job order 20250626111', 170, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(681, 'Job order 20250626111', 276, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(682, 'Job order 20250626111', 315, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 1, 1, '2025-06-26'),
(683, 'Job order 20250626487', 101, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(684, 'Job order 20250626487', 116, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(685, 'Job order 20250626487', 170, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(686, 'Job order 20250626487', 276, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 0, 1, '2025-06-26'),
(687, 'Job order 20250626487', 315, 261, 'Manila', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '11502.29', '2025-06-26 14:31', 1, 1, '2025-06-26'),
(688, 'Job order 20250626954', 101, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(689, 'Job order 20250626954', 116, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(690, 'Job order 20250626954', 170, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(691, 'Job order 20250626954', 276, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(692, 'Job order 20250626954', 315, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 1, 1, '2025-06-26'),
(693, 'Job order 20250626023', 101, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(694, 'Job order 20250626023', 116, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(695, 'Job order 20250626023', 170, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(696, 'Job order 20250626023', 276, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 0, 1, '2025-06-26'),
(697, 'Job order 20250626023', 315, 261, 'Manila', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '11540.49', '2025-06-26 14:44', 1, 1, '2025-06-26'),
(698, 'Job order 20250626878', 101, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(699, 'Job order 20250626878', 116, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(700, 'Job order 20250626878', 170, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(701, 'Job order 20250626878', 276, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(702, 'Job order 20250626878', 315, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 1, 1, '2025-06-26'),
(703, 'Job order 20250626622', 101, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(704, 'Job order 20250626622', 116, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(705, 'Job order 20250626622', 170, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(706, 'Job order 20250626622', 276, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 0, 1, '2025-06-26'),
(707, 'Job order 20250626622', 315, 261, 'Manila', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '11741.09', '2025-06-26 14:47', 1, 1, '2025-06-26'),
(708, 'Job order 20250626826', 101, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(709, 'Job order 20250626826', 116, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(710, 'Job order 20250626826', 170, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(711, 'Job order 20250626826', 276, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(712, 'Job order 20250626826', 315, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 1, 1, '2025-06-26'),
(713, 'Job order 20250626091', 101, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(714, 'Job order 20250626091', 116, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(715, 'Job order 20250626091', 170, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(716, 'Job order 20250626091', 276, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 0, 1, '2025-06-26'),
(717, 'Job order 20250626091', 315, 261, 'Manila', '3013, Norzagaray, Bulacan, Philippines', '17233.89', '2025-06-26 14:57', 1, 1, '2025-06-26'),
(718, 'Job order 20250626045', 101, 261, 'Manila', '3707 Bautista Street, Makati, Metro Manila, Philippines', '11492.72', '2025-06-26 15:02', 0, 1, '2025-06-26'),
(719, 'Job order 20250626045', 116, 261, 'Manila', '3707 Bautista Street, Makati, Metro Manila, Philippines', '11492.72', '2025-06-26 15:02', 0, 1, '2025-06-26'),
(720, 'Job order 20250626045', 170, 261, 'Manila', '3707 Bautista Street, Makati, Metro Manila, Philippines', '11492.72', '2025-06-26 15:02', 0, 1, '2025-06-26'),
(721, 'Job order 20250626045', 276, 261, 'Manila', '3707 Bautista Street, Makati, Metro Manila, Philippines', '11492.72', '2025-06-26 15:02', 0, 1, '2025-06-26'),
(722, 'Job order 20250626045', 315, 261, 'Manila', '3707 Bautista Street, Makati, Metro Manila, Philippines', '11492.72', '2025-06-26 15:02', 1, 1, '2025-06-26'),
(723, 'Job order 20250626047', 101, 261, 'Manila', 'Decena Street, Pasay, Metro Manila, Philippines', '11550.06', '2025-06-26 15:05', 0, 1, '2025-06-26'),
(724, 'Job order 20250626047', 116, 261, 'Manila', 'Decena Street, Pasay, Metro Manila, Philippines', '11550.06', '2025-06-26 15:05', 0, 1, '2025-06-26');
INSERT INTO `tbl_find_driver` (`id`, `order_id`, `driver_id`, `user_id`, `pickup_port`, `delivery_address`, `total_amount`, `pick_up_date_time`, `status`, `is_confirm`, `created`) VALUES
(725, 'Job order 20250626047', 170, 261, 'Manila', 'Decena Street, Pasay, Metro Manila, Philippines', '11550.06', '2025-06-26 15:05', 0, 1, '2025-06-26'),
(726, 'Job order 20250626047', 276, 261, 'Manila', 'Decena Street, Pasay, Metro Manila, Philippines', '11550.06', '2025-06-26 15:05', 0, 1, '2025-06-26'),
(727, 'Job order 20250626047', 315, 261, 'Manila', 'Decena Street, Pasay, Metro Manila, Philippines', '11550.06', '2025-06-26 15:05', 1, 1, '2025-06-26'),
(728, 'Job order 20250626913', 101, 261, 'Manila', '3115, Guimba, Nueva Ecija, Philippines', '26605.04', '2025-06-26 15:30', 0, 1, '2025-06-26'),
(729, 'Job order 20250626913', 116, 261, 'Manila', '3115, Guimba, Nueva Ecija, Philippines', '26605.04', '2025-06-26 15:30', 0, 1, '2025-06-26'),
(730, 'Job order 20250626913', 170, 261, 'Manila', '3115, Guimba, Nueva Ecija, Philippines', '26605.04', '2025-06-26 15:30', 0, 1, '2025-06-26'),
(731, 'Job order 20250626913', 276, 261, 'Manila', '3115, Guimba, Nueva Ecija, Philippines', '26605.04', '2025-06-26 15:30', 0, 1, '2025-06-26'),
(732, 'Job order 20250626913', 315, 261, 'Manila', '3115, Guimba, Nueva Ecija, Philippines', '26605.04', '2025-06-26 15:30', 1, 1, '2025-06-26'),
(733, 'Job order 20250626685', 101, 261, 'Manila', 'Lower Bicutan, Taguig', '25.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(734, 'Job order 20250626685', 116, 261, 'Manila', 'Lower Bicutan, Taguig', '25.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(735, 'Job order 20250626685', 170, 261, 'Manila', 'Lower Bicutan, Taguig', '25.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(736, 'Job order 20250626685', 276, 261, 'Manila', 'Lower Bicutan, Taguig', '25.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(737, 'Job order 20250626685', 315, 261, 'Manila', 'Lower Bicutan, Taguig', '25.32', '2024-12-28 16:20', 1, 1, '2025-06-26'),
(738, 'Job order 20250626134', 101, 261, 'Manila', 'Lower Bicutan, Taguig', '325.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(739, 'Job order 20250626134', 116, 261, 'Manila', 'Lower Bicutan, Taguig', '325.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(740, 'Job order 20250626134', 170, 261, 'Manila', 'Lower Bicutan, Taguig', '325.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(741, 'Job order 20250626134', 276, 261, 'Manila', 'Lower Bicutan, Taguig', '325.32', '2024-12-28 16:20', 0, 1, '2025-06-26'),
(742, 'Job order 20250626134', 315, 261, 'Manila', 'Lower Bicutan, Taguig', '325.32', '2024-12-28 16:20', 1, 1, '2025-06-26'),
(743, 'Job order 20250704630', 101, 261, 'Manila', '3702, Bambang, Nueva Vizcaya, Philippines', '38259.27', '2025-07-04 17:24', 0, 1, '2025-07-04'),
(744, 'Job order 20250704630', 116, 261, 'Manila', '3702, Bambang, Nueva Vizcaya, Philippines', '38259.27', '2025-07-04 17:24', 0, 1, '2025-07-04'),
(745, 'Job order 20250704630', 170, 261, 'Manila', '3702, Bambang, Nueva Vizcaya, Philippines', '38259.27', '2025-07-04 17:24', 0, 1, '2025-07-04'),
(746, 'Job order 20250704630', 276, 261, 'Manila', '3702, Bambang, Nueva Vizcaya, Philippines', '38259.27', '2025-07-04 17:24', 0, 1, '2025-07-04'),
(747, 'Job order 20250704630', 315, 261, 'Manila', '3702, Bambang, Nueva Vizcaya, Philippines', '38259.27', '2025-07-04 17:24', 1, 1, '2025-07-04'),
(748, 'Job order 20250704530', 101, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-07-04 17:27', 0, 0, '2025-07-04'),
(749, 'Job order 20250704530', 116, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-07-04 17:27', 0, 0, '2025-07-04'),
(750, 'Job order 20250704530', 170, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-07-04 17:27', 0, 0, '2025-07-04'),
(751, 'Job order 20250704530', 276, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-07-04 17:27', 0, 0, '2025-07-04'),
(752, 'Job order 20250704530', 315, 261, 'Manila', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '11722.01', '2025-07-04 17:27', 0, 0, '2025-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` int NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `users_id` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text,
  `status` int NOT NULL DEFAULT '1',
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pick_up_port`
--

CREATE TABLE `tbl_pick_up_port` (
  `id` int NOT NULL,
  `port` varchar(255) DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '1',
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_pick_up_port`
--

INSERT INTO `tbl_pick_up_port` (`id`, `port`, `code`, `lat`, `lng`, `status`, `created`) VALUES
(1, 'Manila', 'MNL1', '14.5833', '120.9667', 1, '2024-11-17'),
(2, 'Cebu', 'CB2', '10.3978', '123.8635', 1, '2024-11-17'),
(3, 'Batangas', 'BTG3', '13.7594', '121.0583', 1, '2024-11-17'),
(4, 'Subic Bay', 'SBC4', '14.8264', '120.2839', 1, '2024-11-17'),
(5, 'Cagayan de Oro', 'CDO5', '8.4803', '124.6498', 1, '2024-11-17'),
(6, 'Davao', 'DVO6', '7.0736', '125.6110', 1, '2024-11-17'),
(7, 'Iloilo', 'ILO7', '10.6918', '122.5764', 1, '2024-11-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `google_map` text NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `youtube_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `phone_number`, `email`, `owner_name`, `google_map`, `address`, `facebook_link`, `youtube_link`, `instagram_link`) VALUES
(1, '+917023670147', '', 'Mr Bhavishya Swami', '', 'Plot No. 54B, Govind Nagar Vistar, Dussehra Kothi, Amer Road, Jaipur-302002, Rajasthan, India', 'https://www.facebook.com/meera.handicraft1', 'https://youtube.com/@meerahandicrafts7394?si=eduy6ZVkb0RUSWcT', 'https://www.instagram.com/meerahandicraftsjaipur/?hl=en');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_state`
--

CREATE TABLE `tbl_state` (
  `id` int NOT NULL,
  `country_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `state_code` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created` varchar(255) DEFAULT NULL,
  `created_by` int NOT NULL DEFAULT '1',
  `modified` varchar(255) DEFAULT NULL,
  `modified_by` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_state`
--

INSERT INTO `tbl_state` (`id`, `country_id`, `name`, `state_code`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 5, 'Karnataka', 'KA', 1, '2024-04-29', 1, '2024-04-29', 1),
(2, 5, 'Bihar', 'BR', 1, '2024-04-29', 1, '2024-04-29', 1),
(3, 5, 'Madhya Pradesh', 'MP', 1, '2024-04-29', 1, '2024-04-29', 1),
(4, 8, 'Gauteng', 'GP', 1, '2024-04-29', 1, '2024-04-29', 1),
(5, 6, 'Metro Manila', 'NCR', 1, '2024-06-13', 1, '2024-06-13', 1),
(6, 6, 'Cordillera Administrative Region', 'CAR', 1, '2024-06-13', 1, '2024-06-13', 1),
(7, 6, 'Ilocos Region', 'Ilocos Region', 1, '2024-06-13', 1, '2024-06-13', 1),
(8, 6, 'Cagayan Valley', 'Cagayan Valley', 1, '2024-06-13', 1, '2024-06-13', 1),
(9, 6, 'Central Luzon', 'Central Luzon', 1, '2024-06-13', 1, '2024-06-13', 1),
(10, 6, 'Calabarzon', 'Calabarzon', 1, '2024-06-13', 1, '2024-06-13', 1),
(11, 6, 'MIMAROPA', 'MIMAROPA', 1, '2024-06-13', 1, '2024-06-13', 1),
(12, 6, 'Bicol', 'Bicol', 1, '2024-06-13', 1, '2024-06-13', 1),
(13, 6, 'Western Visayas', 'Western Visayas', 1, '2024-06-13', 1, '2024-06-13', 1),
(14, 6, 'Central Visayas', 'Central Visayas', 1, '2024-06-13', 1, '2024-06-13', 1),
(15, 6, 'Eastern Visayas', 'Eastern Visayas', 1, '2024-06-13', 1, '2024-06-13', 1),
(16, 6, 'Zamboanga Peninsula', 'Zamboanga Peninsula', 1, '2024-06-13', 1, '2024-06-13', 1),
(17, 6, 'Northern Mindanao', 'Northern Mindanao', 1, '2024-06-13', 1, '2024-06-13', 1),
(18, 6, 'Davao Region', 'Davao Region', 1, '2024-06-13', 1, '2024-06-13', 1),
(19, 6, 'Region XII', 'SOCCSKSARGEN', 1, '2024-06-13', 1, '2024-06-13', 1),
(20, 6, 'Caraga', 'Caraga', 1, '2024-06-13', 1, '2024-06-13', 1),
(21, 6, 'Bangsamoro Autonomous Region in Muslim Mindanao', 'ARMM', 1, '2024-06-13', 1, '2024-06-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck`
--

CREATE TABLE `tbl_truck` (
  `id` int NOT NULL,
  `truck_partner_id` int NOT NULL,
  `model` varchar(255) DEFAULT NULL,
  `plate_no` varchar(255) DEFAULT NULL,
  `truck_type` varchar(255) DEFAULT NULL,
  `trailer_type` varchar(255) DEFAULT NULL,
  `types` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `or_cr` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck`
--

INSERT INTO `tbl_truck` (`id`, `truck_partner_id`, `model`, `plate_no`, `truck_type`, `trailer_type`, `types`, `image`, `or_cr`, `status`, `created`) VALUES
(1, 78, 'Scania R-series', 'PB 16 21365', '10 wheeler', NULL, 'truck', '18-premium_photo.jpeg', '20-resized-file-1592906049.jpg', 0, '2024-10-10'),
(4, 78, '4 Alxe Flatbed', 'PB 16 21368', NULL, '1', 'chassis', '32-aimgroot.php', '20-resized-file-1592906049.jpg', 0, '2024-10-10'),
(5, 74, 'Volvo FH', 'ABC123', '10 Wheeler', NULL, 'truck', '27-20241018152934.jpg', '16-20241018152942.jpg', 1, '2024-10-18'),
(6, 74, 'Volvo FH', 'ABC124', '10 Wheeler', NULL, 'truck', '32-20241018153542.jpg', '22-20241018153543.jpg', 1, '2024-10-18'),
(7, 78, 'Volvo FH', 'ABC125', '10 Wheeler', NULL, 'truck', '30-20241018153859.jpg', '21-20241018153859.jpg', 1, '2024-10-18'),
(8, 78, 'Volvo FH', '00001', '10 Wheeler', NULL, 'truck', '29-20241018154219.jpg', '23-20241018154226.jpg', 1, '2024-10-18'),
(9, 74, 'Volvo FH', '00002', '10 Wheeler', NULL, 'truck', '24-20241021105820.jpg', '34-20241021105821.jpg', 1, '2024-10-21'),
(10, 78, 'Test1', '00003', '10 Wheeler', NULL, 'truck', '29-20241021113901.jpg', '25-20241021113902.jpg', 1, '2024-10-21'),
(11, 74, 'New Chassis', 'FB 2464', NULL, '1', 'chassis', '20-20241021153955.jpg', '32-20241021153955.jpg', 1, '2024-10-21'),
(13, 74, 'Volvo FH', 'TP1T1', '10 Wheeler', NULL, 'truck', '30-20241106115151.jpg', '30-20241106115151.jpg', 1, '2024-11-06'),
(15, 74, 'Leland 520', 'PB 18 16352', '10 Tayer', NULL, 'truck', '29-gud.jpg', '34-images-(1).jpg', 1, '2024-11-16'),
(16, 115, '2022', 'blo128Rj0922', '20 footer', NULL, 'truck', '27-Screenshot-2025-01-03-142722.png', '15-5da8768c07eb3db7dbf5f394ab4444a6.jpg', 1, '2025-01-06'),
(17, 74, '2022', '39393939Rj23', NULL, '1', 'chassis', '', '', 1, '2025-01-06'),
(18, 153, 'Scania R-series', 'PB 16 21365', NULL, '2', 'chassis', '28-images.jpeg', '20-resized-file-1592906049.jpg', 1, '2025-02-05'),
(19, 153, 'A40', 'RJ45UR0001', NULL, '2', 'chassis', '28-2025-02-05-16:03:11.614514.png', '35-2025-02-05-16:03:15.655036.png', 1, '2025-02-05'),
(20, 153, 'A40', 'RJ45UR0003', NULL, '2', 'chassis', '27-2025-02-05-16:05:59.318205.png', '18-2025-02-05-16:06:02.323340.png', 1, '2025-02-05'),
(21, 153, 'k10', 'UK151245', '10 wheeler ', NULL, 'truck', '30-2025-02-05-16:18:07.827833.png', '35-2025-02-05-16:18:05.876116.png', 1, '2025-02-05'),
(22, 166, 'Hactor', 'US1235', NULL, '10 wheeler ', 'chassis', '17-2025-02-06-15:31:39.107487.png', '16-2025-02-06-15:31:37.928793.png', 0, '2025-02-06'),
(23, 166, '12 WHEELER ', 'RJ29GA1035', '10', NULL, 'truck', '31-2025-02-06-15:33:59.324513.png', '22-2025-02-06-15:34:01.395800.png', 1, '2025-02-06'),
(24, 74, 'sadads', '22', 'asd', NULL, 'truck', '22-nass.php', '', 1, '2025-02-15'),
(25, 270, '2024', 'RJ45SD8554', '4 ', NULL, 'truck', '18-2025-04-25-17:46:39.049944.png', '29-2025-04-25-17:46:41.161628.png', 1, '2025-04-25'),
(26, 270, '2024', 'RJ60SD0001', NULL, '4', 'chassis', '26-2025-04-25-17:49:08.033303.png', '16-2025-04-25-17:49:11.518382.png', 1, '2025-04-25'),
(27, 270, '2025', 'chas1575679', NULL, '1', 'chassis', '19-2025-04-29-17:34:16.234442.png', '17-2025-04-29-17:34:32.168437.png', 1, '2025-04-29'),
(28, 270, '2024', 'RJ60DS2091', '10 wheeler ', NULL, 'truck', '26-2025-04-29-17:41:40.035806.png', '16-2025-04-29-17:41:45.300345.png', 1, '2025-04-29'),
(30, 295, 'Truck 1', 'JOE2519', 'Truck', NULL, 'truck', '33-20250526171424.jpg', '15-20250526171425.jpg', 1, '2025-05-26'),
(31, 299, 'Scansia R-series', 'PB 16 21325', '10 wheeler', NULL, 'truck', '18-premium_photo.jpeg', '20-resized-file-1592906049.jpg', 0, '2025-05-30'),
(32, 299, 'Truck Model 1', 'Qwe123', 'Truck Type 1', NULL, 'truck', '34-upload.jpg', '27-upload.jpg', 1, '2025-05-30'),
(33, 299, 'Truck Model 2', 'QWE124', 'Truck Type 2', NULL, 'truck', '23-upload.jpg', '17-upload.jpg', 1, '2025-05-30'),
(34, 299, 'Truck Model 3', 'QWE234', 'Truck Type 2', NULL, 'truck', '24-upload.jpg', '30-upload.jpg', 1, '2025-05-30'),
(38, 299, 'Scania R-series', 'PB 16 21366', NULL, '2', 'chassis', '28-images.jpeg', '20-resized-file-1592906049.jpg', 0, '2025-05-30'),
(49, 299, 'Qwqw', '12qw1', NULL, '1', 'chassis', '20-upload.jpg', '25-upload.jpg', 1, '2025-06-02'),
(50, 299, 'Wewerr', '1qe1', NULL, '1', 'chassis', '31-upload.jpg', '27-upload.jpg', 1, '2025-06-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_booking_status`
--

CREATE TABLE `tbl_truck_booking_status` (
  `id` int NOT NULL,
  `booking_status` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_booking_status`
--

INSERT INTO `tbl_truck_booking_status` (`id`, `booking_status`, `status`) VALUES
(1, 'Cancelled', 1),
(2, 'Pending', 1),
(3, 'DriverConfirmed', 1),
(4, 'TransitToPort', 1),
(5, 'ArrivedAtPort', 1),
(6, 'ContainerLoaded', 1),
(7, 'DepartedFromPort', 1),
(8, 'TransitToDestination', 1),
(9, 'ArrivedAtDestination', 1),
(10, 'Delivered', 1),
(11, 'Received', 1),
(12, 'TransitToContainerYard', 1),
(13, 'ContainerDelivered', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_driver`
--

CREATE TABLE `tbl_truck_driver` (
  `id` int NOT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_person_phone_mobile_code` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `refrence_number` varchar(255) DEFAULT NULL,
  `driver_license_doc` varchar(255) DEFAULT NULL,
  `driver_license_doc_status` int NOT NULL DEFAULT '0',
  `valid_goverment_id_doc` varchar(255) DEFAULT NULL,
  `valid_goverment_id_doc_status` int NOT NULL DEFAULT '0',
  `company_id_doc` varchar(255) DEFAULT NULL,
  `company_id_doc_status` int NOT NULL DEFAULT '0',
  `bio_data_doc` varchar(255) DEFAULT NULL,
  `bio_data_doc_status` int NOT NULL DEFAULT '0',
  `drug_test_result_doc` varchar(255) DEFAULT NULL,
  `drug_test_result_doc_status` int NOT NULL DEFAULT '0',
  `nbi_clearance_doc` varchar(255) DEFAULT NULL,
  `nbi_clearance_doc_status` int NOT NULL DEFAULT '0',
  `police_clearance_doc` varchar(255) DEFAULT NULL,
  `police_clearance_doc_status` int NOT NULL DEFAULT '0',
  `personal_accident_insurance_doc` varchar(255) DEFAULT NULL,
  `personal_accident_insurance_doc_status` int NOT NULL DEFAULT '0',
  `vacination_card_doc` varchar(255) DEFAULT NULL,
  `vacination_card_doc_status` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '1',
  `created` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_driver_rating`
--

CREATE TABLE `tbl_truck_driver_rating` (
  `id` int NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `driver_id` int NOT NULL DEFAULT '1',
  `rating` varchar(255) DEFAULT NULL,
  `comments` varchar(255) DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_driver_rating`
--

INSERT INTO `tbl_truck_driver_rating` (`id`, `user_id`, `driver_id`, `rating`, `comments`, `status`, `created`) VALUES
(1, 163, 101, '2', 'best Driver', 1, '2025-02-11'),
(2, 163, 101, '1', 'best Driver', 1, '2025-02-11'),
(3, 163, 101, '4', 'best Driver', 1, '2025-02-11'),
(4, 163, 101, '5', 'best Driver', 1, '2025-02-11'),
(5, 163, 101, '3', 'best Driver', 1, '2025-02-11'),
(6, 163, 101, '2', 'best Driver', 1, '2025-02-11'),
(7, 163, 101, '2', 'best Driver', 1, '2025-02-11'),
(8, 161, 101, '2', 'best Driver', 1, '2025-02-24'),
(9, 161, 67, '3.0', 'bbdbdhhf', 1, '2025-02-24'),
(10, 161, 67, '3.5', 'bbdbdhhf', 1, '2025-02-24'),
(11, 161, 67, '3.5', 'bbdbdhhfff ftfth f \nvggb\ngghg\nggcbh\nghghh\nghhh\nfgg\nfgg\nbbdbdhhfff ftfth f \nvggb\ngghg\nggcbh\nghghh\nghhh\nfgg\nfgg\n', 1, '2025-02-24'),
(12, 161, 67, '3.5', 'bbdbdhhfff ftfth f \nvggb\ngghg\nggcbh\nghghh\nghhh\nfgg\nfgg\nbbdbdhhfff ftfth f \nvggb\ngghg\nggcbh\nghghh\nghhh\nfgg\nfgg\n', 1, '2025-02-24'),
(13, 161, 67, '3.5', 'bbdbdhhfff ftfth f \nvggb\ngghg\nggcbh\nghghh\nghhh\nfgg\nfgg\nbbdbdhhfff ftfth f \nvggb\ngghg\nbbdbdhhfff ftft', 1, '2025-02-24'),
(14, 161, 67, '3.5', 'bbdbdhhfff ftfth f \nvggb\ngghg\nggcbh\nghghh\nghhh\nfgg\nfgg\nbbdbdhhfff ftfth f \nvggb\ngghg\nbbdbdhhfff ftft', 1, '2025-02-24'),
(15, 161, 67, '3.5', 'bbdbdhhfff ftfth f \nvggb\ngghg\nggcbh\nghghh\nghhh\nfgg\nfgg\nbbdbdhhfff ftfth f \nvggb\ngghg\nbbdbdhhfff ftft', 1, '2025-02-24'),
(16, 161, 67, '3.5', '\nghhh\nfgg\nfgg\nbbdbdhhfff ftfth f \nvggb\ngghg\nbbdbdhhfff ftft', 1, '2025-02-24'),
(17, 161, 67, '3.5', '\nghhh\nfgg\nfgg\nbbdbdhhfff ftfth f \nvggb\ngghg\nbbdbdhhfff ftft', 1, '2025-02-24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_order_booking`
--

CREATE TABLE `tbl_truck_order_booking` (
  `id` int NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `truck_partner_id` int NOT NULL DEFAULT '0',
  `select_driver_id` int NOT NULL DEFAULT '0',
  `qr_image` varchar(255) DEFAULT NULL,
  `pickup_port` varchar(255) DEFAULT NULL,
  `truck_id` int NOT NULL DEFAULT '0',
  `chassis_id` int NOT NULL DEFAULT '0',
  `trailer_chassis_type_id` varchar(255) DEFAULT NULL,
  `consignee_name` varchar(255) DEFAULT NULL,
  `delivery_address` varchar(255) DEFAULT NULL,
  `delivery_address_lat` varchar(255) DEFAULT NULL,
  `delivery_address_lng` varchar(255) DEFAULT NULL,
  `container_return_address` varchar(255) DEFAULT NULL,
  `container_return_address_lat` varchar(255) DEFAULT NULL,
  `container_return_address_lng` varchar(255) DEFAULT NULL,
  `pick_up_date_time` varchar(255) DEFAULT NULL,
  `declared_value` varchar(255) DEFAULT NULL,
  `weight` varchar(255) DEFAULT NULL,
  `bill_of_loading` varchar(255) DEFAULT NULL,
  `packing_list` varchar(255) DEFAULT NULL,
  `certificate_of_payment` varchar(255) DEFAULT NULL,
  `gate_pass` varchar(255) DEFAULT NULL,
  `tabs` varchar(255) DEFAULT NULL,
  `total_amount` varchar(255) DEFAULT NULL,
  `distance_fee` varchar(255) DEFAULT NULL,
  `service_charge` varchar(255) DEFAULT NULL,
  `payment_type` varchar(255) DEFAULT NULL,
  `note_to_driver` varchar(255) DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `modified` varchar(255) DEFAULT NULL,
  `status` int DEFAULT '1',
  `booking_status` varchar(255) DEFAULT NULL,
  `cancel_reasion` varchar(255) DEFAULT NULL,
  `cancel_other_comment` varchar(255) DEFAULT NULL,
  `cancel_date` varchar(255) DEFAULT NULL,
  `container_loaded_status_image` varchar(255) DEFAULT NULL,
  `delivered_status_image` varchar(255) DEFAULT NULL,
  `container_delivered_status_image` varchar(255) DEFAULT NULL,
  `update_status_date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_truck_order_booking`
--

INSERT INTO `tbl_truck_order_booking` (`id`, `order_id`, `user_id`, `truck_partner_id`, `select_driver_id`, `qr_image`, `pickup_port`, `truck_id`, `chassis_id`, `trailer_chassis_type_id`, `consignee_name`, `delivery_address`, `delivery_address_lat`, `delivery_address_lng`, `container_return_address`, `container_return_address_lat`, `container_return_address_lng`, `pick_up_date_time`, `declared_value`, `weight`, `bill_of_loading`, `packing_list`, `certificate_of_payment`, `gate_pass`, `tabs`, `total_amount`, `distance_fee`, `service_charge`, `payment_type`, `note_to_driver`, `created`, `modified`, `status`, `booking_status`, `cancel_reasion`, `cancel_other_comment`, `cancel_date`, `container_loaded_status_image`, `delivered_status_image`, `container_delivered_status_image`, `update_status_date`) VALUES
(125, 'Job order 20250507316', 161, 78, 170, 'Job order 2025050731605-08-2025.png', 'Manila', 9, 17, '1', 'manila', 'Manila, Metro Manila, Philippines', '14.5995124', '120.9842195', 'Manila, Philippines', '14.6090537', '121.0222565', '2025-05-07', '10000', '100', '30-2025-05-07-17:53:04.346057.png', '25-2025-05-07-17:53:06.250602.png', '31-2025-05-07-17:53:49.123833.png', '16-2025-05-07-17:53:56.251407.png', '22-2025-05-07-17:54:41.484290.png', '11196.61', '448.99', '10747.62', '1', 'hi', '2025-05-07', '2025-05-07', 4, 'transit_to_port', NULL, NULL, NULL, '', '', '', '2025-05-08'),
(126, 'Job order 20250508218', 161, 78, 0, 'Job order 2025050821805-08-2025.png', 'Manila', 0, 0, '1', 'avh', 'Manila, Metro Manila, Philippines', '14.5995124', '120.9842195', 'Manila, Philippines', '14.6090537', '121.0222565', '2025-05-08', '1000', '100', '26-2025-05-08-13:28:54.866960.png', '30-2025-05-08-13:28:59.052274.png', '21-2025-05-08-13:29:01.238375.png', '18-2025-05-08-13:29:03.409219.png', '21-2025-05-08-13:29:07.741398.png', '11196.61', '448.99', '10747.62', '1', 'hii', '2025-05-08', '2025-05-08', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, 'Job order 20250528785', 163, 78, 0, 'Job order 2025052878505-28-2025.png', 'Manila', 0, 0, '1', 'test', 'smx convention center manila', '14.5320342', '120.9815806', 'smx convention center manila', '14.5320342', '120.9815806', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-05-28', '2025-05-28', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, 'Job order 20250617390', 261, 78, 0, 'Job order 2025061739006-17-2025.png', 'Manila', 0, 0, '1', 'test', 'smx convention center manila', '14.5320342', '120.9815806', 'smx convention center manila', '14.5320342', '120.9815806', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '254000', '869.29', '10747.62', 'COD', 'Notes', '2025-06-17', '2025-06-17', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, 'Job order 20250617475', 261, 78, 0, 'Job order 2025061747506-18-2025.png', 'Manila', 0, 0, '1', 'test', 'smx convention center manila', '14.5320342', '120.9815806', 'smx convention center manila', '14.5320342', '120.9815806', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-17', '2025-06-17', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, 'Job order 20250617116', 261, 78, 0, 'Job order 2025061711606-17-2025.png', 'Manila', 0, 0, '1', 'test', 'smx convention center manila', '14.5320342', '120.9815806', 'smx convention center manila', '14.5320342', '120.9815806', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '11616.92', '869.29', '10747.62', 'COD', 'Notes', '2025-06-17', '2025-06-17', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(131, 'Job order 20250617415', 261, 78, 0, 'Job order 2025061741506-17-2025.png', 'Manila', 0, 0, '1', 'test', 'smx convention center manila', '14.540574', '121.014729', 'smx convention center manila', '14.540574', '121.014729', '2025-06-17 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-17', '2025-06-17', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(132, 'Job order 20250618034', 261, 78, 315, 'Job order 2025061803406-18-2025.png', 'Manila', 31, 50, '1', 'test', 'smx convention center manila', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, 'Job order 20250618270', 261, 78, 0, 'Job order 2025061827006-18-2025.png', 'Cebu', 0, 0, '1', 'test', 'smx convention center manila', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, 'Job order 20250618134', 261, 78, 315, 'Job order 2025061813406-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Estrellas ham', '15.540425', '125.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(135, 'Job order 20250618608', 261, 78, 315, 'Job order 2025061860806-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Calatagan', '15.540425', '125.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, 'Job order 20250618025', 261, 78, 315, 'Job order 2025061802506-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Calatagan Batangas', '15.540425', '125.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(137, 'Job order 20250618570', 261, 78, 315, 'Job order 2025061857006-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Brgy 1. Calatagan Batangas', '15.540425', '125.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(138, 'Job order 20250618099', 261, 78, 315, 'Job order 2025061809906-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Brgy 3. Calatagan Batangas', '15.540425', '125.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(139, 'Job order 20250618898', 261, 78, 315, 'Job order 2025061889806-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Brgy 3. Calatagan Batangas', '15.540425', '125.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(140, 'Job order 20250618563', 261, 78, 315, 'Job order 2025061856306-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Bucal Batangas', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(141, 'Job order 20250618301', 261, 78, 315, 'Job order 2025061830106-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Balayan Batangas', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(142, 'Job order 20250618580', 261, 78, 315, 'Job order 2025061858006-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Bayan Batangas', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(143, 'Job order 20250618608', 261, 78, 315, 'Job order 2025061860806-18-2025.png', 'Manila', 31, 50, '1', 'test', 'Upper Bicutan, 7-eleven', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, 'Job order 20250618310', 261, 78, 315, 'Job order 2025061831006-19-2025.png', 'Manila', 31, 50, '1', 'test', 'Upper Bicutan, 7-eleven', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-18', '2025-06-18', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(145, 'Job order 20250619573', 261, 78, 0, 'Job order 2025061957306-26-2025.png', 'Manila', 0, 0, '1', 'test', 'Lower Bicutan, 7-eleven', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '150025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(146, 'Job order 20250619771', 261, 78, 315, 'Job order 2025061977106-19-2025.png', 'Manila', 31, 50, '1', 'test', 'Lower Bicutan, Taguig', '14.540425', '121.014513', 'smx convention center manila', '14.540402', '121.014724', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '1500225.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(147, 'Job order 20250619362', 261, 78, 315, 'Job order 2025061936206-19-2025.png', 'Manila', 31, 50, '1', 'test', 'Lower Bicutan, Taguig', '14.540425', '121.014513', 'smx convention center manila', '14.540402', '121.014724', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '15005.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(148, 'Job order 20250619586', 261, 78, 315, 'Job order 2025061958606-19-2025.png', 'Manila', 31, 50, '1', 'test', 'Lower Bicutan, Taguig', '14.540425', '121.014513', 'smx convention center manila', '14.540402', '121.014724', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '16005.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(149, 'Job order 20250619927', 261, 78, 315, 'Job order 2025061992706-19-2025.png', 'Manila', 31, 50, '1', 'test', 'Lower Bicutan, 7-eleven', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '250025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 12, 'TransitToContainerYard', NULL, NULL, NULL, '', '', '', '2025-06-19'),
(150, 'Job order 20250619997', 261, 78, 315, 'Job order 2025061999706-19-2025.png', 'Manila', 31, 50, '1', 'test', 'Lower Bicutan, 7-eleven', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '50025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(151, 'Job order 20250619227', 261, 78, 315, 'Job order 2025061922706-19-2025.png', 'Manila', 31, 50, '1', 'Jess', 'Upper Bicutan, Taguih', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '20025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(152, 'Job order 20250619721', 261, 78, 315, 'Job order 2025061972106-19-2025.png', 'Manila', 31, 50, '1', 'Jess Estrella', 'Upper Bicutan, Taguig', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '120025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(153, 'Job order 20250619095', 261, 78, 315, 'Job order 2025061909506-19-2025.png', 'Manila', 31, 50, '1', 'Jess O. Estrella', 'Upper Bicutan, Taguig ST', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '100025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-19', '2025-06-19', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(154, 'Job order 20250620087', 261, 78, 315, 'Job order 2025062008706-20-2025.png', 'Manila', 31, 50, '1', 'Jess O. Estrella', 'Upper Bicutan, Taguig ST', '14.540425', '121.014513', 'smx convention center manila', '14.540425', '121.01451', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '100025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-20', '2025-06-20', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(155, 'Job order 20250623269', 261, 78, 315, 'Job order 2025062326906-23-2025.png', 'Manila', 31, 50, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 16:32', 'New', '124 Kg', '', '', '', '', '', '11722.01', '974.39', '10747.62', 'COD', 'Notes', '2025-06-23', '2025-06-23', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(156, 'Job order 20250623948', 261, 78, 0, 'Job order 2025062394806-23-2025.png', 'Batangas', 0, 0, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 16:42', 'We', '122', '', '', '', '', '', '20071.02', '9323.4', '10747.62', 'COD', 'Notes', '2025-06-23', '2025-06-23', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(157, 'Job order 20250623043', 261, 78, 0, 'Job order 2025062304306-23-2025.png', 'Cebu', 0, 0, '1', 'test', '1172-A Rodriguez Street, Makati, Metro Manila, Philippines', '14.544929819504299', '121.01347764228868', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-25 16:48', 'New', '111', '', '', '', '', '', '90034.66', '79287.03', '10747.62', 'COD', 'Notes', '2025-06-23', '2025-06-23', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(158, 'Job order 20250623734', 261, 78, 315, 'Job order 2025062373406-23-2025.png', 'Subic Bay', 31, 50, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-23 16:51', 'New', '222', '', '', '', '', '', '26700.55', '15952.92', '10747.62', 'COD', 'Notes', '2025-06-23', '2025-06-23', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(159, 'Job order 20250623594', 261, 78, 0, 'Job order 2025062359406-23-2025.png', 'Cebu', 0, 0, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-23 16:51', 'New', '222', '', '', '', '', '', '89939.12', '79191.5', '10747.62', 'COD', 'Notes', '2025-06-23', '2025-06-23', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(160, 'Job order 20250623194', 261, 78, 0, 'Job order 2025062319406-23-2025.png', 'Cagayan de Oro', 0, 0, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-30 17:23', 'Did', '121', '', '', '', '', '', '117641.83', '106894.21', '10747.62', 'COD', 'Notes', '2025-06-23', '2025-06-23', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(161, 'Job order 20250623986', 261, 78, 315, 'Job order 2025062398606-23-2025.png', 'Subic Bay', 31, 50, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-23 17:27', 'deft', '1221', '', '', '', '', '', '26700.55', '15952.92', '10747.62', 'COD', 'Notes', '2025-06-23', '2025-06-23', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(162, 'Job order 20250623447', 261, 78, 0, 'Job order 2025062344706-23-2025.png', 'Davao', 0, 0, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-23 17:54', 'Ether', '1221', '16-bill_of_lading_20250623_175446.jpg', '29-packing_list_20250623_175443.jpg', '15-certificate_of_payment_20250623_175437.jpg', '15-gate_pass_20250623_175440.jpg', '16-tabs_20250623_175434.jpg', '149547.7', '138800.08', '10747.62', 'COD', '', '2025-06-23', '2025-06-23', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(163, 'Job order 20250623563', 261, 78, 315, 'Job order 2025062356306-23-2025.png', 'Manila', 31, 50, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-23 17:57', 'New', '1221', '20-bill_of_lading_20250623_180053.jpg', '23-packing_list_20250623_180056.jpg', '27-certificate_of_payment_20250623_180100.jpg', '28-gate_pass_20250623_180102.jpg', '23-tabs_20250623_180115.jpg', '11722.01', '974.39', '10747.62', 'Visa 2109', 'Wawa’s', '2025-06-23', '2025-06-23', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(164, 'Job order 20250623036', 261, 78, 315, 'Job order 2025062303606-23-2025.png', 'Manila', 31, 50, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-23 17:57', 'New', '1221', '20-bill_of_lading_20250623_180053.jpg', '23-packing_list_20250623_180056.jpg', '27-certificate_of_payment_20250623_180100.jpg', '28-gate_pass_20250623_180102.jpg', '23-tabs_20250623_180115.jpg', '11722.01', '974.39', '10747.62', 'COD', '', '2025-06-23', '2025-06-23', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(165, 'Job order 20250623042', 261, 78, 315, 'Job order 2025062304206-23-2025.png', 'Manila', 31, 50, '1', 'test', '1438 Captain A. Apolinario Street, Makati, Metro Manila, Philippines', '14.54718625', '121.0119235', 'Calatagan, Batangas, Philippines', '13.8311139', '120.6314369', '2025-06-23 18:03', 'Qewq', '121', '23-bill_of_lading_20250623_180412.jpg', '18-packing_list_20250623_180415.jpg', '21-certificate_of_payment_20250623_180418.jpg', '27-gate_pass_20250623_180425.jpg', '32-tabs_20250623_180430.jpg', '11626.48', '878.85', '10747.62', 'COD', '', '2025-06-23', '2025-06-23', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(166, 'Job order 20250624080', 261, 78, 315, 'Job order 2025062408006-24-2025.png', 'Manila', 31, 50, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 11:14', 'New', '111', '20-bill_of_lading_20250624_111920.jpg', '15-packing_list_20250624_111924.jpg', '15-certificate_of_payment_20250624_111930.jpg', '31-gate_pass_20250624_111934.jpg', '33-tabs_20250624_111938.jpg', '11722.01', '974.39', '10747.62', 'Mastercard 9189', 'Wdqwdq', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(167, 'Job order 20250624255', 261, 78, 315, 'Job order 2025062425506-26-2025.png', 'Manila', 31, 50, '1', 'test', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 11:14', 'New', '111', '20-bill_of_lading_20250624_111920.jpg', '15-packing_list_20250624_111924.jpg', '15-certificate_of_payment_20250624_111930.jpg', '31-gate_pass_20250624_111934.jpg', '33-tabs_20250624_111938.jpg', '11722.01', '974.39', '10747.62', 'COD', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(168, 'Job order 20250624242', 261, 78, 315, 'Job order 2025062424206-24-2025.png', 'Manila', 31, 50, '1', 'test', '193 Trinanes St, Taguig, 1631 Metro Manila, Philippines', '14.4982021', '121.0516932', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 12:42', 'New', '1221', '22-bill_of_lading_20250624_124324.jpg', '33-packing_list_20250624_124327.jpg', '24-certificate_of_payment_20250624_124331.jpg', '18-gate_pass_20250624_124334.jpg', '26-tabs_20250624_124340.jpg', '12524.41', '1776.79', '10747.62', 'COD', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(169, 'Job order 20250624701', 261, 78, 315, 'Job order 2025062470106-24-2025.png', 'Manila', 31, 50, '1', 'test', 'Lower Bicutan, Taguig', '14.540425', '121.014513', 'smx convention center manila', '14.540402', '121.014724', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '130025.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(170, 'Job order 20250624481', 261, 78, 315, 'Job order 2025062448106-24-2025.png', 'Manila', 31, 50, '1', 'test', '3124, Pantabangan, Nueva Ecija, Philippines', '15.76590528', '121.1954064', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 12:46', 'New', '3223', '32-bill_of_lading_20250624_125105.jpg', '28-packing_list_20250624_124629.jpg', '18-certificate_of_payment_20250624_125052.jpg', '21-gate_pass_20250624_124626.jpg', '31-tabs_20250624_125057.jpg', '31476.88', '20729.26', '10747.62', 'Tara Wallet', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(171, 'Job order 20250624246', 261, 78, 315, 'Job order 2025062424606-24-2025.png', 'Manila', 31, 50, '1', 'test', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '14.5604048', '121.0164782', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 17:35', 'Bd', '1221', '18-bill_of_lading_20250624_174012.jpg', '24-packing_list_20250624_174015.jpg', '19-certificate_of_payment_20250624_174018.jpg', '19-gate_pass_20250624_174021.jpg', '31-tabs_20250624_174025.jpg', '11664.68', '917.04', '10747.62', 'Visa 2034', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(172, 'Job order 20250624012', 261, 78, 315, 'Job order 2025062401206-24-2025.png', 'Manila', 31, 50, '1', 'test', 'Yuchengco Museum, Makati, Metro Manila, Philippines', '14.5604048', '121.0164782', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 17:35', 'Bd', '1221', '18-bill_of_lading_20250624_174012.jpg', '24-packing_list_20250624_174015.jpg', '19-certificate_of_payment_20250624_174018.jpg', '19-gate_pass_20250624_174021.jpg', '31-tabs_20250624_174025.jpg', '11664.68', '917.04', '10747.62', 'COD', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(173, 'Job order 20250624483', 261, 78, 101, 'Job order 2025062448306-24-2025.png', 'Manila', 13, 14, '1', 'test', 'Riverside Drive, Manila, Metro Manila, Philippines', '14.59528949', '120.9803805', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 17:42', 'New', '121', '15-bill_of_lading_20250624_174301.jpg', '30-packing_list_20250624_174304.jpg', '17-certificate_of_payment_20250624_174307.jpg', '32-gate_pass_20250624_174310.jpg', '34-tabs_20250624_174314.jpg', '11091.52', '343.9', '10747.62', 'Visa 2034', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(174, 'Job order 20250624193', 261, 78, 315, 'Job order 2025062419306-24-2025.png', 'Manila', 31, 50, '1', 'test', 'Rizal Memorial Baseball Stadium, Manila, Metro Manila, Philippines', '14.5620181', '120.9929553', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 17:45', 'New', '1212', '35-bill_of_lading_20250624_174622.jpg', '24-packing_list_20250624_174625.jpg', '18-certificate_of_payment_20250624_174628.jpg', '20-gate_pass_20250624_174631.jpg', '22-tabs_20250624_174635.jpg', '11320.78', '573.16', '10747.62', 'Visa 2034', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(175, 'Job order 20250624307', 261, 78, 315, 'Job order 2025062430706-24-2025.png', 'Manila', 31, 50, '1', 'test', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '14.47235423', '121.0323188', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 17:58', 'New', '222', '34-bill_of_lading_20250624_175931.jpg', '35-packing_list_20250624_175934.jpg', '18-certificate_of_payment_20250624_175937.jpg', '30-gate_pass_20250624_175941.jpg', '24-tabs_20250624_175946.jpg', '12849.21', '2101.59', '10747.62', 'Visa 2109', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(176, 'Job order 20250624568', 261, 78, 315, 'Job order 2025062456806-24-2025.png', 'Manila', 31, 50, '1', 'test', '14-C Nuestra Señora Soledad Street, Parañaque, Metro Manila, Philippines', '14.47235423', '121.0323188', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 17:58', 'New', '222', '34-bill_of_lading_20250624_175931.jpg', '35-packing_list_20250624_175934.jpg', '18-certificate_of_payment_20250624_175937.jpg', '30-gate_pass_20250624_175941.jpg', '24-tabs_20250624_175946.jpg', '12849.21', '2101.59', '10747.62', 'COD', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(177, 'Job order 20250624640', 261, 78, 315, 'Job order 2025062464006-24-2025.png', 'Manila', 31, 50, '1', 'test', '40 Melantic Street, Makati, Metro Manila, Philippines', '14.54776711', '121.0177014', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 18:01', 'New', '222', '20-bill_of_lading_20250624_180156.jpg', '17-packing_list_20250624_180226.jpg', '32-certificate_of_payment_20250624_180218.jpg', '34-gate_pass_20250624_180214.jpg', '16-tabs_20250624_180208.jpg', '11846.17', '1098.55', '10747.62', 'COD', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(178, 'Job order 20250624139', 261, 78, 315, 'Job order 2025062413906-24-2025.png', 'Manila', 31, 50, '1', 'test', '40 Melantic Street, Makati, Metro Manila, Philippines', '14.54776711', '121.0177014', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 18:01', 'New', '222', '20-bill_of_lading_20250624_180156.jpg', '17-packing_list_20250624_180226.jpg', '32-certificate_of_payment_20250624_180218.jpg', '34-gate_pass_20250624_180214.jpg', '16-tabs_20250624_180208.jpg', '11846.17', '1098.55', '10747.62', 'Visa 2034', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(179, 'Job order 20250624839', 261, 78, 315, 'Job order 2025062483906-24-2025.png', 'Manila', 31, 50, '1', 'test', 'Colonel Jesus Villamor Air Base, Pasay, Metro Manila, Philippines', '14.5174233', '121.0245659', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 18:04', 'New', '1212', '19-bill_of_lading_20250624_180449.jpg', '16-packing_list_20250624_180457.jpg', '29-certificate_of_payment_20250624_180452.jpg', '28-gate_pass_20250624_180454.jpg', '18-tabs_20250624_180500.jpg', '12037.23', '1289.61', '10747.62', 'COD', '', '2025-06-24', '2025-06-24', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(180, 'Job order 20250624005', 261, 78, 0, 'Job order 2025062400506-24-2025.png', 'Manila', 0, 0, '1', 'test', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '14.52473467', '121.0132699', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 18:05', 'New', '121', '26-bill_of_lading_20250624_180808.jpg', '18-packing_list_20250624_180811.jpg', '26-certificate_of_payment_20250624_180823.jpg', '34-gate_pass_20250624_180817.jpg', '21-tabs_20250624_180820.jpg', '11807.97', '1060.35', '10747.62', 'Visa 2109', '', '2025-06-24', '2025-06-24', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(181, 'Job order 20250624025', 261, 78, 0, 'Job order 2025062402506-24-2025.png', 'Manila', 0, 0, '1', 'test', 'P3-03 1st Street, Pasay, Metro Manila, Philippines', '14.52473467', '121.0132699', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-24 18:05', 'New', '121', '26-bill_of_lading_20250624_180808.jpg', '18-packing_list_20250624_180811.jpg', '26-certificate_of_payment_20250624_180823.jpg', '34-gate_pass_20250624_180817.jpg', '21-tabs_20250624_180820.jpg', '11807.97', '1060.35', '10747.62', 'COD', '', '2025-06-24', '2025-06-24', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(182, 'Job order 20250626544', 261, 78, 315, 'Job order 2025062654406-26-2025.png', 'Manila', 31, 50, '1', 'test', 'Osmeña Highway, Makati, Metro Manila, Philippines', '14.55190769', '121.0105156', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 12:20', 'New', '1234', '18-bill_of_lading_20250626_122449.jpg', '33-packing_list_20250626_122453.jpg', '15-certificate_of_payment_20250626_122456.jpg', '31-gate_pass_20250626_122459.jpg', '28-tabs_20250626_122506.jpg', '12342.92', '1595.29', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(183, 'Job order 20250626870', 261, 78, 315, 'Job order 2025062687006-26-2025.png', 'Manila', 31, 50, '1', 'test', 'Villamor Air Base Golf Course, Pasay, Metro Manila, Philippines', '14.52966768', '121.0183613', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 12:27', 'New', '1212', '31-bill_of_lading_20250626_122753.jpg', '23-packing_list_20250626_122757.jpg', '24-certificate_of_payment_20250626_122800.jpg', '28-gate_pass_20250626_122803.jpg', '16-tabs_20250626_122807.jpg', '11884.4', '1136.78', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(184, 'Job order 20250626937', 261, 78, 315, 'Job order 2025062693706-26-2025.png', 'Manila', 31, 50, '1', 'test', 'Edsa, Makati, Metro Manila, Philippines', '14.5432402', '121.0212138', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 12:38', 'New', '1212', '24-bill_of_lading_20250626_124222.jpg', '20-packing_list_20250626_124225.jpg', '21-certificate_of_payment_20250626_124228.jpg', '21-gate_pass_20250626_124238.jpg', '34-tabs_20250626_124235.jpg', '11932.16', '1184.53', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(185, 'Job order 20250626594', 261, 78, 0, 'Job order 2025062659406-26-2025.png', 'Manila', 0, 0, '1', 'test', 'Edsa, Makati, Metro Manila, Philippines', '14.5432402', '121.0212138', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 12:38', 'New', '1212', '24-bill_of_lading_20250626_124222.jpg', '20-packing_list_20250626_124225.jpg', '21-certificate_of_payment_20250626_124228.jpg', '21-gate_pass_20250626_124238.jpg', '34-tabs_20250626_124235.jpg', '11932.16', '1184.53', '10747.62', 'COD', '', '2025-06-26', '2025-06-26', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(186, 'Job order 20250626803', 261, 78, 315, 'Job order 2025062680306-26-2025.png', 'Manila', 31, 50, '1', 'test', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '14.49449144', '121.0422385', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 13:31', 'New', '112', '26-bill_of_lading_20250626_133235.jpg', '17-packing_list_20250626_133238.jpg', '32-certificate_of_payment_20250626_133250.jpg', '26-gate_pass_20250626_133244.jpg', '35-tabs_20250626_133246.jpg', '12524.41', '1776.79', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(187, 'Job order 20250626667', 261, 78, 315, 'Job order 2025062666706-26-2025.png', 'Manila', 31, 50, '1', 'test', '3166-C East Service Road, Parañaque, Metro Manila, Philippines', '14.49449144', '121.0422385', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 13:31', 'New', '112', '26-bill_of_lading_20250626_133235.jpg', '17-packing_list_20250626_133238.jpg', '32-certificate_of_payment_20250626_133250.jpg', '26-gate_pass_20250626_133244.jpg', '35-tabs_20250626_133246.jpg', '12524.41', '1776.79', '10747.62', 'COD', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(188, 'Job order 20250626548', 261, 78, 315, 'Job order 2025062654806-26-2025.png', 'Manila', 31, 50, '1', 'test', '3121, San Jose City, Nueva Ecija, Philippines', '15.76229499', '121.0433676', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 13:36', 'New', '323', '26-bill_of_lading_20250626_133634.jpg', '16-packing_list_20250626_133637.jpg', '15-certificate_of_payment_20250626_133640.jpg', '22-gate_pass_20250626_133643.jpg', '23-tabs_20250626_133647.jpg', '29661.88', '18914.26', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(189, 'Job order 20250626347', 261, 78, 315, 'Job order 2025062634706-26-2025.png', 'Manila', 31, 50, '1', 'test', '2315, Capas, Tarlac, Philippines', '15.39373088', '120.4795648', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 13:40', 'Dad', '1212', '21-bill_of_lading_20250626_134039.jpg', '27-packing_list_20250626_134043.jpg', '16-certificate_of_payment_20250626_134045.jpg', '33-gate_pass_20250626_134049.jpg', '29-tabs_20250626_134054.jpg', '23070.56', '12322.93', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(190, 'Job order 20250626013', 261, 78, 315, 'Job order 2025062601306-26-2025.png', 'Manila', 31, 50, '1', 'test', 'Ragay Gulf, Calabarzon, Philippines', '13.77638896', '122.5475414', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 13:41', 'Defer', '1221', '23-bill_of_lading_20250626_134151.jpg', '19-packing_list_20250626_134154.jpg', '29-certificate_of_payment_20250626_134157.jpg', '24-gate_pass_20250626_134200.jpg', '31-tabs_20250626_134203.jpg', '35488.99', '24741.37', '10747.62', 'Mastercard 9189', 'Eqdqefwfew', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(191, 'Job order 20250626277', 261, 78, 315, 'Job order 2025062627706-26-2025.png', 'Manila', 31, 50, '1', 'test', '4318, Calauag, Quezon, Philippines', '13.99395545', '122.2979997', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 13:42', 'Nfjf', '121', '25-bill_of_lading_20250626_134321.jpg', '29-packing_list_20250626_134324.jpg', '15-certificate_of_payment_20250626_134330.jpg', '17-gate_pass_20250626_134327.jpg', '26-tabs_20250626_134333.jpg', '33673.99', '22926.37', '10747.62', 'Tara Wallet', 'Ewwecq', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(192, 'Job order 20250626111', 261, 78, 315, 'Job order 2025062611106-26-2025.png', 'Manila', 31, 50, '1', 'test', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '14.54370106', '120.9982913', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:31', 'New', '2212', '27-bill_of_lading_20250626_143228.jpg', '34-packing_list_20250626_143232.jpg', '31-certificate_of_payment_20250626_143235.jpg', '23-gate_pass_20250626_143239.jpg', '28-tabs_20250626_143243.jpg', '11502.29', '754.66', '10747.62', 'Visa 2034', 'Sdvsvsv', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(193, 'Job order 20250626487', 261, 78, 0, 'Job order 2025062648706-26-2025.png', 'Manila', 0, 0, '1', 'test', 'P. Villanueva Street, Pasay, Metro Manila, Philippines', '14.54370106', '120.9982913', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:31', 'New', '2212', '27-bill_of_lading_20250626_143228.jpg', '34-packing_list_20250626_143232.jpg', '31-certificate_of_payment_20250626_143235.jpg', '23-gate_pass_20250626_143239.jpg', '28-tabs_20250626_143243.jpg', '11502.29', '754.66', '10747.62', 'Visa 2034', 'Sdvsvsv', '2025-06-26', '2025-06-26', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(194, 'Job order 20250626954', 261, 78, 315, 'Job order 2025062695406-26-2025.png', 'Manila', 31, 50, '1', 'test', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '14.60450935', '121.0203788', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:44', 'We', '121', '26-bill_of_lading_20250626_144503.jpg', '19-packing_list_20250626_144506.jpg', '22-certificate_of_payment_20250626_144519.jpg', '16-gate_pass_20250626_144516.jpg', '26-tabs_20250626_144513.jpg', '11540.49', '792.87', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(195, 'Job order 20250626023', 261, 78, 315, 'Job order 2025062602306-26-2025.png', 'Manila', 31, 50, '1', 'test', '1 Rivera Street, San Juan City, Metro Manila, Philippines', '14.60450935', '121.0203788', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:44', 'We', '121', '26-bill_of_lading_20250626_144503.jpg', '19-packing_list_20250626_144506.jpg', '22-certificate_of_payment_20250626_144519.jpg', '16-gate_pass_20250626_144516.jpg', '26-tabs_20250626_144513.jpg', '11540.49', '792.87', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(196, 'Job order 20250626878', 261, 78, 315, 'Job order 2025062687806-26-2025.png', 'Manila', 31, 50, '1', 'test', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '14.56834518', '121.0241902', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:47', 'Ngqweq', '2121', '22-bill_of_lading_20250626_144748.jpg', '24-packing_list_20250626_144752.jpg', '22-certificate_of_payment_20250626_144755.jpg', '18-gate_pass_20250626_144757.jpg', '20-tabs_20250626_144745.jpg', '11741.09', '993.47', '10747.62', 'Tara Wallet', 'Dead', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(197, 'Job order 20250626622', 261, 78, 315, 'Job order 2025062662206-26-2025.png', 'Manila', 31, 50, '1', 'test', '1757 Nicanor T. Garcia Street, Makati, Metro Manila, Philippines', '14.56834518', '121.0241902', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:47', 'Ngqweq', '2121', '22-bill_of_lading_20250626_144748.jpg', '24-packing_list_20250626_144752.jpg', '22-certificate_of_payment_20250626_144755.jpg', '18-gate_pass_20250626_144757.jpg', '20-tabs_20250626_144745.jpg', '11741.09', '993.47', '10747.62', 'Tara Wallet', 'Dead', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(198, 'Job order 20250626826', 261, 78, 315, 'Job order 2025062682606-26-2025.png', 'Manila', 31, 50, '1', 'test', '3013, Norzagaray, Bulacan, Philippines', '14.88094564', '121.1803786', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:57', 'Shang', '232', '35-bill_of_lading_20250626_145741.jpg', '17-packing_list_20250626_145744.jpg', '22-certificate_of_payment_20250626_145748.jpg', '21-gate_pass_20250626_145751.jpg', '32-tabs_20250626_145755.jpg', '17233.89', '6486.27', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(199, 'Job order 20250626091', 261, 78, 315, 'Job order 2025062609106-26-2025.png', 'Manila', 31, 50, '1', 'test', '3013, Norzagaray, Bulacan, Philippines', '14.88094564', '121.1803786', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 14:57', 'Shang', '232', '35-bill_of_lading_20250626_145741.jpg', '17-packing_list_20250626_145744.jpg', '22-certificate_of_payment_20250626_145748.jpg', '21-gate_pass_20250626_145751.jpg', '32-tabs_20250626_145755.jpg', '17233.89', '6486.27', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(200, 'Job order 20250626045', 261, 78, 315, 'Job order 2025062604506-26-2025.png', 'Manila', 31, 50, '1', 'test', '3707 Bautista Street, Makati, Metro Manila, Philippines', '14.55945903', '121.0009751', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 15:02', 'New', '321', '29-bill_of_lading_20250626_150256.jpg', '17-packing_list_20250626_150300.jpg', '24-certificate_of_payment_20250626_150304.jpg', '31-gate_pass_20250626_150306.jpg', '19-tabs_20250626_150310.jpg', '11492.72', '745.09', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(201, 'Job order 20250626047', 261, 78, 315, 'Job order 2025062604706-26-2025.png', 'Manila', 31, 50, '1', 'test', 'Decena Street, Pasay, Metro Manila, Philippines', '14.54432658', '121.0006292', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 15:05', 'Cascade', '322', '32-bill_of_lading_20250626_150547.jpg', '30-packing_list_20250626_150550.jpg', '30-certificate_of_payment_20250626_150604.jpg', '33-gate_pass_20250626_150556.jpg', '22-tabs_20250626_150601.jpg', '11550.06', '802.4400000000001', '10747.62', 'Tara Wallet', 'Rare', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(202, 'Job order 20250626913', 261, 78, 315, 'Job order 2025062691306-26-2025.png', 'Manila', 31, 50, '1', 'test', '3115, Guimba, Nueva Ecija, Philippines', '15.67808016', '120.8054106', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-06-26 15:30', 'Brew', '2131', '26-bill_of_lading_20250626_153058.jpg', '31-packing_list_20250626_153101.jpg', '35-certificate_of_payment_20250626_153104.jpg', '28-gate_pass_20250626_153056.jpg', '34-tabs_20250626_153053.jpg', '26605.04', '15857.41', '10747.62', 'Visa 2109', '', '2025-06-26', '2025-06-26', 1, 'Cancelled', 'test', 'dggdg', '2025-06-26', NULL, NULL, NULL, NULL),
(203, 'Job order 20250626685', 261, 78, 0, 'Job order 2025062668506-26-2025.png', 'Manila', 0, 0, '1', 'test', 'Lower Bicutan, Taguig', '14.540425', '121.014513', 'smx convention center manila', '14.540402', '121.014724', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '25.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-26', '2025-06-26', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(204, 'Job order 20250626134', 261, 78, 315, 'Job order 2025062613406-26-2025.png', 'Manila', 31, 50, '1', 'test', 'Lower Bicutan, Taguig', '14.540425', '121.014513', 'smx convention center manila', '14.540402', '121.014724', '2024-12-28 16:20', 'new', '142 Kg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '35-MHBSH12.jpg', '325.32', '139277.7', '10747.62', 'COD', 'Notes', '2025-06-26', '2025-06-26', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(205, 'Job order 20250704630', 261, 78, 315, 'Job order 2025070463007-04-2025.png', 'Manila', 31, 50, '1', 'Karl', '3702, Bambang, Nueva Vizcaya, Philippines', '16.38302872', '121.1510183', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-07-04 17:24', '1232', '231', '17-bill_of_lading_20250704_172524.jpg', '24-packing_list_20250704_172542.jpg', '27-certificate_of_payment_20250704_172544.jpg', '21-gate_pass_20250704_172547.jpg', '30-tabs_20250704_172552.jpg', '38259.27', '27511.65', '10747.62', 'Visa 2034', '', '2025-07-04', '2025-07-04', 3, 'DriverConfirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(206, 'Job order 20250704530', 261, 78, 0, 'Job order 2025070453007-04-2025.png', 'Manila', 0, 0, '1', 'Karl', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '9 J. Climaco Street, Makati, Metro Manila, Philippines', '14.540402', '121.014724', '2025-07-04 17:27', 'Dads', '323', '34-bill_of_lading_20250704_172806.jpg', '33-packing_list_20250704_172810.jpg', '30-certificate_of_payment_20250704_172812.jpg', '29-gate_pass_20250704_172815.jpg', '30-tabs_20250704_172819.jpg', '11722.01', '974.39', '10747.62', 'Mastercard 9189', '', '2025-07-04', '2025-07-04', 2, 'Pending', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_truck_partner`
--

CREATE TABLE `tbl_truck_partner` (
  `id` int NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `contact_person_phone_mobile_code` varchar(255) DEFAULT NULL,
  `contact_person_phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `company_type` varchar(255) DEFAULT NULL,
  `refrence_number` varchar(255) DEFAULT NULL,
  `business_permit_doc` varchar(255) DEFAULT NULL,
  `business_permit_doc_status` int NOT NULL DEFAULT '0',
  `bir_doc` varchar(255) DEFAULT NULL,
  `bir_doc_status` int NOT NULL DEFAULT '0',
  `cor_doc` varchar(255) DEFAULT NULL,
  `cor_doc_status` int NOT NULL DEFAULT '0',
  `ltfrb_doc` varchar(255) DEFAULT NULL,
  `ltfrb_doc_status` int NOT NULL DEFAULT '0',
  `ppa_doc` varchar(255) DEFAULT NULL,
  `ppa_doc_status` int NOT NULL DEFAULT '0',
  `ctap_doc` varchar(255) DEFAULT NULL,
  `ctap_doc_status` int NOT NULL DEFAULT '0',
  `acto_doc` varchar(255) NOT NULL,
  `acto_doc_status` int NOT NULL DEFAULT '0',
  `mayors_permit_doc` varchar(255) DEFAULT NULL,
  `mayors_permit_doc_status` int NOT NULL DEFAULT '0',
  `sec_certificate_doc` varchar(255) DEFAULT NULL,
  `sec_certificate_doc_status` int NOT NULL DEFAULT '0',
  `articles_of_incorporation_doc` varchar(255) DEFAULT NULL,
  `articles_of_incorporation_doc_status` int NOT NULL DEFAULT '0',
  `inland_marine_insurance_doc` varchar(255) DEFAULT NULL,
  `inland_marine_insurance_doc_status` int NOT NULL DEFAULT '0',
  `oc_cr_doc` varchar(255) DEFAULT NULL,
  `oc_cr_doc_status` int NOT NULL DEFAULT '0',
  `pa_cpc_doc` varchar(255) DEFAULT NULL,
  `pa_cpc_doc_status` int NOT NULL DEFAULT '0',
  `deed_of_sale_doc` varchar(255) DEFAULT NULL,
  `deed_of_sale_doc_status` int NOT NULL DEFAULT '0',
  `bank_certificate1_doc` varchar(255) DEFAULT NULL,
  `bank_certificate1_doc_status` int NOT NULL DEFAULT '0',
  `bank_certificate2_doc` varchar(255) DEFAULT NULL,
  `bank_certificate2_doc_status` int NOT NULL DEFAULT '0',
  `fs_past_2yrs_doc` varchar(255) DEFAULT NULL,
  `fs_past_2yrs_doc_status` int DEFAULT NULL,
  `gps_device_doc` varchar(255) DEFAULT NULL,
  `gps_device_doc_status` int NOT NULL DEFAULT '0',
  `organizational_chart_doc` varchar(255) DEFAULT NULL,
  `organizational_chart_doc_status` int NOT NULL DEFAULT '0',
  `status` int DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `created_by` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int NOT NULL,
  `otp` int NOT NULL,
  `token` text NOT NULL,
  `refresh_token` text,
  `role` varchar(255) DEFAULT NULL COMMENT 'user,car_owner,truck_driver,truck_partner',
  `truck_id` int NOT NULL DEFAULT '0',
  `chassis_id` int NOT NULL DEFAULT '0',
  `trailer_type` int NOT NULL DEFAULT '0',
  `total_earning` int NOT NULL DEFAULT '0',
  `profile_image` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `lng` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `street` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `province` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `license` varchar(255) DEFAULT NULL,
  `supporting_id` varchar(255) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `social_id` varchar(255) DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `os_version` varchar(255) DEFAULT NULL,
  `udid` varchar(255) DEFAULT NULL,
  `otp_flag` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) NOT NULL,
  `contact_person` varchar(255) NOT NULL,
  `company_type` varchar(255) NOT NULL,
  `business_permit` varchar(255) NOT NULL,
  `bir` varchar(255) NOT NULL,
  `cor` varchar(255) NOT NULL,
  `ltfrb_franchise_certificate` varchar(255) NOT NULL,
  `ppa` varchar(255) NOT NULL,
  `membership_from_ctap` varchar(255) NOT NULL,
  `acto` varchar(255) NOT NULL,
  `mayors_permit` varchar(255) NOT NULL,
  `sec_certificate` varchar(255) NOT NULL,
  `articles_of_incorporation` varchar(255) NOT NULL,
  `inland_marine_insurance` varchar(255) NOT NULL,
  `oc_cr` varchar(255) NOT NULL,
  `pa_cpc` varchar(255) NOT NULL,
  `deed_of_sale` varchar(255) NOT NULL,
  `bank_certificate` varchar(255) NOT NULL,
  `fs_past_2year` varchar(255) NOT NULL,
  `gps_device` varchar(255) NOT NULL,
  `organizational_chart` varchar(255) NOT NULL,
  `refrence_number` varchar(255) NOT NULL,
  `truck_refrence_number` varchar(255) NOT NULL,
  `driver_licence` varchar(255) NOT NULL,
  `valid_govt_id` varchar(255) NOT NULL,
  `company_id` varchar(255) NOT NULL,
  `bio_data` varchar(255) NOT NULL,
  `drug_text_result` varchar(255) NOT NULL,
  `nbi_clearance` varchar(255) NOT NULL,
  `police_clearance` varchar(255) NOT NULL,
  `personal_accident_insurance` varchar(255) NOT NULL,
  `vacination_card` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `otp`, `token`, `refresh_token`, `role`, `truck_id`, `chassis_id`, `trailer_type`, `total_earning`, `profile_image`, `f_name`, `l_name`, `username`, `email`, `phone`, `password`, `lat`, `lng`, `address`, `dob`, `gender`, `street`, `village`, `city`, `province`, `zipcode`, `license`, `supporting_id`, `provider`, `social_id`, `os`, `os_version`, `udid`, `otp_flag`, `status`, `created`, `company_name`, `contact_person`, `company_type`, `business_permit`, `bir`, `cor`, `ltfrb_franchise_certificate`, `ppa`, `membership_from_ctap`, `acto`, `mayors_permit`, `sec_certificate`, `articles_of_incorporation`, `inland_marine_insurance`, `oc_cr`, `pa_cpc`, `deed_of_sale`, `bank_certificate`, `fs_past_2year`, `gps_device`, `organizational_chart`, `refrence_number`, `truck_refrence_number`, `driver_licence`, `valid_govt_id`, `company_id`, `bio_data`, `drug_text_result`, `nbi_clearance`, `police_clearance`, `personal_accident_insurance`, `vacination_card`) VALUES
(47, 423783, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44680127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44680127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44680127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44680127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44680127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*', 'car_owner', 0, 0, 0, 0, '26-20250109173847.jpg', 'Hans4', 'Magpantay', '', 'hans@gmail.com', '09000000000', 'f2a0ffe83ec8d44f2be4b624b0f47dde', NULL, NULL, NULL, '1997-08-07', 'Male', NULL, NULL, NULL, NULL, '1233', '15-1651666086270_SKU-4253_0.jpg', '15-1651666086270_SKU-4253_0.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(49, 529416, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93940127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93940127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93940127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93940127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93940127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*', 'car_owner', 0, 0, 0, 0, '26-20250303141629.jpg', 'Hans4', 'Magpantay', '', 'hans4@gmail.com', '09000000004', 'f2a0ffe83ec8d44f2be4b624b0f47dde', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', '32-20240730160319.jpg', '25-20240730160320.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(51, 140631, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79500127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79500127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79500127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79500127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79500127924587413698552@#$%&*', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'Gelo', 'Bee', '', 'lvytncrstldrg@gmail.com', '09478499473', 'e807f1fcf82d132f9bb018ca6738a19f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(52, 514755, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz630127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Hans', 'Magpantay', '', 'hans5@gmail.com', '09000000005', 'f2a0ffe83ec8d44f2be4b624b0f47dde', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-07-26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(69, 550909, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz94860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz94860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz94860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz94860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz94860127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*', 'car_owner', 0, 0, 0, 0, '1715524197.png', 'mahendra', 'Kumar', '', 'm.bhau@gmail.com', '8854842815', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, '1990-05-01', 'Male', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-09-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(74, 762042, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89780127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'truckpartner@gmail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-09-24', 'TCS 3 Transport', 'Mahendra kumar', 'Partner/Corporation', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', 'TARA588537', '', '', '', '', '', '', '', '', '', ''),
(75, 410334, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27320127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27320127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27320127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27320127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27320127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*', 'driver', 1, 4, 1, 0, NULL, 'Same', 'tomu', '', 'driver@gmail.com', '8854787415', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2024-09-24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(78, 896754, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10790127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10790127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10790127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10790127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10790127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2901279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'truckpartner2@gmail.com', '5874587457', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '28-2025-02-26-14:34:01.791441.png', '21-2025-02-26-14:34:02.334630.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-03', 'TCS1 Transport', 'Mahendra kumar', 'Partner/Corporation', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '16-1.png', 'TARA483800', '', '', '', '', '', '', '', '', '', ''),
(97, 524957, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12560127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12560127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12560127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12560127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz12560127924587413698552@#$%&*', NULL, 'driver', 0, 0, 0, 0, NULL, 'Same', 'tomu', '', 'driver1@gmail.com', '1234567895', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '14.5833', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(98, 491353, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49860127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49860127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*', 'driver', 0, 0, 0, 0, NULL, 'd1', 'd1', '', 'd1@gmail.com', '1', '9948c645c094247794f4c7acdbeb2bb6', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(99, 601966, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4730127924587413698552@#$%&*', NULL, 'driver', 0, 0, 0, 0, NULL, 'd2', 'd2', '', 'd2@gmail.com', '2', 'b25b0651e4b6e887e5194135d3692631', '14.5833', '14.5833', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-10-30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA483800', '16-20241030165218.jpg', '21-20241030165219.jpg', '18-20241030165219.jpg', '16-20241030165219.jpg', '22-20241030165219.jpg', '32-20241030165220.jpg', '15-20241030165220.jpg', '18-20241030165220.jpg', '22-20241030165220.jpg'),
(101, 601965, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67330127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5501279698552@#$%&*', 'driver', 13, 14, 1, 0, NULL, 'tom', 'query', '', 'toms@gmail.com', '1236541235', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-11-16', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '28-61zUNkgomzL._AC_UF1000,1000_QL80_.jpg', '15-download-(1).jpg', '28-Aaadhaar-Update-process.jpg', '19-girl2.jpeg', '28-AdobeStock_182262131.jpeg', '26-gud.jpg', '34-buckwheat.jpeg', '19-large_thumb-(2).jfif', '34-download-(1).jpg'),
(108, 373716, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11580127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Jose', 'Rizal', '', 'carowner@gmail.com', '09123456790', '08c16762de60ceac0c96d0f0e0451f88', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-02', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(109, 322900, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22090127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3501279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Hans', 'CarOwner', '', 'hanscar@gmail.com', '09000000010', 'f2a0ffe83ec8d44f2be4b624b0f47dde', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2024-12-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(114, 747145, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'chain@gmail.com', '1234567', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-03', 'Fsgsggs', 'Gsggsgs', 'Gzgdggxgd', '33-20250103172915.jpg', '22-20250103172916.jpg', '23-20250103172917.jpg', '16-20250103172917.jpg', '30-20250103172917.jpg', '34-20250103172918.jpg', '24-20250103172918.jpg', '23-20250103172918.jpg', '23-20250103172919.jpg', '24-20250103172919.jpg', '35-20250103172920.jpg', '34-20250103172920.jpg', '20-20250103172920.jpg', '27-20250103172921.jpg', '20-20250103172921.jpg', '35-20250103172921.jpg', '15-20250103172922.jpg', '15-20250103172922.jpg', 'TARA754844', '', '', '', '', '', '', '', '', '', ''),
(115, 257085, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64880127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64880127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64880127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64880127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64880127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'chain12@gmail.com', '12345678900', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-03', 'Jvvxfxgfdvc', 'Vcvccvcb', 'Sfdfvxcg', '22-20250103173738.jpg', '27-20250103173739.jpg', '29-20250103173739.jpg', '17-20250103173739.jpg', '15-20250103173740.jpg', '22-20250103173740.jpg', '23-20250103173740.jpg', '18-20250103173740.jpg', '31-20250103173741.jpg', '15-20250103173741.jpg', '33-20250103173741.jpg', '32-20250103173741.jpg', '29-20250103173742.jpg', '28-20250103173742.jpg', '33-20250103173742.jpg', '28-20250103173743.jpg', '31-20250103173743.jpg', '17-20250103173743.jpg', 'TARA384588', '', '', '', '', '', '', '', '', '', ''),
(116, 778353, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30750127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30750127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30750127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30750127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30750127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7601279698552@#$%&*', 'driver', 10, 11, 1, 0, NULL, 'Vxxgcbbcbc', 'Vxxgxvgf', '', 'chain1234@gmail.com', '5555552159561', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '14.5833', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA384588', '28-20250103174320.jpg', '19-20250103174321.jpg', '31-20250103174321.jpg', '17-20250103174322.jpg', '18-20250103174322.jpg', '25-20250103174322.jpg', '26-20250103174323.jpg', '23-20250103174323.jpg', '23-20250103174323.jpg'),
(122, 588838, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'mahendra', 'kumar', '', 'm.bhau9@gmail.com', '8854842805', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(124, 617680, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'sanju', 'kumar ', '', 'sanju1@gmail.com', '12345678', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(126, 878771, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84400127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84400127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84400127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84400127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84400127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'sagar', 'sharma', '', 'sagar12@gmail.com', '1122334455667', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '23-2025-02-25-18:12:11.344335.png', '23-2025-02-25-18:12:11.898423.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(127, 186362, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz38260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz38260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz38260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz38260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz38260127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'sagar ', 'k', '', 'sagar123@gmail.com', '111222333444', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(134, 719910, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'Sanjay ', 'kumar', '', 'kumar@gmail.com', '123123123', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(139, 659875, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'sagar ', 'kumar ', '', 'sagar2@gmail.com', '01122334455', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(142, 146131, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24180127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3901279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'truckpartner1@gmail.com', '58745874561', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-08', 'TCS Transport', 'Mahendra kumar', '', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', 'TARA562552', '', '', '', '', '', '', '', '', '', ''),
(143, 384054, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'bhau@gmail.com', '1122334455667788', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-08', 'bhau', 'mohit ', '2', '21-2025-01-08-17:17:25.098934.png', 'null', 'null', 'null', 'null', '21-2025-01-08-17:17:31.328959.png', 'null', 'null', '17-2025-01-08-17:17:36.497345.png', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'TARA287208', '', '', '', '', '', '', '', '', '', ''),
(144, 987762, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'mohan@gmail.com', '0011223344', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-08', 'Td', 'mohan ', '1', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'TARA073012', '', '', '', '', '', '', '', '', '', ''),
(145, 434178, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'sqnsh@gmail.com', '545454554', 'ab4b40a2752ce9a5a98315297fd637a8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-08', 'Sanjay ', 'Sanjay ', '1', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', '32-2025-01-08-17:26:55.035100.png', 'null', 'null', 'null', 'TARA179359', '', '', '', '', '', '', '', '', '', ''),
(146, 849610, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'Same', 'tomu', '', 'driver11@gmail.com', '88547874151', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(147, 587629, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'sam', 'k', '', 'sam@gmail.com', '2134554678', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '20-2025-01-09-11:02:21.670736.png', '21-2025-01-09-11:02:16.514757.png', '32-2025-01-09-11:02:02.544231.png', '33-2025-01-09-11:02:13.572843.png', '25-2025-01-09-11:01:56.540813.png', '17-2025-01-09-11:01:48.762302.png', '26-2025-01-09-11:01:41.001462.png', '16-2025-01-09-11:01:43.996632.png', '32-2025-01-09-11:01:38.520808.png'),
(148, 714509, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70460127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9901279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Sanjay', 'Kumar ', '', 'sanjay1234@gmail.com', '1234567890000', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(149, 860932, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31570127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3201279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Sanjay ', 'Kumar ', '', 'sanjay12345@gmail.com', '12345678900000', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(151, 686290, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz23280127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz23280127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz23280127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz23280127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz23280127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'sagar', 'kumar ', '', 'sagark@gmail.com', '12345677', 'e10adc3949ba59abbe56e057f20f883e', '26.8572062', '75.7746131', '37-B, Mansarovar, Jaipur, Rajasthan, India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(152, 798628, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33700127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5601279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, NULL, NULL, '', NULL, NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(153, 856959, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz88830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz88830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz88830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz88830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz88830127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'sagark12@gmail.com', '1122334457', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-10', 'sagar', 'sagar', '1', '19-2025-01-10-16:58:10.120124.png', '25-2025-01-10-16:58:12.468373.png', '18-2025-01-10-16:58:19.931626.png', '23-2025-01-10-16:58:25.758924.png', '25-2025-01-10-16:58:33.081352.png', '27-2025-01-10-16:58:41.074302.png', '28-2025-01-10-16:58:52.731478.png', '25-2025-01-10-16:59:00.493012.png', '27-2025-01-10-16:59:09.644040.png', '25-2025-01-10-16:59:17.119372.png', '18-2025-01-10-16:59:27.733043.png', '18-2025-01-10-16:59:36.385985.png', '22-2025-01-10-16:59:44.046654.png', '19-2025-01-10-16:59:51.300033.png', '21-2025-01-10-16:59:59.491115.png', '15-2025-01-10-17:00:06.962081.png', '29-2025-01-10-17:00:13.877008.png', '16-2025-01-10-17:00:21.080085.png', 'TARA054730', '', '', '', '', '', '', '', '', '', ''),
(154, 159487, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14260127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14260127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*', 'driver', 0, 0, 0, 0, NULL, 'sagar', 'kumar', '', 'sagark1234@gmail.com', '123123456', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(155, 987409, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz74310127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz74310127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz74310127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz74310127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz74310127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1801279698552@#$%&*', 'user', 0, 0, 0, 0, '29-20250113110552.jpg', 'Hans', 'Magpantay', '', 'hans2@gmail.com', '09055461905', 'f2a0ffe83ec8d44f2be4b624b0f47dde', '14.5405859', '121.0147308', 'Mansarovar, Jaipur, Rajasthan, India', '', '', NULL, NULL, NULL, NULL, '', '23-Screenshot-0318-084625.png', '23-Screenshot-0318-084625.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(156, 462196, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Gelo ', 'V', '', 'lvytnnn@gmail.com', '09940680893', 'b6bc0243cdb96e6cf814e7fc90709579', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-01-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(158, 440605, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'karl2@gmail.com', '09846247105', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(159, 751323, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'karl3@gmail.com', '09452748527', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(160, 650815, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Trix', 'Bendijo', '', 'trix@gmail.com', '09785623109', 'cf513cdee0d025c2b397110247dacb69', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(161, 938114, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67140127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67140127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67140127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67140127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz67140127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9101279698552@#$%&*', 'user', 0, 0, 0, 0, '28-2025-05-08-11:22:17.962595.png', 'sagar ', 'kumar ', '', 'sagark123@gmail.com', '2454554676', 'e10adc3949ba59abbe56e057f20f883e', '26.8571781', '75.7746096', '37-B, Mansarovar, Jaipur, Rajasthan, India', '', '', '', '', '', '', NULL, '33-2025-02-26-11:21:03.338272.png', '15-2025-02-26-11:21:04.001634.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(162, 848726, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70580127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'ey', 'bi', '', 'lvytnncrstldrgn@gmail.com', '09478499470', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(163, 933521, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36100127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36100127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36100127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36100127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36100127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Josephine ', 'Bendijo ', '', 'bendijoj60@gmail.com', '09763687425', '49c13790ef1caec549c4f47c61b776cf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-01-21', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(164, 490504, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29580127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'shyam ', 'kumar ', '', 'shyam1@gmail.com', '114477885522', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(165, 865930, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz90760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz90760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz90760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz90760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz90760127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Ankit ', 'sharma', '', 'ankit@gmail.com', '0077889966', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(166, 111955, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31460127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'sagar@gmail.com', '58745874562', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-06', 'AK Transport', 'Mahendra kumar', 'Select', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'null', 'TARA217744', '', '', '', '', '', '', '', '', '', ''),
(167, 273588, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54950127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*', 'driver', 0, 0, 1, 0, '31-2025-04-25-18:09:39.711381.png', 'sagar', 'kumar', '', 'sagark12345@gmail.com', '12312345677', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, '', '', '', '', '', '', NULL, '26-2025-02-28-12:45:23.190684.png', '31-2025-02-28-12:45:23.793572.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(168, 884913, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz70240127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Kian James', 'Rapisura', '', 'kianjamesrapira0322@gmail.com', '09673929394', 'e43a9ca45f290272d69d47f4b58870d4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(170, 402714, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz13990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz13990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz13990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz13990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz13990127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*', 'driver', 9, 17, 1, 0, '28-2025-02-13-17:02:16.853578.png', 'sagar', 'kumar', '', 'sagark123456@gmail.com', '123123456778', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, '', '', '', '', '', '', NULL, '35-2025-02-25-16:24:59.463907.png', '33-2025-02-25-16:25:02.957934.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(171, 299783, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz83230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz83230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz83230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz83230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz83230127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Norman', 'Aguilar', '', 'normandaniel.aguilar@gmail.com', '9178632151', '1e18c05fa19a65ef6b17f0ba4d76f8bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbl_users` (`id`, `otp`, `token`, `refresh_token`, `role`, `truck_id`, `chassis_id`, `trailer_type`, `total_earning`, `profile_image`, `f_name`, `l_name`, `username`, `email`, `phone`, `password`, `lat`, `lng`, `address`, `dob`, `gender`, `street`, `village`, `city`, `province`, `zipcode`, `license`, `supporting_id`, `provider`, `social_id`, `os`, `os_version`, `udid`, `otp_flag`, `status`, `created`, `company_name`, `contact_person`, `company_type`, `business_permit`, `bir`, `cor`, `ltfrb_franchise_certificate`, `ppa`, `membership_from_ctap`, `acto`, `mayors_permit`, `sec_certificate`, `articles_of_incorporation`, `inland_marine_insurance`, `oc_cr`, `pa_cpc`, `deed_of_sale`, `bank_certificate`, `fs_past_2year`, `gps_device`, `organizational_chart`, `refrence_number`, `truck_refrence_number`, `driver_licence`, `valid_govt_id`, `company_id`, `bio_data`, `drug_text_result`, `nbi_clearance`, `police_clearance`, `personal_accident_insurance`, `vacination_card`) VALUES
(172, 881393, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87190127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87190127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87190127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87190127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87190127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4001279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'tp@gmail.com', '09852574785', '390cdf008defd8c672607fb0d4fa95a1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-20', 'Truck Partner', 'Contact Person', 'Truck Partner', '19-20250220135414.jpg', '31-20250220135414.jpg', '28-20250220135414.jpg', '28-20250220135415.jpg', '26-20250220135415.jpg', '15-20250220135415.jpg', '23-20250220135415.jpg', '30-20250220135416.jpg', '26-20250220135416.jpg', '30-20250220135416.jpg', '17-20250220135416.jpg', '31-20250220135417.jpg', '20-20250220135417.jpg', '26-20250220135417.jpg', '34-20250220135417.jpg', '19-20250220135418.jpg', '33-20250220135418.jpg', '22-20250220135418.jpg', 'TARA116324', '', '', '', '', '', '', '', '', '', ''),
(173, 977870, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz4930127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4201279698552@#$%&*', 'driver', 0, 0, 0, 0, NULL, 'Truck', 'Driver', '', 'td@gmail.com', '09572846582', '626726e60bd1215f36719a308a25b798', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA116324', '25-20250220135851.jpg', '35-20250220135851.jpg', '32-20250220135852.jpg', '16-20250220135852.jpg', '23-20250220135852.jpg', '29-20250220135853.jpg', '26-20250220135853.jpg', '25-20250220135853.jpg', '29-20250220135854.jpg'),
(174, 233223, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'Sanjay', 'kumar', '', 'sanjay@gmail.com', '12312345678', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-20', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA054730', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(175, 391421, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89650127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89650127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89650127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89650127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89650127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*', 'driver', 21, 19, 2, 0, NULL, 'Sanjay', 'kumar', '', 'sanjay1@gmail.com', '123123456781', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA054730', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(176, 297905, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91930127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*', 'driver', 0, 0, 0, 0, NULL, 'Sanjay', 'kumar', '', 'sanjay11@gmail.com', '1231234567811', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '31-2025-02-25-16:00:44.808179.png', '16-2025-02-25-16:00:45.478859.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(177, 387211, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36000127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1401279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Reginald', 'Unisa', '', 'yugotabata@gmail.com', '09270130174', '6f10ae4af2b1216275234f1b4f4040ef', NULL, NULL, NULL, '2002-05-14', 'Lalaki', NULL, NULL, NULL, NULL, '1000', '29-20250227131100.jpg', '34-20250227131105.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(178, 885672, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89010127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89010127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89010127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89010127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz89010127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6301279698552@#$%&*', 'user', 0, 0, 0, 0, '32-20250228102501.jpg', 'Welmher', 'Hernandez', '', 'welmherhernandez67@gmail.com', '09278822700', '7186a25ecd8f19c1018fabdee5064562', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-02-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(182, 987576, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'ReginaldU@proton.me', '0998723476', '6f10ae4af2b1216275234f1b4f4040ef', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-02-28', 'Reginald', 'Durbe', 'Transport', '26-20250228111738.jpg', '23-20250228111739.jpg', '15-20250228111739.jpg', '19-20250228111740.jpg', '31-20250228111740.jpg', '17-20250228111741.jpg', '15-20250228111741.jpg', '18-20250228111742.jpg', '28-20250228111742.jpg', '33-20250228111743.jpg', '22-20250228111744.jpg', '25-20250228111744.jpg', '21-20250228111745.jpg', '29-20250228111746.jpg', '26-20250228111747.jpg', '35-20250228111748.jpg', '18-20250228111749.jpg', '29-20250228111751.jpg', 'TARA864562', '', '', '', '', '', '', '', '', '', ''),
(183, 116949, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56330127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56330127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Juan', 'Dela Cruz', '', 'hans3@gmail.com', '09073558135', 'f2a0ffe83ec8d44f2be4b624b0f47dde', NULL, NULL, NULL, '', '', NULL, NULL, NULL, NULL, '', '28-20250303140455.jpg', '35-20250303140456.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(185, 847897, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77760127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5901279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Vivek', 'kr', '', 'technoderivation.vivek12@gmail.com', '9116660725', '3623270253419e4ed6f46a571bf8ec64', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(186, 702105, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18780127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Vijit', 'tak', '', 'sales@technoderivation.com', '9887166566', '3623270253419e4ed6f46a571bf8ec64', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(189, 614376, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98460127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98460127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'User', 'Account', '', 'user1@gmail.com', '09652756244', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(194, 170864, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'Carowner3', 'Account', '', 'carowner3@gmail.com', '09068837533', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(195, 157639, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'Carowner4', 'Account', '', 'carowner4@gmail.com', '09005736431', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(197, 834706, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41070127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'leoj', 'alcampado', '', 'leoj@gmail.com', '09391545165', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(201, 139108, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'leoj5@gmail.com', '09391545160', '202cb962ac59075b964b07152d234b70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-07', 'test', 'test', 'test', '28-20250307101144.jpg', '22-20250307101145.jpg', '29-20250307101145.jpg', '26-20250307101145.jpg', '19-20250307101146.jpg', '19-20250307101146.jpg', '21-20250307101147.jpg', '27-20250307101147.jpg', '32-20250307101147.jpg', '30-20250307101148.jpg', '17-20250307101148.jpg', '19-20250307101149.jpg', '15-20250307101149.jpg', '24-20250307101150.jpg', '20-20250307101150.jpg', '19-20250307101150.jpg', '26-20250307101150.jpg', '33-20250307101151.jpg', 'TARA128449', '', '', '', '', '', '', '', '', '', ''),
(203, 800757, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz35780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz35780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz35780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz35780127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz35780127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Danny ', 'Cruz', '', 'dwnhiler1978@gmail.com', '09603120338', '7c53ebd2a42f8c684ee65a5ff5edde24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(204, 170185, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Feanne', 'Sanchez', '', 'fae_14@yahoo.com', '7252563839', '601f8487c17c27830ec953b98879885e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(205, 729183, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz57700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz57700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz57700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz57700127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz57700127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Rix', 'Umlas', '', 'rhix.umlas@gmail.com', '639060278880', 'e80df574dd71beab9585ab4336b7bc54', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(206, 558030, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz6630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz6630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz6630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz6630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz6630127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Leoj Jimuel', 'Alcampado', '', 'leojmarfil@gmail.com', '9391545165', '153ef8c8aaec7777a29fc32cd1742374', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(207, 967062, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34630127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34630127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Allan', 'Magallanes', '', 'amag12@gmail.com', '09292866899', '75dd601434ca253a60e4cd452398da99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(208, 895978, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33360127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33360127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33360127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33360127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33360127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2501279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Djibril', 'Guevarra', '', 'guevarrad@gmail.com', '09771412853', 'dc461cb05d0761f6993b8434d05fd9ce', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(209, 828835, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16240127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16240127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Christian', 'Garcia', '', 'ch4nu2910@gmail.com', '9667750996', 'a228d9309f80a7e3ddc437842728e4dc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-12', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(210, 215587, '', NULL, 'user', 0, 0, 0, 0, NULL, 'testkarl', 'gonzales', '', 'test@gmail.com', '091234567891', '01cfcd4f6b8770febfb40cb906715822', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(212, 825334, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'Gonzales@gmail.com', '091234567896', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(213, 616630, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'Qwerty@gmail.com', '091234567895', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(214, 762596, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Jess', 'Estrella', '', 'jess@gmail.com', '091234567894', '4337fb150cbc24bd1842fb3b8f828a6c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(215, 570401, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'Joshua@gmail.com', '091234567893', 'ee6445d1bcce11bbb1b00098c6e660ed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(217, 137424, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Marvin', 'Roque', '', 'alternate000333@gmail.com', '09766667041', '9e51ea3e946011cd2e6d833cfb3f02c2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-16', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(218, 183718, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66530127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Ronald ', 'Ancheta ', '', 'pogzmachine26@gmail.com', '19547066454', '38c23973f2c0abcc2749bc9f215041da', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(219, 523979, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60970127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Brian', 'Balagtas', '', 'balagtas.brian@yahoo.com', '19542252759', '9e892432145f87a179b4b3ed300f762a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-03-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(220, 177927, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75440127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4501279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'Karljoshuagonzales@gmail.com', '', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, '', NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-18', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(221, 913605, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Rainer', 'Schmidt', '', 'petx@gmx.net', '9760516356', '38ceb174e9d85839f77f15543564f65e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-19', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(222, 144565, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz43080127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz43080127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz43080127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz43080127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz43080127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3301279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Jess', 'Estrella', '', 'Jesssienna@gmail.com', '0988888888', '4337fb150cbc24bd1842fb3b8f828a6c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(223, 926882, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49130127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49130127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49130127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49130127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz49130127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3401279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'josh', 'Gonzales', '', 'joshuagonzales@gmail.com', '09112233445', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(224, 309544, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz98550127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4901279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'josh', 'Gonzales', '', 'qwertyuiop@gmail.com', '09222222222', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(225, 828325, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37070127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Jess', 'Estrella', '', 'Jessestrella@gmail.com', '09556677889', '4337fb150cbc24bd1842fb3b8f828a6c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-03-26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(228, 853527, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz53370127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz53370127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz53370127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz53370127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz53370127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Jelyn', 'Bundalian', 'jellibee03', 'jelynbundalian@gmail.com', '09673050047', '24b0d4bf17d2ebc1276c1bee30830c75', NULL, NULL, NULL, '1985-08-03', 'Female', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-02', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(231, 298072, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3170127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3170127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3170127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3170127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3170127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*', 'car_owner', 0, 0, 0, 0, '27-profile.jpg', 'Karl ', 'Gonzales', 'Karl', 'Carownerkarl@gmail.com', '09090909092', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, '2000-11-25', 'Male', 'Calatagan St.', 'Batangas Sub.', 'Calatgan', 'Batangas', '4215', '18-id-license-0418EDE7.jpg', '31-id-supporting_id-ED554B62.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(232, 231036, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30920127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8801279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Jess', 'Estrella', '', 'jessjess@gmail.com', '09121234345', '4337fb150cbc24bd1842fb3b8f828a6c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(233, 145022, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30160127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Lolita', 'Camins', '', 'lolitacamins@yahoo.com', '639674894386', '138f10ef2aa41681b94a7075df447d00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(234, 225404, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz15580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz15580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz15580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz15580127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz15580127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Diana', 'Diana ', '', 'Dianalink188@gmail.com', '081383881689', '3a6cfcc8f0ce482ffb2b8eb9595f0fea', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-05', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(235, 596545, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27970127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz27970127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2601279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Janine', 'Cristobal', 'jajaxoxo3', 'janinecristobal23@gmail.com', '09694172437', 'a860209d20b9f87863635c8a49ca3608', NULL, NULL, NULL, '1998-07-03', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(236, 594817, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77050127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77050127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77050127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77050127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz77050127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*', 'user', 0, 0, 0, 0, 'https://tarataxi.technoderivation.com/documents/31-profile.jpg', 'Eduardo ', 'Dionisio Jr', 'Baldz', 'chinitobebeka4@gmail.com', '09498836896', 'f0a37d6b5137e6f86f813baf50c156ea', NULL, NULL, NULL, '1982-05-12', 'Male', 'B-11 L-13 Opal Street', 'Villarosa', 'Sibulan', 'Negros Oriental', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-06', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(237, 579761, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz51770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz51770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz51770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz51770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz51770127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Rayner', 'Lorenzo', '', 'ranz74cl@gmail.com', '09272946666', 'b0d32e4c6be598a2c9a185a3cc9faae8', NULL, NULL, NULL, '1974-05-15', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(238, 546939, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz85450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz85450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz85450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz85450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz85450127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Michael ', 'Ordonez', '', 'em.pong@ymail.com', '09988666210', 'd072d324affab81bd6283340b94170e4', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(240, 609768, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87470127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87470127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87470127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87470127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87470127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Daniel ', 'Berger ', '', 'bergdani100@gmail.com', '00639065775782', '7e971d6acbb937fd548bcbf5be16f7ec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(241, 269322, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Hans6', 'Magpantay', '', 'hans6@gmail.com', '09658375266', 'f2a0ffe83ec8d44f2be4b624b0f47dde', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(242, 791912, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40440127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9801279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Jeffrey', 'Puzon', 'Jeff', 'jeffreypuzon1978@gmail.com', '09453379908', 'dbd582eb99be66f4c47d9ff93c3ec028', NULL, NULL, NULL, '2025-04-17', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(243, 511189, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18980127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18980127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18980127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18980127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz18980127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Hanzel', 'Sanchez', '', 'hanzelsanchez@yahoo.com', '17252563839', '291e9b77b0d05b8e2b0207fa00ecab4a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(261, 221871, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz2730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz2730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz2730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz2730127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz2730127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*', 'user', 0, 0, 0, 0, '32-profile.jpg', 'Karl Joshua', 'Gonzales', '', 'userkarl@gmail.com', '09125372836', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, '2000-11-25', 'Male', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(265, 595277, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'Jimuel', 'Alcampado', '', 'Test555@gmail.com', '09391545164', '741a4c49a8c68a4b731ea63f2c0dbfae', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(267, 175743, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84760127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz84760127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Robin', 'Pintado', '', 'Robinpintado123@gmail.com', '11111111111', '205e8b242d2cd224d007b0052fc991bd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(268, 343798, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz87740127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Michael', 'Bondoc', '', 'Mjbondoc@gmail.com', '4089819120', 'ea9666b600af61ae4b81355d4e243eee', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbl_users` (`id`, `otp`, `token`, `refresh_token`, `role`, `truck_id`, `chassis_id`, `trailer_type`, `total_earning`, `profile_image`, `f_name`, `l_name`, `username`, `email`, `phone`, `password`, `lat`, `lng`, `address`, `dob`, `gender`, `street`, `village`, `city`, `province`, `zipcode`, `license`, `supporting_id`, `provider`, `social_id`, `os`, `os_version`, `udid`, `otp_flag`, `status`, `created`, `company_name`, `contact_person`, `company_type`, `business_permit`, `bir`, `cor`, `ltfrb_franchise_certificate`, `ppa`, `membership_from_ctap`, `acto`, `mayors_permit`, `sec_certificate`, `articles_of_incorporation`, `inland_marine_insurance`, `oc_cr`, `pa_cpc`, `deed_of_sale`, `bank_certificate`, `fs_past_2year`, `gps_device`, `organizational_chart`, `refrence_number`, `truck_refrence_number`, `driver_licence`, `valid_govt_id`, `company_id`, `bio_data`, `drug_text_result`, `nbi_clearance`, `police_clearance`, `personal_accident_insurance`, `vacination_card`) VALUES
(269, 991128, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz36040127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*', 'user', 0, 0, 0, 0, '24-2025-04-25-14:50:51.599233.png', 'Mohit ', 'Patil', '', 'Patil1@gmail.com', '1234567890', 'e807f1fcf82d132f9bb018ca6738a19f', '26.8571682', '75.7745914', '37-B, Mansarovar, Jaipur, Rajasthan, India', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '21-2025-04-25-14:51:18.952942.png', '23-2025-04-25-14:51:19.511791.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(270, 621737, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz78840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz78840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz78840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz78840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz78840127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, '15-2025-04-25-17:05:30.937689.png', NULL, NULL, '', 'patil2@gmail.com', '12345678910', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-25', 'jcc', 'sanjay ', 'Select', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/34-2025-04-28-1', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/19-2025-04-28-1', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/18-2025-04-28-1', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/28-2025-04-28-1', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://taratax', 'TARA889965', '', '', '', '', '', '', '', '', '', ''),
(271, 873376, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz34550127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7201279698552@#$%&*', 'driver', 25, 26, 2, 0, '35-2025-04-25-17:16:04.973593.png', 'shubham ', 'Sharma ', '', 'patil3@gmail.com', '012345678901', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '20-2025-04-25-17:19:40.196422.png', '22-2025-04-25-17:19:40.754206.png', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA889965', '20-2025-04-25-17:10:50.117276.png', '16-2025-04-25-17:10:56.202100.png', '22-2025-04-25-17:10:44.838389.png', '21-2025-04-25-17:10:46.917524.png', '28-2025-04-25-17:10:41.935331.png', '25-2025-04-25-17:10:39.733084.png', '33-2025-04-25-17:10:34.575849.png', '21-2025-04-25-17:10:36.725759.png', '27-2025-04-25-17:10:32.664863.png'),
(272, 796509, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz65120127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz65120127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz65120127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz65120127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz65120127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Hanieleth', 'Punsalan', '', 'Hanielethpunsalan@gmail.com', '09171184291', '89836516887fd9ed63fddc74d441165a', NULL, NULL, NULL, '1986-03-10', 'Female', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(273, 428231, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22570127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22570127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3601279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Marc', 'Bundalian', '', 'Marcbundalian2@gmail.com', '09669070849', 'd60076e2b666fad1919cf1fe79d5bee5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(275, 674941, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz17180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz17180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz17180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz17180127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz17180127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6501279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Marc', 'Bundalian', '', 'Marcbundalian@gmail.com', '09666780978', 'd60076e2b666fad1919cf1fe79d5bee5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(276, 212138, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz62740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz62740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz62740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz62740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz62740127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*', 'driver', 28, 27, 1, 0, NULL, 'Mohit ', 'patil', '', 'patil31@gmail.com', '114477770011', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA889965', '18-2025-04-29-17:39:36.357777.png', '15-2025-04-29-17:39:48.442718.png', '32-2025-04-29-17:39:30.967190.png', '32-2025-04-29-17:39:32.978646.png', '18-2025-04-29-17:39:26.193322.png', '25-2025-04-29-17:39:27.958060.png', '29-2025-04-29-17:39:21.177.png', '17-2025-04-29-17:39:22.778758.png', '18-2025-04-29-17:39:18.940392.png'),
(277, 787256, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz58440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz58440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz58440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz58440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz58440127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8501279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Jelyn', 'Bundalian', '', 'jelynbalajadia@gmail.com', '09673050045', '24b0d4bf17d2ebc1276c1bee30830c75', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-29', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(278, 967235, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54870127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54870127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54870127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54870127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz54870127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7501279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Arlo', 'L', '', 'Markangelogacad25@gmail.com', '09171471664', '8cf0e7eaa213c4acc67f2641443e5073', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-04-30', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(279, 863732, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Ansh ', 'Khandelwal ', '', 'tdansh@gmail.com', '3521876468', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(280, 563568, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'Aaditya ', 'Sharma ', '', 'aaditya@gmail.com', '68848546466', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(281, 242966, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33490127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33490127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33490127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33490127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33490127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7401279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'prateek@gmail.com', '18757545846', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-01', 'Td company ', 'prateek ', '1', '29-2025-05-01-15:20:06.679972.png', '16-2025-05-01-15:20:36.615978.png', '25-2025-05-01-15:20:51.967205.png', '32-2025-05-01-15:21:31.769204.png', '26-2025-05-01-15:21:55.120978.png', '18-2025-05-01-15:22:07.465687.png', '18-2025-05-01-15:22:21.579565.png', '31-2025-05-01-15:22:45.216633.png', '26-2025-05-01-15:23:05.154380.png', '23-2025-05-01-15:27:16.621325.png', '23-2025-05-01-15:24:16.109267.png', '18-2025-05-01-15:24:32.539671.png', '32-2025-05-01-15:24:48.439107.png', '25-2025-05-01-15:25:04.052703.png', '23-2025-05-01-15:25:23.070022.png', '34-2025-05-01-15:25:34.477913.png', '29-2025-05-01-15:25:51.912500.png', '33-2025-05-01-15:26:08.522377.png', 'TARA172500', '', '', '', '', '', '', '', '', '', ''),
(282, 784819, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66150127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66150127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66150127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66150127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66150127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4401279698552@#$%&*', 'driver', 0, 0, 0, 0, NULL, 'ravi', 'k', '', 'ravi@gmail.com', '84572754', 'e10adc3949ba59abbe56e057f20f883e', '14.5833', '120.9667', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA172500', '27-2025-05-01-15:34:20.206540.png', '20-2025-05-01-15:34:31.922347.png', '35-2025-05-01-15:34:50.113162.png', '19-2025-05-01-15:35:06.536957.png', '29-2025-05-01-15:35:19.209658.png', '19-2025-05-01-15:35:26.912370.png', '19-2025-05-01-15:35:36.482403.png', '22-2025-05-01-15:35:44.513982.png', '25-2025-05-01-15:35:52.031758.png'),
(284, 392647, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz22230127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7901279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Robin', 'Pintado', '', 'Rpintado@gmail.com', '11111111112', '2c842d72963554e4ca6286bb120777f6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(285, 472109, '', NULL, 'user', 0, 0, 0, 0, NULL, 'kanak', 'sharma', '', 'kanak@technodetivation.com', '98657272728', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-07', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(286, 159714, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz3850127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Mozhde ', 'Marivani ', '', 'info@mm-pmu.com', '639500050000', '86318e52f5ed4801abe1d13d509443de', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-08', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(287, 627190, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40550127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz40550127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Welmher', 'Hernandez', '', 'welmherhernandez10@gmail.com', '09278822789', '7186a25ecd8f19c1018fabdee5064562', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-09', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(288, 896873, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44160127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz44160127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Karlo', 'De Castro', '', 'dckarl95@gmail.com', '09776860498', '543f44435b4ae3f5c0bc1edcbc5d8fbe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(289, 124235, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29820127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29820127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29820127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29820127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29820127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5401279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Jada', 'Santos', '', 'jmfsantos5@gmail.com', '09178902264', 'ad91979868d06e19d8e8a9c28be56e0c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(291, 795008, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30220127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30220127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30220127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30220127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30220127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'nix', 'de gracia', '', 'nixdegracia@gmail.com', '09156813869', '37026bff02dc7111b81db05374dc3b8a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(292, 267637, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz5000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz5000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz5000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz5000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz5000127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5301279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Paul', 'Christian ', '', 'Paulstersantos@gmail.com', '09662050455', '952eac3c79486a8042784a9f2d69b4d8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-22', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(293, 168620, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Mark Genesis', 'Arabit', '', 'Arabitmg@gmail.com', '09459835087', '47d7cb48aa0557fe4a54ea11b60ad813', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(294, 635943, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Ada', 'Blossom', '', 'lealynganda17@gmail.com', '09691253005', 'aee75b2c210da556017f55b99c752d33', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-26', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(295, 773862, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz68990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz68990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz68990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz68990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz68990127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3701279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'truckpartnerkarl@gmail.com', '09999999991', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-26', 'Karl', 'Jess', 'Black', '31-20250526171248.jpg', '17-20250526171249.jpg', '27-20250526171250.jpg', '22-20250526171250.jpg', '15-20250526171251.jpg', '33-20250526171251.jpg', '27-20250526171252.jpg', '18-20250526171252.jpg', '16-20250526171252.jpg', '21-20250526171253.jpg', '23-20250526171253.jpg', '17-20250526171253.jpg', '25-20250526171254.jpg', '27-20250526171254.jpg', '26-20250526171254.jpg', '21-20250526171255.jpg', '23-20250526171255.jpg', '20-20250526171255.jpg', 'TARA395524', '', '', '', '', '', '', '', '', '', ''),
(296, 969235, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 't1@gmail.com', '1111111111', '83f1535f99ab0bf4e9d02dfd85d3e3f7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-28', 'T1', 'T1', 'Partner/Corporation', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', 'TARA859593', '', '', '', '', '', '', '', '', '', ''),
(297, 984591, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpkarl@gmail.com', '09122222221', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-28', 'Dada', 'Jess', 'Asasas', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA067909', '', '', '', '', '', '', '', '', '', ''),
(298, 162425, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpkarl2@gmail.com', '09333333332', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-05-28', 'Tara', 'Jess', 'Corp', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA075077', '', '', '', '', '', '', '', '', '', ''),
(299, 226151, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66740127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz66740127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1601279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpkarl3@gmail.com', NULL, 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-28', 'Tara', 'Jess', 'Partner/Corporation', '34-20240907155922.jpg', '29-truck_doc_20250617_154425.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '18-upload.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', 'TARA734998', '', '', '', '', '', '', '', '', '', ''),
(301, 853572, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz8030127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz8030127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz8030127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz8030127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz8030127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6401279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpjess@gmail.com', '09777777774', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara 2', 'Karl', 'Corp', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA350482', '', '', '', '', '', '', '', '', '', ''),
(302, 592869, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1000127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4301279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpjess2@gmail.com', '09888888882', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara', 'Karl', 'corp', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'TARA521228', '', '', '', '', '', '', '', '', '', ''),
(303, 772568, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz61930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz61930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz61930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz61930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz61930127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpjess3@gmail.com', '09234567654', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara', 'Karl', 'Corp', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/31-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/24-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/22-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/33-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/27-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/28-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'https://tarataxi.technoderivation.com/api/assets/img/uploads/', 'TARA885671', '', '', '', '', '', '', '', '', '', ''),
(304, 370467, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75930127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75930127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9701279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpkarl4@gmail.com', '09888855544', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara', 'Karl', 'Karl', '24-upload.jpg', '31-upload.jpg', '24-upload.jpg', '17-upload.jpg', '16-upload.jpg', '34-upload.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA050008', '', '', '', '', '', '', '', '', '', ''),
(305, 845250, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz24250127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tptara@gmail.com', '09111111122', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara', 'Qwerty', 'Corporation', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA954275', '', '', '', '', '', '', '', '', '', ''),
(306, 987396, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91810127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91810127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91810127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91810127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz91810127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9601279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tptara1@gmail.com', '09333345632', '2c842d72963554e4ca6286bb120777f6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara', 'Tara', 'Partner', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA698128', '', '', '', '', '', '', '', '', '', ''),
(307, 243340, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30340127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30340127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30340127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30340127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz30340127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs3001279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tptara2@gmail.com', '09444444567', '2c842d72963554e4ca6286bb120777f6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara', 'Tara', 'Partner', '20-upload.jpg', '24-upload.jpg', '19-upload.jpg', '29-upload.jpg', '34-upload.jpg', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA924116', '', '', '', '', '', '', '', '', '', ''),
(308, 200032, '', NULL, 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tptara3@gmail.com', '09888887654', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-05-29', 'Tara', 'Tara', 'Partner', '33-upload.jpg', '35-upload.jpg', '29-upload.jpg', '29-upload.jpg', '16-upload.jpg', '31-upload.jpg', '31-upload.jpg', '', '', '', '', '', '', '', '', '', '', '', 'TARA258290', '', '', '', '', '', '', '', '', '', ''),
(309, 283152, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz56040127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4101279698552@#$%&*', 'car_owner', 0, 0, 0, 0, '28-profile.jpg', 'Car Owner Juan', 'Dela Cruz', 'Juan', 'Juandelacruz@gmail.com', '09234567876', 'a94652aa97c7211ba8954dd15a3cf838', NULL, NULL, NULL, '2016-04-19', 'Male', 'Manila', '', 'Makati', 'Metro Manila', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(310, 278310, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz80450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz80450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz80450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz80450127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz80450127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5801279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs5801279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'User John', 'Doe', '', 'JohnDoe@gmail.com', '09123456768', '527bd5b5d689e2c32ae974c6229ff785', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(311, 282577, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz7900127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz7900127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz7900127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz7900127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz7900127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6001279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpkarl5@gmail.com', NULL, 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-04', 'Tara PH', 'Jess', 'Corporation', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/31-upload.jpg', 'https://tarataxi.technoderivation.com/documents/23-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/22-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/16-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/26-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/23-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/21-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/23-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/34-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/22-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/27-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/27-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/34-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/29-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/33-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/16-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/29-upload.jpg', 'https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/https://tarataxi.technoderivation.com/documents/23-upload.jpg', 'TARA605932', '', '', '', '', '', '', '', '', '', '');
INSERT INTO `tbl_users` (`id`, `otp`, `token`, `refresh_token`, `role`, `truck_id`, `chassis_id`, `trailer_type`, `total_earning`, `profile_image`, `f_name`, `l_name`, `username`, `email`, `phone`, `password`, `lat`, `lng`, `address`, `dob`, `gender`, `street`, `village`, `city`, `province`, `zipcode`, `license`, `supporting_id`, `provider`, `social_id`, `os`, `os_version`, `udid`, `otp_flag`, `status`, `created`, `company_name`, `contact_person`, `company_type`, `business_permit`, `bir`, `cor`, `ltfrb_franchise_certificate`, `ppa`, `membership_from_ctap`, `acto`, `mayors_permit`, `sec_certificate`, `articles_of_incorporation`, `inland_marine_insurance`, `oc_cr`, `pa_cpc`, `deed_of_sale`, `bank_certificate`, `fs_past_2year`, `gps_device`, `organizational_chart`, `refrence_number`, `truck_refrence_number`, `driver_licence`, `valid_govt_id`, `company_id`, `bio_data`, `drug_text_result`, `nbi_clearance`, `police_clearance`, `personal_accident_insurance`, `vacination_card`) VALUES
(312, 446351, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93250127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz93250127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9201279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Tpkarl6@gmail.com', NULL, 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-04', 'Tara', 'Jess', 'Partner', '15-upload.jpg', '28-upload.jpg', '24-upload.jpg', '19-upload.jpg', '29-upload.jpg', '35-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'TARA302984', '', '', '', '', '', '', '', '', '', ''),
(313, 786290, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz72840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz72840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz72840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz72840127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz72840127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2001279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'Jesstp@gmail.com', NULL, 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-04', 'Tara', 'Karl', 'Partner', '27-upload.jpg', '30-upload.jpg', '35-upload.jpg', '33-upload.jpg', '22-upload.jpg', '33-upload.jpg', '30-upload.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'https://tarataxi.technoderivation.com/api/assets/img/no-image.jpg', 'TARA656538', '', '', '', '', '', '', '', '', '', ''),
(314, 485929, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41950127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz41950127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*', 'truck_partner', 0, 0, 0, 0, NULL, NULL, NULL, '', 'jesstp2@gmail.com', '09123212345', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-04', 'Tara', 'Karl', 'Corporation', '20-upload.jpg', '33-upload.jpg', '35-upload.jpg', '15-upload.jpg', '29-upload.jpg', '24-upload.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA384686', '', '', '', '', '', '', '', '', '', ''),
(315, 420557, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29990127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz29990127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8701279698552@#$%&*', 'driver', 31, 50, 1, 0, '18-profile.jpg', 'Karl Joshua', 'Driver ', '', 'tdkarl@gmail.com', '09656565674', 'f47636673b14c54021a69dc06f6a19fb', '14.540402', '121.014724', NULL, '2000-11-25', 'Male', NULL, NULL, '1', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-10', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA734998', '29-20250610172430.jpg', '34-20250610172430.jpg', '31-20250610172430.jpg', '34-20250610172431.jpg', '25-20250610172431.jpg', '26-20250610172431.jpg', '27-20250610172431.jpg', '17-20250610172431.jpg', '20-20250610172431.jpg'),
(316, 127528, '', NULL, 'user', 0, 0, 0, 0, NULL, 'josh', 'Gonzales', '', 'joshuser@gmail.com', '091145', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(317, 119203, '', NULL, 'car_owner', 0, 0, 0, 0, NULL, 'Karl', 'Account', '', 'karlowner@gmail.com', '0924625', '81dc9bdb52d04dc20036dbd8313ed055', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(318, 242796, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'Jess', 'Estrella', '', 'tdjess@gmail.com', '09123455543', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-11', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA734998', '27-20250611173132.jpg', '27-20250611173134.jpg', '28-20250611173134.jpg', '17-20250611173135.jpg', '27-20250611173135.jpg', '26-20250611173137.jpg', '21-20250611173139.jpg', '22-20250611173140.jpg', '21-20250611173141.jpg'),
(319, 528301, '', NULL, 'user', 0, 0, 0, 0, NULL, 'myer', 'cristoria', '', 'admyer.me@icloud.com', '09209280514', 'f300f8ce0652c76afcae6ab87af28fcc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(320, 830323, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31480127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31480127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31480127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31480127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz31480127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Dan', 'Loi', '', 'Danloi@gmail.com', '09178126933', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(321, 987560, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'd1', 'd1', '', 'd4@gmail.com', '12', '9948c645c094247794f4c7acdbeb2bb6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA588537', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg', '34-20240907155922.jpg'),
(322, 105846, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'Tdkarl3@gmail.com', '09122121234', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA734998', '35-image.jpg', '27-image.jpg', '16-image.jpg', '35-image.jpg', '33-image.jpg', '35-image.jpg', '25-image.jpg', '28-image.jpg', '20-image.jpg'),
(323, 529748, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'Karl', 'Gonzales', '', 'Tdkarl5@gmail.com', '09123232432', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA734998', '30-image.jpg', '17-image.jpg', '21-image.jpg', '21-image.jpg', '17-image.jpg', '21-image.jpg', '35-image.jpg', '31-image.jpg', '26-image.jpg'),
(324, 962869, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'Deadwood', 'Dadas', '', 'Td@gmal.com', '09123232345', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA734998', '18-image.jpg', '34-image.jpg', '34-image.jpg', '32-image.jpg', '16-image.jpg', '29-image.jpg', '21-image.jpg', '26-image.jpg', '26-image.jpg'),
(325, 514369, '', NULL, 'driver', 0, 0, 0, 0, NULL, 'Dadad', 'Fewef', '', 'Tdkarl1@gmail.com', '092', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'TARA734998', '31-image.jpg', '34-image.jpg', '25-image.jpg', '23-image.jpg', '24-image.jpg', '22-image.jpg', '18-image.jpg', '30-image.jpg', '22-image.jpg'),
(326, 484576, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14380127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14380127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14380127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14380127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz14380127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8301279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Bernadette ', 'Silaran', '', 'bernadettesilaran@gmail.com', '09524860372', '665c6364e85b8cac432810c779d5ab66', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(327, 659197, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33070127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz33070127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6701279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Kizzel', 'Tulog', '', 'http.rnae@gmail.com', '09682942540', '7b7d35e227355a7780c140f87c95f861', NULL, NULL, NULL, '2000-09-29', 'Female', '', '', '', '', '4118', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(328, 918732, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz25300127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz25300127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz25300127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz25300127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz25300127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs4701279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Teri', 'Quimbo', '', 'tuquimbo@gmail.com', '09178905330', 'bdd528417d8661e3ee8eec11d5bae83a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(329, 153926, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76620127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76620127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76620127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76620127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76620127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs7101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Erico', 'Nuguid', '', 'transpo.riyel@gmail.com', '09219716587', '68d8c6baf01e34751f6969ed277b4bf8', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-13', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(330, 632677, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76850127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76850127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1501279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Kathleen', 'Gali', '', 'kathleen.gali0925@gmail.com', '09177544267', 'e81502a921e78c4ddb017a555586664c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(331, 790565, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Chan Young', 'Lee', '', 'Davidong495@gmail.com', '00266538966', '84debed08d2c0ede5e9c3949456da62a', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-14', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(332, 960225, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75000127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz75000127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9301279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Abdulbarie', 'Mimbalawag', '', 'abdulbariemimbalawag@gmail.com', '09065654939', 'fdcfcecfe96d93c04226c7ea227b9a9d', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-23', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(333, 989889, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11090127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz11090127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Sergelen ', 'Khuyag-ochir', '', 'sergelen80@gmail.com', '97698011212', 'dae75b10603c1f318c686d2bb98e3592', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(334, 667828, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10410127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10410127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10410127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10410127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz10410127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2701279698552@#$%&*', 'car_owner', 0, 0, 0, 0, NULL, 'Kency', 'Ngan', '', 'kencyngan@gmail.com', '09173054373', '9755abe3c0c876207a8b06607a6b3752', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-24', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(335, 586091, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37770127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz37770127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2401279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Marjon', 'Canlas', '', 'marjon_canlas202@yahoo.com', '09566845934', '5f4dcc3b5aa765d61d8327deb882cf99', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(336, 464820, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Testuser', 'Test', '', 'Testuser@gmail.com', '3243536456', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(337, 405196, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76600127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76600127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76600127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76600127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz76600127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs1201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'TestUser2', 'Test', '', 'Testuser2@gmail.com', '3124253466', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(338, 716637, '', NULL, 'user', 0, 0, 0, 0, NULL, 'TestUser3', 'Test', '', 'Testuser3@gmail.com', '09748347278', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(339, 301086, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Test User', 'Test', '', 'Testuser4@gmail.com', '03142342524', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(340, 881426, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79530127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz79530127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Test User', 'Test', '', 'Testuser5@gmail.com', '9321478143', 'f47636673b14c54021a69dc06f6a19fb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-06-25', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(341, 717135, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Jojo', 'Garcia', '', 'mjcgconst1@gmail.com', '09273845858', '93cf186f186582da3f57212de686fc70', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-06-27', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(342, 465137, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16920127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz16920127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Wendell', 'Castro', '', 'wtc.1925@yahoo.com', '9663205687', '62667950062e457e0a34bd7a672ff0f7', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-01', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(343, 526259, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz95440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz95440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz95440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz95440127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz95440127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs9001279698552@#$%&*', 'car_owner', 0, 0, 0, 0, '16-20250703104643.jpg', 'Kuya Andy', 'Borabien ', '', 'andyborabien@gmail.com', '9927089392', '89ae80b21779e8dd972e8c5a10fe6e3f', NULL, NULL, NULL, '1982 09 01', 'MALE', NULL, NULL, NULL, NULL, '6500', '23-20250703105100.jpg', '25-20250703105101.jpg', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(344, 544905, '', NULL, 'user', 0, 0, 0, 0, NULL, 'Daniel', 'Delos Santos', '', 'danielsulit.ds@gmail.com', '9556823944', '161ebd7d45089b3446ee4e0d86dbcf92', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, '2025-07-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(345, 981993, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64830127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz64830127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs2201279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Daisy ', 'Chang ', '', 'Taiyu3235@gmail.com', '9177611996', '19f31a35e02cd8c2577b53369a058d0e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(346, 265032, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz59230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz59230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz59230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz59230127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz59230127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs8101279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'KC', 'Sy', '', 'richierich6888@icloud.com', '9178558400', '9333adf48f273f2833046e45e56661d6', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(347, 656516, 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60040127924587413698552@#$%&*ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz60040127924587413698552@#$%&*', 'UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*UVWXYZABFGHIJCDRSTtuvwxyzabcdefopqrs6901279698552@#$%&*', 'user', 0, 0, 0, 0, NULL, 'Paolo', 'Pagaduan', '', 'paolopagaduan@gmail.com', '09178970806', 'f8bcae52174ecd5521d03b7f6de61842', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2025-07-04', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_brand`
--

CREATE TABLE `tbl_vehicle_brand` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` varchar(255) NOT NULL,
  `created_by` int NOT NULL DEFAULT '1',
  `modified` varchar(255) NOT NULL,
  `modified_by` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_vehicle_brand`
--

INSERT INTO `tbl_vehicle_brand` (`id`, `name`, `created`, `created_by`, `modified`, `modified_by`, `status`) VALUES
(43, 'Nissan', '2024-05-10', 1, '2024-05-10', '1', 1),
(44, 'Hyundai', '2024-05-10', 1, '2024-05-10', '1', 1),
(45, 'Honda', '2024-05-10', 1, '2024-05-10', '1', 1),
(46, 'Innoson', '2024-05-10', 1, '2024-05-10', '1', 1),
(47, 'Kia', '2024-05-10', 1, '2024-05-10', '1', 1),
(48, 'Toyota', '2024-05-10', 1, '2024-05-10', '1', 1),
(49, 'Mercedes Benz', '2024-05-10', 1, '2024-05-10', '1', 1),
(50, 'Chevrolet', '2024-05-10', 1, '2024-05-10', '1', 1),
(51, 'Lexus', '2024-05-10', 1, '2024-05-10', '1', 1),
(52, 'Ford', '2024-05-10', 1, '2024-05-10', '1', 1),
(54, 'BMW', '2024-07-06', 1, '2024-07-06', '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_models`
--

CREATE TABLE `tbl_vehicle_models` (
  `id` int NOT NULL,
  `make_id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int NOT NULL,
  `created` varchar(255) NOT NULL,
  `created_by` int NOT NULL,
  `modified` varchar(255) NOT NULL,
  `modified_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_vehicle_models`
--

INSERT INTO `tbl_vehicle_models` (`id`, `make_id`, `name`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(6, 43, 'Micra', 1, '2024-05-10', 1, '2024-05-10', 1),
(7, 43, 'Sunny', 1, '2024-05-10', 1, '2024-05-10', 1),
(8, 43, 'Navara', 1, '2024-05-10', 1, '2024-05-10', 1),
(9, 44, 'Santro', 1, '2024-05-10', 1, '2024-05-10', 1),
(10, 44, 'creta', 1, '2024-05-10', 1, '2024-05-10', 1),
(11, 44, 'Grand i10', 1, '2024-05-10', 1, '2024-05-10', 1),
(12, 47, 'Picanto', 1, '2024-05-10', 1, '2024-05-10', 1),
(13, 47, 'Rio', 1, '2024-05-10', 1, '2024-05-10', 1),
(14, 51, 'Lexus ES', 1, '2024-05-10', 1, '2024-05-10', 1),
(15, 51, 'Lexus GS', 1, '2024-05-10', 1, '2024-05-10', 1),
(16, 51, 'Lexus GX', 1, '2024-05-10', 1, '2024-05-10', 1),
(17, 43, 'X-Trail', 1, '2024-06-25', 1, '2024-06-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vehicle_types`
--

CREATE TABLE `tbl_vehicle_types` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `seating_capacity` int NOT NULL,
  `status` int NOT NULL,
  `created` varchar(255) NOT NULL,
  `created_by` int NOT NULL,
  `modified` varchar(255) NOT NULL,
  `modified_by` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_vehicle_types`
--

INSERT INTO `tbl_vehicle_types` (`id`, `name`, `seating_capacity`, `status`, `created`, `created_by`, `modified`, `modified_by`) VALUES
(1, 'Regular', 4, 1, '2024-05-10', 1, '2024-05-10', 1),
(3, 'Micro', 3, 1, '2024-05-10', 1, '2024-05-10', 1),
(4, 'Mini', 3, 1, '2024-05-10', 1, '2024-05-10', 1),
(5, 'Prime', 3, 1, '2024-05-10', 1, '2024-05-10', 1),
(6, 'Executive', 4, 1, '2024-05-10', 1, '2024-05-10', 1),
(7, 'Van', 1, 1, '2024-05-10', 1, '2024-05-10', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_car`
--
ALTER TABLE `tbl_car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_car_order_booking`
--
ALTER TABLE `tbl_car_order_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_car_price_calender`
--
ALTER TABLE `tbl_car_price_calender`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_car_rating`
--
ALTER TABLE `tbl_car_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chassis_trailer_type`
--
ALTER TABLE `tbl_chassis_trailer_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_color`
--
ALTER TABLE `tbl_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_fair_management`
--
ALTER TABLE `tbl_fair_management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_find_driver`
--
ALTER TABLE `tbl_find_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pick_up_port`
--
ALTER TABLE `tbl_pick_up_port`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_state`
--
ALTER TABLE `tbl_state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_truck`
--
ALTER TABLE `tbl_truck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_truck_booking_status`
--
ALTER TABLE `tbl_truck_booking_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_truck_driver`
--
ALTER TABLE `tbl_truck_driver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_truck_driver_rating`
--
ALTER TABLE `tbl_truck_driver_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_truck_order_booking`
--
ALTER TABLE `tbl_truck_order_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_truck_partner`
--
ALTER TABLE `tbl_truck_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_brand`
--
ALTER TABLE `tbl_vehicle_brand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `tbl_vehicle_models`
--
ALTER TABLE `tbl_vehicle_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_vehicle_types`
--
ALTER TABLE `tbl_vehicle_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_car`
--
ALTER TABLE `tbl_car`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tbl_car_order_booking`
--
ALTER TABLE `tbl_car_order_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `tbl_car_price_calender`
--
ALTER TABLE `tbl_car_price_calender`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=610;

--
-- AUTO_INCREMENT for table `tbl_car_rating`
--
ALTER TABLE `tbl_car_rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_chassis_trailer_type`
--
ALTER TABLE `tbl_chassis_trailer_type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_color`
--
ALTER TABLE `tbl_color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_fair_management`
--
ALTER TABLE `tbl_fair_management`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_find_driver`
--
ALTER TABLE `tbl_find_driver`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=753;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_pick_up_port`
--
ALTER TABLE `tbl_pick_up_port`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_state`
--
ALTER TABLE `tbl_state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_truck`
--
ALTER TABLE `tbl_truck`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_truck_booking_status`
--
ALTER TABLE `tbl_truck_booking_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_truck_driver`
--
ALTER TABLE `tbl_truck_driver`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_truck_driver_rating`
--
ALTER TABLE `tbl_truck_driver_rating`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_truck_order_booking`
--
ALTER TABLE `tbl_truck_order_booking`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `tbl_truck_partner`
--
ALTER TABLE `tbl_truck_partner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=348;

--
-- AUTO_INCREMENT for table `tbl_vehicle_brand`
--
ALTER TABLE `tbl_vehicle_brand`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tbl_vehicle_models`
--
ALTER TABLE `tbl_vehicle_models`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_vehicle_types`
--
ALTER TABLE `tbl_vehicle_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
