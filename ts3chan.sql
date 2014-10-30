-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE TABLE "auths" ------------------------------------
DROP TABLE IF EXISTS `auths` CASCADE;

CREATE TABLE `auths` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`user` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL, 
	`pass` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 4;
-- ---------------------------------------------------------


-- CREATE TABLE "requests" ---------------------------------
DROP TABLE IF EXISTS `requests` CASCADE;

CREATE TABLE `requests` ( 
	`id` Int( 11 ) UNSIGNED AUTO_INCREMENT NOT NULL, 
	`email` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`name` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`cname` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`note` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`status` TinyInt( 1 ) UNSIGNED NULL, 
	`reason` VarChar( 255 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL, 
	`created_at` Timestamp NULL, 
	`updated_at` Timestamp NULL,
	 PRIMARY KEY ( `id` )
 )
CHARACTER SET = latin1
COLLATE = latin1_swedish_ci
ENGINE = InnoDB
AUTO_INCREMENT = 96;
-- ---------------------------------------------------------


-- Dump data of "auths" ------------------------------------
INSERT INTO `auths`(`id`,`user`,`pass`) VALUES ( '1', 'admin', '$2y$10$L.RgVdYfU4xWcL.CnhK1ZO3073uVwNjMu3nbKXbIjPBapd2xaq20.' );
-- ---------------------------------------------------------


-- Dump data of "requests" ---------------------------------
INSERT INTO `requests`(`id`,`email`,`name`,`cname`,`note`,`status`,`reason`,`created_at`,`updated_at`) VALUES ( '92', 'ahmed.apr27@gmail.com4', 'Ahmed', 'Test1', '', '2', 'BAD', '2014-10-27 21:26:47', '2014-10-27 21:37:48' );
INSERT INTO `requests`(`id`,`email`,`name`,`cname`,`note`,`status`,`reason`,`created_at`,`updated_at`) VALUES ( '93', 'ahmed.apr27@gmail.com2', 'Ahmed2', 'Test2', '', '1', 'Cuz i can :D', '2014-10-27 21:27:07', '2014-10-29 20:50:39' );
INSERT INTO `requests`(`id`,`email`,`name`,`cname`,`note`,`status`,`reason`,`created_at`,`updated_at`) VALUES ( '94', 'ahmed.apr27@gmail.com', 'Ahmed', 'Ahmed\'s channal', '', '2', 'Cuz i can :D', '2014-10-28 17:52:02', '2014-10-29 20:53:12' );
INSERT INTO `requests`(`id`,`email`,`name`,`cname`,`note`,`status`,`reason`,`created_at`,`updated_at`) VALUES ( '95', 'ahmed.apr27@gmail.com', 'Ahmed', 'test', '', '0', 'Cuz i can muhahaha!!!', '2014-10-28 17:52:18', '2014-10-29 18:45:06' );
-- ---------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


