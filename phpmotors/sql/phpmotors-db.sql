-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2023 at 03:12 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpmotors`
--
CREATE DATABASE IF NOT EXISTS `phpmotors` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `phpmotors`;

-- --------------------------------------------------------

--
-- Table structure for table `carclassification`
--

CREATE TABLE `carclassification` (
  `classificationId` int(11) NOT NULL,
  `classificationName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `carclassification`
--

INSERT INTO `carclassification` (`classificationId`, `classificationName`) VALUES
(1, 'SUV'),
(2, 'Classic'),
(3, 'Sports'),
(4, 'Trucks'),
(5, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `clientId` int(10) UNSIGNED NOT NULL,
  `clientFirstname` varchar(15) NOT NULL,
  `clientLastname` varchar(25) NOT NULL,
  `clientEmail` varchar(40) NOT NULL,
  `clientPassword` varchar(255) NOT NULL,
  `clientLevel` enum('1','2','3') NOT NULL DEFAULT '1',
  `comment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`clientId`, `clientFirstname`, `clientLastname`, `clientEmail`, `clientPassword`, `clientLevel`, `comment`) VALUES
(2, 'Admin', 'User', 'admin@cit340.net', '$2y$10$65UjEoEtTLu17qmfJT23ruUqbskzNy7XPx/RnScXjtzz.khYh7Pim', '3', NULL),
(3, 'Jose', 'Such', 'suchjose@yahoo.com', '$2y$10$/Yv7gAuPUIV/3uhOZbNRwOOA3wC13uJnrVuVbiB8v7buChc1X7mcq', '1', NULL),
(4, 'Jose', 'Such', 'suchjose@live.com', '$2y$10$RoMl/mGdr2T3YYZ0jSoXgOZGSDsnTxZD/fAOQoU/.Y/8Sw2avqs3C', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `imgId` int(11) NOT NULL,
  `invId` int(11) NOT NULL,
  `imgName` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgPath` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imgDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgPrimary` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`imgId`, `invId`, `imgName`, `imgPath`, `imgDate`, `imgPrimary`) VALUES
(61, 1, 'jeep-wrangler.jpg', '/cse340/phpmotors/images/vehicles/jeep-wrangler.jpg', '2023-03-17 18:06:21', 1),
(62, 1, 'jeep-wrangler-tn.jpg', '/cse340/phpmotors/images/vehicles/jeep-wrangler-tn.jpg', '2023-03-17 18:06:21', 1),
(63, 2, 'ford-modelt.jpg', '/cse340/phpmotors/images/vehicles/ford-modelt.jpg', '2023-03-17 18:07:37', 1),
(64, 2, 'ford-modelt-tn.jpg', '/cse340/phpmotors/images/vehicles/ford-modelt-tn.jpg', '2023-03-17 18:07:37', 1),
(65, 3, 'lambo-Adve.jpg', '/cse340/phpmotors/images/vehicles/lambo-Adve.jpg', '2023-03-17 18:08:31', 1),
(66, 3, 'lambo-Adve-tn.jpg', '/cse340/phpmotors/images/vehicles/lambo-Adve-tn.jpg', '2023-03-17 18:08:31', 1),
(67, 4, 'monster.jpg', '/cse340/phpmotors/images/vehicles/monster.jpg', '2023-03-17 18:08:52', 1),
(68, 4, 'monster-tn.jpg', '/cse340/phpmotors/images/vehicles/monster-tn.jpg', '2023-03-17 18:08:52', 1),
(69, 5, 'ms.jpg', '/cse340/phpmotors/images/vehicles/ms.jpg', '2023-03-17 18:09:10', 1),
(70, 5, 'ms-tn.jpg', '/cse340/phpmotors/images/vehicles/ms-tn.jpg', '2023-03-17 18:09:10', 1),
(71, 6, 'bat.jpg', '/cse340/phpmotors/images/vehicles/bat.jpg', '2023-03-17 18:09:36', 1),
(72, 6, 'bat-tn.jpg', '/cse340/phpmotors/images/vehicles/bat-tn.jpg', '2023-03-17 18:09:36', 1),
(73, 7, 'mm.jpg', '/cse340/phpmotors/images/vehicles/mm.jpg', '2023-03-17 18:09:46', 1),
(74, 7, 'mm-tn.jpg', '/cse340/phpmotors/images/vehicles/mm-tn.jpg', '2023-03-17 18:09:46', 1),
(75, 8, 'fire-truck.jpg', '/cse340/phpmotors/images/vehicles/fire-truck.jpg', '2023-03-17 18:09:59', 1),
(76, 8, 'fire-truck-tn.jpg', '/cse340/phpmotors/images/vehicles/fire-truck-tn.jpg', '2023-03-17 18:09:59', 1),
(77, 9, 'crown-vic.jpg', '/cse340/phpmotors/images/vehicles/crown-vic.jpg', '2023-03-17 18:10:38', 1),
(78, 9, 'crown-vic-tn.jpg', '/cse340/phpmotors/images/vehicles/crown-vic-tn.jpg', '2023-03-17 18:10:38', 1),
(79, 10, 'camaro.jpg', '/cse340/phpmotors/images/vehicles/camaro.jpg', '2023-03-17 18:10:59', 1),
(80, 10, 'camaro-tn.jpg', '/cse340/phpmotors/images/vehicles/camaro-tn.jpg', '2023-03-17 18:10:59', 1),
(81, 11, 'escalade.jpg', '/cse340/phpmotors/images/vehicles/escalade.jpg', '2023-03-17 18:11:17', 1),
(82, 11, 'escalade-tn.jpg', '/cse340/phpmotors/images/vehicles/escalade-tn.jpg', '2023-03-17 18:11:17', 1),
(83, 12, 'hummer.jpg', '/cse340/phpmotors/images/vehicles/hummer.jpg', '2023-03-17 18:11:30', 1),
(84, 12, 'hummer-tn.jpg', '/cse340/phpmotors/images/vehicles/hummer-tn.jpg', '2023-03-17 18:11:30', 1),
(85, 13, 'aerocar.jpg', '/cse340/phpmotors/images/vehicles/aerocar.jpg', '2023-03-17 18:11:42', 1),
(86, 13, 'aerocar-tn.jpg', '/cse340/phpmotors/images/vehicles/aerocar-tn.jpg', '2023-03-17 18:11:42', 1),
(87, 14, 'fbi.jpg', '/cse340/phpmotors/images/vehicles/fbi.jpg', '2023-03-17 18:11:57', 1),
(88, 14, 'fbi-tn.jpg', '/cse340/phpmotors/images/vehicles/fbi-tn.jpg', '2023-03-17 18:11:57', 1),
(89, 15, 'no-image.png', '/cse340/phpmotors/images/vehicles/no-image.png', '2023-03-17 18:12:32', 1),
(90, 15, 'no-image-tn.png', '/cse340/phpmotors/images/vehicles/no-image-tn.png', '2023-03-17 18:12:32', 1),
(91, 16, 'delorean.jpg', '/cse340/phpmotors/images/vehicles/delorean.jpg', '2023-03-18 02:58:09', 1),
(92, 16, 'delorean-tn.jpg', '/cse340/phpmotors/images/vehicles/delorean-tn.jpg', '2023-03-18 02:58:09', 1),
(93, 1, 'wrangler2.jpg', '/cse340/phpmotors/images/vehicles/wrangler2.jpg', '2023-03-20 12:02:34', 0),
(94, 1, 'wrangler2-tn.jpg', '/cse340/phpmotors/images/vehicles/wrangler2-tn.jpg', '2023-03-20 12:02:34', 0),
(95, 1, 'wrangler3.jpg', '/cse340/phpmotors/images/vehicles/wrangler3.jpg', '2023-03-20 15:50:19', 0),
(96, 1, 'wrangler3-tn.jpg', '/cse340/phpmotors/images/vehicles/wrangler3-tn.jpg', '2023-03-20 15:50:19', 0),
(97, 3, 'lambo2.jpeg', '/cse340/phpmotors/images/vehicles/lambo2.jpeg', '2023-03-21 16:52:01', 0),
(98, 3, 'lambo2-tn.jpeg', '/cse340/phpmotors/images/vehicles/lambo2-tn.jpeg', '2023-03-21 16:52:01', 0),
(99, 3, 'lambo3.jpg', '/cse340/phpmotors/images/vehicles/lambo3.jpg', '2023-03-21 16:52:37', 0),
(100, 3, 'lambo3-tn.jpg', '/cse340/phpmotors/images/vehicles/lambo3-tn.jpg', '2023-03-21 16:52:37', 0),
(101, 10, 'camaro2.jpg', '/cse340/phpmotors/images/vehicles/camaro2.jpg', '2023-03-21 17:22:45', 0),
(102, 10, 'camaro2-tn.jpg', '/cse340/phpmotors/images/vehicles/camaro2-tn.jpg', '2023-03-21 17:22:45', 0),
(103, 10, 'camaro3.jpg', '/cse340/phpmotors/images/vehicles/camaro3.jpg', '2023-03-21 17:23:06', 0),
(104, 10, 'camaro3-tn.jpg', '/cse340/phpmotors/images/vehicles/camaro3-tn.jpg', '2023-03-21 17:23:06', 0);

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `invId` int(11) NOT NULL,
  `invMake` varchar(30) NOT NULL,
  `invModel` varchar(30) NOT NULL,
  `invDescription` text NOT NULL,
  `invImage` varchar(200) NOT NULL,
  `invThumbnail` varchar(200) NOT NULL,
  `invPrice` decimal(10,0) NOT NULL,
  `invStock` smallint(6) NOT NULL,
  `invColor` varchar(20) NOT NULL,
  `classificationId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`invId`, `invMake`, `invModel`, `invDescription`, `invImage`, `invThumbnail`, `invPrice`, `invStock`, `invColor`, `classificationId`) VALUES
