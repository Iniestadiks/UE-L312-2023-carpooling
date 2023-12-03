CREATE TABLE `users` (
  `id` int AUTO_INCREMENT NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08');

CREATE TABLE `cars` (
  `id` int AUTO_INCREMENT NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `nbrSlots` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `cars` (`id`, `brand`, `model`, `color`, `nbrSlots`) VALUES
(1, 'Skoda', 'Fabia', 'Noire', 5),
(2, 'Huandai', 'Getz', 'Rouge', 5),
(3, 'Mercedes', 'Classe C', 'Noire', 4),
(4, 'Renaut', 'Zoé', 'Bleu', 2);

CREATE TABLE users_cars (
	user_id INT NOT NULL, 
	car_id INT NOT NULL, 
	PRIMARY KEY(user_id, car_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_cars` (`user_id`, `car_id`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4);

CREATE TABLE `carpoolingAds` (
  `id` int AUTO_INCREMENT NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `carpoolingAds` (`title`, `description`, `price`) VALUES
('Trajet Paris-Lyon', 'Départ de Paris à 8h, arrivée à Lyon vers 12h. Pause café incluse.', 30.00),
('Lyon-Marseille', 'Voyage confortable en Tesla Model S, musique et bonne ambiance.', 45.00),
('Nantes-Bordeaux', 'Départ tôt le matin, retour en fin de journée.', 25.00);

CREATE TABLE `reservations` (
  `id` int AUTO_INCREMENT NOT NULL,
  `reservationDate` datetime NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `reservations` (`reservationDate`, `address`) VALUES
('2023-04-15 08:00:00', '123 Rue de Paris, 75001 Paris'),
('2023-04-16 09:00:00', '456 Avenue de Lyon, 69000 Lyon'),
('2023-04-17 07:30:00', '789 Boulevard de Nantes, 44000 Nantes');

CREATE TABLE `users_carpoolingAds` (
  `user_id` int NOT NULL,
  `carpoolingAd_id` int NOT NULL,
  PRIMARY KEY (`user_id`, `carpoolingAd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_carpoolingAds` (`user_id`, `carpoolingAd_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

CREATE TABLE `users_reservations` (
  `user_id` int NOT NULL,
  `reservation_id` int NOT NULL,
  PRIMARY KEY (`user_id`, `reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `users_reservations` (`user_id`, `reservation_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

CREATE TABLE `carpoolingAds_cars` (
  `carpoolingAd_id` int NOT NULL,
  `car_id` int NOT NULL,
  PRIMARY KEY (`carpoolingAd_id`, `car_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `carpoolingAds_cars` (`carpoolingAd_id`, `car_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

CREATE TABLE `carpoolingAds_reservations` (
  `carpoolingAd_id` int NOT NULL,
  `reservation_id` int NOT NULL,
  PRIMARY KEY (`carpoolingAd_id`, `reservation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `carpoolingAds_reservations` (`carpoolingAd_id`, `reservation_id`) VALUES
(1, 1),
(2, 2),
(3, 3);

