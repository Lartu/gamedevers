-- Adminer 4.6.3 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `gamedevers` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `gamedevers`;

DROP TABLE IF EXISTS `post`;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `creator_id` int(11) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(128) COLLATE utf8_bin DEFAULT NULL,
  `body` varchar(2048) COLLATE utf8_bin NOT NULL,
  `parent_id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `upvotes` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `post` (`id`, `creator_id`, `post_date`, `title`, `body`, `parent_id`, `category`, `upvotes`) VALUES
(1,	1,	'2019-02-05 19:52:09',	'Line copied from w3schools',	'Change the visual order of a specific flex item(s) with the .order classes. Valid classes are from 0 to 12, where the lowest number has highest priority (order-1 is shown before order-2, etc..):',	0,	0,	123),
(2,	1,	'2019-02-05 19:58:00',	'',	'Che qué buen post me encantó cambió mi vida totalmente salu2',	1,	0,	658),
(3,	1,	'2019-02-05 19:58:22',	'',	'Alto post loco',	1,	0,	12),
(4,	1,	'2019-02-05 19:58:48',	'',	'Cerrá el orto forro',	2,	0,	1),
(5,	1,	'2019-02-05 21:07:25',	'',	'ehhh loco no bardiéee',	4,	0,	1),
(6,	1,	'2019-02-05 21:07:01',	'',	'la mia tambien salu2',	2,	0,	1),
(7,	1,	'2019-02-05 21:07:43',	'',	'gracias!',	3,	0,	1),
(8,	1,	'2019-02-05 21:16:06',	'Che alta página eh',	'Esta página me encanta porque es alta página. Como yo no soy muy alto, no alcanzo a la alacena y no puedo bajar los copos para desayunar así que como esta página es re alta va y me los baja es re piola salu2',	0,	0,	0);

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) COLLATE utf8_bin NOT NULL,
  `user_group` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

INSERT INTO `user` (`id`, `username`, `user_group`) VALUES
(1,	'lartu',	0);

-- 2019-02-06 16:12:21