(1, 'Jeep', 'Wrangler', 'The Jeep Wrangler is small and compact with enough power to get you where you want to go. It is great for everyday driving as well as off-roading whether that be on the rocks or in the mud!', '/cse340/phpmotors/images/vehicles/jeep-wrangler.jpg', '/cse340/phpmotors/images/vehicles/jeep-wrangler-tn.jpg', '28045', 5, 'Orange', 3),
(2, 'Ford', 'Model T', 'The Ford Model T can be a bit tricky to drive. It was the first car to be put into production. You can get it in any color you want if it is black.', '/cse340/phpmotors/images/vehicles/ford-modelt.jpg', '/cse340/phpmotors/images/vehicles/ford-modelt-tn.jpg', '30000', 1005, 'Black', 2),
(3, 'Lamborghini', 'Adventador', 'This V-12 engine packs a punch in this sporty car. Make sure you wear your seatbelt and obey all traffic laws.', '/cse340/phpmotors/images/vehicles/lambo-Adve.jpg', '/cse340/phpmotors/images/vehicles/lambo-Adve-tn.jpg', '417650', 1, 'Green', 3),
(4, 'Monster', 'Truck', 'Most trucks are for working, this one is for fun. This beast comes with 60 inch tires giving you the traction needed to jump and roll in the mud.', '/cse340/phpmotors/images/vehicles/monster.jpg', '/cse340/phpmotors/images/vehicles/monster-tn.jpg', '150000', 3, 'purple', 4),
(5, 'Mechanic', 'Special', 'Not sure where this car came from. However, with a little tender loving care it will run as good a new.', '/cse340/phpmotors/images/vehicles/ms.jpg', '/cse340/phpmotors/images/vehicles/ms-tn.jpg', '100', 1, 'Rust', 5),
(6, 'Batmobile', 'Custom', 'Ever want to be a superhero? Now you can with the bat mobile. This car allows you to switch to bike mode allowing for easy maneuvering through traffic during rush hour.', '/cse340/phpmotors/images/vehicles/bat.jpg', '/cse340/phpmotors/images/vehicles/bat-tn.jpg', '65000', 1, 'Black', 3),
(7, 'Mystery', 'Machine', 'Scooby and the gang always found luck in solving their mysteries because of their 4 wheel drive Mystery Machine. This Van will help you do whatever job you are required to with a success rate of 100%.', '/cse340/phpmotors/images/vehicles/mm.jpg', '/cse340/phpmotors/images/vehicles/mm-tn.jpg', '10000', 12, 'Green', 1),
(8, 'Spartan', 'Fire Truck', 'Emergencies happen often. Be prepared with this Spartan fire truck. Comes complete with 1000 ft. of hose and a 1000-gallon tank.', '/cse340/phpmotors/images/vehicles/fire-truck.jpg', '/cse340/phpmotors/images/vehicles/fire-truck-tn.jpg', '50000', 1, 'Red', 4),
(9, 'Ford', 'Crown Victoria', 'After the police force updated their fleet these cars are now available to the public! These cars come equipped with the siren which is convenient for college students running late to class.', '/cse340/phpmotors/images/vehicles/crown-vic.jpg', '/cse340/phpmotors/images/vehicles/crown-vic-tn.jpg', '10000', 5, 'White', 5),
(10, 'Chevy', 'Camaro', 'If you want to look cool this is the car you need! This car has great performance at an affordable price. Own it today!', '/cse340/phpmotors/images/vehicles/camaro.jpg', '/cse340/phpmotors/images/vehicles/camaro-tn.jpg', '25000', 10, 'Silver', 3),
(11, 'Cadillac', 'Escalade', 'This styling car is great for any occasion from going to the beach to meeting the president. The luxurious inside makes this car a home away from home.', '/cse340/phpmotors/images/vehicles/escalade.jpg', '/cse340/phpmotors/images/vehicles/escalade-tn.jpg', '75195', 4, 'Black', 1),
(12, 'GM', 'Hummer', 'Do you have 6 kids and like to go off-roading? The Hummer gives you the small interiors with an engine to get you out of any muddy or rocky situation.', '/cse340/phpmotors/images/vehicles/hummer.jpg', '/cse340/phpmotors/images/vehicles/hummer-tn.jpg', '58800', 5, 'Yellow', 5),
(13, 'Aerocar International', 'Aerocar', 'Are you sick of rush hour traffic? This car converts into an airplane to get you where you are going fast. Only 6 of these were made, get this one while it lasts!', '/cse340/phpmotors/images/vehicles/aerocar.jpg', '/cse340/phpmotors/images/vehicles/aerocar-tn.jpg', '1000000', 1, 'Red', 2),
(14, 'FBI', 'Surveillance Van', 'Do you like police shows? You will feel right at home driving this van. Comes complete with surveillance equipment for an extra fee of $2,000 a month.', '/cse340/phpmotors/images/vehicles/fbi.jpg', '/cse340/phpmotors/images/vehicles/fbi-tn.jpg', '20000', 1, 'Green', 1),
(15, 'Dog', 'Car', 'Do you like dogs? Well, this car is for you straight from the 90s from Aspen, Colorado we have the original Dog Car complete with fluffy ears.', '/cse340/phpmotors/images/vehicles/no-image.png', '/cse340/phpmotors/images/vehicles/no-image-tn.png', '35000', 1, 'Brown', 2),
(16, 'DMC', 'DeLorean', 'The DMC DeLorean is a rear-engine two-passenger sports car manufactured and marketed by John DeLorean&#039;s DeLorean Motor Company (DMC) for the American market from 1981 until 1983&mdash;ultimately the only car brought to market by the fledgling company. The DeLorean is sometimes referred to by its internal DMC pre-production designation, DMC-12. However, the DMC-12 name was never used in sales or marketing materials for the production model.', '/cse340/phpmotors/images/vehicles/delorean.jpg', '/cse340/phpmotors/images/vehicles/delorean-tn.jpg', '123', 123, 'Silver', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewId` int(11) UNSIGNED NOT NULL,
  `reviewText` text NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `invId` int(11) NOT NULL,
  `clientId` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewId`, `reviewText`, `reviewDate`, `invId`, `clientId`) VALUES
