-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2025 at 09:50 AM
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
-- Database: `party`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`) VALUES
(1, 'Party-Admin', 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(100) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `age` int(100) DEFAULT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `age`, `email`, `address`, `username`, `password`) VALUES
(1, 'student', 23, 'student@gmail.com', 'colombo', 'abc', 'abc');

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE `form` (
  `id` int(100) NOT NULL,
  `customer_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`id`, `customer_id`, `name`, `message`, `phone`, `email`) VALUES
(1, 1, 'Aruna', 'The party planning site made organizing my event a breeze! From selecting vendors to coordinating details, everything was seamless. Highly recommend for stress-free party planning.', '0712345678', 'aruna@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(100) NOT NULL,
  `customer_id` int(100) DEFAULT NULL,
  `theme_id` int(100) DEFAULT NULL,
  `vendor_id` int(100) DEFAULT NULL,
  `venue_id` int(100) DEFAULT NULL,
  `admin_id` int(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `time` time DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `no_guests` int(100) DEFAULT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `customer_id`, `theme_id`, `vendor_id`, `venue_id`, `admin_id`, `date`, `time`, `description`, `no_guests`, `status`) VALUES
(1, 1, 1, 1, 1, 1, '2024-10-10', '10:00:00', 'I want to celebrate my birthday party with my friends and family.There will be 20 old guests and 10 kids. I want to have a 1920s theme party with Amaya Food.', 100, ''),
(2, 1, 3, 2, 2, 1, '2025-05-01', '16:00:00', 'Hi how are you, im fnme', 3, 'Pending'),
(3, 1, 2, 2, 3, 1, '2025-05-01', '20:00:00', 'gouadjbv kjsabcfasjbf ', 1, 'Pending'),
(4, 1, 2, 3, 5, 1, '2025-05-02', '17:00:00', 'nmfap kasfnopa lskfn ', 21, 'Pending'),
(5, NULL, 4, 3, 4, 1, '2025-05-02', '17:00:00', 'sdfghj sdfghjk ghjkl', 2, 'Pending'),
(6, NULL, 4, 4, 3, 1, '2025-05-10', '20:00:00', 'asdfghjkl; qwertyuiop', 75, 'Pending'),
(7, 1, 3, 4, 5, 1, '2025-05-10', '19:00:00', 'This is my name', 3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `theme`
--

CREATE TABLE `theme` (
  `id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theme`
--

INSERT INTO `theme` (`id`, `admin_id`, `name`, `description`) VALUES
(1, 1, 'Decade Party', 'Guests dress up and enjoy music, food, and decor from a specific decade, such as the Roaring Twenties, the Swinging Sixties, or the Disco Seventies.'),
(2, 1, 'Under the Sea', 'Dive into an underwater world with ocean-themed decor, costumes inspired by sea creatures, and pirate themes.'),
(3, 1, 'Outer Space', 'Explore the cosmos with a space-themed party featuring futuristic decor, astronaut costumes, cosmic cocktails, and celestial projections.'),
(4, 1, 'Alice in Wonderland', 'Create a whimsical world inspired by Lewis Carrolls classic tale, with tea party decorations, eccentric costumes, and fantastical props.'),
(5, 1, 'Superhero or Villain Party:', 'Guests dress up as their favorite superheroes or villains for a fun-filled night of heroics or mischief');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `admin_id`, `name`, `description`, `type`) VALUES
(1, 1, 'Amaya Food', 'Mouth Watering Food, choose meal preferences', 'food'),
(2, 1, 'Gihan Food', 'High Tea and many short eats you like', 'food'),
(3, 1, 'Cocoa & Chai Café', 'A cozy retreat offering a tantalizing blend of rich cocoa and aromatic chai, accompanied by delectable pastries and treats.', 'food'),
(4, 1, 'Terra Verde Bistro', 'A charming bistro offering a variety of fresh, healthy, and delicious meals, including vegetarian and vegan options.', 'food'),
(5, 1, 'The Grill', 'A casual dining experience featuring a variety of grilled meats, seafood, and vegetarian options, as well as a selection of refreshing beverages.', 'food');

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `id` int(100) NOT NULL,
  `admin_id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`id`, `admin_id`, `name`, `description`) VALUES
(1, 1, 'Starry Night Pavilion', 'Dance under the twinkling stars in our picturesque outdoor pavilion, the perfect setting for magical celebrations.'),
(2, 1, 'Crystal Cove Ballroom', 'Elegant charm meets modern luxury in our versatile ballroom, ideal for weddings, galas, and corporate events.'),
(3, 1, 'Sapphire Sky Terrace', 'Elevate your event to new heights on our stunning rooftop terrace with panoramic city views and chic ambiance.'),
(4, 1, 'Golden Gardens Estate', 'Step into a world of opulence and grandeur at our historic estate, offering timeless elegance for unforgettable occasions.'),
(5, 1, 'Emerald Isle Garden', 'Discover a lush oasis of tranquility in our enchanting garden, a serene setting for intimate gatherings and outdoor ceremonies.'),
(6, 1, 'Moonlit Meadows Barn', 'Rustic charm meets refined elegance in our beautifully renovated barn, a charming venue for rustic weddings and intimate gatherings.'),
(7, 1, 'Ocean Breeze Pavilion', 'Feel the gentle sea breeze as you celebrate in our waterfront pavilion, offering breathtaking views and coastal charm.'),
(8, 1, 'Harbor Lights Yacht Club', 'Set sail on a voyage of celebration aboard our luxurious yacht, offering unparalleled views and nautical elegance.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `form`
--
ALTER TABLE `form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `theme_id` (`theme_id`),
  ADD KEY `vendor_id` (`vendor_id`),
  ADD KEY `venue_id` (`venue_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `theme`
--
ALTER TABLE `theme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `theme`
--
ALTER TABLE `theme`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form`
--
ALTER TABLE `form`
  ADD CONSTRAINT `form_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`theme_id`) REFERENCES `theme` (`id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`vendor_id`) REFERENCES `vendor` (`id`),
  ADD CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`venue_id`) REFERENCES `venue` (`id`),
  ADD CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `theme`
--
ALTER TABLE `theme`
  ADD CONSTRAINT `theme_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `vendor`
--
ALTER TABLE `vendor`
  ADD CONSTRAINT `vendor_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Constraints for table `venue`
--
ALTER TABLE `venue`
  ADD CONSTRAINT `venue_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
