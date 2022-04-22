-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2022 at 12:56 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shishadb`
--
CREATE DATABASE IF NOT EXISTS `shishadb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shishadb`;

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `about_id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `text` varchar(800) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`about_id`, `image`, `text`) VALUES
(0, NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam feugiat aliquam odio, non gravida sem vehicula non. Suspendisse non congue sem, fringilla ultrices ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Duis est augue, vehicula in dolor id, viverra mattis lectus. Phasellus sed ex sit amet velit tristique pharetra eu nec lorem. Praesent tempor imperdiet posuere. Sed a tortor gravida diam tincidunt cursus id at quam. Nunc interdum tempus hendrerit. Quisque vitae elementum purus. Nam pharetra porta porttitor. Aenean vehicula posuere elit, sit amet vehicula lacus porta nec. Donec ipsum leo, varius non varius nec, ultricies in lorem.Pellentesque in ligula maximus, gravida risus et, congue tellus. Phasellus malesuada tellus in nulla vestibulum pharetra. Phasellus co');

-- --------------------------------------------------------

--
-- Table structure for table `accessory`
--

CREATE TABLE `accessory` (
  `accessory_id` int(11) NOT NULL,
  `hookah_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessory`
--

INSERT INTO `accessory` (`accessory_id`, `hookah_id`, `name`, `brand`, `description`, `quantity`, `price`, `image`, `category`) VALUES
(5, NULL, 'Designer Black Charcoal Tong', 'Cyril', '• Length: 9 in approx.\r\n\r\n• Opening: 2 in.\r\n\r\n• Color: steel.\r\n\r\n• Great resistance to high temperatures.', 3, '13.00', '626196b15be5e.jpg', 'Tong');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `about_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `contact_id`, `about_id`, `email`, `password`) VALUES
(0, 0, 0, 'admin@email.com', '$2y$10$ZBe3udFijMgmuC5KTvG43e9CGPVql7Qm0fmgCklUP/QMliZ0dNSaS');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `businessEmail` varchar(30) NOT NULL,
  `phone` text NOT NULL,
  `location` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `businessEmail`, `phone`, `location`, `name`) VALUES
(0, 'CONTACT@EMAIL.COM', '514-420-6969', '821 AV. SAINTE-CROIX, SAINT-LAURENT, QC H4L39X', 'John Doe');

-- --------------------------------------------------------

--
-- Table structure for table `hookah`
--

CREATE TABLE `hookah` (
  `hookah_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `color` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hookah`
--

INSERT INTO `hookah` (`hookah_id`, `name`, `brand`, `description`, `quantity`, `price`, `image`, `type`, `color`) VALUES
(0, 'Adina Hookah', 'Adina', 'Material: V2A stainless steel / Sleeves: epoxy resin\r\nHeight: about 21.25 in.\r\nCoal plate diameter: approx. 22 cm', 4, '290.00', '62618a8fbf684.jpg', 'Modern', 'Black');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `accessory`
--
ALTER TABLE `accessory`
  ADD PRIMARY KEY (`accessory_id`),
  ADD KEY `FK_accessory_hookah` (`hookah_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_admin_contact` (`contact_id`),
  ADD KEY `FK_admin_aboutus` (`about_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `hookah`
--
ALTER TABLE `hookah`
  ADD PRIMARY KEY (`hookah_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `accessory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessory`
--
ALTER TABLE `accessory`
  ADD CONSTRAINT `FK_accessory_hookah` FOREIGN KEY (`hookah_id`) REFERENCES `hookah` (`hookah_id`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin_aboutus` FOREIGN KEY (`about_id`) REFERENCES `about_us` (`about_id`),
  ADD CONSTRAINT `FK_admin_contact` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`contact_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