(72, 'fasdfasdf\r\nasf\r\nasdf\r\nasf\r\nasdf\r\nasd\r\nfasdf', '2023-03-29 01:40:00', 2, 4),
(73, 'sfasfasdfasdfadsf\r\n&lt;p&gt;HiHoHiHoHiHoHiHoHiHoHiHoHiHoHiHoHiHoHiHoHiHoHiHoHiHo&lt;/p&gt;', '2023-03-29 01:41:16', 2, 4),
(74, 'fasdfasfdaal;sdkfjlasdfkjalsdfkj;lasdfkjals;dfkjal;sfkjal;sdfkja;lsdfkjals;dfkjals;dfkjalsdfkjal;sfkjla;sdfkjla;sdkfjla;skdfjl;asdkfjl;askdfj;lasdkfjl;asdkfjl;asdkfjl;asdkfjl;asdfkjal;sdfkjal;sdfkjal;sdfkjla;sdfkj;lasdkfjlasdfkjla;dksfjl;adskfjl;asdjfl;askdjfl;askdjfl;askdjfl;asdkjfl;askdjfl;aksdjf;laksdjfl;asdjfla;skdjfl;askdfjl;aksdfjl;adksfjl;aksdfjl;adsfkjasdlfkjals;dfkjasld;fkjasdl;fkjasdl;fkjasld;fkjals;dfkjasdl;fkjasld;fkjasdlfkjasdfl', '2023-03-29 01:44:02', 2, 4),
(75, 'd;lasdkfj;alsdkfjasl;dfkjas;ldfkjas;ldfkja;sldfkjas;ldfkjas;ldfkj;alsdfkja;lsdfkja;lsdfkja;lsdfkja;sldfkja;sldfkjas;lfkjasdf;lkjasdfl;kjasdf;lkjasdf;lkjasdf;lkjasdf;lkajsdf;lakjsdf;laksjdf;lasdkjfl;askdjf;laskdjfa;lskdfja;lsdkfja;lsdkfja;sldfkjasd;lfkjasd;flkjasdf;lkjasdf;lkajdsf;lakjsdf;alsdkfja;sldfkjasd;fljkasdf;lkjasdfl;kjadsf;lkjasdf;ljkasdf;lkjasdf;lkjasdfl;kjasdf;lakjsdf;laksjdf;alskdfja;lsdkfja;sldfkja;sldfkjas;dlfkjasd;lfkjasd;fljas;dlfkja;lsdfkj;alsdkfj;lkajsdf;lakjsfd;lakjsdf;laksdfj;', '2023-03-29 01:44:41', 2, 4),
(76, 'asdf;lkjl;adsfkj asld;fkjasld;fkj asl;dfkjasldfkjas asl;dkfjasl;dfkja', '2023-03-29 01:44:58', 2, 4),
(80, 'safdasfasdfasdfasdfasdfdfadsfads', '2023-03-29 02:11:19', 2, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carclassification`
--
ALTER TABLE `carclassification`
  ADD PRIMARY KEY (`classificationId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`clientId`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`imgId`),
  ADD KEY `FK_inv_images` (`invId`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`invId`),
  ADD KEY `classificationId` (`classificationId`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewId`),
  ADD KEY `FK_reviews_clients` (`clientId`),
  ADD KEY `FK_reviews_inventory` (`invId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carclassification`
--
ALTER TABLE `carclassification`
  MODIFY `classificationId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `clientId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `imgId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `invId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `FK_inv_images` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `inventory_ibfk_1` FOREIGN KEY (`classificationId`) REFERENCES `carclassification` (`classificationId`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `FK_reviews_clients` FOREIGN KEY (`clientId`) REFERENCES `clients` (`clientId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reviews_inventory` FOREIGN KEY (`invId`) REFERENCES `inventory` (`invId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
