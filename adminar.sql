-- Adminer 4.8.1 MySQL 10.4.32-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

USE `vishnukumar_1`;

SET NAMES utf8mb4;

CREATE TABLE `profile` (
  `id` int(11) NOT NULL,
  `avatar` varchar(1024) DEFAULT NULL,
  `first_name` varchar(32) DEFAULT NULL,
  `last_name` varchar(32) DEFAULT NULL,
  `bio` varchar(1024) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `facebook` varchar(1024) DEFAULT NULL,
  `insta` varchar(1024) DEFAULT NULL,
  `linkedin` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `profile_ibfk_1` FOREIGN KEY (`id`) REFERENCES `signup` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `profile` (`id`, `avatar`, `first_name`, `last_name`, `bio`, `date`, `facebook`, `insta`, `linkedin`) VALUES
(36,	'kkk',	'qwi',	'rrdsd',	'nale',	'2024-10-02',	'wq',	'qw',	'qw'),
(65,	NULL,	'kannan',	'e',	'manasilayo',	'2024-10-23',	'',	'',	''),
(66,	NULL,	'kannan',	'e',	'manasilayo',	'2002-10-27',	'facebook.com',	'instagram.com',	'linkedin.com'),
(67,	NULL,	'kannan',	'3',	'nalathe rathri inn ',	'2024-10-23',	'',	'',	''),
(68,	NULL,	'kannan',	'4',	'',	'2002-10-27',	'',	'',	''),
(70,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL,	NULL),
(71,	NULL,	'vishnu',	'kumar',	'vishnu enna njan innale',	'2024-10-10',	'',	'',	'');

CREATE TABLE `signup` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) NOT NULL,
  `email` tinytext NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` tinytext NOT NULL,
  `blocked` int(11) DEFAULT NULL,
  `active` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `signup` (`id`, `username`, `email`, `phone`, `password`, `blocked`, `active`) VALUES
(36,	'vishnu',	'vishnu@gmail.com',	'9999999999',	'$2y$10$mALcdxIGbcfseH9eRLAWFeFhPdGxAPMTSX23Kt/vCKd49.wWa5Y8K',	NULL,	NULL),
(65,	'kannan',	'kannan1@gmail.com',	'9999999999',	'$2y$10$yTTLnWQXJ0DRhav/pUoGhOSqDvAZkBk4hQmkp2niGs8n18zkBRale',	NULL,	NULL),
(66,	'kannan2',	'kannan2@gmail.com',	'8798765432',	'$2y$10$f4JfUuh1MuU89yPzNW5lT./R0zxovbCRwRLUXyAG741l0RjDA4LCe',	NULL,	NULL),
(67,	'kannan3',	'kannan3@gmail.com',	'3333333333',	'$2y$10$GMG3f0QLdwQeXjoprJHoQODMIUOujWq8FkcS9cBoQ48kdIUKYWl4C',	NULL,	NULL),
(68,	'kannan4',	'kannan4@gmail.com',	'3333333333',	'$2y$10$zDeZ4cr1epMoOd14TyXz7uYGdF3TZTCr7nyPxk9vlhKUKowJec.QK',	NULL,	NULL),
(69,	'vishnu',	'vishnu@gmail.com',	'8798765432',	'$2y$10$ufj6OwfMzXqmic7G/b0EFeeeYkwA.2OcQbq/5GfXMhMtzP/.AZXbS',	NULL,	NULL),
(70,	'vttttt',	'njaniieeif@gmail.com',	'3333333333',	'$2y$10$8CYdtPDjrS5eP3LwSRCUR.BUL2ww8kZ5z0SJ85VBwcuOICpgg17Yu',	NULL,	NULL),
(71,	'LYJTHO001',	'vishnu43@gmail.com',	'8798765437',	'$2y$10$qEfDxZVjo/Ou2QRbWhK51eUeVzk1qNIKX7HbRbQ/mta9BSsttjZHi',	NULL,	NULL);

-- 2024-10-07 07:24:09