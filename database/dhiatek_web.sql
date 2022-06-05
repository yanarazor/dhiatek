/*
 Navicat Premium Data Transfer

 Source Server         : localhost mysql
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : dhiatek_web

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 05/06/2022 21:18:37
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `clients_nama_unique` (`nama`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clients
-- ----------------------------
BEGIN;
INSERT INTO `clients` VALUES (1, 'Yana Mardiyana', 'febumj.png', NULL, '2021-08-22 08:23:30');
INSERT INTO `clients` VALUES (2, 'Bappebti', 'bappebti.png', NULL, NULL);
INSERT INTO `clients` VALUES (3, 'Kemendes', 'kemendes.png', NULL, NULL);
INSERT INTO `clients` VALUES (4, 'Kemendikbud ristek', 'kemendikbud.png', NULL, NULL);
INSERT INTO `clients` VALUES (5, 'LIPI', 'lipi.png', NULL, NULL);
INSERT INTO `clients` VALUES (6, 'UNDP', 'undp.jpeg', NULL, NULL);
INSERT INTO `clients` VALUES (7, 'Sederhana', 'sederhana.png', '2021-08-19 14:44:50', '2021-08-19 14:44:50');
COMMIT;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
BEGIN;
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_08_19_052843_create_teams_table', 1);
INSERT INTO `migrations` VALUES (5, '2021_08_19_070900_create_clients_table', 1);
INSERT INTO `migrations` VALUES (6, '2021_08_19_075607_create_portopolios_table', 1);
COMMIT;

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for portopolios
-- ----------------------------
DROP TABLE IF EXISTS `portopolios`;
CREATE TABLE `portopolios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_project` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_preview` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of portopolios
-- ----------------------------
BEGIN;
INSERT INTO `portopolios` VALUES (1, 'Simpeg Kemendikbud', 'web', '1629695018_Screen Shot 2021-08-23 at 12.02.48.png', NULL, '2021-08-23 05:03:38');
INSERT INTO `portopolios` VALUES (2, 'Simak FEB UMJ', 'app', '1629694598_febumj_simak.jpeg', NULL, '2021-08-23 04:56:38');
INSERT INTO `portopolios` VALUES (3, 'Web PPID LIPI', 'web', '1629695125_Screen Shot 2021-08-23 at 12.04.44.png', NULL, '2021-08-23 05:05:26');
INSERT INTO `portopolios` VALUES (4, 'PPID LIPI', 'app', '1629694806_ppidlipi.jpeg', NULL, '2021-08-23 05:00:06');
INSERT INTO `portopolios` VALUES (5, 'Simak FEB UMJ', 'web', '1629694686_simakfebumj.png', NULL, '2021-08-23 04:58:06');
INSERT INTO `portopolios` VALUES (7, 'Majalah Jendela', 'app', '1629694894_jendela.jpeg', '2021-08-23 05:01:34', '2021-08-23 05:01:34');
INSERT INTO `portopolios` VALUES (8, 'Web Aplikasi DUPAK Elektronik', 'web', '1629695214_Screen Shot 2021-08-23 at 12.06.29.png', '2021-08-23 05:06:54', '2021-08-23 05:06:54');
INSERT INTO `portopolios` VALUES (9, 'Apps Digital Signature', 'app', '1629695352_dsdikbud.jpeg', '2021-08-23 05:09:12', '2021-08-23 05:09:12');
INSERT INTO `portopolios` VALUES (10, 'Web Formasi PTP', 'web', '1629695387_Screen Shot 2021-08-23 at 12.08.32.png', '2021-08-23 05:09:47', '2021-08-23 05:09:47');
INSERT INTO `portopolios` VALUES (11, 'Ecommerce', 'web', '1629696757_Screen Shot 2021-08-23 at 12.32.16.png', '2021-08-23 05:32:37', '2021-08-23 05:32:37');
INSERT INTO `portopolios` VALUES (12, 'Sakip Kementerian Desa', 'web', '1629695871_Screen Shot 2021-08-23 at 12.16.48.png', '2021-08-23 05:17:51', '2021-08-23 05:17:51');
INSERT INTO `portopolios` VALUES (13, 'Web Keuangan', 'web', '1629695899_Screen Shot 2021-08-23 at 12.17.18.png', '2021-08-23 05:18:19', '2021-08-23 05:18:19');
INSERT INTO `portopolios` VALUES (14, 'Web GIS', 'web', '1629696412_webgis.png', '2021-08-23 05:24:21', '2021-08-23 05:26:52');
INSERT INTO `portopolios` VALUES (15, 'Event PTP', 'web', '1629695639_Screen Shot 2021-08-23 at 12.12.53.png', '2021-08-23 05:13:59', '2021-08-23 05:13:59');
COMMIT;

-- ----------------------------
-- Table structure for teams
-- ----------------------------
DROP TABLE IF EXISTS `teams`;
CREATE TABLE `teams` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of teams
-- ----------------------------
BEGIN;
INSERT INTO `teams` VALUES (1, 'Yana Mardiyana', 'Chief Executive Officer', '1629621084_melotot.jpg', NULL, '2021-08-22 08:31:24');
INSERT INTO `teams` VALUES (2, 'Farham Harvianto', 'Web Programmer', 'aam.png', NULL, NULL);
INSERT INTO `teams` VALUES (3, 'Iskandar Idris', 'Mobile Programmer', 'iskandar.png', NULL, NULL);
INSERT INTO `teams` VALUES (4, 'Akbar Muchbarak', 'Web Programmer', 'akbar.png', NULL, NULL);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES (1, 'Yanarazor', 'yanarazor@gmail.com', '2021-08-20 06:24:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VRWwwzxRFqV5ZtdlISbJtob9kmoYqd13mVWktSreDgylvqp6tGnjQtGXO8NH', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (2, 'Narciso Okuneva II', 'semmerich@example.com', '2021-08-20 06:24:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YabBxq5aIq', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (3, 'Dominique Romaguera', 'fermin93@example.com', '2021-08-20 06:24:44', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yn2KFJZ6hG', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (4, 'Florida Stiedemann', 'damore.katharina@example.org', '2021-08-20 06:24:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'd42D9t3MZ4', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (5, 'Mr. Oren Wuckert', 'heathcote.jordan@example.net', '2021-08-20 06:24:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EhmMfmIurk', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (6, 'Terrance Cole', 'bode.loy@example.org', '2021-08-20 06:24:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1MRqzB2sWB', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (7, 'Casimir Hartmann', 'xschmidt@example.org', '2021-08-20 06:24:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '95C3YzPYG2', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (8, 'Columbus Lebsack', 'gail.flatley@example.com', '2021-08-20 06:24:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EksAWRtO9h', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (9, 'Beverly Ankunding V', 'beier.emmie@example.org', '2021-08-20 06:24:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'IcloWwXnVc', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
INSERT INTO `users` VALUES (10, 'Ms. Alexa Mraz Sr.', 'flangworth@example.org', '2021-08-20 06:24:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'SAEtiaicKw', '2021-08-20 06:24:45', '2021-08-20 06:24:45');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
