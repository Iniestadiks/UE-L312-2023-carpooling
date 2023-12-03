-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Dec 03, 2023 at 04:00 AM
-- Server version: 8.0.32
-- PHP Version: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carpooling`
--

-- --------------------------------------------------------

--
-- Table structure for table `carpoolingAds`
--

CREATE TABLE `carpoolingAds` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carpoolingAds`
--

INSERT INTO `carpoolingAds` (`id`, `title`, `description`, `price`) VALUES
(1, 'Trajet Paris-Lyon', 'Départ de Paris à 8h, arrivée à Lyon vers 12h. Pause café incluse.', '30.00'),
(2, 'Lyon-Marseille', 'Voyage confortable en Tesla Model S, musique et bonne ambiance.', '45.00'),
(3, 'Nantes-Bordeaux', 'Départ tôt le matin, retour en fin de journée.', '25.00');

-- --------------------------------------------------------

--
-- Table structure for table `carpoolingAds_cars`
--

CREATE TABLE `carpoolingAds_cars` (
  `carpoolingAd_id` int NOT NULL,
  `car_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carpoolingAds_cars`
--

INSERT INTO `carpoolingAds_cars` (`carpoolingAd_id`, `car_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `carpoolingAds_reservations`
--

CREATE TABLE `carpoolingAds_reservations` (
  `carpoolingAd_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carpoolingAds_reservations`
--

INSERT INTO `carpoolingAds_reservations` (`carpoolingAd_id`, `reservation_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int NOT NULL,
  `brand` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nbrSlots` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `brand`, `model`, `color`, `nbrSlots`) VALUES
(1, 'Skoda', 'Fabia', 'Noire', 5),
(2, 'Huandai', 'Getz', 'Rouge', 5),
(3, 'Mercedes', 'Classe C', 'Noire', 4),
(4, 'Renaut', 'Zoé', 'Bleu', 2);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int NOT NULL,
  `reservationDate` datetime NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `reservationDate`, `address`) VALUES
(1, '2023-04-15 08:00:00', '123 Rue de Paris, 75001 Paris'),
(2, '2023-04-16 09:00:00', '456 Avenue de Lyon, 69000 Lyon'),
(3, '2023-04-17 07:30:00', '789 Boulevard de Nantes, 44000 Nantes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Madicke', 'GUEYE', 'gueyemadicke@ensacf.fr', '1995-11-08 00:00:00'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08 00:00:00'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users_carpoolingAds`
--

CREATE TABLE `users_carpoolingAds` (
  `user_id` int NOT NULL,
  `carpoolingAd_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_carpoolingAds`
--

INSERT INTO `users_carpoolingAds` (`user_id`, `carpoolingAd_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `users_cars`
--

CREATE TABLE `users_cars` (
  `user_id` int NOT NULL,
  `car_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_cars`
--

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `users_reservations`
--

CREATE TABLE `users_reservations` (
  `user_id` int NOT NULL,
  `reservation_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carpoolingAds`
--
ALTER TABLE `carpoolingAds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carpoolingAds_cars`
--
ALTER TABLE `carpoolingAds_cars`
  ADD PRIMARY KEY (`carpoolingAd_id`,`car_id`);

--
-- Indexes for table `carpoolingAds_reservations`
--
ALTER TABLE `carpoolingAds_reservations`
  ADD PRIMARY KEY (`carpoolingAd_id`,`reservation_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_carpoolingAds`
--
ALTER TABLE `users_carpoolingAds`
  ADD PRIMARY KEY (`user_id`,`carpoolingAd_id`);

--
-- Indexes for table `users_cars`
--
ALTER TABLE `users_cars`
  ADD PRIMARY KEY (`user_id`,`car_id`);

--
-- Indexes for table `users_reservations`
--
ALTER TABLE `users_reservations`
  ADD PRIMARY KEY (`user_id`,`reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carpoolingAds`
--
ALTER TABLE `carpoolingAds`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
