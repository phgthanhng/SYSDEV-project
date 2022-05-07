-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2022 at 07:08 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shisha_db`
--
CREATE DATABASE IF NOT EXISTS `shisha_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shisha_db`;

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
(0, '626c73538b582.jpg', 'jkljkljkl');

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
(1, NULL, 'Russian Vase Drop', 'Unknown', 'Measurements\r\n\r\nHeight: 11 inches\r\n\r\nBase diameter: 6 inches\r\n\r\nInside opening diameter: 1 3/4 inches', 30, '44.95', '6269fbe504cde.jpg', 'Vase'),
(2, NULL, 'MVP 360 Glass Vase', 'Aladin', 'Your broke your Aladin MVP 360 hookah?\r\nNo problem, here you get an original spare glass for your hookah.\r\nDirectly equipped with the threaded ring.\r\n\r\nHeight: 18cm\r\n\r\n- high quality V2A stainless steel', 20, '44.95', '6269fc2e73583.jpg', 'Vase'),
(3, NULL, 'Malouka', 'Khalil Mamoon', 'These high quality glass hookah vases from Khalil Mamoon are some of the most beautiful hookah vases you will ever own. 12 inches tall, these Khalil Mamoon vases are made with thicker glass than a normal hookah vase and feature elegant, colorful designs.  Each vase has an opening dimension of 1.75 i', 10, '39.95', '6269fca18001f.jpg', 'Vase'),
(4, NULL, 'Egyptian Veil Vase', 'Khalil Mamoon', 'If you love the Egyptian style, you would definitely love this Egyptian Veil hookah vase! This is a medium and pretty authentic Egyptian vase with unique design that we can offer you in two base colors: green and black but each of them with perfect golden ornaments. This vase takes size of 26mm. It ', 40, '16.95', '6269fd21ca39f.jpg', 'Egyptian Veil Vase'),
(5, NULL, 'Long Disposable Mouth Tips(50 PCS)', 'Cocous', 'Practice good hygiene. Individually Wrapped: use one-and-done design, disposable, our long hookah tips give you more control over every drag and don’t require you to share your mouth content because they attach and detach easily.', 20, '9.95', '6269fd996fa1a.jpg', 'Mouth Tips'),
(6, NULL, 'Long Disposable Mouth Tips-Colourful (50PCS)', 'Cocous', 'Practice good hygiene.  These extra-long mouth tips are shaped to conform to the contours of your mouth with ease, making the hookah experience fun and enjoyable. ', 40, '9.95', '6269fdf06c400.jpg', 'Mouth Tips');

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
(1, 0, 0, 'admin@email.com', '$2y$10$q4T2FL2p40yHNX9LADmXMuVEhp.FNywmy4VuHmbXX4n1bCFxelDMC');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `businessEmail` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `location` varchar(255) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `businessEmail`, `phone`, `location`, `name`) VALUES
(0, 'hawadjan.1@gmail.com', '4384206969', '2923 Rue Lake', 'Hawad Ahmad');

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
(1, 'Impact', 'Adina', 'The Adina Impact was made from high quality materials. The stainless steel components are made of V2A stainless steel, which makes the model look particularly elegant and robust. The model has a \"plug-in system\" and can be combined with any bowl. The smoke column and mouthpiece sleeves can be change', 20, '279.95', '6269f07bba986.jpg', 'Modern', 'Green'),
(3, 'Impact', 'Adina', 'The Adina Impact was made from high quality materials. The stainless steel components are made of V2A stainless steel, which makes the model look particularly elegant and robust. The model has a \"plug-in system\" and can be combined with any bowl. The smoke column and mouthpiece sleeves can be change', 18, '279.95', '6269f144def97.jpg', 'Modern', 'Black'),
(4, 'EPOX 360 Hookah - Blue Glow', 'Aladin', 'The Aladin EPOX 360 offers you a completely new, special smoking experience at the highest level. In addition to the beautiful epoxy resin sleeves and the solid glass, all parts are made of high-quality stainless steel.\r\n\r\nThanks to the 3 stainless steel rings and the epoxy resin sleeve, the Hookah ', 25, '229.95', '6269f27cbe732.jpg', 'Modern', 'Blue'),
(5, 'Kaya Hookah', 'Pharaoh', '\r\n\r\nThe Pharaoh\'s Hookah team brings us the Kaya hookah that stands at 16\" and contains a variety of glass base options.\r\n\r\nThe modern shaft hookah displays in glossy finish through the entire stem. As you can expect with Pharaoh\'s, this hookah will have a wide gauge down stem giving you smooth draw', 34, '85.00', '6269f2f1c629e.png', 'Modern', 'Green'),
(6, 'Kaya Hookah', 'Pharaoh', '\r\n\r\nThe Pharaoh\'s Hookah team brings us the Kaya hookah that stands at 16\" and contains a variety of glass base options.\r\n\r\nThe modern shaft hookah displays in glossy finish through the entire stem. As you can expect with Pharaoh\'s, this hookah will have a wide gauge down stem giving you smooth draw', 10, '85.00', '6269f33ec0a11.jpg', 'Modern', 'Pink'),
(7, 'Kaya Hookah', 'Pharaoh', 'The Pharaoh\'s Hookah team brings us the Kaya hookah that stands at 16\" and contains a variety of glass base options.\r\n\r\nThe modern shaft hookah displays in glossy finish through the entire stem. As you can expect with Pharaoh\'s, this hookah will have a wide gauge down stem giving you smooth draw and', 15, '85.00', '6269f391601c6.jpg', 'Modern', 'Black'),
(8, 'VOLT Hookah', 'Nube', 'The hookah uses the “Cool Down” bowl blowing system implemented as a button. It allows you to control the smoking process and remove the effect of overheating of the mixture.\r\n\r\nNube Click – Convenient connector on the click to attach the hose to the base. The hookah is made of stabilized ash wood a', 25, '324.95', '6269f52d42c6c.jpg', 'Modern', 'Yellow'),
(9, 'VOLT Hookah', 'Nube', 'he hookah uses the “Cool Down” bowl blowing system implemented as a button. It allows you to control the smoking process and remove the effect of overheating of the mixture.\r\n\r\nNube Click – Convenient connector on the click to attach the hose to the base. The hookah is made of stabilized ash wood an', 20, '324.95', '6269f57fbae47.jpg', 'Modern', 'Red'),
(10, 'UNIQUE', 'Nube', 'The hookah uses the “Cool Down” bowl blowing system implemented in the form of a button. It allows you to control the smoking process and remove the effect of overheating the mixture.\r\n\r\nPads on the shaft and mouthpiece are made of Austrian polyacetal.\r\nThe diffuser in the submersible shaft is made ', 40, '249.95', '6269f5f0c9394.jpg', 'Modern', 'Black'),
(11, 'UNIQUE', 'Nube', 'he hookah uses the “Cool Down” bowl blowing system implemented in the form of a button. It allows you to control the smoking process and remove the effect of overheating the mixture.\r\n\r\nPads on the shaft and mouthpiece are made of Austrian polyacetal.\r\nThe diffuser in the submersible shaft is made i', 10, '249.95', '6269f63ce6bfd.jpg', 'Modern', 'White'),
(12, 'Hawk Hookah', 'Hawk', 'BLACK HAWK HOOKAH\r\n\r\nMedium sized hookah.\r\nWith vertical smoke blow out under ashtray.\r\nFully collapsible model.\r\nFully rust proofed.\r\nStainless steel shaft with wooden covers.', 17, '394.95', '6269f70fd4d95.jpg', 'Modern', 'Black'),
(13, 'Hawk Hookah', 'Hawk', 'Medium sized hookah.\r\nWith vertical smoke blow out under ashtray.\r\nFully collapsible model.\r\nFully rust proofed.\r\nStainless steel shaft with wooden covers.', 15, '394.95', '6269f785afc79.jpg', 'Modern', 'Blue'),
(14, 'Hawk Hookah', 'Hawk', 'Medium sized hookah.\r\nWith vertical smoke blow out under ashtray.\r\nFully collapsible model.\r\nFully rust proofed.\r\nStainless steel shaft with wooden covers.', 30, '394.94', '6269f7cc4648d.jpg', 'Modern', 'Green'),
(15, 'Russian Hookah', 'BATR', 'The BATR Shisha is made in Russia, is it a combination of wood overlay and stainless steel. The mantle is made of beech and ash wood and coated with moisture resistant oil. The smoke column can be removed individually and is therefore exchangeable. So if you want a new look, you can easily change it', 15, '189.95', '6269f83b020cc.jpg', 'Russian', 'Black'),
(16, 'Russian Hookah', 'BATR', 'The BATR Shisha is made in Russia, is it a combination of wood overlay and stainless steel. The mantle is made of beech and ash wood and coated with moisture resistant oil. The smoke column can be removed individually and is therefore exchangeable. So if you want a new look, you can easily change it', 20, '189.95', '6269f87b0d918.jpg', 'Russian', 'Green'),
(17, 'Russian Hookah', 'BATR', 'The BATR Shisha is made in Russia, is it a combination of wood overlay and stainless steel. The mantle is made of beech and ash wood and coated with moisture resistant oil. The smoke column can be removed individually and is therefore exchangeable. So if you want a new look, you can easily change it', 25, '189.95', '6269f8b8d285e.jpg', 'Russian', 'Blue'),
(19, 'DOPE 360', 'OVO', 'A perfect tribute to a true smoker – blow clouds like Big Poppa with a hookah set made for a superstar. The sporty modern design gives the R.E.D. a clean-cut look that never gets old.\r\n\r\nEnjoy a shisha pipe that arrives readily assembled with straightforward directions for use, allowing you to relax', 30, '259.95', '6269f980cdd14.jpg', 'Modern', 'Black'),
(20, 'DOPE 360', 'OVO', 'Keep your celebrations classy with a shisha pipe fit for King James. This durable, stylish, and practical waterpipe is the ultimate way to get your flavorful fix. It’s the perfect addition to parties, hangouts, or even just a relaxed solo session. We’ve designed it to be stress-free, with a straight', 20, '259.95', '6269f9d13eb20.jpg', 'Modern', 'Yellow'),
(21, 'Edition 4-Lounge', 'AEON', 'The Edition 4 - Lounge is a German-made hookah, produced by industry-leading brand Aeon. This hookah is manufactured using some of the highest quality materials on the market to deliver one of the most durable hookahs to date. The Aeon Edition 4 is tried and tested, it undergoes quality control to e', 20, '399.99', '6269fa46b973b.jpg', 'Modern', 'Black'),
(22, 'Edition 4-Lounge', 'AEON', 'The Edition 4 - Lounge is a German-made hookah, produced by industry-leading brand Aeon. This hookah is manufactured using some of the highest quality materials on the market to deliver one of the most durable hookahs to date. The Aeon Edition 4 is tried and tested, it undergoes quality control to e', 20, '399.99', '6269fa86f2743.jpg', 'Modern', 'Yellow'),
(23, 'Edition 4-Lounge', 'AEON', 'The Edition 4 - Lounge is a German-made hookah, produced by industry-leading brand Aeon. This hookah is manufactured using some of the highest quality materials on the market to deliver one of the most durable hookahs to date. The Aeon Edition 4 is tried and tested, it undergoes quality control to e', 20, '399.99', '6269faef26384.jpg', 'Modern', 'Blue');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `pwdReset_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `token` text NOT NULL,
  `expire` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `FK_accessory_hookah_id` (`hookah_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `FK_admin_contact` (`contact_id`),
  ADD KEY `FK_admin_about` (`about_id`);

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
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`pwdReset_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `accessory`
--
ALTER TABLE `accessory`
  MODIFY `accessory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hookah`
--
ALTER TABLE `hookah`
  MODIFY `hookah_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `pwdReset_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accessory`
--
ALTER TABLE `accessory`
  ADD CONSTRAINT `FK_accessory_hookah_id` FOREIGN KEY (`hookah_id`) REFERENCES `hookah` (`hookah_id`);

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `FK_admin_about` FOREIGN KEY (`about_id`) REFERENCES `about_us` (`about_id`),
  ADD CONSTRAINT `FK_admin_contact` FOREIGN KEY (`contact_id`) REFERENCES `contact` (`contact_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
